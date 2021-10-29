@extends('Layouts.IndexSeller')
@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>انبار من (جزئیات مشخصات محصول)
        </h3>
    </div>
    <!-- End Info Panel -->
    <div style="direction: rtl" class="container">
        <!-- Textual Inputs -->
        <form class="g-brd-around g-brd-gray-light-v4 g-pa-15 g-mb-17 g-mt-17">
            {{--        Header--}}
            <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-25 text-right">
                مشخصات محصول
            </h3>

            {{--        Product Info--}}
            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">کد محصول</label>
                <div class="col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text" value="{{ $dataDetail->ID }}"
                           id="example-text-input" readonly>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">نام محصول</label>
                <div class="col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text" value="{{ $data->Name }}"
                           id="example-text-input" readonly>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">جنسیت</label>
                <div class="col-sm-10 force-col-12">
                    @if($data->Gender == 0)
                        <input class="form-control form-control-md rounded-0" type="text" value="زنانه"
                               id="example-text-input" readonly>
                    @elseif($rec->Gender == 1)
                        <input class="form-control form-control-md rounded-0" type="text" value="مردانه"
                               id="example-text-input" readonly>
                    @elseif($rec->Gender == 2)
                        <input class="form-control form-control-md rounded-0" type="text" value="دخترانه"
                               id="example-text-input" readonly>
                    @elseif($rec->Gender == 3)
                        <input class="form-control form-control-md rounded-0" type="text" value="پسرانه"
                               id="example-text-input" readonly>
                    @elseif($rec->Gender == 4)
                        <input class="form-control form-control-md rounded-0" type="text" value="نوزادی دخترانه"
                               id="example-text-input" readonly>
                    @else
                        <input class="form-control form-control-md rounded-0" type="text" value="نوزادی پسرانه"
                               id="example-text-input" readonly>
                    @endif
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">مدل</label>
                <div class="col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text" value="{{ $data->Model }}"
                           id="example-text-input" readonly>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">برند</label>
                <div class="col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0 text-left" type="text"
                           value="{{ $data->Brand }}"
                           id="example-text-input" readonly>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">توضیحات</label>
                <div class="col-sm-10 force-col-12">
                    <textarea class="form-control form-control-md rounded-0" id="exampleTextarea"
                              rows="6" readonly>{{ $data->Detail }}</textarea>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">قیمت پایه</label>
                <div class="input-group col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text"
                           value="{{ number_format($data->UnitPrice) }}"
                           id="example-text-input" readonly>
                    <span style="border-left: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-right-none">تومان</span>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">تخفیف قیمت</label>
                <div class="input-group col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text" value="{{ $data->Discount }}"
                           id="example-text-input" readonly>
                    <span style="border-left: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-right-none">درصد</span>
                </div>
            </div>

            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">قیمت فروش</label>
                <div class="input-group col-sm-10 force-col-12">
                    <input class="form-control form-control-md rounded-0" type="text"
                           value="{{ number_format($data->FinalPrice) }}"
                           id="example-text-input" readonly>
                    <span style="border-left: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-right-none">تومان</span>
                </div>
            </div>

            <!-- Size Group -->
            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">جزئیات</label>
                <div class="input-group col-sm-3 force-col-12 g-mb-5">
                    <span style="border-right: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-left-none w-50">سایز</span>
                    <input class="form-control form-control-md rounded-0 text-center" type="text"
                           value="{{ $dataDetail->Size }}"
                           id="example-text-input" readonly>
                </div>
                <div class="input-group col-sm-3 force-col-12 g-mb-5">
                    <span style="border-right: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-left-none w-50">رنگ</span>
                    <input class="form-control form-control-md rounded-0 text-center" type="text"
                           value="{{ $dataDetail->Color }}"
                           id="example-text-input" readonly>
                </div>
                <div class="input-group col-sm-4 force-col-12 g-mb-5">
                    <span style="border-right: 1px solid lightgrey"
                          class="input-group-addon g-bg-gray-light-v5 g-brd-left-none w-50">تعداد موجود</span>
                    <input class="form-control form-control-md rounded-0 text-center" type="text"
                           value="{{ $dataDetail->Qty }}"
                           id="example-text-input" readonly>
                </div>
            </div>
            <!-- End Size Group -->

            {{--        Product Images--}}
            <div class="form-group row g-mb-25">
                <label for="example-text-input" class="col-sm-2 col-form-label">تصاویر</label>
                <div style="direction: ltr" class="col-sm-10 text-left p-0">
                    <div class="col-sm-3 g-mb-10">
                        <img class="img-fluid img-thumbnail g-rounded-1"
                             src="{{ $data->PicPath.$dataDetail->PicNumber }}.jpg"
                             alt="Image Description">
                    </div>
                </div>
            </div>
            {{--        False Product Button--}}
            @if (!is_null($falseProduct))
                <div class="row">
                    <div class="col-md-12">
                        <!-- Danger Alert -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="h5"><i class="fa fa-minus-circle g-ml-5"></i>محصول حاوی مشخصات اشتباه است!</h4>
                            فروشنده گرامی قبلا برای این محصول گزارش اطلاعات اشتباه را ثبت کرده اید.
                            با توجه به اینکه محصول فروخته شده است در سریع ترین زمان ممکن، مرکز با خریدار این محصول تماس
                            گرفته و اقدامات لازم صورت می گیرد.
                            در نهایت محصول فوق از انبار شما حذف می گردد.
                            <h4 class="h6 g-mt-15">به یاد داشته باشید در این شرایط قوانین به سود مشتری و به زیان شما
                                خواهد بود.</h4>
                            <h4 class="h6 g-mt-20"><i class="fa fa-spinner fa-spin g-ml-5"></i>در حال پیگیری ..</h4>
                        </div>
                        <!-- Danger Alert -->
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        @if (is_null($falseProduct) && (isset($dataDetail->OrderID)))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="h5"><i class="fa fa-exclamation-circle  g-ml-5"></i>اگر مشخصات فوق صحیح نیست:
                            </h4>
                            با توجه به اینکه محصول فروخته شده است گزارش مشخصات اشتباه را
                            سریعا از طریق دکمه پایین ثبت کنید.
                        </div>
                        @endif
                        <!-- Danger Alert -->
                        @if (is_null($falseProduct) && (is_null($dataDetail->orderDetailID)))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="h5"><i class="fa fa-exclamation-circle g-ml-5"></i>اگر مشخصات فوق صحیح
                                نیست:</h4>
                            با توجه به اینکه محصول هنوز به فروش نرفته است از طریق دکمه پایین آنرا حذف کنید.
                            <h4 class="h6 g-mt-15">به یاد داشته باشید حذف محصول حاوی مشخصات اشتباه از متحمل شدن
                                زیان
                                جلوگیری می کند.</h4>
                        </div>
                        @endif
                        <!-- Danger Alert -->

                        <!-- Danger Alert -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="h5"><i class="fa fa-check-circle g-ml-5"></i>اگر از صحت داده ها اطمینان
                                دارید:
                            </h4>
                            برای اضافه کردن تعداد موجودی این محصول به انبارتان کافیست از دکمه زیر اقدام کنید.
                        </div>
                        <!-- Danger Alert -->

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="h5"><i class="fa fa-exclamation-circle g-ml-5"></i>لطفا توجه فرمائید:
                            </h4>
                            برای افزودن تعداد موجودی به یک محصول باید تمامی مشخصات فوق با محصول در دست اضافه یکی
                            باشد.
                            <h4 class="h6 g-mt-15">در غیر اینصورت محصول شما حاوی اطلاعات اشتباه خواهد بود.</h4>
                        </div>

                    </div>
                </div>
                <div class="text-left">
                    <div class="modal fade text-center" id="modalLoginForm" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header g-pr-20 g-pl-20">
                                    <h4>افزودن موجودی محصول</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="hs-icon hs-icon-close"></i>
                                    </button>
                                </div>
                                <div style="direction: rtl" class="modal-body mx-3">
                                    <p style="text-align: justify;">فروشنده گرامی ضروریست مشخصات محصول موجود در
                                        انبار با
                                        مشخصات محصول در دستتان یکی باشد مانند
                                        نام، جنسیت، مدل، برند، توضیحات، قیمت پایه، تخفیف، قیمت فروش، رنگ، سایز و
                                        عکس</p>
                                    <p>به چه تعداد به موجودی قبل اضافه شود؟</p>

                                    <div style="direction: ltr" class="form-group row g-mb-25">
                                        <div class="input-group justify-content-center">
                                            <span style="cursor: pointer"
                                                  id="qtyPlus"
                                                  onclick="decQty()"
                                                  class="input-group-addon g-pa-15 col-3 g-brd-gray-dark-v5">
                                                <i class="ti ti-minus"></i>
                                            </span>
                                            <input
                                                class="text-center form-control form-control-md rounded-0 col-4 g-pa-15 g-brd-gray-dark-v5 myInput g-font-size-20"
                                                type="number"
                                                value="1"
                                                id="qtyInput"
                                                readonly>
                                            <span style="cursor: pointer"
                                                  id="qtyPlus"
                                                  onclick="incQty()"
                                                  class="input-group-addon g-pa-15 col-3 g-brd-gray-dark-v5">
                                                  <i class="ti ti-plus"></i>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <a onclick="applyAddQty({{$dataDetail->ID}})"
                                   class="btn btn-md u-btn-primary rounded-0 g-pa-15 g-color-white">
                                    ثبت موجودی جدید
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                       data-toggle="modal"
                       data-target="#modalLoginForm">افزودن موجودی محصول</a>
                    @if (is_null($falseProduct) && (is_null($dataDetail->orderDetailID)))
                        <button type="button" class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                onclick="confirmDelete({{$dataDetail->ID}})">
                            حذف محصول
                        </button>
                    @endif
                    @if (is_null($falseProduct) && (isset($dataDetail->OrderID)))
                        <button type="button" class="btn btn-md u-btn-primary rounded-0 g-mb-15"
                                onclick="confirmFalse({{$dataDetail->ID}})">
                            گزارش اطلاعات اشتباه
                        </button>
                    @endif

                </div>
            @endif
        </form>
        <!-- End Textual Inputs -->
    </div>

@endsection
