@extends('Layouts.IndexDelivery')
@section('Content')
    <div class="container-fluid g-mt-30">
        <div style="direction: rtl">
            <div id="accordion-01" role="tablist" aria-multiselectable="true">
                <!-- Card -->
                <div class="card g-mb-5 rounded-0">
                    <div id="accordion-01-heading-01" class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="d-block u-link-v5 g-color-main g-color-primary--hover" href="#accordion-01-body-01" data-toggle="collapse" data-parent="#accordion-01" aria-expanded="true" aria-controls="accordion-01-body-01">پیک مسئول <span class="g-color-primary">نجات اندیمه</span></a>
                        </h5>
                    </div>
                    <div id="accordion-01-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-01-heading-01">
                        <div class="card-block">
                            <!-- Table Schedule -->
                            <div class="table-responsive">
                                <table style="direction: rtl" class="table table-bordered table-hover table-inverse u-table--v2 text-center text-uppercase g-col-border-side-0">
                                    <thead>
                                    <tr class="g-bg-primary g-col-border-top-0">
                                        <th class="g-brd-white-opacity-0_1">ردیف</th>
                                        <th class="g-brd-white-opacity-0_1">نام محصول</th>
                                        <th class="g-brd-white-opacity-0_1">مدل</th>
                                        <th class="g-brd-white-opacity-0_1">سایز</th>
                                        <th class="g-brd-white-opacity-0_1">رنگ</th>
                                        <th class="g-brd-white-opacity-0_1">کد محصول</th>
                                        <th class="g-brd-white-opacity-0_1">کد فاکتور</th>
                                        <th class="g-brd-white-opacity-0_1">آدرس دقیق</th>
                                        <th class="g-brd-white-opacity-0_1">اولویت رسیدگی</th>
                                        <th class="g-brd-white-opacity-0_1">تصویر محصول</th>
                                        <th class="g-brd-white-opacity-0_1">تصویر فرد</th>
                                        <th class="g-brd-white-opacity-0_1">تاییدیه</th>
                                    </tr>
                                    </thead>

                                    <tbody class="g-font-size-12 g-color-white-opacity-0_5 g-font-weight-600">
                                    @foreach($data as $key => $row)
                                        <tr id="row{{$key}}">
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$key+1}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->Name}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->Model}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->Size}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->Color}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->ProductID.'/'.$row->ProductDetailID}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->OrderId.'/'.$row->OrderDetailID}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$row->Address.' پلاک '.$row->ShopNumber}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span class="g-color-white">{{$key}}</span>
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <img class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                                                     src="{{ $row->productPicPath.$row->PicNumber }}.jpg" title="{{ $row->Color }}" alt="Image Description">
                                            </td>
                                            <td class="g-brd-white-opacity-0_1 align-middle">
                                                <img class="d-flex g-width-60 g-my-10 g-height-60 mx-auto"
                                                     src="{{ $row->sellerPic }}" alt="Image Description">
                                            </td>
                                            <td style="direction: ltr" class="g-brd-white-opacity-0_1 align-middle">
                                                <div id="signatureDiv{{$key}}" class="col-9 d-inline-block">
                                                    <div class="input-group">
                                                      <span class="input-group-btn">
                                                        <button class="btn u-btn-primary rounded-0" onclick="courierDelivery({{$row->OrderDetailID}}, {{$key}})" type="button"><i class="fa fa-check align-middle g-font-size-16"></i></button>
                                                      </span>
                                                        <input id="pass{{$key}}" type="password" onclick="this.select();" class="form-control form-control-md rounded-0" placeholder="رمز امضاء">
                                                        <span id="sellerID{{$key}}" class="d-none">{{$row->SellerID}}</span>
                                                    </div>
                                                </div>

                                                <i id="waitingIconTd{{$key}}"
                                                   class="d-none fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>

                                                <svg id="checkMark{{$key}}" class="d-none checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                </svg>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table Schedule -->
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card g-mb-5 rounded-0">
                    <div id="accordion-01-heading-02" class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover" href="#accordion-01-body-02" data-toggle="collapse" data-parent="#accordion-01" aria-expanded="false" aria-controls="accordion-01-body-02">برگشتی</a>
                        </h5>
                    </div>
                    <div id="accordion-01-body-02" class="collapse" role="tabpanel" aria-labelledby="accordion-01-heading-02">
                        <div class="card-block">

                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card g-mb-5 rounded-0">
                    <div id="accordion-01-heading-03" class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="collapsed d-block u-link-v5 g-color-main g-color-primary--hover" href="#accordion-01-body-03" data-toggle="collapse" data-parent="#accordion-01" aria-expanded="false" aria-controls="accordion-01-body-03">سبد من</a>
                        </h5>
                    </div>
                    <div id="accordion-01-body-03" class="collapse" role="tabpanel" aria-labelledby="accordion-01-heading-03">
                        <div class="card-block">

                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

@endsection
