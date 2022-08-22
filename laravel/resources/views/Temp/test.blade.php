@extends('Layouts.IndexCustomer')
@section('Content')
<?   DB::table('product_order_temporary2')
    ->insert([
        'CustomerID' => Auth::user()->id,
        'ProductDetailID' => $row,
        'Qty' => $qty[$key],
        'OrderPrice' => $orderPrice,
        'PostMethod' => $postMethod,
        'PostPrice' => $postPrice,
        'OrderDetailPrice' => $FinalPriceWithoutDiscount[$key],
        'Discount' => (int)$discount[$key],
        'OrderDetailFinalPrice' => (int)$finalPrice[$key],
        'BuyMethod' => 'سبد',
    ]);
    ?>
@endsection
