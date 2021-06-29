@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-right">ورود به سایت</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" style="direction: rtl" novalidate>
                            @csrf

                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">موبایل</label>

                                <div class="col-md-6">
                                    <input style="direction:ltr;"
                                           id="mobile"
                                           type="text"
                                           class="form-control @error('mobile') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                           name="mobile"
                                           value="{{ old('mobile') }}"
                                           required=""
                                           autocomplete="mobile"
                                           autofocus="">

                                    @error('mobile')
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

                            <div class="form-group row g-mb-60--lg g-mt-30">
                                <div class="col-md-10 text-left">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ url('/request-customer-mobile','forget') }}">
                                            رمزتان را فراموش کرده اید؟
                                        </a>
                                    @endif

                                    <button type="submit" class="btn u-btn-primary rounded-0 g-px-20 g-font-size-16">
                                        ورود
                                    </button>
                                    <a href="{{ url('/request-customer-mobile','register') }}"
                                       class="d-lg-none d-block g-mt-10 btn u-btn-primary rounded-0 g-font-size-16">
                                        ثبت نام
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
