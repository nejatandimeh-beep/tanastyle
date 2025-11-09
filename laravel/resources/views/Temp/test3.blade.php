<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ImageUploadController extends Controller
{
    /**
     * Upload + robust HEIC -> JPG conversion with multiple fallbacks and detailed logging.
     */
    public function upload(Request $request)
    {
        // quick validation
        $request->validate([
            'image' => 'required|file',
        ]);

        $file = $request->file('image');
        if (!$file || !$file->isValid()) {
            return $this->jsonError('هیچ فایلی دریافت نشد یا فایل نامعتبر است.');
        }

        // -----------------
        // configuration (can be overridden by .env)
        // -----------------
        $env = env('HEIC_CONVERT', null); // dummy to allow .env presence
        $magickPath = env('IMAGEMAGICK_BIN', '/opt/alt/alt-ImageMagick/usr/bin/magick'); // fallback common alt path
        $ffmpegPath  = env('FFMPEG_BIN', 'ffmpeg'); // may be in PATH
        $heifConvert = env('HEIF_CONVERT_BIN', 'heif-convert'); // optional
        $ldLibraryPath = env('IMAGEMAGICK_LD_PATH', '/opt/alt/libheif/lib64:/opt/alt/libde265/lib64:/usr/lib64');

        // decide output web-accessible directory:
        // Prefer a public_html/output alongside project root (common shared host layout)
        $possiblePublicHtml = realpath(base_path('../public_html'));
        if ($possiblePublicHtml && is_dir($possiblePublicHtml) && is_writable($possiblePublicHtml)) {
            $webRoot = $possiblePublicHtml;
            $webSub = 'output';
            $usePublicHtml = true;
            $outputDir = $webRoot . DIRECTORY_SEPARATOR . $webSub;
            $publicUrlPrefix = '/' . trim($webSub, '/') . '/'; // URL returned to client
        } else {
            // fallback to storage/app/public/uploads (make sure php artisan storage:link run)
            $outputDir = storage_path('app/public/uploads');
            $usePublicHtml = false;
            $publicUrlPrefix = Storage::url('uploads/') ; // will produce '/storage/uploads/...' normally
        }

        if (!file_exists($outputDir)) {
            @mkdir($outputDir, 0777, true);
        }

        // temp and naming
        $ext = strtolower((string) $file->getClientOriginalExtension());
        $mime = (string) $file->getClientMimeType();
        $isHeic = in_array($ext, ['heic','heif']) || str_contains($mime, 'heic') || str_contains($mime, 'heif');

        $tmpName = (string) Str::uuid() . '.' . ($ext ?: 'upload');
        $tmpRelative = 'tmp/' . $tmpName;
        $file->storeAs('tmp', $tmpName);
        $tmpAbsolute = storage_path('app/' . $tmpRelative);

        $outName = Str::uuid() . '.jpg';
        $outAbsolute = rtrim($outputDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $outName;

        // prepare debug container
        $debug = [
            'input' => $tmpAbsolute,
            'expected_output' => $outAbsolute,
            'ext' => $ext,
            'mime' => $mime,
            'attempts' => [],
        ];

        Log::info('Upload received', ['tmp' => $tmpAbsolute, 'ext' => $ext, 'mime' => $mime]);

        // ensure temp file exists
        if (!file_exists($tmpAbsolute) || filesize($tmpAbsolute) === 0) {
            Log::error('Temporary file missing or empty', ['path' => $tmpAbsolute]);
            return $this->jsonError('فایل موقت آپلود ذخیره نشد یا خالی است. جزئیات در لاگ.');
        }

        // If not HEIC just move to output and return
        if (!$isHeic) {
            try {
                copy($tmpAbsolute, $outAbsolute);
                $url = $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix);
                @unlink($tmpAbsolute);
                Log::info('Non-HEIC file stored', ['out' => $outAbsolute]);
                return response()->json(['success' => true, 'method' => 'copy', 'file' => $url]);
            } catch (\Exception $e) {
                Log::error('Failed to copy non-heic file', ['err' => $e->getMessage()]);
                return $this->jsonError('خطا در ذخیره‌سازی فایل غیر HEIC.');
            }
        }

        // -----------------
        // Method 1: Imagick PHP extension (prefer frame 0)
        // -----------------
        if (extension_loaded('imagick')) {
            $attempt = ['method' => 'imagick_php', 'ok' => false];
            try {
                // read only first image to avoid "auxiliary" multi-frame issues from iPhone
                $im = new \Imagick();
                // use "[0]" to force single-frame read
                $im->readImage($tmpAbsolute . '[0]');
                $im->setImageFormat('jpeg');
                $im->setImageCompressionQuality(88);
                $im->writeImage($outAbsolute);
                $im->clear();
                $im->destroy();

                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $attempt['info'] = ['size' => $attempt['ok'] ? filesize($outAbsolute) : 0];
                $debug['attempts'][] = $attempt;

                if ($attempt['ok']) {
                    $url = $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix);
                    Log::info('Converted with Imagick extension', ['out' => $outAbsolute]);
                    @unlink($tmpAbsolute);
                    return response()->json(['success' => true, 'method' => 'imagick_php', 'file' => $url, 'debug' => $debug]);
                }
            } catch (\Exception $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
                Log::warning('Imagick PHP conversion failed', ['err' => $e->getMessage()]);
                // continue to next method
            }
        } else {
            $debug['attempts'][] = ['method' => 'imagick_php', 'ok'=>false, 'error'=>'imagick extension not loaded'];
        }

        // -----------------
        // Method 2: heif-convert CLI (if available)
        // -----------------
        $hc = $this->which($heifConvert);
        if ($hc) {
            $attempt = ['method' => 'heif-convert', 'command' => null, 'ok' => false];
            $command = escapeshellarg($hc) . ' ' . escapeshellarg($tmpAbsolute) . ' ' . escapeshellarg($outAbsolute);
            $attempt['command'] = $command;
            try {
                $proc = Process::fromShellCommandline($command);
                $proc->setTimeout(60);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;

                if ($attempt['ok']) {
                    $url = $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix);
                    Log::info('Converted with heif-convert', ['out' => $outAbsolute]);
                    @unlink($tmpAbsolute);
                    return response()->json(['success' => true, 'method' => 'heif-convert', 'file' => $url, 'debug' => $debug]);
                }
            } catch (\Exception $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
                Log::warning('heif-convert failed', ['err' => $e->getMessage()]);
            }
        } else {
            $debug['attempts'][] = ['method'=>'heif-convert','ok'=>false,'error'=>'not found'];
        }

        // -----------------
        // Method 3: ffmpeg CLI (extract first frame) - fallback
        // -----------------
        $ff = $this->which($ffmpegPath);
        if ($ff) {
            $attempt = ['method' => 'ffmpeg', 'command' => null, 'ok' => false];
            // -frames:v 1 ensures only first frame extracted
            $command = escapeshellarg($ff) . ' -v error -y -i ' . escapeshellarg($tmpAbsolute) . ' -frames:v 1 ' . escapeshellarg($outAbsolute);
            $attempt['command'] = $command;
            try {
                $proc = Process::fromShellCommandline($command);
                $proc->setTimeout(30);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;

                if ($attempt['ok']) {
                    $url = $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix);
                    Log::info('Converted with ffmpeg', ['out' => $outAbsolute]);
                    @unlink($tmpAbsolute);
                    return response()->json(['success' => true, 'method' => 'ffmpeg', 'file' => $url, 'debug' => $debug]);
                }
            } catch (\Exception $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
                Log::warning('ffmpeg failed', ['err' => $e->getMessage()]);
            }
        } else {
            $debug['attempts'][] = ['method'=>'ffmpeg','ok'=>false,'error'=>'not found'];
        }

        // -----------------
        // Method 4: magick CLI (ImageMagick) — try with LD_LIBRARY_PATH of alt
        // -----------------
        $magick = $this->which($magickPath) ?: $this->which('magick');
        if ($magick) {
            $attempt = ['method' => 'magick_cli', 'command' => null, 'ok' => false];
            // Use shell command to set LD_LIBRARY_PATH for alt builds (only on linux hosts)
            $ld = $ldLibraryPath;
            $cmd = "bash -c LD_LIBRARY_PATH=\"{$ld}\" " . escapeshellarg($magick) . ' ' . escapeshellarg($tmpAbsolute) . ' ' . escapeshellarg($outAbsolute);
            $attempt['command'] = $cmd;
            try {
                $proc = Process::fromShellCommandline($cmd);
                $proc->setTimeout(60);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;

                if ($attempt['ok']) {
                    $url = $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix);
                    Log::info('Converted with magick CLI', ['out' => $outAbsolute]);
                    @unlink($tmpAbsolute);
                    return response()->json(['success' => true, 'method' => 'magick_cli', 'file' => $url, 'debug' => $debug]);
                }
            } catch (\Exception $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
                Log::warning('magick CLI failed', ['err' => $e->getMessage()]);
            }
        } else {
            $debug['attempts'][] = ['method'=>'magick_cli','ok'=>false,'error'=>'not found'];
        }

        // -----------------
        // All methods failed
        // -----------------
        Log::error('All conversion attempts failed', ['debug' => $debug]);
        return response()->json([
            'success' => false,
            'error' => 'تبدیل HEIC انجام نشد — هیچ‌یک از روش‌ها موفق نبودند. جزئیات در debug.',
            'debug' => $debug
        ], 500);
    }

    /**
     * Helper: return a publicly accessible URL (best effort)
     */
    protected function makePublicUrl(string $outName, bool $usePublicHtml, $publicUrlPrefix)
    {
        if ($usePublicHtml) {
            // returns like '/output/filename.jpg'
            return rtrim($publicUrlPrefix, '/') . '/' . ltrim($outName, '/');
        }
        // Storage::url returns '/storage/uploads/filename.jpg' (requires storage:link)
        return $publicUrlPrefix . $outName;
    }

    /**
     * Helper: find binary in PATH or return the provided path if executable
     */
    protected function which($bin)
    {
        if (!$bin) return null;
        // if absolute and executable
        if (file_exists($bin) && is_executable($bin)) return $bin;

        // try "which" (unix) or "where" (windows)
        // prefer using PHP's shell_exec for portability
        try {
            $escaped = escapeshellarg($bin);
            $out = trim(shell_exec("which {$bin} 2>/dev/null") ?: shell_exec("command -v {$bin} 2>/dev/null"));
            if ($out) return $out;
        } catch (\Throwable $e) {
            // ignore
        }
        return null;
    }

    protected function jsonError($msg, $code = 400)
    {
        return response()->json(['success' => false, 'error' => $msg], $code);
    }
}
