<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Kavenegar;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Basic extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function deliveryPanel()
    {
        $deliveryManActive = DB::table('delivery_men as dm')
            ->select('*')
            ->leftJoin('admins as admin', 'admin.id', '=', 'dm.AdminID')
            ->where('dm.AdminID', Auth::guard('admin')->user()->id)
            ->first();

        $data = $this->queueExpect(['0', '2'], $deliveryManActive->ID);
        $deliveryManBasket = $this->product_delivery(['1', '3'], $deliveryManActive->ID, 'delivery');

        $return = $this->product_return(['4', '2'], $deliveryManActive->ID, 'delivery');
        $returnManBasket = $this->product_return(['1', '3'], $deliveryManActive->ID, 'delivery');

        return view('Delivery.Panel', compact('data', 'deliveryManActive', 'return', 'deliveryManBasket', 'returnManBasket'));
    }

    public function deliveryCourier($orderDetailID, $destination)
    {
        $deliveryManID = 1;
        $deliveryManID = DB::table('delivery_men')
            ->select('ID')
            ->where('ID', $deliveryManID)
            ->first();

        DB::table('product_delivery')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'DeliveryProblem' => 0,
                'DeliveryStatus' => $destination,
            ]);
        return redirect()->route('deliveryPanel');
    }

    public function returnCourier($orderDetailID, $destination)
    {
        $deliveryManID = 1;
        $deliveryManID = DB::table('delivery_men')
            ->select('ID')
            ->where('ReturnMan', $deliveryManID)
            ->first();

        DB::table('product_return')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'ReturnProblem' => 0,
                'ReturnStatus' => $destination,
            ]);

        return redirect()->route('deliveryPanel');
    }

    public function product_delivery($where, $id, $table)
    {
        if ($table === 'kiosk')
            $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.KioskID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->get();
        else
            $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
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
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.KioskID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->groupBy('pod.ID')
                ->get();
        else
            return $data = DB::table('product_delivery as pDel')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pDel.DeliveryStatus', $where)
                ->groupBy('po.ID')
                ->get();
    }

    public function queueExpect($where, $id)
    {
        $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
            ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
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
        return $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
            ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
            ->where('pDel.DeliveryManID', $id)
            ->whereIn('pDel.DeliveryStatus', $where)
            ->groupBy('pod.ID')
            ->get();
    }

    public function product_return($where, $id, $table)
    {
        if ($table === 'kiosk')
            $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.KioskID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->get();
        else
            $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
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
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.KioskID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->groupBy('pod.ID')
                ->get();
        else
            return $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'c.id', 'ca.ReceiverName', 'ca.ReceiverFamily', 'ca.Mobile')
                ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->leftJoin('customers as c', 'c.id', '=', 'po.CustomerID')
                ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
                ->where('pDel.DeliveryManID', $id)
                ->whereIn('pr.ReturnStatus', $where)
                ->groupBy('pod.ID')
                ->get();

    }

    public function sellerCheckPass($pass, $id)
    {
        $data = DB::table('sellers')
            ->select('ID', 'Signature')
            ->where('ID', $id)
            ->where('Signature', $pass)
            ->first();

        if ($data !== null)
            return $data->ID;
        else
            return 'passFalse';
    }

    public function deliveryPersonal()
    {
        $data = Db::table('delivery_men as dm')
            ->select('*', 'dm.ID as deliveryID')
            ->leftJoin('admins as admin', 'admin.id', '=', 'dm.AdminID')
            ->leftJoin('product_delivery as pd', 'pd.DeliveryManID', '=', 'dm.ID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->groupBy('dm.ID')
            ->get();

        $deliveryStatus = array();
        foreach ($data as $key => $rec) {
            $deliveryStatus[$key] = $this->dateLenToNow($data[$key]->Date, $data[$key]->Time);
        }

        return view('Delivery.Personal', compact('data', 'deliveryStatus'));
    }

//-----------------------------------------------------[ Kiosk Codes ]--------------------------------------------------

    public function kioskPersonal()
    {
        $data = Db::table('delivery_kiosk as dk')
            ->select('*', 'dk.ID as kioskID')
            ->leftJoin('admins as admin', 'admin.id', '=', 'dk.AdminID')
            ->leftJoin('product_delivery as pd', 'pd.KioskID', '=', 'dk.ID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pd.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->groupBy('dk.ID')
            ->get();

        $deliveryStatus = array();
        foreach ($data as $key => $rec) {
            $deliveryStatus[$key] = $this->dateLenToNow($data[$key]->Date, $data[$key]->Time);
        }

        return view('Kiosk.Personal', compact('data', 'deliveryStatus'));
    }

    public function kioskPanel()
    {
        $kiosk = DB::table('delivery_kiosk as dk')
            ->select('*')
            ->leftJoin('admins as admin', 'admin.id', '=', 'dk.AdminID')
            ->where('dk.AdminID', Auth::guard('admin')->user()->id)
            ->first();
        $kioskBasket = $this->product_delivery(['22', '2'], $kiosk->ID, 'kiosk');
        $returnKioskBasket = $this->product_return(['22', '2'], $kiosk->ID, 'kiosk');

        return view('Kiosk.Panel', compact('kioskBasket', 'returnKioskBasket', 'kiosk'));
    }

    public function signatureEdit($newCode, $id)
    {
        DB::table('delivery_kiosk')
            ->where('AdminID', $id)
            ->update([
                'Signature' => $newCode,
            ]);
    }

    public function kioskCheckPass($pass)
    {
        $data = DB::table('delivery_kiosk')
            ->select('ID', 'Signature')
            ->where('Signature', $pass)
            ->first();

        if ($data !== null)
            return $data->ID;
        else
            return 'passFalse';
    }

    public function destinationAddProduct($orderDetailID, $table, $id, $destination)
    {
        if ($table === 'delivery')
            DB::table('product_delivery')
                ->where('OrderDetailID', $orderDetailID)
                ->update([
                    'DeliveryStatus' => $destination,
                    'DeliveryProblem' => 0,
                    'KioskID' => $id,
                ]);
        else
            DB::table('product_delivery')
                ->where('OrderDetailID', $orderDetailID)
                ->update([
                    'KioskID' => $id,
                ]);
        DB::table('product_return')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'ReturnStatus' => $destination,
                'ReturnProblem' => 0,
            ]);
    }

    public function destinationFinal($orderID, $table, $destination, $trackingCode)
    {
        $data = DB::table('product_order_detail as pod')
            ->select('p.ID', 'p.Name', 'p.Model', 'p.Brand', 'pod.*', 'po.*', 'c.id', 'c.Mobile', 'pod.ID as OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('customers as c', 'c.ID', '=', 'po.CustomerID')
            ->where('pod.OrderId', $orderID)
            ->get();

        foreach ($data as $key => $row) {
            if ($table === 'delivery')
                DB::table('product_delivery')
                    ->where('OrderDetailID', $row->OrderDetailID)
                    ->update([
                        'DeliveryStatus' => $destination,
                        'DeliveryProblem' => 0,
                        'TrackingCode' => $trackingCode,
                    ]);

            DB::table('product_return')
                ->where('OrderDetailID', $row->OrderDetailID)
                ->update([
                    'ReturnStatus' => $destination,
                    'ReturnProblem' => 0,
                ]);
        }

        try {
            $token = $trackingCode;
            $token2 = $orderID;

            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "postTrackingCode";
            $type = "sms";

            $result = $var->VerifyLookup($data[0]->Mobile, $token, $token2, null, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
    }

    public function courierRequest($orderDetailID)
    {
        DB::table('product_delivery')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'DeliveryProblem' => 0,
                'DeliveryStatus' => '2',
            ]);
    }

    public function returnCourierRequest($orderDetailID)
    {
        DB::table('product_return')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'ReturnProblem' => 0,
                'ReturnStatus' => '2',
            ]);
    }

//-----------------------------------------------------[ My Function ]--------------------------------------------------
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
}

