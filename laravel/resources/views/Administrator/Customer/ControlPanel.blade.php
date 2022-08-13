@extends('Layouts.IndexAdmin')
@section('Content')
    @switch($tab)
        @case('user')
            <span id="customerUser" class="d-none">1</span>
        @break

        @case('userInfo')
            <div class="modal" id="overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-right g-bg-gray-light-v5">
                        <button type="button" class="close g-font-size-20" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title"><span
                                class="fa fa-check-square g-color-primary g-font-size-25 g-ml-15"></span></h4>
                    </div>
                    <div class="modal-body text-right">
                        <p style="direction: rtl">اطلاعات کاربری خریدار به روز رسانی شد.</p>
                    </div>
                </div>
            </div>
        </div>
        @break

        @case('addressTab')
            <span id="address" class="d-none">1</span>
        @break

        @case('delivery')
            <span id="cusDelivery" class="d-none">1</span>
        @break

        @case('address')
            <span id="address" class="d-none">1</span>
            <div class="modal" id="overlay">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-right g-bg-gray-light-v5">
                            <button type="button" class="close g-font-size-20" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title"><span
                                    class="fa fa-check-square g-color-primary g-font-size-25 g-ml-15"></span></h4>
                        </div>
                        <div class="modal-body text-right">
                            <p style="direction: rtl">آدرس تحویل بروز رسانی شد.</p>
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('support')
            <span id="cusSupport" class="d-none">1</span>
        @break
        @default
    @endswitch

    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <!-- Nav tabs -->
        <ul class="nav nav-fill u-nav-v4-1 u-nav-light" role="tablist" data-target="nav-4-1-primary-hor-fill"
            data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-white">
            <li class="nav-item">
                <a class="nav-link" href="{{route('customerList')}}">خریداران</a>
            </li>

            <!--پشتیبانی-->
            <li class="nav-item">
                <a id="customerSupport" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--1" role="tab">
                    <div style="width: 20px; height: 20px"
                         class="{{$newSupport===0 ? 'd-none ': 'd-inline-block '}}text-center g-color-black g-bg-lightred g-rounded-50x g-mr-10">
                        {{$newSupport}}
                    </div>
                    پشتیبانی
                </a>
            </li>

            <!--تحویل محصول-->
            <li class="nav-item">
                <a id="customerDelivery" class="nav-link g-mb-minus-1" data-toggle="tab"
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
                <a id="sellerOrder" class="nav-link g-mb-minus-1" href="{{route('adminCustomerSale',$customerInfo->id)}}">
                    فاکتورهای خرید</a>
            </li>

            <!--آدرسها-->
            <li class="nav-item">
                <a id="customerAddress" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--7"
                   role="tab">آدرس های تحویل</a>
            </li>

            <!--اطلاعات کاربری-->
            <li class="nav-item">
                <a id="customerInfo" class="nav-link active" data-toggle="tab" href="#nav-4-1-primary-hor-fill--8"
                   role="tab">اطلاعات
                    کاربری</a>
            </li>
        </ul>
        <!-- End Nav tabs -->

        <!-- Tab panes -->
        <div id="nav-4-1-primary-hor-fill" class="tab-content g-pt-40">
            <!--پشتیبانی-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--1" role="tabpanel">
                <div class="container g-pb-170">
                    {{-- Total Info--}}
                    <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

                        <!-- Icon Blocks -->
                        <div style="padding-right: 60px;"
                             class="text-header-responsive col-12 g-pt-25 g-pb-25 g-mb-5 g-pl-0">
                            <div class="d-inline-block text-center">
                                <a
                                    class="u-icon-v2 g-color-teal rounded-circle g-mb-20 g-color-orange--hover"
                                    data-toggle="modal"
                                    data-target="#modalLoginForm"
                                    href="#">
                                    <i class="et-icon-chat g-font-size-25"></i>
                                </a>
                                <h6 class="g-color-white mb-3">ایجاد گفتگو</h6>
                                <span class="u-label g-color-teal g-mb-5 g-font-size-14">با درج عنوان جدید</span>
                            </div>
                        </div>
                        <!-- End Icon Blocks -->
                    </div>
                    <div style="direction: rtl" class="text-left">
                        <div class="modal fade text-center" id="modalLoginForm" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div style="background-color: #333" class="modal-header">
                                        <h4>ایجاد گفتگو جدید</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="hs-icon hs-icon-close"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('connectionNew')}}" method="post"
                                          enctype='multipart/form-data'>
                                        @csrf
                                        {{--                            Hidden input--}}
                                        <div style="direction: rtl; background-color: #333"
                                             class="modal-body g-pr-10 g-pl-10 g-pt-40">
                                            <div class="form-group row g-mb-25">
                                                <div class="input-group col-sm-10 force-col-12 mx-auto">
                                                <span style="border-right: 1px solid lightgrey"
                                                      class="input-group-addon  g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none w-25">عنوان گفتگو</span>
                                                    <input
                                                        class="form-control form-control-md rounded-0 g-color-darkblue g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                        type="text"
                                                        value=""
                                                        id="login"
                                                        name="title"
                                                        autocomplete="off" {{-- hide popup box when clicked --}}
                                                        tabindex="1"
                                                        autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group row g-mb-25">
                                                <div class="input-group col-sm-10 force-col-12 mx-auto">
                                                    <span style="border-right: 1px solid lightgrey;"
                                                          class="input-group-addon  g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-pa-10 w-25">اولویت</span>
                                                    <select style="height: 100%"
                                                            class="form-control form-control-md custom-select rounded-0 text-right g-font-size-16 g-height-70 g-pr-25 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            tabindex="2"
                                                            name="priority">
                                                        <option value="2">معمولی</option>
                                                        <option value="1">مهم</option>
                                                        <option value="0">فوری</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row g-mb-25">
                                                <div class="input-group col-sm-10 force-col-12 mx-auto">
                                                    <span style="border-right: 1px solid lightgrey;"
                                                          class="input-group-addon g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-pa-10 w-25">بخش مربوطه</span>
                                                    <select style="height: 100%"
                                                            class="form-control form-control-md custom-select rounded-0 text-right g-font-size-16 g-height-70 g-pr-25 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            tabindex="3"
                                                            name="section">
                                                        <option value="0">فنی</option>
                                                        <option value="1">تحویل کالا</option>
                                                        <option value="2">مالی</option>
                                                        <option value="3">مدیریت</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="btn btn-md u-btn-primary col-12 rounded-0 g-pa-15 g-color-white">
                                            شروع گفتگو
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- Table --}}
                    <div class="g-pb-15">
                        @if ($support->count()!==0)
                            <h6 style="direction: rtl"
                                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                <i class="fa fa-hand-o-right g-font-size-18"></i>
                                <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                            </h6>
                        @endif

                        @if ($support->count()===0)
                        <!-- Danger Alert -->
                            <div style="direction: rtl" class="alert alert-danger alert-dismissible fade show"
                                 role="alert">
                                <div class="media">
                                    <span class="d-flex ml-2 g-mt-5">
                                      <i class="fa fa-minus-circle"></i>
                                    </span>
                                    <div class="media-body">
                                        <strong>موردی یافت نشد.</strong>
                                    </div>
                                </div>
                            </div>
                            <!-- Danger Alert -->
                        @else
                            <div class="table-responsive">
                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                    <thead>
                                    <tr>
                                        <th class="align-middle text-center text-nowrap focused rtlPosition">عنوان
                                            گفتگو
                                        </th>
                                        <th class="align-middle text-center text-nowrap">بخش مربوطه</th>
                                        <th class="align-middle text-center text-nowrap">اولویت</th>
                                        <th class="align-middle text-center text-nowrap">زمان ایجاد گفتگو</th>
                                        <th class="align-middle text-center text-nowrap">جزئیات</th>
                                        <th class="align-middle text-center text-nowrap">وضعیت گفتگو</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--                                GroupBy Variable Hidden input--}}
                                    {{--                        groupBy for grouping msg with one title--}}
                                    <input style="display: none" value=" {{ $groupBy = '' }}">

                                    @foreach($support as $key => $rec)
                                        @if (($rec->ConversationID) !== $groupBy)
                                            <tr>
                                                <td class="align-middle text-nowrap text-center g-font-weight-600 g-color-aqua">{{ $rec->Subject }}</td>
                                                {{--                                Section--}}
                                                @if ($rec->Section === '0')
                                                    <td class="align-middle text-center text-nowrap">فنی</td>
                                                @elseif ($rec->Section === '1')
                                                    <td class="align-middle text-center text-nowrap">تحویل کالا</td>
                                                @elseif ($rec->Section === '2')
                                                    <td class="align-middle text-center text-nowrap">مالی</td>
                                                @elseif ($rec->Section === '3')
                                                    <td class="align-middle text-center text-nowrap">مدیریت</td>
                                                @endif

                                                {{--                                Priority--}}
                                                @if ($rec->Priority === '2')
                                                    <td class="align-middle text-center text-nowrap">معمولی</td>
                                                @elseif ($rec->Priority === '1')
                                                    <td class="align-middle text-center text-nowrap {{ ($rec->Status == 2) ? '' : 'g-color-orange' }}">
                                                        مهم
                                                    </td>
                                                @elseif ($rec->Priority === '0')
                                                    <td class="align-middle text-center text-nowrap {{ ($rec->Status == 2) ? '' : 'g-color-red' }}">
                                                        فوری
                                                    </td>
                                                @endif
                                                <td class="align-middle text-center text-nowrap">
                                                    {{ $supportPersianDate[$key][0].'/'.$supportPersianDate[$key][1].'/'.$supportPersianDate[$key][2] }}
                                                    <p class="g-font-size-13 g-color-primary m-0 p-0">{{ $rec->Time }}</p>
                                                </td>
                                                <td class="align-middle text-center text-nowrap">
                                                    <a style="cursor: pointer"
                                                       href="{{ route('adminCustomerConnectionDetail',['id'=>$rec->ID, 'status'=>$rec->Status])}}"
                                                       class="g-color-gray-light-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="مشاهده جزئیات گفتگو">
                                                        <i class="fa fa-eye g-font-size-18"></i>
                                                    </a>
                                                </td>
                                                @if ($rec->Status === '0')
                                                    <td class="align-middle text-center text-nowrap"><i
                                                            class="fa fa-check g-ml-5"></i>پاسخ داده شد
                                                    </td>
                                                @elseif ($rec->Status === '1')
                                                    <td class="align-middle text-center text-nowrap g-color-lightred"><i
                                                            class="fa fa-spinner fa-spin g-ml-5"></i>در انتضار پاسخ
                                                    </td>
                                                @elseif ($rec->Status === '2')
                                                    <td class="align-middle text-center text-nowrap">خوانده شده
                                                    </td>
                                                @elseif ($rec->Status === '3')
                                                    <td class="align-middle text-center text-nowrap">بدون پیام
                                                    </td>
                                                @endif
                                            </tr>

                                            {{--                                GroupBy Variable Hidden input--}}
                                            <input style="display: none" value=" {{ $groupBy = $rec->ConversationID }}">
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{-- End Table --}}
                    </div>

                    {{-- Pagination --}}
                    {{--        {{ $data->links('General.Pagination', ['result' => $data]) }}--}}
                </div>
            </div>

            <!--محصولات نحویلی-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--2" role="tabpanel">
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
                                        <th class="align-middle text-center text-nowrap">روش ارسال</th>
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
                                            <td class="align-middle text-center text-nowrap">{{ $rec->OrderId.'/'.$rec->ID }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->PostMethod }}</td>
                                            <td class="align-middle text-center text-nowrap">
                                                <div class="media">
                                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                                         src="{{ file_exists(public_path($rec->PicPath.$rec->SampleNumber.'.jpg'))?$rec->PicPath.$rec->SampleNumber:$rec->PicPath.'sample1' }}.jpg" alt="">
                                                </div>
                                            </td>
                                            @if ($deliveryStatus[$key] > 540)
                                                @if( $rec->DeliveryProblem===1 && $rec->DeliveryStatus !=='-1')
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
                                                <p class="m-0 g-font-size-20"><strong>خریدار مورد نظر</strong></p>
                                            </div>
                                            <p class="m-0 g-font-size-16">محصولی در صف انتظار ندارد.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Border Alert -->
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!--آدرسها-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--7" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                            <div style="direction: rtl;" id="accordion-13" class="u-accordion" role="tablist"
                                 aria-multiselectable="true">
                                @if(!isset($address[0]->ID))
                                    <div
                                        class="d-inline-block alert alert-danger g-px-15--lg g-px-5 text-lg-right text-center"
                                        role="alert">
                                        <strong>اخطار!</strong> لیست آدرس های شما خالی است.
                                    </div>
                                @else
                                    @foreach($address as $key => $row)
                                        <div id="{{'addressRow'.$key}}"
                                             class="card g-brd-none rounded-0 g-mb-40 g-mb-1--lg g-bg-gray-dark-v3">
                                            <div id="{{ 'accordion-13-heading-'.$key }}" class="u-accordion__header g-pa-0"
                                                 role="tab">
                                                <div style="direction: rtl" class="w-100 d-md-table g-color-gray-dark-v5"
                                                     role="button"
                                                     data-target="#{{ 'accordion-13-body-'.$key }}" data-toggle="collapse"
                                                     data-parent="#accordion-13"
                                                     aria-expanded="false" aria-controls="{{ 'accordion-13-body-'.$key }}">
                                                    <!-- ردیف و کلیدهای فعالسازی آدرس -->
                                                    <div
                                                        class="clearfix d-md-table-cell g-valign-middle g-pa-20--lg g-width-300 justify-content-between">
                                                        <!-- Track Num -->
                                                        <div
                                                            class="d-inline-block g-ml-20 g-width-20"><i
                                                                class="icon-options g-font-size-20 g-color-gray-dark-v1 g-line-height-0 align-middle"></i>
                                                        </div>
                                                        <!-- End Track Num -->
                                                    @if($row->Status === 1)
                                                        <!-- Track Avatar -->
                                                            <span style="cursor: default"
                                                                  class="g-ml-10 g-ml-25--lg g-bg-primary g-py-10 g-pr-15 g-pl-10 g-font-size-16">
                                                        <i class="icon-communication-011 g-color-white align-middle g-line-height-0"></i>
                                                    </span>
                                                            <!-- End Track Avatar -->
                                                    @else
                                                        <!-- Track Avatar -->
                                                            <a class="g-ml-10 g-ml-25--lg g-text-underline--none--hover g-bg-primary--hover g-bg-lightred g-py-10 g-pr-15 g-pl-10 g-font-size-16 g-width-50"
                                                               href="#"
                                                               id="{{ $row->ID }}"
                                                               onclick="activeAddress($(this).attr('id'))"
                                                               data-toggle="tooltip"
                                                               data-placement="top"
                                                               data-original-title="فعال سازی آدرس">
                                                                <i class="icon-communication-011 g-color-white align-middle g-line-height-0"></i>
                                                            </a>
                                                    @endif
                                                    <!-- End Track Avatar -->

                                                        <!-- Track Title -->
                                                        <h6 class="d-inline-block g-font-size-13 g-font-weight-700 g-color-gray-light-v5 mb-0">
                                                            {{ $row->ReceiverName.' '.$row->ReceiverFamily }}</h6>
                                                        <!-- End Article Title -->
                                                    </div>
                                                    <!-- آدرس دقیق ارسالی -->
                                                    <div
                                                        class="d-md-table-cell hidden-sm-down g-color-gray-light-v3 g-font-weight-700 g-valign-middle g-px-10 g-py-5">
                                                        <span
                                                            style="display: inline-block; width: 500px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                                            class="align-middle">{{ $row->Address }}</span>
                                                    </div>
                                                    <!-- حذف آدرس -->
                                                    <div
                                                        class="text-md-right d-md-table-cell g-valign-middle g-pa-20 bigDevice">
                                                        {{--delete button big device--}}
                                                        @if($row->Status === 1)
                                                            <span style="cursor: default"
                                                                  class="g-color-gray-dark-v5 g-pa-5"
                                                                  data-toggle="tooltip"
                                                                  data-placement="top" data-original-title="آدرس فعال">
                                                            <i class="icon-target g-font-size-18 g-color-primary align-middle"></i>
                                                        </span>
                                                        @else
                                                            <i id="{{'waitingAddressDelete'.$key}}" style="display: none"
                                                               class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                                            <a style="cursor: pointer"
                                                               onclick="deleteAddress({{ $row->ID }},$(this).attr('id'))"
                                                               id="{{ 'deleteBtn'.$key }}"
                                                               class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                               data-toggle="tooltip"
                                                               data-placement="top" data-original-title="حذف آدرس">
                                                                <i class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <form id="{{ 'addressUpdate'.$key }}" action="{{route('adminAddressUpdate')}}"
                                                  method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$customerInfo->id}}">
                                                <input name="receiver-id" class="d-none" value="{{$row->ID}}">
                                                <div id="{{ 'accordion-13-body-'.$key }}" class="collapse g-bg-gray-dark-v2"
                                                     role="tabpanel"
                                                     aria-labelledby="{{ 'accordion-13-heading-'.$key }}">
                                                    <div class="u-accordion__body g-pl-0">
                                                        <div class="g-pt-15 g-py-30--lg g-pr-10 g-px-60--lg">
                                                            {{--نام گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label
                                                                    class="col-sm-2 col-form-label align-self-center">نام
                                                                    گیرنده</label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <input
                                                                        id="{{ 'receiver-name-'.$key }}"
                                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                        type="text"
                                                                        name="receiver-name"
                                                                        maxlength="15"
                                                                        value="{{ $row->ReceiverName }}"
                                                                        placeholder="الزاماً فارسی"
                                                                        {{--                                           lang="fa"--}}
                                                                        onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                            str = $(this).val();
                                                            str = str.substring(0, str.length - 1);
                                                            $(this).val(str);
                                                            $(this).attr('autocomplete', 'off');
                                                            } else
                                                            $(this).attr('autocomplete', 'name');"
                                                                        readonly="">
                                                                </div>
                                                            </div>
                                                            {{--نام خانوادگی گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label
                                                                    class="col-sm-2 col-form-label align-self-center">نام
                                                                    خانوادگی
                                                                </label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <input
                                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                        type="text"
                                                                        name="receiver-family"
                                                                        maxlength="15"
                                                                        value="{{ $row->ReceiverFamily }}"
                                                                        placeholder="الزاماً فارسی"
                                                                        {{--                                           lang="fa"--}}
                                                                        onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                                    str = $(this).val();
                                                                    str = str.substring(0, str.length - 1);
                                                                    $(this).val(str);
                                                                    $(this).attr('autocomplete', 'off');
                                                                    } else
                                                                    $(this).attr('autocomplete', 'name');"
                                                                        readonly="">
                                                                </div>
                                                            </div>
                                                            {{--کد پستی گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label class="col-sm-2 col-form-label align-self-center">کد
                                                                    پستی</label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <input style="direction: ltr"
                                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                           value="{{ $row->PostalCode }}"
                                                                           name="receiver-postalCode"
                                                                           maxlength="10"
                                                                           placeholder="فقط اعداد"
                                                                           readonly="">
                                                                </div>
                                                            </div>
                                                            {{--تلفن ثابت گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label class="col-sm-2 col-form-label align-self-center">تلفن
                                                                    ثابت</label>
                                                                <div class="col-sm-10 force-col-12 d-flex">
                                                                    <input style="width: 70%; direction: ltr"
                                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                           id="{{ 'receiverPhoneNum'.$key }}"
                                                                           name="receiver-phone"
                                                                           maxlength="8"
                                                                           value="{{ $row->Phone }}"
                                                                           placeholder="xxxxxxxx"
                                                                           readonly="">
                                                                    <input style="width: 30%; direction: ltr"
                                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-brd-right-none g-font-size-16"
                                                                           name="receiver-prePhone"
                                                                           maxlength="3"
                                                                           value="{{ $row->PrePhone }}"
                                                                           oninput="if($(this).val().length === 3) $('#receiverPhoneNum'+{{ $key }}).focus();"
                                                                           placeholder="0xx"
                                                                           readonly="">
                                                                </div>
                                                            </div>
                                                            {{--موبایل گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label
                                                                    class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <input style="direction: ltr"
                                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                           placeholder="09xxxxxxxx"
                                                                           name="receiver-mobile"
                                                                           maxlength="11"
                                                                           value="{{ $row->Mobile }}"
                                                                           readonly="">
                                                                </div>
                                                            </div>
                                                            {{--استان/شهر گیرنده--}}
                                                            <div class="form-group row g-mb-15">
                                                                <label
                                                                    class="col-sm-2 col-form-label align-self-center">استان/شهر</label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <div id="{{'stateCity'.$key}}" class="d-flex">
                                                                        <input id="{{ 'stateReceiver'.$key }}"
                                                                               class="d-none"
                                                                               value="{{ $row->State }}">
                                                                        <select id="{{ 'stateSelectReceiver-'.$key }}"
                                                                                style="direction: rtl; padding-right: 30px !important; pointer-events: none"
                                                                                name="receiver-state"
                                                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v3"
                                                                                tabindex="3"
                                                                                onchange="changeState('stateSelectReceiver-'+ {{$key}} , 'citySelectReceiver-' + {{$key}})">
                                                                            <option value="0">استان</option>
                                                                            <option value="1">آذربایجان شرقی</option>
                                                                            <option value="2">آذربایجان غربی</option>
                                                                            <option value="3">اردبیل</option>
                                                                            <option value="4">اصفهان</option>
                                                                            <option value="5">البرز</option>
                                                                            <option value="6">ایلام</option>
                                                                            <option value="7">بوشهر</option>
                                                                            <option value="8">تهران</option>
                                                                            <option value="9">چهارمحال و بختیاری</option>
                                                                            <option value="10">خراسان جنوبی</option>
                                                                            <option value="11">خراسان رضوی</option>
                                                                            <option value="12">خراسان شمالی</option>
                                                                            <option value="13">خوزستان</option>
                                                                            <option value="14">زنجان</option>
                                                                            <option value="15">سمنان</option>
                                                                            <option value="16">سیستان و بلوچستان</option>
                                                                            <option value="17">فارس</option>
                                                                            <option value="18">قزوین</option>
                                                                            <option value="19">قم</option>
                                                                            <option value="20">کردستان</option>
                                                                            <option value="21">کرمان</option>
                                                                            <option value="22">کرمانشاه</option>
                                                                            <option value="23">کهگیلویه و بویراحمد</option>
                                                                            <option value="24">گلستان</option>
                                                                            <option value="25">گیلان</option>
                                                                            <option value="26">لرستان</option>
                                                                            <option value="27">مازندران</option>
                                                                            <option value="28">مرکزی</option>
                                                                            <option value="29">هرمزگان</option>
                                                                            <option value="30">همدان</option>
                                                                            <option value="31">یزد</option>
                                                                        </select>

                                                                        <input id="{{ 'cityReceiver'.$key }}" class="d-none"
                                                                               name="receiver-city"
                                                                               value="{{ $row->City }}">
                                                                        <select id="{{ 'citySelectReceiver-'.$key }}"
                                                                                style="direction: rtl; padding-right: 30px !important; pointer-events: none"
                                                                                name="receiver-city"
                                                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16  g-bg-gray-dark-v3 g-color-gray-light-v3"
                                                                                tabindex="4">
                                                                            <option value="0">شهر</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{--آدرس دقیق--}}
                                                            <div class="form-group row g-mb-25">
                                                                <label class="col-sm-2 col-form-label">آدرس دقیق</label>
                                                                <div class="col-sm-10 force-col-12">
                                                                    <input
                                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                                        maxlength="300"
                                                                        name="receiver-address"
                                                                        placeholder="الزاماً فارسی"
                                                                        value="{{$row->Address}}"
                                                                        readonly>
                                                                </div>
                                                            </div>

                                                            <div class="text-left">
                                                                <a style="cursor: pointer"
                                                                   onclick="editUserAddress({{$key}})"
                                                                   id="{{ 'editAddress'.$key }}"
                                                                   class="btn btn-md u-btn-outline-primary g-color-primary g-color-white--hover g-font-weight-600 g-letter-spacing-0_5 rounded-0 g-mb-15">
                                                                    ویرایش
                                                                </a>
                                                                <a style="cursor: pointer; display: none"
                                                                   onclick="saveUserAddress({{$key}})"
                                                                   id="{{ 'saveAddress'.$key }}"
                                                                   class="btn btn-md g-bg-primary g-color-white g-color-white--hover g-font-weight-600 g-letter-spacing-0_5 rounded-0 g-mb-15">
                                                                    بروزرسانی
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div style="margin-bottom: 400px" class="text-left g-mt-30 g-pt-10 g-brd-top g-brd-gray-dark-v5">
                                <a href="#modal17"
                                   id="newAddressLink"
                                   onclick="manuelFocus(); $(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
                                   data-modal-target="#modal17"
                                   data-modal-effect="slidetogether"
                                   class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15">
                                    افزودن آدرس جدید
                                </a>
                                <!-- Demo modal window -->
                                <div id="modal17"
                                     class="text-left g-bg-white SubMenuScroll"
                                     style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                                    <form id="addAddress" action="{{route('customerAddAddress')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$customerInfo->id}}">
                                        <div class="sticky-top g-color-gray-light-v5 g-bg-black g-px-20">
                                            <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                                                <button style="outline: none" type="button" class="close"
                                                        onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix'); setTimeout(function () {$('#filter-user-address').trigger('click')}, 400);">
                                                    <i class="hs-icon hs-icon-close"></i>
                                                </button>
                                                <h6 class="text-right m-0">افزودن آدرس جدید</h6>
                                            </div>
                                        </div>
                                        <div style="direction: rtl; overflow-y: auto"
                                             class="g-px-20 g-px-60--lg text-right g-pt-30 g-pb-250 g-bg-gray-dark-v2">
                                            {{--نام گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label
                                                    class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">نام
                                                    گیرنده</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input
                                                        id="receiver-name"
                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16 focusInput"
                                                        name="receiver-name"
                                                        maxlength="15"
                                                        type="text"
                                                        value=""
                                                        placeholder="الزاماً فارسی"
                                                        {{--                                           lang="fa"--}}
                                                        onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                        } else
                                                        $(this).attr('autocomplete', 'name');">
                                                </div>
                                            </div>
                                            {{--نام خانوادگی گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label
                                                    class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">نام خانوادگی
                                                </label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input
                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                        type="text"
                                                        name="receiver-family"
                                                        maxlength="15"
                                                        value=""
                                                        placeholder="الزاماً فارسی"
                                                        {{--                                           lang="fa"--}}
                                                        onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                        } else
                                                        $(this).attr('autocomplete', 'name');">
                                                </div>
                                            </div>
                                            {{--کد پستی گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">کد
                                                    پستی</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input style="direction: ltr"
                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                           name="receiver-postalCode"
                                                           maxlength="10"
                                                           value=""
                                                           placeholder="فقط اعداد">
                                                </div>
                                            </div>
                                            {{--تلفن ثابت گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">تلفن
                                                    ثابت</label>
                                                <div class="col-sm-10 force-col-12 d-flex">
                                                    <input style="width: 70%; direction: ltr"
                                                           id="receiver-phone-new"
                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                           name="receiver-phone"
                                                           maxlength="8"
                                                           value=""
                                                           placeholder="xxxxxxxx">
                                                    <input style="width: 30%; direction: ltr"
                                                           name="receiver-prePhone"
                                                           maxlength="3"
                                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-brd-right-none g-font-size-16"
                                                           value=""
                                                           oninput="if($(this).val().length === 3) $('.custombox-content #receiver-phone-new').focus();"
                                                           placeholder="0xx">
                                                </div>
                                            </div>
                                            {{--موبایل گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label style="direction: ltr"
                                                       class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">موبایل</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input
                                                        class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                        name="receiver-mobile"
                                                        maxlength="11"
                                                        placeholder="09xxxxxxxx"
                                                        value="">
                                                </div>
                                            </div>
                                            {{--آدرس سکونت گیرنده--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label
                                                    class="col-sm-2 col-form-label align-self-center g-color-gray-light-v3">استان/شهر</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <div class="d-flex">
                                                        <select id="stateSelectReceiver-new"
                                                                style="direction: rtl; padding-right: 30px !important;"
                                                                name="receiver-state"
                                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v3"
                                                                tabindex="3"
                                                                onchange="changeState('stateSelectReceiver-new','citySelectReceiver-new')">
                                                            <option value="0">استان</option>
                                                            <option value="1">آذربایجان شرقی</option>
                                                            <option value="2">آذربایجان غربی</option>
                                                            <option value="3">اردبیل</option>
                                                            <option value="4">اصفهان</option>
                                                            <option value="5">البرز</option>
                                                            <option value="6">ایلام</option>
                                                            <option value="7">بوشهر</option>
                                                            <option value="8">تهران</option>
                                                            <option value="9">چهارمحال و بختیاری</option>
                                                            <option value="10">خراسان جنوبی</option>
                                                            <option value="11">خراسان رضوی</option>
                                                            <option value="12">خراسان شمالی</option>
                                                            <option value="13">خوزستان</option>
                                                            <option value="14">زنجان</option>
                                                            <option value="15">سمنان</option>
                                                            <option value="16">سیستان و بلوچستان</option>
                                                            <option value="17">فارس</option>
                                                            <option value="18">قزوین</option>
                                                            <option value="19">قم</option>
                                                            <option value="20">کردستان</option>
                                                            <option value="21">کرمان</option>
                                                            <option value="22">کرمانشاه</option>
                                                            <option value="23">کهگیلویه و بویراحمد</option>
                                                            <option value="24">گلستان</option>
                                                            <option value="25">گیلان</option>
                                                            <option value="26">لرستان</option>
                                                            <option value="27">مازندران</option>
                                                            <option value="28">مرکزی</option>
                                                            <option value="29">هرمزگان</option>
                                                            <option value="30">همدان</option>
                                                            <option value="31">یزد</option>
                                                        </select>

                                                        <select id="citySelectReceiver-new"
                                                                style="direction: rtl; padding-right: 30px !important;"
                                                                name="receiver-city"
                                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v3"
                                                                tabindex="4">
                                                            <option value="0">شهر</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--آدرس دقیق--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label g-color-gray-light-v3">آدرس دقیق</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input
                                                        class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v3 g-font-size-16"
                                                        name="receiver-address"
                                                        placeholder="الزاماً فارسی">
                                                </div>
                                            </div>
                                            <div style="text-align: left">
                                                <a onclick="addUserAddress()"
                                                   id="submitAddress"
                                                   class="btn btn-md u-btn-primary rounded-0 g-color-white g-mt-15 g-mb-20">
                                                    ثبت آدرس جدید
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Demo modal window -->
                            </div>
                    </div>
                </div>
            </div>
            <!-- End Tab panes -->

            <!--اطلاعات کاربری-->
            <div class="tab-pane fade show active" id="nav-4-1-primary-hor-fill--8" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <form action="{{route('updateCustomer')}}"
                              method="POST"
                              style="direction: rtl"
                              id="sellerForm"
                              disabled=""
                              enctype="multipart/form-data">
                            @csrf
                            <fieldset id="userData" disabled="disabled">
                                <div class="container g-py-30--lg g-px-60--lg">
                                    <input type="hidden" name="id" value="{{$customerInfo->id}}">
                                    {{--نام--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">نام</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input id="user-name"
                                                   class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   type="text"
                                                   value="{{$customerInfo->name}}"
                                                   name="name"
                                                   autofocus
                                                   maxlength="15"
                                                   placeholder="الزاما فارسی"
                                                   {{--                                           lang="fa"--}}
                                                   onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                            >
                                        </div>
                                    </div>

                                    {{--نام خانوادگی--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">نام
                                            خانوادگی</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input
                                                class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="user-family"
                                                name="family"
                                                maxlength="15"
                                                type="text"
                                                value="{{$customerInfo->Family}}"
                                                placeholder="الزاما فارسی"
                                                {{--                                           lang="fa"--}}
                                                onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                            >
                                        </div>
                                    </div>

                                    {{--ایمیل--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">ایمیل</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input style="direction: ltr"
                                                   class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   id="email"
                                                   name="email"
                                                   type="email"
                                                   value="{{$customerInfo->email}}"
                                                   placeholder="مثال: najatAndimeh@gmail.com"
                                            >
                                        </div>
                                    </div>

                                    {{--کد ملی--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                            ملی</label>
                                        <div dir="ltr" class="col-sm-9 force-col-12">
                                            <input
                                                class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="nationalId"
                                                name="nationalId"
                                                value="{{$customerInfo->NationalID}}"
                                                maxlength="10"
                                                placeholder="فقط اعداد"
                                            >
                                        </div>
                                    </div>

                                    {{--تاریخ تولد--}}
                                    <div class="customDisable form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">تاریخ
                                            تولد</label>
                                        <div class="col-sm-9 force-col-12">
                                            <div class="d-flex">
                                                <select style="direction: ltr"
                                                        class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                        id="birthday-day"
                                                        name="day"
                                                        tabindex="3">
                                                    <option
                                                        value="{{$customerInfo->BirthdayD}}">{{$customerInfo->BirthdayD}}</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                                <select style="direction: ltr"
                                                        id="birthday-mon"
                                                        class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                        name="mon"
                                                        tabindex="4">
                                                    <option
                                                        value="{{$customerInfo->BirthdayM}}">{{$customerInfo->BirthdayM}}</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <select style="direction: ltr"
                                                        id="birthday-year"
                                                        class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                        name="year"
                                                        tabindex="5">
                                                    <option
                                                        value="{{$customerInfo->BirthdayY}}">{{$customerInfo->BirthdayY}}</option>
                                                    <option value="1398">1398</option>
                                                    <option value="1397">1397</option>
                                                    <option value="1396">1396</option>
                                                    <option value="1395">1395</option>
                                                    <option value="1394">1394</option>
                                                    <option value="1393">1393</option>
                                                    <option value="1392">1392</option>
                                                    <option value="1391">1391</option>
                                                    <option value="1390">1390</option>
                                                    <option value="1389">1389</option>
                                                    <option value="1388">1388</option>
                                                    <option value="1387">1387</option>
                                                    <option value="1386">1386</option>
                                                    <option value="1385">1385</option>
                                                    <option value="1384">1384</option>
                                                    <option value="1383">1383</option>
                                                    <option value="1382">1382</option>
                                                    <option value="1381">1381</option>
                                                    <option value="1380">1380</option>
                                                    <option value="1379">1379</option>
                                                    <option value="1378">1378</option>
                                                    <option value="1377">1377</option>
                                                    <option value="1376">1376</option>
                                                    <option value="1375">1375</option>
                                                    <option value="1374">1374</option>
                                                    <option value="1373">1373</option>
                                                    <option value="1372">1372</option>
                                                    <option value="1371">1371</option>
                                                    <option value="1370">1370</option>
                                                    <option value="1369">1369</option>
                                                    <option value="1368">1368</option>
                                                    <option value="1367">1367</option>
                                                    <option value="1366">1366</option>
                                                    <option value="1365">1365</option>
                                                    <option value="1364">1364</option>
                                                    <option value="1363">1363</option>
                                                    <option value="1362">1362</option>
                                                    <option value="1361">1361</option>
                                                    <option value="1360">1360</option>
                                                    <option value="1359">1359</option>
                                                    <option value="1358">1358</option>
                                                    <option value="1357">1357</option>
                                                    <option value="1356">1356</option>
                                                    <option value="1355">1355</option>
                                                    <option value="1354">1354</option>
                                                    <option value="1353">1353</option>
                                                    <option value="1352">1352</option>
                                                    <option value="1351">1351</option>
                                                    <option value="1350">1350</option>
                                                    <option value="1349">1349</option>
                                                    <option value="1348">1348</option>
                                                    <option value="1347">1347</option>
                                                    <option value="1346">1346</option>
                                                    <option value="1345">1345</option>
                                                    <option value="1344">1344</option>
                                                    <option value="1343">1343</option>
                                                    <option value="1342">1342</option>
                                                    <option value="1341">1341</option>
                                                    <option value="1340">1340</option>
                                                    <option value="1339">1339</option>
                                                    <option value="1338">1338</option>
                                                    <option value="1337">1337</option>
                                                    <option value="1336">1336</option>
                                                    <option value="1335">1335</option>
                                                    <option value="1334">1334</option>
                                                    <option value="1333">1333</option>
                                                    <option value="1332">1332</option>
                                                    <option value="1331">1331</option>
                                                    <option value="1330">1330</option>
                                                    <option value="1329">1329</option>
                                                    <option value="1328">1328</option>
                                                    <option value="1327">1327</option>
                                                    <option value="1326">1326</option>
                                                    <option value="1325">1325</option>
                                                    <option value="1324">1324</option>
                                                    <option value="1323">1323</option>
                                                    <option value="1322">1322</option>
                                                    <option value="1321">1321</option>
                                                    <option value="1320">1320</option>
                                                    <option value="1319">1319</option>
                                                    <option value="1318">1318</option>
                                                    <option value="1317">1317</option>
                                                    <option value="1316">1316</option>
                                                    <option value="1315">1315</option>
                                                    <option value="1314">1314</option>
                                                    <option value="1313">1313</option>
                                                    <option value="1312">1312</option>
                                                    <option value="1311">1311</option>
                                                    <option value="1310">1310</option>
                                                    <option value="1309">1309</option>
                                                    <option value="1308">1308</option>
                                                    <option value="1307">1307</option>
                                                    <option value="1306">1306</option>
                                                    <option value="1305">1305</option>
                                                    <option value="1304">1304</option>
                                                    <option value="1303">1303</option>
                                                    <option value="1302">1302</option>
                                                    <option value="1301">1301</option>
                                                    <option value="1300">1300</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{--جنسیت--}}
                                    <div class="customDisable form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">جنسیت</label>
                                        <div class="col-sm-9 force-col-12">
                                            <div class="btn-group-lg d-flex">
                                                <label class="u-check col-md-4 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($customerInfo->Gender===0 ? 'checked':'')}}
                                                           value="0">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                                </label>
                                                <label class="u-check col-md-4 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($customerInfo->Gender===1 ? 'checked':'')}}
                                                           value="1">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
                                                </label>
                                                <label class="u-check col-md-4 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($customerInfo->Gender===2 ? 'checked':'')}}
                                                           value="1">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-bg-primary--checked rounded-0 g-color-white--checked">کودک</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{--تلفن ثابت--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">تلفن
                                            ثابت</label>
                                        <div class="col-sm-9 force-col-12 d-flex">
                                            <input
                                                style="direction: ltr"
                                                class="text-left col-8 form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="phoneNumber"
                                                name="phone"
                                                type="text"
                                                maxlength="8"
                                                value="{{$customerInfo->Phone}}"
                                                placeholder="xxxxxxxx"
                                            >
                                            <input
                                                style="direction: ltr"
                                                id="phonePreNumber"
                                                name="prePhone"
                                                class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16 g-brd-right-none"
                                                maxlength="3"
                                                value="{{$customerInfo->PrePhone}}"
                                                oninput="if($(this).val().length === 3) $('#phoneNumber').focus();"
                                                placeholder="0xx"
                                            >
                                        </div>
                                    </div>

                                    {{--موبایل--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">تلفن
                                            همراه</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input style="direction: ltr"
                                                   class="text-left form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   id="mobile"
                                                   name="mobile"
                                                   maxlength="11"
                                                   value="{{$customerInfo->Mobile}}"
                                                   placeholder="09xxxxxxxx"
                                            >
                                        </div>
                                    </div>

                                    {{--استان/شهر--}}
                                    <div class="customDisable form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">استان/شهر
                                            سکونت</label>
                                        <div class="col-sm-9 force-col-12">
                                            <div class="d-lg-flex">
                                                <!--ورودی زیر فقط برای دریافت استان جاوااسکریپت استفاده می شود-->
                                                <input id="state" class="d-none" value="{{$customerInfo->State}}">
                                                <select id="stateSelect"
                                                        style="direction: rtl; padding-right: 30px !important"
                                                        class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none--lg g-bg-gray-dark-v3 g-color-gray-light-v4 g-mb-10 g-mb-0--lg"
                                                        tabindex="3"
                                                        name="state"
                                                        onchange="changeState('stateSelect','citySelect')">
                                                    <option value="0">استان</option>
                                                    <option value="1">آذربایجان شرقی</option>
                                                    <option value="2">آذربایجان غربی</option>
                                                    <option value="3">اردبیل</option>
                                                    <option value="4">اصفهان</option>
                                                    <option value="5">البرز</option>
                                                    <option value="6">ایلام</option>
                                                    <option value="7">بوشهر</option>
                                                    <option value="8">تهران</option>
                                                    <option value="9">چهارمحال و بختیاری</option>
                                                    <option value="10">خراسان جنوبی</option>
                                                    <option value="11">خراسان رضوی</option>
                                                    <option value="12">خراسان شمالی</option>
                                                    <option value="13">خوزستان</option>
                                                    <option value="14">زنجان</option>
                                                    <option value="15">سمنان</option>
                                                    <option value="16">سیستان و بلوچستان</option>
                                                    <option value="17">فارس</option>
                                                    <option value="18">قزوین</option>
                                                    <option value="19">قم</option>
                                                    <option value="20">کردستان</option>
                                                    <option value="21">کرمان</option>
                                                    <option value="22">کرمانشاه</option>
                                                    <option value="23">کهگیلویه و بویراحمد</option>
                                                    <option value="24">گلستان</option>
                                                    <option value="25">گیلان</option>
                                                    <option value="26">لرستان</option>
                                                    <option value="27">مازندران</option>
                                                    <option value="28">مرکزی</option>
                                                    <option value="29">هرمزگان</option>
                                                    <option value="30">همدان</option>
                                                    <option value="31">یزد</option>
                                                </select>

                                                <!--ورودی زیر فقط برای دریافت شهر جاوااسکریپت استفاده می شود-->
                                                <input id="city" class="d-none" value="{{$customerInfo->City}}">
                                                <select id="citySelect"
                                                        style="direction: rtl; padding-right: 30px !important"
                                                        class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                        name="city"
                                                        tabindex="4">
                                                    <option value="">شهر</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{--تصویر چهره--}}
                                    <div class="form-group row justify-content-center">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">تصویر
                                            پروفایل</label>
                                        <div dir="ltr" class="d-flex col-sm-9 force-col-12">
                                            <div class="col-md-4 p-0 g-mr-15">
                                                <a class="js-fancybox" href="{{asset($customerInfo->PicPath)}}"
                                                   data-fancybox-animate-in="zoomIn" data-fancybox-animate-out="zoomOut"
                                                   data-fancybox-speed="200" data-fancybox-blur-bg="blur"
                                                   data-fancybox-bg="rgba(0,0,0, 1)">
                                                    <img class="img-fluid" src="{{asset($customerInfo->PicPath)}}"
                                                         alt="Image Description">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="d-none" type="text" name="userImage"
                                           value="{{$customerInfo->PicPath}}">
                                </div>
                            </fieldset>
                        </form>
                        <div style="direction: ltr" class="g-mx-60--lg g-mt-60--lg g-mb-30--lg g-my-30 g-mx-15">
                            <button id="edit" type="button"
                                    class="btn btn-md u-btn-outline-primary g-bg-white g-bg-primary--hover rounded-0 force-col-12 g-mb-15"
                                    onclick="editUserData()">
                                ویرایش اطلاعات کاربری
                            </button>
                            <button id="save" style="display: none" type="button"
                                    class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                    onclick="saveUserData()">
                                ثبت اطلاعات
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tab panes -->
        </div>

@endsection
