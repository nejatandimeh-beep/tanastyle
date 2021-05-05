@section('DeliveryNavigation')
    <div id="load" class="load"></div>
    <body>
    <header id="js-header2" class="u-header u-header--static">
        <div class="u-header__section u-header__section--dark g-bg-black g-transition-0_3 g-pt-10 g-pb-10--lg">
            <nav class="js-mega-menu hs-menu-initialized hs-menu-horizontal navbar navbar-toggleable-md">
                <div class="container" id="HeaderContainer">
                    <!-- Responsive Toggle Button -->
                    <button
                            class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-right-0"
                            type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                            data-toggle="collapse" data-target="#navBar"
                            id="btnMenu">
                          <span class="hamburger hamburger--slider">
                            <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                            </span>
                          </span>
                    </button>
                    <!-- End Responsive Toggle Button -->

                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('img/logo/Logo_white.png') }}" alt="Image Description" width="120"
                             class="g-pt-7 g-pt-0--lg">
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                    <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
                        <ul style="direction: rtl" class="navbar-nav g-font-weight-600 ml-auto p-0">
                            {{--صفحه اصلی--}}
                            <li class="nav-item g-mx-20--lg">
                                <a href="{{ route('deliveryPanel') }}" class="nav-link g-px-0 g-color-white--hover">صفحه نخست <span
                                        class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Navigation -->

                    <hr class="force-col-12 g-brd-gray-light-v5 smallDevice g-mt-20 g-mb-10" id="otherMenuHr">
                </div>
            </nav>
        </div>
    </header>
@endsection
