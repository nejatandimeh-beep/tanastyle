<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Customer extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function customer()
    {
        $data = DB::table('customers as c')
            ->select('*','pf.ID as pfID')
            ->leftJoin('product_order as po', 'po.CustomerID', '=', 'c.ID')
            ->leftJoin('product_order_detail as pod', 'pod.OrderId', '=', 'po.ID')
            ->leftJoin('product_delivery as pd' , 'pd.OrderDetailID','=','pod.ID')
            ->leftJoin('product_false as pf' , 'pf.ProductDetailID','=','pod.ProductDetailID')
            ->get();

        $newSupport=DB::table('customer_conversation')
            ->select('CustomerID','Status')
            ->where('Status','1')
            ->get()
            ->count();

        $deliveryStatus = array();
        foreach ($data as $key => $rec) {
            $deliveryStatus[$key] = $this->dateLenToNow($data[$key]->Date, $data[$key]->Time);
        }

        return view('Administrator.Customer.Customer',compact('data','deliveryStatus','newSupport'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        DB::table('customers')
            ->where('id', $id)
            ->update([
                'Name' => $request->get('name'),
                'Family' => $request->get('family'),
                'Email' => $request->get('email'),
                'NationalID' => $request->get('nationalId'),
                'BirthdayY' => $request->get('year'),
                'BirthdayM' =>  $request->get('mon'),
                'BirthdayD' =>  $request->get('day'),
                'Gender' => (int)$request->get('gender'),
                'Phone' =>$request->get('phone'),
                'PrePhone' => $request->get('prePhone'),
                'Mobile' => $request->get('mobile'),
                'State' => $request->get('state'),
                'City' => $request->get('city'),
                'PicPath' => $request->get('userImage'),
            ]);

        return redirect()->route('customerControlPanel', ['id' => $id, 'tab' => 'userInfo']);
    }

    public function addressUpdate(Request $request)
    {
        $id = $request->get('receiver-id');
        $name = $request->get('receiver-name');
        $family = $request->get('receiver-family');
        $postalCode = $request->get('receiver-postalCode');
        $prePhone = $request->get('receiver-prePhone');
        $phone = $request->get('receiver-phone');
        $mobile = $request->get('receiver-mobile');
        $state = $request->get('receiver-state');
        $city = $request->get('receiver-city');
        $address = $request->get('receiver-address');

        DB::table('customer_address')
            ->where('ID', $id)
            ->update([
                'ReceiverName' => $name,
                'ReceiverFamily' => $family,
                'PostalCode' => $postalCode,
                'PrePhone' => $prePhone,
                'Phone' => $phone,
                'Mobile' => $mobile,
                'State' => $state,
                'City' => $city,
                'Address' => $address,
            ]);
        return redirect()->route('customerControlPanel', ['id' => $request->get('id'), 'tab' => 'address']);
    }

    public function addAddress(Request $request)
    {
        $id=$request->get('id');
        $name = $request->get('receiver-name');
        $family = $request->get('receiver-family');
        $postalCode = $request->get('receiver-postalCode');
        $prePhone = $request->get('receiver-prePhone');
        $phone = $request->get('receiver-phone');
        $mobile = $request->get('receiver-mobile');
        $state = $request->get('receiver-state');
        $city = $request->get('receiver-city');
        $address = $request->get('receiver-address');

        DB::table('customer_address')
            ->where('CustomerID', $id)
            ->update([
                'Status' => 0,
            ]);

        DB::table('customer_address')->insert([
            'CustomerID' =>$id,
            'ReceiverName' => $name,
            'ReceiverFamily' => $family,
            'PostalCode' => $postalCode,
            'PrePhone' => $prePhone,
            'Phone' => $phone,
            'Mobile' => $mobile,
            'State' => $state,
            'City' => $city,
            'Address' => $address,
            'Status' => 1,
        ]);

        return redirect()->route('customerControlPanel', ['id' => $id, 'tab' => 'address']);
    }

    public function addressDelete($id)
    {
        DB::table('customer_address')
            ->select('ID')
            ->where('ID', $id)
            ->delete();
    }

    public function controlPanel($id, $tab)
    {
        $customerInfo = DB::table('customers')
            ->select('*')
            ->where('id', $id)
            ->first();

        $address = DB::table('customer_address')
            ->select('*')
            ->where('CustomerID', $id)
            ->orderBy('Status', 'DESC')
            ->get();

        $saleSum = $this->saleTableLoad( 'all', $id);
        $saleTable = $this->saleTableLoad('pagination', $id);

        $delivery = DB::table('product_delivery as pd')
            ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath','pd.*')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', $id)
            ->get();

        $support = DB::table('customer_conversation as cc')
            ->select('cc.*',
                'ccd.QuestionDate as qDate',
                'ccd.QuestionTime as qTime',
                'ccd.AnswerDate as aDate',
                'ccd.AnswerTime as aTime',
                'ccd.Replay',
                'ccd.ConversationID',
                'ccd.ID as conversationDetailID')
            ->leftJoin('customer_conversation_detail as ccd', 'ccd.ConversationID', '=', 'cc.ID')
            ->where('cc.CustomerID',$id)
            ->orderBy('cc.Status')
            ->orderBy(DB::raw('IF(cc.Status=0 || cc.Status=1, cc.Priority, false)'), 'ASC')
            ->orderBy('cc.ID', 'DESC')
            ->get();

        $newSupport=DB::table('customer_conversation')
            ->select('CustomerID','Status')
            ->where('CustomerID',$id)
            ->where('Status','1')
            ->get()
            ->count();

        $persianDate = array();
        $pf='';
        foreach ($saleTable as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
            if(isset($rec->fpID))
                $pf='error';
        }

        $deliverPersianDate = array();
        $deliveryStatus = array();
        foreach ($delivery as $key => $rec) {
            $d = $rec->Date;
            $deliverPersianDate[$key] = $this->convertDateToPersian($d);
            $deliveryStatus[$key] = $this->dateLenToNow($delivery[$key]->Date, $delivery[$key]->Time);
        }

        $supportPersianDate = array();
        foreach ($support as $key => $rec) {
            $d = $rec->Date;
            $supportPersianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Administrator.Customer.ControlPanel', compact('customerInfo', 'address',
            'tab','persianDate','saleSum','saleTable','delivery','deliverPersianDate',
            'deliveryStatus','delivery','support','supportPersianDate','newSupport','pf'));
    }

    public function saleTableLoad($val, $customerId)
    {
        if ($val === 'all') {

            $generalInfo = array(
                'todayOrder' => 0,
                'monthOrder' => 0,
                'allOrder' => 0,
                'totalSaleAmount' => 0);

            $data = DB::table('product_order_detail as pod')
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.PicNumber')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('po.CustomerID', $customerId)
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
                ->select('pod.*', 'po.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'c.ID as customerID', 'p.Gender as Gender', 'p.Name as Name', 'p.FinalPrice as FinalPrice', 'p.PicPath as PicPath', 'fp.id as fpID', 'pd.ID as pDetailID','pd.PicNumber')
                ->leftjoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftjoin('customers as c', 'c.ID', '=', 'po.CustomerID')
                ->leftjoin('product_false as fp', 'fp.ProductDetailID', '=', 'pod.ProductDetailID')
                ->leftjoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftjoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('po.CustomerID', $customerId)
                ->paginate(10);

            return $data;
        }
    }

    public function orderDetail($addressID, $id)
    {
//      Get Customer Data
        $dataDetail = DB::table('customer_address')
            ->where('ID', $addressID)
            ->first();

        // Get Product Data
        $data = DB::table('product_order_detail as pod')
            ->select('pod.*', 'pod.ID as orderDetailID', 'po.*', 'p.*', 'pf.ID as falseProduct')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
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

        return view('Administrator.Customer.OrderDetail', compact('data', 'falseProduct', 'persianDate','dataDetail'));
    }

    public function nationalIdSearch($nationalId)
    {
        $output = '';
        $data = DB::table('customers')
            ->select('NationalID', 'id')
            ->where('NationalID', 'like', $nationalId . '%')
            ->take(1)
            ->get();

        foreach ($data as $key => $row) {
            $output .= '<li style="border-radius: 0 !important;"
                        class="list-group-item g-color-gray-dark-v3 g-letter-spacing-0 g-opacity-0_8--hover">
                            <a  href="' . route('customerControlPanel',['id'=>$row->id,'tab'=>'all']) . '"
                                style="text-decoration: none"
                                class="col-12 p-0 text-left g-color-gray-dark-v3 g-color-primary--hover">
                             ' . $row->NationalID . '
                            </a>
                        </li>';
        }

        return $output;
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
