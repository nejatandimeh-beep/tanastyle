<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Jobs\MoveProductImages;
use Illuminate\Support\Facades\Log;
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
        $data = DB::table('product_hint_other')
            ->where('Cat', $cat)
            ->first();

        $gender = $data->Gender;
        $cat = $data->Cat;
        $catCode = $data->CatCode;
        $subCat = $data->SubCat;
        $name = $data->Name;
        $hintCat = $data->HintCat.' ('.$data->HintMinorCat.')';
        return view('Seller.AddOtherProduct', compact('gender', 'cat', 'catCode', 'name', 'hintCat','subCat'));
    }

    public function uploadImage(Request $request)
    {
        // Upload Images
        $imgNumber = $request->get('imgNumber');
        $image = $request->file('image');
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
        DB::beginTransaction();

        try {

            /* =====================
             * Image / Variant data
             * ===================== */
            $imageColor = [];

            $rawColor = $request->get('color0');

            $color = preg_replace('/\d+/u', '', $rawColor);
            $code  = preg_replace('/[^0-9]/', '', $rawColor);

            $imageColor[] = [
                'color'     => $color,
                'colorCode'=> $code,
                'size'      => '--',
                'qty'       => $request->get('sizeQty0'),
                'hex'       => $request->get('hexCode0'),
                'pic'       => 'pic1',
                'sample'    => 'sample1',
            ];

            /* =====================
             * Product main insert
             * ===================== */
            $name   = $request->name;
            $model  = $request->model;
            $brand  = $request->brand;

            $baseSlug = str_replace(' ', '-', "$name-$model-$brand");

            $productId = DB::table('product')->insertGetId([
                'SellerID' => auth('seller')->id(),
                'Gender' => [
                        'زنانه','مردانه','دخترانه','پسرانه',
                        'نوزادی دخترانه','نوزادی پسرانه'
                    ][$request->gender] ?? 'فاقد جنسیت',
                'GenderCode' => $request->gender,
                'Cat' => $request->cat,
                'CatCode' => $request->catCode,
                'SubCat' => $request->subCat,
                'HintCat' => $request->hintCat,
                'Name' => $name,
                'Model' => $model,
                'Brand' => $brand,
                'Detail' => $request->detail,
                'UnitPrice' => $request->tempPrice,
                'Discount' => $request->discount,
                'PriceWithDiscount' => $request->priceWithDiscount,
                'FinalPrice' => $request->tempFinalPrice,
                'FinalPriceWithoutDiscount' => $request->tempFinalPriceWithoutDiscount,
                'PicPath' => '/img/otherProducts/'.$request->folderName2.'/',
                'RegDate' => now()->toDateString(),
                'slug' => $baseSlug,
            ]);

            /* =====================
             * product_detail insert
             * ===================== */
            DB::table('product_detail')->insert([
                'ProductID' => $productId,
                'Size' => '--',
                'Color' => $imageColor[0]['color'],
                'ColorCode' => $imageColor[0]['colorCode'],
                'HexCode' => $imageColor[0]['hex'],
                'Qty' => $imageColor[0]['qty'],
                'PicNumber' => 'pic1',
                'SampleNumber' => 'sample1',
                'slug' => $baseSlug.'-'.str_replace(' ', '-', $imageColor[0]['color']),
            ]);

            DB::commit();
            Log::info('DISPATCH MOVE JOB', [
                'temp' => "img/imagesTemp/otherProducts/{$request->folderName2}",
                'final' => "img/otherProducts/{$request->folderName2}",
            ]);

            /* =====================
             * Async image move
             * ===================== */
            MoveProductImages::dispatch(
                "img/imagesTemp/otherProducts/{$request->folderName2}",
                "img/otherProducts/{$request->folderName2}"
            );

            return redirect('/Seller-Store')->with('addStatus', 'success');

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('ADD OTHER PRODUCT FAILED', [
                'error' => $e->getMessage()
            ]);

            return back()->withErrors('خطا در ثبت محصول: '.$e->getMessage());
        }
    }
}

