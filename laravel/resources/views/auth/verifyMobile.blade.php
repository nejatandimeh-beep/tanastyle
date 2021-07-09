@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">

        </div>

        <div class="links">
            <form action="{{route('verifyMobile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="direction: rtl" class="container">
                    <div class="col-6 mx-auto">
                        <div class="form-group row">
                            <label for="mobile"
                                   class="col-md-3 col-form-label text-right text-md-left g-font-size-16">کد ارسالی</label>

                            <div class="col-md-9">
                                <input
                                    type="number"
                                    class="form-control text-left input-outline-primary rounded-0 g-font-size-18 g-font-size-16--md"
                                    name="verifyCode"
                                    required autocomplete="off"
                                    autofocus>
                            </div>
                        </div>

                        <div id="timeDiv">زمان <span id="time">02:00</span> دقیقه!</div>
                        <a style="display: none" href="" id="try">لطفا مجددا سعی کنید!</a>

                        <div style="direction: ltr" class="form-group row g-mb-60--lg g-mt-20">
                            <div class="col-md-10 text-left">
                                <button type="submit" class="btn u-btn-primary rounded-0 g-font-size-16">
                                    ادامه
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    $('#try').css('display', 'block');
                    $('#timeDiv').css('display', 'none');
                }
            }, 1000);
        }

        window.onload = function () {
            var threeMinutes = 120,
                display = document.querySelector('#time');
            startTimer(threeMinutes, display);
        };
    </script>
@endsection
