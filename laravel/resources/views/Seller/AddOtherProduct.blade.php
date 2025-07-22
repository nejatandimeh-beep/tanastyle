@extends('Layouts.IndexSeller')

@section('Content')
    <input id="folderName" name="folderName" type="text" class="d-none">
    <span id="seller" class="d-none">{{Auth::guard('seller')->user()->NationalID}}</span>
    <!-- Info Panel -->
    <div style="direction: rtl;" id="addProductPage"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>افزودن مشخصات محصول
        </h3>
    </div>
    <!-- End Info Panel -->
    <div class="container p-lg-5 g-mt-10 gmb-10 modalBox">
        <!-- Text Input Tooltips -->
        <form id="addProductForm" action="{{ route('SaveOtherProduct')}}" method="post" enctype='multipart/form-data'
              class="g-brd-around g-brd-gray-light-v4 g-pa-30--lg g-mb-30 smallDevicePadding-20">
        @csrf
        <!-- Hidden Input-->
            <input style="display: none" type="text" name="cat" value="{{$cat}}">
            <input style="display: none" type="text" name="catCode" value="{{$catCode}}">
            <input style="display: none" type="number" name="gender" value="{{$gender}}">

            <!-- Name -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblName" class="g-mb-10">نام محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-lock"></i>
                    </div>
                    <input
                        class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16"
                        type="text"
                        id="productName"
                        onkeypress="$('#productName').removeClass('g-color-red')"
                        tabindex="1"
                        name="name">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">نام محصولی که قصد دارید به
                        انبارتان اضافه گردد.</b>
                </div>
                <div style="direction: rtl">
                    <input name="hintCat" class="d-none" value="{{ $hintCat }}">
                    <small class="text-muted g-font-size-12">این محصول در دسته بندی <span
                            class="g-font-weight-600 g-ml-1 g-mr-1">{{$hintCat}}</span> قرار می گیرد.</small>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Model -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblModel" class="g-mb-10">مدل محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <input style="direction: rtl"
                           id="addProductModel"
                           class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           tabindex="2"
                           name="model"
                           onkeypress="$('#lblModel').removeClass('g-color-red')"
                           value="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">مدل جزئیاتی از نام محصول
                        است.</b>
                </div>
                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">اگر محصولتان مدل یا شماره مدل خاصی ندارد این قسمت را خالی
                        بگذارید.</small>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Brand -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblBrand" class="g-mb-10">برند محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <input class="form-control form-control-md rounded-0 text-left g-font-size-16" type="text"
                           tabindex="3"
                           name="brand"
                           id="addProductBrand"
                           onkeypress="$('#lblBrand').removeClass('g-color-red')"
                           value="">
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">برند هویت محصول شماست.</small><br>
                    <small class="text-muted g-font-size-12">اگر محصولتان برند ندارد مقدار FreeBrand را وارد
                        نمایید.</small><br>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">

            <!-- Detail -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblDetail" class="g-mb-10">توضیحات کیفی محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div
                        class="input-group-addon d-flex justify-content-start g-color-gray-light-v1 g-bg-white rounded-0 g-py-12">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <textarea style="direction: rtl"
                              class="form-control form-control-md g-resize-none rounded-0 pl-0 text-right g-font-size-16"
                              rows="6"
                              tabindex="4"
                              id="addProductDetail"
                              onkeypress="$('#lblDetail').removeClass('g-color-red')"
                              placeholder="هر توضیح در سطری جدا" name="detail">{{ old('detail') }}</textarea>
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">توضیحات مفید می تواند به
                        فروش
                        بهتر محصول شما کمک کند.</b>
                </div>
                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">در قسمت توضیحات کیفی می توانید توضیحاتی برای محصول اضافه
                        کنید. به عنوان مثال:</small><br>
                    <small class="text-muted g-font-size-12"> می توان جنس محصول روشهای شستشو روشهای نگهداری و ... را
                        توضیح داد.
                    </small><br>
                    <small
                        class="{{$catCode==='m' || $catCode==='n'|| $catCode==='o' || $catCode==='p'?'d-block':'d-none'}} text-muted g-font-size-12">اگر
                        محصولتان سایز بندی خاصی دارد لطفا اندازه ها را در این قسمت قید کنید.
                    </small>
                    <small class="text-muted g-font-size-12">لطفا توضیحات را مرتب و در سطرهای جدا وارد نمایید.</small>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Size Group -->
            <div style="direction: rtl" class="g-mb-15">
                <label class="g-mb-10 w-100">مشخصات سایز، رنگ و تعداد</label>
                <small class="text-muted g-font-size-12">لطفا تعیین نمایید چند عدد از سایز انتخابی را موجود
                    دارید.</small><br>
                <small class="text-muted g-font-size-12">همچنین برای هر رنگ از محصول تصویر همان محصول را در سطر مربوط به
                    خود وارد نمایید.</small><br>
            </div>
            <input style="display: none" type="number" name="qty" id="addProductSizeQty" value="0">

            {{--سایز و رنگ و موجودی و تصویر--}}
            <div id="sizeRowContainer">
                <div class="text-right rowSeller" id="sizeRow-0">
                    {{--رنگ--}}
                    <div class="form-group g-mb-20 text-right col-lg-3">
                        <label id="lblColor0" class="g-mb-10">رنگ</label>
                        <div class="input-group g-brd-primary--focus g-mb-10">
                            <div
                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v5 rounded-0">
                                <i class="fa fa-paint-brush g-font-size-14 g-line-height-0_7"></i>
                            </div>
                            <button id="colorBtn0" style="direction: rtl" type="button"
                                    class="form-control g-color-primary--hover form-control-md btn u-btn-white g-brd-around g-brd-gray-light-v2 rounded-0 g-font-size-16"
                                    data-toggle="modal" data-target="#colorModal0">
                                انتخاب کنید
                            </button>
                            <div class="modal fade" id="colorModal0" tabindex="-1" role="dialog"
                                 aria-labelledby="colorModal0Title" aria-hidden="true">
                                <div style="direction: rtl; max-width: 100%; margin: 0" class="modal-dialog"
                                     role="document">
                                    <div class="modal-content rounded-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="colorModalTitle">پالت رنگ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="accordion-0" class="u-accordion u-accordion-color-primary"
                                                 role="tablist" aria-multiselectable="true">
                                                <!-- White -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-01"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-0" aria-expanded="true"
                                                               aria-controls="accordion-0-body-01">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سفید
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-01" class="collapse show"
                                                         role="tabpanel" aria-labelledby="accordion-0-heading-01">
                                                        <div id="0-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: white; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سفید</span>
                                                            </div>
                                                            <div style="background-color: #FFFAFA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">صورتی محو</span>
                                                            </div>
                                                            <div style="background-color: #F0FFF0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">یشمی محو</span>
                                                            </div>
                                                            <div style="background-color: #F5FFFA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سفید نعنائی</span>
                                                            </div>
                                                            <div style="background-color: #F0FFFF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی محو</span>
                                                            </div>
                                                            <div style="background-color: #F0F8FF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نیلی محو</span>
                                                            </div>
                                                            <div style="background-color: #F8F8FF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سفید بنفشه</span>
                                                            </div>
                                                            <div style="background-color: #F5F5F5; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکستری محو</span>
                                                            </div>
                                                            <div style="background-color: #FFF5EE; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بژ باز</span>
                                                            </div>
                                                            <div style="background-color: #F5F5DC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">هلی</span>
                                                            </div>
                                                            <div style="background-color: #FDF5D6; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بژ روشن</span>
                                                            </div>
                                                            <div style="background-color: #FFFAF0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">پوست پیازی</span>
                                                            </div>
                                                            <div style="background-color: #FFFFF0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">استخوانی</span>
                                                            </div>
                                                            <div style="background-color: #FAEBD7; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بژ تیره</span>
                                                            </div>
                                                            <div style="background-color: #FAF0E6; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کتانی</span>
                                                            </div>
                                                            <div style="background-color: #FFF0F5; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">صورتی مات</span>
                                                            </div>
                                                            <div style="background-color: #F5EDDA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بژ</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Red -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-02"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-0" aria-expanded="false"
                                                               aria-controls="accordion-0-body-02">
                                                                    <span
                                                                        class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                      <i class="fa fa-plus"></i>
                                                                      <i class="fa fa-minus"></i>
                                                                    </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های قرمز
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-02">
                                                        <div id="1-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #6C2E1F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">جگری</span>
                                                            </div>
                                                            <div style="background-color: #F08080; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">مرجانی روشن</span>
                                                            </div>
                                                            <div style="background-color: #FA8072; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سالمون</span>
                                                            </div>
                                                            <div style="background-color: #FFA07A; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کرم نارنجی</span>
                                                            </div>
                                                            <div style="background-color: #FF0000; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">قرمز</span>
                                                            </div>
                                                            <div style="background-color: #990000; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">زرشکی</span>
                                                            </div>
                                                            <div style="background-color: #B22222; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شرابی</span>
                                                            </div>
                                                            <div style="background-color: #CD001A; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آلوبالویی</span>
                                                            </div>
                                                            <div style="background-color: #B84E59; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">عنابی تند</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pink -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-03"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-0" aria-expanded="false"
                                                               aria-controls="accordion-0-body-03">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های صورتی
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-03">
                                                        <div id="2-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #FFC0CB; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">صورتی</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                            <div style="background-color: #FF68C4; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">صورتی پر رنگ</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                            <div style="background-color: #DB7093; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شرابی روشن</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                            <div style="background-color: #FF69B4; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سرخ آبی</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                            <div style="background-color: #FF00FF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سرخابی روشن</span>
                                                            </div>
                                                            <div style="background-color: #FF1493; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شفقی</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                            <div style="background-color: #C71585; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ارغوانی</span>
                                                                <span class="d-none">0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Orange -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-04"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-04"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-04">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های نارنجی
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-04"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-04">
                                                        <div id="3-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #FFA07A; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کرم نارنجی</span>
                                                            </div>
                                                            <div style="background-color: #FFA500; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نارنجی</span>
                                                            </div>
                                                            <div style="background-color: #FF8C00; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نارنجی سیر</span>
                                                            </div>
                                                            <div style="background-color: #FF7F50; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نارنجی پر رنگ</span>
                                                            </div>
                                                            <div style="background-color: #FF6347; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">قرمز گوجه ای</span>
                                                            </div>
                                                            <div style="background-color: #FF4500; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">قرمز نارنجی</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Yellow -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-05"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-05"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-05">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های زرد
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-05"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-05">
                                                        <div id="4-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #FFFFE0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شیری</span>
                                                            </div>
                                                            <div style="background-color: #FFFACD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شیری شکری</span>
                                                            </div>
                                                            <div style="background-color: #FAFAD2; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">لیمویی روشن</span>
                                                            </div>
                                                            <div style="background-color: #FFEFD5; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">هلویی روشن</span>
                                                            </div>
                                                            <div style="background-color: #FFE4B5; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">هلویی</span>
                                                            </div>
                                                            <div style="background-color: #FFDAB9; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">هلویی پر رنگ</span>
                                                            </div>
                                                            <div style="background-color: #EEE8AA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نخودی</span>
                                                            </div>
                                                            <div style="background-color: #F0E683; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکی</span>
                                                            </div>
                                                            <div style="background-color: #FFFF00; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">زرد</span>
                                                            </div>
                                                            <div style="background-color: #FFD700; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">طلایی</span>
                                                            </div>
                                                            <div style="background-color: #e89783; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">رز گلد</span>
                                                            </div>
                                                            <div style="background-color: #BDB76B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ماشی</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Green -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-06"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-06"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-06">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سبز
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-06"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-06">
                                                        <div id="5-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #ADFF2F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">مغز پسته ای روشن</span>
                                                            </div>
                                                            <div style="background-color: #7FFF00; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">مغز پسته ای</span>
                                                            </div>
                                                            <div style="background-color: #7CFc00; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">مغز پسته ای پر رنگ</span>
                                                            </div>
                                                            <div style="background-color: #00FF00; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز کم رنگ</span>
                                                            </div>
                                                            <div style="background-color: #98FB98; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز کدر</span>
                                                            </div>
                                                            <div style="background-color: #68c7a5; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">یشمی کم رنگ</span>
                                                            </div>
                                                            <div style="background-color: #00a86b; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">یشمی</span>
                                                            </div>
                                                            <div style="background-color: #004129; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">یشمی سیر</span>
                                                            </div>
                                                            <div style="background-color: #9ACD32; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز لجنی</span>
                                                            </div>
                                                            <div style="background-color: #32CD32; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز چمنی</span>
                                                            </div>
                                                            <div style="background-color: #3CB371; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خزه ای</span>
                                                            </div>
                                                            <div style="background-color: #2E8B57; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خزه ای پر نگ</span>
                                                            </div>
                                                            <div style="background-color: #228B22; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">شویدی</span>
                                                            </div>
                                                            <div style="background-color: #008000; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز</span>
                                                            </div>
                                                            <div style="background-color: #6B8E23; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز ارتشی</span>
                                                            </div>
                                                            <div style="background-color: #808000; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">زیتونی</span>
                                                            </div>
                                                            <div style="background-color: #556B2F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">زیتونی سیر</span>
                                                            </div>
                                                            <div style="background-color: #006400; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز آواکادو</span>
                                                            </div>
                                                            <div style="background-color: #66CDAA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز دریایی</span>
                                                            </div>
                                                            <div style="background-color: #40E0D0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز دریایی روشن</span>
                                                            </div>
                                                            <div style="background-color: #8FBC8F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز دریایی تیره</span>
                                                            </div>
                                                            <div style="background-color: #20B2AA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز کبریتی روشن</span>
                                                            </div>
                                                            <div style="background-color: #008B8B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز کبریتی تیره</span>
                                                            </div>
                                                            <div style="background-color: #008080; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سبز دودی</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Blue -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-07"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-07"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-07">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های آبی
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-07"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-07">
                                                        <div id="6-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #00FFFF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای</span>
                                                            </div>
                                                            <div style="background-color: #E0FFFF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی آسمانی</span>
                                                            </div>
                                                            <div style="background-color: #AFEEEE; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای کدر</span>
                                                            </div>
                                                            <div style="background-color: #00FFFF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای</span>
                                                            </div>
                                                            <div style="background-color: #48D1CC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای تیره</span>
                                                            </div>
                                                            <div style="background-color: #00CED1; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای سیر</span>
                                                            </div>
                                                            <div style="background-color: #B0E0E6; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی کبریتی روشن</span>
                                                            </div>
                                                            <div style="background-color: #B0C4DE; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی مایل به بنفش</span>
                                                            </div>
                                                            <div style="background-color: #ADD8E6; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی کبریتی</span>
                                                            </div>
                                                            <div style="background-color: #87CEFB; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی آسمانی سیر</span>
                                                            </div>
                                                            <div style="background-color: #87CEFA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی روشن</span>
                                                            </div>
                                                            <div style="background-color: #00BFFF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی کم رنگ</span>
                                                            </div>
                                                            <div style="background-color: #6495ED; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی کدر</span>
                                                            </div>
                                                            <div style="background-color: #4682B4; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نیلی متالیک</span>
                                                            </div>
                                                            <div style="background-color: #5F9EA0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی لجنی</span>
                                                            </div>
                                                            <div style="background-color: #7B68EE; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی متالیک روشن</span>
                                                            </div>
                                                            <div style="background-color: #1E90FF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نیلی</span>
                                                            </div>
                                                            <div style="background-color: #4169E1; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">فیروزه ای فسفری</span>
                                                            </div>
                                                            <div style="background-color: #0000FF; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی</span>
                                                            </div>
                                                            <div style="background-color: #0000CD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی سیر</span>
                                                            </div>
                                                            <div style="background-color: #00008B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سرمه ای</span>
                                                            </div>
                                                            <div style="background-color: #000080; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">لاجوردی</span>
                                                            </div>
                                                            <div style="background-color: #191970; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی نفتی</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Magenta -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-08"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-08"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-08">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های بنفش
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-08"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-08">
                                                        <div id="7-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                            <div style="background-color: #E6E6FA; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نیلی کم رنگ</span>
                                                            </div>
                                                            <div style="background-color: #D8BFD8; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بادمجانی روشن</span>
                                                            </div>
                                                            <div style="background-color: #DDA0DD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بنفش کدر</span>
                                                            </div>
                                                            <div style="background-color: #EE82EE; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بنفش روشن</span>
                                                            </div>
                                                            <div style="background-color: #DA70D6; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ارکیده</span>
                                                            </div>
                                                            <div style="background-color: #BA55D3; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ارکیده سیر</span>
                                                            </div>
                                                            <div style="background-color: #9370DB; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی بنفش</span>
                                                            </div>
                                                            <div style="background-color: #6A5ACD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی فولادی</span>
                                                            </div>
                                                            <div style="background-color: #8A2BE2; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی بنفش سیر</span>
                                                            </div>
                                                            <div style="background-color: #9400D3; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بنفش باز</span>
                                                            </div>
                                                            <div style="background-color: #9932CC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ارکیده بنفش</span>
                                                            </div>
                                                            <div style="background-color: #8B008B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">مخملی</span>
                                                            </div>
                                                            <div style="background-color: #800080; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بنفش</span>
                                                            </div>
                                                            <div style="background-color: #483D8B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">آبی دودی</span>
                                                            </div>
                                                            <div style="background-color: #4B0082; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نیلی سیر</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Brown -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-09"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-09"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-09">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های قهوه ای
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-09"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-09">
                                                        <div id="8-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-09">
                                                            <div style="background-color: #FFF8DC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کاهی</span>
                                                            </div>
                                                            <div style="background-color: #FFEBCD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کاهگلی</span>
                                                            </div>
                                                            <div style="background-color: #755A36; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">حنایی</span>
                                                            </div>
                                                            <div style="background-color: #FFE4C4; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کرم</span>
                                                            </div>
                                                            <div style="background-color: #FFDEAD; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کرم سیر</span>
                                                            </div>
                                                            <div style="background-color: #F5DEBC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">گندمی</span>
                                                            </div>
                                                            <div style="background-color: #DEB887; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکی</span>
                                                            </div>
                                                            <div style="background-color: #D2B48C; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">برنزه ای کدر</span>
                                                            </div>
                                                            <div style="background-color: #BC8F8F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بادمجانی</span>
                                                            </div>
                                                            <div style="background-color: #F4A460; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">هلویی سیر</span>
                                                            </div>
                                                            <div style="background-color: #DAA520; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خردلی</span>
                                                            </div>
                                                            <div style="background-color: #B8860B; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ماشی سیر</span>
                                                            </div>
                                                            <div style="background-color: #CD853F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">بادامی سیر</span>
                                                            </div>
                                                            <div style="background-color: #D2691E; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">عسلی پر رنگ</span>
                                                            </div>
                                                            <div style="background-color: #3A1D04; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">کاکائویی</span>
                                                            </div>
                                                            <div style="background-color: #A0522D; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">قهوه ای متوسط</span>
                                                            </div>
                                                            <div style="background-color: #663D14; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">قهوه ای</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Black -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-10"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-10"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-10">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سیاه
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-10"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-10">
                                                        <div id="9-0"
                                                             class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-09">
                                                            <div style="background-color: #DCDCDC; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکستری مات</span>
                                                            </div>
                                                            <div style="background-color: #D3D3D3; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">نقره ای</span>
                                                            </div>
                                                            <div style="background-color: #C0C0C0; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">توسی</span>
                                                            </div>
                                                            <div style="background-color: #A9A9A9; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکستری سیر</span>
                                                            </div>
                                                            <div style="background-color: #808080; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">خاکستری</span>
                                                            </div>
                                                            <div style="background-color: #696969; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">دودی</span>
                                                            </div>
                                                            <div style="background-color: #778899; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سربی</span>
                                                            </div>
                                                            <div style="background-color: #708090; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سربی تیره</span>
                                                            </div>
                                                            <div style="background-color: #2F4F4F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">لجنی تیره</span>
                                                            </div>
                                                            <div style="background-color: #36454F; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ذغالی</span>
                                                            </div>
                                                            <div style="background-color: #1E1E1E; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">ذغالی سیر</span>
                                                            </div>
                                                            <div style="background-color: #0e0e0e; cursor: pointer"
                                                                 class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                <span class="toolTipText">سیاه</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Multi Color -->
                                                <div class="card rounded-0 g-brd-none">
                                                    <div id="accordion-0-heading-11"
                                                         class="u-accordion__header g-pa-0" role="tab">
                                                        <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-0-body-11"
                                                               data-toggle="collapse"
                                                               data-parent="#accordion-0"
                                                               aria-expanded="false"
                                                               aria-controls="accordion-0-body-11">
                                                                        <span
                                                                            class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                <span class="d-inline-block g-pa-15">
                                                                          رنگ های مالتی کالر
                                                                        </span>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-0-body-11"
                                                         class="collapse"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-0-heading-11">
                                                        <div
                                                            class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-09">
                                                            <div id="10-0" class="d-lg-block d-flex flex-column">
                                                                <div style="cursor: pointer"
                                                                     class="multiColor d-inline-block g-mb-5 g-px-10 g-py-5 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover g-bg-primary--hover g-color-white--hover">
                                                                    <span class="toolTipText">دو رنگ</span>
                                                                </div>
                                                                <div style="cursor: pointer"
                                                                     class="multiColor d-inline-block g-px-10 g-mb-5 g-py-5 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover g-bg-primary--hover g-color-white--hover">
                                                                    <span class="toolTipText">سه رنگ</span>
                                                                </div>
                                                                <div style="cursor: pointer"
                                                                     class="multiColor d-inline-block g-px-10 g-mb-5 g-py-5 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover g-bg-primary--hover g-color-white--hover">
                                                                    <span class="toolTipText">چهار رنگ</span>
                                                                </div>
                                                                <div style="cursor: pointer"
                                                                     class="multiColor d-inline-block g-px-10 g-mb-5 g-py-5 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover g-bg-primary--hover g-color-white--hover">
                                                                    <span class="toolTipText">رنگارنگ</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <select
                                class="d-none form-control form-control-md custom-select rounded-0 g-font-size-16 text-right h-25"
                                id="color0" name="color0">
                                <option value="" selected="selected"></option>
                            </select>
                            <input class="d-none" type="text" value="" id="hexCode0" name="hexCode0">
                        </div>
                    </div>

                    {{--موجودی--}}
                    <div class="form-group g-mb-20 text-right col-lg-3">
                        <label class="g-mb-10 g-color-gray-dark-v3">تعداد موجود</label>
                        <div class="input-group g-brd-primary--focus g-mb-10">
                            <div
                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                <i class="fa fa-ellipsis-v"></i>
                            </div>
                            <select
                                class="form-control form-control-md custom-select rounded-0 text-right h-25 g-font-size-16"
                                id="qty0"
                                tabindex="5+{{ '0' }}"
                                name="sizeQty0">
                                @for ($j = 1; $j<= 10; $j++)
                                    <option
                                        value="{{$j}}">{{$j}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    {{--تصویر--}}
                    <div id="colorImgDiv0" class="form-group g-mb-0 text-right col-lg-3">
                        <label class="g-mb-10 g-color-gray-dark-v3" for="{{ 'fileShow'.'0' }}"
                               id="{{ 'img-file-label'.'0' }}">تصویر محصول
                            <span id="{{ 'productColorImg'.'0' }}"></span></label>
                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                                    <span style="cursor: default"
                                          class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                                          id="check0"><i class="fa fa-check"></i></span>
                            <span style="cursor: default"
                                  class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                                  id="uploadingIcon0"><i class="fa fa-spinner fa-spin"></i></span>
                            <span style="cursor: default"
                                  class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                                  id="errorIcon0"><i class="fa fa-exclamation-circle"></i></span>
                            <input style="direction: rtl" id="errorText0"
                                   class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                   type="text"
                                   placeholder="ناموفق" readonly="">
                            <input style="direction: rtl" id="uploadingText0"
                                   class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                   type="text"
                                   placeholder="..." readonly="">
                            <input id="{{ 'fileShow'.'0' }}"
                                   class="form-control form-control-md rounded-0 g-font-size-16 g-px-5 text-right"
                                   type="text"
                                   placeholder="فاقد تصویر" readonly="">

                            <div class="input-group-btn">
                                <button id="{{ 'iconCamera'.'0' }}" class="btn btn-md u-btn-primary rounded-0"
                                        tabindex="8" type="submit">
                                    <i class="icon-camera align-middle g-font-size-20"></i>
                                </button>
                                <input id="{{ 'pic'.'0' }}"
                                       onclick="$('#fileShow0').removeClass('g-brd-lightred')"
                                       type="file"
                                       name="{{ 'pic'.'0' }}"
                                       accept="image/*">
                            </div>
                        </div>
                        <div style="direction: rtl">
                            <p class="text-muted g-font-size-12 g-line-height-1_5">لطفا تا پایان بارگذاری عکس، صفحه را
                                ترک نفرمائید.</p><br>
                        </div>
                    </div>
                    <div id="repeatColorMsg0" class="d-none form-group g-mb-0 text-right col-lg-3">
                        <label class="g-mb-10">تصویر محصول</label>
                        <div class="input-group g-brd-primary--focus g-mb-10">
                            <div
                                class="form-control form-control-md rounded-0 g-font-size-16 g-px-5 text-center g-bg-primary g-color-white g-brd-none">
                                <span>تصویر موجود است</span>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
                <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            </div>

            <!-- UnitPrice -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblUnitPrice" class="g-mb-10">قیمت پایه محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <span class="input-group-addon g-bg-gray-light-v5">تومان</span>
                    <input class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           tabindex="6"
                           id="unitPrice"
                           pattern="\d*"
                           {{--                           pattern="\d*"--}}
                           onkeypress="$('#lblUnitPrice').removeClass('g-color-red');"
                           value="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">کمترین مقدار 10,000 تومان
                        می
                        باشد.</b>
                    <input style="display: none" type="number" name="tempPrice" id="tempPrice"
                           value="">
                </div>
                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">قیمت پایه، قیمتی است که بدون در نظر گرفتن تخفیف ذکر می
                        شود.</small>
                </div>
            </div>

            <!-- Discount -->
            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <div class="form-group g-mb-20 text-right">
                <label id="lblDiscount" class="g-mb-10">تخفیف</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <span class="input-group-addon g-bg-gray-light-v5 bigDevice" id="toman">تومان</span>
                    <span style="direction: rtl; width: 35%"
                          class="input-group-addon g-bg-gray-light-v5 bigDevice"
                          id="BsalePrice">...</span>
                    <span class="input-group-addon g-bg-gray-light-v5 bigDevice">سهم فروشنده</span>
                    <span class="input-group-addon g-bg-gray-light-v5">درصد</span>
                    <input class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           id="discount"
                           tabindex="7"
                           name="discount"
                           pattern="\d*"
                           value=""
                           onkeypress="$('#lblDiscount').removeClass('g-color-red')"
                           maxlength="2">
                    <input style="display: none" type="number" name="priceWithDiscount" id="priceWithDiscount"
                           value="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">تخفیف باید بین 1 تا 99 درصد
                        باشد. </b>
                </div>
                <!-- Discount for Small Device -->
                <div class="g-brd-primary--focus g-mb-10 smallFlex">
                    <span style="width: 20%;" class="input-group-addon g-bg-gray-light-v5" id="Stoman">تومان</span>
                    <span style="direction: rtl; width: 40%;"
                          class="input-group-addon g-py-10 g-bg-gray-light-v5 g-color-primary"
                          tabindex="7"
                          id="SsalePrice">...</span>
                    <span style="width: 40%;" class="input-group-addon g-bg-gray-light-v5"
                          id="SlblSalePrice">سهم فروشنده</span>
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">عددی را که در این قسمت قید می کنید بر اساس درصد محاسبه شده
                        و از قیمت پایه کسر می گردد و عدد مانده به عنوان سهم شما ثبت می شود.</small><br>
                    <small class="text-muted g-font-size-12">تخفیف می تواند مشتریان را به خود جلب کند.</small>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">

            <!-- smallDevice -->
            <div class="form-group g-mb-20 text-right smallDevices">
                <label id="lblDiscount" class="g-mb-10">قیمت نهایی محصول</label>
                <div class="input-group d-block g-brd-primary--focus g-mb-10">
                    <span class="input-group-addon g-bg-gray-light-v5 g-brd-right g-brd-gray-light-v3">قیمت فروش بدون تخفیف</span>
                    <input
                        class="form-control g-brd-top-none g-brd-bottom-none w-100 form-control-md rounded-0 text-center g-font-size-16 g-color-orange"
                        type="text"
                        id="finalPriceWithoutDiscount"
                        tabindex="7"
                        value="..."
                        readonly>
                    <input style="display: none" type="number" name="tempFinalPriceWithoutDiscount"
                           id="tempFinalPriceWithoutDiscount"
                           value="">
                    <span class="input-group-addon g-bg-gray-light-v5 g-brd-right g-brd-gray-light-v3">قیمت فروش با تخفیف</span>
                    <input
                        class="form-control g-brd-top-none g-brd-bottom-none w-100 form-control-md rounded-0 text-center g-font-size-16 g-color-primary"
                        type="text"
                        id="finalPrice"
                        tabindex="7"
                        name="finalPrice"
                        value="..."
                        readonly>
                    <input style="display: none" type="number" name="tempFinalPrice" id="tempFinalPrice"
                           value="">
                    <span class="input-group-addon g-bg-gray-light-v5 g-brd-left g-brd-gray-light-v3"
                          id="toman">تومان</span>
                </div>
                <div style="direction: rtl">
                    <small class="d-block text-muted g-font-size-12">روش محاسبه قیمت فروش:</small>
                    <small class="d-block text-muted g-font-size-12">تخفیف <small id="dis"></small></small>
                    <small class="d-block text-muted g-font-size-12">سهم فروشنده <small
                            id="sellerShare"></small></small>
{{--                    <small--}}
{{--                        class="{{Auth::guard('seller')->user()->NationalID===2872282556 ?'d-none':'d-block'}} text-muted g-font-size-12">سهم--}}
{{--                        تانا استایل <small id="companyShare"></small></small>--}}
                    <small class="d-block text-muted g-font-size-12">9% ارزش افزوده <small id="exValue"></small></small>
                </div>
            </div>

            <!-- bigDevice -->
            <div class="form-group g-mb-20 text-right bigDevices">
                <label id="lblDiscount" class="g-mb-10">قیمت نهایی محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <span class="input-group-addon g-bg-gray-light-v5" id="toman">تومان</span>
                    <input class="form-control form-control-md rounded-0 text-center g-font-size-16 g-color-primary"
                           type="text"
                           id="finalPrice"
                           tabindex="7"
                           name="finalPrice"
                           value="..."
                           readonly>
                    <input style="display: none" type="number" name="tempFinalPrice" id="tempFinalPrice"
                           value="">
                    <span class="input-group-addon g-bg-gray-light-v5 g-brd-right g-brd-gray-light-v3">قیمت فروش با تخفیف</span>
                    <input class="form-control form-control-md rounded-0 text-center g-font-size-16 g-color-orange"
                           type="text"
                           id="finalPriceWithoutDiscount"
                           tabindex="7"
                           value="..."
                           readonly>
                    <input style="display: none" type="number" name="tempFinalPriceWithoutDiscount"
                           id="tempFinalPriceWithoutDiscount"
                           value="">
                    <span class="input-group-addon g-bg-gray-light-v5 g-brd-right g-brd-gray-light-v3">قیمت فروش بدون تخفیف</span>
                </div>
                <div style="direction: rtl">
                    <small class="d-block text-muted g-font-size-12">روش محاسبه قیمت فروش:</small>
                    <small class="d-block text-muted g-font-size-12">تخفیف <small id="dis"></small></small>
                    <small class="d-block text-muted g-font-size-12">سهم فروشنده <small
                            id="sellerShare"></small></small>
                    <small
                        class="{{Auth::guard('seller')->user()->NationalID===2872282556 ?'d-none':'d-block'}} text-muted g-font-size-12">سهم
                        تانا استایل <small id="companyShare"></small></small>
                    <small class="d-block text-muted g-font-size-12">9% ارزش افزوده <small id="exValue"></small></small>
                </div>
            </div>

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- تصویر از نمایی دیگر -->
            <div id="imgContainer" class="form-group  text-right">
                <label class="g-mb-10" for="{{ 'fileShow11' }}" id="{{ 'img-file-label11' }}">تصویر از نمایی
                    دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                       <span style="cursor: default"
                             class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                             id="check11"><i class="fa fa-check"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="uploadingIcon11"><i class="fa fa-spinner fa-spin"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                          id="errorIcon11"><i class="fa fa-exclamation-circle"></i></span>
                    <input style="direction: rtl" id="errorText11"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="ناموفق" readonly="">
                    <input style="direction: rtl" id="uploadingText11"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="درحال بارگذاری.." readonly="">
                    <input id="{{ 'fileShow11' }}" class="form-control form-control-md rounded-0 g-font-size-16"
                           type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">
                            <i class="icon-camera align-middle g-font-size-20"></i>
                        </button>
                        <input id="{{'pic11'}}"
                               onclick="$('#fileShow11').removeClass('g-brd-lightred')"
                               type="file"
                               name="{{'pic11'}}"
                               accept="image/*">
                    </div>
                </div>
                <label class="g-mb-10" for="{{ 'fileShow12' }}" id="{{ 'img-file-label12' }}">تصویر از نمایی
                    دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                       <span style="cursor: default"
                             class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                             id="check12"><i class="fa fa-check"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="uploadingIcon12"><i class="fa fa-spinner fa-spin"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                          id="errorIcon12"><i class="fa fa-exclamation-circle"></i></span>
                    <input style="direction: rtl" id="errorText12"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="ناموفق" readonly="">
                    <input style="direction: rtl" id="uploadingText12"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="درحال بارگذاری.." readonly="">
                    <input id="{{ 'fileShow12' }}" class="form-control form-control-md rounded-0 g-font-size-16"
                           type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="9" type="submit">
                            <i class="icon-camera align-middle g-font-size-20"></i>
                        </button>
                        <input id="{{ 'pic12' }}"
                               onclick="$('#fileShow12').removeClass('g-brd-lightred')"
                               type="file"
                               name="{{ 'pic12' }}"
                               accept="image/*">
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div id="picModal"
                         class="modal-dialog modal-lg g-width-auto--lg w-100 mx-lg-auto g-ml-minus-4 modal-dialog-centered"
                         role="document">
                        <div style="direction:rtl;" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">برش تصویر</h5>
                                <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body g-pa-25">
                                <div class="img-container">
                                    <div class="col-md-12 p-0">
                                        <img style="width: 100%;" src="" id="sample_image">
                                    </div>
                                    {{--                        <div class="col-md-4">--}}
                                    {{--                            <div class="preview rounded-circle mx-auto g-mt-20"></div>--}}
                                    {{--                        </div>--}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary rounded-0 g-ml-5" data-dismiss="modal">انصراف
                                </button>
                                <button type="button" id="crop" class="btn btn-primary rounded-0">برش</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">لطفا تا پایان بارگذاری عکس این صفحه را ترک
                        نفرمائید.</small><br>
                    <small class="text-muted g-font-size-12">اگر مایل هستید از نماهای دیگر محصول تصویر اضافه کنید از این
                        قسمت بهره ببرید.</small><br>
                    <small class="text-muted g-font-size-12">لطفا تصاویر را بر اساس قوانین تانا استایل اضافه نمایید تا
                        محصولتان بهتر دیده شود.<a class="g-color-primary g-font-size-13"
                                                  href="#">قوانین</a></small><br>
                </div>

                <br><br><br>
                <div class="text-left">
                    <!-- Danger Alert -->
                    <div style="direction: rtl" id="errorMsg" class="d-none alert alert-danger g-mt-20 text-right"
                         role="alert">
                        <strong>اشتباهی رخ داده است!</strong> لطفا فرم فوق را بررسی و اشتباهات موجود در فرم را اصلاح
                        نمایید.
                    </div>
                    <!-- End Danger Alert -->
                    <button id="addProductBtn" type="submit" class="btn btn-md u-btn-primary rounded-0 g-pa-20--lg"
                            tabindex="12">
                        <span class="fa fa-save g-mr-10 g-font-size-16"></span><span style="direction: rtl"
                                                                                     id="addProductBtnCaption">افزودن به انبار</span>
                    </button>
                </div>
            </div>

            <input id="folderName2" name="folderName2" type="text" class="d-none">
        </form>

    </div>
@endsection

