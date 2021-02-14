@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-right">ثبت نام در سایت</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" style="direction: rtl" novalidate>
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">نام</label>

                                <div class="col-md-6">
                                    <input id="name"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md"
                                           name="name"
                                           placeholder="الزاما فارسی"
{{--                                           lang="fa"--}}
                                           onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"

                                           value="{{ old('name') }}"
                                           required autocomplete="off"
                                           autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="family"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">نام خانوادگی</label>

                                <div class="col-md-6">
                                    <input id="family"
                                           type="text"
                                           class="form-control @error('family') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md"
                                           name="family"
                                           placeholder="الزاما فارسی"
{{--                                           lang="fa"--}}
                                           onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'family');"

                                           value="{{ old('family') }}"
                                           required
                                           autocomplete="off">

                                    @error('family')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">ایمیل</label>

                                <div class="col-md-6">
                                    <input style="direction:ltr;"
                                           id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                           name="email"
                                           placeholder="حتما ایمیل را بخاطر بسپارید"
                                           value="{{ old('email') }}"
                                           required=""
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">رمز</label>

                                <div class="col-md-6">
                                    <input style="direction:ltr;"
                                           id="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                           name="password"
                                           placeholder="الزاما 8 رقم به بالا"
                                           value="{{ old('password') }}"
                                           required=""
                                           autocomplete="current-password">

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
                                           autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row g-mb-60--lg g-mt-20">
                                <div class="col-md-10 text-left">
                                    <button type="submit" class="btn u-btn-primary rounded-0 g-font-size-16">
                                        ثبت نام
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
