@extends('Layouts.IndexSeller')

@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>افزودن مشخصات محصول
        </h3>
    </div>
    <!-- End Info Panel -->
    <div class="container p-lg-5 g-mt-10 gmb-10">

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
            <input style="display: none" type="number" name="gender" value="{{$gender}}">

            <!-- Name -->
            <div class="form-group g-mb-20 text-right">
                <label class="g-mb-10">نام محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="icon-info"></i>
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
                        <i class="icon-info"></i>
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
                        <i class="fa fa-ellipsis-v"></i>
                    </div>
                    <select class="form-control form-control-md custom-select rounded-0 text-right h-25 g-font-size-16"
                            tabindex="3"
                            id="addProductBrand"
                            onchange="$('#lblBrand').removeClass('g-color-red')"
                            name="brand">
                        <option value="---">---</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Nike">Nike</option>
                        <option value="D&G">D&G</option>
                        <option value="H&M">H&M</option>
                        <option value="Breshka">Breshka</option>
                        <option value="Sprit">Sprit</option>
                        <option value="Kiabi">Kiabi</option>
                        <option value="Lupillo">Lupillo</option>
                        <option value="FreeBrand">FreeBrand</option>
                    </select>

                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">برند هویت محصول شماست.</small><br>
                    <small class="text-muted g-font-size-12">اگر محصولتان برند ندارد مقدار FreeBrand را انتخاب
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
                        <i class="icon-info"></i>
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
                <small class="text-muted g-font-size-12">لطفا برای بهتر دیده شدن و فروش بهتر یکبار جدول رنگها را
                    مطالعه فرمایید.</small><a class="g-color-primary g-font-size-12" href="#">جدول رنگها</a><br>
            </div>
            {{--Hidden Input--}}
            <input style="display: none" type="number" name="qty" id="addProductSizeQty" value="{{ $qty }}">
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
                        <div class="form-group g-mb-10 text-right col-lg-4">
                            <label class="g-mb-10">سایز</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                @if ($size === 1)
                                    <div class="input-group g-brd-primary--focus g-mb-10">
                                        <div
                                            class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-info"></i>
                                        </div>
                                        <input
                                            class="form-control form-control-md rounded-0 pl-0 text-right g-bg-gray-light-v5 g-font-size-16"
                                            type="text"
                                            name="size1" value="بدون سایز" readonly="">
                                        <b style="direction: rtl" class="tooltip tooltip-top-left u-tooltip--v1">سایزبندی
                                            برای این محصول وجود ندارد.</b>
                                    </div>
                                @else
                                    <div
                                        class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </div>
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
                                @endif
                            </div>
                        </div>
                        <div class="form-group g-mb-20 text-right col-lg-4">
                            <label class="g-mb-10">رنگ</label>
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <div
                                    class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                    <i class="fa fa-ellipsis-v"></i>
                                </div>
                                <select
                                    class="form-control form-control-md custom-select rounded-0 g-font-size-16 text-right h-25"
                                    id="color{{$i}}" name="color{{$i}}">
                                    <option value="سفید">سفید
                                    </option>
                                    <option value="مشکی">مشکی
                                    </option>
                                    <option value="قرمز">قرمز
                                    </option>
                                    <option value="زرد">زرد</option>
                                    <option value="سبز">سبز</option>
                                    <option value="آبی">آبی</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group g-mb-0 text-right col-lg-4">
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
                    </div>
                    <hr class="g-brd-gray-light-v4 g-mx-minus-30 bigDevice">
                    <hr class="g-brd-gray-light-v4 g-mx-minus-20 smallDevice">
                @endfor
            </div>
            <!-- End Size Group -->

            <!-- UnitPrice -->
            <div class="form-group g-mb-20 text-right">
                <label id="lblUnitPrice" class="g-mb-10">قیمت پایه محصول</label>
                <div class="input-group g-brd-primary--focus g-mb-10">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                        <i class="icon-info"></i>
                    </div>
                    <span class="input-group-addon g-bg-gray-light-v5">تومان</span>
                    <input class="form-control form-control-md rounded-0 pl-0 text-right g-font-size-16" type="text"
                           tabindex="6"
                           name="unitPrice"
                           id="unitPrice"
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
            <div class="form-group  text-right">
                <h5 class="g-mb-10">اضافه کردن تصویر برای محصول</h5>
                <label class="g-mb-10" for="fileShow1" id="custom-file-label">تصویر شماره 1</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check1"></span>
                    <input id="fileShow1" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="8" type="submit">اضافه کردن
                        </button>
                        <input id="pic1"
                               onchange="addPathCheckMark('pic1','fileShow1','Check1')"
                               onclick="$('#fileShow1').removeClass('g-brd-lightred')"
                               type="file"
                               name="pic1"
                               accept="image/jpg,image/png,image/jpeg,image/gif">
                    </div>
                </div>

                <label class="g-mb-10" for="fileShow2" id="custom-file-label">تصویر شماره 2</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check2"></span>
                    <input id="fileShow2" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="9" type="submit">اضافه کردن
                        </button>
                        <input id="pic2"
                               onchange="addPathCheckMark('pic2','fileShow2','Check2')"
                               onclick="$('#fileShow2').removeClass('g-brd-lightred')"
                               type="file"
                               name="pic2"
                               accept="image/jpg,image/png,image/jpeg,image/gif">
                    </div>
                </div>

                <label class="g-mb-10" for="fileShow3" id="custom-file-label">تصویر شماره 3</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check3"></span>
                    <input id="fileShow3" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="10" type="submit">اضافه کردن
                        </button>
                        <input id="pic3"
                               onchange="addPathCheckMark('pic3','fileShow3','Check3')"
                               type="file"
                               onclick="$('#fileShow3').removeClass('g-brd-lightred')"
                               name="pic3"
                               accept="image/jpg,image/png,image/jpeg,image/gif">
                    </div>
                </div>

                <label class="g-mb-10" for="fileShow4" id="custom-file-label">تصویر شماره 4</label>
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2 g-mb-20">
                    <span style="display: none; cursor: default"
                          class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                          id="Check4"></span>
                    <input id="fileShow4" class="form-control form-control-md rounded-0 g-font-size-16" type="text"
                           placeholder="فاقد تصویر" readonly="">

                    <div class="input-group-btn">
                        <button class="btn btn-md u-btn-primary rounded-0" tabindex="11" type="submit">اضافه کردن
                        </button>
                        <input id="pic4"
                               onchange="addPathCheckMark('pic4','fileShow4','Check4')"
                               type="file"
                               onclick="$('#fileShow4').removeClass('g-brd-lightred')"
                               name="pic4"
                               accept="image/jpg,image/png,image/jpeg,image/gif">
                    </div>
                </div>

                <div style="direction: rtl">
                    <small class="text-muted g-font-size-12">افزودن چهار تصویر الزامی می باشد.</small><br>
                    <small class="text-muted g-font-size-12">لطفا تصاویر را بر اساس قوانین تانا استایل اضافه نمایید تا
                        محصولتان بهتر دیده شود.<a class="g-color-primary g-font-size-13"
                                                  href="#">قوانین</a></small><br>
                    <small class="text-muted g-font-size-12 g-font-weight-600">اگر رنگهای متفاوتی از یک محصول
                        دارید:</small><br>
                    <small class="text-muted g-font-size-12">برای بهتر دیده شدن و فروش بهتر محصول، همه ی رنگها را کنار
                        هم چیده و در یکی از تصاویر جا دهید.</small><br>
                </div>

                <br><br><br>
                <div class="text-left">
                    <!-- Danger Alert -->
                    <div style="direction: rtl" id="errorMsg" class="d-none alert alert-danger g-mt-20 text-right" role="alert">
                        <strong>اشتباهی رخ داده است!</strong> لطفا فرم فوق را بررسی و اشتباهات موجود در فرم را اصلاح نمایید.
                    </div>
                    <!-- End Danger Alert -->
                    <button id="addProductBtn" type="submit" class="btn btn-md u-btn-primary rounded-0 g-pa-20--lg"
                            tabindex="12">
                        <span class="fa fa-save g-mr-10 g-font-size-16"></span>افزودن به انبار
                    </button>
                </div>
            </div>
            <!-- End File Input -->
        </form>
    </div>
@endsection

