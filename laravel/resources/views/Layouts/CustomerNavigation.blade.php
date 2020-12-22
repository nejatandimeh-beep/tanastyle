@section('CustomerNavigation')
    <div id="load"></div>
    <body>
    <span id="loginAlert" class="d-none">{{ (isset(Auth::user()->id)) ? 'login':'logout' }}</span>
    <header id="js-header2" class="u-header u-header--static">
        <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
            <nav class="js-mega-menu hs-menu-initialized hs-menu-horizontal navbar navbar-toggleable-md">
                <div class="container" id="HeaderContainer">
                    <!-- Responsive Toggle Button -->
                    <button onclick="closeOtherMenu()"
                            class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-right-0"
                            type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                            data-toggle="collapse" data-target="#navBar"
                            id="btnMenu">
                          <span class="hamburger hamburger--slider">
                            <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                            </span>
                          </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('img/logo/Logo.png') }}" alt="Image Description" width="120"
                             class="g-pt-7 g-pt-0--lg">
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                    <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
                        <ul style="direction: rtl" class="navbar-nav g-font-weight-600 ml-auto p-0">
                            {{--صفحه اصلی--}}
                            <li class="nav-item g-mx-20--lg">
                                <a href="{{ url('/') }}" class="nav-link g-px-0 g-color-primary--hover">صفحه نخست <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            {{--زنانه--}}
                            <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                data-animation-out="fadeOut" data-position="right" id="femaleCat">
                                <a id="mega-menu-label-4" class="nav-link g-px-0" href="#" aria-haspopup="true"
                                   aria-expanded="false">پوشاک زنانه
                                    <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-mr-7"></i></a>

                                <!-- Mega Menu -->
                                <div
                                    class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-55--lg g-mt-7--lg--scrolling"
                                    aria-labelledby="mega-menu-label-4" style="display: none;">
                                    <div class="row">
                                        {{-- لباس --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">لباس</h4>
                                            <div id="accordion-06" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-06-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-06-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-06" aria-expanded="false"
                                                               aria-controls="accordion-06-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس زیر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-06-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-06-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سوتین</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        زیر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش</a>
                                                                </li>
                                                                <li style="direction: rtl" class="g-mb-5"><a
                                                                        class="g-color-main" href="#">گن</a>
                                                                    <span
                                                                        class="u-label g-bg-primary g-ml-10">جدید</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-06-heading-05"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-06-body-05" data-toggle="collapse"
                                                               data-parent="#accordion-06" aria-expanded="false"
                                                               aria-controls="accordion-06-body-05">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-06-body-05" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-06-heading-05">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">شلوار
                                                                        راحتی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دامن</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">لگ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جوراب</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-06-heading-06"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-06-body-06" data-toggle="collapse"
                                                               data-parent="#accordion-06" aria-expanded="false"
                                                               aria-controls="accordion-06-body-06">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-06-body-06" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-06-heading-06">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تونیک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شومیز</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پلیور</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        تک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        پاییزه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        زمستانه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-06-heading-07"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-06-body-07" data-toggle="collapse"
                                                               data-parent="#accordion-06" aria-expanded="false"
                                                               aria-controls="accordion-06-body-07">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس تمام تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-06-body-07" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-06-heading-07">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">لباس
                                                                        خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">مانتو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پانچو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">رویه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        مجلسی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        اداری</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- کیف و کفش --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5  g-font-weight-600">کفش</h4>
                                            <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-main" href="#">دمپایی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">صندل</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">تخت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">پاشنه دار</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">روزمره</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">نیم بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">مراقبت کفش</a></li>
                                            </ul>

                                            <h4 class="h5  g-font-weight-600">کیف</h4>
                                            <ul class="list-unstyled p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-main" href="#">پول</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">کارت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">دستی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">رودوشی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">اداری</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">سفری</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">کوله پشتی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">چمدان</a></li>
                                            </ul>
                                        </div>
                                        {{-- ورزشی --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">ورزشی</h4>
                                            <div id="accordion-07" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-07-heading-08"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-07-body-08" data-toggle="collapse"
                                                               data-parent="#accordion-07" aria-expanded="false"
                                                               aria-controls="accordion-07-body-08">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-07-body-08" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-07-heading-08">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">گرمکن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دامن</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-07-heading-09"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-07-body-09" data-toggle="collapse"
                                                               data-parent="#accordion-07" aria-expanded="false"
                                                               aria-controls="accordion-07-body-09">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-07-body-09" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-07-heading-09">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-07-heading-10"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-07-body-10" data-toggle="collapse"
                                                               data-parent="#accordion-07" aria-expanded="false"
                                                               aria-controls="accordion-07-body-10">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کیف ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-07-body-10" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-07-heading-10">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کوله
                                                                        پشتی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-07-heading-11"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-07-body-11" data-toggle="collapse"
                                                               data-parent="#accordion-07" aria-expanded="false"
                                                               aria-controls="accordion-07-body-11">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کفش ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-07-body-11" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-07-heading-11">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساده</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کتانی
                                                                        ورزشی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مخصوص
                                                                        پیاده روی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مخصوص
                                                                        دویدن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سالنی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کوهنوردی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-07-heading-12"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-07-body-12" data-toggle="collapse"
                                                               data-parent="#accordion-07" aria-expanded="false"
                                                               aria-controls="accordion-07-body-12">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-07-body-12" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-07-heading-12">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">بینی
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">گوش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">بازو
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مچ
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        ساق</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">حوله</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">قم
                                                                        قمه</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- اکسسوری --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600  g-mb-15">اکسسوری</h4>
                                            <div id="accordion-08" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-08-heading-13"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-08-body-13" data-toggle="collapse"
                                                               data-parent="#accordion-08" aria-expanded="false"
                                                               aria-controls="accordion-08-body-13">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                بدلیجات
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-08-body-13" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-08-heading-13">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">گوشواره</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">گردن
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">النگو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">انگشتر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">پا
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        بدلیجات</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-08-heading-14"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-08-body-14" data-toggle="collapse"
                                                               data-parent="#accordion-08" aria-expanded="false"
                                                               aria-controls="accordion-08-body-14">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری مو
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-08-body-14" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-08-heading-14">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">تاج
                                                                        عروس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">تاج
                                                                        سر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">گیره
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کش
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کلیپس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سنجاقک</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-08-heading-15"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-08-body-15" data-toggle="collapse"
                                                               data-parent="#accordion-08" aria-expanded="false"
                                                               aria-controls="accordion-08-body-15">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                سرپوش
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-08-body-15" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-08-heading-15">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کلاه
                                                                        زمستانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">روسری</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شال</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">شال
                                                                        گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        کلاه
                                                                        و شال گردن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-08-heading-16"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-08-body-16" data-toggle="collapse"
                                                               data-parent="#accordion-08" aria-expanded="false"
                                                               aria-controls="accordion-08-body-16">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                سایر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-08-body-16" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-08-heading-16">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">عینک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ساس
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساعت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">چتر</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        هدیه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">نگهدارنده
                                                                        گوشی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu -->
                            </li>
                            {{--مردانه--}}
                            <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                data-animation-out="fadeOut" data-position="right" id="maleCat">
                                <a id="mega-menu-label-5" class="nav-link g-px-0" href="#" aria-haspopup="true"
                                   aria-expanded="false">پوشاک مردانه
                                    <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-mr-7"></i></a>

                                <!-- Mega Menu -->
                                <div
                                    class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-55--lg g-mt-7--lg--scrolling"
                                    aria-labelledby="mega-menu-label-5" style="display: none;">
                                    <div class="row">
                                        {{-- لباس --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">لباس</h4>
                                            <div id="accordion-10" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-10-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-10-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-10" aria-expanded="false"
                                                               aria-controls="accordion-10-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس زیر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-10-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-10-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">مایو</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">شورت
                                                                        پادار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش
                                                                        رکابی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        زیر</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-10-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-10-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-10" aria-expanded="false"
                                                               aria-controls="accordion-10-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-10-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-10-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">شلوار
                                                                        راحتی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جوراب</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-10-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-10-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-10" aria-expanded="false"
                                                               aria-controls="accordion-10-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-10-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-10-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پلیور</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">جلیقه
                                                                        پاییزه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">جلیقه
                                                                        زمستانه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        تک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        پاییزه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت
                                                                        زمستانه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-10-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-10-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-10" aria-expanded="false"
                                                               aria-controls="accordion-10-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس تمام تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-10-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-10-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">لباس
                                                                        خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کت و
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        مجلسی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس
                                                                        اداری</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پالتو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سرهمی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- کیف و کفش --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5  g-font-weight-600">کفش</h4>
                                            <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-main" href="#">دمپایی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">صندل</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">تخت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">روزمره</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">نیم بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">مراقبت کفش</a></li>
                                            </ul>

                                            <h4 class="h5  g-font-weight-600">کیف</h4>
                                            <ul class="list-unstyled p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-main" href="#">پول</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">کارت</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">دستی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">رودوشی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">اداری</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">سفری</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">کوله پشتی</a></li>
                                                <li class="g-mb-5"><a class="g-color-main" href="#">چمدان</a></li>
                                            </ul>
                                        </div>
                                        {{-- ورزشی --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">ورزشی</h4>
                                            <div id="accordion-11" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-11-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-11-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-11" aria-expanded="false"
                                                               aria-controls="accordion-11-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-11-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-11-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">گرمکن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-11-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-11-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-11" aria-expanded="false"
                                                               aria-controls="accordion-11-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-11-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-11-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-11-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-11-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-11" aria-expanded="false"
                                                               aria-controls="accordion-11-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کیف ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-11-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-11-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کوله
                                                                        پشتی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-11-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-11-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-11" aria-expanded="false"
                                                               aria-controls="accordion-11-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کفش ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-11-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-11-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساده</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کتانی
                                                                        ورزشی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مخصوص
                                                                        پیاده روی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مخصوص
                                                                        دویدن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سالنی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کوهنوردی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-11-heading-05"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-11-body-05" data-toggle="collapse"
                                                               data-parent="#accordion-11" aria-expanded="false"
                                                               aria-controls="accordion-11-body-05">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری ورزشی
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-11-body-05" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-11-heading-05">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">بینی
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">گوش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">بازو
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">مچ
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        ساق</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">حوله</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">قم
                                                                        قمه</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- اکسسوری --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600  g-mb-15">اکسسوری</h4>
                                            <div id="accordion-12" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-12-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-12-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-12" aria-expanded="false"
                                                               aria-controls="accordion-12-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                بدلیجات
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-12-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-12-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">گردن
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">انگشتر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        بدلیجات</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-12-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-12-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-12" aria-expanded="false"
                                                               aria-controls="accordion-12-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                سرپوش
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-12-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-12-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کلاه
                                                                        زمستانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">شال
                                                                        گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        کلاه
                                                                        و شال گردن</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-12-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-12-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-12" aria-expanded="false"
                                                               aria-controls="accordion-12-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                سایر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-12-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-12-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">عینک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ساس
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساعت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">چتر</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        هدیه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">نگهدارنده
                                                                        گوشی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu -->
                            </li>
                            {{--بچگانه--}}
                            <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                data-animation-out="fadeOut" data-position="right" id="kidsCat">
                                <a id="mega-menu-label-6" class="nav-link g-px-0" href="#" aria-haspopup="true"
                                   aria-expanded="false">پوشاک بچگانه
                                    <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-mr-7"></i></a>

                                <!-- Mega Menu -->
                                <div
                                    class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-55--lg g-mt-7--lg--scrolling"
                                    aria-labelledby="mega-menu-label-6" style="display: none;">
                                    <div class="row">
                                        {{-- نوزادی --}}
                                        <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">نوزادی</h4>
                                            <div id="accordion-01" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-01-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-01-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-01" aria-expanded="false"
                                                               aria-controls="accordion-01-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-01-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-01-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دامن</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-01-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-01-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-01" aria-expanded="false"
                                                               aria-controls="accordion-01-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-01-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-01-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شومیز</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بافتنی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سرهمی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-01-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-01-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-01" aria-expanded="false"
                                                               aria-controls="accordion-01-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کفش
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-01-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-01-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ورزشی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پاپوش</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-01-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-01-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-01" aria-expanded="false"
                                                               aria-controls="accordion-01-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-01-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-01-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">اسباب
                                                                        بازی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">سر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">هد
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">تل
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">پیش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ناف
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">پا
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        هد
                                                                        بند و پا بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کیسه
                                                                        خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">آویز
                                                                        لباس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">چوب
                                                                        لباس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بدلیجات</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- دخترانه --}}
                                        <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">دخترانه</h4>
                                            <div id="accordion-02" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-02-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-02-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-02" aria-expanded="false"
                                                               aria-controls="accordion-02-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس زیر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-02-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-02-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-02-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-02-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-02" aria-expanded="false"
                                                               aria-controls="accordion-02-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-02-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-02-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دامن</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">جوراب
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">لگ</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-02-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-02-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-02" aria-expanded="false"
                                                               aria-controls="accordion-02-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-02-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-02-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تونیک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شومیز</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سرهمی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-02-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-02-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-02" aria-expanded="false"
                                                               aria-controls="accordion-02-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کفش
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-02-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-02-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دمپایی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">صندل</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ورزشی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">نیم
                                                                        بوت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بوت</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-02-heading-05"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-02-body-05" data-toggle="collapse"
                                                               data-parent="#accordion-02" aria-expanded="false"
                                                               aria-controls="accordion-02-body-05">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-02-body-05" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-02-heading-05">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">روسری</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">اکسسوری
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کیف</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساعت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">چتر</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بدلیجات</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- پسرانه --}}
                                        <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">پسرانه</h4>
                                            <div id="accordion-03" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-03-heading-01"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-03-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-03" aria-expanded="false"
                                                               aria-controls="accordion-03-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس زیر
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-03-body-01" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-03-heading-01">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">زیر
                                                                        پوش</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-03-heading-02"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-03-body-02" data-toggle="collapse"
                                                               data-parent="#accordion-03" aria-expanded="false"
                                                               aria-controls="accordion-03-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس پایین تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-03-body-02" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-03-heading-02">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">گرمکن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جوراب</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-03-heading-03"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-03-body-03" data-toggle="collapse"
                                                               data-parent="#accordion-03" aria-expanded="false"
                                                               aria-controls="accordion-03-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                لباس بالا تنه
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-03-body-03" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-03-heading-03">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پلیور</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کاپشن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ست
                                                                        لباس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">سرهمی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-03-heading-04"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-03-body-04" data-toggle="collapse"
                                                               data-parent="#accordion-03" aria-expanded="false"
                                                               aria-controls="accordion-03-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                کفش
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-03-body-04" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-03-heading-04">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دمپایی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">صندل</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ورزشی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">نیم
                                                                        بوت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">بوت</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="direction: rtl"
                                                     class="card rounded-0 g-bg-transparent g-brd-none">
                                                    <div id="accordion-03-heading-05"
                                                         class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                         role="tab">
                                                        <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                            <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                               href="#accordion-03-body-05" data-toggle="collapse"
                                                               data-parent="#accordion-03" aria-expanded="false"
                                                               aria-controls="accordion-03-body-05">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                اکسسوری
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-03-body-05" class="collapse" role="tabpanel"
                                                         aria-labelledby="accordion-03-heading-05">
                                                        <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                            <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">ساس
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">انواع
                                                                        کیف</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">ساعت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main" href="#">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-main"
                                                                                      href="#">چتر</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu -->
                            </li>
                            {{--فروش ویژه--}}
                            <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                data-animation-out="fadeOut" data-position="right" id="spacialSale">
                                <a id="mega-menu-label-2" class="nav-link g-px-0" href="#" aria-haspopup="true"
                                   aria-expanded="false">فروش ویژه
                                    <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-mr-7"></i></a>

                                <!-- Mega Menu -->
                                <div
                                    class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-mb-25 g-pa-30 g-mt-17 g-mt-55--lg g-mt-7--lg--scrolling animated hs-position-right fadeOut"
                                    aria-labelledby="mega-menu-label-2" style="display: none;">
                                    <div class="row align-items-stretch text-left">
                                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                                            <article class="u-block-hover">
                                                <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                     src="{{ asset('img/Other/bronze.jpg')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های برنز</h2>
                                                    <span class="d-block g-color-black">15 تا 25 درصد</span>
                                                </div>
                                                <a class="u-link-v2" href="#"></a>
                                            </article>
                                        </div>

                                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                                            <article class="u-block-hover">
                                                <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                     src="{{ asset('img/Other/silver.jpg')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های نقره ای</h2>
                                                    <span class="d-block g-color-black">25 تا 35 درصد</span>
                                                </div>
                                                <a class="u-link-v2" href="#"></a>
                                            </article>
                                        </div>

                                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                                            <article class="u-block-hover">
                                                <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                     src="{{ asset('img/Other/gold.jpg')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های طلایی</h2>
                                                    <span class="d-block g-color-black">35 درصد به بالا</span>
                                                </div>
                                                <a class="u-link-v2" href="#"></a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu -->
                            </li>
                            {{--برندها--}}
                            <li class="nav-item g-mx-20--lg">
                                <a href="#" class="nav-link g-px-0 g-color-primary--hover">برندها</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Navigation -->

                    <hr class="force-col-12 g-brd-gray-light-v4 smallDevice g-mt-20 g-mb-10" id="otherMenuHr">

                    <!-- Other Menu -->
                    <div class="d-flex justify-content-between force-col-12 g-pr-10 g-pl-10" id="otherMenu">
                        <!-- Basket -->
                        <div class="u-basket d-inline-block g-valign-middle g-mr-30 g-pt-8" id="myBasket">
                            <a href="#" onclick="cart()" id="basket-bar-invoker"
                               class="u-icon-v1 g-color-main g-text-underline--none--hover g-width-20 g-height-20"
                               aria-controls="basket-bar"
                               aria-haspopup="true"
                               aria-expanded="false"
                               data-dropdown-event="hover"
                               data-dropdown-target="#basket-bar"
                               data-dropdown-type="css-animation"
                               data-dropdown-duration="300"
                               data-dropdown-hide-on-scroll="false"
                               data-dropdown-animation-in="fadeIn"
                               data-dropdown-animation-out="fadeOut"
                               onmousemove="hideSearch()">
                                <span id="basketNum"
                                      class="u-badge-v1--sm g-color-white g-bg-primary g-rounded-50x">3</span>
                                <i class="fa fa-shopping-cart"></i>
                            </a>

                            <div style="direction: rtl" id="basket-bar"
                                 class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-brd-top g-brd-2 g-brd-primary g-color-main g-mt-17 g-mt-10--lg--scrolling"
                                 aria-labelledby="basket-bar-invoker">
                                <div id="basketContainer" class="js-scrollbar g-height-300">
                                    <!-- Product -->
                                    <div class="u-basket__product">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-4 g-pl-20">
                                                <a href="#" class="u-basket__product-img"><img
                                                        src="../../../assets/img-temp/150x150/img1.jpg"
                                                        alt="Image Description"></a>
                                            </div>

                                            <div class="col-8 text-right">
                                                <div class="d-flex justify-content-between">
                                                    <div class="g-pt-15 g-pb-10">
                                                        <h6 class="g-font-weight-600 g-mb-0">
                                                            <a href="#"
                                                               class="g-color-main g-color-main--hover g-text-underline--none--hover">شاوار
                                                                جین</a>
                                                        </h6>
                                                        <small class="g-color-gray-dark-v5 g-font-size-14">250،000
                                                            تومان</small>
                                                    </div>
                                                    <div>
                                                        <button
                                                            style="color:#7f8c8d; background-color: transparent; border: none; font-size: 1.5rem; cursor: pointer"
                                                            type="button">&times;
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Product -->
                                </div>

                                <div class="g-brd-top g-brd-gray-light-v4 g-pa-15 g-pb-20">
                                    <div
                                        class="g-font-size-18 text-left">
                                        <a href="#" onclick="cart()" class="btn u-btn-outline-primary rounded-0 g-width-120">نمایش
                                            سبد خرید</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Basket -->

                        <!-- Search and Login -->
                        <div class="d-flex">
                            <div class="d-inline-block">
                                <!-- Login -->
                                @guest
                                    <div class="d-inline-block g-valign-middle g-mr-25 g-pt-8">
                                        <a href="{{ route('login') }}" id="login"
                                           class="u-icon-v1 g-color-main g-text-underline--none--hover g-width-20 g-height-20"
                                           data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="ورود یا ثبت نام"
                                        >
                                            <i style="z-index: 0" class="fa fa-user"></i>
                                        </a>
                                    </div>
                                @else
                                    <div class="g-pt-10 g-mr-15 g-mr-25--lg">
                                        <a href="{{route('userProfile', ['id' => 'navigation'])}}" id="login"
                                           class="d-flex nav-link g-color-main h6 g-text-underline--none--hover p-0 g-color-primary--hover"
                                           data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="اطلاعات کاربری"
                                        >
                                            {{ Auth::user()->name }}

                                            <i class="icon-settings g-font-size-16 g-ml-5"></i>
                                        </a>
                                    </div>
                                    {{--منوبندی کاربر--}}
                                    {{--                                    <div class="g-pt-10 text-center g-mr-25 d-flex">--}}
                                    {{--                                        <div class="d-inline-block btn-group">--}}
                                    {{--                                            <button style="direction: rtl;" type="button"--}}
                                    {{--                                                    class="btn btn-secondary g-font-weight-400 g-color-gray-dark-v2 g-brd-none g-color-primary--hover g-bg-transparent g-font-size-14 p-0 m-0"--}}
                                    {{--                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--                                                {{ Auth::user()->name }}--}}
                                    {{--                                                <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-mr-3"></i>--}}
                                    {{--                                            </button>--}}
                                    {{--                                            <div class="dropdown-menu dropdown-menu-right rounded-0 text-right">--}}
                                    {{--                                                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300 g-pa-10 g-py-5--lg"--}}
                                    {{--                                                   href="{{route('userProfile')}}">اطلاعات کاربری--}}

                                    {{--                                                    <i class="icon-user float-left g-font-size-16 g-pt-3 g-pl-3"></i>--}}
                                    {{--                                                </a>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <form id="logout-form" action="{{route('logout')}}" method="POST"--}}
                                    {{--                                                  style="display: none;">--}}
                                    {{--                                                @csrf--}}
                                    {{--                                            </form>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                @endguest
                            </div>
                            <!-- End Login -->

                            <!-- Search -->
                            <div class="d-inline-block g-pos-rel g-valign-middle g-pt-6">
                                <a href="#"
                                   class="g-font-size-18 g-color-main"
                                   aria-controls="searchform-1"
                                   id="searchIcon"
                                   data-dropdown-target="#searchform-1">
                                    <i class="fa fa-search"></i>
                                </a>

                                <!-- Search Form -->
                                <form style="display: none; border-top: 2px solid #72c02c" id="searchForm"
                                      class="u-searchform-v1 u-dropdown--hidden g-bg-white g-pa-10 g-mt-17 g-mt-10--lg--scrolling">
                                    <div style="direction: rtl"
                                         class="input-group g-brd-primary--focus g-state-focus">
                                        <input style="direction:rtl;font-family: Yekan; font-size: 16px !important;"
                                               class="form-control rounded-0 u-form-control" type="search"
                                               id="searchInput"
                                               placeholder="خودتان بگردید..">

                                        <div class="input-group-addon p-0 align-middle">
                                            <button class="btn rounded-0 btn-primary btn-md g-font-size-14 g-px-18"
                                                    type="submit">بگرد
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                <!-- End Search Form -->
                            </div>
                            <!-- End Search -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
@endsection
