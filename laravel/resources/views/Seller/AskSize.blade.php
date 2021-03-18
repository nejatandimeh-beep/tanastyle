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
            <div class="masonry-grid g-mb-20">
                <div class="masonry-grid-sizer g-width-25x--sm"></div>

                <div class="masonry-grid-item g-width-50x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img14.jpg" title="Lightbox Gallery">
                        <img class="img-fluid w-100" src="../../assets/img-temp/400x270/img14.jpg"
                             alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img6.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img6.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img8.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img8.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img18.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img18.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img16.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img16.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img15.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img15.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img11.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img11.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img12.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img12.jpg" alt="Image Description">
                    </a>
                </div>

                <div class="masonry-grid-item g-width-25x--sm">
                    <a class="js-fancybox" data-fancybox-gallery="lightbox-gallery--masonry-col4"
                       href="../../assets/img-temp/400x270/img13.jpg" title="Lightbox Gallery">
                        <img class="img-fluid" src="../../assets/img-temp/400x270/img13.jpg" alt="Image Description">
                    </a>
                </div>
            </div>

            <h3 style="text-align: center;">
                @if($gender == '0')
                    <span class="g-ml-1">{{ $name }}</span> زنانه
                @elseif($gender == '1')
                    <span class="g-ml-1">{{ $name }}</span> مردانه
                @elseif($gender == '2')
                    <span class="g-ml-1">{{ $name }}</span> بچگانه - دخترانه
                @elseif($gender == '3')
                    <span class="g-ml-1">{{ $name }}</span> بچگانه - پسرانه
                @elseif($gender == '4')
                    <span class="g-ml-1">{{ $name }}</span> نوزادی - دخترانه
                @else
                    <span class="g-ml-1">{{ $name }}</span> نوزادی - پسرانه
                @endif
            </h3>
            <div style="text-align: center;">
                توضیحاتی در مورد محصول
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
                            @if($gender == '0')
                                <span>
                                        <span class="g-ml-1">{{ $name }}</span> زنانه
                                    </span>
                            @elseif($gender == '1')
                                <span>
                                        <span class="g-ml-1">{{ $name }}</span> مردانه
                                    </span>
                            @elseif($gender == '2')
                                <span>
                                        <span class="g-ml-1">{{ $name }}</span> بچگانه - نوزادی
                                    </span>
                            @elseif($gender == '3')
                                <span>
                                        <span class="g-ml-1">{{ $name }}</span> بچگانه - دخترانه
                                    </span>
                            @else
                                <span>
                                        <span class="g-ml-1">{{ $name }}</span> بچگانه - پسرانه
                                    </span>
                            @endif
                            دارید؟</label>

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

