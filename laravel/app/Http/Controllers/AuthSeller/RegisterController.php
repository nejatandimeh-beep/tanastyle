<?php

namespace App\Http\Controllers\AuthSeller;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Seller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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

    protected function createSeller(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:sellers',
//            'password' => 'required|string|min:8|confirmed',
//        ]);

        $seller = Seller::create([
            'name' => $request['name'],
            'Family' => $request['family'],
            'NationalID' => $request['nationalId'],
            'Birthday' => $request['BDay'].'/'. $request['BMon'].'/'. $request['BYear'],
            'Gender' => (int)$request['gender'],
            'Phone' => $request['prePhone'].$request['phone'],
            'Mobile' => $request['mobile'],
            'State' => $request['state'],
            'City' => $request['city'],
            'Address' => $request['workAddress'],
            'ShopNumber' => $request['shopNumber'],
            'HomeAddress' => $request['homeAddress'],
            'HomePostalCode' => $request['homePostalCode'],
            'WorkPostalCode' => $request['workPostalCode'],
            'PicPath' => $request['userImage'],
            'PicPathCard' => $request['nationalityCardImage'],
            'email' => $request['email'],
            'password' =>$this->randomPassword(),
//            'password' => Hash::make($request['password']),
        ]);
//
//        $id=DB::table('sellers')
//            ->select('id')
//            ->orderBy('id','DESC')
//            ->first();
//
//        DB::table('seller_credit_card')
//            ->insert([
//                'SellerID'=>$id->id,
//                'CardNumber'=>$request['creditCard1'].'-'.$request['creditCard2'].'-'.$request['creditCard3'].'-'.$request['creditCard4'],
//                'Status'=>1,
//                'Wrong'=>0,
//            ]);
//
//        DB::table('seller_new')
//            ->where('ID',$request->get('id'))
//            ->delete();

//        return redirect()->intended('sellerVerify');
        return redirect()->route('sellerVerify');
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
