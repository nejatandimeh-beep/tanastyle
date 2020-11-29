@section('SellerNavigation')
    <body class="u-body--header-side-static-right">
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

                        <!-- Logo -->
                        <a href="{{ url('/Seller-Panel') }}" class="navbar-brand g-mb-10--lg g-mr-0">
                            <img src="/img/Logo/logo.png" alt="Image Description" width="150">
                        </a>
                        <!-- End Logo -->

                        <!-- Navigation -->
                        <div style="direction: rtl;"
                             class="collapse navbar-collapse align-items-center flex-sm-row g-mt-20 g-mt-0--lg g-mb-20"
                             id="navBar">
                            <ul class="navbar-nav ml-auto text-uppercase g-font-weight-600 u-sub-menu-v1">
                                <!-- Home Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ url('/Seller-Panel') }}" class="nav-link">صفحه اصلی</a>
                                </li>

                                <!-- Profile Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ url('/Seller-Profile') }}" class="nav-link">اطلاعات کاربری</a>
                                </li>

                                <!-- Connection Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ url('/Seller-AdminConnection') }}" class="nav-link">ارتباط با مرکز</a>
                                </li>

                                <!-- Add Link Female Product -->
                                <li class="nav-item hs-has-mega-menu g-my-5">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک زنانه<i
                                            class="hs-icon hs-icon-arrow-bottom g-font-size-10 g-mr-7"></i></a>
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
                                                            زیر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0000']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0001']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سوتین</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0002']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    لباس زیر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0003']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0004']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0010']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0011']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0012']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار
                                                                    راحتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0013']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0014']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0015']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0020']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0021']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0022']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0023']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تونیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0024']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0025']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شومیز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0025']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0026']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلیور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0027']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0028']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0029']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00210']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00211']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    تک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00212']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    پاییزه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00213']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    زمستانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['00214']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0030']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0031']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مانتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0032']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پانچو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0033']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رویه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0034']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت و شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0035']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس مجلسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0036']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0037']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0038']) }}"
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
                                                        <a href="{{ route('AddProduct_askSize',['0100']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پول</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0101']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0102']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0103']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رو دوشی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0104']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اداری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0105']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سفری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0106']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                            پشتی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['Baggage']) }}"
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
                                                        <a href="{{ route('AddProduct_askSize',['0200']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0201']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0202']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0203']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاشنه
                                                            دار</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0204']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روزمره</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0205']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                            بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['0206']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['ShoeCare']) }}"
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
                                                    <!-- Female Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0300']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0301']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0302']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گرمکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0303']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0304']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Down -->
                                                    <br>
                                                    <!-- Female Sport Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0310']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0311']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0312']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0313']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0314']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0315']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0316']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0317']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Dress_Up -->
                                                    <br>
                                                    <!-- Female Sport Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0320']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0321']) }}"
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
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0330']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0331']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی
                                                                    ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0332']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخصوص
                                                                    پیاده روی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0333']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخصوص
                                                                    دویدن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0334']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سالنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0335']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوهنوردی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Female Sport Shoe -->
                                                    <br>
                                                    <!-- Female Sport Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportKnittedHat']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    بافت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportCap']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    لبه دار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SwimmingCap']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    شنا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['MountaineeringCap']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    کوهنوردی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportHeadBand']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportScarf']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportHatAndScarfSet']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGlasses',]) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SwimmingSportGlasses']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک
                                                                    شنا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SwimmingNoseClip']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بینی
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['Earplugs']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ArmBand']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازو
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['ForeArm']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                    دست</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportWristBand']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مچ
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportGloves']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportOpenGloves']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش
                                                                    نیم بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['GoalKeeperGloves']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش
                                                                    دروازه بانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CalfSupport']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                    پا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportSocks']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportInsoleSocks']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب
                                                                    کفی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['SportTowel']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حوله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['CanteenBottle']) }}"
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
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0400']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوشواره</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0401']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گردن بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0402']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">النگو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0403']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0404']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">انگشتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0405']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پا
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0406']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            مو</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0411']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاج
                                                                    عروس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0410']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاج
                                                                    سر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0412']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گیره
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0413']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کش
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0414']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلیپس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0415']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سنجاقک</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرپوش</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0420']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    زمستانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0421']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روسری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0422']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0423']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0424']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سایر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0430']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0431']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0432']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0433']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0434']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0435']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0436']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0437']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0438']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    هدیه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['PhoneStand']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نگهدارنده
                                                                    گوشی</a>
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
                                <li class="nav-item hs-has-mega-menu g-my-5">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک مردانه<i
                                            class="hs-icon hs-icon-arrow-bottom g-font-size-10 g-mr-7"></i></a>
                                    <!-- Add Male Product -->
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک مردانه<i class="icon-user g-font-size-22 g-ml-10"></i>
                                        </h5>

                                        <div class="h-100 rowSeller align-items-stretch">
                                            <!-- Add Dress Product -->
                                            <div class="col-lg-2 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">لباس مردانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Male Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1000']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مایو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1001']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت
                                                                    پادار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1002']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر
                                                                    پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1003']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر
                                                                    پوش رکابی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1004']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1010']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1011']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1012']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار
                                                                    راحتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1014']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1020']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1021']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1022']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1023']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1024']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پلیور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1025']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0026']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه پاییزه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['0027']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه زمستانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1028']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1029']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10210']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    تک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10211']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    پاییزه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10212']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت
                                                                    زمستانه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['10213']) }}"
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
                                                            تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1030']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لباس
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1031']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کت و شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1032']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس مجلسی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1033']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس اداری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1034']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست لباس کار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1035']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پالتو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1036']) }}"
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
                                                        <a href="{{ route('AddProduct_askSize',['1100']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پول</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1101']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کارت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1102']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1103']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">رو دوشی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1104']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اداری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1105']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سفری</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1106']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                            پشتی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['Baggage']) }}"
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
                                                        <a href="{{ route('AddProduct_askSize',['1200']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1201']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1202']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1203']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روزمره</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1204']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                            بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['1205']) }}"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('AddProduct_askSize',['ShoeCare']) }}"
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
                                                    <!-- Male Sport Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1300']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1301']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1302']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گرمکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1303']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Down -->
                                                    <br>
                                                    <!-- Male Sport Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1310']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1311']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1311']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1312']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1313']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1314']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1315']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Dress_Up -->
                                                    <br>
                                                    <!-- Male Sport Bag -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کیف
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1320']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1321']) }}"
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
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1330']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساده</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1331']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کتانی
                                                                    ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1332']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخصوص
                                                                    پیاده روی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1333']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مخصوص
                                                                    دویدن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1334']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سالنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1335']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوهنوردی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Male Sport Shoe -->
                                                    <br>
                                                    <!-- Male Sport Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری
                                                            ورزشی</a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1340']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    بافت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1341']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    لبه دار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1342']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    شنا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1343']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    کوهنوردی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1346']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1344']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1345']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1347']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1348']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک
                                                                    شنا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1349']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بینی
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13410']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گوش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13411']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بازو
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13412']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                    دست</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13413']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">مچ
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13414']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13415']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش
                                                                    نیم بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13416']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش
                                                                    دروازه بانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13417']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساق
                                                                    پا</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13418']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13419']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب
                                                                    کفی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13420']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">حوله</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['13421']) }}"
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
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">بدلیجات </a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1400']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گردنبند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1401']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1402']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">انگشتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1403']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سرپوش</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1410']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه
                                                                    زمستانی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1411']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1412']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <br>
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">سایر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1420']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1421']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1422']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1423']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1424']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1425']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1426']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1427']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['1428']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست هدیه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['PhoneStand']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نگهدارنده
                                                                    گوشی</a>
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
                                <li class="nav-item hs-has-mega-menu g-my-5">
                                    <a href="#" class="nav-link" id="nav-link-408"
                                       aria-haspopup="true"
                                       aria-expanded="false"
                                       aria-controls="nav-megamenu-408"> افزودن پوشاک بچگانه<i
                                            class="hs-icon hs-icon-arrow-bottom g-font-size-10 g-mr-7"></i></a>
                                    <!-- Add Kids Product -->
                                    <div style="direction: ltr;" class="hs-mega-menu g-font-size-13"
                                         id="nav-megamenu-408"
                                         aria-labelledby="nav-link-408">
                                        <h5 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                            افزودن پوشاک بچگانه<i class="icon-emotsmile g-font-size-22 g-ml-10"></i>
                                        </h5>

                                        <div class="h-100 rowSeller align-items-stretch">
                                            <!-- Add Baby Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">نوزادی</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Baby Dress_Down -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            پایین تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2000']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2001']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2002']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2003']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Down -->
                                                    <br>
                                                    <!-- Baby Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2010']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">زیر پوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2011']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2012']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2013']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2014']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شومیز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2015']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2016']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2017']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2018']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بافتنی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2019']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Dress_Up -->
                                                    <br>
                                                    <!-- Baby Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2020']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2021']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2022']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپوش</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Shoe -->
                                                    <br>
                                                    <!-- Baby Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2030']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">اسباب
                                                                    بازی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2032']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرپوش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2034']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هد
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2037']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تل
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2031']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیش
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20311']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نافبند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2033']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2035']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پا
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2036']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    هد بند پا بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2038']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیسه
                                                                    خواب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2039']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">آویز
                                                                    لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20310']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چوب
                                                                    لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['20312']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Baby Accessory -->
                                                </ul>
                                            </div>
                                            <!-- End Baby Product -->

                                            <!-- Add Girl Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">دخترانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Girl Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2100']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2101']) }}"
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
                                                            پایین تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2110']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2111']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2112']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دامن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2113']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب
                                                                    شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2114']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جوراب</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2115']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">لگ</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Dress_Down -->
                                                    <br>
                                                    <!-- Girl Dress_Up -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            بالا تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2120']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2121']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2122']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تاپ</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2123']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تونیک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2124']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2125']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شومیز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2126']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2127']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2128']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2129']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21210']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21211']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Dress_Up -->
                                                    <br>
                                                    <!-- Girl Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2130']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2131']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2132']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2133']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2134']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                                    بوت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2135']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Shoe -->
                                                    <br>
                                                    <!-- Girl Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری</a>
                                                        <ul class="list-unstyled hs-sub-menu SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2140']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2141']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">روسری</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2142']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2143']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2144']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2145']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گیره
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2146']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کش
                                                                    مو</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2147']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلیپس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2148']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2149']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21410']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21411']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف
                                                                    پول</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21412']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف
                                                                    مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21413']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف
                                                                    رو دوشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21414']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                                    پشتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21415']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21416']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دست
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21417']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمر بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21418']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['21419']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بدلیجات</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Girl Accessory -->
                                                </ul>

                                            </div>
                                            <!-- End Girl Product -->

                                            <!-- Add Boy Product -->
                                            <div class="col-lg-4 g-brd-right g-brd-gray-light-v4">
                                                <h6 class="g-mr-8 g-mt-15 g-mb-8 g-font-weight-600">پسرانه</h6>
                                                <ul class="list-unstyled h-100 g-py-10 g-pt-0">
                                                    <!-- Boy Dress_Under -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">لباس
                                                            زیر</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2200']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شورت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2201']) }}"
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
                                                            پایین تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2210']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوارک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2211']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شلوار</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2212']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">گرمکن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2213']) }}"
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
                                                            بالا تنه</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2220']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تیشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2221']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولوشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2222']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پیراهن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2223']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">جلیقه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2224']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ژاکت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2225']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بلوز</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2226']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پولیور</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2227']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سویشرت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2228']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">هودی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2229']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کاپشن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22210']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    لباس</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22211']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">سرهمی</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Dress_Up -->
                                                    <br>
                                                    <!-- Boy Shoe -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">کفش</a>
                                                        <ul class="list-unstyled hs-sub-menu">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2230']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دمپایی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2231']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">صندل</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2232']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">تخت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2233']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2234']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">نیم
                                                                    بوت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2235']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">بوت</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Shoe -->
                                                    <br>
                                                    <!-- Boy Accessory -->
                                                    <li class="nav-item hs-has-sub-menu d-inline-block">
                                                        <a href="#"
                                                           class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller d-flex flex-row-reverse">اکسسوری</a>
                                                        <ul class="list-unstyled hs-sub-menu  SubMenuScroll">
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2240']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کلاه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2241']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">شال
                                                                    گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2242']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ست
                                                                    کلاه و شال گردن</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2243']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">عینک</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2244']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کراوات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2245']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">پاپیون</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2246']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساس
                                                                    بند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2247']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف
                                                                    پول</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2248']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کیف
                                                                    مدرسه</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['2249']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساک
                                                                    ورزشی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22410']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کوله
                                                                    پشتی</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22411']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">ساعت</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22412']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">دستکش</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22413']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">کمربند</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('AddProduct_askSize',['22414']) }}"
                                                                   class="d-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover g-py-5 g-px-20-Seller">چتر</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <!-- End Boy Accessory -->
                                                </ul>
                                            </div>
                                            <!-- End Boy Product -->
                                        </div>
                                    </div>
                                    <!-- End Add Kids Product -->
                                </li>
                                <!-- End Link Kids Product -->

                                <!-- Store Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ route('store') }}" class="nav-link">انبار من</a>
                                </li>

                                <!-- Sell List Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ route('sale') }}" class="nav-link">فروش های من</a>
                                </li>

                                <!-- Rate Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ route('productDelivery') }}" class="nav-link">تحویل محصول</a>
                                </li>

                                <!-- Finance Status Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ route('amountReceived') }}" class="nav-link">مبالغ دریافتی</a>
                                </li>

                                <!-- Rate Page Link -->
                                <li class="nav-item g-my-5">
                                    <a href="{{ route('customerComment') }}" class="nav-link">واکنش مشتریان</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Navigation -->

                        <!-- Time And Date -->
                        <div class="text-center hidden-lg-down">
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

