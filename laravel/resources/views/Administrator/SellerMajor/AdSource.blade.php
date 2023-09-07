@include('Layouts.BaseCssLink')
@yield('BaseCssLink')
</head>
<body>
    <div class="container g-my-20">
        <div class="g-brd-around g-brd-primary g-pa-10 col-11 col-lg-4 mx-auto">
            <img class="w-100"
                 src="{{asset($pic.'?'.date('Y-m-d H:i:s'))}}"
                 alt="Image Description">

            <div style="direction: rtl" class="g-py-15 text-center">
                <h5>ابتدا تصویر رو ذخیره کنید و پیرو قوانین بارگذاری، استوری را ساعت 11 امشب در استوری حساب اینستاگرام خود قرار دهید.</h5>
                <h6>متنی که باید در استوری قید شود:</h6>
                <h5 class="m-0 g-color-blue">اگه میخوای بیشتر ببینی حتما به پیجشون سر بزن!</h5>
                <div class="text-center g-my-10">
                    <a
                       class="h5 g-color-primary text-center"
                       data-toggle="modal"
                       data-target="#regulation"
                       href="#!">
                        <i class="fa fa-balance-scale g-font-size-20"></i> قوانین بارگذاری
                    </a>
                </div>
            </div>
            <div class="text-center g-color-gray-dark-v1">
                <a class="d-flex col-12 p-0 justify-content-center" id="instaLink"
                   onclick="navigator.clipboard.writeText($('#instagramID').text());
                   $(this).removeClass('d-flex').addClass('d-none'); $('#copyAlarm').show();
                   setTimeout(function() {$('#copyAlarm').hide();$('#instaLink').removeClass('d-none').addClass('d-flex');},1200)">
                    <h5 class="d-flex text-center g-mx-5">
                        <img id="instaProfileImg"
                             class="g-width-55 g-height-55 rounded-circle g-brd-around g-brd-2 g-brd-gray-light-v4"
                             src="{{asset('img/SellerMajorProfileImage/'.$mobile.'/instaProfileImg.jpg?'.date('Y-m-d H:i:s'))}}"
                             alt="Image Description">
                        <span id="instagramID" class="align-self-center">{{'@'.$instagram}}</span>
                    </h5>
                </a>
                <h5 style="display: none" id="copyAlarm" class="g-color-primary">کپی شد</h5>
                <p style="direction: rtl" class="m-0">با کلیک روی آیدی، کپی می شود..</p>
            </div>
        </div>
    </div>
    <div style="direction: rtl" class="modal fade text-center" id="regulation"
         tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog m-0 mx-lg-auto" role="document">
            <div style="min-height: 100vh" class="modal-content">
                <div style="position: sticky; top: 0; z-index: 100" class="modal-header g-bg-white g-pr-20 g-pl-20">
                    <h5 class="m-0">قوانین بارگذاری استوری</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <i class="fa fa-close g-font-size-16"></i>
                    </button>
                </div>
                <div style="direction: rtl"
                     class="alert alert-warning alert-dismissible fade show text-right g-pa-20--lg g-px-10 g-py-10"
                     role="alert">
                    <h4 class="h5"><i class="fa fa-warning"></i>قوانین با یک مثال</h4>
                    <p>کاربر عزیز جهت سهولت در یادگیری قوانین، مراحل را با یک مثال توضیح داده ایم و تصاویر و آیدی زیر تنها یک مثال است.</p>
                </div>
                <div style="direction: rtl" class="modal-body mx-3 text-right">
                    <div class="g-pb-30">
                        <h4 style="direction: rtl" class="text-right">1. فعالیت امشب من</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/1.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">2. ذخیره عکس</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/2.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">3. کپی کردن آیدی</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/3.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">4. گذاشتن استوری و افزودن متن</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/4.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">5.تگ کردن آیدی</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/5.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">6. بررسی تگ کامل</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/6.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right">7.اصلاح استایل و بارگذاری</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/7.jpg')}}"
                             alt="Image Description">
                    </div>
                    <div class="g-py-30">
                        <h4 style="direction: rtl" class="text-right g-color-orange">توجه مهم</h4>
                        <img class="w-100 g-rounded-15"
                             src="{{asset('img/AdvertisingHelp/8.jpg')}}"
                             alt="Image Description">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
</body>

