@section('AdminJsFunction')
    <script>
        $(document).on('ready', function () {
            // Set Seller Navigation Date
            nowDate();
            setInterval('updateClock()', 1000);

            if ($('#deliveryErr').length > 0) {
                $('#deliveryAlarm').removeClass('d-none');
            }

            if ($('#overlay').length > 0) {
                $('#overlay').modal('show');

                setTimeout(function () {
                    $('#overlay').modal('hide');
                }, 2000);
            }

            if ($('#cardActive').length > 0)
                $('#sellerCard').trigger('click');

            if ($('#store').length > 0)
                $('#sellerStore').trigger('click');

            if ($('#sale').length > 0)
                $('#sellerOrder').trigger('click');

            if ($('#support').length > 0)
                $('#sellerSupport').trigger('click');

            if ($('#amountReceived').length > 0)
                $('#sellerAmount').trigger('click');

            if ($('#cardContainer').length > 0)
                $('#cardContainer').css('height', $(window).height() - 100);

        });

        $(document).mouseup(function (e) {
            let container = $(".outSideClick");

            // if click on out side container
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.outSideClick').addClass('d-none');
            }
        });

        //-------------------------------------------------------Seller---------------------------------------------------------
        // to Active CreditCard
        function cardActiveBtn(id, cardId) {
            window.location = '/Administrator-Seller-CreditCardActive/' + id + '/' + cardId;
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

        //-------------------------------------------------------Ajax-----------------------------------------------------------
        function sellerSearch(id, nationalId) {
            id = '#' + id;
            $.ajax({
                type: 'GET',
                url: "/Administrator-Seller-Search/" + nationalId,
                success: function (data) {
                    console.log(data);
                    $(id).removeClass('d-none');
                    $(id).html(data);
                }
            });
        }

        //-------------------------------------------------------My Function----------------------------------------------------
        function addComa(ele){
            ele.val(ele.val().toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        }

        function editProduct() {
            $('#productData').removeAttr('disabled');
            $('#productName').focus();
            $('#save').show();
            $('#edit').hide();
        }

        function editUserData() {
            $('#userData').removeAttr('disabled');
            $('#user-name').focus();
            $('#save').show();
            $('#edit').hide();
        }

        function saveProductData() {
            $.confirm({
                title: 'بروز رسانی مشخصلت محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#productForm').submit();
                    },
                    انصراف: function () {
                        $('#save').hide();
                        $('#edit').show();
                        $('#productData').attr('disabled', 'disabled');
                    },
                }
            });
        }

        function saveUserData() {
            $.confirm({
                title: 'بروز رسانی اطلاعات کاربری',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#sellerForm').submit();
                    },
                    انصراف: function () {
                        $('#save').hide();
                        $('#edit').show();
                        $('#userData').attr('disabled', 'disabled');
                    },
                }
            });
        }

        function productDelete(id, sellerId) {
            $.confirm({
                title: 'حذف محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Administrator-Product-Delete/' + id + '/' + sellerId;
                    },
                    انصراف: function () {
                        $.alert('عملیات حذف محصول لغو شد!');
                    },
                }
            });
        }

        function productFalse(id, sellerId) {
            $.confirm({
                title: ' گزارش اطلاعات نادرست برای محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Administrator-Product-False/' + id + '/' + sellerId;
                    },
                    انصراف: function () {
                        $.alert('عملیات گزارش اطلاعات اشتباه لغو شد!');
                    },

                }
            });
        }

        function confirmDelete() {
            $.confirm({
                title: 'رد صلاحیت فروشنده جدید',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#sellerDelete').submit();
                    },
                    انصراف: function () {
                        $.alert('عملیات رد صلاحیت لغو شد!');
                    },
                }
            });
        }

        function confirmAdd() {
            $.confirm({
                title: 'حذف محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#registerForm').submit();
                    },
                    انصراف: function () {
                        $.alert('عملیات افزودن فروشنده جدید لغو شد.');
                    },
                }
            });
        }

        function confirmPay() {
            $.confirm({
                title: 'ثبت واریزی برای فروشنده',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        $('#paymentAmount').val($('#paymentAmount').val().replace(new RegExp(',', 'g'), ""));
                        $('#formPay').submit();
                    },
                    انصراف: function () {
                        $.alert('عملیات ثبت واریزی برای فروشنده لغو شد.');
                    },
                }
            });
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

        function addPathCheckMark(picID, filePathID, checkMarkID) {
            let pic = $('#' + picID),
                ext = $('#' + picID).val().split('.').pop().toLowerCase(),
                filePath = $('#' + filePathID),
                checkMark = $("#" + checkMarkID);
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

        function changeState(state, city) {
            if (city !== 'citySelectReceiver-new') {
                $('#' + city).find('option').remove().end();
                autoCity($('#' + state).val(), city, 'createOptions');
            } else {
                $('.custombox-content #' + city).find('option').remove().end();
                autoCity($('.custombox-content #' + state).val(), city, 'createOptions');
            }
        }

        function nowDate() {
            let week = ["يكشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه", "شنبه"],
                months = ["فروردين", "ارديبهشت", "خرداد", "تير", "مرداد", "شهريور", "مهر", "آبان", "آذر", "دي", "بهمن", "اسفند"],
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
            let now = week[d] + " " + day + " " + months[month - 1] + " " + year;
            $('#persianDate').text(now);
        }

        function updateClock() {
            let currentTime = new Date();
            let currentHours = currentTime.getHours();
            let currentMinutes = currentTime.getMinutes();
            let currentSeconds = currentTime.getSeconds();

            currentHours = (currentHours < 10 ? "0" : "") + currentHours;
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

            let currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;

            $("#persianTime").html(currentTimeString);
        }
    </script>
@endsection
