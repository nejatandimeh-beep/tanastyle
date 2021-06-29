@extends('Layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-right">ثبت نام در سایت</h5>

                    <div class="card-body">
                        <form method="GET" action="{{ route('checkMobile',$source) }}" style="direction: rtl" novalidate>
                            @csrf

                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-right text-md-left g-font-size-16">شماره موبایل</label>

                                <div class="col-md-6">
                                    <input id="mobile"
                                           type="text"
                                           class="form-control @error('mobile') is-invalid @enderror input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md"
                                           name="mobile"
                                           value="{{ old('mobile') }}"
                                           required autocomplete="off"
                                           autofocus>

                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row g-mb-60--lg g-mt-20">
                                <div class="col-md-10 text-left">
                                    <button type="submit" class="btn u-btn-primary rounded-0 g-font-size-16">
                                        ارسال کد
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
