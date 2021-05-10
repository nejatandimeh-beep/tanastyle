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
        $deliveryManActive = DB::table('delivery_men')
            ->select('*')
            ->where('ID', 1)
            ->first();

        $data = null;
        $data = DB::table('delivery_work_list as dwl')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'dwl.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('DeliveryManID', $deliveryManActive->ID)
            ->whereIn('dwl.DeliveryStatus', ['0', '2'])
            ->get();

        $return = null;
        if ($deliveryManActive === 1)
            $return = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->whereIn('pr.ReturnStatus', ['4', '2'])
                ->get();

        $returnMan = DB::table('delivery_men')
            ->select('ID')
            ->where('ReturnMan', 1)
            ->first();

        $deliveryManBasket = null;
        $deliveryManBasket = DB::table('delivery_work_list as dwl')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'dwl.*', 'dwl.DeliveryStatus as deliveryStatus')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'dwl.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('DeliveryManID', 1)
            ->whereIn('dwl.DeliveryStatus', ['-3', '-1', '3', '1'])
            ->get();

        $returnManBasket = null;
        if ($deliveryManActive === $returnMan->ID)
            $returnManBasket = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
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

        DB::table('delivery_work_list')
            ->where('OrderDetailID', $orderDetailID)
            ->update([
                'DeliveryStatus' => '1',
            ]);

        $deliveryManID=1;
        $data = DB::table('delivery_work_list as dwl')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath', 'dwl.DeliveryStatus as deliveryStatus')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'dwl.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('DeliveryManID', $deliveryManID)
            ->whereIn('dwl.DeliveryStatus', ['-3', '-1', '1', '3'])
            ->get();

        $returnMan = DB::table('delivery_men')
            ->select('ID')
            ->where('ReturnMan', 1)
            ->first();

        $returnManBasket = null;
        if ($deliveryManID === $returnMan->ID)
            $returnManBasket = DB::table('product_return as pr')
                ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
                ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
                ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
                ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
                ->whereIn('pr.ReturnStatus', ['1', '3'])
                ->get();

        $product = '';

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
                        ' . ($row->deliveryStatus === "-1" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">' . $row->Address . 'پلاک' . $row->ShopNumber . '</span>" : "") . '
                         ' . ($row->deliveryStatus === "1" || $row->deliveryStatus === "-3" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">باجه پستی شرکت</span>" : "") . '
                          ' . ($row->deliveryStatus === "3" ? "<span
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
                    <td class="g-brd-white-opacity-0_1 align-middle">
                      ' . ($row->deliveryStatus === "-1" ? "<img class=\"d-flex g-width-60 g-my-10 g-height-60 mx-auto\"
                             src=\"' . $row->sellerPic . '\" alt=\"Image Description\">" : "") . '
                         ' . ($row->deliveryStatus === "1" || $row->deliveryStatus === "-3" ? "<i class=\"icon-home g-font-size-20 g-color-primary\"></i>" : "") . '
                          ' . ($row->deliveryStatus === "3" ? " <img class=\"d-flex g-width-35 g-my-10 g-height-35 mx-auto\"
                                                             src=\"img/Other/postLogo.png\" alt=\"Image Description\">" : "") . '

                    </td>
                    <td style="direction: ltr" class="g-brd-white-opacity-0_1 align-middle">
                        <div id="returnSignatureDiv' . $key . '" class="col-9 d-inline-block">
                            <div class="input-group">
                              <span class="input-group-btn">
                               <i class="fa fa-check align-middle g-font-size-16"></i>
                              </span>
                            </div>
                        </div>

                        <i id="returnWaitingIconTd' . $key . '"
                           class="d-none fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>

                        <svg id="returnCheckMark' . $key . '" class="d-none checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </td>
                </tr>';
        }

        if ($returnManBasket !==null)
            foreach ($returnManBasket as $key => $row) {
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
                         ' . ($row->ReturnStatus === "1" ? "<span
                            class=\"g-font-size-16 g-color-yellow\">باجه پستی شرکت</span>" : "") . '
                          ' . ($row->ReturnStatus === "3" ? "<span
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
                    <td class="g-brd-white-opacity-0_1 align-middle">
                      ' . ($row->ReturnStatus === "-1" ? "<img class=\"d-flex g-width-60 g-my-10 g-height-60 mx-auto\"
                             src=\"' . $row->sellerPic . '\" alt=\"Image Description\">" : "") . '
                         ' . ($row->ReturnStatus === "1" || $row->ReturnStatus === "-3" ? "<i class=\"icon-home g-font-size-20 g-color-primary\"></i>" : "") . '
                          ' . ($row->ReturnStatus === "3" ? " <img class=\"d-flex g-width-35 g-my-10 g-height-35 mx-auto\"
                                                             src=\"img/Other/postLogo.png\" alt=\"Image Description\">" : "") . '

                    </td>
                    <td style="direction: ltr" class="g-brd-white-opacity-0_1 align-middle">
                        <div id="returnSignatureDiv' . $key . '" class="col-9 d-inline-block">
                            <div class="input-group">
                              <span class="input-group-btn">
                               <i class="fa fa-check align-middle g-font-size-16"></i>
                              </span>
                            </div>
                        </div>

                        <i id="returnWaitingIconTd' . $key . '"
                           class="d-none fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>

                        <svg id="returnCheckMark' . $key . '" class="d-none checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
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
