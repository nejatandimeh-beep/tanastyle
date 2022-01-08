@extends('Layouts.IndexCustomer')
@section('Content')
    <!-- سبد خرید -->
    <div style="direction: rtl" class="container-fluid modalBox">
        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">

        <div class="breadCrumbs">
            <div class="g-mt-0--lg">
                <div class="g-pr-5 d-flex g-py-15">
                    <i class="icon-basket g-pl-5 g-font-size-20 g-font-weight-500"></i>

                    <h6 class="m-0 g-mt-7">
                        سبد خرید
                    </h6>
                </div>
                <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
            </div>
            <div class="g-py-15 g-pb-30">
                <div class="row">
                    <span id="cartCount" class="d-none">{{ (isset($data)) ?  count($data) : 0 }}</span>
                    @foreach($data as $key =>$row)
                        {{--    hidden input   --}}
                        <div id="cartContainer{{$key}}" class="col-12 col-lg-3 g-mb-30">
                            <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame u-shadow-v24">
                                <div class="g-pt-10">
                                    <div class="text-center g-mb-20">
                                        <div>
                                            <a href="{{ route('productDetail',[$row->ProductID, $row->Size, $row->Color]) }}">
                                                <img class="img-fluid w-100"
                                                     src="{{ $row->PicPath.$row->SampleNumber.'.png' }}"
                                                     alt="{{ $row->Name.' '.$row->Model.' '.$row->Brand }}">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- مشخصات محصول -->
                                <div style="direction: rtl" class="media g-mt-20 g-brd-top g-brd-gray-light-v4 g-pt-20">
                                    <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                                    <div class="d-flex flex-column g-px-5">
                                        <h1 class="h6 g-color-black g-mt-5 text-right">
                                            {{$row->Brand}}
                                        </h1>
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
                                               onclick="cartDelete({{ $row->ProductDetailID }}, $(this).attr('id').replace(/[^0-9]/gi, ''))"
                                               data-placement="top"
                                               data-original-title="حذف از سبد"
                                               tabindex="0">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </li>
                                    </ul>
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
                                <hr class="g-brd-gray-light-v4 g-my-10">
                                <div style="direction: rtl" id="boughtQty" class="d-block text-center g-mb-10">
                                    <div id="containerSelect{{$key}}"
                                         class="input-group u-quantity-v1 w-100 g-height-45 g-brd-gray-light-v4 g-brd-primary--focus">
                                        <div style="cursor: pointer; user-select: none"
                                             id="qtyM{{$key}}"
                                             onclick="qtyMinus($(this).attr('id').replace(/[^0-9]/gi, ''))"
                                             class="js-m input-group-addon d-flex dontSelectText  g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                            −
                                        </div>
                                        <input style="cursor: default"
                                               id="basketQty{{$key}}"
                                               class="js-r form-control text-center g-brd-gray-light-v4 g-color-gray-dark-v4 g-rounded-0 g-pa-15"
                                               type="number" value="1" readonly="">
                                        <div style="cursor: pointer; user-select: none"
                                             id="qtyP{{$key}}"
                                             onclick="qtyPlus($(this).attr('id').replace(/[^0-9]/gi, ''))"
                                             class="js-p input-group-addon d-flex dontSelectText g-font-size-15 g-width-45 g-color-gray-dark-v4 g-bg-gray-light-v4 g-brd-gray-light-v4 g-rounded-0">
                                            +
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </div>
                    @endforeach
                </div>

                <form id="finalCartOrderForm" action="{{route('cartSubmit')}}" method="POST" class="d-none">@csrf
                    <div id="cartOrderForm"></div>
                </form>

                <div class="{{ isset($data[0]) ? '':'d-none' }} text-left g-ml-10">
                    <a onclick="$(document.body).addClass('me-position-fix');
                           $(document.body).removeClass('me-position-normally'); cartOrder($('#cartCount').text())"
                       id="orderSubmit"
                       href="#modal70"
                       data-modal-target="#modal70"
                       data-modal-effect="slidetogether"
                       class="btn btn-xl btn-primary g-color-white g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 g-ml-0 g-mt-0 g-mt-20--lg force-col-12">
                        <span class="pull-left">
                            پرداخت امن
                            <span class="d-block g-font-size-11">نهایی کردن خرید</span>
                        </span>
                        <i class="fa fa-shield float-right g-font-size-32 g-ml-25 align-self-center g-line-height-0 g-mt-20"></i>
                    </a>

                    <!--factor-->

                    <div id="modal70"
                         class="text-left g-bg-white SubMenuScroll g-pb-20"
                         style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                        <div class="sticky-top g-bg-white g-px-20">
                            <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                                <button style="outline: none" type="button" class="close"
                                        onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                                    <i class="hs-icon hs-icon-close">×</i>
                                </button>
                                <h6 class="text-right m-0">فاکتور فروش به تاریخ <span id="cartDate"></span></h6>
                            </div>
                            <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">
                        </div>
                        <div class="g-px-20">
                            <div style="direction: rtl" class="alert alert-warning text-right g-mr-5" role="alert">
                                <strong class="g-ml-5">توجه!</strong>لطفا قبل از ادامه خرید، فاکتور فروش را به دقت بررسی
                                نمایید.
                            </div>
                            <h6 style="direction: rtl"
                                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                <i class="fa fa-hand-o-right g-font-size-18"></i>
                                <span class="g-font-size-13 g-mr-5">جدول را به سمت چپ بکشید.</span>
                            </h6>
                            <div class="table-responsive">
                                <table style="direction: rtl;" class="table table-bordered u-table--v2">
                                    <thead>
                                    <tr>
                                        <th class="text-center focused rtlPosition">ردیف</th>
                                        <th class="text-center">کد محصول</th>
                                        <th class="text-center">نام محصول</th>
                                        <th class="text-center">برند</th>
                                        <th class="text-center">رنگ</th>
                                        <th class="text-center">سایز</th>
                                        <th class="text-center">تعداد</th>
                                        <th class="text-center">قیمت واحد</th>
                                        <th class="text-center">با
                                            تخفیف {{ isset($data[0]) ? $row->Discount.'%' : '' }}</th>
                                        <th class="text-center">عکس</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $key =>$row)
                                        <tr id="orderRow{{$key}}">
                                            <td class="align-middle text-nowrap text-center">
                                                <span id="rowNumber{{$key}}" class="g-pa-5"></span>
                                            </td>
                                            <td class="align-middle text-nowrap text-center">
                                                            <span id="productDetailID{{$key}}" class="g-pa-5">
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
                                                                {{ $row->Brand }}
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
                                                <span id="orderQty{{$key}}" class="g-pa-5"></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                            <span class="g-pa-5">
                                                                {{ number_format($row->UnitPrice) }}
                                                            </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                            <span id="productFinalPrice{{$key}}" class="g-pa-5">
                                                                {{ number_format($row->FinalPrice) }}
                                                            </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                            <span class="g-pa-5">
                                                              <img class="g-width-64 g-height-80"
                                                                   src="{{ $row->PicPath.$row->PicNumber }}.jpg"
                                                                   alt="{{ $row->Name.' '.$row->Model.' '.$row->Brand }}">
                                                            </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="direction: ltr" class="d-lg-flex col-12 justify-content-between p-0 text-right">
                                <div class=" col-12 col-lg-3 g-px-0">
                                    {{--ارزش افزوده--}}
                                    <span style="direction: rtl"
                                          class="d-block u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 text-center">%9 ارزش افزوده:
                                        <span id="valueAdded"></span>
                                        <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                    </span>
                                    {{--هزینه پستی--}}
                                    <span
                                        class="d-block u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 text-center">هزینه پستی:
                                        <span>15,000</span>
                                        <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                    </span>
                                    {{--مبلغ فاکتور--}}
                                    <span
                                        class="d-block u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5  g-mt-15--lg g-mb-40 g-mb-20--lg text-center">مبلغ کل فاکتور: <span
                                            id="orderPrice"></span>
                                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                                </span>
                                </div>

                                <span style="direction: rtl"
                                      class="d-block g-color-main g-font-size-16 g-font-weight-600 g-pr-0 text-right align-self-start force-col-12">
                                                <span
                                                    class="u-icon-v3 u-icon-size--sm g-bg-primary align-middle g-ml-10 bigDevice">
                                                    <i class="icon-location-pin u-line-icon-pro g-color-white"></i>
                                            </span>
                                    @if(isset($sendAddress->ID))
                                        <span>آدرس ارسال:</span>
                                        <span id="receiverState" class="d-none">{{ $sendAddress->State }}</span>
                                        <span id="receiverCity" class="d-none">{{ $sendAddress->City }}</span>
                                        <span class="receiverStateCity g-font-size-16 g-font-weight-300"></span>
                                        <span id="addressID"
                                              class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify"> {{$sendAddress->Address}}<strong
                                                class="g-color-gray-dark-v2 g-mr-5"> گیرنده:</strong> {{$sendAddress->ReceiverName.' '.$sendAddress->ReceiverFamily}} <strong
                                                class="g-color-gray-dark-v2 g-mr-5">شماره تماس:</strong> {{$sendAddress->Mobile}}</span>
                                    @else
                                        <a href="{{ (isset(Auth::user()->id)) ? route('userProfile', 'navigation') : route('login') }}"
                                           id="addAddress"
                                           class="g-color-red g-color-primary--hover g-mt-0--lg g-mt-30 g-text-underline--none--hover">
                                                        افزودن آدرس<i class="icon-pencil g-mr-5 align-middle"></i>
                                                    </a>
                                    @endif
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
                                <a
                                    id="orderSubmitBtn"
                                    onclick="orderSubmit()"
                                    class="btn btn-xl btn-primary g-color-white g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 force-col-12">
                                    <span class="pull-left">درگاه بانکی
                                        <span id="payment-door" class="d-block g-font-size-11">ورود به درگاه ملت</span>
                                    </span>
                                    <i class="icon-finance-164 u-line-icon-pro float-right g-font-size-32 g-ml-20 align-self-center g-line-height-0 g-mt-5"></i>
                                </a>

                                <i id="waitingIconSubmit" style="display: none"
                                   class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cartEmptyAlert" class="{{ isset($data[0]) ? 'd-none':'' }}">
                <div id="emptyCart" class="emptyCart g-mt-100--lg g-mb-100--lg g-mt-30 g-mb-50 mx-auto"></div>
            </div>

        </div>
    </div>
    </div>
@endsection
