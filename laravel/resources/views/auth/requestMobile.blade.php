@extends('Layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-3">
                    {{-- عنوان --}}
                    <h5 class="card-header g-bg-primary text-white text-center py-3">
                        {{ $source === 'register' ? 'ثبت نام در سایت' : 'درخواست رمز جدید' }}
                    </h5>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('checkMobile') }}" novalidate>
                            @csrf
                            <input type="hidden" name="source" value="{{ $source }}">

                            {{-- شماره موبایل --}}
                            <div class="mb-3 text-right">
                                <label for="mobile" class="form-label fw-bold">شماره موبایل</label>
                                <input
                                    type="tel"
                                    id="mobile"
                                    name="mobile"
                                    pattern="09[0-9]{9}"
                                    maxlength="11"
                                    class="form-control form-control-lg text-center @error('mobile') is-invalid @enderror @if(session()->has('message')) is-invalid @endif"
                                    placeholder="09xxxxxxxxx"
                                    value="{{ old('mobile') }}"
                                    required
                                    autocomplete="off"
                                    autofocus
                                >

                                {{-- خطاها --}}
                                @error('mobile')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror

                                @if (session()->has('message'))
                                    <div class="invalid-feedback d-block">
                                        {!! Session::get('message') !!}
                                    </div>
                                @endif
                            </div>

                            {{-- دکمه ارسال --}}
                            <div class="d-grid mt-4">
                                <button id="submitBtn" type="submit" class="btn btn-primary btn-lg">
                                    <span class="spinner-border spinner-border-sm me-2 d-none" id="btnSpinner"></span>
                                    <span id="btnText">ارسال کد</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("form");
            const submitBtn = document.getElementById("submitBtn");
            const btnSpinner = document.getElementById("btnSpinner");
            const btnText = document.getElementById("btnText");

            form.addEventListener("submit", function () {
                // غیر فعال کردن دکمه
                submitBtn.disabled = true;

                // نمایش لودر
                btnSpinner.classList.remove("d-none");
                btnText.textContent = "لطفاً صبر کنید...";
            });
        });
    </script>

@endsection
