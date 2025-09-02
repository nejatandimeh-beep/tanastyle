@extends('Layouts.IndexCustomer')
@section('Content')
    <div style="direction: rtl" class="container g-mt-30">
        <h1 class="bigDevice g-pb-10 h5 col-lg-8 mr-auto p-0 text-center g-font-weight-600 g-brd-bottom g-brd-gray-light-v4 text-lg-right g-mb-0">محصولات غرفه <span
                class="g-color-primary">{{$seller->ShopName}}</span></h1>
        <div class="row">
            <div class="col-lg-4 g-mb-30">
                <!-- Listing - Agents -->
                <div class="u-shadow-v11 text-center">
                    <div class="g-bg-white g-pa-20">
                        <div class="g-width-130 g-height-130 mx-auto mb-4
            g-brd-around g-brd-5 g-brd-gray-light-v3 rounded-circle"
                             style="overflow: hidden; display:flex; justify-content:center; align-items:center; background:#f8f8f8;">
                            @if(!empty($seller->PicPath))
                                <img class="img-fluid w-100 h-100"
                                     style="object-fit: cover;"
                                     src="{{ asset($seller->PicPath) }}"
                                     alt="{{ $seller->ShopName }}">
                            @else
                            <!-- آیکون پروفایل مدرن -->
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="#72c02c" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                </svg>
                            @endif
                        </div>


                        <div class="mb-3">
                            <h3 class="h5"><a class="g-color-black" href="#">{{ $seller->ShopName }}</a></h3>
                            <span
                                class="d-block g-color-gray-dark-v5 g-font-size-13 mb-1">{{ $seller->HintCategory ?? 'فروشنده میوان' }}</span>
                        </div>
                        <!-- رنکینگ -->
                        <div style="cursor: default; direction: ltr" class="rating text-center">
                            <span data-value="1">★</span>
                            <span data-value="2">★</span>
                            <span data-value="3">★</span>
                            <span data-value="4">★</span>
                            <span data-value="5">★</span>
                        </div>

                    @if(!empty($seller->website))
                            <span class="d-block g-font-weight-500 g-font-size-13">rosa@realestate.com</span>
                    @endif
                    <!-- Figure Social Icons -->
                        <ul class="list-inline mb-0">
                            @if(!empty($seller->instagram))
                                <li class="list-inline-item g-mx-1">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-white-opacity-0_8 g-color-black--hover g-bg-white--hover rounded-circle"
                                       href="#!">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            @endif
                            @if(!empty($seller->telegram))
                                <li class="list-inline-item g-mx-1">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-white-opacity-0_8 g-color-black--hover g-bg-white--hover rounded-circle"
                                       href="#!">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                            @endif
                            @if(!empty($seller->telegram))
                                <li class="list-inline-item g-mx-1">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-white-opacity-0_8 g-color-black--hover g-bg-white--hover rounded-circle"
                                       href="#!">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <p class="g-color-black g-bg-white g-bg-secondary--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15 mt-0">{{ $seller->Bio ?? 'توضیحاتی برای '.$seller->ShopName.' ثبت نشده است.' }}</p>

                    <a class="btn btn-block u-btn-primary g-color-white--hover g-bg-secondary-dark-light-v1--hover g-font-weight-600 g-font-size-12 text-uppercase rounded-0 g-px-25 g-py-15"
                       href="#">
                        از داغترین هاش خبرم کن
                    </a>
                </div>
                <!-- End Listing - Agents -->
            </div>
            <h1 class="smallDevice g-pb-10 h5 col-lg-8 mr-auto p-0 text-center g-font-weight-600 g-brd-bottom g-brd-gray-light-v4 text-lg-right g-mb-0">محصولات غرفه <span
                    class="g-color-primary">{{$seller->ShopName}}</span></h1>
            <div class="col-lg-8 p-0 g-brd-right g-brd-gray-light-v4 g-pr-10">
                <!-- Products -->
                <div id="productContainer" class="row mx-0 g-mb-50 productDetail g-pt-10">

                    @foreach($data as $key => $row)
                        <div id="productDiv" class="col-12 col-lg-4 g-mb-30 g-pl-5 p-0">
                            <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                                    class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
                                <div>
                                    <div id="carousel-08-1"
                                         class="js-carousel text-center g-mb-5"
                                         data-infinite="1"
                                         data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-mt-15 text-center"
                                         data-nav-for="#carousel-08-2">
                                        <div class="js-slide">
                                            <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath }}sample1.jpg"
                                                     alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                            </a>
                                        </div>
                                        @if (file_exists(public_path($row->PicPath.'pic2.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample2.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic3.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample3.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic4.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample4.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic5.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample5.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic6.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample6.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic7.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample7.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic8.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample8.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic9.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample9.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic10.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample10.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic11.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample11.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif

                                        @if (file_exists(public_path($row->PicPath.'pic12.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample12.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif


                                        @if (file_exists(public_path($row->PicPath.'pic13.jpg')))
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample13.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>

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
                                                    <span class="g-ml-5 {{ $size[$key]->Size =='--'?'d-none':'' }}">سایز
                                                        <span class="g-color-primary">{{ $size[$key]->Size }}</span>
                                                    </span>
                                            <span>رنگ
                                                    <span class="g-color-primary">{{ $size[$key]->Color }}</span>
                                                </span>
                                        </div>
                                        <span class="{{ $size[$key]->Qty ==0 ?'opacity-0': '' }}"><span
                                                id="{{ 'cartQty'.$key }}"
                                                class="g-color-primary">{{ $size[$key]->Qty }}</span> عدد در انبار</span>
                                    </div>
                                </div>
                                <div
                                    class="d-block g-color-black g-font-size-17 g-ml-5">
                                    <div style="direction: rtl" class="d-flex justify-content-between text-left">
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
                    @endforeach
                </div>

                <div style="display: none" id="noProduct" class="g-mb-50">
                    <div class="noProduct mx-auto"></div>
                    <div style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
                        <!-- اسپینر -->
                        <div class="spinner"
                             style="border: 4px solid #f3f3f3; border-top: 4px solid #3498db; border-radius: 50%; width: 50px; height: 50px; animation: spin 1s linear infinite;"></div>
                        <!-- متن -->
                        <p class="text-center g-mt-15 g-mb-0">انبار فروشنده در حال حاضر خالی می باشد</p>
                        <h2 style="color:#333; font-size:1.5rem;">در حال موجود کردن کالا در انبار...</h2>
                    </div>
                </div>
                <!-- End Products -->

                {{-- Pagination --}}
                <div id="productListPagination" style="direction: ltr">
                    {{ $data->links('General.Pagination', ['result' => $data]) }}
                </div>
            </div>
        </div>
    </div>


@endsection
