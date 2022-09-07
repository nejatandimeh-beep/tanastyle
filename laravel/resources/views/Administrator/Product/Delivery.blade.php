@extends('Layouts.IndexAdmin')
@section('Content')
    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <!-- Nav tabs -->
        <ul class="nav nav-fill u-nav-v4-1 u-nav-light adminPanelResponsive" role="tablist" data-target="nav-4-1-primary-hor-fill"
            data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-white">
            <!--محصولات برگشتی-->
            <li class="nav-item">
                <a id="sellerOrder" class="nav-link g-mb-minus-1" href="{{route('adminProductReturn')}}">
                    <span class="d-none g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    محصولات برگشتی
                </a>
            </li>
            <!--تحویل محصول-->
            <li class="nav-item">
                <a id="sellerDelivery" class="nav-link g-mb-minus-1 active" data-toggle="tab"
                   href="#nav-4-1-primary-hor-fill--2"
                   role="tab">
                    <span id="deliveryAlarm" class="d-none g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    تحویل محصول
                </a>
            </li>
            <!--فاکتور-->
            <li class="nav-item">
                <a id="sellerOrder" class="nav-link g-mb-minus-1" href="{{route('adminProductSale')}}">
                    فاکتورهای فروش</a>
            </li>
            <!--انبار-->
            <li class="nav-item">
                <a id="sellerStore" class="nav-link" href="{{route('adminProductStore')}}">انبار</a>
            </li>
        </ul>
        <!-- End Nav tabs -->

        <!-- Tab panes -->
        <div id="nav-4-1-primary-hor-fill" class="tab-content g-pt-40">
            <!--محصولات نحویلی-->
            <div class="tab-pane fade show active" id="nav-4-1-primary-hor-fill--2" role="tabpanel">
                <div style="padding-bottom: 300px;" class="container g-pt-60">
                    @if ($delivery->count()!==0)
                        {{-- Table --}}
                        <div class="g-pb-15">
                            @if ($delivery->count()!==0)
                                <h6 style="direction: rtl"
                                    class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                    <i class="fa fa-hand-o-right g-font-size-18"></i>
                                    <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                                </h6>
                            @endif
                            <div class="table-responsive">
                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                    <thead>
                                    <tr>
                                        <th class="align-middle text-center text-nowrap focused rtlPosition">نام محصول
                                        </th>
                                        <th class="align-middle text-center text-nowrap">تاریخ فروش</th>
                                        <th class="align-middle text-center text-nowrap">ساعت فروش</th>
                                        <th class="align-middle text-center text-nowrap">شماره فاکتور</th>
                                        <th class="align-middle text-center text-nowrap">روس ارسال</th>
                                        <th class="align-middle text-center text-nowrap">عکس</th>
                                        <th class="align-middle text-center">وضعیت تحویل</th>
                                        <th class="align-middle text-center">پیغام سیستمی</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($delivery as $key => $rec)
                                        <tr>
                                            <td class="align-middle text-nowrap text-center">{{ $rec->Name }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $deliverPersianDate[$key][0].'/'.$deliverPersianDate[$key][1].'/'.$deliverPersianDate[$key][2] }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->Time }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->OrderId.'/'.$rec->OrderDetailID }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->PostMethod }}</td>
                                            <td class="align-middle text-center text-nowrap">
                                                <div class="media">
                                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                                         src="{{ file_exists(public_path($rec->PicPath.$rec->SampleNumber.'.jpg'))?$rec->PicPath.$rec->SampleNumber:$rec->PicPath.'sample1' }}.jpg" alt="">
                                                </div>
                                            </td>
                                            @if ($deliveryStatus[$key] > 540)
                                                @if( $rec->DeliveryProblem===1 && $rec->DeliveryStatus!=='-1')
                                                    <td class="align-middle text-center text-nowrap">
                                                        <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                           data-toggle="tooltip"
                                                           data-placement="top" data-original-title="اتمام زمان تحویل">
                                                            <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                                        </a>
                                                    </td>
                                                    <td id="deliveryErr"
                                                        class="align-middle text-center text-nowrap g-color-lightred">
                                                        عدم
                                                        تحویل محصول
                                                    </td>
                                                @else
                                                    <td class="align-middle text-center text-nowrap">
                                                        <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5">
                                                            <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                                        </a>
                                                    </td>
                                                    <td id="deliverySuccess"
                                                        class="align-middle text-center text-nowrap g-color-primary">
                                                        تحویل با موفقیت
                                                    </td>
                                                @endif
                                            @else
                                                <p style="display: none">{{ $range = (int)$deliveryStatus[$key] / 14.4 }}</p>
                                                <td style="direction: ltr" class="align-middle">
                                                    <div class="progress rounded-0 u-progress w-100"
                                                         data-toggle="tooltip"
                                                         data-placement="top"
                                                         data-original-title="{{ 'زمان مانده '.(int)(24-($deliveryStatus[$key]/60)).' ساعت' }}">
                                                        <div class="progress-bar u-progress-bar--lg g-bg-cyan"
                                                             role="progressbar"
                                                             style="width: {{ $range.'%' }}"
                                                             aria-valuenow="{{ $range }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-nowrap g-color-cyan"><i
                                                        class="fa fa-spinner fa-spin g-ml-5"></i>در انتظار تحویل
                                                </td>
                                            @endif
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
                                <div
                                    class="alert fade show g-brd-around g-brd-gray-light-v3 rounded-0 g-pt-100--lg g-pb-100--lg d-flex justify-content-center"
                                    role="alert">
                                    <div class="media">
                                        <div class="d-flex g-ml-10">
                                            <span
                                                class="u-icon-v3 u-icon-size--md g-bg-lightred g-color-white g-rounded-50x">
                                              <i class="icon-envelope g-font-size-30"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="m-0 g-font-size-20"><strong>فروشنده گرامی</strong></p>
                                            </div>
                                            <p class="m-0 g-font-size-16">شما محصولی برای تحویل به تانا استایل
                                                ندارید.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Border Alert -->
                            </div>
                        </div>
                    @endif

                        {{--                     Pagination--}}
                        {{ $delivery->links('General.Pagination', ['result' => $delivery]) }}
                </div>
            </div>
        </div>
    </div>
@endsection
