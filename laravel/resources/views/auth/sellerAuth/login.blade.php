@extends('Layouts.appSeller')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-right">ورود به سامانه فروش</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('sellerLogin') }}" style="direction: rtl" novalidate>
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">ایمیل</label>

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

                                    @if (Session::has('fails'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{Session::get('fails')}}</strong>
                                        </span>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

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
                                        <a class="btn btn-link" href="{{ route('sellers.showMobileRequestForm') }}">
                                            رمزتان را فراموش کرده اید؟
                                        </a>
                                    @endif
                                    <button type="submit"
                                            onclick="$('#submitText').hide(); $('#waitingSubmit').show();"
                                            onsubmit="$(this).prop('disabled',true)"
                                            class="btn u-btn-primary rounded-0 g-font-size-16">
                                        <span id="submitText">ورود</span>
                                        <span id="waitingSubmit"
                                           style="display: none"
                                           class="m-0 g-color-white">منتظر بمانید..</span>
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
