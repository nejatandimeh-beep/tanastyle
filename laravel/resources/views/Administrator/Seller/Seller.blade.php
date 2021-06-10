@extends('Layouts.IndexAdmin')
@section('Content')

    <div style="direction: rtl" class="g-bg-gray-dark-v2 d-flex">
        <div class="col-12 col-lg-3 g-brd-left g-brd-white-opacity-0_8 text-center g-pt-20 g-pb-40">
            <span class="d-block g-font-size-25 g-color-pink g-mb-15 g-pb-20 g-brd-bottom g-brd-white-opacity-0_8">پنل فروشندگان</span>
            <a href="{{route('sellerVerify')}}"
               class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">تایید هویت فروشندگان</a>
            <a href="{{route('sellerList')}}" class="d-block btn btn-md u-btn-darkgray active rounded-0 g-mb-15">فروشندگان</a>
            <a href="{{route('support')}}" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-40">
                پشتیبانی فروشندگان
                <div style="width: 20px; height: 20px"
                     class="{{$newSupport===0 ? 'd-none ': 'd-inline-block '}}text-center g-color-black g-bg-lightred g-rounded-50x g-mr-10">
                    {{$newSupport}}
                </div>
            </a>
            <div style="margin-top: 250px" class="navbar-brand g-mr-0">
                <img src="img/Logo/logo_white.png" alt="Image Description" width="150">
            </div>
            <h4 class="h6 g-color-white-opacity-0_6 g-mb-0">
                <div class="text-center hidden-lg-down">
                    <span class="mb-0" id="persianDate"></span>
                    <span class="mb-0"> ساعت </span>
                    <span class="mb-0" id="persianTime"></span>
                </div>
            </h4>
        </div>
        <div class="col-12 col-lg-9 g-pt-25 g-pb-40">
            <div class="d-flex justify-content-between g-mb-15">
                <h4 class="g-mb-0 g-color-gray-light-v2 align-self-center">لیست فروشندگان</h4>
                <div class="g-pl-0">
                    <div style="direction: ltr" class="input-group">
                        <form class="revtp-searchform">
                            <input oninput="sellerSearch('sellerSearch',$(this).attr('value'))"
                                   onclick="sellerSearch('sellerSearch',$(this).attr('value'))"
                                   style="direction:ltr; outline: none; font-family: Vazir, serif; opacity: 0.95; font-size: 16px;"
                                   type="text" placeholder="..جستجو بر اساس کد ملی" maxlength="10">
                            <ul style="direction: ltr" id="sellerSearch"
                                class="d-none ajaxDropDown p-0 outSideClick"></ul>
                        </form>
                    </div>
                </div>
            </div>
            <!--Basic Table-->
            <div class="table-responsive">
                <table class="table table-bordered u-table--v2">
                    <thead class="text-uppercase g-letter-spacing-1">
                    <tr>
                        <th class="g-font-weight-600 g-color-white text-center">ردیف</th>
                        <th class="g-font-weight-600 g-color-white text-center">نام</th>
                        <th class="g-font-weight-600 g-color-white g-min-width-200 text-center">نام خانوادگی</th>
                        <th class="g-font-weight-600 g-color-white text-center">کد ملی</th>
                        <th class="g-font-weight-600 g-color-white text-center">جزئیات</th>
                        <th class="g-font-weight-600 g-color-white text-center">تحویل محصول</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $key =>$row)
                        <tr>
                            <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                                {{$key+1}}
                            </td>

                            <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                                {{$row->name}}
                            </td>

                            <td class="align-middle text-center g-color-gray-light-v2">
                                {{$row->Family}}
                            </td>

                            <td class="align-middle text-center g-color-gray-light-v2">
                                {{$row->NationalID}}
                            </td>

                            <td class="align-middle text-nowrap text-center">
                                <a class="g-color-aqua g-text-underline--none--hover g-pa-5"
                                   href="{{route('sellerControlPanel',['id'=>$row->id,'tab'=>'user'])}}">
                                    <i class="icon-eye g-font-size-18 g-mr-7"></i>
                                </a>
                            </td>
                            <td class="align-middle text-center text-nowrap">
                                @if ($deliveryStatus[$key] > 1440 && $row->DeliveryStatus === '0')
                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                       data-toggle="tooltip"
                                       data-placement="top" data-original-title="اتمام زمان تحویل">
                                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                    </a>
                                @else
                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5">
                                        <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--End Basic Table-->
        </div>
    </div>

@endsection
