@extends('Layouts.IndexCustomer')
@section('Content')
    <!-- سبد خرید -->
    <div style="direction: rtl" class="container-fluid">
        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">

        <div class="breadCrumbs">
            <div class="g-bg-white-opacity-0_9 g-mt-0--lg">
                <div class="g-pr-5 d-flex g-py-15 g-color-primary">
                    <i class="icon-basket g-pl-5 g-font-size-20 g-font-weight-500"></i>

                    <h6 class="m-0 g-mt-7">
                        سبد خرید
                    </h6>
                </div>
                <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
            </div>

            <div class="g-py-15 g-pb-30">
                <div class="row">
                    @foreach($data as $key =>$row)
                        {{--    hidden input   --}}
                        <div id="cart{{$key}}" class="col-12 col-lg-3 g-mb-30">
                            <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24">
                                <div>
                                    <div id="carousel-08-1"
                                         class="js-carousel text-center g-mb-20"
                                         data-infinite="1"
                                         data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                         data-nav-for="#carousel-08-2">
                                        <div class="js-slide">
                                            <a href="{{ route('productDetail',['id'=>$row->ProductID]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath.'pic1.jpg' }}"
                                                     alt="Image Description">
                                            </a>
                                        </div>

                                        <div class="js-slide">
                                            <a href="{{ route('productDetail',['id'=>$row->ProductID]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath.'pic2.jpg' }}"
                                                     alt="Image Description">
                                            </a>
                                        </div>

                                        <div class="js-slide">
                                            <a href="{{ route('productDetail',['id'=>$row->ProductID]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath.'pic3.jpg' }}"
                                                     alt="Image Description">
                                            </a>
                                        </div>

                                        <div class="js-slide">
                                            <a href="{{ route('productDetail',['id'=>$row->ProductID]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath.'pic4.jpg' }}"
                                                     alt="Image Description">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- مشخصات محصول -->
                                <div style="direction: rtl" class="media">
                                    <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                                    <div class="d-flex flex-column">
                                        <h4 class="h6 g-color-black my-1">
                                            <span class="u-link-v5 g-color-black"
                                                  tabindex="0">
                                                {{ $row->Name }}
                                                <span
                                                    class="g-font-size-12 g-font-weight-300"> زنانه</span>
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

                                    <!-- آیکون و سایز و رنگ -->
                                    <ul class="list-inline media-body text-left p-0 m-0">
                                        <li class="list-inline-item align-middle mx-0">
                                            <i id="cartWaitingDelete{{$key}}" style="display: none"
                                               class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                            <a class="u-icon-v1 u-icon-size--sm g-color-lightred g-color-red--hover g-font-size-18 rounded-circle"
                                               href="#"
                                               id="cartDelete{{$key}}"
                                               data-toggle="tooltip"
                                               onclick="cartDelete({{ $row->ProductDetailID }}, {{$key}})"
                                               data-placement="top"
                                               data-original-title="حذف از سبد"
                                               tabindex="0">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </li>
                                    </ul>
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
                                <hr class="g-brd-gray-light-v4 g-my-10">
                                <div style="direction: rtl" id="boughtQty" class="d-block text-center g-mb-10">
                                    <div
                                        class="input-group u-quantity-v1 w-100 g-height-45 g-brd-gray-light-v4 g-brd-primary--focus cart{{$key}}">
                                        <div style="cursor: pointer; user-select: none"
                                             onclick="qtyMinus({{$key}})"
                                             class="js-m input-group-addon d-flex dontSelectText  g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                            −
                                        </div>
                                        <input style="cursor: default"
                                               id="basketQty{{$key}}"
                                               class="js-r form-control text-center g-brd-gray-light-v4 g-color-gray-dark-v4 g-rounded-0 g-pa-15"
                                               type="number" value="1" readonly="">
                                        <div style="cursor: pointer; user-select: none"
                                             onclick="qtyPlus({{$key}})"
                                             class="js-p input-group-addon d-flex dontSelectText g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                            +
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>

                <div class="{{ isset($data[0]) ? '':'d-none' }} text-left">
                    <a href="#modal18"
                       onclick="$(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally'); cartOrder({{ $key }})"
                       id="cartBuyBtn"
                       data-modal-target="#modal18"
                       data-modal-effect="slidetogether"
                       class="btn btn-xl btn-primary g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 g-ml-0 g-mb-30 g-mt-0 g-mt-20--lg g-ml-50--lg g-mb-35--lg force-col-12">
                            <span class="pull-left">
                              پرداخت امن
                              <span class="d-block g-font-size-11">نهایی کردن خرید</span>
                            </span>
                        <i class="fa fa-shield float-right g-font-size-32 g-ml-25 align-self-center g-line-height-0 g-mt-20"></i>
                    </a>

                    <!-- Demo modal window -->
                    <div id="modal18"
                         class="text-left g-width-90x g-height-auto g-bg-white SubMenuScroll g-px-20 g-pb-20 modal18"
                         style="display: none; overflow-y: auto; height: auto !important">
                        <button style="outline: none" type="button" class="g-py-15 close float-left"
                                onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                            <i class="hs-icon hs-icon-close"></i>
                        </button>
                        <h6 class="g-py-15 text-right m-0">فاکتور فروش به تاریخ <span id="cartDate"></span></h6>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">
                        <div class="table-responsive">
                            <table style="direction: rtl" class="table table-bordered u-table--v2">
                                <thead>
                                <tr>
                                    <th class="text-center">ردیف</th>
                                    <th class="text-center">کد محصول</th>
                                    <th class="text-center">نام محصول</th>
                                    <th class="text-center">رنگ</th>
                                    <th class="text-center">سایز</th>
                                    <th class="text-center">تعداد</th>
                                    <th class="text-center">قیمت واحد</th>
                                    <th class="text-center">{{ $row->Discount.'%' }}با تخفیف</th>
                                    <th class="text-center">عکس</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($data as $key =>$row)
                                    <tr>
                                        <td class="align-middle text-nowrap text-center">
                                            <span class="g-pa-5">
                                                {{ $key+1 }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-nowrap text-center">
                                            <span id="productDetaiID{{$key}}" class="g-pa-5">
                                                {{ $row->ProductDetailID }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Name }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Color }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Size }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-nowrap text-center">
                                            <span id="orderQty{{$key}}" class="g-pa-5">
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ number_format($row->UnitPrice) }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ number_format($row->FinalPrice) }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                 <img class="g-width-80 g-height-80"
                                                      src="{{ asset($row->PicPath.'pic1.jpg') }}"
                                                      alt="Image Description">
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="direction: ltr" class="d-lg-flex col-12 justify-content-between p-0 text-right">
                                <span
                                    class="u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mb-40 g-my-20--lg text-center col-12 col-lg-3">مبلغ کل فاکتور: <span>243</span>
                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">هزار تومان</span>
                                </span>

                            <span style="direction: rtl"
                                  class="d-block g-color-main g-font-size-16 g-font-weight-600 g-pr-0 text-right align-self-center force-col-12">
                                    <span class="u-icon-v3 u-icon-size--sm g-bg-primary align-middle g-ml-5 bigDevice">
                                        <i class="icon-communication-011 u-line-icon-pro g-color-white g-pt-5"></i>
                                    </span>
                                    <span>آدرس ارسال:</span>
                                    <span
                                        class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify">آ.غ مهاباد خیابان قاضی تعاونی تانکرداران مهاباد <strong>گیرنده:</strong> خبات اندیمه <strong>شماره تماس:</strong> 09144421633</span>
                                </span>
                        </div>
                        <div style="direction: rtl"
                             class="d-lg-flex col-12 justify-content-between align-items-center p-0 g-mt-20 g-mt-80--lg">
                            <div class="col-12 col-lg-9 p-0 g-mt-40 g-mt-0--lg g-mb-15 g-mb-0--lg">
                                <div style="direction: rtl" class="btn-group justified-content">
                                    {{--                                        <form class="p-0 m-0" id="selectBankName">--}}
                                    <label class="u-check force-col-12">
                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                               type="radio" checked="">
                                        <span
                                            class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ملت</span>
                                    </label>
                                    <label class="u-check force-col-12">
                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                               type="radio">
                                        <span
                                            class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک پارسیان</span>
                                    </label>
                                    <label class="u-check force-col-12">
                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                               type="radio">
                                        <span
                                            class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ایرانیان</span>
                                    </label>
                                    <label class="u-check force-col-12">
                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                               type="radio">
                                        <span
                                            class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک صادرات</span>
                                    </label>
                                    <label class="u-check force-col-12">
                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                               type="radio">
                                        <span
                                            class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">بانک ملی</span>
                                    </label>
                                    {{--                                        </form>--}}
                                </div>
                            </div>
                            <a href="#"
                               onclick=""
                               class="btn btn-xl btn-primary g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 force-col-12">
                                    <span class="pull-left">درگاه بانکی
                                        <span id="payment-door" class="d-block g-font-size-11">ورود به درگاه ملت</span>
                                    </span>
                                <i class="icon-finance-164 u-line-icon-pro float-right g-font-size-32 g-ml-20 align-self-center g-line-height-0 g-mt-5"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Demo modal window -->
                </div>

                <div id="cartEmptyAlert" class="{{ isset($data[0]) ? 'd-none':'' }}">
                    <div
                        class="d-inline-block alert alert-info g-px-15--lg g-px-5 text-lg-right text-center g-mb-100"
                        role="alert">
                        <strong>سبد خالی است: </strong>شما هیچ محصولی در سبد خرید ندارید.
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection