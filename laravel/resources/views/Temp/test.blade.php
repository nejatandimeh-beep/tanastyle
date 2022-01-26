<html>
<head>
</head>
<body>
<?php
echo "<h4>IPG Sample PHP :</h4>";
echo "Merchant ID :<br>";
echo $MID="12780197";
echo "<br>";
echo "<br>ResNum :<br>";
echo $ResNum="123456";
echo "<br>";
echo "<br>Amount :<br>";
echo $Amount=1000;
echo "<br>";
echo "<br>RedirectURL :<br>";
echo $RedirectURL="tanastyle/Payment-Success";
echo "<br>";
echo "<br>ResNum1 :<br>";
echo $ResNum1="012345678901234567890123456789";
?>
<form action="https://sep.shaparak.ir/Payment.aspx" method="POST">
    <input type="hidden" name="MID" value="<?php echo $MID?>">
    <input type="hidden" name="ResNum" value="<?php echo $ResNum?>">
    <input type="hidden" name="Amount" value="<?php echo $Amount?>">
    <input type="hidden" name="RedirectURL" value="<?php echo $RedirectURL?>">
    <input type="hidden" name="ResNum1" value="<?php echo $ResNum1?>">
    <?php
    echo "<br>";
    echo "<br>";
    ?>
    <input type="Submit" name="paysubmit" value="Payment Request">
</form>
</body>
</html>
