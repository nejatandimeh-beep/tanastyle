@extends('Layouts.appSeller')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header text-right">ثبت نام در سامانه فروش</h5>

                    @if(session()->has('msg'))
                        <div style="direction: rtl;" class="g-mt-40">
                            <h3 class="g-color-primary text-center">با تشکر از ثبت نام شما در سامانه فروش تانا استایل</h3>
                            <h6 class="text-center">درخواست شما در صف بررسی قرار گرفت. در صورت تایید اطلاعات،  نتیجه را از طریق پیامک اطلاع رسانی خواهیم نمود.</h6>
                        </div>
                        <svg id="checkMark" class="checkmark"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25"
                                    fill="none"/>
                            <path class="checkmark__check" fill="none"
                                  d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    @else
                    <div class="card-body">
                        <form action="{{route('sellerNew')}}" method="POST" style="direction: rtl" id="registerForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="container g-py-30--lg g-px-60--lg">
                                {{--نام--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">نام</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="user-name"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               type="text"
                                               value=""
                                               name="name"
                                               autofocus
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
                                        >
                                    </div>
                                </div>

                                {{--نام خانوادگی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">نام
                                        خانوادگی</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="user-family"
                                            name="family"
                                            maxlength="15"
                                            type="text"
                                            value=""
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

                                {{--ایمیل--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">ایمیل</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               id="email"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="nationalId"
                                            name="nationalId"
                                            value=""
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
                                <div class="customDisable form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">جنسیت</label>
                                    <div class="col-sm-9 force-col-12">
                                        <div class="btn-group-lg d-flex">
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                       type="radio"
                                                       checked
                                                       value="0">
                                                <span
                                                    class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                            </label>
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                       type="radio"
                                                       value="1">
                                                <span
                                                    class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-bg-primary--checked rounded-0 g-color-white--checked">کودک</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                {{--تلفن ثابت--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">تلفن
                                        ثابت</label>
                                    <div class="col-sm-9 force-col-12 d-flex">
                                        <input
                                            style="direction: ltr"
                                            class="text-left col-8 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="phoneNumber"
                                            name="phone"
                                            type="text"
                                            maxlength="8"
                                            value=""
                                            placeholder="xxxxxxxx"
                                        >
                                        <input
                                            style="direction: ltr"
                                            id="phonePreNumber"
                                            name="prePhone"
                                            class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-right-none"
                                            maxlength="3"
                                            value=""
                                            oninput="if($(this).val().length === 3) $('#phoneNumber').focus();"
                                            placeholder="0xx"
                                        >
                                    </div>
                                </div>

                                {{--موبایل--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">تلفن همراه</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               id="mobile"
                                               name="mobile"
                                               maxlength="11"
                                               value=""
                                               placeholder="09xxxxxxxx"
                                        >
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
                                                    style="direction: rtl; padding-right: 30px !important"
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
                                            <input id="city" class="d-none" value="">
                                            <select id="citySelect"
                                                    style="direction: rtl; padding-right: 30px !important"
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5"
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
                                        class="col-sm-3 col-form-label align-self-center text-right">آدرس سکونت</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="homeAddress"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               type="text"
                                               value=""
                                               name="homeAddress"
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

                                {{--کد پستی سکونت--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                        پستی سکونت</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="homePostalCode"
                                            name="homePostalCode"
                                            value=""
                                            maxlength="10"
                                            placeholder="فقط اعداد"
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
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               type="text"
                                               value=""
                                               name="workAddress"
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

                                {{--کد پستی محل کار--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">کد
                                        پستی محل کار</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="workPostalCode"
                                            name="workPostalCode"
                                            value=""
                                            maxlength="10"
                                            placeholder="فقط اعداد"
                                        >
                                    </div>
                                </div>

                                {{--شماره پلاک محل کار--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">شماره پلاک محل کار</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="shopNumber"
                                            name="shopNumber"
                                            value=""
                                            maxlength="10"
                                            placeholder="فقط اعداد"
                                        >
                                    </div>
                                </div>

                                {{--تصویر چهره--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right" for="fileShow11"
                                           id="img-file-label11">
                                        تصویر چهره
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                        <span style="display: none; cursor: default"
                                              class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                                              id="{{ 'check11' }}"></span>
                                            <input id="{{ 'fileShow11' }}"
                                                   class="form-control form-control-md rounded-0 g-font-size-16"
                                                   type="text"
                                                   placeholder="فاقد تصویر" readonly="">

                                            <div class="input-group-btn">
                                                <button class="btn btn-md u-btn-primary rounded-0" tabindex="8"
                                                        type="submit">
                                                    بارگذاری
                                                </button>
                                                <input id="{{'pic11'}}"
                                                       onclick="$('#fileShow11').removeClass('g-brd-lightred')"
                                                       oninput="addPathCheckMark('pic11', 'fileShow11', 'Check11')"
                                                       type="file"
                                                       name="{{'pic11'}}"
                                                       accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--تصویر کارت ملی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right" for="fileShow11"
                                           id="img-file-label11">
                                        تصویر کارت ملی
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                        <span style="display: none; cursor: default"
                                              class="align-self-center fa fa-check g-mr-5 g-bg-primary g-pa-15 g-color-white"
                                              id="{{ 'check12' }}"></span>
                                            <input id="{{ 'fileShow12' }}"
                                                   class="form-control form-control-md rounded-0 g-font-size-16"
                                                   type="text"
                                                   placeholder="فاقد تصویر" readonly="">

                                            <div class="input-group-btn">
                                                <button class="btn btn-md u-btn-primary rounded-0" tabindex="8"
                                                        type="submit">
                                                    بارگذاری
                                                </button>
                                                <input id="{{'pic12'}}"
                                                       onclick="$('#fileShow12').removeClass('g-brd-lightred')"
                                                       oninput="addPathCheckMark('pic12', 'fileShow12', 'Check12')"
                                                       type="file"
                                                       name="{{'pic12'}}"
                                                       accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--کارت بانکی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right" for="fileShow11"
                                           id="img-file-label11">
                                        شماره کارت بانکی
                                    </label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <div
                                            class="align-self-center g-color-white text-center text-lg-right">

                                            <div style="display: flex" class="d-custom-block">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="1"
                                                       placeholder="0000"
                                                       id="creditCard4"
                                                       name="creditCard4"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard3').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="2"
                                                       placeholder="0000"
                                                       id="creditCard3"
                                                       name="creditCard3"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard2').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="3"
                                                       placeholder="0000"
                                                       id="creditCard2"
                                                       name="creditCard2"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard1').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width"
                                                       type="text"
                                                       tabindex="4"
                                                       placeholder="0000"
                                                       id="creditCard1"
                                                       name="creditCard1"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#save').focus();">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button id="save" type="button"
                                        class="btn btn-md u-btn-primary rounded-0 force-col-12 g-mt-15"
                                        onclick="saveUserData()">
                                    ارسال اطلاعات
                                </button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function saveUserData() {
            $('#registerForm').submit();
        }

        function addPathCheckMark(picID, filePathID, checkMarkID) {
            let pic = $('#' + picID),
                ext = $('#' + picID).val().split('.').pop().toLowerCase(),
                filePath = $('#' + filePathID),
                checkMark = $("#" + checkMarkID);
            if ((pic.val() !== '') && ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) !== -1)) {
                let fileName = pic.val().split("\\").pop();
                filePath.attr("placeholder", fileName);
                filePath.addClass('g-color-primary');
                checkMark.css('display', 'inline');
            } else {
                filePath.attr("placeholder", 'فاقد تصویر');
                filePath.addClass('g-color-red');
                checkMark.css('display', 'none');
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
            }
        }
    </script>
@endsection
