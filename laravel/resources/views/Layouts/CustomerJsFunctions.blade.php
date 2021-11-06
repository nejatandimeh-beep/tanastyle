@section('CustomerJsFunction')
    <script>
        let lastScrollTop = 0, gender = [], category = [], size = [], priceMin = 9999, priceMax = 100000000, color = [];

        $(document).ready(function () {
            if ($('.loginBtn').length > 0)
                $.ajax({
                    type: 'GET',
                    async: false,
                    url: '/Customer-Cart-Count',
                    success: function (data) {
                        $('#basketNum').text(data);
                    }
                });

            let $modal = $('#modal'),
                image = document.getElementById('sample_image'),
                cropper;

            $('#upload_image').on('change', function (event) {
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

                $(document.body).addClass('me-position-fix');
                $(document.body).removeClass('me-position-normally');
            });

            $modal.on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
                $(document.body).addClass('me-position-normally');
                $(document.body).removeClass('me-position-fix');
            });

            $('#crop').on('click', function () {
                $('#crop').hide();
                $('#waitingCrop').show();
                let canvas = cropper.getCroppedCanvas({
                    width: 400,
                    height: 400
                });

                canvas.toBlob(function (blob) {
                    let url = URL.createObjectURL(blob),
                        reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        $('#imageUrl').val(reader.result);
                        $('#uploadImage').submit();
                    }
                });
            });

            if ($('#cartCount').text() === 0) {
                $('#cartBuyBtn').hide();
            }

            // اسکرول صفحه به مسیر صفحه
            // if ($('.breadCrumbs').length > 0) {
            //     $('html, body').animate({scrollTop: $('.breadCrumbs').offset().top}, 1000);
            // }

            // نمایش رنگ برای اولین سایز بعد از لود شدن صفحه
            // addColor($('#firstSizeInfo').text(), parseInt($('#productID').text()));
            $('[id^="inputSize"]').each(function (index) {
                if ($(this).val() === $('#firstSizeInfo').text()) {
                    $(this).trigger('click');
                }
            });

            if ($('#checkLike').text() === 'like')
                $('#customerLike').removeClass('d-none');
            else {
                $('#customerUnlike').removeClass('d-none');
                $('#likeHint').removeClass('d-none');
            }

            // رفتار صفحه بعد از لود شدن صفحه در پروفایل کاربر
            modalTrigger();

            let mq = window.matchMedia("(max-width: 900px)");
            if (mq.matches) {
                $('#bigDevice').remove();
                $('.bigDevice').remove();
                $('#productGallery').removeClass('largeDevice');

                // تنظیم منوی فیلترها در صفحه نمایش محصولات برای نمایشگرهای کوچک و بزرگ
                $('#stickyDiv1').removeClass('sticky-top');
                $('#stickyDiv2').removeClass('sticky-top');
                $('#stickyDiv2').addClass('u-shadow-v18 g-mx-minus-15 g-pr-10 g-pl-10');

                // اسکرول کردن صفحه به بالای صفحه به هنگام کلیک بر روی منوهای ناویگیشن
                $('#mega-menu-label-5').click(function () {
                    window.scrollTo(0, 0);
                });
                $('#mega-menu-label-6').click(function () {
                    window.scrollTo(0, 0);
                });
                $('#mega-menu-label-2').click(function () {
                    window.scrollTo(0, 0);
                });

                $('#smallFilterDiv').on('click', function () {
                    showSideBar();
                });

                $('#showSortBtn').on('click', function () {
                    $('#showSortBtn').hide();
                    $('#closeSortBtn').show();
                });

                $(document).on('click', function () {
                    $('#closeSortBtn').hide();
                    $('#showSortBtn').show();
                });

            } else {
                $('#smallDevice').remove();
                $('.smallDevice').remove();

                $('#smallFilterDiv').on('click', function () {
                    showSideBar();
                });
            }

            if ($('#productGallery').length > 0 && $('#productGallery').hasClass('largeDevice')) {
                magnify("img1", 3);
                if ($('#img2').length > 0)
                    magnify("img2", 3);
                if ($('#img3').length > 0)
                    magnify("img3", 3);
                if ($('#img4').length > 0)
                    magnify("img4", 3);
                if ($('#img5').length > 0)
                    magnify("img5", 3);
                if ($('#img6').length > 0)
                    magnify("img6", 3);
                if ($('#img7').length > 0)
                    magnify("img7", 3);
                if ($('#img8').length > 0)
                    magnify("img8", 3);
                if ($('#img9').length > 0)
                    magnify("img9", 3);
                if ($('#img10').length > 0)
                    magnify("img10", 3);
                if ($('#img11').length > 0)
                    magnify("img11", 3);
                if ($('#img12').length > 0)
                    magnify("img12", 3);
            }

            if (!$('#productDiv').length > 0) {
                $('#noProduct').show();
            }

            if ($('#productContainer').length > 0) {
                $('input[name="gender"]:checked').each(function () {
                    let id = $(this).attr('id'), filterDiv = $('#filters-on-gender');
                    gender.push(id.replace(/[^0-9]/gi, ''));
                    if (id === 'gender-all') {
                        $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">جنسیت: همه</span>');
                        return false;
                    } else {
                        $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                        $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                    }
                });

                $('input[name="category"]:checked').each(function () {
                    let id = $(this).attr('id'), filterDiv = $('#filters-on-cat');
                    category.push(id);
                    if (id === 'cat-all') {
                        $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">دسته بندی: همه</span>');
                        return false;
                    } else {
                        $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                        $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                    }
                });

                $('input[name="size"]:checked').each(function () {
                    let id = $(this).attr('id'), filterDiv = $('#filters-on-size');
                    size.push(id);
                    if (id === 'size-all') {
                        $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">سایز: همه</span>');
                        return false;
                    } else {
                        $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                        $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                    }
                });

                $('input[name="color"]:checked').each(function () {
                    let id = $(this).attr('id'), filterDiv = $('#filters-on-color');
                    color.push(id.replace(/[^0-9]/gi, ''));
                    if (id === 'color-all') {
                        $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">رنگ: همه</span>');
                        return false;
                    } else {
                        $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                        $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                    }
                });
            }

            if ($('#completeProfileHint').length > 0) {
                if ($('#user-name').val() === '' || $('#user-family').val() === '' ||
                    $('#user-notionalId') === '' || $('#birthday-day').val() === 'روز' ||
                    $('#birthday-mon') === 'ماه' || $('#birthday-year').val() === 'سال' ||
                    $('input[name="gender"]') === '' || $('#phoneNumber').val() === '' || $('#phonePreNumber').val() === '' ||
                    $('#state') === '' || $('#city').val() === '') {
                    $('#completeProfileHint').removeClass('d-none');
                }
            }
        });

        $(window).scroll(function (event) {
            if ($('.filterApply').length > 0) {

                let st = $(this).scrollTop();
                if (st - lastScrollTop > 500) {
                    filtering(0);
                } else {
                    return true;
                }

                if ($('#filterDiv').css('display') === 'none') {
                    $('#productContainer').children().each(function () {
                        if ($(this).hasClass('col-lg-4')) {
                            $(this).removeClass('col-lg-4');
                            $(this).addClass('col-lg-3');
                        }
                    })
                }
                lastScrollTop = st;
            }
        });

        $(document).bind( "mouseup touchend", function(e){
            let container = $(".outSideClick");

            // if click on out side container
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.outSideClick').addClass('d-none');
            }
        });

        $(window).bind('beforeunload', function () {
            loaderShow();
        });

        $(window).on('pageshow', function () {
            $('#load').hide();
        });

        document.onreadystatechange = function () {
            let state = document.readyState;
            if (state === 'complete') {
                $(document.body).removeClass('me-position-fix');
                $(document.body).addClass('me-position-normally');
            }
        }

        function loaderShow() {
            let loader = '<div id="load" class="load"></div>';
            $('body').prepend(loader);
        }

        // نمایش فیلد جستجو در ناویگیشن
        $('#searchIcon').on('click', function () {
            $('#searchForm').removeClass('d-none');
            $('#searchInput').focus();
        });

        function newConnection() {
            if ($('#loginAlert').text() === 'login') {
                window.location = '/Customer-Connection';
            } else
                alert('لطفا ابتدا وارد شوید.');
        }

        function submitButton(ele, waitingIcon) {
            ele.hide();
            $('#' + waitingIcon).show();
            if ($('#question').val().length < 4) {
                $('#waitingSendMsg').hide();
                ele.show();
                alert('پیغامتان را کامل بنویسید.');
            } else
                $('#customerMsgForm').submit();
        }

        // ------------------------------------------فیلترینگ صفحه محصولات-----------------------------------------------
        if ($('#productContainer').text() === ' ') {
            $('#noProduct').show();
        }

        if ($('#productContainer').length > 0) {
            $('input[name="gender"]:checked').each(function () {
                gender.push($(this).attr('id').replace(/[^0-9]/gi, ''));
            });

            $('input[name="category"]:checked').each(function () {
                category.push($(this).attr('id'));
            });
            $('input[name="size"]:checked').each(function () {
                size.push($(this).attr('id'));
            });
            $('input[name="color"]:checked').each(function () {
                color.push($(this).attr('id').replace(/[^0-9]/gi, ''));
            });
        }

        $('input[name="gender"]').on('change', function () {
            $('#noProduct').hide();
            gender = [];
            $('#loadProduct').removeClass('d-none');
            $('#filters-on').removeClass('d-none');
            $('#filters-on-label').removeClass('d-none');
            $('#filters-on-gender').empty();
            $('#filters-on-gender').removeClass('d-none');

            $('input[name="gender"]:checked').each(function () {
                let id = $(this).attr('id'), filterDiv = $('#filters-on-gender');
                gender.push(id.replace(/[^0-9]/gi, ''));
                if (id === 'gender-all') {
                    $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">جنسیت: همه</span>');
                    gender.push(0, 1, 2, 3, 4, 5);
                    return false;
                } else {
                    $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                    $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                }
            });
            // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
            lastScrollTop = $(window).scrollTop();
            filtering(1);

            if (!$('#lineBreak').length)
                $('#noProduct').show();
        });

        $('input[name="category"]').on('change', function () {
            $('#noProduct').hide();
            category = []
            $('#loadProduct').removeClass('d-none');
            $('#filters-on').removeClass('d-none');
            $('#filters-on-label').removeClass('d-none');
            $('#filters-on-cat').empty();
            $('#filters-on-cat').removeClass('d-none');

            $('input[name="category"]:checked').each(function () {
                let id = $(this).attr('id'), filterDiv = $('#filters-on-cat');
                category.push(id);
                if (id === 'cat-all') {
                    $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">دسته بندی: همه</span>');
                    category.push('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q');
                    return false;
                } else {
                    $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                    $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                }
            });

            // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
            lastScrollTop = $(window).scrollTop();
            filtering(1);
            if (!$('#lineBreak').length)
                $('#noProduct').show();
        });

        $('input[name="size"]').on('change', function () {
            $('#noProduct').hide();
            size = [];
            $('#loadProduct').removeClass('d-none');
            $('#filters-on').removeClass('d-none');
            $('#filters-on-label').removeClass('d-none');
            $('#filters-on-size').empty();
            $('#filters-on-size').removeClass('d-none');

            $('input[name="size"]:checked').each(function () {
                let id = $(this).attr('id'), filterDiv = $('#filters-on-size');
                size.push(id);
                if (id === 'size-all') {
                    $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">سایز: همه</span>');
                    size.push('XS', 'S', 'L', 'M', 'XL', 'XXL', 'XXXL','Free');
                    return false;
                } else {
                    $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                    $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                }
            });
            // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
            lastScrollTop = $(window).scrollTop();
            filtering(1);
            if (!$('#lineBreak').length)
                $('#noProduct').show();
        });

        $('input[name="color"]').on('change', function () {
            $('#noProduct').hide();
            color = [];
            $('#filters-on').removeClass('d-none');
            $('#filters-on-label').removeClass('d-none');
            $('#filters-on-color').empty();
            $('#filters-on-color').removeClass('d-none');
            $('#loadProduct').removeClass('d-none');

            $('input[name="color"]:checked').each(function () {
                let id = $(this).attr('id'), filterDiv = $('#filters-on-color');
                color.push(id.replace(/[^0-9]/gi, ''));
                if (id === 'color-all') {
                    $(filterDiv).append('<span class="btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5">رنگ: همه</span>');
                    color.push(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                    return false;
                } else {
                    $(filterDiv).append($(this).parent().closest('.form-group').find('span').clone());
                    $(filterDiv).find('span').addClass('btn cursor-default btn-sm u-btn-outline-primary u-btn-hover-v2-1 g-font-weight-600 g-letter-spacing-0_5 g-brd-2 rounded-0 g-mr-5 g-mb-5');
                }
            });

            // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
            lastScrollTop = $(window).scrollTop();
            filtering(1);
            if (!$('#lineBreak').length)
                $('#noProduct').show();
        });

        function filtering(filterChange) {
            console.log('gender='+gender,'\n category='+category,'\n size='+size,'\n priceMin='+priceMin,'\n priceMax='+priceMax,'\n color='+color);
            if (filterChange === 1)
                $('#productContainer').empty();
            $.ajax({
                type: 'GET',
                async: false,
                url: '/Customer-Product-Custom-Filter/'
                    + JSON.stringify(gender) + '/'
                    + JSON.stringify(category) + '/'
                    + JSON.stringify(size) + '/'
                    + priceMin + '/'
                    + priceMax + '/'
                    + JSON.stringify(color) + '/'
                    + filterChange,
                success: function (data) {
                    // console.log(data);
                    $('#loadProduct').addClass('d-none');
                    $('#productTitle').text('نتایج فیلترها');
                    $('#productContainer').append(data);
                }
            });
        }

        $('#priceFilterSubmit').on('click', function () {
            $('#noProduct').hide();
            priceMin = $('#price-min').val().replace(new RegExp(',', 'g'), "");
            priceMax = $('#price-max').val().replace(new RegExp(',', 'g'), "");
            $('#price-all').prop('checked', false);
            $('#price-all').prop('disabled', false);
            $('#filters-on-price').find('span').text(priceMin + ' تا ' + priceMax);
            $('#filters-on').removeClass('d-none');
            $('#filters-on-label').removeClass('d-none');
            if (priceMax > priceMin)
                // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
                lastScrollTop = $(window).scrollTop();
            filtering(1);

            if (!$('#lineBreak').length)
                $('#noProduct').show();
        });

        function priceAll() {
            $('#noProduct').hide();
            priceMin = 1000;
            priceMax = 100000000;
            $('#filters-on-price').find('span').text('قیمت: همه');
            // $('html, body').animate({scrollTop: $('#contentDiv').offset().top}, 1000);
            lastScrollTop = $(window).scrollTop();
            filtering(1);
            $('#price-all').prop('disabled', true);
            $('#price-min').val('');
            $('#price-max').val('');
            if (!$('#lineBreak').length)
                $('#noProduct').show();
        }

        // سبز کردن منوهای فعال در ناویگیشن
        jQuery(function () {
            jQuery('#femaleCat').hover(function () {
                if ((this, '.hs-mega-menu-opened').length)
                    jQuery('#mega-menu-label-4', this).addClass('g-color-primary');
            }, function () {
                jQuery('#mega-menu-label-4', this).removeClass('g-color-primary');
            });

            jQuery('#maleCat').hover(function () {
                if ((this, '.hs-mega-menu-opened').length)
                    jQuery('#mega-menu-label-5', this).addClass('g-color-primary');
            }, function () {
                jQuery('#mega-menu-label-5', this).removeClass('g-color-primary');
            });

            jQuery('#kidsCat').hover(function () {
                if ((this, '.hs-mega-menu-opened').length)
                    jQuery('#mega-menu-label-6', this).addClass('g-color-primary');
            }, function () {
                jQuery('#mega-menu-label-6', this).removeClass('g-color-primary');
            });

            jQuery('#spacialSale').hover(function () {
                if ((this, '.hs-mega-menu-opened').length)
                    jQuery('#mega-menu-label-2', this).addClass('g-color-primary');
            }, function () {
                jQuery('#mega-menu-label-2', this).removeClass('g-color-primary');
            });
        });

        // rating
        $('.stars a').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                $('.stars span, .stars a').removeClass('myActive');

                $(this).addClass('myActive');
                $('.stars span').addClass('myActive');
            }
        });

        // input rate
        $('.ratingContainer a').on('click', function () {
            if ($('#loginAlert').text() === 'login')
                addVote($(this).text(), 'ratingProduct');
            else
                alert('تا زمانیکه داخل نشوید نمره شما ثبت نمی گردد.');
        });

        // input unlike
        $('#customerLike').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                $(this).addClass('d-none');
                $('#customerUnlike').removeClass('d-none');
                $('#likeHint').removeClass('d-none');
                addVote('false', 'likeProduct');
            } else
                alert('تا زمانیکه داخل نشوید محصول به لیست علاقه مندیهایتان افزوده نمی شود.');
        });

        // input like
        $('#customerUnlike').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                $(this).addClass('d-none');
                $('#likeHint').addClass('d-none');
                $('#customerLike').removeClass('d-none');
                addVote('true', 'likeProduct');
            } else
                alert('تا زمانیکه داخل نشوید محصول به لیست علاقه مندیهایتان افزوده نمی شود.');
        });

        // send comment
        $('#sendComment').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                let dt = new Date(),
                    time = 'newComment' + dt.getDay() + dt.getHours() + dt.getMinutes() + dt.getSeconds() + dt.getMilliseconds();
                addVote($('#addCustomerComment').val(), 'comment');
                $('#commentContainer').append($(".newCustomerComment").children().last().clone(true).prop('id', time).removeClass('d-none'));
                $('#' + time).find('h5').text($('#customerID').text());
                $('#' + time).find('p').text($('#addCustomerComment').val());
                $('#' + time).find('#timeComment').text('امروز');
                $('#addCustomerComment').val('');
                $('#sendComment').attr('disabled', 'disabled');
            } else
                alert('لطفا نخست داخل شوید.');
        });

        // Send Comment Button Enable/Disable
        $('#addCustomerComment').on('input', function () {
            if ($(this).val() !== '')
                $('#sendComment').removeAttr('disabled');
            else
                $('#sendComment').attr('disabled', 'disabled');
        });

        // Like Comment
        $('[id ^="likeComment"]').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                let like = $(this).find('span'),
                    id = $(this).attr('id').replace(/[^0-9]/gi, '');

                $('#CommentID').text($('#CommentID' + id).text());

                if ($(this).hasClass('g-color-primary')) {
                    addVote('0', 'likeComment');
                    like.text(parseInt(like.text()) - 1);
                    $(this).removeClass('g-color-primary');
                } else {
                    addVote('1', 'likeComment');
                    like.text(parseInt(like.text()) + 1);
                    $(this).addClass('g-color-primary');

                    if ($('#unlikeComment' + id).hasClass('g-color-red')) {
                        addVote('-1', 'likeComment');
                        $('#unlikeComment' + id + ' span').text((parseInt($('#unlikeComment' + id + ' span').text()) - 1));
                        $('#unlikeComment' + id).removeClass('g-color-red');
                    }
                }
            } else
                alert('لطفا نخست داخل شوید.');
        });

        // Dislike Comment
        $('[id ^="unlikeComment"]').on('click', function () {
            if ($('#loginAlert').text() === 'login') {
                let like = $(this).find('span'),
                    id = $(this).attr('id').replace(/[^0-9]/gi, '');

                $('#CommentID').text($('#CommentID' + id).text());

                if ($(this).hasClass('g-color-red')) {
                    addVote('0', 'unLikeComment');
                    like.text(parseInt(like.text()) - 1);
                    $(this).removeClass('g-color-red');
                } else {
                    addVote('1', 'unLikeComment');
                    like.text(parseInt(like.text()) + 1);
                    $(this).addClass('g-color-red');

                    if ($('#likeComment' + id).hasClass('g-color-primary')) {
                        addVote('-1', 'unLikeComment');
                        $('#likeComment' + id + ' span').text((parseInt($('#likeComment' + id + ' span').text()) - 1));
                        $('#likeComment' + id).removeClass('g-color-primary');
                    }
                }
            } else
                alert('لطفا نخست داخل شوید.');
        });

        // Select  Input Text onFocus Customer Data Form
        $('input').on('focus', function () {
            $(this).select();
        })

        // تابع در صورت موجودی بهم اطلاع بده
        function callCustomer(id, qty) {
            let callStatus;
            if ($('#loginAlert').text() === 'login') {
                if (qty === 0) {
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-CheckCallCustomer/" + id,
                        async: false,
                        success: function (data) {
                            callStatus = data
                        }
                    });
                }
            }
            return callStatus;
        }

        // Bank Selected
        function accBank() {
            $('.custombox-content #acceptingBank').text($('input[name="bankName"]:checked').val());
        }

        // Bank Portal
        function bankingPortal(id, qty) {
            $('.custombox-content #bankingPortalBtn').hide();
            $('.custombox-content #waitingIconSubmit').show();
            if ($('#loginAlert').text() === 'login') {
                let pdID = [], error = 0, msg = 'عملیات متوقف شد. محصولات با شماره ی [';
                pdID[0] = id;
                $.ajax({
                    type: 'GET',
                    url: "/Customer-Cart-Qty-Check/" + JSON.stringify(pdID),
                    success: function (data) {
                        for (let i = 0; i < data.length; i++) {
                            if (data[i]['Qty'] === 0) {
                                msg = msg + data[i]['ID'] + '] ';
                                error = 1;
                            }
                        }
                        if (error === 0)
                            if ($('#addressID').length > 0) {
                                window.location = '/Banking-Portal/' + id + '/' + qty;
                            } else {
                                $('.custombox-content #bankingPortalBtn').show();
                                $('.custombox-content #waitingIconSubmit').hide();
                                alert('کاربر گرامی لیست آدرسهای شما خالیست.');
                            }
                        else {
                            msg = msg + ' موجودیشان تمام شده است.';
                            alert(msg);
                        }
                    }
                });
            } else {
                alert('ابتدا لطفا وارد حساب کاربری خود شوید.');
                window.location = '/login';
            }
        }

        // Call Me Exist
        $('#callMeExist button').on('click', function () {
            let productDetailID = $('input[name="size"]:checked').attr('id').replace(/[^0-9]/gi, '');
            if ($('#loginAlert').text() === 'login') {
                $.ajax({
                    type: 'GET',
                    url: "/Customer-Product-CallMe/" + productDetailID
                });
                $('#callMeExist').hide();
                $('#customerCalled').show();
            } else
                alert('لطفا نخست داخل شوید.');
        });

        // Called
        $('#customerCalled button').on('click', function () {
            let productDetailID = $('input[name="size"]:checked').attr('id').replace(/[^0-9]/gi, '');
            if ($('#loginAlert').text() === 'login') {
                $.ajax({
                    type: 'GET',
                    url: "/Customer-Product-removeCallCustomer/" + productDetailID
                });
                $('#customerCalled').hide();
                $('#callMeExist').show();
            } else
                alert('لطفا نخست داخل شوید.');
        });

        // Input Product Qty
        $('.product .js-m').on('click', function () {
            let r = $('.product .js-r').val();
            if (r > 1) {
                r--;
                $('.product .js-r').val(r);
            } else
                return false;
        });

        $('.product .js-r').on('mousedown', function (e) {
            e.preventDefault();
        })

        $('.product .js-p').on('click', function () {
            let r = $('.product .js-r').val(),
                qty = parseInt($('#colorQty').text());
            if (r < qty) {
                r++;
                $('.product .js-r').val(r);
            } else
                return false;
        });

        function qtyMinus(id) {
            // Input Cart Qty
            let r = $('#containerSelect' + id + ' .js-r').val();
            if (r > 1) {
                r--;
                $('#containerSelect' + id + ' .js-r').val(r);
            } else
                return false;
        }

        $("input[id^='basketQty']").on('mousedown', function (e) {
            e.preventDefault();
        })

        function qtyPlus(id) {
            let r = $('#containerSelect' + id + ' .js-r').val(),
                qty = parseInt($('#cartQty' + id).text());
            if (r < qty) {
                r++;
                $('#containerSelect' + id + ' .js-r').val(r);
            } else
                return false;
        }

        // set state when page loading
        $("#stateSelect > option").each(function () {
            if ($(this).val() === $('#state').val()) {
                $(this).attr('selected', true);
                changeState('stateSelect', 'citySelect');
            }
        });

        // set city when page loading
        $("#citySelect > option").each(function () {
            if ($(this).val() === $('#city').val()) {
                $(this).attr('selected', true);
            }
        });

        // set state when page loading
        $("select[id^='stateSelectReceiver-'] > option").each(function () {
            let id = $(this).parent().attr('id').replace(/[^0-9]/gi, '');
            if ($(this).val() === $('#stateReceiver' + id).val()) {
                $(this).attr('selected', true);
                changeState('stateSelectReceiver-' + id, 'citySelectReceiver-' + id);
            }
        });

        // set city when page loading
        $("select[id^='citySelectReceiver-'] > option").each(function () {
            let id = $(this).parent().attr('id').replace(/[^0-9]/gi, '');
            if ($(this).val() === $('#cityReceiver' + id).val()) {
                $(this).attr('selected', true);
            }
        });

        let
            persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g],
            arabicNumbers = [/٠/g, /١/g, /٢/g, /٣/g, /٤/g, /٥/g, /٦/g, /٧/g, /٨/g, /٩/g],
            fixNumbers = function (str) {
                if (typeof str === 'string') {
                    for (var i = 0; i < 10; i++) {
                        str = str.replace(persianNumbers[i], i).replace(arabicNumbers[i], i);
                    }
                }
                return str;
            };

        function forceEnglishNumber(val, ele, nextFocus, len) {
            if (val.length >= len) {
                val = val.slice(0, len);
                ele.val(val);
                $(nextFocus).focus();
            }
            ele.val(fixNumbers(val));
        }

        function allSwitchBtn(btn) {
            switch (btn) {
                case 'gender-all':
                    if ($('#' + btn + ':checked').length > 0) {
                        $('input[name="gender"]').prop('checked', true);
                    } else {
                        $('input[name="gender"]').prop('checked', false);
                    }
                    break;
                case 'cat-all':
                    if ($('#' + btn + ':checked').length > 0) {
                        $('input[name="category"]').prop('checked', true);
                    } else {
                        $('input[name="category"]').prop('checked', false);
                    }
                    break;
                case 'size-all':
                    if ($('#' + btn + ':checked').length > 0) {
                        $('input[name="size"]').prop('checked', true);
                    } else {
                        $('input[name="size"]').prop('checked', false);
                    }
                    break;
                case 'color-all':
                    if ($('#' + btn + ':checked').length > 0) {
                        $('input[name="color"]').prop('checked', true);
                    } else {
                        $('input[name="color"]').prop('checked', false);
                    }
                    break;
            }
        }

        // ---------------------------------------------------My Function-----------------------------------------------
        function productSearch(id, val) {
            if (val !== '')
                $.ajax({
                    type: 'GET',
                    url: "/Customer-Product-Search/" + val,
                    success: function (data) {
                        $('#' + id).removeClass('d-none');
                        $('#' + id).html(data);
                    }
                });
            else
                $('#' + id).addClass('d-none');
        }

        function minPriceAllOff(ele) {
            if ((parseInt(ele.val().replace(new RegExp(',', 'g'), "")) > 9999)
                && (parseInt($('#price-max').val().replace(new RegExp(',', 'g'), "")) < 100000000)
                && (parseInt($('#price-max').val().replace(new RegExp(',', 'g'), "")) > parseInt(ele.val().replace(new RegExp(',', 'g'), "")))) // برای برداشتن کوما از مبلغ
                $('#priceFilterSubmit').attr('disabled', false);
            else
                $('#priceFilterSubmit').attr('disabled', true);

            ele.val(ele.val().toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")); // برای افزودن کوما به مبلغ
        }

        function maxPriceAllOff(ele) {
            if ((parseInt(ele.val().replace(new RegExp(',', 'g'), "")) < 100000000)
                && (parseInt($('#price-min').val().replace(new RegExp(',', 'g'), "")) > 9999)
                && (parseInt($('#price-min').val().replace(new RegExp(',', 'g'), "")) < parseInt(ele.val().replace(new RegExp(',', 'g'), "")))) // برای برداشتن کوما از مبلغ
                $('#priceFilterSubmit').attr('disabled', false);
            else
                $('#priceFilterSubmit').attr('disabled', true);

            ele.val(ele.val().toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }

        // هایلت آپشن آدرس در هنگام قرار گرفتن ماوس بروی هر سط آدرس
        function optionHover(id) {
            $('#addressOption' + id).removeClass('g-color-gray-dark-v3');
            $('#addressOption' + id).addClass('g-color-primary');
        }

        function optionUnHover(id) {
            $('#addressOption' + id).removeClass('g-color-primary');
            $('#addressOption' + id).addClass('g-color-gray-dark-v3');
        }

        function cart() {
            if ($('#loginAlert').text() === 'login')
                window.location = '/Customer-Cart';
            else
                alert('لطفا ابتدا وارد شوید.')
        }

        function cartOrder(row) {
            let price = [],
                allPrice = 0,
                tempPrice = [],
                val = [],
                qty = [];
            $("#cartOrderForm").empty();
            $('#cartDate').text('( ' + nowDate() + ' )');
            if (row !== 0) {
                for (let i = 0; i <= row - 1; i++) {
                    qty[i] = $('#basketQty' + i).val();
                    val[i] = $('#productDetailID' + i).text();
                    $('#orderQty' + i).text(qty[i]);
                    tempPrice[i] = $('#productFinalPrice' + i).text().replace(/,/g, '');
                    price[i] = parseInt(qty[i]) * parseInt(tempPrice[i]);
                    allPrice = allPrice + price[i];
                    $('#rowNumber' + i).text(i);
                    $('#cartOrderForm').append("<input name='productDetailID" + i + "' value=" + val[i] + ">");
                    $('#cartOrderForm').append("<input name='qty" + i + "' value=" + qty[i] + ">");
                }
                $('#cartOrderForm').append("<input name='row' value=" + row + ">");
                $('#orderPrice').text(allPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
            if ($('#addressID').length > 0)
                $('.receiverStateCity').text(autoCity($('#receiverState').text(), $('#receiverCity').text(), 'onlyToOutput'));
        }

        function cartReset() {
            $('[id^="cartContainer"]').each(function (index) {
                $(this).attr('id', 'cartContainer' + index);
            });

            $('[id^="basketQty"]').each(function (index) {
                $(this).attr('id', 'basketQty' + index);
            });

            $('[id^="containerSelect"]').each(function (index) {
                $(this).attr('id', 'containerSelect' + index);
            });

            $('[id^="cartQty"]').each(function (index) {
                $(this).attr('id', 'cartQty' + index);
            });

            $('[id^="productFinalPrice"]').each(function (index) {
                $(this).attr('id', 'productFinalPrice' + index);
            });

            $('[id^="qtyM"]').each(function (index) {
                $(this).attr('id', 'qtyM' + index);
            });

            $('[id^="qtyP"]').each(function (index) {
                $(this).attr('id', 'qtyP' + index);
            });

            $('[id^="cartContainer"]').each(function (index) {
                $(this).attr('id', 'cartContainer' + index);
            });

            $('[id^="rowNumber"]').each(function (index) {
                $(this).attr('id', 'rowNumber' + index);
            });

            $('[id^="cartDelete"]').each(function (index) {
                $(this).attr('id', 'cartDelete' + index);
            });

            $('[id^="cartWaitingDelete"]').each(function (index) {
                $(this).attr('id', 'cartWaitingDelete' + index);
            });

            $('[id^="orderQty"]').each(function (index) {
                $(this).attr('id', 'orderQty' + index);
            });

            $('[id^="productDetailID"]').each(function (index) {
                $(this).attr('id', 'productDetailID' + index);
            });
        }

        function addToCart(id) {
            $('#waitingCheckCart').removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Customer-Cart-Add/" + id,
                success: function (data) {
                    console.log(data);
                    $('#waitingCheckCart').addClass('d-none');
                    $('#attachToBasket').removeClass('d-none');

                    let num = parseInt($('#basketNum').text());
                    num++;
                    $('#basketNum').text(num);
                }
            });
        }

        function cartDelete(id, key) {
            $('#cartWaitingDelete' + key).show();
            $('#cartDelete' + key).hide();
            $.ajax({
                type: 'GET',
                url: "/Customer-Cart-Delete/" + id,
                success: function (data) {
                    $('#cartCount').text(parseInt($('#cartCount').text()) - 1);
                    $('#orderRow' + key).remove();
                    $('#cartContainer' + key).remove();
                    $('#basketNum').text(parseInt($('#basketNum').text()) - 1);
                    if (data === '0') {
                        $('#cartBuyBtn').addClass('d-none');
                        $('#cartEmptyAlert').removeClass('d-none');
                    } else cartReset();
                }
            });
        }

        function checkCart(id) {
            if ($('#loginAlert').text() === 'login') {
                $.ajax({
                    type: 'GET',
                    url: "/Customer-Cart-Check/" + id,
                    success: function (data) {
                        if (data === 'empty') {
                            $('#addToBasketBtn').removeClass('d-none');
                            $('#buy').removeClass('d-none');
                        } else {
                            $('#attachToBasket').removeClass('d-none');
                            $('#buy').removeClass('d-none');
                        }
                        $('#waitingCheckCart').addClass('d-none');
                    }
                });
            } else
                $('#addToBasketBtn').removeClass('d-none');
        }

        function orderSubmit() {
            $('.custombox-content #orderSubmitBtn').hide();
            $('.custombox-content #waitingIconSubmit').show();
            let pdID = [], error = 0, msg = 'عملیات متوقف شد. محصولات با شماره ی [';
            $('[id^="productDetailID"]').each(function (index) {
                pdID[index] = $(this).text().replace(/[^0-9]/gi, '');
            });
            $.ajax({
                type: 'GET',
                url: "/Customer-Cart-Qty-Check/" + JSON.stringify(pdID),
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['Qty'] === 0) {
                            msg = msg + data[i]['ID'] + '] ';
                            error = 1;
                        }
                    }
                    if (error === 0)
                        if ($('#addressID').length > 0)
                            $('#finalCartOrderForm').submit();
                        else {
                            $('.custombox-content #orderSubmitBtn').show();
                            $('.custombox-content #waitingIconSubmit').hide();
                            alert('کاربر گرامی لیست آدرسهای شما خالیست.');
                        }
                    else {
                        msg = msg + ' موجودیشان تمام شده است.';
                        alert(msg);
                    }
                }
            });
        }

        // تابع و دستورات مربوط به افزودن رنگ و تعداد محصول از طریق آژاکس
        // --------------------------------------------------------------
        function addColor(val, id) {
            $('#addToBasketBtn').addClass('d-none');
            $('#buy').addClass('d-none');
            $('#attachToBasket').addClass('d-none');
            $('#colorContainer').empty();
            $('#waitingIconColor').show();
            $('#waitingIconQty').show();
            $('#colorQtyContainer').hide();
            if ($('#loginAlert').text() === 'login') {
                $('#waitingCheckCart').removeClass('d-none');
            }

            $.ajax({
                type: 'GET',
                url: "/Customer-Product-SizeInfo/" + id + '/' + val,
                success: function (data) {
                    $('#waitingIconColor').hide();
                    $('#waitingIconQty').hide();
                    $('#colorQtyContainer').show();
                    let temp = '', firstColorSelect = false;
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['Color'] !== temp) {
                            $('#colorContainer').append($("#sizeInfo").clone(true).removeClass('d-none').addClass('d-inline-block').prop('id', 'sizeInfo' + i));
                            $('#sizeInfo' + i + ' input').attr('id', 'color-' + data[i]["ID"]);
                            $('#sizeInfo' + i + ' input').attr('onclick', 'addQty(' + data[i]["ID"] + ',' + data[i]["Qty"] + ',"' + data[i]["PicNumber"] + '")');
                            $('#sizeInfo' + i + ' input').val(data[i]['Color']);
                            $('#sizeInfo' + i + ' label').attr('for', 'color-' + data[i]["ID"]);
                            $('#sizeInfo' + i + ' label').text(data[i]['Color']);
                            // $('#sizeInfo' + i + ' span').css("cssText", "background-color: "+data[i]['HexCode']+" !important;");
                        }
                        temp = data[i]['Color'];
                    }
                    for (let i = 0; i < data.length; i++) {
                        if ($('#color-' + data[i]["ID"]).val() === $('#firstColorInfo').text()) {
                            $('#sizeInfo' + i + ' input').trigger('click');
                            firstColorSelect = true;
                        }
                    }
                    if (firstColorSelect === false)
                        $('#sizeInfo' + 0 + ' input').trigger('click');
                }
            });
        }

        function addQty(id, qty, picNumber) {
            $('#addToBasketBtn').addClass('d-none');
            $('#buy').addClass('d-none');
            if ($('#loginAlert').text() === 'login')
                $('#waitingCheckCart').removeClass('d-none');
            $('#attachToBasket').addClass('d-none');
            checkCart(id);
            let callStatus = callCustomer(id, qty);
            $('#productDetailID').text(id);
            $('.js-r').val(1);
            $('#colorQty').text(qty);
            if (qty > 0) {
                $('#callMeExist').hide();
                $('#customerCalled').hide();
                $('#actionFormBtn').show();
                $('#boughtQty').show();
            } else {
                $('#boughtQty').hide();
                $('#actionFormBtn').hide();
                if (callStatus === 'called') {
                    $('#callMeExist').hide();
                    $('#customerCalled').show();
                } else {
                    $('#customerCalled').hide();
                    $('#callMeExist').show();
                }
            }
            $('#orderProductImg').attr('src', $('#picPath').text() + '/' + picNumber + '.jpg');
            $('#' + picNumber).trigger('click');
        }

        // Add FileName and Check Mark when Uploaded Image
        function addPathCheckMark(picID, filePathID, checkMarkID) {
            let locationElement = '';
            if (picID === 'pic5')
                locationElement = '#';
            else
                locationElement = '.custombox-content #';

            console.log(locationElement + picID);
            let pic = $(locationElement + picID),
                ext = $(locationElement + picID).val().split('.').pop().toLowerCase(),
                filePath = $(locationElement + filePathID),
                checkMark = $(locationElement + checkMarkID);

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

        function isEmpty(el) {
            return !$.trim(el.html())
        }

        function deleteProductLike(productID, pdID, idBtn) {
            $.confirm({
                title: 'حذف علاقه مندی',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#' + idBtn).hide();
                        $('#waitingLikeDelete' + idBtn.replace(/[^0-9]/gi, '')).show();
                        $.ajax({
                            type: 'GET',
                            url: "/Customer-Product-LikeProduct/" + productID + '/' + pdID + '/' + 'false',
                            success: function () {
                                $('#likeRow' + idBtn.replace(/[^0-9]/gi, '')).remove();
                                if (isEmpty($('#productLikeContainer')))
                                    $('#productLikeEmpty').removeClass('d-none').addClass('d-inline-block');
                            },
                        });
                    },
                    انصراف: function () {
                    },
                }
            });
        }

        function modalTrigger() {
            switch ($('#pageLocation').text().replace(/\d+/g, '')) {
                case 'addAddress':
                    setTimeout(function () {
                        $("#newAddressLink").trigger("click");
                    }, 1);
                    $('#submitAddress').text('ثبت آدرس جدید و ادامه خرید');
                    $('#productIDFromBuy').val($('#pageLocation').text().replace(/[^0-9]/gi, ''));
                    break;
                case 'deliveryStatus':
                    $("#filter-user-delivery").trigger("click");
                    break;
                case 'personData':
                    $("#filter-user-data").trigger("click");
                    break;
                case 'addressStatus':
                    $("#filter-user-address").trigger("click");
                    break;
                case 'returnProduct':
                    $("#filter-user-return").trigger("click");
                    break;
                case 'changePass':
                    alert('رمز عبور شما با موفقیت تغییر یافت.')
                    break;
                default:
                    break;
            }
        }

        // پر کردن فرم فاکتور فروش در هنگام نمایش مودال
        function addOrderTable() {
            $('#orderID').text($('#productID').text() + '/' + $('#productDetailID').text());
            $('#orderProductID').text($('#productDetailID').text());
            $('#orderProductName').text($('#productName').text() + ' ' + $('#productModel').text());
            $('#orderProductColor').text($('input[name="color"]:checked').val());
            $('#orderProductSize').text($('input[name="size"]:checked').val());
            $('#orderProductQty').text($('#productQtyBought').val());
            $('#orderProductUnitPrice').text($('#productFinalPrice').text());
            $('#orderProductDiscount').text($('#productDiscount').text());
            $('#orderProductUnitPrice').text($('#productUnitPrice').text());
            $('#orderProductFinalPrice').text($('#productFinalPrice').text());
            $('#orderProductQtyPrice').text(parseInt($('#productFinalPrice').text().replace(/[^0-9]/gi, '')) * parseInt($('#productQtyBought').val()));
            $('#orderProductQtyPrice').text($('#orderProductQtyPrice').text().toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $('#orderPrice').text($('#orderProductQtyPrice').text());
            $('#orderDate').text(nowDate());
            $('.receiverStateCity').text(autoCity($('#receiverState').text(), $('#receiverCity').text(), 'onlyToOutput'));
        }

        // تابع اضافه کردن نظرات
        function addVote(val, voteType) {
            console.log(parseInt($('#productDetailID').text()), val, voteType);
            switch (voteType) {
                case 'likeProduct':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-LikeProduct/" + parseInt($('#productID').text()) + '/' + parseInt($('#productDetailID').text()) + '/' + val,
                        success: function (data) {
                            console.log(data);
                        }
                    });
                    break;

                case 'ratingProduct':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-RatingProduct/" + parseInt($('#productID').text()) + '/' + parseInt($('#productDetailID').text()) + '/' + val,
                        success: function (data) {
                            $('#voteID').text(data);
                        }
                    });
                    break;

                case 'comment':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-NewComment/" + parseInt($('#productID').text()) + '/' + val,
                        success: function (data) {
                            console.log(data);
                            $('#voteID').text(data);
                        }
                    });
                    break;

                case 'likeComment':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-LikeComment/" + parseInt($('#CommentID').text()) + '/' + val,
                    });
                    break;

                case 'unLikeComment':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-UnlikeComment/" + parseInt($('#CommentID').text()) + '/' + val,
                    });
                    break;

                case 'cartProductLike':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-LikeProduct/" + val + '/' + 'true',
                        success: function () {
                            console.log(key);
                            $('#cartLike' + key).removeClass('d-none');
                            $('#cartUnlike' + key).addClass('d-none');
                        }
                    });
                    break;
                case 'cartProductUnlike':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-LikeProduct/" + val + '/' + 'false',
                        success: function (data) {
                            $('#cartLike' + key).removeClass('d-none');
                            $('#cartUnlike' + key).addClass('d-none');
                        }
                    });
                    break;
            }
        }

        function showAddress(thisID) {
            $(thisID).hide();
            $('#add-address-container').removeClass('d-none').addClass('d-inline-block');
        }

        //  تابع زیر جهت فوکوس خودکار روی عنصری خاص در هر جای سند
        // کافیست نام تابع زیر در رویداد مورد نظر صدا زده شود
        function manuelFocus() {
            setTimeout(function () {
                $('.focusInput').focus();
            }, 500);
        }

        function closeSideBar() {
            $('.collapse').collapse('hide');
            $('#filterDiv').css('display', 'none');
            $('#smallFilterDiv').css('display', 'block');
            $('#contentDiv').removeClass('col-md-9');
            $('#contentDiv').addClass('col-md-12');
            $('#productContainer > div').removeClass('col-lg-4');
            $('#productContainer > div').addClass('col-lg-3');
            $('#filterContent').removeClass('justify-content-end');
            $('#filterContent').addClass('justify-content-between');
            $('#productTitle').hide();
        }

        function showSideBar() {
            $('#filterDiv').css({
                opacity: 0,
                display: 'block'
            }).animate({opacity: 1}, {
                duration: 1000,
                queue: false,
                easing: 'easeOutBounce'
            });
            $('#smallFilterDiv').css('display', 'none');
            $('#contentDiv').removeClass('col-md-12');
            $('#contentDiv').addClass('col-md-9');
            $('#productContainer > div').removeClass('col-lg-3');
            $('#productContainer > div').addClass('col-lg-4');
            $('#filterContent').removeClass('justify-content-between');
            $('#filterContent').addClass('justify-content-end');
            $('#productTitle').show();
        }

        function closeOtherMenu() {
            if ($('#btnMenu').attr('aria-expanded') === 'false') {
                $('#otherMenu').attr("style", "display: none !important;");
            } else
                $('#otherMenu').removeAttr('style');
        }

        function confirmLogout() {
            $.confirm({
                title: 'خروج',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = 'logout';
                        event.preventDefault();
                        document.getElementById('logout-customer-form').submit();
                    },
                    انصراف: function () {
                        $.alert('عملیات خروج از حساب لغو شد.');
                    },
                }
            });
        }

        function showPanel(ele) {
            switch (ele) {
                case 'data':
                    $('#user-data').css('display', 'block');
                    $('#user-address').css('display', 'none');
                    $('#user-bought').css('display', 'none');
                    $('#user-delivery').css('display', 'none');
                    $('#user-like').css('display', 'none');
                    $('#user-return').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-data').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-data').offset().top}, 800);
                    break;
                case 'address':
                    $('#user-address').css('display', 'block');
                    $('#user-data').css('display', 'none');
                    $('#user-bought').css('display', 'none');
                    $('#user-delivery').css('display', 'none');
                    $('#user-like').css('display', 'none');
                    $('#user-return').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-address').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-address').offset().top}, 800);
                    break;
                case 'bought':
                    $('#user-bought').css('display', 'block');
                    $('#user-address').css('display', 'none');
                    $('#user-data').css('display', 'none');
                    $('#user-delivery').css('display', 'none');
                    $('#user-like').css('display', 'none');
                    $('#user-return').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-bought').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-bought').offset().top}, 800);
                    break;
                case 'delivery':
                    $('#user-delivery').css('display', 'block');
                    $('#user-bought').css('display', 'none');
                    $('#user-address').css('display', 'none');
                    $('#user-data').css('display', 'none');
                    $('#user-like').css('display', 'none');
                    $('#user-return').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-delivery').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-delivery').offset().top}, 800);
                    break;
                case 'like':
                    $('#user-like').css('display', 'block');
                    $('#user-delivery').css('display', 'none');
                    $('#user-bought').css('display', 'none');
                    $('#user-address').css('display', 'none');
                    $('#user-data').css('display', 'none');
                    $('#user-return').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-like').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-like').offset().top}, 800);
                    break;
                case 'return':
                    $('#user-return').css('display', 'block');
                    $('#user-like').css('display', 'none');
                    $('#user-delivery').css('display', 'none');
                    $('#user-bought').css('display', 'none');
                    $('#user-address').css('display', 'none');
                    $('#user-data').css('display', 'none');

                    $('.filter a').removeClass('g-color-primary').addClass('g-color-main');
                    $('#filter-user-return').removeClass('g-color-main').addClass('g-color-primary');
                    $('html, body').animate({scrollTop: $('#user-return').offset().top}, 800);
                    break;
                default:
                    break;
            }
        }

        function manuelAutoFocus(id) {
            $('#' + id).focus();
            $('#' + id).on('focus', function () {
                document.body.scrollTop = $(this).offset().top;
            });
        }

        function editUserData() {
            $('#edit').hide();
            $('#save').show();

            let clone = $('#user-data :input');
            clone.attr("readonly", false);
            clone.removeClass("g-bg-gray-light-v5");

            clone = $('.customDisable');
            clone.css('pointer-events', 'all');
            clone = $('.u-check .btn');
            clone.removeClass('g-bg-gray-light-v5');

            manuelAutoFocus('user-name');
        }

        function saveUserData() {
            $.confirm({
                title: 'بروز رسانی مشخصات فردی',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#profileUpdate').submit();
                    },
                    انصراف: function () {
                        $('#save').hide();
                        $('#edit').show();
                        let clone = $('#user-data :input');
                        clone.attr("readonly", true);
                        clone.addClass("g-bg-gray-light-v5");
                        $('#edit').removeClass("g-bg-gray-light-v5");

                        clone = $('.customDisable');
                        clone.css('pointer-events', 'none');
                        clone = $('.u-check .btn');
                        clone.addClass('g-bg-gray-light-v5');
                    },
                }
            });
        }

        function editUserAddress(num) {
            $('#editAddress' + num).hide();
            $('#saveAddress' + num).show();

            let clone = $('#accordion-13-body-' + num + ' :input');
            clone.attr("readonly", false);
            clone.removeClass("g-bg-gray-light-v5");

            clone = $('#stateCity' + num + ' select');
            clone.css('pointer-events', 'all');
            clone.removeClass('g-bg-gray-light-v5');

            manuelAutoFocus('receiver-name-' + num);
        }

        function saveUserAddress(num) {
            // let row = 'addressUpdate' + num;
            // console.log($('#'+row+' [name="receiver-state"]').val());
            $.confirm({
                title: 'بروز رسانی آدرس',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#addressUpdate' + num).submit();
                    },
                    انصراف: function () {
                        $('#saveAddress' + num).hide();
                        $('#editAddress' + num).show();

                        let clone = $('#accordion-13-body-' + num + ' :input');
                        clone.attr("readonly", true);
                        clone.addClass("g-bg-gray-light-v5");

                        clone = $('#stateCity' + num + ' select');
                        clone.css('pointer-events', 'none');
                        clone.addClass('g-bg-gray-light-v5');
                    },
                }
            });
        }

        function addUserAddress() {
            $.confirm({
                title: 'بروز رسانی آدرس',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('.custombox-content #addAddress').submit();
                    },
                    انصراف: function () {
                    },
                }
            });
        }

        function setReturnProductID(orderID, orderDetailID) {
            $('#orderDetailIDFromReturn').val(orderDetailID);
            $('#orderIDFromReturn').val(orderID);
        }

        function returnSubmit() {
            $.confirm({
                title: 'بازگشت محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('.custombox-content #returnProduct').submit();
                    },
                    انصراف: function () {
                    },
                }
            });
        }

        function deleteAddress(id, idBtn) {
            $.confirm({
                title: 'حذف آدرس',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#' + idBtn).hide();
                        $('#waitingAddressDelete' + idBtn.replace(/[^0-9]/gi, '')).show();
                        $.ajax({
                            type: 'GET',
                            url: "/Customer-Address-Delete/" + id,
                            success: function () {
                                $('#addressRow' + idBtn.replace(/[^0-9]/gi, '')).remove();
                            },
                            error: function () {
                                $('#' + idBtn).show();
                                $('#waitingAddressDelete' + idBtn.replace(/[^0-9]/gi, '')).hide();
                                alert('قبلا برای این آدرس فاکتور صادر شده است و قابل حذف نیست.');
                            }
                        });
                    },
                    انصراف: function () {
                    },
                }
            });
        }

        function activeAddress(id) {
            window.location = "/Customer-Address-Active/" + id;
        }

        // -------------------------------------------------State And City----------------------------------------------
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

        // ---------------------------------------------------Now Date--------------------------------------------------
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

        // ------------------------------------------------image magnifier ---------------------------------------------
        function magnify(imgID, zoom) {
            let img, glass, w, h, bw;
            img = document.getElementById(imgID);
            /*create magnifier glass:*/
            glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass magnifierDiv");
            /*insert magnifier glass:*/
            img.parentElement.insertBefore(glass, img);
            /*set background properties for the magnifier glass:*/
            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
            bw = 3;
            w = glass.offsetWidth / 2;
            h = glass.offsetHeight / 2;
            /*execute a function when someone moves the magnifier glass over the image:*/
            glass.addEventListener("mousemove", moveMagnifier);
            img.addEventListener("mousemove", moveMagnifier);
            /*and also for touch screens:*/
            glass.addEventListener("touchmove", moveMagnifier);
            img.addEventListener("touchmove", moveMagnifier);

            function moveMagnifier(e) {
                let pos, x, y;
                /*prevent any other actions that may occur when moving over the image*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                /*prevent the magnifier glass from being positioned outside the image:*/
                if (x > img.width - (w / zoom)) {
                    x = img.width - (w / zoom);
                }
                if (x < w / zoom) {
                    x = w / zoom;
                }
                if (y > img.height - (h / zoom)) {
                    y = img.height - (h / zoom);
                }
                if (y < h / zoom) {
                    y = h / zoom;
                }
                /*set the position of the magnifier glass:*/
                glass.style.left = (x - w) + "px";
                glass.style.top = (y - h) + "px";
                /*display what the magnifier glass "sees":*/
                glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
            }

            function getCursorPos(e) {
                let a, x = 0, y = 0;
                e = e || window.event;
                /*get the x and y positions of the image:*/
                a = img.getBoundingClientRect();
                /*calculate the cursor's x and y coordinates, relative to the image:*/
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /*consider any page scrolling:*/
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x: x, y: y};
            }
        }

        $('#js-carousel-11').on('mouseenter', function () {
            $('.magnifierDiv').removeClass('d-none');
        });

        $('#js-carousel-11').on('mouseleave', function () {
            $('.magnifierDiv').addClass('d-none');
        });
    </script>
@endsection
