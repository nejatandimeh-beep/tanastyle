@section('SellerFooter')
    <!-- Footer -->
    <footer class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 text-center g-pt-60 g-pb-40">
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg">
                    <h2 class="h6 g-color-primary text-uppercase g-font-weight-600 g-mb-20">قوانین و ضوابط</h2>
                    <ul class="list-unstyled mb-0 px-0">
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','regulation')}}">شرایط استفاده</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','returnProduct')}}">شرایط برگشت محصول</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','falseProduct')}}">ثبت مشخصات اشتباه برای محصول</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','emptyProduct')}}">ثبت محصول ناموجود</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','deliveryProduct')}}">تحویل به موقع</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','sellerCheckout')}}">تسویه حساب با فروشنده</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','offlineSelling')}}">فروش آفلاین</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="{{route('sellerRegulation','commission')}}">بهای کمسیون و ارزش افزوده</a>
                        </li>
                    </ul>
                </div>
                <!-- End Footer Content -->

                <!-- Footer Content -->
                <div class="col-sm-6 col-lg">
                    <h2 class="h6 g-color-primary text-uppercase g-font-weight-600 g-mb-20">راهنمای پنل فروشنده</h2>
                    <ul class="list-unstyled mb-0 px-0">
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">صفحه اصلی</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">اطلاعات کاربری</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">ارتباط با مرکز</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">اضافه کردن محصول</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">انبار من</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">فروش های من</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">تحویل محصول</a>
                        </li>
                        <li class="g-mb-8">
                            <a class="g-color-white-opacity-0_8" href="#">مبالغ دریافتی</a>
                        </li>
                        <li>
                            <a class="g-color-white-opacity-0_8" href="#">واکنش مشتریان</a>
                        </li>
                    </ul>
                </div>
                <!-- End Footer Content -->
            </div>
        </div>
        <!-- End Footer Content -->

        <hr class="g-brd-white-opacity-0_2 g-my-40">

        <!-- Copyright -->
        <div class="container">
            <small class="g-font-size-default">تمامی حقوق این وب سایت متعلق به شرکت تابش پس زمینه مکریان است.
                <span class="g-color-gray-dark-v5">1399</span></small>
        </div>
        <!-- End Copyright -->
    </footer>
    <!-- End Footer -->
@endsection

