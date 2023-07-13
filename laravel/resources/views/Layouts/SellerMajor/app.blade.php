<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TanaStyle') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/FarsiType.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/unify_1.css') }}">
    <link href="{{ asset('css/cropperCircle.css') }}" rel="stylesheet">

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
    <link href="{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container text-right g-py-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/Logo/logo.png') }}" alt="Image Description" width="120" class="">
            </a>
            <button style="border: none !important;" class="navbar-toggler rounded-0" type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link g-mt-20 g-mt-0--lg g-color-primary--hover" title="اگه قبلا ثبت نام کرده اید"
                           href="{{ url('/Seller-Panel') }}">
                            ورود کنید</a>
                    </li>
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
    $(document).ready(function () {
        if($('#password').length>0){
            let myInput=$('#password'),
                letter = $("#lowercase"),
                capital = $("#uppercase"),
                number = $("#number"),
                length = $("#length");

            myInput.on('keyup',function() {
                // Validate lowercase letters
                let lowerCaseLetters = /[a-z]/g;
                if(myInput.val().match(lowerCaseLetters)) {
                    letter.removeClass("g-bg-red");
                    letter.addClass("g-bg-primary");
                } else {
                    letter.removeClass("g-bg-primary");
                    letter.addClass("g-bg-red");
                }

                // Validate capital letters
                let upperCaseLetters = /[A-Z]/g;
                if(myInput.val().match(upperCaseLetters)) {
                    capital.removeClass("g-bg-red");
                    capital.addClass("g-bg-primary");
                } else {
                    capital.removeClass("g-bg-primary");
                    capital.addClass("g-bg-red");
                }

                // Validate numbers
                let numbers = /[0-9]/g;
                if(myInput.val().match(numbers)) {
                    number.removeClass("g-bg-red");
                    number.addClass("g-bg-primary");
                } else {
                    number.removeClass("g-bg-primary");
                    number.addClass("g-bg-red");
                }

                // Validate length
                if(myInput.val().length >= 8) {
                    length.removeClass("g-bg-red");
                    length.addClass("g-bg-primary");
                } else {
                    length.removeClass("g-bg-primary");
                    length.addClass("g-bg-red");
                }
            });
        }

        $('#mobileHint').val($('#mobile').val());
        $('.nowDate').text(nowDate());

        let $modal = $('#modal'),
            image = document.getElementById('sample_image'),
            cropper, inputID, inputIdFinshed = [], counter = 0,file_type;
        $('input[id^="pic"]').on('change', function (event) {
            if (!$('#mobile').hasClass('g-brd-red')) {
                inputID = $(this).attr('id').replace(/[^0-9]/gi, '');
                $('#fileShow' + inputID).removeClass('g-color-red');
                let files = event.target.files,
                    done = function (url) {
                        image.src = url;
                        $modal.modal('show');
                    };

                if (files && files.length > 0) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                    file_type = files[0].type;
                }
            } else
                alert('ابتدا لطفا شماره موبایل را بصورت صحیح وارد کنید.');
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
                zoomable: true,
                background: true,
                minCropBoxWidth: 500,
                minCropBoxHeight: 500,
                dragCrop: true,
                dragMode: 'move',
                multiple: true,
                movable: true
                // preview: '.preview'
            });
        });

        $modal.on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').on('click', function () {
            let canvas = cropper.getCroppedCanvas({
                width: 500,
                height: 500
            });

            canvas.toBlob(function (blob) {
                let url = URL.createObjectURL(blob),
                    reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    let type = file_type.split('/'), form;
                    file_upload = new File([blob], "pic." + type[1]);
                    form = new FormData();
                    form.append('imageUrl', file_upload);
                    form.append('mobileHint', $('#mobile').val());
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/sellerMajor/profile/image',
                        data: form,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        beforeSend: function () {
                            $('#profileImgSubmitIcon').addClass('d-none');
                            $('#waitingCrop').removeClass('d-none');
                        },
                        success: function () {
                            console.log('uploaded');
                            $modal.modal('hide');
                            $('#profileImgSubmitIcon').removeClass('d-none');
                            $('#waitingCrop').addClass('d-none');
                            addPathCheckMark('pic' + inputID, 'fileShow' + inputID, 'Check' + inputID);
                        }
                    });
                };
            });
        });

        $('#imageUploadForm').on('submit', (function (e) {
            $('#uploadingIcon' + inputID).removeClass('d-none');
            $('#uploadingText' + inputID).removeClass('d-none');
            $('#fileShow' + inputID).addClass('d-none');
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    inputIdFinshed[counter] = data;
                    counter++;
                    console.log("success");
                    console.log(data);
                }
            }).done(function () {
                for (let i = 0; i <= inputIdFinshed.length; i++) {
                    $('#uploadingIcon' + inputIdFinshed[i]).addClass('d-none');
                    $('#uploadingText' + inputIdFinshed[i]).addClass('d-none');
                    $('#fileShow' + inputIdFinshed[i]).removeClass('d-none');
                }
            })
        }));
    });

    function addPathCheckMark(picID, filePathID, checkMarkID) {
        let pic = $('#' + picID),
            ext = pic.val().split('.').pop().toLowerCase(),
            filePath = $('#' + filePathID),
            checkMark = $("#" + checkMarkID);
        if ((pic.val() !== '') && ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) !== -1)) {
            let fileName = pic.val().split("\\").pop();
            filePath.attr("placeholder", fileName);
            filePath.removeClass('g-brd-red');
            filePath.removeClass('g-color-red');
            filePath.addClass('g-color-primary');
            checkMark.css('display', 'inline');
        } else {
            filePath.attr("placeholder", 'فاقد تصویر');
            filePath.addClass('g-brd-red');
            filePath.addClass('g-color-red');
            checkMark.css('display', 'none');
        }
    }

    function categorySelect(catHint, catCode) {
        let category = '';
        $('#accordion-04-body-01').removeClass('show');
        $('.card').removeClass('g-brd-red');

        switch (catCode) {
            case 'clothes':
                category = 'پوشاک (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'vehicles':
                category = 'وسایل نقلیه (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'sports':
                category = 'وسایل ورزشی (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'estate':
                category = 'املاک (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'electronic':
                category = 'لوازم الکتریکی (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'industrial':
                category = 'صنعتی، اداری و تجاری (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'services':
                category = 'خدمات و کسب و کار (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'connections':
                category = 'وسایل ارتباطی (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;
            case 'appliances':
                category = 'لوازم خانگی (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;

            case 'personal':
                category = 'لوازم شخصی (' + catHint + ')';
                $('#selectedItem').text(category);
                 $('#hintCategory').val(category);
                $('#category').val(catCode);
                break;

            default:
                $('#selectedItem').text(catHint);
                $('#category').val(catHint);
                break;
        }
    }

    function regulationCheck(btn){
        if(btn==='noAgree'){
            if (checkData()==='false') {
                alert('لطفا ابتدا تمامی داده های مورد نیاز را تکمیل بفرمایید.');
            } else {
                $('#'+btn).addClass('d-none'); $('#agree').removeClass('d-none');
            }
        } else {
            $('#'+btn).addClass('d-none'); $('#noAgree').removeClass('d-none');
        }
        console.log(checkData());
    }

    function checkData() {
        if ($('#user-name').hasClass('g-brd-red') ||
            $('#mobile').hasClass('g-brd-red') ||
            $('#category').val() === 'empty' ||
            $('#category').val() === 'empty' ||
            $('#pic11').val() === ''
            ){
            return 'false';
        } else {
            return 'true';
        }
    }

    function showPassword() {
        let x = document.getElementById("password");
        if (x.type === "password") {
            $('#hidePassword').removeClass('d-none');
            $('#showPassword').addClass('d-none');
            x.type = "text";
        } else {
            $('#showPassword').removeClass('d-none');
            $('#hidePassword').addClass('d-none');
            x.type = "password";
        }
    }

    function saveUserData() {
        if (checkData()==='false' || $('#agree').hasClass('d-none')) {
            alert('لطفا فرم را بازبینی بفرمائید و خطاهای رخ داده را رفع و مجدداً تلاش کنید.');
        } else {
            $('#submitText').hide();
            $('#waitingSubmit').show();
            $('#save').prop('disabled', true);
            $('#registerForm').submit();
        }
    }

    function checkPass() {
        let myInput=$('#password'),
            letter = $("#lowercase"),
            capital = $("#uppercase"),
            number = $("#number"),
            length = $("#length");

        if (letter.hasClass('g-bg-red')||capital.hasClass('g-bg-red')||number.hasClass('g-bg-red')||length.hasClass('g-bg-red')) {
            alert('لطفا قواعد رمزگذاری را رعایت کنید.');
        } else {
            if(myInput.val() === $('#password-confirm').val()) {
                $('#submitText').hide();
                $('#waitingSubmit').show();
                $('#save').prop('disabled',true);
                $('form').submit();
            } else {
                alert('رمز و تکرار رمز یکسان نیستند.')
            }
        }
    }

    function nowDate() {
        let week = ["يكشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"],
            months = ["فروردين", "ارديبهشت", "خرداد", "تير", "مرداد", "شهريور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
            today = new Date(),
            d = today.getDay(),
            day = today.getDate(),
            month = today.getMonth() + 1,
            year = today.getFullYear() - (1900);
        let i, y;
        year = (window.navigator.userAgent.indexOf('MSIE') > 0) ? year : 1900 + year;
        if (year === 0) {
            year = 2000;
        }
        if (year < 100) {
            year += 1900;
        }
        y = 1;
        for (i = 0; i < 3000; i += 4) {
            if (year === i) {
                y = 2;
            }
        }
        for (i = 1; i < 3000; i += 4) {
            if (year === i) {
                y = 3;
            }
        }
        if (y === 1) {
            year -= ((month < 3) || ((month === 3) && (day < 21))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 21) ? (month = 10, day += 10) : (month = 11, day -= 20);
                    break;
                case 2:
                    (day < 20) ? (month = 11, day += 11) : (month = 12, day -= 19);
                    break;
                case 3:
                    (day < 21) ? (month = 12, day += 9) : (month = 1, day -= 20);
                    break;
                case 4:
                    (day < 21) ? (month = 1, day += 11) : (month = 2, day -= 20);
                    break;
                case 5:
                case 6:
                    (day < 22) ? (month -= 3, day += 10) : (month -= 2, day -= 21);
                    break;
                case 7:
                case 8:
                case 9:
                    (day < 23) ? (month -= 3, day += 9) : (month -= 2, day -= 22);
                    break;
                case 10:
                    (day < 23) ? (month = 7, day += 8) : (month = 8, day -= 22);
                    break;
                case 11:
                case 12:
                    (day < 22) ? (month -= 3, day += 9) : (month -= 2, day -= 21);
                    break;
                default:
                    break;
            }
        }
        if (y === 2) {
            year -= ((month < 3) || ((month === 3) && (day < 20))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 21) ? (month = 10, day += 10) : (month = 11, day -= 20);
                    break;
                case 2:
                    (day < 20) ? (month = 11, day += 11) : (month = 12, day -= 19);
                    break;
                case 3:
                    (day < 20) ? (month = 12, day += 10) : (month = 1, day -= 19);
                    break;
                case 4:
                    (day < 20) ? (month = 1, day += 12) : (month = 2, day -= 19);
                    break;
                case 5:
                    (day < 21) ? (month = 2, day += 11) : (month = 3, day -= 20);
                    break;
                case 6:
                    (day < 21) ? (month = 3, day += 11) : (month = 4, day -= 20);
                    break;
                case 7:
                    (day < 22) ? (month = 4, day += 10) : (month = 5, day -= 21);
                    break;
                case 8:
                    (day < 22) ? (month = 5, day += 10) : (month = 6, day -= 21);
                    break;
                case 9:
                    (day < 22) ? (month = 6, day += 10) : (month = 7, day -= 21);
                    break;
                case 10:
                    (day < 22) ? (month = 7, day += 9) : (month = 8, day -= 21);
                    break;
                case 11:
                    (day < 21) ? (month = 8, day += 10) : (month = 9, day -= 20);
                    break;
                case 12:
                    (day < 21) ? (month = 9, day += 10) : (month = 10, day -= 20);
                    break;
                default:
                    break;
            }
        }
        if (y === 3) {
            year -= ((month < 3) || ((month === 3) && (day < 21))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 20) ? (month = 10, day += 11) : (month = 11, day -= 19);
                    break;
                case 2:
                    (day < 19) ? (month = 11, day += 12) : (month = 12, day -= 18);
                    break;
                case 3:
                    (day < 21) ? (month = 12, day += 10) : (month = 1, day -= 20);
                    break;
                case 4:
                    (day < 21) ? (month = 1, day += 11) : (month = 2, day -= 20);
                    break;
                case 5:
                case 6:
                    (day < 22) ? (month -= 3, day += 10) : (month -= 2, day -= 21);
                    break;
                case 7:
                case 8:
                case 9:
                    (day < 23) ? (month -= 3, day += 9) : (month -= 2, day -= 22);
                    break;
                case 10:
                    (day < 23) ? (month = 7, day += 8) : (month = 8, day -= 22);
                    break;
                case 11:
                case 12:
                    (day < 22) ? (month -= 3, day += 9) : (month -= 2, day -= 21);
                    break;
                default:
                    break;
            }
        }
        // let now = week[d] + " " + day + " " + months[month - 1] + " " + year;
        let now = day + " " + months[month - 1] + " " + year;
        return now;
    }
</script>
<script src="{{ asset('assets/js/cropper.js') }}"></script>
</html>

