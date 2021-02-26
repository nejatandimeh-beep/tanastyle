@extends('Layouts.IndexCustomer')
@section('Content')
    <div class="d-flex">
        <div style="padding-bottom: 15px" class="col-8 pa-15">
            <div>
                <img id="image" src="{{ asset('img/Other/a.png') }}" width="600px" height="600px">
            </div>
        </div>
        <div class="col-4">
            <figure style="direction: ltr; border-bottom: 2px solid #72c02c"
                    class="g-px-10 g-pt-10 g-pb-20 productFrame u-shadow-v24">
                <div>
                    <div id="carousel-08-1"
                         class="js-carousel text-center g-mb-20"
                         data-infinite="1"
                         data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center"
                         data-nav-for="#carousel-08-2">

                        <div class="js-slide">
                            <a href="#">
                                <div style="overflow: hidden; width: 400px;  height: 400px;" class="preview m-auto"></div>
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="#">
                                <div style="overflow: hidden; width: 400px;  height: 400px;" class="preview m-auto"></div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- مشخصات محصول -->
                <div style="direction: rtl" class="media">
                    <!-- نام و مدل و جنسیت و دسته و تخفیف و قیمت -->
                    <div class="d-flex justify-content-between col-12 p-0">
                        <div class="d-flex flex-column">
                            <h4 class="h6 g-color-black my-1">
                                                    <span class="u-link-v5 g-color-black"
                                                          tabindex="0">
                                                        نام محصول
                                                        <span class="g-font-size-12 g-font-weight-300">مدل</span>
                                                    </span>
                            </h4>
                            <ul style="padding: 0"
                                class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-mb-5">
                                <li>
                                    <a class="g-color-gray-dark-v4 g-color-black--hover g-font-style-normal g-font-weight-600"
                                       href="#">جنسیت، دسته بندی</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div
                    class="d-block g-color-black g-font-size-17 g-ml-10">
                    <div style="direction: rtl" class="text-left">
                        <s class="g-color-lightred g-font-weight-500 g-font-size-13">
                            تخفیف
                        </s>
                        <span>مبلغ</span>
                        <span
                            class="d-block g-color-gray-light-v2 g-font-size-10">تومان</span>
                    </div>
                </div>
            </figure>
        </div>
    </div>
@endsection

