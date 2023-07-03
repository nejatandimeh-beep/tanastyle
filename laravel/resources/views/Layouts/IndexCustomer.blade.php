@include('Layouts.BaseCssLink')
@include('Layouts.CustomerNavigation')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@switch($_SERVER['REQUEST_URI'])
    @case('/Tanakora-Mahabad')
    @case('/Customer-SellerMajor-Reactions')
    @case('/Customer-Following-SellerMajor')
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Messages'))
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Panel'))
    @case('/Customer-SellerMajor-Saved')
    @include('Layouts.CustomerFeedJsFunctions')
    @break
    @default
    @include('Layouts.CustomerFooter')
    @include('Layouts.CustomerJsFunctions')
@endswitch

@yield('BaseCssLink')
@switch($_SERVER['REQUEST_URI'])
    @case('/Tanakora-Mahabad')
    @case('/Customer-SellerMajor-Reactions')
    @case('/Customer-Following-SellerMajor')
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Panel'))
    @case('/Customer-SellerMajor-Saved')
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-hs/style.css') }}">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('owlCarouselAssets/owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlCarouselAssets/owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
    @break
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Messages'))
    <link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/jquery.fancybox.min.css') }}">
    @endswitch
    </head>
    @yield('CustomerNavigation')
    @yield('Content')
    @yield('CustomerFooter')
    @yield('BaseJsLinks')
    {{--{{dd($_SERVER['REQUEST_URI'])}}--}}
    @switch($_SERVER['REQUEST_URI'])
        @case('/')
        <!--تخفیفات ویژه-->
        <script src="{{ asset('js/swiper-bundle.js') }}"></script>
        @break
        @case(strpos($_SERVER['REQUEST_URI'],'/Product'))
        <!--تخفیفات ویژه-->
        <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
        <script
            src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <!--Modal and cropper-->
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Event.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/Magnifier.js?v=3') }}"></script>
        @break
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-Product'))
        <!--تخفیفات ویژه-->
        <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
        <script
            src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <!--Modal and cropper-->
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
        @break
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-Profile/'))
        <!--Side Menu-->
        <script
            src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script
            src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <!--Progress Bar-->
        <script src="{{ asset('assets/js/components/hs.progress-bar.js') }}"></script>
        <!--Modal and cropper-->
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
        @break
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-Cart'))
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
        @break
        @case('/Tanakora-Mahabad')
        @case('/Customer-SellerMajor-Reactions')
        @case('/Customer-Following-SellerMajor')
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Panel'))
        @case('/Customer-SellerMajor-Saved')
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
        <script src="{{ asset('owlCarouselAssets/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('owlCarouselAssets/vendors/highlight.js') }}"></script>
        <script src="{{ asset('owlCarouselAssets/js/app.js') }}"></script>
        <script src="{{ asset('js/swiper-bundle.js') }}"></script>
        @break
        @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Messages'))
        <script src="{{ asset('assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
        @break
        @endswitch
        </body>
        @switch($_SERVER['REQUEST_URI'])
            @case('/Tanakora-Mahabad')
            @case('/Customer-SellerMajor-Reactions')
            @case('/Customer-SellerMajor-Reactions')
            @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Messages'))
            @case(strpos($_SERVER['REQUEST_URI'],'/Customer-SellerMajor-Panel'))
            @case('/Customer-Following-SellerMajor')
            @case('/Customer-SellerMajor-Saved')
            @yield('FeedJsFunction')
            @break
            @default
            @yield('CustomerJsFunction')
        @endswitch
        @yield('BaseJsFunction')
