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
                                <label for="email" class="col-md-4 col-form-label text-right text-md-left g-font-size-16">ایمیل</label>

                                <div class="col-md-6">
                                    <input style="direction:ltr;"
                                           id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md text-left"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required=""
                                           autocomplete="email"
                                           autofocus="">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-right text-md-left g-font-size-16">رمز</label>

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

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4 text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label g-mr-5 g-mr-0--lg" for="remember" >
                                            مرا بخاطر بسپار
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row g-mb-60--lg g-mt-30">
                                <div class="col-md-8 offset-md-4 text-right">
                                    <button type="submit" class="btn u-btn-primary rounded-0 g-font-size-16">
                                        ورود
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            رمزتان را فراموش کرده اید؟
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
