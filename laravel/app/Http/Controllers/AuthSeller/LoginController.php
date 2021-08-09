<?php

namespace App\Http\Controllers\AuthSeller;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login/seller';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('auth:seller')->except('sellerLogout');
        //$this->middleware('auth:seller');
       // $this->middleware('IsSeller');
    }


    // Seller Authentication

    public function showSellerLoginForm()
    {

        return view('auth.sellerAuth.login');
    }

    public function sellerLogin(Request $request)
    {
        $messages = [
            "email.required" => "ایمیل الزامیست",
            "email.email" => "آدرس ایمیل صحیح نیست",
            "password.required" => "رمز ورود الزامیست",
        ];

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ], $messages);

        if (Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/Seller-Panel');
        }

        return back()->withInput($request->only('email', 'remember','password', 'remember'))->with('fails', 'رمز یا ایمیل اشتباه است!');
//        return Redirect::route('sellerLog')
//            ->with('fails', 'رمز یا ایمیل اشتباه است!');
    }
    public function sellerLogout(Request $request)
    {

        Auth::guard('seller')->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect()->guest(route( 'sellerLog' ));
    }
}
