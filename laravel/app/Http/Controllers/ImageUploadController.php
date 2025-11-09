<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate(['image' => 'required|file']);
        $file = $request->file('image');
        if (!$file || !$file->isValid()) {
            return $this->jsonError('هیچ فایلی دریافت نشد یا فایل نامعتبر است.', 400);
        }

        // metadata + tmp
        $ext = strtolower((string)$file->getClientOriginalExtension());
        $mime = (string)$file->getClientMimeType();
        $isHeic = in_array($ext, ['heic','heif']) || str_contains($mime, 'heic') || str_contains($mime, 'heif');

        $tmpName = (string) Str::uuid() . '.' . ($ext ?: 'upload');
        $tmpRelative = 'tmp/' . $tmpName;
        $file->storeAs('tmp', $tmpName);
        $tmpAbsolute = storage_path('app/' . $tmpRelative);

        // output dir (shared-host friendly)
        $possiblePublicHtml = realpath(base_path('../public_html'));
        if ($possiblePublicHtml && is_dir($possiblePublicHtml) && is_writable($possiblePublicHtml)) {
            $outputDir = $possiblePublicHtml . DIRECTORY_SEPARATOR . 'output';
            $usePublicHtml = true;
            $publicUrlPrefix = '/output/';
        } else {
            $outputDir = storage_path('app/public/uploads');
            $usePublicHtml = false;
            $publicUrlPrefix = Storage::url('uploads/');
        }
        if (!file_exists($outputDir)) @mkdir($outputDir, 0777, true);
        $outName = Str::uuid() . '.jpg';
        $outAbsolute = rtrim($outputDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $outName;

        $debug = [
            'input' => $tmpAbsolute,
            'out' => $outAbsolute,
            'ext' => $ext,
            'mime' => $mime,
            'attempts' => []
        ];

        // quick non-HEIC copy
        if (!$isHeic) {
            try {
                copy($tmpAbsolute, $outAbsolute);
                @unlink($tmpAbsolute);
                return response()->json(['success' => true, 'method' => 'copy', 'file' => $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix)]);
            } catch (\Exception $e) {
                Log::error('copy non-heic failed', ['err' => $e->getMessage()]);
                return $this->jsonError('خطا در ذخیره‌سازی فایل غیر HEIC.', 500);
            }
        }

        // detection helpers
        $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
        $which = function($bin) {
            if (!$bin) return null;
            if (file_exists($bin) && is_executable($bin)) return $bin;
            try {
                $out = trim(shell_exec("which " . escapeshellarg($bin) . " 2>/dev/null") ?: shell_exec("command -v " . escapeshellarg($bin) . " 2>/dev/null"));
                if ($out) return $out;
            } catch (\Throwable $e) {}
            return null;
        };

        // ===== Windows branch (local) =====
        if ($isWindows) {
            // prefer explicit IMAGEMAGICK_BIN env or common local path
            $magickPath = env('IMAGEMAGICK_BIN', 'C:\\Program Files\\ImageMagick-7.1.2-Q16-HDRI\\magick.exe');
            $magick = $which($magickPath) ?: $which('magick');
            if ($magick) {
                $cmdArray = [$magick, $tmpAbsolute, $outAbsolute];
                $attempt = ['method' => 'magick_windows', 'command' => implode(' ', array_map('escapeshellarg', $cmdArray)), 'ok' => false];
                try {
                    $proc = new Process($cmdArray);
                    $proc->setTimeout(60);
                    $proc->run();
                    $attempt['exit'] = $proc->getExitCode();
                    $attempt['stdout'] = trim($proc->getOutput());
                    $attempt['stderr'] = trim($proc->getErrorOutput());
                    $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                    $debug['attempts'][] = $attempt;
                    if ($attempt['ok']) {
                        @unlink($tmpAbsolute);
                        return response()->json(['success' => true, 'method' => 'magick_windows', 'file' => $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix), 'debug' => $debug]);
                    }
                } catch (\Throwable $e) {
                    $attempt['error'] = $e->getMessage();
                    $debug['attempts'][] = $attempt;
                }
            } else {
                $debug['attempts'][] = ['method'=>'magick_windows','ok'=>false,'error'=>'magick not found'];
            }

            // fallback: Imagick PHP extension (Windows)
            if (extension_loaded('imagick')) {
                $attempt = ['method' => 'imagick_ext_windows', 'ok' => false];
                try {
                    $im = new \Imagick();
                    $im->readImage($tmpAbsolute . '[0]');
                    $im->setImageFormat('jpeg');
                    $im->setImageCompressionQuality(88);
                    $im->writeImage($outAbsolute);
                    $im->clear(); $im->destroy();
                    $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                    $debug['attempts'][] = $attempt;
                    if ($attempt['ok']) {
                        @unlink($tmpAbsolute);
                        return response()->json(['success' => true, 'method' => 'imagick_ext_windows', 'file' => $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix), 'debug' => $debug]);
                    }
                } catch (\Throwable $e) {
                    $attempt['error'] = $e->getMessage();
                    $debug['attempts'][] = $attempt;
                }
            } else {
                $debug['attempts'][] = ['method'=>'imagick_ext_windows','ok'=>false,'error'=>'imagick extension not loaded'];
            }

            Log::error('Windows conversion failed', ['debug'=>$debug]);
            return response()->json(['success'=>false,'error'=>'تبدیل در لوکال موفق نبود','debug'=>$debug],500);
        }

        // ===== Linux / host branch =====
        // Prefer imagick extension first (reads frame 0)
        if (extension_loaded('imagick')) {
            $attempt = ['method' => 'imagick_ext_linux', 'ok' => false];
            try {
                $im = new \Imagick();
                $im->readImage($tmpAbsolute . '[0]');
                $im->setImageFormat('jpeg');
                $im->setImageCompressionQuality(88);
                $im->writeImage($outAbsolute);
                $im->clear(); $im->destroy();
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;
                if ($attempt['ok']) {
                    @unlink($tmpAbsolute);
                    return response()->json(['success' => true, 'method' => 'imagick_ext_linux', 'file' => $this->makePublicUrl($outName, $usePublicHtml, $publicUrlPrefix), 'debug' => $debug]);
                }
            } catch (\Throwable $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
            }
        } else {
            $debug['attempts'][] = ['method'=>'imagick_ext_linux','ok'=>false,'error'=>'imagick extension not loaded'];
        }

        // heif-convert
        $hcBin = env('HEIF_CONVERT_BIN', 'heif-convert');
        $hc = $which($hcBin);
        if ($hc) {
            $cmd = escapeshellarg($hc) . ' ' . escapeshellarg($tmpAbsolute) . ' ' . escapeshellarg($outAbsolute);
            $attempt = ['method'=>'heif-convert','command'=>$cmd,'ok'=>false];
            try {
                $proc = Process::fromShellCommandline($cmd);
                $proc->setTimeout(45);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;
                if ($attempt['ok']) {
                    @unlink($tmpAbsolute);
                    return response()->json(['success'=>true,'method'=>'heif-convert','file'=>$this->makePublicUrl($outName,$usePublicHtml,$publicUrlPrefix),'debug'=>$debug]);
                }
            } catch (\Throwable $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
            }
        } else {
            $debug['attempts'][] = ['method'=>'heif-convert','ok'=>false,'error'=>'not found'];
        }

        // ffmpeg
        $ffBin = env('FFMPEG_BIN','ffmpeg');
        $ff = $which($ffBin);
        if ($ff) {
            $cmd = escapeshellarg($ff) . ' -v error -y -i ' . escapeshellarg($tmpAbsolute) . ' -frames:v 1 ' . escapeshellarg($outAbsolute);
            $attempt = ['method'=>'ffmpeg','command'=>$cmd,'ok'=>false];
            try {
                $proc = Process::fromShellCommandline($cmd);
                $proc->setTimeout(30);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;
                if ($attempt['ok']) {
                    @unlink($tmpAbsolute);
                    return response()->json(['success'=>true,'method'=>'ffmpeg','file'=>$this->makePublicUrl($outName,$usePublicHtml,$publicUrlPrefix),'debug'=>$debug]);
                }
            } catch (\Throwable $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
            }
        } else {
            $debug['attempts'][] = ['method'=>'ffmpeg','ok'=>false,'error'=>'not found'];
        }

        // magick CLI (linux). allow IMAGEMAGICK_LD_PATH env to be set if needed
        $magickFromEnv = env('IMAGEMAGICK_BIN', null);
        $magick = $which($magickFromEnv) ?: $which('magick') ?: $which('convert');
        if ($magick) {
            $cmd = escapeshellarg($magick) . ' ' . escapeshellarg($tmpAbsolute) . ' ' . escapeshellarg($outAbsolute);
            $attempt = ['method'=>'magick_cli_linux','command'=>$cmd,'ok'=>false];
            try {
                $proc = Process::fromShellCommandline($cmd);
                $ld = env('IMAGEMAGICK_LD_PATH', null);
                if ($ld) {
                    $proc->setEnv(['LD_LIBRARY_PATH' => $ld] + getenv());
                }
                $proc->setTimeout(60);
                $proc->run();
                $attempt['exit'] = $proc->getExitCode();
                $attempt['stdout'] = trim($proc->getOutput());
                $attempt['stderr'] = trim($proc->getErrorOutput());
                $attempt['ok'] = file_exists($outAbsolute) && filesize($outAbsolute) > 0;
                $debug['attempts'][] = $attempt;
                if ($attempt['ok']) {
                    @unlink($tmpAbsolute);
                    return response()->json(['success'=>true,'method'=>'magick_cli_linux','file'=>$this->makePublicUrl($outName,$usePublicHtml,$publicUrlPrefix),'debug'=>$debug]);
                }
            } catch (\Throwable $e) {
                $attempt['error'] = $e->getMessage();
                $debug['attempts'][] = $attempt;
            }
        } else {
            $debug['attempts'][] = ['method'=>'magick_cli_linux','ok'=>false,'error'=>'not found'];
        }

        Log::error('All conversion attempts failed', ['debug'=>$debug]);
        return response()->json(['success'=>false,'error'=>'تبدیل HEIC انجام نشد','debug'=>$debug],500);
    }

    protected function makePublicUrl(string $outName, bool $usePublicHtml, $publicUrlPrefix)
    {
        if ($usePublicHtml) return rtrim($publicUrlPrefix, '/') . '/' . ltrim($outName, '/');
        return $publicUrlPrefix . $outName;
    }

    protected function jsonError($msg, $code = 400)
    {
        return response()->json(['success' => false, 'error' => $msg], $code);
    }
}
