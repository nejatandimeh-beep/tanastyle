@extends('Layouts.IndexAdmin')
@section('Content')
    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <!-- Tab panes -->
        <div style="padding-bottom: 120px" class="container">
            {{-- Table --}}
            <div class="g-pb-15">
                @if ($data->count()!==0)
                    <h6 style="direction: rtl"
                        class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                        <i class="fa fa-hand-o-right g-font-size-18"></i>
                        <span class="g-font-size-13">جدول را به سمت راست بکشید.</span>
                    </h6>
                @endif
                @if ($data->count()===0)
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
                                <th class="align-middle text-center focused rtlPosition">نام فروشنده ساده</th>
                                <th class="align-middle text-center">آخرین پست</th>
                                <th class="align-middle text-center">تعداد تبلیغ(روز)</th>
                                <th class="align-middle text-center">زمان آخرین تبلیغ</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($data as $key => $rec)
                                <tr>
                                    <td class="align-middle text-center">{{$rec->name}}</td>
                                    <td class="align-middle text-center">{{$rec->PostID}}</td>
                                    <td class="align-middle text-center">{{$rec->AdCount}}</td>
                                    <td class="align-middle text-center">{{$rec->Time}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                {{-- End Table --}}
            </div>

            {{-- Pagination --}}
            {{ $data->links('General.Pagination', ['result' => $data]) }}
            <a style="margin-top: 35px" type="button" href="{{route('startAd')}}"
                    class="btn btn-lg u-btn-outline-primary g-font-weight-600 rounded-0 g-font-size-14 g-px-25 g-my-20">
                <i class="icon-bell g-mr-10 g-font-weight-600"></i>شروع تبلیغ
            </a>
        </div>

    </div>
@endsection