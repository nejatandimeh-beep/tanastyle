@section('BaseJsFunction')

    {{--    Unify Functions--}}
    <script>
        $(window).on('load', function () {
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            if ($('.customerNavigation').length > 0){
                $('.js-mega-menu').HSMegaMenu();
            } else {
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'vertical',
                    breakpoint: 991
                });
            }
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

                $('#js-carousel-2, #js-carousel-3, #js-carousel-6').slick('setOption', 'responsive', [{
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 5
                    }
                }, {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                }, {
                    breakpoint: 670,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1
                    }
                }], true);

                $('#js-carousel-4, #js-carousel-5').slick('setOption', 'responsive', [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 554,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
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

