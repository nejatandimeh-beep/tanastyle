@extends('Layouts.IndexSeller')
@section('Content')

    <!-- Delete Product Msg -->
    @if(session()->has('status'))
        <div class="modal fade" id="overlay">
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
                        <p style="direction: rtl">پیام شما با موفقیت ارسال شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- End Delete Product Msg -->

    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>ارتباط با مرکز
        </h3>
    </div>
    <!-- End Info Panel -->

    <div class="container customBox">
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
                        <i class="icon-bubble g-font-size-25"></i>
                    </a>
                    <h6 class="g-color-black mb-0">ایجاد گفتگو</h6>
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
                        <div class="modal-header">
                            <h4>ایجاد گفتگو جدید</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="hs-icon hs-icon-close"></i>
                            </button>
                        </div>
                        <form action="{{ route('adminConnectionNew')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            {{--                            Hidden input--}}
                            <div style="direction: rtl" class="modal-body g-pr-10 g-pl-10">
                                <div class="form-group row g-mb-25">
                                    <div class="input-group col-sm-10 force-col-12 mx-auto">
                            <span style="border-right: 1px solid lightgrey"
                                  class="input-group-addon g-bg-gray-light-v5 g-brd-left-none w-25">عنوان گفتگو</span>
                                        <input
                                            class="form-control form-control-md rounded-0 g-color-darkblue g-font-size-16"
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
                                        class="input-group-addon g-bg-gray-light-v5 g-brd-left-none g-pa-10 w-25">اولویت</span>
                                        <select style="height: 100%"
                                                class="form-control form-control-md custom-select rounded-0 text-right g-font-size-16 g-height-70 g-pr-25"
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
                                  class="input-group-addon g-bg-gray-light-v5 g-brd-left-none g-pa-10 w-25">بخش مربوطه</span>
                                        <select style="height: 100%"
                                                class="form-control form-control-md custom-select rounded-0 text-right g-font-size-16 g-height-70 g-pr-25"
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
            <h3 style="direction: rtl"
                class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                لیست گفتگوها
            </h3>
            @if ($data->count()!==0)
                <h6 style="direction: rtl"
                    class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                    <i class="fa fa-hand-o-right g-font-size-18"></i>
                    <span class="g-font-size-13">جدول را به سمت راست بکشید.
                </span>
                </h6>
            @endif

            @if ($data->count()===0)
            <!-- Danger Alert -->
                <div style="direction: rtl" class="alert alert-danger alert-dismissible fade show" role="alert">
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
                            <th class="align-middle text-center text-nowrap focused rtlPosition">عنوان گفتگو</th>
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

                        @foreach($data as $key => $rec)
                            @if (($rec->ConversationID) !== $groupBy)
                                <tr>
                                    <td class="align-middle text-nowrap text-center g-font-weight-600 g-color-darkblue">{{ $rec->Subject }}</td>
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
                                        <td class="align-middle text-center text-nowrap {{ ($rec->Status == 2) ? '' : 'g-color-darkred' }}">
                                            مهم
                                        </td>
                                    @elseif ($rec->Priority === '0')
                                        <td class="align-middle text-center text-nowrap {{ ($rec->Status == 2) ? '' : 'g-color-red' }}">
                                            فوری
                                        </td>
                                    @endif
                                    <td class="align-middle text-center text-nowrap">
                                        {{ $persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2] }}
                                        <p class="g-font-size-13 g-color-primary m-0 p-0">{{ $rec->Time }}</p>
                                    </td>
                                    <td class="align-middle text-center text-nowrap">
                                        <a style="cursor: pointer"
                                           href="{{ route('adminConnectionDetail',['id'=>$rec->ID, 'status'=>$rec->Status])}}"
                                           class="g-color-gray-dark-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                           data-toggle="tooltip"
                                           data-placement="top" data-original-title="مشاهده جزئیات گفتگو">
                                            <i class="fa fa-eye g-font-size-18"></i>
                                        </a>
                                    </td>
                                    @if ($rec->Status === '0')
                                        <td class="align-middle text-center text-nowrap g-color-primary"><i
                                                class="fa fa-check g-ml-5"></i>پیام جدید
                                        </td>
                                    @elseif ($rec->Status === '1')
                                        <td class="align-middle text-center text-nowrap g-color-aqua"><i
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

        {{-- Table --}}
        <div class="g-pb-15">
            <h4 class="text-right g-my-30 g-color-gray-dark-v2">پیام های سیستمی</h4>
            @if ($alarmMsg->count()!==0)
                <h6 style="direction: rtl"
                    class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                    <i class="fa fa-hand-o-right g-font-size-18"></i>
                    <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                </h6>
            @endif

            @if ($alarmMsg->count()===0)
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
                            <th class="align-middle text-center text-nowrap">زمان پیام</th>
                            <th class="align-middle text-center text-nowrap">جزئیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        {{--                                GroupBy Variable Hidden input--}}
                        {{--                        groupBy for grouping msg with one title--}}
                        <input style="display: none" value=" {{ $groupBy = '' }}">

                        @foreach($alarmMsg as $key => $rec)
                            <tr>
                                <td class="align-middle text-nowrap text-center g-font-weight-600 g-color-aqua">{{ $rec->Title }}</td>
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
                                    <td class="align-middle text-center text-nowrap">
                                        مهم
                                    </td>
                                @elseif ($rec->Priority === '0')
                                    <td class="align-middle text-center text-nowrap">
                                        فوری
                                    </td>
                                @endif
                                <td class="align-middle text-center text-nowrap">
                                    <p style="direction: ltr" class="g-font-size-13 g-color-primary m-0 p-0">{{ $rec->Time }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <p class="g-font-size-13 g-color-gray-dark-v2 m-0 p-0">{{ $rec->Message }}</p>
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
        {{--        {{ $data->links('General.Pagination', ['result' => $data]) }}--}}
    </div>
@endsection

