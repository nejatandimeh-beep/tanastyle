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
        $deliveryManCount = DB::table('delivery_men')
            ->select('*')
            ->get()
            ->count();

        $deliveryManActive = DB::table('delivery_men')
            ->select('*')
            ->where('ID', 5)
            ->first();

        $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryStatus', '0')
            ->get();

        $deliveryManNum = array(array());
        $dataCount = count($data);
        $everyMan = round($dataCount / $deliveryManCount);
        $k=0;
        for ($i = 0; $i < $deliveryManCount-1; $i++) {
            for ($j = 0; $j < $everyMan; $j++){
                $deliveryManNum[$i][$j] = $data[$k];
                $k++;
            }
        }
        for ($j = 0; $j < $dataCount-(($deliveryManCount-1)*$everyMan); $j++){
            $deliveryManNum[$i][$j] = $data[$k];
            $k++;
        }

        $data=$deliveryManNum[(int)$deliveryManActive->DeliveryManNum];
        return view('Delivery.Panel', compact('data'));
    }

    public function courierDelivery($orderDetailID)
    {
        DB::table('product_delivery')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'DeliveryProblem' => 0,
                'DeliveryStatus' => '1',
            ]);
        return $orderDetailID;
    }

    public function sellerCheckPass($pass, $sellerID)
    {
        $data = DB::table('sellers')
            ->select('Signature')
            ->where('ID', $sellerID)
            ->where('Signature', $pass)
            ->first();

        if ($data !== null)
            return 'passTrue';
        else
            return 'passFalse';

    }
}

