<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;

class Seller extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function verify()
    {
        $data = DB::table('seller_new')
            ->select('ID', 'Name', 'Family', 'NationalID')
            ->get();

        $newSupport = DB::table('seller_conversation')
            ->select('SellerID', 'Status')
            ->where('Status', '1')
            ->get()
            ->count();

        return view('Administrator.Seller.Verify', compact('data', 'newSupport'));
    }

    public function verifyDetail($id)
    {
        $data = DB::table('seller_new')
            ->select('*')
            ->where('ID', $id)
            ->first();

        return view('Administrator.Seller.VerifyDetail', compact('data'));
    }

    public function delete(Request $request)
    {
        DB::table('seller_new')
            ->where('ID', $request->get('id'))
            ->delete();

        $mobile = $request->get('mobile');
        //--------------
        try {
            $token = $request->get('name').'-'.$request->get('family');

            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "reject";
            $type = "sms";

            $result = $var->VerifyLookup($mobile, $token, null, null, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        //--------------

        return redirect()->route('sellerVerify');
    }

    public function list()
    {
        $data = DB::table('sellers as s')
            ->select('*', 'pf.ID as pfID')
            ->leftJoin('product_order_detail as pod', 'pod.SellerID', '=', 's.id')
            ->leftJoin('product_delivery as pd', 'pd.OrderDetailID', '=', 'pod.ID')
            ->leftJoin('product_false as pf', 'pf.ProductDetailID', '=', 'pod.ProductDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->get();

        $newSupport = DB::table('seller_conversation')
            ->select('SellerID', 'Status')
            ->where('Status', '1')
            ->get()
            ->count();

        $deliveryTemp = 0;
        $falseTemp = 0;
        $deliveryAlarm = array();
        $falseAlarm = array();

        $i = 0;
        $j = 0;
        foreach ($data as $key => $row) {
            if ($row->DeliveryProblem === 1 && $row->id !== $deliveryTemp) {
                $deliveryAlarm[$i] = $row->id;
                $deliveryTemp = $row->id;
                $i++;
            }
            if (isset($row->pfID) && $row->id !== $falseTemp) {
                $falseAlarm[$j] = $row->id;
                $falseTemp = $row->id;
                $j++;
            }
        }

        $data = DB::table('sellers as s')
            ->select('*', 'pf.ID as pfID')
            ->leftJoin('product_order_detail as pod', 'pod.SellerID', '=', 's.id')
            ->leftJoin('product_delivery as pd', 'pd.OrderDetailID', '=', 'pod.ID')
            ->leftJoin('product_false as pf', 'pf.ProductDetailID', '=', 'pod.ProductDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->groupBy('s.id')
            ->orderBy('pd.DeliveryProblem', 'DESC')
            ->get();

        return view('Administrator.Seller.Seller', compact('data', 'deliveryAlarm', 'falseAlarm', 'newSupport'));
    }

    public function controlPanel($id, $tab)
    {
        $sellerInfo = DB::table('sellers')
            ->select('*')
            ->where('id', $id)
            ->first();

        $creditCard = DB::table('seller_credit_card as scc')
            ->select('*')
            ->leftJoin('sellers as s', 'scc.SellerID', '=', 's.id')
            ->where('s.id', $id)
            ->get();

        $storeSum = $this->storeTableLoad('all', $id);
        $storeTable = $this->storeTableLoad('pagination', $id);

        $saleSum = $this->saleTableLoad('all', $id);
        $saleTable = $this->saleTableLoad('pagination', $id);

        $amountSum = $this->amountTableLoad('all', $id);
        $amountTable = $this->amountTableLoad('pagination', $id);
        $lastPaymentDate = $this->convertDateToPersian($amountSum['lastPaymentDate']);

        $delivery = DB::table('product_delivery as pd')
            ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath', 'pd.*','pdd.SampleNumber')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pdd', 'pdd.ID', '=', 'pod.ProductDetailID')
            ->where('p.SellerID', $id)
            ->where('pd.DeliveryStatus', 0)
            ->get();

        $support = DB::table('seller_conversation as sc')
            ->select('sc.*',
                'scd.QuestionDate as qDate',
                'scd.QuestionTime as qTime',
                'scd.AnswerDate as aDate',
                'scd.AnswerTime as aTime',
                'scd.Replay',
                'scd.ConversationID',
                'scd.ID as conversationDetailID')
            ->leftJoin('seller_conversation_detail as scd', 'scd.ConversationID', '=', 'sc.ID')
            ->where('sc.SellerID', $id)
            ->orderBy('sc.Status')
            ->orderBy(DB::raw('IF(sc.Status=0 || sc.Status=1, sc.Priority, false)'), 'ASC')
            ->orderBy('sc.ID', 'DESC')
            ->get();

        $newSupport = DB::table('seller_conversation')
            ->select('SellerID', 'Status')
            ->where('SellerID', $id)
            ->where('Status', '1')
            ->get()
            ->count();

        $persianDate = array();
        $pf = '';
        foreach ($saleTable as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
            if (isset($rec->fpID))
                $pf = 'error';
        }

        $today = date('Y-m-d');
        $deliverPersianDate = array();
        $deliveryStatus = array();
        foreach ($delivery as $key => $row) {
            $rowDate = strtotime($row->Date . ' ' . $row->Time);
            $orderDate = date('Y-m-d', $rowDate);
            $reservation = date('Y-m-d', strtotime($row->Date . ' + 1 days'));

            if (($orderDate < $today))
                $deliveryStatus[$key] = $this->dateLenToNow($reservation, '08:00:00'); // get len past date to now by min
            else
                $deliveryStatus[$key] = 0; // get len past date to now by min

            $d = $row->Date;
            $deliverPersianDate[$key] = $this->convertDateToPersian($d);
        }

        $supportPersianDate = array();
        foreach ($support as $key => $rec) {
            $d = $rec->Date;
            $supportPersianDate[$key] = $this->convertDateToPersian($d);
        }

        $amountPersianDate = array();
        foreach ($amountTable as $key => $rec) {
            $d = $rec->Date;
            $amountPersianDate[$key] = $this->convertDateToPersian($d);
        }
        return view('Administrator.Seller.ControlPanel', compact('sellerInfo', 'creditCard', 'storeSum', 'storeTable',
            'tab', 'persianDate', 'saleSum', 'saleTable', 'amountSum', 'amountTable', 'lastPaymentDate', 'delivery', 'deliverPersianDate',
            'deliveryStatus', 'delivery', 'support', 'supportPersianDate', 'amountPersianDate', 'newSupport', 'pf'));
    }

    public function support()
    {
        $support = DB::table('seller_conversation as sc')
            ->select('sc.*',
                'scd.QuestionDate as qDate',
                'scd.QuestionTime as qTime',
                'scd.AnswerDate as aDate',
                'scd.AnswerTime as aTime',
                'scd.Replay',
                'scd.ConversationID',
                'scd.ID as conversationDetailID')
            ->leftJoin('seller_conversation_detail as scd', 'scd.ConversationID', '=', 'sc.ID')
            ->where('Status', '1')
            ->orderBy('sc.Status')
            ->orderBy(DB::raw('IF(sc.Status=0 || sc.Status=1, sc.Priority, false)'), 'ASC')
            ->orderBy('sc.ID', 'DESC')
            ->get();

        $newSupport = DB::table('seller_conversation')
            ->select('SellerID', 'Status')
            ->where('Status', '1')
            ->get()
            ->count();

        $supportPersianDate = array();
        foreach ($support as $key => $rec) {
            $d = $rec->Date;
            $supportPersianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Administrator.Seller.Support', compact('support', 'supportPersianDate', 'newSupport'));
    }

    public function storeTableLoad($val, $sellerID)
    {
        if ($val === 'all') {
            $generalInfo = array(
                'sumFPrice' => '0',
                'allQty' => '0',
                'female' => '0',
                'male' => '0',
                'girl' => '0',
                'boy' => '0',
                'babyGirl' => '0',
                'babyBoy' => '0',
                'avgRating' => '0');

            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color', 'pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->get();

            foreach ($data as $d) {
                $generalInfo['sumFPrice'] += $d->Qty * $d->FinalPrice;
                $generalInfo['allQty'] += $d->Qty;
                if ($d->Gender === 'زنانه')
                    $generalInfo['female'] += $d->Qty;
                elseif ($d->Gender === 'مردانه')
                    $generalInfo['male'] += $d->Qty;
                elseif ($d->Gender === 'دخترانه')
                    $generalInfo['girl'] += $d->Qty;
                elseif ($d->Gender === 'پسرانه')
                    $generalInfo['boy'] += $d->Qty;
                elseif ($d->Gender === 'نوزادی پسرانه')
                    $generalInfo['babyGirl'] += $d->Qty;
                else
                    $generalInfo['babyBoy'] += $d->Qty;
            }

            return $generalInfo;
        }

        if ($val === 'pagination') {
            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color', 'pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->groupBy('pDetailID')
                ->orderby('pd.ID','DESC')
                ->paginate(10);

            return $data;
        }
    }

    public function saleTableLoad($val, $sellerID)
    {
        if ($val === 'all') {

            $generalInfo = array(
                'todayOrder' => 0,
                'monthOrder' => 0,
                'allOrder' => 0,
                'totalSaleAmount' => 0);

            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.PriceWithDiscount', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID', 'pd.SampleNumber')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->get();

            foreach ($data as $d) {
                $createOrder = $d->Date; // Get Order Table Column Date and Convert String Date To Object Date
                $date = new DateTime($createOrder);
                $today = new DateTime();
                $dateOrder = $date->diff($today)->format("%d");

                if ($dateOrder == 0) $generalInfo['todayOrder'] += 1;
                if (($dateOrder == 0) || ($dateOrder < 30)) $generalInfo['monthOrder'] += 1;

                $generalInfo['allOrder'] += 1;

                $generalInfo['totalSaleAmount'] += ($d->PriceWithDiscount * $d->Qty);
            }

            return $generalInfo;
        }

        if ($val === 'pagination') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID','c.Mobile as customerMobile', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID', 'pd.SampleNumber')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->orderby('pod.ID','DESC')
                ->paginate(10);

            return $data;
        }
    }

    public function amountTableLoad($val, $sellerID)
    {
        if ($val === 'all') {

            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Amount', 'sar.Date', 'sar.Time')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->where('sar.SellerID', $sellerID)
                ->get();

            $info = $this->saleTableLoad('all', $sellerID);
            $generalInfo = array(
                'totalSaleAmount' => $info['totalSaleAmount'],
                'totalReceivedAmount' => 0,
                'credit' => 0,
                'lastPaymentDate' => 0,
                'lastPaymentTime' => 0);

            $generalInfo['totalReceivedAmount'] = 0;
            foreach ($data as $key => $t) {
                $generalInfo['totalReceivedAmount'] += $t->Amount;
                $generalInfo['lastPaymentDate'] = $t->Date;
                $generalInfo['lastPaymentTime'] = $t->Time;
            }
            $generalInfo['credit'] = $generalInfo['totalSaleAmount'] - $generalInfo['totalReceivedAmount'];

            return $generalInfo;
        }

        if ($val === 'pagination') {
            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Date', 'sar.Time', 'sar.Amount', 'scc.CardNumber', 'scc.Status as cardStatus', 'sar.TransactionCode', 'sar.Detail')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->leftJoin('seller_credit_card as scc', function ($q) {
                    $q->on('scc.SellerID', '=', 's.ID')
                        ->where('scc.Status', '=', '1');
                })
                ->where('sar.SellerID', $sellerID)
                ->paginate(10);

            return $data;
        }
    }

    public function productDetail($id)
    {
        // Get Product Data Detail
        $dataDetail = DB::table('product_detail as pd')
            ->select('pd.*', 'pod.ID as orderDetailID', 'pod.OrderID')
            ->leftJoin('product_order_detail as pod', 'pod.ProductDetailID', '=', 'pd.ID')
            ->where('pd.ID', $id)
            ->first();

        // Get Product Data
        $ProductID = $dataDetail->ProductID;
        $data = DB::table('product')
            ->where('ID', $ProductID)
            ->first();

        // Get Product False State
        $falseProduct = DB::table('product_false')
            ->where('ProductDetailID', $id)
            ->first();

        return view('Administrator.Seller.ProductDetail', compact('data', 'dataDetail', 'falseProduct'));
    }

    public function productEdit(Request $request)
    {
        $id = $request->get('id');
        $idDetail = $request->get('idDetail');
        $gender = explode('-', $request->get('gender'));
        $color = explode('-', $request->get('color'));

        DB::table('product')
            ->where('ID', $id)
            ->update([
                'Name' => $request->get('name'),
                'Gender' => $gender[1],
                'GenderCode' => $gender[0],
                'Model' => $request->get('model'),
                'Brand' => $request->get('brand'),
                'Detail' => $request->get('detail'),
                'UnitPrice' => (int)$request->get('unitPrice'),
                'Discount' => (int)$request->get('discount'),
                'FinalPrice' => (int)$request->get('finalPrice'),
            ]);

        DB::table('product_detail')
            ->where('ID', $idDetail)
            ->update([
                'Size' => $request->get('size'),
                'Color' => $color[0],
                'ColorCode' => $color[1],
                'HexCode' => '--',
                'Qty' => $request->get('qty'),
            ]);

        return redirect()->route('adminProductDetail', $idDetail)->with('update', 'success');
    }

    public function productDelete($id, $sellerID)
    {
        DB::table('product_cart')
            ->where('ProductDetailID', $id)
            ->delete();

        DB::table('product_false')
            ->where('ProductDetailID', $id)
            ->delete();

        DB::table('customer_call_product_exist')
            ->where('ProductDetailID', $id)
            ->delete();

        DB::table('product_detail')
            ->where('ID', $id)
            ->delete();

        $deleteID = DB::table('product')
            ->select('ID')
            ->whereNotIn('ID', function ($q) {
                $q->select('ProductID')->from('product_detail');
            })->first();

        if (isset($deleteID->ID)) {
            $picPath = DB::table('product')
                ->select('PicPath')
                ->where('ID', $deleteID->ID)
                ->first();

            DB::table('product')
                ->where('ID', $deleteID->ID)
                ->delete();

            File::deleteDirectory(public_path($picPath->PicPath));
        }

        return redirect()->route('sellerControlPanel', ['id' => $sellerID, 'tab' => 'delete']);
    }

    public function productFalse($id, $sellerID)
    {
        DB::table('product_false')
            ->insert(['ProductDetailID' => $id]);

        return redirect()->route('sellerControlPanel', ['id' => $sellerID, 'tab' => 'false']);
    }

    public function creditCardActive($sellerID, $cardId)
    {
        DB::table('seller_credit_card')
            ->where('sellerID', $sellerID)
            ->where('ID', $cardId)
            ->update([
                'Status' => 1
            ]);

        DB::table('seller_credit_card')
            ->where('sellerID', $sellerID)
            ->where('ID', '!=', $cardId)
            ->update([
                'Status' => 0
            ]);

        return redirect()->route('sellerControlPanel', ['id' => $sellerID, 'tab' => 'cardActive']);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        DB::table('sellers')
            ->where('id', $id)
            ->update([
                'Name' => $request->get('name'),
                'Family' => $request->get('family'),
                'Email' => $request->get('email'),
                'NationalID' => $request->get('nationalId'),
                'Birthday' => $request->get('year') . '/' . $request->get('mon') . '/' . $request->get('day'),
                'Gender' => (int)$request->get('gender'),
                'Phone' => $request->get('prePhone') . $request->get('phone'),
                'Mobile' => $request->get('mobile'),
                'State' => $request->get('state'),
                'City' => $request->get('city'),
                'HomeAddress' => $request->get('homeAddress'),
                'HomePostalCode' => $request->get('homePostalCode'),
                'Address' => $request->get('workAddress'),
                'WorkPostalCode' => $request->get('workPostalCode'),
                'ShopNumber' => $request->get('shopNumber'),
                'PicPath' => $request->get('userImage'),
                'PicPathCard' => $request->get('nationalityCardImage'),
            ]);

        return redirect()->route('sellerControlPanel', ['id' => $id, 'tab' => 'userInfo']);
    }

    public function nationalIdSearch($nationalId)
    {
        $output = '';
        $data = DB::table('sellers')
            ->select('NationalID', 'id')
            ->where('NationalID', 'like', $nationalId . '%')
            ->take(1)
            ->get();

        foreach ($data as $key => $row) {
            $output .= '<li style="border-radius: 0 !important;"
                        class="list-group-item g-color-gray-dark-v3 g-letter-spacing-0 g-opacity-0_8--hover">
                            <a  href="' . route('sellerControlPanel', ['id' => $row->id, 'tab' => 'all']) . '"
                                style="text-decoration: none"
                                class="col-12 p-0 text-left g-color-gray-dark-v3 g-color-primary--hover">
                             ' . $row->NationalID . '
                            </a>
                        </li>';
        }

        return $output;
    }

    public function orderDetail($addressID, $id)
    {
//      Get Customer Data
        $dataDetail = DB::table('customer_address')
            ->where('ID', $addressID)
            ->first();

        // Get Product Data
        $data = DB::table('product_order_detail as pod')
            ->select('pod.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'po.Date', 'p.*', 'pf.ID as falseProduct','pdd.SampleNumber')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pdd', 'pdd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('product_false as pf', 'pf.ProductDetailID', '=', 'pod.ProductDetailID')
            ->where('pod.ID', $id)
            ->first();

        // Get Product False State
        $falseProduct = DB::table('product_false')
            ->where('ProductDetailID', $data->ProductDetailID)
            ->first();

        // Convert Date
        $d = $data->Date;
        $persianDate = $this->convertDateToPersian($d);

        return view('Administrator.Seller.OrderDetail', compact('data', 'falseProduct', 'persianDate', 'dataDetail'));
    }

    public function connectionDetail($id, $status)
    {
        $data = DB::table('seller_conversation_detail as scd')
            ->select('scd.*', 'sc.Subject', 'sc.Status', 'sc.ID as ConversationID', 'sc.SellerID', 's.Name', 's.Family')
            ->leftJoin('seller_conversation as sc', 'sc.ID', '=', 'scd.ConversationID')
            ->leftJoin('sellers as s', 's.ID', '=', 'sc.SellerID')
            ->where('scd.ConversationID', $id)
            ->paginate(10);

        $questionMinuets = array();
        $answerMinuets = array();
        $questionHowDay = array();
        $answerHowDay = array();
        foreach ($data as $key => $rec) {
            $d = $rec->QuestionDate;
            $qPersianDate[$key] = $this->convertDateToPersian($d);
            $d = $rec->AnswerDate;
            $aPersianDate[$key] = $this->convertDateToPersian($d);
            $questionMinuets[$key] = $this->dateLenToNow($rec->QuestionDate, $rec->QuestionTime);
            $answerMinuets[$key] = $this->dateLenToNow($rec->AnswerDate, $rec->AnswerTime);
            $questionHowDay[$key] = null;
            $answerHowDay[$key] = null;
            if (($questionMinuets[$key] < 11520) || ($answerMinuets[$key] < 11520)) {
                $questionHowDay[$key] = $this->howDays($questionMinuets[$key]);
                $answerHowDay[$key] = $this->howDays($answerMinuets[$key]);
            }
        }

        return view('Administrator.Seller.ConnectionDetail', compact('data', 'answerHowDay', 'questionHowDay', 'qPersianDate', 'aPersianDate'));
    }

    public function connectionNew(Request $request)
    {
        $title = $request->get('title');
        $priority = $request->get('priority');
        $section = $request->get('section');

        return view('Administrator.Seller.ConnectionDetail', compact('title', 'priority', 'section'));
    }

    public function connectionNewMsg(Request $request)
    {
        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $sellerID = $request->get('sellerId');
        $answer = $request->get('answer');
        $title = $request->get('title');
        $detailId = $request->get('detailId');

        if (isset($title)) {
            $priority = $request->get('priority');
            $section = $request->get('section');
            // Insert Data to Conversation
            DB::table('seller_conversation')->insert([
                [
                    'SellerID' => $sellerID,
                    'Subject' => $title,
                    'Section' => $section,
                    'priority' => $priority,
                    'Status' => 0,
                    'Date' => $date,
                    'Time' => $time,
                ],
            ]);

            $conversationID = DB::table('seller_conversation')
                ->select('ID')
                ->latest('ID')
                ->first();

            $conversationID = $conversationID->ID;
        } else {
            $conversationID = $request->get('conversationID');
        }

        DB::table('seller_conversation')
            ->where('ID', $conversationID)
            ->update(['Status' => 0]);

        // Insert Data to Conversation_detail
        DB::table('seller_conversation_detail')
            ->where('ID', $detailId)
            ->update([
                'Answer' => $answer,
                'AnswerDate' => $date,
                'AnswerTime' => $time,
                'Replay' => 1,
            ]);

        return redirect()->route('connectionDetail', ['id' => $conversationID, 'status' => '0']);
    }

    public function amountPay(Request $request)
    {
        $year=$request->get('year');
        $mon=$request->get('mon');
        $day=$request->get('day');
        $date=Verta::getGregorian($year, $mon, $day);
        $year=$date[0];
        $mon=$date[1];
        $day=$date[2];
        $sellerId = $request->get('sellerId');
        $transactionCode = $request->get('transactionCode');
        DB::table('seller_amount_received')
            ->insert([
                'SellerID' => $sellerId,
                'Amount' => $request->get('amount'),
                'TransactionCode' => $transactionCode,
                'Date' => $year.'-'.$mon.'-'.$day,
                'Time' => $request->get('hour').':'.$request->get('minute').':'.$request->get('second'),
                'Detail' => $request->get('detail'),
            ]);

        return redirect()->route('sellerControlPanel', ['id' => $sellerId, 'tab' => 'amountReceived']);
    }

// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------

    public function convertDateToPersian($d)
    {
        if ($d === 0)
            return 0;
        else
            $da = new DateTime($d);

        $day = $da->format('d');
        $mon = $da->format('m');
        $year = $da->format('Y');

        // Convert Date to Iranian
        return Verta::getJalali($year, $mon, $day);
    }

    public function dateLenToNow($date, $time)
    {
        $orderDateTime = $date . ' ' . $time;
        $today = new DateTime('Asia/Tehran');
        $result = $today->format('Y-m-d H:i:s');
        $datetime1 = strtotime($orderDateTime);
        $datetime2 = strtotime($result);
        $interval = abs($datetime2 - $datetime1);
        $minutes = round($interval / 60);

        return (int)$minutes;
    }

    public function howDays($day)
    {
        switch (true) {
            case  ($day < 55):
                return 'لحضاتی پیش';
                break;
            case  (($day > 55) && ($day < 65)):
                return 'یک ساعت پیش';
                break;
            case  (($day > 65) && ($day < 130)):
                return 'دو ساعت پیش';
                break;
            case  (($day > 130) && ($day < 1440)):
                return 'امروز';
                break;
            case  (($day > 1440) && ($day < 2880)):
                return 'یک روز پیش';
                break;
            case  (($day > 2880) && ($day < 4320)):
                return 'دو روز پیش';
                break;
            case  (($day > 4320) && ($day < 5760)):
                return 'سه روز پیش';
                break;
            case  (($day > 5760) && ($day < 7200)):
                return 'چهار روز پیش';
                break;
            case  (($day > 7200) && ($day < 8640)):
                return 'پنج روز پیش';
                break;
            case  (($day > 8640) && ($day < 10080)):
                return 'شش روز پیش';
                break;
            case  (($day > 10080) && ($day < 11520)):
                return 'یک هفته پیش';
                break;
            default :
                break;
        }
    }

    public function convertDateToGregorian($d)
    {
        return Verta::getGregorian($d->y, $d->m, $d->d);
    }

    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];

        return $d[0] . '-' . $d[1] . '-' . $d[2];
    }

    public function month($mon)
    {
        switch ($mon) {
            case 1:
                return 'فروردین';
            case 2:
                return 'اردیبهشت';
            case 3:
                return 'خرداد';
            case 4:
                return 'تیر';
            case 5:
                return 'مرداد';
            case 6:
                return 'شهریور';
            case 7:
                return 'مهر';
            case 8:
                return 'آبان';
            case 9:
                return 'آذر';
            case 10:
                return 'دی';
            case 11:
                return 'بهمن';
            case 12:
                return 'اسفند';
            default:
                return false;
        }

    }
}
