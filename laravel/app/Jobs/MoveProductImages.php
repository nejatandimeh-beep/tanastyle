<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class MoveProductImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $folder;

    public $tries = 1;
    public $timeout = 120;

    public function __construct(string $folder)
    {
        $this->folder = $folder;
    }

    public function handle()
    {
        /**
         * 🔹 تشخیص خودکار لوکال / هاست
         * (دست نخورده – همونی که الان درست کار می‌کنه)
         */
        $basePublic = file_exists('/home/tanastyl/public_html')
            ? '/home/tanastyl/public_html'
            : public_path();

        $source = $basePublic . "/img/imagesTemp/products/{$this->folder}";
        $destination = $basePublic . "/img/products/{$this->folder}";

        Log::info('MOVE JOB STARTED', [
            'folder' => $this->folder,
            'source' => $source,
            'destination' => $destination,
            'source_exists' => File::exists($source),
        ]);

        /**
         * 🔹 بررسی وجود سورس
         */
        if (!File::exists($source)) {
            Log::error('SOURCE FOLDER NOT FOUND', [
                'source' => $source
            ]);
            return;
        }

        /**
         * 🔹 اطمینان از وجود مقصد
         */
        File::ensureDirectoryExists(dirname($destination));

        /**
         * 🔹 انتقال پوشه
         */
        File::moveDirectory($source, $destination, true);

        /**
         * 🔹 پاک‌سازی امن temp (مرحله 3.5)
         * فقط اگر انتقال موفق بوده
         */
        if (File::exists($destination)) {
            File::deleteDirectory($source);
        }

        Log::info('IMAGES MOVED SUCCESSFULLY', [
            'folder' => $this->folder
        ]);
    }

    /**
     * 🔹 مدیریت خطای Job (Production Safe)
     */
    public function failed(\Throwable $e)
    {
        Log::critical('MOVE PRODUCT IMAGES JOB FAILED', [
            'folder' => $this->folder,
            'error' => $e->getMessage(),
        ]);
    }
}
