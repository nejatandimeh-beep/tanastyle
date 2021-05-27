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

class Seller extends Controller
{
    public function sellerNew(Request $request)
    {
        $name = $request->get('name');
        $family = $request->get('family');
        $email = $request->get('email');
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
        $homeAddress = $request->get('homeAddress');
        $homePostalCode = $request->get('homePostalCode');
        $workAddress = $request->get('workAddress');
        $workPostalCode = $request->get('workPostalCode');
        $creditCard = (string)$request->get('creditCard4').(string)$request->get('creditCard3').(string)$request->get('creditCard2').(string)$request->get('creditCard1');

        File::makeDirectory($nationalId, 0777, true, true);
        // Upload Images
        $path = 'img\SellerProfileImage\\'.$nationalId.'\\';
        $request->file('pic11')->storeAs(
            $path, 'user'. '.png', 'public'
        );

        $nationalIDImage = 'img\SellerProfileImage\\';
        $request->file('pic12')->storeAs(
            $path, 'nationalityCard'. '.png', 'public'
        );

        DB::table('seller_new')
            ->insert([
                'Name' => $name,
                'Family' => $family,
                'Email' => $email,
                'NationalID' => $nationalId,
                'BDay' => $day,
                'BMon' => $mon,
                'BYear' => $year,
                'Gender' => $gender,
                'PrePhone' => $prePhone,
                'Phone' => $phone,
                'Mobile' => $mobile,
                'State' => $state,
                'City' => $city,
                'HomeAddress' => $homeAddress,
                'HomePostalCode' => $homePostalCode,
                'WorkAddress' => $workAddress,
                'WorkPostalCode' => $workPostalCode,
                'CreditCard' => $creditCard,
                'SellerPicPath' => 'img\SellerProfileImage\\' . $path,
                'NationalPicPath' => 'img\SellerCreditCardImage\\' . $nationalIDImage,
            ]);

        return redirect()->route('sellerRegister')->with('msg','success');
    }

    public function sellerVerify()
    {
        $data=DB::table('seller_new')
            ->select('ID','Name','Family','NationalID')
            ->get();
        return view('Administrator.Seller.Verify',compact('data'));
    }

    public function newSellerInfoDetail($id)
    {
        $data=DB::table('seller_new')
            ->select('*')
            ->where('ID',$id)
            ->first();

        return view('Administrator.Seller.VerifyDetail',compact('data'));
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
