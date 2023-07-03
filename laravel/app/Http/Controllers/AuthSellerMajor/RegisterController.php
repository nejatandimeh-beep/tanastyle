<?php

namespace App\Http\Controllers\AuthSellerMajor;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SellerMajor;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/Seller-Major-Panel';

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
            'mobile' => ['required', 'string', 'min:11'],
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
    public function registerForm()
    {
        return view('auth.sellerMajorAuth.register');
    }

    public function uploadImage(Request $request)
    {
        $mobile = $request->get('mobile');
        $imgNumber = $request->get('imgNumber');
        $image = $request->get('imageUrl');
        $path = public_path('img/imagesTemp/sellerMajorProfileImage/') . $mobile;
        File::makeDirectory($path, 0777, true, true);
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $imageFullPath = $path . '/profileImg.jpg';
        file_put_contents($imageFullPath, $image_base64);

        return $imgNumber;
    }

    protected function createSeller(Request $request)
    {
        $mobile = $request->get('mobile');
        $tempPath =  public_path('img\imagesTemp\sellerMajorProfileImage\\') . $mobile;
        $path =  public_path('img\SellerMajorProfileImage\\'). $mobile;
        $file = new Filesystem();
        $file->moveDirectory($tempPath, $path,true);

        $name = $request['name'];
        $category = $request['category'];
        $sellerMajor = SellerMajor::create([
            'name' => $name,
            'Mobile' => $mobile,
            'Category'=>$category,
            'HintCategory'=>$request['hintCategory'],
            'Pic' => 'img\SellerMajorProfileImage\\'.$mobile,
            'password' => Hash::make($request['password']),
        ]);

        //--------------
        try {
            $api_key = Config::get('kavenegar.apikey');
            $var = new Kavenegar\KavenegarApi($api_key);
            $template = "registerSellerMajor";
            $type = "sms";

            $result = $var->VerifyLookup($mobile, $name, null, null, $template, $type);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            echo $e->errorMessage();
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            echo $e->errorMessage();
        }
        //--------------
        Auth::guard('sellerMajor')->loginUsingId($sellerMajor->id, TRUE);
        return redirect()->route('sellerMajorPanel');
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
