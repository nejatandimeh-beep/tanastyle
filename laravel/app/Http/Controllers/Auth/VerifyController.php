<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Customer;
use Kavenegar;

class VerifyController extends Controller
{
    // نمایش فرم دریافت موبایل و ارسال کد
    public function getMobile(Request $request)
    {
        $source = $request->get('source');
        $mobile = (string)$request->get('mobile');

        // بررسی حالت forget
        if ($source === 'forget') {
            $mobileNum = DB::table('customers')
                ->select('Mobile')
                ->where('Mobile', $mobile)
                ->first();

            if (is_null($mobileNum)) {
                return redirect()->route('requestMobile', ['source' => 'forget'])
                    ->with('message', 'شما قبلا ثبت نام نکرده‌اید');
            }
        }
        // چک کردن Session
        if (!Session::has('SEND')) {
            Session::put('SEND', time());
            Session::put('mobile', $mobile);
            Session::put('source', $source);

            $customerExist = Customer::where('Mobile', $mobile)->first();

            if ($source === 'register') {
                if (!$customerExist) {
                    try {
                        $this->sendToken($mobile);
                    } catch (\Exception $e) {
                        Session::forget('SEND');
                        return redirect()->route('requestMobile', ['source' => 'register'])
                            ->with('message', 'شماره موبایل نامعتبر است');
                    }
                    return view('auth.verifyMobile');
                } else {
                    Session::forget('SEND');
                    return redirect()->route('requestMobile', ['source' => 'register'])
                        ->with('message', 'شماره موبایل قبلا ثبت نام کرده است');
                }
            } else {
                try {
                    $this->sendToken($mobile);
                } catch (\Exception $e) {
                    Session::forget('SEND');
                    return redirect()->route('requestMobile', ['source' => 'forget'])
                        ->with('message', 'شماره موبایل نامعتبر است');
                }
                return view('auth.verifyMobile');
            }
        } else {
            $timer = time() - Session::get('SEND');
            if ($timer >= 120) {
                Session::forget('SEND');
                return redirect()->route('requestMobile', ['source' => $source]);
            } else {
                $timer = 120 - $timer;
                return view('auth.verifyMobile', compact('timer'));
            }
        }
    }

    // ارسال کد به موبایل
    public function sendToken($mobile)
    {
        $token = mt_rand(100000, 999999);
        Session::put('token', $token);

        $api_key = Config::get('kavenegar.apikey');
        $kavenegar = new Kavenegar\KavenegarApi($api_key);
        $template = "verifyUser";
        $type = "sms";

        $kavenegar->VerifyLookup($mobile, $token, null, null, $template, $type);
    }

    // تایید کد وارد شده
    public function verifyMobile(Request $request)
    {
        $verifyCode = $request->get('verifyCode');
        $source = Session::get('source');
        $mobile = Session::get('mobile');
        $customer = new Customer();

        if ($customer->validateToken($verifyCode)) {
            // پاک کردن Session
            Session::forget('SEND');

            if ($source === 'register') {
                return redirect()->route('register');
            } else {
                return view('auth.passwords.resetPassword');
            }
        } else {
            return back()->with('message', 'کد وارد شده اشتباه است');
        }
    }
}
