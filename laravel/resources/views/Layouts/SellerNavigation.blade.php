@section('SellerNavigation')
    <body class="u-body--header-side-static-right">
{{--    <div id="load" class="load"></div>--}}
    <!-- Sidebar Navigation -->
    <div id="js-header" class="u-header u-header--side"
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
                            <ul class="navbar-nav ml-auto text-uppercase g-font-weight-600 u-sub-menu-v1">
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

                                <!-- Add Link Female Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک زنانه<i class="icon-arrow-down align-middle g-font-size-10 g-mr-7"></i></a>
                                    <!-- Add Female Product -->
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                            <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                                افزودن پوشاک زنانه<i class="icon-user-female g-font-size-22 g-ml-10"></i>
                                            </h5>

                                        <div style="height: 90%;" class="rowSeller align-items-stretch">
                                            <!-- Add Dress Product -->
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لباس زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Female Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
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
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
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
                                            <div class="col-lg-3 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ورزشی زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Female Sport Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                <a href="{{ route('AddProduct_askSize',['652','0']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی
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
                                            <div class="col-lg-3 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">اکسسوری زنانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                    </div>
                                    <!-- End Add Kids Product -->
                                </li>
                                <!-- End Link Female Product -->

                                <!-- Add Link Male Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک مردانه<i
                                            class="icon-arrow-down align-middle g-font-size-10 g-mr-7"></i></a>
                                    <!-- Add Male Product -->
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک مردانه<i class="icon-user g-font-size-22 g-ml-10"></i>
                                        </h5>

                                        <div style="height: 90%;" class="rowSeller align-items-stretch">
                                            <!-- Add Dress Product -->
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لباس مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Male Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
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
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
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
                                            <div class="col-lg-3 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">ورزشی مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Male Sport Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر <i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                <a href="{{ route('AddProduct_askSize',['652','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی ورزشی</a>
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
                                            <div class="col-lg-3 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">اکسسوری مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                <a href="{{ route('AddProduct_askSize',['726','1']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست هدیه</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- End Add Accessory Product -->
                                        </div>
                                    </div>
                                    <!-- End Add Mae Product -->
                                </li>
                                <!-- End Link Male Product -->

                                <!-- Add Link Kids Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک بچگانه<i
                                            class="icon-arrow-down align-middle g-font-size-10 g-mr-7"></i></a>
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک بچگانه<i class="icon-graduation g-font-size-25 g-ml-10"></i>
                                        </h5>

                                        <div style="height: 90%;" class="rowSeller align-items-stretch">
                                            <!-- دخترانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دخترانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Girl Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                <a href="{{ route('AddProduct_askSize',['68','2']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفش کتانی</a>
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                <a href="{{ route('AddProduct_askSize',['66','3']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کفش کتانی</a>
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
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Accessory -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Link Kids Product -->

                                <!-- Add Link baby Product -->
                                <li class="nav-item hs-has-mega-menu g-my-6">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک نوزادی<i
                                            class="icon-arrow-down align-middle g-font-size-10 g-mr-7"></i></a>
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک نوزادی<i class="icon-emotsmile g-font-size-22 g-ml-10"></i>
                                        </h5>

                                        <div style="height: 90%;" class="rowSeller align-items-stretch">
                                            <!-- دخترانه -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دخترانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Baby Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر<i class="icon-arrow-left align-self-center g-font-size-8 g-mr-7"></i></a>
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی</a>
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        <ul class="list-unstyled hs-sub-menu">
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
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Accessory -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Link baby Product -->

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
                            <img src="/img/Logo/logo_white.png" alt="Image Description" width="150">
                        </a>
                        <!-- End Logo -->
                        <!-- Time And Date -->
                        <div class="text-center hidden-lg-down g-color-gray-light-v3">
                            <p class="mb-0" id="persianDate"></p>
                            <p class="mb-0" id="persianTime"></p>
                        </div>
                        <!-- End Time And Date -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Sidebar Navigation -->
@endsection

