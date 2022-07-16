@extends('Layouts.IndexCustomer')
@section('Content')
<div>
    <a class="magnifier-thumb-wrapper">
        <img id="thumb" src="{{asset('img/Other/aboutMe.jpg')}}">
    </a>
    <div class="magnifier-preview" id="preview" style="width: 200px; height: 133px">Starry Night Over The Rhone<br>by Vincent van Gogh</div>
</div>
@endsection
