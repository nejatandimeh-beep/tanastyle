@section('CustomerJsFunction')
    <script>
        $(document).ready(function () {
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
                    viewMode: 1,
                    zoomable: false,
                    background: false,
                    minCropBoxWidth: 400,
                    minCropBoxHeight: 400,
                    dragCrop: true,
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
                        console.log($('#imageUrl').val());
                        $('#uploadImage').submit();
                    }
                });
            });

            if ($('#cartCount').text() === 0) {
                $('#cartBuyBtn').hide();
            }

            if ($('#productGallery').length > 0) {
                magnify("img1", 3);
                magnify("img2", 3);
                magnify("img3", 3);
                // نمایش رنگ برای اولین سایز بعد از لود شدن صفحه
                addColor($('input[id ^="inputSize"]').first().val(), parseInt($('#productID').text()));
            }

            // اسکرول صفحه به مسیر صفحه
            // if ($('.breadCrumbs').length > 0) {
            //     $('html, body').animate({scrollTop: $('.breadCrumbs').offset().top}, 1000);
            // }

            if ($('#checkLike').text() === 'like')
                $('#customerLike').removeClass('d-none');
            else {
                $('#customerUnlike').removeClass('d-none');
                $('#likeHint').removeClass('d-none');
            }

            // رفتار صفحه بعد از لود شدن صفحه در پروفایل کاربر
            modalTrigger();

            // تنظیم اندازه سبد خرید برای کمتر از 3 عدد و بیشتر از 3 عدد محصول
            let c = document.getElementById("basketContainer").childElementCount;
            if (c <= 3) {
                $('#basketContainer').removeClass('g-height-300');
                $('#basketContainer').addClass('g-height-auto');
            } else {
                $('#basketContainer').removeClass('g-height-auto');
                $('#basketContainer').addClass('g-height-300');
            }

            let mq = window.matchMedia("(max-width: 900px)");
            if (mq.matches) {
                $('#bigDevice').remove();
                $('.bigDevice').remove();

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
        });

        document.onreadystatechange = function () {
            let state = document.readyState;
            if (state === 'complete') {
                document.getElementById('load').remove();
            }
        }

        $(document).on('click', function () {
            if (!$('#searchForm').is(":hidden"))
                $('#searchForm').hide();
        });

        // بستن سبد خرید به هنگام حرکت ماوس بر روی هر کجا از صفحه
        $(document).mouseup(function (e) {
            let container = $("#myBasket");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $("#basket-bar").addClass('u-dropdown--hidden');
                $("#basket-bar").removeClass('fadeIn');
                $('#basket-bar-invoker').attr('aria-expanded', 'false');
            }
        });

        // // بستن فیلتر در هنگام برگشت به بالای صفحه
        // jQuery(function () {
        //     $(window).scroll(function () {
        //         let scroll = $(window).scrollTop();
        //         if (scroll === 0) {
        //             closeSideBar();
        //         }
        //     });
        // });

        // نمایش فیلد جستجو در ناویگیشن
        $('#searchIcon').on('click', function () {
            $('#searchForm').slideToggle(0);
            $('#searchInput').focus();
        });

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
            if ($('#loginAlert').text() === 'login') {
                window.location = '/Banking-Portal/' + id + '/' + qty;
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

        // ------------------------------------------فیلترینگ صفحه محصولات-----------------------------------------------
        $('#filterContainer').on('change', function () {
            $('#productContainer').empty();
            $('#loadProduct').removeClass('d-none');
            let gender, category, size, priceMin = $('#price-max').val(), priceMax = $('#price-min').val(), color,
                f = '1', m = '1', k = '1',
                under = '1', bottom = '1', up = '1', complete = '1',
                xs = '1', s = '1', mm = '1', l = '1', xl = '1', xxl = '1', xxxl = '1',
                whites = '1';

            if ($('#gender-all:checked').length > 0)
                gender = f + m + k;
            else {
                if (!($('#female:checked').length > 0))
                    f = '0';
                if (!($('#male:checked').length > 0))
                    m = '0';
                if (!($('#kids:checked').length > 0))
                    k = '0';

                gender = f + m + k;
            }

            if ($('#gender-all:checked').length > 0)
                category = under + bottom + up + complete;
            else {
                if (!($('#cat-under:checked').length > 0))
                    under = '0';
                if (!($('#cat-bottom:checked').length > 0))
                    bottom = '0';
                if (!($('#cat-up:checked').length > 0))
                    up = '0';
                if (!($('#cat-complete:checked').length > 0))
                    complete = '0';

                category = under + bottom + up + complete;
            }

            if ($('#size-all:checked').length > 0)
                size = xs + s + mm + l + xl + xxl + xxxl;
            else {
                if (!($('#size-xs:checked').length > 0))
                    xs = '0';
                if (!($('#size-s:checked').length > 0))
                    s = '0';
                if (!($('#size-m:checked').length > 0))
                    mm = '0';
                if (!($('#size-l:checked').length > 0))
                    l = '0';
                if (!($('#size-xl:checked').length > 0))
                    xl = '0';
                if (!($('#size-xxl:checked').length > 0))
                    xxl = '0';
                if (!($('#size-xxxl:checked').length > 0))
                    xxxl = '0';

                size = xs + s + mm + l + xl + xxl + xxxl;
            }

            if ($('#color-all:checked').length > 0)
                color = whites;
            else {
                if (!($('#color-whites:checked').length > 0))
                    whites = '0';

                color = whites;
            }

            let filters = {
                gender: gender,
                category: category,
                size: size,
                priceMin: priceMin,
                priceMax: priceMax,
                color: color,
            };
            $.ajax({
                type: 'GET',
                url: '/Customer-Product-Custom-Filter/' + JSON.stringify(filters),
                success: function (data) {
                    $('#loadProduct').addClass('d-none');
                    $('#productContainer').html(data);
                    $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');
                }
            });
        });

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
                success: function () {
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
                        } else {
                            $('#attachToBasket').removeClass('d-none');
                        }
                        $('#waitingCheckCart').addClass('d-none');
                    }
                });
            } else
                $('#addToBasketBtn').removeClass('d-none');
        }

        function orderSubmit() {
            $('#finalCartOrderForm').submit();
        }

        // تابع و دستورات مربوط به افزودن رنگ و تعداد محصول از طریق آژاکس
        // --------------------------------------------------------------
        function addColor(val, id) {
            $('#colorContainer').empty();
            $('#waitingIconColor').show();
            $('#waitingIconQty').show();
            $('#colorQtyContainer').hide();
            $.ajax({
                type: 'GET',
                url: "/Customer-Product-SizeInfo/" + id + '/' + val,
                success: function (data) {
                    $('#waitingIconColor').hide();
                    $('#waitingIconQty').hide();
                    $('#colorQtyContainer').show();
                    let temp = '';
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['Color'] !== temp) {
                            $('#colorContainer').append($("#sizeInfo").clone(true).removeClass('d-none').addClass('d-inline-block').prop('id', 'sizeInfo' + i));
                            $('#sizeInfo' + i + ' input').attr('id', 'color-' + data[i]["ID"]);
                            $('#sizeInfo' + i + ' input').attr('onclick', 'addQty(' + data[i]["ID"] + ',' + data[i]["Qty"] + ')');
                            $('#sizeInfo' + i + ' input').val(data[i]['Color']);
                            $('#sizeInfo' + i + ' label').attr('for', 'color-' + data[i]["ID"]);
                            $('#sizeInfo' + i + ' label').text(data[i]['Color']);
                        }
                        temp = data[i]['Color'];
                    }
                    $('#sizeInfo0 input').prop('checked', 'checked');
                    addQty(data[0]["ID"], data[0]['Qty']);
                }
            });
        }

        function addQty(id, qty) {
            $('#addToBasketBtn').addClass('d-none');
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

        function deleteProductLike(pdID, idBtn) {
            $.confirm({
                title: 'حذف علاقه مندی',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#' + idBtn).hide();
                        $('#waitingLikeDelete' + idBtn.replace(/[^0-9]/gi, '')).show();
                        $.ajax({
                            type: 'GET',
                            url: "/Customer-Product-LikeProduct/" + pdID + '/' + 'false',
                            success: function () {
                                $('#likeRow' + idBtn.replace(/[^0-9]/gi, '')).remove();
                                if (idBtn.replace(/[^0-9]/gi, '') === '0')
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
                    $("#newAddressLink").trigger("click");
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
                        url: "/Customer-Product-LikeProduct/" + parseInt($('#productDetailID').text()) + '/' + val,
                        success: function (data) {
                            console.log(data);
                        }
                    });
                    break;

                case 'ratingProduct':
                    $.ajax({
                        type: 'GET',
                        url: "/Customer-Product-RatingProduct/" + parseInt($('#productDetailID').text()) + '/' + val,
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
        }

        function closeOtherMenu() {
            if ($('#btnMenu').attr('aria-expanded') === 'false') {
                $('#otherMenu').attr("style", "display: none !important;");
            } else
                $('#otherMenu').removeAttr('style');
        }

        function hideSearch() {
            if (!($("#searchForm").is(":hidden")))
                $('#searchForm').slideUp(0);
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
            glass.setAttribute("class", "img-magnifier-glass");
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

    </script>
@endsection
