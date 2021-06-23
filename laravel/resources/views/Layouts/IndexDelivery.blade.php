@include('Layouts.BaseCssLink')
@include('Layouts.BaseJsLink')
{{--@include('Layouts.DeliveryNavigation')--}}
@include('Layouts.DeliveryFooter')
@include('Layouts.DeliveryJsFunctions')
@include('Layouts.BaseJsFunction')

@yield('BaseCssLink')
{{--@yield('DeliveryNavigation')--}}
@yield('Content')
@yield('DeliveryFooter')
@yield('BaseJsLinks')
@yield('DeliveryJsFunctions')
@yield('BaseJsFunction')
