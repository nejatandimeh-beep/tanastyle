@extends('Layouts.IndexCustomer')
@section('Content')

        <!--Basic Table-->
        <div id="najol">
            @for($i=0;$i<3;$i++)
            <p id="najol-p">salam</p>
            <button onclick="$('#najol-p').text('bye')">click</button>
            <button onclick="$('#najol').load(location.href + ' #najol')">reload</button>
            @endfor
        </div>
        <!--End Basic Table-->

@endsection

