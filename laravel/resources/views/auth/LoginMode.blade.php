@extends('Layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header text-right">ورود یا ایجاد حساب کاربری</h5>

                    <div class="card-body">
                        <div class="text-center g-pa-30">
                            <a href="{{ url('/request-customer-mobile','register') }}" class="btn btn-xl rounded-0 u-btn-primary u-btn-content g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mr-10 g-mb-15">
                            <span class="text-center">
                              ثبت نام
                              <span class="d-block g-font-size-11">قبلا ثبت نام نکرده ام</span>
                            </span>
                            </a>
                            <a href="{{ route('login') }}" class="btn btn-xl u-btn-primary u-btn-content rounded-0 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-mr-10 g-mb-15">
                            <span class="text-center">
                              ورود
                              <span class="d-block g-font-size-11">قبلا ثبت نام کرده ام</span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection