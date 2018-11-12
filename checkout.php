<!DOCTYPE html>
<html>
<head>
        <title>Checkout page</title>

</head>
<body>
<?php include("header.php"); ?> 
<h2>Select a payment method</h2>

<form>
        <input type="radio" name="payment" value="creditCard">Credit Card<br>
        <input type="radio" name="payment" value="debitCard">Debit Card<br>
        <input type="radio" name="payment" value="eCheck">e-Check<br>
        <input type="submit" name="submit" value="Submit">
</form>
<?php include("footer.php"); ?>
</body>
</html>

