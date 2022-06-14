@extends('Layouts.IndexCustomer')
@section('Content')
<div class="masterWallpaper d-flex justify-content-center bigDevice masterPage">
    <div class="bannerText">
        <h1 class="g-color-primary g-font-size-120 g-font-weight-600 m-0">تانا استایل</h1>
        <h1 class="g-color-gray-dark-v1 text-right g-font-size-30 g-mt-minus-30">استایلی خاص و متفاوت</h1>
        <h1 class="g-color-gray-dark-v1 g-font-size-30 text-right">خریدی<span class="g-color-primary g-mr-10"> آسان</span>، <span class="g-color-primary">سریع</span> و <span class="g-color-primary"> مطمئن</span></h1>
    </div>
</div>
<div class="masterWallpaperMobile d-flex justify-content-center smallDevice"></div>
<div class="g-py-5 g-brd-y g-brd-gray-light-v3 g-mb-40--lg">
    <div class="masterWallpaper2 d-flex justify-content-center g-brd-y g-bg-black g-brd-gray-light-v5">
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
<div class="container g-pt-40">
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
                <h1 class="h5 g-color-black mb-3">کسب 3 امتیاز در تانا استایل</h1>
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
                <h1 class="h5 g-color-black mb-3">کسب 15 امتیاز در تانا استایل</h1>
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
                <h1 class="h5 g-color-black mb-3">کسب 8 امتیاز در تانا استایل</h1>
                <p class="g-color-gray-dark-v4">یک خرید رایگان تا سقف محدود</p>
            </div>
            <!-- End Icon Blocks -->
        </div>
    </div>
</div>
<div id="sunGlassContainer">

    <!-- Banners -->
    <div class="d-flex align-items-stretch g-px-10--lg">
        <div class="col-lg-5 g-px-0 g-px-10--lg">
            <!-- Article -->
            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-25--lg" data-bg-img-src="{{asset('img/Other/sunglass/topWall.jpg')}}" style="background-image: url({{asset('img/Other/sunglass/topWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-300 onlySmallFullOpacity">
                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">عینک آفتابی و بند عینک</h3>
                    <div class="g-line-height-2 g-mb-20">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">محافظ اشعه uv400 خورشید
                            عدسی مخصوص هوای ابری و آفتابی (cat.1)،
                            عدسی پلی کربنات فشرده نشکن،
                            فریم تمام کائوچویی عاری از پلاستیک،
                            دارای شناسنامه و برچسب اصالت،
                            دارای بارکد آنلاین فروشگاهی</p>
                    </div>
                    <span class="g-color-primary g-font-weight-700 g-font-size-16">با قیمت های استثنائی</span>
                </div>
            </article>
            <!-- End Article -->

            <!-- Article -->
            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/sunglass/bottomWall.jpg')}}" style="background-image: url({{asset('img/Other/sunglass/bottomWall.jpg')}});">
                <div style="visibility: hidden" class="g-flex-middle-item g-z-index-1">
                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>
                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>
                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>

        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">
            <!-- Article -->
            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/sunglass/bigWall.jpg')}}" style="background-image: url({{asset('img/Other/sunglass/bigWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-370">
                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">عینک آفتابی و بند عینک</h2>
                    <strong class="d-block g-color-white g-font-size-30 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary"> با تخفیف های</span> استثنائی</strong>
                    <div class="g-line-height-2 g-mb-35">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">محافظ اشعه uv400
                            عدسی مخصوص هوای ابری و آفتابی (cat.1)،
                            عدسی پلی کربنات فشرده نشکن،
                            فریم تمام کائوچویی عاری از پلاستیک،
                            دارای شناسنامه و برچسب اصالت،
                            دارای بارکد آنلاین فروشگاهی
                        </p>
                    </div>
                    <a class="d-none btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>
    </div>
    <!-- End Banners -->

    <div class="container g-px-0--lg">
        <div id="js-carousel-1" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($glass as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">
                        <div>
                            <div id="carousel-08-{{$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100" loading="lazy"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
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
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">
                        <div>
                            <div id="carousel-08-{{$key+1}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key+1}}">
                                <div class="js-slide">
                                    <a href="{{ route('moreItem','730') }}" class="customLinkHover">
                                        <div class="moreItem">
                                            <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </figure>
                    <!-- End Product -->
                </div>
        </div>
    </div>
</div>
<div id="earringContainer">
    <!-- Banners -->
    <div class="d-flex align-items-stretch g-px-10--lg">
        <div class="col-lg-5 g-px-0 g-px-10--lg">
            <!-- Article -->
            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-25--lg" data-bg-img-src="{{asset('img/Other/earring/topWall.jpg')}}" style="background-image: url({{asset('img/Other/earring/topWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-300 onlySmallFullOpacity">
                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">گوشواره و اکسسوری گوش</h3>
                    <div class="g-line-height-2 g-mb-20">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">گوشواره های ترکیبی خاص و تمام منجوق کاری شده
                            آنتی آلرژی،
                            آنتی باکتریال،
                            رنگ ثابت و ضد زنگ،
                            بارکد آنلاین فروشگاهی،</p>
                    </div>
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 text-uppercase">با قیمت های استثنائی</span>
                </div>
            </article>
            <!-- End Article -->

            <!-- Article -->
            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/earring/bottomWall.jpg')}}" style="background-image: url({{asset('img/Other/earring/bottomWall.jpg')}});">
                <div style="visibility: hidden" class="g-flex-middle-item g-z-index-1">
                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>
                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>
                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>

        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">
            <!-- Article -->
            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/earring/bigWall.jpg')}}" style="background-image: url({{asset('img/Other/earring/bigWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-370">
                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">گوشواره و اکسسوری گوش</h2>
                    <strong class="d-block g-color-white g-font-size-30 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary">با تخفیف های</span> استثنائی</strong>
                    <div class="g-line-height-2 g-mb-35">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">گوشواره های ترکیبی خاص و تمام منجوق کاری شده
                            آنتی آلرژی،
                            آنتی باکتریال،
                            رنگ ثابت و ضد زنگ،
                            بارکد آنلاین فروشگاهی،
                        </p>
                    </div>
                    <a class="d-none btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>
    </div>
    <!-- End Banners -->

    <div class="container g-px-0--lg">
        <div id="js-carousel-2" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($earring as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">
                        <div>
                            <div id="carousel-08-{{$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100" loading="lazy"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
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
            <div class="js-slide g-mx-10">
                <!-- Product -->
                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">
                    <div>
                        <div id="carousel-08-{{$key+1}}"
                             class="js-carousel text-center g-mb-5"
                             data-infinite="1"
                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                             data-nav-for="#carousel-08-{{$key+1}}">
                            <div class="js-slide">
                                <a href="{{ route('moreItem','700') }}" class="customLinkHover">
                                    <div class="moreItem">
                                        <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </figure>
                <!-- End Product -->
            </div>
        </div>
    </div>
</div>
<div id="necklaceContainer">
    <!-- Banners -->
    <div class="d-flex align-items-stretch g-px-10--lg">
        <div class="col-lg-5 g-px-0 g-px-10--lg">
            <!-- Article -->
            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-25--lg" data-bg-img-src="{{asset('img/Other/necklace/topWall.jpg')}}" style="background-image: url({{asset('img/Other/necklace/topWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-300 onlySmallFullOpacity">
                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">گردنبند و آویز رو لباسی</h3>
                    <div class="g-line-height-2 g-mb-20">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">استيل و مشتقات استیل،
                            با روكش و آبكارى طلا و نقره،
                            با نگين هاى مولتى كالر،
                            كيفيت ابكارى درجه يك،
                            انتى آلرژى،
                            انتى باكتريال،
                            بارکد آنلاین فروشگاهی
                        </p>
                    </div>
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 text-uppercase">با قیمت های اسثنائی</span>
                </div>
            </article>
            <!-- End Article -->

            <!-- Article -->
            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/necklace/bottomWall.jpg')}}" style="background-image: url({{asset('img/Other/necklace/bottomWall.jpg')}});">
                <div style="visibility: hidden" class="g-flex-middle-item g-z-index-1">
                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>
                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>
                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>

        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">
            <!-- Article -->
            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/necklace/bigWall.jpg')}}" style="background-image: url({{asset('img/Other/necklace/bigWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-370">
                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">گردنبند و آویز رو لباسی</h2>
                    <strong class="d-block g-color-white g-font-size-30 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary">با تخفیف های</span> استثنائی</strong>
                    <div class="g-line-height-2 g-mb-35">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">استيل و مشتقات استیل،
                            با روكش و آبكارى طلا و نقره،
                            با نگيناى مولتى كالر،
                            كيفيت ابكارى درجه يك،
                            انتى الرژى،
                            انتى باكتريال،
                            بارکد آنلاین فروشگاهی</p>
                    </div>
                    <a class="d-none btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>
    </div>
    <!-- End Banners -->

    <div class="container g-px-0--lg">
        <div id="js-carousel-3" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($necklace as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">
                        <div>
                            <div id="carousel-08-{{$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100" loading="lazy"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
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
            <div class="js-slide g-mx-10">
                <!-- Product -->
                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">
                    <div>
                        <div id="carousel-08-{{$key+1}}"
                             class="js-carousel text-center g-mb-5"
                             data-infinite="1"
                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                             data-nav-for="#carousel-08-{{$key+1}}">
                            <div class="js-slide">
                                <a href="{{ route('moreItem','701') }}" class="customLinkHover">
                                    <div class="moreItem">
                                        <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </figure>
                <!-- End Product -->
            </div>
        </div>
    </div>
</div>
<div id="braceletContainer">
    <!-- Banners -->
    <div class="d-flex align-items-stretch g-px-10--lg">
        <div class="col-lg-5 g-px-0 g-px-10--lg">
            <!-- Article -->
            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-30--lg" data-bg-img-src="{{asset('img/Other/bracelet/topWall.jpg')}}" style="background-image: url({{asset('img/Other/bracelet/topWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-300 onlySmallFullOpacity">
                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">دستبند و اکسسوری های دست</h3>
                    <div class="g-line-height-2 g-mb-20">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">با نگين های زيركنيا
                            و مرواريدهای پرورشى،
                            انتى آلرژى،
                            انتى باکتریال،
                            بارکد آنلاین فروشگاهی
                        </p>
                    </div>
                    <span class="g-color-primary g-font-weight-700 g-font-size-16 text-uppercase">با قیمت های استثنائی</span>
                </div>
            </article>
            <!-- End Article -->

            <!-- Article -->
            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/bracelet/bottomWall.jpg')}}" style="background-image: url({{asset('img/Other/bracelet/bottomWall.jpg')}});">
                <div style="visibility: hidden" class="g-flex-middle-item g-z-index-1">
                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>
                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>
                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>

        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">
            <!-- Article -->
            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/bracelet/bigWall.jpg')}}" style="background-image: url({{asset('img/Other/bracelet/bigWall.jpg')}});">
                <div class="g-flex-middle-item g-z-index-1 g-width-370">
                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">دستبند و اکسسوری های دست</h2>
                    <strong class="d-block g-color-white g-font-size-30 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary">با تخفیف های</span> استثنائی</strong>
                    <div class="g-line-height-2 g-mb-35">
                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">با نگين های زيركنيا و مخراج کاری شده
                            و مرواريدهای پرورشى،
                            انتى الرژى،
                            انتى باکتریال،
                            بارکد آنلاین فروشگاهی</p>
                    </div>
                    <a class="d-none btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>
                </div>
            </article>
            <!-- End Article -->
        </div>
    </div>
    <!-- End Banners -->

    <div class="container g-px-0--lg">
        <div id="js-carousel-5" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($bracelet as $key =>$row)
                <div class="js-slide g-mx-10">
                    <!-- Product -->
                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">
                        <div>
                            <div id="carousel-08-{{$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100" loading="lazy"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
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
            <div class="js-slide g-mx-10">
                <!-- Product -->
                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">
                    <div>
                        <div id="carousel-08-{{$key+1}}"
                             class="js-carousel text-center g-mb-5"
                             data-infinite="1"
                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                             data-nav-for="#carousel-08-{{$key+1}}">
                            <div class="js-slide">
                                <a href="{{ route('moreItem','703') }}" class="customLinkHover">
                                    <div class="moreItem">
                                        <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </figure>
                <!-- End Product -->
            </div>
        </div>
    </div>
</div>
{{--<div id="ringContainer">--}}
{{--    <!-- Banners -->--}}
{{--    <div class="d-flex align-items-stretch g-px-10--lg">--}}
{{--        <div class="col-lg-5 g-px-0 g-px-10--lg">--}}
{{--            <!-- Article -->--}}
{{--            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-25--lg" data-bg-img-src="{{asset('img/Other/ring.jpg')}}" style="background-image: url({{asset('img/Other/ring.jpg')}});">--}}
{{--                <div class="g-flex-middle-item g-z-index-1 g-width-300">--}}
{{--                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">Project planner</h3>--}}
{{--                    <div class="g-line-height-2 g-mb-20">--}}
{{--                        <p class="g-color-white-opacity-0_9">Fusce dolor libero, efficitur et lobortis at, faucibus nec nunc. Proin fermentum eget.</p>--}}
{{--                    </div>--}}
{{--                    <span class="g-color-primary g-font-weight-700 g-font-size-16 text-uppercase">From $20.00</span>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}

{{--            <!-- Article -->--}}
{{--            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/ring.jpg')}}" style="background-image: url({{asset('img/Other/ring.jpg')}});">--}}
{{--                <div class="g-flex-middle-item g-z-index-1">--}}
{{--                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>--}}
{{--                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>--}}
{{--                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}
{{--        </div>--}}

{{--        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">--}}
{{--            <!-- Article -->--}}
{{--            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/ring.jpg')}}" style="background-image: url({{asset('img/Other/ring.jpg')}});">--}}
{{--                <div class="g-flex-middle-item g-z-index-1 g-width-370">--}}
{{--                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">Pricing plans</h2>--}}
{{--                    <strong class="d-block g-color-white g-font-size-60 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary">40%</span> OFF</strong>--}}
{{--                    <div class="g-line-height-2 g-mb-35">--}}
{{--                        <p class="g-color-white-opacity-0_9">This is where we sit down, grab a cup of coffee and dial in the details. Understanding the task at hand and ironing out the wrinkles is key.</p>--}}
{{--                    </div>--}}
{{--                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Banners -->--}}
{{--    <div class="d-none col-12 p-0 text-center">--}}
{{--        <img src="{{asset('img/Other/ring.jpg')}}" alt="" class="force-col-12 col-lg-7">--}}
{{--        <h1 style="direction: rtl" class="h5 container g-color-gray-dark-v1 g-mb-0 g-pa-10 g-pr-15 g-mt-20 g-mb-40">انواع انگشتر مجلسی و کژوال</h1>--}}
{{--    </div>--}}
{{--    <div class="container g-px-0--lg">--}}
{{--        <div id="js-carousel-4" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"--}}
{{--             data-infinite="true"--}}
{{--             data-slides-show="4"--}}
{{--             data-autoplay="1"--}}
{{--             data-speed="5000"--}}
{{--             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"--}}
{{--             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"--}}
{{--             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"--}}
{{--             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">--}}
{{--            @foreach($ring as $key =>$row)--}}
{{--                <div class="js-slide g-mx-10">--}}
{{--                    <!-- Product -->--}}
{{--                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">--}}
{{--                        <div>--}}
{{--                            <div id="carousel-08-{{$key}}"--}}
{{--                                 class="js-carousel text-center g-mb-5"--}}
{{--                                 data-infinite="1"--}}
{{--                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"--}}
{{--                                 data-nav-for="#carousel-08-{{$key}}">--}}
{{--                                <div class="js-slide">--}}
{{--                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">--}}
{{--                                        <img class="img-fluid w-100" loading="lazy"--}}
{{--                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"--}}
{{--                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- مشخصات محصول -->--}}
{{--                        <div style="direction: rtl" class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">--}}
{{--                            <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->--}}
{{--                            <div class="d-flex flex-column col-12 g-px-5">--}}
{{--                                <h1 class="h6 g-color-black my-1 text-left">--}}
{{--                                    {{$row->Brand}}--}}
{{--                                </h1>--}}
{{--                                <h4 class="h6 g-color-black my-1">--}}
{{--                                    <span class="u-link-v5 g-color-black"--}}
{{--                                          tabindex="0">--}}
{{--                                        {{ $row->Name }}--}}
{{--                                        <span--}}
{{--                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Model }}</span>--}}
{{--                                        <span--}}
{{--                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>--}}
{{--                                    </span>--}}
{{--                                </h4>--}}
{{--                                <div>--}}
{{--                                    <span class="g-ml-5">سایز--}}
{{--                                        <span class="g-color-primary">{{ $row->Size }}</span>--}}
{{--                                    </span>--}}
{{--                                    <span>رنگ--}}
{{--                                        <span class="g-color-primary">{{ $row->Color }}</span>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <span>موجودی <span id="{{ 'cartQty'.$key }}"--}}
{{--                                                   class="g-color-primary">{{ $row->Qty }}</span> عدد</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="d-block g-color-black g-font-size-17 g-ml-5">--}}
{{--                            <div style="direction: rtl" class="text-left">--}}
{{--                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">--}}
{{--                                    {{  number_format($row->UnitPrice) }}--}}
{{--                                </s>--}}
{{--                                <span>{{  number_format($row->FinalPrice) }}</span>--}}
{{--                                <span--}}
{{--                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <!-- End Product -->--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <div class="js-slide g-mx-10">--}}
{{--                <!-- Product -->--}}
{{--                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">--}}
{{--                    <div>--}}
{{--                        <div id="carousel-08-{{$key+1}}"--}}
{{--                             class="js-carousel text-center g-mb-5"--}}
{{--                             data-infinite="1"--}}
{{--                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"--}}
{{--                             data-nav-for="#carousel-08-{{$key+1}}">--}}
{{--                            <div class="js-slide">--}}
{{--                                <a href="{{ route('moreItem','704') }}" class="customLinkHover">--}}
{{--                                    <div class="moreItem">--}}
{{--                                        <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </figure>--}}
{{--                <!-- End Product -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div id="ankleContainer">--}}
{{--    <!-- Banners -->--}}
{{--    <div class="d-flex align-items-stretch g-px-10--lg">--}}
{{--        <div class="col-lg-5 g-px-0 g-px-10--lg">--}}
{{--            <!-- Article -->--}}
{{--            <article class="g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50 g-mb-20--lg" data-bg-img-src="{{asset('img/Other/ankle/topWall.jpg?V=6')}}" style="background-image: url({{asset('img/Other/ankle/topWall.jpg?V=6')}});">--}}
{{--                <div class="g-flex-middle-item g-z-index-1 g-width-300 onlySmallFullOpacity">--}}
{{--                    <h3 class="g-color-white g-font-weight-700 text-uppercase g-letter-spacing-3 g-mb-15">پابند و اکسسوری پا</h3>--}}
{{--                    <div class="g-line-height-2 g-mb-20">--}}
{{--                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">با نگین های مخراج کاری شده،--}}
{{--                            روكش و آبكارى قوى طلا،--}}
{{--                            دارای قفل های قابل تنظيم،--}}
{{--                            انتى الرژى،--}}
{{--                            انتى باکتریال،--}}
{{--                            بارکد آنلاین فروشگاهی--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <span class="g-color-primary g-font-weight-700 g-font-size-16 text-uppercase">با قیمت های استثنائی</span>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}

{{--            <!-- Article -->--}}
{{--            <article class="d-none d-lg-block text-uppercase text-center g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-color-white g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/ankle/bottomWall.jpg?V=6')}}" style="background-image: url({{asset('img/Other/ankle/bottomWall.jpg?V=6')}});">--}}
{{--                <div style="visibility: hidden" class="g-flex-middle-item g-z-index-1">--}}
{{--                    <span class="d-inline-block g-brd-bottom g-brd-2 g-brd-primary g-font-weight-700 g-font-size-16 g-letter-spacing-1 g-pb-8 g-mb-20">Examples of branding projects</span>--}}
{{--                    <h3 class="h2 g-font-weight-700 g-letter-spacing-3 g-mb-35">Branding work</h3>--}}
{{--                    <a class="btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}
{{--        </div>--}}

{{--        <div class="d-none d-lg-block col-lg-7 g-px-10--lg">--}}
{{--            <!-- Article -->--}}
{{--            <article class="h-100 g-flex-middle g-bg-cover g-bg-size-cover g-bg-black-opacity-0_3--after g-py-75 g-px-50" data-bg-img-src="{{asset('img/Other/ankle/bigWall.jpg?V=6')}}" style="background-image: url({{asset('img/Other/ankle/bigWall.jpg?V=6')}});">--}}
{{--                <div class="g-flex-middle-item g-z-index-1 g-width-370">--}}
{{--                    <h2 class="g-font-weight-700 text-uppercase g-color-white g-mb-15">پابند و اکسسوری پا</h2>--}}
{{--                    <strong class="d-block g-color-white g-font-size-30 g-font-weight-700 text-uppercase g-line-height-1 g-letter-spacing-3 g-mb-25"><span class="g-color-primary">با تخفیف های</span> استثنائی</strong>--}}
{{--                    <div class="g-line-height-2 g-mb-35">--}}
{{--                        <p style="direction: rtl" class="g-color-white-opacity-0_9 text-left">با نگین های مخراج کاری شده،--}}
{{--                            روكش و آبكارى قوى طلا،--}}
{{--                            دارای قفل های قابل تنظيم،--}}
{{--                            انتى الرژى،--}}
{{--                            انتى باکتریال،--}}
{{--                            بارکد آنلاین فروشگاهی--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <a class="d-none btn btn-md u-btn-outline-white g-font-weight-600 g-font-size-11 text-uppercase" href="#">Learn More</a>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <!-- End Article -->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Banners -->--}}

{{--    <div class="container g-px-0--lg">--}}
{{--        <div id="js-carousel-6" class="js-carousel g-mb-15--lg g-mb-60 g-mx-minus-10 g-py-60--lg g-pt-20 g-pb-60"--}}
{{--             data-infinite="true"--}}
{{--             data-slides-show="4"--}}
{{--             data-autoplay="1"--}}
{{--             data-speed="5000"--}}
{{--             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"--}}
{{--             data-arrow-left-classes="fa fa-angle-left g-left-20 rounded-0"--}}
{{--             data-arrow-right-classes="fa fa-angle-right g-right-20 rounded-0"--}}
{{--             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">--}}
{{--            @foreach($ankle as $key =>$row)--}}
{{--                <div class="js-slide g-mx-10">--}}
{{--                    <!-- Product -->--}}
{{--                    <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-15">--}}
{{--                        <div>--}}
{{--                            <div id="carousel-08-{{$key}}"--}}
{{--                                 class="js-carousel text-center g-mb-5"--}}
{{--                                 data-infinite="1"--}}
{{--                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"--}}
{{--                                 data-nav-for="#carousel-08-{{$key}}">--}}
{{--                                <div class="js-slide">--}}
{{--                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">--}}
{{--                                        <img class="img-fluid w-100" loading="lazy"--}}
{{--                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"--}}
{{--                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand.' '.$row->Size.' '.$row->Color  }}">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- مشخصات محصول -->--}}
{{--                        <div style="direction: rtl" class="media g-mt-5 g-brd-top g-brd-gray-light-v4 g-pt-5">--}}
{{--                            <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->--}}
{{--                            <div class="d-flex flex-column col-12 g-px-5">--}}
{{--                                <h1 class="h6 g-color-black my-1 text-left">--}}
{{--                                    {{$row->Brand}}--}}
{{--                                </h1>--}}
{{--                                <h4 class="h6 g-color-black my-1">--}}
{{--                                    <span class="u-link-v5 g-color-black"--}}
{{--                                          tabindex="0">--}}
{{--                                        {{ $row->Name }}--}}
{{--                                        <span--}}
{{--                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Model }}</span>--}}
{{--                                        <span--}}
{{--                                            class="g-font-size-12 g-font-weight-300"> {{ $row->Gender }}</span>--}}
{{--                                    </span>--}}
{{--                                </h4>--}}
{{--                                <div>--}}
{{--                                    <span class="g-ml-5">سایز--}}
{{--                                        <span class="g-color-primary">{{ $row->Size }}</span>--}}
{{--                                    </span>--}}
{{--                                    <span>رنگ--}}
{{--                                        <span class="g-color-primary">{{ $row->Color }}</span>--}}
{{--                                    </span>--}}
{{--                                </div>--}}
{{--                                <span>موجودی <span id="{{ 'cartQty'.$key }}"--}}
{{--                                                   class="g-color-primary">{{ $row->Qty }}</span> عدد</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="d-block g-color-black g-font-size-17 g-ml-5">--}}
{{--                            <div style="direction: rtl" class="text-left">--}}
{{--                                <s class="g-color-lightred g-font-weight-500 g-font-size-13">--}}
{{--                                    {{  number_format($row->UnitPrice) }}--}}
{{--                                </s>--}}
{{--                                <span>{{  number_format($row->FinalPrice) }}</span>--}}
{{--                                <span--}}
{{--                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <!-- End Product -->--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <div class="js-slide g-mx-10">--}}
{{--                <!-- Product -->--}}
{{--                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24 g-pb-5">--}}
{{--                    <div>--}}
{{--                        <div id="carousel-08-{{$key+1}}"--}}
{{--                             class="js-carousel text-center g-mb-5"--}}
{{--                             data-infinite="1"--}}
{{--                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"--}}
{{--                             data-nav-for="#carousel-08-{{$key+1}}">--}}
{{--                            <div class="js-slide">--}}
{{--                                <a href="{{ route('moreItem','705') }}" class="customLinkHover">--}}
{{--                                    <div class="moreItem">--}}
{{--                                        <span style="position: absolute; left:45px; text-shadow: 0 0 5px navy;" class="h1 g-color-white g-top-50x">بیشتر ببینید</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </figure>--}}
{{--                <!-- End Product -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div id="discountsContainer">
{{--    <h5 style="direction: rtl" class="container g-bg-primary g-color-white g-mb-0 g-pa-10 g-pr-15"> تخفیفات ویژه</h5>--}}
    <div class="col-12 p-0 text-center">
        <img style="object-fit: cover" src="{{asset('img/Other/discounts.jpg?v=1')}}" alt="" class="col-12 p-0 g-mb-20 bigDevice">
        <img style="object-fit: cover" src="{{asset('img/Other/discounts.jpg?v=1')}}" alt="" class="col-12 p-0 g-height-250 g-mb-20 smallDevice">
        <h1 style="direction: rtl" class="h5 container g-color-gray-dark-v1 g-mb-0 g-pa-10 g-pr-15">تخفیفات ویژه امروز</h1>
    </div>
    <div class="container g-mb-100 g-px-0--lg g-pt-15">
        <div id="js-carousel-7" class="js-carousel g-mb-15 g-mx-minus-10 g-pb-60"
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
                            <div id="carousel-08-{{$key}}"
                                 class="js-carousel text-center g-mb-5"
                                 data-infinite="1"
                                 data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                 data-nav-for="#carousel-08-{{$key}}">
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                        <img class="img-fluid w-100" loading="lazy"
                                             src="{{ $row->PicPath.$row->SampleNumber.'.jpg' }}"
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
</div>
@endsection
