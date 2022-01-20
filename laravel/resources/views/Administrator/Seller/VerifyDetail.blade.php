@extends('Layouts.IndexAdmin')
@section('Content')

    <div class="container g-mt-40">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <h5 class="card-header text-right">مشخصات و اطلاعات فروشنده جدید</h5>
                    <div class="card-body">
                        <form action="{{route('sellerSave')}}"
                              method="POST"
                              style="direction: rtl"
                              id="registerForm"
                              novalidate
                              enctype="multipart/form-data">
                            @csrf
                            <div class="container g-py-30--lg g-px-60--lg">
                                <input type="hidden" name="id" value="{{$data->ID}}">
                                {{--نام--}}
                                <div class="form-group row g-mb-15">
                                    <label
                                        class="col-sm-3 col-form-label align-self-center text-right">نام</label>
                                    <div class="col-sm-9 force-col-12">
                                        <input id="user-name"
                                               class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                               type="text"
                                               value="{{$data->Name}}"
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
                                            value="{{$data->Family}}"
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
                                               value="{{$data->Email}}"
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
                                            value="{{$data->NationalID}}"
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
                                                <option value="{{$data->BDay}}">{{$data->BDay}}</option>
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
                                                    value="{{$data->BMon}}">{{$data->BMon}}</option>
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
                                                    value="{{$data->BYear}}">{{$data->BYear}}</option>
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
                                                       {{($data->Gender==='0' ? 'checked':'')}}
                                                       value="0">
                                                <span
                                                    class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-brd-left-none g-brd-left-1--lg g-bg-primary--checked rounded-0 g-color-white--checked">زن</span>
                                            </label>
                                            <label class="u-check col-md-6 g-pa-0">
                                                <input class="hidden-xs-up g-pos-abs g-top-0 g-left-0" name="gender"
                                                       type="radio"
                                                       {{($data->Gender==='1' ? 'checked':'')}}
                                                       value="1">
                                                <span
                                                    class="btn btn-md btn-block g-brd-gray-light-v2 g-bg-gray-light-v5 g-bg-primary--checked rounded-0 g-color-white--checked">مرد</span>
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
                                            value="{{$data->Phone}}"
                                            placeholder="xxxxxxxx"
                                        >
                                        <input
                                            style="direction: ltr"
                                            id="phonePreNumber"
                                            name="prePhone"
                                            class="text-left col-4 form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16 g-brd-right-none"
                                            maxlength="3"
                                            value="{{$data->PrePhone}}"
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
                                               value="{{$data->Mobile}}"
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
                                            <input id="state" class="d-none" value="{{$data->State}}">
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
                                            <input id="city" class="d-none" value="{{$data->City}}">
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
                                               value="{{$data->HomeAddress}}"
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
                                            value="{{$data->HomePostalCode}}"
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
                                               value="{{$data->WorkAddress}}"
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
                                            value="{{$data->WorkPostalCode}}"
                                            maxlength="10"
                                            placeholder="فقط اعداد"
                                        >
                                    </div>
                                </div>

                                {{--شماره پلاک محل کار--}}
                                <div class="form-group row g-mb-15">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">شماره پلاک محل کارپستی محل کار</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <input
                                            class="form-control form-control-md rounded-0 g-bg-gray-light-v5 g-font-size-16"
                                            id="shopNumber"
                                            name="shopNumber"
                                            value="{{$data->ShopNumber}}"
                                            maxlength="10"
                                            placeholder="فقط اعداد"
                                        >
                                    </div>
                                </div>

                                {{--کارت بانکی--}}
                                <div class="form-group row">
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
                                                       value="{{substr($data->CreditCard,0,4)}}"
                                                       tabindex="1"
                                                       placeholder="0000"
                                                       id="creditCard4"
                                                       name="creditCard4"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard3').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="2"
                                                       placeholder="0000"
                                                       id="creditCard3"
                                                       name="creditCard3"
                                                       value="{{substr($data->CreditCard,4,4)}}"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard2').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                       type="text"
                                                       tabindex="3"
                                                       placeholder="0000"
                                                       id="creditCard2"
                                                       name="creditCard2"
                                                       value="{{substr($data->CreditCard,8,4)}}"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#creditCard1').focus();">
                                                <input style="direction: rtl;"
                                                       class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width"
                                                       type="text"
                                                       tabindex="4"
                                                       placeholder="0000"
                                                       id="creditCard1"
                                                       name="creditCard1"
                                                       value="{{substr($data->CreditCard,12,4)}}"
                                                       maxlength="4"
                                                       oninput="if($(this).val().length === 4) $('#save').focus();">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--تصویر چهره--}}
                                <div class="form-group row justify-content-center">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">تصویر
                                        چهره</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <img class="img-fluid img-thumbnail g-rounded-3"
                                             src="{{asset($data->PicPath.'pic11.jpg')}}" alt="Image Description">
                                    </div>
                                </div>
                                <input class="d-none" type="text" name="userImage" value="{{$data->PicPath.'pic11.jpg'}}">

                                {{--تصویر کارت ملی--}}
                                <div class="form-group row g-mb-15 justify-content-center">
                                    <label class="col-sm-3 col-form-label align-self-center text-right">تصویر کارت
                                        ملی</label>
                                    <div dir="ltr" class="col-sm-9 force-col-12">
                                        <img class="img-fluid img-thumbnail g-rounded-3"
                                             src="{{asset($data->PicPath.'pic12.jpg')}}"
                                             alt="Image Description">
                                    </div>
                                </div>
                                <input class="d-none" type="text" name="nationalityCardImage" value="{{$data->PicPath.'pic12.jpg'}}">

                                <input type="hidden" name="signature" value="{{$data->Signature}}">
                                <div class="d-flex justify-content-end g-my-100">
                                    <a class="btn btn-l u-btn-outline-lightred u-btn-content g-font-weight-600 g-letter-spacing-0_5 g-brd-2 g-mr-10 g-mb-15"
                                       href="#"
                                       data-toggle="modal"
                                       data-target="#modalLoginForm">
                                        <i class="fa fa-close pull-left g-font-size-42 g-mr-10"></i>
                                        <span class="float-right text-right">
                                              رد صلاحیت فروشنده
                                              <span class="d-block g-font-size-11">رد صلاحیت توسط ادمین سیستم</span>
                                            </span>
                                    </a>
                                    <button onclick="confirmAdd()" type="button"
                                            class="btn btn-l u-btn-outline-primary u-btn-content g-font-weight-600 g-letter-spacing-0_5 g-brd-2 g-mr-10 g-mb-15">
                                        <i class="fa fa-check pull-left g-font-size-42 g-mr-10"></i>
                                        <span class="float-right text-right">
                                              تایید و افزودن فروشنده به سیستم
                                              <span class="d-block g-font-size-11">تایید توسط ادمین سیستم</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="modal fade text-center" id="modalLoginForm" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header g-pr-20 g-pl-20">
                                                <h5 class="m-0">دلایل رد صلاحیت</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i class="hs-icon hs-icon-close"></i>
                                                </button>
                                            </div>
                                            <div style="direction: rtl" class="modal-body mx-3">
                                                <div class="form-group g-mb-10 text-right">
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        نام صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        نام خانوادگی صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        ایمیل صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        کد ملی صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        تاریخ تولد صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        جنسیت صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        تلفن ثابت صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        تلفن همراه صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        آدرس سکونت صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        کد پستی محل سکونت صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        آدرس محل کار صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        کد پستی محل کار صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        شماره پلاک محل صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        شماره کارت بانکی صحیح نمی باشد.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        تصویر چهره قابل قبول نیست.
                                                    </label>
                                                    <label class="d-block u-check g-pr-25">
                                                        <input class="hidden-xs-up g-pos-abs g-top-0 g-right-0"
                                                               type="checkbox">
                                                        <div
                                                            class="u-check-icon-checkbox-v4 g-absolute-centered--y g-right-0">
                                                            <i class="fa" data-check-icon=""></i>
                                                        </div>
                                                        تصویر کارت ملی صحیح نیست.
                                                    </label>
                                                </div>
                                            </div>
                                            <a onclick="confirmDelete()"
                                               class="btn btn-md u-btn-lightred rounded-0 g-pa-15 g-color-white">
                                                رد صلاحیت
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="{{route('sellerDelete')}}" method="POST" id="sellerDelete">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->ID}}">
                        <input type="hidden" name="name" value="{{$data->Name}}">
                        <input type="hidden" name="family" value="{{$data->Family}}">
                        <input type="hidden" name="family" value="{{$data->Mobile}}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
