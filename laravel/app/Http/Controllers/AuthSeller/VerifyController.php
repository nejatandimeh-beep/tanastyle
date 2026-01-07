<?php

namespace App\Http\Controllers\AuthSeller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Seller;
use Kavenegar;

class VerifyController extends Controller
{
    // نمایش فرم درخواست شماره موبایل
    public function showMobileForm()
    {
        return view('auth.sellerAuth.requestMobile');
    }

    // دریافت شماره موبایل و ارسال کد
    public function getMobile(Request $request)
    {
        $mobile = (string) $request->get('mobile');

        if (Session::has('mobile') && Session::get('mobile') !== $mobile) {
            Session::forget('SENDSeller');
            Session::forget('tokenSeller');
        }

        $mobileNum = Seller::where('Mobile', $mobile)->first();
        if (!$mobileNum) {
            return redirect()->route('sellers.showMobileRequestForm')
                ->with('message', 'شما قبلا ثبت نام نکرده‌اید');
        }

        if (!Session::has('SENDSeller')) {
            Session::put('SENDSeller', time());
            Session::put('mobile', $mobile);

            try {
                $this->sendToken($mobile);
            } catch (\Exception $e) {
                Session::forget('SENDSeller');
                return redirect()->route('sellers.showMobileRequestForm')
                    ->with('message', 'شماره موبایل نامعتبر است');
            }

            return view('auth.sellerAuth.verifyMobile', ['mobile' => $mobile]);
        }

        $timer = time() - Session::get('SENDSeller');
        if ($timer >= 120) {
            Session::forget('SENDSeller');
            return redirect()->route('sellers.showMobileRequestForm');
        } else {
            $timer = 120 - $timer;
            return view('auth.sellerAuth.verifyMobile', ['timer' => $timer, 'mobile' => $mobile]);
        }
    }

    // ارسال کد
    public function sendToken($mobile)
    {
        $token = mt_rand(100000, 999999);
        Session::put('tokenSeller', $token);

        $api_key = Config::get('kavenegar.apikey');
        $kavenegar = new Kavenegar\KavenegarApi($api_key);
        $template = "verifySeller";
        $type = "sms";

        $kavenegar->VerifyLookup($mobile, $token, null, null, $template, $type);
    }

    // تایید کد
    public function verifyMobile(Request $request)
    {
        $verifyCode = $request->get('verifyCode');
        $mobile = Session::get('mobile');

        if (Session::get('tokenSeller') == $verifyCode) {
            Session::forget('SENDSeller');
            Session::forget('tokenSeller');
            return response()->json([
                'success' => true,
                'redirect' => route('sellerShowResetForm')
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'کد وارد شده اشتباه است'
            ], 422);
        }
    }

    // ارسال مجدد کد
    public function resendCode(Request $request)
    {
        $mobile = Session::get('mobile');
        if (!$mobile) {
            return response()->json(['success' => false, 'message' => 'شماره موبایل یافت نشد'], 422);
        }

        $this->sendToken($mobile);
        return response()->json(['success' => true, 'message' => 'کد جدید ارسال شد']);
    }
}
