{{--@include('Layouts.BaseCssLink')--}}
{{--</head>--}}
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
{{--@include('Layouts.BaseJsLink')--}}
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>TanaStyle</title>

    <!--My Style-->
    <link href="{{ asset('css/myStyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">

    <!--Unify Style-->


    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/bootstrap.min_1.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-line/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-etlinefont/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dzsparallaxer/dzsscroller/scroller.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dzsparallaxer/advancedscroller/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/wait-animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/custombox/custombox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-ui/themes/base/jquery-ui.min.css') }}">
    <!-- Master Slider -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/master-slider/source/assets/css/masterslider.main.css') }}">

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/revolution-slider/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/revolution-slider/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/revolution-slider/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/revolution-slider/revolution-addons/typewriter/css/typewriter.css') }}">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="{{ asset('assets/css/unify_1.css') }}">

    <!-- Confirm Msg -->
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">

    <!-- Cropper img -->
    <link  href="{{ asset('css/cropper.css') }}" rel="stylesheet">

    <!-- dropzone -->
    <link  href="{{ asset('css/dropzone.css') }}" rel="stylesheet">

</head>
{{--@yield('BaseCssLink')--}}
@yield('CustomerNavigation')
@yield('Content')
@yield('CustomerFooter')
{{--@yield('BaseJsLinks')--}}
{{--{{dd($_SERVER['REQUEST_URI'])}}--}}
@switch($_SERVER['REQUEST_URI'])
    @case('/')
    <!--تخفیفات ویژه-->
    <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    @break
    @case(strpos($_SERVER['REQUEST_URI'],'/Customer-Product-'))
    <a class="js-go-to u-go-to-v2 animated u-animation-was-fired zoomIn" href="#" data-type="fixed" data-position="{
           &quot;bottom&quot;: 15,
           &quot;right&quot;: 15
         }" data-offset-top="400" data-compensation="#js-header2" style="display: inline-block; position: fixed; bottom: 15px; right: 15px;">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
    <!---------------------------------------Java Script Links--------------------------------------->
    <!-- Cropper img -->
    <script src="{{ asset('assets/js/cropper.js') }}"></script>

    <!-- dropzone -->
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

    <!-- JS Global Compulsory -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tether.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/offcanvas.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('assets/vendor/masonry/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ asset('assets/vendor/dzsparallaxer/dzsscroller/scroller.js') }}"></script>
    <script src="{{ asset('assets/vendor/dzsparallaxer/advancedscroller/plugin.js') }}"></script>
    <script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ asset('assets/vendor/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/appear.js') }}"></script>
    <script src="{{ asset('assets/vendor/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.countdown.min.js') }}"></script>
    <script  src="{{ asset('assets/vendor/circles/circles.min.js') }}"></script>


    <!-- JS Revolution Slider -->
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/revolution-slider/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

    <!-- JS Master Slider -->
    <script src="{{ asset('assets/vendor/master-slider/source/assets/js/masterslider.min.js') }}"></script>

    <!-- jQuery UI Core -->
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widget.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/version.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/keycode.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/position.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/unique-id.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/safe-active-element.js') }}"></script>

    <!-- jQuery UI Helpers -->
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widgets/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widgets/mouse.js') }}"></script>

    <!-- jQuery UI Widgets -->
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widgets/autocomplete.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-ui/ui/widgets/slider.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ asset('assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.header-side.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.tabs.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.progress-bar.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.counter.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.modal-window.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.count-qty.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.scroll-nav.js') }}"></script>
    <script src="{{ asset('assets/js/components/gmap/hs.map.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.rating.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.not-empty-state.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.focus-state.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.file-attachement.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.slider.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.masked-input.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.rating.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.count-qty.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.shortcode-filter.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.autocomplete.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.autocomplete-local-search.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.onscroll-animation.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.chart-pie.js') }}"></script>
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
            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

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
