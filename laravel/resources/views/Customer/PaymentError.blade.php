@extends('Layouts.app')
@section('content')
    <div class="container g-mb-40">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card text-center">
                    <h5 class="card-header text-right">وضعیت پرداخت</h5>
                        <div style="direction: rtl;" class="g-pa-10">
                            <h4 class="g-color-red text-center">مشکل در پرداخت وجه</h4>
                            <h6 class="text-center g-mt-20">
                                <span class="d-block g-color-red g-mx-5">کاربر گرانقدر تانا استایل فرایند پرداخت با موفقیت انجام نگردید! اگر برداشت از حساب شما انجام شده است و با این صفحه مواجه شده اید، مبلغ برداشت شده از حسابتان ظرف 72 ساعت آینده به حسابتان برگشت خواهد خورد. در صورتی که بعد از گذشت زمان مذکور وجه پرداختی به حسابتان برگشت نخورد با بخش پشتیبانی وب سایت تماس بگیرید و یا به بانک حسابتان مراجعه بفرمایید. </span>
                            </h6>
                            <div class="g-pa-5">
                                <a href="{{ route('userProfile','deliveryStatus') }}" class="btn btn rounded-0 u-btn-primary force-col-12 u-btn-content g-font-weight-600 g-letter-spacing-0_5 tg-brd-2 g-mt-40 g-mb-5 g-mb-40--lg">
                                    <span class="text-center">
                                        بازگشت به صفحه حساب کاربری
                                    </span>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

