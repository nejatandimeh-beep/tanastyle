<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\Middleware\WithoutOverlapping;

class MoveProductImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;
    public $timeout = 120;

    public string $tempPath;
    public string $finalPath;

    public function __construct(string $tempPath, string $finalPath)
    {
        $this->tempPath  = $tempPath;
        $this->finalPath = $finalPath;
    }

    public function handle()
    {
        $basePublic = file_exists('/home/tanastyl/public_html')
            ? '/home/tanastyl/public_html'
            : public_path();

        $source = $basePublic . '/' . trim($this->tempPath, '/');
        $destination = $basePublic . '/' . trim($this->finalPath, '/');

        Log::info('MOVE JOB STARTED', [
            'source' => $source,
            'destination' => $destination,
            'source_exists' => File::exists($source),
        ]);

        if (!File::exists($source)) {
            Log::error('SOURCE FOLDER NOT FOUND', ['source' => $source]);
            return;
        }

        File::ensureDirectoryExists(dirname($destination));
        File::moveDirectory($source, $destination, true);

        Log::info('IMAGES MOVED SUCCESSFULLY', [
            'destination' => $destination
        ]);
    }

    public function middleware()
    {
        return [
            (new WithoutOverlapping(md5($this->finalPath)))
                ->expireAfter(600)
        ];
    }
}

