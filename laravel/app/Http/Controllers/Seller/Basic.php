<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;


class Basic extends Controller
{
    public function __construct()
    {
        $this->middleware('IsSeller');
    }

//  --------------------------------------------------Main Functions----------------------------------------------------
    protected $qtyStatus = array(
        'productIdChangeQty' => 0,
        'alarmChangeQty' => 0);

    public function sellerPanel()
    {
        return view('Seller.Panel');
    }
// ---------> Profile
//  Profile
    public function profile()
    {
        $sellerID = Auth::guard('seller')->user()->id;

        $data = DB::table('seller_credit_card')
            ->where('SellerID', $sellerID)
            ->get();

        $activeCard = '';
        foreach ($data as $rec) {
            if ($rec->Status === 1)
                $activeCard = $rec->CardNumber;
        }

        return view('Seller.Profile', compact('data', 'activeCard'));
    }

//  CreditCard
    public function CreditCard(Request $request)
    {
        $sellerID = Auth::guard('seller')->user()->id;
        $c1 = $request->get('creditCard1');
        $c2 = $request->get('creditCard2');
        $c3 = $request->get('creditCard3');
        $c4 = $request->get('creditCard4');

        $cardNumber = $c1 . '-' . $c2 . '-' . $c3 . '-' . $c4;

        // Insert Data to Credit Card
        DB::table('seller_credit_card')->insert([
            [
                'SellerID' => $sellerID,
                'CardNumber' => $cardNumber,
                'Status' => 0,
            ],
        ]);

        return redirect()->route('profile')->with('createStatus', 'success');
    }

//  Credit Card Active
    public function CreditCardActive($id)
    {
        $sellerID = Auth::guard('seller')->user()->id;
        DB::table('seller_credit_card')
            ->where('sellerID', $sellerID)
            ->where('ID', $id)
            ->update([
                'Status' => 1
            ]);

        DB::table('seller_credit_card')
            ->where('sellerID', $sellerID)
            ->where('ID', '!=', $id)
            ->update([
                'Status' => 0
            ]);

        return redirect()->route('profile')->with('cardActive', 'success');
    }

//    ---------> Store
//  General Store
    public function store()
    {
//      Set Default data
        $sellerID = Auth::guard('seller')->user()->id;

//      Get All Data From Store Table For Info Panel In Store Page
        $info = $this->storeTableLoad('', '', 'all', $sellerID);

//      Set Data For Info Panel In Store Page
        $sumFPrice = $info['sumFPrice'];
        $allQty = $info['allQty'];
        $female = $info['female'];
        $male = $info['male'];
        $girl = $info['girl'];
        $boy = $info['boy'];
        $babyGirl = $info['babyGirl'];
        $babyBoy = $info['babyBoy'];

//      Get Data From Store Table With Pagination
        $data = $this->storeTableLoad('', '', 'pagination', $sellerID);
        if ($this->qtyStatus['alarmChangeQty'] === 1) {
            $this->qtyStatus['alarmChangeQty'] = 0;
            $id = $this->qtyStatus['productIdChangeQty'];
            return redirect('/Seller-Store')->with('productId', $id);
        } else {
            return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male', 'girl','boy','babyGirl','babyBoy'));
        }
    }

//  Delete Product From Store
    public function deleteProduct($id)
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
        return redirect('/Seller-Store')->with('status', 'success');
    }

//  Insert False Data Report For Product
    public function falseProduct($id)
    {
        DB::table('product_false')
            ->insert(['ProductDetailID' => $id]);

        return redirect('/Seller-Store')->with('falseStatus', 'success');
    }

//  Change Product Price
    public function changePriceProduct($id,$unitPrice,$finalPrice)
    {
        DB::table('product')
            ->where('ID',$id)
            ->update([
                'UnitPrice'=>(int)$unitPrice,
                'FinalPrice'=>(int)$finalPrice
            ]);

        return redirect('/Seller-Store')->with('changePrice', 'success');
    }

    public function changeDiscountProduct($id,$discount,$finalPrice)
    {
        DB::table('product')
            ->where('ID',$id)
            ->update([
                'Discount'=>(int)$discount,
                'FinalPrice'=>(int)$finalPrice
            ]);

        return redirect('/Seller-Store')->with('changeDiscount', 'success');
    }
//  Product Detail
    public function productDetail($id)
    {

        // Get Product Data Detail
        $dataDetail = DB::table('product_detail as pd')
            ->select('pd.*', 'pod.ID as orderDetailID','pod.OrderID')
            ->leftJoin('product_order_detail as pod', 'pod.ProductDetailID', '=', 'pd.ID')
            ->where('pd.ID', $id)
            ->first();

        // Get Product Data
        $data = DB::table('product')
            ->where('ID', $dataDetail->ProductID)
            ->first();

        // Get Product False State
        $falseProduct = DB::table('product_false')
            ->where('ProductDetailID', $id)
            ->first();

        return view('Seller.ProductDetail', compact('data', 'dataDetail', 'falseProduct'));
    }

//  Add Qty
    public function addQty($id, $val)
    {
//        DB::table('product_detail')
//            ->where('ID', $id)
//            ->update([
//                'Qty' => DB::raw('Qty + ' . $val)
//            ]);
//
//        DB::table('customer_call_product_exist')
//            ->where('ProductDetailID', $id)
//            ->update([
//                'Status' => 'exist'
//            ]);

        $data=DB::table('product_detail as pd')
            ->select('pd.ID','pd.Size','pd.Color','p.Name','p.Brand')
            ->leftJoin('product as p','p.ID','=','pd.ProductID')
            ->where('pd.ID',$id)
            ->first();

        $existData = DB::table('customer_call_product_exist as cpe')
            ->select('cpe.ID as requestID','cpe.CustomerID','c.id','c.Mobile')
            ->leftJoin('customers as c','c.id','=','cpe.CustomerID')
            ->where('ProductDetailID', $id)
            ->get();

        //--------------
        foreach ($existData as $key => $row){
            try {
                $token = '10'.(string)$row->requestID;
                $token10=$data->Name.'('.$data->Brand.')';
                $token20='/'.$id.'/'.$data->Size.'/'.$data->Color;

                $api_key = Config::get('kavenegar.apikey');
                $var = new Kavenegar\KavenegarApi($api_key);
                $template = "productExist";
                $type = "sms";

                $result = $var->VerifyLookup($row->Mobile, $token, $token10, $token20, $template, $type);
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }
        }

        $this->qtyStatus['productIdChangeQty'] = $id;
        $this->qtyStatus['alarmChangeQty'] = 1;

        return $this->store();
    }
//    ---------> End Store

//    ---------> Sale
//  Sale
    public function sale()
    {
//      Set Default data
        $sellerID = Auth::guard('seller')->user()->id;

//      Get All Data From Sale Table For Info Panel In Sale Page
        $info = $this->saleTableLoad('', '', 'all', $sellerID);

//      Set Data For Info Panel In Sale Page
        $todayOrder = $info['todayOrder'];
        $monthOrder = $info['monthOrder'];
        $allOrder = $info['allOrder'];
        $totalSaleAmount = $info['totalSaleAmount'];

//      Get Data From Sale Table With Pagination
        $data = $this->saleTableLoad('', '', 'pagination', $sellerID);

//      Convert Date
        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Seller.Sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate'));
    }

//  Order Detail
    public function orderDetail($addressID, $id)
    {
        // Get Customer Data
//        $dataDetail = DB::table('customer_address')
//            ->where('ID', $addressID)
//            ->first();

        // Get Product Data
        $data = DB::table('product_order_detail as pod')
            ->select('pod.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'po.Date', 'po.Time', 'p.*', 'pf.ID as falseProduct','pd.SampleNumber')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
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

        return view('Seller.OrderDetail', compact('data', 'falseProduct', 'persianDate'));
    }
//    ---------> End Sale

//  Amount Received
    public function amountReceived()
    {
        $sellerID = Auth::guard('seller')->user()->id;

        $info = $this->amountTableLoad('', '', 'all', $sellerID);
        $totalSaleAmount = $info['totalSaleAmount'];
        $totalReceivedAmount = $info['totalReceivedAmount'];
        $credit = $info['credit'];
        $lastPaymentDate = $this->convertDateToPersian($info['lastPaymentDate']);
        $lastPaymentTime = $info['lastPaymentTime'];

        $data = $this->amountTableLoad('', '', 'pagination', $sellerID);

        // Convert Date
        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Seller.AmountReceived', compact('data', 'totalSaleAmount', 'totalReceivedAmount', 'credit', 'persianDate', 'lastPaymentDate', 'lastPaymentTime'));
    }

//  Customer Comment
    public function customerComment()
    {
        $sellerID = Auth::guard('seller')->user()->id;

        $info = $this->commentTableLoad('', '', 'all', $sellerID);
        $totalComment = $info['totalComment'];
        $totalLike = $info['totalLike'];
        $female = $info['female'];
        $male = $info['male'];
        $girl = $info['girl'];
        $boy = $info['boy'];
        $babyGirl = $info['babyGirl'];
        $babyBoy = $info['babyBoy'];
        $avgRating = $info['avgRating'];

        $data = $this->commentTableLoad('', '', 'pagination', $sellerID);

        return view('Seller.CustomerComment', compact('data', 'totalComment', 'totalLike', 'female', 'male', 'girl','boy','babyGirl','babyBoy', 'avgRating'));
    }

//  Product Delivery
    public function productDelivery()
    {
        $sellerID = Auth::guard('seller')->user()->id;

//        $data = DB::table('product_order_detail as pod')
//            ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath')
//            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
//            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
//            ->where('pod.SellerID', $sellerID)
//            ->where('po.DeliveryStatus', 0)
//            ->get();

        $data = DB::table('product_delivery as pd')
            ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath','pd.*','p.Brand')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('p.SellerID', $sellerID)
            ->where('pd.DeliveryStatus', '0')
            ->get();


        $today = date('Y-m-d');
        $persianDate = array();
        $deliveryStatus = array();
        foreach ($data as $key => $row) {
            $rowDate = strtotime($row->Date . ' ' . $row->Time);
            $orderDate = date('Y-m-d', $rowDate);
            $reservation = date('Y-m-d', strtotime($row->Date . ' + 1 days'));

            if (($orderDate < $today))
                $deliveryStatus[$key] = $this->dateLenToNow($reservation, '08:00:00'); // get len past date to now by min
            else
                $deliveryStatus[$key] = 0; // get len past date to now by min

            $d = $row->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Seller.Delivery', compact('data', 'persianDate', 'deliveryStatus'));
    }

//  Admin Connection
    public function adminConnection()
    {
        $data = DB::table('seller_conversation as sc')
            ->select('sc.*',
                'scd.QuestionDate as qDate',
                'scd.QuestionTime as qTime',
                'scd.AnswerDate as aDate',
                'scd.AnswerTime as aTime',
                'scd.Replay',
                'scd.ConversationID',
                'scd.ID as conversationDetailID')
            ->leftJoin('seller_conversation_detail as scd', 'scd.ConversationID', '=', 'sc.ID')
            ->where('sc.SellerID', Auth::guard('seller')->user()->id)
            ->orderBy('sc.Status')
            ->orderBy(DB::raw('IF(sc.Status=0 || sc.Status=1, sc.Priority, false)'), 'ASC')
            ->orderBy('sc.ID', 'DESC')
            ->get();

        // Convert Date
        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Seller.AdminConnection', compact('data', 'persianDate'));

    }

//  Admin Connection Detail
    public function adminConnectionDetail($id, $status)
    {
        $data = DB::table('seller_conversation_detail as scd')
            ->select('scd.*', 'sc.Subject', 'sc.Status', 'sc.ID as ConversationID', 'sc.SellerID', 's.Name', 's.Family')
            ->leftJoin('seller_conversation as sc', 'sc.ID', '=', 'scd.ConversationID')
            ->leftJoin('sellers as s', 's.ID', '=', 'sc.SellerID')
            ->where('scd.ConversationID', $id)
            ->paginate(10);

        if ($status === '0') {
            foreach ($data as $key => $rec)
                if ($rec->Replay !== 0) {
                    DB::table('seller_conversation')
                        ->where('ID', $id)
                        ->update(['Status' => 2]);
                } else {
                    DB::table('seller_conversation')
                        ->where('ID', $id)
                        ->update(['Status' => 2]);
                }
        }

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

        return view('Seller.AdminConnectionDetail', compact('data', 'answerHowDay', 'questionHowDay', 'qPersianDate', 'aPersianDate'));
    }

//  Admin Connection New
    public function adminConnectionNew(Request $request)
    {
        $title = $request->get('title');
        $priority = $request->get('priority');
        $section = $request->get('section');

        return view('Seller.AdminConnectionDetail', compact('title', 'priority', 'section'));
    }

//  Admin Connection New
    public function adminConnectionNewMsg(Request $request)
    {

        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $sellerID = Auth::guard('seller')->user()->id;
        $question = $request->get('question');
        $title = $request->get('title');

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
                    'Status' => 1,
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
            ->update(['Status' => 1]);

        // Insert Data to Conversation_detail
        DB::table('seller_conversation_detail')->insert([
            [
                'ConversationID' => $conversationID,
                'Question' => $question,
                'Answer' => '',
                'QuestionDate' => $date,
                'QuestionTime' => $time,
                'Replay' => 0,
            ],
        ]);

        return redirect('/Seller-AdminConnection')->with('status', 'success');
    }

//  --------------------------------------------------Ajax Functions--------------------------------------------------

//  AJAX Live Search
    public function liveSearch(Request $request)
    {
        $data = 0;

        if ($request->ajax()) {
            $name = $request->get('pname');
            $id = $request->get('id');

            if ($id == 'storeName') {
                $data = DB::table('product')
                    ->where('Name', 'like', $name . '%')
                    ->groupby('Name')
                    ->get();
            } elseif ($id == 'saleName') {
                $data = DB::table('product_order_detail as pod')
                    ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                    ->where('Name', 'like', '%' . $name . '%')
                    ->groupby('Name')
                    ->get();
            } elseif ($id == 'amountCode') {
                $data = DB::table('seller_amount_received')
                    ->where('TransactionCode', 'like', '%' . $name . '%')
                    ->groupby('TransactionCode')
                    ->get();
            }
            $output = '';

            if (count($data) > 0) {
                if (($id === 'storeName') || ($id === 'saleName')) {
                    foreach ($data as $row) {
                        $output .= '<li class="list-group-item">' . $row->Name . '</li>';
                    }
                    $output .= '</ul>';
                } else {
                    foreach ($data as $row) {
                        $output .= '<li class="list-group-item">' . $row->TransactionCode . '</li>';
                    }
                    $output .= '</ul>';
                }
            } else
                $output .= '<li class="list-group-item">' . 'یافت نشد.' . '</li>';


            return $output;
        }
        return 0;
    }

//  AJAX Search Results Name-Gender-Status-Code Filter
    public function search_N_G_S_C_R($id, $val)
    {
//      Set Default data
        $sellerID = Auth::guard('seller')->user()->id;
        $persianDate = array();

//      Get all data for Store Filter
        if (($id === 'storeName') || ('storeGender') || ('storeInfoStatus')) {
            $info = $this->storeTableLoad('', '', 'all', $sellerID);
            $sumFPrice = $info['sumFPrice'];
            $allQty = $info['allQty'];
            $female = $info['female'];
            $male = $info['male'];
            $girl = $info['girl'];
            $boy = $info['boy'];
            $babyGirl = $info['babyGirl'];
            $babyBoy = $info['babyBoy'];
            $avgRating = $info['avgRating'];
        }

//      Get all data for sale Filter
        if (($id === 'saleName') || ('saleGender') || ('saleInfoStatus')) {
            $info = $this->saleTableLoad('', '', 'all', $sellerID);
            $todayOrder = $info['todayOrder'];
            $monthOrder = $info['monthOrder'];
            $allOrder = $info['allOrder'];
            $totalSaleAmount = $info['totalSaleAmount'];
        }

//      Get all data for Amount Filter
        if ($id === 'amountCode') {
            $info = $this->amountTableLoad('', '', 'all', $sellerID);
            $totalSaleAmount = $info['totalSaleAmount'];
            $totalReceivedAmount = $info['totalReceivedAmount'];
            $credit = $info['credit'];
            $lastPaymentDate = $info['lastPaymentDate'];
            $lastPaymentTime = $info['lastPaymentTime'];
        }

//      Get all data for customerComment Filter
        if ($id === 'customerComment') {
            $info = $this->commentTableLoad('', '', 'all', $sellerID);
            $totalComment = $info['totalComment'];
            $totalLike = $info['totalLike'];
            $female = $info['female'];
            $male = $info['male'];
            $girl = $info['girl'];
            $boy = $info['boy'];
            $babyGirl = $info['babyGirl'];
            $babyBoy = $info['babyBoy'];
            $avgRating = $info['avgRating'];
        }

        //      Search Name-Gender-Status-Code
        switch ($id) {

//----------Store -> Filters
            case 'storeName':
                $data = $this->storeTableLoad('Name', '', $val, $sellerID);
                $valName = $val;

                return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male' ,'girl','boy','babyGirl','babyBoy', 'valName'));

            case 'storeGender':
                $data = $this->storeTableLoad('GenderCode', '', $val, $sellerID);

                return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male', 'girl','boy','babyGirl','babyBoy', 'val'));

            case 'storeInfoStatus':

                if ($val == 'false') {

                    $data = $this->storeTableLoad('', 'In', $val, $sellerID);
                    $valStatus = 'مشخصات اشتباه';

                    return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male', 'girl','boy','babyGirl','babyBoy', 'valStatus'));

                } elseif ($val == 'true') {

                    $data = $this->storeTableLoad('', 'NotIn', $val, $sellerID);
                    $valStatus = 'مشخصات صحیح';

                    return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male', 'girl','boy','babyGirl','babyBoy', 'valStatus'));
                }
                break;

//----------Sale -> Filters
            case 'saleName':
                $data = $this->saleTableLoad('p.Name', '', $val, $sellerID);
                $valName = $val;

                // Convert Date
                foreach ($data as $key => $rec) {
                    $d = $rec->Date;
                    $persianDate[$key] = $this->convertDateToPersian($d);
                }

                return view('Seller.sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'valName'));

            case 'saleGender':
                $data = $this->saleTableLoad('p.GenderCode', '', $val, $sellerID);

                // Convert Date
                foreach ($data as $key => $rec) {
                    $d = $rec->Date;
                    $persianDate[$key] = $this->convertDateToPersian($d);
                }

                return view('Seller.sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'val'));

            case 'saleInfoStatus':

                if ($val == 'false') {

                    $data = $this->saleTableLoad('', 'In', $val, $sellerID);
                    $valStatus = 'مشخصات اشتباه';

                    // Convert Date
                    foreach ($data as $key => $rec) {
                        $d = $rec->Date;
                        $persianDate[$key] = $this->convertDateToPersian($d);
                    }

                    return view('Seller.sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'valStatus'));
                } elseif ($val == 'true') {

                    $data = $this->saleTableLoad('', 'NotIn', $val, $sellerID);
                    $valStatus = 'مشخصات صحیح';

                    // Convert Date
                    foreach ($data as $key => $rec) {
                        $d = $rec->Date;
                        $persianDate[$key] = $this->convertDateToPersian($d);
                    }

                    return view('Seller.sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'valStatus'));
                }
                break;

//----------AmountReceived -> Filters
            case 'amountCode':
                $data = $this->amountTableLoad('sar.TransactionCode', '', $val, $sellerID);
                $valCode = 'فاکتور ' . $val;

                // Convert Date
                foreach ($data as $key => $rec) {
                    $d = $rec->Date;
                    $persianDate[$key] = $this->convertDateToPersian($d);
                }

                return view('Seller.AmountReceived', compact('data', 'totalSaleAmount', 'totalReceivedAmount', 'credit', 'persianDate', 'valCode', 'lastPaymentDate', 'lastPaymentTime'));

            case 'customerComment':

                $data = $this->commentTableLoad('Rating', '', $val, $sellerID);
                $valRate = $val;

                return view('Seller.CustomerComment', compact('data', 'totalComment', 'totalLike', 'female', 'male',  'girl','boy','babyGirl','babyBoy', 'avgRating', 'valRate'));

            default:
                break;
        }

        return 0;
    }

//  AJAX Search Results Price Filter
    public function searchPrice($id, $valMin, $valMax)
    {
//      Set Default data
        $sellerID = Auth::guard('seller')->user()->id;
        $persianDate = array();

//      Check Which Filter
        switch ($id) {
//----------Store -> Price Filter
            case 'store':
                $info = $this->storeTableLoad('', '', 'all', $sellerID);

                $sumFPrice = $info['sumFPrice'];
                $allQty = $info['allQty'];
                $female = $info['female'];
                $male = $info['male'];
                $girl = $info['girl'];
                $boy = $info['boy'];
                $babyGirl = $info['babyGirl'];
                $babyBoy = $info['babyBoy'];

                $data = $this->storeTableLoad($valMin, 'whereBetween', $valMax, $sellerID);

                if ($valMax == 100000000)
                    $valPrice = 'از ' . number_format($valMin) . ' تا بیشترین مبلغ';
                else
                    $valPrice = 'از ' . number_format($valMin) . ' تا ' . number_format($valMax) . ' تومان';

                return view('Seller.Store', compact('data', 'sumFPrice', 'allQty', 'female', 'male',   'girl','boy','babyGirl','babyBoy', 'valPrice', 'valMin', 'valMax'));

//----------Sale -> Price Filter
            case 'sale':
                $info = $this->saleTableLoad('', '', 'all', $sellerID);
                $todayOrder = $info['todayOrder'];
                $monthOrder = $info['monthOrder'];
                $allOrder = $info['allOrder'];
                $totalSaleAmount = $info['totalSaleAmount'];

                $data = $this->saleTableLoad($valMin, 'whereRaw', $valMax, $sellerID);

                if ($valMax == 100000000)
                    $valPrice = 'از ' . number_format($valMin) . ' تا بیشترین مبلغ';
                else
                    $valPrice = 'از ' . number_format($valMin) . ' تا ' . number_format($valMax) . ' تومان';

                // Convert Date
                foreach ($data as $key => $rec) {
                    $d = $rec->Date;
                    $persianDate[$key] = $this->convertDateToPersian($d);
                }

                return view('Seller.Sale', compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'valPrice', 'valMin', 'valMax'));

//----------AmountReceived -> Price Filter
            case 'amount':
                $info = $this->amountTableLoad('', '', 'all', $sellerID);
                $totalSaleAmount = $info['totalSaleAmount'];
                $totalReceivedAmount = $info['totalReceivedAmount'];
                $credit = $info['credit'];
                $lastPaymentDate = $info['lastPaymentDate'];
                $lastPaymentTime = $info['lastPaymentTime'];

                $data = $this->amountTableLoad($valMin, 'whereBetweenPrice', $valMax, $sellerID);

                if ($valMax == 1000000000)
                    $valPrice = 'از ' . number_format($valMin) . ' تا بیشترین مبلغ';
                else
                    $valPrice = 'از ' . number_format($valMin) . ' تا ' . number_format($valMax) . ' تومان';

                // Convert Date
                $persianDate = array();
                foreach ($data as $key => $rec) {
                    $d = $rec->Date;
                    $persianDate[$key] = $this->convertDateToPersian($d);
                }

                return view('Seller.AmountReceived',
                    compact('data', 'totalSaleAmount', 'totalReceivedAmount', 'credit', 'persianDate', 'valPrice', 'valMin', 'valMax', 'lastPaymentDate', 'lastPaymentTime'));

            default:
                break;
        }

        return 0;
    }

//  AJAX Search Results Date Filter
    public function searchDate($id, $startDate, $endDate)
    {
        $sellerID = Auth::guard('seller')->user()->id;
        $persianDate = array();

        $a = json_decode($startDate);
        $b = json_decode($endDate);

        $filterDate = 'از ' . $a->y . '/' . $a->m . '/' . $a->d . ' تا ' . $b->y . '/' . $b->m . '/' . $b->d;

        $sDate = $this->convertDateToGregorian($a);
        $eDate = $this->convertDateToGregorian($b);

        $sDate = $this->addZero($sDate);
        $eDate = $this->addZero($eDate);

        if ($id === 'sale') {
            $info = $this->saleTableLoad('', '', 'all', $sellerID);
            $todayOrder = $info['todayOrder'];
            $monthOrder = $info['monthOrder'];
            $allOrder = $info['allOrder'];
            $totalSaleAmount = $info['totalSaleAmount'];

            $data = $this->saleTableLoad($sDate, 'whereBetween', $eDate, $sellerID);

            // Convert Date
            foreach ($data as $key => $rec) {
                $d = $rec->Date;
                $persianDate[$key] = $this->convertDateToPersian($d);
            }

            return view('Seller.Sale',
                compact('data', 'todayOrder', 'monthOrder', 'allOrder', 'totalSaleAmount', 'persianDate', 'filterDate', 'a', 'b'));

        } elseif ($id === 'amountReceived') {
            $info = $this->amountTableLoad('', '', 'all', $sellerID);
            $totalSaleAmount = $info['totalSaleAmount'];
            $totalReceivedAmount = $info['totalReceivedAmount'];
            $credit = $info['credit'];
            $lastPaymentDate = $info['lastPaymentDate'];
            $lastPaymentTime = $info['lastPaymentTime'];

            $data = $this->amountTableLoad($sDate, 'whereBetweenDate', $eDate, $sellerID);

            // Convert Date
            foreach ($data as $key => $rec) {
                $d = $rec->Date;
                $persianDate[$key] = $this->convertDateToPersian($d);
            }

            return view('Seller.AmountReceived',
                compact('data', 'totalSaleAmount', 'totalReceivedAmount', 'credit', 'persianDate', 'filterDate', 'a', 'b', 'lastPaymentDate', 'lastPaymentTime'));

        }
        return 0;
    }

//  --------------------------------------------------Get Data Functions------------------------------------------------

//  Store Data Load Whit Conditions
    public function storeTableLoad($where, $where2, $val, $sellerID)
    {
        $data = '';
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
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->leftJoin('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID')
                ->where('p.SellerID', $sellerID)
                ->groupBy('pd.ID')
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
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->groupBy('pd.ID')
                ->paginate(10);
            return $data;
        }

        if ($where2 === '') {
            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->where($where, $val)
                ->paginate(10);

        } elseif ($where2 === 'In') {
            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->whereIn('pd.ID', function ($q) {
                    $q->select('ProductDetailID')->from('product_false');
                })
                ->paginate(10);

        } elseif ($where2 === 'NotIn') {
            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->whereNotIn('pd.ID', function ($q) {
                    $q->select('ProductDetailID')->from('product_false');
                })
                ->paginate(10);
        } elseif ($where2 === 'whereBetween') {
            $data = DB::table('product as p')
                ->select('p.*', 'pod.ID as orderID', 'fp.ID as fpID', 'pd.ID as pDetailID', 'pd.Qty', 'pd.Size', 'pd.Color','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
                ->join('product_order_detail as pod', 'pd.ID', '=', 'pod.ProductDetailID', 'left outer')
                ->join('product_false as fp', 'pd.ID', '=', 'fp.ProductDetailID', 'left outer')
                ->where('p.SellerID', $sellerID)
                ->whereBetween('UnitPrice', [$where, $val]) // بخاطر حذف پارامترهای اضافی، کمترین مبلغ و بیشترین مبلغ را در این دو متغییر گنجانده ایم.
                ->paginate(10);
        }

        return $data;
    }

//  Sale Data Load Whit Conditions
    public function saleTableLoad($where, $where2, $val, $sellerID)
    {
        $data = 0;

        if ($val === 'all') {

            $generalInfo = array(
                'todayOrder' => 0,
                'monthOrder' => 0,
                'allOrder' => 0,
                'totalSaleAmount' => 0);

            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber')
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

                $generalInfo['totalSaleAmount'] += ($d->FinalPrice * $d->Qty);
            }

            return $generalInfo;
        }

        if ($val === 'pagination') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->paginate(10);

            return $data;
        }

        if ($where2 === '') {

            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->where($where, $val)
                ->paginate(10);

        } elseif ($where2 === 'In') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->whereIn('pd.ID', function ($q) {
                    $q->select('ProductDetailID')->from('product_false');
                })
                ->paginate(10);

        } elseif ($where2 === 'NotIn') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->whereNotIn('pd.ID', function ($q) {
                    $q->select('ProductDetailID')->from('product_false');
                })
                ->paginate(10);
        } elseif ($where2 === 'whereRaw') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->whereRaw('(p.FinalPrice * pod.Qty) BETWEEN ? AND ?', [$where, $val]) // بخاطر حذف پارامترهای اضافی، کمترین مبلغ و بیشترین مبلغ را در این دو متغییر گنجانده ایم.
                ->paginate(10);
        } elseif ($where2 === 'whereBetween') {
            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.SampleNumber','p.Brand')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('pod.SellerID', $sellerID)
                ->whereBetween('Date', [$where, $val]) // بخاطر حذف پارامترهای اضافی، شروع تاریخ و پایان تاریخ را در این دو متغییر گنجانده ایم.
                ->paginate(10);
        }

        return $data;
    }

//  AmountReceived Data Load Whit Conditions
    public function amountTableLoad($where, $where2, $val, $sellerID)
    {
        $data = '';

        if ($val === 'all') {

            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Amount', 'sar.Date', 'sar.Time')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->where('sar.SellerID', $sellerID)
                ->get();

            $info = $this->saleTableLoad('', '', 'all', $sellerID);
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

        if ($where2 === '') {
            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Date', 'sar.Time', 'sar.Amount', 'scc.CardNumber', 'scc.Status as cardStatus', 'sar.TransactionCode', 'sar.Detail')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->leftJoin('seller_credit_card as scc', function ($q) {
                    $q->on('scc.SellerID', '=', 's.ID')
                        ->where('scc.Status', '=', '1');
                })
                ->where('sar.SellerID', $sellerID)
                ->where($where, $val)
                ->paginate(10);

        } elseif ($where2 === 'whereBetweenDate') {
            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Date', 'sar.Time', 'sar.Amount', 'scc.CardNumber', 'scc.Status as cardStatus', 'sar.TransactionCode', 'sar.Detail')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->leftJoin('seller_credit_card as scc', function ($q) {
                    $q->on('scc.SellerID', '=', 's.ID')
                        ->where('scc.Status', '=', '1');
                })
                ->where('sar.SellerID', $sellerID)
                ->whereBetween('sar.Date', [$where, $val]) // بخاطر حذف پارامترهای اضافی، شروع تاریخ و پایان تاریخ را در این دو متغییر گنجانده ایم.
                ->paginate(10);

        } elseif ($where2 === 'whereBetweenPrice') {
            $data = DB::table('seller_amount_received as sar')
                ->select('sar.Date', 'sar.Time', 'sar.Amount', 'scc.CardNumber', 'scc.Status as cardStatus', 'sar.TransactionCode', 'sar.Detail')
                ->leftjoin('sellers as s', 's.ID', '=', 'sar.SellerID')
                ->leftJoin('seller_credit_card as scc', function ($q) {
                    $q->on('scc.SellerID', '=', 's.ID')
                        ->where('scc.Status', '=', '1');
                })
                ->where('sar.SellerID', $sellerID)
                ->whereBetween('sar.Amount', [$where, $val]) // بخاطر حذف پارامترهای اضافی، شروع تاریخ و پایان تاریخ را در این دو متغییر گنجانده ایم.
                ->paginate(10);
        }

        return $data;
    }

//  CustomerComment Data Load Whit Conditions
    public function commentTableLoad($where, $where2, $val, $sellerID)
    {
        if ($val === 'all') {

            $data = DB::table('customer_vote as cv')
                ->select('cv.*', 'p.Name as productName', 'p.PicPath', 'p.Gender', 'c.name', 'c.Family','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pd.ProductID')
                ->leftjoin('customers as c', 'c.ID', '=', 'cv.CustomerID')
                ->where('p.SellerID', $sellerID)
                ->get();
            $generalInfo = array(
                'totalComment' => 0,
                'totalLike' => 0,
                'female' => '0',
                'male' => '0',
                'girl' => '0',
                'boy' => '0',
                'babyGirl' => '0',
                'babyBoy' => '0',
                'avgRating' => '0');

            $allRate = 0;
            $allRateCount = 0;

            foreach ($data as $row) {
                $generalInfo['totalComment'] += 1;
                if ($row->Like === 1) $generalInfo['totalLike'] += 1;
                switch ($row->Gender) {
                    case 'زنانه':
                        $generalInfo['female'] += 1;
                        break;
                    case 'مردانه':
                        $generalInfo['male'] += 1;
                        break;
                    case 'دخترانه':
                        $generalInfo['girl'] += 1;
                        break;
                    case 'پسرانه':
                        $generalInfo['boy'] += 1;
                        break;
                    case 'نوزادی دخترانه':
                        $generalInfo['babyGirl'] += 1;
                        break;
                    default:
                        $generalInfo['babyBoy'] += 1;
                }
                if (isset($row->Rating)) {
                    $allRateCount += 1;
                    $allRate += $row->Rating;
                }
            }

            if ($allRateCount === 0)
                $generalInfo['avgRating'] = 0;
            else
                $generalInfo['avgRating'] = $allRate / $allRateCount;


            return $generalInfo;
        }

        if ($val === 'pagination') {
            $data = DB::table('customer_vote as cv')
                ->select('cv.*', 'p.Name as productName', 'p.PicPath', 'p.Gender', 'c.name', 'c.Family','pd.SampleNumber')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pd.ProductID')
                ->leftjoin('customers as c', 'c.ID', '=', 'cv.CustomerID')
                ->where('p.SellerID', $sellerID)
                ->paginate(10);

            return $data;
        }

        if ($where2 === '') {
            if ($val === 'بدون') {
                $data = DB::table('customer_vote as cv')
                    ->select('cv.*', 'p.Name as productName', 'p.PicPath', 'p.Gender', 'c.name', 'c.Family','pd.SampleNumber')
                    ->leftjoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                    ->leftjoin('product as p', 'p.ID', '=', 'pd.ProductID')
                    ->leftjoin('customers as c', 'c.ID', '=', 'cv.CustomerID')
                    ->whereNull($where)
                    ->where('p.SellerID', $sellerID)
                    ->paginate(10);

            } else {
                $data = DB::table('customer_vote as cv')
                    ->select('cv.*', 'p.Name as productName', 'p.PicPath', 'p.Gender', 'c.Name', 'c.Family','pd.SampleNumber')
                    ->leftjoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                    ->leftjoin('product as p', 'p.ID', '=', 'pd.ProductID')
                    ->leftjoin('customers as c', 'c.ID', '=', 'cv.CustomerID')
                    ->where($where, $val)
                    ->where('p.SellerID', $sellerID)
                    ->paginate(10);
            }
            return $data;
        }

        return 0;
    }

//  --------------------------------------------------Utility Functions-------------------------------------------------

//  Convert Date to Iranian Calender
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

//  Convert Date to Gregorian Calender
    public function convertDateToGregorian($d)
    {
        return Verta::getGregorian($d->y, $d->m, $d->d);
    }

// Add Zero Number to Day and Month of Converted Dates
    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];

        return $d[0] . '-' . $d[1] . '-' . $d[2];
    }

//  Minutes Passed of Spacial Time
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

//    how past Days of Current Days
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
                return 'یک هفته قبل';
                break;
            default :
                break;
        }
    }
}
