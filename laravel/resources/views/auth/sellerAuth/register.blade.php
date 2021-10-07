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
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               type="text"
                                               value=""
                                               name="name"
                                               maxlength="15"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="user-family"
                                            name="family"
                                            maxlength="15"
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

                                {{--ایمیل--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">ایمیل</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="nationalId"
                                            name="nationalId"
                                            value=""
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
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5 g-brd-red"
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
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none g-bg-gray-light-v5 g-brd-red"
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
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5 g-brd-red"
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
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" id="female" name="gender"
                                                       type="radio"
                                                       onclick="$('#maleCaption').removeClass('g-brd-red'); $('#femaleCaption').removeClass('g-brd-red'); $('#femaleCaption').addClass('g-brd-gray-light-v2');"
                                                       value="0">
                                                <span id="maleCaption"
                                                    class="btn btn-md btn-block g-brd-red g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                            </label>
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0 g-brd-red" id="male" name="gender"
                                                       type="radio"
                                                       onclick="$('#femaleCaption').removeClass('g-brd-red'); $('#maleCaption').removeClass('g-brd-red'); $('#maleCaption').addClass('g-brd-gray-light-v2');"
                                                       value="1">
                                                <span id="femaleCaption"
                                                    class="btn btn-md btn-block g-brd-red g-bg-gray-light-v5 g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
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
                                            class="text-left col-8 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="phoneNumber"
                                            onblur="if($(this).val().length===8) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                            name="phone"
                                            type="text"
                                            maxlength="8"
                                            value=""
                                            placeholder="xxxxxxxx"
                                        >
                                        <input
                                            style="direction: ltr"
                                            id="phonePreNumber"
                                            onblur=" if($(this).val().length===3) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                            name="prePhone"
                                            class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-right-none g-brd-red"
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
                                               class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               id="mobile"
                                               onblur=" if($(this).val().length===11) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
                                               name="mobile"
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
                                                    style="direction: rtl; padding-right: 30px !important"
                                                    onblur=" if($(this).val()!=='0'){$(this).removeClass('g-brd-red'); $('#citySelect').removeClass('g-brd-red');} else {$(this).addClass('g-brd-red'); $('#citySelect').addClass('g-brd-red');}"
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-brd-left-none--lg g-bg-gray-light-v5 g-mb-10 g-mb-0--lg g-brd-red"
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
                                                    class="form-control form-control-md custom-select rounded-0 h-25 g-font-size-16 g-bg-gray-light-v5 g-brd-red"
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
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               type="text"
                                               value=""
                                               onblur=" if($(this).val().length>10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="homePostalCode"
                                            onblur=" if($(this).val().length===10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
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
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               type="text"
                                               value=""
                                               onblur=" if($(this).val().length>10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="workPostalCode"
                                            onblur=" if($(this).val().length===10) $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="shopNumber"
                                            onblur=" if($(this).val()!=='') $(this).removeClass('g-brd-red'); else $(this).addClass('g-brd-red')"
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
                                                   class="form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
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
                                                   class="form-control form-control-md rounded-0 g-font-size-16 g-brd-red"
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
                                <div style="display: none" class="form-group row g-mb-15">
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
                                                       value="0000"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard3').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="2"
                                                       placeholder="0000"
                                                       id="creditCard3"
                                                       name="creditCard3"
                                                       value="0000"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard2').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="3"
                                                       placeholder="0000"
                                                       id="creditCard2"
                                                       name="creditCard2"
                                                       value="0000"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard1').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width"
                                                       type="text"
                                                       tabindex="4"
                                                       placeholder="0000"
                                                       id="creditCard1"
                                                       name="creditCard1"
                                                       value="0000"
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
            if($('#user-name').hasClass('g-brd-red') || $('#user-family').hasClass('g-brd-red') ||
                $('#email').hasClass('g-brd-red') || $('#nationalId').hasClass('g-brd-red') ||
                $('#birthday-day').hasClass('g-brd-red') || $('#birthday-mon').hasClass('g-brd-red') ||
                $('#birthday-year').hasClass('g-brd-red') || $('#male').hasClass('g-bg-gray-light-v5') ||
                $('#female').hasClass('g-bg-gray-light-v5') || $('#phoneNumber').hasClass('g-brd-red') ||
                $('#phonePreNumber').hasClass('g-brd-red') || $('#phoneNumber').hasClass('g-brd-red') ||
                $('#mobile').hasClass('g-brd-red') || $('#stateSelect').hasClass('g-brd-red') ||
                $('#citySelect').hasClass('g-brd-red') || $('#homeAddress').hasClass('g-brd-red') ||
                $('#homePostalCode').hasClass('g-brd-red') || $('#workAddress').hasClass('g-brd-red') ||
                $('#workPostalCode').hasClass('g-brd-red') || $('#shopNumber').hasClass('g-brd-red') ||
                $('#fileShow11').hasClass('g-brd-red') || $('#fileShow12').hasClass('g-brd-red'))
                    alert('لطفا فرم را بازبینی بفرمائید و خطاهای رخ داده را رفع و مجدداً تلاش کنید.');
            else
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
                filePath.removeClass('g-brd-red');
                filePath.removeClass('g-color-red');
                filePath.addClass('g-color-primary');
                checkMark.css('display', 'inline');
            } else {
                filePath.attr("placeholder", 'فاقد تصویر');
                filePath.addClass('g-brd-red');
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
    </script>
@endsection
