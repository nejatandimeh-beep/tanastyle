@extends('Layouts.IndexSeller')
@section('Content')

    @if(session()->has('createStatus'))
        <div class="modal fade" id="overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-right g-bg-gray-light-v5">
                        <button type="button" class="close g-font-size-20" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title"><span
                                class="fa fa-check-square g-color-primary g-font-size-25 g-ml-15"></span></h4>
                    </div>
                    <div class="modal-body text-right">
                        <p style="direction: rtl">شماره کارت جدید جهت واریز افزوده شد و در صورت لزوم آن را فعال
                            کنید.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('activeStatus'))
        <div class="modal fade" id="overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-right g-bg-gray-light-v5">
                        <button type="button" class="close g-font-size-20" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title"><span
                                class="fa fa-check-square g-color-primary g-font-size-25 g-ml-15"></span></h4>
                    </div>
                    <div class="modal-body text-right">
                        <p style="direction: rtl">شماره کارت مورد نظر جهت واریز فعال شد.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <section>
        <div class="col-md-12 m-0 p-0">
            {{--  Menu --}}
            <div class="bigDevice">
                <ul style="direction: rtl"
                    class="nav text-md-right justify-content-end u-nav-v8-1 u-nav-dark g-bg-black-opacity-0_8 p-0"
                    role="tablist"
                    data-target="nav-8-1-dark-hor-right"
                    data-tabs-mobile-type="slide-up-down"
                    data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-darkgray">
                    <li class="nav-item">
                        <a class="nav-link g-pa-15"
                           href="{{ route('changeSellerPass') }}">
                            <strong class="text-uppercase u-nav-v8__title">تغییر رمز عبور</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-pa-15" data-toggle="tab" href="#nav-8-1-dark-hor-right--3"
                           role="tab">
                            <strong class="text-uppercase u-nav-v8__title">آدرس</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-pa-15" data-toggle="tab" href="#nav-8-1-dark-hor-right--2"
                           role="tab">
                            <strong class="text-uppercase u-nav-v8__title">شماره کارت</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active g-pa-15" data-toggle="tab"
                           href="#nav-8-1-dark-hor-right--1" role="tab">
                            <strong class="text-uppercase u-nav-v8__title">مشخصات</strong>
                        </a>
                    </li>
                </ul>
            </div>
            {{--  End Menu --}}

            {{-- BigDevice & SmallDevice --}}
            <div style="direction: rtl" id="nav-8-1-dark-hor-right" class="tab-content">

                {{-- Profile & SmallDevice --}}
                <div
                    class="d-custom-flex tab-pane fade show active g-brd g-brd-bottom-1 g-brd-white g-brd-around-none--lg"
                    id="nav-8-1-dark-hor-right--1"
                    role="tabpanel">
                    <div
                        class="g-bg-cover g-bg-size-cover g-bg-pos-center g-bg-black-opacity-0_7--after sellerProfileWallpaper p-0 m-0 g-brd-bottom g-brd-bottom-none--lg g-brd-gray-dark-v5">
                        <div class="container g-z-index-1 g-py-120 pr-0 pl-0">
                            <div class="justify-content-center">
                                <div class="col-lg-8 mx-auto">
                                    <div class="alignRightWallpaperBD">
                                        <div class="text-center">
                                            <img
                                                class="align-self-center g-brd-around g-brd-4 g-brd-primary g-width-150 g-height-150 rounded-circle"
                                                src="img/Other/a.png"
                                                alt="Image Description">
                                        </div>
                                        <div
                                            class="g-color-white align-self-center g-color-white text-center text-lg-right custom-mt-20">
                                            <h4 class="g-mb-10">نجات اندیمه</h4>
                                            <h5 class="m-0 text-center text-lg-left">شناسه شما در سیستم<span
                                                    class="g-mr-10 g-color-yellow">{{ Auth::guard('seller')->user()->id }}</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SmallDevice --}}
                    <div class="smallDevice" id="removeWhenBD">
                        {{-- Small Credit Card Header --}}
                        <div
                            class="g-bg-cover g-bg-size-cover g-bg-pos-center g-bg-black-opacity-0_7--after sellerCreditCardWallpaper p-0 m-0">
                            <form action="{{ route('CreditCard')}}" method="post"
                                  enctype='multipart/form-data'>
                                @csrf
                                <div class="container g-z-index-1 g-py-120 pr-0 pl-0">
                                    <!-- Testimonials -->
                                    <div class="justify-content-center">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="alignCenterWallpaperBD">
                                                <div class="text-center">
                                                    <div class="d-inline-block textOnImg">
                                                        <img
                                                            class="align-self-center g-brd-primary g-width-250 g-height-150"
                                                            src="img/Banners/sellerCard.png"
                                                            alt="Image Description">
                                                        <div
                                                            class="textOnImg-right-sm g-font-size-18 g-color-primary">
                                                            {{ $activeCard }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="align-self-center g-color-white text-center text-lg-right custom-mt-20">
                                                    <h4 class="g-color-white g-mb-10">ثبت کارت بانکی جدید</h4>

                                                    <div style="display: flex" class="d-custom-block">
                                                        <input style="direction: rtl; width: 100px"
                                                               class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width"
                                                               type="text"
                                                               tabindex="1"
                                                               placeholder="0000"
                                                               id="creditCard4"
                                                               name="creditCard4"
                                                               value=""
                                                               maxlength="4"
                                                               oninput="checkCharCount('creditCard4')">
                                                        <input style="direction: rtl; width: 100px"
                                                               class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                               type="text"
                                                               tabindex="2"
                                                               placeholder="0000"
                                                               id="creditCard3"
                                                               name="creditCard3"
                                                               value=""
                                                               maxlength="4"
                                                               oninput="checkCharCount('creditCard3')">
                                                        <input style="direction: rtl; width: 100px"
                                                               class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                               type="text"
                                                               tabindex="3"
                                                               placeholder="0000"
                                                               id="creditCard2"
                                                               name="creditCard2"
                                                               value=""
                                                               maxlength="4"
                                                               oninput="checkCharCount('creditCard2')">
                                                        <input style="direction: rtl; width: 100px"
                                                               class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                               type="text"
                                                               tabindex="4"
                                                               placeholder="0000"
                                                               id="creditCard1"
                                                               name="creditCard1"
                                                               value=""
                                                               maxlength="4"
                                                               oninput="checkCharCount('creditCard1')">
                                                        <button type="submit"
                                                                class="btn btn-md g-mr-0 g-mr-15--lg u-btn-primary force-col-12 rounded-0 g-pr-40 g-pl-40"
                                                                disabled
                                                                id="submitBtn">
                                                            ثبت
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Testimonials -->
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Small Credit Card Table--}}
                        <div style="background-color: #fff !important;" class="container g-pt-20">
                            <div class="g-pb-15">
                                <h3 style="direction: rtl"
                                    class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                    <i class="icon-hotel-restaurant-111 u-line-icon-pro g-font-size-22 g-ml-5"></i>کارت
                                    های بانکی موجود در سیستم
                                </h3>
                                <div class="table-responsive">
                                    <table style="direction: rtl" class="table table-bordered u-table--v2">
                                        <thead>
                                        <tr>
                                            <th class="align-middle text-center text-nowrap">ردیف</th>
                                            <th class="align-middle text-center text-nowrap focused rtlPosition">
                                                شماره کارت
                                            </th>
                                            <th class="align-middle text-center text-nowrap">وضعیت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $rec)
                                            <tr>
                                                <td class="align-middle text-center text-nowrap">{{ ++$key }}</td>
                                                <td class="align-middle text-center text-nowrap">{{ $rec->CardNumber }}</td>
                                                <td class="align-middle text-center text-nowrap">
                                                    @if ($rec->Status === 1)
                                                        <i class="fa fa-toggle-on g-color-primary g-font-size-22"></i>
                                                    @else
                                                        @if ($rec->Wrong === 0)
                                                            <a style="cursor: pointer"
                                                               onclick="cardActiveBtn({{ $rec->ID }})"
                                                               class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-font-size-22"
                                                               data-toggle="tooltip"
                                                               data-placement="top" data-original-title="فعال کردن">
                                                                <i class="fa fa-toggle-off"></i>
                                                            </a>
                                                        @else
                                                            <i data-toggle="tooltip"
                                                               data-placement="right"
                                                               title="شماره کارت اشتباه است"
                                                               class="fa fa-times-circle g-font-size-18 g-color-lightred"></i>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- End Table --}}
                            </div>
                        </div>

                        {{-- Small Address --}}
                        <div class="container p-0">
                            <div
                                class="g-bg-cover g-bg-size-cover g-bg-pos-center g-bg-black-opacity-0_7--after sellerAddressCardWallpaper p-0 m-0">
                                <div class="container g-z-index-1 g-py-50 pr-0 pl-0">
                                    <div class="justify-content-center">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="alignRightWallpaperBD">
                                                <div
                                                    class="g-color-white align-self-center g-color-white text-right custom-mt-20 g-mb-50">
                                                    <h6>آدرس</h6>
                                                    <p class="m-0 g-mb-15 g-color-yellow">آذربایجان غربی
                                                        مهاباد مجتمع پوشاک تاناکورا</p>
                                                    <h6>پلاک مغازه</h6>
                                                    <p class="m-0 g-mb-15 g-color-yellow">1245</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mx-auto g-color-white">
                                            <p style="direction: ltr"
                                                class="d-flex justify-content-start m-0 text-left">
                                                <i class="icon-media-085 u-line-icon-pro g-font-size-30 g-mr-10"></i>
                                                <span class="g-pt-5 g-color-yellow">0444 223 1185</span>
                                            </p>
                                            <p style="direction: ltr"
                                                class="d-flex justify-content-start m-0 text-left">
                                                <i class="icon-media-054 u-line-icon-pro g-font-size-30 g-mr-10"></i>
                                                <span class="g-pt-5 g-color-yellow">0914 166 8745</span>
                                            </p>
                                            <p style="direction: ltr"
                                                class="d-flex justify-content-start m-0 text-left">
                                                <i class="icon-communication-154 u-line-icon-pro g-font-size-30 g-mr-10 align-self-center"></i>
                                                <span class="g-pt-5 g-color-yellow">nejat.andimeh@gmail.com</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End SmallDevice --}}
                    </div>
                </div>

                {{-- CreditCard --}}
                <div class="tab-pane fade" id="nav-8-1-dark-hor-right--2"
                     role="tabpanel">
                    <div
                        class="g-bg-cover g-bg-size-cover g-bg-pos-center g-bg-black-opacity-0_7--after sellerCreditCardWallpaper p-0">
                        <form action="{{ route('CreditCard')}}" method="post"
                              enctype='multipart/form-data'>
                            @csrf
                            <div class="container g-z-index-1 g-py-120 pr-0 pl-0">
                                <!-- Testimonials -->
                                <div class="justify-content-center">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="alignCenterWallpaperBD">
                                            <div class="text-center">
                                                <div class="d-inline-block textOnImg">
                                                    <img
                                                        class="align-self-center g-brd-primary g-width-250 g-height-150"
                                                        src="img/Banners/sellerCard.png"
                                                        alt="Image Description">
                                                    <div style="font-family: 'A Rezvan'"
                                                         class="textOnImg-right g-font-size-18 g-color-primary">
                                                        {{ $activeCard }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="align-self-center g-color-white text-center text-lg-right custom-mt-20">
                                                <h4 class="g-color-white g-mb-10">ثبت کارت بانکی جدید</h4>

                                                <div style="display: flex" class="d-custom-block">
                                                    <input style="direction: rtl; width: 100px"
                                                           class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width"
                                                           type="text"
                                                           tabindex="1"
                                                           placeholder="0000"
                                                           id="creditCard4"
                                                           name="creditCard4"
                                                           value=""
                                                           maxlength="4"
                                                           oninput="checkCharCount('creditCard4')">
                                                    <input style="direction: rtl; width: 100px"
                                                           class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                           type="text"
                                                           tabindex="2"
                                                           placeholder="0000"
                                                           id="creditCard3"
                                                           name="creditCard3"
                                                           value=""
                                                           maxlength="4"
                                                           oninput="checkCharCount('creditCard3')">
                                                    <input style="direction: rtl; width: 100px"
                                                           class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                           type="text"
                                                           tabindex="3"
                                                           placeholder="0000"
                                                           id="creditCard2"
                                                           name="creditCard2"
                                                           value=""
                                                           maxlength="4"
                                                           oninput="checkCharCount('creditCard2')">
                                                    <input style="direction: rtl; width: 100px"
                                                           class="form-control form-control-md rounded-0 pl-0 pr-0 text-center g-font-size-16 responsive-width g-brd-right-none"
                                                           type="text"
                                                           tabindex="4"
                                                           placeholder="0000"
                                                           id="creditCard1"
                                                           name="creditCard1"
                                                           value=""
                                                           maxlength="4"
                                                           oninput="checkCharCount('creditCard1')">
                                                    <button type="submit"
                                                            class="btn btn-md g-mr-0 g-mr-15--lg u-btn-primary force-col-12 rounded-0 g-pr-40 g-pl-40"
                                                            disabled
                                                            id="submitBtn">
                                                        ثبت
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Testimonials -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div style="background-color: #fff !important;" class="container g-pt-20">
                        <div class="g-pb-15">
                            <h3 style="direction: rtl"
                                class="card-header g-bg-dark g-brd-around g-brd-gray-light-v4 g-color-gray-dark g-font-size-16 rounded-0 g-mb-5 text-right">
                                <i class="icon-hotel-restaurant-111 u-line-icon-pro g-font-size-22 g-ml-5"></i>کارت
                                های بانکی موجود در سیستم
                            </h3>
                            <div class="table-responsive">
                                <table style="direction: rtl" class="table table-bordered u-table--v2">
                                    <thead>
                                    <tr>
                                        <th class="align-middle text-center text-nowrap focused rtlPosition">
                                            ردیف
                                        </th>
                                        <th class="align-middle text-center text-nowrap">شماره کارت</th>
                                        <th class="align-middle text-center text-nowrap">وضعیت</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($data as $key => $rec)
                                        <tr>
                                            <td class="align-middle text-nowrap text-center">{{ ++$key }}</td>
                                            <td class="align-middle text-center text-nowrap">{{ $rec->CardNumber }}</td>
                                            <td class="align-middle text-center text-nowrap">
                                                @if ($rec->Status === 1)
                                                    <i class="fa fa-toggle-on g-color-primary g-font-size-22"></i>
                                                @else
                                                    @if ($rec->Wrong === 0)
                                                        <a style="cursor: pointer"
                                                           onclick="cardActiveBtn({{ $rec->ID }})"
                                                           class="g-color-gray-dark-v5 g-text-underline--none--hover g-pa-5 g-font-size-22"
                                                           data-toggle="tooltip"
                                                           data-placement="top" data-original-title="فعال کردن">
                                                            <i class="fa fa-toggle-off"></i>
                                                        </a>
                                                    @else
                                                        <i data-toggle="tooltip"
                                                           data-placement="top"
                                                           title="شماره کارت اشتباه است"
                                                           class="fa fa-times-circle g-font-size-18 g-color-lightred"></i>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- End Table --}}
                        </div>
                    </div>
                </div>

                {{-- Address --}}
                <div class="d-custom-flex tab-pane fade show" id="nav-8-1-dark-hor-right--3"
                     role="tabpanel">
                    <div
                        class="g-bg-cover g-bg-size-cover g-bg-pos-center g-bg-black-opacity-0_7--after sellerAddressCardWallpaper p-0 m-0">
                        <div class="container g-z-index-1 g-py-60 pr-0 pl-0">
                            <div class="justify-content-center">
                                <div class="col-lg-8 mx-auto">
                                    <div class="alignRightWallpaperBD">
                                        <div
                                            class="align-self-center g-color-white text-center text-lg-right custom-mt-20">
                                            <h6>آدرس</h6>
                                            <p class="m-0 g-mb-15 g-color-yellow">آذربایجان غربی مهاباد مجتمع پوشاک
                                                تاناکورا</p>
                                            <h6 >پلاک مغازه</h6>
                                            <p class="m-0 g-mb-15 g-color-yellow">1245</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mx-auto g-color-white">
                                    <p style="direction: ltr"
                                        class="d-flex justify-content-start m-0 text-left">
                                        <i class="icon-media-085 u-line-icon-pro g-font-size-30 g-mr-10"></i>
                                        <span class="g-pt-5 g-color-yellow">0444 223 1185</span>
                                    </p>
                                    <p style="direction: ltr"
                                        class="d-flex justify-content-start m-0 text-left">
                                        <i class="icon-media-054 u-line-icon-pro g-font-size-30 g-mr-10"></i>
                                        <span class="g-pt-5 g-color-yellow">0914 166 8745</span>
                                    </p>
                                    <p style="direction: ltr"
                                        class="d-flex justify-content-start m-0 text-left">
                                        <i class="icon-communication-154 u-line-icon-pro g-font-size-30 g-mr-10 align-self-center"></i>
                                        <span class="g-pt-5 g-color-yellow">nejat.andimeh@gmail.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End BigDevice --}}
        </div>
    </section>
@endsection

