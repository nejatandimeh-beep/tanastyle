@section('DeliveryJsFunctions')
    <script>
        document.onreadystatechange = function () {
            let state = document.readyState;
            if (state === 'complete') {
                document.getElementById('load').remove();
            }
        }

        function deliveryCourier(orderDetailID, key) {
            if ($('#pass' + key).val() !== '') {
                $('#signatureDiv' + key).removeClass('d-inline-block');
                $('#signatureDiv' + key).addClass('d-none');
                $('#waitingIconTd' + key).removeClass('d-none');
                $.ajax({
                    type: 'GET',
                    url: "/Delivery-Panel-sellerCheckPass/" + $('#pass' + key).val() + '/' + $('#sellerID' + key).text(),
                    async: false,
                    success: function (data) {
                        if(data ==='passTrue'){
                            $.ajax({
                                type: 'GET',
                                url: "/Delivery-Panel-DeliveryCourier/" + orderDetailID,
                                async: false,
                                success: function (data) {
                                    $('#waitingIconTd'+key).remove();
                                    $('#checkMark'+key).removeClass('d-none');
                                    setTimeout(function () {
                                        $('#row'+key).remove();
                                    }, 2000);
                                    $('#returnTBody').html(data);
                                }
                            });
                            $('#signatureDiv'+key).remove();
                            $('#waitingIconTd'+key).removeClass('d-none');
                        } else {
                            alert('امضاء نامعتبر');
                            $('#signatureDiv' + key).addClass('d-inline-block');
                            $('#signatureDiv' + key).removeClass('d-none');
                            $('#waitingIconTd' + key).addClass('d-none');
                        }
                    }
                });
            }
        }

        function returnCourier(orderDetailID, key){
            $('#returnSignatureDiv' + key).removeClass('d-inline-block');
            $('#returnSignatureDiv' + key).addClass('d-none');
            $('#returnWaitingIconTd' + key).removeClass('d-none');
            $.ajax({
                type: 'GET',
                url: "/Delivery-Panel-ReturnCourier/" + orderDetailID,
                async: false,
                success: function (data) {
                    $('#returnWaitingIconTd'+key).remove();
                    $('#returnCheckMark'+key).removeClass('d-none');
                    setTimeout(function () {
                        $('#returnRow'+key).remove();
                    }, 2000);
                }
            });
            $('#returnSignatureDiv'+key).remove();
            $('#returnWaitingIconTd'+key).removeClass('d-none');
        }
    </script>
@endsection
