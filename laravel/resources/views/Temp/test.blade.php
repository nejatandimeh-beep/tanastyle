@extends('Layouts.IndexCustomer')
@section('Content')

    <div style="direction: rtl" class="g-mx-80--lg g-mt-40 g-mb-25 g-px-10">
        <div class="text-left g-pt-10 g-brd-top g-brd-gray-light-v3">
            <a href="#modal17"
               id="newAddressLink"
               onclick="manuelFocus(); $(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
               data-modal-target="#modal17"
               data-modal-effect="slidetogether"
               class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15">
                افزودن آدرس جدید
            </a>
            <!-- Demo modal window -->
            <div id="modal17"
                 class="text-left g-bg-white SubMenuScroll"
                 style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                <form id="addAddress" action="{{route('addAddress')}}" method="POST">
                    @csrf
                    <input id="productIDFromBuy" name="productIDFromBuy" class="d-none" value="empty">
                    <div class="sticky-top g-bg-white g-px-20">
                        <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                            <button style="outline: none" type="button" class="close"
                                    onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix'); setTimeout(function () {$('#filter-user-address').trigger('click')}, 400);">
                                <i class="hs-icon hs-icon-close"></i>
                            </button>
                            <h6 class="text-right m-0">افزودن آدرس جدید</h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0">
                    </div>
                    <div style="direction: rtl; overflow-y: auto"
                         class="g-px-20 g-px-60--lg text-right g-py-0">
                        <p style="text-align: justify;" class="g-pb-15 g-mb-0 g-mb-20--lg"><span
                                class="g-font-weight-600 g-ml-10">{{ Auth::user()->name }} عزیز</span>آدرس
                            جدید بصورت خودکار فعال خواهد شد و از این پس محصولات به این آدرس ارسال
                            می گردد. (می توانید در هر زمان از طریق منوی آدرس ها آدرس دیگری را فعال
                            کنید). </p>
                        {{--نام گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label
                                class="col-sm-2 col-form-label align-self-center">نام
                                گیرنده</label>
                            <div class="col-sm-10 force-col-12">
                                <input
                                    id="receiver-name"
                                    class="form-control form-control-md rounded-0 g-bg-white g-font-size-16 focusInput"
                                    name="receiver-name"
                                    maxlength="15"
                                    type="text"
                                    value=""
                                    placeholder="الزاماً فارسی"
                                    {{--                                           lang="fa"--}}
                                    onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                        } else
                                                        $(this).attr('autocomplete', 'name');">
                            </div>
                        </div>
                        {{--نام خانوادگی گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label
                                class="col-sm-2 col-form-label align-self-center">نام خانوادگی
                            </label>
                            <div class="col-sm-10 force-col-12">
                                <input
                                    class="form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                    type="text"
                                    name="receiver-family"
                                    maxlength="15"
                                    value=""
                                    placeholder="الزاماً فارسی"
                                    {{--                                           lang="fa"--}}
                                    onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                        } else
                                                        $(this).attr('autocomplete', 'name');">
                            </div>
                        </div>
                        {{--کد پستی گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label class="col-sm-2 col-form-label align-self-center">کد
                                پستی</label>
                            <div class="col-sm-10 force-col-12">
                                <input style="direction: ltr"
                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16 forceEnglishNumber"
                                       name="receiver-postalCode"
                                       oninput="forceEnglishNumber($(this).val(), $(this),'receiver-prePhone-new')"
                                       type="number"
                                       pattern="\d*"
                                       value=""
                                       placeholder="فقط اعداد">
                            </div>
                        </div>
                        {{--تلفن ثابت گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label class="col-sm-2 col-form-label align-self-center">تلفن
                                ثابت</label>
                            <div class="col-sm-10 force-col-12 d-flex">
                                <input style="width: 70%; direction: ltr"
                                       id="receiver-phone-new"
                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16 forceEnglishNumber"
                                       name="receiver-phone"
                                       onKeyPress="if(this.value.length===8) return $('#receiverNewMobile').focus()"
                                       type="number"
                                       pattern="\d*"
                                       value=""
                                       placeholder="xxxxxxxx">
                                <input style="width: 30%; direction: ltr"
                                       id="receiver-prePhone-new"
                                       name="receiver-prePhone"
                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-brd-right-none g-font-size-16 forceEnglishNumber"
                                       value=""
                                       oninput="if($(this).val().length === 3) $('.custombox-content #receiver-phone-new').focus();"
                                       type="number"
                                       pattern="\d*"
                                       placeholder="0xx">
                            </div>
                        </div>
                        {{--موبایل گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label style="direction: ltr"
                                   class="col-sm-2 col-form-label align-self-center">موبایل</label>
                            <div class="col-sm-10 force-col-12">
                                <input
                                    id="receiverNewMobile"
                                    class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16 forceEnglishNumber"
                                    name="receiver-mobile"
                                    onKeyPress="if(this.value.length===11) return false"
                                    type="number"
                                    pattern="\d*"
                                    placeholder="09xxxxxxxx"
                                    value="">
                            </div>
                        </div>
                        {{--آدرس سکونت گیرنده--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label
                                class="col-sm-2 col-form-label align-self-center">استان/شهر</label>
                            <div class="col-sm-10 force-col-12">
                                <div class="d-flex">
                                    <select id="stateSelectReceiver-new"
                                            style="direction: rtl; padding-right: 30px !important;"
                                            name="receiver-state"
                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-white"
                                            tabindex="3"
                                            onchange="changeState('stateSelectReceiver-new','citySelectReceiver-new')">
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

                                    <select id="citySelectReceiver-new"
                                            style="direction: rtl; padding-right: 30px !important;"
                                            name="receiver-city"
                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-white"
                                            tabindex="4">
                                        <option value="0">شهر</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--آدرس دقیق--}}
                        <div class="form-group row g-mb-30 g-mb-15--lg">
                            <label class="col-sm-2 col-form-label">آدرس دقیق</label>
                            <div class="col-sm-10 force-col-12">
                                <input
                                    class="form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                    name="receiver-address"
                                    placeholder="الزاماً فارسی">
                            </div>
                        </div>
                    </div>
                    <a onclick="addUserAddress()"
                       id="submitAddress"
                       class="btn btn-md u-btn-primary rounded-0 g-color-white g-mt-15 g-mx-60--lg g-mb-20 g-mx-20">
                        ثبت آدرس جدید
                    </a>
                </form>
            </div>
            <!-- End Demo modal window -->
        </div>
    </div>

@endsection
