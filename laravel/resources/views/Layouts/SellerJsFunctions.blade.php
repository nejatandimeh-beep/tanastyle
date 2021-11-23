@section('SellerJsFunction')

    {{--    Seller Functions--}}
    <script>
        $(window).bind('beforeunload', function () {
            loaderShow();
        });

        $(window).on('pageshow', function () {
            $('#load').hide();
        });

        // document.onreadystatechange = function () {
        //     if (state === 'complete') {
        //         document.getElementById('load').remove();
        //     }
        // }

        function loaderShow() {
            let loader = '<div id="load" class="load"></div>';
            $('body').prepend(loader);
        }

        Array.prototype.getDuplicates = function () {
            let duplicates = [];
            for (let i = 0; i < this.length; i++) {
                if (this[i] !== '')
                    if (duplicates.hasOwnProperty(this[i])) {
                        duplicates[this[i]].push(i);
                        $('#colorImgDiv' + i).addClass('d-none');
                        $('#img-file-label' + i).addClass('d-none');
                        $('#repeatColorMsg' + i).removeClass('d-none');
                        $('#pic' + i).attr('id', 'repeat' + i);
                    } else if (this.lastIndexOf(this[i]) !== i) {
                        duplicates[this[i]] = [i];
                        $('#colorImgDiv' + i).removeClass('d-none');
                        $('#img-file-label' + i).removeClass('d-none');
                        $('#repeatColorMsg' + i).addClass('d-none');
                        $('#repeat' + i).attr('id', 'pic' + i);
                    } else {
                        $('#colorImgDiv' + i).removeClass('d-none');
                        $('#img-file-label' + i).removeClass('d-none');
                        $('#repeatColorMsg' + i).addClass('d-none');
                        $('#repeat' + i).attr('id', 'pic' + i);
                    }
            }
        }

        $('.customTooltip').on('click', function () {
            let color = $(this).find(">:first").text() + $(this).parent().closest('div').attr('id')[0],
                colorList = [],
                colorText = color.replace(/\d+/g, ''),
                id = $(this).parent().closest('div').attr('id').substring(2);
            $('#colorBtn' + id).text(colorText);
            $('#hexCode' + id).attr('value', hexc($(this).css('backgroundColor')));
            console.log(hexc($(this).css('backgroundColor')));
            $('#color' + id + ' option').val(color);
            $('#colorModal' + id).modal('toggle');
            $('#lblColor' + id).removeClass('g-color-red');

            $('[name^="color"]').each(function (i, obj) {
                colorList[i] = $('#color' + i + ' option').val().replace(/\d+/g, '');
            });
            colorList.getDuplicates();
            checkRepeat(id);
        });

        function hexc(colorval) {
            var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            delete (parts[0]);
            for (var i = 1; i <= 3; ++i) {
                parts[i] = parseInt(parts[i]).toString(16);
                if (parts[i].length == 1) parts[i] = '0' + parts[i];
            }
            return '#' + parts.join('');
        }

        function checkRepeat(ele) {
            let qty = $('#addProductSizeQty').val(), temp = [], duplicates = {}, dupes = {},
                elementNum = ele.replace(/[^0-9]/gi, '');
            $('#productColorImg' + elementNum).text($('#color' + elementNum + ' option:selected').val().replace(/\d+/g, ''));
            for (let i = 0; i < qty; i++) {
                if ($('#' + ele !== $('#size' + i).id)) {
                    temp [i] = $('#size' + i).val() + $('#color' + i).val();
                }
                $('#size' + i + ' option').removeClass('g-color-red');
                $('#sizeRow-' + i).removeClass('g-color-red');
                $('#sizeRow-' + i + ' .errorInfo').addClass('d-none');
            }
            temp.forEach((item, index) => {
                dupes[item] = dupes[item] || [];
                dupes[item].push(index);
            });

            for (let index in dupes)
                if (dupes[index].length > 1)
                    duplicates = dupes[index];

            for (let i = 0; i < duplicates.length; i++) {
                $('#size' + duplicates[i] + ' option:selected').addClass('g-color-red');
                $('#sizeRow-' + duplicates[i]).addClass('g-color-red');
                $('#sizeRow-' + duplicates[i] + ' .errorInfo').removeClass('d-none');
            }

            return duplicates.length;
        }

        $('#addProductBtn').on('click', function (event) {
            let r = checkRepeat('size0'), err = '', qty = $('#addProductSizeQty').val();
            if (typeof r !== "undefined") err = 'size';
            if ($('#addProductModel').val() === '') {
                err = 'model';
                $('#lblModel').addClass('g-color-red');
            }
            if ($('#addProductBrand').val() === '---') {
                err = 'brand';
                $('#lblBrand').addClass('g-color-red');
            }
            if ($('#addProductDetail').val() === '') {
                err = 'detail';
                $('#lblDetail').addClass('g-color-red');
            }
            if ($('#unitPrice').val() === '') {
                err = 'unitPrice';
                $('#lblUnitPrice').addClass('g-color-red');
            }
            if ($('#discount').val() === '') {
                err = 'discount';
                $('#lblDiscount').addClass('g-color-red');
            }
            // قرمز کردن بوردر عکسها هنگام وقوع خطا
            for (let i = 0; i < qty; i++) {
                if ($('#pic' + i).val() === '') {
                    err = 'img';
                    $('#img-file-label' + i).addClass('g-color-red');
                }
                if ($('#color' + i + ' option').val() === '') {
                    $('#lblColor' + i).addClass('g-color-red');
                    err = 'color';
                }
            }
            if (err !== '') {
                $('#errorMsg').removeClass('d-none');
                event.preventDefault();
            }
        });

        $('form').on('change', function () {
            $('#errorMsg').addClass('d-none');
        });

        // ---------------------------------- Ajax Search ----------------------------------------
        // Live Search with Key Up AJAX
        function keyUpSearch(id, q) {
            if (q === '')
                $('#' + id).css('display', 'none');
            else
                $('#' + id).css('display', 'block');

            $.ajax({
                url: "/Seller-Search-Product",
                data: {'pname': q, 'id': id},
                success: function (data) {
                    $('#' + id).html(data);
                }
            });
        }

        // Live Search Click with AJAX
        function ClickSearch(filterID, value) {
            switch (filterID) {
                case 'storeName':
                case 'saleName':
                    $('#' + filterID).html("");
                    break;
                case 'amountCode':
                    $('#' + filterID).html("");
                    break;
                default:
                    break;
            }
            window.location = '/Seller-Search-Product/' + filterID + '/' + value;
        }

        // ---------------------------------- End Ajax Search -------------------------------------

        // ---------------------------------- Table Search ----------------------------------------

        // -----------------> Store Filters

        // Store -> Name Product Key Up Search
        $('#storeProduct_search').on('keyup', function () {
            let query = $(this).val();
            keyUpSearch('storeName', query);
        });

        // Store -> Name Product Click Search
        $('#storeName').on('click', 'li', function () {
            let value = $(this).text();
            ClickSearch('storeName', value);
        });

        // Store -> Gender Product Click Search
        $('#storeGender').on('change', function () {
            let value = $(this).val();
            ClickSearch('storeGender', value);
        });

        // -----------------> Sale Filters

        // Sale -> Name Product Key Up Search
        $('#saleProduct_search').on('keyup', function () {
            let query = $(this).val();
            keyUpSearch('saleName', query);
        });

        // Sale -> Name Product Click Search
        $('#saleName').on('click', 'li', function () {
            let value = $(this).text();
            ClickSearch('saleName', value);
        });

        // Sale -> Gender Product Click Search
        $('#saleGender').on('change', function () {
            let value = $(this).val();
            ClickSearch('saleGender', value);
        });

        // -----------------> AmountReceived Filters

        // Sale -> Name Product Key Up Search
        $('#amountCode_search').on('keyup', function () {
            let query = $(this).val();
            keyUpSearch('amountCode', query);
        });

        // Sale -> Name Product Click Search
        $('#amountCode').on('click', 'li', function () {
            let value = $(this).text();
            ClickSearch('amountCode', value);
        });
        // ----------------> Public Search Function

        // Public -> Price Product Input Key
        function filterPriceCheck(idMin, idMax, idBtn) {
            let min = $('#' + idMin).val(),
                max = $('#' + idMax).val(),
                minTemp, maxTemp;
            $('#' + idMin).val(min.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $('#' + idMax).val(max.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            // Create Correct minTemp and MaxTemp
            if ((min === '') && (max === '')) {
                if ((idMin === 'amountMinPriceBD') || (idMin === 'amountMinPriceSD') || (idMax === 'amountMaxPriceBD') || (idMax === 'amountMaxPriceSD')) {
                    minTemp = 1;
                    $('#MinPriceTemp').val(minTemp);
                    maxTemp = 1000000000;
                    $('#MaxPriceTemp').val(maxTemp);
                } else {
                    minTemp = 10000;
                    $('#MinPriceTemp').val(minTemp);
                    maxTemp = 100000000;
                    $('#MaxPriceTemp').val(maxTemp);
                }

            } else if ((min !== '') && (max === '')) {
                minTemp = min.replace(new RegExp(',', 'g'), "");
                minTemp = parseInt(minTemp);
                $('#MinPriceTemp').val(minTemp);

                maxTemp = 100000000;
                $('#MaxPriceTemp').val(maxTemp);

            } else if ((min === '') && (max !== '')) {
                maxTemp = max.replace(new RegExp(',', 'g'), "");
                maxTemp = parseInt(maxTemp);
                $('#MaxPriceTemp').val(maxTemp);

                minTemp = 10000;
                $('#MinPriceTemp').val(minTemp);

            } else {
                minTemp = min.replace(new RegExp(',', 'g'), "");
                minTemp = parseInt(minTemp);
                $('#MinPriceTemp').val(minTemp);

                maxTemp = max.replace(new RegExp(',', 'g'), "");
                maxTemp = parseInt(maxTemp);
                $('#MaxPriceTemp').val(maxTemp);
            }
            // -------------------------------------
            if ((idMin === 'amountMinPriceBD') || (idMin === 'amountMinPriceSD') || (idMax === 'amountMaxPriceBD') || (idMax === 'amountMaxPriceSD')) {
                if ((minTemp >= 1) && (maxTemp - minTemp >= 1))
                    $('#' + idBtn).prop('disabled', false);
                else
                    $('#' + idBtn).prop('disabled', true);
            } else {
                if ((minTemp >= 10000) && (maxTemp - minTemp > 1))
                    $('#' + idBtn).prop('disabled', false);
                else
                    $('#' + idBtn).prop('disabled', true);
            }

            if ((min === '') && (max === ''))
                $('#' + idBtn).prop('disabled', true);
        }

        // Public -> Price Filter: Apply
        function applyPriceFilter(page) {
            let valueMin, valueMax;
            valueMin = $('#MinPriceTemp').val();
            valueMax = $('#MaxPriceTemp').val();

            window.location = '/Seller-Search-Product-Price/' + page + '/' + valueMin + '/' + valueMax;
        }

        // Public -> True or False Products Info
        function trueInfo(page) {
            let status;
            if ($('#false').is(":checked"))
                status = 'false';
            if ($('#true').is(":checked"))
                status = 'true';

            window.location = '/Seller-Search-Product/' + page + '/' + status;
        }

        // Public -> Product Rating
        function productRating(page, val) {
            if (val === '') {
                val = 'بدون';
            }
            window.location = '/Seller-Search-Product/' + page + '/' + val;
        }

        //-------------------------------------------------Date Calender Filter-----------------------------------------

        // -----------------------------------------------Date Calender onSubmit
        function applyDateFilter(page, idStartDay, idStartMon, idStartYear, idEndDay, idEndMon, idEndYear) {
            let startDate, endDate;
            startDate = {
                d: '',
                m: '',
                y: ''
            };
            endDate = {
                d: '',
                m: '',
                y: '',
            };

            startDate.d = $('#' + idStartDay).val();
            startDate.m = $('#' + idStartMon).val();
            startDate.y = $('#' + idStartYear).val();

            endDate.d = $('#' + idEndDay).val();
            endDate.m = $('#' + idEndMon).val();
            endDate.y = $('#' + idEndYear).val();

            startDate = JSON.stringify(startDate);
            endDate = JSON.stringify(endDate);

            window.location = '/Seller-Search-Product-Date/' + page + '/' + startDate + '/' + endDate;
        }

        function resetDate(idStartDay, idStartMon, idStartYear, idEndDay, idEndMon, idEndYear) {
            $('#' + idStartDay).val('روز');
            $('#' + idStartMon).val('ماه');
            $('#' + idStartYear).val('سال');
            $('#' + idEndDay).val('روز');
            $('#' + idEndMon).val('ماه');
            $('#' + idEndYear).val('سال');
        }

        // ---------------------------------------------------General Function------------------------------------------
        // Select Text Input on Focus
        function selectText(id) {
            $('#' + id).text(function () {
                $(this).select();
            });
        }

        // Show All Text After Click on Text
        function showAllText(element) {
            $('#' + element.id).removeClass('text-truncate');
        }

        // Set Date for Seller Navigation
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
            $('#panelPersianDate').text(now);
        }

        // Set Time for Seller Navigation
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

        function incQty() {
            let val = parseInt($('#qtyInput').val()), q;
            if ((val < 20) && (val > 0)) {
                q = val + 1;
                $('#qtyInput').val(q);
            } else
                $('#qtyPlus').prop('disabled', true);
        }

        function decQty() {
            let val = parseInt($('#qtyInput').val()), q;
            if ((val < 20) && (val > 1)) {
                q = val - 1;
                $('#qtyInput').val(q);
            } else
                $('#qtyPlus').prop('disabled', true);
        }

        function applyAddQty(id) {
            let val = parseInt($('#qtyInput').val());
            $.confirm({
                title: 'حذف محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Seller-AddQty/' + id + '/' + val;
                    },
                    انصراف: function () {
                        $.alert('عملیات افزودن موجودی محصول لغو شد!');
                        $('#modalLoginForm').modal('toggle');
                    },
                }
            });
        }

        function checkCharCount(id) {
            if ($.isNumeric($('#' + id).val())) {
                let c = $('#' + id).val(),
                    count = c.length;
                switch (id) {
                    case 'creditCard1':
                        if (count === 4) {
                            $('#creditCard2').focus();
                            let c1 = $('#creditCard2').val(),
                                c2 = $('#creditCard3').val(),
                                c3 = $('#creditCard4').val();
                            if ((c1.length === 4) && (c2.length === 4) && (c3.length === 4))
                                $('#submitBtn').prop('disabled', false);
                            else
                                $('#submitBtn').prop('disabled', true);
                        } else
                            $('#submitBtn').prop('disabled', true);
                        break;
                    case 'creditCard2':
                        if (count === 4) {
                            $('#creditCard3').focus();
                            let c1 = $('#creditCard1').val(),
                                c2 = $('#creditCard3').val(),
                                c3 = $('#creditCard4').val();
                            if ((c1.length === 4) && (c2.length === 4) && (c3.length === 4))
                                $('#submitBtn').prop('disabled', false);
                            else
                                $('#submitBtn').prop('disabled', true);
                        } else
                            $('#submitBtn').prop('disabled', true);
                        break;
                    case 'creditCard3':
                        if (count === 4) {
                            $('#creditCard4').focus();
                            let c1 = $('#creditCard1').val(),
                                c2 = $('#creditCard2').val(),
                                c3 = $('#creditCard4').val();
                            if ((c1.length === 4) && (c2.length === 4) && (c3.length === 4))
                                $('#submitBtn').prop('disabled', false);
                        } else
                            $('#submitBtn').prop('disabled', true);
                        break;
                    default:
                        if (count === 4) {
                            let c1 = $('#creditCard1').val(),
                                c2 = $('#creditCard2').val(),
                                c3 = $('#creditCard3').val();
                            if ((c1.length === 4) && (c2.length === 4) && (c3.length === 4))
                                $('#submitBtn').prop('disabled', false);
                        } else
                            $('#submitBtn').prop('disabled', true);
                        $('#submitBtn').focus();
                        break;
                }
            } else {
                let txt = $('#' + id).val();
                $('#' + id).val(txt.slice(0, -1));
            }
        }

        // to Active CreditCard
        function cardActiveBtn(id) {
            window.location = '/Seller-CreditCardActive/' + id;
        }

        // -----------------------------------------------End General Function------------------------------------------

        // ------------------------Add coma to Price For Add Product Form--------------------------
        $("#unitPrice").on('input', function () {
            if ($(this).val() === '0')
                $(this).val('');

            let discount = $("#currentDiscount").val(),
                unitPrice = $(this).val(),
                temp1;

            if ($('#addProductPage').length > 0) {
                if ($("#unitPrice").val() === '') {
                    $("#BsalePrice").text('---');
                    $("#SsalePrice").text('---');
                    $("#discount").val('');
                }
            }

            $(this).val(unitPrice.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")); // add coma
            temp1 = unitPrice.replace(new RegExp(',', 'g'), ""); // remove coma
            temp1 = parseInt(temp1);
            $("#tempPrice").val(temp1);

            if (!$('#addProductPage').length > 0) {
                if (temp1 >= 10000) {
                    let calc = salePrice(discount, temp1);
                    $('#finalPrice').text(calc.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    $('#tempFinalPrice').val(calc);
                    $('#newPriceBtn').prop('disabled', false);
                } else {
                    $('#finalPrice').text('---');
                    $('#tempFinalPrice').val('');
                    $('#newPriceBtn').prop('disabled', true);
                }
            }

            $("#discount").val('');
            $("#BsalePrice").text('...');
        });

        $("#newDiscount").on('input', function () {
            if ($(this).val() === '0'){
                $(this).val('');
                return false;
            }

            let discount = $(this).val(),
                currentPrice = $("#currentPrice").val(),
                temp1;

            temp1 = parseInt(currentPrice.replace(new RegExp(',', 'g'), "")); // remove coma
            if ($(this).val() >= 1 && $(this).val() <= 99) {
                let calc = salePrice(discount, temp1);
                $('#newFinalPrice').text(calc.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                $('#tempNewFinalPrice').val(calc);
                $('#newDiscountBtn').prop('disabled', false);
            } else {
                $('#newFinalPrice').text('---');
                $('#tempNewFinalPrice').val('');
                $('#newDiscountBtn').prop('disabled', true);
            }
        });

        function salePrice(discount, unitPrice) {
            return unitPrice - ((unitPrice * discount) / 100);
        }

        // -------------------Calculate UintPrice Discount And Show in salePrice-----------------
        $("#discount").on('input', function () {
            if ($(this).val() === '0')
                $(this).val('');

            let discount = $(this).val(),
                unitPrice = $('#tempPrice').val();

            if (unitPrice >= 10000) {
                let calc = salePrice(discount, unitPrice);
                $("#BsalePrice").text(calc.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                $("#SsalePrice").text(calc.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            } else {
                $("#BsalePrice").text('قیمت پایه باید بیشتر از 10000 تومان باشد.');
                $("#SsalePrice").text('!!!');
                $("#discount").val('');
            }
            if (discount === 0 || discount==='')
                $("#BsalePrice").text('---');
        });

        // ---------------------------------- Add Image Success Icon ----------------------------
        // Add FileName and Check Mark when Uploaded Image
        function addPathCheckMark(picID, filePathID, checkMarkID) {
            let pic = $('#' + picID),
                ext = pic.val().split('.').pop().toLowerCase(),
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

        // ---------------------------------- End Add Image Success Icon ----------------------------------------

        // ---------------------------------Seller Delete And False Produc---------------------------------------
        function confirmDelete(id) {
            $.confirm({
                title: 'حذف محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Seller-Delete-Product/' + id;
                    },
                    انصراف: function () {
                        $.alert('عملیات حذف محصول لغو شد!');
                    },
                }
            });
        }

        // Seller False Product
        function confirmFalse(id) {
            $.confirm({
                title: ' گزارش اطلاعات نادرست برای محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Seller-False-Product/' + id;
                    },
                    انصراف: function () {
                        $.alert('عملیات گزارش اطلاعات اشتباه لغو شد!');
                    },

                }
            });
        }

        function confirmNewPrice(id, unitPrice, finalPrice) {
            $.confirm({
                title: 'تغییر قیمت محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Seller-ChangePrice-Product/' + id + '/' + unitPrice + '/' + finalPrice;
                    },
                    انصراف: function () {
                        $.alert('عملیات تغییر قیمت محصول لغو شد!');
                    },
                }
            });
        }

        function confirmNewDiscount(id, discount, finalPrice) {
            $.confirm({
                title: 'تغییر قیمت محصول',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    تایید: function () {
                        location.href = '/Seller-ChangeDiscount-Product/' + id + '/' + discount + '/' + finalPrice;
                    },
                    انصراف: function () {
                        $.alert('عملیات تغییر قیمت محصول لغو شد!');
                    },
                }
            });
        }

        // ------------------------------End Seller Delete And False Product---------------------------------------

        if ($('#addProductPage').length > 0) {
            let today = new Date(),
                year = today.getFullYear(),
                month = today.getMonth() + 1,
                day = today.getDay(),
                currentHours = today.getHours(),
                currentMinutes = today.getMinutes(),
                currentSeconds = today.getSeconds(),
                folderName = 'p-' + year + '.' + month + '.' + day + '-' + currentHours + '.' + currentMinutes + '.' + currentSeconds;
            $('#folderName').val(folderName);
            $('#folderName2').val(folderName);
            // console.log($('#folderName').val());
        }
        // Auto Focus in Modal Window
        $('.modal').on('shown.bs.modal', function () {
            $(this).find('[autofocus]').focus();
        });

        $(document).on('ready', function () {
            let $modal = $('#modal'),
                image = document.getElementById('sample_image'),
                cropper, inputID, inputIdFinshed = [], counter = 0;
            $('input[id^="pic"]').on('change', function (event) {
                inputID = $(this).attr('id').replace(/[^0-9]/gi, '');
                $('#fileShow' + inputID).removeClass('g-color-red');
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
                    minCropBoxWidth: 1000,
                    minCropBoxHeight: 1000,
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
                document.getElementById("img-file-label" + inputID).scrollIntoView();
            });

            $('#crop').on('click', function () {
                let canvas = cropper.getCroppedCanvas({
                    width: 1000,
                    height: 1000
                });

                canvas.toBlob(function (blob) {
                    let url = URL.createObjectURL(blob),
                        reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function () {
                        $('#imageUrl' + inputID).val(reader.result);
                        $modal.modal('hide');
                        $("#imageUrl" + inputID).clone().appendTo("#imageUploadForm");
                        $("#imgNumber").val(inputID);
                        $('#imageUploadForm').submit();
                        addPathCheckMark('pic' + inputID, 'fileShow' + inputID, 'Check' + inputID);
                        $('#img-file-label' + inputID).removeClass('g-color-red');
                    };
                });
            });

            $('#imageUploadForm').on('submit', (function (e) {
                $('#uploadingIcon' + inputID).removeClass('d-none');
                $('#uploadingText' + inputID).removeClass('d-none');
                $('#fileShow' + inputID).addClass('d-none');
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
                        inputIdFinshed[counter] = data;
                        counter++;
                        console.log("success");
                        console.log(data);
                    }
                }).done(function () {
                    for (let i = 0; i < inputIdFinshed.length; i++) {
                        $('#uploadingIcon' + inputIdFinshed[i]).addClass('d-none');
                        $('#uploadingText' + inputIdFinshed[i]).addClass('d-none');
                        $('#fileShow' + inputIdFinshed[i]).removeClass('d-none');
                    }
                });
            }));

            // Back button Force click Reload Page
            if (!!window.performance && window.performance.navigation.type == 2) {
                window.location.reload();
            }

            // Remove Element When Use Big Device
            if (window.matchMedia('screen and (min-width:900px)').matches) {
                $('#removeWhenBD').remove();
            } else {
                if ($('#mobile').length > 0)
                    $('#mobile').attr('pattern', '\d*');
            }

            // Product Table Events Success Message
            $('#overlay').modal('show');

            setTimeout(function () {
                $('#overlay').modal('hide');
            }, 3000);

            // Set Seller Navigation Date
            nowDate();
            setInterval('updateClock()', 1000);

            // Set Autofocus for Wrongly Entered Fields
            @if($errors->first('tempPrice'))
            $("#unitPrice").focus();
            @elseif($errors->first('discount'))
            $("#discount").focus();
            @elseif($errors->first('pic1'))
            $("#pic1").focus();
            @elseif($errors->first('pic2'))
            $("#pic2").focus();
            @endif

            // Set Focus Table Right to left
            if ($('.rtlPosition').length > 0)
                $('.table-responsive').animate({scrollLeft: $('.rtlPosition').position().left}, 1);

            // this code block for focus element after page load
            if ($('#focusAfterPageLoad').length > 0)
                $('html, body').animate({
                    scrollTop: $('#focusAfterPageLoad').offset().top
                }, 1);
        });
    </script>
    </html>
@endsection

