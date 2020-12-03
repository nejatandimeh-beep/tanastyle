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
            ->get();

        $delivery[] = array([
            'text' => '',
            'location' => ''
        ]);
        $deliveryTime = array();
        $orderHowDay = array();
        $persianDate = array();
        foreach ($order as $key => $rec) {
            $d = $rec->Date;
            $persianDate[$key] = $this->convertDateToPersian($d);
            switch ($persianDate[$key][1]) {
                case 1:
                    $persianDate[$key][3] = 'فروردین';
                    break;
                case 2:
                    $persianDate[$key][3] = 'اردیبهشت';
                    break;
                case 3:
                    $persianDate[$key][3] = 'خرداد';
                    break;
                case 4:
                    $persianDate[$key][3] = 'تیر';
                    break;
                case 5:
                    $persianDate[$key][3] = 'مرداد';
                    break;
                case 6:
                    $persianDate[$key][3] = 'شهریور';
                    break;
                case 7:
                    $persianDate[$key][3] = 'مهر';
                    break;
                case 8:
                    $persianDate[$key][3] = 'آبان';
                    break;
                case 9:
                    $persianDate[$key][3] = 'آذر';
                    break;
                case 10:
                    $persianDate[$key][3] = 'دی';
                    break;
                case 11:
                    $persianDate[$key][3] = 'بهمن';
                    break;
                case 12:
                    $persianDate[$key][3] = 'اسفند';
                    break;
            }
            $orderMinuets[$key] = $this->dateLenToNow($rec->Date, $rec->Time);
            $orderHowDay[$key] = null;
            if ($orderMinuets[$key] < 11520) {
                $orderHowDay[$key] = $this->howDays($orderMinuets[$key]);
            }

            //delivery
            // محاسبه نوار زمانی تحویل محصول به درصد و منهای اندازه آیکون ماشین
            if ($rec->DeliveryStatus !== '3')
                    $deliveryTime[$key] = round( $this->dateLenToNow($rec->Date, $rec->Time) / 7200 * 100);
            switch (true) {
                case ($deliveryTime[$key]<=20):
                    $delivery[$key]['text'] = 'در صف';
                    $delivery[$key]['location'] = 'بسته بندی';
                    break;
                case ($deliveryTime[$key]>20) && ($deliveryTime[$key]<=40):
                    $delivery[$key]['text'] = 'در صف';
                    $delivery[$key]['location'] = 'ارســال';
                    break;
                case ($deliveryTime[$key]>40):
                    $delivery[$key]['text'] = 'تحویل به';
                    $delivery[$key]['location'] = 'پست';
                    break;
                default:
                    break;
            }
        }

        return view('Customer.Profile', compact('id', 'customer', 'address', 'order', 'persianDate', 'orderHowDay', 'delivery', 'deliveryTime'));
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

    public function productList()
    {
        $product_table = DB::table('product')
            ->select('*')
            ->get();

        $product_Detail_table = DB::table('product_detail')
            ->select('*')
            ->orderBy('Size')
            ->get();

        $empty = $this->checkEmpty($product_table, $product_Detail_table);

        return view('Customer.femaleProductList', compact('product_table', 'product_Detail_table', 'empty'));
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

        // سازمندهی کردن جزییات مربوط به محصول(سایز، رنگ، تعداد)
        $size[] = array('pdId', 'size');
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
            ->select('cv.*', 'c.name', 'c.Family')
            ->leftJoin('customers as c', 'cv.CustomerID', '=', 'c.ID')
            ->where('ProductID', $id)
            ->get();

        // rating & comment
        $rating = 0;
        foreach ($rating_tbl as $key => $info) {
            $rating += $info->Rating;
        }
        if ($rating !== 0)
            $rating = round($rating / count($rating_tbl));

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
                ->where('cv.CustomerID', Auth::user()->id)
                ->where('cv.ProductID', $id)
                ->first();

            $sendAddress = $this->checkAddress();
        }

        // بدست آوردن زمان کامنت به صورت فارسی و زمان سپری شده از کامنت
        $commentsMinuets = array();
        $commentsHowDay = array();
        $PersianDate = array();
        foreach ($comments as $key => $rec) {
            $d = $rec->Date;
            $PersianDate[$key] = $this->convertDateToPersian($d);
            $commentsMinuets[$key] = $this->dateLenToNow($rec->Date, $rec->Time);
            $commentsHowDay[$key] = null;
            if ($commentsMinuets[$key] < 11520) {
                $commentsHowDay[$key] = $this->howDays($commentsMinuets[$key]);
            }
        }

        if (isset(Auth::user()->id)) {
            // گرفتن اطلاعات مربوط به کاربر جاری در جدول کاستومر کامنت
            $rating_tbl2 = DB::table('customer_vote')
                ->select('*')
                ->where('ProductID', $id)
                ->where('CustomerID', Auth::user()->id)
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
        $customerInfo = DB::table('customers as c')
            ->select('ca.*')
            ->leftJoin('customer_address as ca', 'ca.CustomerID', '=', 'c.id')
            ->where('c.id', Auth::user()->id)
            ->first();

        date_default_timezone_set('Asia/Tehran');
        $date = date('Y-m-d');
        $time = date('H:i:s');
        DB::table('product_order')->insert([
            'CustomerID' => Auth::user()->id,
            'AddressID' => $customerInfo->ID,
            'Date' => $date,
            'Time' => $time,
            'DeliveryStatus' => 0,
            'DeliveryStatusDetail' => '--',
        ]);

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

        DB::table('product_detail')
            ->where('ID', $id)
            ->decrement('Qty', $qty);

        return redirect()->route('userProfile', 'deliveryStatus');
    }

    public function likeProduct($id, $val)
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
                    'Like' => $val
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductID' => $id,
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

    public function ratingProduct($id, $val)
    {
        $data = DB::table('customer_vote')
            ->where('CustomerID', Auth::user()->id)
            ->where('ProductID', $id)
            ->first();

        if (isset($data)) {
            DB::table('customer_vote')
                ->where('CustomerID', Auth::user()->id)
                ->where('ProductID', $id)
                ->update([
                    'Rating' => $val
                ]);
        } else {
            DB::table('customer_vote')->insert([
                [
                    'CustomerID' => Auth::user()->id,
                    'ProductID' => $id,
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

// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------
    public function checkEmpty($tbl_p, $tbl_pd)
    {
        // check empty product stock
        $i = 0;
        $empty[] = '';
        foreach ($tbl_p as $data) {
            $stock = 0;
            foreach ($tbl_pd as $detail) {
                if ($detail->ProductID === $data->ID)
                    $stock += $detail->Qty;
            }
            if ($stock === 0) {
                $empty[$i] = $data->ID;
                $i++;
            }
        }
        return $empty;
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

    //  Convert Date to Gregorian Calender
    public function convertDateToGregorian($d)
    {
        return Verta::getGregorian($d->y, $d->m, $d->d);
    }

    // Add Zero Number to Day and Month of Converted Dates
    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];

        return $d[0] . '-' . $d[1] . '-' . $d[2];
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
                return 'یک هفته قبل';
                break;
            default :
                break;
        }
    }
}
