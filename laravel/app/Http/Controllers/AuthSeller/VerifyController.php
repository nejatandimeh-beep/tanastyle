<?php

namespace App\Http\Controllers\AuthSeller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;
use App\Seller;

class VerifyController extends Controller
{
    function getMobile()
    {
        $mobileNum = DB::table('sellers')
            ->select('Mobile')
            ->where('Mobile', (string)$_GET['mobile'])
            ->first();
        if (is_null($mobileNum)){
            return redirect()->route('sellers.showMobileRequestForm')->with('message', 'شما قبلا ثبت نام نکرده اید');
        }

        session_start();
        if (!isset($_SESSION['SENDSeller'])) {
            $_SESSION['SENDSeller']=time();
            $seller = new Seller();
            $mobile = (string)$_GET['mobile'];
            Session::put('mobile', $mobile);
            $sellerExist = Seller::where('Mobile', $mobile)->first();
                try {
                    $this->sendToken($mobile);
                } catch (\Exception $e) {
                    unset($_SESSION['SENDSeller']);
                    return redirect()->route('sellers.showMobileRequestForm')->with('message', 'شماره موبایل نامعتبر است');
                }
                return view('auth.sellerAuth.verifyMobile');
        } else {
            $timer = time() - $_SESSION['SENDSeller'];
            if($timer>=120) {
                unset($_SESSION['SENDSeller']);
                return redirect()->route('sellers.showMobileRequestForm');
            } else {
                $timer=120-$timer;
                return view('auth.sellerAuth.verifyMobile',compact('timer'));
            }
        }
    }

    public function sendToken($mobile)
    {
        $token = mt_rand(100000, 999999);
        Session::put('token', $token);
//        Session::put('token', $token2);
//        Session::put('token', $token3);

        $api_key = Config::get('kavenegar.apikey');
        $var = new Kavenegar\KavenegarApi($api_key);
        $template = "verifySeller";
        $type = "sms";

        $result = $var->VerifyLookup($mobile, $token, null, null, $template, $type);
    }

    public function verifyMobile(Request $req)
    {
        session_start();
        $seller = new Seller();
        $verifyCode = $req->get('verifyCode');
        if ($seller->validateToken($verifyCode)) {
            unset($_SESSION['SENDSeller']);
            return view('auth.sellerAuth.passwords.resetPassword');
        } else {
            echo "کد وارد شده اشتباه است";
        }

        return true;
    }
}
