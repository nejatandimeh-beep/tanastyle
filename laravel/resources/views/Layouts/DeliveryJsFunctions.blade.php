@section('DeliveryJsFunctions')
    <script>
        document.onreadystatechange = function () {
            let state = document.readyState;
            if (state === 'complete') {
                document.getElementById('load').remove();
            }
        }

        function deliveryCourier(orderDetailID, key) {
            $('#signatureDiv' + key).removeClass('d-inline-block');
            $('#signatureDiv' + key).addClass('d-none');
            $('#waitingIconTd' + key).removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Delivery-Panel-DeliveryCourier/" + orderDetailID,
                async: false,
                success: function (data) {
                    $('#waitingIconTd' + key).remove();
                    $('#checkMark' + key).removeClass('d-none');
                    setTimeout(function () {
                        $('#row' + key).remove();
                    }, 2000);
                    $('#returnTBody').html(data);
                }
            });
            $('#signatureDiv' + key).remove();
            $('#waitingIconTd' + key).removeClass('d-none');
        }

        function returnCourier(orderDetailID, key) {
            $('#returnSignatureDiv' + key).removeClass('d-inline-block');
            $('#returnSignatureDiv' + key).addClass('d-none');
            $('#returnWaitingIconTd' + key).removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Delivery-Panel-ReturnCourier/" + orderDetailID,
                async: false,
                success: function (data) {
                    $('#returnWaitingIconTd' + key).remove();
                    $('#returnCheckMark' + key).removeClass('d-none');
                    setTimeout(function () {
                        $('#returnRow' + key).remove();
                    }, 2000);
                    $('#returnTBody').html(data);
                }
            });
            $('#returnSignatureDiv' + key).remove();
            $('#returnWaitingIconTd' + key).removeClass('d-none');
        }

        function deliveryKiosk(orderDetailID, key,table) {
            let pass=$('#pass' + key), signatureDiv=$('#kioskSignatureDiv' + key), waitingIcon=$('#kioskWaitingIconTd' + key);
            if (pass.val() !== '') {
                signatureDiv.removeClass('d-inline-block');
                signatureDiv.addClass('d-none');
                waitingIcon.removeClass('d-none');
                $.ajax({
                    type: 'GET',
                    url: "/Kiosk-Check-Signature/" + pass.val(),
                    async: false,
                    success: function (data) {
                        if(data ==='passTrue'){
                            $.ajax({
                                type: 'GET',
                                url: "/Kiosk-Add-Product/" + orderDetailID + '/'+table,
                                async: false,
                                success: function (data) {
                                    waitingIcon.remove();
                                    $('#kioskCheckMark'+key).removeClass('d-none');
                                    setTimeout(function () {
                                        $('#basketRow'+key).remove();
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
    </script>
@endsection
