
@extends('Layouts.IndexCustomer')
@section('Content')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div style="max-width: 100%" class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="g-px-20">
                    <h6 style="direction: rtl"
                        class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                        <i class="fa fa-hand-o-right g-font-size-18"></i>
                        <span class="g-font-size-13 g-mr-5">جدول را به سمت چپ بکشید.</span>
                    </h6>
                    <div class="table-responsive">
                        <table style="direction: rtl;" class="table table-bordered u-table--v2">
                            <thead>
                            <tr>
                                <th class="text-center">ردیف</th>
                                <th class="text-center">کد محصول</th>
                                <th class="text-center">نام محصول</th>
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
                                              <img class="g-width-80 g-height-80"
                                                   src="{{ $row->PicPath.$row->PicNumber }}.jpg"
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
                                    class="u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mb-40 g-my-20--lg text-center col-12 col-lg-3">مبلغ کل فاکتور: <span
                                        id="orderPrice"></span>
                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                </span>

                        <span style="direction: rtl"
                              class="d-block g-color-main g-font-size-16 g-font-weight-600 g-pr-0 text-right align-self-center force-col-12">
                                    <span class="u-icon-v3 u-icon-size--sm g-bg-primary align-middle g-ml-5 bigDevice">
                                        <i class="icon-communication-011 u-line-icon-pro g-color-white g-pt-5"></i>
                                    </span>
                                    @if(isset($sendAddress->ID))
                                <span>آدرس ارسال:</span>
                                <span id="receiverState" class="d-none">{{ $sendAddress->State }}</span>
                                <span id="receiverCity" class="d-none">{{ $sendAddress->City }}</span>
                                <span class="receiverStateCity g-font-size-16 g-font-weight-300"></span>
                                <span id="addressID"
                                      class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify"> {{$sendAddress->Address}}<strong class="g-color-gray-dark-v2 g-mr-5">گیرنده:</strong> {{$sendAddress->ReceiverName.' '.$sendAddress->ReceiverFamily}} <strong class="g-color-gray-dark-v2 g-mr-5">شماره تماس:</strong> {{$sendAddress->Mobile}}</span>
                            @else
                                <a href="{{ (isset(Auth::user()->id)) ? route('userProfile', 'navigation') : route('login') }}"
                                   id="addAddress"
                                   class="g-color-red g-color-primary--hover g-mt-0--lg g-mt-30 g-text-underline--none--hover">
                                                افزودن آدرس<i class="icon-paper-clip g-mr-5 align-middle"></i>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<button type="button"
        class="btn btn-xl btn-primary g-color-white g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 g-ml-0 g-mt-0 g-mt-20--lg force-col-12"
        data-toggle="modal"
        data-target="#exampleModal">
                <span class="pull-left">
                              پرداخت امن
                              <span class="d-block g-font-size-11">نهایی کردن خرید</span>
                            </span>
    <i class="fa fa-shield float-right g-font-size-32 g-ml-25 align-self-center g-line-height-0 g-mt-20"></i>
</button>
@endsection
