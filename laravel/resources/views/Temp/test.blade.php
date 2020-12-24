@extends('Layouts.IndexCustomer')
@section('Content')

        <!--Basic Table-->
        <div class="table-responsive">
            <table style="direction: rtl" class="table table-bordered u-table--v2">
                <thead>
                <tr>
                    <th class="text-center">ردیف</th>
                    <th class="text-center">کد محصول</th>
                    <th class="text-center">نام محصول</th>
                    <th class="text-center">رنگ</th>
                    <th class="text-center">سایز</th>
                    <th class="text-center">تعداد</th>
                    <th class="text-center">قیمت واحد</th>
                    <th class="text-center">{{ $row->Discount.'%' }}با تخفیف</th>
                    <th class="text-center">عکس</th>
                </tr>
                </thead>

                <tbody>
                @foreach($data as $key =>$row)
                    <tr>
                        <td class="align-middle text-nowrap text-center">
                                            <span class="g-pa-5">
                                                {{ $key+1 }}
                                            </span>
                        </td>
                        <td class="align-middle text-nowrap text-center">
                                            <span id="productDetailID{{$key}}" class="g-pa-5">
                                                {{ $row->ProductDetailID }}
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Name }}
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Color }}
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ $row->Size }}
                                            </span>
                        </td>
                        <td class="align-middle text-nowrap text-center">
                                            <span id="orderQty{{$key}}" class="g-pa-5">
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ number_format($row->UnitPrice) }}
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                {{ number_format($row->FinalPrice) }}
                                            </span>
                        </td>
                        <td class="align-middle text-center">
                                            <span class="g-pa-5">
                                                 <img class="g-width-80 g-height-80"
                                                      src="{{ asset($row->PicPath.'pic1.jpg') }}"
                                                      alt="Image Description">
                                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--End Basic Table-->

@endsection

