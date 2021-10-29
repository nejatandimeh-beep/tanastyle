@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i> مبالغ دریافتی
        </h3>
    </div>
    <!-- End Info Panel -->

    <div class="container">
        {{-- Total Info--}}
        <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">درآمد من از تانا استایل</h3>
                <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($totalSaleAmount) }}</span>تومان </span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">کل دریافتی های من</h3>
                <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($totalReceivedAmount) }}</span>تومان </span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">زمان آخرین دریافت وجه</h3>
                @if ($lastPaymentDate === 0)
                    <span class="u-label g-bg-bluegray g-mb-5">
                        <span class="g-mr-5 g-ml-5 g-color-aqua">--</span>
                        تاریخ
                        <span class="g-mr-5 g-ml-5 g-color-aqua">--</span>
                        ساعت
                    </span>
                @else
                    <span class="u-label g-bg-bluegray g-mb-5">تاریخ<span
                            class="g-mr-5 g-ml-5 g-color-aqua">{{ $lastPaymentDate[0].'/'.$lastPaymentDate[1].'/'.$lastPaymentDate[2] }}</span>ساعت <span
                            class="g-mr-5 g-ml-5 g-color-aqua">{{ $lastPaymentTime }}</span></span>
                @endif
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">طلب من از تانا استایل</h3>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($credit) }}</span>تومان </span>
            </div>
            <!-- End Icon Blocks -->
        </div>

        {{--        Focus Div When Page Load by Filters--}}
        <div id="{{ ((isset($valCode))
             || (isset($filterDate))
             || (isset($valPrice))) ? 'focusAfterPageLoad' : '' }}"></div>

        {{-- Filters --}}
        <div id="accordion-12" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
            <!-- Card -->
            <div class="card g-brd-none rounded-0 g-mb-15">
                <div id="accordion-12-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                    <h5 class="mb-0">
                        <a style="background-color: #f7f7f9"
                           class="d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-0 g-pa-10-15 g-font-size-16  collapsed"
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
                                    {{--                Date Calender Filter For Big Device--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                        <div class="input-group g-brd-primary--focus g-mb-0">

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-color-gray-light-v1"
                                                id="startYearBD"
                                                tabindex="5">
                                                <option
                                                    value="{{ (!isset($a)) ? '1398' : $a->y }}">{{ (!isset($a)) ? 'سال' : $a->y }}</option>
                                                <option value="1399">1399</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="startMonBD"
                                                tabindex="4">
                                                <option
                                                    value="{{ (!isset($a)) ? '0' : $a->m }}">{{ (!isset($a)) ? 'ماه' : $a->m }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="startDayBD"
                                                tabindex="3">
                                                <option
                                                    value="{{ (!isset($a)) ? '0' : $a->d }}">{{ (!isset($a)) ? 'روز' : $a->d }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>

                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                از
                                            </div>
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                محدوده تاریخ واریز
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group g-mb-20 text-right col-lg-6 mx-auto bigDevice">
                                        <div class="input-group g-brd-primary--focus">
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0"
                                                    id="filterDateBtnBD"
                                                    disabled
                                                    onclick="applyDateFilter('amountReceived', 'startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD')">
                                                اعمال
                                            </button>
                                            <button type="button"
                                                    class="btn btn-md u-btn-orange rounded-0"
                                                    id="ResetDateBtnBD"
                                                    disabled
                                                    onclick="resetDate('startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD', 'ResetDateBtnBD')">
                                                از نو
                                            </button>
                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="endYearBD"
                                                tabindex="8">
                                                <option
                                                    value="{{ (!isset($b)) ? '1398' : $b->y }}">{{ (!isset($b)) ? 'سال' : $b->y }}</option>
                                                <option value="1399">1399</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="endMonBD"
                                                tabindex="7">
                                                <option
                                                    value="{{ (!isset($b)) ? '13' : $b->m }}">{{ (!isset($b)) ? 'ماه' : $b->m }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="endDayBD"
                                                tabindex="6">
                                                <option
                                                    value="{{ (!isset($b)) ? '32' : $b->d }}">{{ (!isset($b)) ? 'روز' : $b->d }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>

                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                تا
                                            </div>
                                        </div>
                                    </div>
                                    {{--                Date Filter For Small Device--}}
                                    <div class="form-group g-mb-20 text-right col-lg-12 mx-auto smallDevice">
                                        <div
                                            class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5">
                                            <label style="direction: rtl"
                                                   class="g-color-gray-light-v1 align-self-center">محدوده تاریخ
                                                واریز</label>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-color-gray-light-v1"
                                                id="startYearSD"
                                                tabindex="5">
                                                <option
                                                    value="{{ (!isset($a)) ? '1398' : $a->y }}">{{ (!isset($a)) ? 'سال' : $a->y }}</option>
                                                <option value="1399">1399</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="startMonSD"
                                                tabindex="4">
                                                <option
                                                    value="{{ (!isset($a)) ? '0' : $a->m }}">{{ (!isset($a)) ? 'ماه' : $a->m }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="startDaySD"
                                                tabindex="3">
                                                <option
                                                    value="{{ (!isset($a)) ? '0' : $a->d }}">{{ (!isset($a)) ? 'روز' : $a->d }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>

                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                از
                                            </div>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-color-gray-light-v1"
                                                id="endYearSD"
                                                tabindex="8">
                                                <option
                                                    value="{{ (!isset($b)) ? '1398' : $b->y }}">{{ (!isset($b)) ? 'سال' : $b->y }}</option>
                                                <option value="1399">1399</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="endMonSD"
                                                tabindex="7">
                                                <option
                                                    value="{{ (!isset($b)) ? '13' : $b->m }}">{{ (!isset($b)) ? 'ماه' : $b->m }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>

                                            <select
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-color-gray-light-v1"
                                                id="endDaySD"
                                                tabindex="6">
                                                <option
                                                    value="{{ (!isset($b)) ? '32' : $b->d }}">{{ (!isset($b)) ? 'روز' : $b->d }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>

                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                تا
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0 w-50"
                                                    id="filterDateBtnSD"
                                                    disabled
                                                    onclick="applyDateFilter('amountReceived', 'startDaySD', 'startMonSD', 'startYearSD', 'endDaySD', 'endMonSD', 'endYearSD')">
                                                اعمال
                                            </button>
                                            <button type="button"
                                                    class="btn btn-md u-btn-orange rounded-0 w-50"
                                                    id="ResetDateBtnSD"
                                                    disabled
                                                    onclick="resetDate('startDaySD', 'startMonSD', 'startYearSD', 'endDaySD', 'endMonSD', 'endYearSD', 'ResetDateBtnSD')">
                                                از نو
                                            </button>
                                        </div>
                                    </div>

                                    {{--                    Transaction Code Filter--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                        <div class="input-group g-brd-primary--focus g-mb-10">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md rounded-0 text-left g-font-size-16"
                                                   type="text"
                                                   id="amountCode_search"
                                                   placeholder="{{ (!isset($valCode)) ? 'همه' : $valCode }}"
                                                   value="">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0 w-50">
                                                براساس کد تراکنش
                                            </div>
                                        </div>
                                        <ul id="amountCode" class="ajaxDropDown"></ul>
                                    </div>

                                    {{--                Price Filter For Big Device--}}
                                    <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                        <div class="input-group g-brd-primary--focus g-mb-0">
                                            <button type="button"
                                                    class="btn btn-md u-btn-primary rounded-0"
                                                    id="filterPriceBtnBD"
                                                    disabled
                                                    onclick="applyPriceFilter('amount')">
                                                اعمال
                                            </button>
                                            {{--             Hide Tempority Input--}}
                                            <input class="d-none" type="number" id="MaxPriceTemp">
                                            <input class="d-none" type="number" id="MinPriceTemp">

                                            <input
                                                class="form-control form-control-md rounded-0 text-center g-font-size-16 g-color-gray-light-v1"
                                                type="text"
                                                id="amountMaxPriceBD"
                                                tabindex="9"
                                                placeholder="{{ (!isset($valMax)) ? 'بیش ترین' : $valMax }}"
                                                onfocus="selectText('saleMaxPriceBD')"
                                                oninput="filterPriceCheck('amountMinPriceBD', 'amountMaxPriceBD', 'filterPriceBtnBD')"
                                                value="{{ (!isset($valMax)) ? '' : number_format($valMax) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                تا
                                            </div>
                                            <input
                                                class="form-control form-control-md rounded-0 text-center g-font-size-16 g-color-gray-light-v1"
                                                type="text"
                                                id="amountMinPriceBD"
                                                tabindex="10"
                                                placeholder="{{ (!isset($valMin)) ? 'کم ترین' : $valMin }}"
                                                onfocus="selectText('saleMinPriceBD')"
                                                oninput="filterPriceCheck('amountMinPriceBD', 'amountMaxPriceBD', 'filterPriceBtnBD')"
                                                value="{{ (!isset($valMin)) ? '' : number_format($valMin) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                از
                                            </div>
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                مبلغ واریز
                                            </div>
                                        </div>
                                        <ul id="product_list" class="ajaxDropDown"></ul>
                                    </div>
                                    {{--                Price Filter For Small Device--}}
                                    <div class="form-group g-mb-20 text-right col-lg-12 mx-auto smallDevice">
                                        <div
                                            class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5">
                                            <label style="direction: rtl"
                                                   class="g-color-gray-light-v1 align-self-center">مبلغ واریز
                                                تومان</label>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md rounded-0 text-left g-font-size-16 g-color-gray-light-v1"
                                                   type="text"
                                                   id="amountMinPriceSD"
                                                   placeholder="{{ (!isset($valMin)) ? 'کم ترین' : $valMin }}"
                                                   onfocus="selectText('saleMinPriceSD')"
                                                   oninput="filterPriceCheck('saleMinPriceSD', 'saleMaxPriceSD', 'filterPriceBtnSD')"
                                                   value="{{ (!isset($valMin)) ? '' : number_format($valMin) }}">
                                            <div
                                                class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                از
                                            </div>
                                        </div>
                                        <div class="input-group g-brd-primary--focus g-mb-5">
                                            <input style="direction: rtl"
                                                   class="form-control form-control-md rounded-0 text-left g-font-size-16 g-color-gray-light-v1"
                                                   type="text"
                                                   id="amountMaxPriceSD"
                                                   placeholder="{{ (!isset($valMax)) ? 'بیش ترین' : $valMax }}"
                                                   onfocus="selectText('saleMaxPriceSD')"
                                                   oninput="filterPriceCheck('amountMinPriceSD', 'amountMaxPriceSD', 'filterPriceBtnSD')"
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
                                                    onclick="applyPriceFilter('amount')">
                                                اعمال
                                            </button>
                                        </div>
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
            <h3 style="direction: rtl"
                class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                لیست مبالغ دریافتی
            </h3>
            @if ($data->count()!==0)
                <h6 style="direction: rtl"
                    class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                    <i class="fa fa-hand-o-right g-font-size-18"></i>
                    <span class="g-font-size-13">جدول را به سمت راست بکشید.
                </span>
                </h6>
            @endif
            <div
                style="{{ ((!isset($valCode))  && (!isset($filterDate)) && (!isset($valPrice))) ? ' display : none' : '' }}"
                class="m-0 p-0">
                <h6 style="direction: rtl"
                    class="card-header g-bg-green-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right">
                    <a style="cursor: pointer; color: #555; text-decoration: none;"
                       href="{{ route('amountReceived') }}"
                       class="fa fa-close g-font-size-18 g-pl-3 g-color-red--hover"></a>
                    <span class="g-font-size-13 g-mr-5">فیلتر <span
                            class="g-bg-primary g-color-white g-pr-3 g-pl-3">
                            {{ (isset($filterDate)) ? $filterDate : '' }}
                            {{ (isset($valCode)) ? $valCode : '' }}
                            {{ (isset($valPrice)) ? $valPrice : '' }}</span>
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
                            <th class="align-middle text-center text-nowrap focused rtlPosition">تاریخ واریز</th>
                            <th class="align-middle text-center text-nowrap">ساعت واریز</th>
                            <th class="align-middle text-center text-nowrap">مبلغ واریز<span
                                    class="g-font-size-10 g-mr-3">(تومان)</span>
                            </th>
                            <th class="align-middle text-center text-nowrap">شماره کارت</th>
                            <th class="align-middle text-center text-nowrap">کد تراکنش</th>
                            <th class="align-middle text-center">توضیحات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key => $rec)
                            <tr>
                                @if ($lastPaymentDate === 0)
                                    <td class="align-middle text-nowrap text-center">--</td>

                                @else
                                    <td class="align-middle text-nowrap text-center">{{ $persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2] }}</td>
                                @endif
                                <td class="align-middle text-center text-nowrap">{{ $rec->Time }}</td>
                                <td class="align-middle text-center text-nowrap">{{ number_format($rec->Amount) }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->CardNumber }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->TransactionCode }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->Detail }}</td>
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
    </div>
@endsection

