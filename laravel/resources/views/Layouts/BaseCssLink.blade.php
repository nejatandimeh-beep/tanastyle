@section('BaseCssLink')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="enamad" content="533166"/>
    <meta name="description"
          content="لباس تاناکورا بازارچه مرزی مهاباد بانه پیرانشهر سردشت تانا استایل فروشگاه پوشاک زنانه مردانه بچگانه دخترانه پسرانه لباس زیر کفش کیف ورزشی اکسسوری بدلیجات">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="nejat andimeh">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>TanaStyle</title>

    <link rel="icon" href="{{asset('img/Logo/browserIcon.png')}}" />

    <!--My Style-->
    <link href="{{ asset('css/myStyle.css?v=op565o') }}" rel="stylesheet">
<!--Unify Style-->
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min_1.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-line/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/wait-animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/custombox/custombox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/themes/base/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hamburgers/hamburgers.min.css') }}">
    <!-- CSS Unify -->
    <link rel="stylesheet" href="{{ asset('assets/css/unify_1.css') }}">

    <!-- Confirm Msg -->
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">

    <!-- Cropper img -->
    <link  href="{{ asset('css/cropper.css') }}" rel="stylesheet">
<!--End Unify Style-->
@endsection
