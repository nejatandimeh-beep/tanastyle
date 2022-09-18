<?php

namespace App\Http\Controllers\Mode;

use App\Http\Controllers\Controller;
use App\lib\ZarinPal;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use DateTime;
use File;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Kavenegar;

class Basic extends Controller
{
    public function womenTrend()
    {
        return view('Mode.WomenTrend');
    }
}
