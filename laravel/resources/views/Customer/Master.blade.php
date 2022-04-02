@extends('Layouts.IndexCustomer')
@section('Content')
<div class="masterWallpaper d-flex justify-content-center">
        <form style="direction: rtl" class="align-self-center text-center">
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
<div id="productContainer" class="g-mb-50 g-mt-40 g-pt-40 g-mt-0--lg masterPage">
{{--    <h1 class="d-block text-right g-brd-bottom g-brd-gray-light-v4 h5 g-pa-10 g-mx-30 g-mt-10">{{$title}}</h1>--}}
    <div class="row col-12 g-px-40--lg g-pa-0 m-0">
        @foreach($data as $key => $row)
            <div class="col-12 col-lg-3 g-mb-30">
                <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                        class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
                    <div>
                        <div id="carousel-08-{{10000+$key}}"
                             class="js-carousel text-center g-mb-5"
                             data-infinite="1"
                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-mt-15 text-center"
                             data-nav-for="#carousel-08-{{10000+$key}}">
                            <div class="js-slide">
                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                    <img class="img-fluid w-100"
                                         src="{{ $row->PicPath }}sample1.png"
                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                </a>
                            </div>
                            @if (file_exists(public_path($row->PicPath.'pic2.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample2.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic3.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample3.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic4.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample4.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic5.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample5.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic6.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample6.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic7.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample7.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic8.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample8.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic9.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample9.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic10.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample10.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic11.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample11.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic12.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample12.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif

                            @if (file_exists(public_path($row->PicPath.'pic13.jpg')))
                                <div class="js-slide">
                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}">
                                        <img class="img-fluid w-100"
                                             src="{{ $row->PicPath }}sample13.png"
                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- مشخصات محصول -->
                    <h4 class="h6 g-color-black text-left g-brd-top g-brd-gray-light-v4 g-ml-5 g-mt-5 g-pt-5">
                        {{$row->Brand}}
                    </h4>

                    <div style="direction: rtl"
                         class="media">
                        <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                        <div class="d-flex justify-content-between col-12 p-0">
                            <div class="d-flex flex-column">
                                <h1 class="h6 g-color-black my-1">
                                                    <span class="u-link-v5 g-color-black"
                                                          tabindex="0">
                                                        {{ $row->Name }}
                                                        <span
                                                            class="g-font-size-12 g-font-weight-300">{{ $row->Model }}</span>
                                                    </span>
                                </h1>
                                <ul style="padding: 0"
                                    class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-mb-5">
                                    <li>
                                        <a class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600">{{ $row->HintCat.' '.$row->Gender }}</a>
                                    </li>
                                </ul>
                            </div>
                            <a style="cursor: pointer"
                               class="u-icon-v1 g-mt-minus-5 g-color-black g-color-primary--hover rounded-circle"
                               data-toggle="tooltip"
                               data-placement="top"
                               href="{{ route('productDetail',[$row->ID,$size[$key]->Size,$size[$key]->Color]) }}"
                               data-original-title="جزئیات محصول">
                                <i class="icon-eye g-line-height-0_7"></i>
                            </a>
                        </div>
                    </div>
                    <div
                        class="d-block g-color-black g-font-size-17 g-ml-10">
                        <div style="direction: rtl" class="text-left">
                            <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                {{  number_format($row->UnitPrice) }}
                            </s>
                            <span>{{  number_format($row->FinalPrice) }}</span>
                            <span
                                class="d-block g-color-gray-dark-v5 g-font-size-10">تومان</span>
                        </div>
                    </div>
                </figure>
            </div>
        @endforeach
    </div>
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
