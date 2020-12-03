@extends('Layouts.IndexCustomer')
@section('Content')
    <p id="pageLocation" class="d-none">{{ $id }}</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 g-brd-top g-brd-primary">
                <!-- Figure -->
                <figure class="u-block-hover g-bg-white g-rounded-4 g-py-15">
                    <div style="direction: rtl" class="d-flex justify-content-start align-items-center">
                        <div class="col-md-3 d-flex g-pr-15--lg g-pr-0">
                            <!-- Figure Image -->
                            <img class="g-width-80 g-height-80 rounded-circle g-ml-15"
                                 src="{{ asset('img/Other/a.png') }}"
                                 alt="Image Description">
                            <!-- Figure Image -->

                            <!-- Figure Info -->
                            <div class="d-flex flex-column justify-content-center">
                                <div class="g-mb-5">
                                    <h4 class="h5 g-mb-0">{{ Auth::user()->name.' '.Auth::user()->Family }}</h4>
                                </div>
                                <em class="d-block g-color-gray-dark-v5 g-font-style-normal g-font-size-13 g-mb-2">{{ Auth::user()->email }}</em>
                            </div>
                        </div>
                        <!-- End Figure Info -->

                        <!-- Figure Caption -->
                        <figcaption class="u-block-hover__additional--fade g-bg-white-opacity-0_9 g-pa-30">
                            <div
                                class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">
                                <!-- Figure Social Icons -->
                                <ul class="list-inline text-center g-flex-middle-item">
                                    <li class="list-inline-item align-middle g-mx-7">
                                        <a class="u-icon-v1 u-icon-size--md g-color-gray-dark-v5 g-color-primary--hover"
                                           href="#">
                                            <i class="icon-lock-open"></i>
                                        </a>
                                        تغییر رمز ورود به سایت
                                    </li>
                                </ul>
                                <!-- End Figure Social Icons -->
                            </div>
                        </figcaption>
                        <!-- End Figure Caption -->
                    </div>
                </figure>
                <!-- End Figure -->
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
                                            <i class="icon-user float-left g-font-size-16 g-pb-5 g-pl-5"></i>
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
                            <!-- سبد خرید -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-basket"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('basket');">سبد
                                            خرید
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
                                            <i class="icon-hotel-restaurant-186 u-line-icon-pro float-left g-font-size-20 g-pb-5 g-pl-5 g-line-height-0_7"></i>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- پسندیده ها -->
                            <div class="card g-brd-0 g-mb-5">
                                <div id="accordion-100-heading-01" class="card-header g-pa-0" role="tab">
                                    <h5 class="h6 g-bg-white g-px-0 g-py-10 mb-0">
                                        <a style="cursor: pointer"
                                           id="filter-user-like"
                                           class="nav-link g-color-main g-color-primary--hover p-0"
                                           onclick="showPanel('like');">علاقه مندی ها
                                            <i class="icon-heart float-left g-font-size-17 g-pb-5 g-pl-5"></i>
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

                                            <i class="icon-logout float-left g-font-size-17 g-pb-5 g-pl-5"></i>
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
                        <div style="padding-bottom: 13px;" class="g-pr-15 d-flex g-pt-25 g-color-primary">
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
                                        maxlength="10"
                                        placeholder="فقط اعداد"
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
                                                value="{{isset($customer->BirthdayD) ? $customer->BirthdayD:'0' }}">{{isset($customer->BirthdayD) ? $customer->BirthdayD:'سال' }}</option>
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
                                                value="{{isset($customer->BirthdayM) ? $customer->BirthdayM:'0' }}">{{isset($customer->BirthdayM) ? $customer->BirthdayM:'سال' }}</option>
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
                                        maxlength="8"
                                        value="{{ $customer->Phone }}"
                                        placeholder="xxxxxxxx"
                                        readonly="">
                                    <input
                                        style="direction: ltr"
                                        id="phonePreNumber"
                                        name="prePhone"
                                        class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-right-none"
                                        maxlength="3"
                                        value="{{ $customer->PrePhone }}"
                                        oninput="if($(this).val().length === 3) $('#phoneNumber').focus();"
                                        placeholder="0xx"
                                        readonly="">
                                </div>
                            </div>
                            {{--موبایل--}}
                            <div class="form-group row g-mb-15">
                                <label
                                    class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                <div class="col-sm-10 force-col-12">
                                    <input style="direction: ltr"
                                           class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                           id="user-mobile"
                                           name="mobile"
                                           maxlength="11"
                                           value="{{ $customer->Mobile }}"
                                           placeholder="09xxxxxxxx"
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
                    <div class="alert alert-success alert-dismissible fade show g-mx-15 g-mx-60--lg g-mt-40 g-mt-0--lg"
                         role="alert">
                        <h4 class="h5"><i class="icon-present g-ml-5"></i>دریافت هدیه با تکمیل اطلاعات کاربری
                        </h4>
                        <span class="g-font-weight-600">{{ Auth::user()->name }}</span> عزیز با تکمیل مشخصات فردی، برای
                        خرید
                        بعدیتان تخفیف 20 درصدی هدیه بگیرید.
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
                        <div style="padding-bottom: 13px;" class="g-pr-15 d-flex g-pt-25 g-color-primary">
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
                                <div class="alert alert-danger g-px-15--lg g-px-5 text-lg-right text-center"
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
                                                 aria-expanded="false" aria-controls="{{ 'accordion-13-body-'.$key }}">
                                                <!-- ردیف و کلیدهای فعالسازی آدرس -->
                                                <div
                                                    class="clearfix d-md-table-cell g-valign-middle g-pa-20--lg g-width-300 justify-content-between">
                                                    <!-- Track Num -->
                                                    <div
                                                        class="d-inline-block g-ml-20--lg g-width-20">{{($key+1).'.'}}</div>
                                                    <!-- End Track Num -->
                                                @if($row->Status === 1)
                                                    <!-- Track Avatar -->
                                                        <span style="cursor: default"
                                                              class="g-ml-10 g-ml-25--lg g-bg-primary g-pt-15 g-pb-5 g-pr-15 g-pl-10 g-font-size-16">
                                                        <i class="icon-communication-011 g-color-white"></i>
                                                    </span>
                                                        <!-- End Track Avatar -->
                                                @else
                                                    <!-- Track Avatar -->
                                                        <a class="g-ml-10 g-ml-25--lg g-text-underline--none--hover g-bg-primary--hover g-bg-lightred g-pt-15 g-pb-5 g-pr-15 g-pl-10 g-font-size-16 g-width-50"
                                                           href="#"
                                                           id="{{ $row->ID }}"
                                                           onclick="activeAddress($(this).attr('id'))"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           data-original-title="فعال سازی آدرس">
                                                            <i class="icon-communication-011 g-color-white"></i>
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
                                                                  class="g-color-gray-dark-v5"
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
                                                              class="g-color-gray-dark-v5 g-pa-5"
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
                                                                    class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    type="text"
                                                                    name="receiver-name"
                                                                    maxlength="15"
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
                                                                    class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    type="text"
                                                                    name="receiver-family"
                                                                    maxlength="15"
                                                                    value="{{ $row->ReceiverFamily }}"
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
                                                                       class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                       value="{{ $row->PostalCode }}"
                                                                       name="receiver-postalCode"
                                                                       maxlength="10"
                                                                       placeholder="فقط اعداد"
                                                                       readonly="">
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
                                                                       maxlength="8"
                                                                       value="{{ $row->Phone }}"
                                                                       placeholder="xxxxxxxx"
                                                                       readonly="">
                                                                <input style="width: 30%; direction: ltr"
                                                                       class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-brd-right-none g-font-size-16"
                                                                       name="receiver-prePhone"
                                                                       maxlength="3"
                                                                       value="{{ $row->PrePhone }}"
                                                                       oninput="if($(this).val().length === 3) $('#receiverPhoneNum'+{{ $key }}).focus();"
                                                                       placeholder="0xx"
                                                                       readonly="">
                                                            </div>
                                                        </div>
                                                        {{--موبایل گیرنده--}}
                                                        <div class="form-group row g-mb-15">
                                                            <label
                                                                class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                                            <div class="col-sm-10 force-col-12">
                                                                <input style="direction: ltr"
                                                                       class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                       placeholder="09xxxxxxxx"
                                                                       name="receiver-mobile"
                                                                       maxlength="11"
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
                                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5"
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
                                                                            class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5"
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
                                                                <input
                                                                    class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                                                    maxlength="300"
                                                                    name="receiver-address"
                                                                    placeholder="الزاماً فارسی"
                                                                    value="{{$row->Address}}"
                                                                    readonly>
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
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div style="direction: rtl" class="g-mx-80--lg g-mt-40 g-mb-25 g-px-10">
                        <div class="text-left">
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
                                 class="text-left g-width-90x g-height-auto g-bg-white SubMenuScroll modal17"
                                 style="display: none; overflow-y: auto; height: auto !important;">
                                <form id="addAddress" action="{{route('addAddress')}}" method="POST">
                                    @csrf
                                    <input id="productIDFromBuy" name="productIDFromBuy" class="d-none" value="empty">
                                    <button style="outline: none" type="button" class="close float-left g-pt-15 g-pl-20"
                                            onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix'); setTimeout(function () {$('#filter-user-address').trigger('click')}, 400); ">
                                        <i class="hs-icon hs-icon-close"></i>
                                    </button>
                                    <h5 class="g-py-15 g-pr-20 m-0 text-right g-brd-bottom g-brd-gray-light-v4">افزودن
                                        آدرس
                                        جدید</h5>
                                    <div style="direction: rtl; overflow-y: auto"
                                         class="container g-px-30 g-px-60--lg text-right g-py-0">
                                        <p style="text-align: justify;" class="g-pt-20 g-pb-15 g-mb-0 g-mb-20--lg"><span
                                                class="g-font-weight-600 g-ml-10">{{ Auth::user()->name }} عزیز</span>آدرس
                                            جدید بصورت خودکار فعال خواهد شد و از این پس محصولات به این آدرس ارسال
                                            می گردد. (می توانید در هر زمان از طریق منوی آدرس ها آدرس دیگری را فعال
                                            کنید). </p>
                                        <div style="direction: rtl" class="alert alert-warning smallDevice"
                                             role="alert">
                                            <strong>توجه! کشیدن صفحه به پایین</strong>
                                            <p class="text-justify">اگر روی جعبه های ورودی عمل کشیدن را انجام دهید صفحه
                                                به
                                                پایین کشیده نمی شود. این یک باگ در دستگاه های کوچک است.</p>
                                        </div>
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
                                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                       name="receiver-postalCode"
                                                       maxlength="10"
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
                                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                       name="receiver-phone"
                                                       maxlength="8"
                                                       value=""
                                                       placeholder="xxxxxxxx">
                                                <input style="width: 30%; direction: ltr"
                                                       name="receiver-prePhone"
                                                       maxlength="3"
                                                       class="text-left form-control form-control-md rounded-0 g-bg-white g-brd-right-none g-font-size-16"
                                                       value=""
                                                       oninput="if($(this).val().length === 3) $('.custombox-content #receiver-phone-new').focus();"
                                                       placeholder="0xx">
                                            </div>
                                        </div>
                                        {{--موبایل گیرنده--}}
                                        <div class="form-group row g-mb-30 g-mb-15--lg">
                                            <label style="direction: ltr"
                                                   class="col-sm-2 col-form-label align-self-center">موبایل</label>
                                            <div class="col-sm-10 force-col-12">
                                                <input
                                                    class="text-left form-control form-control-md rounded-0 g-bg-white g-font-size-16"
                                                    name="receiver-mobile"
                                                    maxlength="11"
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
                                       class="btn btn-md u-btn-primary rounded-0 g-pa-15 g-color-white w-100 g-mt-15">
                                        ثبت آدرس جدید
                                    </a>
                                </form>
                            </div>
                            <!-- End Demo modal window -->
                        </div>
                    </div>
                </div>

                <!-- سبد خرید -->
                <div style="display: none" id="user-basket">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 13px;" class="g-pr-15 d-flex g-pt-25 g-color-primary">
                            <i class="icon-basket g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                سبد خرید
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>

                    <div class="container g-pa-15 g-pb-30">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 g-mb-20">
                                <!-- Article -->
                                <article>
                                    <div class="masonry-grid-item u-block-hover">
                                        <a class="js-fancybox d-block g-bg-black-opacity-0_3--after"
                                           data-fancybox-gallery="lightbox-gallery--02"
                                           href="{{asset('img/products/2-2020.11.04-19.58.38/pic1.jpg')}}"
                                           title="Lightbox Gallery">
                                            <img
                                                class="u-block-hover__main--zoom-v1 w-100"
                                                src="{{asset('img/products/2-2020.11.04-19.58.38/pic1.jpg')}}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <!-- Article Image -->

                                    <!-- End Article Image -->

                                    <!-- Article Content -->
                                    <div class="u-shadow-v24 g-pa-30 g-py-15">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="h5 g-color-black g-font-weight-600 m-0">
                                                <a class="g-color-main g-color-primary--hover g-text-underline--none--hover">شرت
                                                    زنانه</a><br>
                                                <em class="d-block g-font-style-normal g-font-size-11">5 روز به
                                                    <span class="g-color-red">پایان</span> تخفیف</em>
                                            </h3>
                                            <div class="d-flex flex-column">
                                                <a style="cursor: pointer" onclick=""
                                                   class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5"
                                                   data-toggle="tooltip"
                                                   data-placement="right"
                                                   data-original-title="جزئیات">
                                                    <i class="icon-eye g-font-size-16 g-color-gray-dark-v2 g-color-primary--hover"></i>
                                                </a>
                                                <a style="cursor: pointer" onclick=""
                                                   class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-pb-0"
                                                   data-toggle="tooltip"
                                                   data-placement="right"
                                                   data-original-title="حذف از سبد">
                                                    <i class="icon-trash g-font-size-16 g-color-gray-dark-v2 g-color-red--hover"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <div class="align-self-center g-width-70 g-ml-10">
                                                <!-- Chart Pie -->
                                                <div class="js-pie g-color-black" data-circles-value="4"
                                                     data-circles-max-value="100" data-circles-bg-color="#dedede"
                                                     data-circles-fg-color="#72c02c" data-circles-radius="35"
                                                     data-circles-stroke-width="4" data-circles-font-size="12"
                                                     data-circles-font-weight="500"
                                                     data-circles-additional-text=" تا موجود"
                                                     data-circles-duration="2000"
                                                     data-circles-scroll-animate="true"></div>
                                                <!-- End Chart Pie -->
                                            </div>
                                            <div class="align-self-center text-center">
                                                <div
                                                    class="g-color-black g-font-weight-700 g-font-size-25 g-line-height-0_7">
                                                    120
                                                </div>
                                                <div
                                                    class="g-font-size-11 g-font-weight-300"><span>هزار</span><span>تومان</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="g-brd-gray-light-v4 g-my-10">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-center">
                                                {{--                                                <!-- Secondary Button -->--}}
                                                <div class="d-inline-block btn-group">
                                                    <button type="button"
                                                            class="btn btn-secondary h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent g-font-weight-600 g-font-size-12 m-0 p-0"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        رنگ <span class="g-mr-5">قرمز</span><span
                                                            class="icon-arrow-down g-pr-7 g-font-size-9"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right rounded-0 text-right">
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده قرمز</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده سبز</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده زرد</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">آبی</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده سفید</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده سیاه</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">خانواده خاکستری</a>
                                                    </div>
                                                </div>
                                                {{--                                                <!-- End Secondary Button -->--}}
                                            </div>
                                            <div class="text-center">
                                                {{--                                                <!-- Secondary Button -->--}}
                                                <div class="d-inline-block btn-group">
                                                    <button type="button"
                                                            class="btn btn-secondary h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent g-font-weight-600 g-font-size-12 m-0 p-0"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        سایز <span
                                                            class="icon-arrow-down g-pr-7 g-font-size-9"></span><span
                                                            class="g-mr-5">L</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-left rounded-0 text-left">
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">S</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">M</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">L</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">XL</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">XXL</a>
                                                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                                           href="#">XXXL</a>
                                                    </div>
                                                </div>
                                                {{--                                          End Secondary Button -->--}}
                                            </div>

                                        </div>
                                    </div>
                                </article>
                                <!-- End Article -->
                            </div>
                        </div>
                        <a href="#modal18"
                           onclick="$(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
                           data-modal-target="#modal18"
                           data-modal-effect="slidetogether"
                           class="pull-left btn btn-xl btn-primary g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 g-ml-0 g-my-50 g-mt-0--lg g-ml-50--lg g-mb-70--lg force-col-12">
                            <span class="pull-left">
                              پرداخت امن
                              <span class="d-block g-font-size-11">نهایی کردن خرید</span>
                            </span>
                            <i class="fa fa-shield float-right g-font-size-32 g-ml-25 align-self-center g-line-height-0 g-mt-20"></i>
                        </a>

                        <!-- Demo modal window -->
                        <div id="modal18"
                             class="text-left g-width-90x g-height-auto g-bg-white SubMenuScroll g-px-20 g-pb-20"
                             style="display: none; overflow-y: auto; height: auto !important">
                            <button style="outline: none" type="button" class="g-py-15 close float-left"
                                    onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                                <i class="hs-icon hs-icon-close"></i>
                            </button>
                            <h5 class="g-py-15 text-right m-0">فاکتور فروش</h5>
                            <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">

                            <div style="direction: rtl"
                                 class="d-lg-flex col-12 g-pa-15 g-pt-20 g-brd-around g-brd-gray-light-v4">
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        کد محصول
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        1233203
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        نام محصول
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        شرت زنانه<span> مدل بیکی</span>
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        رنگ
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        زرد
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        سایز
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        128000
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        تعداد
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        <span>2</span> عدد
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        قیمت واحد
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                        128000
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        با تخفیف
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg g-color-darkred">
                                        (%10)
                                        <span class="g-mr-5 g-color-gray-dark-v3">230000</span>
                                    </span>
                                </div>
                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        قیمت در تعداد
                                    </h6>
                                    <span class="g-pt-40--lg g-px-5 g-pb-5">
                                        243000
                                    </span>
                                </div>

                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        تاریخ
                                    </h6>
                                    <span class="g-py-5 g-px-5 g-pt-40--lg color-primary-smallDevice">
                                    99/06/03
                                    </span>
                                </div>

                                <div
                                    class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                    <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                        عکس
                                    </h6>
                                    <span class="g-pa-5--lg"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          data-original-title="تحویل داده شد">
                                          <img class="g-width-80 g-height-80"
                                               src="{{ asset('img/products/2-2020.11.04-19.58.38/pic1.jpg') }}"
                                               alt="Image Description">
                                    </span>
                                </div>
                            </div>
                            <div style="direction: ltr" class="d-lg-flex col-12 justify-content-between p-0 text-right">
                                <span
                                    class="u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-mt-5 g-mb-40 g-my-20--lg text-center col-12 col-lg-3">مبلغ کل فاکتور: <span>243</span>
                                    <span class="g-font-size-12 g-font-weight-300 g-mr-5">هزار تومان</span>
                                </span>

                                <span style="direction: rtl"
                                      class="d-block g-color-main g-font-size-16 g-font-weight-600 g-pr-0 text-right align-self-center force-col-12">
                                    <span class="u-icon-v3 u-icon-size--sm g-bg-primary align-middle g-ml-5 bigDevice">
                                        <i class="icon-communication-011 u-line-icon-pro g-color-white g-pt-5"></i>
                                    </span>
                                    <span>آدرس ارسال:</span>
                                    <span
                                        class="d-block d-lg-inline-block g-font-size-16 g-font-weight-300 g-mr-5--lg g-pt-10 text-justify">آ.غ مهاباد خیابان قاضی تعاونی تانکرداران مهاباد <strong>گیرنده:</strong> خبات اندیمه <strong>شماره تماس:</strong> 09144421633</span>
                                </span>
                            </div>
                            <div style="direction: rtl"
                                 class="d-lg-flex col-12 justify-content-between align-items-center p-0 g-mt-20 g-mt-80--lg">
                                <div class="col-12 col-lg-9 p-0 g-mt-40 g-mt-0--lg g-mb-15 g-mb-0--lg">
                                    <div style="direction: rtl" class="btn-group justified-content">
                                        {{--                                        <form class="p-0 m-0" id="selectBankName">--}}
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   type="radio" checked="">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ملت</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک پارسیان</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک ایرانیان</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">بانک صادرات</span>
                                        </label>
                                        <label class="u-check force-col-12">
                                            <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="bankName"
                                                   type="radio">
                                            <span
                                                class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">بانک ملی</span>
                                        </label>
                                        {{--                                        </form>--}}
                                    </div>
                                </div>
                                <a href="#"
                                   onclick=""
                                   class="btn btn-xl btn-primary g-font-weight-600 g-letter-spacing-0_5 text-left rounded-0 force-col-12">
                                    <span class="pull-left">درگاه بانکی
                                        <span id="payment-door" class="d-block g-font-size-11">ورود به درگاه ملت</span>
                                    </span>
                                    <i class="icon-finance-164 u-line-icon-pro float-right g-font-size-32 g-ml-20 align-self-center g-line-height-0 g-mt-5"></i>
                                </a>
                            </div>
                        </div>
                        <!-- End Demo modal window -->
                    </div>
                </div>

                <!-- خریداری شده -->
                <div style="display: none" id="user-bought">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 13px;"
                             class="g-pr-15 g-pt-25 g-color-primary">
                            <div class="d-flex m-0 p-0">
                                <i class="icon-tag g-pl-5 g-font-size-20 g-font-weight-500"></i>

                                <h6 class="m-0 g-mt-7">
                                    خریداری شده
                                </h6>
                            </div>
                        </div>
                        <hr style="z-index: 100 !important" class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0">
                    </div>
                    <div class="container g-pa-15 g-py-30--lg g-px-60--lg">
                        @foreach($order as $key => $row)
                            <article class="d-md-table w-100 g-bg-white g-mb-1">
                                <!-- Date -->
                                <div
                                    class="d-md-table-cell align-middle g-width-125--md text-center g-color-gray-dark-v5 g-py-10 g-px-20">
                                    <div class="g-mb-15 g-mb-0--lg">
                                    <span
                                        class="d-block g-color-black g-font-weight-700 {{(is_null($orderHowDay[$key]) ? 'g-font-size-30':'g-font-size-20')}} g-line-height-1">{{ (is_null($orderHowDay[$key])) ? $persianDate[$key][2] : $orderHowDay[$key]}}</span>
                                        {{ (!is_null($orderHowDay[$key])) ? '' :$persianDate[$key][3].' '.$persianDate[$key][0] }}
                                    </div>
                                </div>
                                <!-- End Date -->

                                <!-- Article Image -->
                                <a class="js-fancybox d-md-table-cell align-middle g-width-130"
                                   data-fancybox-gallery="lightbox-gallery--10"
                                   href="{{ $row->PicPath.'pic1.jpg' }}"
                                   title="کد محصول {{ $row->ProductDetailID }}">
                                    <img class="img-fluid" src="{{ $row->PicPath.'pic1.jpg' }}" alt="Image Description">
                                </a>
                                <!-- End Article Image -->

                                <!-- Article Content -->
                                <div
                                    class="d-flex justify-content-between d-lg-table-cell align-middle g-py-15 g-pr-20 g-px-20--lg table-cell-responsive">
                                    <div>
                                        <h3 class="h6 g-font-weight-700 ">
                                            <span class="g-color-gray-dark-v2">شماره فاکتور</span>
                                        </h3>
                                        <em class="g-color-gray-dark-v5 g-font-style-normal">{{ $row->orderID.'/'.$row->orderDetailID }}</em>
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

                                <!-- Price -->
                                <div class="d-md-table-cell align-middle g-py-5 g-px-20--lg text-left text-lg-right">
                                    <span
                                        class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-25">{{ number_format($row->FinalPrice) }}</span>
                                    <span
                                        class="g-color-gray-dark-v5 g-font-size-11 ">تومان</span>
                                </div>
                                <!-- End Price -->

                                <!-- Actions -->
                                <div class="d-md-table-cell align-middle text-md-right g-py-30 g-px-0 g-pa-20--lg">
                                    <div class="g-mt-minus-10 g-mx-minus-5">
                                        <div class="text-left g-mt-15 g-mt-0--lg">
                                            <a href="{{ '#modal16'.$key }}"
                                               onclick="$(document.body).addClass('me-position-fix'); $(document.body).removeClass('me-position-normally');"
                                               data-modal-target="{{ '#modal16'.$key }}"
                                               data-modal-effect="slidetogether"
                                               class="d-lg-flex justify-content-end g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-pt-10 bigDevice">
                                                <i class="icon-eye g-font-size-20 g-color-gray-dark-v2 g-color-primary--hover"></i>
                                            </a>
                                            <!-- Demo modal window -->
                                            <div id="{{ 'modal16'.$key }}"
                                                 class="text-left g-width-90x g-height-auto g-bg-white SubMenuScroll g-px-20"
                                                 style="display: none; overflow-y: auto">
                                                <button style="outline: none" type="button"
                                                        class="g-py-15 close float-left"
                                                        onclick="Custombox.modal.close(); $(document.body).addClass('me-position-normally'); $(document.body).removeClass('me-position-fix');">
                                                    <i class="hs-icon hs-icon-close"></i>
                                                </button>
                                                <h6 class="g-py-15 text-right m-0">فاکتور فروش به
                                                    شماره: {{ $row->orderID.'/'.$row->orderDetailID }}</h6>
                                                <hr class="g-brd-gray-light-v4 g-mx-minus-20 g-mt-0 g-mb-40">

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
                                                            {{ $row->Name }}<span> مدل {{ $row->Model }}</span>
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
                                                        class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                        <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                            قیمت واحد
                                                        </h6>
                                                        <span class="g-pa-5--lg color-primary-smallDevice">
                                                             {{ number_format($row->UnitPrice) }}
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-column col-12 col-lg-2 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
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
                                                              {{ $persianDate[$key][0].'/'.$persianDate[$key][1].'/'.$persianDate[$key][2] }}
                                                        </span>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-column col-12 col-lg-1 text-center g-py-10 g-py-0--lg g-px-20 g-px-0--lg">
                                                        <h6 class="g-brd-bottom g-brd-gray-light-v4 g-mb-10 g-pb-5">
                                                            تحویل
                                                        </h6>
                                                        <span class="g-pa-5--lg"
                                                              data-toggle="tooltip"
                                                              data-placement="top"
                                                              data-original-title="تحویل داده شد">
                                                            @if($row->DeliveryStatus === '3')
                                                                <i class="fa fa-check g-font-size-18 g-color-primary"></i>
                                                            @else
                                                                <i class="fa fa-spinner fa-spin m-0 g-font-size-16 g-color-primary"></i>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                <span
                                                    class="u-label g-bg-gray-light-v5 g-color-main g-brd-around g-brd-gray-light-v4 g-font-size-16 g-font-weight-600 g-pa-15 g-my-20 text-center force-col-12">مبلغ کل فاکتور: <span>{{ number_format($row->FinalPrice * $row->Qty) }}</span><span
                                                        class="g-font-size-12 g-font-weight-300 g-mr-5">تومان</span></span>
                                            </div>
                                            <!-- End Demo modal window -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Actions -->
                            </article>
                        @endforeach
                    </div>
                </div>

                <!-- در انتظار تحویل -->
                <div style="display: none" id="user-delivery">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 3px;" class="g-pr-15 d-flex g-pt-25 g-color-primary">
                            <i class="icon-hotel-restaurant-186 u-line-icon-pro g-pl-5 g-font-size-23 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-7">
                                در انتظار تحویل
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div class="container g-pa-15 g-py-30--lg g-px-60--lg">
                        @foreach($order as $key => $row)
                            @if($row->DeliveryStatus !== '3')
                                <article class="d-md-table w-100 g-bg-white g-mb-1">
                                    <!-- deliveryStatus -->
                                    <div
                                        class="d-md-table-cell align-middle g-width-125--md text-center g-color-gray-dark-v5 g-py-10 g-px-20">
                                        <div class="g-mb-15 g-mb-0--lg">
                                            {{ $delivery[$key]['text'] }}
                                            <span
                                                class="d-block g-font-weight-700 g-line-height-1
                                                @switch($delivery[$key]['location'])
                                                        @case('بسته بندی')
                                                            g-font-size-20
                                                            g-color-brown
                                                        @break
                                                        @case('ارســال')
                                                            g-font-size-20
                                                            g-color-blue
                                                        @break
                                                        @case('پست')
                                                            g-font-size-30
                                                            g-color-yellow
                                                        @break
                                                 @endswitch">{{ $delivery[$key]['location'] }}</span>
                                        </div>
                                    </div>

                                    <!-- Article Image -->
                                    <a class="js-fancybox d-md-table-cell align-middle g-width-130"
                                       data-fancybox-gallery="lightbox-gallery--11"
                                       href="{{ $row->PicPath.'pic1.jpg' }}"
                                       title="کد محصول {{ $row->ProductDetailID }}">
                                        <img class="img-fluid" src="{{ $row->PicPath.'pic1.jpg' }}" alt="Image Description">
                                    </a>
                                    <!-- End Article Image -->

                                    <!-- Article Content -->
                                    <div class="d-md-table-cell align-middle g-py-15 g-px-20 g-width-150">
                                        <h3 class="h6 g-font-weight-700 ">
                                            <a class="g-color-gray-dark-v2" href="#">{{ $row->Name }}</a>
                                        </h3>
                                        <em class="g-color-gray-dark-v5 g-font-style-normal">مدل {{ $row->Model }}</em>
                                    </div>
                                    <!-- End Article Content -->

                                    <!-- Size Color -->
                                    <div
                                        class="d-md-table-cell align-middle g-py-5 g-px-20--lg text-left text-lg-right">
                                        <span
                                            class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-17">{{ $row->Size }}</span>
                                        <span
                                            class="g-color-gray-dark-v5 g-font-size-11 ">{{ $row->Color }}</span>
                                    </div>

                                    <!-- Date -->
                                    <div
                                        class="d-md-table-cell align-middle g-py-5 g-px-20--lg text-left text-lg-right">
                                        <span
                                        class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-17">{{ $persianDate[$key][2].' '.$persianDate[$key][3].' '.$persianDate[$key][0] }}</span>
                                    </div>

                                    <!-- Actions -->
                                    <div
                                        class="d-md-table-cell align-middle g-pa-20 g-pt-25 g-pl-10 progress-auto-width g-mt-20">
                                        <div style="direction: ltr" class="g-mt-minus-10 g-mx-minus-5 d-flex">
                                            <i class="fa fa-spinner fa-spin m-0 g-font-size-16 g-color-primary"></i>
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
                                                        class="text-center u-progress__pointer-v1 g-font-size-11 g-color-white g-bg-primary g-pt-3">
                                                        <i class="icon-hotel-restaurant-186 u-line-icon-pro g-line-height-0 g-font-size-20"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Actions -->
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- علاقه مندیها -->
                <div style="display: none" id="user-like">
                    <div class="g-bg-white-opacity-0_9 g-mb-15 g-mt-30 g-mt-0--lg">
                        <div style="padding-bottom: 16px;" class="g-pr-15 d-flex g-pt-25 g-color-primary">
                            <i class="fa fa-heart-o g-pl-5 g-font-size-20 g-font-weight-500"></i>

                            <h6 class="m-0 g-mt-4">
                                علاقه مندی ها
                            </h6>
                        </div>
                        <hr class="g-brd-gray-light-v4 g-mx-minus-15 g-mt-0 g-mb-0 bigDevice">
                        <hr class="g-brd-primary g-mx-minus-15 g-mt-0 g-mb-0 smallDevice">
                    </div>
                    <div class="container g-pa-15 g-py-30--lg g-px-60--lg">
                        <article class="d-md-table w-100 g-bg-white g-mb-30 g-mb-15--lg">
                            <!-- Date -->
                            <div
                                class="d-md-table-cell align-middle g-width-125--md text-center g-color-gray-dark-v5 g-py-10 g-px-20 bigDevice">
                                <div class="align-self-center g-width-70 mx-auto">
                                    <!-- Chart Pie -->
                                    <div class="js-pie g-color-black" data-circles-value="4"
                                         data-circles-max-value="100" data-circles-bg-color="#dedede"
                                         data-circles-fg-color="#72c02c" data-circles-radius="35"
                                         data-circles-stroke-width="4" data-circles-font-size="12"
                                         data-circles-font-weight="500" data-circles-additional-text=" تا موجود"
                                         data-circles-duration="2000" data-circles-scroll-animate="true" id="hs-pie-1">
                                        <div class="circles-wrp" style="position: relative; display: inline-block;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70">
                                                <path fill="transparent" stroke="#dedede" stroke-width="4"
                                                      d="M 34.99327878427806 2.0000006844657747 A 33 33 0 1 1 34.95416366204364 2.000031832892283 Z"
                                                      class="circles-maxValueStroke"></path>
                                                <path fill="transparent" stroke="#72c02c" stroke-width="4"
                                                      d="M 34.99327878427806 2.0000006844657747 A 33 33 0 0 1 43.18978990452831 3.0324016960972457 "
                                                      class="circles-valueStroke"></path>
                                            </svg>
                                            <div class="circles-text"
                                                 style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 12px; height: 70px; line-height: 70px; font-weight: 500;">
                                                4 تا موجود
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Chart Pie -->
                                </div>
                                <a href="#"
                                   class="btn btn-sm u-btn-outline-lightred g-color-primary g-color-white--hover u-btn-hover-v2-1 g-brd-none rounded-0">
                                    موجود شد خبرم کن
                                </a>
                            </div>
                            <!-- End Date -->

                            <!-- Article Image -->
                            <a class="d-md-table-cell align-middle g-width-130" href="#">
                                <img class="d-block info-v5-2__image g-ml-minus-1"
                                     src="{{ asset('img/products/2-2020.11.04-19.58.38/pic1.jpg')}}"
                                     alt="Image Description">
                            </a>
                            <!-- End Article Image -->

                            <!-- Article Content -->
                            <div class="d-md-table-cell align-middle g-py-15 g-pr-20 g-px-20--lg table-cell-responsive">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h3 class="h6 g-font-weight-700">
                                            <a class="g-color-gray-dark-v2" href="#">شرت زنانه</a>
                                        </h3>
                                        <em class="g-color-gray-dark-v5 g-font-style-normal">مدل بیکینی</em>
                                    </div>
                                    <div class="smallDevice g-ml-minus-5 g-mt-minus-10">
                                        <span style="cursor: pointer"
                                              class="u-icon-v1 g-color-gray-dark-v5 g-color-primary--hover rounded-circle"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              data-original-title="{{ 'افزودن به سبد خرید' }}">
                                            <i class="icon-basket g-line-height-0_8"></i></span>
                                        <span style="cursor: pointer"
                                              class="u-icon-v1 g-color-gray-dark-v5 g-color-primary--hover rounded-circle"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              data-original-title="{{ 'خرید مستقیم' }}">
                                            <i class="icon-finance-164 u-line-icon-pro g-line-height-0"></i></span>
                                        <span style="cursor: pointer"
                                              class="u-icon-v1 u-icon-effect-v1-1--hover rounded-circle g-color-red g-color-white--hover g-mt-minus-2"
                                              data-toggle="tooltip"
                                              data-placement="top"
                                              data-original-title="{{ 'فراموش کن' }}"><i class="fa fa-heart"></i></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Article Content -->

                            <!-- Price -->
                            <div class="d-md-table-cell align-middle g-py-5 g-px-20--lg text-left text-lg-right">
                                <div class="d-flex justify-content-between">
                                    <div
                                        class="smallDevice">
                                        <div class="align-self-center g-width-70 mx-auto">
                                            <!-- Chart Pie -->
                                            <div class="js-pie g-color-black" data-circles-value="4"
                                                 data-circles-max-value="100" data-circles-bg-color="#dedede"
                                                 data-circles-fg-color="#72c02c" data-circles-radius="35"
                                                 data-circles-stroke-width="4" data-circles-font-size="12"
                                                 data-circles-font-weight="500" data-circles-additional-text=" تا موجود"
                                                 data-circles-duration="2000" data-circles-scroll-animate="true"
                                                 id="hs-pie-1">
                                                <div class="circles-wrp"
                                                     style="position: relative; display: inline-block;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70">
                                                        <path fill="transparent" stroke="#dedede" stroke-width="4"
                                                              d="M 34.99327878427806 2.0000006844657747 A 33 33 0 1 1 34.95416366204364 2.000031832892283 Z"
                                                              class="circles-maxValueStroke"></path>
                                                        <path fill="transparent" stroke="#72c02c" stroke-width="4"
                                                              d="M 34.99327878427806 2.0000006844657747 A 33 33 0 0 1 43.18978990452831 3.0324016960972457 "
                                                              class="circles-valueStroke"></path>
                                                    </svg>
                                                    <div class="circles-text"
                                                         style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 12px; height: 70px; line-height: 70px; font-weight: 500;">
                                                        4 تا موجود
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Chart Pie -->
                                        </div>
                                        <a href="#"
                                           class="btn btn-sm u-btn-outline-lightred g-color-primary g-color-white--hover u-btn-hover-v2-1 g-brd-none rounded-0">
                                            موجود شد خبرم کن
                                        </a>
                                    </div>
                                    <span class="align-content-end">
                                        <span
                                            class="g-color-gray-dark-v2 g-font-weight-700 g-line-height-0_7 g-font-size-25 text-right">120</span>
                                        <span
                                            class="g-color-gray-dark-v5 g-font-size-11">هزار تومان</span>
                                    </span>
                                </div>
                            </div>
                            <!-- End Price -->

                            <div class="d-md-table-cell align-middle text-md-right g-pa-20 g-pl-0 bigDevice">
                                <span style="cursor: pointer"
                                      class="u-icon-v1 u-icon-effect-v1-2--hover rounded-circle g-ml-5"
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      data-original-title="{{ 'افزودن به سبد خرید' }}"><i
                                        class="icon-basket g-line-height-1_1"></i></span>
                                <span style="cursor: pointer"
                                      class="u-icon-v1 u-icon-effect-v1-2--hover rounded-circle g-ml-10"
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      data-original-title="{{ 'خرید مستقیم' }}"><i
                                        class="icon-finance-164 u-line-icon-pro g-line-height-0"></i></span>
                                <span style="cursor: pointer"
                                      class="u-icon-v1 u-icon-effect-v1-1--hover rounded-circle g-color-red g-color-white--hover g-mt-minus-2"
                                      data-toggle="tooltip"
                                      data-placement="top"
                                      data-original-title="{{ 'فراموش کن' }}"><i
                                        class="fa fa-heart g-line-height-1_3"></i></span>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>

@endsection
