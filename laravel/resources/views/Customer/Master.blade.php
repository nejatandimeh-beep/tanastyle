@extends('Layouts.IndexCustomer')
@section('Content')
<div class="masterWallpaper d-flex justify-content-center bigDevice">
    <div class="bannerText">
        <h1 class="g-color-primary g-font-size-120 g-font-weight-600 m-0">تانا استایل</h1>
        <h1 class="g-color-gray-dark-v1 text-right g-font-size-30 g-mt-minus-30">استایلی خاص و متفاوت</h1>
        <h1 class="g-color-gray-dark-v1 g-font-size-30 text-right">خریدی<span class="g-color-primary g-mr-10"> آسان</span>، <span class="g-color-primary">سریع</span> و <span class="g-color-primary"> مطمئن</span></h1>
    </div>
</div>
<div class="masterWallpaperMobile d-flex justify-content-center smallDevice"></div>
<div class="g-py-5 g-brd-y g-brd-gray-light-v3 g-mb-40--lg">
    <div class="masterWallpaper2 d-flex justify-content-center g-brd-y g-bg-gray-dark-v1 g-brd-gray-light-v5">
        <form style="direction: rtl" class="align-self-center text-center">
            <h1 style="font-weight: bold" class="g-color-white g-font-size-50--md g-font-size-20">دنبال پوشاک خاصی می گردید؟</h1>
            <p style="font-family: Tahoma" class="g-color-primary">جستجوگر ما کمکتان میکند..</p>
            <input oninput="productSearch('productSearch',$(this).attr('value'))"
                   onclick="$('#productSearch').removeClass('d-none')"
                   style="direction:rtl; padding: 10px; outline: none; border:none; opacity:0.9; border-radius: 0"
                   class="col-lg-9 col-12 g-font-size-16"
                   type="text" placeholder="تایپ کن و بگرد..">
            <ul id="productSearch" class="d-none p-0 col-lg-9 col-11 m-auto outSideClick"></ul>
        </form>
    </div>
</div>
<div id="productContainer" class="g-mb-50 g-mt-0 g-pt-40 g-mt-0--lg masterPage">
{{--    <h1 class="d-block text-right g-brd-bottom g-brd-gray-light-v4 h5 g-pa-10 g-mx-30 g-mt-10">{{$title}}</h1>--}}
</div>
<div id="loadProduct" class="d-none loadProduct"></div>
<div id="discountsContainer" class="d-none g-mt-40">
    <p style="direction: rtl" class="container g-color-gray-dark-v1 g-pr-0--lg g-font-size-16">تخفیفات ویژه</p>
    <!-- Products -->

    <!-- End Products -->
</div>
@endsection
