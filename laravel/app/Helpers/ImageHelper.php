<?php

use Illuminate\Support\Facades\File;

if (!function_exists('productImageUrl')) {
    function productImageUrl(string $folder, string $file): string
    {
        $finalPath = public_path("img/products/{$folder}/{$file}");
        $tempPath  = public_path("img/imagesTemp/products/{$folder}/{$file}");

        if (File::exists($finalPath)) {
            return asset("img/products/{$folder}/{$file}");
        }

        if (File::exists($tempPath)) {
            return asset("img/imagesTemp/products/{$folder}/{$file}");
        }

        // fallback امن
        return asset("img/no-image.png");
    }
}
