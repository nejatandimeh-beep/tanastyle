@include('Layouts.BaseCssLink')
@include('Layouts.SellerNavigation')
@include('Layouts.SellerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.SellerJsFunctions')
@include('Layouts.BaseJsFunction')

@yield('BaseCssLink')
</head>
@yield('SellerNavigation')
@yield('Content')
@yield('SellerFooter')
@yield('BaseJsLinks')
{{--{{dd($_SERVER['REQUEST_URI'])}}--}}
@switch($_SERVER['REQUEST_URI'])
    @case(strpos($_SERVER['REQUEST_URI'],'/Add-Product'))
    @case(strpos($_SERVER['REQUEST_URI'],'/Add-Other-Product'))
    <!--Modal and cropper-->
    <script src="{{ asset('assets/js/cropper.js') }}"></script>
    <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
    <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.progress-bar.js') }}"></script>
    @break
    @case('/Seller-productDelivery')
    <script src="{{ asset('assets/js/components/hs.progress-bar.js') }}"></script>
    @break
@endswitch
</body>
@yield('SellerJsFunction')
@yield('BaseJsFunction')
