@extends('Layouts.IndexAdmin')
@section('Content')

    <div style="direction: rtl" class="g-bg-gray-dark-v2 d-flex">
        <div class="col-12 col-lg-3 g-brd-left g-brd-white-opacity-0_8 text-center g-pt-20 g-pb-40">
            <span class="d-block g-font-size-25 g-color-pink g-mb-15 g-pb-20 g-brd-bottom g-brd-white-opacity-0_8">پنل فروشندگان</span>
            <a href="#" class="d-block btn btn-md u-btn-darkgray active rounded-0 g-mb-15">تایید هویت فروشندگان</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">فروشندگان فعال</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">فروشندگان غیر
                فعال</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">موجودی
                فروشندگان</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">وجوه پرداختی</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">پرداخت های
                فروشندگان</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">حساب های بانکی
                فروشندگان</a>
            <a href="#" class="d-block btn btn-md u-btn-darkgray rounded-0 u-btn-hover-v2-1 g-mb-15">پشتیبانی
                فروشندگان</a>
            <div class="navbar-brand g-mt-30 g-mr-0">
                <img src="img/Logo/logo_white.png" alt="Image Description" width="150">
            </div>
        </div>
        <div class="col-12 col-lg-9 g-pt-25 g-pb-40">
            <h4 class="g-mb-25 g-color-gray-light-v2">صف انتظار</h4>
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
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($data as $key =>$row)
                    <tr>
                        <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                            {{$key+1}}
                        </td>

                        <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                            {{$row->Name}}
                        </td>

                        <td class="align-middle text-center g-color-gray-light-v2">
                            {{$row->Family}}
                        </td>

                        <td class="align-middle text-center g-color-gray-light-v2">
                            {{$row->NationalID}}
                        </td>

                        <td class="align-middle text-nowrap text-center">
                            <a class="g-color-aqua g-text-underline--none--hover g-pa-5" href="{{route('newSellerInfoDetail',$row->ID)}}"
                               data-toggle="tooltip" data-placement="top" data-original-title="جزئیات">
                                <i class="icon-eye g-font-size-18 g-mr-7"></i>
                            </a>
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
