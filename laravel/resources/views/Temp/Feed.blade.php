@extends('Layouts.IndexSeller')

@section('Content')
    <!-- End Info Panel -->
    <div class="container p-lg-5 g-mt-10 gmb-10 modalBox">

        {{--        Header--}}
        <h3 class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
            مشخصات محصول<span class="g-mx-5">@switch($gender) @case(0) {{$name.' زنانه '}} @break @case(1) {{$name.' مردانه '}} @break @case(2) {{$name.' دخترانه '}} @break @case(3){{$name.' پسرانه '}}@break @case(4){{$name.' دخترانه نوزادی '}}@break @case(4){{$name.' پسرانه نوزادی '}}@break @endswitch</span><i class="fa fa-plus-square g-ml-5"></i>
        </h3>

        <!-- Text Input Tooltips -->
        <form id="addProductForm" action="{{ route('SaveProduct')}}" method="post" enctype='multipart/form-data'
              class="g-brd-around g-brd-gray-light-v4 g-pa-30--lg g-mb-30 smallDevicePadding-20">
        @csrf
        <!-- Hidden Input-->
            <input style="display: none" type="text" name="cat" value="{{$cat}}">
            <input style="display: none" type="text" name="catCode" value="{{$catCode}}">
            <input style="display: none" type="number" name="gender" value="{{$gender}}">

            <!-- Name -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- Model -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- Brand -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- Detail -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- Size Group -->
            <div style="direction: rtl" class="g-mb-15"></div>
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
                        <div class="form-group g-mb-20 text-right col-lg-3"></div>
                        {{--راهنمای سایز--}}
                        <div style="direction: rtl" class="modal fade" id="sizeInformation" tabindex="-1" role="dialog" aria-labelledby="sizeInformationTitle" aria-hidden="true"></div>

                        {{--رنگ--}}
                        <div class="form-group g-mb-20 text-right col-lg-3"></div>

                        {{--موجودی--}}
                        <div class="form-group g-mb-20 text-right col-lg-3"></div>

                        {{--تصویر--}}
                        <div id="colorImgDiv{{$i}}" class="form-group g-mb-0 text-right col-lg-3">
                            <label class="g-mb-10 g-color-gray-dark-v3" for="{{ 'fileShow'.$i }}" id="{{ 'img-file-label'.$i }}">تصویر محصول
                                <span id="{{ 'productColorImg'.$i }}"></span></label>
                            <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                                    <span style="cursor: default"
                                          class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                                          id="check{{$i}}"><i class="fa fa-check"></i></span>
                                <span style="cursor: default"
                                      class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                                      id="uploadingIcon{{$i}}"><i class="fa fa-spinner fa-spin"></i></span>
                                <span style="cursor: default"
                                      class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                                      id="errorIcon{{$i}}"><i class="fa fa-exclamation-circle"></i></span>
                                <input style="direction: rtl" id="errorText{{$i}}"
                                       class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                       type="text"
                                       placeholder="ناموفق" readonly="">
                                <input style="direction: rtl" id="uploadingText{{$i}}"
                                       class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                       type="text"
                                       placeholder="..." readonly="">
                                <input id="{{ 'fileShow'.$i }}"
                                       class="form-control form-control-md rounded-0 g-font-size-16 g-px-5 text-right"
                                       type="text"
                                       placeholder="فاقد تصویر" readonly="">

                                <div class="input-group-btn">
                                    <button id="{{ 'iconCamera'.$i }}" class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">
                                        <i class="icon-camera align-middle g-font-size-20"></i>
                                    </button>
                                    <input id="{{ 'pic'.$i }}"
                                           onclick="$('#fileShow{{$i}}').removeClass('g-brd-lightred')"
                                           type="file"
                                           name="{{ 'pic'.$i }}"
                                           accept="image/*">
                                </div>
                            </div>
                            <div style="direction: rtl">
                                <p class="text-muted g-font-size-12 g-line-height-1_5">لطفا تا پایان بارگذاری عکس، صفحه را ترک نفرمائید.</p><br>
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

                    <!-- sizeDetail -->
                    <h6 class="text-right">در صورت وجود مشخصات، این قسمت را پر کنید</h6>
                    <div style="direction: rtl" class="d-none m-0 col-12 g-pb-15 g-pb-20--lg row sizeDetailContainer justify-content-right g-brd-around g-brd-gray-light-v3 g-pa-20">
                        <div id="sizeDetail{{$i}}" class="{{(($name==='سوتین')||($name==='ست لباس زیر'))&&($gender==='0'||$gender==='2')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> دور سوتین</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ ($catCode==='c' || $catCode==='d'|| $catCode==='i' || $catCode==='j')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> سرشانه</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{($name==='زیر پوش'||$name==='گن'||$catCode==='c'|| $catCode==='i'|| $catCode==='d'|| $catCode==='j'||($gender==='1'&&$name==='ست لباس زیر'))&& $name!=='گن'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> دور سینه</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{$name==='زیر پوش'||$name==='گن'||$cat==='00' || $catCode==='c' || $cat==='02' || $cat==='03'|| $cat==='04' || $catCode==='b' || $catCode==='g'|| $catCode==='h'|| $catCode==='i'|| $catCode==='d'|| $catCode==='j'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> دور کمر</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{($name==='زیر پوش'||$name==='گن' || $catCode==='i' || $catCode==='d'|| $catCode==='j')&& $name!=='گن'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> دور شکم</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{($cat==='00' || $cat==='02' || $cat==='03'|| $cat==='04' || $catCode==='b' || $catCode==='g'|| $catCode==='h')&&($name!=='زیر پوش')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> دور باسن</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ ($catCode==='c' || $catCode==='d'|| $catCode==='i' || $catCode==='j')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> آستین</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ ($cat==='00' || $cat==='03'|| $cat==='04' || $catCode==='b' || $catCode==='c' || $catCode==='g'|| $catCode==='h'|| $catCode==='d'|| $catCode==='j'||($gender==='1'&&$name==='ست لباس زیر'))&&($name!=='زیر پوش')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> قد</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{($cat==='00' || $cat==='02' || $cat==='03'|| $cat==='04' || $catCode==='b' || $catCode==='g'|| $catCode==='h')&&($name!=='زیر پوش')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> قد فاق</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{($cat==='00' || $cat==='02' || $cat==='03'|| $cat==='04' || $catCode==='b' || $catCode==='g'|| $catCode==='h')&&($name!=='زیر پوش')?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title">اندازه دمپا</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $catCode==='e' || $catCode==='f'|| $catCode==='k'|| $catCode==='l'|| $name==='گردنبند'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> طول</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $catCode==='e' || $catCode==='k'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> عرض</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $catCode==='e' || $catCode==='k'?'parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> عمق</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $name==='النگو' || $name==='انگشتر' ?' parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title"> قطر</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $name==='عینک' ? ' parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title">فاصله دو دسته</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $name==='عینک' ? ' parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title">اندازه عدسی</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                        <div id="sizeDetail{{$i}}" class="{{ $name==='عینک' ? ' parentShow':'d-none'}} input-group col-lg-3 col-12 g-mb-5 p-0 g-ml-5 sizeDetail">
                            <span style="border-right: 1px solid lightgrey" class="input-group-addon g-bg-gray-light-v5 g-brd-left-none title">اندازه پل بینی</span>
                            <input class="form-control form-control-md rounded-0 text-center value g-font-size-16 sizeDetailInput" type="text" value="" pattern="\d*">
                            <span  style="border-left: 1px solid lightgrey" class="unitSize input-group-addon g-bg-gray-light-v5 g-brd-right-none">mm</span>
                        </div>
                    </div>
                    <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
                    <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
                @endfor
            </div>

            <!-- UnitPrice -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- Discount -->
            <div class="form-group g-mb-20 text-right"></div>

            <!-- smallDevice -->
            <div class="form-group g-mb-20 text-right smallDevice"></div>

            <!-- bigDevice -->
            <div class="form-group g-mb-20 text-right bigDevice"></div>

            <!-- تصویر از نمایی دیگر -->
            <div id="imgContainer" class="form-group  text-right">
                <label class="g-mb-10" for="{{ 'fileShow11' }}" id="{{ 'img-file-label11' }}">تصویر از نمایی دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                       <span style="cursor: default"
                             class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                             id="check11"><i class="fa fa-check"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="uploadingIcon11"><i class="fa fa-spinner fa-spin"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                          id="errorIcon11"><i class="fa fa-exclamation-circle"></i></span>
                    <input style="direction: rtl" id="errorText11"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="ناموفق" readonly="">
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
                    </div>
                </div>
                <label class="g-mb-10" for="{{ 'fileShow12' }}" id="{{ 'img-file-label12' }}">تصویر از نمایی دیگر</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                       <span style="cursor: default"
                             class="d-none align-self-center g-bg-primary g-brd-around g-brd-primary
                                        g-pa-10 g-color-white"
                             id="check12"><i class="fa fa-check"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="uploadingIcon12"><i class="fa fa-spinner fa-spin"></i></span>
                    <span style="cursor: default"
                          class="d-none align-self-center g-bg-lightred g-brd-around g-brd-lightred
                                        g-pa-10 g-color-white"
                          id="errorIcon12"><i class="fa fa-exclamation-circle"></i></span>
                    <input style="direction: rtl" id="errorText12"
                           class="d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                           type="text"
                           placeholder="ناموفق" readonly="">
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
                    </div>
                </div>
                <div style="direction: rtl" class="modal fade" id="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-fullscreen mx-set" role="document">
                        <div style="height: 100vh;" class="modal-content d-flex flex-column">
                            <div class="modal-header">
                                <h5 class="modal-title">برش تصویر</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body p-0 flex-grow-1 d-flex flex-column">
                                <div class="img-container flex-grow-1">
                                    <img id="sample_image" class="w-100 h-100" style="object-fit:contain;">
                                </div>
                                <!-- دکمه‌های ابزار -->
                                <div class="cropper-tools text-center py-2 g-bg-white">
                                    <button type="button" class="btn btn-light btn-sm" id="zoomIn">🔍+</button>
                                    <button type="button" class="btn btn-light btn-sm" id="zoomOut">🔍-</button>
                                    <button type="button" class="btn btn-light btn-sm" id="rotateLeft">↩️</button>
                                    <button type="button" class="btn btn-light btn-sm" id="rotateRight">↪️</button>
                                    <button type="button" class="btn btn-light btn-sm" id="reset">♻️</button>
                                </div>
                            </div>

                            <div class="modal-footer g-bg-white">
                                <button type="button" class="btn btn-secondary rounded-0 g-ml-5 g-py-15 g-px-20" data-dismiss="modal">انصراف</button>
                                <button type="button" id="crop" class="btn btn-primary rounded-0 g-py-15 g-px-20">برش</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">لطفا تا پایان بارگذاری عکس این صفحه را ترک نفرمائید.</small><br>
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
                        <span class="fa fa-save g-mr-10 g-font-size-16"></span><span style="direction: rtl" id="addProductBtnCaption" >افزودن به انبار</span>
                    </button>
                </div>
            </div>

            <input id="folderName2" name="folderName2" type="text" class="d-none">
        </form>

    </div>
@endsection


