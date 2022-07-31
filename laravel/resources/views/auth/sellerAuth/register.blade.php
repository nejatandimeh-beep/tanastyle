@include('Layouts.BaseCssLink')
</head>
@include('Layouts.CustomerNavigation')
@include('Layouts.CustomerFooter')
@include('Layouts.BaseJsLink')
@include('Layouts.BaseJsFunction')
@include('Layouts.CustomerJsFunctions')

@yield('BaseCssLink')
@yield('CustomerNavigation')
<div class="container g-mb-40">
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
                        <h3 class="g-color-primary text-center">با تشکر از ثبت نام شما در سامانه فروش تانا
                            استایل</h3>
                        <h6 class="text-center">درخواست شما در صف بررسی قرار گرفت. در صورت تایید اطلاعات، نتیجه را
                            از طریق پیامک اطلاع رسانی خواهیم نمود.</h6>
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{route('sellerNew')}}" method="POST" style="direction: rtl" id="registerForm"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="container g-py-30--lg g-px-60--lg text-left">
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
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                            id="user-family"
                                            name="family"
                                            tabindex="2"
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

                                {{--تلفن ثابت--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">تلفن
                                        ثابت</label>
                                    <div class="col-sm-9 force-col-12 d-flex">
                                        <input
                                            style="direction: ltr"
                                            tabindex="11"
                                            class="text-left col-8 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
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
                                            tabindex="10"
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
                                        class="col-sm-3 col-form-label align-self-center text-right">تلفن
                                        همراه</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input style="direction: ltr"
                                               class="text-left form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red need"
                                               id="mobile"
                                               tabindex="12"
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
                                            class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="homePostalCode"
                                            tabindex="16"
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
                                               class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                               type="text"
                                               tabindex="17"
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
                                            class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="workPostalCode"
                                            tabindex="18"
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
                                    <label class="col-sm-3 col-form-label align-self-center text-right">شماره پلاک
                                        محل کار</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="need form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-red"
                                            id="shopNumber"
                                            tabindex="19"
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
                                                    <input type="text" id="imageUrl12" name="imageUrl"
                                                           style="display: none">
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
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none creditCard"
                                                       type="text"
                                                       tabindex="30"
                                                       placeholder="0000"
                                                       id="creditCard4"
                                                       name="creditCard4"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard3').focus();">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none creditCard"
                                                       type="text"
                                                       tabindex="31"
                                                       placeholder="0000"
                                                       id="creditCard3"
                                                       name="creditCard3"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard2').focus();">
                                                <input style="direction: rtl;"
                                                       class="need form-control g-brd-red form-control-md m-0 rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none creditCard"
                                                       type="text"
                                                       tabindex="32"
                                                       placeholder="0000"
                                                       id="creditCard2"
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
                                                       name="creditCard1"
                                                       value=""
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#shabaNo').focus();">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--شماره شبای کارت بانکی--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">شماره شبای کارت وارد شده</label>
                                    <div style="direction: ltr" class="input-group g-brd-primary--focus g-mb-10--lg col-12 col-lg-9">
                                        <div class="input-group-addon d-flex align-items-center g-brd-primary g-bg-white g-color-gray-light-v1 rounded-0">
                                            IR
                                        </div>
                                        <input class="need g-brd-red form-control form-control-md rounded-0 text-left g-font-size-16" type="text"
                                               type="text"
                                               tabindex="35"
                                               placeholder="معمولا 24 رقم"
                                               id="shabaNo"
                                               name="shabaNo"
                                               value=""
                                               onblur="if($(this).val() !== '') {$(this).removeClass('g-brd-red'); $(this).addClass('g-brd-primary');} else {$(this).removeClass('g-brd-primary'); $(this).addClass('g-brd-red');}">
                                    </div>
                                    <label class="col-sm-3 col-form-label align-self-center text-right"></label>
                                    <div style="direction: rtl" class="col-12 col-lg-9 text-right">
                                        <small class="text-muted g-font-size-12">شماره شبا و کارت بایستی متعلق به یک حساب و به نام شخص فروشنده باشد.</small>
                                    </div>
                                </div>

                                <!-- Danger Alert -->
                                <div style="direction: rtl"
                                     class="alert alert-danger alert-dismissible fade show text-right g-pa-20--lg g-px-10 g-py-10"
                                     role="alert">
                                    <h4 class="h5"><i class="fa fa-minus-circle"></i> موافقت با قوانین</h4>
                                    <p class="g-mb-10">فروشنده عزیز برای ثبت نام در سامانه فروش تانا استایل لازم و
                                        ضروری است که موافقت خود را با قوانین تانا استایل اعلام کنید. برای اینکار
                                        ابتدا قوانین را مطالعه فرمایید و در صورت موافقت با قوانین کلید موافقم را
                                        فشار دهید. کلید موافقم به منزله امضاء الکترونیکی شما خواهد بود.
                                        <a style="font-weight: bold" class="g-color-black g-color-primary--hover"
                                           data-toggle="modal"
                                           data-target="#modalRegulation"
                                           onclick="$('.agreeDate').text(nowDate())"
                                           href="#">
                                            مطالعه قوانین
                                        </a>
                                    </p>
                                    <div class="text-lg-left text-center">
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
                                            <input style="display: none" id="signature" name="signature" type="text" value="">
                                        </div>
                                    </div>
                                </div>

                                <!-- مودال قوانین-->
                                <div class="modal fade text-center" id="modalRegulation" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header sticky-top g-bg-gray-light-v5">
                                                <h4>قوانین و شرایط فروشندگان</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    ×
                                                </button>
                                            </div>
                                            <!-- شرایط استفاده -->
                                            <div style="background-color: white; direction: rtl" class="tab-pane fade show active text-justify g-pa-30" id="nav-1-2-primary-ver--1" role="tabpanel">
                                                <h4 class="text-center text-lg-right g-my-20 g-mt-0--lg">قوانین و مقررات فروش در سایت تانا استایل</h4>
                                                <p>مشتری مداری در راس ارزش‌های سازمانی‏ تانا استایل قرار دارد و از آنجا که خریداران نه تنها مشتری تانا استایل بلکه مشتری تمام فروشندگان هستند، جلب رضایت آنها باید اولین و بالاترین اولویت همه‌ی ما باشد.</p>
                                                <p>در راستای سیاست‌های مشتری محور تانا استایل و به‌منظور سازگاری با شرایط عمومی جامعه، قوانینی برای فروش در سایت تانا استایل وجود دارد که عمل به این قوانین منجر به افزایش رضایت مشتریان، جلب اعتماد آن‌ها و از همه مهم‌تر ساخت و ایجاد تجربه‌ای عالی در خرید شما می‌شود. همچنین عمل به این قوانین باعث جلوگیری در سو استفاده از سایت تانا استایل توسط معدود فروشندگان متخلف خواهد شد.</p>
                                                <p>عملکرد فروشندگان بر اساس چندین معیار سنجیده خواهد شد و فروشندگانی که از عملکرد و استاندارد باکیفیت مورد نظر برخوردار نباشند با آن‌ها قطع همکاری خواهد شد.</p>
                                                <p>به فروشندگانی که با رعایت قوانین و استانداردهای تانا استایل از عملکردی با کیفیت بالا برخوردار باشند، نشانی تعلق خواهد گرفت که خریداران با مشاهده‌ی آن می‌توانند با اطمینان کامل از فروشنده خرید کنند.</p>
                                                <h5 class="text-right">الزامات قرارداد</h5>
                                                <h6 class="g-color-deeporange g-my-0 text-lg-right"> فروشنده عزیز،</h6>
                                                <p>در راستای اجرای بهینه قرارداد فی مابین و تسهیل ارائه خدمات بهتر به مشتریان، قرارداد همکاری با تانا استایل به صورت الکترونیک در اختیار شما قرار گرفته و در صورت مطالعه و تایید شما، از لحاظ قانونی الزام آور می باشد.</p>
                                                <p>تانا استایل حق تغییر مفاد قرارداد را در هر زمانی داشته و این تغییرات و همچنین اطلاعیه ها و ابلاغیه ها توسط تانا استایل در پنل فروشندگان اعلام می شود که به منزله ی ابلاغ به فروشنده می باشد. فروشندگان بایستی اطلاعیه ها را مطالعه نموده و طبق آن عمل نمایند. تغییرات به طور خودکار روی پنل اختصاصی فروشنده قرار گرفته و به منزله ی اصلاحیه و الحاقیه قرارداد محسوب شده و فروشنده ملزم به رعایت مقررات به روز شده می باشد و نیاز به هیچگونه تشریفات دیگری جهت امضا و ابلاغ نمی باشد.</p>
                                                <p>لطفا توجه فرمایید که پذیرش قرارداد همکاری به منزله تمایل شما به همکاری با تانا استایل تلقی شده و تنها با پذیرش قرارداد امکان استفاده از پنل فروشندگان برای شما میسر می باشد.</p>
                                                <h5>مقدمه</h5>
                                                <p>شرکت تابش پس زمینه مکریان در راستای رسالت خود در جهت حمایت از بنگاههای اقتصادی کوچک، توسعه کارآفرینی و بهبود فضای کسب و کار مجازی، در تاریخ <span class="g-color-darkblue agreeDate"></span> مطابق مواد 10 و 219  قانون مدنی، بر اساس تعامل مشترک و حسن نیت و مفاد ذیل اقدام به انعقاد قرارداد نموده است.</p>
                                                <h5 class="text-right">ماده 1. طرفین قرارداد</h5>
                                                <p class="g-mb-0">طرف اول:</p>
                                                <p>شرکت تابش پس زمینه مکریان (مسئولیت محدود) به شماره ثبت 2918 و شناسه ملی 14010277073 و نشانی اینترنتی www.tanastyle.ir ، با نمایندگی جناب آقای یونس اندیمه (به موجب صورتجلسه هیات مدیره شرکت تابش پس زمینه مکریان و اعطای حق امضای قراردادها به مدیر عامل هیئت مدیره) که از این پس در این قرارداد به اختصار «تانا استایل» نامیده می‏شود.</p>
                                                <p class="g-mb-0">طرف دوم:</p>
                                                <p class="g-mb-0">آقای/ خانم: <span class="g-color-darkblue">نام درج شده در فرم ثبت نام</span></p>
                                                <p class="g-mb-0">کد ملی: <span class="g-color-darkblue">کد ملی درج شده در فرم ثبت نام</span></p>
                                                <p class="g-mb-0">به نشانی: <span class="g-color-darkblue">مکان درج شده در فرم ثبت نام</span></p>
                                                <p class="g-mb-0">کدپستی: <span class="g-color-darkblue">کد پستی درج شده در فرم ثبت نام</span></p>
                                                <p class="g-mb-0">شماره تماس: <span class="g-color-darkblue">شماره تماس درج شده در فرم ثبت نام</span></p>
                                                <p class="g-mb-0 text-right">نشانی الکترونیکی: <span class="g-color-darkblue">نشانی الکترونیکی درج شده در فرم ثبت نام</span></p>
                                                <p>که از این پس در این قرارداد <span class="g-color-deeporange">«فروشنده»</span> نامیده می‏شود.</p>
                                                <p>اقامتگاه قانونی و قراردادی فروشنده این قرارداد همان است که در مقدمه این قرارداد ذکر شده است و درصورتی که فروشنده نشانی خود به شرح فوق را تغییر دهد، باید حداقل 10 روز پیش از تغییر مراتب را کتباً به  طرف دیگر اطلاع دهد و تا آن زمان نشانی سابق واجد اعتبار است. اقامتگاه قانونی و قراردادی شرکت تابش پس زمینه مکریان  همان است که در روزنامه رسمی آخرین تغییرات آن شرکت درج گردیده است. طرف مقابل موظف می باشد به هنگام ارسال هرگونه مکاتبه و یا مراوده ای، آخرین تغییرات روزنامه رسمی تابش پس زمینه مکریان را ملاحظه نماید و آن آدرس را به عنوان اقامتگاه قانونی شرکت تابش پس زمینه مکریان لحاظ نماید.</p>
                                                <h5 class="text-right">ماده 2. تعاریف</h5>
                                                <p><span class="g-font-weight-600">2-1) کالای معیوب:</span> عبارت است از هر گونه کالا یا هر بخش یا جزیی از آن که دارای ایراد، نقص، صدمه باشد.</p>
                                                <p class="g-mb-0"><span class="g-font-weight-600">2-2) کالای تقلبی یا غیراصل:</span> کالاهای ذیل، کالای تقلبی یا غیراصل محسوب می شوند.</p>
                                                <p>کالایی که با برند یا مدل اصلی آن کالا از نظر نام متشابه اما از نظر اصالت متفاوت است و یا هرگونه کالایی که از نظر جعبه، بسته بندی، جنس، کیفیت و غیره با کالای اصلی که توسط مراکز مورد تایید که کالاهای اصل را به  فروش می رسانند (مانند سایت اصلی برند یا شرکت های وارد کننده ی قانونی) مغایرت داشته باشد و همچنین در سایت تانا استایل در عنوان یا تصاویر کالای نمایش داده شده، برند اصلی کالا ذکر شده ولی کالای فروخته شده با نمونه ی اصلی کالا مغایرت داشته باشد؛</p>
                                                <p>کالاهایی که در آنها شماره سریال، مدل، برچسب یا سایر نشان‏های شناسایی و یا مشخصات کالا، قطعات و اجزای آنها و یا بسته ­بندی یا هرگونه نوشته‏ای در روی آنها بطور غیرمجاز از جانب تولیدکننده، توزیع­ کننده یا فروشنده کالا و یا هر شخص دیگر، محو، تغییر، جایگزین و یا به هر شکلی دستکاری شده باشند؛</p>
                                                <p><span class="g-font-weight-600">2-3) بازار آنلاین و بازار آفلاین:</span> بازار آنلاین بازاری است که در آن کالا در بستر اینترنت و به صورت برخط (آنلاین)، عرضه می شود و به فروش می­رسد. بازار آفلاین بازاری است که در آن، کالا مستقل از اینترنت و به  صورت سنتی در فروشگاه ها و مراکز توزیع عرضه می شود و به فروش می­رسد.</p>
                                                <p><span class="g-font-weight-600">2-4) پنل فروشنده (Seller Panel):</span> فضای مجازی با درگاه اختصاصی هر فروشنده است که از سوی تانا استایل به فروشنده برای عرضه و فروش کالا تخصیص داده می شود.</p>
                                                <p><span class="g-font-weight-600">2-5) درگاه اینترنتی:</span> وب سایت تانا استایل به آدرس www.tanastyle.ir  می باشد.</p>
                                                <p><span class="g-font-weight-600">2-6) تانا استایل:</span> شرکت تابش پس زمینه مکریان (مسئولیت محدود) به شماره ثبت 2918 و شناسه ملی 14010277073 و نشانی اینترنتی www.tanastyle.ir.
                                                </p>
                                                <p><span class="g-font-weight-600">2-7) فروشنده:</span> هر شخصی است که با تایید این قرارداد به شرح پیوست نسبت به فروش محصولات و کالاهای خود از طریق درگاه اینترنتی اقدام می نمایید.
                                                </p>
                                                <p><span class="g-font-weight-600">2-8) قرارداد: </span>قرارداد همکاری منعقده بین تانا استایل و فروشنده، بر اساس شرایط این قرارداد حاضر و به شرح پیوست است.
                                                </p>
                                                <h5 class="text-right">ماده 3. موضوع قرارداد</h5>
                                                <p>عبارت است از واسطه گری در فروش محصولات و کالاهای فروشنده به خریداران از طریق در اختیار قرار دادن درگاه اینترنتی.
                                                </p>
                                                <h5 class="text-right">ماده 4. مدت قرارداد</h5>
                                                <p>از تاریخ <span class="g-color-darkblue agreeDate"></span> تا <span class="g-color-darkblue" id="nextYear"></span> (به مدت یک سال) می باشد.</p>
                                                <p><span class="g-font-weight-600">تبصره 1: </span>این قرارداد در پایان مدت برای مدت مشابه بصورت خود به خود به مدت یک سال تمدید خواهد شد مگر اینکه یکی از طرفین حداقل یک هفته قبل از انقضاء مدت عدم تمایل خود را نسبت به تمدید به طرف دیگر اعلام نماید.</p>
                                                <h5 class="text-right">ماده 5. کمیسیون و هزینه های فروش</h5>
                                                <p><span class="g-font-weight-600">5-1) کمیسیون تانا استایل: </span>درصدی از بهای فروش کالا است که بابت عرضه کالا در درگاه اینترنتی تانا استایل و به شرح مندرج در پنل فروشنده و در هنگام قیمت گذاری محصول در صفحه افزودن محصول که برای فروشنده قابل رویت است به تانا استایل تعلق می گیرد. نظر به اینکه درصد مذکور در هنگام عقد این قرار داد فعلا و تا اطلاع ثانوی 10% می باشد و همچنین در هر بار پیش از افزودن کالا در پنل برای فروشنده قابل رویت است، فروشنده با ثبت و افزودن کالا در پنل، درصد مذکور را نیز به عنوان حق الزحمه و کمسیون تانا استایل تائید می کند و می پذیرد. تانا استایل می تواند نسبت به وصول کمیسیون خود از محل مطالبات فروشنده اقدام نماید.</p>
                                                <p><span class="g-font-weight-600">تبصره 2: </span>کمسیون و ارزش افزوده، مبالغی هستند که پس از قیمت گذاری محصول و اعمال تخفیف توسط فروشنده، به قیمت نهایی محصول افزوده خواهند شد که قبل از افزودن محصول و در هنگام قیمت گذاری قابل رویت هستند و فروشنده تعهد می نماید هیچگونه دخل و تصرفی بر این مبالغ افزوده شده نداشته و تنها قیمت محصول با تخفیف داده شده به حساب وی واریز خواهد شد.</p>
                                                <p><span class="g-font-weight-600">تبصره 3: </span>منظور از ارزش افزوده مالیاتی است که از سوی سازمان مالیاتی کشور برای هر فاکتور فروش در نظر گرفته شده است و برابر 9 درصد می باشد.</p>
                                                <p><span class="g-font-weight-600">تبصره 4: </span>امکان تغییر کمیسیون، هزینه ها و جبران خسارات در هر زمان توسط تانا استایل در پنل فروشنده وجود دارد و فروشنده قادر به مشاهده سوابق تغییرات آن خواهد بود. تغییرات در کمیسیون، هزینه ها و جبران خسارات 3 روز قبل از اعمال از طریق پنل فروشنده یا ایمیل یا پیامک تلفنی به اطلاع فروشنده خواهد رسید و ادامه روند فروش توسط فروشنده پس از اعمال تغییرات به منزله پذیرش شرایط جدید است و درحکم اصلاحیه این قرارداد است که خود به خود با ادامه روند فروش مورد توافق طرفین قرار گرفته است و نیاز به تشریفات امضا و ابلاغ جداگانه ای برای لازم الاجرا بودن ندارد.</p>
                                                <p><span class="g-font-weight-600">تبصره 5: </span>فروشنده قبول دارد جهت آگاهی از هرگونه تغییرات، هر روز پنل فروشنده خود را مشاهده کند و تانا استایل مسئولیتی نسبت به ادعای عدم آگاهی فروشنده از تغییرات نداشته و فروشنده می تواند در طی 3 روز کاری پس از اعلام تغییرات جدید نظر خود را نسبت به عدم ادامه روند همکاری اعلام کند. هرگونه اصلاحیه یا الحاقیه یا تغییر از جمله تغییرات در هزینه ها و جبران خسارات، در پنل فروشنده قرار خواهد گرفت و اطلاعیه از طریق پنل یا پست الکترونیک فروشنده یا پیامک تلفنی به نشانی مندرج در پنل ارسال خواهد شد. تغییرات فوق ظرف روز چهارم از تاریخ ارسال اطلاعیه لازم الاجرا خواهد بود مگر اینکه فروشنده ظرف مهلت مذکور عدم موافقت خود را اعلام نموده باشد، که در اینصورت  قرارداد فسخ خواهد شد.</p>
                                                <h5 class="text-right">ماده 6. نحوه اجرای قرارداد</h5>
                                                <p><span class="g-font-weight-600">6-1) تمدید قرارداد:</span> قراردادها متناسب با مدت مندرج در آن به صورت خودکار تمدید می شود. در صورت عدم تمایل هریک از طرفین مبنی بر عدم تمایل همکاری یا تمدید خودکار قرارداد، مراتب باید یک هفته قبل از انقضای قرارداد یا عدم تمایل، از طریق منوی ارتباط با مرکز به طرف دیگر اعلام گردد.</p>
                                                <p><span class="g-font-weight-600">6-2) پیگیری سفارشات مشتری: </span>سفارشات خرید مشتری، با توجه به موجودی اختصاص داده شده توسط فروشنده در پنل خود، برای وی قابل  رؤیت است و فروشنده موظف است سفارشات ثبت شده را با توجه به ضوابط و زمان تعیین شده در پنل خود، به صورت محموله آماده، در لفاف مناسبی بسته بندی کرده و در صورتی که فروشنده در داخل شهر مهاباد باشد فعلا تا اطلاع ثانوی کالاهای فروش رفته وی از طریق پیک شرکت و بدون هیچ هزینه ای تحویل گرفته خواهد شد و در غیر اینصورت به انبار تانا استایل یا نشانی مشتری در صورت تأیید تانا استایل، ارسال نماید. نشانی انبار تانا استایل به فروشنده اعلام خواهد شد و در صورتیکه نشانی اعلام شده تغییر یابد تانا استایل به فروشنده اعلام خواهد کرد و فروشنده مکلف به تبعیت از تغییرات بعدی است.</p>
                                                <p><span class="g-font-weight-600">6-3) نگهداری کالای مشتریان: </span>نگهداری کالای مشتریان در انبار تانا استایل به صورت امانی بوده و غیر از تعدی یا تفریط، مسئولیتی متوجه تانا استایل نمی باشد.</p>
                                                <p><span class="g-font-weight-600">6-4) انحصار فروش: </span>این قرارداد حق انحصاری جهت فروش برای فروشندگان ایجاد نمی نماید و هیچ گونه اعتراضی نسبت به فروش کالا و نیز بهای کالاهای در حال فروش توسط فروشندگان دیگر، قابل استماع نمی باشد.</p>
                                                <p><span class="g-font-weight-600">6-5) وجه ناشی از فروش کالا: </span>وجه ناشی از فروش کالا توسط خریدار به حساب تانا استایل واریز می­شود و مسئولیت صدور فاکتور فروش و سند برگشت از فروش برای مشتری بر عهده تانا استایل است.</p>
                                                <p><span class="g-font-weight-600">6-6) وکالت صدور فاکتور فروش: </span>با تایید این قرارداد فروشنده به شرکت تابش پس زمینه مکریان (تانا استایل) مخیرا وکالت می دهد که جهت رضایتمندی خریداران، نیابتا از طرف فروشنده اقدام به صدور فاکتور در خصوص اقلامی که توسط فروشنده در فضای مجازی مذکور به فروش می رسد نماید. لازم به ذکر است که فروشنده کلیه ی مسئولیت های ناشی از صدور فاکتور مذکور و فروش کالا بر روی وبسایت تابش پس زمینه مکریان (تانا استایل) را بر عهده داشته و در صورت لزوم، متعهد به حضور و پاسخگویی در مراجع اداری و قضایی بوده و همچنین ضامن جبران خسارات وارده به اشخاص ثالث و تانا استایل می باشد و تانا استایل در خصوص موارد فوق فاقد هرگونه مسئولیتی می باشد.</p>
                                                <p><span class="g-font-weight-600">6-7) قیمت کالاها: </span>قیمت گذاری در پنل فروشنده، توسط فروشنده و به مسئولیت وی تعیین می شود. لذا مسئولیت پاسخگویی به مراجع رسمی و اشخاص ثالث از جمله مشتری در خصوص قیمت تعیین شده، بر عهده فروشنده است. به موجب این قرارداد، فروشنده به عنوان شرط ضمن عقد اعلام می نمایند که نسبت به فروش کالاهای خود در درگاه اینترنتی تانا استایل کلیه خیارات از جمله غبن ولو فاحش یا افحش را از خود سلب و ساقط نمودند.</p>
                                                <p><span class="g-font-weight-600">6-8) اشتباه در قیمت گذاری: </span>در صورت اشتباه فروشنده و درج بهایی پایین­­تر از قیمت واقعی، وی متعهد است کالا را با همان قیمت درج شده تحویل مشتری نماید و در صورت استنکاف، مشمول وجه التزام و ضمانت اجرای مذکور در ماده 9 در خصوص عرضه کالای ناموجود می­شود. درهر حال پاسخگویی به خریدار در مراجع رسمی به عهده فروشنده است.</p>
                                                <p><span class="g-font-weight-600">6-9) نقض حقوق دیگران: </span>فروشنده اظهار می ­نماید که با عرضه کالا در پنل اختصاصی خود در درگاه اینترنتی تانا استایل، حقوق مالکیت فکری یا سایر حقوق و امتیازات مکتسبه متعلق به هیچ شخص حقیقی و حقوقی دیگری را نقض نکرده است و در صورت کشف خلاف این موضوع، کلیه مسئولیت های حقوقی و کیفری بر عهده وی خواهد بود و باید کلیه خسارات وارده به تانا استایل را در این خصوص جبران نماید.</p>
                                                <p><span class="g-font-weight-600">6-11) نام تجاری فروشنده: </span>نام تجاری فروشنده جهت درج در سایت، نام تجاری اعلامی از طرف فروشنده در پنل او می­باشد و فروشنده در این راستا اظهار می نماید مالکیت مادی و معنوی نام تجاری مذکور متعلق به شخص حقیقی و حقوقی دیگری نیست و در صورت کشف خلاف این موضوع، کلیه مسئولیت های حقوقی و کیفری بر عهده فروشنده خواهد بود. در صورتی که فروشنده ظرف مدت 3 روز از اعلام تانا استایل مبنی بر مراجعه جهت پاسخگویی به مراجع مربوطه مراجعه ننماید، موظف به پرداخت وجه التزام روزانه (طبق ماده 9) به تانا استایل می باشد.</p>
                                                <h5 class="text-right">ماده 7. تعهدات و حقوق فروشنده</h5>
                                                <p><span class="g-font-weight-600">7-1) مدارک فروشنده: </span>فروشنده متعهد است مدارک درخواست شده در خصوص احراز هویت و مدارک موثق و معتبر به شرح پنل را بارگذاری و در صورت لزوم آن­ها را به روزرسانی نماید. عدم بارگذاری یا به روزرسانی اسناد به طور صحیح، علاوه بر ایجاد حق فسخ برای تانا استایل (پس از اخطار رفع نقص) این حق را برای تانا استایل ایجاد می­کند که کلیه پرداخت ها را تا زمان رفع نواقص مدارک معلق و دسترسی فروشنده را به پنل فروشنده قطع نماید.</p>
                                                <p><span class="g-font-weight-600">7-2) نماینده فروشنده: </span>فروشنده می­تواند همزمان با انعقاد این قرارداد، شخصی را به عنوان نماینده خود جهت ارتباط و هماهنگی با تانا استایل معرفی نماید.</p>
                                                <p><span class="g-font-weight-600">7-3) داده های واقعی: </span>فروشنده موظف است مشخصات محصولات و توضیحات لازم جهت معرفی کالا، سایر موارد لازم را در درگاه اینترنتی براساس داده های خواسته شده در هنگام افزودن محصول به صورت کاملا واقعی و دور از اغراق و مبالغه ارائه نماید. فروشنده مسئولیت صحت اطلاعات و تضمین اصالت و کیفیت محصول را شخصاً بر عهده دارد و بدین وسلیه متعهد گردید در قبال تخلفات خود علاوه بر حضور در مراجع رسمی و پاسخگویی، تانا استایل را در قبال مسئولیت و هزینه هرگونه دعوای طرح شده توسط ثالث مصون نماید.</p>
                                                <p><span class="g-font-weight-600">7-4) تحویل محصول: </span>فروشنده متعهد می­شود که کالاهای مورد درخواست مشتری را بدون وقفه و در موعد مقرر ارسال نماید، و به هیچ دلیلی اعم از نوسانات نرخ ارز، عدم موجودی، اشتباه در مشخصات و غیره از تحویل آن استنکاف نورزد. در غیر این صورت تانا استایل ­می تواند بنا به تشخیص خود، خسارات ناشی از تأخیر در اجرای تعهدات را (براساس ماده 9) از فروشنده مطالبه و یا از محل مطالبات وی کسر و برداشت نماید. علاوه بر این تانا استایل می تواند اقدام به قطع همکاری کند. قطع همکاری نافی حقوق قراردادی تانا استایل درخصوص محاسبه جبران خسارات از محل مطالبات و تضامین فروشنده نمی­باشد.</p>
                                                <p><span class="g-font-weight-600">7-5) کالای معیوب: </span>فروشنده در صورت اعلام مشتری مبنی بر عیب، کاستی یا نقص کالا، متعهد به اجرای صحیح تعهدات و پاسخگویی به مشتری و جلب رضایت وی بر اساس نظر تانا استایل است و در صورت درخواست مشتری نسبت به جایگزین کردن یا رفع نقص آن، ظرف مدت 2 روز کاری اقدام نماید. چنانچه فروشنده ظرف مدت مذکور اقدام لازم را معمول نداشته یا مشتری با پس دادن کالا تقاضای استرداد وجه را داشته باشد، تانا استایل نسبت به عودت وجه به مشتری اقدام می نماید و فروشنده بدینوسیله حق هرگونه اعتراض نسبت به استرداد وجه به مشتری و عدم استرداد کالا از سوی خریدار را از خود سلب و ساقط می­نماید. فروشنده می­پذیرد هزینه ناشی از استرداد کالاهای معیوب یا ناقص توسط مشتری، از مطالبات فروشنده کسر و توسط تانا استایل برداشت خواهد شد.</p>
                                                <p><span class="g-font-weight-600">7-6) فروشنده مالک قطعی کالاها: </span>فروشنده اعلام و اقرار می نماید مالک قانونی کالاهای معرفی شده بوده و مالک قطعی آنها است و در خصوص شکایات اشخاص ثالث نسبت به کالاهای اضافه شده در وب سایت را شخصا به عهده گرفته و کلیه مسئولیت های قضایی و قانونی و پاسخگویی به مشتری و سایر اشخاص و مراجع ذی صلاح را بر عهده می گیرد. فروشنده ضمن تضمین موارد فوق، بدینوسیله می­پذیرد که در صورت تخلف، تانا استایل می­تواند ضمن قطع فوری دسترسی فروشنده به پنل، نسبت به فسخ  قرارداد اقدام نماید و فروشنده حق هرگونه اعتراضی را از خود سلب و ساقط می نماید.</p>
                                                <p><span class="g-font-weight-600">7-7) ادعای کالای اصل: </span>فروشنده متعهد می شود که هیچ گونه کالای تقلبی یا غیراصل را به عنوان کالای اصل در سایت درج نکرده و تحویل مشتری ندهد. در غیر این صورت فروشنده موظف است مطابق ماده 9، هرگونه وجه التزام عدم انجام تعهد را به تانا استایل پرداخت نماید و در این صورت، تانا استایل می­تواند ضمن قطع فوری دسترسی فروشنده به پنل، نسبت به فسخ قرارداد اقدام نماید و فروشنده بدینوسیله حق هرگونه اعتراضی را از خود سلب و ساقط می نماید.</p>
                                                <p><span class="g-font-weight-600">7-8) سلامت کالا: </span>فروشنده تضمین می‏کند که اولاً تنوع، تعداد، قیمت، کیفیت، مشخصات و عملکرد معمول کالاها به ترتیب اعلام شده در پنل فروشنده است و کالاها با اطلاعات انتشار یافته در مورد آن ها کاملاً تطبیق دارد، ثانیاً کلیه کالاها به صورت سالم و بدن عیب وایراد تحویل داده خواهد شد، ثالثاً، کالاهای فروخته شده به هیچ عنوان کالاهای دست دوم (ریپک یا غیرآکبند)، مرجوعی (ریفرش) و یا مجددا فروخته شده نمی باشد. فروشنده مسئول جبران خسارات وارده و دعوای طرح شده از سوی مشتریان در خصوص موارد مذکور در این بند خواهد بود و مسئولیتی در این خصوص متوجه تانا استایل نخواهد بود.</p>
                                                <p><span class="g-font-weight-600">7-9) موجودی کالا: </span>فروشنده متعهد است صرفاً کالاهای موجود در انبار را در پنل فروشنده اعلام نماید. معرفی کالای غیر موجود در پنل فروشنده به عنوان کالای موجود ممنوع بوده و فروشنده مسئول جبران خسارات وارده به تانا استایل و مشتری و پاسخگویی حقوقی و کیفری در مقابل مراجع قضایی و قانونی خواهد بود. در این حالت تانا استایل بنا به تشخیص خود علاوه بر اخذ وجه التزام قراردادی مندرج در ماده 9، رسماً نسبت به قطع پنل فروشنده به فوریت اقدام خواهد نمود.</p>
                                                <p><span class="g-font-weight-600">7-10) عدم ممنوعیت قانونی فروشنده: </span>فروشنده اعلام و اظهار می دارد که در زمان انعقاد این قرارداد، مشمول هیچ ممنوعیت قانونی برای انعقاد  قرارداد نمی­باشد و چنانچه در هر زمانی به هر دلیلی مشمول ممنوعیت قرار گرفت، متعهد به اعلام ممنوعیت قانونی خود جهت اخذ تصمیم مقتضی به تانا استایل می باشد. در صورت عدم اعلام ممنوعیت، فروشنده مسئول عواقب قانونی آن و جبران خسارات وارده به اشخاص ثالث و تانا استایل خواهد بود و تانا استایل هیچ مسئولیتی نداشته و نخواهد داشت.</p>
                                                <p><span class="g-font-weight-600">7-11) حفاظت از حریم شخصی: </span>فروشنده متعهد به حفظ محرمانگی نام کاربری و رمز عبور پنل فروشنده بوده و برای جلوگیری از هرگونه سوء استفاده احتمالی، کلیه اقدامات لازم از جمله تغییر رمز عبور در دوره­های متعارف و عدم افشای آن به اشخاص ثالث را مبذول خواهد داشت. بدیهی است مسئولیت هرگونه سهل انگاری در حفظ نام کاربری و رمز عبور، مسئولیت­های ناشی از استفاده از رمز عبور و به طور کل، کلیه ی فعالیت­هایی که تحت حساب کاربری و یا رمز عبور انجام می­پذیرد بر عهده فروشنده می­باشد. در صورت بروز هر گونه مشکل یا تخلف یا سوء استفاده اشخاص ثالث، فروشنده مسئول و پاسخگوی نهادها و مراجع ذیربط و جبران هرگونه خسارت احتمالی وارده است و باید در اسرع وقت نسبت به تغییر رمز عبور اقدام نماید. فروشنده موظف است هرگونه مشکل احتمالی را سریعاً به تانا استایل اعلام نماید و جهت حل و فصل آن همکاری لازم را داشته باشد. در غیر اینصورت مسئولیت هرگونه سوء استفاده از پنل یا خسارات ناشی از آن بر عهده فروشنده است.</p>
                                                <p><span class="g-font-weight-600">7-12) رعایت اخلاق: </span>فروشنده موظف است در درج محتوای کالا در پنل خود، کلیه ی مقررات و شئون اخلاقی، اسلامی و قانونی را رعایت نموده و بدینوسیله مسئولیت هرگونه پاسخگویی در این خصوص به مراجع ذی صلاح یا اشخاص ثالث را می­پذیرد.</p>
                                                <p><span class="g-font-weight-600">7-12) برچسب کد فروشندگی: </span>فروشنده موظف است کالاهای خود را با کد فروشندگی خود برچسب گذاری نماید و سپس تحویل تانا استایل نماید.</p>
                                                <p><span class="g-font-weight-600">7-13) کالای برگشتی: </span>فروشنده نسبت به کالاهای عودت شده از سوی مشتریان، کالاهایی که شامل قوانین برگشت محصول هستند و در ذیل ذکر شده اند موظف به استرداد آن می باشد و اقدامات لازم نسبت به تحویل کالا از انبار تانا استایل را ظرف مدت 7 روز پس از اعلام تانا استایل به ایشان از طریق پنل یا پیامک (به شماره تماس اعلام شده از سوی فروشنده در این قرارداد) یا ایمیل (اعلام شده از سوی فروشنده در این قرارداد)، انجام دهد. تا زمانی که فروشنده نسبت به استرداد کالاهای فوق الذکر اقدام نماید، تانا استایل پرداخت کلیه صورتحساب های فروشنده را متوقف خواهد نمود. در صورت پیگیری فروشنده ظرف مهلت مقرر جهت استرداد کالاهای مذکور، ابتدا هزینه های خسارات و وجوه التزام توسط تانا استایل از مطالبات فروشنده کسر و برداشت می شود و سپس کالا به ایشان عودت می گردد. اگر فروشنده در داخل شهر مهاباد باشد، فعلا تا اطلاع ثانوی تنها هزینه ارسال مشتری به تانا استایل از فروشنده کسر و کالا توسط تانا استایل به ایشان ارسال می شود در غیر اینصورت هزینه پستی (از مشتری به تانا استایل) و (از تانا استایل به فروشنده) از محل مطالبات فروشنده کسر خواهد شد و سپس محصول برای وی برگشت داده می شود.</p>
                                                <p><span class="g-font-weight-600">7-13) عدم پیگیری کالای برگشتی: </span>در صورتی که فروشنده ظرف مدت 7 روز از اخطار تانا استایل نسبت به استرداد کالا اقدام ننماید تانا استایل مسئولیتی جهت نگهداری این نوع کالاها نخواهد داشت و تانا استایل عدم پس گرفتن کالاهای برگشتی از سوی فروشنده و پس دادن وجه کالا به تانا استایل ظرف مدت یاد شده را به منزله اعراض فروشنده از مالکیت کالاهای فوق الذکر تلقی می نمایید. در این صورت فروشنده هیچگونه ادعایی نسبت به کالا یا ارزش کالا اعراض شده نخواهد داشت. ادعای فروشنده مبنی بر عدم اطلاع از اخطار مسموع نبوده و ملاک، ارسال اخطار از سوی تانا استایل به طرق یاد شده خواهد بود و همچنین تانا استایل مخیر است که جهت وصول مطالبات خود از فروشنده از طریق مراجع قانونی و قضایی اقدام نماید.</p>
                                                <p><span class="g-font-weight-600">7-14) تکرار نقض تعهدات: </span>درصورت تکرار نقض تعهد به مدت سه بار، تانا استایل می تواند ضمن قطع دسترسی فروشنده به پنل، بر حسب صلاحدید نسبت به فسخ قرارداد اقدام نماید. فسخ قرارداد مانع از مطالبه وجوه التزام و خسارات نخواهد شد.</p>
                                                <p><span class="g-font-weight-600">7-15) مسئولیت کار با پنل فروشنده: </span>فروشنده متعهد به فراگرفتن نحوه کارکرد پنل فروشنده از سوی مستندات موجود در پنل وی و همچنین آموزش و توجیه در خصوص نحوه استفاده از درگاه اینترنتی می باشد. متعاقباً فروشنده با استفاده از پنل اعلام و اقرار می نماید که آموزش های لازم را فراگرفته و مسئولیت پنل را شخصاً برعهده دارد و نمی تواند به ادعای ناآگاهی یا عدم اطلاع رسانی، ادعایی را علیه تانا استایل طرح نماید.</p>
                                                <h5 class="text-right">ماده 8. تعهدات و حقوق تانا استایل</h5>
                                                <p><span class="g-font-weight-600">8-1) مسئولیت عرضه کالا: </span>تانا استایل به عنوان واسطه فضای مجازی کسب و کار و خدمات دهنده در خصوص امور جانبی و امین در نگهداری وجوه پرداختی حاصل از فروش، همکاری لازم را با فروشنده در راستای عرضه کالاهای موضوع قرارداد در درگاه اینترنتی (معرفی، توصیف و عکس گذاری، ارسال آنها به مشتریان بالقوه و سایر خدمات به شرح مقرر در پنل فروشنده) با اخذ هزینه­های مربوط پزیرفته خواهد گرفت.</p>
                                                <p><span class="g-font-weight-600">8-2) مدیریت طراحی پنل: </span>طراحی درگاه اینترنتی، تعیین جایگاه کالا، نحوه معرفی، شیوه نمایش و تبلیغ کالا درصورت درخواست فروشنده در قبال دریافت هزینه های مربوطه بر عهده تانا استایل خواهد بود.</p>
                                                <p><span class="g-font-weight-600">8-3) آموزش استفاده از پنل فروشنده: </span>تانا استایل اقدامات و هماهنگی لازم را جهت آموزش و توجیه فروشنده یا نمایندگان ایشان در خصوص نحوه استفاده از درگاه اینترنتی انجام خواهد داد و فروشنده متعهد به فراگرفتن آموزشها است، در غیر این صورت تانا استایل می تواند با تشخیص انحصاری خود پنل فروشنده را به دلیل عدم فراگیری آموزش های لازم متوقف نماید و فروشنده حق هیچگونه اعتراضی در این خصوص نخواهد داشت. متعاقباً فروشنده با استفاده از پنل، اعلام و اقرار می­نماید که آموزش­های لازم را فراگرفته و مسئولیت پنل را برعهده دارد و نمی­تواند به ادعای ناآگاهی یا عدم اطلاع رسانی، ادعایی را علیه تانا استایل طرح نماید.</p>
                                                <p><span class="g-font-weight-600">8-4) پرداخت مطالبات فروشنده: </span>وجوه ناشی از فروش کالا پس از کسر کمیسیون، هزینه ها و مطالبات قراردادی و تأیید واحد مالی تانا استایل، ظرف 2 روز کاری به فروشنده پرداخت می شود.</p>
                                                <p><span class="g-font-weight-600">تبصره 6: </span>اگر روز پرداخت مصادف با پنجشنبه یا جمعه باشد پرداخت موکول به روز کاری بعدی خواهد شد.</p>
                                                <p><span class="g-font-weight-600">تبصره 7: </span>کمیسیون، هزینه ­ها و مطالبات قراردادی تانا استایل محاسبه و از فروشنده کسر خواهد شد.</p>
                                                <p><span class="g-font-weight-600">8-5) شیوه پرداخت مطالبات: </span>فروشنده موظف به معرفی شماره حساب با کد شبا منطبق با نام خود، به تانا استایل می باشد. وجوه فوق الذکر صرفا به شماره حسابی که کد شبای آن به نام فروشنده است واریز خواهد شد. در صورت عدم اعلام فروشنده و یا عدم تطابق نام فروشنده و صاحب کد شبا، تانا استایل مسئولیتی در تاخیر و یا عدم پرداخت وجوه ندارد.</p>
                                                <p><span class="g-font-weight-600">8-6) انتقال حقوق و تعهدات به اشخاص ثالث: </span>تانا استایل می تواند حقوق و تعهدات خود ناشی از این قرارداد را به اشخاص ثالث منتقل کند.</p>
                                                <p><span class="g-font-weight-600">8-7)به روز رسانی قرارداد: </span>تانا استایل حق تغییر «شرایط قرارداد» را در هر زمانی داشته و این تغییرات و همچنین اطلاعیه ها و ابلاغیه ها توسط تانا استایل در پنل اختصاصی فروشنده و همچنین از طریق پیامک (با استناد به شماره همراه درج شده در پنل وی) اعلام می شود که به منزله ی ابلاغ به «فروشنده» است و پس از گذشت سه روز و عدم اعلام تمایل به ادامه همکاری از سوی فروشنده به منزله قبول شرایط جدید می باشد. «فروشندگان» ملزم هستند تمامی اطلاعیه ها را مطالعه نموده و طبق آن عمل نمایند. تغییرات به طور خودکار روی پنل اختصاصی فروشنده قرار گرفته و به منزله ی اصلاحیه و الحاقیه این قرارداد  محسوب شده و نیاز به هیچگونه تشریفات دیگری جهت امضا و ابلاغ نمی باشد.</p>
                                                <h5 class="text-right">ماده 9. وجه التزام</h5>
                                                <p><span class="g-font-weight-600">کسر وجه التزام: </span>درصورتی که فروشنده هریک از تعهدات قراردادی خود را در موعد مقرر یا به طور صحیح انجام ندهد یا اقدامات وی به هر دلیل منجر به ورود خدشه به اعتبار یا شهرت تانا استایل گردد، تانا استایل حق دارد وجوه التزام به شرح ذیل را از فروشنده  مطالبه یا رسماً از مطالبات فروشنده کسر کند.</p>
                                                <p><span class="g-font-weight-600">الف) </span>وجه التزام فروش کالای غیر اصل</p>
                                                <p><span class="g-font-weight-600"> ب) </span>وجه التزام لغو سفارش مشتری توسط فروشنده به دلایلی از قبیل عدم موجودی کالا در انبار فروشنده، تاخیر در تامین و ارسال کالا از سمت فروشنده، اشتباه در قیمت گذاری و سایر دلایل به تشخیص تانا استایل</p>
                                                <p><span class="g-font-weight-600">پ) </span>وجه التزام تاخیر در ارسال کالا (از تاریخ مقرر در پنل برای تحویل به انبار)</p>
                                                <p><span class="g-font-weight-600">ت) </span>وجه التزام مغایرت کالا و محموله ارسالی با سفارش ثبت شده و محموله ثبت شده در پنل، در هنگام ورود به انبار</p>
                                                <p><span class="g-font-weight-600">ج) </span>وجه التزام مرجوعی کالا توسط مشتری به دلایلی از قبیل مغایرت محتوایی، معیوب بودن کالا، کالای تقلبی یا غیراصل و سایر دلایل به تشخیص تانا استایل</p>
                                                <p><span class="g-font-weight-600"> چ) </span>وجه التزام تاخیر در بازپس گیری و تعیین تکلیف کالا توسط فروشنده به دلایلی از قبیل معیوب بودن، ناقص بودن، مغاییرت مشخصات و به هر دلیل به تشخیص تانا استایل مشمول بازپس گیری از انبار شوند.</p>
                                                <p><span class="g-font-weight-600">تبصره 8: </span>وجوه التزام مذکور با الزام فروشنده به انجام تعهد اصلی قابل جمع بوده و بدل آن نمیباشد.</p>
                                                <h5 class="text-right">ماده 10. موارد فسخ قرارداد</h5>
                                                <p><span class="g-font-weight-600">10-1) اعلام ورشکستگی: </span>هر یک از طرفین می تواند در صورت انحلال یا ورشکستگی طرف مقابل قرارداد را فسخ و مراتب را اعلام نماید.</p>
                                                <p><span class="g-font-weight-600">10-2) فسخ یک طرفه: </span>تانا استایل می تواند در موارد زیر، بنا به تشخیص خود و بدون نیاز به مراجعه به مرجع حل و فصل اختلاف، ضمن قطع فوری دسترسی فروشنده به پنل، قرارداد را فورا فسخ نماید. فسخ قرارداد مانع از مطالبه خسارات و وجوه التزام از سوی تانا استایل نمی باشد.</p>
                                                <p><span class="g-font-weight-600">الف) </span>درصورت نقض تعهدات فروشنده طبق این قرارداد و عدم رفع آن ظرف مدت 10 روز از تاریخ ارسال اخطار کتبی الکترونیکی در پنل یا از طریق پیامک تلفنی.</p>
                                                <p><span class="g-font-weight-600">ب) </span>درصورتی که مشخص شود فروشنده در صدد تطمیع، اغوا یا ارائه هرگونه پیشنهاد نامشروع به هریک از کارکنان تانا استایل بر آمده است.</p>
                                                <p><span class="g-font-weight-600">پ) </span>علاوه بر موارد مذکور در فوق، تانا استایل می تواند در صورت عدم تمایل به ادامه با طرف مقابل، رسماً و بدون نیاز به مراجعه به مرجع حل اختلاف در طول مدت قرارداد، ضمن قطع فوری پنل، رابطه قراردادی خود با فروشنده را بدون هرگونه مسئولیت درخصوص پرداخت خسارات تحت هر عنوان، فسخ کند. در این موارد، فروشنده اعلام و اقرار نمود که تانا استایل حق دارد طبق صلاحدید خود عمل نموده و خساراتی تحت هر عنوان، قابل ادعا از سوی فروشنده نمی باشد.</p>
                                                <h5 class="text-right">ماده 11. قوه قاهره (فورس ماژور)</h5>
                                                <p>چنانچه به دلیل بروز حوادث غیر مترقبه از قبیل جنگ، شورش، سیل، زلزله، حریق و نظایر آن، ایفای تعهدات از ناحیه یکی از طرفین غیرممکن گردد، قرارداد به حالت تعلیق درآمده و اگر این وضعیت بیش از سه ماه ادامه یابد و طرفین در مورد آن توافقی ننمایند، هر طرف حق فسخ قرارداد را خواهد داشت.</p>
                                                <p><span class="g-font-weight-600">تبصره 9: </span>طرف مدعی قوه قاهره باید گواهی از مراجع ذیربط اخذ و به طرف مقابل ارائه نماید.</p>
                                                <h5 class="text-right">ماده 12. اسقاط حق</h5>
                                                <p>اسقاط هر یک از حقوق توسط تانا استایل تنها زمانی واجد اثر است که به شکل کتبی به فروشنده ابلاغ شود.</p>
                                                <h5 class="text-right">ماده 13. رازداری</h5>
                                                <p>هریک از طرفین باید اطلاعات مندرج در پنل، به ویژه اطلاعات مشتریان را محرمانه تلقی و کلیه اقدامات مقتضی برای تضمین حفظ محرمانگی آن به  وسیله کارکنان خود را نیز اتخاذ نمایند. این تعهد تا پنج سال از تاریخ خاتمه قرارداد معتبر است. بدیهی است ارائه اطلاعات به موجب حکم قانونی یا دستور مقامات، از شمول این ماده مستثنی است. تانا استایل حق دارد به صلاحدید خود خسارات ناشی از نقض این تعهد را محاسبه نموده و از مطالبات فروشنده کسر نماید.</p>
                                                <h5 class="text-right">ماده 14. واگذاری</h5>
                                                <p>فروشنده حق واگذاری جزئی و کلی حقوق و تعهدات خود را به  موجب این قرارداد به اشخاص ثالث بدون موافقت کتبی و قبلی طرف دیگر، تحت هیچ عنوانی اعم از نمایندگی، وکالت، صلح حقوق و سایر عناوین، نخواهد داشت.</p>
                                                <h5 class="text-right">ماده 15. قانون حاکم و نحوۀ حل اختلاف</h5>
                                                <p>قرارداد تابع قوانین جمهوری اسلامی ایران می باشد و با توجه به محل انعقاد قرارداد، کلیه اختلافات و دعاوی ناشی از آن و یا راجع به آن به مراجع صالح قضایی جمهوری اسلامی ایران در شهرستان مهاباد ارجاع خواهد شد.</p>
                                                <p class="g-font-weight-600"><i class="fa fa-circle g-ml-5"></i>این قرارداد در 15 ماده با اعلام موافقت فروشنده مورد تایید قرار می گیرد و فروشنده و تانا استایل با تایید این قرارداد متعهد بدان خواهند بود.</p>
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
    $(window).on('pageshow', function () {
        $('#load').hide();
    });
    $(document).ready(function () {
        let $modal = $('#modal'),
            image = document.getElementById('sample_image'),
            cropper, inputID, inputIdFinshed = [], counter = 0;
        $('input[id^="pic"]').on('change', function (event) {
            if ($('#nationalId').val().length === 10) {
                inputID = $(this).attr('id').replace(/[^0-9]/gi, '');
                $('#fileShow' + inputID).removeClass('g-color-red');
                let files = event.target.files,
                    done = function (url) {
                        image.src = url;
                        $modal.modal('show');
                    };

                if (files && files.length > 0) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            } else
                alert('ابتدا لطفا کد ملی را بصورت صحیح وارد کنید.');
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2,
                zoomable: true,
                background: true,
                minCropBoxWidth: 400,
                minCropBoxHeight: 400,
                dragCrop: true,
                dragMode: 'move',
                multiple: true,
                movable: true
                // preview: '.preview'
            });
        });

        $modal.on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $('#crop').on('click', function () {
            let canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });

            canvas.toBlob(function (blob) {
                let url = URL.createObjectURL(blob),
                    reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    $('#imageUrl' + inputID).val(reader.result);
                    $modal.modal('hide');
                    $("#userImageDiv" + inputID).clone().appendTo("#imageUploadForm");
                    $("#imgNumber").val(inputID);
                    $('#imageUploadForm').submit();
                    addPathCheckMark('pic' + inputID, 'fileShow' + inputID, 'Check' + inputID);
                };
            });
        });

        $('#imageUploadForm').on('submit', (function (e) {
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
            })
        }));
    });

    function imAgree(ele) {
        let today = new Date(),
            second = today.getSeconds(),
            minute = today.getMinutes(),
            hour = today.getHours(),
            day = today.getDate(),
            month = today.getMonth() + 1,
            year = today.getFullYear();
        today=year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
        console.log(today);
        ele.val(today);
    }

    function checkData(){
        if( $('#user-name').hasClass('g-brd-red') || $('#user-family').hasClass('g-brd-red') ||
            $('#email').hasClass('g-brd-red') || $('#nationalId').hasClass('g-brd-red') ||
            $('#birthday-day').hasClass('g-brd-red') || $('#birthday-mon').hasClass('g-brd-red') ||
            $('#birthday-year').hasClass('g-brd-red') || $('#male').hasClass('g-bg-gray-light-v5') ||
            $('#female').hasClass('g-bg-gray-light-v5') || $('#phoneNumber').hasClass('g-brd-red') ||
            $('#phonePreNumber').hasClass('g-brd-red') || $('#phoneNumber').hasClass('g-brd-red') ||
            $('#mobile').hasClass('g-brd-red') || $('#stateSelect').hasClass('g-brd-red') ||
            $('#citySelect').hasClass('g-brd-red') || $('#homeAddress').hasClass('g-brd-red') ||
            $('#homePostalCode').hasClass('g-brd-red') || $('#workAddress').hasClass('g-brd-red') ||
            $('#workPostalCode').hasClass('g-brd-red') || $('#shopNumber').hasClass('g-brd-red') ||
            $('#fileShow11').hasClass('g-brd-red') || $('#fileShow12').hasClass('g-brd-red') ||
            !$('#uploadingText11').hasClass('d-none') || !$('#uploadingText12').hasClass('d-none') ||
            $('.creditCard').hasClass('g-brd-red') || $('#shabaNo').hasClass('g-brd-red')) {
            return 'false';
        } else {
            return 'true';
        }

    }

    $('.creditCard').on('blur',function () {
        if($(this).val() === '' || $(this).val().length<4){
            $(this).removeClass('g-brd-primary');
            $(this).addClass('g-brd-red');
        } else {
            $(this).removeClass('g-brd-red');
            $(this).addClass('g-brd-primary');
        }
    })

    $('.need').on('input',function () {
        $('#agree').trigger('click');
    })

    function regulationCheck(btn){
        if(btn==='noAgree'){
            if (checkData()==='false') {
                alert('لطفا ابتدا تمامی داده های مورد نیاز را تکمیل بفرمایید.');
            } else {
                $('#'+btn).addClass('d-none'); $('#agree').removeClass('d-none'); imAgree($('#signature'));
            }
        } else {
            $('#'+btn).addClass('d-none'); $('#noAgree').removeClass('d-none'); $('#signature').val('');
        }
    }

    function saveUserData() {
        if (checkData()==='false' || $('#agree').hasClass('d-none')) {
            alert('لطفا فرم را بازبینی بفرمائید و خطاهای رخ داده را رفع و مجدداً تلاش کنید.');
        } else {
            $('#submitText').hide();
            $('#waitingSubmit').show();
            $('#save').prop('disabled', true);
            $('#registerForm').submit();
        }
    }

    function addPathCheckMark(picID, filePathID, checkMarkID) {
        let pic = $('#' + picID),
            ext = pic.val().split('.').pop().toLowerCase(),
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
            nextYear=year+1 + "/" + months[month - 1] + "/" + day;
        $('#nextYear').text(nextYear);
        return now;
    }
</script>
@yield('BaseJsFunction')
</html>
