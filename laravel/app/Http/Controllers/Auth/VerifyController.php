<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
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
        $this->sendToken($mobile);

        return view('auth.verifyMobile');

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

    public function verifyPhone(Request $req)
    {

        $customer = new Customer();
        $verifyCode = $req->get('verifyCode');
        $source = Session::get('source');
        $mobile = Session::get('mobile');
//        $customer = Customer::where('mobile', $mobile)->first();

        if ($customer->validateToken($verifyCode)) {
//            echo "Success";
//            $tel = Auth::user()->phone_number;
//            echo $tel;
            if ($source === 'register')
                return redirect()->route('register');
            else
                dd($source);
        } else {
//            $this->create($mobile);
//            $customer = Customer::where('phone_number', $mobile)->first();
//            Auth::login($customer);
            echo "کد وارد شده اشتباه است";
        }
        return true;
    }


}
