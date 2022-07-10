@extends('Layouts.IndexCustomer')
@section('Content')
    <!-- سبد خرید -->
    <div style="direction: rtl" class="container-fluid g-mb-100">
        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto text-center bigDevice">
            <img src="{{ asset('img/Logo/logo.svg') }}" alt="tanastyle logo" width="400"
             class="g-pt-7 g-pt-0--lg">
        </div>
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto text-center smallDevice">
            <img src="{{ asset('img/Logo/logo.svg') }}" alt="تاناکورا لوگو" width="200"
                 class="g-pt-7 g-pt-0--lg">
        </div>
        <div class="g-pt-40 col-lg-7 col-12 g-pa-20 mx-auto">
            <h6 class="g-color-black g-font-weight-600">درباره ما</h6>
            <h6 class="text-justify g-color-black">نیاز روز افزون جامعه به خدمات حرفه ای در دنیای مجازی ما را بر آن داشت تا در صنعت مد و پوشاک این بستر را در سرار کشور ارتقا دهیم. تانا استایل با هدف ساده سازی فرایند خرید پوشاک در فضای مجازی و همچنین با عرضه بهترین برندهای پوشاک از بازارچه های مرزی در تلاش است بستری مناسب برای شما عزیزان در زمینه مد و پوشاک فراهم آورد.</h6>
        </div>
        <div style="direction: ltr" class="col-lg-7 col-12 mx-auto d-lg-flex justify-content-between">
            <div class="col-lg-4 col-12 mx-auto g-mb-40 text-center">
                <img src="{{ asset('img/Other/aboutMe.jpg') }}" alt="tanakora mahabad"
                     class="g-pt-7 g-pt-0--lg w-100">
            </div>
            <div style="direction: rtl" class="col-lg-4 col-12 mx-auto g-mb-100">
                <h6>شرکت تابش پس زمینه مکریان</h6>
                <h6> شماره ثبت: 2918</h6>
                <h6>تولید: 1400-1398</h6>
                <h6>نوع کاربری: Market Place</h6>
                <h6>آدرس: آذربایجان غربی، مهاباد، تاناکورا خرده، طبقه اول، پلاک 1142/1</h6>
                <h6>زمان پاسخگویی تلفنی: شنبه تا پنج شنبه ساعت 14 الی 20</h6>
                <h6>تلفن تماس: 42340241-044</h6>
                <h6>ایمیل</h6>
                <h6 class="mb-0">tanastyle.ir@gmail.com</h6>
                <h6>info@tanastyle.ir</h6>
            </div>
        </div>
    </div>
@endsection
