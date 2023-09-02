@include('Layouts.BaseCssLink')
@yield('BaseCssLink')
</head>
<body>
    <div class="container g-my-20">
        <div class="g-brd-around g-brd-primary g-pa-10 col-11 col-lg-4 mx-auto">
            <img class="w-100"
                 src="{{asset($pic)}}"
                 alt="Image Description">

            <div style="direction: rtl" class="g-py-15 text-center">
                <h5>ابتدا تصویر رو ذخیره کنید و پیرو قوانین زیر استوری را ساعت 11 امشب در استوری حساب اینستاگرام خود قرار دهید.</h5>
                <h6>متنی که باید در استوری قید شود:</h6>
                <h5 class="m-0 g-color-blue">اگه میخوای بیشتر ببینی حتما به پیجشون سر بزن!</h5>
                <p class="m-0">سپس لینک پایین رو تگ کنید.</p>
                <p class="m-0">با کلیک روی لینک زیر، کپی می شود..</p>
            </div>
            <div class="text-center g-color-gray-dark-v1">
                <a class="d-flex col-12 p-0 justify-content-center" id="instaLink"
                   onclick="navigator.clipboard.writeText($('#instagramID').text());
                   $(this).removeClass('d-flex').addClass('d-none'); $('#copyAlarm').show();
                   setTimeout(function() {$('#copyAlarm').hide();$('#instaLink').removeClass('d-none').addClass('d-flex');},1200)">
                    <span><i class="fa fa-copy g-font-size-20 align-middle"></i></span>
                    <h5 class="text-center g-mx-5"><span id="instagramID">{{'@'.$instagram}}</span></h5>
                </a>
                <h5 style="display: none" id="copyAlarm" class="g-color-primary">کپی شد</h5>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
</body>

