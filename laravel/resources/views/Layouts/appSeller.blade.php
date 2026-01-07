<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mevan') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/unify_1.css') }}">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}">
    <link href="{{ asset('css/fontiran.css') }}" rel="stylesheet">

    <!-- Cropper img -->
    <link  href="{{ asset('css/cropper.css') }}" rel="stylesheet">
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
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container text-right g-py-5">
            <a class="navbar-brand" href="{{ url('/Seller-Panel') }}">
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
                <ul class="navbar-nav ml-auto p-0" style="direction: rtl">
                    <li class="nav-item">
                        <a class="nav-link g-mt-20 g-mt-0--lg g-color-primary--hover" href="{{ url('/') }}">صفحه
                            نخست</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
{{--Cropper--}}
<script src="{{ asset('assets/js/cropper.js') }}"></script>
</body>
<script>
    $(document).ready(function () {

        // --------- تبدیل اعداد فارسی/عربی به انگلیسی ---------
        const persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
            arabicNumbers  = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g];

        const fixNumbers = (str) => {
            if(typeof str === 'string'){
                for(let i=0;i<10;i++){
                    str = str.replace(persianNumbers[i],i).replace(arabicNumbers[i],i);
                }
            }
            return str;
        };

        $('input').on('input', function(){
            $(this).val(fixNumbers($(this).val()));
        });

        // --------- المان‌ها ---------
        const passwordInput = document.getElementById('password');
        const passwordConfirmInput = document.getElementById('password-confirm');
        const strengthBar = document.getElementById('passwordStrength');

        const rules = {
            length: document.getElementById('rule-length'),
            number: document.getElementById('rule-number'),
            uppercase: document.getElementById('rule-uppercase'),
            lowercase: document.getElementById('rule-lowercase'),
            special: document.getElementById('rule-special')
        };

        // --------- بررسی strength رمز ---------
        if(passwordInput){
            passwordInput.addEventListener('input', function(){
                const val = passwordInput.value;
                let strength = 0;

                if(val.length >= 8){ rules.length.classList.replace('text-danger','text-success'); strength++; }
                else { rules.length.classList.replace('text-success','text-danger'); }

                if(/[0-9]/.test(val)){ rules.number.classList.replace('text-danger','text-success'); strength++; }
                else { rules.number.classList.replace('text-success','text-danger'); }

                if(/[A-Z]/.test(val)){ rules.uppercase.classList.replace('text-danger','text-success'); strength++; }
                else { rules.uppercase.classList.replace('text-success','text-danger'); }

                if(/[a-z]/.test(val)){ rules.lowercase.classList.replace('text-danger','text-success'); strength++; }
                else { rules.lowercase.classList.replace('text-success','text-danger'); }

                if(/[\W_]/.test(val)){ rules.special.classList.replace('text-danger','text-success'); strength++; }
                else { rules.special.classList.replace('text-success','text-danger'); }

                const percent = (strength/5)*100;
                strengthBar.style.width = percent+'%';
                strengthBar.className = 'progress-bar';
                if(percent < 40) strengthBar.classList.add('bg-danger');
                else if(percent < 80) strengthBar.classList.add('bg-warning');
                else strengthBar.classList.add('bg-success');
            });
        }

        // --------- toggle نمایش/مخفی رمز ---------
        const toggles = document.querySelectorAll('.toggle-eye'); // به هر دکمه یک کلاس toggle-eye بده
        toggles.forEach(btn => {
            btn.addEventListener('click', function(e){
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                if(!input) return;

                if(input.type === 'password'){
                    input.type = 'text';
                    this.querySelector('i').classList.replace('fa-eye','fa-eye-slash');
                } else {
                    input.type = 'password';
                    this.querySelector('i').classList.replace('fa-eye-slash','fa-eye');
                }
            });
        });

        // --------- backButton امن ---------
        const backBtn = document.getElementById('backButton');
        if(backBtn){
            backBtn.addEventListener('click', function(){
                if(document.referrer){
                    window.history.back();
                }else{
                    window.location.href = '/';
                }
            });
        }

    });
</script>
</html>

