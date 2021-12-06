<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Filesystem\Filesystem;
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
        $size='';
        if (isset($_GET['qty']))
            $qty = $_GET['qty'];

        switch ($catCode) {
            case 'f':
            case 'l':
                switch ($gender) {
                    case '0':
                        $size = [
                            'XS-35',
                            'XS-36',
                            'S-37',
                            'M-38',
                            'M-39',
                            'L-40',
                            'L-41',
                            'L-42',
                            'XL-43',
                            'XXL-44',
                            'XXL-45',
                            'XXXL-46',
                            'XXXL-47',
                        ];
                        break;
                    case '1':
                        $size = [
                            'XS-37',
                            'XS-38',
                            'S-39',
                            'S-40',
                            'M-41',
                            'M-42',
                            'L-43',
                            'XL-44',
                            'XL-45',
                            'XXL-46',
                            'XXL-47',
                            'XXXL-48',
                            'XXXL-49',
                            'XXXL-50',
                            'XXXL-51',
                            'XXXL-52',
                        ];
                        break;
                    case '2':
                    case '3':
                        $size = [
                            'XS-24',
                            'XS-25',
                            'S-26',
                            'S-27',
                            'M-28',
                            'M-29',
                            'L-30',
                            'L-31',
                            'XL-32',
                            'XL-33',
                            'XXL-34',
                            'XXL-35',
                            'XXXL-36',
                            'XXXL-37',
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
                        ];
                        break;
                }
                break;
            case 'e':
            case 'm':
            case 'n':
            case 'o':
            case 'p':
            case 'q':
                $size = ['FreeSize'];
                break;
            default:
                switch ($gender) {
                    case '4':
                    case '5':
                        $size = [
                            'XS',
                            'S',
                            'M',
                            'L',
                            'XL',
                        ];
                        break;
                    default:
                        $size = [
                            'XS',
                            'S',
                            'M',
                            'L',
                            'XL',
                            'XXL',
                            'XXXL'
                        ];
                }
        }
        return view('Seller.AddProduct', compact('gender', 'cat', 'catCode', 'name', 'hintCat', 'qty', 'size'));
    }

    public function uploadImage(Request $request)
    {
        // Upload Images
        $imgNumber = $request->get('imgNumber');
        $image = $request->file('imageUrl');
        $folderName = $request->get('folderName');
        $path = 'img/imagesTemp/products/'  . $folderName;
        File::makeDirectory($path, 0777, true, true);

        // 1000*1000 pic save
        $source='';
        switch ($image->getMimeType()) {
            case 'image/jpeg':
            case 'image/jpg':
                $source = imagecreatefromjpeg($image);
                break;
            case 'image/png':
                $source = imagecreatefrompng($image);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($image);
                break;
        }
        $imageFullPath = $path . '/pic' . (int)($imgNumber+1) . '.jpg';
        imagejpeg($source, $imageFullPath);

        // 250*250 sample save
        list($width, $height) = getimagesize($image);
        $newWidth = 500;
        $newHeight = 500;
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $imageFullPath =$path . '/sample' . (int)($imgNumber+1)  . '.png';
        imagepng($thumb,$imageFullPath);

        imagedestroy($thumb);
        imagedestroy($source);

        return $imgNumber;
    }

    // Insert Form Data to Database
    public function SaveProduct(Request $request)
    {
        // Upload Images
        $folderName = $request->get('folderName2');
        $source = public_path('img/imagesTemp/products/') . $folderName;
        $destination= public_path('img/products/').$folderName;
        $file = new Filesystem();
        $file->moveDirectory( $source, $destination,true);

        $qty = $request->get('qty');
        $j = 0;
        $imageColor = array([
            'color' => '',
            'colorCode' => '',
            'size' => '',
            'sizeQty' => '',
            'hexCode' => '',
        ]);

        for ($i = 0; $i < $qty; $i++) {
            $temp = (string)$i;
            $imageColor[$i]['color'] = $request->get('color' . $temp);
            $imageColor[$i]['colorCode'] = preg_replace('/[^0-9]/', '', $imageColor[$i]['color']);
            $imageColor[$i]['color'] = preg_replace('/\d+/u', '', $imageColor[$i]['color']);
            $imageColor[$i]['size'] = $request->get('size' . $temp);
            $imageColor[$i]['sizeQty'] = $request->get('sizeQty' . $temp);
            $imageColor[$i]['hexCode'] = $request->get('hexCode' . $temp);
        }

        $imageColor = collect($imageColor)->toArray();
        $imageColor = array_values($imageColor);

        // Compilation Pic Path
        $picPath = '/img/products/' . $folderName . '/';
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
                    'PicNumber' => 'pic'.($i+1),
                    'SampleNumber' => 'sample'.($i+1),
                    'VisitCounter' => 0,
                ],
            ]);
        }

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

