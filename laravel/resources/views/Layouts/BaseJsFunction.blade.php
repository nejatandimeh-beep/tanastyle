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
            if($('.js-carousel').length>0){
                $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');
                // initialization of carousels
                let productImages = $('#js-carousel-sync-for'),
                    productImagesNav = $('#js-carousel-sync-nav');

                productImages.slick('slickSetOption', {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    asNavFor: '#js-carousel-sync-nav'
                }, true);

                productImagesNav.slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '#js-carousel-sync-for',
                    dots: false,
                    focusOnSelect: true,
                    adaptiveHeight: true
                });

                $('#js-carousel-1, #js-carousel-7, #js-carousel-8').slick('setOption', 'responsive', [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 554,
                    settings: {
                        slidesToShow: 1
                    }
                }], true);
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

