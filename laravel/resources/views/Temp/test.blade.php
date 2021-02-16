@extends('Layouts.IndexCustomer')
@section('Content')
    @if(Auth::user()->email_verified_at === null)

    @endif
@endsection

