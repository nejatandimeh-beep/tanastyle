@extends('Layouts.IndexSellerMajor')
@section('Content')
    <li class="list-inline-item align-middle g-mx-7">
        <a onclick="$('#eventImg').trigger('click')"
           class="u-icon-v1 u-icon-size--md g-color-black" href="#!">
            <i class="icon-camera u-line-icon-pro"></i>
        </a>

        <div style="display: none">
            <input id="eventImg"
                   value=""
                   type="file"
                   name="eventImg"
                   accept="image/*">
            <input style="display: none" type="text" id="eventImageUrl" name="eventImageUrl">
        </div>

        <form action="{{route('sellerMajorAddEvent')}}" id="eventUploadForm"
              method="post" enctype="multipart/form-data">
            @csrf
            <textarea id="eventText"
                      name="eventText"
                      autofocus
                      class="d-none"
                      maxlength="300" rows="4" placeholder="متن.."></textarea>
        </form>
    </li>
    {{--مودال تصاویر--}}
    <div style="direction: rtl" class="modal fade bd-example-modal-lg" id="eventModal"
         tabindex="-1" role="dialog"
         aria-labelledby="eventModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLongTitle">تنظیم اندازه
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
                            <img style="width: 100%;" src="" id="event_sample_image">
                        </div>
                        {{--                        <div class="col-md-4">--}}
                        {{--                            <div class="preview rounded-circle mx-auto g-mt-20"></div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div>
                        <div class="input-group">
                           <textarea id="eventTextTemp"
                                     autofocus
                                     class="form-control form-control-md g-resize-none g-brd-0 rounded-0 pl-0 g-bg-transparent"
                                     maxlength="300" rows="4" placeholder="متن.."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div id="addEventButton" class="text-left">
                        <label class="u-check g-mr-15 mb-0" data-dismiss="modal">
                            <div
                                class="u-check-icon-checkbox-v3 g-brd-gray-light-v4 g-bg-gray-light-v4 g-color-gray-dark-v3 g-color-lightred--hover">
                                <i class="fa fa-close g-absolute-centered"></i>
                            </div>
                        </label>
                        <label class="u-check g-mr-15 mb-0" id="eventCrop">
                            <div
                                class="u-check-icon-checkbox-v3 g-brd-gray-light-v4 g-bg-gray-light-v4 g-color-gray-dark-v3 g-color-primary--hover">
                                <i id="eventSubmitIcon" class="fa fa-check g-absolute-centered"></i>
                                <i style="margin: -7px" id="waitingEventCrop"
                                   class="d-none fa fa-spinner fa-spin g-absolute-centered g-color-gray-dark-v3"></i>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <li class="list-inline-item align-middle g-mx-7">
        <a class="u-icon-v1 u-icon-size--md g-color-black"
           data-toggle="modal"
           data-target="#allEvents"
           href="#!">
            <i class="icon-event u-line-icon-pro"></i>
        </a>
    </li>
    {{--مودال رویدادها--}}
    <div style="padding: 0 !important; overflow: hidden" class="modal fade bd-example-modal-lg"
         id="allEvents"
         tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div style="max-width: 100%" class="modal-dialog m-0 modal-dialog-centered" role="document">
            <div style="height: 1000px" class="modal-content">
                <div>
                    <div class="home-demo">
                        <div class="row">
                            <div id="eventContainer-1" class="large-12 columns">
                                <div style="width: 350px" class="owl-demo">
                                    <!--owl dots-->
                                    <div class="d-flex owlContainer">
                                        <div id="dot-0" class="owlDots g-mr-2">
                                            <div class="slide-progress-main">
                                                <div class="slide-progress slide-width-0 slide-0"></div>
                                            </div>
                                        </div>
                                        <div id="dot-1" class="owlDots g-mr-2">
                                            <div class="slide-progress-main">
                                                <div class="slide-progress slide-width-100 slide-1"></div>
                                            </div>
                                        </div>
                                        <div id="dot-2" class="owlDots">
                                            <div class="slide-progress-main">
                                                <div class="slide-progress slide-width-100 slide-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--owl items-->
                                    <div class="owl-carousel owl-theme">
                                        <div id="item-0" class="item">
                                            <img style="width: 350px; height: 100%; object-fit: fill"
                                                 src="{{asset('img/SellerMajor/Events/'.Auth::guard('sellerMajor')->user()->id.'/30.jpg')}}">
                                        </div>
                                        <div id="item-1" class="item">
                                            <img style="width: 350px; height: 100%; object-fit: fill"
                                                 src="{{asset('img/SellerMajor/Events/'.Auth::guard('sellerMajor')->user()->id.'/30.jpg')}}">
                                        </div>
                                        <div id="item-2" class="item">
                                            <img style="width: 350px; height: 100%; object-fit: fill"
                                                 src="{{asset('img/SellerMajor/Events/'.Auth::guard('sellerMajor')->user()->id.'/30.jpg')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="direction: ltr; border: 0 !important;"
                         class="modal-header text-left">
                        <button style="outline: 0;" type="button"
                                class="g-brd-none g-mt-5 g-pa-10 g-bg-transparent g-font-size-20 g-line-height-0 align-self-center"
                                data-dismiss="modal"
                                aria-label="Close">
                            <span class="g-font-size-30 g-font-weight-600" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




@section('SellerMajorJsFunction')
    <script>
        $('.modal').on('shown.bs.modal', function () {
            $(this).find('[autofocus]').focus();
        });
        $(document).ready(function () {
            let mq = window.matchMedia("(max-width: 900px)");
            if (mq.matches) {
                $('#bigDevice').remove();
                $('.bigDevice').remove();

            } else {
                $('#smallDevice').remove();
                $('.smallDevice').remove();
            }

            let $modal = $('#modal'),
                image = document.getElementById('sample_image'),
                cropper;
            $('#profileImg').on('change', function (event) {
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
            });

            $modal.on('shown.bs.modal', function () {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1,
                    zoomable: true,
                    background: true,
                    minCropBoxWidth: 500,
                    minCropBoxHeight: 500,
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
                    width: 500,
                    height: 500
                });

                canvas.toBlob(function (blob) {
                    let url = URL.createObjectURL(blob),
                        reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        $('#imageUrl').val(reader.result);
                        $('#profileImgBox').attr('src', url);
                        $modal.modal('hide');
                        $("#imageUrl").clone().appendTo("#imageUploadForm");
                        $('#imageUploadForm').submit();
                    };
                });
            });

            $('#imageUploadForm').on('submit', (function (e) {
                $('#profileImgSubmitIcon').addClass('d-none');
                $('#waitingCrop').removeClass('d-none');
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
                        console.log(data);
                        $('#profileImgSubmitIcon').removeClass('d-none');
                        $('#waitingCrop').addClass('d-none');
                    }
                })
            }));

            $('.nowDate').text(nowDate());
        });

        $(document).ready(function () {
            let $eventModal = $('#eventModal'),
                eventImage = document.getElementById('event_sample_image'),
                eventCropper;
            $('#eventImg').on('change', function (event) {
                let files = event.target.files,
                    done = function (url) {
                        eventImage.src = url;
                        $eventModal.modal('show');
                    };

                if (files && files.length > 0) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $eventModal.on('shown.bs.modal', function () {
                eventCropper = new Cropper(eventImage, {
                    aspectRatio: 8 / 16,
                    viewMode: 1,
                    zoomable: true,
                    background: true,
                    minCropBoxWidth: 960,
                    minCropBoxHeight: 1920,
                    dragCrop: true,
                    dragMode: 'move',
                    multiple: true,
                    movable: true
                    // preview: '.preview'
                });
            });

            $eventModal.on('hidden.bs.modal', function () {
                eventCropper.destroy();
                eventCropper = null;
            });

            $('#eventCrop').on('click', function () {
                let canvas = eventCropper.getCroppedCanvas({
                    width: 960,
                    height: 1920
                });

                canvas.toBlob(function (blob) {
                    let url = URL.createObjectURL(blob),
                        reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        $('#eventImageUrl').val(reader.result);
                        // $('#profileImgBox').attr('src', url);
                        $eventModal.modal('hide');
                        $("#eventImageUrl").clone().appendTo("#eventUploadForm");
                        $('#eventUploadForm').submit();
                    };
                });
            });

            $('#eventUploadForm').on('submit', (function (e) {
                $('#eventSubmitIcon').addClass('d-none');
                $('#waitingEventCrop').removeClass('d-none');
                $('#eventText').val($('#eventTextTemp').val());
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
                        console.log(data);
                        $('#eventSubmitIcon').removeClass('d-none');
                        $('#waitingEventCrop').addClass('d-none');
                    }
                })
            }));
        });

        $(document).ready(function () {
            let owl = $('.owl-carousel'),
                restart = 5000,
                items = $('.item').length,
                width = 100 / items;
            $('.owlDots').attr('style', 'width:' + width + '%');

            owl.on('initialized.owl.carousel translated.owl.carousel', function (e) {
                startProgressBar(e.item.index);
            });

            owl.on('translate.owl.carousel', function (e) {
                resetProgressBar(e.item.index);
            });

            owl.on('dragged.owl.carousel', function (e) {
                $('#eventContainer-1').addClass('d-none');
            });

            startProgressBar(0);
            owl.trigger('play.owl.autoplay', [restart]);
            owl.owlCarousel({
                loop: false,
                autoplay: true,
                autoplayTimeout: restart,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            let block = false;
            $(".owl-item").bind('touchstart mousedown', function () {
                if (!block) {
                    block = true;
                    owl.trigger('stop.owl.autoplay');
                    block = false;
                }
            }).bind('touchend mouseup', function () {
                if (!block) {
                    block = true;
                    owl.trigger('play.owl.autoplay', [restart]);
                    block = false;
                }
            });
        });

        $(document).on('click', '.owl-stage-outer', function (e) {
            $(".owl-carousel").trigger('next.owl.carousel');
        });

        $('.owl-carousel').on('click', '.owl-item', function(e) {
            let carousel = $('.owl-carousel').data('owl.carousel'),
                index=carousel.relative($(this).index());
            $('.slide-'+index).attr('style','width:100% !important;');
            console.log('clicked',index);
        });

        function startProgressBar(index) {
            console.log('start: ',index);
            $('#dot-'+index).removeClass('d-none');
            // apply keyframe animation
            $('.slide-'+index).css({
                width: "100%",
                transition: "width 5000ms linear"
            });
        }

        function resetProgressBar(index) {
            console.log('end: ',index);
            $('.slide-'+index).css({
                width: 0,
                transition: "width 0s"
            });
        }

        function nowDate() {
            let week = ["يكشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"],
                months = ["فروردين", "ارديبهشت", "خرداد", "تير", "مرداد", "شهريور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
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
            let now = day + " " + months[month - 1] + " " + year;
            return now;
        }
    </script>
@endsection
