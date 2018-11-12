<!DOCTYPE html>
<html>
<head>
        <title>Order Confirmation</title>
</head>
<body>
<?php include("header.php");?>
<h2>Thank you! Your order has been placed.</h2>
<?php
if(isset($_GET['usernm'])){
$host = "localhost";
$username = "melon";
$password = "inf385m";
$database = "melon";
$link = mysqli_connect($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

print "Your orders:<br>";
$query = "SELECT * FROM cart JOIN products ON cart.productId = products.productId Where userId = '"; //getting details from cart
$query .= $_GET['usernm'];
$query .= "'";

$result=mysqli_query($link,$query);

while($row=mysqli_fetch_array($result)){
print "Product:". $row["name"]. "Quantity:". $row["quantity"] ;
}
$today = date("m.d.y"); // today's date
print "Date of order: $today";
}
?>

<a href="https://aura.ischool.utexas.edu/melon/mainpage.php">Go back to Home page</a>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php  include("footer.php") ?>
</body>
</html>

