@include('Layouts.BaseCssLink')
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

@yield('BaseCssLink')
@yield('CustomerNavigation')
@yield('Content')
@yield('CustomerFooter')
@yield('BaseJsLinks')
@yield('BaseJsFunction')
@yield('CustomerJsFunction')
