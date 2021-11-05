<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Picture;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;

class Basic extends Controller
{
    public function Master()
    {
//        $data=DB::table('product as p')
//            ->select('*')
//            ->leftJoin('product_detail as pd','pd.ProductID','=','p.ID')
//            ->leftJoin('product_order_detail as pod','pod.ProductDetailID','=','pd.ID')
//            ->orderBy('pod.SellCount')
//            ->take(10)
//            ->get();
        $minDiscount = 1;
        $maxDiscount = 99;

        $data = DB::table('product as p')
            ->select('*')
            ->rightJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->orderBy('Discount', 'DESC')
            ->orderBy('pd.VisitCounter', 'DESC')
            ->whereBetween('Discount', [$minDiscount, $maxDiscount])
            ->take(10)
            ->get();

        return view('Customer.Master', compact('data'));
    }

    public function userProfile($location)
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
                    $deliveryTime[$key] = 10;
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
                case '22':
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'بسته بندی';
                    $deliveryTime[$key] = 20;
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
                    $deliveryTime[$key] = 30;
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
                    $deliveryHint[$key]['text'] = 'در دست';
                    $deliveryHint[$key]['location'] = 'پست';

                    $deliveryTime[$key] = 40 + round(($deliveryMin[$key] / 7200 * 100) * (60 / 100));
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
                    $returnTime[$key] = round(($returnMin[$key] / 3240 * 100) * 50 / 100);
                    // تا سه روز بعد از بازگشت و ساعت 14 روز سوم خطایی رخ نمی دهد.
                    if ($returnMin[$key] > 3240) {
                        $returnTime[$key] = 50;
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
                    $returnTime[$key] = 60;
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
                case '22':
                    $returnHint[$key]['text'] = 'در دست';
                    $returnHint[$key]['location'] = 'بررسی ایرادات';
                    $returnTime[$key] = 70;
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
                    $returnTime[$key] = 80;
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
            ->select('po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID', 'po.ID as orderID', 'pd.PicNumber')
            ->leftJoin('product_order_detail as pod', 'pod.OrderID', '=', 'po.ID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', function ($join) {
                $join->on('pd.ID', '=', 'pod.ProductDetailID');
            })
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();

        $delivery = DB::table('product_delivery as delivery')
            ->select('delivery.*', 'po.*', 'pod.*', 'p.*', 'pod.ID as orderDetailID', 'pd.PicNumber')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'delivery.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', function ($join) {
                $join->on('pd.ID', '=', 'pod.ProductDetailID');
            })
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pod.ID', 'DESC')
            ->get();

        $return = DB::table('product_return as pr')
            ->select('*', 'pr.Date as returnDate')
            ->leftJoin('product_order_detail as pod', 'pod.ID', '=', 'pr.OrderDetailID')
            ->leftJoin('product_order as po', 'po.ID', '=', 'pod.OrderID')
            ->leftJoin('product as p', 'p.ID', '=', 'pod.ProductID')
            ->leftJoin('product_detail as pd', function ($join) {
                $join->on('pd.ID', '=', 'pod.ProductDetailID');
            })
            ->where('po.CustomerID', Auth::user()->id)
            ->orderBy('pr.Date', 'DESC')
            ->get();

        return view('Customer.Profile', compact('location', 'customer', 'address',
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

    public function cartCount()
    {
        $data = DB::table('product_cart')
            ->select('CustomerID')
            ->where('CustomerID', auth::user()->id)
            ->get();

        return $data->count();
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

    public function cartDelete($id)
    {
        DB::table('product_cart')
            ->where('ProductDetailID', $id)
            ->delete();
        $cartCount = DB::table('product_cart')->get();
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

    public function checkCartNumber()
    {
        $data = DB::table('product_cart')
            ->where('CustomerID', Auth::user()->id)
            ->get();

        return array($data->count(), $data);
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

    public function cartQtyCheck($pdID)
    {
        $pdID = json_decode($pdID);
        // گرفتن تمامی جزییات مربوط به محصول کلیک شده
        return DB::table('product_detail')
            ->select('ID', 'Qty')
            ->whereIn('ID', $pdID)
            ->get();
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

    public function attachAddress($location, $size, $color)
    {

        Session::put('color', $color);
        Session::put('size', $size);

        return redirect()->route('userProfile', $location);
    }

    public function addAddress(Request $request)
    {
        $size = Session::get('size');
        $color = Session::get('color');
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
            return redirect()->route('productDetail', [$productID, $size, $color]);
        }
    }

    public function addressDelete($id)
    {
        DB::table('customer_address')
            ->select('ID')
            ->where('ID', $id)
            ->delete();
    }

    public function productDetail($id, $sizeInfo, $colorInfo)
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
            ->where('ProductID', $id)
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
            ->select('c.name', 'c.Family', 'cc.*', 'cc.ID as ccID', 'c.PicPath')
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
                ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'cv.ProductID')
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
                ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'cv.ProductID')
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

        $similarProduct = DB::table('product as p')
            ->select('*')
            ->rightJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('p.GenderCode', $data->GenderCode)
            ->where('p.CatCode', $data->CatCode)
            ->where('p.ID', '<>', $id)
            ->orderBy('pd.VisitCounter', 'DESC')
            ->take(10)
            ->get();

        // بررسی اینکه کاربر جاری لایک کرده است  یا نه؟
        $like = (isset($rating_tbl2) && ($rating_tbl2->Like === 1)) ? 'like' : 'noLike';
        return view('Customer.Product', compact('sendAddress', 'data', 'size', 'voteID', 'rating', 'like', 'customerRate', 'comments', 'commentVote', 'commentsHowDay', 'PersianDate', 'sizeInfo', 'colorInfo', 'similarProduct'));
    }

    public function productVisit($id)
    {
        DB::table('product_detail')
            ->where('ID', $id)
            ->update([
                'visitCounter' => DB::raw('visitCounter + 1'),
            ]);
        return 'Visit: Success';
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
        $picPath = public_path('/img/return/') . $folderName;
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

    public function likeProduct($id, $idDetail, $val)
    {
        $data = DB::table('customer_vote')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductID', $id)
            ->first();

        $val = ($val === 'true') ? 1 : 0;
        if (isset($data)) {
            DB::table('customer_vote')
                ->where('CustomerID', Auth::user()->id)
                ->where('ProductID', $id)
                ->update([
                    'Like' => $val,
                    'ProductDetailID' => $idDetail
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductID' => $id,
                    'ProductDetailID' => $idDetail,
                    'Like' => $val,
                    'Rating' => 0,
                ],
            ]);
        }
        $voteID = DB::table('customer_vote')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductID', $id)
            ->first();
        return $voteID->ID;
    }

    public function ratingProduct($id, $idDetail, $val)
    {
        $data = DB::table('customer_vote')
            ->select('CustomerID', 'ProductID')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductID', $id)
            ->first();

        if (isset($data)) {
            DB::table('customer_vote')
                ->where('CustomerID', Auth::user()->id)
                ->where('ProductID', $id)
                ->update([
                    'Rating' => $val,
                    'ProductDetailID' => $idDetail
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductID' => $id,
                    'ProductDetailID' => $idDetail,
                    'Like' => 0,
                    'Rating' => $val,
                ],
            ]);
        }

        $voteID = DB::table('customer_vote')
            ->select('*')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductID', $id)
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
            ->select('ID', 'Color', 'Qty', 'HexCode', 'PicNumber')
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

    public function customerVerify()
    {
        return redirect()->route('Master');
    }

    public function uploadImage(Request $request)
    {
        $image = $request->get('imageUrl');
        $folderPath = public_path('img/CustomerProfileImage/');
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = Auth::user()->id . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        DB::table('customers')
            ->where('id', Auth::user()->id)
            ->update([
                'PicPath' => 'img\CustomerProfileImage\\' . $imageName,
            ]);

        return redirect()->route('userProfile', 'profileImageChange');

    }

    public function connection()
    {
        $data = DB::table('customer_conversation as cc')
            ->select('cc.*',
                'ccd.QuestionDate as qDate',
                'ccd.QuestionTime as qTime',
                'ccd.AnswerDate as aDate',
                'ccd.AnswerTime as aTime',
                'ccd.Replay',
                'ccd.ConversationID',
                'ccd.ID as conversationDetailID')
            ->leftJoin('customer_conversation_detail as ccd', 'ccd.ConversationID', '=', 'cc.ID')
            ->where('cc.CustomerID', Auth::user()->id)
            ->orderBy('cc.Status')
            ->orderBy(DB::raw('IF(cc.Status=0 || cc.Status=1, cc.Priority, false)'), 'ASC')
            ->orderBy('cc.ID', 'DESC')
            ->get();

        // Convert Date
        $persianDate = array();
        foreach ($data as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
        }

        return view('Customer.Conversation', compact('data', 'persianDate'));
    }

    public function connectionDetail($id, $status)
    {
        $data = DB::table('customer_conversation_detail as ccd')
            ->select('ccd.*', 'cc.Subject', 'cc.Status', 'cc.ID as ConversationID', 'cc.CustomerID', 'c.Name', 'c.Family')
            ->leftJoin('customer_conversation as cc', 'cc.ID', '=', 'ccd.ConversationID')
            ->leftJoin('customers as c', 'c.ID', '=', 'cc.CustomerID')
            ->where('ccd.ConversationID', $id)
            ->paginate(10);

        if ($status === '0') {
            foreach ($data as $key => $rec)
                if ($rec->Replay !== 0) {
                    DB::table('customer_conversation')
                        ->where('ID', $id)
                        ->update(['Status' => 2]);
                } else {
                    DB::table('customer_conversation')
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

        return view('Customer.ConversationDetail', compact('data', 'answerHowDay', 'questionHowDay', 'qPersianDate', 'aPersianDate'));
    }

    public function connectionNew(Request $request)
    {
        $title = $request->get('title');
        $priority = $request->get('priority');
        $section = $request->get('section');

        return view('Customer.ConversationDetail', compact('title', 'priority', 'section'));
    }

    public function connectionNewMsg(Request $request)
    {

        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $customerID = Auth::user()->id;
        $question = $request->get('question');
        $title = $request->get('title');

        if (isset($title)) {
            $priority = $request->get('priority');
            $section = $request->get('section');
            // Insert Data to Conversation
            DB::table('customer_conversation')->insert([
                [
                    'CustomerID' => $customerID,
                    'Subject' => $title,
                    'Section' => $section,
                    'priority' => $priority,
                    'Status' => 1,
                    'Date' => $date,
                    'Time' => $time,
                ],
            ]);

            $conversationID = DB::table('customer_conversation')
                ->select('ID')
                ->latest('ID')
                ->first();

            $conversationID = $conversationID->ID;
        } else {
            $conversationID = $request->get('conversationID');
        }
        DB::table('customer_conversation')
            ->where('ID', $conversationID)
            ->update(['Status' => 1]);

        // Insert Data to Conversation_detail
        DB::table('customer_conversation_detail')->insert([
            [
                'ConversationID' => $conversationID,
                'Question' => $question,
                'Answer' => '',
                'QuestionDate' => $date,
                'QuestionTime' => $time,
                'Replay' => 0,
            ],
        ]);

        return redirect('/Customer-Connection')->with('status', 'success');
    }

// ------------------------------------------[ Products Filter ]--------------------------------------------------------
    public function productFilter($gender, $cat, $size, $priceMin, $priceMax, $color, $filterChange)
    {
        session_start();
        if ($filterChange == 1)
            $_SESSION['listSkip'] = 0;

        $gender = json_decode($gender);
        $cat = json_decode($cat);
        $size = json_decode($size);
        $color = json_decode($color);

        if(!isset($size[0]))
            $size[0]='empty';

        $data = DB::table('product as p')
            ->select('p.*', 'pd.*')
            ->leftJoin('product_detail as pd', 'p.ID', '=', 'pd.ProductID')
            ->whereIn('p.GenderCode', $gender)
            ->whereIn('p.CatCode', $cat)
//            ->whereIn('pd.Size', $size)
            ->Where(function ($query) use($size) {
                for ($i = 0; $i < count($size); $i++) {
                    $query->orwhere('pd.Size', 'like',  $size[$i] . '%');
                }
            })
            ->whereIn('pd.ColorCode', $color)
            ->whereBetween('p.FinalPrice', [$priceMin, $priceMax])
            ->orderBy('p.GenderCode')
            ->orderBy('p.CatCode')
//            ->groupBy('p.ID')
            ->skip($_SESSION['listSkip'])
            ->take(10)
            ->get();

        $_SESSION['listSkip'] += 10;

        $products = '';
        foreach ($data as $key => $row) {
            $products = $products . '<div class="col-12 col-lg-4 g-mb-30 filterApply">
    <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                    class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
        <div class="g-pt-10">
            <div id="carousel-08-1"
             class="js-carousel text-center g-mb-20"
             data-infinite="1"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
             data-nav-for="#carousel-08-2">

                 <div class="js-slide">
                    <a
                        href="' . route('productDetail', [$row->ProductID, $row->Size, $row->Color]) . '">
                        <img class="img-fluid w-100" src="' . $row->PicPath . $row->PicNumber . '.jpg" alt="Image Description">
                    </a>
                 </div>
            </div>
        </div>
         <div style="direction: rtl" class="media g-mt-20 g-brd-top g-brd-gray-light-v4 g-pt-20">
             <div class="d-flex justify-content-between col-12 p-0">
                <div class="d-flex flex-column">
                    <h4 class="h6 g-color-black my-1">
                        <span class="u-link-v5 g-color-black" tabindex="0">' . $row->Name . '
                            <span class="g-font-size-12 g-font-weight-300">' . $row->Model . '</span>
                        </span>
                    </h4>
                    <ul style="padding: 0"
                        class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-mb-5">
                        <li>
                            <span class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600 g-mb-5" href="#">' . $row->Size . ' ' . $row->Color . '</span>
                        </li>
                        <li>
                            <a class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600"
                               href="#">' . $row->Gender . ' ' . $row->HintCat . '</a>
                        </li>
                    </ul>
                </div>
                <a style="cursor: pointer"
                   class="u-icon-v1 g-mt-minus-5 g-color-gray-dark-v4 g-color-primary--hover rounded-circle g-ml-5"
                   data-toggle="tooltip"
                   data-placement="top"
                   href="https://tanastyle/Customer-Product-Detail/' . $row->ID . '"
                   data-original-title="جزئیات محصول">
                   <i class="icon-eye g-line-height-0_7"></i>
                </a>
            </div>
         </div>

          <div
            class="d-block g-color-black g-font-size-17 g-ml-10">
                <div style="direction: rtl" class="text-left">
                    <s class="g-color-lightred g-font-weight-500 g-font-size-13">' .
                number_format($row->UnitPrice) . '
                    </s>
                    <span>' . number_format($row->FinalPrice) . '</span>
                    <span
                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                </div>
          </div>
    </figure>
</div>

<span id="lineBreak" class="d-none">break</span>

';
        }
        return $products;
    }

// ---------------------------------------------[Product List]----------------------------------------------------------
    public function productFemaleList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'all';
        $title='پوشاک زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productFemaleClothesList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['a','b','c','d'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['a','b','c','d'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'clothes';
        $title='لباس زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productFemaleBagsList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->where('CatCode', 'e')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->where('CatCode', 'e')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'e';
        $title='کیف زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productFemaleShoesList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->where('CatCode', 'f')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->where('CatCode', 'f')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'f';
        $title='کفش زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productFemaleSportsList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['g','h','i','j','k','l','m'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['g','h','i','j','k','l','m'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'sports';
        $title='پوشاک ورزشی زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productFemaleRhinestoneList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['n','o','p','q'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '0')
            ->whereIn('CatCode', ['n','o','p','q'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '0';
        $catCode = 'rhinestone';
        $title='بدلیجات زنانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'all';
        $title='پوشاک مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleClothesList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['a','b','c','d'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['a','b','c','d'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'clothes';
        $title='لباس مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleBagsList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->where('CatCode', 'e')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->where('CatCode', 'e')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'e';
        $title='کیف مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleShoesList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->where('CatCode', 'f')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->where('CatCode', 'f')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'f';
        $title='کفش مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleSportsList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['g','h','i','j','k','l','m'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['g','h','i','j','k','l','m'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'sports';
        $title='پوشاک ورزشی مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productMaleRhinestoneList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['n','o','p','q'])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '1')
            ->whereIn('CatCode', ['n','o','p','q'])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = '1';
        $catCode = 'rhinestone';
        $title='بدلیجات مردانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productGirlList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '2')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '2')
            ->groupBy('p.ID')
            ->paginate(10);
        $gender = '2';
        $catCode = 'all';
        $title='پوشاک دخترانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productBoyList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '3')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '3')
            ->groupBy('p.ID')
            ->paginate(10);
        $gender = '3';
        $catCode = 'all';
        $title='پوشاک پسرانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productBabyGirlList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '4')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '4')
            ->groupBy('p.ID')
            ->paginate(10);
        $gender = '4';
        $catCode = 'all';
        $title='پوشاک نوزادی دخترانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productBabyBoyList()
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('GenderCode', '5')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('GenderCode', '5')
            ->groupBy('p.ID')
            ->paginate(10);
        $gender = '5';
        $catCode = 'all';
        $title='پوشاک نوزادی پسرانه';
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function productSearch($val)
    {
        $output = '';
        $data = DB::table('product')
            ->select('Name')
            ->where('Name', 'like', $val . '%')
            ->groupBy('Name')
            ->take(15)
            ->get();

        foreach ($data as $key => $row) {
            $output .= '<li style="border-radius: 0 !important;"
                        class="list-group-item g-color-gray-dark-v3 g-letter-spacing-0 g-opacity-0_8--hover">
                            <a  href="' . route('productSearchList', [$row->Name]) . '"
                                style="text-decoration: none"
                                class="col-12 p-0 text-right g-color-gray-dark-v3 g-color-primary--hover">
                             ' . $row->Name . '
                            </a>
                        </li>';
        }

        return $output;
    }

    public function productSearchList($val)
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('Name', 'like', $val . '%')
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('Name', 'like', $val . '%')
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = 'all';
        $catCode = 'all';
        $title=$data[0]->Name.' '.$data[0]->Gender;
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function spacialSelling($minDiscount, $maxDiscount)
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->whereBetween('Discount', [$minDiscount, $maxDiscount])
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID', 'p.Discount')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->whereBetween('Discount', [$minDiscount, $maxDiscount])
            ->groupBy('p.ID')
            ->paginate(10);

        $gender = 'all';
        $catCode = 'all';
        $title='قیمت بین '.$minDiscount.' تا '.$maxDiscount;
        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

    public function product($gender, $cat, $catCode,$title)
    {
        session_start();
        $_SESSION['listSkip'] = 0;

        $data = DB::table('product')
            ->select('*')
            ->where('genderCode', $gender)
            ->where('Cat', $cat)
            ->paginate(10);

        $size = DB::table('product as p')
            ->select('pd.Size', 'pd.Color', 'p.ID', 'p.Discount')
            ->leftJoin('product_detail as pd', 'pd.ProductID', '=', 'p.ID')
            ->where('genderCode', $gender)
            ->where('Cat', $cat)
            ->groupBy('p.ID')
            ->paginate(10);

        return view('Customer.ProductList', compact('data', 'gender', 'catCode', 'size','title'));
    }

// ----------------------------------------------[ Instagram ]----------------------------------------------------------
    public function instagram()
    {
        return view('Customer.Instagram');
    }

    public function requestPdId(Request $request)
    {
        $data = DB::table('product_detail')
            ->where('ID', $request->get('pdId'))
            ->first();

        if (isset($data->ID))
            return redirect()->route('productDetail', [$data->ProductID, $data->Size, $data->Color]);
        else
            return redirect()->route('instagram')->with('error', 'find');

    }

// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------
    public function newOrder($id, $qty, $i)
    {
        $customer = DB::table('customers')
            ->select('Mobile')
            ->where('id', Auth::user()->id)
            ->first();

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
            ->select('pd.*', 'p.SellerID','p.ID as productID','pd.ID as productDetailId')
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

        $deliveryMan = DB::table('delivery_men')
            ->select('*')
            ->get();

        $data = DB::table('product_delivery')
            ->select('DeliveryManID')
            ->get();

        if ($data->isEmpty() || $data->count() < 2) {
            DB::table('product_delivery')->insert([
                'OrderDetailID' => $orderDetailID,
                'DeliveryManID' => $deliveryMan[0]->ID,
            ]);
        } else {
            $data = DB::table('product_delivery')
                ->select('DeliveryManID')
                ->orderBy('id', 'desc')
                ->take($deliveryMan->count() - 1)
                ->get();

            $DeliveryManIDArr = array();
            foreach ($data as $key => $row) {
                $DeliveryManIDArr[$key] = $row->DeliveryManID;
            }

            $deliveryManTurn = '';
            foreach ($deliveryMan as $key => $row) {
                if (in_array($row->ID, $DeliveryManIDArr, true))
                    continue;
                else {
                    $deliveryManTurn = $row->ID;
                    break;
                }
            }

            DB::table('product_delivery')->insert([
                'OrderDetailID' => $orderDetailID,
                'DeliveryManID' => (int)$deliveryManTurn,
            ]);
        }


        DB::table('product_detail')
            ->where('ID', $id)
            ->decrement('Qty', $qty);

        DB::table('product_cart')
            ->where('ProductDetailID', $id)
            ->delete();

        $seller=DB::table('sellers')
            ->select('id','Mobile','name','family')
            ->where('id',$productInfo->SellerID)
            ->first();

        //--------------
        try {
            $token =$orderID.'/'.$orderDetailID;
            $token2='';
            $token3='';
            Session::put('token', $token);
//            Session::put('token2', $token2);
//            Session::put('token', $token3);

            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "factorSmsCustomer";
            $type = "sms";

            $result = $var->VerifyLookup(Auth::user()->Mobile, $token,$token2,$token3, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        //--------------

        //--------------
        try {
            $token=$seller->name.'/'.$seller->family;
            $token2 =$productInfo->ID.'/'.$productInfo->productDetailId;
            $token3 =$orderID.'/'.$orderDetailID;
            Session::put('token', $token);
            Session::put('token2', $token2);
            Session::put('token3', $token3);

            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "factorSmsSeller";
            $type = "sms";

            $result = $var->VerifyLookup($seller->Mobile, $token, $token2,$token3, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        //--------------

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
}
