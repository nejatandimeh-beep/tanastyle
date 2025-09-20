@extends('Layouts.IndexCustomer')
@section('Content')
    <script>
        // ثبت Service Worker بهینه
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => {
                        console.log('Service Worker فعال شد', reg);

                        // بررسی بروزرسانی Service Worker
                        reg.onupdatefound = () => {
                            const newWorker = reg.installing;
                            newWorker.onstatechange = () => {
                                if (newWorker.state === 'activated') {
                                    console.log('نسخه جدید Service Worker فعال شد');
                                    // اگر بخوای می‌تونی اینجا refresh خودکار صفحه بزنی
                                    // window.location.reload();
                                }
                            };
                        };
                    })
                    .catch(err => console.error('Service Worker ثبت نشد:', err));
            });
        }
    </script>
    <!-- Modal -->
    <div style="direction: rtl" id="install-modal">
        <div class="modal-content">
            <h2 class="g-font-weight-600">اپلیکیشن میوان را نصب کنید</h2>
            <p>با نصب اپ، دسترسی سریع و راحت و همچنین تجربه بهتری از وب‌سایت خواهید داشت.</p>
            <button id="install-btn">نصب اپ</button>
            <button id="close-btn">بعداً</button>
        </div>
    </div>
    <div class="masterPage">
        <div style="background-image: linear-gradient(to bottom, #ffffff,rgba(240,240,240,1));">
            <div class="carousel-container d-lg-block d-none">
                <div class="carousel-track desktop-track">
                    <div class="slide">
                        <div style="position: relative">
                            <img src="{{asset('img/Banners/new.jpg?v=2')}}" alt="اسلاید 1">
                            <div
                                style="direction:rtl; position: absolute; top: 37%; right: 22%; border-right: 2px solid #7fc242"
                                class="text-right g-font-weight-600 g-pr-10 g-font-size-35 g-color-white">
                                <p class="m-0">داری چیزی میفروشی؟</p>
                                <p class="m-0 g-bg-white g-color-primary g-px-5 g-font-size-30">پس منتظرت بودیم!</p>
                                <a style="direction: rtl" href="{{route('sellerLoginMode')}}"
                                   class="btn btn-xl g-mt-5 btn-primary col-12 g-font-weight-600 g-letter-spacing-0_5 text-uppercase text-left rounded-0">
                                    <i class="fa fa-user-plus float-left g-font-size-32 g-ml-15"></i>
                                    <span class="pull-right text-right">
                                        <span class="g-font-size-25 g-font-weight-600">ثبت نام</span>
                                        <span class="d-block g-font-size-13">همین الان غرفه‌ات رو بساز..</span>
                                      </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div style="position: relative;">
                            <img src="{{asset('img/Banners/new2.jpg?v=2')}}" alt="اسلاید 2">
                            <div style="direction:rtl; position: absolute; bottom: 20%" class="text-center col-12">
                                <p class="m-0 g-color-white g-font-weight-600 g-font-size-45">میوان مهمانی برای همه</p>
                                <p class="m-0 g-color-primary g-font-weight-600 g-font-size-45">ما یه بازار آنلاین
                                    هستیم</p>
                                <p class="m-0 g-color-white g-font-weight-600 g-font-size-33">برای همه مشاغل از کوچک تا
                                    بزرگ</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div style="position: relative">
                            <img src="{{asset('img/Banners/new3.jpg?v=2')}}" alt="اسلاید 1">
                            <div
                                style="direction:rtl; position: absolute; top: 22%; right: 31%; border-right: 2px solid #7fc242"
                                class="text-right g-font-weight-800 g-pr-10 g-font-size-40 g-color-white">
                                <p class="m-0 g-color-primary">از همین الان</p>
                                <p class="m-0 g-font-size-30 g-font-weight-300">تا یکماه آینده ثبت نام کن</p>
                                <p class="m-0 g-font-size-30 g-font-weight-300">تا به مدت یک هفته</p>
                                <p class="m-0 g-bg-white-opacity-0_9 g-color-primary g-pa-5 g-font-size-25">تبلیغت روی
                                    بنر اصلی سایت بدرخشه!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-container d-lg-none">
                <div class="carousel-track mobile-track">
                    <div class="slide">
                        <div style="position: relative">
                            <img src="{{asset('img/Banners/new-mobile.jpg?v=2')}}" alt="اسلاید 1">
                            <div
                                style="direction:rtl; position: absolute; top: 18%; right: 5%; border-right: 2px solid #7fc242"
                                class="half-right text-right g-font-weight-600 g-pr-10 g-font-size-30 g-color-white">
                                <p class="m-0">داری</p>
                                <p class="m-0">چیزی</p>
                                <p class="m-0">می فروشی؟</p>
                                <p class="m-0 g-bg-white-opacity-0_9 g-color-primary g-pa-5 g-font-size-20">پس منتظرت
                                    بودیم!</p>
                                <a style="direction: rtl" href="{{route('sellerLoginMode')}}"
                                   class="btn btn-xl g-mt-5 btn-primary col-12 g-font-weight-600 g-letter-spacing-0_5 text-uppercase rounded-0">
                                    <i class="fa fa-user-plus float-left g-font-size-32 g-mr-15"></i>
                                    <span class="pull-right">
                                        <span class="g-font-size-25 g-font-weight-600">ثبت نام</span>
                                        <span class="d-block g-font-size-13">غرفه‌ات رو بساز..</span>
                                      </span>
                                </a>
                            </div>
                            <div style="position: absolute; bottom: 10%; right: 5%; width: 200px" class="half-right">
                                <img src="{{ asset('img/Logo/logo2.png') }}" alt="فروشگاه بزرگ میوان" class="g-pt-0">
                                <p style="text-align-last: justify" class="m-0 g-color-white">شرکت تابش پس زمینه
                                    مکریان</p>
                                <p class="m-0 g-color-white d-flex justify-content-between">
                                    <span>تاسیس 1400</span><span>ثبت 2918</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div style="position: relative;">
                            <img src="{{asset('img/Banners/new-mobile2.jpg?v=2')}}" alt="اسلاید 2">
                            <div style="direction:rtl; position: absolute; top: 10%" class="text-center col-12">
                                <p class="m-0 g-color-primary g-font-weight-600 g-font-size-28">ما یه بازار آنلاین
                                    هستیم</p>
                                <p class="m-0 g-color-white g-font-size-20">برای همه مشاغل از کوچک تا بزرگ</p>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div style="position: relative">
                            <img src="{{asset('img/Banners/new-mobile3.jpg?v=2')}}" alt="اسلاید 1">
                            <div
                                style="direction:rtl; position: absolute; left: 7%; top: 40%; border-left: 2px solid #7fc242"
                                class="half-left text-left g-pl-10 g-font-size-25 g-color-white">
                                <p class="m-0 g-color-primary g-font-weight-600">از همین الان</p>
                                <p class="m-0 g-font-size-20 ">تا یکماه آینده ثبت نام کن</p>
                                <p class="m-0 g-font-size-20 ">تا به مدت یک هفته</p>
                                <p class="m-0 g-bg-white-opacity-0_9 g-color-primary g-pa-5 g-font-size-16">تبلیغت روی
                                    بنر اصلی سایت بدرخشه!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-image: linear-gradient(to bottom, rgba(240,240,240,1), #ffffff);"
             class="g-pb-50 g-pt-20">
            <div style="direction: rtl" class="container text-center g-z-index-1 g-px-30">
                <h1 class="d-none h1 g-color-gray-dark-v3 g-font-weight-600 g-mb-15">فروشگاه بزرگ میوان</h1>
                <h1 class="h1 g-color-primary g-font-weight-600 g-mb-15 bigDevice">میوان
                    <span class="g-color-gray-dark-v3 ">ویترین دیجیتال کسب‌ و کار شما</span></h1>

                <h1 class="h2 g-color-primary g-font-weight-600 g-mb-15 smallDevice">میوان
                    <span class="g-color-gray-dark-v3">ویترین دیجیتال کسب‌ و کار شما</span></h1>
                <h4 class="g-color-gray-dark-v5 g-mb-30">از میوان به بازار تنها یک کلیک فاصله‌ست..</h4>
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
                        <i class="icon-present g-mt-5"></i>
                      </span>
                    </span>
                        <h1 class="h5 g-color-black mb-3">کسب 3 امتیاز در میوان</h1>
                        <p class="g-color-gray-dark-v4">ارسال محصول به مدت 3 ماه رایگان</p>
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
                        <h1 class="h5 g-color-black mb-3">کسب 15 امتیاز در میوان</h1>
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
                        <h1 class="h5 g-color-black mb-3">کسب 8 امتیاز در میوان</h1>
                        <p class="g-color-gray-dark-v4">یک خرید رایگان تا سقف محدود</p>
                    </div>
                    <!-- End Icon Blocks -->
                </div>
            </div>
        </div>
        <div id="newProductContainer" class="g-pt-10">
            <div class="container g-mb-10 g-brd-bottom g-brd-gray-light-v4">
                <h4 class="text-lg-right text-center g-my-20 g-my-10--lg">جدیدترین های میوان</h4>
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
                                                <h4 style="text-overflow: ellipsis; overflow: hidden; width: 160px; white-space: nowrap;"
                                                    class="h6 g-color-black my-1">
                                                    <span class="u-link-v5 g-color-black"
                                                          tabindex="0">
                                                        {{ $row->Name }}
                                                        <span
                                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Model }}</span>
                                                        <span
                                                            class="{{ $row->GenderCode==='6'?'d-none':'' }} g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>
                                                    </span>
                                                </h4>
                                                <div>
                                                    <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                        <span class="g-color-primary">{{ $row->Size }}</span>
                                                    </span>
                                                    <span>رنگ
                                                    <span class="g-color-primary">{{ $row->Color }}</span>
                                                </span>
                                                </div>
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}"><span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد در انبار</span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
                                        class="g-px-10 g-pt-10 productFrame g-pb-30">
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
        <div id="glass">
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
                                            <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                <span class="g-color-primary">{{ $row->Size }}</span>
                                            </span>
                                                    <span>رنگ
                                                <span class="g-color-primary">{{ $row->Color }}</span>
                                            </span>
                                                </div>
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}"><span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد در انبار </span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
                                        class="g-px-10 g-pt-10 productFrame g-pb-30">
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
        <div id="dress">
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
                                            <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                <span class="g-color-primary">{{ $row->Size }}</span>
                                            </span>
                                                    <span>رنگ
                                                <span class="g-color-primary">{{ $row->Color }}</span>
                                            </span>
                                                </div>
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}"><span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد در انبار </span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
                                        class="g-px-10 g-pt-10 productFrame g-pb-30">
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
        <div id="earrings">
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
                                            <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                <span class="g-color-primary">{{ $row->Size }}</span>
                                            </span>
                                                    <span>رنگ
                                                <span class="g-color-primary">{{ $row->Color }}</span>
                                            </span>
                                                </div>
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}"><span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد در انبار </span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
                                        class="g-px-10 g-pt-10 productFrame g-pb-30">
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
        <div id="Bracelets ">
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
                                            <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                <span class="g-color-primary">{{ $row->Size }}</span>
                                            </span>
                                                    <span>رنگ
                                                <span class="g-color-primary">{{ $row->Color }}</span>
                                            </span>
                                                </div>
                                                <span><span id="{{ 'cartQty'.$key }}"
                                                            class="g-color-primary">{{ $row->Qty }}</span> عدد در انبار </span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
                                        class="g-px-10 g-pt-10 productFrame g-pb-30">
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
        <div id="spacialDiscount">
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
                                                    class="{{ $row->GenderCode==='6'?'d-none':'' }} g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>
                                            </span>
                                                </h4>
                                                <div>
                                            <span class="g-ml-5 {{ $row->Size =='--'?'d-none':'' }}">سایز
                                                <span class="g-color-primary">{{ $row->Size }}</span>
                                            </span>
                                                    <span>رنگ
                                                <span class="g-color-primary">{{ $row->Color }}</span>
                                            </span>
                                                </div>
                                                <span class="{{ $row->Qty ==0 ?'opacity-0': '' }}">در انبار <span
                                                        id="{{ 'cartQty'.$key }}"
                                                        class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
                                                <h1 class="text-right h6 g-font-weight-300 g-color-black mb-2">فروشنده:
                                                    {{$row->ShopName}}</h1>
                                            </div>
                                        </div>
                                        <div
                                            class="d-block g-color-black g-font-size-17 g-ml-5">
                                            <div style="direction: rtl"
                                                 class="d-flex justify-content-between text-left">
                                                <div>
                                                    <s class="{{$row->Discount==0?'d-none':''}} g-color-gray-light-v2">{{  number_format($row->FinalPriceWithoutDiscount) }}</s>
                                                    <span
                                                        class="{{$row->Discount==0?'d-none':''}} g-color-lightred g-mx-5 g-font-weight-500">
                                                        {{  number_format($row->Discount) }}%
                                                    </span>
                                                </div>
                                                <div>
                                                    <span>{{ number_format($row->PriceWithDiscount) }}</span>
                                                    <span
                                                        class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                                </div>
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
