@include('Layouts.BaseCssLink')
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

@yield('BaseCssLink')
</head>
@yield('CustomerNavigation')
<!-- Loader overlay -->
<div id="loaderOverlay" style="
    display:none;
    position: fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    background: rgba(255,255,255,0.8);
    z-index: 1051;
    justify-content:center;
    align-items:center;
">
    <div class="spinner-border text-primary" role="status" style="direction:rtl; width:15rem; height:4rem;">
        <span class="visually-hidden">در حال آماده سازی...</span>
    </div>
</div>

<div class="container g-my-40">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h5 class="card-header text-right">ثبت نام در سامانه فروش</h5>

                @if(session()->has('msg'))
                    <svg id="checkMark" class="checkmark"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                fill="none"/>
                        <path class="checkmark__check" fill="none"
                              d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>

                    <div style="direction: rtl;" class="g-mb-60">
                        <h3 class="g-color-primary text-center">با تشکر از ثبت نام شما در سامانه فروش میوان</h3>
                        <h6 class="text-center">درخواست شما در صف بررسی قرار گرفت. در صورت تایید اطلاعات، نتیجه را
                            از طریق پیامک اطلاع رسانی خواهیم نمود.</h6>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('sellerNew')}}" method="POST" style="direction: rtl" id="registerForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="container g-pt-20 g-py-30--lg g-px-60--lg text-left">
                                {{--دسته شغلی--}}
                                <div class="customDisable form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">دسته
                                        شغلی</label>
                                    <div class="col-sm-9 force-col-12">
                                        <div id="accordion-04" class="u-accordion" role="tablist"
                                             aria-multiselectable="true">
                                            <!-- Card -->
                                            <div id="catList" class="card rounded-0 g-mb-5 g-brd-red">
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
                                                        <input style="display: none" id="hintCategory"
                                                               name="hintCategory" value="empty">
                                                        <input style="display: none" id="category" name="category"
                                                               value="empty">
                                                        <input style="display: none" id="catCode" name="catCode"
                                                               value="empty">
                                                    </h5>
                                                </div>
                                                <div id="accordion-04-body-01" class="collapse g-py-10 g-px-5"
                                                     role="tabpanel"
                                                     aria-labelledby="accordion-04-heading-01"
                                                     data-parent="#accordion-04">
                                                    <div style="height: 230px !important;"
                                                         class="u-accordion__body g-color-gray-dark-v5 customScrollBar">
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">مد و پوشاک</strong>
                                                            <ul>
                                                                <li>
                                                                    <span style="cursor: pointer" id="lebas"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">لباس</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="kif"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">کیف</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="kafsh"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">کفش</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="varzeshi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">ورزشی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="aksesori"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">اکسسوری</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="makhloot"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'clothes')">مخلوط</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">وسایل نقلیه</strong>
                                                            <ul>
                                                                <li>
                                                                    <span style="cursor: pointer" id="khodro"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'vehicles')">خودرو</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="motorSiklet"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">موتور
                                                                            سیکلت</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="khodroKlasik"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">خودرو
                                                                            کلاسیک</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="khodroSangin"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">سنگین
                                                                            و نیمه سنگین</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="khodroKeshavarzi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">کشاورزی
                                                                            و عمرانی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="khodroLavazem"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">لوازم
                                                                            و قطعات وسایل نقلیه</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="khodroSayer"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">سایر
                                                                            وسایل نقلیه</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="khodroEjare"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">اجاره
                                                                            خودرو</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="khodroKeshavarziEjare"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">اجاره
                                                                            کشاورزی و عمرانی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="ghayeghVaTafrihat"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'vehicles')">قایق
                                                                            و تفریحات آبی</span></li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="vasileNaghlieSayer"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'vehicles')">سایر وسایل نقلیه</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">کالای دیجیتال</strong>
                                                            <ul>
                                                                <li>
                                                                        <span style="cursor: pointer" id="computer"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">لپ
                                                                            تاپ و کامپیوتر</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="sotiTasviri"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">صوتی
                                                                            و تصویری</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="doorbin"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">دوربین
                                                                            عکاسی و فیلمبرداری و لوازم</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="consoleBazi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">کنسول
                                                                            بازی و لوازم</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer" id="internetBazi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">بازی
                                                                            های اینترنتی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="lavazemeComputerPrinter"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'Digital')">لوازم
                                                                            کامپیوتر و پرینتر</span></li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="sayerVasayeleElektriki"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Digital')">سایر وسایل الکتریکی</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">کالای وارداتی</strong>
                                                            <ul>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="AbzareTolidMohtava"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'')">ابزار تولید محتوا</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="lavazemeShakhsi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">لوازم شخصی</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="lavazemeKhanegi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">لوازم خانگی</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="vasaeleErtebati"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">وسایل ارتباطی</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="abzaralatVaTajhizateSanati"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">
                                                                            ابزارآلات و تجهیزات صنعتی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="lavazemeElectrici"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">لوازم الکتریکی</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="vasaeleVarzeshi"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">وسایل ورزشی</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="vasaeleNaghlie"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">وسایل نقلیه</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="mahsoolateKhooraki"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'ImportedProduct')">محصولات خوراکی</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">وسایل ارتباطی</strong>
                                                            <ul>
                                                                <li>
                                                                        <span style="cursor: pointer" id="mobileTablet"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'connections')">موبایل
                                                                            و تبلت</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="lavazemeMobile"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'connections')">لوازم
                                                                            موبایل</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="ayfonVaTelefon"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'connections')">
                                                                            آیفون و تلفن</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="sayereErtebatat"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'connections')">
                                                                            سایر وسایل ارتباطی</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">لوازم خانگی</strong>
                                                            <ul>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="moblemanVaCharm"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">مبلمان
                                                                            و لوازم چوبی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="vasaeleBarghiAshpazkhane"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">وسایل
                                                                            برقی خانه و آشپزخانه</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="zoroofVaLavazemAshpazkhane"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">ظروف
                                                                            و لوازم آشپزخانه</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="dekorasionDakheliRoshanaei"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">دکوراسیون
                                                                            داخلی و روشنایی</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="farshGlimGhaliche"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">فرش،
                                                                            گلیم و قالیچه</span></li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="antik"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'appliances')">آنتیک</span>
                                                                </li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="sayereLavazemeKhane"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">سایر
                                                                            لوازم خانه و حیاط</span></li>
                                                                <li>
                                                                        <span style="cursor: pointer"
                                                                              id="sarmayeshVaGarmayesh"
                                                                              class="g-font-weight-500 g-color-primary--hover"
                                                                              onclick="categorySelect($(this),'appliances')">لوازم
                                                                            سرمایش و گرمایش</span></li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="sayereLavazemeKhanegi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'appliances')">سایر لوازم خانگی</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">لوازم شخصی</strong>
                                                            <ul>
                                                                <li>
                                                                    <span style="cursor: pointer" id="lavazemeArayeshi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'personal')">لوازم آرایشی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="lavazemeBehdashti"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'personal')">لوازم بهداشتی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="lavazemeArayeshiVaBehdashti"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'personal')">لوازم آرایشی و بهداشتی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="sayereLavazemeShakhsi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'personal')">سایر لوازم شخصی</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">دارو و کالای پزشکی</strong>
                                                            <ul>
                                                                <li>
                                                                    <span style="cursor: pointer" id="darooGiahi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'medicine')">دارو گیاهی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="darookhane"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'medicine')">داروخانه</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="kalayePezeshki"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'medicine')">کالای پزشکی</span>
                                                                </li>
                                                                <li><span style="cursor: pointer"
                                                                          id="kalayePezeshkiTakhasosi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'medicine')">کالای پزشکی تخصصی</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="text-right">
                                                            <strong class="g-color-insta">لوازم تحریر و اداری</strong>
                                                            <ul>
                                                                <li>
                                                                    <span style="cursor: pointer" id="neveshtAfzar"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">نوشت افزار</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer" id="lavazemeSargarmi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">لوازم سرگرمی</span>
                                                                </li>
                                                                <li>
                                                                    <span style="cursor: pointer"
                                                                          id="mahsoolateAmoozeshi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">محصولات آموزشی</span>
                                                                </li>
                                                                <li><span style="cursor: pointer" id="malzoomateMadrese"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">ملزومات مدرسه</span>
                                                                </li>
                                                                <li><span style="cursor: pointer" id="abzareMohandesi"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">ابزار مهندسی</span>
                                                                </li>
                                                                <li><span style="cursor: pointer" id="kalayeEdari"
                                                                          class="g-font-weight-500 g-color-primary--hover"
                                                                          onclick="categorySelect($(this),'Stationery')">کالای اداری</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    </div>
                                </div>

                                {{--نام--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">نام</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="user-name"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                               type="text"
                                               value=""
                                               tabindex="1"
                                               name="name"
                                               maxlength="30"
                                               onblur=" if($(this).val().length>2) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red');"
                                               placeholder="الزاما فارسی"
                                               {{--                                           lang="fa"--}}
                                               onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                        >
                                    </div>
                                </div>

                                {{--نام خانوادگی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">نام
                                        خانوادگی</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                            id="user-family"
                                            name="family"
                                            tabindex="2"
                                            maxlength="30"
                                            type="text"
                                            value=""
                                            onblur=" if($(this).val().length>2) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                            placeholder="الزاما فارسی"
                                            {{--                                           lang="fa"--}}
                                            onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                        >
                                    </div>
                                </div>

                                {{--نام کسب و کار--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">نام کسب و
                                        کار</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                               tabindex="3"
                                               id="shopName"
                                               onblur=" if($(this).val()!=='') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="shopName"
                                               value=""
                                               placeholder="نامی که در میوان با آن فعالیت خواهید کرد"
                                        >
                                    </div>
                                </div>

                                {{--بایوگرافی--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">درباره
                                        شغلتان</label>
                                    <div class="col-sm-9 force-col-12">
                                        <textarea style="direction: rtl"
                                                  class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                                  rows="6"
                                                  tabindex="1"
                                                  value=""
                                                  onblur=" if($(this).val()!=='') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                                  placeholder="این توضیحات به مشتری هایتان کمک می کند بیشتر شما را بشناسند"
                                                  name="bio"
                                                  id="bio"
                                                  maxlength="300"></textarea>
                                    </div>
                                </div>

                                {{--ایمیل--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">ایمیل</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                               tabindex="3"
                                               id="email"
                                               onblur=" if($(this).val()!=='') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="email"
                                               type="email"
                                               value=""
                                               placeholder="مثال: najatAndimeh@gmail.com"
                                        >
                                    </div>
                                </div>

                                {{--کد ملی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                        ملی</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                            id="nationalId"
                                            name="nationalId"
                                            tabindex="4"
                                            pattern="\d*"
                                            value=""
                                            oninput="$('#nationalId12').val($(this).val())"
                                            onblur=" if($(this).val().length===10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                            maxlength="10"
                                            placeholder="فقط اعداد"
                                        >
                                    </div>
                                </div>

                                {{--تاریخ تولد--}}
                                <div class="customDisable form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">تاریخ
                                        تولد</label>
                                    <div class="col-sm-9 force-col-12">
                                        <div class="d-flex">
                                            <select style="direction: ltr"
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5 g-brd-red need"
                                                    tabindex="5"
                                                    id="birthday-day"
                                                    onblur=" if($(this).val()!=='0') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red');"
                                                    name="day"
                                                    tabindex="3">
                                                <option
                                                    value="{{isset($customer->BirthdayD) ? $customer->BirthdayD:'0' }}">{{isset($customer->BirthdayD) ? $customer->BirthdayD:'روز' }}</option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                            <select style="direction: ltr"
                                                    id="birthday-mon"
                                                    class="need form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5 g-brd-red"
                                                    tabindex="6"
                                                    onblur=" if($(this).val()!=='0') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                                    name="mon"
                                                    tabindex="4">
                                                <option
                                                    value="{{isset($customer->BirthdayM) ? $customer->BirthdayM:'0' }}">{{isset($customer->BirthdayM) ? $customer->BirthdayM:'ماه' }}</option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <select style="direction: ltr"
                                                    id="birthday-year"
                                                    class="need form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5 g-brd-red"
                                                    tabindex="7"
                                                    onblur=" if($(this).val()!=='0') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                                    name="year"
                                                    tabindex="5">
                                                <option
                                                    value="{{isset($customer->BirthdayY) ? $customer->BirthdayY:'0' }}">{{isset($customer->BirthdayY) ? $customer->BirthdayY:'سال' }}</option>
                                                <option value="1398">1398</option>
                                                <option value="1397">1397</option>
                                                <option value="1396">1396</option>
                                                <option value="1395">1395</option>
                                                <option value="1394">1394</option>
                                                <option value="1393">1393</option>
                                                <option value="1392">1392</option>
                                                <option value="1391">1391</option>
                                                <option value="1390">1390</option>
                                                <option value="1389">1389</option>
                                                <option value="1388">1388</option>
                                                <option value="1387">1387</option>
                                                <option value="1386">1386</option>
                                                <option value="1385">1385</option>
                                                <option value="1384">1384</option>
                                                <option value="1383">1383</option>
                                                <option value="1382">1382</option>
                                                <option value="1381">1381</option>
                                                <option value="1380">1380</option>
                                                <option value="1379">1379</option>
                                                <option value="1378">1378</option>
                                                <option value="1377">1377</option>
                                                <option value="1376">1376</option>
                                                <option value="1375">1375</option>
                                                <option value="1374">1374</option>
                                                <option value="1373">1373</option>
                                                <option value="1372">1372</option>
                                                <option value="1371">1371</option>
                                                <option value="1370">1370</option>
                                                <option value="1369">1369</option>
                                                <option value="1368">1368</option>
                                                <option value="1367">1367</option>
                                                <option value="1366">1366</option>
                                                <option value="1365">1365</option>
                                                <option value="1364">1364</option>
                                                <option value="1363">1363</option>
                                                <option value="1362">1362</option>
                                                <option value="1361">1361</option>
                                                <option value="1360">1360</option>
                                                <option value="1359">1359</option>
                                                <option value="1358">1358</option>
                                                <option value="1357">1357</option>
                                                <option value="1356">1356</option>
                                                <option value="1355">1355</option>
                                                <option value="1354">1354</option>
                                                <option value="1353">1353</option>
                                                <option value="1352">1352</option>
                                                <option value="1351">1351</option>
                                                <option value="1350">1350</option>
                                                <option value="1349">1349</option>
                                                <option value="1348">1348</option>
                                                <option value="1347">1347</option>
                                                <option value="1346">1346</option>
                                                <option value="1345">1345</option>
                                                <option value="1344">1344</option>
                                                <option value="1343">1343</option>
                                                <option value="1342">1342</option>
                                                <option value="1341">1341</option>
                                                <option value="1340">1340</option>
                                                <option value="1339">1339</option>
                                                <option value="1338">1338</option>
                                                <option value="1337">1337</option>
                                                <option value="1336">1336</option>
                                                <option value="1335">1335</option>
                                                <option value="1334">1334</option>
                                                <option value="1333">1333</option>
                                                <option value="1332">1332</option>
                                                <option value="1331">1331</option>
                                                <option value="1330">1330</option>
                                                <option value="1329">1329</option>
                                                <option value="1328">1328</option>
                                                <option value="1327">1327</option>
                                                <option value="1326">1326</option>
                                                <option value="1325">1325</option>
                                                <option value="1324">1324</option>
                                                <option value="1323">1323</option>
                                                <option value="1322">1322</option>
                                                <option value="1321">1321</option>
                                                <option value="1320">1320</option>
                                                <option value="1319">1319</option>
                                                <option value="1318">1318</option>
                                                <option value="1317">1317</option>
                                                <option value="1316">1316</option>
                                                <option value="1315">1315</option>
                                                <option value="1314">1314</option>
                                                <option value="1313">1313</option>
                                                <option value="1312">1312</option>
                                                <option value="1311">1311</option>
                                                <option value="1310">1310</option>
                                                <option value="1309">1309</option>
                                                <option value="1308">1308</option>
                                                <option value="1307">1307</option>
                                                <option value="1306">1306</option>
                                                <option value="1305">1305</option>
                                                <option value="1304">1304</option>
                                                <option value="1303">1303</option>
                                                <option value="1302">1302</option>
                                                <option value="1301">1301</option>
                                                <option value="1300">1300</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{--جنسیت--}}
                                <div class="customDisable form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">جنسیت</label>
                                    <div class="col-sm-9 force-col-12">
                                        <div class="btn-group-lg d-flex">
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" id="female"
                                                       name="gender"
                                                       tabindex="8"
                                                       type="radio"
                                                       onclick="$('#maleCaption').removeClass('g-brd-red'); $('#femaleCaption').removeClass('g-brd-red'); $('#femaleCaption').addClass('g-brd-gray-light-v2');"
                                                       value="0">
                                                <span id="maleCaption"
                                                      class="btn btn-md btn-block g-brd-red g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                            </label>
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0 g-brd-red"
                                                       id="male" name="gender"
                                                       tabindex="9"
                                                       type="radio"
                                                       onclick="$('#femaleCaption').removeClass('g-brd-red'); $('#maleCaption').removeClass('g-brd-red'); $('#maleCaption').addClass('g-brd-gray-light-v2');"
                                                       value="1">
                                                <span id="femaleCaption"
                                                      class="btn btn-md btn-block g-brd-red g-bg-gray-light-v5 g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{--موبایل--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">موبایل
                                    </label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                               id="mobile"
                                               tabindex="12"
                                               onblur="if($(this).val().length===11) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="mobile"
                                               pattern="\d*"
                                               maxlength="11"
                                               value=""
                                               placeholder="09xxxxxxxx">
                                    </div>
                                </div>

                                {{--استان/شهر--}}
                                <div class="customDisable form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">استان/شهر
                                        سکونت</label>
                                    <div class="col-sm-9 force-col-12">
                                        <div class="d-lg-flex">
                                            <!--ورودی زیر فقط برای دریافت استان جاوااسکریپت استفاده می شود-->
                                            <input id="state" class="d-none" value="">
                                            <select id="stateSelect"
                                                    style="direction: rtl; padding-right: 30px !important; height:calc(2.25rem + 9px) !important;"
                                                    tabindex="13"
                                                    onblur=" if($(this).val()!=='0'){$(this).removeClass('g-brd-red'); $('#citySelect').removeClass('g-brd-red');} else {$(this).addClass('g-brd-red'); $('#citySelect').addClass('g-brd-red');}"
                                                    class="need form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none--lg g-bg-gray-light-v5 g-mb-10 g-mb-0--lg g-brd-red"
                                                    name="state"
                                                    onchange="changeState('stateSelect','citySelect')">
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

                                            <!--ورودی زیر فقط برای دریافت شهر جاوااسکریپت استفاده می شود-->
                                            <input id="city" class="d-none" value="">
                                            <select id="citySelect"
                                                    style="direction: rtl; padding-right: 30px !important; height:calc(2.25rem + 9px) !important;"
                                                    tabindex="14"
                                                    class="need form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5 g-brd-red"
                                                    name="city"
                                                    tabindex="4">
                                                <option value="">شهر</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{--آدرس سکونت --}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">آدرس
                                        سکونت</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="homeAddress"
                                               class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               tabindex="15"
                                               type="text"
                                               value=""
                                               onblur=" if($(this).val().length>10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="homeAddress"
                                               placeholder="الزاما فارسی"
                                               {{--                                           lang="fa"--}}
                                               onkeyup="if (!(/^[\u0600-\u06FF\u06F0-\u06F90-9\s]+$/.test($(this).val()))) {
                                                        let str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else {
                                                        $(this).attr('autocomplete', 'name');
                                                    }"
                                        >
                                    </div>
                                </div>

                                {{--آدرس کار --}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">آدرس محل
                                        کار</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="workAddress"
                                               class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               type="text"
                                               tabindex="17"
                                               value=""
                                               onblur=" if($(this).val().length>10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="workAddress"
                                               placeholder="الزاما فارسی"
                                               {{--                                           lang="fa"--}}
                                               onkeyup="if (!(/^[\u0600-\u06FF\u06F0-\u06F90-9\s]+$/.test($(this).val()))) {
                                                        let str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else {
                                                        $(this).attr('autocomplete', 'name');
                                                    }"
                                        >
                                    </div>
                                </div>

                                {{--تصویر چهره--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right"
                                           for="fileShow11"
                                           id="img-file-label11">
                                        تصویر چهره
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                            <span style="cursor: default"
                                                  class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
                                                  id="uploadingIcon11"><i class="fa fa-spinner fa-spin"></i></span>
                                            <input style="direction: rtl" id="uploadingText11"
                                                   class="need d-none form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                                   type="text"
                                                   placeholder="درحال بارگذاری.." readonly="">
                                            <input id="{{ 'fileShow11' }}"
                                                   class="form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
                                                   type="text"
                                                   placeholder="فاقد تصویر" readonly="">
                                            <div class="input-group-btn">
                                                <button class="btn btn-md u-btn-primary rounded-0" tabindex="20"
                                                        type="submit">
                                                    بارگذاری
                                                </button>
                                                <input id="{{'pic11'}}"
                                                       onclick="$('#fileShow11').removeClass('g-brd-lightred')"
                                                       type="file"
                                                       name="{{'pic11'}}"
                                                       accept="image/*">
                                                <div id="userImageDiv11">
                                                    <input type="text" id="imageUrl11" name="imageUrl"
                                                           style="display: none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--تصویر کارت ملی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right"
                                           for="fileShow12"
                                           id="img-file-label12">
                                        تصویر کارت ملی
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                            <span style="cursor: default"
                                                  class="d-none align-self-center g-mr-5 g-bg-primary g-pa-15 g-color-white"
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
                                                <button class="btn btn-md u-btn-primary rounded-0" tabindex="21"
                                                        type="submit">
                                                    بارگذاری
                                                </button>
                                                <input id="{{'pic12'}}"
                                                       onclick="$('#fileShow12').removeClass('g-brd-lightred')"
                                                       type="file"
                                                       name="{{'pic12'}}"
                                                       accept="image/*">
                                                <div id="userImageDiv12">
                                                    <input type="text" id="imageUrl12" name="imageUrl" style="display: none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--مودال تصاویر--}}
                                <div style="direction: rtl" class="modal fade bd-example-modal-lg" id="modal"
                                     tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered m-0" role="document">
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
                                                        class="btn btn-secondary h4 rounded-0" data-dismiss="modal">انصراف
                                                </button>
                                                <button type="button" id="crop" class="btn btn-primary g-mr-5 h4 rounded-0">تایید</button>
                                                <i id="waitingCrop"
                                                   style="display: none"
                                                   class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--کارت بانکی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right"
                                           for="fileShow11"
                                           id="img-file-label11">
                                        شماره کارت بانکی
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div
                                            class="align-self-center g-color-white text-center text-lg-right">

                                            <div style="display: flex" class="d-custom-block">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width creditCard"
                                                       type="text"
                                                       tabindex="30"
                                                       placeholder="0000"
                                                       id="creditCard4"
                                                       name="creditCard4"
                                                       pattern="\d*"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard3').focus();">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width creditCard"
                                                       type="text"
                                                       tabindex="31"
                                                       placeholder="0000"
                                                       pattern="\d*"
                                                       id="creditCard3"
                                                       name="creditCard3"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard2').focus();">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width creditCard"
                                                       type="text"
                                                       tabindex="32"
                                                       placeholder="0000"
                                                       id="creditCard2"
                                                       pattern="\d*"
                                                       name="creditCard2"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard1').focus();">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width creditCard"
                                                       type="text"
                                                       tabindex="33"
                                                       placeholder="0000"
                                                       id="creditCard1"
                                                       pattern="\d*"
                                                       name="creditCard1"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Danger Alert -->
                                <div style="direction: rtl"
                                     class="alert alert-danger alert-dismissible fade show text-right g-pa-20--lg g-px-10 g-py-10"
                                     role="alert">
                                    <h4 class="h5"><i class="fa fa-minus-circle"></i> موافقت با قوانین</h4>
                                    <p class="g-mb-10">فروشنده عزیز برای ثبت نام در سامانه فروش میوان لازم و
                                        ضروری است که موافقت خود را با قوانین میوان اعلام کنید. برای اینکار
                                        ابتدا قوانین را مطالعه فرمایید و در صورت موافقت با قوانین کلید موافقم را
                                        فشار دهید. کلید موافقم به منزله امضاء الکترونیکی شما خواهد بود.
                                        <a style="font-weight: bold" class="g-color-black g-color-primary--hover"
                                           data-toggle="modal"
                                           id="readRegulation"
                                           data-target="#modalRegulation"
                                           onclick="$('.agreeDate').text(nowDate())"
                                           href="#">
                                            مطالعه قوانین
                                        </a>
                                    </p>
                                    <div class="text-left">
                                        <div class="d-inline-block">
                                            <div style="cursor: pointer"
                                                 id="noAgree"
                                                 tabindex="22"
                                                 onclick="regulationCheck('noAgree')"
                                                 class="g-py-10 g-px-15 g-brd-red g-brd-around g-bg-white g-color-gray-dark-v5">
                                                موافق تمامی قوانین هستم
                                            </div>
                                        </div>
                                        <div class="d-inline-block">
                                            <div style="cursor: pointer;"
                                                 id="agree"
                                                 tabindex="22"
                                                 onclick="regulationCheck('agree')"
                                                 class="d-none g-py-10 g-brd-white g-brd-around g-px-15 g-bg-primary g-color-white">
                                                موافق تمامی قوانین هستم
                                            </div>
                                            <input style="display: none" id="signature" name="signature" type="text"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <!-- مودال قوانین-->
                                <div class="modal fade text-center" id="modalRegulation" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">

                                            <div class="modal-header sticky-top g-bg-gray-light-v5">
                                                <h4>قوانین و شرایط فروشندگان</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                            </div>

                                            <!-- متن قوانین -->
                                            <div id="regulationContent"
                                                 style="background-color: white; direction: rtl; max-height: 400px; overflow-y: auto; text-align: justify;"
                                                 class="g-pa-30">
                                                <h4 class="text-center text-lg-right g-my-20 g-mt-0--lg">قوانین و مقررات فروش در سایت میوان</h4>
                                                <p>
                                                    این قرارداد در تاریخ <span class="g-color-primary h5 g-mx-5 agreeDate"></span> فی‌مابین طرفین زیر منعقد و لازم‌الاجرا گردید:
                                                    <br><br>
                                                    <b>ماده 1- طرفین قرارداد :</b><br>
                                                    1-1- طرف اول: شرکت میوان «Mevan»، با مسئولیت محدود، به شماره ثبت ۲۹۱۸ و شناسه ملی ۱۴۰۱۰۲۷۷۰۷۳، به نمایندگی جناب آقای یونس اندیمه، که از این پس در این قرارداد «میوان» نامیده می‌شود.<br>
                                                    2-1- طرف دوم: فروشنده، شخص حقیقی یا حقوقی، با اطلاعات مندرج در فرم ثبت‌نام و پروفایل کاربری در سامانه میوان «Mevan» که از این پس «فروشنده» نامیده می‌شود.<br><br>

                                                    <b>ماده2- موضوع قرارداد :</b><br>
                                                    موضوع این قرارداد عبارت است از همکاری فروشنده با میوان «Mevan» در عرضه، تبلیغ و فروش کالا یا خدمات خود از طریق بستر آنلاین میوان، مطابق شرایط و ضوابط مندرج در این قرارداد.<br><br>

                                                    <b>ماده ۳. تعهدات فروشنده :</b><br>
                                                    1-3- فروشنده متعهد است کلیه اطلاعات مربوط به کالا یا خدمات خود را به‌صورت صحیح، شفاف و به‌روز در سامانه میوان «Mevan» ثبت نماید.<br>
                                                    2-3- فروشنده مسئول اصالت، کیفیت، سلامت، کمیت، قیمت‌گذاری و تطابق کالا/خدمات با قوانین جمهوری اسلامی ایران و استانداردهای مربوطه است.<br>
                                                    3-3- فروشنده موظف است در صورت بروز هرگونه مغایرت یا ایراد در کالا یا خدمات، نسبت به تعویض یا رفع مشکل اقدام نموده و پاسخ‌گوی مشتری باشد.<br>
                                                    4-3- فروشنده موظف است کلیه مجوزهای قانونی لازم (حسب مورد) برای عرضه کالا یا خدمات را اخذ و حفظ نماید.<br>
                                                    5-3- فروشنده حق ندارد کالاهای ممنوعه، مغایر با شرع و قانون یا ناقض حقوق اشخاص ثالث (از جمله مالکیت فکری) را عرضه کند.<br>
                                                    6-3- فروشنده متعهد است کلیه قوانین مالیاتی، بیمه‌ای و سایر الزامات قانونی مرتبط با فعالیت خود را رعایت نماید.<br><br>

                                                    <b>ماده 4- تعهدات میوان «Mevan»</b><br>
                                                    4-1- میوان متعهد است بستر نرم‌افزاری و فضای لازم جهت معرفی و فروش کالا یا خدمات فروشنده را فراهم نماید.<br>
                                                    4-2- میوان مسئولیت بازاریابی، تبلیغات کلی سامانه و جذب مشتریان را برعهده دارد، لیکن تعهدی نسبت به تحقق میزان فروش معین ندارد.<br>
                                                    4-3- میوان موظف است وجوه دریافتی از مشتریان بابت خرید کالا یا خدمات فروشنده را پس از کسر کارمزد و هزینه‌های قانونی، طبق ماده ۵ به فروشنده پرداخت نماید.<br>
                                                    4-4- میوان حق دارد در صورت تخلف فروشنده از مفاد قرارداد یا قوانین جاری، نسبت به تعلیق یا لغو حساب کاربری وی اقدام نماید.<br><br>

                                                    <b>ماده5- نحوه تسویه‌حساب :</b><br>
                                                    5-1- میوان وجوه حاصل از فروش کالا یا خدمات فروشنده را پس از کسر کارمزد توافق‌شده و سایر هزینه‌های قانونی، در بازه‌های ده روزه به شماره کارت/حساب بانکی معرفی‌شده از سوی فروشنده واریز می‌نماید.<br>
                                                    5-2- در صورت بازگشت کالا یا استرداد وجه مشتری، میوان مجاز است مبالغ پرداختی مازاد را از حساب فروشنده کسر یا در دوره تسویه بعدی لحاظ نماید.<br><br>

                                                    <b>ماده6- وجه‌الالتزامات و ضمانت اجرا :</b><br>
                                                    6-1- در صورت نقض هر یک از تعهدات از جانب فروشنده، وی موظف است به انتخاب میوان: الف) خسارات وارده به مشتری یا میوان را جبران نماید. ب) مبلغی معادل یکصدمیلیون ریال به‌عنوان وجه‌التزام قراردادی به میوان بپردازد.<br>
                                                    6-2- میوان حق دارد تا زمان تسویه کامل خسارات یا وجه‌التزام، وجوه فروشنده نزد خود را مسدود نماید.<br>
                                                    6-3- فروشنده حق هیچ‌گونه مطالبه خسارت یا وجه‌التزام از میوان را در قبال اختلالات فنی یا توقف موقت سامانه به دلایل خارج از کنترل (فورس ماژور) نخواهد داشت.<br><br>

                                                    <b>ماده7- مدت قرارداد :</b><br>
                                                    مدت این قرارداد از تاریخ امضا به مدت یک سال بوده و در صورت عدم اعلام کتبی فسخ از سوی هر یک از طرفین، برای دوره‌های یک‌ساله بعدی تمدید می‌شود.<br><br>

                                                    <b>ماده8- فسخ قرارداد :</b><br>
                                                    8-1- هر یک از طرفین می‌توانند در صورت نقض اساسی تعهدات طرف مقابل، پس از اعلام اخطار کتبی و گذشت ده روز بدون رفع تخلف، قرارداد را فسخ نمایند.<br>
                                                    8-2- میوان می‌تواند در هر زمان به دلیل نقض قوانین یا مصلحت تجاری، پس از تسویه کامل، حساب کاربری فروشنده را مسدود و قرارداد را فسخ نماید.<br><br>

                                                    <b>ماده9- حل و فصل اختلافات :</b><br>
                                                    9-1- طرفین توافق می‌نمایند در صورت بروز هرگونه اختلاف ناشی از این قرارداد، ابتدا از طریق مذاکره و سازش اقدام نمایند.<br>
                                                    9-2- در صورت عدم حصول توافق، مرجع صالح برای رسیدگی، دادگاه‌های حقوقی مهاباد خواهد بود.<br><br>

                                                    <b>ماده10- سایر شرایط :</b><br>
                                                    10-1- کلیه مکاتبات، ابلاغ‌ها و اطلاع‌رسانی‌ها از طریق سامانه میوان «Mevan» و اطلاعات تماس ثبت‌شده فروشنده انجام خواهد شد.<br>
                                                    10-2- عدم اعمال هر یک از حقوق مندرج در این قرارداد از سوی میوان، به منزله اسقاط یا صرف‌نظر از آن حق تلقی نخواهد شد.<br>
                                                    10-3- این قرارداد در ۱۰ ماده تنظیم گردیده و قبول و تأیید آن به منزله پذیرش کامل مفاد آن توسط فروشنده است.<br>
                                                </p>
                                            </div>

                                            <!-- دکمه موافقت -->
                                            <div class="modal-footer">
                                                <button id="agreeBtnModal" class="btn btn-primary" disabled type="button">موافقم</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Danger Alert -->
                                <button id="save" type="button"
                                        class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mt-15"
                                        onclick="saveUserData()">
                                    <span id="submitText">ارسال اطلاعات</span>
                                    <span id="waitingSubmit"
                                          style="display: none"
                                          class="m-0 g-color-white">منتظر بمانید..</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <form action="{{route('sellerRegisterImage')}}" id="imageUploadForm"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <input id="nationalId12" name="nationalId" type="text"
                               class="d-none">
                        <input id="imgNumber" name="imgNumber" type="text" class="d-none">
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@yield('CustomerFooter')
@yield('BaseJsLinks')
<script src="{{ asset('assets/js/cropper.js') }}"></script>
</body>
<script>
    // change persian num to english num
    let persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
        arabicNumbers = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
        fixNumbers = function (str) {
            if (typeof str === 'string') {
                for (let i = 0; i < 10; i++) {
                    str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
                }
            }
            console.log(str);
            return str;
        };
    $('input').on('input', function () {
        $(this).val(fixNumbers($(this).val()));
    })

    $(window).on('pageshow', function () {
        $('#load').hide();
    });

    $(document).ready(function () {
        let $modal = $('#modal'),
            image = document.getElementById('sample_image'),
            cropper, inputID, inputIdFinshed = [], counter = 0;

        // انتخاب فایل
        $('input[id^="pic"]').on('change', function (event) {
            if ($('#nationalId').val().length !== 10) {
                alert('ابتدا لطفا کد ملی را بصورت صحیح وارد کنید.');
                return;
            }

            let currentID = $(this).attr('id').replace(/[^0-9]/gi, '');
            inputID=currentID;
            $('#fileShow' + inputID).removeClass('g-color-red');

            let files = event.target.files;
            if (!files || files.length === 0) return;

            let file = files[0];
            let ext = file.name.split('.').pop().toLowerCase();

            $('#loaderOverlay').css('display', 'flex'); // نمایش لودر

            // helper: تبدیل مسیر نسبی به URL کامل
            function toAbsoluteUrl(path) {
                if (!path) return path;
                if (/^https?:\/\//i.test(path)) return path;
                if (path.startsWith('//')) return window.location.protocol + path;
                if (path.startsWith('/')) return window.location.origin + path;
                return window.location.origin + '/' + path;
            }

            // helper: نمایش در کراپر بعد از اطمینان از لود تصویر
            function showInCropper(url) {
                const abs = toAbsoluteUrl(url);
                const img = new Image();
                img.onload = function () {
                    image.src = abs;      // عنصر image که در modal استفاده می‌شود
                    $modal.modal('show');
                    $('#loaderOverlay').hide();
                };
                img.onerror = function () {
                    console.error('Image load error for:', abs);
                    $('#loaderOverlay').hide();
                    alert('خطا در بارگذاری تصویر خروجی. آدرس: ' + abs);
                };
                // شروع بارگذاری
                img.src = abs;
            }

            if (ext === 'heic' || ext === 'heif') {
                let formData = new FormData();
                formData.append('image', file);
                formData.append('_token', $('input[name=_token]').val());
                formData.append('pic_number', inputID);

                $.ajax({
                    url: '/image-upload',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log('Server response:', response);
                        // پشتیبانی از هر دو شکل پاسخ: response.file یا response.files.image
                        let raw = response.file || (response.files && response.files.image) || response.files?.image;
                        if (!raw) {
                            $('#loaderOverlay').hide();
                            console.error('Missing file in response', response);
                            alert('پاسخ سرور شامل مسیر فایل نیست');
                            return;
                        }
                        showInCropper(raw);
                    },
                    error: function (xhr, status, err) {
                        $('#loaderOverlay').hide();
                        console.error('AJAX error', status, err, xhr && xhr.responseText);
                        alert('خطا در ارتباط با سرور: ' + (xhr && xhr.responseText ? xhr.responseText : status));
                    }
                });

            } else {
                // فایل عادی → مستقیم داخل کراپر (Base64)
                let reader = new FileReader();
                reader.onload = function () {
                    $('#loaderOverlay').hide();
                    image.src = reader.result;
                    $modal.modal('show');
                };
                reader.onerror = function (e) {
                    $('#loaderOverlay').hide();
                    console.error('FileReader error', e);
                    alert('خطا در خواندن فایل محلی');
                };
                reader.readAsDataURL(file);
            }
        });

        // نمایش کراپر
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                viewMode: 1,
                zoomable: true,
                background: true,
                minCropBoxWidth: 800,
                minCropBoxHeight: 450,
                dragCrop: true,
                dragMode: 'move',
                multiple: true,
                movable: true
            });
            $('#loaderOverlay').fadeOut(200);
        });

        // بستن کراپر
        $modal.on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        // برش تصویر
        $('#crop').on('click', function () {
            console.log("inputID is:", inputID); // ← بررسی مقدار

            let canvas = cropper.getCroppedCanvas({
                width: 800,
                height: 450
            });

            canvas.toBlob(function (blob) {
                let reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    if (!inputID) {
                        alert("خطا: inputID مشخص نشده!");
                        return;
                    }

                    $('#imageUrl' + inputID).val(reader.result);

                    $modal.modal('hide');

                    if ($("#userImageDiv" + inputID).length) {
                        $("#userImageDiv" + inputID).clone().appendTo("#imageUploadForm");
                    }

                    $("#imgNumber").val(inputID);
                    $('#imageUploadForm').submit();

                    addPathCheckMark('pic' + inputID, 'fileShow' + inputID, 'Check' + inputID);
                };
            });
        });


        // آپلود Ajax
        $('#imageUploadForm').on('submit', function (e) {
            $('#uploadingIcon' + inputID).removeClass('d-none');
            $('#uploadingText' + inputID).removeClass('d-none');
            $('#fileShow' + inputID).addClass('d-none');

            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    inputIdFinshed[counter] = data;
                    counter++;
                    console.log("success");
                    console.log(data);
                }
            }).done(function () {
                for (let i = 0; i <= inputIdFinshed.length; i++) {
                    $('#uploadingIcon' + inputIdFinshed[i]).addClass('d-none');
                    $('#uploadingText' + inputIdFinshed[i]).addClass('d-none');
                    $('#fileShow' + inputIdFinshed[i]).removeClass('d-none');
                }
            });
        });
    });

    function addPathCheckMark(picID, filePathID, checkMarkID) {
        let pic = $('#' + picID);
        let uploadedVal = pic.val(); // ابتدا مقدار picID
        let filePath = $('#' + filePathID);
        let checkMark = $("#" + checkMarkID);

        // اگر pic خالیه، مقدار imageUrlXX رو جایگزین کن
        if (!uploadedVal) {
            let imageUrlInput = $('#imageUrl' + picID.replace(/\D/g, ''));
            if (imageUrlInput.length) {
                uploadedVal = imageUrlInput.val();
                pic.val(uploadedVal); // مقدار picID رو هم ست کن
            }
        }

        if (uploadedVal) {
            let ext = uploadedVal.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'heic', 'heif']) !== -1) {
                let fileName = pic.val().split("\\").pop();
                filePath.attr("placeholder", fileName);
                filePath.removeClass('g-brd-red g-color-red');
                filePath.addClass('g-color-primary');
                checkMark.css('display', 'inline');
                return;
            }
        }

        // حالت فاقد تصویر
        filePath.attr("placeholder", 'فاقد تصویر');
        filePath.addClass('g-brd-red g-color-red');
        checkMark.css('display', 'none');
    }


    function imAgree(ele) {
        let today = new Date(),
            second = today.getSeconds(),
            minute = today.getMinutes(),
            hour = today.getHours(),
            day = today.getDate(),
            month = today.getMonth() + 1,
            year = today.getFullYear();
        today = year + '/' + month + '/' + day + ' ' + hour + ':' + minute + ':' + second;
        console.log(today);
        ele.val(today);
    }

    function checkData() {
        if ($('#user-name').hasClass('g-brd-red') || $('#user-family').hasClass('g-brd-red') ||
            $('#email').hasClass('g-brd-red') || $('#nationalId').hasClass('g-brd-red') ||
            $('#birthday-day').hasClass('g-brd-red') || $('#birthday-mon').hasClass('g-brd-red') ||
            $('#birthday-year').hasClass('g-brd-red') || $('#male').hasClass('g-bg-gray-light-v5') ||
            $('#female').hasClass('g-bg-gray-light-v5') ||
            $('#mobile').hasClass('g-brd-red') || $('#stateSelect').hasClass('g-brd-red') ||
            $('#citySelect').hasClass('g-brd-red') || $('#homeAddress').hasClass('g-brd-red') ||
            $('#workAddress').hasClass('g-brd-red') ||
            $('#fileShow11').hasClass('g-brd-red') || $('#fileShow12').hasClass('g-brd-red') ||
            !$('#uploadingText11').hasClass('d-none') || !$('#uploadingText12').hasClass('d-none') ||
            $('#catList').hasClass('g-brd-red') || $('#shopName').hasClass('g-brd-red') ||
            $('.creditCard').hasClass('g-brd-red')) {
            return 'false';
        } else {
            return 'true';
        }
    }

    $('.creditCard').on('blur', function () {
        if ($(this).val() === '' || $(this).val().length < 4) {
            $(this).removeClass('g-brd-primary');
            $(this).addClass('g-brd-red');
        } else {
            $(this).removeClass('g-brd-red');
            $(this).addClass('g-brd-primary');
        }
    })

    $('.need').on('input', function () {
        $('#agree').trigger('click');
    })

    function regulationCheck(btn) {
        if (btn === 'noAgree') {
            if (checkData() === 'false') {
                alert('لطفا ابتدا تمامی داده های مورد نیاز را تکمیل بفرمایید.');
            } else {
                alert('لطفا ابتدا قوانین رو مطالعه کردن و قبول کنید');
                $('#readRegulation').trigger('click')
            }
        } else {
            $('#' + btn).addClass('d-none');
            $('#noAgree').removeClass('d-none');
            $('#signature').val('');
        }
    }

    // فعال شدن دکمه وقتی اسکرول به پایین برسه
    document.getElementById("regulationContent").addEventListener("scroll", function () {
        const content = this;
        if (content.scrollTop + content.clientHeight >= content.scrollHeight) {
            document.getElementById("agreeBtnModal").disabled = false;
        }
    });

    // کلیک روی دکمه داخل مودال → کلیک روی دکمه بیرون
    document.getElementById("agreeBtnModal").addEventListener("click", function () {
        // دکمه بیرونی رو تریگر کن
        $('#noAgree').addClass('d-none');
        $('#agree').removeClass('d-none');
        imAgree($('#signature'));

        // مودال بسته بشه
        $('#modalRegulation').modal('hide');
    });

    function saveUserData() {
        if (checkData() === 'false' || $('#agree').hasClass('d-none')) {
            alert('لطفا فرم را بازبینی بفرمائید و خطاهای رخ داده را رفع و مجدداً تلاش کنید.');
        } else {
            $('#submitText').hide();
            $('#waitingSubmit').show();
            $('#save').prop('disabled', true);
            $('#registerForm').submit();
        }
    }

    function changeState(state, city) {
        if (city !== 'citySelectReceiver-new') {
            $('#' + city).find('option').remove().end();
            autoCity($('#' + state).val(), city, 'createOptions');
        } else {
            $('.custombox-content #' + city).find('option').remove().end();
            autoCity($('.custombox-content #' + state).val(), city, 'createOptions');
        }
    }

    function newConnection() {
        if ($('#loginAlert').text() === 'login') {
            window.location = '/Customer-Connection';
        } else
            customerLogin();
    }

    // تابع انتخاب شهر به ازای هر استان
    function autoCity(state, city, type) {
        let s = [], i,
            select = '';
        if (city === 'citySelectReceiver-new')
            select = $('.custombox-content #citySelectReceiver-new');
        else
            select = document.getElementById(city);

        switch (state) {
            case '1':
                s[0] = "آذرشهر";
                s[1] = "اهر";
                s[2] = "اسکو";
                s[3] = "بستان آباد";
                s[4] = "بناب";
                s[5] = "تبریز";
                s[6] = "چاراویماق";
                s[7] = "خداآفرین";
                s[8] = "سراب";
                s[9] = "شبستر";
                s[10] = "عجب شیر";
                s[11] = "کلیبر";
                s[12] = "مراغه";
                s[13] = "مرند";
                s[14] = "ملکان";
                s[15] = "میانه";
                s[16] = "ورزقان";
                s[17] = "هریس";
                s[18] = "هشترود";
                s[19] = "هوراند";

                if (type === 'createOptions') {
                    for (i = 0; i <= 19; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'آذربایجان شرقی ' + s[city];

            case '2':
                s[0] = "آواجیق";
                s[1] = "ارومیه";
                s[2] = "اشنویه";
                s[3] = "ایواوغلی";
                s[4] = "باروق";
                s[5] = "بازرگان";
                s[6] = "بوکان";
                s[7] = "پلدشت";
                s[8] = "پیرانشهر";
                s[9] = "تازه شهر";
                s[10] = "تکاب";
                s[11] = "چهار برج";
                s[12] = "خلیفان";
                s[13] = "خوی";
                s[14] = "دیزج دیز";
                s[15] = "ربط";
                s[16] = "زرآباد";
                s[17] = "سردشت";
                s[18] = "سرو";
                s[19] = "سلماس";
                s[20] = "سیلوانه";
                s[21] = "سیمینه";
                s[22] = "سیاه چشمه";
                s[23] = "شاهین دژ";
                s[24] = "شوط";
                s[25] = "فیروق";
                s[26] = "قره ضیاالدین";
                s[27] = "قطور";
                s[28] = "قطورقوشچی";
                s[29] = "کشاورز";
                s[30] = "لاجان";
                s[31] = "گوگ تپه";
                s[32] = "ماکو";
                s[33] = "محمدیار";
                s[34] = "محمودآباد";
                s[35] = "مرگنلر";
                s[36] = "مهاباد";
                s[37] = "میاندوآب";
                s[38] = "میر آباد";
                s[39] = "نازک علیا";
                s[40] = "نالوس";
                s[41] = "نقده";
                s[42] = "نلاس";
                s[43] = "نوشین شهر";
                s[44] = "یولاگادی";

                if (type === 'createOptions') {
                    for (i = 0; i <= 44; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'آذربایجان غربی ' + s[city];

            case '3':
                s[0] = "اردبیل";
                s[1] = "پارس آباد";
                s[2] = "مشگین شهر";
                s[3] = "خلخال";
                s[4] = "گرمی";
                s[5] = "نمین";
                s[6] = "بیله‌سوار";
                s[7] = "اصلاندوز";
                s[8] = "کوثر";
                s[9] = "نیر";
                s[10] = "سرعین";

                if (type === 'createOptions') {
                    for (i = 0; i <= 10; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'اردبیل ' + s[city];

            case '4':
                s[0] = "اصفهان";
                s[1] = "کاشان";
                s[2] = "خمینی‌شهر";
                s[3] = "نجف‌آباد";
                s[4] = "لنجان";
                s[5] = "فلاورجان";
                s[6] = "شاهین‌شهر و میمه";
                s[7] = "شهرضا";
                s[8] = "مبارکه";
                s[9] = "برخوار";
                s[10] = "آران و بیدگل";
                s[11] = "گلپایگان";
                s[12] = "سمیرم";
                s[13] = "تیران و کرون";
                s[14] = "فریدن";
                s[15] = "نطنز";
                s[16] = "اردستان";
                s[17] = "نائین";
                s[18] = "فریدون‌شهر";
                s[19] = "دهاقان";
                s[20] = "خوانسار";
                s[21] = "چادگان";
                s[22] = "بوئین و میاندشت";
                s[23] = "خور و بیابانک";

                if (type === 'createOptions') {
                    for (i = 0; i <= 23; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'اصفهان ' + s[city];

            case '5':
                s[0] = "کرج";
                s[1] = "فردیس";
                s[2] = "ساوجبلاغ";
                s[3] = "نظرآباد";
                s[4] = "اشتهارد";
                s[5] = "طالقان";
                s[6] = "ایلام";

                if (type === 'createOptions') {
                    for (i = 0; i <= 6; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'البرز ' + s[city];

            case '6':
                s[0] = "ایلام";
                s[1] = "دهلران";
                s[2] = "چرداول";
                s[3] = "ایوان";
                s[4] = "آبدانان";
                s[5] = "دره‌شهر";
                s[6] = "مهران";
                s[7] = "ملکشاهی";
                s[8] = "بدره";
                s[9] = "سیروان";

                if (type === 'createOptions') {
                    for (i = 0; i <= 9; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'ایلام ' + s[city];

            case '7':
                s[0] = "بوشهر";
                s[1] = "دشتستان";
                s[2] = "کنگان";
                s[3] = "گناوه";
                s[4] = "دشتی";
                s[5] = "تنگستان";
                s[6] = "عسلویه";
                s[7] = "جم";
                s[8] = "دیر";
                s[9] = "دیلم";

                if (type === 'createOptions') {
                    for (i = 0; i <= 9; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'بوشهر ' + s[city];

            case '8':
                s[0] = "تهران";
                s[1] = "شهریار";
                s[2] = "اسلامشهر";
                s[3] = "بهارستان";
                s[4] = "ملارد";
                s[5] = "پاکدشت";
                s[6] = "ری";
                s[7] = "قدس";
                s[8] = "مبارکه";
                s[9] = "رباط‌کریم";
                s[10] = "ورامین";
                s[11] = "قرچک";
                s[12] = "پردیس";
                s[13] = "دماوند";
                s[14] = "پیشوا";
                s[15] = "شمیرانات";
                s[16] = "فیروزکوه";

                if (type === 'createOptions') {
                    for (i = 0; i <= 16; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'تهران ' + s[city];

            case '9':
                s[0] = "شهرکرد";
                s[1] = "لردگان";
                s[2] = "بروجن";
                s[3] = "فارسان";
                s[4] = "کیار";
                s[5] = "اردل";
                s[6] = "کوهرنگ";
                s[7] = "سامان";
                s[8] = "بن";

                if (type === 'createOptions') {
                    for (i = 0; i <= 8; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'چهارمحال و بختیاری ' + s[city];

            case '10':
                s[0] = "بیرجند";
                s[1] = "قائنات";
                s[2] = "طبس";
                s[3] = "درمیان";
                s[4] = "نهبندان";
                s[5] = "فردوس";
                s[6] = "سربیشه";
                s[7] = "زیرکوه";
                s[8] = "سرایان";
                s[9] = "خوسف";
                s[10] = "بشرویه";

                if (type === 'createOptions') {
                    for (i = 0; i <= 10; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'خراسان جنوبی ' + s[city];

            case '11':
                s[0] = "مشهد";
                s[1] = "نیشابور";
                s[2] = "سبزوار";
                s[3] = "تربت جام";
                s[4] = "تربت حیدریه";
                s[5] = "قوچان";
                s[6] = "کاشمر";
                s[7] = "شهرضا";
                s[8] = "چناران";
                s[9] = "خواف";
                s[10] = "تایباد";
                s[11] = "فریمان";
                s[12] = "سرخس";
                s[13] = "گناباد";
                s[14] = "بردسکن";
                s[15] = "درگز";
                s[16] = "بینالود";
                s[17] = "زاوه";
                s[18] = "رشتخوار";
                s[19] = "باخرز";
                s[20] = "جوین";
                s[21] = "خلیل‌آباد";
                s[22] = "مه‌ولات";
                s[23] = "جغتای";
                s[24] = "فیروزه";
                s[25] = "خوشاب";
                s[26] = "کلات";
                s[27] = "بجستان";
                s[28] = "داورزن";

                if (type === 'createOptions') {
                    for (i = 0; i <= 28; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'خراسان رضوی ' + s[city];

            case '12':
                s[0] = "بجنورد";
                s[1] = "شیروان";
                s[2] = "اسفراین";
                s[3] = "مانه و سملقان";
                s[4] = "فاروج";
                s[5] = "راز و جرگلان";
                s[6] = "جاجرم";
                s[7] = "گرمه";

                if (type === 'createOptions') {
                    for (i = 0; i <= 7; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'خراسان شمالی ' + s[city];

            case '13':
                s[0] = "اهواز";
                s[1] = "دزفول";
                s[2] = "آبادان";
                s[3] = "بندر ماهشهر";
                s[4] = "شوش";
                s[5] = "ایذه";
                s[6] = "شوشتر";
                s[7] = "بهبهان";
                s[8] = "اندیمشک";
                s[9] = "خرمشهر";
                s[10] = "شادگان";
                s[11] = "رامهرمز";
                s[12] = "مسجدسلیمان";
                s[13] = "دشت آزادگان";
                s[14] = "کارون";
                s[15] = "باغ‌ملک";
                s[16] = "باوی";
                s[17] = "امیدیه";
                s[18] = "گتوند";
                s[19] = "رامشیر";
                s[20] = "حمیدیه";
                s[21] = "اندیکا";
                s[22] = "هویزه";
                s[23] = "هندیجان";
                s[24] = "لالی";
                s[25] = "هفتکل";
                s[26] = "آغاجاری";

                if (type === 'createOptions') {
                    for (i = 0; i <= 26; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'خوزستان ' + s[city];

            case '14':
                s[0] = "زنجان";
                s[1] = "خدابنده";
                s[2] = "ابهر";
                s[3] = "خرمدره";
                s[4] = "طارم";
                s[5] = "ماه‌نشان";
                s[6] = "ایجرود";
                s[7] = "سلطانیه";

                if (type === 'createOptions') {
                    for (i = 0; i <= 7; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'زنجان ' + s[city];

            case '15':
                s[0] = "شاهرود";
                s[1] = "سمنان";
                s[2] = "دامغان";
                s[3] = "گرمسار";
                s[4] = "مهدی‌شهر";
                s[5] = "میامی";
                s[6] = "سرخه";
                s[7] = "آرادان";

                if (type === 'createOptions') {
                    for (i = 0; i <= 7; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'سمنان ' + s[city];

            case '16':
                s[0] = "زاهدان";
                s[1] = "چابهار";
                s[2] = "ایرانشهر";
                s[3] = "سراوان";
                s[4] = "راسک";
                s[5] = "خاش";
                s[6] = "زابل";
                s[7] = "نیک شهر";
                s[8] = "کنارک";
                s[9] = "سیب و سوران";
                s[10] = "زهک";
                s[11] = "مهرستان";
                s[12] = "دلگان";
                s[13] = "هیرمند";
                s[14] = "قصرقند";
                s[15] = "فنوج";
                s[16] = "نیمروز";
                s[17] = "میرجاوه";
                s[18] = "هامون";

                if (type === 'createOptions') {
                    for (i = 0; i <= 18; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'سیستان و بلوچستان ' + s[city];

            case '17':
                s[0] = "شیراز";
                s[1] = "مرودشت";
                s[2] = "کازرون";
                s[3] = "جهرم";
                s[4] = "لارستان";
                s[5] = "فسا";
                s[6] = "داراب";
                s[7] = "فیروزآباد";
                s[8] = "ممسنی";
                s[9] = "نی ریز";
                s[10] = "آباده";
                s[11] = "اقلید";
                s[12] = "لامرد";
                s[13] = "سپیدان";
                s[14] = "کوار";
                s[15] = "زرین‌دشت";
                s[16] = "قیر و کارزین";
                s[17] = "استهبان";
                s[18] = "مهر";
                s[19] = "خرامه";
                s[20] = "گراش";
                s[21] = "خرم‌بید";
                s[22] = "بوانات";
                s[23] = "فراشبند";
                s[24] = "رستم";
                s[25] = "ارسنجان";
                s[26] = "خنج";
                s[27] = "سروستان";
                s[28] = "پاسارگاد";

                if (type === 'createOptions') {
                    for (i = 0; i <= 28; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'فارس ' + s[city];

            case '18':
                s[0] = "قزوین";
                s[1] = "البرز";
                s[2] = "تاکستان";
                s[3] = "بوئین‌زهرا";
                s[4] = "آبیک";
                s[5] = "آوج";

                if (type === 'createOptions') {
                    for (i = 0; i <= 5; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'قزوین ' + s[city];

            case '19':
                s[0] = "قم";

                if (type === 'createOptions') {
                    for (i = 0; i <= 0; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'قم ' + s[city];

            case '20':
                s[0] = "سنندج";
                s[1] = "سقز";
                s[2] = "مریوان";
                s[3] = "بانه";
                s[4] = "قروه";
                s[5] = "کامیاران";
                s[6] = "بیجار";
                s[7] = "دیواندره";
                s[8] = "دهگلان";
                s[9] = "سروآباد";

                if (type === 'createOptions') {
                    for (i = 0; i <= 9; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'کردستان ' + s[city];

            case '21':
                s[0] = "کرمان";
                s[1] = "سیرجان";
                s[2] = "رفسنجان";
                s[3] = "جیرفت";
                s[4] = "بم";
                s[5] = "زرند";
                s[6] = "رودبار جنوب";
                s[7] = "شهربابک";
                s[8] = "کهنوج";
                s[9] = "ریگان";
                s[10] = "بافت";
                s[11] = "عنبرآباد";
                s[12] = "بردسیر";
                s[13] = "قلعه گنج";
                s[14] = "فهرج";
                s[15] = "منوجان";
                s[16] = "نرماشیر";
                s[17] = "راور";
                s[18] = "ارزوئیه";
                s[19] = "انار";
                s[20] = "رابر";
                s[21] = "فاریاب";
                s[22] = "کوهبنان";

                if (type === 'createOptions') {
                    for (i = 0; i <= 22; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'کرمان ' + s[city];

            case '22':
                s[0] = "کرمانشاه";
                s[1] = "اسلام‌آبادغرب";
                s[2] = "سرپل ذهاب";
                s[3] = "سنقر";
                s[4] = "هرسین";
                s[5] = "کنگاور";
                s[6] = "جوانرود";
                s[7] = "صحنه";
                s[8] = "پاوه";
                s[9] = "گیلانغرب";
                s[10] = "روانسر";
                s[11] = "دالاهو";
                s[12] = "ثلاث باباجانی";
                s[13] = "قصرشیرین";

                if (type === 'createOptions') {
                    for (i = 0; i <= 13; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'کرمانشاه ' + s[city];

            case '23':
                s[0] = "بویراحمد";
                s[1] = "کهگیلویه";
                s[2] = "گچساران";
                s[3] = "دنا";
                s[4] = "بهمئی";
                s[5] = "چرام";
                s[6] = "لنده";
                s[7] = "باشت";

                if (type === 'createOptions') {
                    for (i = 0; i <= 7; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'کهگیلویه و بویراحمد ' + s[city];

            case '24':
                s[0] = "گرگان";
                s[1] = "گنبد کاووس";
                s[2] = "علی‌آباد";
                s[3] = "آق‌قلا";
                s[4] = "کلاله";
                s[5] = "آزادشهر";
                s[6] = "رامیان";
                s[7] = "ترکمن";
                s[8] = "مینودشت";
                s[9] = "کردکوی";
                s[10] = "گمیشان";
                s[11] = "گالیکش";
                s[12] = "مراوه‌تپه";
                s[13] = "بندر گز";

                if (type === 'createOptions') {
                    for (i = 0; i <= 7; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'گلستان ' + s[city];

            case '25':
                s[0] = "رشت";
                s[1] = "تالش";
                s[2] = "لاهیجان";
                s[3] = "رودسر";
                s[4] = "لنگرود";
                s[5] = "بندر انزلی";
                s[6] = "صومعه‌سرا";
                s[7] = "آستانه اشرفیه";
                s[8] = "رودبار";
                s[9] = "فومن";
                s[10] = "آستارا";
                s[11] = "رضوانشهر";
                s[12] = "شفت";
                s[13] = "ماسال";
                s[13] = "سیاهکل";
                s[13] = "املش";

                if (type === 'createOptions') {
                    for (i = 0; i <= 13; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'گیلان ' + s[city];

            case '26':
                s[0] = "خرم‌آباد";
                s[1] = "بروجرد";
                s[2] = "دورود";
                s[3] = "کوهدشت";
                s[4] = "دلفان";
                s[5] = "الیگودرز";
                s[6] = "سلسله";
                s[7] = "ازنا";
                s[8] = "پلدختر";
                s[9] = "دوره";
                s[10] = "رومشکان";

                if (type === 'createOptions') {
                    for (i = 0; i <= 10; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'لرستان ' + s[city];

            case '27':
                s[0] = "بابل";
                s[1] = "ساری";
                s[2] = "آمل";
                s[3] = "قائم‌شهر";
                s[4] = "بهشهر";
                s[5] = "تنکابن";
                s[6] = "نوشهر";
                s[7] = "بابلسر";
                s[8] = "نور";
                s[9] = "نکا";
                s[10] = "چالوس";
                s[11] = "نوشهر";
                s[12] = "بابلسر";
                s[13] = "نور";
                s[14] = "نکا";
                s[15] = "چالوس";
                s[16] = "محمودآباد";
                s[17] = "جویبار";
                s[18] = "رامسر";
                s[19] = "فریدونکنار";
                s[20] = "میاندرود";
                s[21] = "عباس‌آباد";
                s[22] = "سوادکوه";
                s[23] = "گلوگاه";
                s[24] = "سوادکوه شمالی";
                s[25] = "کلاردشت";
                s[26] = "سیمرغ";

                if (type === 'createOptions') {
                    for (i = 0; i <= 26; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'مازندران ' + s[city];

            case '28':
                s[0] = "اراک";
                s[1] = "ساوه";
                s[2] = "شازند";
                s[3] = "خمین";
                s[4] = "زرندیه";
                s[5] = "محلات";
                s[6] = "خنداب";
                s[7] = "دلیجان";
                s[8] = "کمیجان";
                s[9] = "فراهان";
                s[10] = "تفرش";
                s[11] = "آشتیان";

                if (type === 'createOptions') {
                    for (i = 0; i <= 11; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'مرکزی ' + s[city];

            case '29':
                s[0] = "بندرعباس";
                s[1] = "میناب";
                s[2] = "بندر لنگه";
                s[3] = "قشم";
                s[4] = "رودان";
                s[5] = "بستک";
                s[6] = "حاجی‌آباد";
                s[7] = "جاسک";
                s[8] = "خمیر";
                s[9] = "پارسیان";
                s[10] = "سیریک";
                s[11] = "بشاگرد";
                s[12] = "ابوموسی";

                if (type === 'createOptions') {
                    for (i = 0; i <= 12; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'هرمزگان ' + s[city];

            case '30':
                s[0] = "همدان";
                s[1] = "ملایر";
                s[2] = "نهاوند";
                s[3] = "کبودرآهنگ";
                s[4] = "بهار";
                s[5] = "رزن";
                s[6] = "تویسرکان";
                s[7] = "اسدآباد";
                s[8] = "فامنین";

                if (type === 'createOptions') {
                    for (i = 0; i <= 8; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'همدان ' + s[city];

            case '31':
                s[0] = "یزد";
                s[1] = "میبد";
                s[2] = "اردکان";
                s[3] = "مهریز";
                s[4] = "ابرکوه";
                s[5] = "بافق";
                s[6] = "تفت";
                s[7] = "خاتم";
                s[8] = "اشکذر";
                s[9] = "بهاباد";

                if (type === 'createOptions') {
                    for (i = 0; i <= 9; i++) {
                        let opt = document.createElement('option');
                        opt.value = i;
                        opt.innerHTML = s[i];
                        select.append(opt);
                    }
                    break;
                } else
                    return 'یزد ' + s[city];
        }
    }

    function nowDate() {
        let week = ["يكشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"],
            months = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            today = new Date(),
            d = today.getDay(),
            day = today.getDate(),
            month = today.getMonth() + 1,
            year = today.getFullYear() - (1900);
        let i, y;
        year = (window.navigator.userAgent.indexOf('MSIE') > 0) ? year : 1900 + year;
        if (year === 0) {
            year = 2000;
        }
        if (year < 100) {
            year += 1900;
        }
        y = 1;
        for (i = 0; i < 3000; i += 4) {
            if (year === i) {
                y = 2;
            }
        }
        for (i = 1; i < 3000; i += 4) {
            if (year === i) {
                y = 3;
            }
        }
        if (y === 1) {
            year -= ((month < 3) || ((month === 3) && (day < 21))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 21) ? (month = 10, day += 10) : (month = 11, day -= 20);
                    break;
                case 2:
                    (day < 20) ? (month = 11, day += 11) : (month = 12, day -= 19);
                    break;
                case 3:
                    (day < 21) ? (month = 12, day += 9) : (month = 1, day -= 20);
                    break;
                case 4:
                    (day < 21) ? (month = 1, day += 11) : (month = 2, day -= 20);
                    break;
                case 5:
                case 6:
                    (day < 22) ? (month -= 3, day += 10) : (month -= 2, day -= 21);
                    break;
                case 7:
                case 8:
                case 9:
                    (day < 23) ? (month -= 3, day += 9) : (month -= 2, day -= 22);
                    break;
                case 10:
                    (day < 23) ? (month = 7, day += 8) : (month = 8, day -= 22);
                    break;
                case 11:
                case 12:
                    (day < 22) ? (month -= 3, day += 9) : (month -= 2, day -= 21);
                    break;
                default:
                    break;
            }
        }
        if (y === 2) {
            year -= ((month < 3) || ((month === 3) && (day < 20))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 21) ? (month = 10, day += 10) : (month = 11, day -= 20);
                    break;
                case 2:
                    (day < 20) ? (month = 11, day += 11) : (month = 12, day -= 19);
                    break;
                case 3:
                    (day < 20) ? (month = 12, day += 10) : (month = 1, day -= 19);
                    break;
                case 4:
                    (day < 20) ? (month = 1, day += 12) : (month = 2, day -= 19);
                    break;
                case 5:
                    (day < 21) ? (month = 2, day += 11) : (month = 3, day -= 20);
                    break;
                case 6:
                    (day < 21) ? (month = 3, day += 11) : (month = 4, day -= 20);
                    break;
                case 7:
                    (day < 22) ? (month = 4, day += 10) : (month = 5, day -= 21);
                    break;
                case 8:
                    (day < 22) ? (month = 5, day += 10) : (month = 6, day -= 21);
                    break;
                case 9:
                    (day < 22) ? (month = 6, day += 10) : (month = 7, day -= 21);
                    break;
                case 10:
                    (day < 22) ? (month = 7, day += 9) : (month = 8, day -= 21);
                    break;
                case 11:
                    (day < 21) ? (month = 8, day += 10) : (month = 9, day -= 20);
                    break;
                case 12:
                    (day < 21) ? (month = 9, day += 10) : (month = 10, day -= 20);
                    break;
                default:
                    break;
            }
        }
        if (y === 3) {
            year -= ((month < 3) || ((month === 3) && (day < 21))) ? 622 : 621;
            switch (month) {
                case 1:
                    (day < 20) ? (month = 10, day += 11) : (month = 11, day -= 19);
                    break;
                case 2:
                    (day < 19) ? (month = 11, day += 12) : (month = 12, day -= 18);
                    break;
                case 3:
                    (day < 21) ? (month = 12, day += 10) : (month = 1, day -= 20);
                    break;
                case 4:
                    (day < 21) ? (month = 1, day += 11) : (month = 2, day -= 20);
                    break;
                case 5:
                case 6:
                    (day < 22) ? (month -= 3, day += 10) : (month -= 2, day -= 21);
                    break;
                case 7:
                case 8:
                case 9:
                    (day < 23) ? (month -= 3, day += 9) : (month -= 2, day -= 22);
                    break;
                case 10:
                    (day < 23) ? (month = 7, day += 8) : (month = 8, day -= 22);
                    break;
                case 11:
                case 12:
                    (day < 22) ? (month -= 3, day += 9) : (month -= 2, day -= 21);
                    break;
                default:
                    break;
            }
        }
        // let now = week[d] + " " + day + " " + months[month - 1] + " " + year;
        let now = year + "/" + months[month - 1] + "/" + day,
            nextYear = year + 1 + "/" + months[month - 1] + "/" + day;
        $('#nextYear').text(nextYear);
        return now;
    }

    function categorySelect(thisElement, cat) {
        let category = '', catHint = thisElement.text().replace(/\s+/g, " "), catCode = thisElement.attr('id');
        $('#accordion-04-body-01').removeClass('show');
        $('.card').removeClass('g-brd-red');
        switch (cat) {
            case 'clothes':
                category = 'پوشاک (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'vehicles':
                category = 'وسایل نقلیه (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'Digital':
                category = 'لوازم الکتریکی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'ImportedProduct':
                category = 'کالای وارداتی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'connections':
                category = 'وسایل ارتباطی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'appliances':
                category = 'لوازم خانگی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;

            case 'personal':
                category = 'لوازم شخصی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;

            case 'medicine':
                category = 'دارو و کالای پزشکی (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;
            case 'Stationery':
                category = 'لوازم تحریر و اداری (' + catHint + ')';
                $('#selectedItem').text(category);
                $('#hintCategory').val(category);
                break;

            default:
                $('#selectedItem').text(catHint);
                $('#category').val(catHint);
                break;
        }
        $('#category').val(cat);
        $('#catCode').val(catCode);
        console.log('category->', $('#category').val(), 'catCode', $('#catCode').val(), 'hintCat', $('#hintCategory').val())
    }
    function showLoader() {
        const loader = document.getElementById('global-loader');
        if (loader) loader.style.display = 'flex';
    }
    function hideLoader() {
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.style.opacity = "0";
            setTimeout(() => loader.style.display = 'none', 500);
        }
    }
    function closeOtherMenu() {
        if ($('#btnMenu').attr('aria-expanded') === 'false') {
            $('#otherMenu').attr("style", "display: none !important;");
        } else
            $('#otherMenu').removeAttr('style');
    }
    // --- 1) بستن Loader بعد از load یا حداکثر 6 ثانیه ---
    window.addEventListener("load", () => hideLoader());
    setTimeout(hideLoader, 6000);

    // --- 2) مدیریت Loader روی درخواست‌ها ---
    (function () {
        let activeRequests = 0;
        const originalFetch = window.fetch;

        window.fetch = async function (...args) {
            if (activeRequests === 0) showLoader();
            activeRequests++;

            try {
                const response = await originalFetch.apply(this, args);
                return response;
            } catch (err) {
                throw err;
            } finally {
                activeRequests--;
                if (activeRequests <= 0) hideLoader();
            }
        };
    })();

    document.getElementById('backButton').addEventListener('click', function() {
        if (document.referrer) {
            window.history.back();
        } else {
            window.location.href = '/';
        }
    });
</script>
@yield('BaseJsFunction')
