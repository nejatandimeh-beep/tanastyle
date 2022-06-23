@extends('Layouts.IndexCustomer')
@section('Content')
    <p id="pageLocation" class="d-none">{{ $location }}</p>
    <div class="container-fluid modalBox">
        <div class="row">
            <div class="col-lg-12 g-brd-top g-brd-gray-light-v4">
                <!-- Figure -->
                <figure class="u-block-hover g-bg-white g-rounded-4 g-py-15">
                    <div style="direction: rtl" class="d-flex justify-content-start align-items-center">
                        <div class="col-md-9 d-flex g-pr-15--lg g-pr-0">
                        @if($customer->PicPath !== '0')
                            <!-- Figure Image -->
                                <img class="g-width-80 g-height-80 rounded-circle g-ml-15"
                                     id="userImage"
                                     src="{{ asset($customer->PicPath.'?'.time()) }}"
                                     {{--use ? and time() for refresh image--}}
                                     alt="Image Description">
                                <!-- Figure Image -->
                            @else
                                <img src="{{ asset('img/Other/user-add-icon.png') }}" id="uploaded_image"
                                     class="g-width-80 g-height-80 rounded-circle g-ml-15 g-brd-around g-brd-gray-light-v2">
                        @endif
                        <!-- Figure Info -->
                            <div class="d-flex flex-column justify-content-center">
                                <div class="g-mb-5">
                                    <h4 class="h5 g-mb-0">
                                        @if(Auth::user()->name===null || Auth::user()->name==='') {{Auth::user()->Mobile}} @else  {{Auth::user()->name.' '.Auth::user()->Family}} @endif
                                        {{--                                        @if(Auth::user()->email_verified_at === null)--}}
                                        {{--                                            @if (session('resent'))--}}
                                        {{--                                                <label class="g-color-primary g-font-size-16 g-mr-10">--}}
                                        {{--                                                    <i class="fa fa-envelope g-font-size-16"></i>--}}
                                        {{--                                                    <span--}}
                                        {{--                                                        class="g-color-main">لینک فعال سازی به ایمیل شما ارسال شد.</span>--}}
                                        {{--                                                </label>--}}
                                        {{--                                            @else--}}
                                        {{--                                                <label class="g-color-red g-font-size-16">--}}
                                        {{--                                                    <span>حساب کاربری شما فعالسازی نشده است</span>--}}
                                        {{--                                                    <i class="fa fa-exclamation g-font-size-16"></i>--}}
                                        {{--                                                </label>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @endif--}}
                                    </h4>
                                </div>
                                <em class="d-block g-color-gray-dark-v5 g-font-style-normal g-font-size-13 g-mb-2">@if(Auth::user()->name===null || Auth::user()->name==='')
                                        بدون نام @else {{ Auth::user()->Mobile }} @endif</em>
                            </div>
                        </div>
                        <!-- End Figure Info -->

                        <!-- Figure Caption -->
                        <figcaption class="u-block-hover__additional--fade g-bg-white-opacity-0_9 g-pa-30">
                            <div
                                class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">
                                {{--                                @if(Auth::user()->email_verified_at === null)--}}
                                {{--                                    <ul class="list-inline text-center g-flex-middle-item">--}}
                                {{--                                        @if (!session('resent'))--}}
                                {{--                                            <li id="emailActivation"--}}
                                {{--                                                class="list-inline-item justify-content-center g-mx-7">--}}
                                {{--                                            <span class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">--}}
                                {{--                                                <i class="fa fa-check"></i>--}}
                                {{--                                            </span>--}}
                                {{--                                                <form class="d-inline text-left" method="POST"--}}
                                {{--                                                      action="{{ route('verification.resend') }}">--}}
                                {{--                                                    @csrf--}}
                                {{--                                                    <button type="submit"--}}
                                {{--                                                            class="btn customLink g-bg-transparent p-0 m-0 align-baseline">--}}
                                {{--                                                        فعال سازی حساب کاربری--}}
                                {{--                                                    </button>--}}
                                {{--                                                </form>--}}
                                {{--                                            </li>--}}
                                {{--                                        @endif--}}
                                {{--                                        @if (session('resent'))--}}
                                {{--                                            <li style="direction: rtl" id="sendVerifyHint"--}}
                                {{--                                                class="list-inline-item justify-content-center">--}}
                                {{--                                                <span class="g-color-primary g-font-size-20 g-ml-5"><i--}}
                                {{--                                                        class="fa fa-envelope"></i></span>--}}
                                {{--                                                <span>لینک فعال سازی به ایمیل شما ارسال شد. لطفا آخرین ایمیل از طرف Tanastyle.ir را چک کنید.</span>--}}
                                {{--                                            </li>--}}
                                {{--                                        @endif--}}
                                {{--                                    </ul>--}}
                                {{--                                @else--}}

                                <ul class="list-inline text-center g-flex-middle-item">
                                    <li class="list-inline-item justify-content-center g-mx-7">
                                        <span
                                            class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">
                                            <i class="icon-lock-open"></i>
                                        </span>
                                        <a class="customLink" href="{{ route('requestMobile',['source'=>'forget']) }}">تغییر
                                            رمز
                                            عبور</a>
                                    </li>
                                    <li class="list-inline-item justify-content-center g-mx-7">
                                                <span
                                                    class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">
                                                    <i class="icon-user"></i>
                                                </span>
                                        <form class="d-inline-block" id="uploadImage"
                                              action="{{route('uploadImage')}}"
                                              enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <label class="customerCropper" for="upload_image" style="cursor: pointer">
                                                <span class="customLink">تنظیم تصویر حساب کاربری</span>
                                                <input type="file" name="image" id="upload_image" class="image"
                                                       style="display: none" accept="image/*">
                                            </label>
                                        </form>
                                    </li>
                                </ul>
                            {{--                            @endif--}}
                            <!-- Figure Social Icons -->

                                <!-- End Figure Social Icons -->
                            </div>
                        </figcaption>
                        <!-- End Figure Caption -->
                    </div>
                </figure>
                <!-- End Figure -->
            </div>
        </div>
        <div style="direction: rtl" class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">تنظیم اندازه تصویر</h5>
                        <button type="button" class="close"
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
                        <button type="button" id="crop" class="btn btn-primary g-mr-5">
                            <span id="cropText">برش</span>
                            <i id="waitingCrop"
                               style="display: none"
                               class="fa fa-spinner fa-spin g-px-10 m-0 g-font-size-20 g-color-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div style="direction: rtl" class="row g-brd-top g-brd-gray-light-v4">

            <!-- Filters -->
            <div class="col-md-3 flex-md-first g-brd-left--lg g-brd-gray-light-v4 filter">
                <div>
                    <div class="g-bg-white-opacity-0_9 bigDevice">
                        <div class="g-pr-15--lg d-flex g-pb-20 g-pt-20">
                            <h5 class="m-0 align-self-center">پنل کاربری</h5>
                        </div>
                        <hr style="z-index: 100 !important"
                            class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
                    </div>

                    <div class="g-pr-15 g-pl-15 g-pl-0--lg g-pt-20">
                        <div style="direction: rtl" role="tablist" aria-multiselectable="true">
                            <!-- مشخصات فردی -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-data"
                                           class="nav-link g-color-primary g-color-primary--hover p-0"
                                           onclick="showPanel('data');">
                                            مشخصات فردی
                                            <i class="icon-user float-left g-font-size-17 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- آدرس ها -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-address"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('address');">
                                            آدرس ها
                                            <i class="icon-location-pin float-left g-font-size-17 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- آدرس ها -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a id="filter-user-cart"
                                           href="{{route('cart')}}"
                                           class="nav-link g-color-main g-color-primary--hover p-0">
                                            سبد خرید
                                            <i class="icon-basket float-left g-font-size-17 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- خریداری شده -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-bought"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('bought');">خریداری
                                            شده
                                            <i class="icon-tag float-left g-font-size-17 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- در انتظار تحویل -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-delivery"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('delivery');">در انتظار تحویل
                                            <i class="icon-hourglass float-left g-font-size-17 g-pb-5 g-pl-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- برگشت محصول -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer;"
                                           id="filter-user-return"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('return');">برگشت محصول
                                            <i class="icon-action-undo float-left g-font-size-17 g-pb-5 g-pl-5"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- علاقه مندی ها -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-like"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('like');">محصولات ذخیره شده
                                            <i class="fa fa-bookmark-o float-left g-font-size-17 g-pb-5 g-pl-8"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- خروج -->
                            <div class="card g-brd-0 g-mb-5">
                                <div style="border: none" id="accordion-100-heading-01" class="card-header g-pa-0"
                                     role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           class="nav-link g-color-main g-color-lightred--hover p-0"
                                           onclick="confirmLogout()">خروج
                                            <i class="icon-logout float-left g-font-size-17 g-pb-5 g-pl-3"></i>
                                        </a>
                                        <form id="logout-customer-form" action="{{route('logout')}}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9 flex-md-unordered">
                <!-- مشخصات فردی -->
                <div id="user-data">
                    <div class="g-bg-white-opacity-0_9 g-mb-30 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 18px;" class="g-pr-15 d-flex g-pt-20--lg g-pt-10 g-color-primary">
                            <i class="icon-user g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                مشخصات فردی
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <form id="profileUpdate" action="{{route('profileUpdate')}}" method="POST">
                        @csrf
                        <div class="container g-py-30--lg g-px-60--lg">
                            {{--نام--}}
                            <div class="form-group row g-mb-15">
                                <label
                                    class="col-sm-2 col-form-label align-self-center">نام</label>
                                <div class="col-sm-10 force-col-12">
                                    <input id="user-name"
                                           class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                           type="text"
                                           value="{{ $customer->name }}"
                                           name="name"
                                           maxlength="15"
                                           placeholder="الزاما فارسی"
                                           {{--                                           lang="fa"--}}
                                           onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                           readonly="">
                                </div>
                            </div>
                            {{--نام خانوادگی--}}
                            <div class="form-group row g-mb-15">
                                <label class="col-sm-2 col-form-label align-self-center">نام
                                    خانوادگی</label>
                                <div class="col-sm-10 force-col-12">
                                    <input
                                        class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                        id="user-family"
                                        name="family"
                                        maxlength="15"
                                        type="text"
                                        value="{{ $customer->Family }}"
                                        placeholder="الزاما فارسی"
                                        {{--                                           lang="fa"--}}
                                        onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                        str = $(this).val();
                                                        str = str.substring(0, str.length - 1);
                                                        $(this).val(str);
                                                        $(this).attr('autocomplete', 'off');
                                                    } else
                                                        $(this).attr('autocomplete', 'name');"
                                        readonly="">
                                </div>
                            </div>
                            {{--کد ملی--}}
                            <div class="form-group row g-mb-15">
                                <label class="col-sm-2 col-form-label align-self-center">کد
                                    ملی</label>
                                <div dir="ltr" class="col-sm-10 force-col-12">
                                    <input
                                        class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                        id="user-notionalId"
                                        name="nationalId"
                                        value="{{ $customer->NationalID }}"
                                        oninput="forceEnglishNumber($(this).val(), $(this),'#birthday-day',10)"
                                        pattern="\d*"
                                        placeholder="فقط اعداد انگلیسی"
                                        readonly="">
                                </div>
                            </div>
                            {{--تاریخ تولد--}}
                            <div class="customDisable form-group row g-mb-15" style="pointer-events: none">
                                <label class="col-sm-2 col-form-label align-self-center">تاریخ
                                    تولد</label>
                                <div class="col-sm-10 force-col-12">
                                    <div class="d-flex">
                                        <select style="direction: ltr"
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5"
                                                id="birthday-day"
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
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5"
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
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5"
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
                            <div class="customDisable form-group row g-mb-15" style="pointer-events: none">
                                <label
                                    class="col-sm-2 col-form-label align-self-center">جنسیت</label>
                                <div class="col-sm-10 force-col-12">
                                    <div class="btn-group-lg d-flex">
                                        <label class="u-check col-md-4 g-pa-0">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                   type="radio"
                                                   {{ ($customer->Gender === 0) ?  'checked':''}} value="0">
                                            <span
                                                class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                        </label>
                                        <label class="u-check col-md-4 g-pa-0">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                   type="radio"
                                                   {{ ($customer->Gender === 1) ?  'checked':''}} value="1">
                                            <span
                                                class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
                                        </label>
                                        <label class="u-check col-md-4 g-pa-0">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                   type="radio"
                                                   {{ ($customer->Gender === 2) ?  'checked':''}} value="2">
                                            <span
                                                class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-bg-primary--checked rounded-0 g-color-white--checked">کودک</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{--تلفن ثابت--}}
                            <div class="form-group row g-mb-15">
                                <label class="col-sm-2 col-form-label align-self-center">تلفن
                                    ثابت</label>
                                <div class="col-sm-10 force-col-12 d-flex">
                                    <input
                                        style="direction: ltr"
                                        class="text-left col-8 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                        id="phoneNumber"
                                        name="phone"
                                        type="text"
                                        oninput="forceEnglishNumber($(this).val(), $(this),'#stateSelect',8)"
                                        pattern="\d*"
                                        value="{{ $customer->Phone }}"
                                        placeholder="xxxxxxxx"
                                        readonly="">
                                    <input
                                        style="direction: ltr"
                                        id="phonePreNumber"
                                        name="prePhone"
                                        class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-right-none"
                                        pattern="\d*"
                                        value="{{ $customer->PrePhone }}"
                                        oninput="forceEnglishNumber($(this).val(), $(this),'#phoneNumber',3)"
                                        placeholder="0xx"
                                        readonly="">
                                </div>
                            </div>
                            {{--آدرس سکونت--}}
                            <div class="customDisable form-group row g-mb-15" style="pointer-events: none">
                                <label class="col-sm-2 col-form-label align-self-center">آدرس
                                    سکونت</label>
                                <div class="col-sm-10 force-col-12">
                                    <div class="d-lg-flex">
                                        <!--ورودی زیر فقط برای دریافت استان جاوااسکریپت استفاده می شود-->
                                        <input id="state" class="d-none" value="{{ $customer->State }}">
                                        <select id="stateSelect" style="direction: rtl; padding-right: 30px !important"
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none--lg g-bg-gray-light-v5 g-mb-10 g-mb-0--lg"
                                                tabindex="3"
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
                                        <input id="city" class="d-none" value="{{ $customer->City }}">
                                        <select id="citySelect" style="direction: rtl; padding-right: 30px !important"
                                                class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5"
                                                name="city"
                                                tabindex="4">
                                            <option value="">شهر</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="completeProfileHint" class="d-none alert alert-success alert-dismissible fade show g-mx-15 g-mx-60--lg g-mt-40 g-mt-0--lg"
                         role="alert">
                        <h4 class="h5"><i class="icon-present g-ml-5"></i>تکمیل اطلاعات کاربری
                        </h4>
                        <span class="g-font-weight-600">{{ Auth::user()->name }}</span> عزیز با تکمیل مشخصات فردی، از
                      تمامی امکانات سامانه همچون هدیه، تخفیفات ویژه، پاسخگویی سریع و ... بهره ببرید.
                    </div>
                    <div style="direction: ltr" class="g-mx-60--lg g-mt-60--lg g-mb-30--lg g-my-30 g-mx-15">
                        <button id="edit" type="button"
                                class="btn btn-md u-btn-outline-primary g-bg-white g-bg-primary--hover rounded-0 force-col-12 g-mb-15"
                                onclick="editUserData()">
                            ویرایش مشخصات فردی
                        </button>
                        <button id="save" style="display: none" type="button"
                                class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                                onclick="saveUserData()">
                            ثبت اطلاعات
                        </button>
                    </div>
                </div>

                <!-- آدرسها -->
                <div style="display: none" id="user-address">
                    <div class="g-bg-white-opacity-0_9 g-mb-50 g-mb-30--lg g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 18px;" class="g-pr-15 d-flex g-pt-20--lg g-pt-10 g-color-primary">
                            <i class="icon-location-pin g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                آدرسها
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>

                    <div class="container g-py-30--lg g-px-60--lg">
                        <div id="accordion-13" class="u-accordion" role="tablist"
                             aria-multiselectable="true">
                            @if(!isset($address[0]->ID))
                                <div
                                    class="d-inline-block alert alert-danger g-px-15--lg g-px-5 text-lg-right text-center"
                                    role="alert">
                                    <strong>اخطار!</strong> لیست آدرس های شما خالی است.
                                </div>
                            @else
                                @foreach($address as $key => $row)
                                    <div id="{{'addressRow'.$key}}"
                                         class="card g-brd-none rounded-0 g-mb-40 g-mb-1--lg">
                                        <div id="{{ 'accordion-13-heading-'.$key }}" class="u-accordion__header g-pa-0"
                                             role="tab">
                                            <div style="direction: rtl" class="w-100 d-md-table g-color-gray-dark-v5"
                                                 role="button"
                                                 data-target="#{{ 'accordion-13-body-'.$key }}" data-toggle="collapse"
                                                 data-parent="#accordion-13"
                                                 onmousemove="optionHover({{$key}})"
                                                 onmouseout="optionUnHover({{$key}})"
                                                 aria-expanded="false" aria-controls="{{ 'accordion-13-body-'.$key }}">
                                                <!-- ردیف و کلیدهای فعالسازی آدرس -->
                                                <div
                                                    class="clearfix d-md-table-cell g-valign-middle g-pa-20--lg g-width-300 justify-content-between">
                                                    <!-- Track Num -->
                                                    <div
                                                        class="d-inline-block g-ml-20 g-width-20"><i
                                                            id="addressOption{{$key}}"
                                                            class="icon-options g-font-size-20 g-color-gray-dark-v3 align-middle g-line-height-0"></i>
                                                    </div>
                                                    <!-- End Track Num -->
                                                @if($row->Status === 1)
                                                    <!-- Track Avatar -->
                                                        <span style="cursor: default"
                                                              class="g-ml-10 g-ml-25--lg g-bg-primary g-py-10 g-pr-15 g-pl-10 g-font-size-16">
                                                        <i class="icon-location-pin g-color-white align-middle g-line-height-0"></i>
                                                    </span>
                                                        <!-- End Track Avatar -->
                                                @else
                                                    <!-- Track Avatar -->
                                                        <a class="g-ml-10 g-ml-25--lg g-text-underline--none--hover g-bg-primary--hover g-bg-lightred g-py-10 g-pr-15 g-pl-10 g-font-size-16 g-width-50"
                                                           href="#"
                                                           id="{{ $row->ID }}"
                                                           onclick="activeAddress($(this).attr('id'))"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           data-original-title="فعال سازی آدرس">
                                                            <i class="icon-location-pin g-color-white align-middle g-line-height-0"></i>
                                                        </a>
                                                @endif
                                                <!-- End Track Avatar -->

                                                    <!-- Track Title -->
                                                    <h6 class="d-inline-block g-font-size-13 g-font-weight-700 g-color-black mb-0">
                                                        {{ $row->ReceiverName.' '.$row->ReceiverFamily }}</h6>
                                                    <!-- End Article Title -->
                                                    <div class="float-left d-inline-block smallDevice">
                                                        {{--delete button small device--}}
                                                        @if($row->Status === 1)
                                                            <span style="cursor: default"
                                                                  class="g-color-gray-dark-v5 align-middle"
                                                                  data-toggle="tooltip"
                                                                  data-placement="top" data-original-title="آدرس فعال">
                                                            <i class="icon-target g-font-size-18 g-color-primary"></i>
                                                        </span>
                                                        @else
                                                            <i id="{{'waitingAddressDelete'.$key}}"
                                                               style="display: none"
                                                               class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                                            <a style="cursor: pointer"
                                                               class="g-color-gray-dark-v5 g-text-underline--none--hover"
                                                               id="{{ 'deleteBtn'.$key }}"
                                                               onclick="deleteAddress({{ $row->ID }},$(this).attr('id'))"
                                                               data-toggle="tooltip"
                                                               data-placement="top" data-original-title="حذف آدرس">
                                                                <i class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- آدرس دقیق ارسالی -->
                                                <div
                                                    class="d-md-table-cell hidden-sm-down g-font-weight-700 g-valign-middle g-px-10 g-py-5">
                                                    <span
                                                        style="display: inline-block; width: 500px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                                        class="align-middle">{{ $row->Address }}</span>
                                                </div>
                                                <!-- حذف آدرس -->
                                                <div
                                                    class="text-md-right d-md-table-cell g-valign-middle g-pa-20 bigDevice">
                                                    {{--delete button big device--}}
                                                    @if($row->Status === 1)
                                                        <span style="cursor: default"
                                                              class="g-color-gray-dark-v5 g-pa-5 align-middle"
                                                              data-toggle="tooltip"
                                                              data-placement="top" data-original-title="آدرس فعال">
                                                            <i class="icon-target g-font-size-18 g-color-primary"></i>
                                                        </span>
                                                    @else
                                                        <i id="{{'waitingAddressDelete'.$key}}" style="display: none"
                                                           class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                                        <a style="cursor: pointer"
                                                           onclick="deleteAddress({{ $row->ID }},$(this).attr('id'))"
                                                           id="{{ 'deleteBtn'.$key }}"
                                                           class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                           data-toggle="tooltip"
                                                           data-placement="top" data-original-title="حذف آدرس">
                                                            <i class="icon-trash g-font-size-18 g-color-lightred g-color-red--hover"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <form id="{{ 'addressUpdate'.$key }}" action="{{route('addressUpdate')}}"
                                              method="POST">
                                            @csrf
                                            <input name="receiver-id" class="d-none" value="{{$row->ID}}">
                                            <div id="{{ 'accordion-13-body-'.$key }}" class="collapse g-bg-white"
                                                 role="tabpanel"
                                                 aria-labelledby="{{ 'accordion-13-heading-'.$key }}">
                                                <div class="u-accordion__body g-pl-0">
                                                    <div class="g-pt-15 g-py-30--lg g-pr-10 g-px-60--lg">
                                                        {{--نام گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label
                                                                class="col-sm-2 col-form-label align-self-center">نام
                                                                گیرنده</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input
                                                                    id="{{ 'receiver-name-'.$key }}"
                                                                    class="formValidate form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    type="text"
                                                                    name="receiver-name"
                                                                    maxlength="15"
                                                                    oninput="($(this).val().length>1) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                                    value="{{ $row->ReceiverName }}"
                                                                    placeholder="الزاماً فارسی"
                                                                    {{--                                           lang="fa"--}}
                                                                    onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                                        str = $(this).val();
                                                                        str = str.substring(0, str.length - 1);
                                                                        $(this).val(str);
                                                                        $(this).attr('autocomplete', 'off');
                                                                        } else
                                                                        $(this).attr('autocomplete', 'name');"
                                                                    readonly="">
                                                            </div>
                                                        </div>
                                                        {{--نام خانوادگی گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label
                                                                class="col-sm-2 col-form-label align-self-center">نام
                                                                خانوادگی
                                                            </label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input
                                                                    class="formValidate form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    type="text"
                                                                    name="receiver-family"
                                                                    maxlength="15"
                                                                    value="{{ $row->ReceiverFamily }}"
                                                                    oninput="($(this).val().length>1) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                                    placeholder="الزاماً فارسی"
                                                                    {{--                                           lang="fa"--}}
                                                                    onkeyup="if (!(/^[\u0600-\u06FF\s]+$/.test($(this).val()))) {
                                                                        str = $(this).val();
                                                                        str = str.substring(0, str.length - 1);
                                                                        $(this).val(str);
                                                                        $(this).attr('autocomplete', 'off');
                                                                        } else
                                                                        $(this).attr('autocomplete', 'name');"
                                                                    readonly="">
                                                            </div>
                                                        </div>
                                                        {{--کد پستی گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label class="col-sm-2 col-form-label align-self-center">کد
                                                                پستی</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input style="direction: ltr"
                                                                       class="formValidate text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                       value="{{ $row->PostalCode }}"
                                                                       name="receiver-postalCode"
                                                                       oninput="forceEnglishNumber($(this).val(), $(this),'null',10)"
                                                                       pattern="\d*"
                                                                       placeholder="فقط اعداد انگلیسی"
                                                                       readonly="">
                                                            </div>
                                                        </div>
                                                        {{--موبایل گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label
                                                                class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input style="direction: ltr"
                                                                       id="{{ 'receiverMobile'.$key }}"
                                                                       class="formValidate text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                       oninput="forceEnglishNumber($(this).val(), $(this),'null',11)"
                                                                       pattern="\d*"
                                                                       placeholder="09xxxxxxxx"
                                                                       name="receiver-mobile"
                                                                       value="{{ $row->Mobile }}"
                                                                       readonly="">
                                                            </div>
                                                        </div>
                                                        {{--استان/شهر گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label
                                                                class="col-sm-2 col-form-label align-self-center">استان/شهر</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <div id="{{'stateCity'.$key}}" class="d-flex">
                                                                    <input id="{{ 'stateReceiver'.$key }}"
                                                                           class="d-none"
                                                                           value="{{ $row->State }}">
                                                                    <select id="{{ 'stateSelectReceiver-'.$key }}"
                                                                            style="direction: rtl; padding-right: 30px !important; pointer-events: none"
                                                                            name="receiver-state"
                                                                            oninput="if($(this).val()!=='0') {
                                                                                $(this).removeClass('g-brd-red');
                                                                                $(this).parent().find('.city').removeClass('g-brd-red');
                                                                            } else {
                                                                                $(this).parent().find('.city').addClass('g-brd-red');
                                                                                $(this).addClass('g-brd-red');
                                                                            }"
                                                                            class="formValidate form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5"
                                                                            tabindex="3"
                                                                            onchange="changeState('stateSelectReceiver-'+ {{$key}} , 'citySelectReceiver-' + {{$key}})">
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

                                                                    <input id="{{ 'cityReceiver'.$key }}" class="d-none"
                                                                           name="receiver-city"
                                                                           value="{{ $row->City }}">
                                                                    <select id="{{ 'citySelectReceiver-'.$key }}"
                                                                            style="direction: rtl; padding-right: 30px !important; pointer-events: none"
                                                                            name="receiver-city"
                                                                            onchange="$('.custombox-content #receiverAddress{{$key}}').focus();"
                                                                            class="formValidate city form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5"
                                                                            tabindex="4">
                                                                        <option value="0">شهر</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--آدرس دقیق--}}
                                                        <div class="form-group row g-mb-25">
                                                            <label class="col-sm-2 col-form-label">آدرس دقیق</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input id="receiverAddress{{$key}}"
                                                                    class="formValidate form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    maxlength="300"
                                                                    name="receiver-address"
                                                                    oninput="($(this).val().length>5) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                                    placeholder="الزاماً فارسی"
                                                                    value="{{$row->Address}}"
                                                                    readonly>
                                                            </div>
                                                        </div>

                                                        {{--تلفن ثابت گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label class="col-sm-2 col-form-label align-self-center">تلفن
                                                                ثابت</label>
                                                            <div class="col-sm-10 force-col-12 d-flex">
                                                                <input style="width: 70%; direction: ltr"
                                                                       class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                       id="{{ 'receiverPhoneNum'.$key }}"
                                                                       name="receiver-phone"
                                                                       oninput="forceEnglishNumber($(this).val(), $(this),{{ '#receiverMobile'.$key }},8)"
                                                                       pattern="\d*"
                                                                       value="{{ $row->Phone }}"
                                                                       placeholder="xxxxxxxx"
                                                                       readonly="">
                                                                <input style="width: 30%; direction: ltr"
                                                                       id="{{ 'receiverPrePhone'.$key }}"
                                                                       class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-brd-right-none g-font-size-16"
                                                                       name="receiver-prePhone"
                                                                       value="{{ $row->PrePhone }}"
                                                                       oninput="forceEnglishNumber($(this).val(), $(this),{{ '#receiverPhoneNum'.$key }},3)"
                                                                       pattern="\d*"
                                                                       placeholder="0xx"
                                                                       readonly="">
                                                            </div>
                                                        </div>

                                                        <div class="text-left">
                                                            <a style="cursor: pointer"
                                                               onclick="editUserAddress({{$key}})"
                                                               id="{{ 'editAddress'.$key }}"
                                                               class="btn btn-md u-btn-outline-primary g-color-primary g-color-white--hover g-font-weight-600 g-letter-spacing-0_5 rounded-0 g-mb-15">
                                                                ویرایش
                                                            </a>
                                                            <a style="cursor: pointer; display: none"
                                                               onclick="saveUserAddress({{$key}})"
                                                               id="{{ 'saveAddress'.$key }}"
                                                               class="btn btn-md g-bg-primary g-color-white g-color-white--hover g-font-weight-600 g-letter-spacing-0_5 rounded-0 g-mb-15">
                                                                بروزرسانی
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <hr class="{{ ($key === count($address)-1) ? 'd-none':'' }} g-brd-gray-light-v4 mx-0 g-my-30">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div style="direction: rtl" class="g-mx-60--lg g-mt-40 g-mb-25">
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
                                                <span aria-hidden="true">×</span>
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
                                                    class="formValidateNew form-control g-brd-red form-control-md rounded-0 g-bg-white g-font-size-16 focusInput"
                                                    name="receiver-name"
                                                    maxlength="15"
                                                    tabindex="1"
                                                    type="text"
                                                    value=""
                                                    oninput="($(this).val().length>1) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
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
                                                    class="formValidateNew form-control g-brd-red form-control-md rounded-0 g-bg-white g-font-size-16"
                                                    type="text"
                                                    id="receiver-family"
                                                    name="receiver-family"
                                                    maxlength="15"
                                                    tabindex="2"
                                                    oninput="($(this).val().length>1) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
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
                                            <label id="ok" class="col-sm-2 g-brd-red col-form-label align-self-center">کد
                                                پستی</label>
                                            <div class="col-sm-10 force-col-12">
                                                <input style="direction: ltr"
                                                       class="formValidateNew text-left g-brd-red form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                       name="receiver-postalCode"
                                                       id="receiver-postalCode"
                                                       tabindex="3"
                                                       oninput="forceEnglishNumber($(this).val(), $(this),'.custombox-content #receiverNewMobile',10)"
                                                       pattern="\d*"
                                                       value=""
                                                       placeholder="فقط اعداد انگلیسی">
                                            </div>
                                        </div>

                                        {{--موبایل گیرنده--}}
                                        <div class="form-group row g-mb-30 g-mb-15--lg">
                                            <label style="direction: ltr"
                                                   class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                            <div class="col-sm-10 force-col-12">
                                                <input style="direction: ltr"
                                                    id="receiverNewMobile"
                                                    class="formValidateNew text-left g-brd-red form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                    tabindex="4"
                                                    name="receiver-mobile"
                                                    oninput="forceEnglishNumber($(this).val(), $(this),'.custombox-content #stateSelectReceiver-new',11)"
                                                    pattern="\d*"
                                                    placeholder="09xxxxxxxx"
                                                    value="">
                                            </div>
                                        </div>
                                        {{--آدرس سکونت گیرنده--}}
                                        <div class="form-group row g-mb-30 g-mb-15--lg">
                                            <label
                                                class="col-sm-2 g-brd-red col-form-label align-self-center">استان/شهر</label>
                                            <div class="col-sm-10 force-col-12">
                                                <div class="d-flex">
                                                    <select id="stateSelectReceiver-new"
                                                            style="direction: rtl; padding-right: 30px !important;"
                                                            tabindex="5"
                                                            name="receiver-state"
                                                            oninput="if($(this).val()!=='0') {
                                                                $(this).removeClass('g-brd-red');
                                                                $('.custombox-content #citySelectReceiver-new').removeClass('g-brd-red');
                                                            } else {
                                                                $(this).addClass('g-brd-red');
                                                                $('.custombox-content #citySelectReceiver-new').addClass('g-brd-red');
                                                            }"
                                                            class="formValidateNew form-control g-brd-red form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-white"
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
                                                            class="formValidateNew form-control g-brd-red form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-white"
                                                            onchange="$('.custombox-content #receiver-address').focus();"
                                                            tabindex="6">
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
                                                    class="formValidateNew form-control g-brd-red form-control-md rounded-0 g-bg-white g-font-size-16"
                                                    id="receiver-address"
                                                    tabindex="7"
                                                    oninput="($(this).val().length>5) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red');"
                                                    name="receiver-address"
                                                    placeholder="الزاماً فارسی">
                                            </div>
                                        </div>
                                        {{--تلفن ثابت گیرنده--}}
                                        <div class="form-group row g-mb-30 g-mb-15--lg">
                                            <label class="col-sm-2 col-form-label align-self-center">تلفن
                                                ثابت(اختیاری)</label>
                                            <div class="col-sm-10 force-col-12 d-flex">
                                                <input style="width: 70%; direction: ltr"
                                                       id="receiver-phone-new"
                                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                       name="receiver-phone"
                                                       tabindex="9"
                                                       oninput="forceEnglishNumber($(this).val(), $(this),'.custombox-content #receiverNewMobile',8)"
                                                       pattern="\d*"
                                                       value=""
                                                       placeholder="xxxxxxxx">
                                                <input style="width: 30%; direction: ltr"
                                                       id="receiver-prePhone-new"
                                                       name="receiver-prePhone"
                                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-brd-right-none g-font-size-16"
                                                       value=""
                                                       tabindex="8"
                                                       oninput="forceEnglishNumber($(this).val(), $(this),'.custombox-content #receiver-phone-new',3)"
                                                       pattern="\d*"
                                                       placeholder="0xx">
                                            </div>
                                        </div>
                                    </div>
                                    <a onclick="addUserAddress()"
                                       id="submitAddress"
                                       tabindex="10"
                                       class="btn btn-md u-btn-primary rounded-0 g-color-white g-mt-15 g-mx-60--lg g-mb-20 g-mx-20">
                                        ثبت آدرس جدید
                                    </a>
                                </form>
                            </div>
                            <!-- End Demo modal window -->
                        </div>
                    </div>
                </div>

                <!-- خریداری شده -->
                <div style="display: none" id="user-bought">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 18px;"
                             class="g-pr-15 g-pt-20--lg g-pt-10 g-color-primary">
                            <div class="d-flex m-0 p-0">
                                <i class="icon-tag g-pl-5 g-font-size-20 g-font-weight-500"></i>

                                <h6 class="m-0 g-mt-7">
                                    خریداری شده
                                </h6>
                            </div>
                        </div>
                        <hr style="z-index: 100 !important" class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div class="g-mb-40 g-mb-0--lg">
                        @if(!isset($order[0]->ID))
                            <div class="d-inline-block alert alert-info g-px-15--lg g-px-5 text-lg-right text-center"
                                 role="alert">
                                <strong>خالی: </strong> لیست خرید های شما خالی است.
                            </div>
                        @else
                            @foreach($order as $key => $row)
                                <div class="container g-pa-15 g-py-30--lg g-px-60--lg g-brd-around g-brd-gray-light-v4 g-mx-0 g-my-10">
                                    <article class="d-md-table w-100 g-bg-white g-mb-1">
                                    <!-- Date -->
                                    <div
                                         class="d-lg-table-cell d-none align-middle g-width-125--md text-center g-color-gray-dark-v5 g-mb-5 g-mb-0--lg">
                                        <div>
                                            <span
                                                class="d-block g-color-black g-font-weight-700 g-font-size-18 g-line-height-1">{{ (is_null($orderHowDay[$key])) ? $persianDate[$key][2] : $orderHowDay[$key]}}</span>
                                            {{ (!is_null($orderHowDay[$key])) ? '' :$persianDate[$key][1].' '.$persianDate[$key][0] }}
                                        </div>
                                    </div>
                                    <!-- End Date -->

                                    <!-- Article Image -->
                                    <a class="d-md-table-cell align-middle g-width-110"
                                       href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                       title="کد محصول {{ $row->ProductDetailID }}">
                                        <img class="img-fluid" src="{{ file_exists(public_path($row->PicPath.$row->SampleNumber.'.jpg'))?$row->PicPath.$row->SampleNumber:$row->PicPath.'sample1' }}.jpg"
                                             alt="Image Description">
                                    </a>
                                    <!-- End Article Image -->

                                    <!-- Article Content -->
                                    <div
                                        class="d-flex justify-content-between d-lg-table-cell align-middle g-px-20--lg g-pt-15 g-pt-0--lg g-brd-top g-brd-top-none--lg g-brd-gray-light-v4 table-cell-responsive">
                                        <div>
                                            <h3 class="h6 d-inline-block d-lg-block g-font-weight-700">
                                                <span class="g-color-gray-dark-v2">شماره فاکتور {{ $row->orderID.'/'.$row->orderDetailID }}</span>
                                            </h3>
                                        </div>

                                        <a href="{{ '#modal16'.$key }}"
                                           onclick="$(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
                                           data-modal-target="{{ '#modal16'.$key }}"
                                           data-modal-effect="slidetogether"
                                           class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-pt-0 smallDevice">
                                            <i class="icon-eye g-font-size-20 g-color-gray-dark-v2 g-color-primary--hover"></i>
                                        </a>
                                    </div>
                                    <!-- End Article Content -->

                                    <div
                                         class="d-table-cell d-lg-none align-middle g-width-125--md text-center g-color-gray-dark-v5 g-mb-5 g-mb-0--lg">
                                        <div class="d-flex">
                                            <span
                                                class="d-block g-color-gray-dark-v3 g-ml-5 g-font-size-14">
                                                {{ (is_null($orderHowDay[$key])) ? $persianDate[$key][2] : $orderHowDay[$key]}}</span>
                                            {{ (!is_null($orderHowDay[$key])) ? '' :$persianDate[$key][1].' '.$persianDate[$key][0] }}
                                        </div>
                                    </div>

                                    <!-- Price -->
                                    <div
                                        class="d-md-table-cell align-middle g-pb-5 g-pt-15 g-py-5--lg g-px-20--lg text-left text-lg-right">
                                    <span
                                        class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-25">{{ number_format($row->FinalPrice * $row->Qty) }}</span>
                                        <span
                                            class="g-color-gray-dark-v5 g-font-size-11 ">تومان</span>
                                    </div>
                                    <!-- End Price -->

                                    <!-- Actions -->
                                    <div class="d-md-table-cell align-middle text-md-right g-px-0 g-pa-20--lg">
                                        <div class="g-mt-minus-10 g-mx-minus-5">
                                            <div class="text-left g-mt-15 g-mt-0--lg">
                                                <a href="{{ '#modal16'.$key }}"
                                                   onclick="$(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');
                                                            $('.receiverStateCity').text(autoCity($('#receiverState').text(), $('#receiverCity').text(), 'onlyToOutput'));"
                                                   data-modal-target="{{ '#modal16'.$key }}"
                                                   data-modal-effect="slidetogether"
                                                   class="d-lg-flex justify-content-end g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-pt-10 bigDevice">
                                                    <i class="icon-eye g-font-size-20 g-color-gray-dark-v2 g-color-primary--hover"></i>
                                                </a>
                                                <!-- Demo modal window -->
                                                <div id="{{ 'modal16'.$key }}"
                                                     class="text-left g-bg-white SubMenuScroll g-pb-20"
                                                     style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                                                    <div class="sticky-top g-bg-white g-px-20">
                                                        <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                                                            <button style="outline: none" type="button"
                                                                    class="close"
                                                                    onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h6 class="text-right m-0">فاکتور فروش به
                                                                شماره: {{ $row->orderID.'/'.$row->orderDetailID }}</h6>
                                                        </div>
                                                        <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">
                                                    </div>

                                                    <div class="g-px-20">
                                                        <div style="direction: rtl"
                                                             class="d-lg-flex col-12 g-pa-15 g-pt-20 g-brd-around g-brd-gray-light-v4">
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    کد محصول
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                            {{ $row->ProductDetailID }}
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    نام محصول
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                            {{ $row->Name }}<span> {{ $row->Model }}</span>
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    برند محصول
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                                    {{ $row->Brand }}
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    رنگ
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                            {{ $row->Color }}
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    سایز
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                            {{ $row->Size }}
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    تعداد
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                             <span>{{ $row->Qty }}</span> عدد
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    قیمت واحد
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                             {{ number_format($row->FinalPriceWithoutDiscount) }}
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    با {{ $row->Discount }}% تخفیف
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                              {{ number_format($row->FinalPrice) }}
                                                        </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    تاریخ
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                              {{ $persianDate[$key][2].' '.$persianDate[$key][1].' '.$persianDate[$key][0] }}
                                                            </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    فروشنده
                                                                </h6>
                                                                <span class="g-pa-5--lg color-primary-smallDevice">
                                                              {{ $row->sellerName.' '.$row->sellerFamily }}
                                                            </span>
                                                            </div>
                                                            <div
                                                                class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                                <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                                    {{ $delivery[$key]->DeliveryStatus === '-1' ? 'برگشت' : 'تحویل' }}
                                                                </h6>
                                                                <span class="g-pa-5--lg"
                                                                      data-toggle="tooltip"
                                                                      data-placement="top"
                                                                      data-original-title="تحویل داده شد">
                                                                    @if($delivery[$key]->DeliveryStatus === '-1')
                                                                        <i class="icon-media-064 u-line-icon-pro g-font-weight-600 g-font-size-20 g-color-primary"></i>
                                                                    @elseif($delivery[$key]->DeliveryStatus === '5')
                                                                        <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                                                    @else
                                                                        <i class="fa fa-spinner fa-spin m-0 g-font-size-16 g-color-primary"></i>
                                                                    @endif
                                                                 </span>
                                                            </div>
                                                        </div>
                                                        <div class="d-lg-flex justify-content-between">
                                                            <div class=" col-12 col-lg-3 g-px-0">
                                                                <div class="btn-group text-center justified-content g-mt-15">
                                                                    <label class="u-check col-5 p-0">
                                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio">
                                                                        <span class="btn btn-md btn-block u-btn-outline-lightgray {{$row->PostMethod==='تیپاکس' ? 'g-color-white g-bg-primary': 'disabled'}} rounded-0">تیپاکس</span>
                                                                    </label>
                                                                    <label class="u-check col-6 p-0">
                                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" id="popularPostBtn" type="radio">
                                                                        <span class="btn btn-md btn-block u-btn-outline-lightgray {{$row->PostMethod==='پست معمولی' ? 'g-color-white g-bg-primary': 'disabled'}}  g-brd-left-none--md rounded-0">پست معمولی</span>
                                                                    </label>
                                                                </div>

                                                                <span
                                                                    class="d-block u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mt-15--lg text-center">هزینه پستی:
                                                                    <span>{{$row->PostMethod==='تیپاکس' ? ' پرداخیت در محل': ($row->State === '2' && $row->City=== '36'?'10,000':'15,000') }}</span>
                                                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                                                </span>
                                                                {{--مبلغ فاکتور--}}
                                                                <span
                                                                    class="d-block u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mb-20 text-center force-col-12">مبلغ کل فاکتور: <span>{{ number_format(($row->FinalPrice * $row->Qty)+15000) }}</span><span
                                                                        class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span>
                                                                </span>
                                                            </div>
                                                            <div class="col-12 col-lg-9 g-px-0">
                                                                <div style="direction: rtl" id="addressContainer" class="text-right g-mt-15">
                                                                    <div
                                                                        class="d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 g-pt-0--lg text-justify">
                                                                        <h5 class="d-lg-inline-block d-block g-color-gray-dark-v2">آدرس
                                                                            ارسال:</h5>
                                                                        <span id="receiverState" class="d-none">{{ $row->State }}</span>
                                                                        <span id="receiverCity" class="d-none">{{ $row->City }}</span>
                                                                        <span class="receiverStateCity"></span>
                                                                        <span id="addressID"
                                                                              class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify"> {{$row->Address}}
                                                                            <strong class="g-color-gray-dark-v2 g-mr-5">گیرنده:</strong> {{$row->ReceiverName.' '.$row->ReceiverFamily}}
                                                                            <strong class="g-color-gray-dark-v2 g-mr-5">شماره تماس:</strong> {{$row->Mobile}}</span>
                                                                    </div>
                                                                </div>
                                                                @switch($delivery[$key]->DeliveryStatus)
                                                                    @case('-1')
                                                                    <div style="direction: rtl"
                                                                         class="g-mt-15 g-mt-5--lg text-right">
                                                                        <div
                                                                            class="d-inline-block alert g-bg-orange-opacity-0_1 g-color-orange rounded-0"
                                                                            role="alert">
                                                                            <p class="m-0"><strong>برگشتی: </strong>فاکتور
                                                                                فوق
                                                                                برگشت داده شد.</p>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                    @case('0')
                                                                    @case('1')
                                                                    @case('2')
                                                                    @case('3')
                                                                    <div style="direction: rtl"
                                                                         class="g-mt-15 g-mt-5--lg text-right">
                                                                        <div
                                                                            class="d-inline-block alert g-bg-gray-light-v5 rounded-0"
                                                                            role="alert">
                                                                            <p class="m-0"><strong>در انتظار
                                                                                    تحویل: </strong>فاکتور فوق در
                                                                                صف فرایند تحویل می باشد.</p>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                    @case('4')
                                                                    <div style="direction: rtl"
                                                                         class="g-mt-15 g-mt-5--lg text-right">
                                                                        <div
                                                                            class="d-inline-block alert g-bg-gray-light-v5 rounded-0"
                                                                            role="alert">
                                                                            <p class="m-0"><strong>در انتظار
                                                                                    تحویل: </strong>فاکتور فوق در
                                                                                دست پست می باشد.</p>
                                                                        </div>
                                                                    </div>
                                                                    @break
                                                                    @case('5')
                                                                    @if(($deliveryMin[$key] < 10200))
                                                                        <div style="direction: rtl"
                                                                             class="g-mt-15 g-mt-5--lg text-right">
                                                                            <div>
                                                                                <div
                                                                                    class="d-inline-block alert g-bg-gray-light-v5 rounded-0 g-mb-5"
                                                                                    role="alert">
                                                                                    <p class="m-0"><strong>کد رهگیری
                                                                                            پست: </strong>{{ $delivery[$key]->TrackingCode }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="d-inline-block alert alert-warning alert-dismissible fade show g-mb-5"
                                                                                role="alert">
                                                                                <strong>توجه! </strong>اگر در هر شرایطی
                                                                                محصول به
                                                                                دستتان
                                                                                نرسیده به اداره پست مرکزی محل خود
                                                                                مراجعه
                                                                                کنید.
                                                                            </div>
                                                                            <div
                                                                                class="d-inline-block alert alert-warning alert-dismissible fade show g-mb-5"
                                                                                role="alert">
                                                                                <strong>توجه! </strong>در صورتی که اداره
                                                                                پست به دلیل عدم تحویل گرفتن شما محموله
                                                                                را ارجاع دهد هزینه برگشت و ارسال مجدد
                                                                                به عهده شما خواهد بود.
                                                                            </div>
                                                                            <div
                                                                                class="d-inline-block alert alert-warning alert-dismissible fade show"
                                                                                role="alert">
                                                                                <strong>توجه! </strong>اگر قصد برگشت
                                                                                محصول
                                                                                را
                                                                                دارید با توجه به <a href="#"
                                                                                                    class="alert-link">قوانین
                                                                                    برگشت محصول</a>، از طریق
                                                                                کلید زیر اقدام فرمائید.
                                                                            </div>
                                                                            <div>
                                                                                <button type="button"
                                                                                        class="btn btn-md u-btn-outline-primary rounded-0 force-col-12 g-mb-10"
                                                                                        onclick="setReturnProductID({{ $row->orderID }},{{ $row->orderDetailID }}); Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix'); setTimeout(function () {$('#returnModalBtn').trigger('click')}, 600);">
                                                                                    برگشت محصول
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div style="direction: rtl"
                                                                             class="g-mt-15 g-mt-5--lg text-right">
                                                                            <div
                                                                                class="d-inline-block alert alert-success"
                                                                                role="alert">
                                                                                <strong>بایگانی فاکتور: </strong>فاکتور
                                                                                فوق
                                                                                به
                                                                                دفتر بایگانی افزوده
                                                                                شد.
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @break
                                                                @endswitch
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Demo modal window -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Actions -->
                                    </article>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- در انتظار تحویل -->
                <div style="display: none" id="user-delivery">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 18px;" class="g-pr-15 d-flex g-pt-20--lg g-pt-10 g-color-primary">
                            <i class="icon-hourglass g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                در انتظار تحویل
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div class="g-mb-40 g-mb-0--lg">
                        {{--0: در دست فروشنده 1: تحویل پیک(1) 2: تحویل باجه پستی 3: تحویل پیک(2) 4: تحویل پست 5: تحویل داده شد.--}}
                        {{--گزینه 1 از طریق فروشنده در تبلت پیک(1) ثبت می شود--}}
                        {{--گزینه 2 از طریق پیک در تبلت باجه پستی ثبت می شود--}}
                        {{--گزینه 3 از طریق باجه پستی در تبلت پیک(2) ثبت می شود--}}
                        <span class="d-none">{{ $deliveryCounter=0 }}</span>
                        @foreach($delivery as $key => $row)
                            @if(($row->DeliveryStatus !== '5') && ($row->DeliveryStatus !== '-1'))
                                <div class="container g-pa-15 g-py-30--lg g-px-60--lg g-brd-around g-brd-gray-light-v4 g-mx-0 g-my-10">
                                <article class="d-md-table w-100 g-bg-white g-mb-1">
                                    <!-- deliveryStatus -->
                                    <div style="padding: 0 !important;"
                                         class="d-lg-table-cell d-none align-middle text-center g-color-gray-dark-v5 g-px-20 g-mb-5 g-mb-0--lg">
                                        <div>
                                            {{ $deliveryHint[$key]['text'] }}
                                            <span
                                                class="g-font-weight-700 g-line-height-1 g-font-size-18 {{ ($row->DeliveryProblem === 1) ? 'g-color-red':'g-color-yellow' }}">
                                                {{ $deliveryHint[$key]['location'] }}</span>
                                        </div>
                                    </div>

                                    <!-- Article Image -->
                                    <a class="d-md-table-cell align-middle g-width-110"
                                       href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                       title="کد محصول {{ $row->ProductDetailID }}">
                                        <img class="img-fluid" src="{{ file_exists(public_path($row->PicPath.$row->SampleNumber.'.jpg'))?$row->PicPath.$row->SampleNumber:$row->PicPath.'sample1' }}.jpg"
                                             alt="Image Description">
                                    </a>
                                    <!-- End Article Image -->

                                    <!-- deliveryStatus -->
                                    <div
                                        class="d-block d-lg-none align-middle g-px-20--lg g-pt-15 g-pt-0--lg g-brd-top g-brd-top-none--lg g-brd-gray-light-v4">
                                        <div class="d-flex justify-content-between d-lg-block g-px-20--lg g-px-0">
                                            <div>
                                                {{ $deliveryHint[$key]['text'] }}
                                                <span
                                                    class="g-font-weight-600 g-line-height-1 g-font-size-18 {{ ($row->DeliveryProblem === 1) ? 'g-color-red':'g-color-yellow' }}">
                                                {{ $deliveryHint[$key]['location'] }}</span>
                                            </div>
                                            <h3 class="h6 d-block m-0 g-font-weight-700 ">
                                                {{$row->Brand}}
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- Article Content -->
                                    <div class="d-md-table-cell align-middle g-px-20--lg g-px-0">
                                        <h3 class="h6 d-inline-block m-0 g-font-weight-700 ">
                                            <a class="g-color-gray-dark-v2" href="#">{{ $row->Name }}</a>
                                            <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-14">{{ $row->Model }}</em>
                                        </h3>

                                        <h3 class="h6 d-inline-block m-0 g-font-weight-700">
                                            <a class="g-color-gray-dark-v2" href="#">{{ $row->Size }}</a>
                                            <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-14">{{ $row->Color }}</em>
                                        </h3>
                                    </div>
                                    <!-- End Article Content -->

                                    <!-- Date -->
                                    <div
                                        class="d-md-table-cell align-middle g-pt-15 g-pt-0--lg g-px-0 g-px-20--lg text-left text-lg-right">
                                        <span
                                            class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-14">{{ $deliveryPersianDate[$key][2].' '.$deliveryPersianDate[$key][1].' '.$deliveryPersianDate[$key][0] }}</span>
                                    </div>

                                    <!-- Actions -->
                                    <div
                                        class="d-md-table-cell align-middle g-pa-20 g-pt-25 g-pl-0 progress-auto-width">
                                        <div style="direction: ltr" class="g-mt-minus-10 g-mx-minus-5 d-flex">
                                            <i class="fa fa-spinner fa-spin m-0 g-font-size-16 {{ ($row->DeliveryProblem === 1) ? 'g-color-red':'g-color-primary' }}"></i>
                                            <div
                                                class="js-hr-progress-bar progress rounded-0 u-progress w-100 g-overflow-visible g-ml-10"
                                                data-toggle="tooltip"
                                                data-original-title="{{ 'تاکنون '.$deliveryTime[$key].'%'.' مسیر طی شده است'  }}"
                                                data-placement="top">
                                                <div id="progressBar"
                                                     class="progress-bar js-hr-progress-bar-indicator u-progress-bar--lg g-bg-primary g-pos-rel"
                                                     role="progressbar"
                                                     style="width: {{$deliveryTime[$key]}}%"
                                                     aria-valuenow="{{ $deliveryTime[$key] }}"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <div
                                                        style="width: 25px !important; height: 25px !important; top: 100% !important; line-height: 25px !important;"
                                                        class="text-center u-progress__pointer-v1 g-font-size-11 g-color-white  {{ ($row->DeliveryProblem === 1) ? 'g-bg-red':'g-bg-primary' }} g-pt-3">
                                                        <i style="transform: scaleX(-1);" class="g-color-gray-light-v5 fa fa-truck g-font-size-17"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Actions -->
                                </article>
                                </div>
                            @endif
                            @if($deliveryTime[$key] <= 100) <span
                                class="d-none">{{ $deliveryCounter++ }}</span>
                            @endif
                        @endforeach

                        @if($deliveryCounter===0)
                            <div class="d-inline-block alert alert-info g-px-15--lg g-px-5 text-lg-right text-center"
                                 role="alert">
                                <strong>خالی: </strong> فاکتور خرید جدیدی برای شما صادر نشده و محصولی در انتظار تحویل
                                ندارید.
                            </div>
                        @endif
                    </div>
                </div>

                <!-- برگشت محصول -->
                <div style="display: none" id="user-return">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 18px;" class="g-pr-15 d-flex g-pt-20--lg g-pt-10 g-color-primary">
                            <i class="icon-action-undo g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                برگشت محصول
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div>
                        {{-- 5: تحویل به پست 4: تحویل پیک(2) 3: تحویل باجه پستی 2: تحویل پیک(1) 1: تحویل فروشنده 0: عودت وجه--}}
                        {{-- گزینه 5 از طریق مشتری پس از تحویل به پست و گرفتن کد پیگیری ثبت می شود--}}
                        {{-- گزینه 4 از طریق پیک(2) در تبلت باجه پستی ثبت می شود--}}
                        {{-- گزینه 3 پس از مقایسه ایرادات مطرح شده و تایید آن و تحویل پیک(1) ثبت می شود--}}
                        {{--  گزینه 2 و 1 و 0 پس از تحویل محصول از پیک(1) به فروشنده و کشیدن کارت عین مبلغ فاکتور از دستگاه--}}
                        {{-- همراه پیک همزمان ثبت می شود--}}
                        <span class="d-none">{{ $returnCounter=0 }}</span>
                        @foreach($return as $key => $row)
                            <div
                                class="container g-pa-15 g-py-30--lg g-px-60--lg g-brd-around g-brd-gray-light-v4 g-mx-0 g-my-10">
                                <article class="d-md-table w-100 g-bg-white g-mb-1">
                                    <!-- deliveryStatus -->
                                    <div style="padding: 0 !important;"
                                         class="d-lg-table-cell d-none align-middle text-center g-color-gray-dark-v5 g-px-20 g-mb-5 g-mb-0--lg">
                                        <div>
                                            {{ $returnHint[$key]['text'] }}
                                            <span
                                                class="g-font-weight-600 g-line-height-1 g-font-size-18 {{ ($row->ReturnProblem === 1) ? 'g-color-red':'g-color-yellow' }}">
                                                {{ $returnHint[$key]['location'] }}</span>
                                        </div>
                                    </div>

                                    <!-- Article Image -->
                                    <a class="d-md-table-cell align-middle g-width-110"
                                       href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                       title="کد محصول {{ $row->ProductDetailID }}">
                                        <img class="img-fluid" src="{{ file_exists(public_path($row->PicPath.$row->SampleNumber.'.jpg'))?$row->PicPath.$row->SampleNumber:$row->PicPath.'sample1' }}.jpg"
                                             alt="Image Description">
                                    </a>
                                    <!-- End Article Image -->

                                    <div
                                        class="d-block d-lg-none align-middle g-px-20--lg g-pt-15 g-pt-0--lg g-brd-top g-brd-top-none--lg g-brd-gray-light-v4">
                                        <div class="d-flex justify-content-between d-lg-block">
                                            <div>
                                                {{ $returnHint[$key]['text'] }}
                                                <span
                                                class="g-font-weight-700 g-line-height-1 g-font-size-20 {{ ($row->ReturnProblem === 1) ? 'g-color-red':'g-color-yellow' }}">
                                                {{ $returnHint[$key]['location'] }}</span>
                                            </div>

                                            <h3 class="h6 d-block m-0 g-font-weight-700 ">
                                                {{$row->Brand}}
                                            </h3>
                                        </div>
                                    </div>

                                    <!-- Article Content -->
                                    <div class="d-md-table-cell align-middle g-px-20--lg g-px-0">
                                        <h3 class="h6 d-inline-block m-0 g-font-weight-700 ">
                                            <a class="g-color-gray-dark-v2" href="#">{{ $row->Name }}</a>
                                            <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-12">{{ $row->Model }}</em>
                                        </h3>

                                        <h3 class="h6 d-inline-block m-0 g-font-weight-700">
                                            <a class="g-color-gray-dark-v2" href="#">{{ $row->Size }}</a>
                                            <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-12">{{ $row->Color }}</em>
                                        </h3>
                                    </div>
                                    <!-- End Article Content -->

                                    <!-- Date -->
                                    <div
                                        class="d-md-table-cell align-middle g-pt-15 g-pt-0--lg g-px-0 g-px-20--lg text-left text-lg-right">
                                                    <span
                                                        class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-14">{{ $returnPersianDate[$key][2].' '.$returnPersianDate[$key][1].' '.$returnPersianDate[$key][0] }}</span>
                                    </div>

                                    <div
                                        class="d-md-table-cell align-middle g-px-0 g-px-20--lg text-left text-lg-right">
                                    <span
                                        class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-14">
                                        @switch($row->Reason)
                                            @case('1')
                                            عدم شباهت محصول
                                            @break
                                            @case('2')
                                            عدم سلامت محصول
                                            @break
                                            @case('3')
                                            عدم تطابق برند
                                            @break
                                        @endswitch
                                    </span>
                                    </div>

                                    <!-- Actions -->
                                    <div
                                        class="d-md-table-cell align-middle g-pa-20 g-pl-0 {{ $row->ReturnStatus === '0' ? 'g-pt-10 ' : 'g-pt-25 progress-auto-width' }}">
                                        @if($row->ReturnStatus === '0')
                                            <i class="fa fa-check-square-o m-0 g-font-size-25 g-color-primary pull-left"></i>
                                        @else
                                            <div style="direction: ltr" class="g-mt-minus-10 g-mx-minus-5 d-flex">
                                                <i class="fa fa-spinner fa-spin m-0 g-font-size-16 {{ ($row->ReturnProblem === 1) ? 'g-color-red':'g-color-primary' }}"></i>
                                                <div style="transform: scaleX(-1)"
                                                     class="js-hr-progress-bar progress rounded-0 u-progress w-100 g-overflow-visible g-ml-10"
                                                     data-toggle="tooltip"
                                                     data-original-title="{{ 'تاکنون '.$returnTime[$key].'%'.' مسیر طی شده است'  }}"
                                                     data-placement="top">
                                                    <div id="progressBar"
                                                         class="progress-bar js-hr-progress-bar-indicator u-progress-bar--lg g-bg-primary g-pos-rel"
                                                         role="progressbar"
                                                         style="width: {{$returnTime[$key]}}%"
                                                         aria-valuenow="{{ $returnTime[$key] }}"
                                                         aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <div
                                                            style="width: 25px !important; height: 25px !important; top: 100% !important; line-height: 25px !important;"
                                                            class="text-center u-progress__pointer-v1 g-font-size-11 g-color-white  {{ ($row->ReturnProblem === 1) ? 'g-bg-red':'g-bg-primary' }} g-pt-3">
                                                            <i style="transform: scaleX(-1)" class="g-color-gray-light-v5 fa fa-truck g-font-size-17"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- End Actions -->
                                </article>
                            </div>
                            @if($returnTime[$key] <= 100) <span
                                class="d-none">{{ $returnCounter++ }}</span>
                            @endif
                        @endforeach

                        @if($returnCounter===0)
                            <div class="d-inline-block alert alert-info g-px-15--lg g-px-5 text-lg-right text-center"
                                 role="alert">
                                <strong>خالی: </strong>لیست محصولات برگشتی شما خالی است.
                            </div>
                        @endif
                    </div>
                    <div style="direction: rtl" class="g-mx-80--lg g-mt-40 g-mb-25 g-px-10">
                        <div class="text-left">
                            <a href="#returnModal"
                               id="returnModalBtn"
                               onclick="manuelFocus(); $(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
                               data-modal-target="#returnModal"
                               data-modal-effect="slidetogether"
                               class="d-none btn btn-md u-btn-primary rounded-0 force-col-12 g-mb-15">
                                تکمیل فرم محصول برگشتی
                            </a>
                            <!-- Demo modal window -->
                            <div id="returnModal"
                                 class="text-left g-bg-white SubMenuScroll g-pb-20"
                                 style="display: none; overflow-y: auto; height: 100% !important; -webkit-overflow-scrolling: touch; max-height: 100% !important; width: 100%">
                                <form id="returnProduct" action="{{route('returnProduct')}}"
                                      enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input id="orderDetailIDFromReturn" name="orderDetailIDFromReturn" class="d-none">
                                    <input id="orderIDFromReturn" name="orderIDFromReturn" class="d-none">
                                    <div class="sticky-top g-bg-white g-px-20">
                                        <div class="d-flex justify-content-between g-pt-15 g-pb-8">
                                            <button style="outline: none" type="button" class="close"
                                                    onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix'); setTimeout(function () {$('#filter-user-return').trigger('click')}, 400); ">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h6 class="m-0 text-right">برگشت محصول</h6>
                                        </div>
                                        <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0">
                                    </div>
                                    <div class="g-px-20">
                                        <div style="direction: rtl; overflow-y: auto"
                                             class="container g-px-30 g-px-60--lg text-right g-py-0">
                                            <p style="text-align: justify;" class="g-pb-15 g-mb-0 g-mb-20--lg"><span
                                                    class="g-font-weight-600 g-ml-10">{{ Auth::user()->name }} عزیز</span>
                                                لطفا قبل از برگشت محصول، <a href="#"
                                                                            class="alert-link">قوانین برگشت محصول</a> را
                                                مطالعه
                                                بفرمایید. لازم به ذکر است عودت وجه به دلیل طی شدن فرآیند مسیر برگشتی 5
                                                الی 7
                                                روز
                                                پس از تاریخ برگشت می باشد.
                                            </p>
                                            {{--کد دریافتی از اداره پست--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label
                                                    class="col-sm-2 col-form-label align-self-center">کد مرسوله
                                                    اداره
                                                    پست</label>
                                                <div class="col-sm-10 force-col-12">
                                                    <input
                                                        id="returnPostCode"
                                                        class="form-control g-brd-red returnFormValidate form-control-md rounded-0 g-bg-white g-font-size-16 focusInput"
                                                        name="returnPostCode"
                                                        oninput="($(this).val().length>24) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                        maxlength="100"
                                                        type="text"
                                                        value=""
                                                        placeholder="24 کاراکتر">
                                                </div>
                                            </div>
                                            {{--علت برگشت--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label
                                                    class="col-sm-2 col-form-label align-self-center">علت برگشت
                                                </label>
                                                <div class="col-sm-10 force-col-12">
                                                    <div style="direction: ltr"
                                                         class="input-group g-brd-primary--focus">
                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                                            <i style="transform: ScaleX(-1)"
                                                               class="fa fa-question g-font-size-20"></i>
                                                        </div>
                                                        <select style="direction: rtl"
                                                                class="form-control g-brd-red returnFormValidate form-control-md custom-select rounded-0 g-font-size-16 text-right h-25 g-pr-30"
                                                                oninput="($(this).val()!=='0') ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                                id="returnReason" name="returnReason">
                                                            <option value="0">انتخاب کنید..
                                                            </option>
                                                            <option value="1">محصول تحویلی، شباهتی با محصول درون سایت
                                                                ندارد
                                                            </option>
                                                            <option value="2">برند محصول تحویلی مطابق محصول درون سایت
                                                                نیست
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--توضیح ایرادات--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label align-self-center">توضیح
                                                    ایرادات</label>
                                                <div class="col-sm-10 force-col-12">
                                               <textarea
                                                   class="form-control g-brd-red returnFormValidate form-control-md rounded-0 g-bg-white g-font-size-16"
                                                   type="text"
                                                   name="returnReasonDetail"
                                                   oninput="($(this).val().length > 1) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                   maxlength="300"
                                                   rows="4"
                                                   value=""
                                                   placeholder="جهت سرعت بخشیدن به بررسی ایرادات لطفا توضیحاتی مختصر در مورد ایرادات مورد نظرتان قید کنید."></textarea>
                                                </div>
                                            </div>

                                            {{--تصویر ایراد--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label align-self-center" for="fileShow1"
                                                       id="custom-file-label">تصویر ایرادات</label>
                                                <div style="direction: ltr" class="col-sm-10 force-col-12">
                                                    <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                                <span style="display: none; cursor: default"
                                                      class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                                                      id="Check1"></span>
                                                        <input id="fileShow1"
                                                               class="form-control returnFormValidate g-brd-red form-control-md rounded-0 g-font-size-16"
                                                               type="text"
                                                               placeholder="فاقد تصویر" readonly="">

                                                        <div class="input-group-btn">
                                                            <button class="btn btn-md u-btn-primary rounded-0"
                                                                    tabindex="8"
                                                                    type="submit">اضافه کردن
                                                            </button>
                                                            <input id="pic1"
                                                                   onchange="addPathCheckMark('pic1','fileShow1','Check1');
                                                                            ($('.custombox-content #fileShow1').val()==='فاقد تصویر') ? $('.custombox-content #fileShow1').addClass('g-brd-red'):$('.custombox-content #fileShow1').removeClass('g-brd-red')"
                                                                   type="file"
                                                                   name="returnPic"
                                                                   accept="image/jpg,image/png,image/jpeg,image/gif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--کارت بانکی--}}
                                            <div class="form-group row g-mb-30 g-mb-15--lg">
                                                <label class="col-sm-2 col-form-label align-self-center">کارت
                                                    بانکی</label>
                                                <div class="col-sm-10 force-col-12 d-flex">
                                                    <input
                                                        id="return-card"
                                                        class="text-left g-brd-red returnFormValidate form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                        name="returnCard"
                                                        maxlength="19"
                                                        oninput="($(this).val().length === 16) ? $(this).removeClass('g-brd-red'):$(this).addClass('g-brd-red')"
                                                        value=""
                                                        placeholder="xxxx-xxxx-xxxx-xxxx">
                                                </div>
                                            </div>

                                            <a onclick="returnSubmit()"
                                               id="submitReturn"
                                               class="pull-left btn btn-md u-btn-primary rounded-0 g-color-white g-mt-15">
                                                برگشت محصول
                                            </a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <!-- End Demo modal window -->
                        </div>
                    </div>
                </div>

                <!-- علاقه مندیها -->
                <div style="display: none" id="user-like">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 21px;" class="g-pr-15 d-flex g-pt-20--lg g-pt-10 g-color-primary">
                            <i class="fa fa-bookmark-o g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-4">
                                محصولات ذخیره شده
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div class="g-mb-40 g-mb-0--lg">
                        <div id="productLikeEmpty"
                             class="{{ (isset($like[0]->ID)) ? 'd-none':'d-inline-block' }} alert alert-info g-px-15--lg g-px-5 text-lg-right text-center"
                             role="alert">
                            <strong>خالی: </strong> لیست علاقه مندی های شما خالی است.
                        </div>
                        <div id="productLikeContainer">
                        @foreach($like as $key => $row)
                            <div  id="{{ 'likeRow'.$key }}"
                                class="container g-pa-15 g-py-30--lg g-px-60--lg g-brd-around g-brd-gray-light-v4 g-mx-0 g-my-10">
                                <article
                                         class="d-md-table w-100 g-bg-white g-mb-10 g-mb-0--lg">
                                    <!-- Article Image -->
                                    <a class="d-md-table-cell align-middle g-width-110"
                                       href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                       title="کد محصول {{ $row->ProductDetailID }}">
                                        <img class="img-fluid" src="{{ file_exists(public_path($row->PicPath.$row->SampleNumber.'.jpg'))?$row->PicPath.$row->SampleNumber:$row->PicPath.'sample1' }}.jpg"
                                             alt="Image Description">
                                    </a>
                                    <!-- End Article Image -->

                                    <!-- Article Content -->
                                    <div class="d-md-table-cell align-middle g-px-20--lg g-pt-15 g-pt-0--lg g-brd-top g-brd-top-none--lg g-brd-gray-light-v4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-md-table-cell align-middle g-px-20--lg g-px-10">
                                                <h3 class="h6 d-block m-0 g-font-weight-700 ">
                                                    {{$row->Brand}}
                                                </h3>
                                                <h3 class="h6 d-inline-block m-0 g-font-weight-700 ">
                                                    <a class="g-color-gray-dark-v2" href="#">{{ $row->Name }}</a>
                                                    <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-12">{{ $row->Model }}</em>
                                                </h3>

                                                <h3 class="h6 d-inline-block m-0 g-font-weight-700">
                                                    <a class="g-color-gray-dark-v2" href="#">{{ $row->Size }}</a>
                                                    <em class="d-inline-block g-color-gray-dark-v5 g-font-style-normal g-font-size-12">{{ $row->Color }}</em>
                                                </h3>
                                            </div>
                                            <div class="smallDevice g-ml-minus-5 g-mt-minus-10 text-left">
                                                <a style="cursor: pointer"
                                                   class="u-icon-v1 g-color-gray-dark-v4 g-color-primary--hover rounded-circle"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                                   data-original-title="جزئیات محصول"><i
                                                        class="icon-eye g-line-height-0_7"></i></a>
                                                <a style="cursor: pointer"
                                                   onclick="deleteProductLike({{$row->ProductID}},{{ $row->ProductDetailID }},$(this).attr('id'))"
                                                   id="{{ 'smDeleteLikeBtn'.$key }}"
                                                   class="u-icon-v1 g-color-primary g-color-gray-dark-v5--hover rounded-circle"
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   data-original-title="فراموش کن"><i class="fa fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Article Content -->

                                    <!-- Qty -->
                                    <div
                                        class="d-md-table-cell align-middle g-py-5 g-px-20--lg g-px-10 text-right">
                                        <span
                                            class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-17">{{ $row->Qty }}</span>
                                        <span
                                            class="g-color-gray-dark-v5 g-font-size-11">عدد موجود</span>
                                    </div>

                                    <!-- Price -->
                                    <div
                                        class="d-md-table-cell align-middle g-py-5--lg g-pt-30 g-px-20--lg text-left text-lg-right">
                                        <div>
                                    <span class="g-color-red amountLine g-ml-10">
                                        <span
                                            class="g-font-weight-700 g-line-height-0_7 g-font-size-15 text-right">{{ $row->FinalPriceWithoutDiscount }}</span>
                                    </span>
                                            <span class="g-color-gray-dark-v1">
                                        <span
                                            class="g-font-weight-700 g-line-height-0_7 g-font-size-22 text-right">{{ $row->FinalPrice }}</span>
                                        <span
                                            class="g-font-size-11">تومان</span>
                                    </span>
                                        </div>
                                    </div>
                                    <!-- End Price -->

                                    <div class="d-md-table-cell align-middle text-md-left g-pa-20 g-pl-0 bigDevice">
                                        <a style="cursor: pointer"
                                           class="u-icon-v1 g-color-gray-dark-v4 g-color-primary--hover rounded-circle g-ml-5"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           href="{{ route('productDetail',[$row->ProductID, $row->Size]) }}"
                                           data-original-title="جزئیات محصول"><i
                                                class="icon-eye g-line-height-0_7"></i></a>
                                        <a style="cursor: pointer"
                                           onclick="deleteProductLike({{$row->ProductID}},{{ $row->ProductDetailID }},$(this).attr('id'))"
                                           id="{{ 'deleteLikeBtn'.$key }}"
                                           class="u-icon-v1 g-color-primary g-color-gray-light-v1--hover rounded-circle g-ml-5"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           data-original-title="فراموش کن">
                                            <i class="fa fa-bookmark"></i>
                                        </a>
                                        <i id="{{'waitingLikeDelete'.$key}}"
                                           style="display: none"
                                           class="fa fa-spinner fa-spin m-0 g-font-size-20 g-color-primary"></i>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
@endsection
