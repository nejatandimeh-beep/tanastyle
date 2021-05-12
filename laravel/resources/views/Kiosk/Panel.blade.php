@extends('Layouts.IndexDelivery')
@section('Content')
    <div class="container-fluid">
{{--        <div class="row g-my-40">--}}
{{--            <div class="col-lg-12">--}}
{{--                <!-- Figure -->--}}
{{--                <figure style="background-color: rgba(246,246,246,0.5)"--}}
{{--                        class="u-block-hover g-rounded-0 g-brd-around g-brd-gray-light-v4 g-py-15">--}}
{{--                    <div style="direction: rtl;" class="d-flex justify-content-start align-items-center">--}}
{{--                        <div class="col-md-9 d-flex g-pr-15--lg g-pr-0">--}}
{{--                        @if($deliveryManActive->PicPath !== '0')--}}
{{--                            <!-- Figure Image -->--}}
{{--                                <img class="g-width-80 g-height-80 rounded-circle g-ml-15"--}}
{{--                                     id="userImage"--}}
{{--                                     src="{{ asset($deliveryManActive->PicPath.'?'.time()) }}"--}}
{{--                                     --}}{{--use ? and time() for refresh image--}}
{{--                                     alt="Image Description">--}}
{{--                                <!-- Figure Image -->--}}
{{--                            @else--}}
{{--                                <img src="{{ asset('img/Other/user-add-icon.png') }}" id="uploaded_image"--}}
{{--                                     class="g-width-80 g-height-80 rounded-circle g-ml-15 g-brd-around g-brd-gray-light-v2">--}}
{{--                        @endif--}}
{{--                        <!-- Figure Info -->--}}
{{--                            <div class="d-flex flex-column justify-content-center">--}}
{{--                                <div class="g-mb-5">--}}
{{--                                    <h4 class="h5 g-mb-0">{{ $deliveryManActive->name.' '.$deliveryManActive->Family }}--}}
{{--                                        --}}{{--                                        @if(Auth::user()->email_verified_at === null)--}}
{{--                                        --}}{{--                                            @if (session('resent'))--}}
{{--                                        --}}{{--                                                <label class="g-color-primary g-font-size-16 g-mr-10">--}}
{{--                                        --}}{{--                                                    <i class="fa fa-envelope g-font-size-16"></i>--}}
{{--                                        --}}{{--                                                    <span--}}
{{--                                        --}}{{--                                                        class="g-color-main">لینک فعال سازی به ایمیل شما ارسال شد.</span>--}}
{{--                                        --}}{{--                                                </label>--}}
{{--                                        --}}{{--                                            @else--}}
{{--                                        --}}{{--                                                <label class="g-color-red g-font-size-16">--}}
{{--                                        --}}{{--                                                    <span>حساب کاربری شما فعالسازی نشده است</span>--}}
{{--                                        --}}{{--                                                    <i class="fa fa-exclamation g-font-size-16"></i>--}}
{{--                                        --}}{{--                                                </label>--}}
{{--                                        --}}{{--                                            @endif--}}
{{--                                        --}}{{--                                        @endif--}}
{{--                                    </h4>--}}
{{--                                </div>--}}
{{--                                <em class="d-block g-color-gray-dark-v5 g-font-style-normal g-font-size-13 g-mb-2">email--}}
{{--                                    ???</em>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- End Figure Info -->--}}

{{--                        <!-- Figure Caption -->--}}
{{--                        <figcaption class="u-block-hover__additional--fade g-bg-white-opacity-0_9 g-pa-30">--}}
{{--                            <div--}}
{{--                                class="u-block-hover__additional--fade u-block-hover__additional--fade-down g-flex-middle">--}}
{{--                                --}}{{--                                @if(Auth::user()->email_verified_at === null)--}}
{{--                                --}}{{--                                    <ul class="list-inline text-center g-flex-middle-item">--}}
{{--                                --}}{{--                                        @if (!session('resent'))--}}
{{--                                --}}{{--                                            <li id="emailActivation"--}}
{{--                                --}}{{--                                                class="list-inline-item justify-content-center g-mx-7">--}}
{{--                                --}}{{--                                            <span class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">--}}
{{--                                --}}{{--                                                <i class="fa fa-check"></i>--}}
{{--                                --}}{{--                                            </span>--}}
{{--                                --}}{{--                                                <form class="d-inline text-left" method="POST"--}}
{{--                                --}}{{--                                                      action="{{ route('verification.resend') }}">--}}
{{--                                --}}{{--                                                    @csrf--}}
{{--                                --}}{{--                                                    <button type="submit"--}}
{{--                                --}}{{--                                                            class="btn customLink g-bg-transparent p-0 m-0 align-baseline">--}}
{{--                                --}}{{--                                                        فعال سازی حساب کاربری--}}
{{--                                --}}{{--                                                    </button>--}}
{{--                                --}}{{--                                                </form>--}}
{{--                                --}}{{--                                            </li>--}}
{{--                                --}}{{--                                        @endif--}}
{{--                                --}}{{--                                        @if (session('resent'))--}}
{{--                                --}}{{--                                            <li style="direction: rtl" id="sendVerifyHint"--}}
{{--                                --}}{{--                                                class="list-inline-item justify-content-center">--}}
{{--                                --}}{{--                                                <span class="g-color-primary g-font-size-20 g-ml-5"><i--}}
{{--                                --}}{{--                                                        class="fa fa-envelope"></i></span>--}}
{{--                                --}}{{--                                                <span>لینک فعال سازی به ایمیل شما ارسال شد. لطفا آخرین ایمیل از طرف Tanastyle.ir را چک کنید.</span>--}}
{{--                                --}}{{--                                            </li>--}}
{{--                                --}}{{--                                        @endif--}}
{{--                                --}}{{--                                    </ul>--}}
{{--                                --}}{{--                                @else--}}

{{--                                <ul class="list-inline text-center g-flex-middle-item">--}}
{{--                                    <li class="list-inline-item justify-content-center g-mx-7">--}}
{{--                                                <span--}}
{{--                                                    class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">--}}
{{--                                                    <i class="icon-lock-open"></i>--}}
{{--                                                </span>--}}
{{--                                        <a class="customLink" href="">تغییر رمز--}}
{{--                                            عبور</a>--}}
{{--                                    </li>--}}
{{--                                    --}}{{--                                        <li class="list-inline-item justify-content-center g-mx-7">--}}
{{--                                    --}}{{--                                                <span--}}
{{--                                    --}}{{--                                                    class="g-color-gray-dark-v5 g-color-primary--hover g-font-size-20">--}}
{{--                                    --}}{{--                                                    <i class="icon-user"></i>--}}
{{--                                    --}}{{--                                                </span>--}}
{{--                                    --}}{{--                                            <form class="d-inline-block" id="uploadImage"--}}
{{--                                    --}}{{--                                                  action="{{route('uploadImage')}}"--}}
{{--                                    --}}{{--                                                  enctype="multipart/form-data" method="POST">--}}
{{--                                    --}}{{--                                                @csrf--}}
{{--                                    --}}{{--                                                <label class="customerCropper" for="upload_image" style="cursor: pointer">--}}
{{--                                    --}}{{--                                                    <span class="customLink">تنظیم تصویر حساب کاربری</span>--}}
{{--                                    --}}{{--                                                    <input type="file" name="image" id="upload_image" class="image"--}}
{{--                                    --}}{{--                                                           style="display: none">--}}
{{--                                    --}}{{--                                                    <input type="text" id="imageUrl" name="imageUrl"--}}
{{--                                    --}}{{--                                                           style="display: none">--}}
{{--                                    --}}{{--                                                </label>--}}
{{--                                    --}}{{--                                            </form>--}}
{{--                                    --}}{{--                                        </li>--}}
{{--                                </ul>--}}
{{--                            --}}{{--                            @endif--}}
{{--                            <!-- Figure Social Icons -->--}}

{{--                                <!-- End Figure Social Icons -->--}}
{{--                            </div>--}}
{{--                        </figcaption>--}}
{{--                        <!-- End Figure Caption -->--}}
{{--                    </div>--}}
{{--                </figure>--}}
{{--                <!-- End Figure -->--}}
{{--            </div>--}}
{{--        </div>--}}

        <div style="direction: rtl">
            <div id="accordion-01" role="tablist" aria-multiselectable="true">
                <!-- Card -->
                <div class="card g-mb-5 rounded-0">
                    <div id="accordion-01-heading-01" class="card-header" role="tab">
                        <h5 class="mb-0">
                            <a class="d-block u-link-v5 g-color-main g-color-primary--hover"
                               href="#accordion-01-body-01" data-toggle="collapse" data-parent="#accordion-01"
                               aria-expanded="true" aria-controls="accordion-01-body-01">محصولات موجود در کیوسک
                                انتظار</a>
                        </h5>
                    </div>
                    <div id="accordion-01-body-01" class="collapse show" role="tabpanel"
                         aria-labelledby="accordion-01-heading-01">
                        <div class="card-block">
                            <!-- Table Schedule -->
                            <div class="table-responsive">
                                <table style="direction: rtl"
                                       class="table table-bordered table-hover table-inverse u-table--v2 text-center text-uppercase g-col-border-side-0">
                                    <thead>
                                    <tr class="g-bg-primary g-col-border-top-0">
                                        <th class="g-brd-white-opacity-0_1">ردیف</th>
                                        <th class="g-brd-white-opacity-0_1">نام محصول</th>
                                        <th class="g-brd-white-opacity-0_1">مدل</th>
                                        <th class="g-brd-white-opacity-0_1">سایز</th>
                                        <th class="g-brd-white-opacity-0_1">رنگ</th>
                                        <th class="g-brd-white-opacity-0_1">کد محصول</th>
                                        <th class="g-brd-white-opacity-0_1">کد فاکتور</th>
                                        <th class="g-brd-white-opacity-0_1">مقصد</th>
                                        <th class="g-brd-white-opacity-0_1">وضعیت</th>
                                        <th class="g-brd-white-opacity-0_1">اولویت رسیدگی</th>
                                        <th class="g-brd-white-opacity-0_1">تصویر محصول</th>
                                    </tr>
                                    </thead>

                                    <tbody class="g-font-size-12 g-color-white-opacity-0_5 g-font-weight-600">
{{--                                    @if($data!==null)--}}
{{--                                        @foreach($data as $key => $row)--}}
                                            <tr id="row">
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span
                                                    class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                <span
                                                    class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
{{--                                                    @if($row->DeliveryStatus === '0')--}}
{{--                                                        <span class="g-font-size-16 g-color-yellow">--}}
{{--                                                            {{$row->Address.' پلاک '.$row->ShopNumber}}--}}
{{--                                                    </span>--}}
{{--                                                    @endif--}}
{{--                                                    @if($row->DeliveryStatus === '2')--}}
{{--                                                        <span class="g-font-size-16 g-color-yellow">--}}
{{--                                                         کیوسک--}}
{{--                                                    </span>--}}
{{--                                                    @endif--}}
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <span class="g-color-white"></span>
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
{{--                                                    @if($row->DeliveryStatus === '0')--}}
{{--                                                        <img class="d-flex g-width-60 g-my-10 g-height-60 mx-auto"--}}
{{--                                                             src="{{ $row->sellerPic }}" alt="Image Description">--}}
{{--                                                    @endif--}}
{{--                                                    @if($row->DeliveryStatus === '2')--}}
{{--                                                        <i class="icon-home g-font-size-20 g-color-primary"></i>--}}
{{--                                                    @endif--}}
                                                </td>
                                                <td class="g-brd-white-opacity-0_1 align-middle">
                                                    <img
                                                        class="d-flex g-width-60 g-height-60 g-my-10 mx-auto g-bg-white"
                                                        src=""
                                                        title="" alt="Image Description">
                                                </td>
                                            </tr>
{{--                                        @endforeach--}}
{{--                                    @endif--}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table Schedule -->
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

@endsection
