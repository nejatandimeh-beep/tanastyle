<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;
use App\Customer;

class VerifyController extends Controller
{
    function getMobile()
    {

        $customer = new Customer();
        $mobile = (string)$_GET['mobile'];
        Session::put('mobile', $mobile);
        $source = Session::get('source');
        $customerExist = Customer::where('Mobile', $mobile)->first();
        if ($source === 'register') {
            if (!isset($customerExist)) {
                try {

                    $this->sendToken($mobile);

                } catch (\Exception $e) {
                    return redirect()->route('requestMobile', ['source' => 'register'])->with('message', 'شماره موبایل نامعتبر است');
                }

                return view('auth.verifyMobile');
            } else {
                return redirect()->route('requestMobile', ['source' => 'register'])->with('message', 'شماره موبایل قبلا ثبت نام کرده است');
            }
        } else {
            try {

                $this->sendToken($mobile);

            } catch (\Exception $e) {
                return redirect()->route('requestMobile', ['source' => 'forget'])->with('message', 'شماره موبایل نامعتبر است');
            }
            return view('auth.verifyMobile');
        }
    }

    public function sendToken($mobile)
    {

        $token = mt_rand(100000, 999999);
        $token2 = mt_rand(100000, 999999);
        $token3 = mt_rand(100000, 999999);
        Session::put('token', $token);
//        Session::put('token', $token2);
//        Session::put('token', $token3);

        $api_key = Config::get('kavenegar.apikey');
        $var = new Kavenegar\KavenegarApi($api_key);
        $template = "verifyUser";
        $type = "sms";

        $result = $var->VerifyLookup($mobile, $token, $token2, $token3, $template, $type);

    }

    public function verifyMobile(Request $req)
    {

        $customer = new Customer();
        $verifyCode = $req->get('verifyCode');
        $source = Session::get('source');
        $mobile = Session::get('mobile');

        if ($customer->validateToken($verifyCode)) {
//            echo "Success";
//            $tel = Auth::user()->phone_number;
//            echo $tel;
            if ($source === 'register')

                return redirect()->route('register');
            else
                return view('auth.passwords.resetPassword');
        } else {
//            $this->create($mobile);
//            $customer = Customer::where('phone_number', $mobile)->first();
//            Auth::login($customer);
            echo "کد وارد شده اشتباه است";
        }

        return true;
    }
}
