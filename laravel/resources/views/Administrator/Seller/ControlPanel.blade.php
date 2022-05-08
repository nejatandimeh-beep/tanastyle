@extends('Layouts.IndexAdmin')
@section('Content')
    @switch($tab)
        @case('cardActive')
        <span id="cardActive" class="d-none">1</span>
        @break

        @case('store')
        <span id="store" class="d-none">1</span>
        @break

        @case('sale')
        <span id="sale" class="d-none">1</span>
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
                        <p style="direction: rtl">اطلاعات کاربری فروشنده به روز رسانی شد.</p>
                    </div>
                </div>
            </div>
        </div>
        @break

        @case('delete')
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
                        <p style="direction: rtl">محصول مورد نظر حذف گردید.</p>
                    </div>
                </div>
            </div>
        </div>
        <span id="store" class="d-none">1</span>
        @break

        @case('false')
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
                        <p style="direction: rtl">گزارش اطلاعات اشتباه برای محصول مورد نظر ثبت شد.</p>
                    </div>
                </div>
            </div>
        </div>
        <span id="store" class="d-none">1</span>
        @break

        @case('support')
        <span id="support" class="d-none">1</span>
        @break

        @case('amountReceived')
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
                        <p style="direction: rtl">مبلغ واریزی با موفقیت ثبت شد.</p>
                    </div>
                </div>
            </div>
        </div>
        <span id="amountReceived" class="d-none">1</span>
        @break

        @default
    @endswitch

    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <!-- Nav tabs -->
        <ul class="nav nav-fill u-nav-v4-1 u-nav-light" role="tablist" data-target="nav-4-1-primary-hor-fill"
            data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-white">
            <li class="nav-item">
                <a class="nav-link" href="{{route('sellerList')}}">فروشندگان</a>
            </li>

            <!--پشتیبانی-->
            <li class="nav-item">
                <a id="sellerSupport" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--1" role="tab">
                    <div style="width: 20px; height: 20px"
                         class="{{$newSupport===0 ? 'd-none ': 'd-inline-block '}}text-center g-color-black g-bg-lightred g-rounded-50x g-mr-10">
                        {{$newSupport}}
                    </div>
                    پشتیبانی
                </a>
            </li>

            <!--تحویل محصول-->
            <li class="nav-item">
                <a id="sellerDelivery" class="nav-link g-mb-minus-1" data-toggle="tab"
                   href="#nav-4-1-primary-hor-fill--2"
                   role="tab">
                    <span id="deliveryAlarm" class="d-none g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    تحویل محصول
                </a>
            </li>

            <!--مبالغ دریافتی-->
            <li class="nav-item">
                <a id="sellerAmount" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--3" role="tab">
                    مبالغ دریافتی</a>
            </li>

            <!--فاکتور-->
            <li class="nav-item">
                <a id="sellerOrder" class="nav-link g-mb-minus-1" data-toggle="tab" href="#nav-4-1-primary-hor-fill--4" role="tab">
                    <span id="deliveryAlarm" class="{{$pf==='' ? 'd-none ': ''}}g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    فاکتورهای فروش</a>
            </li>

            <!--انبار-->
            <li class="nav-item">
                <a id="sellerStore" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--5" role="tab">انبار</a>
            </li>

            <!--اطلاعات مالی-->
            <li class="nav-item">
                <a id="sellerCard" class="nav-link" data-toggle="tab" href="#nav-4-1-primary-hor-fill--6" role="tab">اطلاعات
                    مالی</a>
            </li>

            <!--اطلاعات کاربری-->
            <li class="nav-item">
                <a id="sellerInfo" class="nav-link active" data-toggle="tab" href="#nav-4-1-primary-hor-fill--7"
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
                                                       href="{{ route('connectionDetail',['id'=>$rec->ID, 'status'=>$rec->Status])}}"
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
                                                         src="{{ $rec->PicPath }}pic1.jpg" alt="">
                                                </div>
                                            </td>
                                            @if ($deliveryStatus[$key] > 540)
                                                <td class="align-middle text-center text-nowrap">
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="اتمام زمان تحویل">
                                                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                                    </a>
                                                </td>
                                                <td id="deliveryErr"
                                                    class="align-middle text-center text-nowrap g-color-lightred">عدم
                                                    تحویل محصول
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
                </div>
            </div>

            <!--مبالغ دریافتی-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--3" role="tabpanel">
                <div style="padding-bottom: 120px" class="container">
                    {{-- Total Info--}}
                    <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">درآمد فروشنده از تانا استایل</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($amountSum['totalSaleAmount']) }}</span>تومان </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">کل دریافتی های فروشنده</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($amountSum['totalReceivedAmount']) }}</span>تومان </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">زمان آخرین دریافت وجه</h3>
                            @if ($lastPaymentDate === 0)
                                <span class="u-label g-bg-bluegray g-mb-5">
                                    <span class="g-mr-5 g-ml-5 g-color-aqua">--</span>
                                    تاریخ
                                    <span class="g-mr-5 g-ml-5 g-color-aqua">--</span>
                                    ساعت
                                </span>
                            @else
                                <span class="u-label g-bg-bluegray g-mb-5">تاریخ<span
                                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $lastPaymentDate[0].'/'.$lastPaymentDate[1].'/'.$lastPaymentDate[2] }}</span>ساعت <span
                                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $amountSum['lastPaymentTime'] }}</span></span>
                            @endif
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">طلب فروشنده از تانا استایل</h3>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($amountSum['credit']) }}</span>تومان </span>
                        </div>
                        <!-- End Icon Blocks -->
                    </div>

                    {{-- Filters --}}
                    <div id="accordion-14" class="u-accordion u-accordion-color-primary" role="tablist"
                         aria-multiselectable="true">
                        <!-- Card -->
                        <div class="card g-brd-none rounded-0 g-mb-15">
                            <div id="accordion-14-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                                <h5 class="mb-0">
                                    <a
                                        class="d-block g-color-gray-light-v3 g-bg-gray-dark-v3 g-text-underline--none--hover g-brd-around g-brd-gray-dark-v5 g-rounded-0 g-pa-10-15 g-font-size-16 collapsed"
                                        href="#accordion-14-body-01" data-toggle="collapse" data-parent="#accordion-14"
                                        aria-expanded="false" aria-controls="accordion-14-body-01">
                                              <span class="u-accordion__control-icon g-mr-10">
                                                <i class="fa fa-angle-down"></i>
                                                <i class="fa fa-angle-up"></i>
                                              </span>
                                        فیلترها<i class="fa fa-sliders g-ml-5"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="accordion-14-body-01" class="collapse g-bg-gray-dark-v2" role="tabpanel"
                                 aria-labelledby="accordion-14-heading-01">
                                <div class="u-accordion__body g-color-gray-dark-v5 p-0 pt-2">
                                    <div class="m-0 p-0">
                                        <div class="g-pr-10 g-pl-10 g-mb-0 g-pt-20 g-mb-25">
                                            <div class="rowSeller">
                                                {{--                Date Calender Filter For Big Device--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus g-mb-0">

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startYearBD"
                                                            tabindex="5">
                                                            <option
                                                                value="">سال
                                                            </option>
                                                            <option value="1399">1399</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startMonBD"
                                                            tabindex="4">
                                                            <option
                                                                value="">ماه
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none  g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startDayBD"
                                                            tabindex="3">
                                                            <option
                                                                value="">روز
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
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

                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            از
                                                        </div>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            محدوده تاریخ واریز
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group g-mb-20 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus">
                                                        <button type="button"
                                                                class="btn btn-md u-btn-primary rounded-0"
                                                                id="filterDateBtnBD"
                                                                disabled
                                                                onclick="applyDateFilter('amountReceived', 'startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD')">
                                                            اعمال
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-md u-btn-orange rounded-0"
                                                                id="ResetDateBtnBD"
                                                                disabled
                                                                onclick="resetDate('startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD', 'ResetDateBtnBD')">
                                                            از نو
                                                        </button>
                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endYearBD"
                                                            tabindex="8">
                                                            <option
                                                                value="">سال
                                                            </option>
                                                            <option value="1399">1399</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endMonBD"
                                                            tabindex="7">
                                                            <option
                                                                value="">ماه
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endDayBD"
                                                            tabindex="6">
                                                            <option
                                                                value="">روز
                                                            </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
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

                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            تا
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--                    Transaction Code Filter--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                                        <input style="direction: rtl"
                                                               class="form-control form-control-md rounded-0 text-left g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                               type="text"
                                                               id="amountCode_search"
                                                               placeholder="همه"
                                                               value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0 w-50">
                                                            براساس کد تراکنش
                                                        </div>
                                                    </div>
                                                    <ul id="amountCode" class="ajaxDropDown"></ul>
                                                </div>

                                                {{--                Price Filter For Big Device--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus g-mb-0">
                                                        <button type="button"
                                                                class="btn btn-md u-btn-primary rounded-0"
                                                                id="filterPriceBtnBD"
                                                                disabled
                                                                onclick="applyPriceFilter('amount')">
                                                            اعمال
                                                        </button>
                                                        {{--             Hide Tempority Input--}}
                                                        <input class="d-none" type="number" id="MaxPriceTemp">
                                                        <input class="d-none" type="number" id="MinPriceTemp">

                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="amountMaxPriceBD"
                                                            tabindex="9"
                                                            placeholder="بیش ترین"
                                                            onfocus="selectText('saleMaxPriceBD')"
                                                            oninput="filterPriceCheck('amountMinPriceBD', 'amountMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            تا
                                                        </div>
                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="amountMinPriceBD"
                                                            tabindex="10"
                                                            placeholder="کم ترین"
                                                            onfocus="selectText('saleMinPriceBD')"
                                                            oninput="filterPriceCheck('amountMinPriceBD', 'amountMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            از
                                                        </div>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            مبلغ واریز
                                                        </div>
                                                    </div>
                                                    <ul id="product_list" class="ajaxDropDown"></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>

                    {{-- Table --}}
                    <div class="g-pb-15">
                        @if ($amountTable->count()!==0)
                            <h6 style="direction: rtl"
                                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                <i class="fa fa-hand-o-right g-font-size-18"></i>
                                <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                            </h6>
                        @endif
                        @if ($amountTable->count()===0)
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
                                        <th class="align-middle text-center text-nowrap focused rtlPosition">تاریخ
                                            واریز
                                        </th>
                                        <th class="align-middle text-center text-nowrap">ساعت واریز</th>
                                        <th class="align-middle text-center text-nowrap">مبلغ واریز<span
                                                class="g-font-size-10 g-mr-3">(تومان)</span>
                                        </th>
                                        <th class="align-middle text-center text-nowrap">شماره کارت</th>
                                        <th class="align-middle text-center text-nowrap">کد تراکنش</th>
                                        <th class="align-middle text-center">توضیحات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($amountTable as $key => $rec)
                                        <tr>
                                            <td class="align-middle text-nowrap text-center">{{ $amountPersianDate[$key][0].'/'.$amountPersianDate[$key][1].'/'.$amountPersianDate[$key][2] }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->Time }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ number_format($rec->Amount) }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->CardNumber }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->TransactionCode }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->Detail }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{-- End Table --}}
                    </div>

                    <div class="g-mt-60 g-brd-around g-brd-gray-light-v1">
                        <form action="{{ route('amountPay')}}" method="post" id="formPay"
                              enctype='multipart/form-data'>
                            @csrf
                            <input type="hidden" name="sellerId" value="{{$sellerInfo->id}}">
                            <div style="direction: rtl" class="d-flex g-pt-20 g-pb-0 g-px-20">
                                <div class="input-group col-sm-4 force-col-12 g-mb-5 g-px-5">
                                <span style="border-right: 1px solid lightgrey; width: 30%"
                                      class="input-group-addon g-bg-gray-light-v5 g-brd-left-none">مبلغ پرداختی</span>
                                    <input id="paymentAmount" class="form-control form-control-md rounded-0 text-center"
                                           type="text" name="amount" oninput="addComa($(this))" placeholder="تومان">
                                </div>
                                <div class="input-group col-sm-4 force-col-12 g-mb-5 g-px-5">
                                <span style="border-right: 1px solid lightgrey; width: 30%"
                                      class="input-group-addon g-bg-gray-light-v5 g-brd-left-none">تاریخ تراکنش</span>
                                    <input id="paymentAmount" class="form-control form-control-md g-brd-left-none rounded-0 text-center"
                                           type="text" name="day" placeholder="روز">
                                    <input id="paymentAmount" class="form-control form-control-md g-brd-left-none rounded-0 text-center"
                                           type="text" name="mon" placeholder="ماه">
                                    <input id="paymentAmount" class="form-control form-control-md rounded-0 text-center"
                                           type="text" name="year" placeholder="سال">
                                </div>
                                <div class="input-group col-sm-4 force-col-12 g-mb-5 g-px-5">
                                <span style="border-right: 1px solid lightgrey; width: 30%"
                                      class="input-group-addon g-bg-gray-light-v5 g-brd-left-none">ساعت تراکنش</span>
                                    <input id="paymentAmount" class="form-control form-control-md g-brd-left-none rounded-0 text-center"
                                           type="text" name="second" placeholder="ثانیه">
                                    <input id="paymentAmount" class="form-control form-control-md g-brd-left-none rounded-0 text-center"
                                           type="text" name="minute" placeholder="دقیقه">
                                    <input id="paymentAmount" class="form-control form-control-md rounded-0 text-center"
                                           type="text" name="hour" placeholder="ساعت">
                                </div>
                            </div>
                            <div style="direction: rtl" class="d-flex g-pb-20 g-pt-10 g-px-20 g-pb-20 g-mb-10">
                                <div class="input-group col-sm-4 force-col-12 g-mb-5 g-px-5">
                                <span style="border-right: 1px solid lightgrey; width: 30%"
                                      class="input-group-addon g-bg-gray-light-v5 g-brd-left-none">توضیحات</span>
                                    <input class="form-control form-control-md rounded-0 text-center" type="text"
                                           value="--" name="detail">
                                </div>
                            </div>
                        </form>
                        <button onclick="confirmPay()"
                                class="btn btn-md u-btn-primary rounded-0 g-ml-25 g-mb-25">
                            ثبت مبلغ پرداختی
                        </button>
                    </div>
                    {{-- Pagination --}}
                    {{ $amountTable->links('General.Pagination', ['result' => $amountTable]) }}
                </div>
            </div>

            <!--فاکتور-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--4" role="tabpanel">
                <div style="padding-bottom: 120px" class="container">
                    {{-- Total Info--}}
                    <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">

                            <h3 class="h6 g-color-white mb-3">فاکتورهای فروش امروز</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $saleSum['todayOrder'] }}</span>عدد </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">

                            <h3 class="h6 g-color-white mb-3">فاکتورهای فروش در طول یک ماه</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $saleSum['monthOrder'] }}</span>عدد </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">

                            <h3 class="h6 g-color-white mb-3">تعداد کل فاکتورهای فروش</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $saleSum['allOrder'] }}</span>عدد </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">

                            <h3 class="h6 g-color-white mb-3">کل درآمد حاصل از فاکتورهای فروش</h3>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($saleSum['totalSaleAmount']) }}</span>تومان </span>
                        </div>
                        <!-- End Icon Blocks -->
                    </div>

                    {{-- Filters --}}
                    <div id="accordion-13" class="u-accordion u-accordion-color-primary" role="tablist"
                         aria-multiselectable="true">
                        <!-- Card -->
                        <div class="card g-brd-none rounded-0 g-mb-15">
                            <div id="accordion-13-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                                <h5 class="mb-0">
                                    <a
                                        class="d-block g-color-gray-light-v3 g-bg-gray-dark-v3 g-text-underline--none--hover g-brd-around g-brd-gray-dark-v5 g-rounded-0 g-pa-10-15 g-font-size-16 collapsed"
                                        href="#accordion-13-body-01" data-toggle="collapse" data-parent="#accordion-13"
                                        aria-expanded="false" aria-controls="accordion-13-body-01">
                                      <span class="u-accordion__control-icon g-mr-10">
                                        <i class="fa fa-angle-down"></i>
                                        <i class="fa fa-angle-up"></i>
                                      </span>
                                        فیلترها<i class="fa fa-sliders g-ml-5"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="accordion-13-body-01" class="collapse g-bg-gray-dark-v2" role="tabpanel"
                                 aria-labelledby="accordion-13-heading-01">
                                <div class="u-accordion__body g-color-gray-dark-v5 p-0 pt-2">
                                    <div class="m-0 p-0">
                                        <div
                                            class="g-pr-10 g-pl-10 g-mb-0 g-pt-20 g-mb-25">
                                            <div class="rowSeller">
                                                {{--                    Name Filter--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                                        <input style="direction: rtl"
                                                               class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 pl-0 text-right g-font-size-16"
                                                               type="text" id="saleProduct_search"
                                                               tabindex="1"
                                                               placeholder=""
                                                               value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0 w-50">
                                                            براساس نام
                                                        </div>
                                                    </div>
                                                    <ul id="saleName" class="ajaxDropDown"></ul>
                                                </div>

                                                {{--                    Gender Filter--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            name="brand"
                                                            tabindex="2"
                                                            id="saleGender">
                                                            <option
                                                                value="">همه
                                                            </option>
                                                            <option value="0">زنانه</option>
                                                            <option value="1">مردانه</option>
                                                            <option value="2">نوزادی</option>
                                                            <option value="3">دخترانه</option>
                                                            <option value="4">پسرانه</option>
                                                        </select>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0 w-50">
                                                            براساس جنسیت
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--                Date Calender Filter For Big Device--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus g-mb-0">

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startYearBD"
                                                            tabindex="5">
                                                            <option value="">سال</option>
                                                            <option value="1399">1399</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startMonBD"
                                                            tabindex="4">
                                                            <option value="">ماه</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="startDayBD"
                                                            tabindex="3">
                                                            <option value="">روز</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
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

                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            از
                                                        </div>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            محدوده تاریخ فاکتور
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group g-mb-20 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus">
                                                        <button type="button"
                                                                class="btn btn-md u-btn-primary rounded-0"
                                                                id="filterDateBtnBD"
                                                                disabled
                                                                onclick="applyDateFilter('sale', 'startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD')">
                                                            اعمال
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-md u-btn-orange rounded-0"
                                                                id="ResetDateBtnBD"
                                                                disabled
                                                                onclick="resetDate('startDayBD', 'startMonBD', 'startYearBD', 'endDayBD', 'endMonBD', 'endYearBD', 'ResetDateBtnBD')">
                                                            از نو
                                                        </button>
                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endYearBD"
                                                            tabindex="8">
                                                            <option value="">سال</option>
                                                            <option value="1399">1399</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endMonBD"
                                                            tabindex="7">
                                                            <option value="">ماه</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>

                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            id="endDayBD"
                                                            tabindex="6">
                                                            <option value="">روز</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
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

                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4  rounded-0">
                                                            تا
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--                Price Filter For Big Device--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus g-mb-0">
                                                        <button type="button"
                                                                class="btn btn-md u-btn-primary rounded-0"
                                                                id="filterPriceBtnBD"
                                                                disabled
                                                                onclick="applyPriceFilter('sale')">
                                                            اعمال
                                                        </button>
                                                        {{--             Hide Tempority Input--}}
                                                        <input class="d-none" type="number" id="MaxPriceTemp">
                                                        <input class="d-none" type="number" id="MinPriceTemp">

                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="saleMaxPriceBD"
                                                            tabindex="9"
                                                            placeholder="بیش ترین"
                                                            onfocus="selectText('saleMaxPriceBD')"
                                                            oninput="filterPriceCheck('saleMinPriceBD', 'saleMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            تا
                                                        </div>
                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="saleMinPriceBD"
                                                            tabindex="10"
                                                            placeholder="کم ترین"
                                                            onfocus="selectText('saleMinPriceBD')"
                                                            oninput="filterPriceCheck('saleMinPriceBD', 'saleMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            از
                                                        </div>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            مبلغ فاکتور
                                                        </div>
                                                    </div>
                                                    <ul id="product_list" class="ajaxDropDown"></ul>
                                                </div>

                                                {{--                    Data Mistake Filters--}}
                                                <div
                                                    class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5 g-mr-15 g-ml-15 smallDevice w-100">
                                                    <label style="direction: rtl"
                                                           class="g-color-gray-light-v1 align-self-center">مشخصات</label>
                                                </div>
                                                <div
                                                    class="btn-group justified-content text-center col-lg-6 mx-auto g-mb-20">
                                                    <label class="u-check m-0"
                                                           tabindex="11">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                               name="mistak"
                                                               type="radio" id="false"
                                                               onclick="trueInfo('saleInfoStatus')">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v3 g-color-primary--hover g-color-white--checked g-bg-primary--checked rounded-0">اشتباه</span>
                                                    </label>
                                                    <label class="u-check m-0"
                                                           tabindex="12">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                               name="mistak"
                                                               type="radio" id="true"
                                                               onclick="trueInfo('saleInfoStatus')">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v3 g-color-primary--hover g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">صحیح</span>
                                                    </label>
                                                    <label class="u-check m-0" style="pointer-events: none">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v1 g-brd-left-none--md rounded-0">مشخصات</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                    </div>

                    {{-- Table --}}
                    <div class="g-pb-15">

                        @if ($saleTable->count()!==0)
                            <h6 style="direction: rtl"
                                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                <i class="fa fa-hand-o-right g-font-size-18"></i>
                                <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                            </h6>
                        @endif
                        @if ($saleTable->count()===0)
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
                                        <th class="align-middle text-center focused rtlPosition">کد محصول</th>
                                        <th class="align-middle text-center">نام</th>
                                        <th class="align-middle text-center">جنسیت</th>
                                        <th class="align-middle text-center">تعداد</th>
                                        <th class="align-middle text-center text-nowrap">مبلغ فاکتور<span
                                                class="g-font-size-10 g-mr-3">(تومان)</span>
                                        </th>
                                        <th class="align-middle text-center">تاریخ</th>
                                        <th class="align-middle text-center text-nowrap">شماره فاکتور</th>
                                        <th class="align-middle text-center text-nowrap">موبایل خریدار</th>
{{--                                        <th class="align-middle text-center text-nowrap">گیرنده</th>--}}
                                        <th class="align-middle text-center">روش ارسال</th>
                                        <th class="align-middle text-center">عکس</th>
                                        <th class="align-middle text-center">جزییات</th>
                                        <th class="align-middle text-center">مشخصات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($saleTable as $key => $rec)
                                        <tr>
                                            <td class="align-middle text-nowrap text-center text-nowrap">{{ $rec->pDetailID }}</td>
                                            <td class="align-middle text-nowrap text-center text-nowrap">{{ $rec->Name }}</td>

                                            @if($rec->Gender == 'زنانه')
                                                <td class="align-middle text-center">زنانه</td>
                                            @elseif($rec->Gender == 'مردانه')
                                                <td class="align-middle text-center">مردانه</td>
                                            @elseif($rec->Gender == 'دخترانه')
                                                <td class="align-middle text-center">دخترانه</td>
                                            @elseif($rec->Gender == 'پسرانه')
                                                <td class="align-middle text-center">پسرانه</td>
                                            @elseif($rec->Gender == 'نوزادی دخترانه')
                                                <td class="align-middle text-center">نوزادی دخترانه</td>
                                            @else
                                                <td class="align-middle text-center">نوزادی پسرانه</td>
                                            @endif

                                            <td class="align-middle text-center">{{ $rec->Qty }}</td>
                                            <td class="align-middle text-center">{{ number_format($rec->FinalPrice * $rec->Qty) }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2] }}</td>
                                            <td class="align-middle text-center">{{ $rec->orderID.'/'.$rec->orderDetailID }}</td>
                                            <td class="align-middle text-center">{{ $rec->customerMobile }}</td>
{{--                                            <td class="align-middle text-center">{{ $rec->ReceiverName.' '.$rec->ReceiverFamily }}</td>--}}
                                            <td class="align-middle text-center text-nowrap">{{ $rec->PostMethod }}</td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                                         src="{{ $rec->PicPath.$rec->PicNumber }}.jpg" alt="">
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a style="cursor: pointer"
                                                   href="{{ route('adminOrderDetail',['addressId'=>$rec->AddressID, 'id'=>$rec->orderDetailID]) }}"
                                                   class="g-color-gray-light-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                                   data-toggle="tooltip"
                                                   data-placement="top" data-original-title="مشاهده جزئیات فاکتور">
                                                    <i class="fa fa-eye g-font-size-18"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if (isset($rec->fpID))
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="حاوی اشتباه">
                                                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                                    </a>
                                                @else
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="صحیح">
                                                        <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{-- End Table --}}
                    </div>

                    {{-- Pagination --}}
                    {{ $saleTable->links('General.Pagination', ['result' => $saleTable]) }}
                </div>
            </div>

            <!--انبار-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--5" role="tabpanel">
                <!-- End Info Panel -->

                <div class="container g-pb-100">
                    {{--                        Total Info--}}
                    <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">تعداد کل محصولات موجود در انبار</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['allQty'] }}</span>عدد </span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div style="direction: rtl"
                             class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">تعداد محصولات به تفکیک جنسیت</h3>
                            <span class="u-label g-bg-bluegray g-mb-5">زنانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['female'] }}</span>عدد</span>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">مردانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['male'] }}</span>عدد</span>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">دخترانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['girl'] }}</span>عدد</span>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">پسرانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['boy'] }}</span>عدد</span>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">نوزادی دخترانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['babyGirl'] }}</span>عدد</span>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">نوزادی پسرانه<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ $storeSum['babyBoy'] }}</span>عدد</span>
                        </div>
                        <!-- End Icon Blocks -->

                        <!-- Icon Blocks -->
                        <div
                            class="col-lg-4 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                            <h3 class="h6 g-color-white mb-3">ارزش کل محصولات موجود در انبار</h3>
                            <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                                    class="g-mr-5 g-ml-5 g-color-aqua">{{ number_format($storeSum['sumFPrice']) }}</span>تومان </span>
                        </div>
                        <!-- End Icon Blocks -->
                    </div>

                    {{--                     Filters--}}
                    <div id="accordion-12" class="u-accordion u-accordion-color-primary" role="tablist"
                         aria-multiselectable="true">
                        <!-- Card -->
                        <div class="card g-brd-none rounded-0 g-mb-15">
                            <div id="accordion-12-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                                <h5 class="mb-0">
                                    <a
                                        class="d-block g-color-gray-light-v3 g-bg-gray-dark-v3 g-text-underline--none--hover g-brd-around g-brd-gray-dark-v5 g-rounded-0 g-pa-10-15 g-font-size-16 collapsed"
                                        href="#accordion-12-body-01" data-toggle="collapse" data-parent="#accordion-12"
                                        aria-expanded="false" aria-controls="accordion-12-body-01">
                                      <span class="u-accordion__control-icon g-mr-10">
                                        <i class="fa fa-angle-down"></i>
                                        <i class="fa fa-angle-up"></i>
                                      </span>
                                        فیلترها<i class="fa fa-sliders g-ml-5"></i>
                                    </a>
                                </h5>
                            </div>
                            <div id="accordion-12-body-01" class="collapse g-bg-gray-dark-v2" role="tabpanel"
                                 aria-labelledby="accordion-12-heading-01">
                                <div class="u-accordion__body g-color-gray-dark-v5 p-0 pt-2">
                                    <div class="m-0 p-0">
                                        <div class="g-pr-10 g-pl-10 g-mb-0 g-pt-20 g-mb-25">
                                            <div class="rowSeller">
                                                {{--                                                                    Name Filter--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                                        <input style="direction: rtl"
                                                               class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 pl-0 text-right g-font-size-16"
                                                               type="text" name="productSearch" id="storeProduct_search"
                                                               placeholder=""
                                                               value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0 w-50">
                                                            براساس نام
                                                        </div>
                                                    </div>
                                                    <ul id="storeName" class="ajaxDropDown"></ul>
                                                </div>

                                                {{--                                                                    Gender Filter--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto">
                                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                                        <select
                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-dark-v3 g-color-gray-light-v4"
                                                            name="brand"
                                                            id="storeGender">
                                                            <option
                                                                value="">همه
                                                            </option>
                                                            <option value="زنانه">زنانه</option>
                                                            <option value="مردانه">مردانه</option>
                                                            <option value="دخترانه">دخترانه</option>
                                                            <option value="پسرانه">پسرانه</option>
                                                            <option value="نوزادی دخترانه">نوزادی دخترانه</option>
                                                            <option value="نوزادی پسرانه">نوزادی پسرانه</option>
                                                        </select>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center  g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0 w-50">
                                                            براساس جنسیت
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--                                                                Price Filter For Big Device--}}
                                                <div class="form-group g-mb-10 text-right col-lg-6 mx-auto bigDevice">
                                                    <div class="input-group g-brd-primary--focus g-mb-0">
                                                        <button type="button"
                                                                class="btn btn-md u-btn-primary rounded-0"
                                                                id="filterPriceBtnBD"
                                                                disabled
                                                                onclick="applyPriceFilter('store')">
                                                            اعمال
                                                        </button>
                                                        {{--                                                                     Hide Tempority Input--}}
                                                        <input class="d-none" type="number" id="MaxPriceTemp">
                                                        <input class="d-none" type="number" id="MinPriceTemp">

                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="storeMaxPriceBD"
                                                            placeholder=""
                                                            onfocus="selectText('storeMaxPriceBD')"
                                                            oninput="filterPriceCheck('storeMinPriceBD', 'storeMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            تا
                                                        </div>
                                                        <input
                                                            class="form-control form-control-md rounded-0 text-center g-font-size-16 g-bg-gray-dark-v2 g-color-gray-light-v4"
                                                            type="text"
                                                            id="storeMinPriceBD"
                                                            placeholder=""
                                                            onfocus="selectText('storeMinPriceBD')"
                                                            oninput="filterPriceCheck('storeMinPriceBD', 'storeMaxPriceBD', 'filterPriceBtnBD')"
                                                            value="">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            از
                                                        </div>
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-gray-dark-v2 g-color-gray-light-v4 rounded-0">
                                                            قیمت پایه
                                                        </div>
                                                    </div>
                                                    <ul id="product_list" class="ajaxDropDown"></ul>
                                                </div>

                                                {{--                                                                    Data Mistake Filters--}}
                                                <div
                                                    class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5 g-mr-15 g-ml-15 smallDevice w-100">
                                                    <label style="direction: rtl"
                                                           class="g-color-gray-light-v1 align-self-center">مشخصات</label>
                                                </div>
                                                <div
                                                    class="btn-group justified-content text-center col-lg-6 mx-auto g-mb-20">
                                                    <label class="u-check m-0">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                               name="mistak"
                                                               type="radio" id="false"
                                                               onclick="trueInfo('storeInfoStatus')">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v3 g-color-primary--hover g-color-white--checked g-bg-primary--checked rounded-0">اشتباه</span>
                                                    </label>
                                                    <label class="u-check m-0">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                               name="mistak"
                                                               type="radio" id="true"
                                                               onclick="trueInfo('storeInfoStatus')">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v3 g-color-primary--hover g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">صحیح</span>
                                                    </label>
                                                    <label class="u-check m-0" style="pointer-events: none">
                                                        <span
                                                            class="btn btn-lg btn-block u-btn-outline-lightgray g-color-gray-light-v1 g-brd-left-none--md rounded-0">مشخصات</span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                    </div>

                    {{--                     Table--}}
                    <div class="g-pb-15">
                        <h3 class="card-header g-bg-gray-dark-v3 g-brd-around g-brd-gray-dark-v5 g-color-gray-light-v3 g-font-size-16 rounded-0 g-mb-5 text-right">
                            لیست موجودی انبار<i class="icon-real-estate-079 u-line-icon-pro g-font-size-22 g-ml-5"></i>
                        </h3>
                        @if ($storeTable->count()!==0)
                            <h6 style="direction: rtl"
                                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                                <i class="fa fa-hand-o-right g-font-size-18"></i>
                                <span class="g-font-size-13 g-mr-5">جدول را به سمت راست بکشید.</span>
                            </h6>
                        @endif
                        @if ($storeTable->count()===0)
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
                                        <th class="align-middle text-center focused rtlPosition">کد محصول</th>
                                        <th class="align-middle text-center focused">نام</th>
                                        <th class="align-middle text-center">جنسیت</th>
                                        <th class="align-middle text-center">سایز</th>
                                        <th class="align-middle text-center">رنگ</th>
                                        <th class="align-middle text-center">موجودی</th>
                                        <th class="align-middle text-center text-nowrap">قیمت فروش<span
                                                class="g-font-size-10 g-mr-3">(تومان)</span>
                                        </th>
                                        <th class="align-middle text-center">عکس</th>
                                        <th class="align-middle text-center">جزییات</th>
                                        <th class="align-middle text-center">مشخصات</th>
                                        <th class="align-middle text-center">تغییرات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($storeTable as $rec)
                                        <tr>
                                            <td class="align-middle text-nowrap text-center g-color-gray-light-v3">{{ $rec->pDetailID }}</td>
                                            <td class="align-middle text-nowrap text-center g-color-gray-light-v3">{{ $rec->Name }}</td>

                                            @if($rec->Gender == 'زنانه')
                                                <td class="align-middle text-center g-color-gray-light-v3">زنانه</td>
                                            @elseif($rec->Gender == 'مردانه')
                                                <td class="align-middle text-center g-color-gray-light-v3">مردانه</td>
                                            @elseif($rec->Gender == 'دخترانه')
                                                <td class="align-middle text-center g-color-gray-light-v3">دخترانه</td>
                                            @elseif($rec->Gender == 'پسرانه')
                                                <td class="align-middle text-center g-color-gray-light-v3">پسرانه</td>
                                            @elseif($rec->Gender == 'نوزادی دخترانه')
                                                <td class="align-middle text-center g-color-gray-light-v3">نوزادی
                                                    دخترانه
                                                </td>
                                            @else
                                                <td class="align-middle text-center g-color-gray-light-v3">نوزادی
                                                    پسرانه
                                                </td>
                                            @endif

                                            <td class="align-middle text-center g-color-gray-light-v3">{{ $rec->Size }}</td>
                                            <td class="align-middle text-center text-nowrap g-color-gray-light-v3">{{ $rec->Color }}</td>
                                            <td class="align-middle text-center g-color-gray-light-v3">{{ $rec->Qty }}</td>
                                            <td class="align-middle text-center g-color-gray-light-v3">{{ number_format($rec->FinalPrice) }}</td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                                         src="{{ $rec->PicPath.$rec->PicNumber }}.jpg"
                                                         alt="Image Description">
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a
                                                    href="{{ route('adminSellerProductDetail',['id'=>$rec->pDetailID]) }}"
                                                    class="g-color-gray-light-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                                    data-toggle="tooltip"
                                                    data-placement="top" data-original-title="مشاهده جزئیات محصول">
                                                    <i class="fa fa-eye g-font-size-18"></i>
                                                </a>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if (isset($rec->fpID))
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="حاوی اشتباه">
                                                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                                                    </a>
                                                @else
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="صحیح">
                                                        <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle text-nowrap text-center">
                                                @if (is_null($rec->orderID))
                                                    <a style="cursor: pointer"
                                                       onclick="productDelete({{$rec->pDetailID}},{{$sellerInfo->id}})"
                                                       class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="حذف محصول">
                                                        <i class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></i>
                                                    </a>
                                                @else
                                                    <a class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                       data-toggle="tooltip"
                                                       data-placement="top" data-original-title="فروخته شد">
                                                        <i class="fa fa-lock g-font-size-22 g-color-gray-light-v3 g-color-primary--hover"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        {{--                         End Table--}}
                    </div>

                    {{--                     Pagination--}}
                    {{ $storeTable->links('General.Pagination', ['result' => $storeTable]) }}
                </div>
            </div>

            <!--اطلاعات مالی-->
            <div class="tab-pane fade" id="nav-4-1-primary-hor-fill--6" role="tabpanel">
                <div id="cardContainer" class="col-12 col-lg-9 g-pt-25 g-pb-40 mx-auto">
                    <!--Basic Table-->
                    <div class="table-responsive">
                        <table style="direction: rtl" class="table table-bordered u-table--v2">
                            <thead class="text-uppercase g-letter-spacing-1">
                            <tr>
                                <th class="g-font-weight-600 g-color-white text-center">ردیف</th>
                                <th class="g-font-weight-600 g-color-white text-center">شماره کارت</th>
                                <th class="g-font-weight-600 g-color-white text-center">وضعیت</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($creditCard as $key =>$row)
                                <tr>
                                    <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                                        {{$key+1}}
                                    </td>

                                    <td class="align-middle text-nowrap text-center g-color-gray-light-v2">
                                        {{$row->CardNumber}}
                                    </td>

                                    <td class="align-middle text-center g-color-gray-light-v2">
                                        @if ($row->Status === 1)
                                            <i class="fa fa-toggle-on g-color-primary g-font-size-22"></i>
                                        @else
                                            @if ($row->Wrong === 0)
                                                <a style="cursor: pointer"
                                                   onclick="cardActiveBtn({{$sellerInfo->id}},{{ $row->ID }})"
                                                   class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-font-size-22"
                                                   data-toggle="tooltip"
                                                   data-placement="top" data-original-title="فعال کردن">
                                                    <i class="fa fa-toggle-off"></i>
                                                </a>
                                            @else
                                                <i data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="شماره کارت اشتباه است"
                                                   class="fa fa-times-circle g-font-size-18 g-color-lightred"></i>
                                            @endif
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

            <!--اطلاعات کاربری-->
            <div class="tab-pane fade show active" id="nav-4-1-primary-hor-fill--7" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <form action="{{route('updateSeller')}}"
                              method="POST"
                              style="direction: rtl"
                              id="sellerForm"
                              disabled=""
                              enctype="multipart/form-data">
                            @csrf
                            <fieldset id="userData" disabled="disabled">
                                <div class="container g-py-30--lg g-px-60--lg">
                                    <input type="hidden" name="id" value="{{$sellerInfo->id}}">
                                    {{--نام--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">نام</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input id="user-name"
                                                   class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   type="text"
                                                   value="{{$sellerInfo->name}}"
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
                                                value="{{$sellerInfo->Family}}"
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
                                                   value="{{$sellerInfo->email}}"
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
                                                value="{{$sellerInfo->NationalID}}"
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
                                                        value="{{substr($sellerInfo->Birthday,8,2)}}">{{substr($sellerInfo->Birthday,8,2)}}</option>
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
                                                        value="{{substr($sellerInfo->Birthday,5,2)}}">{{substr($sellerInfo->Birthday,5,2)}}</option>
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
                                                        value="{{substr($sellerInfo->Birthday,0,4)}}">{{substr($sellerInfo->Birthday,0,4)}}</option>
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
                                                <label class="u-check col-md-6 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($sellerInfo->Gender===0 ? 'checked':'')}}
                                                           value="0">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                                </label>
                                                <label class="u-check col-md-6 g-pa-0">
                                                    <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                                           name="gender"
                                                           type="radio"
                                                           {{($sellerInfo->Gender===1 ? 'checked':'')}}
                                                           value="1">
                                                    <span style="color: #555"
                                                          class="btn btn-md btn-block g-brd-white g-bg-gray-dark-v2 g-color-gray-light-v4 g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
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
                                                value="{{substr($sellerInfo->Phone,3,8)}}"
                                                placeholder="xxxxxxxx"
                                            >
                                            <input
                                                style="direction: ltr"
                                                id="phonePreNumber"
                                                name="prePhone"
                                                class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16 g-brd-right-none"
                                                maxlength="3"
                                                value="{{substr($sellerInfo->Phone,0,3)}}"
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
                                                   value="{{$sellerInfo->Mobile}}"
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
                                                <input id="state" class="d-none" value="{{$sellerInfo->State}}">
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
                                                <input id="city" class="d-none" value="{{$sellerInfo->City}}">
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

                                    {{--آدرس سکونت --}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">آدرس
                                            سکونت</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input id="homeAddress"
                                                   class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   type="text"
                                                   value="{{$sellerInfo->HomeAddress}}"
                                                   name="homeAddress"
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

                                    {{--کد پستی سکونت--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                            پستی سکونت</label>
                                        <div dir="ltr" class="col-sm-9 force-col-12">
                                            <input
                                                class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="homePostalCode"
                                                name="homePostalCode"
                                                value="{{$sellerInfo->HomePostalCode}}"
                                                maxlength="10"
                                                placeholder="فقط اعداد"
                                            >
                                        </div>
                                    </div>

                                    {{--آدرس کار --}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-3 col-form-label align-self-center text-right">آدرس محل
                                            کار</label>
                                        <div class="col-sm-9 force-col-12">
                                            <input id="workAddress"
                                                   class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                   type="text"
                                                   value="{{$sellerInfo->Address}}"
                                                   name="workAddress"
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

                                    {{--کد پستی محل کار--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                            پستی محل کار</label>
                                        <div dir="ltr" class="col-sm-9 force-col-12">
                                            <input
                                                class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="workPostalCode"
                                                name="workPostalCode"
                                                value="{{$sellerInfo->WorkPostalCode}}"
                                                maxlength="10"
                                                placeholder="فقط اعداد"
                                            >
                                        </div>
                                    </div>

                                    {{--شماره پلاک محل کار--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">شماره
                                            پلاک محل کار</label>
                                        <div dir="ltr" class="col-sm-9 force-col-12">
                                            <input
                                                class="form-control form-control-md rounded-0 g-bg-gray-dark-v2 g-color-gray-light-v4 g-font-size-16"
                                                id="shopNumber"
                                                name="shopNumber"
                                                value="{{$sellerInfo->ShopNumber}}"
                                                maxlength="10"
                                                placeholder="فقط اعداد"
                                            >
                                        </div>
                                    </div>

                                    {{--تصویر چهره--}}
                                    <div class="form-group row justify-content-center">
                                        <label class="col-sm-3 col-form-label align-self-center text-right">تصویر
                                            چهره و کارت ملی</label>
                                        <div dir="ltr" class="d-flex col-sm-9 force-col-12">
                                            <div class="col-md-4 p-0 g-mr-15">
                                                <a class="js-fancybox" href="{{asset($sellerInfo->PicPath)}}"
                                                   data-fancybox-animate-in="zoomIn" data-fancybox-animate-out="zoomOut"
                                                   data-fancybox-speed="200" data-fancybox-blur-bg="blur"
                                                   data-fancybox-bg="rgba(0,0,0, 1)">
                                                    <img class="img-fluid" src="{{asset($sellerInfo->PicPath)}}"
                                                         alt="Image Description">
                                                </a>
                                            </div>
                                            <div class="col-md-4 p-0">
                                                <a class="js-fancybox" href="{{asset($sellerInfo->PicPathCard)}}"
                                                   data-fancybox-animate-in="zoomIn" data-fancybox-animate-out="zoomOut"
                                                   data-fancybox-speed="200" data-fancybox-blur-bg="blur"
                                                   data-fancybox-bg="rgba(0,0,0, 1)">
                                                    <img class="img-fluid" src="{{asset($sellerInfo->PicPathCard)}}"
                                                         alt="Image Description">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <input class="d-none" type="text" name="userImage"
                                           value="{{$sellerInfo->PicPath}}">
                                    <input class="d-none" type="text" name="nationalityCardImage"
                                           value="{{$sellerInfo->PicPathCard}}">
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
