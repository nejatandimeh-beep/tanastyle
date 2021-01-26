<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Basic extends Controller
{
    public function userProfile($id)
    {
        // user data
        $customer = DB::table('customers')
            ->select('*')
            ->where('id', Auth::user()->id)
            ->first();

        // address
        $address = DB::table('customer_address')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->orderBy('Status', 'DESC')
            ->get();

        // order
        $order = DB::table('product_order as po')
            ->select('po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID', 'po.ID as orderID')
            ->leftJoin('product_order_detail as pod', 'pod.OrderID', '=', 'po.ID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();

        $orderHowDay = array();
        $persianDate = array();
        foreach ($order as $key => $row) {
            $d = $row->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
            $persianDate[$key][1] = $this->month($persianDate[$key][1]);
            $orderMinuets[$key] = $this->dateLenToNow($row->Date, '00:00:00');
            $orderHowDay[$key] = null;
            if ($orderMinuets[$key] < 11520) {
                $orderHowDay[$key] = $this->howDays($orderMinuets[$key]);
            }
        }

        $delivery = DB::table('product_delivery as delivery')
            ->select('delivery.*', 'po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'delivery.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();

        $today = date('Y-m-d');
        $deliveryHowDay = array();
        $deliveryPersianDate = array();
        $deliveryTime = array();
        $deliveryMin = array();
        $deliveryHint = array();
        foreach ($delivery as $key => $row) {
            $d = $row->Date;
            $deliveryPersianDate[$key] = $this->convertDateToPersian($d); //get persian date
            $deliveryPersianDate[$key][1] = $this->month($deliveryPersianDate[$key][1]); // get month name
            $rowDate = strtotime($row->Date . ' ' . $row->Time);
            $orderDate = date('Y-m-d', $rowDate);
            $reservation = date('Y-m-d', strtotime($row->Date . ' + 1 days'));

            if (($orderDate < $today))
                $deliveryMin[$key] = $this->dateLenToNow($reservation, '08:00:00'); // get len past date to now by min
            else
                $deliveryMin[$key] = 0; // get len past date to now by min

            switch ($row->DeliveryStatus) {
                case '0':
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'فروشنده';
                    $deliveryTime[$key] = 0;
                    if ($deliveryMin[$key] > 540) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    } else {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 0
                            ]);
                    }
                    break;
                case '1':
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'پیک';
                    $deliveryTime[$key] = 25;
                    if ($deliveryMin[$key] > 600) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    } else {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 0
                            ]);
                    }
                    break;
                case '2':
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'بسته بندی';
                    $deliveryTime[$key] = 50;
                    if ($deliveryMin[$key] > 1560) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    } else {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 0
                            ]);
                    }
                    break;
                case '3':
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'پیک';
                    $deliveryTime[$key] = 75;
                    if ($deliveryMin[$key] > 1800) {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 1
                            ]);
                    } else {
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryProblem' => 0
                            ]);
                    }
                    break;
                case '4':
                    DB::table('product_delivery')
                        ->where('OrderDetailID', $row->orderDetailID)
                        ->update([
                            'DeliveryProblem' => 0
                        ]);
                    $deliveryHint[$key]['text'] = 'تحویل به';
                    $deliveryHint[$key]['location'] = 'پست';
                    $deliveryTime[$key] = 75 + round(($deliveryMin[$key] / 7200 * 100) * 25 / 100);
                    if ($deliveryMin[$key] > 5040) {
                        $deliveryHint[$key]['text'] = 'تحویل با';
                        $deliveryHint[$key]['location'] = 'موفقیت';
                        DB::table('product_delivery')
                            ->where('OrderDetailID', $row->orderDetailID)
                            ->update([
                                'DeliveryStatus' => '5',
                            ]);
                    }
                    break;
                case '5':
                    $deliveryTime[$key] = 101;
                    break;
                case '-1':
                    $deliveryTime[$key] = 101;
                    $deliveryHint[$key]['text'] = '';
                    $deliveryHint[$key]['location'] = 'بازگشتی';
                    break;
                default:
            }

            $deliveryHowDay[$key] = null;
            if ($deliveryMin[$key] < 11520) {
                $deliveryHowDay[$key] = $this->howDays($deliveryMin[$key]);
            }
        }

        // return
        $return = DB::table('product_return as pr')
            ->select('*', 'pr.Date as returnDate')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pr.Date', 'DESC')
            ->get();

        $returnHowDay = array();
        $returnPersianDate = array();
        $returnTime = array();
        $returnMin = array();
        $returnHint = array();
        foreach ($return as $key => $row) {
            $d = $row->returnDate;
            $returnPersianDate[$key] = $this->convertDateToPersian($d); //get persian date
            $returnPersianDate[$key][1] = $this->month($returnPersianDate[$key][1]); // get month name
            $rowDate = strtotime($row->returnDate);
            date_default_timezone_set('Asia/Tehran');
            $returnDate = date('Y-m-d', $rowDate);
            if (($returnDate < $today))
                $returnMin[$key] = $this->dateLenToNow($row->returnDate, '08:00:00'); // get len past date to now by min
            else
                $returnMin[$key] = 0; // get len past date to now by min

            $returnHowDay[$key] = null;
            if ($returnMin[$key] < 11520) {
                $returnHowDay[$key] = $this->howDays($returnMin[$key]);
            }
            switch ($row->ReturnStatus) {
                case '4':
                    $returnHint[$key]['text'] = 'در دست';
                    $returnHint[$key]['location'] = 'پست';
                    $returnTime[$key] = round(($returnMin[$key] / 3240 * 100) * 25 / 100);
                    // تا سه روز بعد از بازگشت و ساعت 14 روز سوم خطایی رخ نمی دهد.
                    if ($returnMin[$key] > 3240) {
                        $returnTime[$key] = 25;
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    }
                    break;
                case '3':
                    $returnHint[$key]['text'] = 'در دست';
                    $returnHint[$key]['location'] = 'پیک';
                    $returnTime[$key] = 25;
                    if ($returnMin[$key] > 3420) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    } else {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 0
                            ]);
                    }
                    break;
                case '2':
                    $returnHint[$key]['text'] = 'در دست';
                    $returnHint[$key]['location'] = 'بررسی ایرادات';
                    $returnTime[$key] = 50;
                    if ($returnMin[$key] > 4440) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    } else {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 0
                            ]);
                    }
                    break;
                case '1':
                    $returnHint[$key]['text'] = 'در دست';
                    $returnHint[$key]['location'] = 'پیک';
                    $returnTime[$key] = 75;
                    if ($returnMin[$key] > 4860) {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 1
                            ]);
                    } else {
                        DB::table('product_return')
                            ->where('OrderDetailID', $row->OrderDetailID)
                            ->update([
                                'ReturnProblem' => 0
                            ]);
                    }
                    break;
                case '0':
                    $returnHint[$key]['text'] = 'بازگشت محصول';
                    $returnHint[$key]['location'] = 'و عودت وجه';
                    $returnTime[$key] = 100;
                    DB::table('product_return')
                        ->where('OrderDetailID', $row->OrderDetailID)
                        ->update([
                            'ReturnProblem' => 0
                        ]);
                    break;
                default:
            }
        }

        $like = DB::table('customer_vote as cv')
            ->select('*', 'p.ID as ProductID')
            ->leftJoin('product_detail as pd', 'pd.ID', 'cv.ProductDetailID')
            ->leftJoin('product as p', 'p.ID', 'pd.ProductID')
            ->where('cv.CustomerID', Auth::user()->id)
            ->where('cv.Like', '<>', 0)
            ->get();

        // Get data after Database update
        $order = DB::table('product_order as po')
            ->select('po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID', 'po.ID as orderID')
            ->leftJoin('product_order_detail as pod', 'pod.OrderID', '=', 'po.ID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();
        $delivery = DB::table('product_delivery as delivery')
            ->select('delivery.*', 'po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'delivery.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();
        $return = DB::table('product_return as pr')
            ->select('*', 'pr.Date as returnDate')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pr.Date', 'DESC')
            ->get();

        return view('Customer.Profile', compact('id', 'customer', 'address',
            'order', 'persianDate', 'orderHowDay', 'delivery', 'deliveryHowDay', 'deliveryPersianDate',
            'deliveryMin', 'deliveryTime', 'deliveryHint', 'return', 'returnHowDay', 'returnPersianDate',
            'returnMin', 'returnTime', 'returnHint', 'like'));
    }

    public function cart()
    {
        // گرفتن تمامی جزییات مربوط به محصول کلیک شده
        $data = DB::table('product_cart as pc')
            ->select('p.*', 'pd.*', 'pd.ID as ProductDetailID')
            ->leftJoin('product_detail as pd', 'pd.ID', '=', 'pc.ProductDetailID')
            ->leftJoin('product as p', 'p.ID', '=', 'pd.ProductID')
            ->where('pc.CustomerID', Auth::user()->id)
            ->orderBy('Date')
            ->orderBy('Time')
            ->get();

        $sendAddress = $this->checkAddress();
        return view('Customer.Cart', compact('sendAddress', 'data'));
    }

    public function cartDelete($id)
    {
        DB::table('product_cart')
            ->where('ProductDetailID', $id)
            ->delete();
        $cartCount = DB::table('product_cart')
            ->get();
        return count($cartCount);
    }

    public function cartSubmit(Request $request)
    {
        $row = $request->get('row');
        $productDetailID = [];
        $qty = [];
        for ($i = 0; $i <= $row - 1; $i++) {
            $productDetailID[$i] = $request->get('productDetailID' . $i);
            $qty[$i] = $request->get('qty' . $i);
            $new = $this->newOrder($productDetailID[$i], $qty[$i], $i);
        }

        return redirect()->route('userProfile', 'deliveryStatus');
    }

    public function cartAdd($id)
    {
        DB::table('product_cart')->insert([
            'CustomerID' => Auth::user()->id,
            'ProductDetailID' => $id,
            'Date' => date('Y-m-d'),
            'Time' => date('H:i:s')
        ]);
    }

    public function checkCartNumber()
    {
        $data = DB::table('product_cart')
            ->where('CustomerID', Auth::user()->id)
            ->get();
        return array($data->count(), $data);
    }

    public function profileUpdate(Request $request)
    {
        $name = $request->get('name');
        $family = $request->get('family');
        $nationalId = $request->get('nationalId');
        $day = $request->get('day');
        $mon = $request->get('mon');
        $year = $request->get('year');
        $gender = $request->get('gender');
        $prePhone = $request->get('prePhone');
        $phone = $request->get('phone');
        $mobile = $request->get('mobile');
        $state = $request->get('state');
        $city = $request->get('city');

        DB::table('customers')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $name,
                'Family' => $family,
                'NationalID' => $nationalId,
                'BirthdayD' => $day,
                'BirthdayM' => $mon,
                'BirthdayY' => $year,
                'Gender' => $gender,
                'Phone' => $phone,
                'PrePhone' => $prePhone,
                'Mobile' => $mobile,
                'State' => $state,
                'City' => $city,
            ]);

        return redirect()->route('userProfile', 'personData');
    }

    public function addressActive($id)
    {
        DB::table('customer_address')
            ->where('ID', $id)
            ->update([
                'Status' => 1
            ]);

        DB::table('customer_address')
            ->where('CustomerID', Auth::user()->id)
            ->where('ID', '<>', $id)
            ->update([
                'Status' => 0
            ]);

        return redirect()->route('userProfile', 'addressStatus');
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

        return redirect()->route('userProfile', 'addressStatus');
    }

    public function addAddress(Request $request)
    {
        $productID = $request->get('productIDFromBuy');
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
            ->where('CustomerID', Auth::user()->id)
            ->update([
                'Status' => 0,
            ]);

        DB::table('customer_address')->insert([
            'CustomerID' => Auth::user()->id,
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

        if ($productID === 'empty')
            return redirect()->route('userProfile', 'addressStatus');
        else {
            return redirect()->route('productDetail', $productID);
        }
    }

    public function addressDelete($id)
    {
        DB::table('customer_address')
            ->select('ID')
            ->where('ID', $id)
            ->delete();
    }

    public function productList($filter)
    {
        $product_table = $this->productListFilter($filter)[0];
        $filterType = $this->productListFilter($filter)[1];
        return view('Customer.femaleProductList', compact('product_table','filterType'));
    }

    public function productDetail($id)
    {
        // گرفتن اطلاعات کلی مربوط به محصول کلیک شده
        $data = DB::table('product')
            ->select('*')
            ->where('ID', $id)
            ->first();

        // گرفتن تمامی جزییات مربوط به محصول کلیک شده
        $detail = DB::table('product as p')
            ->select('p.*', 'pd.*', 'pd.ID as detailID')
            ->leftJoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
            ->where('pd.ProductID', $id)
            ->orderBy('Size')
            ->get();

        // سازمندهی کردن جزییات مربوط به محصول(سایز)
        $size = array();
        $temp = '';
        $i = 0;
        foreach ($detail as $key => $info) {
            if ($info->Size !== $temp) {
                $size[$i]['pdId'] = $info->detailID;
                $size[$i]['size'] = $info->Size;
                $i++;
            }
            $temp = $info->Size;
        }

        // سازمندهی کردن جزییات مربوط به محصول(rating، comment)
        $rating_tbl = DB::table('customer_vote as cv')
            ->select('*')
            ->where('ProductDetailID', $detail[0]->detailID)
            ->get();

        // rating & comment
        $rating = 0;
        $ratingCount = 0;
        foreach ($rating_tbl as $key => $row) {
            $rating += $row->Rating;
            if ($row->Rating !== 0)
                $ratingCount++;
        }
        if ($rating !== 0)
            $rating = round($rating / $ratingCount);

        $comments = DB::table('customer_comment as cc')
            ->select('c.name', 'c.Family', 'cc.*', 'cc.ID as ccID')
            ->leftJoin('customers as c', 'cc.CustomerID', '=', 'c.id')
            ->where('cc.ProductID', $id)
            ->get();

        $commentVote = null;
        $voteID = null;
        $sendAddress = null;

        if (isset(Auth::user()->id)) {
            $commentVote = DB::table('customer_comment_like as ccl')
                ->select('ccl.*', 'cc.ID')
                ->leftJoin('customer_comment as cc', 'cc.ID', '=', 'ccl.CommentID')
                ->where('ccl.CustomerID', Auth::user()->id)
                ->get();

            $voteID = DB::table('customer_vote as cv')
                ->select('cv.ID', 'cv.CustomerID', 'c.id')
                ->leftJoin('customers as c', 'cv.CustomerID', '=', 'c.id')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                ->where('cv.CustomerID', Auth::user()->id)
                ->where('pd.ProductID', $id)
                ->first();

            $sendAddress = $this->checkAddress();
        }

        // بدست آوردن زمان کامنت به صورت فارسی و زمان سپری شده از کامنت
        $commentsMinuets = array();
        $commentsHowDay = array();
        $PersianDate = array();
        foreach ($comments as $key => $row) {
            $d = $row->Date;
            $PersianDate[$key] = $this->convertDateToPersian($d);
            $commentsMinuets[$key] = $this->dateLenToNow($row->Date, $row->Time);
            $commentsHowDay[$key] = null;
            if ($commentsMinuets[$key] < 11520) {
                $commentsHowDay[$key] = $this->howDays($commentsMinuets[$key]);
            }
        }

        if (isset(Auth::user()->id)) {
            // گرفتن اطلاعات مربوط به کاربر جاری در جدول کاستومر کامنت
            $rating_tbl2 = DB::table('customer_vote as cv')
                ->select('*')
                ->leftJoin('product_detail as pd', 'pd.ID', '=', 'cv.ProductDetailID')
                ->where('CustomerID', Auth::user()->id)
                ->where('pd.ProductID', $id)
                ->first();

            // بررسی اینکه کاربر جاری نمره داده است یا نه؟
            if (isset($rating_tbl2->Rating))
                $customerRate = ($rating_tbl2->Rating !== null) ? $rating_tbl2->Rating : 0;
            else
                $customerRate = 0;
        } else
            $customerRate = 0;

        // بررسی اینکه کاربر جاری لایک کرده است  یا نه؟
        $like = (isset($rating_tbl2) && ($rating_tbl2->Like === 1)) ? 'like' : 'noLike';

        return view('Customer.Product', compact('sendAddress', 'data', 'size', 'voteID', 'rating', 'like', 'customerRate', 'comments', 'commentVote', 'commentsHowDay', 'PersianDate'));
    }

    public function bankingPortal($id, $qty)
    {
        $new = $this->newOrder($id, $qty, 0);

        return redirect()->route('userProfile', 'deliveryStatus');
    }

    public function returnProduct(Request $request)
    {
        // Upload Images
        date_default_timezone_set('Asia/Tehran');
        $folderName = 'r-' . date("Y.m.d-H.i.s");
        $picPath = '\img\return\\' . $folderName;
        File::makeDirectory($picPath, 0777, true, true);

        $request->file('returnPic')->storeAs(
            $picPath, 'pic' . '.jpg', 'public'
        );

        // Compilation Pic Path
        $picPath = $picPath . '\\';

        $poID = $request->get('orderIDFromReturn');
        $podID = $request->get('orderDetailIDFromReturn');
        $postCode = $request->get('returnPostCode');
        $reason = $request->get('returnReason');
        $reasonDetail = $request->get('returnReasonDetail');
        $card = $request->get('returnCard');
        $date = date('Y-m-d');
        $time = date('H:i:s');

        DB::table('product_return')->insert([
            'OrderDetailID' => $podID,
            'PostCode' => $postCode,
            'Reason' => $reason,
            'ReasonDetail' => $reasonDetail,
            'CreditCard' => $card,
            'ReturnPicPath' => $picPath,
            'Date' => $date,
            'Time' => $time,
        ]);

        DB::table('product_delivery')
            ->where('OrderDetailID', $podID)
            ->update([
                'DeliveryStatus' => '-1',
            ]);

        return redirect()->route('userProfile', 'returnProduct');
    }

    public function likeProduct($id, $val)
    {
        $data = DB::table('customer_vote')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->first();

        $val = ($val === 'true') ? 1 : 0;
        if (isset($data)) {
            DB::table('customer_vote')
                ->where('CustomerID', Auth::user()->id)
                ->where('ProductDetailID', $id)
                ->update([
                    'Like' => $val
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductDetailID' => $id,
                    'Like' => $val,
                    'Rating' => 0,
                ],
            ]);
        }
        $voteID = DB::table('customer_vote')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->first();
        return $voteID->ID;
    }

    public function ratingProduct($id, $val)
    {
        $data = DB::table('customer_vote')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->first();
        if (isset($data)) {
            DB::table('customer_vote')
                ->where('CustomerID', Auth::user()->id)
                ->where('ProductDetailID', $id)
                ->update([
                    'Rating' => $val
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductDetailID' => $id,
                    'Like' => 0,
                    'Rating' => $val,
                ],
            ]);
        }

        $voteID = DB::table('customer_vote')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->first();

        return $voteID->ID;
    }

    public function productNewComment($id, $val)
    {
        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        DB::table('customer_comment')->insert([
            [
                'CustomerID' => Auth::user()->id,
                'ProductID' => $id,
                'Comment' => $val,
                'Like' => 0,
                'Unlike' => 0,
                'Date' => $date,
                'Time' => $time,
            ],
        ]);

        return $id;
    }

    public function likeComment($id, $val)
    {
        $d = DB::table('customer_comment as cc')
            ->select('cc.*', 'ccl.*')
            ->leftJoin('customer_comment_like as ccl', 'ccl.CommentID', '=', 'cc.ID')
            ->where('cc.ID', $id)
            ->where('ccl.CustomerID', Auth::user()->id)
            ->first();

        $value = (($val === '1') || ($val === '-1')) ? '1' : '0';
        if (isset($d)) {
            DB::table('customer_comment_like')
                ->where('CommentID', $id)
                ->where('CustomerID', Auth::user()->id)
                ->update([
                    'CommentVote' => $value
                ]);
        } else {
            DB::table('customer_comment_like')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'CommentID' => $id,
                    'CommentVote' => '1',
                ],
            ]);
        }

        switch ($val) {
            case '0';
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->decrement('Like', 1);
                break;

            case '1':
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->increment('Like', 1);
                break;

            case '-1':
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->decrement('Unlike', 1);
                break;
        }
    }

    public function unLikeComment($id, $val)
    {
        $d = DB::table('customer_comment as cc')
            ->select('cc.*', 'ccl.*')
            ->leftJoin('customer_comment_like as ccl', 'ccl.CommentID', '=', 'cc.ID')
            ->where('cc.ID', $id)
            ->where('ccl.CustomerID', Auth::user()->id)
            ->first();

        $value = (($val === '1') || ($val === '-1')) ? '-1' : '0';
        if (isset($d)) {
            DB::table('customer_comment_like')
                ->where('CommentID', $id)
                ->update([
                    'CommentVote' => $value
                ]);
        } else {
            DB::table('customer_comment_like')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'CommentID' => $id,
                    'CommentVote' => '-1',
                ],
            ]);
        }

        switch ($val) {
            case '0';
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->decrement('Unlike', 1);
                break;

            case '1':
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->increment('Unlike', 1);
                break;

            case '-1':
                DB::table('customer_comment')
                    ->where('ID', $id)
                    ->decrement('Like', 1);
                break;
        }
    }

    public function sizeInfo($id, $size)
    {
        return DB::table('product_detail')
            ->select('ID', 'Color', 'Qty')
            ->where('ProductID', $id)
            ->where('Size', $size)
            ->get();
    }

    public function productCallMeExist($id)
    {
        DB::table('customer_call_product_exist')->insert([
            [
                'CustomerID' => Auth::user()->id,
                'ProductDetailID' => $id,
            ],
        ]);
    }

    public function CheckCallCustomer($id)
    {
        $data = DB::table('customer_call_product_exist')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->first();

        if (isset($data))
            return 'called';
        else
            return 'noCall';
    }

    public function removeCallCustomer($id)
    {
        DB::table('customer_call_product_exist')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductDetailID', $id)
            ->delete();
    }

    public function checkAddress()
    {
        return DB::table('customer_address')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('Status', 1)
            ->first();
    }

    public function cartCheck($id)
    {
        $exist = DB::table('product_cart')
            ->where('ProductDetailID', $id)
            ->where('CustomerID', Auth::user()->id)
            ->first();
        if ($exist === null)
            return 'empty';
        else
            return 'exist';
    }

// ------------------------------------------[ Products Filter ]--------------------------------------------------------
    public function genderFilter($gender) {
        switch ($gender) {
            case 'female':

                return DB::table('customers as c');
                break;
            case 'male':
                return 'male';
                break;
            case 'kids':
                return 'kids';
                break;
            default:
                return 'all';
                break;
        }
    }

// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------
    public function newOrder($id, $qty, $i)
    {
        $customerInfo = DB::table('customers as c')
            ->select('ca.*')
            ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
            ->where('c.id', Auth::user()->id)
            ->first();

        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        if ($i === 0) {
            DB::table('product_order')->insert([
                'CustomerID' => Auth::user()->id,
                'AddressID' => $customerInfo->ID,
                'Date' => $date,
                'Time' => $time,
            ]);
        }

        $orderID = DB::table('product_order')
            ->select('ID')
            ->max('ID');

        $productInfo = DB::table('product_detail as pd')
            ->select('pd.*', 'p.SellerID')
            ->leftJoin('product as p', 'p.ID', '=', 'pd.ProductID')
            ->where('pd.ID', $id)
            ->first();

        DB::table('product_order_detail')->insert([
            'SellerID' => $productInfo->SellerID,
            'ProductID' => $productInfo->ProductID,
            'ProductDetailID' => $id,
            'OrderID' => $orderID,
            'Qty' => $qty,
            'Size' => $productInfo->Size,
            'Color' => $productInfo->Color,
            'OrderBankCode' => '3#$ddf3e3continue3',
        ]);

        $orderDetailID = DB::table('product_order_detail')
            ->select('ID')
            ->max('ID');

        DB::table('product_delivery')->insert([
            'OrderDetailID' => $orderDetailID,
        ]);

        DB::table('product_detail')
            ->where('ID', $id)
            ->decrement('Qty', $qty);

        return true;
    }

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

    public function productListFilter($filter)
    {
        switch ($filter) {
            case 'gender-0':
                return array(DB::table('product')
                    ->select('*')
                    ->where('Gender', 'زنانه')
                    ->get(),'gender-0');
            case 'gender-1':
                return array(DB::table('product')
                    ->select('*')
                    ->where('Gender', 'مردانه')
                    ->get(), 'gender-1');
            case 'gender-2':
                return array(DB::table('product')
                    ->select('*')
                    ->where('Gender', 'بچگانه')
                    ->get(),'gender-2');
            case '0000':
                return array(DB::table('product')
                    ->select('*')
                    ->where('Cat', $filter)
                    ->get(),'0000');

            default:case '0001':
            return array(DB::table('product')
                ->select('*')
                ->where('Cat', $filter)
                ->get(),'0001');
        }
    }
}
