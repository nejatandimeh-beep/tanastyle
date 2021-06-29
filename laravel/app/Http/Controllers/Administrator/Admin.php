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

class Admin extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function administratorMaster()
    {
        return view('Administrator.Admin.Master');
    }

    public function adminDeliveryPanel($id)
    {
        $deliveryManActive = DB::table('delivery_men as dm')
            ->select('*')
            ->leftJoin('admins as admin','admin.id','=','dm.AdminID')
            ->where('dm.ID', $id)
            ->first();

        $data = $this->product_delivery(['0', '2'],$id, 'delivery');
        $deliveryManBasket = $this->product_delivery(['1', '3'], $id, 'delivery');

        $return = $this->product_return(['4', '2'], $id, 'delivery');
        $returnManBasket = $this->product_return(['1', '3'], $id, 'delivery');

        return view('Administrator.Admin.DeliveryPanel', compact('data', 'deliveryManActive', 'return', 'deliveryManBasket', 'returnManBasket'));
    }

    public function adminKioskPanel($id)
    {
        $kiosk = DB::table('delivery_kiosk as dk')
            ->select('*')
            ->leftJoin('admins as admin','admin.id','=','dk.AdminID')
            ->where('dk.ID',$id)
            ->first();

        $kioskBasket = $this->product_delivery(['22','2'], $kiosk->ID, 'kiosk');
        $returnKioskBasket = $this->product_return(['22','2'], $kiosk->ID, 'kiosk');

        return view('Administrator.Admin.KioskPanel', compact('kioskBasket', 'returnKioskBasket', 'kiosk'));
    }

    public function postPanel(){
        $data = DB::table('product_delivery as pd')
            ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath','pd.*')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('TrackingCode', '<>','?')
            ->paginate(10);

        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Administrator.Admin.Post',compact('data','persianDate'));
    }

    public function trackingCodeSearch($trackingCode)
    {
        $data='';
        if($trackingCode === 'null'){
            $data = DB::table('product_delivery as pd')
                ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath','pd.*')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('TrackingCode', '<>','?')
                ->get();
        }else {
            $data = DB::table('product_delivery as pd')
                ->select('pod.*', 'po.*', 'p.Name', 'p.PicPath','pd.*')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->where('TrackingCode', 'like', $trackingCode . '%')
                ->get();
        }
        $output = '';

        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        foreach ($data as $key => $row) {
            $output .= ' <tr>
                            <td class="align-middle text-nowrap text-center">'.$row->Name .'</td>
                            <td class="align-middle text-center text-nowrap">'.$persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2].'</td>
                            <td class="align-middle text-center text-nowrap">'.$row->Time.'</td>
                            <td class="align-middle text-center text-nowrap">'.$row->OrderId.'/'.$row->ID.'</td>
                            <td class="align-middle text-center text-nowrap">
                                <div class="media">
                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                         src="'.$row->PicPath.'pic1.jpg" alt="">
                                </div>
                            </td>
                            <td class="align-middle text-center text-nowrap">
                                '.$row->TrackingCode.'
                            </td>
                            <td class="align-middle text-center text-nowrap">'.$rec->DeliveryProblem.'</td>
                        </tr>';
        }

        return $output;
    }

    public function product_delivery($where, $id, $table)
    {
        if ($table === 'kiosk')
            $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.KioskID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->get();
        else
            $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->get();

        $today = date('Y-m-d');
        $deliveryMin = array();
        foreach ($data as $key => $row) {
            $rowDate = strtotime($row->Date . ' ' . $row->Time);
            $orderDate = date('Y-m-d', $rowDate);
            $reservation = date('Y-m-d', strtotime($row->Date . ' + 1 days'));

            if (($orderDate < $today))
                $deliveryMin[$key] = $this->dateLenToNow($reservation, '08:00:00'); // get len past date to now by min
            else
                $deliveryMin[$key] = 0; // get len past date to now by min

            switch ($row->DeliveryStatus) {
                case '0':
                    if ($deliveryMin[$key] > 540) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    }
                    break;
                case '1':
                    if ($deliveryMin[$key] > 600) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    }
                    break;
                case '2':
                case '22':
                    if ($deliveryMin[$key] > 1560) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    }
                    break;
                case '3':
                    if ($deliveryMin[$key] > 1800) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    }
                    break;
                default:
            }
        }
        if ($table === 'kiosk')
            return $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.KioskID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->get();
        else
            return $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->get();
    }

    public function product_return($where, $id, $table)
    {
        if ($table === 'kiosk')
            $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.KioskID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->get();
        else
            $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->get();

        $today = date('Y-m-d');
        $returnMin = array();
        foreach ($return as $key => $row) {
            $rowDate = strtotime($row->Date . ' ' . $row->Time);
            $orderDate = date('Y-m-d', $rowDate);
            $reservation = date('Y-m-d', strtotime($row->Date . ' + 1 days'));

            if (($orderDate < $today))
                $returnMin[$key] = $this->dateLenToNow($reservation, '08:00:00'); // get len past date to now by min
            else
                $returnMin[$key] = 0; // get len past date to now by min

            switch ($row->ReturnStatus) {
                case '4':
                    if ($returnMin[$key] > 3240) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    }
                    break;
                case '3':
                    if ($returnMin[$key] > 3420) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    }
                    break;
                case '2':
                case '22':
                    if ($returnMin[$key] > 4440) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    }
                    break;
                case '1':
                    if ($returnMin[$key] > 4860) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    }
                    break;
                default:
            }
        }
        if ($table === 'kiosk')
            return $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.KioskID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->get();
        else
            return $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->get();

    }
// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------
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
                return 'یک هفته پیش';
                break;
            default :
                break;
        }
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
