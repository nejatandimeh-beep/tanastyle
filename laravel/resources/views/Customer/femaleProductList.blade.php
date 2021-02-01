@extends('Layouts.IndexCustomer')
@section('Content')
    <section class="breadCrumbs g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-15 g-mb-0">
        <div style="direction: rtl" class="container">
            <div class="d-sm-flex text-right text-lg-center">
                <div class="align-self-center bigDevice">
                    <h2 class="h6 g-font-weight-300 w-100 g-color-black-opacity-0_3 g-mb-10 g-mb-0--md">مسیر</h2>
                </div>

                <div class="align-self-center g-mr-30--lg">
                    <ul class="u-list-inline p-0 g-font-size-12">
                        <li class="list-inline-item g-ml-5 g-my-5">
                            <a class="u-link-v5 g-color-main" href="#">صفحه نخست</a>
                            <i class="fa fa-angle-left g-mr-7"></i>
                        </li>
                        <li class="list-inline-item g-ml-5 g-my-5">
                            <a class="u-link-v5 g-color-main" href="#">پوشاک زنانه</a>
                            <i class="fa fa-angle-left g-mr-7"></i>
                        </li>
                        <li class="list-inline-item g-ml-5 g-my-5">
                            <a class="u-link-v5 g-color-main" href="#">لباس</a>
                            <i class="fa fa-angle-left g-mr-7"></i>
                        </li>
                        <li class="list-inline-item g-ml-5 g-my-5">
                            <a class="u-link-v5 g-color-main" href="#">لباس زیر</a>
                            <i class="fa fa-angle-left g-mr-7"></i>
                        </li>
                        <li class="list-inline-item g-color-primary g-my-5">
                            <span>شرت</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div style="direction: rtl" class="row">

            <!-- Filters -->
            <div style="display: none" id="filterDiv" class="col-md-3 flex-md-first g-brd-left--lg g-brd-gray-light-v4">
                <div id="stickyDiv1" class="sticky-top g-z-index-1">
                    <div class="">
                        <div class="g-pr-15--lg d-flex justify-content-between g-pb-10 g-pt-10">
                            <h5 class="m-0 align-self-center">فیلتر ها</h5>
                            <button
                                style="color:rgba(0,0,0,0.4);
                                line-height: 0.65;
                                background-color: transparent;
                                cursor: pointer;
                                border: none !important;
                                outline:none !important;"
                                onclick="closeSideBar()"
                                class="font-smooth g-ml-minus-15 g-ml-0--lg g-pt-5 g-font-size-35"
                                type="button">&times;
                            </button>
                        </div>
                        <hr style="z-index: 100 !important"
                            class="responsiveBorder g-mx-minus-15 g-mt-0 g-mb-0 sticky-top">
                    </div>

                    <div class="g-pr-15 g-pl-15 g-pl-0--lg g-pt-20">
                        <div style="direction: rtl" id="filterContainer" role="tablist" aria-multiselectable="true">
                            <!-- فیلتر جمسیت -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-01"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-01">جنسیت
                                            <i class="icon-user float-left g-font-size-16 g-pb-5 g-pl-5"></i>
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
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>زنانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="female"
                                                                   onchange="$('#gender-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType === 'gender-0' || $filterType === '0000') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="male"
                                                                   onchange="$('#gender-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType === 'gender-1') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>بچگانه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="gender"
                                                                   id="kids"
                                                                   onchange="$('#gender-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType === 'gender-2') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-02"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-02">طبقه بندی
                                            <i class="icon-clothes-034 u-line-icon-pro float-left g-font-size-18 g-pb-5 g-pl-5"></i>
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
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="cat-under"
                                                                   onchange="$('#cat-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType[3] === '0') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>پایین تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="cat-bottom"
                                                                   onchange="$('#cat-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType[3] === '1') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>بالا تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="cat-up"
                                                                   onchange="$('#cat-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType[3] === '2') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="my-2">
                                                <div class="form-group">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>تمام تنه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="category"
                                                                   id="cat-complete"
                                                                   onchange="$('#cat-all').prop('checked',false)"
                                                                   type="checkbox" {{ ($filterType[3] === '3') ? 'checked=""' : '' }}>
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-05"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-05">سایز
                                            <i class="icon-education-068 u-line-icon-pro float-left g-font-size-18 g-pb-5 g-pl-5"></i>
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
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-xs"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-s"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-m"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-l"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-xl"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-xxl"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                                                   id="size-xxxl"
                                                                   onchange="$('#size-all').prop('checked',false)"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
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
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-03"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-03">قیمت
                                            <i class="icon-finance-008 u-line-icon-pro float-left g-font-size-18 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-03"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-03">
                                    <div class="card-block g-px-0">
                                        <div class="d-flex justify-content-between g-mt-10">
                                            <div style="direction: ltr" class="form-group m-0 col-6">
                                                <div class="u-input-group-v2">
                                                    <input id="price-min"
                                                           class="form-control rounded-0 u-form-control g-brd-gray-light-v4 g-brd-primary--focus"
                                                           value="0"
                                                           name="price-min"
                                                           type="text">
                                                    <label style="left: 75% !important;" for="fullName2">از</label>
                                                </div>
                                            </div>
                                            <div style="direction: ltr" class="form-group m-0 col-6">
                                                <div class="u-input-group-v2">
                                                    <input id="price-max"
                                                           class="form-control rounded-0 u-form-control g-brd-gray-light-v4 g-brd-primary--focus"
                                                           name="price-max"
                                                           value="0"
                                                           type="text">
                                                    <label style="left: 75% !important;" for="fullName2">تا</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر رنگ -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-04" class="card-header g-pa-0" role="tab">
                                    <h5 class="g-font-size-15 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-04"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-04">رنگ
                                            <i class="icon-education-004 u-line-icon-pro float-left g-font-size-18 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-04"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-04">
                                    <div class="card-block g-pa-5">
                                        <ul class="list-unstyled p-0 g-pt-15">
                                            <li class="g-mt-2 g-mb-15">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>همه</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="color-all"
                                                                   onclick="allSwitchBtn($(this).attr('id'))"
                                                                   type="checkbox">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="g-brd-around g-brd-gray-light-v4">
                                                    <img class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/whiteColor.png') }}"
                                                         alt="Image Description">
                                                </div>
                                            </li>
                                            <li class="g-my-2 g-mb-15">
                                                <div class="form-group m-0">
                                                    <label class="d-flex align-items-center justify-content-between">
                                                        <span>خانواده رنگهای روشن</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="color"
                                                                   id="color-whites"
                                                                   type="checkbox"
                                                                   onchange="$('#color-all').prop('checked',false)">
                                                            <div class="u-check-icon-radio-v8">
                                                                <i class="fa" data-check-icon=""></i>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="g-brd-around g-brd-gray-light-v4">
                                                    <img class="img-fluid w-100 g-opacity-0_7"
                                                         src="{{ asset('img/Other/whiteColor.png') }}"
                                                         alt="Image Description">
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
                    <div id="stickyDiv2" style="z-index: 100 !important"
                         class="sticky-top g-bg-white-opacity-0_9 g-mb-15">
                        <div class="d-flex g-pt-10 g-pb-10">
                            <div id="filterContent" class="d-flex col-12 justify-content-between">
                                <div style="display: block" id="smallFilterDiv"
                                     class="sideBarButton">
                                    <li class="list-inline-item">
                                        <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover">
                                            <i style="color: #aaaaaa;" class="icon-options"></i>
                                        </a>
                                    </li>
                                </div>

                                <div class="g-pt-5 text-center g-mr-12 g-mr-50--lg">
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
                                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                               href="#">همه</a>
                                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">پرفروش
                                                ترین ها</a>
                                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">محبوب
                                                ترین ها</a>
                                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">قیمت
                                                صعودی</a>
                                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">قیمت
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
                    <!-- Products -->
                    <div id="productContainer" class="row g-mb-50">
                        @foreach($product_table as $key => $data)
                            <div class="col-12 col-lg-3 g-mb-30">
                                <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                                        class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
                                    <div>
                                        <div id="carousel-08-1"
                                             class="js-carousel text-center g-mb-20"
                                             data-infinite="1"
                                             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                                             data-nav-for="#carousel-08-2">
                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',['id'=>$data->ID]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $data->PicPath }}pic1.jpg"
                                                         alt="Image Description">
                                                </a>
                                            </div>

                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',['id'=>$data->ID]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $data->PicPath }}pic2.jpg"
                                                         alt="Image Description">
                                                </a>
                                            </div>

                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',['id'=>$data->ID]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $data->PicPath }}pic3.jpg"
                                                         alt="Image Description">
                                                </a>
                                            </div>

                                            <div class="js-slide">
                                                <a href="{{ route('productDetail',['id'=>$data->ID]) }}">
                                                    <img class="img-fluid w-100"
                                                         src="{{ $data->PicPath }}pic4.jpg"
                                                         alt="Image Description">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- مشخصات محصول -->
                                    <div style="direction: rtl" class="media">
                                        <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                                        <div class="d-flex justify-content-between col-12 p-0">
                                            <div class="d-flex flex-column">
                                                <h4 class="h6 g-color-black my-1">
                                            <span class="u-link-v5 g-color-black"
                                                  tabindex="0">
                                                {{ $data->Name }} <span
                                                    class="g-font-size-12 g-font-weight-300">{{ $data->Model }}</span>
                                            </span>
                                                </h4>
                                                <ul style="padding: 0"
                                                    class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-mb-5">
                                                    <li>
                                                        <a class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600"
                                                           href="#">{{ $data->Gender.' '.$data->HintCat }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a style="cursor: pointer"
                                               class="u-icon-v1 g-mt-minus-5 g-color-gray-dark-v4 g-color-primary--hover rounded-circle g-ml-5"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               href="{{ route('productDetail',['id'=>$data->ID]) }}"
                                               data-original-title="جزئیات محصول">
                                                <i class="icon-eye g-line-height-0_7"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="d-block g-color-black g-font-size-17 g-ml-10">
                                        <div style="direction: rtl" class="text-left">
                                            <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                                                {{  number_format($data->UnitPrice) }}
                                            </s>
                                            <span>{{  number_format($data->FinalPrice) }}</span>
                                            <span
                                                class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Products -->

                    <hr class="g-mb-60">

                    <!-- Pagination -->
                    <nav style="direction: ltr" class="g-mb-60" aria-label="Page Navigation">
                        <ul class="list-inline">
                            <li class="list-inline-item hidden-down">
                                <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded-circle g-pa-5"
                                   href="#">1</a>
                            </li>
                            <li class="list-inline-item hidden-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                   href="#">2</a>
                            </li>
                            <li class="list-inline-item hidden-xs-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                   href="#">3</a>
                            </li>
                            <li class="list-inline-item hidden-down">
                                <span
                                    class="g-width-30 g-height-30 g-color-gray-dark-v5 g-font-size-12 rounded-circle g-pa-5">...</span>
                            </li>
                            <li class="list-inline-item hidden-xs-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                   href="#">15</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15"
                                   href="#" aria-label="Next">
                      <span aria-hidden="true">
                        <i class="fa fa-angle-right"></i>
                      </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <li class="list-inline-item float-right">
                                <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">صفحه 1 از 15</span>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Pagination -->
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
@endsection
