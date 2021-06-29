@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">

        </div>

        <div class="links">
            <form action="{{route('verifyMobile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input style="border: 1px solid lightblue; padding: 10px; margin: 5px;" name="verifyCode" type="number">code
                <p>برای ورود، کد تایید ۵ رقمی ارسال شده به شماره همراه را وارد نمایید.</p>
                <br>
                <button style="cursor:pointer; width:96%; border: 1px solid lightblue; padding: 5px 20px;"
                        type="submit">تایید
                </button>

                <div>زمان <span id="time">03:00</span> دقیقه!</div>
                <a style="display: none" href="{{url('/test')}}" id="try">لطفا مجددا سعی کنید!</a>
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
                    $('#try').css('display','block');
                }
            }, 1000);
        }

        window.onload = function () {
            var threeMinutes = 30,
                display = document.querySelector('#time');
            startTimer(threeMinutes, display);
        };
    </script>
@endsection
