@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Info Panel -->
    <div style="direction: rtl"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h6 g-color-white-opacity-0_9 smallDevice g-mr-10">
            <i class="fa fa-calendar g-font-size-default g-ml-5"></i> امروز <span id="panelPersianDate"></span>
        </h3>
        <h3 class="card-header h5 g-color-white-opacity-0_8 bigDevice">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i> صفحه اصلی

            <a class="float-left g-color-white g-color-lightred--hover g-text-underline--none--hover" href="{{ route('sellerLogout') }}"
               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                خروج<i class="icon-logout g-font-size-16 g-mr-10 align-middle"></i>
            </a>

            <form id="logout-form" action="{{route('sellerLogout')}}" method="POST" style="display: none;">
                @csrf
            </form>
        </h3>
    </div>
    <!-- End Info Panel -->

    <div style="direction: rtl">
        <!-- Welcome Seller Block -->
        <div class="g-mt-30">

        <!-- Description Divs-->
        <div class="g-mb-30 g-mt-30 g-pa-10">
            <!-- Gray Colored Blockquotes -->
            <blockquote
                class="blockquote blockquote-reverse g-bg-gray-light-v5 g-brd-primary g-font-size-16 g-pa-40 g-mb-30 text-right">
                <p class="g-mb-10 p-0 g-font-weight-700">وقت بخیر <span>{{ Auth::guard('seller')->user()->name }}</span> عزیز</p>
                <p class="m-0 p-0 g-font-size-14">امیدواریم با فروش محصولات با کیفیت و مرغوب، فروش روزانه خود را دو
                    چندان نمایید.</p>
                <p class="m-0 p-0 g-font-size-14">شایان گفتن است که تلاش شبانه روزی تیم تانا استایل بر این است تا
                    محصولات شما عزیزان به بهترین نحو در صدر کالاهای موجود در کشور باشد.</p>
            </blockquote>
            <!-- End Gray Colored Blockquotes -->
        </div>
        <!-- Description Divs -->

        <!-- MasterSlider Main -->
        <div class="ms-staff-carousel g-pa-10">

            <div class="g-mb-30 text-center">
                <h2 class="h3 u-heading-v4__title g-mb-10">تازه ترین های مد و پوشاک</h2>
                <p class="g-mb-6">فروش محصولات خود را با جدیدترین های مد و پوشاک همگام کنید.</p>
                <p class="g-mb-3 g-font-weight-700">چند مدل کلاه که ترند بهار امسال است.</p>
            </div>

            <div id="masterslider" class="master-slider ms-skin-default">
                <div class="ms-slide" data-delay="3" data-fill-mode="fill">
                    <img src="assets/img/blank.gif" alt="" title="" data-src="/img/SellerNews/KolahNarm.png"/>
                    <div class="ms-info">
                        <h3 style="text-align: center;">
                            کلاه لبه داره نرم
                        </h3>
                        <div style="text-align: center;">
                            این مدل کلاه های سطل شکل، یکی از ترند های بهار ۲۰۲۰ هستند.<br>
                            نه فقط به خاطر شکلی که دارد بلکه بخاطر نرم بودن و پارچه ای بودنش در ران وی بهار طرفداران
                            زیادی داشته است.. برای ساخت این نوع کلاه ها از پارچه های گلدار و ارگانزا با رنگ روشن استفاده
                            می شود. بعضی از این مدل کلاه ها در رنگ های متفاوت قلاب بافی شده اند. همین امر باعث شده است
                            طرفداران زیادی جذب این مدل شوند.
                        </div>
                    </div>
                </div>
                <div class="ms-slide" data-delay="3" data-fill-mode="fill">
                    <img src="assets/img/blank.gif" alt="" title="" data-src="/img/SellerNews/KolahHasiri.png"/>
                    <div class="ms-info">
                        <h3 style="text-align: center;">
                            کلاه حصیری
                        </h3>
                        <div style="text-align: center;">
                            کلاه های حصیری یکی از بزرگترین ترند های کلاه تابستان ۲۰۲۰ است. این مدل کلاه ها در برند دیور
                            (Dior) مشاهده می شود.<br>
                            کلاه حصیری با لبه های برش خورده همانطور که در عکس مشاهده می کنید از نمونه طراحی های جذاب در
                            این ران وی است.
                        </div>
                    </div>
                </div>
                <div class="ms-slide" data-delay="3" data-fill-mode="fill">
                    <img src="assets/img/blank.gif" alt="" title="" data-src="/img/SellerNews/KolahMahi.png"/>
                    <div class="ms-info">
                        <h3 style="text-align: center;">
                            کلاه ماهیگیری
                        </h3>
                        <div style="text-align: center;">
                            کلاه مدل ماهیگیری لبه بلندی دارد که صورت و گردن در برابر باران و آفتاب می پوشانند.<br>
                            بنابراین اگر در منطقه ای بارانی زندگی می کنید این مدل کلاه بسیار مناسب است. این مدل کلاه در
                            برخی از طراحی ها مشاهده شده است.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MasterSlider Main -->
    </div>
@endsection
