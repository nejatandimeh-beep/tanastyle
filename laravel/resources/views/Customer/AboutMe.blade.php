@extends('Layouts.IndexCustomer')
@section('Content')
    <!-- سبد خرید -->
    <div style="direction: rtl" class="container-fluid g-mb-100">
        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto text-center bigDevice">
            <img src="{{ asset('img/Logo/logo2.svg') }}" alt="mevan logo" width="400"
             class="g-pt-7 g-pt-0--lg">
        </div>
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto text-center smallDevice">
            <img src="{{ asset('img/Logo/logo2.svg') }}" alt="تاناکورا لوگو" width="200"
                 class="g-pt-7 g-pt-0--lg">
        </div>
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto">
            <h6 class="g-color-black g-font-weight-600">درباره ما</h6>
            <h6 class="text-justify g-color-black">در دنیای پرشتاب امروز، خرید آنلاین دیگر تنها یک انتخاب نیست، بلکه به بخشی جدایی‌ناپذیر از سبک زندگی تبدیل شده است. ما در میوان با درک عمیق از این تحول، بر آن شدیم تا بستری هوشمند، ایمن و در دسترس را برای فروش و خرید انواع کالا ایجاد کنیم.
                میوان تنها یک فروشگاه آنلاین نیست؛ بلکه یک مارکت‌پلیس تخصصی است که فروشندگان و تولیدکنندگان سراسر کشور، به‌ویژه بازارچه‌های مرزی و برندهای معتبر داخلی، می‌توانند محصولات خود را به صورت مستقیم به خریداران عرضه کنند. ما با هدف ساده‌سازی فرآیند خرید، تنوع در انتخاب، تضمین کیفیت و حمایت از تولید داخلی، تلاش می‌کنیم تا تجربه‌ای لذت‌بخش از خرید آنلاین را برای شما رقم بزنیم.
                در میوان، شما با دنیایی از کالاها در دسته‌بندی‌های گوناگون روبه‌رو هستید، اما تمرکز ویژه ما بر کالاهای وارداتی متناسب با سبک زندگی ایرانی است؛ جایی که زیبایی، کیفیت و قیمت منصفانه در کنار هم قرار می‌گیرند.
                ما به آینده‌ای فکر می‌کنیم که در آن، خرید آنلاین نه‌تنها آسان و سریع، بلکه آگاهانه و مطمئن باشد. از این‌رو، با استفاده از فناوری‌های نوین، پشتیبانی پاسخ‌گو، و به‌روزرسانی مداوم خدمات، در مسیر توسعه و رشد گام برمی‌داریم.
                میوان، بیشتر از یک فروشگاه؛ پلی میان تولیدکننده و واردکنندگان و مصرف ‌کننده، با هدف ایجاد اعتماد، شفافیت و انتخاب هوشمندانه.</h6>
        </div>
        <div style="direction: ltr" class="col-lg-7 col-12 mx-auto d-lg-flex justify-content-between">
            <div class="col-lg-4 col-12 mx-auto g-mb-40 text-center">
                <img src="{{ asset('img/Other/aboutMe.jpg') }}" alt="tanakora mahabad"
                     class="g-pt-7 g-pt-0--lg w-100">
            </div>
            <div style="direction: rtl" class="col-lg-4 col-12 mx-auto my-auto">
                <h6 class="g-color-gray-dark-v1">تماس با ما</h6>
                <h6>شرکت تابش پس زمینه مکریان</h6>
                <h6> شماره ثبت: 2918</h6>
                <h6>تولید: 1400-1398</h6>
                <h6>نوع کاربری: Market Place</h6>
                <h6>آدرس: آذربایجان غربی، مهاباد، تاناکورا خرده، طبقه اول، پلاک 1142/1</h6>
                <h6>کدپستی: 5915946263</h6>
                <h6>زمان پاسخگویی تلفنی: شنبه تا پنج شنبه ساعت 14 الی 20</h6>
                <h6>تلفن تماس: 42340241-044</h6>
                <h6>ایمیل</h6>
                <h6 class="mb-0">mevan.ir@gmail.com</h6>
                <h6>info@mevan.ir</h6>
            </div>
        </div>
    </div>
@endsection
