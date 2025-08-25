@section('SellerNavigation')
    <body class="u-body--header-side-static-right">
{{--    <div id="load" class="load"></div>--}}
    <!-- Sidebar Navigation -->
    <div style="position:absolute;" id="js-header" class="u-header u-header--side"
         data-header-position="right"
         data-header-breakpoint="lg">
        <div
             class="u-header__sections-container g-bg-black g-brd-left--lg g-brd-gray-light-v5 g-py-10 g-py-10--lg g-px-14--lg">
            <div class="u-header__section u-header__section--dark">
                <nav class="navbar navbar-toggleable-md">
                    <div class="js-mega-menu container">
                        <!-- Responsive Toggle Button -->
                        <button
                            class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-right-0"
                            type="button"
                            aria-label="Toggle navigation"
                            aria-expanded="false"
                            aria-controls="navBar"
                            data-toggle="collapse"
                            data-target="#navBar">
                                <span class="hamburger hamburger--slider">
                                  <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                  </span>
                                </span>
                        </button>
                        <!-- End Responsive Toggle Button -->

                        <!-- Navigation -->
                        <div style="direction: rtl;"
                             class="collapse navbar-collapse align-items-center flex-sm-row g-mt-20 g-mt-0--lg g-mb-20"
                             id="navBar">
                            <ul class="navbar-nav ml-auto text-uppercase g-pr-10 g-font-weight-600 u-sub-menu-v1">
                                <!-- Home Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ url('/Seller-Panel') }}" class="nav-link">صفحه اصلی</a>
                                </li>

                                <!-- Profile Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ url('/Seller-Profile') }}" class="nav-link">اطلاعات کاربری</a>
                                </li>

                                <!-- Connection Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ url('/Seller-AdminConnection') }}" class="nav-link">ارتباط با مرکز</a>
                                </li>

                                <!-- Add Link pooshak Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-409"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-409">پوشاک<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-409"
                                         aria-labelledby="nav-link-409">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک زنانه
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- Add Dress Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لباس زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Female Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوتین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['02','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    لباس زیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['03','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['04','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Under -->
                                                    <br>
                                                    <!-- Female Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">پایین
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['11','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['12','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار
                                                                    راحتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['16','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['14','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['15','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Down -->
                                                    <br>
                                                    <!-- Female Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بالا
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تونیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شومیز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['26','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['27','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلیور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['28','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['29','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['210','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['211','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['212','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    تک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['213','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    پاییزه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['214','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    زمستانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['215','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Up -->
                                                    <br>
                                                    <!-- Female Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تمام
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['31','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مانتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['32','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پانچو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['33','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رویه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['34','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شنل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['35','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت و شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['36','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس مجلسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['37','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['38','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['39','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Complete -->
                                                </ul>
                                            </div>
                                            <!-- End Add Dress Product -->

                                            <!-- Add Bag Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کیف زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['40','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پول</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['41','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['42','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['43','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوشی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['44','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اداری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['45','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سفری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['46','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                            پشتی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['baggae','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چمدان</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Bag Product -->

                                            <!-- Add Shoe Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کفش زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['50','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['51','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['52','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['652','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتونی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['53','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاشنه
                                                            دار</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['54','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روزمره</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['55','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                            بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['56','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['ShoeCare','0']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مراقبت
                                                            کفش</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Shoe Product -->

                                            <!-- Add Sport Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ورزشی زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Female Sport Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['600','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایو</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Sport Dress_Under -->
                                                    <br>
                                                    <!-- Female Sport Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['610','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['611','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['612','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار اسلش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['613','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Sport Dress_Down -->
                                                    <br>
                                                    <!-- Female Sport Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['620','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['621','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['622','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['623','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['624','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['625','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['626','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['627','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Up -->
                                                    <br>
                                                    <!-- Female Sport Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['630','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست ورزشی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Complete -->
                                                    <br>
                                                    <!-- Female Sport Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['640','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['641','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                                    پشتی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Sport Bag -->
                                                    <br>
                                                    <!-- Female Sport Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['650','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['651','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل
                                                                    ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['653','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حرفه ای</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Sport Shoe -->
                                                    <br>
                                                    <!-- Female Sport Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ProSportCap','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    حرفه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportHeadBand','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGlasses','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SwimmingNoseClip','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بینی
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['Earplugs','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ArmBand','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازو
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportWristBand','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مچ
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGloves','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CalfSupport','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportSocks','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CanteenBottle','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قم
                                                                    قمه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Sport Accessory -->
                                                </ul>
                                            </div>
                                            <!-- End Add Sport Product -->

                                            <!-- Add Accessory Product -->
                                            <div class="col-lg-4 g-brd-x g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">اکسسوری زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['700','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشواره</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['701','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گردن بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['702','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">النگو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['703','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['704','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">انگشتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['705','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پا
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['706','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            مو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['710','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاج
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['711','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گیره
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['712','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کش
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['713','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلیپس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['714','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سنجاقک</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرپوش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['720','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['721','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روسری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['722','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['723','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['724','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سایر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['730','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['738','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">
                                                                    بند عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['731','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['732','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['733','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            {{--                                                            <li>--}}
                                                            {{--                                                                <a href="{{ route('AddProduct_askSize',['734','0']) }}"--}}
                                                            {{--                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>--}}
                                                            {{--                                                            </li>--}}
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['735','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['736','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['739','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['737','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    هدیه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سایر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['730','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['738','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">
                                                                    بند عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['731','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['732','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['733','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            {{--                                                            <li>--}}
                                                            {{--                                                                <a href="{{ route('AddProduct_askSize',['734','0']) }}"--}}
                                                            {{--                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>--}}
                                                            {{--                                                            </li>--}}
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['735','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['736','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['739','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['737','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    هدیه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Accessory Product -->
                                        </div>
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک مردانه
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- Add Dress Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لباس مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Male Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر
                                                                    پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['02','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    لباس زیر</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Under -->
                                                    <br>
                                                    <!-- Male Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">پایین
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['11','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['12','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار
                                                                    راحتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Down -->
                                                    <br>
                                                    <!-- Male Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بالا
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['26','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['27','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['28','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    تک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['29','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    زمستانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['210','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Up -->
                                                    <br>
                                                    <!-- Male Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تمام
                                                            تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['31','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت و شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['32','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['33','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Complete -->
                                                </ul>
                                            </div>
                                            <!-- End Add Dress Product -->

                                            <!-- Add Bag Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کیف مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['40','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پول</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['41','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['42','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['43','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوشی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['44','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اداری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['45','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سفری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['46','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                            پشتی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['baggae','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چمدان</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Bag Product -->

                                            <!-- Add Shoe Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کفش مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['50','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['51','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['52','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['53','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روزمره</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['652','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتونی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['54','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                            بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['55','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['ShoeCare','1']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مراقبت
                                                            کفش</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Shoe Product -->

                                            <!-- Add Sport Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ورزشی مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Male Sport Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['600','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایو</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Sport Dress_Under -->
                                                    <br>
                                                    <!-- Male Sport Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['610','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['611','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسلش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Down -->
                                                    <br>
                                                    <!-- Male Sport Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['620','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['621','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['622','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['623','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['624','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['625','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Up -->
                                                    <br>
                                                    <!-- Male Sport Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['630','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست ورزشی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Complete -->
                                                    <br>
                                                    <!-- Male Sport Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['640','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['641','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                                    پشتی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Sport Bag -->
                                                    <br>
                                                    <!-- Male Sport Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['650','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['651','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل
                                                                    ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['653','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حرفه ای</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Sport Shoe -->
                                                    <br>
                                                    <!-- Male Sport Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ProSportCap','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    حرفه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportHeadBand','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGlasses','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SwimmingNoseClip','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بینی
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['Earplugs','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ArmBand','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازو
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportWristBand','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مچ
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGloves','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CalfSupport','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportSocks','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CanteenBottle','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قم
                                                                    قمه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Sport Accessory -->
                                                </ul>
                                            </div>
                                            <!-- End Add Sport Product -->

                                            <!-- Add Accessory Product -->
                                            <div class="col-lg-4 g-brd-x g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">اکسسوری مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['700','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گردنبند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['701','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['702','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">انگشتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['703','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرپوش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['710','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['711','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['712','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سایر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['720','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['721','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['722','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['723','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['724','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['725','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['727','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['726','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست هدیه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Accessory Product -->
                                        </div>
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک بچگانه
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- دخترانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دخترانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Girl Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Dress_Under -->
                                                    <br>
                                                    <!-- Girl Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['11','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['12','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['14','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Dress_Down -->
                                                    <br>
                                                    <!-- Girl Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تونیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلیور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['26','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['27','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['28','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['29','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['210','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Dress_Up -->
                                                    <br>
                                                    <!-- Girl Complete  -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['31','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مانتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['32','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['33','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Complete  -->
                                                    <br>
                                                    <!-- Girl Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['40','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['41','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نوجوانان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['42','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله پشتی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Bag -->
                                                    <br>
                                                    <!-- Girl Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['50','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['51','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['52','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['68','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتونی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['53','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مجلسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['54','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                                    بوت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['55','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Shoe -->
                                                    <br>
                                                    <!-- Girl Sport -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['60','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['61','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['62','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['63','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار اسلش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['64','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار اسلش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['65','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['66','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولو شرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['67','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['69','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفش حرفه ای</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Sport  -->
                                                    <br>
                                                    <!-- Girl Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['70','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['71','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['72','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['73','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اکسسوری مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['74','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['75','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['76','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['77','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['78','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['79','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمر بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['710','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['711','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Accessory -->
                                                </ul>

                                            </div>

                                            <!-- پسرانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">پسرانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Boy Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Dress_Under -->
                                                    <br>
                                                    <!-- Boy Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['11','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['12','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Dress_Down -->
                                                    <br>
                                                    <!-- Boy Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['26','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['27','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['28','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Dress_Up -->
                                                    <br>
                                                    <!-- Boy Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['31','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['32','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت و شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['33','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Complete  -->
                                                    <br>
                                                    <!-- Boy Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['40','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['41','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پول</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['42','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله پشتی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Bag -->
                                                    <br>
                                                    <!-- Boy Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['50','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['51','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['52','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفش تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['66','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتونی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['53','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                                    بوت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['54','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Shoe -->
                                                    <br>
                                                    <!-- Boy Sport -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['60','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['61','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['62','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['63','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['64','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولو شرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['65','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['67','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفش حرفه ای</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Sport  -->
                                                    <br>
                                                    <!-- Boy Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu  SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['70','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['71','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['72','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['73','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['74','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['75','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['76','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['77','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['78','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Accessory -->
                                                </ul>
                                            </div>
                                        </div>
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک نوزادی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- دخترانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دخترانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Baby Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['11','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['12','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگ</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Down -->
                                                    <br>
                                                    <!-- Baby Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Up -->
                                                    <br>
                                                    <!-- Baby Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Complete -->
                                                    <br>
                                                    <!-- Baby Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['40','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['41','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['42','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتونی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['43','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Shoe -->
                                                    <br>
                                                    <!-- Baby Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            {{--                                                            <li>--}}
                                                            {{--                                                                <a href="{{ route('AddProduct_askSize',['50','4']) }}"--}}
                                                            {{--                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسباب--}}
                                                            {{--                                                                    بازی</a>--}}
                                                            {{--                                                            </li>--}}
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['51','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سر پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['52','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['53','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تل
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['54','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['55','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ناف بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['56','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['57','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و دستک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['58','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['59','4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Accessory -->
                                                </ul>
                                            </div>
                                            <!-- پسرانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">پسرانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Baby underwear -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['01','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <!-- Baby Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Down -->
                                                    <br>
                                                    <!-- Baby Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['23','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['24','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['25','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Up -->
                                                    <br>
                                                    <!-- Baby Dress_Complete -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            تمام تنه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['30','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Complete -->
                                                    <br>
                                                    <!-- Baby Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['40','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['41','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['42','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['43','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Shoe -->
                                                    <br>
                                                    <!-- Baby Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            {{--                                                            <li>--}}
                                                            {{--                                                                <a href="{{ route('AddProduct_askSize',['50','5']) }}"--}}
                                                            {{--                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسباب--}}
                                                            {{--                                                                    بازی</a>--}}
                                                            {{--                                                            </li>--}}
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['51','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرپوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['52','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['53','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['54','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ناف بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['55','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['56','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['57','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['58','5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Accessory -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link kalaye varedati Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">کالای وارداتی<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن کالای وارداتی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <div class="col-lg-12 g-brd-right g-brd-gray-light-v4">
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار تولید محتوا<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم شخصی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم خانگی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">وسایل ارتباطی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزارآلات و تجهیزات صنعتی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم الکترونیکی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">وسایل ورزشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">وسایل نقلیه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">محصولات خوراکی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m1_9_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link pzeshki arayeshi behdashti Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">پزشکی و آرایشی بهداشتی<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <!-- Add pezeshki Product -->
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن کالای پزشکی، آرایشی، بهداشتی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- pezeshki -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">پزشکی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ماساژور<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماساژور دستی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماساژور برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی ماساژور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات پزشکی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فشارسنج</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دماسنج محیطی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تب سنج</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رطوبت گیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پد و کیسه آب گرم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تشک برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پتوی برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماسک تنفسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه نمک (درد)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تجهیزات پزشکی حرفه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم پزشکی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات تنفسی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگاه بخور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخور سرد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخور گرم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالس اکسیمتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تجهیزات کمکی تنفسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ارتوپدی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">توانبخشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساپورت های طبی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کنترل دیابت<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگاه تست قند خون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نوار تست قند خون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوزن تست قند خون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرنگ انسولین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف خنک نگهدارنده انسولین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات مصرفی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوند ادراری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پک تزریقات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پک پانسمان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چسب پانسمان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">محصولات سلولوزی طبی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیت تشخیص</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">البسه بیمارستانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش طبی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ضد عفونی کننده زخم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم پزشکی مصرفی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">دندانپزشکی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرکننده موقت دندان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرکننده دائمی دندان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شوینده دهان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- arayeshi va behdashti -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">آرایشی و بهداشتی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Female Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم آرایشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پنکک (پودر فشرده)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رژگونه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رژلب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ریمل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سایه ابرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خط چشم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">مراقبت پوست<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ضد آفتاب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کرم مرطوب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کرم نرم کننده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماسک صورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماسک بدن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاک کننده صورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تونر پوست</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مراقبت بدن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فیس براش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_9_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">مراقبت و زیبایی مو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_10_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شامپو مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_10_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماسک مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_10_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرم مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_10_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روغن مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_10_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم بهداشتی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژیلت اصلاح بانوان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مسواک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خمیردندان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دئودورانت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ضد تعریق</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژل تاخیری رابطه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاندوم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">موبر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نوار بهداشتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپ قاعدگی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قیچی اصلاح مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیغ اصلاح مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_11_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">عطر و ادکلن<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عطر زنانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ادکلن زنانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عطر مردانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ادکلن مردانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بادی اسپلش زنانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بادی اسپلش مردانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عطر جیبی زنانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عطر جیبی مردانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_12_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم شخصی برقی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_13_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سشوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_13_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اتو و حالت دهنده مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_13_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژیلت برقی اصلاح</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_13_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماشین اصلاح</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m2_13_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link lavazeme khanegi barghi Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">لوازم خانگی برقی<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <!-- Add lavaze khanegi barghi Product -->
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن لوازم خانگی برقی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- pezeshki -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تهویه، سرمایش و گرمایش<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کولر گازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کولر آبی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پنکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پنکه شارژی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تصفیه کننده هوا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخاری برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پکیج دیواری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رادیاتور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخاری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شوفاژ برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آبگرمکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">جارو برقی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جارو برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جارو شارژی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم جارو برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری جارو شارژی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جارو رباتیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ماشین شوینده<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماشین لباسشویی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مینی واش (کهنه شویی)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماشین ظرفشویی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">یخچال فریزر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">یخچال فریزر ساید بای ساید</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">یخچال فریزر دوقلو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">یخچال فریزر هتلی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">یخچال فریزر کمبی (بالا پایین)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تلویزیون<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul style="direction: rtl" class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 4k</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون گیمینگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون OLED</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون QLED</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 144 هرتز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 120 هرتز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تلویزیون بر اساس سایز<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 86 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 85 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 75 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 70 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 65 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 58 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 55 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 50 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 43 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 40 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلویزیون 32 اینچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم پخت و پز<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرخ کن بدون روغن (air fryer)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایکروویو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایکروفر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اجاق گاز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلوپز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساندویچ ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">وافل ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">توستر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آون توستر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باربیکیو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گریل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مولتی کوکر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخم مرغ پز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اتو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_8_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اتوبخار ایستاده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_8_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اتوبخار دستی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_8_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخارگر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">نوشیدنی ساز<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_9_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قهوه ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسپرسو ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چای ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتری برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سماور برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آبمیوه گیری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آب مرکبات گیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آسیاب قهوه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_9_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">چرخ خیاطی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_10_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چرخ خیاطی خانگی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_10_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چرخ خیاطی تخصصی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_10_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چرخ خیاطی حرفه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_10_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">خردکن و غذاساز<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_11_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشت کوب برقی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">غذاساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">همزن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخلوط کن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چرخ گوشت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خردکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آسیاب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_11_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بخارشو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_12_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بخارشو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_12_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم یدکی بخارشو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_12_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تصفیه آب<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_13_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگاه تصفیه آب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_13_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فیلتر تصفیه آب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_13_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فیلتر تصفیه آب یخچال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_13_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم توکار<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m3_14_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هود</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_14_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_14_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گاز صفحه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_14_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سینک ظرفشویی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m3_14_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link khane va ashpazkhane Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">خانه و آشپزخانه<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden;" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <!-- Add lavaze khanegi barghi Product -->
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن لوازم خانه و آشپزخانه
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- ashpazkhane -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">آشپزخانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ظروف پخت و پز<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قابلمه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تابه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زودپز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظرف شعله مستقیم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار آشپزی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفگیر و ملاقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چاقو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت گوشت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظرف و قالب یخ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قیف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صافی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گردو شکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فندک آشپزخانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ترازوی آشپزخانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تهیه چای و قهوه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قهوه ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمنوش ساز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شیر جوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قهوه جوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فیلتر چای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ظروف آشپزخانه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آبکش و آبگیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بطری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ارگانایزر آشپزخانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جای ادویه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بانکه و ظروف بنشن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شکر پاش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نمک پاش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سبد آشپزخانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سبد سیب زمینی و پیاز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظروف نگه دارنده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرو و پذیرایی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سفره</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سینی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لیوان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بشقاب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قندان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پارچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بطری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بستنی خوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سس خوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آبلیمو خوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیاله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_13']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلمن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_14']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فلاسک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_15']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظروف سرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_16']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظروف پذیرایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_17']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرویس غذاخوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_18']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاشق</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_19']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چنگال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_20']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_21']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر لیوانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_22']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر بشقابی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_23']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر قابلمه ای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">منسوجات آشپزخانه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگیره</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیش بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه نان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه سبزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستمال نظافت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دم کش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم تهیه کیک و دسر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قالب کیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قالب دسر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیمانه آشپزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">الک آشپزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاردک آشپزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لیسک آشپزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">وردنه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاتر کیک و پیتزا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- khane -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">خانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">مبل<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_8_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل راحتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل تختخواب شو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل بادی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل تدی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل ال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل مینمال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل چستر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبل اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بین بگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی کودک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">دکوراسیون خانگی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_9_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتابخانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">طبقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کنسول</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">میز نهارخوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_9_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">مبلمان اداری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_10_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_10_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی انتظار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_10_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">میز اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_10_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">نگهدارنده لباس و لوازم<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_11_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمد لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_11_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ارگانایزر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_11_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جاکفشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_11_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جا لباسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_11_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاور لوازم خانگی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_11_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">دکوراتیو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_12_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مجسمه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تندیس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عود</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شمع</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شمعدان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دیوار کوب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسماج</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گلدان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آینه دکوراتیو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_12_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">قاب عکس و تابلو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_13_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تابلو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_13_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب عکس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_13_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تابلو شاسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_13_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری مبل<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_14_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رومیزی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_14_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوسن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_14_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال مبل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_14_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_14_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">فرش و گلیم<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_15_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فرش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_15_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">موکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_15_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تابلو فرش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_15_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پادری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_15_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روفرشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_15_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ملزومات خواب<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_16_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لحاف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روتختی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ملحفه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بالش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تشک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رو بالشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تشک خوشخواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_16_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- behdasht khane -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">بهداشت خانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">حمام<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_17_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حوله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_17_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_17_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لیف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_17_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرده حمام</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_17_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرویس بهداشتی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_18_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست سرویس بهداشتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جا مسواکی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخزن مایع دستشویی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پایه رول دستمال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آفتابه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوگیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">برس توالت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پایه حوله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_18_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">شستشو و نظافت<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_19_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سطل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_19_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تی (زمین شوی)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_19_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فرچه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_19_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جارو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_19_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خاک انداز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_19_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">نظافت لباس<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m4_20_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرزگیر لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گیره لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاور پوشاک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه وکیوم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سبد رخت چرک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بند رخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">میز اتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم جانبی اتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m4_20_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link mobile va tablet Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">موبایل و تبلت<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن موبایل و تبلت و لوازم جانبی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- mobile -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">موبایل</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">برندها<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی آیفون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی سامسونگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی شیائومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی نوکیا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی ریلمی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی آنر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی ناتینگ فون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی وکال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی ردتون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی هواوی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی داریا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی گوگل پیکسل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی جی ال ایکط</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_13']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی آلکاتل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_14']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی وان پلاس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_15']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی جنرال لوکس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_16']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی دوجی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m5_1_17']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی HMD</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_18']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی پوکو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_19']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشی بلک ویو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم جانبی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شارژر گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کابل شارژر گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گلس گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هولدر گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبدل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاور استیشن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مونوپاد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هولدر مونوپاد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاور ایرپاد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هولدر گردنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فن خنک کننده گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">قاب گوشی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی آیفون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی سامسونگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی شیائومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی ریلمی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی پوکو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قاب گوشی وکال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">هدفون و هد ست<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون بی سیم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون گیمینگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون اپل (ایرپاد)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون بیتس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون سونی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون سامسونگ (ایربادز)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون شیائومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون جی بی ال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدفون انکر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هندز فری تایپ سی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ساعت و مچ بند هوشمند<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul style="direction: rtl" class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اپل واچ اولترا 2</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اپل واچ 10</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اپل واچ SE</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت هوشمند سامسونگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت هوشمند شیائومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>

                                            <!-- tablet -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">تبلت</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">برندها<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m5_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تبلت سامسونگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تبلت شیائومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تبلت نارتب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرفیس تبلت<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m5_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرفیس پرو 8</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرفیس پرو 9</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرفیس پرو 10</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_7_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرفیس پرو 11</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">آیپد<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m5_8_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آیپد ایر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_8_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آیپد پرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m5_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link kalaye digital Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">کالای دیجیتال<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <!-- Add lavaze khanegi barghi Product -->
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن کالای دیجیتال و لوازم جانبی
                                        </h5>
                                        <div class="rowSeller align-items-stretch">
                                            <!-- konsole bazi -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کنسول بازی و وسایل گیمینگ</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کنسول بازی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ps5</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ps5 slim</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ps5 pro</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ps4</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">xbox</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">gamestick</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">nintindo switch</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">وسایل گیمینگ<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست گیمینگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دسته بازی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی ps5</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی pc</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی ایکس باکس 360</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_2_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دیسک های بازی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_2_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فرمان بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_2_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندلی گیمینگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- loptop -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لپ تاپ</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">برندها<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مک بوک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ ایسوس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرفیس لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ لنوو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ اچ پی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ دل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ ایسر</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_3_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لپ تاپ msi</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم جانبی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کول پد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شارژ لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماوس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماوس پد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">استیکر لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسکین لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- computer -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">کامپیوتر و قطعات</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کامپیوتر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">all in one</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کامپیوتر شخصی (pc)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیس اسمبل شده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کامپیوتر جیبی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مانیتور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_5_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قلم نوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">قطعات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیس کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پردازنده (cpu) کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت گرافیک کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مادربرد کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رم کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هارد دیسک کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاور کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت صوتی کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دانگل بلوتوث</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دانگل وایفای</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">درایو نوری کامپیوتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیبورد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماوس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_13']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسپیکر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_14']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">وب کم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- printer -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">پرینتر و قطعات</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">پرینتر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینتر سه بعدی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینتر حرارتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینتر لیبل زن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینتر جوهرافشان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینتر لیزری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلاتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگاه فتوکپی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">قطعات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_8_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">برد پاور پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_8_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">برد فرمتر پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">برد ولتاژ پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاغذکش پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">درام پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فیوزینگ پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فوم رولر پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مگنت رولر پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد کارتریج پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارتریج پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلید پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کابل پرینتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_8_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- camera -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دوربین و ابزار جانبی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">دوربین<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_9_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین فیلم برداری</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_9_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین عکاسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_9_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین چاپ سریع</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_9_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین کامپکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_9_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین dslr</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_9_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار جانبی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_10_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رینگ لایت</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_10_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پایه دوربین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_10_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لنز دوربین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_10_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نور جانبی عکاسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_10_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت حافظه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_10_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- mashinhaye edari -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ماشین ها و تجهیزات دیجیتال اداری</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ماشین های اداری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_11_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بارکد خوان</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_11_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ویدیو وال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسکنر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تلفن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ویدیو پروژکتور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگاه حضور و غیاب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیجر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیستم نوبت دهی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_11_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات دیجیتال اداری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_12_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پایه سقفی پروژکتور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_12_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- shabaka va ertebatat -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">تجهیزات شبکه و ارتباطات</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات شبکه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هاب usb</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوئیچ شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هاب سوئیچ شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تجهیزات ویدیویی شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کامپیوتر سرور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیجر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رک شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اتاق سرور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پچ پنل شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرینت سرور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آداپتور شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسپلیتر (نویزگیر)</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_13']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کابل شبکه (LAN)</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_14']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کابل cat6</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_15']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کابل کمبو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_16']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماژول شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_17']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم جانبی NAS</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_18']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لوازم جانبی سرور</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_19']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ذخیره ساز تحت شبکه (NAS)</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_13_20']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">یو پی اس (UPS)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_21']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ابزار شبکه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_22']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آنتن تقویتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_23']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مبدل فیبر نوری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_24']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیم آنتن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_13_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">مودم<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_14_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مودم رومیزی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_14_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مودم جیبی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_14_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">توسعه دهنده محدوده بی سیم</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_14_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روتر و اکسس پوینت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_14_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- abzare zakhire sazi va batri  -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ابزار ذخیره سازی و باتری</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار ذخیره سازی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_15_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">فلش مموری</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_15_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هارد اکسترنال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_15_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت حافظه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_15_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاور بانک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_15_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">باتری<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_16_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری لپ تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_16_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری گوشی</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_16_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری تبلت</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_16_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری لیتیومی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_16_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- tajhizate amniati va nezarati  -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">تجهیزات امنیتی و نظارتی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات امنیتی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_17_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دزدگیر اماکن</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_17_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیستم اعلام سرقت و هشدار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_17_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیستم کنترل دسترسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_17_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیستم اعلام حریق</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_17_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حصار الکتریکی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_17_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قفل دیجیتال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_17_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">تجهیزات نظارتی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_18_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین مداربسته</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_18_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دوربین مداربسته متحرک</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_18_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماکت دوربین مداربسته</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_18_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                            <!-- khane hooshmand  -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">خانه هوشمند</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">خانه هوشمند<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_19_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نور و روشنایی هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m6_19_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلید هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پریز هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سنسور هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هاب هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستیار صوتی هوشمند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جارو هوشمند (رباتیک)</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m6_19_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link lavazeme tahrir Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">لوازم تحریر و سرگرمی<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن لوازم تحریر و سرگرمی
                                        </h5>
                                        <!-- lavazeme tahrir -->
                                        <div class="rowSeller align-items-stretch">
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لوازم تحریر</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">نوشت افزار<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مداد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماژیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خودکار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نوک مداد نوکی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مداد نوکی سفید</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مداد نوکی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">غلط گیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاک کن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مدادتراش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دفتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاغذ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مقوا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار طراحی و مهندسی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خط کش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پرگار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گونیا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ملزومات مدرسه<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جامدادی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ظرف غذای مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">ابزار نقاشی و رنگ آمیزی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاستل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مدادشمعی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آبرنگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گواش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رنگ نقاشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قلم مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالت رنگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوم نقاشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مداد رنگی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هندز فری تایپ سی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>

                                            <!-- sargarmi -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">سرگرمی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرگرمی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m7_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت نرد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شطرنج</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">منچ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی کارتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی فکری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتاب داستان</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اسباب بازی کودک<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m7_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی فکری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازی آموزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پازل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خانه سازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عروسک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسپینر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسلایم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">خمیر بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">استیکر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تفنگ بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ماشین بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">توپ بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m7_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Add Link khodro va motor Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408">خودرو و موتور سیکلت<i class="fa fa-plus align-middle g-font-size-15 g-mr-7 g-color-primary"></i></a>
                                    <div style="direction: ltr; overflow-y: scroll; overflow-x: hidden" class="hs-mega-menu g-font-size-13 megaMenu"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن لوازم خودرو و موتور سیکلت
                                        </h5>
                                        <!-- khodro -->
                                        <div class="rowSeller align-items-stretch">
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لوازم خودرو</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم مصرفی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لنت ترمز خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیغه برف پاکن خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تسمه تایم</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شمع خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">وایر خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لامپ چراغ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لاستیک خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_1_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم یدکی بدنه خودرو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چراغ جلو خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چراغ عقب خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سپر جلو خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سپر عقب خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلو پنجره خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">درب باک بنزین خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شیشه درب جلو خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شیشه درب عقب خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شیشه جلو خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شیشه عقب خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رینگ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستگیره درب خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_2_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم داخل کابین خودرو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آفتابگیر خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آمپر کامل خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آینه وسط خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ایربگ داشبورد خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پنل کولر و بخاری خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پوسته داشبورد خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جعبه داشبورد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">درب داشبورد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جاسیگاری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_3_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم یدکی موتور خودرو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اویل پمپ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اویل ماژول خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بغل یاتاقان خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیستون خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تسمه بالانس خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دریچه گاز خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دریچه هوا خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رینگ پیستون خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سر سیلندر خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوپاپ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سنسور میل لنگ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_4_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم جانبی خودرو<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفپوش خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چادر خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روکش صندلی خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زنجیر چرخ خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باربند خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سر دنده خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سر اگزوز خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جک خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آنتن خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هدلایت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">قالپاق خودرو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_5_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>

                                            <!-- motorsiklet -->
                                            <div class="col-lg-6 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لوازم موتور سیکلت</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم مصرفی<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m8_6_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لنت ترمز موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لاستیک موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شمع موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">باتری موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لامپ موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیم ترمز موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیم کلاچ موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_6_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لوازم یدکی موتور سیکلت<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a style="direction: rtl" href="{{ route('AddOtherProduct',['m8_7_0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">انجین کامل موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['mm8_7_1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سیلندر موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرسیلندر موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">میل لنگ موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_4']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارتل وسط موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_5']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گیربکس موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_6']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شاتون موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_7']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دیسک ترمز موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_8']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاربراتور موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_9']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">استارت موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_10']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دیسک کلاچ موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_11']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دنده استارت موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_12']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دنده تایم موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_13']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اگزوز موتور سیکلت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddOtherProduct',['m8_7_optional']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">افزودن کالای دلخواه در این دسته</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Store Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('store') }}" class="nav-link">انبار من</a>
                                </li>

                                <!-- Sell List Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('sale') }}" class="nav-link">فروش های من</a>
                                </li>

                                <!-- return List Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('sellerReturn') }}" class="nav-link">محصولات برگشتی</a>
                                </li>

                                <!-- Rate Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('productDelivery') }}" class="nav-link">تحویل محصول</a>
                                </li>

                                <!-- Finance Status Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('amountReceived') }}" class="nav-link">مبالغ دریافتی</a>
                                </li>

                                <!-- Rate Page Link -->
                                <li class="nav-item g-my-3">
                                    <a href="{{ route('customerComment') }}" class="nav-link">واکنش مشتریان</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Navigation -->
                        <!-- Logo -->
                        <a href="{{ url('/Seller-Panel') }}" class="navbar-brand g-mt-10--lg g-mr-0">
                            <img src="{{ asset('img/Logo/logo2.png') }}" alt="Image Description" width="100">
                        </a>
                        <!-- End Logo -->
                        <!-- Time And Date -->
                        <div class="text-center hidden-lg-down g-color-gray-light-v3">
                            <p class="mb-0 persianDate"></p>
                            <p class="mb-0 persianTime"></p>
                        </div>
                        <!-- End Time And Date -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Sidebar Navigation -->
@endsection

