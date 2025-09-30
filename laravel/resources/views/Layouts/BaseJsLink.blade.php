@section('BaseJsLinks')
    <a class="js-go-to u-go-to-v2 animated u-animation-was-fired zoomIn" href="#" data-type="fixed" data-position="{
           &quot;bottom&quot;: 15,
           &quot;right&quot;: 15
         }" data-offset-top="400" data-compensation="#js-header2" style="display: inline-block; position: fixed; bottom: 15px; right: 15px;">
        <i class="icon-arrow-up"></i>
    </a>
    <!---------------------------------------Java Script Links--------------------------------------->
    {{-- jQuery core (فقط یک بار) --}}
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-migrate/jquery-migrate.min.js') }}"></script>

    {{-- پلاگین‌های وابسته به jQuery --}}
    <script src="{{ asset('assets/vendor/jquery.easing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/tether.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/offcanvas.js') }}"></script>

    {{-- پلاگین‌های HSCore --}}
    <script src="{{ asset('assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ asset('assets/js/hs.core.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('assets/js/components/hs.header-side.js') }}"></script>
    <script src="{{ asset('assets/js/helpers/hs.hamburgers.js') }}"></script>

    {{-- پلاگین‌های متفرقه --}}
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>

    {{-- اپلیکیشن خودت (باندل شده با Mix) --}}
    <script src="{{ mix('js/app.js') }}"></script>

@endsection

