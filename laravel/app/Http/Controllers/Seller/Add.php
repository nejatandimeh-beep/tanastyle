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

        return view('Seller.AddProduct', compact('gender', 'cat', 'catCode', 'name', 'hintCat', 'qty', 'size'));
    }

    // Insert Form Data to Database
    public function SaveProduct(Request $request)
    {
        // Upload Images
        date_default_timezone_set('Asia/Tehran');
        $folderName = 'p-' . date("Y.m.d-H.i.s");
        $picPath = public_path().'\img\products\\' . $folderName;
        File::makeDirectory($picPath, 0777, true, true);
        // Get Size Qty For Loop Steps

        $qty = $request->get('qty');
        $j = 0;
        $imageColor = array([
            'color' => '',
            'colorCode' => '',
            'size'=>'',
            'sizeQty' => '',
            'image' => '',
            'fileName' => '',
        ]);

        for ($i = 0; $i < $qty; $i++) {
            $temp = (string)$i;
            $imageColor[$i]['color'] = $request->get('color' . $temp);
            $imageColor[$i]['colorCode'] = preg_replace('/[^0-9]/', '', $imageColor[$i]['color']);
            $imageColor[$i]['color'] = preg_replace('/\d+/u', '', $imageColor[$i]['color']);
            $imageColor[$i]['size'] = $request->get('size' . $temp);
            $imageColor[$i]['sizeQty'] = $request->get('sizeQty' . $temp);
            $imageColor[$i]['image'] = $request->get('imageUrl' . $i);
        }

        $imageColor = collect($imageColor)->sortBy('color')->toArray();
        $imageColor = array_values($imageColor);
        for ($i = 0; $i < $qty; $i++) {
            if (!is_null($imageColor[$i]['image'])) {
                $j++;
                $folderPath = public_path('\img\products\\' . $folderName . '\\');
                $image_parts = explode(";base64,", $imageColor[$i]['image']);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $imageColor[$i]['fileName'] = 'pic' . $j;
                $imageFullPath = $folderPath . $imageColor[$i]['fileName'] . '.jpg';
                file_put_contents($imageFullPath, $image_base64);
            } else {
                $imageColor[$i]['fileName'] = 'pic' . $j;
            }
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
        $colorCode = array();
        $colors = array();

        // Calculate Final Price
        $temp = $unitPrice - ($unitPrice * $discount) / 100;
        $finalPrice = $temp;
        $genderCode = $gender;
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

        // Get The Last inserted Product ID
        $temp = DB::table('product')->select('id')->latest('id')->first();
        $productId = $temp->id;
        // Insert Data to ProductDetail DB
        for ($i = 0; $i < $qty; $i++) {
            DB::table('product_detail')->insert([
                [
                    'ProductID' => $productId,
                    'Size' => $imageColor[$i]['size'],
                    'Color' => $imageColor[$i]['color'],
                    'ColorCode' => $imageColor[$i]['colorCode'],
                    'Qty' => $imageColor[$i]['sizeQty'],
                    'PicNumber' => $imageColor[$i]['fileName'],
                ],
            ]);
        }

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

