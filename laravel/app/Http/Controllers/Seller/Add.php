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

        switch ($hintCat) {
            case 'کفش':
                switch ($gender){
                    case '0':
                        $size = [
                            'XS-34',
                            'XS-35',
                            'S-36',
                            'M-37',
                            'M-38',
                            'L-39',
                            'L-40',
                            'L-41',
                            'XL-42',
                            'XL-43',
                            'XXL-44',
                            'XXL-45',
                            'XXL-46',
                            'XXXL-47',
                            'XXXL-48',
                            'XXXL-49',
                            'XXXL-50',
                        ];
                        break;
                    case '1':
                        $size = [
                            'XS-36',
                            'XS-37',
                            'S-38',
                            'S-39',
                            'M-40',
                            'M-41',
                            'M-42',
                            'L-43',
                            'L-44',
                            'XL-45',
                            'XL-46',
                            'XXL-47',
                            'XXL-48',
                            'XXXL-49',
                            'XXXL-50',
                            'XXXL-51',
                            'XXXL-52',
                            'XXXL-53',
                            'XXXL-54',
                            'XXXL-55',
                            'XXXL-56',
                            'XXXL-57',
                        ];
                        break;
                    case '2':
                    case '3':
                        $size = [
                            'XS-21',
                            'XS-22',
                            'XS-23',
                            'XS-24',
                            'XS-25',
                            'XS-26',
                            'XS-27',
                            'XS-28',
                            'S-29',
                            'S-30',
                            'S-31',
                            'S-32',
                            'S-33',
                            'S-34',
                            'M-35',
                            'M-36',
                            'M-37',
                            'L-38',
                            'L-39',
                            'L-40',
                            'XL-41',
                            'XL-42',
                            'XXL-43',
                            'XXXL-44',
                            'XXXL-45',
                        ];
                        break;
                    case '4':
                    case '5':
                        $size = [
                            'XS-16',
                            'S-17',
                            'M-18',
                            'L-19',
                            'XL-20',
                            'XXL-21',
                            'XXL-22',
                            'XXXL-23',
                            'XXXL-24',
                        ];
                        break;
                }
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
        $picPath = public_path() . '\img\products\\' . $folderName;
        File::makeDirectory($picPath, 0777, true, true);
        // Get Size Qty For Loop Steps

        $qty = $request->get('qty');
        $j = 0;
        $imageColor = array([
            'color' => '',
            'colorCode' => '',
            'size' => '',
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
            $imageColor[$i]['hexCode'] = $request->get('hexCode' . $temp);
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
                    'HexCode' => $imageColor[$i]['hexCode'],
                    'Qty' => $imageColor[$i]['sizeQty'],
                    'PicNumber' => $imageColor[$i]['fileName'],
                    'VisitCounter' => 0,
                ],
            ]);
        }

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

