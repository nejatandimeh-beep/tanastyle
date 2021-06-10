<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Basic extends Controller
{
    public function deliveryPanel()
    {
        $deliveryManID = 1;
        $deliveryManActive = DB::table('delivery_men')
            ->select('*')
            ->where('ID', $deliveryManID)
            ->first();

        $data = $this->product_delivery(['0', '2'], $deliveryManActive->ID, 'delivery');

        $deliveryManBasket = $this->product_delivery(['1', '3'], $deliveryManID, 'delivery');

        $return = $this->product_return(['4', '2'], $deliveryManID, 'delivery');

        $returnManBasket = $this->product_return(['1', '3'], $deliveryManID, 'delivery');

        return view('Delivery.Panel', compact('data', 'deliveryManActive', 'return', 'deliveryManBasket', 'returnManBasket'));
    }

    public function deliveryCourier($orderDetailID,$destination)
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

    public function returnCourier($orderDetailID,$destination)
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

    public function sellerCheckPass($pass,$id)
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
//-----------------------------------------------------[ Kiosk Codes ]--------------------------------------------------

    public function kioskPanel()
    {
        $kioskID = 3;
        $kioskID = DB::table('delivery_kiosk')
            ->select('*')
            ->first();

        $kioskBasket = $this->product_delivery(['22','2'], $kioskID->ID, 'kiosk');
        $returnKioskBasket = $this->product_return(['22','2'], $kioskID->ID, 'kiosk');

        return view('Kiosk.Panel', compact('kioskBasket', 'returnKioskBasket', 'kioskID'));
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

    public function destinationAddProduct($orderDetailID, $table, $id,$destination)
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

    public function destinationFinal($orderDetailID, $table,$destination)
    {
        if ($table === 'delivery')
            DB::table('product_delivery')
                ->where('OrderDetailID', $orderDetailID)
                ->update([
                    'DeliveryStatus' => $destination,
                    'DeliveryProblem' => 0,
                ]);

        DB::table('product_return')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'ReturnStatus' => $destination,
                'ReturnProblem' => 0,
            ]);
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

