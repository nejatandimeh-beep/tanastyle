@extends('Layouts.IndexCustomer')
@section('Content')
    <div style="margin-bottom: 250px" class="container messageMenu">
        <ul style="direction: rtl" class="list-unstyled p-0">
            @foreach($data as $key => $row)
                <li id="sellerMajor-{{$row->SellerMajorID}}"
                    class="media g-pa-20--lg g-pa-10 g-mb-minus-1">
                    <div class="d-flex p-0 col-12">
                        <a href="{{route('cSmPanel',$row->SellerMajorID)}}" class="w-100 nav-link g-px-0 g-pb-5 g-pt-0">
                            <div class="d-flex">
                                <img class="g-width-40 g-height-40 rounded-circle g-ml-10--lg g-ml-5"
                                     src="{{$row->Pic.'/profileImg.jpg'}}" alt="Image Description">

                                <strong class="align-self-center">{{$row->name}}</strong>
                            </div>
                        </a>
                        <span style="cursor: pointer" class="g-color-gray-light-v1 align-self-center g-mr-5 g-font-size-18"
                              onclick="deleteFollowing({{$row->SellerMajorID}},$(this))"><i class="icon-user-unfollow"></i></span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
