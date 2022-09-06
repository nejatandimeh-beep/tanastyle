@extends('Layouts.IndexAdmin')
@section('Content')
    <div class="g-bg-gray-dark-v2 g-color-white g-px-15 g-py-30">
        <!-- Nav tabs -->
        <ul class="nav nav-fill u-nav-v4-1 u-nav-light" role="tablist" data-target="nav-4-1-primary-hor-fill"
            data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-white">
            <li class="nav-item">
                <a class="nav-link" href="{{route('sellerList')}}">فروشندگان</a>
            </li>

            <!--پشتیبانی-->
            <li class="nav-item">
                <a id="sellerSupport" class="nav-link" href="{{route('sellerControlPanel',['id'=>$sellerInfo->id,'tab'=>'support'])}}">
                    پشتیبانی
                </a>
            </li>

            <!--محصولات برگشتی-->
            <li class="nav-item">
                <a id="sellerOrder" class="nav-link g-mb-minus-1" href="{{route('adminSellerReturn',$sellerInfo->id)}}">
                    <span id="deliveryAlarm" class="d-none g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    محصولات برگشتی
                </a>
            </li>

            <!--تحویل محصول-->
            <li class="nav-item">
                <a id="sellerDelivery" class="nav-link g-mb-minus-1" href="{{route('sellerControlPanel',['id'=>$sellerInfo->id,'tab'=>'delivery'])}}">
                    <span id="deliveryAlarm" class="d-none g-mr-10">
                        <i class="fa fa-exclamation-triangle g-font-size-18 g-color-lightred"></i>
                    </span>
                    تحویل محصول
                </a>
            </li>

            <!--مبالغ دریافتی-->
            <li class="nav-item">
                <a id="sellerAmount" class="nav-link" href="{{route('sellerControlPanel',['id'=>$sellerInfo->id,'tab'=>'amount'])}}">
                    مبالغ دریافتی</a>
            </li>

            <!--فاکتور-->
            <li class="nav-item">
                <a id="sellerOrder" class="nav-link g-mb-minus-1" href="{{route('adminSellerSale',$sellerInfo->id)}}">
                    فاکتورهای فروش</a>
            </li>

            <!--انبار-->
            <li class="nav-item">
                <a id="sellerStore" class="nav-link active" data-toggle="tab" href="#nav-4-1-primary-hor-fill--5" role="tab">انبار</a>
            </li>

            <!--اطلاعات مالی-->
            <li class="nav-item">
                <a id="sellerCard" class="nav-link" href="{{route('sellerControlPanel',['id'=>$sellerInfo->id,'tab'=>'cardActive'])}}">اطلاعات
                    مالی</a>
            </li>

            <!--اطلاعات کاربری-->
            <li class="nav-item">
                <a id="sellerInfo" class="nav-link" href="{{route('sellerControlPanel',['id'=>$sellerInfo->id,'tab'=>'user'])}}">اطلاعات
                    کاربری</a>
            </li>
        </ul>

        <div id="nav-4-1-primary-hor-fill" class="tab-content g-pt-40">
            <!--انبار-->
            <div class="tab-pane fade show active" id="nav-4-1-primary-hor-fill--5" role="tabpanel">
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
                                        <th class="align-middle text-center text-nowrap">قیمت پایه</th>
                                        <th class="align-middle text-center">تخفیف</th>
                                        <th class="align-middle text-center text-nowrap">سهم فروشنده</th>
                                        <th class="align-middle text-center text-nowrap">مبلغ درگاه</th>
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
                                            <td class="align-middle text-center"><s>{{ number_format($rec->UnitPrice) }}</s></td>
                                            <td class="align-middle text-center g-color-red">{{ $rec->Discount }}</td>
                                            <td class="align-middle text-center g-color-primary">{{ number_format($rec->PriceWithDiscount) }}</td>
                                            <td class="align-middle text-center g-color-primary">{{ number_format($rec->FinalPrice) }}</td>
                                            <td class="align-middle">
                                                <div class="media">
                                                    <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                                         src="{{ file_exists(public_path($rec->PicPath.$rec->SampleNumber.'.jpg'))?$rec->PicPath.$rec->SampleNumber:$rec->PicPath.'sample1' }}.jpg"
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
            <!-- End Tab panes -->
        </div>
    </div>
@endsection

