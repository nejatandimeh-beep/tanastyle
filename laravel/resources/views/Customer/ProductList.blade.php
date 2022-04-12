@extends('Layouts.IndexCustomer')
@section('Content')
    <div class="container-fluid g-brd-top g-brd-gray-light-v4 productDetail">
        <div style="direction: rtl" class="row">

            <!-- Filters -->
            <div style="display: none" id="filterDiv" class="col-md-3 flex-md-first g-brd-left--lg g-brd-gray-light-v4">
                <div id="stickyDiv1" class="sticky-top g-z-index-1">
                    <div>
                        <div class="g-pr-15--lg d-flex justify-content-between g-pb-10 g-pt-10">
                            <h5 class="m-0 g-mr-10 g-mr-0--lg align-self-center g-color-gray-dark-v1">فیلتر ها</h5>
                            <button
                                style="color:rgba(0,0,0,0.4);
                                line-height: 0.65;
                                background-color: transparent;
                                cursor: pointer;
                                border: none !important;
                                outline:none !important;"
                                onclick="closeSideBar()"
                                class="font-smooth g-pt-5 g-font-size-35 g-color-gray-dark-v1 g-ml-minus-25 g-ml-0--lg"
                                type="button">&times;
                            </button>
                        </div>
                        <hr style="z-index: 100 !important"
                            class="responsiveBorder g-mx-minus-15 g-mt-0 g-mb-0 sticky-top">
                    </div>

                    <h6 id="filters-on-label" class="d-none g-mt-30 g-pb-10 g-mx-15 g-mb-10 g-brd-bottom g-color-gray-dark-v1">فیلترهای اعمال شده</h6>
                    <div id="filters-on" class="d-none p-0 my-0 g-mx-10">
                        <div id="filters-on-gender" class="d-inline-block p-0 m-0"></div>
                        <div id="filters-on-cat" class="d-inline-block p-0 m-0"></div>
                        <div id="filters-on-size" class="d-inline-block p-0 m-0"></div>
                        <div id="filters-on-price" class="d-inline-block p-0 m-0">
                            <span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">قیمت: همه</span>
                        </div>
                        <div id="filters-on-color" class="d-inline-block p-0 m-0"></div>
                    </div>

                    <div class="g-pr-15 g-pl-15 g-pl-0--lg g-pt-20">
                        <div style="direction: rtl" id="filterContainer" role="tablist" aria-multiselectable="true">
                            <!-- فیلتر جمسیت -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-black g-color-primary--hover"
                                           href="#accordion-100-body-01"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-01">جنسیت
                                            <i class="icon-user float-left g-font-size-18 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-01"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-01">
                                    <div class="card-block g-px-0">
                                        <ul class="list-unstyled p-0">
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="gender-all"
                                                                   onclick="allSwitchBtn($(this).attr('id'))"
                                                                   onchange="checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                            type="checkbox" {{ ($gender === 'all') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>زنانه </span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-0"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '0' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>مردانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-1"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '1' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>دخترانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-2"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '2' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>پسرانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-3"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '3' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>نوزادی دخترانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-4"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '4' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>نوزادی پسرانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="g-5"
                                                                   onchange="$('#gender-all').prop('checked',false); checkAllIsOff('#filters-on-gender',$(this).attr('name'))"
                                                                   type="checkbox" {{ ($gender === '5' || ($gender === 'all')) ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر طبقه بندی -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-02" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-black g-color-primary--hover"
                                           href="#accordion-100-body-02"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-02">طبقه بندی
                                            <i class="fa fa-clone float-left g-font-size-18 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-02"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-02">
                                    <div class="card-block g-px-0">
                                        <ul class="list-unstyled p-0">
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="cat-all"
                                                                   onclick="allSwitchBtn($(this).attr('id'))"
                                                                   {{ ($catCode === 'all') ? 'checked' : ''}}
                                                                   onchange="checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس زیر</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="a"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'a' || $catCode === 'clothes') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس پایین تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="b"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'b' || $catCode === 'clothes') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس بالا تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="c"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'c' || $catCode === 'clothes') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس تمام تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="d"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'd' || $catCode === 'clothes')? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>کیف</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="e"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'e') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>کفش</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="f"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'f') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس زیر ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="g"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'g' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس پایین تنه ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="h"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'h' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس بالا تنه ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="i"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'i' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>لباس تمام تنه ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="j"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'j' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>کیف ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="k"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'k' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>کفش ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="l"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'l' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>اکسسوری ورزشی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="m"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'm' || $catCode === 'sports') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>بدلیجات</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="n"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'n' || $catCode === 'rhinestone') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>اکسسوری مو</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="o"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'o' || $catCode === 'rhinestone') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>سرپوش</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="p"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'p' || $catCode === 'rhinestone') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>سایر</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="q"
                                                                   onchange="$('#cat-all').prop('checked',false); checkAllIsOff('#filters-on-cat',$(this).attr('name'))"
                                                                   {{ ($catCode === 'all' || $catCode === 'q' || $catCode === 'rhinestone') ? 'checked' : ''}}
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر سایز -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-05" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-black g-color-primary--hover"
                                           href="#accordion-100-body-05"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-05">سایز
                                            <i class="fa fa-sort-amount-asc float-left g-font-size-18 g-pb-5 g-pl-5 g-color-gray-dark-v2"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-05"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-05">
                                    <div class="card-block g-px-0">
                                        <ul class="list-unstyled p-0">
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="size-all"
                                                                   onclick="allSwitchBtn($(this).attr('id'))"
                                                                   onchange="checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>XS</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="XS"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>S</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="S"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>M</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="M"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>L</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="L"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>xL</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="XL"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>xxL</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="XXL"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>xxxL</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="XXXL"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>Free</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="size"
                                                                   id="Free"
                                                                   onchange="$('#size-all').prop('checked',false); checkAllIsOff('#filters-on-size',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر قیمت -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-03" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-black g-color-primary--hover"
                                           href="#accordion-100-body-03"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-03">قیمت
                                            <i class="fa fa-money float-left g-font-size-18 g-pb-5 g-pl-5 g-color-gray-dark-v2"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-03"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-03">
                                    <div class="card-block g-px-0">
                                        <ul class="list-unstyled p-0 g-mb-30">
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="priceAll"
                                                                   id="price-all"
                                                                   onchange="priceAll()"
                                                                   checked=""
                                                                   disabled
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-between g-mt-10">
                                            <div style="direction: ltr" class="m-0 col-6">
                                                <div class="form-group">
                                                    <div class="u-input-group-v2">
                                                        <input id="price-min"
                                                               class="form-control rounded-0 u-form-control g-font-size-16 g-brd-gray-light-v4 g-brd-primary--focus"
                                                               oninput="minPriceAllOff($(this));"
                                                               pattern="\d*"
                                                               name="price-min"
                                                               type="text">
                                                        <label id="lblPrice-min" style="left: 24% !important; cursor: text"
                                                               for="price-min">از ده هزار</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="direction: ltr" class="m-0 col-6">
                                                <div class="form-group">
                                                    <div class="u-input-group-v2">
                                                        <input id="price-max"
                                                               class="form-control rounded-0 u-form-control g-font-size-16 g-brd-gray-light-v4 g-brd-primary--focus"
                                                               name="price-max"
                                                               pattern="\d*"
                                                               oninput="maxPriceAllOff($(this))"
                                                               type="text">
                                                        <label id="lblPrice-max" style="left: 17% !important; cursor: text"
                                                               for="price-max">تا صد میلیون</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-left g-px-15">
                                        <button id="priceFilterSubmit"
                                                class="btn u-btn-primary g-rounded-50 g-mr-10 g-mb-15" disabled>
                                            اعمال
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر رنگ -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-04" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-black g-color-primary--hover"
                                           href="#accordion-100-body-04"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-04">رنگ
                                            <i class="fa fa-paint-brush float-left g-font-size-18 g-pb-5 g-pl-5 g-color-gray-dark-v2"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-04"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-04">
                                    <div class="card-block g-pa-5">
                                        <ul class="list-unstyled p-0 g-pt-15">
                                            <li class="g-mt-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="color-all"
                                                                   onclick="allSwitchBtn($(this).attr('id'))"
                                                                   onchange="checkAllIsOff('#filters-on-color',$(this).attr('name'))"
                                                                   type="checkbox"
                                                                   checked="checked">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/allColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای سفید</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-0"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-0').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/whiteColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای قرمز</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-1"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-1').prop('checked',true);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/redColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای صورتی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-2"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-2').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/pinkColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای نارنجی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-3"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-3').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/orangeColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای زرد</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-4"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-4').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/yellowColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای سبز</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-5"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-5').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/greenColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای آبی</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-6"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-6').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/blueColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای بنفش</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-7"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-7').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/magentaColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای قهوه ای</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-8"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-8').prop('checked',true);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-10').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/brownColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای سیاه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-9"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-9').prop('checked',true);
                                                                   $('#c-10').prop('checked',false);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/blackColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-20">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>رنگهای مالتی کالر</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="c-10"
                                                                   type="checkbox"
                                                                   checked="checked"
                                                                   onchange="$('#color-all').prop('checked',false);
                                                                   $('#c-10').prop('checked',true);
                                                                   $('#c-9').prop('checked',false);
                                                                   $('#c-1').prop('checked',false);
                                                                   $('#c-2').prop('checked',false);
                                                                   $('#c-3').prop('checked',false);
                                                                   $('#c-4').prop('checked',false);
                                                                   $('#c-5').prop('checked',false);
                                                                   $('#c-6').prop('checked',false);
                                                                   $('#c-7').prop('checked',false);
                                                                   $('#c-8').prop('checked',false);
                                                                   $('#c-0').prop('checked',false);
                                                                   checkAllIsOff('#filters-on-color',$(this).attr('name'))">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" style="color: #72c02c !important" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div>
                                                    <img style="border-radius: 5px"
                                                         class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/multiColor.jpg') }}"
                                                         alt="رنگبندی پوشاک تاناکورا">
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="contentDiv" class="col-md-12 flex-md-unordered">
                <div>
                    <!-- Filters -->
                    <div id="stickyDiv2" style="z-index: 100 !important;"
                         class="sticky-top g-bg-white-opacity-0_9 g-mb-15">
                        <div class="d-flex g-py-10">
                            <h1 style="display: none" id="productTitle" class="h5 align-self-center g-color-gray-dark-v2 m-0 col-6 pr-0 bigDevice">{{$title}}</h1>
                            <div id="filterContent" class="d-flex col-10 justify-content-between g-px-0">
                                <div style="display: block" id="smallFilterDiv"
                                     class="sideBarButton g-ml-10">
                                    <li class="list-inline-item">
                                        <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-black--hover">
                                            <i class="icon-options g-color-gray-dark-v1"></i>
                                        </a>
                                    </li>
                                </div>
                                <div style="visibility: hidden" class="g-pt-5 text-center g-mr-12 g-mr-50--lg">
                                    <h2 class="h6 align-middle d-inline-block g-font-weight-400 g-pos-rel g-top-1 mb-0 bigDevice">
                                        مرتب سازی</h2>

                                    <!-- Secondary Button -->
                                    <div class="d-inline-block btn-group">
                                        <button id="showSortBtn" type="button"
                                                class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent g-font-weight-300 g-font-size-12 g-pa-0 g-pr-10 g-ma-0 g-pt-5"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            همه
                                        </button>
                                        <button style="display: none" id="closeSortBtn" type="button"
                                                class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent g-font-weight-300 g-font-size-12 g-pa-0 g-pr-10 g-ma-0 g-pt-5"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-left rounded-0 text-right">
                                            <a class="dropdown-item g-color-black g-font-weight-300"
                                               href="#">همه</a>
                                            <a class="dropdown-item g-color-black g-font-weight-300" href="#">پرفروش
                                                ترین ها</a>
                                            <a class="dropdown-item g-color-black g-font-weight-300" href="#">محبوب
                                                ترین ها</a>
                                            <a class="dropdown-item g-color-black g-font-weight-300" href="#">قیمت
                                                صعودی</a>
                                            <a class="dropdown-item g-color-black g-font-weight-300" href="#">قیمت
                                                نزولی</a>
                                        </div>
                                    </div>
                                    <!-- End Secondary Button -->
                                </div>
                            </div>
                        </div>
                        <!-- End Filters -->
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                    </div>

                    <!-- ajax loader-->
                    <div id="loadProduct" class="d-none loadProduct"></div>
                    <!-- Products -->
                    <div id="productContainer" class="row g-mb-50">
                        <h1 style="display: none" class="d-lg-none d-block h5 g-pa-10 g-mr-10 g-mt-10">{{$title}}</h1>

                        @foreach($data as $key => $row)
                            <div id="productDiv" class="col-12 col-lg-3 g-mb-30">
                                <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                                        class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
                                    <div>
                                        <div id="carousel-08-1"
                                             class="js-carousel text-center g-mb-5"
                                             data-infinite="1"
                                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-mt-15 text-center"
                                             data-nav-for="#carousel-08-2">
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $row->PicPath }}sample1.jpg"
                                                         alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                </a>
                                            </div>
                                            @if (file_exists(public_path($row->PicPath.'pic2.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample2.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic3.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample3.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic4.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample4.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic5.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample5.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic6.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample6.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic7.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample7.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic8.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample8.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic9.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample9.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic10.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample10.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic11.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample11.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif

                                            @if (file_exists(public_path($row->PicPath.'pic12.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample12.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif


                                            @if (file_exists(public_path($row->PicPath.'pic13.jpg')))
                                                <div class="js-slide">
                                                    <a href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}">
                                                        <img class="img-fluid w-100"
                                                             src="{{ $row->PicPath }}sample13.jpg"
                                                             alt="{{ $row->Name.' '.$row->Model.' '.$row->Gender.' '.$row->Brand }}">
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- مشخصات محصول -->
                                    <h4 class="h6 g-color-black text-left g-brd-top g-brd-gray-light-v4 g-ml-5 g-mt-5 g-pt-5">
                                        {{$row->Brand}}
                                    </h4>

                                    <div style="direction: rtl"
                                         class="media">
                                        <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                                        <div class="d-flex justify-content-between col-12 p-0">
                                            <div class="d-flex flex-column">
                                                <h1 class="h6 g-color-black my-1">
                                                    <span class="u-link-v5 g-color-black"
                                                          tabindex="0">
                                                        {{ $row->Name }}
                                                        <span
                                                            class="g-font-size-12 g-font-weight-300">{{ $row->Model }}</span>
                                                    </span>
                                                </h1>
                                                <ul style="padding: 0"
                                                    class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-mb-5">
                                                    <li>
                                                        <a class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600">{{ $row->HintCat.' '.$row->Gender }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a style="cursor: pointer"
                                               class="u-icon-v1 g-mt-minus-5 g-color-black g-color-primary--hover rounded-circle"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               href="{{ route('productDetail',[$row->ID,$size[$key]->Size]) }}"
                                               data-original-title="جزئیات محصول">
                                                <i class="icon-eye g-line-height-0_7"></i>
                                            </a>
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
                                                class="d-block g-color-gray-dark-v5 g-font-size-10">تومان</span>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        @endforeach
                    </div>

                    <div style="display: none" id="noProduct">
                        <div class="noProduct g-mt-100--lg mx-auto"></div>
                        <p class="text-center">عدم موجودی</p>
                    </div>
                    <!-- End Products -->

                    {{-- Pagination --}}
                    <div style="direction: ltr">
                        {{ $data->links('General.Pagination', ['result' => $data]) }}
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
@endsection
