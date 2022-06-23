@extends('Layouts.IndexAdmin')
@section('Content')
    @if(session()->has('update'))
        <div class="modal" id="overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-right g-bg-gray-light-v5">
                        <button type="button" class="close g-font-size-20" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title"><span
                                class="fa fa-check-square g-color-primary g-font-size-25 g-ml-15"></span></h4>
                    </div>
                    <div class="modal-body text-right">
                        <p style="direction: rtl">مشخصات محصول به روز رسانی شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <ul class="nav nav-fill u-nav-v4-1 u-nav-light" role="tablist" data-target="nav-4-1-primary-hor-fill"
            data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-white">
            <li class="nav-item">
                <a class="nav-link"
                   href="{{route('sellerControlPanel',['id'=>$data->SellerID,'tab'=>'store'])}}">انبار</a>
            </li>
            <li class="nav-item">
                <a id="sellerSupport" class="nav-link active" data-toggle="tab" href="#nav-4-1-primary-hor-fill--1"
                   role="tab">مشخصات محصول</a>
            </li>
        </ul>
        <div id="nav-4-1-primary-hor-fill" class="tab-content g-pt-40">
            <!-- End Info Panel -->
            <div class="tab-pane fade show active g-bg-gray-dark-v2" id="nav-4-1-primary-hor-fill--1" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <form action="{{route('adminProductEdit')}}"
                              method="POST"
                              style="direction: rtl"
                              id="productForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div style="direction: rtl" class="container g-py-30--lg g-px-60--lg">
                                <fieldset id="productData" disabled="disabled">
                                    {{--        Product Info--}}
                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">کد محصول</label>
                                        <div class="col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ $dataDetail->ID }}" readonly name="idDetail">
                                            <input name="id" type="hidden" value="{{ $data->ID }}">
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">نام محصول</label>
                                        <div class="col-sm-10 force-col-12">
                                            <select style="height: 40px"
                                                    class="form-control form-control-md custom-select rounded-0 g-pr-30 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                    name="name" id="productName">
                                                <option value="{{$data->Name}}">{{$data->Name}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">جنسیت</label>
                                        <div class="col-sm-10 force-col-12">
                                            <div class="btn-group-lg d-flex">
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 0 ? 'checked':'')}}
                                                           value="0-زنانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زنانه</span>
                                                </label>
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 1 ? 'checked':'')}}
                                                           value="1-مردانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-bg-primary--checked rounded-0 g-color-white--checked">مردانه</span>
                                                </label>
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 2 ? 'checked':'')}}
                                                           value="2-دخترانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-bg-primary--checked rounded-0 g-color-white--checked">دخترانه</span>
                                                </label>
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 3 ? 'checked':'')}}
                                                           value="3-پسرانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-bg-primary--checked rounded-0 g-color-white--checked">پسرانه</span>
                                                </label>
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 4 ? 'checked':'')}}
                                                           value="4-نوزادی دخترانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-bg-primary--checked rounded-0 g-color-white--checked">نوزادی دخترانه</span>
                                                </label>
                                                <label class="u-check col-md-2 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($data->Gender == 5 ? 'checked':'')}}
                                                           value="5-نوزادی پسرانه">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-bg-primary--checked rounded-0 g-color-white--checked">نوزادی پسرانه</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">مدل</label>
                                        <div class="col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ $data->Model }}" name="model">
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">برند</label>
                                        <div class="col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 text-left g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ $data->Brand }}" name="brand">
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">توضیحات</label>
                                        <div class="col-sm-10 force-col-12">
                                            <textarea class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" name="detail"
                                                      rows="6">{{ $data->Detail }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">قیمت
                                            پایه</label>
                                        <div class="input-group col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ number_format($data->UnitPrice) }}" name="unitPrice">
                                            <span style="border-left: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-right-none">تومان</span>
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">تخفیف</label>
                                        <div class="input-group col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ $data->Discount }}" name="discount">
                                            <span style="border-left: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-right-none">درصد</span>
                                        </div>
                                    </div>

                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">قیمت
                                            فروش</label>
                                        <div class="input-group col-sm-10 force-col-12">
                                            <input class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4" type="text"
                                                   value="{{ number_format($data->FinalPrice) }}" name="finalPrice">
                                            <span style="border-left: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-right-none">تومان</span>
                                        </div>
                                    </div>

                                    <!-- Size Group -->
                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">جزئیات</label>
                                        <div class="input-group col-sm-3 force-col-12 g-mb-5">
                                            <span style="border-right: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none w-50">سایز</span>
                                            <select style="height: 40px"
                                                    class="form-control form-control-md custom-select rounded-0 g-pr-30 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                    name="size">
                                                <option
                                                    value="{{ $dataDetail->Size }}">{{ $dataDetail->Size }}</option>
                                            </select>
                                        </div>
                                        <div class="input-group col-sm-4 force-col-12 g-mb-5">
                                            <span style="border-right: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none w-25">رنگ</span>
                                            <select style="height: 40px"
                                                    class="form-control form-control-md custom-select rounded-0 g-pr-30 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                    name="color">
                                                <option
                                                    value="{{ $dataDetail->Color.'-'.$dataDetail->ColorCode }}">{{ $dataDetail->Color }}</option>
                                            </select>
                                        </div>
                                        <div class="input-group col-sm-3 force-col-12 g-mb-5">
                                            <span style="border-right: 1px solid lightgrey"
                                                  class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none w-50">تعداد موجود</span>
                                            <input class="form-control form-control-md rounded-0 text-center g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                   type="text"
                                                   value="{{ $dataDetail->Qty }}" name="qty">
                                        </div>
                                    </div>
                                    <!-- End Size Group -->

                                    {{--        Product Images--}}
                                    <div class="form-group row g-mb-25">
                                        <label class="col-sm-2 col-form-label">تصاویر</label>
                                        <div style="direction: ltr" class="col-sm-10 text-left p-0">
                                            <div class="col-sm-3 g-mb-10">
                                                <img class="img-fluid img-thumbnail g-rounded-1"
                                                     src="{{ file_exists(public_path($data->PicPath.$dataDetail->SampleNumber.'.jpg'))?$data->PicPath.$dataDetail->SampleNumber:$data->PicPath.'sample1' }}.jpg"
                                                     alt="Image Description">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                @if (!is_null($falseProduct))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Danger Alert -->
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <h4 class="h5"><i class="fa fa-minus-circle g-ml-5"></i>محصول حاوی
                                                    مشخصات اشتباه است!</h4>
                                            </div>
                                            <!-- Danger Alert -->
                                        </div>
                                    </div>
                                @else
                                    <div class="text-left">
                                        <a href="#" class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                           data-toggle="modal"
                                           id="edit"
                                           onclick="editProduct()"
                                           data-target="#modalLoginForm">ویرایش مشخصات محصول</a>
                                        <a style="display: none" href="#"
                                           class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                           data-toggle="modal"
                                           id="save"
                                           onclick="saveProductData()"
                                           data-target="#modalLoginForm">ثبت اطلاعات</a>
                                        @if (is_null($falseProduct) && (is_null($dataDetail->orderDetailID)))
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                                    onclick="productDelete({{$dataDetail->ID}},{{$data->SellerID}})">
                                                حذف محصول
                                            </button>
                                        @endif
                                        @if (is_null($falseProduct) && (isset($dataDetail->OrderID)))
                                            <button type="button" class="btn btn-md u-btn-primary rounded-0 g-mb-15"
                                                    onclick="productFalse({{$dataDetail->ID}},{{$data->SellerID}})">
                                                گزارش اطلاعات اشتباه
                                            </button>
                                        @endif

                                    </div>
                                @endif
                            </div>
                        </form>
                        <!-- End Textual Inputs -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
