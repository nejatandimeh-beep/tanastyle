

@extends('Layouts.appSeller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div style="direction: rtl" class="card">
                <div class="card-header text-right">بازیابی رمز ورود</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sellers.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">آدرس ایمیل</label>

                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ isset($email) ? $email : '' }}" required readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-left">رمز عبور جدید</label>

                            <div class="col-md-6">
                                <input style="direction:ltr;"
                                       id="password"
                                       type="password"
                                       class="form-control @error('password') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                       name="password"
                                       placeholder="انگلیسی"
                                       value="{{ old('password') }}"
                                       required
                                       autocomplete="off">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-right text-md-left g-font-size-16">تکرار
                                رمز</label>

                            <div class="col-md-6">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                       name="password_confirmation"
                                       required
                                       autocomplete="off">
                            </div>
                        </div>

                        <div id="passwordHint" class="d-flex flex-column justify-content-start d-lg-block col-lg-10 col-12 pl-1 pr-0">
                            <span id="length" class="u-label g-bg-red g-mb-5">بیشتر از 8 کاراکتر</span>
                            <span id="number" class="u-label g-bg-red g-mb-5">اعداد</span>
                            <span id="uppercase" class="u-label g-bg-red g-mb-5">حروف بزرگ</span>
                            <span id="lowercase" class="u-label g-bg-red g-mb-5">حروف کوچک</span>
                        </div>

                        <div class="form-group row g-mb-60--lg g-mt-20">
                            <div class="col-md-10 text-left">
                                <button type="button" class="force-col-12 btn u-btn-primary rounded-0 g-font-size-16" onclick="checkPass()">
                                    تغییر رمز و ورود به سایت
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
