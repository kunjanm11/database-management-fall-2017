<!DOCTYPE html>
<html>
<head>
        <title>Transaction Details</title>
<style>
.marg{
        margin-left:30px;
}
</style>

</head>
<body>

<?php 
//session_start();
include("header.php");
$u = explode("?", $_GET['usernm']);
//$_SESSION["VAR"]=$u;
?>
<div class="marg">
<h2>Select a payment method</h2>
<!-- Giving payment options -->
<form action="transaction.php" method="GET">
        <input type="radio" name="payment" value="creditCard">  Credit Card<br>
        <input type="radio" name="payment" value="debitCard">  Debit Card<br>
        <input type="radio" name="payment" value="eCheck">  e-Check<br>
        <input type="submit" name="submit" value="Submit">
</form>
<?php
//onclick="location.href='carddetails.php?usernm=$u[0]'";
if(isset($_GET['submit'])){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=carddetails.php?usernm=$u[0]\">";
}
?>
</div><br><br><br><br>
<?php
include("footer.php");
?>

</body>
</html>

