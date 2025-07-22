@section('BaseJsFunction')

    {{--    Unify Functions--}}
    <script>
        // غیر فعال کردن کلید اینتر در ورودی فرمها جهت سابمیت فرم
        window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);
        $(window).on('load', function () {
            if(!checkCookies()){
                $('body').empty();
                $('body').append('<div class="w-100 text-center"><img id="cookieDisabled" src="{{ asset("img/Other/cookieDisabled.jpg?4") }}" alt="فروشگاه پوشاک تانا استایل" class="g-pt-7 g-pt-0--lg"></div>');
                console.log('cookie is disabled!');
            }
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
                // initialization of carousels
            }
            // initialization of autonomous popups
            if($('.productDetail').length>0 || $('.cartContainer').length>0|| $('.profileContainer').length>0) {
                if ($('.modalBox').length > 0) {
                    $.HSCore.components.HSModalWindow.init('.js-autonomous-popup', {
                        autonomous: true
                    });
                    $.HSCore.components.HSModalWindow.init('[data-modal-target]:not(.js-modal-markup)');
                }
            }
        });

        // check cookie
        function checkCookies(){
            if (navigator.cookieEnabled) return true;

            // set and read cookie
            document.cookie = "cookietest=1";
            let ret = document.cookie.indexOf("cookietest=") != -1;

            // delete cookie
            document.cookie = "cookietest=1; expires=Thu, 01-Jan-1970 00:00:01 GMT";

            return ret;
        }
    </script>
    </html>
@endsection

