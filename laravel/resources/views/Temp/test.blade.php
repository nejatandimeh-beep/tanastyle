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
        if (!$request->hasFile('image')) {
            return response()->json(['success' => false, 'error' => 'هیچ فایلی دریافت نشد']);
        }

        $file = $request->file('image');

        if (!$file->isValid()) {
            return response()->json(['success' => false, 'error' => 'فایل معتبر نیست']);
        }

        try {
            // cast به string برای جلوگیری از خطاهای PHP 8.1
            $ext = strtolower((string) $file->getClientOriginalExtension());
            $mime = (string) $file->getClientMimeType();

            $tmpName = (string) Str::uuid() . '.' . $ext;
            $tmpRelative = 'tmp/' . $tmpName;
            $file->storeAs('tmp', $tmpName);
            $tmpAbsolute = storage_path('app/' . $tmpRelative);

            $outputDir = storage_path('app/public/uploads');
            if (!file_exists($outputDir)) mkdir($outputDir, 0777, true);

            $isHeic = in_array($ext, ['heic', 'heif']) || in_array($mime, ['image/heic', 'image/heif']);

            if ($isHeic) {
                $outFilename = pathinfo($tmpName, PATHINFO_FILENAME) . '.jpg';
                $outAbsolute = $outputDir . DIRECTORY_SEPARATOR . $outFilename;

                $magickPath = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'
                    ? 'C:\\Program Files\\ImageMagick-7.1.2-Q16-HDRI\\magick.exe'
                    : 'magick';

                $proc = new Process([$magickPath, $tmpAbsolute, $outAbsolute]);
                $proc->run();

                if (!$proc->isSuccessful()) {
                    Log::error('HEIC convert failed: ' . $proc->getErrorOutput());
                    throw new ProcessFailedException($proc);
                }

                Log::info('HEIC converted successfully: ' . $outAbsolute);

                $proc->setTimeout(60);
                $proc->run();

                if (!$proc->isSuccessful()) {
                    Log::error('HEIC convert failed: ' . $proc->getErrorOutput());
                    Log::error('Command line: ' . $proc->getCommandLine());
                    Storage::delete($tmpRelative);
                    return response()->json([
                        'success' => false,
                        'error' => 'خطای تبدیل HEIC: ' . $proc->getErrorOutput()
                    ]);
                }


                Storage::delete($tmpRelative);
                $uploaded = Storage::url('uploads/' . $outFilename);
            } else {
                $stored = $file->store('public/uploads');
                $uploaded = Storage::url(basename($stored));
            }

            // ✅ تعریف واضح $fileKey برای PHP 8.1
            $fileKey = 'image';
            return response()->json([
                'success' => true,
                'files' => [$fileKey => $uploaded]
            ]);

        } catch (\Exception $e) {
            Log::error('Upload error: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'خطا در آپلود فایل']);
        }
    }
}
