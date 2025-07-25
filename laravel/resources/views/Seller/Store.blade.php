@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Add Product Msg -->
    @if(session()->has('addStatus'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">افزودن محصول به انبار با موفقیت انجام شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Add Qty Product Msg -->
    @if(session()->has('productId') && (Session::get('productId') !== 0))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl"> تغییر موجودی محصول با کد {{ Session::get('productId') }} با
                            موفقیت انجام شد. </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- False Product Msg -->
    @if(session()->has('falseStatus'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">گزارش محصول حاوی اطلاعات اشتباه با موفقیت ثبت شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Change Price Product Msg -->
    @if(session()->has('changePrice'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">قیمت محصول مورد نظر با موفقیت تغییر یافت.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Change Discount Product Msg -->
    @if(session()->has('changeDiscount'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">تخفیف محصول مورد نظر با موفقیت تغییر یافت.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Delete Product Msg -->
    @if(session()->has('status'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">حذف محصول از انبار با موفقیت انجام شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>انبار من
        </h3>
    </div>
    <!-- End Info Panel -->

    <div class="container">
        {{--    Total Info--}}
        <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

            <!-- Icon Blocks -->
            <div
                class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">تعداد کل محصولات موجود در انبار</h3>
                <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $allQty }}</span>عدد </span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div style="direction: rtl"
                 class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">تعداد محصولات به تفکیک جنسیت</h3>
                <span class="u-label g-bg-bluegray g-mb-5">زنانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $female }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mb-5">مردانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $male }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mb-5">دخترانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $girl }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mb-5">پسرانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $boy }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mb-5">نوزادی دخترانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $babyBoy }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mb-5">نوزادی پسرانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $babyGirl }}</span>عدد</span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">ارزش کل محصولات موجود در انبار</h3>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($sumFPrice) }}</span>تومان </span>
            </div>
            <!-- End Icon Blocks -->
        </div>

        {{--        Focus Div When Page Load by Filters--}}
        <div id="{{ ((isset($valName))
             || (isset($val))
             || (isset($filterDate))
             || (isset($valPrice))
             || (isset($valStatus))) ? 'focusAfterPageLoad' : '' }}"></div>

        {{-- Filters --}}
        <div id="accordion-12" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
            <!-- Card -->
            <div class="card g-brd-none rounded-0 g-mb-15">
                <div id="accordion-12-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                    <h5 class="mb-0">
                        <a style="background-color: #f7f7f9"
                           class="d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-0 g-pa-10-15 g-font-size-16 collapsed"
                           href="#accordion-12-body-01" data-toggle="collapse" data-parent="#accordion-12"
                           aria-expanded="false" aria-controls="accordion-12-body-01">
                          <span class="u-accordion__control-icon g-mr-10">
                            <i class="fa fa-angle-down"></i>
                            <i class="fa fa-angle-up"></i>
                          </span>
                            فیلترها<i class="fa fa-sliders g-ml-5"></i>
                        </a>
                    </h5>
                </div>
                <div id="accordion-12-body-01" class="collapse" role="tabpanel"
                     aria-labelledby="accordion-12-heading-01">
                    <div class="u-accordion__body g-color-gray-dark-v5 p-0 pt-2">
                        <div class="m-0 p-0">
                            <div class="g-pr-10 g-pl-10 g-mb-0 g-pt-20 g-brd-around g-brd-gray-light-v4 g-mb-25">
                                <div class="rowSeller">
                                    {{--                    Name Filter--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                        <div class="input-group g-brd-primary--focus g-mb-10">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 pl-0 text-right g-font-size-16"
                                                   type="text" name="productSearchCode" id="storeProduct_Code"
                                                   pattern="\d*"
                                                   placeholder="{{ (!isset($valName)) ? 'اعداد انگلیسی' : $valName }}"
                                                   value="">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0 w-50">
                                                براساس کد
                                            </div>
                                        </div>
                                        <ul id="storeCode" class="ajaxDropDown"></ul>
                                    </div>

                                    {{--                    Name Filter--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                        <div class="input-group g-brd-primary--focus g-mb-10">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 pl-0 text-right g-font-size-16"
                                                   type="text" name="productSearch" id="storeProduct_search"
                                                   placeholder="{{ (!isset($valName)) ? 'همه' : $valName }}"
                                                   value="">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0 w-50">
                                                براساس نام
                                            </div>
                                        </div>
                                        <ul id="storeName" class="ajaxDropDown"></ul>
                                    </div>

                                    {{--                    Gender Filter--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                        <div class="input-group g-brd-primary--focus g-mb-10">
                                            <select
                                                class="form-control form-control-md g-color-gray-dark-v3 custom-select rounded-0 h-25 g-font-size-16 g-color-gray-light-v1"
                                                name="brand"
                                                tabindex="2"
                                                id="storeGender">
                                                <option
                                                    value="">همه
                                                </option>
                                                <option value="0" {{ (isset($val) && $val == 0) ? 'selected' : '' }}>
                                                    زنانه
                                                </option>
                                                <option value="1" {{ (isset($val) && $val == 1) ? 'selected' : '' }}>
                                                    مردانه
                                                </option>
                                                <option value="2" {{ (isset($val) && $val == 2) ? 'selected' : '' }}>
                                                    دخترانه
                                                </option>
                                                <option value="3" {{ (isset($val) && $val == 3) ? 'selected' : '' }}>
                                                    پسرانه
                                                </option>
                                                <option value="4" {{ (isset($val) && $val == 4) ? 'selected' : '' }}>
                                                    نوزادی دخترانه
                                                </option>
                                                <option value="5" {{ (isset($val) && $val == 5) ? 'selected' : '' }}>
                                                    نوزادی پسرانه
                                                </option>
                                            </select>
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0 w-50">
                                                براساس جنسیت
                                            </div>
                                        </div>
                                    </div>

                                    {{--                Price Filter For Big Device--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                        <div class="input-group g-brd-primary--focus g-mb-0">
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0"
                                                    id="filterPriceBtnBD"
                                                    disabled
                                                    onclick="applyPriceFilter('store')">
                                                اعمال
                                            </button>
                                            {{--             Hide Tempority Input--}}
                                            <input class="d-none" type="number" id="MaxPriceTemp">
                                            <input class="d-none" type="number" id="MinPriceTemp">

                                            <input
                                                class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 text-center g-font-size-16 g-color-gray-light-v1"
                                                type="text"
                                                id="storeMaxPriceBD"
                                                placeholder="{{ (!isset($valMax)) ? 'بیش ترین' : $valMax }}"
                                                onfocus="selectText('storeMaxPriceBD')"
                                                oninput="filterPriceCheck('storeMinPriceBD', 'storeMaxPriceBD', 'filterPriceBtnBD')"
                                                value="{{ (!isset($valMax)) ? '' : number_format($valMax) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0">
                                                تا
                                            </div>
                                            <input
                                                class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 text-center g-font-size-16 g-color-gray-light-v1"
                                                type="text"
                                                id="storeMinPriceBD"
                                                placeholder="{{ (!isset($valMin)) ? 'کم ترین' : $valMin }}"
                                                onfocus="selectText('storeMinPriceBD')"
                                                oninput="filterPriceCheck('storeMinPriceBD', 'storeMaxPriceBD', 'filterPriceBtnBD')"
                                                value="{{ (!isset($valMin)) ? '' : number_format($valMin) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0">
                                                از
                                            </div>
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v3 rounded-0">
                                                قیمت پایه
                                            </div>
                                        </div>
                                        <ul id="product_list" class="ajaxDropDown"></ul>
                                    </div>
                                    {{--                Price Filter For Small Device--}}
                                    <div class="form-group g-mb-20 text-right col-lg-12 mx-auto smallDevice">
                                        <div
                                            class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5">
                                            <label style="direction: rtl"
                                                   class="g-color-gray-light-v1 align-self-center">محدوده قیمت
                                                پایه (تومان)</label>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 text-left g-font-size-16 g-color-gray-light-v1"
                                                   type="text"
                                                   id="storeMinPriceSD"
                                                   placeholder="{{ (!isset($valMin)) ? 'کم ترین' : $valMin }}"
                                                   onfocus="selectText('storeMinPriceSD')"
                                                   oninput="filterPriceCheck('storeMinPriceSD', 'storeMaxPriceSD', 'filterPriceBtnSD')"
                                                   value="{{ (!isset($valMin)) ? '' : number_format($valMin) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                از
                                            </div>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md  g-color-gray-dark-v3 rounded-0 text-left g-font-size-16 g-color-gray-light-v1"
                                                   type="text"
                                                   id="storeMaxPriceSD"
                                                   placeholder="{{ (!isset($valMax)) ? 'بیش ترین' : $valMax }}"
                                                   onfocus="selectText('storeMaxPriceSD')"
                                                   oninput="filterPriceCheck('storeMinPriceSD', 'storeMaxPriceSD', 'filterPriceBtnSD')"
                                                   value="{{ (!isset($valMax)) ? '' : number_format($valMax) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                تا
                                            </div>
                                        </div>
                                        <div>
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0 w-100"
                                                    id="filterPriceBtnSD"
                                                    disabled
                                                    onclick="applyPriceFilter('store')">
                                                اعمال
                                            </button>
                                        </div>
                                    </div>

                                    {{--                    Data Mistake Filters--}}
                                    <div
                                        class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5 g-mr-15 g-ml-15 smallDevice w-100">
                                        <label style="direction: rtl" class="g-color-gray-light-v1 align-self-center">مشخصات</label>
                                    </div>
                                    <div class="btn-group justified-content text-center col-lg-6 g-mb-20">
                                        <label class="u-check m-0 g-mb-5">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="false" onclick="trueInfo('storeInfoStatus')"
                                                {{ (isset($valStatus)) ? (($valStatus == 'مشخصات اشتباه') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block g-brd-gray-light-v1 g-font-size-16 g-color-white--checked g-bg-primary--checked rounded-0">مشخصات اشتباه</span>
                                        </label>
                                        <label class="u-check m-0">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="true" onclick="trueInfo('storeInfoStatus')"
                                                {{ (isset($valStatus)) ? (($valStatus == 'مشخصات صحیح') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block g-brd-gray-light-v1 g-font-size-16 g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">مشخصات صحیح</span>
                                        </label>
                                    </div>
                                    <div
                                        class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5 g-mr-15 g-ml-15 smallDevice w-100">
                                        <label style="direction: rtl" class="g-color-gray-light-v1 align-self-center">مشخصات</label>
                                    </div>

                                    {{--                    visit Filters--}}
                                    <div class="btn-group justified-content text-center col-lg-6 g-mb-20">
                                        <label class="u-check m-0 g-mb-5">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="visit"
                                                   type="radio" id="false" onclick="visitSort('DESC')"
                                                {{ (isset($valName) && (($valName == 'پر بازدیدترین ها')) ? ' checked=""' : '') }}>
                                            <span
                                                class="btn btn-lg btn-block g-brd-gray-light-v1 g-font-size-16 g-color-white--checked g-bg-primary--checked rounded-0">پر بازدیدترین ها</span>
                                        </label>
                                        <label class="u-check m-0">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="visit"
                                                   type="radio" id="true" onclick="visitSort('ASC')"
                                                {{ (isset($valName) && (($valName == 'کم بازدیدترین ها')) ? ' checked=""' : '') }}>
                                            <span
                                                class="btn btn-lg btn-block g-brd-gray-light-v1 g-font-size-16 g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">کم بازدیدترین ها</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>

        {{-- Table --}}
        <div class="g-pb-15">
            <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                لیست موجودی انبار
            </h3>
            @if ($data->count()!==0)
                <h6 style="direction: rtl"
                    class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                    <i class="fa fa-hand-o-right g-font-size-18"></i>
                    <span class="g-font-size-13 g-mr-5">جدول را به سمت راست بکشید.</span>
                </h6>
            @endif
            <div
                style="{{ ((!isset($valName)) && (!isset($val)) && (!isset($valPrice)) && (!isset($valStatus)) && (!isset($filterDate))) ? ' display : none' : '' }}"
                class="m-0 p-0">
                <h6 style="direction: rtl"
                    class="card-header g-bg-green-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right">
                    <a style="cursor: pointer; color: #555; text-decoration: none;"
                       href="{{ route('store') }}"
                       class="fa fa-close g-font-size-18 g-pl-3 g-color-red--hover"></a>
                    <span class="g-font-size-13 g-mr-5">فیلتر <span
                            class="g-bg-primary g-color-white g-pr-3 g-pl-3">
                            {{ (isset($valName)) ? $valName : '' }}
                            {{ (isset($val) && $val == 0) ? 'زنانه' : '' }}
                            {{ (isset($val) && $val == 1) ? 'مردانه' : '' }}
                            {{ (isset($val) && $val == 2) ? 'دخترانه' : '' }}
                            {{ (isset($val) && $val == 3) ? 'پسرانه' : '' }}
                            {{ (isset($val) && $val == 4) ? 'نوزادی دخترانه' : '' }}
                            {{ (isset($val) && $val == 5) ? 'نوزادی پسرانه' : '' }}
                            {{ (isset($valPrice)) ? $valPrice : '' }}
                            {{ (isset($valStatus)) ? $valStatus : '' }}
                            {{ (isset($filterDate)) ? $filterDate : '' }}</span>
                    </span>
                </h6>
            </div>
            @if ($data->count()===0)
            <!-- Danger Alert -->
                <div style="direction: rtl" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="media">
    <span class="d-flex ml-2 g-mt-5">
      <i class="fa fa-minus-circle"></i>
    </span>
                        <div class="media-body">
                            <strong>موردی یافت نشد.</strong>
                        </div>
                    </div>
                </div>
                <!-- Danger Alert -->
            @else
                <div class="table-responsive">
                    <table style="direction: rtl" class="table table-bordered u-table--v2">
                        <thead>
                        <tr>
                            <th class="align-middle text-center focused">کد محصول</th>
                            <th class="align-middle text-center">نام</th>
                            <th class="align-middle text-center">برند</th>
                            <th class="align-middle text-center">جنسیت</th>
                            <th class="align-middle text-center">رنگ</th>
                            <th class="align-middle text-center">موجودی</th>
                            <th class="align-middle text-center text-nowrap">قیمت پایه</th>
                            <th class="align-middle text-center">تخفیف</th>
                            <th class="align-middle text-center text-nowrap">با تخفیف</th>
                            <th class="align-middle text-center">عکس</th>
                            <th class="align-middle text-center">بازدید</th>
                            <th class="align-middle text-center">جزییات</th>
                            <th class="align-middle text-center">مشخصات</th>
                            <th class="align-middle text-center">حذف</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $rec)
                            <tr>
                                <td class="align-middle text-nowrap text-center">{{ $rec->ID.'/'.$rec->pDetailID }}</td>
                                <td class="align-middle text-nowrap text-center">{{ $rec->Name }}</td>
                                <td class="align-middle text-center">{{ $rec->Brand }}</td>
                                <td class="align-middle text-center">{{$rec->Gender}}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->Color }}</td>
                                <td class="align-middle text-center">{{ $rec->Qty }}</td>
                                <td class="align-middle text-center"><s>{{ number_format($rec->UnitPrice) }}</s></td>
                                <td class="align-middle text-center g-color-red">{{ $rec->Discount }}</td>
                                <td class="align-middle text-center g-color-primary">{{ number_format($rec->PriceWithDiscount) }}</td>
                                <td class="align-middle">
                                    <div class="media">
                                        <img class="d-flex g-width-48 g-height-60 g-rounded-3 mx-auto"
                                             src="{{ file_exists(public_path($rec->PicPath.$rec->SampleNumber.'.jpg'))?$rec->PicPath.$rec->SampleNumber:$rec->PicPath.'sample1' }}.jpg"
                                             alt="Image Description">
                                    </div>
                                </td>
                                <td class="align-middle text-center g-color-gray-dark-v1">{{ number_format($rec->VisitCounter) }}</td>
                                <td class="align-middle text-center">
                                    <a
                                        href="{{ route('sellerProductDetail',['id'=>$rec->pDetailID]) }}"
                                        class="g-color-gray-dark-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                        data-toggle="tooltip"
                                        data-placement="top" data-original-title="مشاهده جزئیات محصول">
                                        <i class="fa fa-eye g-font-size-18"></i>
                                    </a>
                                </td>
                                <td class="align-middle text-center">
                                    @if (isset($rec->fpID))
                                        <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                           data-toggle="tooltip"
                                           data-placement="top" data-original-title="حاوی اشتباه">
                                            <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                        </a>
                                    @else
                                        <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                           data-toggle="tooltip"
                                           data-placement="top" data-original-title="صحیح">
                                            <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="align-middle text-nowrap text-center">
                                    @if (is_null($rec->orderID))
                                        <a style="cursor: pointer" onclick="confirmDelete({{$rec->pDetailID}})"
                                           class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                           data-toggle="tooltip"
                                           data-placement="top" data-original-title="حذف محصول">
                                            <i class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></i>
                                        </a>
                                    @else
                                        <span class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                              data-toggle="tooltip"
                                              data-placement="top" data-original-title="فروخته شد">
                                            <i class="fa fa-lock g-font-size-22 g-color-gray-dark-v3"></i>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {{-- End Table --}}
        </div>

        {{-- Pagination --}}
        {{ $data->links('General.Pagination', ['result' => $data]) }}

        {{-- Table Hint --}}
        <div style="direction: rtl">
            <div>
                <div class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-7">
                    <div class="g-pos-rel g-mr-5">
                        <span class="g-font-size-20 fa fa-eye g-color-gray-dark-v3"></span>
                    </div>

                    <div class="align-self-center g-px-10">
                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                            <span class="g-mr-5">مشاهده جزئیات</span>
                        </h5>
                        <p class="m-0">با استفاده از نماد چشم می توانید جزئیات مشخصات محصولتان را مشاهده کنید.</p>
                        <p class="m-0">در صفحه مشاهده جزئیات محصول در صورتی که در ورود مشخصات محصول اشتباهی رخ داده بود
                            می توانید در همان جا گزارش اشتباه بودن مشخصات را اعلام کنید.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-7">
                    <div class="g-pos-rel g-mr-5">
                        <span class="fa fa-exclamation-triangle g-font-size-20 g-color-lightred"></span>
                    </div>

                    <div class="align-self-center g-px-10">
                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                            <span class="g-mr-5">مشخصات حاوی اشتباه</span>
                        </h5>
                        <p class="m-0">نماد اخطار بیانگر این است که شما
                            این محصول را به عنوان محصول حاوی مشخصات اشتباه به ما گزارش داده اید.</p>
                        <p class="m-0">گزارش مشخصات اشتباه برای محصول از پرداخت خسارات بیشتر به مشتریان جلوگیری می
                            کند.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-7">
                    <div class="g-pos-rel g-mr-5">
                        <span class="fa fa-check g-font-size-18 g-color-primary"></span>
                    </div>

                    <div class="align-self-center g-px-10">
                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                            <span class="g-mr-5">مشخصات صحیح</span>
                        </h5>
                        <p class="m-0">این نماد مشخص می کند که مشخصات وارده از سوی شما صحیح است و گزارشی مبنی بر اشتباه
                            بودن مشخصات ثبت نشده است.</p>
                        <p class="m-0">مشخصات صحیح می تواند به فروش بهتر محصولات شما کمک کند.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-7">
                    <div class="g-pos-rel g-mr-5">
                        <span
                            class="fa fa-lock g-font-size-22 g-color-gray-dark-v3"></span>
                    </div>

                    <div class="align-self-center g-px-10">
                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                            <span class="g-mr-5">فروخته شد</span>
                        </h5>
                        <p class="m-0">نماد فروش بیانگر این است که محصول شما به فروش رفته است.</p>
                        {{--                        <p class="m-0">با کلیک بر روی این نماد می توانید فاکتور فروش محصول را مشاهد فرمایید.</p>--}}
                        <p class="m-0">هر گاه محصولی به فروش برسد آن محصول را نمی توانید از لیست انبارتان حذف کنید.</p>
                        <p class="m-0">در صورتی که محصولی به فروش رفته بود و شما پس از فروش متوجه شدید مشخصات محصول
                            اشتباه است بلافاصله محصول حاوی مشخصات اشتباه را گزارش کنید. تا پیگیری های لازم برای مشتری
                            انجام
                            شود.</p>
                        <p class="m-0">لازم به ذکر است خسارات وارده به دلیل درج مشخصات اشتباه به عهده فروشنده می
                            باشد.</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-7">
                    <div class="g-pos-rel g-mr-5">
                        <span class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></span>
                    </div>

                    <div class="align-self-center g-px-10">
                        <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                            <span class="g-mr-5">حذف محصول</span>
                        </h5>
                        <p class="m-0">توسط نماد سطل زباله می توانید محصولتان را از انبار حذف کنید.</p>
                        <p class="m-0">هر گاه محصولی به فروش برسد آن محصول دیگر قابل حذف نیست.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

