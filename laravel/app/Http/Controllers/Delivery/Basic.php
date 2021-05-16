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

        $data = $this->product_delivery(['0', '2'], $deliveryManActive->ID);

        $deliveryManBasket = $this->product_delivery(['1', '3'], $deliveryManID);

        $return = $this->product_return(['4', '2'], $deliveryManID);

        $returnManBasket = $this->product_return(['1', '3'], $deliveryManID);

        return view('Delivery.Panel', compact('data', 'deliveryManActive', 'return', 'deliveryManBasket', 'returnManBasket'));
    }

    public function deliveryCourier($orderDetailID)
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
                'DeliveryStatus' => '1',
            ]);

        return $this->deliveryManBasket($orderDetailID, $deliveryManID->ID);
    }

    public function deliveryManBasket($orderDetailID, $deliveryManID)
    {
        $deliveryManBasket = $this->product_delivery(['1', '3'], $deliveryManID);

        $returnManBasket = $this->product_return(['1', '3'], $deliveryManID);

        $product = '';
        $rowNumber = 0;
        foreach ($deliveryManBasket as $key => $row) {
            $product = $product . '<tr id="basketRow' . $rowNumber . '">
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
                       ' . ($row->DeliveryProblem === 0 ? " <div class=\"d-flex justify-content-around align-items-center\">
                        <a class=\"btn-floating btn-primary rounded-circle\">
                            <div style=\"width: 15px; height: 15px\"></div>
                        </a>
                      </div>" : "") . '

                         ' . ($row->DeliveryProblem === 1 ? " <div class=\"d-flex justify-content-around align-items-center\">
                        <a class=\"btn-floating g-bg-red pulse rounded-circle\">
                            <div style=\"width: 15px; height: 15px\"></div>
                        </a>
                      </div>" : "") . '
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <img
                            class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                            src="' . $row->productPicPath . $row->PicNumber . '.jpg"
                            title="' . $row->Color . '" alt="Image Description">
                    </td>
                    <td style="direction: ltr" class="g-brd-white-opacity-0_1 align-middle">
                        <div id="kioskSignatureDiv' . $rowNumber . '" class="col-9 d-inline-block">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn u-btn-primary rounded-0"
                                            onclick="deliveryKiosk(' . $row->OrderDetailID . ',' . $rowNumber. ',\'delivery\'' . ')"
                                            type="button"><i
                                            class="fa fa-check align-middle g-font-size-16"></i></button>
                                </div>
                                <input
                                    class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                    id="pass' . $rowNumber . '"
                                    type="password"
                                    placeholder="رمز امضا">
                            </div>
                        </div>
                        <i id="kioskWaitingIconTd' . $rowNumber . '"
                           class="d-none fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                        <svg id="kioskCheckMark' . $rowNumber . '" class="d-none checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </td>
                </tr>';
            $rowNumber = $rowNumber + 1;
        }
        if ($returnManBasket !== null)
            foreach ($returnManBasket as $key => $row) {
                $product = $product . '<tr id="basketRow' . $rowNumber . '">
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
                     ' . ($row->ReturnProblem === 0 ? " <div class=\"d-flex justify-content-around align-items-center\">
                        <a class=\"btn-floating btn-primary rounded-circle\">
                            <div style=\"width: 15px; height: 15px\"></div>
                        </a>
                      </div>" : "") . '

                         ' . ($row->ReturnProblem === 1 ? " <div class=\"d-flex justify-content-around align-items-center\">
                        <a class=\"btn-floating g-bg-red pulse rounded-circle\">
                            <div style=\"width: 15px; height: 15px\"></div>
                        </a>
                      </div>" : "") . '
                    </td>
                    <td class="g-brd-white-opacity-0_1 align-middle">
                        <img
                            class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                            src="' . $row->productPicPath . $row->PicNumber . '.jpg"
                            title="' . $row->Color . '" alt="Image Description">
                    </td>
                     <td style="direction: ltr" class="g-brd-white-opacity-0_1 align-middle">
                        <div id="kioskSignatureDiv' . $rowNumber . '" class="col-9 d-inline-block">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn u-btn-primary rounded-0"
                                            onclick="deliveryKiosk(' . $row->OrderDetailID . ',' . $rowNumber . ',\'return\'' . ')"
                                            type="button"><i
                                            class="fa fa-check align-middle g-font-size-16"></i></button>
                                </div>
                                <input
                                    class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                    id="pass' . $rowNumber . '"
                                    type="password"
                                    placeholder="رمز امضا">
                            </div>
                        </div>
                        <i id="kioskWaitingIconTd' . $rowNumber . '"
                           class="d-none fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                        <svg id="kioskCheckMark' . $rowNumber . '" class="d-none checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </td>
                </tr>';
                $rowNumber = $rowNumber + 1;
            }

        return $product;
    }

    public function returnCourier($orderDetailID)
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
                'ReturnStatus' => '3',
            ]);

        return $this->deliveryManBasket($orderDetailID, $deliveryManID->ID);
    }

    public function product_delivery($where, $deliveryManID)
    {
        $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManID)
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
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    }
                    break;
                default:
            }
        }
        return $data = DB::table('product_delivery as pDel')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pDel.OrderDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManID)
            ->whereIn('pDel.DeliveryStatus', $where)
            ->get();
    }

    public function product_return($where, $deliveryManID)
    {
        $return = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManID)
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
        return $return = DB::table('product_return as pr')
            ->select('*', 's.PicPath as sellerPic', 'p.PicPath as productPicPath')
            ->leftJoin('product_delivery as pDel', 'pDel.OrderDetailID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderId')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pod.ProductDetailID')
            ->leftJoin('sellers as s', 'pod.SellerID', '=', 's.ID')
            ->where('pDel.DeliveryManID', $deliveryManID)
            ->whereIn('pr.ReturnStatus', $where)
            ->get();
    }

//-----------------------------------------------------[ Kiosk Codes ]--------------------------------------------------

    public function kioskPanel()
    {
        $kioskManID = 1;
        $kioskManID = DB::table('delivery_kiosk')
            ->select('ID')
            ->where('ID', $kioskManID)
            ->first();

        $data = $deliveryManBasket = $this->product_delivery(['22'], $kioskManID->ID);

        return view('Kiosk.Panel');
    }

    public function kioskCheckPass($pass)
    {
        $data = DB::table('delivery_kiosk')
            ->select('ID', 'Signature')
            ->where('Signature', $pass)
            ->first();

        if ($data !== null)
            return 'passTrue';
        else
            return 'passFalse';
    }

    public function kioskAddProduct($orderDetailID, $table)
    {
        if ($table === 'delivery')
            DB::table('product_delivery')
                ->where('OrderDetailID', $orderDetailID)
                ->update([
                    'DeliveryStatus' => '22',
                    'DeliveryProblem' => 0,
                ]);
        else
            DB::table('product_return')
                ->where('OrderDetailID', $orderDetailID)
                ->update([
                    'ReturnStatus' => '22',
                    'ReturnProblem' => 0,
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

