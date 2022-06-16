<?php

namespace App\Http\Controllers\AuthSeller;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Seller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use File;
use Kavenegar;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Seller-Panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    // Superadmin Register
    public function showSellerRegisterForm()
    {
        return view('auth.sellerAuth.register');
    }

    public function uploadImage(Request $request)
    {
        $nationalId = $request->get('nationalId');
        $imgNumber = $request->get('imgNumber');
        $image = $request->get('imageUrl');
        $path = public_path('img/imagesTemp/SellerProfileImage/') . $nationalId;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/pic' . $imgNumber . '.jpg';
        file_put_contents($imageFullPath, $image_base64);

        return $imgNumber;
    }

    public function new(Request $request)
    {
        $nationalId = $request->get('nationalId');
        $path =  'img/imagesTemp/SellerProfileImage/'. $nationalId . '/';

        DB::table('seller_new')
            ->insert([
                'Name' => $request->get('name'),
                'Family' => $request->get('family'),
                'Email' => $request->get('email'),
                'NationalID' => $nationalId,
                'BDay' => $request->get('day'),
                'BMon' => $request->get('mon'),
                'BYear' => $request->get('year'),
                'Gender' => $request->get('gender'),
                'PrePhone' => $request->get('prePhone'),
                'Phone' => $request->get('phone'),
                'Mobile' => $request->get('mobile'),
                'State' => $request->get('state'),
                'City' => $request->get('city'),
                'HomeAddress' => $request->get('homeAddress'),
                'HomePostalCode' => $request->get('homePostalCode'),
                'WorkAddress' => $request->get('workAddress'),
                'WorkPostalCode' => $request->get('workPostalCode'),
                'ShopNumber' => $request->get('shopNumber'),
                'CreditCard' => (string)$request->get('creditCard4') . (string)$request->get('creditCard3') . (string)$request->get('creditCard2') . (string)$request->get('creditCard1'),
                'PicPath' => $path,
                'Signature' => $request->get('signature'),
            ]);

        return redirect()->route('sellerRegister')->with('msg', 'success');
    }

    protected function createSeller(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:sellers',
//            'password' => 'required|string|min:8|confirmed',
//        ]);
        $nationalId = $request->get('nationalId');
        $tempPath =  public_path('img\imagesTemp\SellerProfileImage\\') . $nationalId;
        $path =  public_path('img\SellerProfileImage\\'). $nationalId;
        $file = new Filesystem();
        $file->moveDirectory($tempPath, $path,true);

        $name = $request['name'];
        $family = $request['family'];
        $mobile = $request['mobile'];
        $password = $this->randomPassword();
        $seller = Seller::create([
            'name' => $name,
            'Family' => $family,
            'NationalID' => $nationalId,
            'Birthday' => $request['year'] . '/' . $request['mon'] . '/' . $request['day'],
            'Gender' => (int)$request['gender'],
            'Phone' => $request['prePhone'] . $request['phone'],
            'Mobile' => $mobile,
            'State' => $request['state'],
            'City' => $request['city'],
            'Address' => $request['workAddress'],
            'ShopNumber' => $request['shopNumber'],
            'HomeAddress' => $request['homeAddress'],
            'HomePostalCode' => $request['homePostalCode'],
            'WorkPostalCode' => $request['workPostalCode'],
            'PicPath' => $request['userImage'],
            'PicPathCard' => $request['nationalityCardImage'],
            'Signature'=>$request['signature'],
            'email' => $request['email'],
            'password' => Hash::make($password),
        ]);

        $sellerID=DB::table('sellers')
            ->select('id','PasswordHint')
            ->orderBy('id','DESC')
            ->first();

        DB::table('sellers')
            ->select('id','PasswordHint')
            ->where('id',$sellerID->id)
            ->update([
                'PasswordHint'=>$password
            ]);


        $id = DB::table('sellers')
            ->select('id')
            ->orderBy('id', 'DESC')
            ->first();

        DB::table('seller_credit_card')
            ->insert([
                'SellerID' => $id->id,
                'CardNumber' => $request['creditCard1'] . '-' . $request['creditCard2'] . '-' . $request['creditCard3'] . '-' . $request['creditCard4'],
                'Status' => 1,
                'Wrong' => 0,
            ]);

        DB::table('seller_new')
            ->where('ID', $request->get('id'))
            ->delete();

        //--------------
        try {
            $token = $name;
            $token2 = $family;
            $token3 = $password;
            Session::put('token', $token);
            Session::put('token2', $token2);
            Session::put('token3', $token3);

            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "registerSeller";
            $type = "sms";

            $result = $var->VerifyLookup($mobile, $token, $token2, $token3, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        //--------------

//        return redirect()->intended('sellerVerify');
        return redirect()->route('sellerVerify');
    }

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#$%!@&';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 10; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
