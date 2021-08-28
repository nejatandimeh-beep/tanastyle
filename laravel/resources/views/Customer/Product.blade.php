@extends('Layouts.IndexCustomer')
@section('Content')
    {{--    hidden inpu   --}}
    <span id="customerID" class="d-none">{{ (isset(Auth::user()->id)) ? Auth::user()->name:'' }}</span>
    <span id="productID" class="d-none">{{ $data->ID }}</span>
    <span id="productDetailID" class="d-none"></span>
    <span id="productPage" class="d-none"></span>
    <span id="productDiscount" class="d-none">{{ $data->Discount }}</span>
    <span id="checkLike" class="d-none">{{ $like }}</span>
    <span id="voteID" class="d-none">{{ isset($voteID) ? $voteID->ID: 'null'}}</span>
    <span id="CommentID" class="d-none"></span>
    <span id="firstSizeInfo" class="d-none">{{ $sizeInfo }}</span>
    <span id="firstColorInfo" class="d-none">{{ $colorInfo }}</span>
    <span id="picPath" class="d-none">{{ $data->PicPath }}</span>

    <div class="container g-mb-50--lg g-pt-10 g-brd-top g-brd-gray-light-v4">
        <!-- Article -->
        <article class="row justify-content-between g-color-gray-dark-v5">
            {{--اطلاعات محصول--}}
            <div style="direction: rtl" class="col-lg-6 g-mb-30--lg g-pl-0--lg">
                <header class="d-flex justify-content-between">
                    <!-- Article Icons -->
                    <div class=" align-self-center">
                        <h1 id="productName"
                            class="d-inline-block h4 g-color-black mb-0">{{ $data->Name }}</h1>
                        <span id="productModel" class="align-middle">{{ $data->Model }}</span>
                    </div>
                    <div
                        class="js-rating d-inline-block g-color-primary g-font-size-18 g-mt-5 g-mr-5 align-self-center"
                        data-rating="{{ $rating }}"
                        data-spacing="{{ 5 - $rating }}"></div>
                </header>

                <hr class="g-brd-gray-light-v4 g-mt-10 g-mb-15">

                {{--هدر--}}
                <a style="cursor: pointer;" class="d-none float-left g-font-size-20 g-mr-10 fa fa-bookmark
                   g-line-height-1 g-color-primary g-text-underline--none--hover text-left"
                   id="customerLike">
                </a>
                <a style="cursor: pointer"
                   class="d-none float-left g-font-size-20 g-mr-10 fa fa-bookmark
                   g-line-height-1 g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover text-left"
                   id="customerUnlike">
                </a>
                <span id="likeHint"
                      class="{{ ($like === 'like') ? 'd-none':'' }} g-font-size-10 g-pt-5 float-left bigDevice">ذخیره کن</span>
                <div class="g-mb-30">
                    @if($customerRate !== 0)
                        <small>شما قبلا امتیاز {{ $customerRate }} را ثبت کرده اید.</small>
                    @else
                        <span class="g-color-gray-dark-v5">
                            <span>امتیاز دهید</span>
                            <div style="direction: ltr"
                                 class="d-inline-block g-color-primary g-mr-5 g-font-size-17 stars">
                                <span class="ratingContainer">
                                    <a style="cursor: pointer" class="star-1 g-text-underline--none--hover">1</a>
                                    <a style="cursor: pointer" class="star-2 g-text-underline--none--hover">2</a>
                                    <a style="cursor: pointer" class="star-3 g-text-underline--none--hover">3</a>
                                    <a style="cursor: pointer" class="star-4 g-text-underline--none--hover">4</a>
                                    <a style="cursor: pointer" class="star-5 g-text-underline--none--hover">5</a>
                                </span>
                            </div>
                        </span>
                    @endif
                </div>
                {{--توضیحات--}}
                <pre class="g-mb-25 g-font-size-14 g-color-gray-dark-v4" id="productDetail">{{ $data->Detail }}</pre>

                <!-- قیمت -->
                <div class="g-mb-30--lg g-mb-0 text-lg-right text-left">
                    <fieldset class="d-inline-block g-ml-60--lg col-12 col-lg-5 p-0">
                        <div class="d-inline-block amountLine">
                            <span id="productUnitPrice"
                                  class="d-inline-block align-middle g-color-red g-font-size-20">{{ number_format($data->UnitPrice) }}</span>
                            <span class="g-font-size-12 g-color-red g-mr-minus-5">تومان</span>
                        </div>
                        <span
                            class="d-inline-block align-middle g-bg-red g-color-white g-font-size-12 g-py-3 g-px-8">{{$data->Discount}} درصد</span>
                    </fieldset>
                    <fieldset class="d-inline-block col-12 col-lg-5 p-0">
                        <span id="productFinalPrice"
                              class="d-inline-block align-middle g-color-primary g-font-size-25">{{ number_format($data->FinalPrice) }}</span>
                        <span class="g-font-size-14">تومان</span>
                    </fieldset>
                </div>

                {{--سایز و رنگ--}}
                <div class="d-lg-flex justify-content-start g-mb-30">
                    <!-- Article Size -->
                    <fieldset class="g-ml-60--lg col-12 col-lg-5 p-0">
                        <legend class="h6 g-color-main g-mb-15">سایز</legend>
                        <div class="d-inline-block">
                            @for($i=0; $i<count($size); $i++)
                                <input type="radio"
                                       id="{{ 'inputSize'.$size[$i]['pdId'] }}"
                                       name="size"
                                       value="{{ $size[$i]['size'] }}"
                                       onclick="addColor($(this).val(), {{ $data->ID }})"
                                       {{ ($i === 0) ? 'checked' : '' }}
                                       class="u-checkbox-v1--checked-color-primary u-checkbox-v1--checked-brd-primary">
                                <label for="{{ 'inputSize'.$size[$i]['pdId'] }}"
                                       class="d-inline-block text-center g-brd-around g-brd-2 g-brd-gray-light-v3 g-color-gray-light-v3 g-brd-primary--hover g-color-primary--hover g-width-60 g-py-7 g-transition-0_3 g-mr-3">{{ $size[$i]['size'] }}</label>
                            @endfor
                        </div>
                    </fieldset>
                    <!-- End Article Size -->
                    <div class="d-none g-mb-5" id="sizeInfo">
                        {{--                        <span class="g-px-5 g-py-7 g-brd-around g-brd-gray-light-v3 g-ml-3"></span>--}}
                        <input type="radio" id="color" name="color" value=""
                               class="u-checkbox-v1--checked-brd-primary">
                        <label for="color"
                               class="d-inline-block text-center g-brd-gray g-brd-around g-brd-2 g-bg-secondary g-font-size-15 g-py-5 g-px-15 g-transition-0_3 g-ml-5 g-mb-5">
                        </label>
                    </div>
                    <!-- Article Color -->
                    <fieldset class="g-mt-20 g-mt-0--lg">
                        <legend class="h6 g-color-main g-mb-15">رنگ</legend>
                        <i id="waitingIconColor" style="display: none"
                           class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                        <div id="colorContainer" class="d-inline-block">
                        </div>
                    </fieldset>
                    <!-- End Article Color -->
                </div>

                {{--تعداد--}}
                <div class="d-lg-flex">
                    <fieldset class="g-ml-60-lg--minus-10 col-lg-5 p-0 g-mb-60--lg g-mb-30">
                        <legend class="h6 g-color-main g-mb-15 d-lg-none">موجودی محصول</legend>
                        <div class="align-self-center g-width-70 g-pt-30--lg g-pt-0">
                            <span class="u-icon-v4 u-icon-v4-rounded-0 u-icon-slide-down--hover">
                                    <span style="width: 8rem; height: 2.5rem; cursor: default"
                                          class="u-icon-v4-inner g-font-style-normal">
                                        <i style="width: 8rem; height: 2.5rem; top: 40%;"
                                           class="u-icon__elem-regular g-font-size-14 g-font-style-normal g-color-gray-dark-v5">موجودی محصول</i>
                                        <i style="width: 8rem; height: 2.5rem; top: 40%;"
                                           class="u-icon__elem-hover g-font-size-14 g-color-primary">
                                            <i id="colorQtyContainer" class="g-font-style-normal">
                                                <span id="colorQty" class="g-ml-5"></span>عدد</i>
                                             <i id="waitingIconQty" style="display: none"
                                                class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                        </i>
                                    </span>
                                </span>
                        </div>
                    </fieldset>

                    <fieldset id="boughtQty" class="g-pl-20--lg g-mb-30">
                        <legend class="h6 g-color-main g-mb-15">تعداد سفارش</legend>
                        <div>
                            <div class="d-inline-block g-mr-5">
                                <div
                                    class="input-group u-quantity-v1 g-width-150 g-height-45 g-brd-gray-light-v4 g-brd-primary--focus product">
                                    <div style="cursor: pointer; user-select: none"
                                         class="js-m input-group-addon d-flex dontSelectText  g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                        −
                                    </div>
                                    <input style="cursor: default"
                                           id="productQtyBought"
                                           class="js-r form-control text-center g-brd-gray-light-v4 g-color-gray-dark-v4 g-rounded-0 g-pa-15"
                                           type="number" value="1" readonly="">
                                    <div style="cursor: pointer; user-select: none"
                                         class="js-p input-group-addon d-flex dontSelectText g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                        +
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset style="display: none" id="callMeExist"
                              class="g-pl-20--lg text-lg-right text-left g-mt-0--lg g-mt-20">
                        <button style="margin-top: 35px" type="button"
                                class="btn btn-lg u-btn-outline-primary g-font-weight-600 rounded-0 g-font-size-14 g-px-25">
                            <i class="icon-bell g-ml-10 g-font-weight-600"></i>موجود شد بهم اطلاع بده
                        </button>
                    </fieldset>

                    <fieldset style="display: none" id="customerCalled"
                              class="g-pl-20--lg text-lg-right text-left g-mt-0--lg g-mt-20">
                        <button style="margin-top: 32px" type="button"
                                data-toggle="tooltip"
                                data-placement="right"
                                data-original-title="دکمه اطلاع از موجودی فعال است"
                                class="btn btn-lg u-btn-primary rounded-0 g-font-size-16--lg g-font-size-18 g-px-15 g-mr-5">
                            <i class="icon-bell align-middle"></i>
                        </button>
                    </fieldset>
                </div>

                {{-- Modal پیش فاکتور--}}
                <div style="display: none" id="actionFormBtn" class="col-12 text-left g-pl-0 g-mt-0--lg g-mt-65">
                    <i id="waitingCheckCart"
                       class="d-none fa fa-spinner g-color-primary fa-spin m-0 g-mt-10 g-font-size-20 align-middle"></i>
                    <button type="button"
                            id="addToBasketBtn"
                            class="btn btn-lg u-btn-outline-primary g-font-weight-600 rounded-0 g-mt-10 g-font-size-16 g-px-25"
                            onclick="if ($('#loginAlert').text() === 'login') { $(this).addClass('d-none'); addToCart($('#productDetailID').text()) } else { alert('لطفا نخست وارد شوید.'); }">
                        افزودن به سبد
                    </button>
                    <span id="attachToBasket"
                          class="u-label align-middle g-mt-10 g-color-gray-dark-v4 g-px-15"><i
                            class="icon-basket-loaded g-mr-3 g-color-primary g-font-size-15"></i>به سبد افزوده شد.</span>
                    <a href="#modal18"
                       onclick="$(document.body).addClass('me-position-fix');
                           $(document.body).removeClass('me-position-normally'); addOrderTable();"
                       id="buy"
                       data-modal-target="#modal18"
                       data-modal-effect="slidetogether"
                       class="btn btn-lg u-btn-primary g-font-weight-600 rounded-0 g-mt-10 g-font-size-16 g-px-30">
                        <i id="waitingBuy" style="display: none"
                           class="fa fa-spinner fa-spin m-0 g-font-size-20 align-middle"></i>
                        <span>خرید</span>
                    </a>

                    <div id="modal18"
                         class="text-left g-bg-white SubMenuScroll g-pb-20"
                         style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                        <div class="sticky-top g-bg-white g-px-20">
                            <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                                <button style="outline: none" type="button" class="close"
                                        onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                                    <i class="hs-icon hs-icon-close"></i>
                                </button>
                                <h6 class="text-right m-0">فاکتور فروش به شماره:<span id="orderID"
                                                                                      class=" g-mr-5"></span></h6>
                            </div>
                            <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">
                        </div>
                        <div class="g-px-20">
                            {{--جدول--}}
                            <div style="direction: rtl"
                                 class="d-lg-flex col-12 g-pa-15 g-pt-20 g-brd-around g-brd-gray-light-v4">
                                {{--کد محصول--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        کد محصول
                                    </h6>
                                    <span id="orderProductID"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"></span>
                                </div>
                                {{--نام محصول--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        نام محصول
                                    </h6>
                                    <span id="orderProductName"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"><span
                                            id="productModel"></span></span>
                                </div>
                                {{--رنگ--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        رنگ
                                    </h6>
                                    <span id="orderProductColor"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"></span>
                                </div>
                                {{--سایز--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        سایز
                                    </h6>
                                    <span id="orderProductSize"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"></span>
                                </div>
                                {{--تعداد--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        تعداد
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        <span id="orderProductQty"></span>
                                    </span>
                                </div>
                                {{--قیمت واحد--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        قیمت واحد
                                    </h6>
                                    <span id="orderProductUnitPrice"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"></span>
                                </div>
                                {{--با تخفیف--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        با<span id="orderProductDiscount" class="g-mr-5 g-color-gray-dark-v3"></span>%
                                        تخفیف
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg g-color-primary">
                                        <span id="orderProductFinalPrice" class="g-mr-5 g-color-primary"></span>
                                    </span>
                                </div>
                                {{--قیمت در تعداد--}}
                                <div
                                    class="d-none flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        قیمت در تعداد
                                    </h6>
                                    <span id="orderProductQtyPrice" class="g-pt-40--lg g-px-5 g-pb-5"></span>
                                </div>
                                {{--تاریخ--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        تاریخ
                                    </h6>
                                    <span id="orderDate"
                                          class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice"></span>
                                </div>
                                {{--عکس--}}
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        عکس
                                    </h6>
                                    <span class="g-pa-5--lg">
                                          <img id="orderProductImg" class="g-width-80 g-height-80"
                                               src=""
                                               alt="Image Description">
                                    </span>
                                </div>
                            </div>
                            {{--آدرس و مبلغ فاکتور--}}
                            <div style="direction: ltr" class="d-lg-flex col-12 justify-content-between p-0 text-right">
                                {{--مبلغ فاکتور--}}
                                <span
                                    class="u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mb-40 g-my-20--lg text-center col-12 col-lg-3">مبلغ کل فاکتور: <span
                                        id="orderPrice"></span>
                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                </span>

                                {{--آدرس--}}
                                <div style="direction: rtl"
                                     class="d-lg-flex d-block col-12 col-lg-8 g-color-main g-font-size-16 g-font-weight-600 g-pr-0 text-right align-self-center g-brd-top g-brd-top-none--lg g-brd-gray-light-v4">

                                    <span class="u-icon-v3 u-icon-size--sm g-bg-primary align-middle g-ml-10 bigDevice">
                                        <i class="icon-communication-011 u-line-icon-pro g-color-white g-pt-5"></i>
                                    </span>
                                    @if(!isset($sendAddress))
                                        <div class="align-self-center g-pt-35 g-pt-0--lg">
                                            <a href="{{ (isset(Auth::user()->id)) ? route('attachAddress', ['location'=>'addAddress'.$data->ID, 'size'=>$sizeInfo,'color'=>$colorInfo]) : route('login') }}"
                                               id="addAddress"
                                               class="g-color-red g-color-primary--hover g-mt-0--lg g-mt-30 g-text-underline--none--hover">
                                                افزودن آدرس<i class="icon-paper-clip g-mr-5 align-middle"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div id="addressContainer">
                                            <div
                                                class="d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify">
                                                <h5 class="d-lg-inline-block d-block g-color-gray-dark-v2">آدرس
                                                    ارسال:</h5>
                                                <span id="receiverState" class="d-none">{{ $sendAddress->State }}</span>
                                                <span id="receiverCity" class="d-none">{{ $sendAddress->City }}</span>
                                                <span class="receiverStateCity"></span>
                                                <span id="addressID"
                                                      class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify"> {{$sendAddress->Address}}
                                                    <strong class="g-color-gray-dark-v2 g-mr-5">گیرنده:</strong> {{$sendAddress->ReceiverName.' '.$sendAddress->ReceiverFamily}}
                                                    <strong class="g-color-gray-dark-v2 g-mr-5">شماره تماس:</strong> {{$sendAddress->Mobile}}</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--بانکها--}}
                            <div style="direction: rtl"
                                 class="d-lg-flex col-12 justify-content-between align-items-center p-0 g-mt-20 g-mt-80--lg">
                                <div class="col-12 col-lg-9 p-0 g-mt-40 g-mt-0--lg g-mb-15 g-mb-0--lg">
                                    <div style="direction: rtl" class="btn-group justified-content" id="bankContainer"
                                         onchange="accBank()">
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   value="ملت"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ملت</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   value="پارسیان"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک پارسیان</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   value="ایرانیان"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ایرانیان</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   value="صادرات"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک صادرات</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   value="ملی"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">بانک ملی</span>
                                        </label>
                                    </div>
                                </div>
                                {{--                                درگاه بانکی--}}
                                <a href="#"
                                   id="bankingPortalBtn"
                                   onclick="bankingPortal($('#productDetailID').text(),$('#orderProductQty').text())"
                                   class="btn btn-xl btn-primary g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 force-col-12">
                                    <span class="pull-left">درگاه بانکی
                                        <span id="payment-door" class="d-block g-font-size-11">ورود به درگاه <span
                                                id="acceptingBank">ملت</span></span>
                                    </span>
                                    <i class="icon-finance-164 u-line-icon-pro float-right g-font-size-32 g-ml-20 align-self-center g-line-height-0 g-mt-5"></i>
                                </a>
                                <i id="waitingIconSubmit" style="display: none"
                                   class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="g-brd-gray-light-v3 g-mt-15 g-mb-5">
                {{--دسته بندی--}}
                <footer>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column align-self-center align-self-lg-start">
                            <div>
                                <strong>دسته بندی</strong>
                                <span class="g-font-size-12">{{$data->HintCat.' '.$data->Gender}}</span>
                            </div>
                            <a style="cursor: pointer" class="g-color-primary"
                               onclick="$('.customerComment').removeClass('d-none');">نظرات <span class="g-font-weight-600">{{ (!isset($comments[0]->Comment)) ? '0' : count($comments) }}</span></a>
                        </div>
                        <span style="cursor: pointer"
                              onclick="$(this).hide(); $('#addProductComment').removeClass('d-none'); $('#addCustomerComment').focus();"
                              class="u-icon-v3 g-bg-gray-light-v5 g-brd-around g-brd-gray-light-v4 g-color-primary u-icon-slide-left--hover g-mr-15 pull-left">
                        <i class="icon-note u-icon__elem-regular"></i>
                        <i class="icon-bubble u-icon__elem-hover"></i>
                    </span>
                    </div>
                    <div id="commentContainer">
                        @foreach($comments as $key => $row)
                            <div class="d-none text-left customerComment">
                                <span id="{{ 'CommentID'.$key }}"
                                      class="d-none">{{ $row->ccID }}</span>
                                <div class="media g-my-30 text-right">
                                    <img class="d-lg-flex d-none g-width-50 g-height-50 rounded-circle g-mt-3 g-ml-15"
                                         src="{{ asset($row->PicPath)}}" alt="Image Description">
                                    <div style="direction: rtl"
                                         class="media-body u-shadow-v22 g-bg-secondary g-pa-30--lg g-pa-20">
                                        <div class="g-mb-15">
                                            <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $row->name.' '.$row->Family }}</h5>
                                            <span id="timeComment"
                                                  class="g-color-gray-dark-v4 g-font-size-12">
                                                @if(isset($commentsHowDay))
                                                    {{$commentsHowDay[$key]}}
                                                @endif
                                                @if(isset($PersianDate))
                                                    {{$PersianDate[$key][0].'/'.$PersianDate[$key][1].'/'.$PersianDate[$key][2]}}
                                                @endif</span>
                                        </div>

                                        <p>{{ $row->Comment }}</p>

                                        <ul style="direction: ltr" class="list-inline d-sm-flex my-0 p-0 text-left">
                                            <li class="list-inline-item g-mr-20">
                                                <a id="{{ 'likeComment'.$key }}" style="cursor:pointer;"
                                                   class="u-link-v5 g-color-primary--hover @if($commentVote !== null) @foreach($commentVote as $vote){{ ($row->ccID === $vote->CommentID) ? ($vote->CommentVote === '1') ? 'g-color-primary':'' :'' }}@endforeach @endif">
                                                    <i class="icon-like g-pos-rel g-top-1 g-mr-3"></i><span>{{ $row->Like }}</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a id="{{ 'unlikeComment'.$key }}" style="cursor:pointer;"
                                                   class="u-link-v5 g-color-red--hover @if($commentVote !== null) @foreach($commentVote as $vote){{ ($row->ccID === $vote->CommentID) ? ($vote->CommentVote === '-1') ? 'g-color-red':'' :'' }}@endforeach @endif">
                                                    <i class="icon-dislike g-pos-rel g-top-1 g-mr-3"></i><span>{{ $row->Unlike }}</span>
                                                </a>
                                            </li>
                                            {{--                                    <li class="list-inline-item mr-auto">--}}
                                            {{--                                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#">--}}
                                            {{--                                            پاسخ<i class="icon-note g-pos-rel g-top-1 g-mr-3"></i>--}}
                                            {{--                                        </a>--}}
                                            {{--                                    </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-none text-left newCustomerComment">
                        <div class="media g-my-30 text-right">
                            <img class="d-lg-flex d-none g-width-50 g-height-50 rounded-circle g-mt-3 g-ml-15"
                                 src="{{ asset('assets/img-temp/100x100/img17.jpg') }}" alt="Image Description">
                            <div style="direction: rtl"
                                 class="media-body u-shadow-v22 g-bg-secondary g-pa-30--lg g-pa-20">
                                <div class="g-mb-15">
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0"></h5>
                                    <span id="timeComment"
                                          class="g-color-gray-dark-v4 g-font-size-12"></span>
                                </div>

                                <p></p>

                                <div class="text-left">
                                    <i class="icon-shield g-font-size-18 g-color-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--دکمه نوشتن نظر--}}
                    <div id="addProductComment" class="d-none text-left">
                        <div class="form-group g-mb-20 text-right">
                            <label class="h5 g-mb-10 g-mt-20">نظر شما</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <textarea style="direction: rtl"
                                          class="form-control form-control-md g-resize-none rounded-0 pl-0 text-right g-font-size-16"
                                          rows="6"
                                          tabindex="1"
                                          value=""
                                          placeholder="پیامتان را شروع کنید.. (300 حرف)"
                                          name="customerComment"
                                          id="addCustomerComment"
                                          maxlength="300"></textarea>
                            </div>
                            <div style="direction: rtl">
                                <small class="text-muted g-font-size-12">نظرات توهین آمیز و حاوی کلمات رکیک حذف می
                                    گردد.</small><br>
                            </div>
                        </div>
                        <button id="sendComment"
                                class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-25"
                                disabled>
                            ارسال نظر
                        </button>
                    </div>
                </footer>
            </div>

            {{--گالری--}}
            <div id="productGallery" class="col-lg-5 g-mb-30 largeDevice">
                <!-- Carousel Images -->
                <div id="js-carousel-11" class="js-carousel g-mb-5" data-infinite="1" data-fade="1"
                     data-arrows-classes="u-arrow-square g-font-size-50 g-pos-abs g-top-50x g-color-white"
                     data-nav-for="#js-carousel-11-nav">

                    <div class="js-slide img-magnifier-container">
                        <img id="img1" class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                    </div>

                    @if (file_exists(public_path($data->PicPath.'pic2.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img2" class="w-100" src="{{ $data->PicPath }}pic2.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide img-magnifier-container">
                            <img id="img2" class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic3.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img3" class="w-100" src="{{ $data->PicPath }}pic3.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide img-magnifier-container">
                            <img id="img2" class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic4.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img4" class="w-100" src="{{ $data->PicPath }}pic4.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide img-magnifier-container">
                            <img id="img2" class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic5.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img5" class="w-100" src="{{ $data->PicPath }}pic5.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic6jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img6" class="w-100" src="{{ $data->PicPath }}pic6.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic7.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img7" class="w-100" src="{{ $data->PicPath }}pic7.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic8.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img8" class="w-100" src="{{ $data->PicPath }}pic8.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic9.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img9" class="w-100" src="{{ $data->PicPath }}pic9.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic10.jpg')))
                        <div class="js-slide img-magnifier-container">
                            <img id="img10" class="w-100" src="{{ $data->PicPath }}pic10.jpg" alt="Image Description">
                        </div>
                    @endif
                </div>
                <!-- End Carousel Images -->

                <!-- Carousel Nav -->
                <div id="js-carousel-11-nav" class="js-carousel u-carousel-v11" data-infinite="1" data-center-mode="1"
                     data-slides-show="3" data-is-thumbs="1" data-nav-for="#js-carousel-11">
                    <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic1">
                        <img class="{{!file_exists(public_path($data->PicPath.'pic2.jpg')) ? 'd-none':''}} w-100"
                             src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                    </div>
                    @if (file_exists(public_path($data->PicPath.'pic2.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic2">
                            <img class="w-100" src="{{ $data->PicPath }}pic2.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3"
                             id="pic2">
                            <img class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic3.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic3">
                            <img class="w-100" src="{{ $data->PicPath }}pic3.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3"
                             id="pic2">
                            <img class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic4.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic4">
                            <img class="w-100" src="{{ $data->PicPath }}pic4.jpg" alt="Image Description">
                        </div>
                    @else
                        <div style="visibility: hidden" class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3"
                             id="pic2">
                            <img class="w-100" src="{{ $data->PicPath }}pic1.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic5.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic5">
                            <img class="w-100" src="{{ $data->PicPath }}pic5.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic6.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic6">
                            <img class="w-100" src="{{ $data->PicPath }}pic6.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic7.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic7">
                            <img class="w-100" src="{{ $data->PicPath }}pic7.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic8.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic8">
                            <img class="w-100" src="{{ $data->PicPath }}pic8.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic9.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic9">
                            <img class="w-100" src="{{ $data->PicPath }}pic9.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic10.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic10">
                            <img class="w-100" src="{{ $data->PicPath }}pic10.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic11.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic11">
                            <img class="w-100" src="{{ $data->PicPath }}pic11.jpg" alt="Image Description">
                        </div>
                    @endif
                    @if (file_exists(public_path($data->PicPath.'pic12.jpg')))
                        <div class="js-slide g-cursor-pointer g-transition-0_3 g-mx-3" id="pic12">
                            <img class="w-100" src="{{ $data->PicPath }}pic12.jpg" alt="Image Description">
                        </div>
                    @endif
                </div>
                <!-- End Carousel Nav -->
            </div>
        </article>
        <!-- End Article -->
    </div>

    <div class="container g-pb-100">
        <div style="direction: rtl" class="g-brd-bottom g-brd-gray-light-v4 g-mt-30 g-mb-10">
            <h6>محصولات که شاید بپسندید</h6>
        </div>
        <div id="js-carousel-1" class="js-carousel g-pb-100 g-mx-minus-10"
             data-infinite="true"
             data-slides-show="4"
             data-autoplay="1"
             data-speed="5000"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-10 rounded-0"
             data-arrow-right-classes="fa fa-angle-right g-right-10 rounded-0"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            @foreach($similarProduct as $key =>$row)
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
                                             src="{{ $row->PicPath.$row->PicNumber.'.jpg' }}"
                                             alt="Image Description">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- مشخصات محصول -->
                        <div style="direction: rtl" class="media g-mt-20 g-brd-top g-brd-gray-light-v4 g-pt-20">
                            <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                            <div class="d-flex flex-column">
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
                                            <span class="g-ml-5">سایز <span
                                                    class="g-color-primary">{{ $row->Size }}</span></span>
                                    <span>رنگ <span class="g-color-primary">{{ $row->Color }}</span></span>
                                </div>
                                <span>موجودی <span id="{{ 'cartQty'.$key }}"
                                                   class="g-color-primary">{{ $row->Qty }}</span> عدد</span>
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
                                    class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                            </div>
                        </div>
                    </figure>
                    <!-- End Product -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
