@extends('Layouts.IndexSeller')
@section('Content')
    <!-- Info Panel -->
    <div style="direction: rtl; position: -webkit-sticky; position: sticky; top: 0; z-index: 100;"
         class="card card-inverse g-brd-black g-bg-black-opacity-0_8 rounded-0">
        <h3 class="card-header h5 g-color-white-opacity-0_9">
            <i class="fa fa-list-alt g-font-size-default g-ml-5"></i>افزودن محصول
        </h3>
    </div>
    <!-- End Info Panel -->
    <div style="direction: rtl" class="container p-lg-5 g-mb-30">

        <div class="g-mb-30">
                <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll g-mb-30" data-options="{
    settings_mode_oneelement_max_offset: '150'
   }">
                    <!-- Parallax Image -->
                    <div class="divimage dzsparallaxer--target w-100"
                         style="height: 140%; background-image: url({{asset('assets/img-temp/1920x1080/img11.jpg')}}); transform: translate3d(0px, 0px, 0px);"></div>

                    <section
                        class="g-flex-centered g-height-500 g-color-white u-bg-overlay g-bg-black-opacity-0_6--after g-py-20">
                        <div class="container u-bg-overlay__inner">
                            <div class="row">
                                <div class="col-md-6 align-self-center g-py-20">
                                    <h2>
                                        @if($gender == '0')
                                            <span class="g-ml-1">{{ $name.' ' }}</span> زنانه
                                        @elseif($gender == '1')
                                            <span class="g-ml-1">{{ $name.' ' }}</span> مردانه
                                        @elseif($gender == '2')
                                            <span class="g-ml-1">{{ $name.' ' }}</span> دخترانه
                                        @elseif($gender == '3')
                                            <span class="g-ml-1">{{ $name.' ' }}</span> پسرانه
                                        @elseif($gender == '4')
                                            <span class="g-ml-1">{{ $name.' ' }}</span> نوزادی دخترانه
                                        @else
                                            <span class="g-ml-1">{{ $name.' ' }}</span> نوزادی پسرانه
                                        @endif
                                    </h2>
                                    <p class="lead mb-0 g-line-height-2">توضیحاتی در مورد محصول</p>
                                </div>

                                <div class="col-md-6 align-self-center g-py-20">
                                    <img class="w-100" src="../../assets/img-temp/400x270/img21.jpg"
                                         alt="Iamge Description">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        </div>
        {{-- Select Size--}}
        <section class="g-pa-15">
            <form role="form" action="{{ route('AddProduct') }}" method="get">
                @csrf

                {{-- Hidden Hints --}}
                <input style="display: none" type="number" name="gender" value="{{ $gender }}">
                <input style="display: none" type="text" name="cat" value="{{ $cat }}"/>
                <input style="display: none" type="text" name="name" value="{{ $name }}"/>
                <input style="display: none" type="text" name="hintCat" value="{{ $hintCat }}"/>

                <div class="row justify-content-center">
                    <div class="text-center u-heading-v2-7 g-brd-primary g-mb-30">
                        <h2 class="h4 u-heading-v4__title g-mb-10">لطفا
                            <span class="g-color-primary">تعداد</span> سایزهای موجود را مشخص نمایید.</h2>
                        <div class="g-pr-20 g-pl-20 smallDeviceJustify">
                            <p class="g-mb-3">
                                <spna class="g-font-weight-600">{{ Auth::guard('seller')->user()->name }}</spna>
                                عزیز در این قسمت لطفا مشخص نمایید که از محصول مورد نظر چند سایز در فروشگاهتان موجود
                                دارید.
                            </p>
                            <p class="g-mb-3">به عنوان مثال اگر برای محصولی 3 سایز مختلف موجود است در لیست زیر تعداد
                                را
                                3 ذکر کنید.</p>
                        </div>
                    </div>
                    <div class="col-md-12 text-center g-mb-30">
                        <label for="qty" class="g-font-weight-600">چند سایز برای محصول
                            <span>
                                    {{ $hintCat.' ' }}{{ $name.' ' }}
                            </span>
                            دارید؟
                        </label>
                        <input name="catCode" type="text" value="{{ $catCode }}" class="d-none">
                        <div style="direction: ltr" class="form-group g-mb-20 text-right col-lg-3 mx-auto">
                            <div class="input-group g-brd-primary--focus g-mb-10">
                                <div
                                    class="input-group-addon w-25 d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                    سایز
                                </div>
                                <select
                                    class="form-control form-control-md custom-select rounded-0 text-right h-25 g-font-size-16"
                                    name="qty">
                                    @for ($i = 1; $i<= 10; $i++)
                                        <option value="{{ $i }}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <button
                            class="btn btn-block btn-md u-btn-primary rounded-0 force-col-12 g-mb-15"
                            type="submit">ادامه
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

