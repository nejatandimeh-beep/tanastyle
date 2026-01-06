<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mevan') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/unify_1.css') }}">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet">

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <script type="text/javascript">
        (function() {
            let font_awesome = document.createElement('link');

            font_awesome.href = "{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}";
            font_awesome.rel = 'stylesheet';
            font_awesome.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(font_awesome);
        })();

        (function() {
            let simple_line_icons = document.createElement('link');

            simple_line_icons.href = "{{ asset('assets/vendor/icon-line/css/simple-line-icons.css') }}";
            simple_line_icons.rel = 'stylesheet';
            simple_line_icons.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(simple_line_icons);
        })();
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/FarsiType.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<!-- دکمه برگشت شبیه کروم -->
<button id="backButton" title="بازگشت به صفحه قبل">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 18L9 12L15 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</button>
<div id="currentPage" class="d-none">{{$_SERVER['REQUEST_URI']}}</div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container text-right g-py-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/Logo/logo2.svg') }}" alt="Image Description" width="120" class="">
            </a>
            <button style="border: none !important;" class="navbar-toggler rounded-0" type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul id="customerNavigation" class="navbar-nav ml-auto p-0" style="direction: rtl">
                    <li class="nav-item">
                        <a class="nav-link g-mt-20 g-mt-0--lg g-color-primary--hover" id="homePage"
                           href="{{ url('/') }}">صفحه
                            نخست</a>
                    </li>

                    <li id="sellerProfile" class="nav-item">
                        <a class="{{ (isset(Auth::user()->id)) ? '':'d-none' }} nav-link g-mt-20 g-mt-0--lg g-color-primary--hover"
                           href="{{route('profile', ['id' => 'navigation'])}}">حساب کاربری</a>
                    </li>

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover" href="{{ route('login') }}">ورود</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link g-color-primary--hover"
                                   href="{{ url('/request-customer-mobile','register') }}">ثبت نام</a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
<script>
    $(".forceEnglishNumber").keypress(function (event) {
        let ew = event.which;
        if (48 <= ew && ew <= 57)
            return true;
        return false;
    });

    // change persian num to english num
    let persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
        arabicNumbers = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
        fixNumbers = function (str) {
            if (typeof str === 'string') {
                for (let i = 0; i < 10; i++) {
                    str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
                }
            }
            console.log(str);
            return str;
        };
    $('input').on('input', function () {
        $(this).val(fixNumbers($(this).val()));
    })


    $(document).on('ready', function () {
        if ($('#password').length > 0) {
            let myInput = $('#password'),
                letter = $("#lowercase"),
                capital = $("#uppercase"),
                number = $("#number"),
                length = $("#length");

            myInput.on('keyup', function () {
                // Validate lowercase letters
                let lowerCaseLetters = /[a-z]/g;
                if (myInput.val().match(lowerCaseLetters)) {
                    letter.removeClass("g-bg-red");
                    letter.addClass("g-bg-primary");
                } else {
                    letter.removeClass("g-bg-primary");
                    letter.addClass("g-bg-red");
                }

                // Validate capital letters
                let upperCaseLetters = /[A-Z]/g;
                if (myInput.val().match(upperCaseLetters)) {
                    capital.removeClass("g-bg-red");
                    capital.addClass("g-bg-primary");
                } else {
                    capital.removeClass("g-bg-primary");
                    capital.addClass("g-bg-red");
                }

                // Validate numbers
                let numbers = /[0-9]/g;
                if (myInput.val().match(numbers)) {
                    number.removeClass("g-bg-red");
                    number.addClass("g-bg-primary");
                } else {
                    number.removeClass("g-bg-primary");
                    number.addClass("g-bg-red");
                }

                // Validate length
                if (myInput.val().length >= 8) {
                    length.removeClass("g-bg-red");
                    length.addClass("g-bg-primary");
                } else {
                    length.removeClass("g-bg-primary");
                    length.addClass("g-bg-red");
                }
            });
        }
        //-------------------------
        if ($('#currentPage').text() === '/change-seller-password') {
            $('#homePage').hide();
        } else {
            $('#sellerProfile').hide();
        }
    });

    function checkPass() {
        let myInput = $('#password'),
            letter = $("#lowercase"),
            capital = $("#uppercase"),
            number = $("#number"),
            length = $("#length");

        if (letter.hasClass('g-bg-red') || capital.hasClass('g-bg-red') || number.hasClass('g-bg-red') || length.hasClass('g-bg-red')) {
            alert('لطفا قواعد رمزگذاری را رعایت کنید.');
        } else {
            if (myInput.val() === $('#password-confirm').val()) {
                $('#submitText').hide();
                $('#waitingSubmit').hide();
                $('#save').prop('disabled', true);
                $('form').submit();
            } else {
                alert('رمز و تکرار رمز یکسان نیستند.')
            }
        }
    }
    // backButton control
    (function () {
        const STACK_KEY = 'app_history_stack';

        function getStack() {
            return JSON.parse(sessionStorage.getItem(STACK_KEY) || '[]');
        }

        function setStack(stack) {
            sessionStorage.setItem(STACK_KEY, JSON.stringify(stack));
        }

        // ثبت مسیر فعلی
        function pushPage() {
            const stack = getStack();
            const current = location.href;

            if (stack[stack.length - 1] !== current) {
                stack.push(current);
                setStack(stack);
            }
        }

        // برگشت اختصاصی
        window.appBack = function () {
            const stack = getStack();
            stack.pop(); // صفحه فعلی

            const prev = stack.pop();
            setStack(stack);

            if (prev) {
                location.replace(prev); // مهم: replace نه href
            } else {
                location.replace('/');
            }
        };

        pushPage();
    })();

    document.getElementById('backButton').addEventListener('click', function (e) {
        e.preventDefault();
        window.appBack();
    });
    (function disableBrowserBack() {
        history.pushState(null, '', location.href);

        window.addEventListener('popstate', function () {
            history.pushState(null, '', location.href);
        });
    })();
</script>
</html>

