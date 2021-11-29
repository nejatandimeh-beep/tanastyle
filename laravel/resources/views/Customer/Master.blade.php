@extends('Layouts.IndexCustomer')
@section('Content')
<div class="masterWallpaper d-flex justify-content-center">
        <form style="direction: rtl" class="align-self-center text-center">
            <h1 style="font-weight: bold" class="g-color-white g-font-size-50--md g-font-size-20">دنبال پوشاک خاصی می گردید؟</h1>
            <p style="font-family: Tahoma" class="g-color-white">جستجوگر ما کمکتان میکند..</p>
            <input oninput="productSearch('productSearch',$(this).attr('value'))"
                   onclick="$('#productSearch').removeClass('d-none')"
                   style="direction:rtl; padding: 10px; outline: none; border:none; opacity:0.9; border-radius: 0"
                   class="col-lg-9 col-11 g-font-size-16"
                   type="text" placeholder="تایپ کن و بگرد..">
            <ul id="productSearch" class="d-none p-0 col-lg-9 col-11 m-auto outSideClick"></ul>
        </form>
</div>
    <div class="container g-pt-80">
        <div class="row m-0">
            <div class="col-lg-4 g-mb-30">
                <!-- Icon Blocks -->
                <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5 g-ml-5"></i>
                      </span>
                    </span>
                    <h3 class="h5 g-color-black mb-3">کسب 3 امتیاز در تانا استایل</h3>
                    <p class="g-color-gray-dark-v4">ارسال محصول برای همیشه رایگان</p>
                </div>
                <!-- End Icon Blocks -->
            </div>

            <div class="col-lg-4 g-mb-30">
                <!-- Icon Blocks -->
                <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5"></i>
                      </span>
                    </span>
                    <h3 class="h5 g-color-black mb-3">کسب 15 امتیاز در تانا استایل</h3>
                    <p class="g-color-gray-dark-v4">ورود به قرعه کشی یک سال خرید با تخفیف مازاد</p>
                </div>
                <!-- End Icon Blocks -->
            </div>

            <div class="col-lg-4 g-mb-30">
                <!-- Icon Blocks -->
                <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5"></i>
                      </span>
                    </span>
                    <h3 class="h5 g-color-black mb-3">کسب 8 امتیاز در تانا استایل</h3>
                    <p class="g-color-gray-dark-v4">یک خرید رایگان تا سقف محدود</p>
                </div>
                <!-- End Icon Blocks -->
            </div>
        </div>
    </div>
    <div class="container g-pt-40 g-pb-70">
        <div class="row g-mx-minus-10">
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productFemaleList') }}">
                        <img class="w-100" src="img/Other/cat-female.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productFemaleList') }}">پوشاک زنانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productMaleList') }}">
                    <img class="w-100" src="img/Other/cat-male.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productMaleList') }}">پوشاک مردانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productGirlList') }}">
                    <img class="w-100" src="img/Other/cat-girl.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productGirlList') }}">پوشاک دخترانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBoyList') }}">
                    <img class="w-100" src="img/Other/cat-boy.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBoyList') }}">پوشاک پسرانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBabyGirlList') }}">
                    <img class="w-100" src="img/Other/cat-babyGirl.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBabyGirlList') }}">پوشاک نوزادی دخترانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
            <div class="col-sm-6 col-md-4 g-mb-30">
                <!-- Article -->
                <article class="g-pos-rel g-rounded-4 g-brd-bottom g-brd-3 g-brd-gray-light-v4 g-brd-primary--hover text-center g-transition-0_3 g-transition--linear">
                    <!-- Article Image -->
                    <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBabyBoyList') }}">
                    <img class="w-100" src="img/Other/cat-babyBoy.jpg" alt="Image Description">
                    </a>
                    <!-- End Article Image -->

                    <!-- Article Content -->
                    <div class="g-bg-secondary g-pa-30">
                        <h3 class="h4">
                            <a class="g-color-main g-color-primary--hover g-text-underline--none--hover" href="{{ route('productBabyBoyList') }}">پوشاک نوزادی پسرانه</a>
                        </h3>

                    </div>
                    <!-- End Article Content -->
                </article>
                <!-- End Article -->
            </div>
        </div>
    </div>
    <p style="direction: rtl" class="container g-color-gray-drk-v3 g-pr-0--lg g-font-size-16">تخفیفات ویژه</p>
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
            @foreach($data as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-30">
                        <div class="g-pt-10">
                            <div id="carousel-08-1"
                                 class="js-carousel text-center g-mb-20"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-2">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.png' }}"
                                             alt="Image Description">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- مشخصات محصول -->
                        <div style="direction: rtl" class="media g-mt-20 g-brd-top g-brd-gray-light-v4 g-pt-20">
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
                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>
                                        <span
                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Model }}</span>
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
@endsection
