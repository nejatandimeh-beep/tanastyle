@extends('Layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3">

                    {{-- عنوان --}}
                    <h5 class="card-header g-bg-primary text-white text-center py-3">
                        تأیید کد ارسال‌شده
                    </h5>

                    <div class="card-body p-4 text-center">
                        <form id="verifyForm" method="POST" action="{{ route('verifyMobile') }}" autocomplete="off">
                            @csrf

                            {{-- ورودی ۶ رقمی --}}
                            <label class="form-label fw-bold mb-3 d-block">کد ۶ رقمی را وارد کنید</label>

                            <div class="d-flex justify-content-between code-input-container position-relative">
                                @for($i=1;$i<=6;$i++)
                                    <input
                                        type="text"
                                        inputmode="numeric"
                                        pattern="\d*"
                                        maxlength="1"
                                        class="form-control code-input"
                                        aria-label="digit-{{ $i }}"
                                    >
                                @endfor

                                {{-- فیلد مخفی برای Autofill iOS و Web OTP --}}
                                <input id="otp_autofill"
                                       name="otp_autofill"
                                       type="text"
                                       autocomplete="one-time-code"
                                       inputmode="numeric"
                                       pattern="\d*"
                                       maxlength="6"
                                       style="position:absolute;left:-9999px;top:-9999px;opacity:0;">
                            </div>

                            <input type="hidden" id="finalCode" name="verifyCode">

                            {{-- تایمر --}}
                            <div class="mt-4">
                                <div class="progress" style="height:12px;border-radius:10px;">
                                    <div id="progressBar" class="progress-bar g-bg-primary"
                                         style="width:100%;transition:width 1s linear;"></div>
                                </div>

                                <div class="mt-2">
                                    <span id="timeText" class="fw-bold text-muted">02:00</span>
                                </div>

                                <button type="button"
                                        id="resendBtn"
                                        class="btn btn-outline-primary mt-3 fw-bold px-4 py-2 rounded-pill d-none">
                                    ارسال مجدد کد
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Toast container --}}
    <div class="position-fixed top-0 end-0 p-3" style="z-index:1100;width:100%;">
        <div id="toastContainer"></div>
    </div>

    {{-- داده‌های کنترلر --}}
    <script>
        window.SERVER_TIMER = {{ $timer ?? 120 }};
        window.INPUT_MOBILE = "{{ $mobile }}";
        window.VERIFY_URL = @json(route('verifyMobile'));
        window.RESEND_URL = @json(route('resendVerifyCode'));
    </script>

    {{-- فایل JS --}}
    <script src="{{ asset('js/verify-timer.js') }}"></script>

@endsection
