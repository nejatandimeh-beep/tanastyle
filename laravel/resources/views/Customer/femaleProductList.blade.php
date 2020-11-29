@extends('Layouts.IndexCustomer')
@section('Content')
    <section class="g-bg-size-cover g-bg-pos-center g-bg-cover g-color-white g-py-100 bigDevice"
             style="background-image: url({{asset('img/Other/HEADER_dress_shoes_bags.jpg')}})">
        <div style="direction: rtl" class="container g-bg-cover__inner g-mr-50--lg">
            <header class="g-mb-20">
                <h3 style="font-family: Yekan" class="h5 g-font-weight-300 g-color-primary g-mb-5">تانا استایل</h3>
                <h1 style="font-family: Yekan" class="h4 g-font-weight-300">
                    فروشگاهی معتبر با قیمت های استثنایی
                </h1>
            </header>

            <ul class="u-list-inline p-0 g-pl-40--lg">
                <li class="list-inline-item g-ml-7">
                    <a class="u-link-v5 g-color-white g-color-primary--hover" href="#">صفحه نخست</a>
                    <i class="fa fa-angle-left g-mr-7"></i>
                </li>
                {{--                <li class="list-inline-item g-ml-7">--}}
                {{--                    <a class="u-link-v5 g-color-white g-color-primary--hover" href="#">Pages</a>--}}
                {{--                    <i class="fa fa-angle-left g-mr-7"></i>--}}
                {{--                </li>--}}
                <li class="list-inline-item g-color-primary">
                    <span>پوشاک زنانه</span>
                </li>
            </ul>
        </div>
    </section>
    <section class="g-bg-size-cover g-bg-pos-center g-bg-black g-color-white g-py-50 smallDevice">
        <div style="direction: rtl" class="container g-bg-cover__inner">
            <header class="g-mb-10 text-center">
                <h3 style="font-family: Yekan" class="h3 g-color-primary g-font-weight-300 g-mb-5">تانا استایل</h3>
                <h1 style="font-family: Yekan" class="h5 g-font-weight-300">
                    فروشگاهی معتبر با قیمت های استثنایی
                </h1>
            </header>
            <div class="g-mb-10">
                <img class="img-fluid w-100"
                     src="img/Other/HEADER_SD_dress_shoes_bags.jpg"
                     alt="Image Description">
            </div>
            <ul class="u-list-inline p-0 g-pl-40--lg">
                <li class="list-inline-item g-ml-7">
                    <a class="u-link-v5 g-color-white g-color-primary--hover" href="#">صفحه نخست</a>
                    <i class="fa fa-angle-left g-mr-7"></i>
                </li>
                {{--                <li class="list-inline-item g-ml-7">--}}
                {{--                    <a class="u-link-v5 g-color-white g-color-primary--hover" href="#">Pages</a>--}}
                {{--                    <i class="fa fa-angle-left g-mr-7"></i>--}}
                {{--                </li>--}}
                <li class="list-inline-item g-color-primary">
                    <span>پوشاک زنانه</span>
                </li>
            </ul>
        </div>
    </section>

    <div class="container-fluid">
        <div style="direction: rtl" class="row">

            <!-- Filters -->
            <div style="display: none" id="filterDiv" class="col-md-3 flex-md-first g-brd-left--lg g-brd-gray-light-v4">
                <div style="z-index: 100 !important" id="stickyDiv1" class="sticky-top">
                    <div class="g-bg-white-opacity-0_9">
                        <div class="g-pr-15--lg d-flex justify-content-between g-pb-20 g-pt-20">
                            <h5 class="m-0 align-self-center">فیلتر ها</h5>
                            <button
                                style=" color:rgba(0,0,0,0.4);
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

                        <div style="direction: rtl" role="tablist" aria-multiselectable="true">
                            <!-- فیلتر جمسیت -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-01"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-01">جنسیت</a>
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-02"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-02">طبقه بندی</a>
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-03"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-03">قیمت</a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-03"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-03">
                                    <div class="card-block g-px-0">
                                        <ul class="list-unstyled">
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Mango <span class="float-right g-font-size-13">24</span>
                                                </label>
                                            </li>
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox"
                                                           checked="">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Gucci <span class="float-right g-font-size-13">334</span>
                                                </label>
                                            </li>
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Adidas <span class="float-right g-font-size-13">18</span>
                                                </label>
                                            </li>
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox"
                                                           checked="">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Nike <span class="float-right g-font-size-13">6</span>
                                                </label>
                                            </li>
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Puma <span class="float-right g-font-size-13">71</span>
                                                </label>
                                            </li>
                                            <li class="my-2">
                                                <label
                                                    class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           type="checkbox">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                                        <i class="fa" data-check-icon=""></i>
                                                    </div>
                                                    Zara <span class="float-right g-font-size-13">9</span>
                                                </label>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر رنگ -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-04" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-04"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-04">رنگ</a>
                                    </h5>
                                </div>
                                <div id="accordion-100-body-04"
                                     class="collapse"
                                     role="tabpanel"
                                     aria-labelledby="accordion-100-heading-04">
                                    <div class="card-block g-px-0">
                                        <ul class="list-inline mb-0 p-0">
                                            <li class="list-inline-item g-ml-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-primary rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-beige rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-black rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-yellow rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-blue rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-purple rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mx-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-brown rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="list-inline-item g-mr-10">
                                                <label class="form-check-inline u-check">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                           name="radInline1_1" type="radio">
                                                    <div
                                                        class="u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle g-absolute-centered--y g-right-0 g-mt-3">
                                                        <i class="d-block g-absolute-centered g-width-16 g-height-16 g-bg-gray-dark-v4 rounded-circle"></i>
                                                    </div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- فیلتر سایز -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-05" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover"
                                           href="#accordion-100-body-05"
                                           data-toggle="collapse"
                                           aria-expanded="false"
                                           aria-controls="accordion-100-body-05">سایز</a>
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                                                        <span>تک سایز</span>
                                                        <div class="u-check">
                                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                                   name="radGroup3_1" type="checkbox" checked="">
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div id="contentDiv" class="col-md-12 flex-md-unordered">
                <div>
                    <!-- Filters -->
                    <div id="stickyDiv2" style="z-index: 100 !important"
                         class="sticky-top g-bg-white-opacity-0_9 g-mb-20">
                        <div class="d-flex g-pt-20 g-pb-20">
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
                    <div id="productContainer" class="row g-pt-30 g-mb-50">
                        @foreach($product_table as $key => $data)
                            <div class="col-12 col-lg-3 g-mb-30">
                                <figure style="direction: ltr;" class="g-px-10 g-pt-10 productFrame">
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
                                                       href="#">زنانه</a>
                                                </li>
                                                <li><span></span>لباس زیر</li>
                                            </ul>
                                            <s class="d-block g-color-lightred g-font-weight-500 g-font-size-13">
                                                {{  number_format($data->UnitPrice) }}
                                            </s>
                                            <span
                                                class="d-block g-color-black g-font-size-17">{{  number_format($data->FinalPrice) }}</span>
                                        </div>

                                        <!-- آیکون و سایز و رنگ -->
                                        <ul class="list-inline media-body text-left p-0">
                                            @for($i=0; $i<count($empty); $i++)
                                                @if($data->ID === $empty[$i])
                                                    <li class="list-inline-item align-middle mx-0">
                                                        <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-16 rounded-circle"
                                                           href="#" title="" data-toggle="tooltip"
                                                           data-placement="top"
                                                           data-original-title="موجود شد خبرم کن"
                                                           tabindex="0">
                                                            <i class="icon-bell"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endfor
                                            <li class="list-inline-item align-middle mx-0">
                                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-16 rounded-circle"
                                                   href="#" title="" data-toggle="tooltip" data-placement="top"
                                                   data-original-title="افزودن به سبد خرید" tabindex="0">
                                                    <i class="icon-basket"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-middle mx-0">
                                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-16 rounded-circle"
                                                   href="#" title="" data-toggle="tooltip" data-placement="top"
                                                   data-original-title="افزودن به علاقه مندیها" tabindex="0">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </li>
                                            {{--سایز--}}
                                            <div style="direction: ltr" class="d-flex g-mt-15 g-mb-5 g-ml-8">
                                                <span class="d-none">{{ $i = 0 }}</span>
                                                <span class="d-none">{{ $j = 0 }}</span>
                                                <span class="d-none">{{ $size = '' }}</span>
                                                <span class="d-none">{{ $color = '' }}</span>
                                                @foreach($product_Detail_table as $dataDetail)
                                                    {{--                                                    این شرط بررسی میکند که آیدی محصول در جدول جزییات چند بار تکرار شده است--}}
                                                    {{--                                                    و براساس هر تکرار آیدی سایز و رنگ را اضافه می کند.--}}
                                                    {{--                                                    و فقط سه عدد از سایز و رنگها نمایش داده می شود.--}}
                                                    {{--                                                    و بررسی میکند اگر سایز تکراری بود فقط یک عدد از آن سایز نوشته شود. --}}
                                                    @if(($dataDetail->ProductID === $data->ID) && ($i <= 2) && ($dataDetail->Size !== $size ))
                                                        <span style="overflow: hidden"
                                                            class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v2 g-mr-5 g-mb-5">
                                                            <i class="g-font-style-normal g-color-gray-dark-v5 g-font-weight-700">{{ $dataDetail->Size }}</i>
                                                        </span>
                                                        <span class="d-none">{{ $i++ }}</span>
                                                        <span class="d-none">{{ $size = $dataDetail->Size }}</span>
                                                    @endif
                                                    @if($dataDetail->ProductID === $data->ID)
                                                        <span class="d-none">{{ $j++ }}</span>
                                                    @endif
                                                @endforeach
                                                {{-- متغییر j وابسته به شرط بالا می باشد. --}}
                                                @if($j > 3)
                                                    <span
                                                        class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v2 g-mr-5 g-mb-5">
                                                        <i class="g-font-style-normal g-color-gray-dark-v5 g-font-weight-700">+</i>
                                                    </span>
                                                @endif
                                            </div>
                                            {{--رنگ--}}
                                            <div style="direction: ltr" class="d-flex g-ml-8">
                                                <span class="d-none">{{ $i = 0 }}</span>
                                                <span class="d-none">{{ $j = 0 }}</span>
                                                <span class="d-none">{{ $temp = '' }}</span>
                                                @foreach($product_Detail_table as $dataDetail)
                                                    @if(($dataDetail->ProductID === $data->ID) && ($i <= 2) && ($dataDetail->Color !== $color ))
                                                        <span
                                                            class="u-label g-color-gray-dark-v4 g-bg-gray-light-v5 g-mr-5 g-mb-5">{{ $dataDetail->Color }}</span>
                                                        <span class="d-none">{{ $i++ }}</span>
                                                        <span
                                                            class="d-none">{{ $color = $dataDetail->Color }}</span>
                                                    @endif
                                                    @if(($dataDetail->ProductID === $data->ID) && ($temp !== $dataDetail->Color))
                                                        <span class="d-none">{{ $j++ }}</span>
                                                    @endif
                                                        <span class="d-none">{{ $temp = $dataDetail->Color }}</span>
                                                @endforeach
                                                @if($j > 3)
                                                    <span
                                                        class="u-label g-color-gray-dark-v4 g-bg-gray-light-v5 g-mr-5 g-mb-5 g-pt-5">+</span>
                                                @endif
                                            </div>
                                        </ul>
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
