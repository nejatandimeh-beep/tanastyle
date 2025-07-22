@extends('Layouts.app')
@section('content')
    <!--saman kish-->
{{--    <div class="container g-mb-40">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-9">--}}
{{--                <div id="bankConnection" class="text-center">--}}
{{--                    <div style="direction: rtl;">--}}
{{--                        <h3 class="g-color-primary text-center">در حال اتصال به درگاه بانکی</h3>--}}
{{--                        <h6 class="text-center">لطفا شکیبا باشید...</h6>--}}
{{--                    </div>--}}
{{--                    <form action='https://sep.shaparak.ir/payment.aspx' method='POST'>--}}
{{--                        @csrf--}}
{{--                        <input name='token' type='hidden' value='{{$result}}'>--}}
{{--                        <input name='getmethod' type='hidden' value='true'>--}}
{{--                        <input name='RedirectURL' type='hidden' value='https://mevan.ir/Payment-Status'>--}}
{{--                        <input style="visibility: hidden" name='btn' type='submit' value='Send' id="bankBtn">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="container g-mb-40">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div id="bankConnection" class="text-center">
                    <div style="direction: rtl;">
                        <h3 class="g-color-primary text-center">در حال اتصال به درگاه بانکی</h3>
                        <h6 class="text-center">لطفا شکیبا باشید...</h6>
                    </div>
                    <form action='https://api.zarinpal.com/pg/v4/payment/request.json' method='POST'>
                        @csrf
                        <input name='merchant_id' type='hidden' value='ccd4acab-a4dc-416d-9172-b066aa674e2b'>
                        <input name='amount' type='number' value='1000' style="display: none">
                        <input name='callback_url' type='hidden' value='https://mevan.ir/Payment-Status'>
                        <input name='description' type='hidden' value="فروش محصول">
                        <input name='btn' type='submit' value='Send' id="bankBtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

