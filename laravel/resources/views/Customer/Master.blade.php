@extends('Layouts.IndexCustomer')
@section('Content')
<div class="masterWallpaper d-flex justify-content-center bigDevice">
    <div class="bannerText">
        <h1 class="g-color-primary g-font-size-120 g-font-weight-600 m-0">تانا استایل</h1>
        <h1 class="g-color-gray-dark-v1 text-right g-font-size-30 g-mt-minus-30">استایلی خاص و متفاوت</h1>
        <h1 class="g-color-gray-dark-v1 g-font-size-30 text-right">خریدی<span class="g-color-primary g-mr-10"> آسان</span>، <span class="g-color-primary">سریع</span> و <span class="g-color-primary"> مطمئن</span></h1>
    </div>
        <form style="direction: rtl" class="d-none align-self-center text-center">
            <h1 style="font-weight: bold" class="g-color-white g-font-size-50--md g-font-size-20">دنبال پوشاک خاصی می گردید؟</h1>
            <p style="font-family: Tahoma" class="g-color-white">جستجوگر ما کمکتان میکند..</p>
            <input oninput="productSearch('productSearch',$(this).attr('value'))"
                   onclick="$('#productSearch').removeClass('d-none')"
                   style="direction:rtl; padding: 10px; outline: none; border:none; opacity:0.9; border-radius: 0"
                   class="col-lg-9 col-12 g-font-size-16"
                   type="text" placeholder="تایپ کن و بگرد..">
            <ul id="productSearch" class="d-none p-0 col-lg-9 col-11 m-auto outSideClick"></ul>
        </form>
</div>
<div class="masterWallpaperMobile d-flex justify-content-center smallDevice"></div>
<div id="productContainer" class="g-mb-50 g-mt-0 g-pt-40 g-mt-0--lg masterPage">
{{--    <h1 class="d-block text-right g-brd-bottom g-brd-gray-light-v4 h5 g-pa-10 g-mx-30 g-mt-10">{{$title}}</h1>--}}
</div>
<div id="loadProduct" class="d-none loadProduct"></div>
<div class="g-mt-40">
    <p style="direction: rtl" class="container g-color-gray-dark-v1 g-pr-0--lg g-font-size-16">تخفیفات ویژه</p>
    <!-- Products -->
    <div class="container g-mb-100 g-brd-around g-brd-gray-light-v4 g-pt-15">
        <div id="js-carousel-1" class="js-carousel g-mb-15 g-mx-minus-10 g-pb-60"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($discounts as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">
                        <div>
                            <div id="carousel-08-{{100000+$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{100000+$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.png' }}"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- مشخصات محصول -->
                        <div style="direction: rtl" class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
                            <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                            <div class="d-flex flex-column col-12 g-px-5">
                                <h1 class="h6 g-color-black my-1 text-left">
                                    {{$row->Brand}}
                                </h1>
                                <h4 class="h6 g-color-black my-1">
                                    <span class="u-link-v5 g-color-black"
                                          tabindex="0">
                                        {{ $row->Name }}
                                        <span
                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Model }}</span>
                                        <span
                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>
                                    </span>
                                </h4>
                                <div>
                                    <span class="g-ml-5">سایز
                                        <span class="g-color-primary">{{ $row->Size }}</span>
                                    </span>
                                    <span>رنگ
                                        <span class="g-color-primary">{{ $row->Color }}</span>
                                    </span>
                                </div>
                                <span>موجودی <span id="{{ 'cartQty'.$key }}"
                                                   class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                            </div>
                        </div>
                        <div
                            class="d-block g-color-black g-font-size-17 g-ml-5">
                            <div style="direction: rtl" class="text-left">
                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                    {{  number_format($row->UnitPrice) }}
                                </s>
                                <span>{{  number_format($row->FinalPrice) }}</span>
                                <span
                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                            </div>
                        </div>
                    </figure>
                    <!-- End Product -->
                </div>
            @endforeach
        </div>
    </div>
    <!-- End Products -->
</div>
@endsection
