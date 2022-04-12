@section('BaseJsFunction')

    {{--    Unify Functions--}}
    <script>
        // غیر فعال کردن کلید اینتر در ورودی فرمها جهت سابمیت فرم
        window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
        $(window).on('load', function () {
            // initialization of HSMegaMenu component
            if ($('.customerNavigation').length > 0){
                $.HSCore.components.HSHeader.init($('#js-header'));
                $('.js-mega-menu').HSMegaMenu();
            } else {
                $.HSCore.components.HSHeaderSide.init($('#js-header'));
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'vertical',
                    breakpoint: 991
                });
            }
            $.HSCore.helpers.HSHamburgers.init('.hamburger');
        });

        $(document).on('ready', function () {
            // initialization of carousel
            if($('.productDetail').length>0){
                $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');
                // initialization of carousels
            }
            // initialization of autonomous popups
            if($('.modalBox').length>0){
                $.HSCore.components.HSModalWindow.init('.js-autonomous-popup', {
                    autonomous: true
                });
                $.HSCore.components.HSModalWindow.init('[data-modal-target]:not(.js-modal-markup)');
            }
        });
    </script>
    </html>
@endsection

