@extends('Layouts.IndexSeller')
@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i> واکنش مشتریان
        </h3>
    </div>

    <div class="container">
        {{-- Total Info--}}
        <div class="rowSeller g-mt-30 g-mb-20 g-mr-0 g-ml-0">

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">کل واکنش مشتریان</h3>
                <span class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $totalComment }}</span>عدد </span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div style="direction: rtl"
                 class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">واکنش مشتریان به تفکیک جنسیت</h3>
                <span class="u-label g-bg-bluegray g-mb-5">زنانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $female }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">مردانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $male }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">دخترانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $girl }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">پسرانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $boy }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">نوزادی دخترانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $babyBoy }}</span>عدد</span>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">نوزادی پسرانه<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $babyGirl }}</span>عدد</span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">محصولات داخل سبد علاقه مشتریان</h3>
                <span class="u-label g-bg-bluegray g-mr-5 g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $totalLike }}</span>عدد </span>
            </div>
            <!-- End Icon Blocks -->

            <!-- Icon Blocks -->
            <div
                class="col-lg-3 text-center g-pt-25 g-pb-25 g-mb-5 g-pr-0 g-pl-0">
                <h3 class="h6 g-color-black mb-3">میانگین امتیاز شما از دید مشتریان</h3>
                <span style="direction: rtl" class="u-label g-bg-bluegray g-mb-5">برابر است با<span
                        class="g-mr-5 g-ml-5 g-color-aqua">{{ $avgRating }}</span></span>
            </div>
            <!-- End Icon Blocks -->
        </div>

        {{--        Focus Div When Page Load by Filters--}}
        <div id="{{ (isset($valRate)) ? 'focusAfterPageLoad' : '' }}"></div>

        {{-- Filters --}}
        <div id="accordion-12" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
            <!-- Card -->
            <div class="card g-brd-none rounded-0 g-mb-15">
                <div id="accordion-12-heading-01" class="u-accordion__header g-pa-0 text-right" role="tab">
                    <h5 class="mb-0">
                        <a style="background-color: #f7f7f9"
                           class="d-block g-color-main g-text-underline--none--hover g-brd-around g-brd-gray-light-v4 g-rounded-0 g-pa-10-15 g-font-size-16 collapsed"
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
                <div id="accordion-12-body-01" class="collapse" role="tabpanel"
                     aria-labelledby="accordion-12-heading-01">
                    <div class="u-accordion__body g-color-gray-dark-v5 p-0 pt-2">
                        <div class="m-0 p-0">
                            <div class="g-pr-10 g-pl-10 g-mb-0 g-pt-20 g-brd-around g-brd-gray-light-v4 g-mb-25">
                                <div class="rowSeller">
                                    {{--                    Data Mistake Filters--}}
                                    <div
                                        class="g-brd-around g-brd-gray-light-v2 rounded-0 g-pt-6 text-center g-mb-5 g-mr-15 g-ml-15 smallDevice w-100">
                                        <label style="direction: rtl" class="g-color-gray-light-v1 align-self-center">امتیاز
                                            محصولات</label>
                                    </div>
                                    <div class="btn-group justified-content text-center col-lg-12 mx-auto g-mb-20">
                                        <label class="u-check g-mb-5"
                                               tabindex="6">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="true"
                                                   onclick="productRating('customerComment', '')"
                                                {{ (isset($valRate)) ? (($valRate == '') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">
                                            <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        </span>
                                        </label>
                                        <label class="u-check g-mb-5"
                                               tabindex="5">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="false"
                                                   onclick="productRating('customerComment', '1')"
                                                {{ (isset($valRate)) ? (($valRate == '1') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            </span>
                                        </label>
                                        <label class="u-check g-mb-5"
                                               tabindex="4">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="true"
                                                   onclick="productRating('customerComment', '2')"
                                                {{ (isset($valRate)) ? (($valRate == '2') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            </span>
                                        </label>
                                        <label class="u-check g-mb-5"
                                               tabindex="3">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="false"
                                                   onclick="productRating('customerComment', '3')"
                                                {{ (isset($valRate)) ? (($valRate == '3') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            </span>
                                        </label>
                                        <label class="u-check g-mb-5"
                                               tabindex="2">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="true"
                                                   onclick="productRating('customerComment', '4')"
                                                {{ (isset($valRate)) ? (($valRate == '4') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                                <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                            </span>
                                        </label>
                                        <label class="u-check g-mb-5"
                                               tabindex="1">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="mistak"
                                                   type="radio" id="true"
                                                   onclick="productRating('customerComment', '5')"
                                                {{ (isset($valRate)) ? (($valRate == '5') ? ' checked=""' : '') : '' }}>
                                            <span
                                                class="btn btn-lg btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">
                                            <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                            <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                            <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                            <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                            <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        </span>
                                        </label>
                                        <label
                                            class="g-brd-around g-brd-gray-light-v4 rounded-0 g-brd-left-none m-0 text-center bigDevice">
                            <span
                                class="g-color-gray-dark-v3">امتیاز محصولات</span>
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
            <h3 style="direction: rtl"
                class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                جزئیات واکنش مشتریان
            </h3>
            {{--        @if ($data->count()!==0)--}}
            <h6 style="direction: rtl"
                class="card-header g-bg-orange-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right tableHint">
                <i class="fa fa-hand-o-right g-font-size-18"></i>
                <span class="g-font-size-13">جدول را به سمت راست بکشید.
                </span>
            </h6>
            {{--        @endif--}}
            <div
                style="{{ (!isset($valRate)) ? ' display : none' : '' }}"
                class="m-0 p-0">
                <h6 style="direction: rtl"
                    class="card-header g-bg-green-opacity-0_1 g-brd-around g-brd-gray-light-v4 g-color-gray-dark rounded-0 g-mb-5 text-right">
                    <a style="cursor: pointer; color: #555; text-decoration: none;"
                       href="{{ route('customerComment') }}"
                       class="fa fa-close g-font-size-18 g-pl-3 g-color-red--hover"></a>
                    <span class="g-font-size-13 g-mr-5">فیلتر <span
                            class="g-bg-primary g-color-white g-pr-3 g-pl-3">
                            {{ (isset($valRate)) ? $valRate.' ستاره' : '' }}</span>
                    </span>
                </h6>
            </div>
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
                            <th class="align-middle text-center text-nowrap focused rtlPosition">نام مشتری</th>
                            <th class="align-middle text-center text-nowrap">نام محصول</th>
                            <th class="align-middle text-center">عکس</th>
                            <th class="align-middle text-center text-nowrap">علاقه مندی</th>
                            <th class="align-middle text-center">امتیاز</th>
                            <th class="align-middle text-center">نظرات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data as $key => $rec)
                            <tr>
                                <td class="align-middle text-center text-nowrap">{{ $rec->name.' '.$rec->Family }}</td>
                                <td class="align-middle text-center text-nowrap">{{ $rec->productName }}</td>
                                <td class="align-middle">
                                    <div class="media">
                                        <img class="d-flex g-width-60 g-height-60 g-rounded-3 mx-auto"
                                             src="{{ $rec->PicPath.$rec->SampleNumber }}.png" alt="">
                                    </div>
                                </td>
                                <td class="align-middle text-center text-nowrap">
                                    <i class="{{ ($rec->Like == 1) ? 'fa fa-heart  g-color-lightred' : 'fa fa-heart-o  g-color-gray-light-v1' }} g-font-size-default"></i>
                                </td>
                                <td class="align-middle text-center text-nowrap">
                                    @if ($rec->Rating === 1)
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                    @elseif ($rec->Rating === 2)
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                    @elseif ($rec->Rating === 3)
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                    @elseif ($rec->Rating === 4)
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                    @elseif ($rec->Rating === 5)
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                        <i class="fa fa-star g-font-size-default g-color-yellow"></i>
                                    @else
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                        <i class="fa fa-star-o g-font-size-default g-color-gray-light-v1"></i>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
{{--                                    <div style="display: inline-block" class="comment-cell text-truncate" id="{{ 'comment'.$key }}" onclick="showAllText(this)">--}}
{{--                                        {{ $rec->Comment }}--}}
{{--                                    </div>--}}
                                    <a
{{--                                        href="{{ route('sellerProductDetail',['id'=>$rec->pDetailID]) }}"--}}
                                        class="g-color-gray-dark-v3 g-text-underline--none--hover g-color-primary--hover g-pa-5"
                                        data-toggle="tooltip"
                                        data-placement="right" data-original-title="گفتگوهای مربوط به محصول">
                                        <i class="fa fa-eye g-font-size-18"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            {{-- End Table --}}
        </div>
    </div>
@endsection
