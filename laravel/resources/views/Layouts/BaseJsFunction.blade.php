@section('BaseJsFunction')

    {{--    Unify Functions--}}
    <script>
        // Hide Tooltip After 2s
        // setInterval($(function () {
        //     $(document).on('shown.bs.tooltip', function (e) {
        //         setTimeout(function () {
        //             $(e.target).tooltip('hide');
        //         }, 2000);
        //     });
        // });

        $(document).on('ready', function () {
            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of scroll animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

            // initialization of forms
            $.HSCore.components.HSFileAttachment.init('.js-file-attachment');

            // initialization of rating
            $.HSCore.components.HSRating.init($('.js-rating'), {
                spacing: 4
            });
            $.HSCore.components.HSChartPie.init('.js-pie');

            $.HSCore.helpers.HSFocusState.init();
            $.HSCore.helpers.HSNotEmptyState.init();
            $.HSCore.components.HSDatepicker.init('#datepickerDefault, #datepickerInline, #datepickerInlineFrom, #datepickerFrom');
            $.HSCore.components.HSSlider.init('#regularSlider, #regularSlider2, #regularSlider3, #rangeSlider, #rangeSlider2, #rangeSlider3, #stepSlider, #stepSlider2, #stepSlider3');
            $.HSCore.components.HSMaskedInput.init('[data-mask]');
            $.HSCore.components.HSCountQty.init('.js-quantity');

            // initialization of autonomous popups
            $.HSCore.components.HSModalWindow.init('.js-autonomous-popup', {
                autonomous: true
            });
            $.HSCore.components.HSModalWindow.init('[data-modal-target]:not(.js-modal-markup)');


            $('#we-provide').slick('setOption', 'respons' +
                '' +
                'ive', [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            }, {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1
                }
            }], true);

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function () {
                    $(this).find('input[type="noType"]').focus();
                }
            });

            // initialization of HSScrollBar component
            $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));

            // initialization of masonry
            $('.masonry-grid').imagesLoaded().then(function () {
                $('.masonry-grid').masonry({
                    columnWidth: '.masonry-grid-sizer',
                    itemSelector: '.masonry-grid-item',
                    percentPosition: true
                });
            });

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            $('#carouselCus1').slick('setOption', 'responsive', [{
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
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            }], true);
        });

        $(document).on('ready', function () {
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
        });

        $(window).on('load', function () {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header2'));
            $.HSCore.components.HSHeaderSide.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of autocomplet
            $.HSCore.components.HSLocalSearchAutocomplete.init('#autocomplete1');

            // initialization of autocomplet
            $.HSCore.components.HSAutocomplete.init('#autocomplete2');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'vertical',
                breakpoint: 991
            });
        });

        var tpj = jQuery;

        var revapi495;
        tpj(document).ready(function () {
            if (tpj('#rev_slider_495_1').revolution == undefined) {
                revslider_showDoubleJqueryError('#rev_slider_495_1');
            } else {
                revapi495 = tpj('#rev_slider_495_1').show().revolution({
                    sliderType: 'hero',
                    jsFileLocation: 'revolution/js/',
                    sliderLayout: 'fullwidth',
                    dottedOverlay: 'none',
                    delay: 9000,
                    navigation: {},
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 500, 400, 300],
                    lazyType: 'none',
                    parallax: {
                        type: 'mouse',
                        origo: 'slidercenter',
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55]
                    },
                    shadow: 0,
                    spinner: 'off',
                    autoHeight: 'off',
                    disableProgressBar: 'on',
                    hideThumbsOnMobile: 'off',
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: 'off',
                        disableFocusListener: false
                    }
                });
            }
        });

        $(window).on('resize', function () {
            setTimeout(function () {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });

        var slider = new MasterSlider();

        slider.control('arrows', {
            autohide: true,
            overVideo: true
        });
        slider.control('slideinfo', {
            autohide: false,
            overVideo: true,
            dir: 'h',
            align: 'bottom',
            inset: false,
            margin: 10
        });
        slider.setup("masterslider", {
            width: 240,
            height: 240,
            minHeight: 0,
            space: 0,
            start: 1,
            grabCursor: true,
            swipe: true,
            mouse: true,
            keyboard: false,
            layout: "partialview",
            wheel: true,
            autoplay: false,
            instantStartLayers: false,
            loop: true,
            shuffle: false,
            preload: 4,
            heightLimit: true,
            autoHeight: false,
            smoothHeight: true,
            endPause: false,
            overPause: true,
            fillMode: "fill",
            centerControls: true,
            startOnAppear: false,
            layersMode: "center",
            autofillTarget: "",
            hideLayers: false,
            fullscreenMargin: 0,
            speed: 20,
            dir: "h",
            parallaxMode: 'swipe',
            view: "fadeBasic"
        });

        // initialization of horizontal progress bars
        setTimeout(function () { // important in this case
            let horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
                direction: 'horizontal',
                indicatorSelector: '.js-hr-progress-bar-indicator'
            });
        }, 1);
    </script>
    </html>
@endsection

