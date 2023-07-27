@extends('Layouts.SellerMajor.app')

@section('content')
    <div class="container g-mb-40">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header text-right">ثبت نام در سامانه تبلیغ</h5>

                    @if(session()->has('msg'))
                        <svg id="checkMark" class="checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>

                        <div style="direction: rtl;" class="g-mb-60">
                            <h3 class="g-color-primary text-center">با تشکر از ثبت نام شما در سامانه تانا
                                استایل</h3>
                        </div>
                    @else
                        <div class="card-body">
                            <form action="{{route('sellerMajorNew')}}" method="POST" style="direction: rtl" id="registerForm"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="container g-pt-20 g-py-30--lg g-px-60--lg text-left">
                                    {{--نام--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-4 col-form-label align-self-center text-right">نام
                                            کاربری</label>
                                        <div class="col-sm-8 force-col-12">
                                            <div class="input-group g-brd-primary--focus">
                                                <input style="direction: ltr" id="user-name"
                                                       class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need text-left"
                                                       type="text"
                                                       value=""
                                                       autofocus
                                                       tabindex="1"
                                                       name="name"
                                                       maxlength="50"
                                                       onblur=" if($(this).val().length>2) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red');">
                                                <div
                                                    class="input-group-addon g-brd-around g-brd-primary g-brd-right-none d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                    <i class="fa fa-at g-color-primary g-font-size-18"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--موبایل--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-4 col-form-label align-self-center text-right">تلفن
                                            همراه</label>
                                        <div class="col-sm-8 force-col-12">
                                            <input style="direction: ltr"
                                                   class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 need"
                                                   id="mobile"
                                                   tabindex="12"
                                                   name="mobile"
                                                   maxlength="11"
                                                   value="{{Session::get('mobile')}}"
                                                   readonly>
                                        </div>
                                    </div>

                                    {{--دسته شغلی--}}
                                    <div class="customDisable form-group row g-mb-15">
                                        <label class="col-sm-4 col-form-label align-self-center text-right">دسته
                                            شغلی</label>
                                        <div class="col-sm-8 force-col-12">
                                            <div id="accordion-04" class="u-accordion" role="tablist"
                                                 aria-multiselectable="true">
                                                <!-- Card -->
                                                <div class="card rounded-0 g-mb-5 g-brd-red">
                                                    <div id="accordion-04-heading-01"
                                                         class="u-accordion__header g-brd-bottom g-brd-gray-light-v4 "
                                                         role="tab">
                                                        <h5 class="mb-0 g-font-weight-300">
                                                            <a class="u-link-v5 g-color-main g-color-primary--hover g-font-size-16 d-block text-right"
                                                               href="#accordion-04-body-01" data-toggle="collapse"
                                                               data-parent="#accordion-04" aria-expanded="true"
                                                               aria-controls="accordion-04-body-01" id="selectedItem">
                                                                انتخاب کنید
                                                            </a>
                                                            <input style="display: none" id="hintCategory" name="hintCategory" value="empty">
                                                            <input style="display: none" id="category" name="category" value="empty">
                                                        </h5>
                                                    </div>
                                                    <div id="accordion-04-body-01" class="collapse g-py-10 g-px-5"
                                                         role="tabpanel"
                                                         aria-labelledby="accordion-04-heading-01"
                                                         data-parent="#accordion-04">
                                                        <div style="height: 230px !important;"
                                                            class="u-accordion__body g-color-gray-dark-v5 customScrollBar">
                                                            <div class="text-right">
                                                                <strong>پوشاک</strong>
                                                                <ul class="g-pt-15">
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">زنانه</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">مردانه</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">دخترانه</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">پسرانه</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">نوزادی</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">مخلوط</span></li>
                                                                    <li>
                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'clothes')">همه</span></li>
                                                                </ul>
                                                            </div>
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>وسایل نقلیه</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">خودرو</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">موتور--}}
{{--                                                                            سیکلت</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">خودرو--}}
{{--                                                                            کلاسیک</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">سنگین--}}
{{--                                                                            و نیمه سنگین</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">کشاورزی--}}
{{--                                                                            و عمرانی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">لوازم--}}
{{--                                                                            و قطعات وسایل نقلیه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">سایر--}}
{{--                                                                            وسایل نقلیه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">اجاره--}}
{{--                                                                            خودرو</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">اجاره--}}
{{--                                                                            کشاورزی و عمرانی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">قایق--}}
{{--                                                                            و تفریحات آبی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'vehicles')">سایر وسایل نقلیه</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>وسایل ورزشی</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">دوچرخه</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">تور--}}
{{--                                                                            مسافرتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">کتاب--}}
{{--                                                                            و لوازم تحریر</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">سرگرمی--}}
{{--                                                                            و اسباب بازی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">حیوانات--}}
{{--                                                                            و لوازم</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">انواع--}}
{{--                                                                            ساز و آلات موسیقی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">هنر--}}
{{--                                                                            و صنایع دستی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">کلکسیونی</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'sports')">--}}
{{--                                                                            سرگرمی ها</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">--}}
{{--                                                                            سایر وسایل ورزشی</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>املاک</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">رهن--}}
{{--                                                                            و اجاره خانه و آپارتمان</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">خرید--}}
{{--                                                                            و فروش خانه و آپارتمان</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">اجاره--}}
{{--                                                                            کوتاه مدت ویلا، سوئیت</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">رهن--}}
{{--                                                                            و اجاره اداری، تجاری و صنعتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">خرید--}}
{{--                                                                            و فروش اداری، تجاری و صنعتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">زمین--}}
{{--                                                                            و باغ</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'estate')">سایر--}}
{{--                                                                            املاک</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>لوازم الکترونیکی</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">لپ--}}
{{--                                                                            تاپ و کامپیوتر</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">صوتی--}}
{{--                                                                            و تصویری</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">دوربین--}}
{{--                                                                            عکاسی و فیلمبرداری و لوازم</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">کنسول--}}
{{--                                                                            بازی و لوازم</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">بازی--}}
{{--                                                                            های اینترنتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">سایر--}}
{{--                                                                            لوازم الکترونیکی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">لوازم--}}
{{--                                                                            کامپیوتر و پرینتر</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'electronic')">سایر وسایل الکتریکی</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>صنعتی، اداری و تجاری</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">ماشین--}}
{{--                                                                            الات و تجهیزات صنعتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">ابزار--}}
{{--                                                                            و یراق آلات</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">لوازم--}}
{{--                                                                            اداری</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">تجهیزات--}}
{{--                                                                            پزشکی و آزمایشگاهی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">تجهیزات--}}
{{--                                                                            و لوازم کافه و رستوران</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">تجهیزات--}}
{{--                                                                            تجاری و فروشگاه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">تجهیزات--}}
{{--                                                                            عمرانی و ساختمانی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">تجهیزات--}}
{{--                                                                            کشاورزی و دامداری</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'industrial')">اجاره--}}
{{--                                                                            تجهیزات صنعتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر وسایل صنعتی</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر وسایل اداری</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر وسایل تجاری</span>--}}
{{--                                                                    </li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>خدمات و کسب و کار</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">آرایشگری--}}
{{--                                                                            و زیبایی</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">آموزش</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">اجاره--}}
{{--                                                                            لوازم</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">اسباب--}}
{{--                                                                            کشی و حمل و نقل</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">اینترنت--}}
{{--                                                                            ، رایانه و موبایل</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">باغبانی--}}
{{--                                                                            و فضای سبز</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">پزشکی--}}
{{--                                                                            و درمانی</span></li>--}}
{{--                                                                    <li class=""><a--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">ترجمه--}}
{{--                                                                            و تایپ</a></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">تعمیرات</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">خرید--}}
{{--                                                                            و فروش عمده</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">خودرو--}}
{{--                                                                            و موتورسیکلت</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">رویدادهای--}}
{{--                                                                            اجتماعی</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">ساختمان--}}
{{--                                                                            و دکوراسیون داخلی</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">گرافیک،--}}
{{--                                                                            تبلیغات و چاپ</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">مالی،--}}
{{--                                                                            حقوقی و بیمه</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">مراسم--}}
{{--                                                                            و کترینگ</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">معرفی--}}
{{--                                                                            و تبلیغات کسب و کار</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">مواد--}}
{{--                                                                            غذایی</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">نظافت--}}
{{--                                                                            و خدمات منزل</span></li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'services')">هنری</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li class=""><span--}}
{{--                                                                            style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر--}}
{{--                                                                            خدمات و کسب و کار</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>وسایل ارتباطی</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'connections')">موبایل--}}
{{--                                                                            و تبلت</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'connections')">لوازم--}}
{{--                                                                            موبایل</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'connections')">--}}
{{--                                                                            آیفون و تلفن</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">--}}
{{--                                                                            سایر وسایل ارتباطی</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>لوازم خانگی</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">مبلمان--}}
{{--                                                                            و لوازم چوبی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">وسایل--}}
{{--                                                                            برقی خانه و آشپزخانه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">ظروف--}}
{{--                                                                            و لوازم آشپزخانه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">دکوراسیون--}}
{{--                                                                            داخلی و روشنایی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">فرش،--}}
{{--                                                                            گلیم و قالیچه</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">آنتیک</span>--}}
{{--                                                                    </li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">سایر--}}
{{--                                                                            لوازم خانه و حیاط</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'appliances')">لوازم--}}
{{--                                                                            سرمایش و گرمایش</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر لوازم خانگی</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="text-right">--}}
{{--                                                                <strong>لوازم شخصی</strong>--}}
{{--                                                                <ul class="g-pt-15">--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'personal')">لوازم آرایشی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'personal')">لوازم بهداشتی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'personal')">لوازم پزشکی</span></li>--}}
{{--                                                                    <li>--}}
{{--                                                                        <span style="cursor: pointer" class="g-font-weight-500 g-color-primary--hover" onclick="categorySelect($(this).text(),'')">سایر لوازم شخصی</span></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Card -->
                                            </div>
                                        </div>
                                    </div>

                                    {{--لوگو--}}
                                    <div class="form-group row g-mb-15">
                                        <label class="col-sm-4 col-form-label align-self-center text-right"
                                               for="fileShow12"
                                               id="img-file-label12">
                                            تصویر پروفایل
                                        </label>
                                        <div class="col-sm-8 force-col-12">
                                            <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                            <span style="cursor: default"
                                                  class="d-none align-self-center g-mr-5 g-pa-10 g-color-primary"
                                                  id="uploadingIcon12"><i class="fa fa-spinner fa-spin"></i></span>
                                                <input style="direction: rtl" id="uploadingText12"
                                                       class="need d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                                       type="text"
                                                       placeholder="درحال بارگذاری.." readonly="">
                                                <input id="{{ 'fileShow12' }}"
                                                       class="form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                                       type="text"
                                                       placeholder="فاقد تصویر" readonly="">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-md u-btn-primary rounded-0" tabindex="20">
                                                        بارگذاری
                                                    </button>
                                                    <input id="{{'pic12'}}"
                                                           onclick="$('#fileShow12').removeClass('g-brd-lightred')"
                                                           value=""
                                                           type="file"
                                                           name="{{'pic12'}}"
                                                           accept="image/*">
                                                    <div id="userImageDiv12">
                                                        <input type="text" id="imageUrl12" name="imageUrl"
                                                               style="display: none">
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="direction: rtl">
                                                <p class="text-muted g-font-size-12 g-line-height-1_5 text-right g-pt-5 m-0">
                                                    تصویر پروفایل نماینگر هویت شماست و هر زمان آنرا در اینستاگرام تغییر
                                                    دادید لطفا در سیستم ما هم به روزرسانی بفرمایید.</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{--رمز عبور--}}
                                    <div class="form-group row g-mb-15">
                                        <label
                                            class="col-sm-4 col-form-label align-self-center text-right">رمز
                                            عبور</label>
                                        <div class="col-sm-8 force-col-12">
                                            <div class="input-group g-brd-primary--focus">
                                                <div
                                                    class="input-group-addon text-center g-brd-around g-brd-gray-light-v2 g-brd-left-none align-items-center">
                                                    <a style="cursor: pointer" class="u-link-v5 g-color-main g-color-primary--hover g-font-size-16 d-block g-mt-7"
                                                    onmousedown="showPassword()">
                                                        <i id="showPassword" class="fa fa-eye g-color-primary--hover  g-color-gray-dark-v5 g-font-size-18"></i>
                                                        <i id="hidePassword" class="d-none fa fa-eye-slash g-color-primary--hover g-color-gray-dark-v5 g-font-size-18"></i>
                                                    </a>
                                                </div>
                                                <input style="direction: rtl"
                                                   class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                                   id="password"
                                                   tabindex="12"
                                                   oninput="
                                                   if($(this).val().length>7) {
                                                       $(this).removeClass('g-brd-red');
                                                   } else $(this).addClass('g-brd-red')"
                                                   name="password"
                                                   type="password"
                                                   maxlength="20"
                                                   value=""
                                                   placeholder="8 کاراکتر به بالا">

                                            </div>
                                        </div>
                                    </div>

                                    {{--مودال تصاویر--}}
                                    <div style="direction: rtl" class="modal fade bd-example-modal-lg" id="modal"
                                         tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">تنظیم اندازه
                                                        تصویر</h5>
                                                    <button type="button"
                                                            class="g-brd-none g-bg-transparent g-font-size-20 g-line-height-0 align-self-center"
                                                            data-dismiss="modal"
                                                            aria-label="Close">
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
                                                            class="btn btn-secondary" data-dismiss="modal">انصراف
                                                    </button>
                                                    <button type="button" id="crop" class="btn btn-primary g-mr-5">برش
                                                    </button>
                                                    <i id="waitingCrop"
                                                       style="display: none"
                                                       class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Danger Alert -->
                                    <div style="direction: rtl"
                                         class="alert alert-warning alert-dismissible fade show text-right g-pa-20--lg g-px-10 g-py-10"
                                         role="alert">
                                        <h4 class="h5"><i class="fa fa-warning"></i> موافقت با قوانین</h4>
                                        <p class="g-mb-10">کاربر گرامی و گرانقدر تمامی هدف تیم تانا استایل بر
                                            این است که بتوانیم در کنار هم با کمترین هزینه ممکن شغل و کسب و کار خود را
                                            رونق بخشیم. این تلاش مستلزم آن است که قوانین اجتماعی را راعایت نماییم. لذا از قرار دادن تصاویر و مطالب غیر اجتماعی خود داری فرمائید.</p>
                                        <div class="text-left">
                                            <div class="d-inline-block">
                                                <div style="cursor: pointer"
                                                     id="noAgree"
                                                     tabindex="22"
                                                     onclick="regulationCheck('noAgree')"
                                                     class="g-py-10 g-px-15 g-brd-red g-brd-around g-bg-white g-color-gray-dark-v5">
                                                    موافقم
                                                </div>
                                            </div>
                                            <div class="d-inline-block">
                                                <div style="cursor: pointer;"
                                                     id="agree"
                                                     tabindex="22"
                                                     onclick="regulationCheck('agree')"
                                                     class="d-none g-py-10 g-brd-white g-brd-around g-px-15 g-bg-primary g-color-white">
                                                    موافقم
                                                </div>
                                                <input style="display: none" id="signature" name="signature" type="text"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Danger Alert -->
                                    <div style="direction: rtl"
                                         class="alert alert-success alert-dismissible fade show text-right g-pa-20--lg g-px-10 g-py-10"
                                         role="alert">
                                        <h4 class="h5"><i class="fa fa-warning"></i> شرکت در کمپین تبلیغاتی</h4>
                                        <p class="g-mb-10">هدف از کمپین تبلیغاتی ما افزایش بازدیدکنندگان از محصولات و صفحات شغلی شما می باشد. روش کار به این صورت است که
                                            هر روز برای شما در موتورهای جستجو و همچنین صفحات اینستاگرام تبلیغ خواهد شد در ازای آن شما تنها یک استوری تبلیغاتی در لیست استوریهای خود روزانه قرار خواهید داد.
                                            هیچگونه هزینه ی مالی شامل حال اعضای کمپین نخواهد شد.
                                        </p>
                                        <div class="text-left">
                                            <div class="d-inline-block">
                                                <div style="cursor: pointer"
                                                     id="tablighBtn"
                                                     tabindex="22"
                                                     class="g-py-10 g-px-15 g-bg-white g-brd-white g-brd-around g-color-gray-dark-v5">
                                                    عضو شدن
                                                    <input style="display: none" id="tabligh" name="tabligh" type="text" value="0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--اینستاگرام--}}
                                    <div id="instaContainer" class="d-none form-group row g-mb-15">
                                        <label
                                            class="col-sm-4 col-form-label align-self-center text-right">نام
                                            کاربری اینستاگرام</label>
                                        <div class="col-sm-8 force-col-12">
                                            <div class="input-group g-brd-primary--focus">
                                                <input style="direction: ltr"
                                                       class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need text-left"
                                                       type="text"
                                                       value=""
                                                       autofocus
                                                       tabindex="1"
                                                       id="instaAccount"
                                                       name="instaAccount"
                                                       maxlength="50"
                                                       onblur=" if($(this).val().length>2) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red');">
                                                <div
                                                    class="input-group-addon g-brd-around g-brd-primary g-brd-right-none d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                    <i class="fa fa-at g-color-primary g-font-size-18"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Danger Alert -->
                                    <button id="save" type="button"
                                            class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mt-15"
                                            onclick="saveUserData()">
                                        <span id="submitText">ثبت نام</span>
                                        <span id="waitingSubmit"
                                              style="display: none"
                                              class="m-0 g-color-white">منتظر بمانید..</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
