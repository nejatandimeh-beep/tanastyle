@extends('Layouts.app')

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
                                        <strong>شماره موبایل یا رمز ورود اشتباه است</strong>
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
                                        <strong>رمز ورود اشتباه است</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row g-mb-60--lg g-mt-30">
                                <div class="col-md-10 text-left">
                                    <div style="direction: ltr" class="d-flex col-12 p-0">
                                        <div>
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
                                        <div class="d-flex">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link g-py-5--lg g-py-0 align-middle"
                                                   href="{{ url('/request-customer-mobile','forget') }}">
                                                    رمزتان را فراموش کرده اید؟
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
