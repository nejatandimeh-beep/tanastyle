<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

//use function GuzzleHttp\default_user_agent;


class AddOther extends Controller
{

    public function __construct()
    {
        $this->middleware('IsSeller');
    }

    // Detail of Sizes and Category
    public function AddProduct($cat)
    {
        $data = DB::table('product_hint_digital')
            ->where('Cat', $cat)
            ->first();

        $gender = $data->Gender;
        $cat = $data->Cat;
        $catCode = $data->CatCode;
        $name = $data->Name;
        $hintCat = $data->HintCat;
        return view('Seller.AddOtherProduct', compact('gender', 'cat', 'catCode', 'name', 'hintCat'));
    }

    public function uploadImage(Request $request)
    {
        // Upload Images
        $imgNumber = $request->get('imgNumber');
        $image = $request->file('imageUrl');
        $folderName = $request->get('folderName');
        $path = 'img/imagesTemp/otherProducts/' . $folderName;
        File::makeDirectory($path, 0777, true, true);

        // 1000*1000 pic save
        $source = '';
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
        $imageFullPath = $path . '/pic' . (int)($imgNumber + 1) . '.jpg';
        imagejpeg($source, $imageFullPath);

        // 250*250 sample save
        list($width, $height) = getimagesize($image);
        $newWidth = 402;
        $newHeight = 500;
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $white = imagecolorallocate($thumb, 255, 255, 255);
        imagefill($thumb, 0, 0, $white);
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $imageFullPath = $path . '/sample' . (int)($imgNumber + 1) . '.jpg';
        imagejpeg($thumb, $imageFullPath, 80);

        imagedestroy($thumb);
        imagedestroy($source);

        return $imgNumber;
    }

    // Insert Form Data to Database
    public function SaveProduct(Request $request)
    {
        // Upload Images
        $folderName = $request->get('folderName2');
        $source = public_path('img/imagesTemp/otherProducts/') . $folderName;
        $destination = public_path('img/otherProducts/') . $folderName;
        $file = new Filesystem();
        $file->moveDirectory($source, $destination, true);

        $imageColor = array([
            'color' => '',
            'colorCode' => '',
            'size' => '',
            'sizeQty' => '',
            'hexCode' => '',
        ]);

        $temp = '0';
        $imageColor[0]['color'] = $request->get('color' . $temp);
        $imageColor[0]['colorCode'] = preg_replace('/[^0-9]/', '', $imageColor[0]['color']);
        $imageColor[0]['color'] = preg_replace('/\d+/u', '', $imageColor[0]['color']);
        $imageColor[0]['size'] = '--';
        $imageColor[0]['sizeQty'] = $request->get('sizeQty' . $temp);
        $imageColor[0]['hexCode'] = $request->get('hexCode' . $temp);

        $imageColor = collect($imageColor)->toArray();
        $imageColor = array_values($imageColor);

        // Compilation Pic Path
        $picPath = '/img/otherProducts/' . $folderName . '/';
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
        $priceWithDiscount = $request->get('priceWithDiscount');
        $priceWithoutDiscount = $request->get('tempFinalPriceWithoutDiscount');
        $finalPrice = $request->get('tempFinalPrice');

        $discount = $request->get('discount');
        $regDate = date('Y-m-d');
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
            case '5':
                $gender = 'نوزادی پسرانه';
                break;
            default:
                $gender = 'فاقد جنسیت';
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
                'PriceWithDiscount' => $priceWithDiscount,
                'FinalPrice' => $finalPrice,
                'FinalPriceWithoutDiscount' => $priceWithoutDiscount,
                'PicPath' => $picPath,
                'RegDate' => $regDate,
            ],
        ]);

        // Get The Last inserted Product ID
        $temp = DB::table('product')->select('id')->latest('id')->first();
        $productId = $temp->id;
        // Insert Data to ProductDetail DB
        DB::table('product_detail')->insert([
            [
                'ProductID' => $productId,
                'Size' => $imageColor[0]['size'],
                'Color' => $imageColor[0]['color'],
                'ColorCode' => $imageColor[0]['colorCode'],
                'HexCode' => $imageColor[0]['hexCode'],
                'Qty' => $imageColor[0]['sizeQty'],
                'PicNumber' => 'pic' . (0 + 1),
                'SampleNumber' => 'sample' . (0 + 1),
            ],
        ]);

        return redirect('/Seller-Store')->with('addStatus', 'success');
    }
}

