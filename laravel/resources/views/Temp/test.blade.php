@extends('Layouts.IndexCustomer')
@section('Content')

        <!--Basic Table-->
        <div id="najol">
            <p id="najol-p">salam</p>
            <button onclick="$('#najol-p').text('bye')">click</button>
            <button onclick="$('#najol').load(location.href + ' #najol')">reload</button>
        </div>
        <!--End Basic Table-->

@endsection

