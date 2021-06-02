<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Seller extends Controller
{
    public function __construct()
    {
        $this->middleware('IsAdmin');
    }

    public function sellerNew(Request $request)
    {
        $nationalId = $request->get('nationalId');

        File::makeDirectory($nationalId, 0777, true, true);
        // Upload Images

        $path = 'img\SellerProfileImage\\'.$nationalId.'\\';
        $request->file('pic11')->storeAs(
            $path, 'user'. '.png', 'public'
        );

        $request->file('pic12')->storeAs(
            $path, 'nationalityCard'. '.png', 'public'
        );

        DB::table('seller_new')
            ->insert([
                'Name' =>  $request->get('name'),
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
                'CreditCard' => (string)$request->get('creditCard4').(string)$request->get('creditCard3').(string)$request->get('creditCard2').(string)$request->get('creditCard1'),
                'PicPath' => $path,
            ]);

        return redirect()->route('sellerRegister')->with('msg','success');
    }

    public function sellerVerify()
    {
        $data=DB::table('seller_new')
            ->select('ID','Name','Family','NationalID')
            ->get();

        return view('Administrator.Seller.Verify',compact('data'));
    }

    public function sellerVerifyDetail($id)
    {
        $data=DB::table('seller_new')
            ->select('*')
            ->where('ID',$id)
            ->first();

        return view('Administrator.Seller.VerifyDetail',compact('data'));
    }

    public function sellerDelete(Request $request)
    {
        DB::table('seller_new')
            ->where('ID',$request->get('id'))
            ->delete();
        return redirect()->route('sellerVerify');
    }

    public function sellerList()
    {
        $data=DB::table('sellers')
            ->select('id','name','Family','NationalID')
            ->get();

        return view('Administrator.Seller.Seller',compact('data'));
    }

    public function controlPanel($id)
    {
        $data=DB::table('sellers as s')
            ->select('*')
            ->leftJoin('seller_credit_card as scc','scc.SellerID','=','s.id')
            ->where('s.id',$id)
            ->first();

        return view('Administrator.Seller.ControlPanel',compact('data'));
    }

    public function updateSeller(Request $request)
    {
        DB::table('sellers')
            ->update([
                'Name' => $request->get('name'),
                'Family' => $request->get('family'),
                'Email' => $request->get('email'),
                'NationalID' => $request->get('nationalId'),
                'Birthday' => $request->get('year').'/'.$request->get('mon').'/'.$request->get('day'),
                'Gender' => (int)$request->get('gender'),
                'Phone' => $request->get('prePhone').$request->get('phone'),
                'Mobile' => $request->get('mobile'),
                'State' => $request->get('state'),
                'City' => $request->get('city'),
                'HomeAddress' => $request->get('homeAddress'),
                'HomePostalCode' => $request->get('homePostalCode'),
                'Address' => $request->get('workAddress'),
                'WorkPostalCode' => $request->get('workPostalCode'),
                'ShopNumber' => $request->get('shopNumber'),
                'PicPath' => $request->get('userImage'),
                'PicPathCard' => $request->get('nationalityCardImage'),
            ]);

        return redirect()->route('sellerControlPanel',$request->get('id'))->with('sellerUpdated','success');
    }

    public function sellerSearch($nationalId)
    {
        $output = '';
        $data = DB::table('sellers')
            ->select('NationalID','id')
            ->where('NationalID', 'like', $nationalId . '%')
            ->take(1)
            ->get();

        foreach ($data as $key => $row) {
            $output .= '<li style="border-radius: 0 !important;"
                        class="list-group-item g-color-gray-dark-v3 g-letter-spacing-0 g-opacity-0_8--hover">
                            <a  href="' . route('sellerControlPanel', [$row->id]) . '"
                                style="text-decoration: none"
                                class="col-12 p-0 text-left g-color-gray-dark-v3 g-color-primary--hover">
                             ' . $row->NationalID . '
                            </a>
                        </li>';
        }

        return $output;
    }
// --------------------------------------------[ MY FUNCTION ]----------------------------------------------------------
    //  Convert Date to Iranian Calender
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

    //  Minutes Passed of Spacial Time
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

    //    how past Days of Current Days
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
