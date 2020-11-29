@extends('Layouts.IndexSeller')
@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>تحویل محصول
        </h3>
    </div>
    <!-- End Info Panel -->

    <div class="container g-pt-20">
        @if ($data->count()!==0)
            {{--    Warning Alert--}}
            <div style="direction: rtl" class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        <strong class="g-font-size-25 g-mr-10">اخطار</strong>
                        <p class="g-mr-10 g-mt-15">در صورت عدم تحویل به موقع محصول به تانا استایل خسارات ناشی از دیرکرد
                            تحویل محصول به
                            مشتری از شما فروشنده محترم کسر می گردد.</p>
                        <a href="#" class="alert-link g-mr-10">قوانین تحویل کالا</a>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="g-pb-15">
                <h3 style="direction: rtl"
                    class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                    <i class="icon-real-estate-079 u-line-icon-pro g-font-size-22 g-ml-5"></i>محصولات تحویلی به تانا استایل
                </h3>
                @if ($data->count()!==0)
                    <h6 style="direction: rtl"
                        class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                        <i class="fa fa-hand-o-right g-font-size-18"></i>
                        <span class="g-font-size-13">جدول را به سمت راست بکشید.
                </span>
                    </h6>
                @endif
                <div class="table-responsive">
                    <table style="direction: rtl" class="table table-bordered u-table--v2">
                        <thead>
                        <tr>
                            <th class="align-middle text-center text-nowrap focused rtlPosition">نام محصول</th>
                            <th class="align-middle text-center text-nowrap">تاریخ فروش</th>
                            <th class="align-middle text-center text-nowrap">ساعت فروش</th>
                            <th class="align-middle text-center text-nowrap">شماره فاکتور</th>
                            <th class="align-middle text-center text-nowrap">عکس</th>
                            <th class="align-middle text-center">وضعیت تحویل</th>
                            <th class="align-middle text-center">پیغام سیستمی</th>
                            <th class="align-middle text-center">توضیحات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key => $rec)
                            <tr>
                                <td class="align-middle text-nowrap text-center">{{ $rec->Name }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2] }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->Time }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->ID }}</td>
                                <td class="align-middle text-center text-nowrap">
                                    <div class="media">
                                        <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                             src="{{ $rec->PicPath }}pic1.jpg" alt="">
                                    </div>
                                </td>
                                @if ($deliveryStatus[$key] > 1440)
                                    <td class="align-middle text-center text-nowrap">
                                        <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                           data-toggle="tooltip"
                                           data-placement="top" data-original-title="اتمام زمان تحویل">
                                            <i class="fa fa-calendar-times-o g-font-size-18 g-color-red"></i>
                                        </a>
                                    </td>
                                    <td class="align-middle text-center text-nowrap g-color-lightred">هر چه سریعتر اقدام
                                        کنید.
                                    </td>
                                @else
                                    <p style="display: none">{{ $range = (int)$deliveryStatus[$key] / 14.4 }}</p>
                                    <td style="direction: ltr" class="align-middle">
                                        <div class="progress rounded-0 u-progress w-100"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             data-original-title="{{ 'زمان مانده '.(int)(24-($deliveryStatus[$key]/60)).' ساعت' }}">
                                            <div class="progress-bar u-progress-bar--lg g-bg-cyan"
                                                 role="progressbar"
                                                 style="width: {{ $range.'%' }}" aria-valuenow="{{ $range }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-nowrap g-color-cyan"><i class="fa fa-spinner fa-spin g-ml-5"></i>در انتظار تحویل</td>
                                @endif
                                <td class="align-middle text-center text-nowrap">{{ $rec->DeliveryStatusDetail }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- End Table --}}
            </div>
        @else
            <div style="direction: rtl" class="row">
                <div class="col-lg-12">
                    <!-- Border Alert -->
                    <div class="alert fade show g-brd-around g-brd-gray-light-v3 rounded-0 g-pt-100--lg g-pb-100--lg d-flex justify-content-center" role="alert">
                        <div class="media">
                            <div class="d-flex g-ml-10">
    <span class="u-icon-v3 u-icon-size--md g-bg-lightred g-color-white g-rounded-50x">
      <i class="icon-envelope g-font-size-30"></i>
    </span>
                            </div>
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0 g-font-size-20"><strong>فروشنده گرامی</strong></p>
                                </div>
                                <p class="m-0 g-font-size-16">شما محصولی برای تحویل به تانا استایل ندارید.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Border Alert -->
                </div>
            </div>
        @endif
    </div>
@endsection

