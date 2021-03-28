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
    public function AskSize($cat, $gender)
    {
        $data = null;
        switch ($gender) {
            case '0':
                $data = DB::table('product_hint_female')
                    ->where('Cat', $cat)
                    ->first();
                break;
            case '1':
                $data = DB::table('product_hint_male')
                    ->where('Cat', $cat)
                    ->first();
                break;
            case '2':
                $data = DB::table('product_hint_girl')
                    ->where('Cat', $cat)
                    ->first();
                break;
            case '3':
                $data = DB::table('product_hint_boy')
                    ->where('Cat', $cat)
                    ->first();
                break;
            case '4':
                $data = DB::table('product_hint_baby_girl')
                    ->where('Cat', $cat)
                    ->first();
                break;
            case '5':
                $data = DB::table('product_hint_baby_boy')
                    ->where('Cat', $cat)
                    ->first();
                break;
        }


        return view('Seller.AskSize')
            ->with('gender', $data->Gender)
            ->with('cat', $cat)
            ->with('catCode', $data->CatCode)
            ->with('name', $data->Name)
            ->with('hintCat', $data->HintCat)
            ->with('productHint', $data->Pic);
    }

    // Detail of Sizes and Category
    public function AddProduct()
    {
        $gender = $_GET['gender'];
        $cat = $_GET['cat'];
        $catCode = $_GET['catCode'];
        $name = $_GET['name'];
        $hintCat = $_GET['hintCat'];
        if (isset($_GET['qty']))
            $qty = $_GET['qty'];

        switch ($cat) {
            case '77':
                $size = 1;
                $qty = 1;
                break;
            case '66':
                $size = [
                    '28',
                    '29',
                    '30',
                    '31',
                    '32',
                    '33',
                    '34',
                    '35',
                    '36',
                    '37',
                    '38',
                    '39',
                    '40',
                    '42',
                    '43',
                    '44',
                ];
                break;
            default:
                $size = [
                    'S',
                    'M',
                    'L',
                    'XL',
                    'XXL',
                    'XXXL'
                ];
        }

        return view('Seller.AddProduct', compact('gender', 'cat', 'catCode','name', 'hintCat', 'qty', 'size'));
    }

    // Insert Form Data to Database
    public function SaveProduct(Request $request)
    {

        // Upload Images
        date_default_timezone_set('Asia/Tehran');
        $folderName = 'p-' . date("Y.m.d-H.i.s");
        $picPath = public_path().'\img\products\\' . $folderName;
        File::makeDirectory($picPath, 0777, true, true);

        for ($i = 1; $i <= 4; $i++) {
            $image = $request->get('imageUrl' . $i);
            $folderPath = public_path('\img\products\\' . $folderName.'\\');
            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageFullPath = $folderPath . 'pic' . $i.'.jpg';

            file_put_contents($imageFullPath, $image_base64);
        }
        // Compilation Pic Path
        $picPath = '\img\products\\' . $folderName . '\\';
        // Get Data From Form
        $sellerId = Auth::guard('seller')->user()->id;
        $gender = $request->get('gender');
        $cat = $request->get('cat');
        $catCode = $request->get('catCode');
        $hintCat = $request->get('hintCat');
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
        $genderCode=$gender;
        switch ($gender) {
            case '0':
                $gender = 'زنانه';
                break;
            case '1':
                $gender = 'مردانه';
                break;
            case '2':
                $gender = 'دخترانه';
                break;
            case '3':
                $gender = 'پسرانه';
                break;
            case '4':
                $gender = 'نوزادی دخترانه';
                break;
            default:
                $gender = 'نوزادی پسرانه';
        }
        // Insert Data to Product DB
        DB::table('product')->insert([
            [
                'SellerID' => $sellerId,
                'Gender' => $gender,
                'GenderCode' => $genderCode,
                'Cat' => $cat,
                'CatCode' => $catCode,
                'HintCat' => $hintCat,
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
        $colorCode = array();
        $sizeQty = array();
        for ($i = 0; $i < $qty; $i++) {
            $temp = (string)$i;
            $sizes[$i] = $request->get('size' . $temp);
            $colors[$i] = $request->get('color' . $temp);
            $num=preg_replace('/[^0-9]/', '', $colors[$i]);
            $colorCode[$i]=$num;
            $colors[$i]=preg_replace('/\d+/u', '', $colors[$i]);
            $sizeQty[$i] = $request->get('sizeQty' . $temp);
        }
        // Get The Last inserted Product ID
        $temp = DB::table('product')->select('id')->latest('id')->first();
        $productId = $temp->id;
        // Insert Data to ProductDetail DB
        for ($i = 0; $i < $qty; $i++) {
            DB::table('product_detail')->insert([
                [
                    'ProductID' => $productId,
                    'Size' => $sizes[$i],
                    'Color' => $colors[$i],
                    'ColorCode' => $colorCode[$i],
                    'Qty' => $sizeQty[$i],
                ],
            ]);
        }

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

