@extends('Layouts.IndexSeller')

@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl;" id="addProductPage"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>افزودن مشخصات محصول
        </h3>
    </div>
    <!-- End Info Panel -->
    <div class="container p-lg-5 g-mt-10 gmb-10 modalBox">

        {{--        Header--}}
        <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
            مشخصات محصول<i class="fa fa-plus-square g-ml-5"></i>
        </h3>

        <!-- Text Input Tooltips -->
        <form action="{{ route('SaveProduct')}}" method="post" enctype='multipart/form-data'
              class="g-brd-around g-brd-gray-light-v4 g-pa-30--lg g-mb-30 smallDevicePadding-20">
        @csrf
        <!-- Hidden Input-->
            <input style="display: none" type="text" name="cat" value="{{$cat}}">
            <input style="display: none" type="text" name="catCode" value="{{$catCode}}">
            <input style="display: none" type="number" name="gender" value="{{$gender}}">

            <!-- Name -->
            <div class="form-group g-mb-20 text-right">
                <label class="g-mb-10">نام محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-lock"></i>
                    </div>
                    <input
                        class="form-control form-control-md rounded-0 pl-0 text-right g-bg-gray-light-v5 g-font-size-16"
                        type="text"
                        tabindex="1"
                        name="name" value="{{$name}}" readonly="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">نام محصولی که قصد دارید به
                        انبارتان اضافه گردد.</b>
                </div>
                <div style="direction: rtl">
                    <input name="hintCat" class="d-none" value="{{ $hintCat }}">
                    <small class="text-muted g-font-size-12">این محصول در دسته بندی <span
                            class="g-font-weight-600 g-ml-1 g-mr-1">{{$hintCat}}</span> قرار می گیرد.</small>
                </div>
            </div>
            <!-- End Name -->

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Model -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblModel" class="g-mb-10">مدل محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <input style="direction: rtl"
                           id="addProductModel"
                           class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           tabindex="2"
                           name="model"
                           onkeypress="$('#lblModel').removeClass('g-color-red')"
                           value="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">مدل جزئیاتی از نام محصول
                        است.</b>
                </div>
                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">اگر محصولتان مدل یا شماره مدل خاصی ندارد این قسمت را خالی
                        بگذارید.</small>
                </div>
            </div>
            <!-- End Model -->

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Brand -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblBrand" class="g-mb-10">برند محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <input class="form-control form-control-md rounded-0 text-left g-font-size-16" type="text"
                           tabindex="3"
                           name="brand"
                           id="addProductBrand"
                           onkeypress="$('#lblBrand').removeClass('g-color-red')"
                           value="">
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">برند هویت محصول شماست.</small><br>
                    <small class="text-muted g-font-size-12">اگر محصولتان برند ندارد مقدار FreeBrand را وارد
                        نمایید.</small><br>
                </div>
            </div>
            <!-- End Brand -->

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Detail -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblDetail" class="g-mb-10">توضیحات محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div
                        class="input-group-addon d-flex justify-content-start g-color-gray-light-v1 g-bg-white rounded-0 g-py-12">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <textarea style="direction: rtl"
                              class="form-control form-control-md g-resize-none rounded-0 pl-0 text-right g-font-size-16"
                              rows="6"
                              tabindex="4"
                              id="addProductDetail"
                              onkeypress="$('#lblDetail').removeClass('g-color-red')"
                              placeholder="هر توضیح در سطری جدا" name="detail">{{ old('detail') }}</textarea>
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">توضیحات می تواند به فروش
                        بهتر محصول شما کمک کند.</b>
                </div>
                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">در این قسمت می توانید توضیحاتی برای محصول اضافه
                        کنید.</small><br>
                    <small class="text-muted g-font-size-12">به عنوان مثال:</small><br>
                    <small class="text-muted g-font-size-12"> می توان جنس محصول روشهای شستشو روشهای نگهداری و ... را
                        توضیح داد.
                    </small><br>
                    <small class="text-muted g-font-size-12">اگر محصولتان سایز بندی خاصی دارد لطفا اندازه ها را در این قسمت قید کنید.
                    </small><br>
                    <small class="text-muted g-font-size-12">لطفا توضیحات را مرتب و در سطرهای جدا وارد نمایید.</small>
                </div>
            </div>
            <!-- End Detail -->

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- Size Group -->
            <div style="direction: rtl" class="g-mb-15">
                <label class="g-mb-10 w-100">مشخصات سایز، رنگ و تعداد</label>
                <small class="text-muted g-font-size-12">در این قسمت سایز محصول و رنگ آنرا انتخاب
                    کنید.</small><br>
                <small class="text-muted g-font-size-12">همچنین تعیین نمایید چند عدد از سایز انتخابی را موجود
                    دارید.</small><br>
                <small class="text-muted g-font-size-12">لطفا برای هر رنگ از محصول تصویر همان محصول را در سطر مربوط به خود وارد نمایید.</small><br>
            </div>
            {{--Hidden Input--}}
            <input style="display: none" type="number" name="qty" id="addProductSizeQty" value="{{ $qty }}">

            {{--سایز و رنگ و موجودی و تصویر--}}
            <div id="sizeRowContainer">
                @for ($i = 0; $i< $qty; $i++)
                    <div class="text-right rowSeller" id="{{ 'sizeRow-'.$i }}" onchange="checkRepeat('size'+{{$i}})">
                        <label class="g-mb-10 col-md-12">
                            <span style="height: 1.6rem;"
                                  class="d-none u-icon-v1 u-icon-sliding--hover errorInfo"
                                  data-toggle="tooltip"
                                  data-placement="top"
                                  data-original-title="سایز و رنگ وارد شده تکراری است">
                                  <i class="icon-exclamation"></i>
                            </span>
                            مشخصات سایز شماره
                            <span class="h4 g-mr-5">{{$i+1}}</span>
                        </label>
                        {{--سایز--}}
                        <div class="form-group g-mb-10 text-right col-lg-3">
                            <label class="g-mb-10">سایز</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <button style="outline: 0; cursor: pointer" type="button"
                                        class="input-group-addon d-flex align-items-center g-bg-white g-color-primary g-color-aqua--hover rounded-0"
                                        data-toggle="modal" data-target="#sizeInformation" title="راهنمای سایز">
                                    <i class="fa fa-exclamation"></i>
                                </button>
                                <select
                                    class="form-control form-control-md custom-select rounded-0 text-right h-25 g-font-size-16"
                                    id="size{{$i}}"
                                    tabindex="5+{{ $i }}"
                                    name="size{{$i}}">
                                    @foreach($size as $s)
                                        <option style="direction: rtl"
                                                value="{{$s}}">{{$s}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--راهنمای سایز--}}
                        <div style="direction: rtl" class="modal fade" id="sizeInformation" tabindex="-1" role="dialog" aria-labelledby="sizeInformationTitle" aria-hidden="true">
                            <div style="max-width: 100%; margin: 0;" class="modal-dialog">
                                <div class="modal-content rounded-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title">راهنمای سایز</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div style="padding-bottom: 100px" class="modal-body">
                                        <div style="direction: rtl;" id="accordion-02" class="u-accordion u-accordion-bg-primary u-accordion-color-white g-pa-40"
                                             role="tablist" aria-multiselectable="true">
                                            <!-- زنانه -->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-01"
                                                     class="card-header g-pa-0"
                                                     role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-01"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-01"><i
                                                                class="icon-user-female align-middle g-font-size-22 g-ml-5"></i>زنانه</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-01" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-01">
                                                    <!--سوتین-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                سوتین
                                                            </h5>

                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز انگلیسی (UK)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">65-65B-65C-65D--65E > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">30-30B-30C-30D-30DD > ...</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">70-70B-70C-70D-70E</td>
                                                                        <td class="align-middle text-nowrap text-center">32-32B-32C-32D-32DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">75-75B-75C-75D-75E</td>
                                                                        <td class="align-middle text-nowrap text-center">34-34B-34C-34D-34DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">80-80B-80C-80D-80E</td>
                                                                        <td class="align-middle text-nowrap text-center">36-36B-36C-36D-36DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">85-85B-85C-85D-85E</td>
                                                                        <td class="align-middle text-nowrap text-center">38-38B-38C-38D-38DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">90-90B-90C-90D-90E</td>
                                                                        <td class="align-middle text-nowrap text-center">34-34B-34C-34D-34DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">... > 75-75B-75C-75D-75E</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 42-42B-42C-42D-42DD</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--پایین تنه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                پایین تنه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">67 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">91 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">33-34-35</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">64-68</td>
                                                                        <td class="align-middle text-nowrap text-center">92-96</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">36-37</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">68-72</td>
                                                                        <td class="align-middle text-nowrap text-center">96-100</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">38-39</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">72-76</td>
                                                                        <td class="align-middle text-nowrap text-center">100-104</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">40-41-42</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">76-80</td>
                                                                        <td class="align-middle text-nowrap text-center">104-108</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">43-44</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">80-84</td>
                                                                        <td class="align-middle text-nowrap text-center">108-112</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">45-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">84-88</td>
                                                                        <td class="align-middle text-nowrap text-center">112-116</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">80-84</td>
                                                                        <td class="align-middle text-nowrap text-center">108-112</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">45-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">... > 84</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 112</td>
                                                                        <td class="align-middle text-nowrap text-center">74-86</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--بالاتنه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                بالا تنه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور شکم</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">83 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">67 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">91 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">33-34-35</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">84-88</td>
                                                                        <td class="align-middle text-nowrap text-center">64-68</td>
                                                                        <td class="align-middle text-nowrap text-center">92-96</td>
                                                                        <td class="align-middle text-nowrap text-center">36-37</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">88-92</td>
                                                                        <td class="align-middle text-nowrap text-center">68-72</td>
                                                                        <td class="align-middle text-nowrap text-center">96-100</td>
                                                                        <td class="align-middle text-nowrap text-center">38-39</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">92-96</td>
                                                                        <td class="align-middle text-nowrap text-center">72-76</td>
                                                                        <td class="align-middle text-nowrap text-center">100-104</td>
                                                                        <td class="align-middle text-nowrap text-center">40-41-42</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">96-100</td>
                                                                        <td class="align-middle text-nowrap text-center">76-80</td>
                                                                        <td class="align-middle text-nowrap text-center">104-108</td>
                                                                        <td class="align-middle text-nowrap text-center">43-44</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">100-104</td>
                                                                        <td class="align-middle text-nowrap text-center">80-84</td>
                                                                        <td class="align-middle text-nowrap text-center">108-112</td>
                                                                        <td class="align-middle text-nowrap text-center">45-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">... > 104</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 84</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 112</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--کفش-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                کفش
                                                            </h5>

                                                            <div style="direction: ltr" class="table-responsive">
                                                                <table class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سانتیمتر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز انگلیسی (UK)</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">21-21.5</td>
                                                                        <td class="align-middle text-nowrap text-center">35</td>
                                                                        <td class="align-middle text-nowrap text-center">2.5-3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">22-22.5</td>
                                                                        <td class="align-middle text-nowrap text-center">36</td>
                                                                        <td class="align-middle text-nowrap text-center">3.5-4</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">23</td>
                                                                        <td class="align-middle text-nowrap text-center">37</td>
                                                                        <td class="align-middle text-nowrap text-center">4.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">23.5-24</td>
                                                                        <td class="align-middle text-nowrap text-center">38</td>
                                                                        <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">24.5</td>
                                                                        <td class="align-middle text-nowrap text-center">39</td>
                                                                        <td class="align-middle text-nowrap text-center">6</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">25-25.5</td>
                                                                        <td class="align-middle text-nowrap text-center">40</td>
                                                                        <td class="align-middle text-nowrap text-center">6.5-7</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">26</td>
                                                                        <td class="align-middle text-nowrap text-center">41</td>
                                                                        <td class="align-middle text-nowrap text-center">7.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">26.5-27</td>
                                                                        <td class="align-middle text-nowrap text-center">42</td>
                                                                        <td class="align-middle text-nowrap text-center">8-8.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">27.5</td>
                                                                        <td class="align-middle text-nowrap text-center">43</td>
                                                                        <td class="align-middle text-nowrap text-center">9</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">28</td>
                                                                        <td class="align-middle text-nowrap text-center">44</td>
                                                                        <td class="align-middle text-nowrap text-center">9.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">29</td>
                                                                        <td class="align-middle text-nowrap text-center">45</td>
                                                                        <td class="align-middle text-nowrap text-center">10.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">29.5-30</td>
                                                                        <td class="align-middle text-nowrap text-center">46</td>
                                                                        <td class="align-middle text-nowrap text-center">11-11.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">30.5</td>
                                                                        <td class="align-middle text-nowrap text-center">47</td>
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- مردانه -->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-02" class="card-header g-pa-0" role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-02"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-02"><i
                                                                class="icon-user align-middle g-font-size-22 g-ml-5"></i>مردانه</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-02" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-02">
                                                    <!--بالا تنه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                بالا تنه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">73 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">35-36</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">88-96</td>
                                                                        <td class="align-middle text-nowrap text-center">73-81</td>
                                                                        <td class="align-middle text-nowrap text-center">88-96</td>
                                                                        <td class="align-middle text-nowrap text-center">37-38</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">96-104</td>
                                                                        <td class="align-middle text-nowrap text-center">81-89</td>
                                                                        <td class="align-middle text-nowrap text-center">96-104</td>
                                                                        <td class="align-middle text-nowrap text-center">39-40</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">104-112</td>
                                                                        <td class="align-middle text-nowrap text-center">89-97</td>
                                                                        <td class="align-middle text-nowrap text-center">104-112</td>
                                                                        <td class="align-middle text-nowrap text-center">41-42</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">112-124</td>
                                                                        <td class="align-middle text-nowrap text-center">98-109</td>
                                                                        <td class="align-middle text-nowrap text-center">112-120</td>
                                                                        <td class="align-middle text-nowrap text-center">43-44</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">124-136</td>
                                                                        <td class="align-middle text-nowrap text-center">109-121</td>
                                                                        <td class="align-middle text-nowrap text-center">120-128</td>
                                                                        <td class="align-middle text-nowrap text-center">45-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">... > 136</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 121</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 128</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--پایین تنه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                پایین تنه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">73 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">88 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">82.5 > ...</td>
                                                                        <td class="align-middle text-nowrap text-center">36-37</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">73-81</td>
                                                                        <td class="align-middle text-nowrap text-center">88-96</td>
                                                                        <td class="align-middle text-nowrap text-center">82.5-87.5</td>
                                                                        <td class="align-middle text-nowrap text-center">38-39</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">81-89</td>
                                                                        <td class="align-middle text-nowrap text-center">96-104</td>
                                                                        <td class="align-middle text-nowrap text-center">83-88</td>
                                                                        <td class="align-middle text-nowrap text-center">40</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">89-97</td>
                                                                        <td class="align-middle text-nowrap text-center">104-112</td>
                                                                        <td class="align-middle text-nowrap text-center">83.5-88.5</td>
                                                                        <td class="align-middle text-nowrap text-center">41-42</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">98-109</td>
                                                                        <td class="align-middle text-nowrap text-center">112-120</td>
                                                                        <td class="align-middle text-nowrap text-center">84-89</td>
                                                                        <td class="align-middle text-nowrap text-center">43-44</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">109-121</td>
                                                                        <td class="align-middle text-nowrap text-center">120-128</td>
                                                                        <td class="align-middle text-nowrap text-center">84.5-89.5</td>
                                                                        <td class="align-middle text-nowrap text-center">45-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">121-133</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 128</td>
                                                                        <td class="align-middle text-nowrap text-center">... > 89.5</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48-49</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XXXL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--کفش-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white  g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                کفش
                                                            </h5>

                                                            <div style="direction: ltr" class="table-responsive">
                                                                <table class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سانتیمتر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز انگلیسی (UK)</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">21-21.5</td>
                                                                        <td class="align-middle text-nowrap text-center">35</td>
                                                                        <td class="align-middle text-nowrap text-center">2.5-3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">22-22.5</td>
                                                                        <td class="align-middle text-nowrap text-center">36</td>
                                                                        <td class="align-middle text-nowrap text-center">3.5-4</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">23</td>
                                                                        <td class="align-middle text-nowrap text-center">37</td>
                                                                        <td class="align-middle text-nowrap text-center">4.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">23.5-24</td>
                                                                        <td class="align-middle text-nowrap text-center">38</td>
                                                                        <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">24.5</td>
                                                                        <td class="align-middle text-nowrap text-center">39</td>
                                                                        <td class="align-middle text-nowrap text-center">6</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">25-25.5</td>
                                                                        <td class="align-middle text-nowrap text-center">40</td>
                                                                        <td class="align-middle text-nowrap text-center">6.5-7</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">26</td>
                                                                        <td class="align-middle text-nowrap text-center">41</td>
                                                                        <td class="align-middle text-nowrap text-center">7.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">26.5-27</td>
                                                                        <td class="align-middle text-nowrap text-center">42</td>
                                                                        <td class="align-middle text-nowrap text-center">8-8.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">27.5</td>
                                                                        <td class="align-middle text-nowrap text-center">43</td>
                                                                        <td class="align-middle text-nowrap text-center">9</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">28</td>
                                                                        <td class="align-middle text-nowrap text-center">44</td>
                                                                        <td class="align-middle text-nowrap text-center">9.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">29</td>
                                                                        <td class="align-middle text-nowrap text-center">45</td>
                                                                        <td class="align-middle text-nowrap text-center">10.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">29.5-30</td>
                                                                        <td class="align-middle text-nowrap text-center">46</td>
                                                                        <td class="align-middle text-nowrap text-center">11-11.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">30.5</td>
                                                                        <td class="align-middle text-nowrap text-center">47</td>
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">31</td>
                                                                        <td class="align-middle text-nowrap text-center">48</td>
                                                                        <td class="align-middle text-nowrap text-center">12.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">31.5-32</td>
                                                                        <td class="align-middle text-nowrap text-center">49</td>
                                                                        <td class="align-middle text-nowrap text-center">13-13.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">32.5</td>
                                                                        <td class="align-middle text-nowrap text-center">50</td>
                                                                        <td class="align-middle text-nowrap text-center">14</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">33-33.5</td>
                                                                        <td class="align-middle text-nowrap text-center">51</td>
                                                                        <td class="align-middle text-nowrap text-center">14.5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">34</td>
                                                                        <td class="align-middle text-nowrap text-center">52</td>
                                                                        <td class="align-middle text-nowrap text-center">15</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- بچگانه 8-3-->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-03" class="card-header g-pa-0" role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-03"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-03"><i
                                                                class="icon-graduation g-font-size-25 g-ml-5"></i>بچگانه 8-3 سال</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-03" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-03">
                                                    <!--لباس دخترانه و پسرانه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                بالا و پایین تنه دخترانه و پسرانه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز عددی</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody style="direction: ltr">
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">4</td>
                                                                        <td class="align-middle text-nowrap text-center">3-4</td>
                                                                        <td class="align-middle text-nowrap text-center">41.5-49.5</td>
                                                                        <td class="align-middle text-nowrap text-center">56-58</td>
                                                                        <td class="align-middle text-nowrap text-center">54.5-56</td>
                                                                        <td class="align-middle text-nowrap text-center">57-60</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">5</td>
                                                                        <td class="align-middle text-nowrap text-center">4-5</td>
                                                                        <td class="align-middle text-nowrap text-center">49.5-52.5</td>
                                                                        <td class="align-middle text-nowrap text-center">58.5-61</td>
                                                                        <td class="align-middle text-nowrap text-center">56-57</td>
                                                                        <td class="align-middle text-nowrap text-center">60-62</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6</td>
                                                                        <td class="align-middle text-nowrap text-center">4-5</td>
                                                                        <td class="align-middle text-nowrap text-center">52.5-55.5</td>
                                                                        <td class="align-middle text-nowrap text-center">61-63</td>
                                                                        <td class="align-middle text-nowrap text-center">57-58.5</td>
                                                                        <td class="align-middle text-nowrap text-center">62-65</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6X-7</td>
                                                                        <td class="align-middle text-nowrap text-center">6-7</td>
                                                                        <td class="align-middle text-nowrap text-center">55.5-58.5</td>
                                                                        <td class="align-middle text-nowrap text-center">63-66</td>
                                                                        <td class="align-middle text-nowrap text-center">58.5-61</td>
                                                                        <td class="align-middle text-nowrap text-center">65-67</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">7X</td>
                                                                        <td class="align-middle text-nowrap text-center">7-8</td>
                                                                        <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                                        <td class="align-middle text-nowrap text-center">66-68.5</td>
                                                                        <td class="align-middle text-nowrap text-center">61-63.5</td>
                                                                        <td class="align-middle text-nowrap text-center">67-70</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--کفش دخترانه و پسرانه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5 d-lg-inline-block d-none"></i>
                                                                کفش دخترانه و پسرانه
                                                            </h5>

                                                            <div style="direction: ltr" class="table-responsive">
                                                                <table class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سانتیمتر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز انگلیسی (UK)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز آمریکایی (US)</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">3-4</td>
                                                                        <td class="align-middle text-nowrap text-center">15.5</td>
                                                                        <td class="align-middle text-nowrap text-center">24</td>
                                                                        <td class="align-middle text-nowrap text-center">8</td>
                                                                        <td class="align-middle text-nowrap text-center">9</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">4-4.5</td>
                                                                        <td class="align-middle text-nowrap text-center">16.5</td>
                                                                        <td class="align-middle text-nowrap text-center">25</td>
                                                                        <td class="align-middle text-nowrap text-center">9</td>
                                                                        <td class="align-middle text-nowrap text-center">10</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">5</td>
                                                                        <td class="align-middle text-nowrap text-center">17</td>
                                                                        <td class="align-middle text-nowrap text-center">26</td>
                                                                        <td class="align-middle text-nowrap text-center">10</td>
                                                                        <td class="align-middle text-nowrap text-center">11</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">5-5.5</td>
                                                                        <td class="align-middle text-nowrap text-center">18</td>
                                                                        <td class="align-middle text-nowrap text-center">27</td>
                                                                        <td class="align-middle text-nowrap text-center">11</td>
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">5.5-6</td>
                                                                        <td class="align-middle text-nowrap text-center">19</td>
                                                                        <td class="align-middle text-nowrap text-center">28</td>
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                        <td class="align-middle text-nowrap text-center">13</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">7</td>
                                                                        <td class="align-middle text-nowrap text-center">19.5</td>
                                                                        <td class="align-middle text-nowrap text-center">29</td>
                                                                        <td class="align-middle text-nowrap text-center">13</td>
                                                                        <td class="align-middle text-nowrap text-center">14</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- بچگانه 15-8-->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-04" class="card-header g-pa-0" role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-04"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-04"><i
                                                                class="icon-graduation align-middle g-font-size-27 g-ml-5"></i>بچگانه 15-8 سال</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-04" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-04">
                                                    <!--دخترانه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                بالا و پایین تنه دخترانه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز عددی</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody style="direction: ltr">
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6-7</td>
                                                                        <td class="align-middle text-nowrap text-center">8</td>
                                                                        <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                                        <td class="align-middle text-nowrap text-center">64.5-68</td>
                                                                        <td class="align-middle text-nowrap text-center">59.5-61</td>
                                                                        <td class="align-middle text-nowrap text-center">68.5-73</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">8-9</td>
                                                                        <td class="align-middle text-nowrap text-center">8-10</td>
                                                                        <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                                        <td class="align-middle text-nowrap text-center">68-73</td>
                                                                        <td class="align-middle text-nowrap text-center">61-64</td>
                                                                        <td class="align-middle text-nowrap text-center">73-78.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">8-9 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">8-10</td>
                                                                        <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                                        <td class="align-middle text-nowrap text-center">73.5-80.5</td>
                                                                        <td class="align-middle text-nowrap text-center">67.5-74.5</td>
                                                                        <td class="align-middle text-nowrap text-center">79.5-85.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                                        <td class="align-middle text-nowrap text-center">73-79</td>
                                                                        <td class="align-middle text-nowrap text-center">64-68</td>
                                                                        <td class="align-middle text-nowrap text-center">78.5-83.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">10-12 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                                        <td class="align-middle text-nowrap text-center">80.5-87.5</td>
                                                                        <td class="align-middle text-nowrap text-center">74.5-82</td>
                                                                        <td class="align-middle text-nowrap text-center">85.5-92</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">14-16</td>
                                                                        <td class="align-middle text-nowrap text-center">12-13</td>
                                                                        <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                                        <td class="align-middle text-nowrap text-center">79-85.5</td>
                                                                        <td class="align-middle text-nowrap text-center">68-71.5</td>
                                                                        <td class="align-middle text-nowrap text-center">83.5-88.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">14-16 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">12-13</td>
                                                                        <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                                        <td class="align-middle text-nowrap text-center">87.5-96</td>
                                                                        <td class="align-middle text-nowrap text-center">82-90</td>
                                                                        <td class="align-middle text-nowrap text-center">92-99</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">18-20</td>
                                                                        <td class="align-middle text-nowrap text-center">13-15</td>
                                                                        <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                                        <td class="align-middle text-nowrap text-center">85.5-92.5</td>
                                                                        <td class="align-middle text-nowrap text-center">71.5-74.5</td>
                                                                        <td class="align-middle text-nowrap text-center">88.5-93.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">18-20 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">13-15</td>
                                                                        <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                                        <td class="align-middle text-nowrap text-center">96-105</td>
                                                                        <td class="align-middle text-nowrap text-center">90-99</td>
                                                                        <td class="align-middle text-nowrap text-center">99-107</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL +
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--پسرانه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                <i class="icon-education-192 u-line-icon-pro align-middle g-font-size-22 g-ml-5 d-lg-inline-block d-none"></i>لباس
                                                                بالا و پایین تنه پسرانه
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز عددی</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور باسن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody style="direction: ltr">
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6-7</td>
                                                                        <td class="align-middle text-nowrap text-center">7-8</td>
                                                                        <td class="align-middle text-nowrap text-center">58.5-61.5</td>
                                                                        <td class="align-middle text-nowrap text-center">64.5-66</td>
                                                                        <td class="align-middle text-nowrap text-center">59.5-61</td>
                                                                        <td class="align-middle text-nowrap text-center">68.5-71</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">8-9</td>
                                                                        <td class="align-middle text-nowrap text-center">8-10</td>
                                                                        <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                                        <td class="align-middle text-nowrap text-center">66-69</td>
                                                                        <td class="align-middle text-nowrap text-center">61.5-65</td>
                                                                        <td class="align-middle text-nowrap text-center">71-74.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">8-9 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">8-10</td>
                                                                        <td class="align-middle text-nowrap text-center">61.5-66.5</td>
                                                                        <td class="align-middle text-nowrap text-center">70.5-76.5</td>
                                                                        <td class="align-middle text-nowrap text-center">65.5-70.5</td>
                                                                        <td class="align-middle text-nowrap text-center">75.5-81</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                                        <td class="align-middle text-nowrap text-center">69-75</td>
                                                                        <td class="align-middle text-nowrap text-center">65-69</td>
                                                                        <td class="align-middle text-nowrap text-center">74.5-79.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">10-12 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">66.5-71.5</td>
                                                                        <td class="align-middle text-nowrap text-center">76.5-83.5</td>
                                                                        <td class="align-middle text-nowrap text-center">70.5-76</td>
                                                                        <td class="align-middle text-nowrap text-center">81-87</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">14-16</td>
                                                                        <td class="align-middle text-nowrap text-center">12-13</td>
                                                                        <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                                        <td class="align-middle text-nowrap text-center">75-81.5</td>
                                                                        <td class="align-middle text-nowrap text-center">69-72.5</td>
                                                                        <td class="align-middle text-nowrap text-center">79.5-84.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">14-16 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">12-13</td>
                                                                        <td class="align-middle text-nowrap text-center">71.5-75.5</td>
                                                                        <td class="align-middle text-nowrap text-center">83.5-91</td>
                                                                        <td class="align-middle text-nowrap text-center">76-82</td>
                                                                        <td class="align-middle text-nowrap text-center">87-93.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L +
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">18-20</td>
                                                                        <td class="align-middle text-nowrap text-center">13-15</td>
                                                                        <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                                        <td class="align-middle text-nowrap text-center">81.5-88-.5</td>
                                                                        <td class="align-middle text-nowrap text-center">72.5-75.5</td>
                                                                        <td class="align-middle text-nowrap text-center">84.5-89.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">18-20 Plus</td>
                                                                        <td class="align-middle text-nowrap text-center">13-15</td>
                                                                        <td class="align-middle text-nowrap text-center">75.5-80.5</td>
                                                                        <td class="align-middle text-nowrap text-center">91-98</td>
                                                                        <td class="align-middle text-nowrap text-center">82-88</td>
                                                                        <td class="align-middle text-nowrap text-center">93.5-100</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL +
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--کفش دخترانه و پسرانه-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                <i class="icon-clothes-088 u-line-icon-pro align-middle g-font-size-22 g-ml-5 d-lg-inline-block d-none"></i>
                                                                کفش دخترانه و پسرانه
                                                            </h5>

                                                            <div style="direction: ltr" class="table-responsive">
                                                                <table class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سانتیمتر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز انگلیسی (UK)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز آمریکایی (US)</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">8</td>
                                                                        <td class="align-middle text-nowrap text-center">20.5</td>
                                                                        <td class="align-middle text-nowrap text-center">30</td>
                                                                        <td class="align-middle text-nowrap text-center">14</td>
                                                                        <td class="align-middle text-nowrap text-center">15</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">9</td>
                                                                        <td class="align-middle text-nowrap text-center">21</td>
                                                                        <td class="align-middle text-nowrap text-center">31</td>
                                                                        <td class="align-middle text-nowrap text-center">15</td>
                                                                        <td class="align-middle text-nowrap text-center">16</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">10</td>
                                                                        <td class="align-middle text-nowrap text-center">21.5</td>
                                                                        <td class="align-middle text-nowrap text-center">32</td>
                                                                        <td class="align-middle text-nowrap text-center">16</td>
                                                                        <td class="align-middle text-nowrap text-center">17</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">11</td>
                                                                        <td class="align-middle text-nowrap text-center">22</td>
                                                                        <td class="align-middle text-nowrap text-center">33</td>
                                                                        <td class="align-middle text-nowrap text-center">17</td>
                                                                        <td class="align-middle text-nowrap text-center">1</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                        <td class="align-middle text-nowrap text-center">22.5</td>
                                                                        <td class="align-middle text-nowrap text-center">34</td>
                                                                        <td class="align-middle text-nowrap text-center">18</td>
                                                                        <td class="align-middle text-nowrap text-center">1.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">13</td>
                                                                        <td class="align-middle text-nowrap text-center">23</td>
                                                                        <td class="align-middle text-nowrap text-center">35</td>
                                                                        <td class="align-middle text-nowrap text-center">19</td>
                                                                        <td class="align-middle text-nowrap text-center">2</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">14</td>
                                                                        <td class="align-middle text-nowrap text-center">23.5</td>
                                                                        <td class="align-middle text-nowrap text-center">36</td>
                                                                        <td class="align-middle text-nowrap text-center">20</td>
                                                                        <td class="align-middle text-nowrap text-center">2.5</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">15</td>
                                                                        <td class="align-middle text-nowrap text-center">24</td>
                                                                        <td class="align-middle text-nowrap text-center">37</td>
                                                                        <td class="align-middle text-nowrap text-center">21</td>
                                                                        <td class="align-middle text-nowrap text-center">3</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--نوزادی-->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-05" class="card-header g-pa-0" role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-05"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-05"><i
                                                                class="icon-emotsmile g-font-size-20 u-line-icon-pro g-ml-5"></i>نوزادی 2-0 سال</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-05" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-05">
                                                    <!--نوزادی لباس-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                بالا و پایین تنه نوزادی
                                                            </h5>
                                                            <div class="table-responsive">
                                                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سن (ماه)</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">قد</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">وزن</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور سینه</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">دور کمر</th>
                                                                        <th class="align-middle text-center focused rtlPosition g-bg-primary g-color-white">سایز حروفی</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody style="direction: ltr">
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">زود رسیده</td>
                                                                        <td class="align-middle text-nowrap text-center">...</td>
                                                                        <td class="align-middle text-nowrap text-center"> ... < 22.5</td>
                                                                        <td class="align-middle text-nowrap text-center"> ... < 2.5</td>
                                                                        <td class="align-middle text-nowrap text-center">32</td>
                                                                        <td class="align-middle text-nowrap text-center">33</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">0M (یا) NB</td>
                                                                        <td class="align-middle text-nowrap text-center">0</td>
                                                                        <td class="align-middle text-nowrap text-center">22.5-25.5</td>
                                                                        <td class="align-middle text-nowrap text-center">2.7-4.3</td>
                                                                        <td class="align-middle text-nowrap text-center">37-42</td>
                                                                        <td class="align-middle text-nowrap text-center">39-43</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XS
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">3M</td>
                                                                        <td class="align-middle text-nowrap text-center">0-3</td>
                                                                        <td class="align-middle text-nowrap text-center">25.5-28.5</td>
                                                                        <td class="align-middle text-nowrap text-center">4.5-6.6</td>
                                                                        <td class="align-middle text-nowrap text-center">42-44</td>
                                                                        <td class="align-middle text-nowrap text-center">43-46</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6M</td>
                                                                        <td class="align-middle text-nowrap text-center">3-6</td>
                                                                        <td class="align-middle text-nowrap text-center">28.5-31.5</td>
                                                                        <td class="align-middle text-nowrap text-center">6.8-8.1</td>
                                                                        <td class="align-middle text-nowrap text-center">44-46</td>
                                                                        <td class="align-middle text-nowrap text-center">46-47</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            S
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">9M</td>
                                                                        <td class="align-middle text-nowrap text-center">6-9</td>
                                                                        <td class="align-middle text-nowrap text-center">31.5-34.5</td>
                                                                        <td class="align-middle text-nowrap text-center">8.3-10</td>
                                                                        <td class="align-middle text-nowrap text-center">46-47</td>
                                                                        <td class="align-middle text-nowrap text-center">47-48</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">12M</td>
                                                                        <td class="align-middle text-nowrap text-center">9-12</td>
                                                                        <td class="align-middle text-nowrap text-center">34.5-37.5</td>
                                                                        <td class="align-middle text-nowrap text-center">10.2-11.3</td>
                                                                        <td class="align-middle text-nowrap text-center">47-50</td>
                                                                        <td class="align-middle text-nowrap text-center">48-50</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            M
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">18M</td>
                                                                        <td class="align-middle text-nowrap text-center">12-18</td>
                                                                        <td class="align-middle text-nowrap text-center">37.5-40.5</td>
                                                                        <td class="align-middle text-nowrap text-center">11.6-12.7</td>
                                                                        <td class="align-middle text-nowrap text-center">50-52</td>
                                                                        <td class="align-middle text-nowrap text-center">50-52</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">24M (یا) 2T</td>
                                                                        <td class="align-middle text-nowrap text-center">18-24</td>
                                                                        <td class="align-middle text-nowrap text-center">40.5-43.5</td>
                                                                        <td class="align-middle text-nowrap text-center">12.9-13-6</td>
                                                                        <td class="align-middle text-nowrap text-center">52-53</td>
                                                                        <td class="align-middle text-nowrap text-center">52-53</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            L
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">3T</td>
                                                                        <td class="align-middle text-nowrap text-center">24-36</td>
                                                                        <td class="align-middle text-nowrap text-center">43.5-46.5</td>
                                                                        <td class="align-middle text-nowrap text-center">...</td>
                                                                        <td class="align-middle text-nowrap text-center">53-56</td>
                                                                        <td class="align-middle text-nowrap text-center">53-54.5</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">4T</td>
                                                                        <td class="align-middle text-nowrap text-center">36-48</td>
                                                                        <td class="align-middle text-nowrap text-center">46.5-49.5</td>
                                                                        <td class="align-middle text-nowrap text-center">...</td>
                                                                        <td class="align-middle text-nowrap text-center">56-58</td>
                                                                        <td class="align-middle text-nowrap text-center">54.5-56</td>
                                                                        <td class="align-middle g-font-weight-600 g-color-orange text-nowrap text-center">
                                                                            XL
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--کفش نوزادی-->
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div>
                                                            <h5 class="card-header g-bg-gray-dark-v4 g-brd-around g-brd-gray-light-v4 g-color-white g-pa-5 g-font-size-18--lg g-font-size-12 rounded-0 g-mb-5 text-right">
                                                                کفش دخترانه و پسرانه
                                                            </h5>

                                                            <div style="direction: ltr" class="table-responsive">
                                                                <table class="table table-bordered u-table--v2">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="align-middle text-center focused rtlPosition">سن (ماه)</th>
                                                                        <th class="align-middle text-center focused rtlPosition">سانتیمتر</th>
                                                                        <th class="align-middle text-center focused rtlPosition">سایز اروپایی (UE)</th>
                                                                        <th class="align-middle text-center focused rtlPosition">سایز انگلیسی (UK)</th>
                                                                        <th class="align-middle text-center focused rtlPosition">سایز آمریکایی (US)</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">1-3</td>
                                                                        <td class="align-middle text-nowrap text-center">8.9</td>
                                                                        <td class="align-middle text-nowrap text-center">16</td>
                                                                        <td class="align-middle text-nowrap text-center">0</td>
                                                                        <td class="align-middle text-nowrap text-center">1</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">3-6</td>
                                                                        <td class="align-middle text-nowrap text-center">9.5</td>
                                                                        <td class="align-middle text-nowrap text-center">17</td>
                                                                        <td class="align-middle text-nowrap text-center">1</td>
                                                                        <td class="align-middle text-nowrap text-center">2</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">6-9</td>
                                                                        <td class="align-middle text-nowrap text-center">10.5</td>
                                                                        <td class="align-middle text-nowrap text-center">18</td>
                                                                        <td class="align-middle text-nowrap text-center">2</td>
                                                                        <td class="align-middle text-nowrap text-center">3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">10-12</td>
                                                                        <td class="align-middle text-nowrap text-center">11.5</td>
                                                                        <td class="align-middle text-nowrap text-center">19</td>
                                                                        <td class="align-middle text-nowrap text-center">3</td>
                                                                        <td class="align-middle text-nowrap text-center">4</td>
                                                                    </tr>
                                                                    <tr class="g-bg-gray-light-v5">
                                                                        <td class="align-middle text-nowrap text-center">15-18</td>
                                                                        <td class="align-middle text-nowrap text-center">12</td>
                                                                        <td class="align-middle text-nowrap text-center">20</td>
                                                                        <td class="align-middle text-nowrap text-center">4</td>
                                                                        <td class="align-middle text-nowrap text-center">5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">18-24</td>
                                                                        <td class="align-middle text-nowrap text-center">13</td>
                                                                        <td class="align-middle text-nowrap text-center">21</td>
                                                                        <td class="align-middle text-nowrap text-center">5</td>
                                                                        <td class="align-middle text-nowrap text-center">6</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">24-36</td>
                                                                        <td class="align-middle text-nowrap text-center">14</td>
                                                                        <td class="align-middle text-nowrap text-center">22</td>
                                                                        <td class="align-middle text-nowrap text-center">6</td>
                                                                        <td class="align-middle text-nowrap text-center">7</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-nowrap text-center">36-48</td>
                                                                        <td class="align-middle text-nowrap text-center">14.5</td>
                                                                        <td class="align-middle text-nowrap text-center">23</td>
                                                                        <td class="align-middle text-nowrap text-center">7</td>
                                                                        <td class="align-middle text-nowrap text-center">8</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--تصویر-->
                                            <div class="card g-brd-0 g-mb-15">
                                                <div id="accordion-02-heading-06" class="card-header g-pa-0" role="tab">
                                                    <h5 class="g-bg-white g-px-0 g-py-10 mb-0">
                                                        <a class="d-block u-link-v5 g-color-main g-color-primary--hover text-right collapsed" data-parent="#accordion-02"
                                                           href="#accordion-02-body-06"
                                                           data-toggle="collapse" aria-expanded="false" aria-controls="accordion-02-body-06"><i
                                                                class="icon-picture g-font-size-20 u-line-icon-pro g-ml-5"></i>روش اندازه گیری</a>
                                                    </h5>
                                                </div>
                                                <div id="accordion-02-body-06" class="collapse g-mt-5" role="tabpanel"
                                                     aria-labelledby="accordion-02-heading-06">
                                                    <div class="card-block g-pa-0 g-mb-10 g-mb-0--lg">
                                                        <div class="text-center">
                                                            <img class="img-fluid" src="{{asset('img/Other/sizeSeller.jpg')}}" alt="Image Description">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--رنگ--}}
                        <div class="form-group g-mb-20 text-right col-lg-3">
                            <label id="lblColor{{$i}}" class="g-mb-10">رنگ</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <div
                                    class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v5 rounded-0">
                                    <i class="fa fa-paint-brush g-font-size-14 g-line-height-0_7"></i>
                                </div>
                                <button id="colorBtn{{$i}}" style="direction: rtl" type="button" class="form-control g-color-primary--hover form-control-md btn u-btn-white g-brd-around g-brd-gray-light-v2 rounded-0 g-font-size-16" data-toggle="modal" data-target="#colorModal{{$i}}">
                                    انتخاب کنید
                                </button>
                                <div class="modal fade" id="colorModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="colorModal{{$i}}Title" aria-hidden="true">
                                    <div style="direction: rtl; max-width: 100%; margin: 0" class="modal-dialog" role="document">
                                        <div class="modal-content rounded-0">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="colorModalTitle">پالت رنگ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                    <div id="accordion-{{$i}}" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
                                                        <!-- White -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-01" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="d-block g-color-main g-text-underline--none--hover" href="#accordion-{{$i}}-body-01" data-toggle="collapse" data-parent="#accordion-{{$i}}" aria-expanded="true" aria-controls="accordion-{{$i}}-body-01">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سفید
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-01" class="collapse show" role="tabpanel" aria-labelledby="accordion-{{$i}}-heading-01">
                                                                <div id="0-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: white; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سفید</span>
                                                                    </div>
                                                                    <div style="background-color: #FFFAFA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">صورتی محو</span>
                                                                    </div>
                                                                    <div style="background-color: #F0FFF0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">یشمی محو</span>
                                                                    </div>
                                                                    <div style="background-color: #F5FFFA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سفید نعنائی</span>
                                                                    </div>
                                                                    <div style="background-color: #F0FFFF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی محو</span>
                                                                    </div>
                                                                    <div style="background-color: #F0F8FF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نیلی محو</span>
                                                                    </div>
                                                                    <div style="background-color: #F8F8FF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سفید بنفشه</span>
                                                                    </div>
                                                                    <div style="background-color: #F5F5F5; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکستری محو</span>
                                                                    </div>
                                                                    <div style="background-color: #FFF5EE; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بژ باز</span>
                                                                    </div>
                                                                    <div style="background-color: #F5F5DC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">هلی</span>
                                                                    </div>
                                                                    <div style="background-color: #FDF5D6; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بژ روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #FFFAF0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">پوست پیازی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFFFF0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">استخوانی</span>
                                                                    </div>
                                                                    <div style="background-color: #FAEBD7; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بژ تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #FAF0E6; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کتانی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFF0F5; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">صورتی مات</span>
                                                                    </div>
                                                                    <div style="background-color: #F5EDDA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بژ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Red -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-02" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover" href="#accordion-{{$i}}-body-02" data-toggle="collapse" data-parent="#accordion-{{$i}}" aria-expanded="false" aria-controls="accordion-{{$i}}-body-02">
                                                                    <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                      <i class="fa fa-plus"></i>
                                                                      <i class="fa fa-minus"></i>
                                                                    </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های قرمز
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-02" class="collapse" role="tabpanel" aria-labelledby="accordion-{{$i}}-heading-02">
                                                                <div id="1-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #6C2E1F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">جگری</span>
                                                                    </div>
                                                                    <div style="background-color: #F08080; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">مرجانی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #FA8072; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سالمون</span>
                                                                    </div>
                                                                    <div style="background-color: #FFA07A; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کرم نارنجی</span>
                                                                    </div>
                                                                    <div style="background-color: #FF0000; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">قرمز</span>
                                                                    </div>
                                                                    <div style="background-color: #990000; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">زرشکی</span>
                                                                    </div>
                                                                    <div style="background-color: #B22222; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شرابی</span>
                                                                    </div>
                                                                    <div style="background-color: #CD001A; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آلوبالویی</span>
                                                                    </div>
                                                                    <div style="background-color: #B84E59; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">عنابی تند</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Pink -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-03" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover" href="#accordion-{{$i}}-body-03" data-toggle="collapse" data-parent="#accordion-{{$i}}" aria-expanded="false" aria-controls="accordion-{{$i}}-body-03">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های صورتی
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-03" class="collapse" role="tabpanel" aria-labelledby="accordion-{{$i}}-heading-03">
                                                                <div id="2-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #FFC0CB; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">صورتی</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                    <div style="background-color: #FF68C4; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">صورتی پر رنگ</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                    <div style="background-color: #DB7093; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شرابی روشن</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                    <div style="background-color: #FF69B4; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سرخ آبی</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                    <div style="background-color: #FF00FF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سرخابی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #FF1493; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شفقی</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                    <div style="background-color: #C71585; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ارغوانی</span>
                                                                        <span class="d-none">{{$i}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Orange -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-04" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-04"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-04">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های نارنجی
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-04"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-04">
                                                                <div id="3-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #FFA07A; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کرم نارنجی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFA500; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نارنجی</span>
                                                                    </div>
                                                                    <div style="background-color: #FF8C00; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نارنجی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #FF7F50; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نارنجی پر رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #FF6347; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">قرمز گوجه ای</span>
                                                                    </div>
                                                                    <div style="background-color: #FF4500; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">قرمز نارنجی</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Yellow -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-05" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-05"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-05">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های زرد
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-05"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-05">
                                                                <div id="4-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #FFFFE0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شیری</span>
                                                                    </div>
                                                                    <div style="background-color: #FFFACD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شیری شکری</span>
                                                                    </div>
                                                                    <div style="background-color: #FAFAD2; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">لیمویی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #FFEFD5; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">هلویی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #FFE4B5; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">هلویی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFDAB9; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">هلویی پر رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #EEE8AA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نخودی</span>
                                                                    </div>
                                                                    <div style="background-color: #F0E683; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFFF00; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">زرد</span>
                                                                    </div>
                                                                    <div style="background-color: #FFD700; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">طلایی</span>
                                                                    </div>
                                                                    <div style="background-color: #BDB76B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ماشی</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Green -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-06" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-06"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-06">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سبز
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-06"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-06">
                                                                <div id="5-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #ADFF2F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">مغز پسته ای روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #7FFF00; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">مغز پسته ای</span>
                                                                    </div>
                                                                    <div style="background-color: #7CFc00; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">مغز پسته ای پر رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #00FF00; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز کم رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #98FB98; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز کدر</span>
                                                                    </div>
                                                                    <div style="background-color: #68c7a5; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">یشمی کم رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #00a86b; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">یشمی</span>
                                                                    </div>
                                                                    <div style="background-color: #004129; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">یشمی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #9ACD32; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز لجنی</span>
                                                                    </div>
                                                                    <div style="background-color: #32CD32; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز چمنی</span>
                                                                    </div>
                                                                    <div style="background-color: #3CB371; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خزه ای</span>
                                                                    </div>
                                                                    <div style="background-color: #2E8B57; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خزه ای پر نگ</span>
                                                                    </div>
                                                                    <div style="background-color: #228B22; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">شویدی</span>
                                                                    </div>
                                                                    <div style="background-color: #008000; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز</span>
                                                                    </div>
                                                                    <div style="background-color: #6B8E23; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز ارتشی</span>
                                                                    </div>
                                                                    <div style="background-color: #808000; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">زیتونی</span>
                                                                    </div>
                                                                    <div style="background-color: #556B2F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">زیتونی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #006400; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز آواکادو</span>
                                                                    </div>
                                                                    <div style="background-color: #66CDAA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز دریایی</span>
                                                                    </div>
                                                                    <div style="background-color: #40E0D0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز دریایی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #8FBC8F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز دریایی تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #20B2AA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز کبریتی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #008B8B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز کبریتی تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #008080; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سبز دودی</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Blue -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-07" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-07"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-07">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های آبی
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-07"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-07">
                                                                <div id="6-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #00FFFF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای</span>
                                                                    </div>
                                                                    <div style="background-color: #E0FFFF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی آسمانی</span>
                                                                    </div>
                                                                    <div style="background-color: #AFEEEE; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای کدر</span>
                                                                    </div>
                                                                    <div style="background-color: #00FFFF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای</span>
                                                                    </div>
                                                                    <div style="background-color: #48D1CC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #00CED1; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #B0E0E6; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی کبریتی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #B0C4DE; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی مایل به بنفش</span>
                                                                    </div>
                                                                    <div style="background-color: #ADD8E6; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی کبریتی</span>
                                                                    </div>
                                                                    <div style="background-color: #87CEFB; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی آسمانی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #87CEFA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #00BFFF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی کم رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #6495ED; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی کدر</span>
                                                                    </div>
                                                                    <div style="background-color: #4682B4; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نیلی متالیک</span>
                                                                    </div>
                                                                    <div style="background-color: #5F9EA0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی لجنی</span>
                                                                    </div>
                                                                    <div style="background-color: #7B68EE; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی متالیک روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #1E90FF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نیلی</span>
                                                                    </div>
                                                                    <div style="background-color: #4169E1; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">فیروزه ای فسفری</span>
                                                                    </div>
                                                                    <div style="background-color: #0000FF; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی</span>
                                                                    </div>
                                                                    <div style="background-color: #0000CD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #00008B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سرمه ای</span>
                                                                    </div>
                                                                    <div style="background-color: #000080; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">لاجوردی</span>
                                                                    </div>
                                                                    <div style="background-color: #191970; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی نفتی</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Magenta -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-08" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-08"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-08">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های بنفش
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-08"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-08">
                                                                <div id="7-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-30">
                                                                    <div style="background-color: #E6E6FA; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نیلی کم رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #D8BFD8; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بادمجانی روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #DDA0DD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بنفش کدر</span>
                                                                    </div>
                                                                    <div style="background-color: #EE82EE; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بنفش روشن</span>
                                                                    </div>
                                                                    <div style="background-color: #DA70D6; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ارکیده</span>
                                                                    </div>
                                                                    <div style="background-color: #BA55D3; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ارکیده سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #9370DB; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی بنفش</span>
                                                                    </div>
                                                                    <div style="background-color: #6A5ACD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی فولادی</span>
                                                                    </div>
                                                                    <div style="background-color: #8A2BE2; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی بنفش سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #9400D3; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بنفش باز</span>
                                                                    </div>
                                                                    <div style="background-color: #9932CC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ارکیده بنفش</span>
                                                                    </div>
                                                                    <div style="background-color: #8B008B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">مخملی</span>
                                                                    </div>
                                                                    <div style="background-color: #800080; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بنفش</span>
                                                                    </div>
                                                                    <div style="background-color: #483D8B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">آبی دودی</span>
                                                                    </div>
                                                                    <div style="background-color: #4B0082; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نیلی سیر</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Brown -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-09" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-09"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-09">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های قهوه ای
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-09"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-09">
                                                                <div id="8-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-09">
                                                                    <div style="background-color: #FFF8DC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کاهی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFEBCD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کاهگلی</span>
                                                                    </div>
                                                                    <div style="background-color: #755A36; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">حنایی</span>
                                                                    </div>
                                                                    <div style="background-color: #FFE4C4; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کرم</span>
                                                                    </div>
                                                                    <div style="background-color: #FFDEAD; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کرم سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #F5DEBC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">گندمی</span>
                                                                    </div>
                                                                    <div style="background-color: #DEB887; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکی</span>
                                                                    </div>
                                                                    <div style="background-color: #D2B48C; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">برنزه ای کدر</span>
                                                                    </div>
                                                                    <div style="background-color: #BC8F8F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بادمجانی</span>
                                                                    </div>
                                                                    <div style="background-color: #F4A460; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">هلویی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #DAA520; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خردلی</span>
                                                                    </div>
                                                                    <div style="background-color: #B8860B; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ماشی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #CD853F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">بادامی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #D2691E; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">عسلی پر رنگ</span>
                                                                    </div>
                                                                    <div style="background-color: #3A1D04; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">کاکائویی</span>
                                                                    </div>
                                                                    <div style="background-color: #A0522D; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">قهوه ای متوسط</span>
                                                                    </div>
                                                                    <div style="background-color: #663D14; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">قهوه ای</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Black -->
                                                        <div class="card rounded-0 g-brd-none">
                                                            <div id="accordion-{{$i}}-heading-10" class="u-accordion__header g-pa-0" role="tab">
                                                                <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                                                                    <a class="collapsed d-block g-color-main g-text-underline--none--hover"
                                                                       href="#accordion-{{$i}}-body-10"
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordion-{{$i}}"
                                                                       aria-expanded="false"
                                                                       aria-controls="accordion-{{$i}}-body-10">
                                                                        <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-primary text-center g-pa-20">
                                                                          <i class="fa fa-plus"></i>
                                                                          <i class="fa fa-minus"></i>
                                                                        </span>
                                                                        <span class="d-inline-block g-pa-15">
                                                                          خانواده رنگ های سیاه
                                                                        </span>
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                            <div id="accordion-{{$i}}-body-10"
                                                                 class="collapse"
                                                                 role="tabpanel"
                                                                 aria-labelledby="accordion-{{$i}}-heading-10">
                                                                <div id="9-{{$i}}" class="u-accordion__body g-bg-gray-light-v5 g-px-50 g-py-09">
                                                                    <div style="background-color: #DCDCDC; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکستری مات</span>
                                                                    </div>
                                                                    <div style="background-color: #D3D3D3; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">نقره ای</span>
                                                                    </div>
                                                                    <div style="background-color: #C0C0C0; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">توسی</span>
                                                                    </div>
                                                                    <div style="background-color: #A9A9A9; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکستری سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #808080; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">خاکستری</span>
                                                                    </div>
                                                                    <div style="background-color: #696969; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">دودی</span>
                                                                    </div>
                                                                    <div style="background-color: #778899; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سربی</span>
                                                                    </div>
                                                                    <div style="background-color: #708090; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سربی تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #2F4F4F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">لجنی تیره</span>
                                                                    </div>
                                                                    <div style="background-color: #36454F; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ذغالی</span>
                                                                    </div>
                                                                    <div style="background-color: #1E1E1E; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">ذغالی سیر</span>
                                                                    </div>
                                                                    <div style="background-color: #0e0e0e; cursor: pointer"
                                                                         class="customTooltip g-pa-15 g-brd-around g-brd-gray-light-v3 g-ml-1 g-brd-primary--hover">
                                                                        <span class="toolTipText">سیاه</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <select
                                    class="d-none form-control form-control-md custom-select rounded-0 g-font-size-16 text-right h-25"
                                    id="color{{$i}}" name="color{{$i}}">
                                    <option value="" selected="selected"></option>
                                </select>
                                <input class="d-none" type="text" value="" id="hexCode{{$i}}" name="hexCode{{$i}}">
                            </div>
                        </div>

                        {{--موجودی--}}
                        <div class="form-group g-mb-0 text-right col-lg-3">
                            <label class="g-mb-10">تعداد موجود</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <div
                                    class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                    <i class="fa fa-ellipsis-v"></i>
                                </div>
                                <select
                                    class="form-control form-control-md custom-select rounded-0 text-right h-25 g-font-size-16"
                                    id="qty{{$i}}"
                                    tabindex="5+{{ $i }}"
                                    name="sizeQty{{$i}}">
                                    @for ($j = 1; $j<= 10; $j++)
                                        <option
                                            value="{{$j}}">{{$j}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        {{--تصویر--}}
                        <div id="colorImgDiv{{$i}}" class="form-group g-mb-0 text-right col-lg-3">
                            <label class="g-mb-10" for="{{ 'fileShow'.$i }}" id="{{ 'img-file-label'.$i }}">تصویر محصول
                                <span id="{{ 'productColorImg'.$i }}"></span></label>
                            <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                                 <span style="cursor: default"
                                       class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                                       id="uploadingIcon"{{$i}}><i class="fa fa-spinner fa-spin"></i></span>
                                <input style="direction: rtl" id="uploadingIcon{{$i}}"
                                       class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                       type="text"
                                       placeholder="درحال بارگذاری.." readonly="">
                                <input id="{{ 'fileShow'.$i }}"
                                       class="form-control form-control-md rounded-0 g-font-size-16 g-px-5 text-right"
                                       type="text"
                                       placeholder="فاقد تصویر" readonly="">

                                <div class="input-group-btn">
                                    <button class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">
                                        <i class="icon-camera align-middle g-font-size-20"></i>
                                    </button>
                                    <input id="{{ 'pic'.$i }}"
                                           onclick="$('#fileShow{{$i}}').removeClass('g-brd-lightred')"
                                           type="file"
                                           name="{{ 'pic'.$i }}"
                                           accept="image/*">
                                    <input type="text" id="{{ 'imageUrl'.$i }}" name="{{ 'imageUrl'.$i }}"
                                           style="display: none">
                                </div>
                            </div>
                        </div>
                        <div id="repeatColorMsg{{$i}}" class="d-none form-group g-mb-0 text-right col-lg-3">
                            <label class="g-mb-10">تصویر محصول</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <div class="form-control form-control-md rounded-0 g-font-size-16 g-px-5 text-center g-bg-primary g-color-white g-brd-none">
                                    <span>تصویر موجود است</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
                    <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
                @endfor
            </div>

            <!-- UnitPrice -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblUnitPrice" class="g-mb-10">قیمت پایه محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="fa fa-i-cursor"></i>
                    </div>
                    <span class="input-group-addon g-bg-gray-light-v5">تومان</span>
                    <input class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           tabindex="6"
                           name="unitPrice"
                           id="unitPrice"
{{--                           pattern="\d*"--}}
                           onkeypress="$('#lblUnitPrice').removeClass('g-color-red')"
                           value="">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">کمترین مقدار 10000 تومان می
                        باشد.</b>
                    <input style="display: none" type="number" name="tempPrice" id="tempPrice"
                           value="">
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">قیمت پایه، قیمتی است که بدون در نظر گرفتن تخفیف ذکر می
                        شود.</small>
                </div>
            </div>
            <!-- End UnitPrice -->

            <!-- Discount -->
            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <div class="form-group g-mb-20 text-right">
                <label id="lblDiscount" class="g-mb-10">تخفیف قیمت محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <span class="input-group-addon g-bg-gray-light-v5 bigDevice" id="toman">تومان</span>
                    <span style="direction: rtl; width: 35%"
                          class="input-group-addon g-bg-gray-light-v5 bigDevice g-color-primary"
                          id="BsalePrice">...</span>
                    <span class="input-group-addon g-bg-gray-light-v5 bigDevice" id="lblSalePrice">قیمت فروش</span>
                    <span class="input-group-addon g-bg-gray-light-v5">درصد</span>
                    <input class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           id="discount"
                           tabindex="7"
                           name="discount"
                           pattern="\d*"
                           value=""
                           onkeypress="$('#lblDiscount').removeClass('g-color-red')"
                           maxlength="2">
                    <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">تخفیف عددی مابین 1 تا 99 می
                        باشد.</b>
                </div>
                <!-- Discount for Small Device -->
                <div class="g-brd-primary--focus g-mb-10 smallFlex">
                    <span style="width: 20%;" class="input-group-addon g-bg-gray-light-v5" id="Stoman">تومان</span>
                    <span style="direction: rtl; width: 40%;"
                          class="input-group-addon g-bg-gray-light-v5 g-color-primary"
                          tabindex="7"
                          id="SsalePrice">...</span>
                    <span style="width: 40%;" class="input-group-addon g-bg-gray-light-v5"
                          id="SlblSalePrice">قیمت فروش</span>
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">عددی را که در این قسمت قید می کنید بر اساس درصد محاسبه شده
                        و از قیمت پایه کسر می گردد و عدد مانده به عنوان قیمت فروش به دید مشتری می رسد.</small><br>
                    <small class="text-muted g-font-size-12">تخفیف می تواند مشتریان را به خود جلب کند.</small>
                </div>
            </div>
            <!-- End Discount -->

            <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
            <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
            <!-- File Input -->
            <div id="imgContainer" class="form-group  text-right">
                <label class="g-mb-10" for="{{ 'fileShow11' }}" id="{{ 'img-file-label11' }}">تصویر از نمایی دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="cursor: default"
                          class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="uploadingIcon11"><i class="fa fa-spinner fa-spin"></i></span>
                    <input style="direction: rtl" id="uploadingText11"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="درحال بارگذاری.." readonly="">
                    <input id="{{ 'fileShow11' }}" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">
                            <i class="icon-camera align-middle g-font-size-20"></i>
                        </button>
                        <input id="{{'pic11'}}"
                               onclick="$('#fileShow11').removeClass('g-brd-lightred')"
                               type="file"
                               name="{{'pic11'}}"
                               accept="image/*">
                        <input type="text" id="{{'imageUrl11'}}" name="{{'imageUrl11'}}" style="display: none">
                    </div>
                </div>
                <label class="g-mb-10" for="{{ 'fileShow12' }}" id="{{ 'img-file-label12' }}">تصویر از نمایی دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                   <span style="cursor: default"
                         class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                         id="uploadingIcon12"><i class="fa fa-spinner fa-spin"></i></span>
                    <input style="direction: rtl" id="uploadingText12"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="درحال بارگذاری.." readonly="">
                    <input id="{{ 'fileShow12' }}" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="9" type="submit">
                            <i class="icon-camera align-middle g-font-size-20"></i>
                        </button>
                        <input id="{{ 'pic12' }}"
                               onclick="$('#fileShow12').removeClass('g-brd-lightred')"
                               type="file"
                               name="{{ 'pic12' }}"
                               accept="image/*">
                        <input type="text" id="{{ 'imageUrl12' }}" name="{{ 'imageUrl12' }}" style="display: none">
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div style="direction:rtl;" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">برش تصویر</h5>
                                <button type="button" class="close"
                                        data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="col-md-12 p-0">
                                        <img style="width: 100%;" src="" id="sample_image">
                                    </div>
                                    {{--                        <div class="col-md-4">--}}
                                    {{--                            <div class="preview rounded-circle mx-auto g-mt-20"></div>--}}
                                    {{--                        </div>--}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button"
                                        class="btn btn-secondary rounded-0 g-ml-5" data-dismiss="modal">انصراف
                                </button>
                                <button type="button" id="crop" class="btn btn-primary rounded-0">برش</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">اگر مایل هستید از نماهای دیگر محصول تصویر اضافه کنید از این قسمت بهره ببرید.</small><br>
                    <small class="text-muted g-font-size-12">لطفا تصاویر را بر اساس قوانین تانا استایل اضافه نمایید تا
                        محصولتان بهتر دیده شود.<a class="g-color-primary g-font-size-13"
                                                  href="#">قوانین</a></small><br>
                </div>

                <br><br><br>
                <div class="text-left">
                    <!-- Danger Alert -->
                    <div style="direction: rtl" id="errorMsg" class="d-none alert alert-danger g-mt-20 text-right"
                         role="alert">
                        <strong>اشتباهی رخ داده است!</strong> لطفا فرم فوق را بررسی و اشتباهات موجود در فرم را اصلاح
                        نمایید.
                    </div>
                    <!-- End Danger Alert -->
                    <button id="addProductBtn" type="submit" class="btn btn-md u-btn-primary rounded-0 g-pa-20--lg"
                            tabindex="12">
                        <span class="fa fa-save g-mr-10 g-font-size-16"></span>افزودن به انبار
                    </button>
                </div>
            </div>
            <!-- End File Input -->
            <input id="folderName2" name="folderName2" type="text" class="d-none">
        </form>

    </div>
    <form action="{{route('sellerProductImage')}}" id="imageUploadForm"
          method="post" enctype="multipart/form-data">
        @csrf
        <input id="folderName" name="folderName" type="text" class="d-none">
        <input id="imgNumber" name="imgNumber" type="text" class="d-none">
    </form>
@endsection

