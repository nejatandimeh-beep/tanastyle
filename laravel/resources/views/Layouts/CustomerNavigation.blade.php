@section('CustomerNavigation')
    <body class="customerPanel">
    <div id="load" class="load"></div>
    <span id="loginAlert" class="d-none">{{ (isset(Auth::user()->id)) ? 'login':'logout' }}</span>
    <header id="js-header" class="u-header u-header--static">
        <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-pt-10 g-pb-10--lg">
            <nav class="js-mega-menu hs-menu-initialized hs-menu-horizontal navbar navbar-toggleable-md">
                <div class="container g-px-0 customerNavigation" id="HeaderContainer">
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
                        <img src="{{ asset('img/Logo/logo.svg') }}" alt="Image Description" width="120"
                             class="g-pt-7 g-pt-0--lg">
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                    <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pb-20 g-pb-0--lg g-pt-5--lg" id="navBar">
                        <ul style="direction: rtl" class="navbar-nav g-font-weight-600 ml-auto p-0">
                            {{--صفحه اصلی--}}
                            <li class="nav-item g-mx-20--lg">
                                <a href="{{ url('/') }}" class="nav-link g-px-0 g-color-primary--hover">صفحه نخست <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            {{--زنانه--}}
                            <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn"
                                data-animation-out="fadeOut" data-position="right" id="femaleCat">
                                <a id="mega-menu-label-4" class="nav-link g-px-0" href="{{ route('productFemaleList') }}" aria-haspopup="true"
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
                                                <a href="{{ route('productFemaleClothesList') }}" class="nav-link g-color-primary--hover p-0">لباس</a>
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
                                                                                      href="{{ route('menuProduct',['0','00','a','شورت زنانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','01','a','سوتین زنانه']) }}">سوتین</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','02','a','ست لباس زیر زنانه']) }}">ست
                                                                        لباس
                                                                        زیر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','03','a','زیر پوش زنانه']) }}">زیر
                                                                        پوش</a>
                                                                </li>
                                                                <li style="direction: rtl" class="g-mb-5"><a
                                                                        class="g-color-black"
                                                                        href="{{ route('menuProduct',['0','04','a','گن زنانه']) }}">گن</a>
    {{--                                                                    <span--}}
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
                                                                                      href="{{ route('menuProduct',['0','10','b','شلوارک زنانه']) }}">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','11','b','شلوار زنانه']) }}">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="#">شلوار
                                                                        راحتی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','12','b','دامن زنانه']) }}">دامن</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','13','b','لگ زنانه']) }}">لگ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','14','b','جوراب زنانه']) }}">جوراب</a></li>
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
                                                                                      href="{{ route('menuProduct',['0','20','c','تیشرت زنانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','21','c','پولوشرت زنانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','22','c','تاپ زنانه']) }}">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','23','c','تونیک زنانه']) }}">تونیک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','24','c','پیراهن زنانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','25','c','شومیز زنانه']) }}">شومیز</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','26','c','بلوز زنانه']) }}">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','27','c','پلیور زنانه']) }}">پلیور</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','28','c','ژاکت زنانه']) }}">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','29','c','جلیقه زنانه']) }}">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','210','c','هودی زنانه']) }}">هودی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','211','c','سویشرت زنانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','212','c','کت تک زنانه']) }}">کت
                                                                        تک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','213','c','کت شلوار زنانه']) }}">کت
                                                                        پاییزه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','214','c','کت زمستانه زنانه']) }}">کت
                                                                        زمستانه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','215','c','کاپشن زنانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['0','30','d','لباس خواب زنانه']) }}">لباس
                                                                        خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','31','d','مانتو زنانه']) }}">مانتو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','32','d','پانچو زنانه']) }}">پانچو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','33','d','رویه زنانه']) }}">رویه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','34','d','شنل زنانه']) }}">شنل</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','35','d','کت شلوار زنانه']) }}">کت
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','36','d','ست لباس مجلسی زنانه']) }}">ست
                                                                        لباس
                                                                        مجلسی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','37','d','ست لباس اداری زنانه']) }}">ست
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
                                                <a href="{{ route('productFemaleShoesList') }}" class="nav-link g-color-primary--hover p-0">کفش</a>
                                            </h4>
                                            <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','50','f','دمپایی زنانه']) }}">دمپایی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','51','f','صندل زنانه']) }}">صندل</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','52','f','کفش تخت زنانه']) }}">تخت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','53','f','کفش پاشنه زنانه']) }}">پاشنه دار</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','54','f','کفش روزمره زنانه']) }}">روزمره</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','55','f','نیم بوت زنانه']) }}">نیم بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','56','f','بوت زنانه']) }}">بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','shoeCare','f','مراقبت کفش']) }}">مراقبت کفش</a></li>
                                            </ul>

                                            <h4 class="h5 g-font-weight-600 g-mb-15">
                                                <a href="{{ route('productFemaleBagsList') }}" class="nav-link g-color-primary--hover p-0">کیف</a>
                                            </h4>
                                            <ul class="list-unstyled p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','40','e','کیف پول زنانه']) }}">پول</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','41','e','کیف کارت زنانه']) }}">کارت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','42','e','کیف دستی زنانه']) }}">دستی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','43','e','کیف دوشی زنانه']) }}">دوشی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','44','e','کیف اداری زنانه']) }}">اداری</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','45','e','کیف سفری زنانه']) }}">سفری</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','46','e','کوله پشتی زنانه']) }}">کوله پشتی</a></li>
                                            </ul>
                                        </div>
                                        {{-- ورزشی --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">
                                                <a href="{{ route('productFemaleSportsList') }}" class="nav-link g-color-primary--hover p-0">ورزشی</a>
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
                                                                                      href="{{ route('menuProduct',['0','600','g','مایو ورزشی زنانه']) }}">مایو</a>
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
                                                                                      href="{{ route('menuProduct',['0','610','h','شورت ورزشی زنانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','611','h','شلوارک ورزشی زنانه']) }}">شلوارک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','612','h','شلوار اسلش زنانه']) }}">شلوار اسلش</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','613','h','دامن ورزشی زنانه']) }}">دامن</a>
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
                                                                                      href="{{ route('menuProduct',['0','620','i','تیشرت ورزشی زنانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','621','i','پولوشرت ورزشی زنانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','622','i','تاپ ورزشی زنانه']) }}">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','623','i','پیراهن ورزشی زنانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','624','i','جلیقه ورزشی زنانه']) }}">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','625','i','هودی ورزشی زنانه']) }}">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','626','i','سویشرت ورزشی زنانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','627','i','کاپشن ورزشی زنانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['0','630','j','ست ورزشی زنانه']) }}">ست ورزشی</a></li>
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
                                                                                      href="{{ route('menuProduct',['0','640','k','ساک ورزشی زنانه']) }}">ساک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','641','k','کوله ورزشی زنانه']) }}">کوله
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
                                                                                      href="{{ route('menuProduct',['0','650','l','کفش ورزشی ساده زنانه']) }}">ساده</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','651','l','کتانی زنانه']) }}">کتانی
                                                                    </a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','652','l','کفش حرفه ای ورزشی زنانه']) }}">حرفه ای</a></li>
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','ProSportCap','m','کلاه حرفه ای ورزشی زنانه']) }}">کلاه حرفه ای</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SportHeadBand','m','هد بند ورزشی زنانه']) }}">هد
                                                                        بند</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SportGlasses','m','عینک ورزشی زنانه']) }}">
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SwimmingNoseClip','m','بینی بند ورزشی زنانه']) }}">بینی
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','Earplugs','m','گوش بند ورزشی زنانه']) }}">گوش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','ArmBand','m','بازو بند ورزشی زنانه']) }}">بازو
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SportWristBand','m','مچ بند ورزشی زنانه']) }}">مچ
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SportGloves','m','دستکش ورزشی زنانه']) }}">
                                                                        دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','CalfSupport','m','ساق ورزشی زنانه']) }}">
                                                                        ساق</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','SportSocks','m','جوراب ورزشی زنانه']) }}">انواع
                                                                        جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['0','CanteenBottle','m','قم قمه']) }}">قم
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
                                                <a href="{{ route('productFemaleRhinestoneList') }}" class="nav-link g-color-primary--hover p-0">اکسسوری</a>
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
                                                                                      href="{{ route('menuProduct',['0','700','n','گوشواره زنانه']) }}">گوشواره</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','701','n','گردنبند زنانه']) }}">گردن
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','702','n','النگو زنانه']) }}">النگو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','703','n','دست بند زنانه']) }}">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','704','n','انگشتر زنانه']) }}">انگشتر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','705','n','پا بند زنانه']) }}">پا
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','706','n','ست بدلیجات زنانه']) }}">ست
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
                                                                                      href="{{ route('menuProduct',['0','710','o','تاج زنانه']) }}">تاج
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','711','o','گیره مو زنانه']) }}">گیره
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','712','o','کش مو زنانه']) }}">کش
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','713','o','کلیپس زنانه']) }}">کلیپس</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','714','o','سنجاقک زنانه']) }}">سنجاقک</a></li>
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
                                                                                      href="{{ route('menuProduct',['0','720','p','کلاه زمستانی زنانه']) }}">کلاه
                                                                        زمستانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','721','p','روسری زنانه']) }}">روسری</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','722','p','شال زنانه']) }}">شال</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','723','p','شال گردن زنانه']) }}">شال
                                                                        گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','724','p','ست کلاه و شال گردن زنانه']) }}">ست
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
                                                                                      href="{{ route('menuProduct',['0','730','q','عینک زنانه']) }}">عینک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','731','q','کرائات زنانه']) }}">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','732','q','پاپیون زنانه']) }}">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','733','q','ساس بند زنانه']) }}">ساس
                                                                        بند</a></li>
{{--                                                                <li class="g-mb-5"><a class="g-color-black"--}}
{{--                                                                                      href="{{ route('menuProduct',['0','734','q']) }}">ساعت</a>--}}
{{--                                                                </li>--}}
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','735','q','کمربند زنانه']) }}">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','736','q','چتر زنانه']) }}">چتر</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['0','737','q','ست هدیه زنانه']) }}">ست
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
                                <a id="mega-menu-label-5" class="nav-link g-px-0" href="{{ route('productMaleList') }}" aria-haspopup="true"
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
                                                <a href="{{ route('productMaleClothesList') }}" class="nav-link g-color-primary--hover p-0">لباس</a>
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','00','a','شورت مردانه']) }}">شورت
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','01','a','زیر پوش مردانه']) }}">زیر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','02','a','ست لبسا زیر مردانه']) }}">ست
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
                                                                                      href="{{ route('menuProduct',['1','10','b','شلوارک مردانه']) }}">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','11','b','شلوار مردانه']) }}">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','12','b','شلوار راحتی مردانه']) }}">شلوار
                                                                        راحتی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','13','b','جوراب مردانه']) }}">جوراب</a></li>
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
                                                                                      href="{{ route('menuProduct',['1','20','c','تیشرت مردانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','21','c','پولوشرت مردانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','22','c','پیراهن مردانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','23','c','بلوز مردانه']) }}">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','24','c','ژاکت مردانه']) }}">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','25','c','جلیقه مردانه']) }}">جلیقه
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','26','c','هودی مردانه']) }}">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','27','c','سویشرت مردانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','28','c','کت تک مردانه']) }}">کت
                                                                        تک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','29','c','کت زمستانه مردانه']) }}">کت
                                                                        زمستانه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','210','c','کاپشن مردانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['1','30','d','لباس خواب مردانه']) }}">لباس
                                                                        خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','31','d','کت و شلوار مردانه']) }}">کت و
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','32','d','پالتو مردانه']) }}">پالتو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','33','d','سرهمی مردانه']) }}">سرهمی</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- کیف و کفش --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">
                                                <a href="{{ route('productMaleShoesList') }}" class="nav-link g-color-primary--hover p-0">کفش</a>
                                            </h4>
                                            <ul class="list-unstyled g-mb-25 p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','50','f','دمپایی مردانه']) }}">دمپایی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','51','f','صندل مردانه']) }}">صندل</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','52','f','کفش تخت مردانه']) }}">تخت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','53','f','کفش روزمره مردانه']) }}">روزمره</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','54','f','نیم بوت مردانه']) }}">نیم بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','55','f','بوت مردانه']) }}">بوت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','shoeCare','f','مراقبت کفش']) }}">مراقبت کفش</a></li>
                                            </ul>

                                            <h4 class="h5 g-font-weight-600 g-mb-15">
                                                <a href="{{ route('productMaleBagsList') }}" class="nav-link g-color-primary--hover p-0">کیف</a>
                                            </h4>
                                            <ul class="list-unstyled p-0 g-pl-40--lg">
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','40','e','کیف پول مردانه']) }}">پول</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','41','e','کیف کارت مردانه']) }}">کارت</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','42','e','کیف دستی مردانه']) }}">دستی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','43','e','کیف دوشی مردانه']) }}">دوشی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','44','e','کیف اداری مردانه']) }}">اداری</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','45','e','کیف سفری مردانه']) }}">سفری</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','46','e','کوله پشتی مردانه']) }}">کوله پشتی</a></li>
                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','baggae','e','چمدان مردانه']) }}">چمدان</a></li>
                                            </ul>
                                        </div>
                                        {{-- ورزشی --}}
                                        <div class="col-sm-6 col-md-3 g-mb-15 g-mb-0--sm">
                                            <h4 class="h5 g-font-weight-600 g-mb-15">
                                                <a href="{{ route('productMaleSportsList') }}" class="nav-link g-color-primary--hover p-0">ورزشی</a>
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
                                                                                      href="{{ route('menuProduct',['1','600','g','مایو ورزشی مردانه']) }}">مایو</a>
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
                                                                                      href="{{ route('menuProduct',['1','610','h','شرورت ورزشی مردانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','611','h','شلوار اسلش مردانه']) }}">شلوار اسلش</a></li>
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
                                                                                      href="{{ route('menuProduct',['1','620','i','تیشرت ورزشی مردانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','621','i','پولوشرت ورزشی مردانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','622','i','جلیقه ورزشی مردانه']) }}">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','623','i','هودی ورزشی مردانه']) }}">هودی</a>
                                                                </li>2
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','624','i','سویشرت ورزشی مردانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','625','i','کاپشن ورزشی مردانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['1','640','k','ساک ورزشی مردانه']) }}">ساک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','641','k','کوله ورزشی مردانه']) }}">کوله
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
                                                                                      href="{{ route('menuProduct',['1','640','l','کفش ساده ورزشی مردانه']) }}">ساده</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','641','l','صندل ورزشی مردانه']) }}">صندل
                                                                    </a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','642','l','کتانی مردانه']) }}">کتانی
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','ProSportCap','m','کلاه حرفه ای مردانه']) }}">
                                                                        کلاه حرفه ای</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SportHeadBand','m','هد بند مردانه']) }}">هد
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SportGlasses','m','عینک مردانه']) }}">
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SwimmingNoseClip','m','بینی بند مردانه']) }}">بینی
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','Earplugs','m','گوش بند مردانه']) }}">گوش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','ArmBand','m','بازو بند مردانه']) }}">بازو
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SportWristBand','m','مچ بند مردانه']) }}">مچ
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SportGloves','m','دستکش مردانه']) }}">
                                                                        دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','CalfSupport','m','ساق مردانه']) }}">
                                                                        ساق</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','SportSocks','m','جوراب مردانه']) }}">
                                                                        جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','CanteenBottle','m','قم قمه']) }}">قم
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
                                                <a href="{{ route('productMaleRhinestoneList') }}" class="nav-link g-color-primary--hover p-0">بدلیجات</a>
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','700','n','گردن بند مردانه']) }}">گردن
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','701','n','دست بند مردانه']) }}">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','702','n','انگشتر مردانه']) }}">انگشتر</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','703','n','ست بدلیجات مردانه']) }}">ست
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','710','p','کلاه مردانه']) }}">کلاه
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','711','p','شال گردن مردانه']) }}">شال
                                                                        گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['1','712','p','ست کلاه و شال گردن مردانه']) }}">ست
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
                                                                                      href="{{ route('menuProduct',['1','720','q','عینک مردانه']) }}">عینک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','721','q','کراوات مردانه']) }}">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','722','q','پاپیون مردانه']) }}">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','723','q','ساس بند مردانه']) }}">ساس
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','724','q','کمر یند مردانه']) }}">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','725','q','چتر مردانه']) }}">چتر</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['1','726','q','ست هدیه مردانه']) }}">ست
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
                                <a id="mega-menu-label-6" class="nav-link g-px-0" href="#" aria-haspopup="true"
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
                                                <a href="{{ route('productGirlList') }}" class="nav-link g-color-primary--hover p-0">پوشاک دخترانه</a>
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
                                                                                      href="{{ route('menuProduct',['2','00','a','شورت دخترانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','00','a','زیر پوش دخترانه']) }}">زیر
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
                                                                                      href="{{ route('menuProduct',['2','10','b','شلوارک دخترانه']) }}">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','11','b','شلوار دخترانه']) }}">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','12','b','دامن دخترانه']) }}">دامن</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','13','b','جوراب دخترانه']) }}">جوراب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','14','b','لگ دخترانه']) }}">لگ</a>
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
                                                                                      href="{{ route('menuProduct',['2','20','c','تیشرت دخترانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','21','c','پولوشرت دخترانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','22','c','تاپ دخترانه']) }}">تاپ</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','23','c','تونیک دخترانه']) }}">تونیک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','24','c','بلوز دخترانه']) }}">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','25','c','پلیور دخترانه']) }}">پلیور</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','26','c','ژاکت دخترانه']) }}">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','27','c','جلیقه دخترانه']) }}">جلیقه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','28','c','هودی دخترانه']) }}">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','29','c','سویشرت دخترانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','210','c','کاپشن دخترانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['2','30','d','لباس خواب دخترانه']) }}">لباس خواب</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','31','d','مانتو دخترانه']) }}">مانتو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','32','d','ست مدرسه دخترانه']) }}">ست مدرسه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','33','d','سرهمی دخترانه']) }}">سرهمی</a></li>
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
                                                                                      href="{{ route('menuProduct',['2','40','e','کیف مدرسه دخترانه']) }}">مدرسه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','41','e','کیف نوجوانان دخترانه']) }}">نوجوانان</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','42','e','کوله پشتی دخترانه']) }}">کوله پشتی</a>
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
                                                                                      href="{{ route('menuProduct',['2','50','f','دمپایی دخترانه']) }}">دمپایی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','51','f','صندل دخترانه']) }}">صندل</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','52','f','کفش تخت دخترانه']) }}">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','53','f','کفش مجلسی دخترانه']) }}">مجلسی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','54','f','نیم بوت دخترانه']) }}">نیم
                                                                        بوت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','55','f','بوت دخترانه']) }}">بوت</a>
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
                                                                                      href="{{ route('menuProduct',['2','60','g','مایو ورزشی دخترانه']) }}">مایو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','61','h','شورت ورزشی دخترانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','62','h','شلوارک ورزشی دخترانه']) }}">شلوارک</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','63','h','شلوار اسلش دخترانه']) }}">شلوار اسلش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','64','h','دامن ورزشی دخترانه']) }}">دامن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','65','i','تیشرت ورزشی دخترانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','66','i','پولوشرت ورزشی دخترانه']) }}">پولو شرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','67','j','ست لباس ورزشی دخترانه']) }}">ست لباس</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','68','l','کتانی دخترانه']) }}">کتانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','69','l','کفش حرفه ای دخترانه']) }}">کفش حرفه ای</a>
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
                                                                                      href="{{ route('menuProduct',['2','70','p','کلاه دخترانه']) }}">
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','71','p','هد بند دخترانه']) }}">
                                                                        هد بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','72','p','شال گردن دخترانه']) }}">
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','73','o','اکسسوری مو دخترانه']) }}">اکسسوری
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','74','q','عینک دخترانه']) }}">
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','75','q','کراوات دخترانه']) }}">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','76','q','پاپیون دخترانه']) }}">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','77','q','ساس بند دخترانه']) }}">ساس بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','78','q','دست بند دخترانه']) }}">دست
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','79','q','کمر بند دخترانه']) }}">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['2','710','q','چتر دخترانه']) }}">چتر</a>
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
                                                <a href="{{ route('productBoyList') }}" class="nav-link g-color-primary--hover p-0">پوشاک پسرانه</a>
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
                                                                                      href="{{ route('menuProduct',['3','00','a','شورت پسرانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','01','a','زیرپوش پسرانه']) }}">زیر
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
                                                                                      href="{{ route('menuProduct',['3','10','b','شلوارک پسرانه']) }}">شلوارک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','11','b','شلوار پسرانه']) }}">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','12','b','جوراب پسرانه']) }}">جوراب</a></li>
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
                                                                                      href="{{ route('menuProduct',['3','20','c','تیشرت پسرانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','21','c','پولوشرت پسرانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','22','c','پیراهن پسرانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','23','c','جلیقه پسرانه']) }}">جلیقه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','24','c','ژاکت پسرانه']) }}">ژاکت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','25','c','بلوز پسرانه']) }}">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','26','c','سویشرت پسرانه']) }}">سویشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','27','c','هودی پسرانه']) }}">هودی</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','28','c','کاپشن پسرانه']) }}">کاپشن</a></li>
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
                                                                                      href="{{ route('menuProduct',['3','30','d','لباس خواب پسرانه']) }}">لباس خواب</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','31','d','ست مدرسه پسرانه']) }}">ست
                                                                        مدرسه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','32','d','کت و شلوار پسرانه']) }}">کت و
                                                                        شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','33','d','سرهمی پسرانه']) }}">سرهمی</a>
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
                                                                                      href="{{ route('menuProduct',['3','40','e','کیف مدرسه پسرانه']) }}">مدرسه</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','41','e','کیف پول پسرانه']) }}">پول</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','42','e','کوله پشتی پسرانه']) }}">کوله
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
                                                                                      href="{{ route('menuProduct',['3','50','f','دمپایی پسرانه']) }}">دمپایی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','51','f','صندل پسرانه']) }}">صندل</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','52','f','کفش تخت پسرانه']) }}">کفش تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','53','f','نیم بوت پسرانه']) }}">نیم بوت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','54','f','بوت پسرانه']) }}">بوت</a>
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
                                                                                      href="{{ route('menuProduct',['3','60','g','مایو ورزشی پسرانه']) }}">مایو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','61','h','شورت ورزشی پسرانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','62','h','شلوار اسلش پسرانه']) }}">شلوار اسلش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','63','i','تیشرت ورزشی پسرانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','64','i','پولوشرت ورزشی پسرانه']) }}">پولو شرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','65','j','ست لباس ورزشی پسرانه']) }}">ست لباس</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','66','l','کتانی پسرانه']) }}">کفش کتانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','67','l','کفش حرفه ای پسرانه']) }}">کفش حرفه ای</a>
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
                                                                                      href="{{ route('menuProduct',['3','70','p','کلاه پسرانه']) }}">
                                                                        کلاه</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','71','p','شال گردن پسرانه']) }}">
                                                                        شال گردن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','72','q','عینک پسرانه']) }}">
                                                                        عینک</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','73','q','کراوات پسرانه']) }}">کراوات</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','74','q','پاپیون پسرانه']) }}">پاپیون</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','75','q','ساس بند پسرانه']) }}">ساس
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','76','q','کمر بند پسرانه']) }}">کمر
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['3','77','q','چتر پسرانه']) }}">چتر</a>
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
                                <a id="mega-menu-label-9" class="nav-link g-px-0 g-color-primary--hover" href="#" aria-haspopup="true"
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
                                                <a href="{{ route('productBabyGirlList') }}" class="nav-link g-color-primary--hover p-0">پوشاک نوزادی دخترانه</a>
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
                                                                                      href="{{ route('menuProduct',['4','00','a','شورت نوزادی دخترانه']) }}">شورت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','01','a','زیر پوش نوزادی دخترانه']) }}">زیر پوش</a>
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
                                                                                      href="{{ route('menuProduct',['4','10','b','شلوار نوزادی دخترانه']) }}">شلوار</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','11','b','دامن نوزادی دخترانه']) }}">دامن</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','12','b','لگ نوزادی دخترانه']) }}">لگ</a>
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
                                                                                      href="{{ route('menuProduct',['4','20','c','تیشرت نوزادی دخترانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','21','c','پولو شرت نوزادی دخترانه']) }}">پولو شرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','22','c','پیراهن نوزادی دخترانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','23','c','بلوز نوزادی دخترانه']) }}">بلوز</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','24','c','ژاکت نوزادی دخترانه']) }}">ژاکت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','25','c','هودی نوزادی دخترانه']) }}">هودی</a></li>
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
                                                                                      href="{{ route('menuProduct',['4','30','d','سرهمی نوزادی دخترانه']) }}">سرهمی</a></li>
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
                                                                                      href="{{ route('menuProduct',['4','40','f','کفش تخت نوزادی دخترانه']) }}">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','41','f','صندل نوزادی دخترانه']) }}">صندل</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','42','f','کتانی نوزادی دخترانه']) }}">کتانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['4','43','f','پاپوش نوزادی دخترانه']) }}">پاپوش</a></li>
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','51','p','سرپوش نوزادی دخترانه']) }}">سر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','52','p','هد بند نوزادی دخترانه']) }}">هد
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','53','o','تل نوزادی دخترانه']) }}">تل
                                                                        مو</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','54','q','پیشبند نوزادی دخترانه']) }}">پیش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','55','q','نافبند نوزادی دخترانه']) }}">ناف
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','56','q','دستکش نوزادی دخترانه']) }}">دستکش
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','57','q','ست کلاه و دستکش نوزادی دخترانه']) }}">ست
                                                                        کلاه و دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['4','58','q','کیسه خواب نوزادی دخترانه']) }}">کیسه
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
                                                <a href="{{ route('productBabyBoyList') }}" class="nav-link g-color-primary--hover p-0">پوشاک نوزادی پسرانه</a>
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
                                                                                      href="{{ route('menuProduct',['5','00','a','شورت نوزادی پسرانه']) }}">شورت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','01','a','زیر پوش نوزادی پسرانه']) }}">زیر پوش</a></li>
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
                                                                                      href="{{ route('menuProduct',['5','10','b','شلوار نوزادی پسرانه']) }}">شلوار</a></li>
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
                                                                                      href="{{ route('menuProduct',['5','20','c','تیشرت نوزادی پسرانه']) }}">تیشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','21','c','پولوشرت نوزادی پسرانه']) }}">پولوشرت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','22','c','پیراهن نوزادی پسرانه']) }}">پیراهن</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','23','c','بلوز نوزادی پسرانه']) }}">بلوز</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','24','c','ژاکت نوزادی پسرانه']) }}">ژاکت</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','25','c','هودی نوزادی پسرانه']) }}">هودی</a>
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
                                                                                      href="{{ route('menuProduct',['5','30','d','سرهمی نوزادی پسرانه']) }}">سرهمی</a>
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
                                                                                      href="{{ route('menuProduct',['5','40','f','کفش تخت نوزادی پسرانه']) }}">تخت</a>
                                                                </li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','41','f','صندل نوزادی پسرانه']) }}">صندل</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','42','f','کتانی نوزادی پسرانه']) }}">کتانی</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black"
                                                                                      href="{{ route('menuProduct',['5','43','f','پاپوش نوزادی پسرانه']) }}">پاپوش</a></li>
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
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','51','p','سرپوش نوزادی پسرانه']) }}">سر
                                                                        پوش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','52','p','هد بند نوزادی پسرانه']) }}">هد
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','53','q','پیشبند نوزادی پسرانه']) }}">پیش
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','54','q','ناف بند نوزادی پسرانه']) }}">ناف
                                                                        بند</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','55','q','شورت نوزادی پسرانه']) }}">دستکش
                                                                    </a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','56','q','ست کلاه و دستکش نوزادی پسرانه']) }}">ست
                                                                        کلاه و دستکش</a></li>
                                                                <li class="g-mb-5"><a class="g-color-black" href="{{ route('menuProduct',['5','57','q','کیه خواب نوزادی پسرانه']) }}">کیسه
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
                                <a id="mega-menu-label-2" class="nav-link g-px-0" href="#" aria-haspopup="true"
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
                                                     src="{{ asset('img/Other/bronze.jpg?v=445')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های برنز</h2>
                                                    <span class="d-block g-color-black">15 تا 25 درصد</span>
                                                </div>
                                                <a class="u-link-v2" href="{{route('spacialSelling',[15, 25])}}"></a>
                                            </article>
                                        </div>

                                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                                            <article class="u-block-hover">
                                                <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                     src="{{ asset('img/Other/silver.jpg?v=445')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های نقره ای</h2>
                                                    <span class="d-block g-color-black">25 تا 35 درصد</span>
                                                </div>
                                                <a class="u-link-v2" href="{{route('spacialSelling',[25, 35])}}"></a>
                                            </article>
                                        </div>

                                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                                            <article class="u-block-hover">
                                                <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8"
                                                     src="{{ asset('img/Other/gold.jpg?v=445')}}" alt="Image Description">
                                                <div class="g-pos-abs g-bottom-30 g-left-30 custom-bottom">
                                                    <h2 class="h5 mb-0 g-color-black">تخفیف های طلایی</h2>
                                                    <span class="d-block g-color-black">35 درصد به بالا</span>
                                                </div>
                                                <a class="u-link-v2" href="{{route('spacialSelling',[35, 99])}}"></a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Mega Menu -->
                            </li>
                            {{--برندها--}}
                            {{--                            <li class="nav-item g-mx-20--lg">--}}
                            {{--                                <a href="#" class="nav-link g-px-0 g-color-primary--hover">برندها</a>--}}
                            {{--                            </li>--}}
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
                                    {{--                                    @if(Auth::user()->email_verified_at === null)--}}
                                    {{--                                        <div class="g-pt-10 g-mr-15 g-mr-25--lg">--}}
                                    {{--                                            <a href="{{route('userProfile', ['id' => 'navigation'])}}" id="login"--}}
                                    {{--                                               class="d-flex nav-link g-color-red h6 g-text-underline--none--hover p-0 g-color-primary--hover"--}}
                                    {{--                                               data-toggle="tooltip"--}}
                                    {{--                                               data-placement="bottom"--}}
                                    {{--                                               title="شما هنوز اقدام به فعال سازی ایمیلتان نکرده اید"--}}
                                    {{--                                            >--}}
                                    {{--                                                <i class="fa fa-exclamation g-font-size-16 g-mr-5"></i>--}}

                                    {{--                                                {{ Auth::user()->name }}--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    @else--}}
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
                                        <ul id="menuProductSearch" class="ajaxDropDown p-0 outSideClick g-mt-5"></ul>
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
