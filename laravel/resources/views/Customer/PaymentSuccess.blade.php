@extends('Layouts.app')
@section('content')
    <div class="container g-mb-40">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card text-center">
                    <h5 class="card-header text-right">رسید پرداخت وجه</h5>
                        <svg id="checkMark" class="checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                        <div style="direction: rtl;">
                            <h3 class="g-color-primary text-center">با تشکر از خرید شما در سامانه فروش تانا
                                استایل</h3>
                            <h6 class="text-center">پرداخت با موفقیت انجام شد. کد پیگیری پرداخت وجه:<span class="g-color-primary g-mx-5">000000000</span></h6>
                            <a href="{{ route('userProfile','deliveryStatus') }}" class="btn btn rounded-0 u-btn-primary force-col-12 u-btn-content g-font-weight-600 g-letter-spacing-0_5 tg-brd-2 g-mr-10 g-my-40">
                            <span class="text-center">
                                مشاهد وضعیت محصول خریداری شده
                            </span>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

