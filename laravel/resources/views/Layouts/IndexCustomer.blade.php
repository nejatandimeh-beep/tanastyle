@include('Layouts.BaseCssLink')
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

@yield('BaseCssLink')
</head>
@yield('CustomerNavigation')
@yield('Content')
@yield('CustomerFooter')
@yield('BaseJsLinks')
{{--{{dd($_SERVER['REQUEST_URI'])}}--}}
@switch($_SERVER['REQUEST_URI'])
    @case('/')
        <!--تخفیفات ویژه-->
        <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
        <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    @break
    @case(strpos($_SERVER['REQUEST_URI'],'/Product'))
        <!--تخفیفات ویژه-->
        <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
        <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
        <!--Modal and cropper-->
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
    @break
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-Product'))
    <!--تخفیفات ویژه-->
    <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
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
        <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <!--Progress Bar-->
        <script src="{{ asset('assets/js/components/hs.progress-bar.js') }}"></script>
        <!--Modal and cropper-->
        <script src="{{ asset('assets/js/cropper.js') }}"></script>
        <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
        <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
    @break
@endswitch
</body>
@yield('CustomerJsFunction')
@yield('BaseJsFunction')
