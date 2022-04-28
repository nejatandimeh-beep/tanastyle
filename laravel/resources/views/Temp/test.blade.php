$finalPrice=[];
foreach ($data as $key => $row){
$finalPrice[$key]=$row->UnitPrice;
if(Auth::guard('seller')->user()->NationalID!==2872282556){
$finalPrice[$key] = $finalPrice[$key]-(($finalPrice[$key]*5)/100);
}
$finalPrice[$key] = (int)($finalPrice[$key]-(($finalPrice[$key]*9)/100));
$finalPrice[$key] = $finalPrice[$key]-(($finalPrice[$key]*$row->Discount)/100);
}
