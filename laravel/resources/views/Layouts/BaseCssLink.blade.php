@section('BaseCssLink')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="enamad" content="533166"/>
    <meta name="google-site-verification" content="ZF9gtW1PLAjYwujNgL6mFfeQHmeZF1dP2W090aHWCD8" />
    <meta name="description"
          content="tanakora mahabad marz لباس استوک تاناکورا بازارچه مرزی مهاباد بانه پیرانشهر سردشت تانا استایل فروشگاه پوشاک زنانه مردانه بچگانه دخترانه پسرانه لباس زیر کفش کیف ورزشی اکسسوری بدلیجات">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="nejat andimeh">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>TanaStyle</title>

    <link rel="shortcut icon" href="{{asset('img/Logo/browserIcon.png')}}" />

    <link rel="apple-touch-icon" href="{{asset('img/Logo/browserIcon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/Logo/browserIcon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/Logo/browserIcon.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/Logo/browserIcon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/dzsparallaxer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/dzsscroller/scroller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/dzsparallaxer/advancedscroller/plugin.css')}}">
    <!--My Style-->
    <link href="{{ asset('css/myStyle.css?v=dsv3wfs3e3') }}" rel="stylesheet">
<!--Unify Style-->
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min_1.css') }}">

    <!-- CSS Implementing Plugins -->
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-line/css/simple-line-icons.css') }}">--}}
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
