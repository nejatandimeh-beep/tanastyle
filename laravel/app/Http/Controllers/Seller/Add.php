<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
//use function GuzzleHttp\default_user_agent;


class Add extends Controller
{

    public function __construct()
    {
        $this->middleware('IsSeller');
    }
    // Ask Qty of Sizes
    public function AskSize($cat)
    {
        $data = DB::table('product_hint')->where('Cat', $cat)->first();
        return view('Seller.AskSize')
            ->with('gender', $data->Gender)
            ->with('cat', $cat)
            ->with('name', $data->Name)
            ->with('hintCat', $data->HintCat)
            ->with('productHint', $data->Pic);
    }

    // Detail of Sizes and Catagory
    public function AddProduct()
    {
        $gender = $_GET['gender'];
        $cat = $_GET['cat'];
        $name = $_GET['name'];
        $hintCat = $_GET['hintCat'];
        if(isset($_GET['qty']))
            $qty = $_GET['qty'];

        switch ($cat) {
            case '0000':
            case '0002':
            case '0003':
            case '0004':
                $size = [
                    'S',
                    'M',
                    'L',
                    'XL',
                    'XXL',
                    'XXXL'
                ];
                break;
            case '0001':
                $size = [
                    '60',
                    '65',
                    '70',
                    '75',
                    '80',
                    '85',
                    '90'
                ];
                break;
            case '0010':
                $size = [
                    '32',
                    '33',
                    '34',
                    '35',
                    '36',
                    '37',
                    '38',
                    '39',
                    '40',
                    '41',
                    '42',
                    '43',
                    '44',
                    '45',
                    '46',
                    '47',
                    '48',
                    '49',
                    '50',
                    '51',
                    '52',
                    '53',
                    '54',
                    '55',
                    '56',
                    '57',
                    '58',
                    '59',
                    '60',
                    '61'
                ];
                break;
            case '0015':
                $size = [
                    '19 تا 21 سانت',
                    '22 تا 24 سانت',
                    '25 تا 27 سانت',
                    '28 تا 30 سانت',
                    '30 تا 32 سانت',
                    '32 تا 34 سانت',
                    '36 تا 38 سانت',
                    '38 تا 40 سانت',
                    '40 تا 42 سانت',
                    '42 تا 46 سانت',
                    '46 تا 50 سانت',
                    '50 تا 56 سانت',
                    '56 تا 62 سانت',
                    '62 تا 78 سانت',
                    '78 تا 85 سانت',
                ];
                break;
            default:
                $size=1;
                $qty=1;
        }

        return view('Seller.AddProduct', compact('gender','cat', 'name', 'hintCat', 'qty', 'size'));
    }

   salam 
    // Insert Form Data to Database
    public function SaveProduct(Request $request)
    {
        // Upload Images
        date_default_timezone_set('Asia/Tehran');
        $folderName = '2-' . date("Y.m.d-H.i.s");
        $picPath = '\img\products\\' . $folderName;
            File::makeDirectory($picPath, 0777, true, true);

            for ($i = 1; $i <= 4; $i++) {
                $temp = (string)$i;
                $request->file('pic' . $temp)->storeAs(
                    $picPath, 'pic' . $temp . '.jpg', 'public'
                );
            }

        // Compilation Pic Path
        $picPath = $picPath . '\\';

        // Get Data From Form
        $sellerId =Auth::guard('seller')->user()->id;
        $gender = $request->get('gender');
        $cat = $request->get('cat');
        $name = $request->get('name');
        $model = $request->get('model');
        $brand = $request->get('brand');
        $detail = $request->get('detail');
        $unitPrice = $request->get('tempPrice');
        $discount = $request->get('discount');
        $regDate = date('Y-m-d');

        // Calculate Final Price
        $temp = $unitPrice - ($unitPrice * $discount) / 100;
        $finalPrice = $temp;

        // Insert Data to Product DB
        DB::table('product')->insert([
            [
                'SellerID' => $sellerId,
                'Gender' => $gender,
                'Cat' => $cat,
                'Name' => $name,
                'Model' => $model,
                'Brand' => $brand,
                'Detail' => $detail,
                'UnitPrice' => $unitPrice,
                'Discount' => $discount,
                'FinalPrice' => $finalPrice,
                'PicPath' => $picPath,
                'VisitCounter' => 0,
                'RegDate' => $regDate,
            ],
        ]);

        // Get Size Qty For Loop Steps
        $qty = $request->get('qty');

        // Get Sizes Detail
        $sizes = array();
        $colors = array();
        $sizeQty = array();
        for ($i = 0; $i < $qty; $i++) {
            $temp = (string)$i;
            $sizes[$i] = $request->get('size' . $temp);
            $colors[$i] = $request->get('color' . $temp);
            $sizeQty[$i] = $request->get('sizeQty' . $temp);
        }
        // Get The Last insterted Product ID
        $temp = DB::table('product')->select('id')->latest('id')->first();
        $productId = $temp->id;

        // Insert Data to ProductDetail DB
        for ($i = 0; $i < $qty; $i++) {
            DB::table('product_detail')->insert([
                [
                    'ProductID' => $productId,
                    'Size' => $sizes[$i],
                    'Color' => $colors[$i],
                    'Qty' => $sizeQty[$i],
                ],
            ]);
        }

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

