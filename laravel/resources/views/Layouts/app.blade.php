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
    /* ===============================
       DOM READY
    ================================ */
    document.addEventListener('DOMContentLoaded', function () {

        /* ===============================
           1️⃣ فقط عدد انگلیسی (Safe)
        ================================ */
        document.querySelectorAll('.forceEnglishNumber').forEach(input => {
            input.addEventListener('keydown', e => {
                if (
                    (e.key >= '0' && e.key <= '9') ||
                    ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'].includes(e.key)
                ) {
                    return;
                }
                e.preventDefault();
            });

            input.addEventListener('input', () => {
                input.value = input.value.replace(/[^\d]/g, '');
            });
        });


        /* ===============================
           2️⃣ تبدیل اعداد فارسی / عربی
        ================================ */
        const persian = [/۰/g,/۱/g,/۲/g,/۳/g,/۴/g,/۵/g,/۶/g,/۷/g,/۸/g,/۹/g];
        const arabic  = [/٠/g,/١/g,/٢/g,/٣/g,/٤/g,/٥/g,/٦/g,/٧/g,/٨/g,/٩/g];

        function fixNumbers(str) {
            if (typeof str !== 'string') return str;
            for (let i = 0; i < 10; i++) {
                str = str.replace(persian[i], i).replace(arabic[i], i);
            }
            return str;
        }

        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', () => {
                input.value = fixNumbers(input.value);
            });
        });


        /* ===============================
           3️⃣ اعتبارسنجی حرفه‌ای پسورد
        ================================ */
        const password = document.getElementById('password');
        if (password) {

            const rules = {
                lowercase: /[a-z]/,
                uppercase: /[A-Z]/,
                number: /[0-9]/,
                length: /.{8,}/
            };

            const indicators = {
                lowercase: document.getElementById('lowercase'),
                uppercase: document.getElementById('uppercase'),
                number: document.getElementById('number'),
                length: document.getElementById('length')
            };

            password.addEventListener('keyup', () => {
                Object.keys(rules).forEach(rule => {
                    if (rules[rule].test(password.value)) {
                        indicators[rule]?.classList.remove('g-bg-red');
                        indicators[rule]?.classList.add('g-bg-primary');
                    } else {
                        indicators[rule]?.classList.remove('g-bg-primary');
                        indicators[rule]?.classList.add('g-bg-red');
                    }
                });
            });
        }


        /* ===============================
           4️⃣ ارسال فرم پسورد امن
        ================================ */
        window.checkPass = function () {

            const pass = document.getElementById('password');
            const confirm = document.getElementById('password-confirm');

            if (!pass || !confirm) return;

            const invalid = document.querySelectorAll('#passwordHint .g-bg-red').length;

            if (invalid > 0) {
                alert('❌ رمز عبور شرایط لازم را ندارد');
                return;
            }

            if (pass.value !== confirm.value) {
                alert('❌ رمز و تکرار رمز یکسان نیست');
                return;
            }

            document.getElementById('save')?.setAttribute('disabled', true);
            document.getElementById('submitText')?.style.display = 'none';
            document.getElementById('waitingSubmit')?.style.display = 'inline-block';

            pass.closest('form').submit();
        };


        /* ===============================
           5️⃣ مدیریت برگشت بدون Loop
           ⛔️ دکمه مرورگر غیرفعال
           ✅ فقط دکمه اختصاصی شما
        ================================ */

        const STACK_KEY = 'app_history_stack';

        function getStack() {
            return JSON.parse(sessionStorage.getItem(STACK_KEY) || '[]');
        }

        function setStack(stack) {
            sessionStorage.setItem(STACK_KEY, JSON.stringify(stack));
        }

        function pushPage() {
            const stack = getStack();
            const current = location.pathname;

            if (stack[stack.length - 1] !== current) {
                stack.push(current);
                setStack(stack);
            }
        }

        // فقط یک بار ثبت
        pushPage();

        // دکمه برگشت اختصاصی
        window.appBack = function () {
            let stack = getStack();
            stack.pop(); // صفحه فعلی
            const prev = stack.pop();
            setStack(stack);

            if (prev) {
                location.replace(prev);
            } else {
                location.replace('/');
            }
        };

        // غیرفعال‌سازی back مرورگر
        history.pushState(null, '', location.href);
        window.addEventListener('popstate', function () {
            history.pushState(null, '', location.href);
        });

    });
</script>
</html>

