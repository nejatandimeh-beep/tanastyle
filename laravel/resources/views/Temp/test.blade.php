@extends('Layouts.app')
@section('content')
<h1 class="g-color-red">سلام دارا</h1>
<h4 class="g-color-green">خوبی؟</h4>
    <script>
        x=4;
        y=846;
        x={'m1':4,'m2':6};
        console.log(x.m2);
        $('h1').on('click', function () {
                $('h1').text(x.m2);
        })
    </script>
@endsection
