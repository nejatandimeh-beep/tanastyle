@section('CustomerNavigation')
    <body class="customerPanel">
    {{--    <div id="load" class="load"></div>--}}
    <span id="loginAlert" class="d-none">{{ (isset(Auth::user()->id)) ? 'login':'logout' }}</span>
    @switch($_SERVER['REQUEST_URI'])
        @case('/Tanakora-Mahabad')
        @case('/Customer-SellerMajor-Reactions')
        @case('/Customer-Following-SellerMajor')
        @case('/Customer-SellerMajor-Saved')
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Messages'))
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Panel'))
        <div class="container g-brd-bottom g-brd-gray-light-v5 g-py-5 g-mb-5 customerNavigation" id="HeaderContainer">
            <!-- Search and Login -->
            <div class="d-flex w-100 justify-content-end">
                <div class="g-mr-15 g-pt-10">
                    <a href="{{ url('/') }}" id="login"
                       class="d-flex nav-link g-color-black h6 g-text-underline--none--hover p-0 g-color-primary--hover loginBtn">
                        صفحه نخست <span class="sr-only">(current)</span>
                    </a>
                </div>
                <div class="d-inline-block">
                    <!-- Login -->
                    @guest
                        <div class="d-inline-block g-valign-middle g-pt-8">
                            <a href="{{ route('loginMode') }}" id="login"
                               class="u-icon-v1 g-color-black g-text-underline--none--hover g-width-20 g-height-20"
                               data-toggle="tooltip"
                               data-placement="bottom"
                               title="ورود یا ثبت نام">
                                <i style="z-index: 0" class="fa fa-user"></i>
                            </a>
                        </div>
                    @else
                        <div class="g-pt-10">
                            <a href="{{route('userProfile', ['id' => 'navigation'])}}" id="login"
                               title="اطلاعات کاربری"
                               class="d-flex nav-link g-color-black h6 g-text-underline--none--hover p-0 g-color-primary--hover loginBtn">
                                @if(Auth::user()->name===null || Auth::user()->name==='') {{'(کاربر'.Auth::user()->id.') '.Auth::user()->Mobile}} @else  {{Auth::user()->name}} @endif

                                <i id="settingIcon" class="icon-settings g-font-size-16 g-ml-5"></i>
                            </a>
                        </div>
                    @endguest
                </div>
                <!-- End Login -->
            </div>
        </div>
        @break
        @default
        <header id="js-header" class="u-header u-header--static">
            <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-pt-10 g-pb-10--lg">
                <nav class="js-mega-menu hs-menu-initialized hs-menu-horizontal navbar navbar-toggleable-md">
                    <div class="container g-px-0 customerNavigation" id="HeaderContainer">
                        <!-- Responsive Toggle Button -->
                        <button onclick="closeOtherMenu()"
                                class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-right-0"
                                type="button" aria-label="Toggle navigation" aria-expanded="false"
                                aria-controls="navBar"
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
                            <img src="{{ asset('img/Logo/logo.svg') }}" alt="فروشگاه پوشاک تانا استایل" width="120"
                                 class="g-pt-7 g-pt-0--lg">
                        </a>
                        <!-- End Logo -->

                        <!-- Navigation -->
                        <div
                            class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pb-20 g-pb-0--lg g-pt-5--lg"
                            id="navBar">
                            <ul style="direction: rtl" class="navbar-nav g-font-weight-600 ml-auto p-0">
                                {{--صفحه اصلی--}}
                                <li class="nav-item g-mx-20--lg">
                                    <a href="{{ url('/') }}" class="nav-link g-px-0 g-color-primary--hover">صفحه نخست
                                        <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                {{--زنانه--}}
                                <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                    data-animation-out="fadeOut" data-position="right" id="femaleCat">
                                    <a id="mega-menu-label-4" class="nav-link g-px-0 g-color-primary--hover"
                                       href="{{ route('productFemaleList') }}" aria-haspopup="true"
                                       aria-expanded="false">پوشاک زنانه
                                        <i class="icon-arrow-down align-middle g-font-size-11 g-mr-7"></i></a>

                                    <!-- Mega Menu -->
                                    <div
                                        class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-7--lg--scrolling"
                                        aria-labelledby="mega-menu-label-4" style="display: none;">
                                        <div class="row">
                                            {{-- لباس --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productFemaleClothesList') }}"
                                                       class="nav-link g-color-primary--hover p-0">لباس</a>
                                                </h4>
                                                <div id="accordion-06" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-06-heading-04"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','00','a']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','01','a']) }}">سوتین</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','02','a']) }}">ست
                                                                            لباس
                                                                            زیر</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','03','a']) }}">زیر
                                                                            پوش</a>
                                                                    </li>
                                                                    <li style="direction: rtl" class="g-mb-5"><a
                                                                            class="g-color-black"
                                                                            href="{{ route('menuProduct',['0','04','a']) }}">گن</a>
                                                                        {{--                                                                        class="u-label g-bg-primary g-ml-10">جدید</span>--}}
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','10','b']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','11','b']) }}">شلوار</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','12','b']) }}">شلوار
                                                                            راحتی</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','13','b']) }}">دامن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','14','b']) }}">لگ</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','15','b']) }}">جوراب</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','21','c']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','22','c']) }}">تاپ</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','23','c']) }}">تونیک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','24','c']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','25','c']) }}">شومیز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','26','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','27','c']) }}">پلیور</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','28','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','29','c']) }}">جلیقه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','210','c']) }}">هودی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','211','c']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','212','c']) }}">کت
                                                                            تک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','213','c']) }}">کت
                                                                            پاییزه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','214','c']) }}">کت
                                                                            زمستانه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','215','c']) }}">کاپشن</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','30','d']) }}">لباس
                                                                            خواب</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','31','d']) }}">مانتو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','32','d']) }}">پانچو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','33','d']) }}">رویه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','34','d']) }}">شنل</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','35','d']) }}">کت
                                                                            شلوار</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','36','d']) }}">ست
                                                                            لباس
                                                                            مجلسی</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','37','d']) }}">ست
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
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productFemaleShoesList') }}"
                                                       class="nav-link g-color-primary--hover p-0">کفش</a>
                                                </h4>
                                                <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','50','f']) }}">دمپایی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','51','f']) }}">صندل</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','52','f']) }}">تخت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','53','f']) }}">پاشنه
                                                            دار</a></li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','54','f']) }}">روزمره</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','55','f']) }}">نیم
                                                            بوت</a></li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','56','f']) }}">بوت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','shoeCare','f']) }}">مراقبت
                                                            کفش</a></li>
                                                </ul>

                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productFemaleBagsList') }}"
                                                       class="nav-link g-color-primary--hover p-0">کیف</a>
                                                </h4>
                                                <ul class="list-unstyled p-0 g-pl-40--lg">
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','40','e']) }}">پول</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','41','e']) }}">کارت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','42','e']) }}">دستی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','43','e']) }}">دوشی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','44','e']) }}">اداری</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','45','e']) }}">سفری</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['0','46','e']) }}">کوله
                                                            پشتی</a></li>
                                                </ul>
                                            </div>
                                            {{-- ورزشی --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productFemaleSportsList') }}"
                                                       class="nav-link g-color-primary--hover p-0">ورزشی</a>
                                                </h4>
                                                <div id="accordion-07" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-07-heading-07"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-07-body-07" data-toggle="collapse"
                                                                   data-parent="#accordion-07" aria-expanded="false"
                                                                   aria-controls="accordion-07-body-07">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس زیر
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-07-body-07" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-07-heading-07">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','600','g']) }}">مایو</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-07-heading-08"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','610','h']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','611','h']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','612','h']) }}">شلوار
                                                                            اسلش</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','613','h']) }}">دامن</a>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','620','i']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','621','i']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','622','i']) }}">تاپ</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','623','i']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','624','i']) }}">جلیقه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','625','i']) }}">هودی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','626','i']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','627','i']) }}">کاپشن</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-07-heading-30"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-07-body-30" data-toggle="collapse"
                                                                   data-parent="#accordion-07" aria-expanded="false"
                                                                   aria-controls="accordion-07-body-30">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس تمام تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-07-body-30" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-07-heading-30">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','630','j']) }}">ست
                                                                            ورزشی</a></li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','640','k']) }}">ساک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','641','k']) }}">کوله
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','650','l']) }}">ساده</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','651','l']) }}">کتانی
                                                                        </a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','652','l']) }}">حرفه
                                                                            ای</a></li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','ProSportCap','m']) }}">کلاه
                                                                            حرفه ای</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SportHeadBand','m']) }}">هد
                                                                            بند</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SportGlasses','m']) }}">
                                                                            عینک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SwimmingNoseClip','m']) }}">بینی
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','Earplugs','m']) }}">گوش
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','ArmBand','m']) }}">بازو
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SportWristBand','m']) }}">مچ
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SportGloves','m']) }}">
                                                                            دستکش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','CalfSupport','m']) }}">
                                                                            ساق</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','SportSocks','m']) }}">انواع
                                                                            جوراب</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','CanteenBottle','m']) }}">قم
                                                                            قمه</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- اکسسوری --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productFemaleRhinestoneList') }}"
                                                       class="nav-link g-color-primary--hover p-0">اکسسوری</a>
                                                </h4>
                                                <div id="accordion-08" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-08-heading-13"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','700','n']) }}">گوشواره</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','701','n']) }}">گردن
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','702','n']) }}">النگو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','703','n']) }}">دست
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','704','n']) }}">انگشتر</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','705','n']) }}">پا
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','706','n']) }}">ست
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','710','o']) }}">تاج
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','711','o']) }}">گیره
                                                                            مو</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','712','o']) }}">کش
                                                                            مو</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','713','o']) }}">کلیپس</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','714','o']) }}">سنجاقک</a>
                                                                    </li>
                                                                    {{--                                                                <li class="g-mb-5"><a class="g-color-black"--}}
                                                                    {{--                                                                                      href="{{ route('menuProduct',['0','715','o','آرایش و مراقبت مو زنانه']) }}">آرایش--}}
                                                                    {{--                                                                        و مراقبت مو</a></li>--}}
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','720','p']) }}">کلاه
                                                                            زمستانی</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','721','p']) }}">روسری</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','722','p']) }}">شال</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','723','p']) }}">شال
                                                                            گردن</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','724','p',]) }}">ست
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','730','q']) }}">عینک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','738','q']) }}">بند
                                                                            عینک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','731','q']) }}">کراوات</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','732','q']) }}">پاپیون</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','733','q']) }}">ساس
                                                                            بند</a></li>
                                                                    {{--                                                                <li class="g-mb-5"><a class="g-color-black"--}}
                                                                    {{--                                                                                      href="{{ route('menuProduct',['0','734','q']) }}">ساعت</a>--}}
                                                                    {{--                                                                </li>--}}
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','735','q']) }}">کمر
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','736','q']) }}">چتر</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['0','737','q']) }}">ست
                                                                            هدیه</a></li>
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
                                    <a id="mega-menu-label-5" class="nav-link g-px-0 g-color-primary--hover"
                                       href="{{ route('productMaleList') }}" aria-haspopup="true"
                                       aria-expanded="false">پوشاک مردانه
                                        <i class="icon-arrow-down align-middle g-font-size-11 g-mr-7"></i></a>

                                    <!-- Mega Menu -->
                                    <div
                                        class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-7--lg--scrolling"
                                        aria-labelledby="mega-menu-label-5" style="display: none;">
                                        <div class="row">
                                            {{-- لباس --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productMaleClothesList') }}"
                                                       class="nav-link g-color-primary--hover p-0">لباس</a>
                                                </h4>
                                                <div id="accordion-10" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-10-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','00','a']) }}">شورت
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','01','a']) }}">زیر
                                                                            پوش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','02','a']) }}">ست
                                                                            لباس زیر</a></li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','10','b']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','11','b']) }}">شلوار</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','12','b']) }}">شلوار
                                                                            راحتی</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','13','b']) }}">جوراب</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','21','c']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','22','c']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','23','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','24','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','25','c']) }}">جلیقه
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','26','c']) }}">هودی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','27','c']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','28','c']) }}">کت
                                                                            تک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','29','c']) }}">کت
                                                                            زمستانه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','210','c']) }}">کاپشن</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','30','d']) }}">لباس
                                                                            خواب</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','31','d']) }}">کت
                                                                            و
                                                                            شلوار</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','32','d']) }}">پالتو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','33','d']) }}">سرهمی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- کیف و کفش --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productMaleShoesList') }}"
                                                       class="nav-link g-color-primary--hover p-0">کفش</a>
                                                </h4>
                                                <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','50','f']) }}">دمپایی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','51','f']) }}">صندل</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','52','f']) }}">تخت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','53','f']) }}">روزمره</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','54','f']) }}">نیم
                                                            بوت</a></li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','55','f']) }}">بوت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','shoeCare','f']) }}">مراقبت
                                                            کفش</a></li>
                                                </ul>

                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productMaleBagsList') }}"
                                                       class="nav-link g-color-primary--hover p-0">کیف</a>
                                                </h4>
                                                <ul class="list-unstyled p-0 g-pl-40--lg">
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','40','e']) }}">پول</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','41','e']) }}">کارت</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','42','e']) }}">دستی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','43','e']) }}">دوشی</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','44','e']) }}">اداری</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','45','e']) }}">سفری</a>
                                                    </li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','46','e']) }}">کوله
                                                            پشتی</a></li>
                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                          href="{{ route('menuProduct',['1','baggae','e']) }}">چمدان</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            {{-- ورزشی --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productMaleSportsList') }}"
                                                       class="nav-link g-color-primary--hover p-0">ورزشی</a>
                                                </h4>
                                                <div id="accordion-11" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-11-heading-00"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-11-body-00" data-toggle="collapse"
                                                                   data-parent="#accordion-11" aria-expanded="false"
                                                                   aria-controls="accordion-11-body-00">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس زیر
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-11-body-00" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-11-heading-00">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','600','g']) }}">مایو</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-11-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','610','h']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','611','h']) }}">شلوار
                                                                            اسلش</a></li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','620','i']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','621','i']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','622','i']) }}">جلیقه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','623','i']) }}">هودی</a>
                                                                    </li>
                                                                    2
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','624','i']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','625','i']) }}">کاپشن</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','640','k']) }}">ساک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','641','k']) }}">کوله
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','640','l']) }}">ساده</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','641','l']) }}">صندل
                                                                        </a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','642','l']) }}">کتانی
                                                                        </a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','ProSportCap','m']) }}">
                                                                            کلاه حرفه ای</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SportHeadBand','m']) }}">هد
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SportGlasses','m']) }}">
                                                                            عینک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SwimmingNoseClip','m']) }}">بینی
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','Earplugs','m']) }}">گوش
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','ArmBand','m']) }}">بازو
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SportWristBand','m']) }}">مچ
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SportGloves','m']) }}">
                                                                            دستکش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','CalfSupport','m']) }}">
                                                                            ساق</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','SportSocks','m']) }}">
                                                                            جوراب</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','CanteenBottle','m']) }}">قم
                                                                            قمه</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- اکسسوری --}}
                                            <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productMaleRhinestoneList') }}"
                                                       class="nav-link g-color-primary--hover p-0">اکسسوری</a>
                                                </h4>
                                                <div id="accordion-12" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-12-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','700','n']) }}">گردن
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','701','n']) }}">دست
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','702','n']) }}">انگشتر</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','703','n']) }}">ست
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','710','p']) }}">کلاه
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','711','p']) }}">شال
                                                                            گردن</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','712','p']) }}">ست
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','720','q']) }}">عینک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','721','q']) }}">کراوات</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','722','q']) }}">پاپیون</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','723','q']) }}">ساس
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','724','q']) }}">کمر
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','725','q']) }}">چتر</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['1','726','q']) }}">ست
                                                                            هدیه</a></li>
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
                                    <a id="mega-menu-label-6" class="nav-link g-px-0 g-color-primary--hover" href="#"
                                       aria-haspopup="true"
                                       aria-expanded="false">پوشاک بچگانه
                                        <i class="icon-arrow-down align-middle g-font-size-11 g-mr-7"></i></a>

                                    <!-- Mega Menu -->
                                    <div
                                        class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-7--lg--scrolling"
                                        aria-labelledby="mega-menu-label-6" style="display: none;">
                                        <div class="row">
                                            {{-- دخترانه --}}
                                            <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productGirlList') }}"
                                                       class="nav-link g-color-primary--hover p-0">پوشاک دخترانه</a>
                                                </h4>
                                                <div id="accordion-02" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-02-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','00','a']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','00','a']) }}">زیر
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','10','b']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','11','b']) }}">شلوار</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','12','b']) }}">دامن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','13','b']) }}">جوراب</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','14','b']) }}">لگ</a>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','21','c']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','22','c']) }}">تاپ</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','23','c']) }}">تونیک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','24','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','25','c']) }}">پلیور</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','26','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','27','c']) }}">جلیقه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','28','c']) }}">هودی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','29','c']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','210','c']) }}">کاپشن</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-02-heading-08"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-02-body-08" data-toggle="collapse"
                                                                   data-parent="#accordion-02" aria-expanded="false"
                                                                   aria-controls="accordion-02-body-08">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس تمام تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-02-body-08" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-02-heading-08">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','30','d']) }}">لباس
                                                                            خواب</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','31','d']) }}">مانتو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','32','d']) }}">ست
                                                                            مدرسه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','33','d']) }}">سرهمی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-02-heading-09"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-02-body-09" data-toggle="collapse"
                                                                   data-parent="#accordion-02" aria-expanded="false"
                                                                   aria-controls="accordion-02-body-09">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    کیف
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-02-body-09" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-02-heading-09">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','40','e']) }}">مدرسه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','41','e']) }}">نوجوانان</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','42','e']) }}">کوله
                                                                            پشتی</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','50','f']) }}">دمپایی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','51','f']) }}">صندل</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','52','f']) }}">تخت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','53','f']) }}">مجلسی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','54','f']) }}">نیم
                                                                            بوت</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','55','f']) }}">بوت</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-02-heading-06"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-02-body-06" data-toggle="collapse"
                                                                   data-parent="#accordion-02" aria-expanded="false"
                                                                   aria-controls="accordion-02-body-06">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    ورزشی
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-02-body-06" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-02-heading-06">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','60','g']) }}">مایو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','61','h']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','62','h']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','63','h']) }}">شلوار
                                                                            اسلش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','64','h']) }}">دامن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','65','i']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','66','i']) }}">پولو
                                                                            شرت</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','67','j']) }}">ست
                                                                            لباس</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','68','l']) }}">کتانی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','69','l']) }}">کفش
                                                                            حرفه ای</a>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','70','p']) }}">
                                                                            کلاه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','71','p']) }}">
                                                                            هد بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','72','p']) }}">
                                                                            شال گردن</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','73','o']) }}">اکسسوری
                                                                            مو</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','74','q']) }}">
                                                                            عینک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','75','q']) }}">کراوات</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','76','q']) }}">پاپیون</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','77','q']) }}">ساس
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','78','q']) }}">دست
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','79','q']) }}">کمر
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['2','710','q']) }}">چتر</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- پسرانه --}}
                                            <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productBoyList') }}"
                                                       class="nav-link g-color-primary--hover p-0">پوشاک پسرانه</a>
                                                </h4>
                                                <div id="accordion-03" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-03-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','00','a']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','01','a']) }}">زیر
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','10','b']) }}">شلوارک</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','11','b']) }}">شلوار</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','12','b']) }}">جوراب</a>
                                                                    </li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','21','c']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','22','c']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','23','c']) }}">جلیقه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','24','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','25','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','26','c']) }}">سویشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','27','c']) }}">هودی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','28','c']) }}">کاپشن</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-03-heading-09"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-03-body-09" data-toggle="collapse"
                                                                   data-parent="#accordion-03" aria-expanded="false"
                                                                   aria-controls="accordion-03-body-09">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس تمام تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-03-body-09" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-03-heading-09">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','30','d']) }}">لباس
                                                                            خواب</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','31','d']) }}">ست
                                                                            مدرسه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','32','d']) }}">کت
                                                                            و
                                                                            شلوار</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','33','d']) }}">سرهمی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-03-heading-08"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-03-body-08" data-toggle="collapse"
                                                                   data-parent="#accordion-03" aria-expanded="false"
                                                                   aria-controls="accordion-03-body-08">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    کیف
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-03-body-08" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-03-heading-08">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','40','e']) }}">مدرسه</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','41','e']) }}">پول</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','42','e']) }}">کوله
                                                                            پشتی</a></li>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','50','f']) }}">دمپایی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','51','f']) }}">صندل</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','52','f']) }}">کفش
                                                                            تخت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','53','f']) }}">نیم
                                                                            بوت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','54','f']) }}">بوت</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-03-heading-07"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-03-body-07" data-toggle="collapse"
                                                                   data-parent="#accordion-03" aria-expanded="false"
                                                                   aria-controls="accordion-03-body-07">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    ورزشی
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-03-body-07" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-03-heading-07">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','60','g']) }}">مایو</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','61','h']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','62','h']) }}">شلوار
                                                                            اسلش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','63','i']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','64','i']) }}">پولو
                                                                            شرت</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','65','j']) }}">ست
                                                                            لباس</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','66','l']) }}">کفش
                                                                            کتانی</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','67','l']) }}">کفش
                                                                            حرفه ای</a>
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
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
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
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','70','p']) }}">
                                                                            کلاه</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','71','p']) }}">
                                                                            شال گردن</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','72','q']) }}">
                                                                            عینک</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','73','q']) }}">کراوات</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','74','q']) }}">پاپیون</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','75','q']) }}">ساس
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','76','q']) }}">کمر
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['3','77','q']) }}">چتر</a>
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

                                {{--نوزادی--}}
                                <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                    data-animation-out="fadeOut" data-position="right" id="kidsCat">
                                    <a id="mega-menu-label-9" class="nav-link g-px-0 g-color-primary--hover" href="#"
                                       aria-haspopup="true"
                                       aria-expanded="false">پوشاک نوزادی
                                        <i class="icon-arrow-down align-middle g-font-size-11 g-mr-7"></i></a>

                                    <!-- Mega Menu -->
                                    <div
                                        class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mb-25 g-mt-17 g-mt-7--lg--scrolling"
                                        aria-labelledby="mega-menu-label-9" style="display: none;">
                                        <div class="row">
                                            {{-- دخترانه --}}
                                            <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productBabyGirlList') }}"
                                                       class="nav-link g-color-primary--hover p-0">پوشاک نوزادی
                                                        دخترانه</a>
                                                </h4>
                                                <div id="accordion-00" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-00"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-00" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-00">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس زیر
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-00" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-00-heading-00">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','00','a']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','01','a']) }}">زیر
                                                                            پوش</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-01" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس پایین تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-01" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-00-heading-01">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','10','b']) }}">شلوار</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','11','b']) }}">دامن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','12','b']) }}">لگ</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-02"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-02" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس بالا تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-02" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-00-heading-02">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','21','c']) }}">پولو
                                                                            شرت</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','22','c']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','23','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','24','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','25','c']) }}">هودی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-30"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-30" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-30">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس تمام تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-30" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-00-heading-30">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','30','d']) }}">سرهمی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-03"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-03" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    کفش
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-03" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-01-heading-03">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','40','f']) }}">تخت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','41','f']) }}">صندل</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','42','f']) }}">کتانی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','43','f']) }}">پاپوش</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-00-heading-04"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-00-body-04" data-toggle="collapse"
                                                                   data-parent="#accordion-00" aria-expanded="false"
                                                                   aria-controls="accordion-00-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    اکسسوری
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-00-body-04" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-00-heading-04">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    {{--                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','50','q']) }}">اسباب--}}
                                                                    {{--                                                                        بازی</a></li>--}}
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','51','p']) }}">سر
                                                                            پوش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','52','p']) }}">هد
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','53','o']) }}">تل
                                                                            مو</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','54','q']) }}">پیش
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','55','q']) }}">ناف
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','56','q']) }}">دستکش
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','57','q']) }}">ست
                                                                            کلاه و دستکش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['4','58','q']) }}">کیسه
                                                                            خواب</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- پسرانه --}}
                                            <div class="col-sm-6 col-md-4 g-mb-15 g-mb-0--sm">
                                                <h4 class="h5 g-font-weight-600 g-mb-15">
                                                    <a href="{{ route('productBabyBoyList') }}"
                                                       class="nav-link g-color-primary--hover p-0">پوشاک نوزادی
                                                        پسرانه</a>
                                                </h4>
                                                <div id="accordion-09" class="u-accordion" role="tablist"
                                                     aria-multiselectable="true">
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-00"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-00" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-00">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس زیر
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-00" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-00">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','00','a']) }}">شورت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','01','a']) }}">زیر
                                                                            پوش</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-01"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-01" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-01">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس پایین تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-01" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-01">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','10','b']) }}">شلوار</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-02"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-02" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-02">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس بالا تنه
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-02" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-02">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','20','c']) }}">تیشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','21','c']) }}">پولوشرت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','22','c']) }}">پیراهن</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','23','c']) }}">بلوز</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','24','c']) }}">ژاکت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','25','c']) }}">هودی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-30"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0 g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-30" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-30">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    لباس زیر
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-30" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-30">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','30','d']) }}">سرهمی</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-03"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-03" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-03">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    کفش
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-03" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-03">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','40','f']) }}">تخت</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','41','f']) }}">صندل</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','42','f']) }}">کتانی</a>
                                                                    </li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','43','f']) }}">پاپوش</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="direction: rtl"
                                                         class="card rounded-0 g-bg-transparent g-brd-none">
                                                        <div id="accordion-09-heading-04"
                                                             class="u-accordion__header g-pt-0 g-pr-0 g-pl-0"
                                                             role="tab">
                                                            <h5 class="mb-0  g-font-size-default g-font-weight-700">
                                                                <a class="collapsed d-block g-color-black g-text-underline--none--hover"
                                                                   href="#accordion-09-body-04" data-toggle="collapse"
                                                                   data-parent="#accordion-09" aria-expanded="false"
                                                                   aria-controls="accordion-09-body-04">
                                                        <span class="float-right u-accordion__control-icon g-ml-10">
                                                          <i class="fa fa-angle-down"></i>
                                                          <i class="fa fa-angle-up"></i>
                                                        </span>
                                                                    اکسسوری
                                                                </a>
                                                            </h5>
                                                        </div>
                                                        <div id="accordion-09-body-04" class="collapse" role="tabpanel"
                                                             aria-labelledby="accordion-09-heading-04">
                                                            <div class="u-accordion__body g-color-gray-dark-v5 p-0">
                                                                <ul class="list-unstyled p-0  g-pr-20 g-pb-15">
                                                                    {{--                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','50','q']) }}">اسباب--}}
                                                                    {{--                                                                        بازی</a></li>--}}
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','51','p']) }}">سر
                                                                            پوش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','52','p']) }}">هد
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','53','q']) }}">پیش
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','54','q']) }}">ناف
                                                                            بند</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','55','q']) }}">دستکش
                                                                        </a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','56','q']) }}">ست
                                                                            کلاه و دستکش</a></li>
                                                                    <li class="g-mb-5"><a class="g-color-black"
                                                                                          href="{{ route('menuProduct',['5','57','q']) }}">کیسه
                                                                            خواب</a></li>
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
                                    <a id="mega-menu-label-2" class="nav-link g-px-0 g-color-primary--hover" href="#"
                                       aria-haspopup="true"
                                       aria-expanded="false">فروش ویژه
                                        <i class="icon-arrow-down align-middle g-font-size-11 g-mr-7"></i></a>

                                    <!-- Mega Menu -->
                                    <div
                                        class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-font-weight-400 g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-mb-25 g-pa-30 g-mt-17 g-mt-7--lg--scrolling animated hs-position-right fadeOut"
                                        aria-labelledby="mega-menu-label-2" style="display: none;">
                                        <div class="row align-items-stretch text-left">
                                            <div class="col-md-4 g-mb-30 g-mb-0--md">
                                                <article class="u-block-hover">
                                                    <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                         src="{{ asset('img/Other/bronze.jpg?v=445')}}"
                                                         alt="تخفیف برنز تاناکورا">
                                                    <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                        <h2 class="h5 mb-0 g-color-black">تخفیف های برنز</h2>
                                                        <span class="d-block g-color-black">15 تا 25 درصد</span>
                                                    </div>
                                                    <a class="u-link-v2"
                                                       href="{{route('spacialSelling',[15, 25])}}"></a>
                                                </article>
                                            </div>

                                            <div class="col-md-4 g-mb-30 g-mb-0--md">
                                                <article class="u-block-hover">
                                                    <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                         src="{{ asset('img/Other/silver.jpg?v=445')}}"
                                                         alt="تخفیف نقره ای تاناکورا">
                                                    <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                        <h2 class="h5 mb-0 g-color-black">تخفیف های نقره ای</h2>
                                                        <span class="d-block g-color-black">25 تا 35 درصد</span>
                                                    </div>
                                                    <a class="u-link-v2"
                                                       href="{{route('spacialSelling',[25, 35])}}"></a>
                                                </article>
                                            </div>

                                            <div class="col-md-4 g-mb-30 g-mb-0--md">
                                                <article class="u-block-hover">
                                                    <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                         src="{{ asset('img/Other/gold.jpg?v=445')}}"
                                                         alt="تخفیف طلایی تاناکورا">
                                                    <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                        <h2 class="h5 mb-0 g-color-black">تخفیف های طلایی</h2>
                                                        <span class="d-block g-color-black">35 درصد به بالا</span>
                                                    </div>
                                                    <a class="u-link-v2"
                                                       href="{{route('spacialSelling',[35, 99])}}"></a>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Mega Menu -->
                                </li>
                            </ul>
                        </div>
                        <!-- End Navigation -->

                        <hr class="force-col-12 g-brd-gray-light-v5 smallDevice g-mt-20 g-mb-10" id="otherMenuHr">

                        <!-- Other Menu -->
                        <div class="d-flex justify-content-between force-col-12 g-pr-10 g-pl-10" id="otherMenu">
                            <!-- Basket -->
                            <div class="u-basket d-inline-block g-valign-middle g-mr-30 g-pt-8" id="myBasket">
                                <a href="#" onclick="cart()" id="basket-bar-invoker"
                                   data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="سبد خرید"
                                   class="u-icon-v1 g-color-black g-text-underline--none--hover g-width-20 g-height-20">
                                <span id="basketNum"
                                      class="u-badge-v1--sm g-color-white g-bg-primary g-rounded-50x">0</span>
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                            <!-- End Basket -->

                            <!-- Search and Login -->
                            <div class="d-flex">
                                <div class="d-inline-block">
                                    <!-- Login -->
                                    @guest
                                        <div class="d-inline-block g-valign-middle g-mr-25 g-pt-8">
                                            <a href="{{ route('loginMode') }}" id="login"
                                               class="u-icon-v1 g-color-black g-text-underline--none--hover g-width-20 g-height-20"
                                               data-toggle="tooltip"
                                               data-placement="bottom"
                                               title="ورود یا ثبت نام">
                                                <i style="z-index: 0" class="fa fa-user"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="g-pt-10 g-mr-15 g-mr-25--lg">
                                            <a href="{{route('userProfile', ['id' => 'navigation'])}}" id="login"
                                               title="اطلاعات کاربری"
                                               class="d-flex nav-link g-color-black h6 g-text-underline--none--hover p-0 g-color-primary--hover loginBtn">
                                                @if(Auth::user()->name===null || Auth::user()->name==='') {{Auth::user()->Mobile}} @else  {{Auth::user()->name}} @endif

                                                <i id="settingIcon" class="icon-settings g-font-size-16 g-ml-5"></i>
                                            </a>
                                        </div>
                                        {{--                                    @endif--}}
                                    @endguest
                                </div>
                                <!-- End Login -->

                                <!-- Search -->
                                <div class="d-inline-block g-pos-rel g-valign-middle g-pt-6">
                                    <a href="#"
                                       class="g-font-size-18 g-color-black"
                                       aria-controls="searchform-1"
                                       data-toggle="tooltip"
                                       data-placement="bottom"
                                       title="جستجو"
                                       id="searchIcon"
                                       data-dropdown-target="#searchform-1">
                                        <i class="fa fa-search"></i>
                                    </a>

                                    <!-- Search Form -->
                                    <form style="border-top: 2px solid #72c02c" id="searchForm"
                                          class="d-none outSideClick u-searchform-v1 u-dropdown--hidden g-bg-white g-pa-10 g-mt-17 g-mt-10--lg--scrolling">
                                        <div style="direction: rtl">
                                            <input style="direction:rtl;font-family: Yekan; font-size: 16px !important;"
                                                   class="form-control rounded-0 u-form-control" type="search"
                                                   oninput="productSearch('menuProductSearch',$(this).attr('value'))"
                                                   onclick="$('#menuProductSearch').removeClass('d-none')"
                                                   id="searchInput"
                                                   placeholder="تایپ کن و بگرد..">
                                            <ul id="menuProductSearch"
                                                class="ajaxDropDown p-0 outSideClick g-mt-5"></ul>
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
    @endswitch

@endsection
