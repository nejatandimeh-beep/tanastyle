@section('CustomerFooter')

    <div>
        <!-- Contact Info -->
        <div class="g-bg-black g-color-white text-center g-py-100">
            <div class="container">
                <header class="u-heading-v8-2 text-center g-width-70x--md mx-auto g-mb-80">
                    <h2 class="u-heading-v8__title text-uppercase g-font-weight-600 g-mb-25">در باره ما</h2>
                    <p class="lead g-mb-40 g-font-size-14">نیاز روز افزون جامعه به خدمات حرفه ای در دنیای مجازی ما را بر آن داشت تا در
                        صنعت مد و پوشاک این بستر را در سرار کشور ارتقا دهیم. تانا استایل با هدف ساده سازی فرایند خرید پوشاک در فضای مجازی
                        و همچنین با عرضه بهترین برندهای پوشاک از بازارچه های مرزی در تلاش است بستری مناسب برای شما عزیزان در زمینه مد و پوشاک فراهم آورد.<a href="#" class="g-mr-5">بیشتر</a> </p>

{{--                    <p class="lead g-mb-40 g-font-size-14">نیاز روز افزون جامعه به خدمات حرفه ای در دنیای مجازی ما را بر آن داشت تا در--}}
{{--                        صنعت مد و پوشاک این بستر را در سرار کشور ارتقا دهیم. تانا استایل با هدف ساده سازی فرایند خرید پوشاک در فضای مجازی و همچنین با عرضه مستقیم بهترین برندهای پوشاک از بازارچه های مرزی در تلاش است بستری مناسب برای شما عزیزان در زمینه مد و پوشاک فراهم آورد.<a href="#" class="g-mr-5">بیشتر</a> </p>--}}

                    <address class="row g-color-white-opacity-0_8 mb-0">
                        <div class="col-sm-6 col-md-3 g-brd-right--md g-brd-white-opacity-0_3 g-mb-60 g-mb-0--md">
                            <i class="icon-user-following d-inline-block display-5 g-color-primary g-mb-25"></i>
                            <h4 class="small text-uppercase g-mb-5">ثبت نام فروشندگان</h4>
                            <a href="{{ route('sellerRegister') }}"><strong>.. شروع کن</strong></a>
                        </div>

                        <div class="col-sm-6 col-md-3 g-brd-right--md g-brd-white-opacity-0_3 g-mb-60 g-mb-0--md">
                            <i class="icon-call-in d-inline-block display-5 g-color-primary g-mb-25"></i>
                            <h4 class="small text-uppercase g-mb-5">تلفن تماس مستقیم</h4>
                            <strong>444 2441817</strong>
                        </div>

                        <div class="col-sm-6 col-md-3 g-brd-right--md g-brd-white-opacity-0_3 g-mb-60 g-mb-0--md">
                            <i class="icon-envelope d-inline-block display-5 g-color-primary g-mb-25"></i>
                            <h4 class="small text-uppercase g-mb-5">ایمیل ما</h4>
                            <a class="g-color-white-opacity-0_8" href="mailto:hello@unify-gym.com"><strong>info@tanastyle.com</strong></a>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <i class="icon-earphones-alt d-inline-block display-5 g-color-primary g-mb-25"></i>
                            <h4 class="small text-uppercase g-mb-5">پشتیبانی</h4>
                            <a href="#" onclick="newConnection()"><strong>آغاز گفتگو</strong></a>
                        </div>
                    </address>
                </header>
            </div>
        </div>
        <!-- End Contact Info -->

        <!-- Social Links -->
        <ul class="row no-gutters list-inline g-mb-0">
            <li class="col list-inline-item g-mr-0">
                <a style="text-decoration: none" class="d-block g-bg-primary-dark-v2 g-color-white-opacity-0_8 g-bg-instagram--hover g-color-white--hover g-font-size-16 text-center g-transition-0_2 g-pa-15"
                   href="https://www.instagram.com/memol_rhinestone/">
                    <i class="fa fa-instagram"></i> Instagram
                </a>
            </li>
            <li class="col list-inline-item g-mr-0">
                <a style="text-decoration: none" class="d-block g-bg-primary-dark-v2 g-color-white-opacity-0_8 g-bg-instagram--hover g-color-white--hover g-font-size-16 text-center g-transition-0_2 g-pa-15"
                   href="https://www.t.me/tanastyleir">
                    <i class="fa fa-telegram"></i> Telegram
                </a>
            </li>
        </ul>
        <!-- End Social Links -->

        <!-- Copyright and Subscribe -->
        <footer class="text-center g-pt-40 g-pb-30">
            <div class="container">
                <a referrerpolicy="origin"
                   target="_blank"
                   href="https://trustseal.enamad.ir/?id=241578&amp;Code=gEEBxepfVp0Ayi5kPrbt">
                    <img referrerpolicy="origin"
                         src="{{asset('img/Other/enamad.jpg')}}"
                         alt=""
                         style="cursor:pointer"
                         id="gEEBxepfVp0Ayi5kPrbt">
                </a>
{{--                <form>--}}
{{--                    <div class="form-group g-width-60x--md mx-auto g-mb-20">--}}
{{--                        <label class="h5 text-uppercase g-mb-20">از جدیدترین ها با خبر شوید</label>--}}
{{--                        <div class="input-group g-brd-gray-light-v2 g-brd-primary--focus">--}}
{{--                            <input class="form-control form-control-md g-brd-right-none rounded-0 pr-0" type="text"--}}
{{--                                   placeholder="ایمیل شما">--}}
{{--                            <div--}}
{{--                                class="input-group-addon d-flex align-items-center g-color-gray-light-v2 g-bg-white rounded-0">--}}
{{--                                <i class="icon-envelope"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

                <small class="d-block g-mt-15 g-font-size-default">1399 تمامی حقوق این وب سایت برای شرکت تابش پس زمینه مکریان محفوظ است</small>
            </div>
        </footer>
        <!-- End Copyright and Subscribe -->
    </div>
@endsection
