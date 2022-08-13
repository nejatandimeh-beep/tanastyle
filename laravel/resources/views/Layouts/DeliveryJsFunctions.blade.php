@section('DeliveryJsFunctions')
    <script>
        if ($('#kiosk-panel').length > 0)
            window.setTimeout(function () {
                window.location.reload();
            }, 30000);

        function deliveryCourier(key) {
            $('#signatureDiv' + key).addClass('d-none');
            $('#signatureDiv' + key).removeClass('d-inline-block');
            $('#checkMark' + key).removeClass('d-none');
            setTimeout(function () {
                $('#deliveryForm' + key).submit();
            }, 2000);
        }

        function returnCourier(key) {
            $('#returnSignatureDiv' + key).addClass('d-none');
            $('#returnSignatureDiv' + key).removeClass('d-inline-block');
            $('#returnCheckMark' + key).removeClass('d-none');
            setTimeout(function () {
                $('#returnForm' + key).submit();
            }, 2000);
        }

        function deliveryKiosk(orderDetailID, key, table, sellerID) {
            let pass = $('#pass' + key), signatureDiv = $('#kioskSignatureDiv' + key),
                sellerPass = $('#sellerPass' + key),
                waitingIcon = $('#kioskWaitingIconTd' + key);
            if ($('#destination' + key).text() === '2' || $('#destination' + key).text() === '22') {
                if (pass.val() !== '') {
                    signatureDiv.removeClass('d-inline-block');
                    signatureDiv.addClass('d-none');
                    waitingIcon.removeClass('d-none');
                    $.ajax({
                        type: 'GET',
                        url: "/Kiosk-Check-Signature/" + pass.val(),
                        async: false,
                        success: function (id) {
                            if (id !== 'passFalse') {
                                $.ajax({
                                    type: 'GET',
                                    url: "/Destination-Add-Product/" + orderDetailID + '/' + table + '/' + id + '/' + $('#destination' + key).text(),
                                    async: false,
                                    success: function (data) {
                                        waitingIcon.remove();
                                        $('#kioskCheckMark' + key).removeClass('d-none');
                                        setTimeout(function () {
                                            $('#basketRow' + key).remove();
                                        }, 2000);
                                    }
                                });
                                signatureDiv.remove();
                                signatureDiv.removeClass('d-none');
                            } else {
                                alert('امضاء نامعتبر');
                                signatureDiv.addClass('d-inline-block');
                                signatureDiv.removeClass('d-none');
                                waitingIcon.addClass('d-none');
                            }
                        }
                    });
                }
            } else {
                if (sellerPass.val() !== '') {
                    signatureDiv.removeClass('d-inline-block');
                    signatureDiv.addClass('d-none');
                    waitingIcon.removeClass('d-none');
                    $.ajax({
                        type: 'GET',
                        url: "/Seller-Check-Signature/" + sellerPass.val() + '/' + sellerID,
                        async: false,
                        success: function (id) {
                            if (id !== 'passFalse') {
                                $.ajax({
                                    type: 'GET',
                                    url: "/Destination-Add-Product/" + orderDetailID + '/' + table + '/' + id + '/' + $('#destination' + key).text(),
                                    async: false,
                                    success: function (data) {
                                        waitingIcon.remove();
                                        $('#kioskCheckMark' + key).removeClass('d-none');
                                        setTimeout(function () {
                                            $('#basketRow' + key).remove();
                                        }, 2000);
                                    }
                                });
                                signatureDiv.remove();
                                signatureDiv.removeClass('d-none');
                            } else {
                                alert('امضاء نامعتبر');
                                signatureDiv.addClass('d-inline-block');
                                signatureDiv.removeClass('d-none');
                                waitingIcon.addClass('d-none');
                            }
                        }
                    });
                }
            }


        }

        function destinationFinal(orderID, key, table) {
            let signatureDiv = $('#postSignatureDiv' + key),
                waitingIcon = $('#postWaitingIconTd' + key),
                trackingCode = $('#trackingCode' + key).val();

            if (trackingCode !== '') {
                signatureDiv.removeClass('d-inline-block');
                signatureDiv.addClass('d-none');
                waitingIcon.removeClass('d-none');
                // window.location="/Destination-Final/" + orderDetailID + '/' + table + '/' + $('#destination' + key).text() + '/' + trackingCode;
                $.ajax({
                    type: 'GET',
                    url: "/Destination-Final/" + orderID + '/' + table + '/' + $('#destination' + key).text() + '/' + trackingCode,
                    async: false,
                    success: function (data) {
                        console.log(data);
                        waitingIcon.remove();
                        $('#postCheckMark' + key).removeClass('d-none');
                        setTimeout(function () {
                            $('#basketRow' + key).remove();
                        }, 2000);
                    }
                });
                signatureDiv.remove();
                signatureDiv.removeClass('d-none');
            } else
                alert('لطفا کد رهگیری را وارد نمایید.');

        }

        function courierRequest(orderDetailID, key) {
            $('#signatureDiv' + key).removeClass('d-inline-block');
            $('#signatureDiv' + key).addClass('d-none');
            $('#waitingIconTd' + key).removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Delivery-CourierRequest/" + orderDetailID,
                async: false,
                success: function (data) {
                    $('#waitingIconTd' + key).remove();
                    $('#checkMark' + key).removeClass('d-none');
                }
            });
            $('#signatureDiv' + key).remove();
            $('#waitingIconTd' + key).removeClass('d-none');
        }

        function returnCourierRequest(orderDetailID, key) {
            $('#returnSignatureDiv' + key).removeClass('d-inline-block');
            $('#returnSignatureDiv' + key).addClass('d-none');
            $('#returnWaitingIconTd' + key).removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Return-CourierRequest/" + orderDetailID,
                async: false,
                success: function (data) {
                    $('#returnWaitingIconTd' + key).remove();
                    $('#returnCheckMark' + key).removeClass('d-none');
                }
            });
            $('#returnSignatureDiv' + key).remove();
            $('#returnWaitingIconTd' + key).removeClass('d-none');
        }

        function signatureEdit(id) {
            $('#waitingSignatureEdit').show();
            $('#signatureEditContainer').hide();

            $.ajax({
                type: 'GET',
                url: "/Administrator-Kiosk-SignatureEdit/" + $('#newSignature').val() + '/' + id,
                success: function (data) {
                    $('#waitingSignatureEdit').hide();
                    $('#successSignatureEdit').show();
                }
            });
        }
    </script>
@endsection
