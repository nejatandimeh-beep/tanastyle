<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class MoveProductImagesTest extends TestCase
{
    /** @test */
    public function it_prepares_fake_storage_and_test_file()
    {
        // استفاده از storage فیک
        Storage::fake('public');

        // ساخت پوشه temp و فایل تستی
        Storage::disk('public')->put(
            'imagesTemp/products/test-folder/test.jpg',
            'fake-image-content'
        );

        // اطمینان از وجود فایل
        $this->assertTrue(
            Storage::disk('public')->exists('imagesTemp/products/test-folder/test.jpg')
        );
    }
}
