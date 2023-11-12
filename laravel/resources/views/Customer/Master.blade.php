@extends('Layouts.IndexCustomer')
@section('Content')
    <div class="masterPage">
        <div class="d-lg-none">
            <div style="background-image: linear-gradient(to bottom, #ffffff,rgba(240,240,240,1));">
                <div class="container">
                    <a style="direction: rtl" href="{{route('feed')}}" class="text-decoration-none">
                        <img class="img-fluid w-100" loading="lazy"
                             src="{{asset('img/Other/tanakora.png')}}"
                             alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                    </a>
                </div>
                <div class="container text-lg-right text-center g-pb-30">
                    <h1 class="h3">بازارچه مجازی</h1>
                    <h2 class="h5">همین الان دیدن کن و داغترین ها رو ببین</h2>
                    <h3 class="h5 g-mb-0">
                        <a style="direction: rtl" href="{{route('feed')}}" class="text-decoration-none">
                            ! بزن بریم
                        </a>
                    </h3>
                </div>
            </div>
        </div>
        <div  style="background-image: linear-gradient(to bottom, #ffffff,rgba(240,240,240,1));" class="d-lg-block d-none">
            <a style="direction: rtl" href="{{route('feed')}}" class="text-decoration-none">
                <img class="img-fluid w-100" loading="lazy"
                     src="{{asset('img/Other/tanakora2.png')}}"
                     alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
            </a>
            <div style="padding-right: 17%" class="text-lg-right text-center">
                <h1>بازارچه مجازی</h1>
                <h2 class="h5">همین الان دیدن کن و داغترین ها رو ببین</h2>
                <h3 class="g-pb-60 g-mb-0">
                    <a style="direction: rtl" href="{{route('feed')}}" class="text-decoration-none">
                        ! بزن بریم
                    </a>
                </h3>
            </div>
        </div>
        <div style="background-image: linear-gradient(to bottom, rgba(240,240,240,1), #ffffff);"
             class="g-py-50">
            <div class="container text-center g-z-index-1">
                <h1 class="d-none h1 g-color-gray-dark-v3 g-font-weight-600 g-mb-15">فروشگاه آنلاین پوشاک استوک و تاناکورا tanakora mahabad estok بدلیجات عینک زنانه پوشاک زنانه</h1>
                <h2 class="h1 g-color-primary g-font-weight-600 g-mb-15 bigDevice">تانا استایل
                    <span class="g-color-gray-dark-v3 ">استایلی خاص و متفاوت</span></h2>

                <h3 class="g-color-primary g-font-weight-600 g-mb-15 smallDevice">تانا استایل
                    <span class="g-color-gray-dark-v3">استایلی خاص و متفاوت</span></h3>
                <h4 class="g-color-gray-dark-v3  g-font-weight-600 g-mb-30">خریدی آسان، سریع و مطمئن</h4>
                <!-- Promo Blocks - Form -->
                <form style="direction: rtl" class="align-self-center text-center">
                    <input oninput="productSearch('productSearch',$(this).attr('value'))"
                           onclick="$('#productSearch').removeClass('d-none')"
                           style="direction:rtl; padding: 10px; outline: none; opacity:0.9; border-radius: 0"
                           class="col-lg-6 col-11 g-font-size-16 g-brd-around g-brd-gray-light-v3"
                           type="text" placeholder="تایپ کن و بگرد..">
                    <ul id="productSearch" class="d-none p-0 col-lg-9 col-11 m-auto outSideClick"></ul>
                </form>
                <!-- End Promo Blocks - Form -->
            </div>
        </div>
        <div class="container g-pb-50 g-mt-50--lg g-pb-100--lg">
            <div class="row m-0">
                <div class="col-lg-4 g-mb-0--lg g-mb-30">
                    <!-- Icon Blocks -->
                    <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5 g-ml-5"></i>
                      </span>
                    </span>
                        <h1 class="h5 g-color-black mb-3">کسب 3 امتیاز در تانا استایل</h1>
                        <p class="g-color-gray-dark-v4">ارسال محصول برای همیشه رایگان</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>

                <div class="col-lg-4 g-mb-0--lg g-mb-30">
                    <!-- Icon Blocks -->
                    <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5"></i>
                      </span>
                    </span>
                        <h1 class="h5 g-color-black mb-3">کسب 15 امتیاز در تانا استایل</h1>
                        <p class="g-color-gray-dark-v4">ورود به قرعه کشی یک سال خرید با تخفیف مازاد</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>

                <div class="col-lg-4 g-mb-0--lg g-mb-30">
                    <!-- Icon Blocks -->
                    <div class="text-center u-icon-block--hover">
                    <span
                        class="d-inline-block u-icon-v4 u-icon-v4-rounded-50x u-icon-size--xl u-icon-v4-bg-primary--hover g-color-white--hover g-mb-20">
                      <span class="u-icon-v4-inner">
                        <i class="icon-present g-mt-5"></i>
                      </span>
                    </span>
                        <h1 class="h5 g-color-black mb-3">کسب 8 امتیاز در تانا استایل</h1>
                        <p class="g-color-gray-dark-v4">یک خرید رایگان تا سقف محدود</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <div id="newProductContainer" class="g-pt-10">
            <div class="container g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">جدیدترین های تانا استایل</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($newProduct as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>
                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
                                            <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                                            <div class="d-flex flex-column col-12 g-px-5">
                                                <h1 class="h6 g-color-black my-1 text-left">
                                                    {{$row->Brand}}
                                                </h1>
                                                <h4 style="text-overflow: ellipsis; overflow: hidden; width: 160px; white-space: nowrap;" class="h6 g-color-black my-1">
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
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">موجودی <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl" class="text-left">
                                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{ number_format($row->FinalPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="g-pb-50">
                                <!-- Product -->
                                <figure style="direction: ltr;"
                                        class="g-px-10 g-py-10 productFrame g-pb-5">
                                    <div>
                                        <a href="{{ route('moreItem','newProduct') }}" class="customLinkHover">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{asset('img/Other/moreItem.jpg')}}"
                                                 alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                                        </a>
                                        <div style="padding: 62px;" class="text-center">
                                            <h5 class="">بیشتر ببینید</h5>
                                        </div>
                                    </div>

                                </figure>
                                <!-- End Product -->
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
        <div id="newProductContainer">
            <div class="container g-pt-50 g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">عینک</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($glass as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>

                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
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
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">موجودی <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl" class="text-left">
                                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{ number_format($row->FinalPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="g-pb-50">
                                <!-- Product -->
                                <figure style="direction: ltr;"
                                        class="g-px-10 g-py-10 productFrame g-pb-5">
                                    <div>
                                        <a href="{{ route('moreItem','730') }}" class="customLinkHover">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{asset('img/Other/moreItem.jpg')}}"
                                                 alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                                        </a>
                                        <div style="padding: 62px;" class="text-center">
                                            <h5 class="">بیشتر ببینید</h5>
                                        </div>
                                    </div>

                                </figure>
                                <!-- End Product -->
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
        <div id="newProductContainer">
            <div class="container g-pt-50 g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">لباس</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($dress as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>

                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
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
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">موجودی <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl" class="text-left">
                                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{ number_format($row->FinalPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="g-pb-50">
                                <!-- Product -->
                                <figure style="direction: ltr;"
                                        class="g-px-10 g-py-10 productFrame g-pb-5">
                                    <div>
                                        <a href="{{ route('moreItem','24') }}" class="customLinkHover">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{asset('img/Other/moreItem.jpg')}}"
                                                 alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                                        </a>
                                        <div style="padding: 62px;" class="text-center">
                                            <h5 class="">بیشتر ببینید</h5>
                                        </div>
                                    </div>

                                </figure>
                                <!-- End Product -->
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
        <div id="newProductContainer">
            <div class="container g-pt-50 g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">گوشواره</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($earring as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>

                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
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
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">موجودی <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl" class="text-left">
                                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{  number_format($row->UnitPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="g-pb-50">
                                <!-- Product -->
                                <figure style="direction: ltr;"
                                        class="g-px-10 g-py-10 productFrame g-pb-5">
                                    <div>
                                        <a href="{{ route('moreItem','700') }}" class="customLinkHover">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{asset('img/Other/moreItem.jpg')}}"
                                                 alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                                        </a>
                                        <div style="padding: 62px;" class="text-center">
                                            <h5 class="">بیشتر ببینید</h5>
                                        </div>
                                    </div>

                                </figure>
                                <!-- End Product -->
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
        <div id="newProductContainer">
            <div class="container g-pt-50 g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">دستبند و گردنبند</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($bracelet as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>

                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
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
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{ number_format($row->FinalPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                        <div class="swiper-slide">
                            <div class="g-pb-50">
                                <!-- Product -->
                                <figure style="direction: ltr;"
                                        class="g-px-10 g-py-10 productFrame g-pb-5">
                                    <div>
                                        <a href="{{ route('moreItem','703') }}" class="customLinkHover">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{asset('img/Other/moreItem.jpg')}}"
                                                 alt="بدلیجات پوشاک لباس تاناکورا مهاباد عمده خرده">
                                        </a>
                                        <div style="padding: 62px;" class="text-center">
                                            <h5 class="">بیشتر ببینید</h5>
                                        </div>
                                    </div>

                                </figure>
                                <!-- End Product -->
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
        <div id="newProductContainer">
            <div class="container g-pt-50 g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">تخفیفات ویژه</h4>
            </div>
            <div class="container g-px-0--lg g-mb-15">
                <!-- Slider main container -->
                <div class="swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        @foreach($discounts as $key =>$row)
                            <div class="swiper-slide">
                                <!-- Product -->
                                <div class="g-pb-50">
                                    <figure class="g-px-10 g-py-10 productFrame">
                                        <a href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}">
                                            <img class="img-fluid w-100" loading="lazy"
                                                 src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
                                                 alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">
                                        </a>

                                        <!-- مشخصات محصول -->
                                        <div style="direction: rtl"
                                             class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">
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
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">موجودی <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl" class="text-left">
                                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                    {{  number_format($row->FinalPriceWithoutDiscount) }}
                                                </s>
                                                <span>{{  number_format($row->FinalPrice) }}</span>
                                                <span
                                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                                <!-- End Product -->
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination "></div>
                </div>
            </div>
        </div>
    </div>
@endsection
