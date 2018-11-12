<!DOCTYPE html>
<html>
<head>
        <title>Card Details</title>
<style>
.marg{
        margin-left:30px;
}
</style>

</head>
<body>

<?php include("header.php");
//session_start();
//echo "$_SESSION[\"VAR\"]";
$u = explode("?", $_GET['usernm']);
?>
<div>
<form action="orderconfirm.php" method="GET">
<!-- Getting card details -->
        Enter you card number:<input type="text" name="cardNumber"><br>
        Name on the card:<input type="text" name="cardName"><br>
        Expiry date:<input type="date" name="expiry"><br>
        <input type="submit" name="submit2" value="Make payment">
</form>
</div>
<?php  
if (isset($_GET['submit2'])){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=orderconfirm.php?usernm=$u[0]\">";
}
?>

</div><br><br><br><br>
<?php
include("footer.php");
?>

</body>
</html>

