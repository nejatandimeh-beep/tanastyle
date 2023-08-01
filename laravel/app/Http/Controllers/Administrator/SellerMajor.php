<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;

class SellerMajor extends Controller
{
    public function adList()
    {
        $data=DB::table('ad_clothe as adc')
            ->select('adc.*','s.name')
            ->leftJoin('sellersmajor as s','s.id','adc.SellerMajorID')
            ->paginate(10);

        return view('Administrator.SellerMajor.Ad',compact('data'));
    }

    public function startAd()
    {
        $data = DB::table('ad_clothe as adc')
            ->select('adc.*','sp.Pic','s.Instagram','sp.ID as postID','s.Mobile','s.name')
            ->leftJoin('sellersmajor as s','s.id','adc.SellerMajorID')
            ->leftJoin('seller_major_post as sp','sp.SellerMajorID','adc.SellerMajorID')
            ->groupBy('adc.ID')
            ->get();

        $adLen = count($data);
        $loopLen = $adLen % 2 === 0 ? $adLen : $adLen - 1;
        $arr1 = array();
        $arr2 = array();
        for ($i = $loopLen - 1; $i >= 0; $i = $i - 2) {
            $arr1[$i] = $data[$i];
            $arr2[$i - 1] = $data[$i - 1];
        }
        DB::table('ad_clothe')
            ->insert([
                'SellerMajorID' => $data[0]->SellerMajorID,
                'PostID' => $data[0]->PostID,
            ]);
        DB::table('ad_clothe')
            ->where('ID', $data[0]->ID)
            ->delete();
        $arr1=array_values($arr1);
        $arr2=array_values($arr2);
        foreach ($arr1 as $key => $a1){
            try {
                $api_key = Config::get('kavenegar.apikey');
                $var = new Kavenegar\KavenegarApi($api_key);
                $template = "adSource";
                $type = "sms";
                $pic=str_replace('/','-',$a1->Pic);
                $link='/Seller-Major-AdSource/'.$a1->PostID.'/'.$a1->Instagram.'/'.$pic;

                $result = $var->VerifyLookup($arr2[$key]->Mobile, $link, null,null, $template, $type);
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }
        }
        foreach ($arr2 as $key => $a2){
            try {
                $api_key = Config::get('kavenegar.apikey');
                $var = new Kavenegar\KavenegarApi($api_key);
                $template = "adSource";
                $type = "sms";
                $pic=str_replace('/','-',$a2->Pic);
                $link='/Seller-Major-AdSource/'.$a2->PostID.'/'.$a2->Instagram.'/'.$pic;

                $result = $var->VerifyLookup($arr1[$key]->Mobile, $link, null,null, $template, $type);
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }
        }
        dd('success');
    }

    public function adSource($postID,$instagram,$pic)
    {
        $pic=str_replace('-','/',$pic);
        $pic=$pic.'/'.$postID.'/0.jpg';
        return view('Administrator.SellerMajor.AdSource',compact('instagram','pic'));
    }

// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------

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

    public function convertDateToGregorian($d)
    {
        return Verta::getGregorian($d->y, $d->m, $d->d);
    }

    public function addZero($d)
    {
        for ($i = 0; $i < 3; $i++)
            if (strlen($d[$i]) < 2)
                $d[$i] = '0' . $d[$i];

        return $d[0] . '-' . $d[1] . '-' . $d[2];
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
