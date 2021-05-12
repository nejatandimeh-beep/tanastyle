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
        $deliveryManID=1;
        $deliveryManActive = DB::table('delivery_men')
            ->select('*')
            ->where('ID', $deliveryManID)
            ->first();

        $data=DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManActive->ID)
            ->whereIn('pDel.DeliveryStatus', ['0', '2'])
            ->get();

        $deliveryManBasket =DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManActive->ID)
            ->whereIn('pDel.DeliveryStatus', ['1', '3'])
            ->get();

        $return = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID',$deliveryManActive->ID)
            ->whereIn('pr.ReturnStatus',['4','2'])
            ->get();

        $returnManBasket = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID',$deliveryManActive->ID)
            ->whereIn('pr.ReturnStatus', ['1', '3'])
            ->get();


        return view('Delivery.Panel', compact('data', 'deliveryManActive', 'return', 'deliveryManBasket','returnManBasket'));
    }

    public function deliveryCourier($orderDetailID)
    {
        DB::table('product_delivery')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'DeliveryProblem' => 0,
                'DeliveryStatus' => '1',
            ]);
        
        return $this->deliveryManBasket($orderDetailID);
    }

    public function deliveryManBasket($orderDetailID){
        $deliveryManID=1;
        $returnMan = DB::table('delivery_men')
            ->select('ID')
            ->where('ReturnMan', $deliveryManID)
            ->first();

        $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $returnMan->ID)
            ->whereIn('pDel.DeliveryStatus', ['1', '3'])
            ->get();

        $returnManBasket = null;
        $returnManBasket = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID',$returnMan->ID)
            ->whereIn('pr.ReturnStatus', ['1', '3'])
            ->get();

        $product = '';
        $rowNumber=0;
        foreach ($data as $key => $row) {
            $rowNumber = $key + 1;
            $product = $product . '<tr id="returnRow' . $key . '">
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $rowNumber . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Name . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Model . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Size . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Color . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span
                            class="g-color-white">' . $row->ProductID . '/' . $row->ProductDetailID . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span
                            class="g-color-white">' . $row->OrderId . '/' . $row->OrderDetailID . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                         ' . ($row->DeliveryStatus === "1" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">کیوسک</span>" : "") . '
                          ' . ($row->DeliveryStatus === "3" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">اداره پست مرکزی</span>" : "") . '

                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $key . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <img
                            class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                            src="' . $row->productPicPath . $row->PicNumber . '.jpg"
                            title="' . $row->Color . '" alt="Image Description">
                    </td>
                </tr>';
        }
        if ($returnManBasket !==null)
            foreach ($returnManBasket as $key => $row) {
            $rowNumber = $rowNumber + 1;
            $product = $product . '<tr id="returnRow' . $key . '">
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $rowNumber . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Name . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Model . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Size . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $row->Color . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span
                            class="g-color-white">' . $row->ProductID . '/' . $row->ProductDetailID . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span
                            class="g-color-white">' . $row->OrderId . '/' . $row->OrderDetailID . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                         ' . ($row->ReturnStatus === "1" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">فروشنده</span>" : "") . '
                          ' . ($row->ReturnStatus === "3" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">کیوسک</span>" : "") . '

                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <span class="g-color-white">' . $key . '</span>
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <img
                            class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                            src="' . $row->productPicPath . $row->PicNumber . '.jpg"
                            title="' . $row->Color . '" alt="Image Description">
                    </td>
                </tr>';
        }

        return $product;
    }

    public function returnCourier($orderDetailID)
    {
        DB::table('product_return')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'ReturnProblem' => 0,
                'ReturnStatus' => '3',
            ]);

        return $this->deliveryManBasket($orderDetailID);
    }
//-----------------------------------------------------[ Kiosk Codes ]--------------------------------------------------

    public function kioskPanel()
    {
        $data = DB::table('delivery_work_list as dwl')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'dwl.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->whereIn('dwl.DeliveryStatus', ['-3', '-1', '1', '3'])
            ->get();

        return view('Kiosk.Panel');
    }
}
