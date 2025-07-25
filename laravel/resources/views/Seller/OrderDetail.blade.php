@extends('Layouts.IndexSeller')
@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0 orderDetail">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>فروشهای من (جزئیات فروش محصول)
        </h3>
    </div>
    <!-- End Info Panel -->
    <div style="direction: rtl" class="container">
        <!-- Textual Inputs -->
        <form class="g-brd-around g-brd-gray-light-v4 g-pa-15 g-mb-17 g-mt-17">
            {{--Order Info Header--}}
            <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-10 text-right">
                مشخصات فاکتور
            </h3>
            {{--Order Info--}}
            <div class="row g-mb-10 text-right">
                {{--                Number--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        شماره فاکتور
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->orderID.'/'.$data->orderDetailID }}">
                </div>
                {{--                Date--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        زمان فاکتور
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ substr($data->Time,0,-3).'--'.$persianDate[0].'/'.$persianDate[1].'/'.$persianDate[2]  }}">
                </div>
            </div>
            {{--Product Info Header--}}
            <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-10 text-right">
                <i class="icon-communication-112 u-line-icon-pro g-font-size-18 g-ml-5"></i>مشخصات محصول
            </h3>
            {{--Product Info--}}
            <div class="row g-mb-10 text-right">
                {{--                Name--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        نام محصول
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Name }}">
                </div>
                {{--                Gender--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        جنسیت محصول
                    </div>
                    @if($data->Gender == 0)
                        <input
                            class="form-control form-control-md g-color-darkblue g-bg-gray-light-v5 rounded-0 text-center g-font-size-16"
                            type="text"
                            tabindex="1"
                            placeholder=""
                            disabled
                            value="زنانه">
                    @elseif($rec->Gender == 1)
                        <input
                            class="form-control form-control-md g-color-darkblue g-bg-gray-light-v5 rounded-0 text-center g-font-size-16"
                            type="text"
                            tabindex="1"
                            placeholder=""
                            disabled
                            value="مردانه">
                    @elseif($rec->Gender == 2)
                        <input
                            class="form-control form-control-md g-color-darkblue g-bg-gray-light-v5 rounded-0 text-center g-font-size-16"
                            type="text"
                            tabindex="1"
                            placeholder=""
                            disabled
                            value="بچگانه نوزادی">
                    @elseif($rec->Gender == 3)
                        <input
                            class="form-control form-control-md g-color-darkblue g-bg-gray-light-v5 rounded-0 text-center g-font-size-16"
                            type="text"
                            tabindex="1"
                            placeholder=""
                            disabled
                            value="بچگانه دخترانه">
                    @else
                        <input
                            class="form-control form-control-md g-color-darkblue g-bg-gray-light-v5 rounded-0 text-center g-font-size-16"
                            type="text"
                            tabindex="1"
                            placeholder=""
                            disabled
                            value="بچگانه پسرانه">
                    @endif
                </div>
                {{--                Model--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        مدل محصول
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Model }}">
                </div>
                {{--                Brand--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        برند محصول
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Brand }}">
                </div>
                {{--                Size--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        سایز محصول
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Size }}">
                </div>
                {{--                Color--}}
                <div class="input-group col-lg-6 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        رنگ محصول
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Color }}">
                </div>
                {{--                Detail--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        توضیحات
                    </div>
                    <textarea
                        class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-right g-font-size-16 text-truncate"
                        type="text"
                        tabindex="1"
                        placeholder="">
                        {{ $data->Detail }}
                    </textarea>
                </div>
                {{--                UnitPrice--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        قیمت پایه
                    </div>
                    <input class="form-control form-control-md rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ number_format($data->OrderDetailPrice) }}">
                    <span style="border-left: 1px solid #ccc"
                          class="input-group-addon g-color-gray-dark-v3 g-bg-gray-light-v5 g-brd-right-none g-width-100 bigDevice">تومان</span>
                </div>
                {{--                Discount--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        تخفیف
                    </div>
                    <input class="form-control form-control-md rounded-0 g-bg-gray-light-v5 text-center g-font-size-16 g-color-red"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Discount }}">
                    <span style="border-left: 1px solid #ccc"
                          class="input-group-addon g-color-gray-dark-v3 g-bg-gray-light-v5 g-brd-right-none g-width-100 bigDevice">درصد</span>
                </div>
                {{--                FinalPrice--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        قیمت نهایی
                    </div>
                    <input class="form-control form-control-md rounded-0 g-bg-gray-light-v5 text-center g-font-size-16 g-color-primary"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ number_format($data->OrderDetailFinalPrice) }}">
                    <span style="border-left: 1px solid #ccc"
                          class="input-group-addon g-color-gray-dark-v3 g-bg-gray-light-v5 g-brd-right-none g-width-100 bigDevice">تومان</span>
                </div>
                {{--                Qty--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        تعداد خرید
                    </div>
                    <input class="form-control form-control-md g-color-darkblue rounded-0 g-bg-gray-light-v5 text-center g-font-size-16"
                           type="text"
                           tabindex="1"
                           placeholder=""
                           disabled
                           value="{{ $data->Qty }}">
                    <span style="border-left: 1px solid #ccc"
                          class="input-group-addon g-color-gray-dark-v3 g-bg-gray-light-v5 g-brd-right-none g-width-100 bigDevice">عدد</span>
                </div>
                {{--                AllPrice--}}
                <div class="input-group col-lg-12 g-mb-10">
                    <div style="border-right: 1px solid #ccc"
                         class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 g-brd-left-none rounded-0 w-50">
                        مبلغ کل فاکتور
                    </div>
                    <input
                        class="form-control form-control-md g-color-darkblue rounded-0 g-bg-primary-opacity-0_3 text-center g-font-size-16"
                        type="text"
                        tabindex="1"
                        placeholder=""
                        disabled
                        value="{{ number_format($data->OrderDetailFinalPrice * $data->Qty) }}">
                    <span style="border-left: 1px solid #ccc"
                          class="input-group-addon g-color-gray-dark-v3 g-bg-gray-light-v5 g-brd-right-none g-width-100 bigDevice">تومان</span>
                </div>
                <div class="input-group col-lg-12 g-mb-10 {{Auth::guard('seller')->user()->id == 35 ? '' : 'd-none'}}">
                    <div style="direction: rtl" id="addressContainer" class="text-right g-mt-15">
                        <div
                            class="d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 g-pt-0--lg text-right">
                            <h5 class="d-lg-inline-block d-block">آدرس
                                ارسال:</h5>
                            <span id="receiverState" class="d-none">{{ $data->State }}</span>
                            <span id="receiverCity" class="d-none">{{ $data->City }}</span>
                            <span class="receiverStateCity g-color-orange"></span>
                            <span id="addressID"
                                  class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 g-color-orange"> {{$data->Address}}
                                                        <strong class="g-mr-5 g-color-black">گیرنده:</strong> {{$data->ReceiverName.' '.$data->ReceiverFamily}}
                                                        <strong class="g-mr-5 g-color-black">شماره تماس:</strong> {{$data->Mobile}}
                                                        <strong class="g-mr-5 g-color-black">کد پستی:</strong> {{$data->PostalCode}}
                                                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">تصاویر</label>
                <div style="direction: ltr" class="col-sm-10 text-left p-0">
                    <div class="col-sm-3 g-mb-10">
                        <img class="img-fluid img-thumbnail g-rounded-1"
                             src="{{ file_exists(public_path($data->PicPath.$data->SampleNumber.'.jpg'))?$data->PicPath.$data->SampleNumber:$data->PicPath.'sample1' }}.jpg"
                             alt="Image Description">
                    </div>
                </div>
            </div>
        </form>
        <!-- End Textual Inputs -->
        {{--        False Product Button--}}
        @if (isset($data->falseProduct))
            <div class="row">
                <div class="col-md-12">
                    <!-- Danger Alert -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="h5"><i class="fa fa-minus-circle g-ml-5"></i>فاکتور حاوی مشخصات اشتباه است.</h4>
                        فروشنده گرامی با توجه به فاکتور صادر شده با مشخصات اشتباه برای محصول، زیان حاصل از فروش فوق متحمل شما خواهد بود.
                        <h4 class="h6 g-mt-20"><i class="fa fa-spinner fa-spin g-ml-5"></i>در حال پیگیری ..</h4>
                    </div>
                    <!-- Danger Alert -->
                </div>
            </div>
        @endif
    </div>

@endsection

