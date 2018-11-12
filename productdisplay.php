<!DOCTYPE html>
<html>
<head>
        <title>product display</title>
<style>
p img {
        height:40%;
        width:40%;
        text-align:center;
}

h4{
margin-left:30px;
}
</style>
</head>
<body>
<?php include("header.php"); 
//if isset($_POST('addtocart')){
    $host = "localhost";
    $username = "melon";
    $password = "inf385m";
    $database = "melon";
    if(isset($_GET['usernm'])){
        $user = explode("?", $_GET['usernm']);
                $pid = explode("=", $user[1]);
                $fpid = $pid[1];
                $u = "?usernm=".$_GET['usernm'];
        }
        else{
                $pid = explode("?", $_GET['prod']);
                $fpid = $pid[0];
                $u = "?prod=".$fpid;
        }
    $link = mysqli_connect($host, $username, $password, $database);
    $query="SELECT * FROM products WHERE productId = ";
    $query .= $fpid;
    $productdisp=mysqli_query($link,$query);
    if (!$productdisp) {
                        printf("Error: %s\n", mysqli_error($link));
                        exit();
        }
                                                
    if (mysqli_num_rows($productdisp) > 0) {
    $result=mysqli_fetch_array($productdisp);
    print "<table align = center style='width:90%'><tr><h1>$result[brandName] $result[name]</h1></tr>";
    print "<tr><th style='height:400px;width:50%'><img src=\"$result[image]\" height='350' width='300px'></th>";
    print "<th style='width:50%'><h4>Size: $result[size] <br> Price: $ $result[price] <br> Color: $result[color]</h4>";
        
        print "<form action=\"productdisplay.php$u\" method=\"POST\"><h4>";
        ?>
        
        Quantity: <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option></select><br><br>
                
        <div style=color:blue"><button type="submit" name="submit">Add to cart</button></div>
        </h4></form><br><br><br></th></tr></table>
        <?php
        //if(isset($_POST['submit'])){
        //$productId=$_POST['productId'];
        $quantity=$_POST['quantity'];
        //$color=$_POST['color'];
        //$size=$_POST['size'];
        if(isset($_POST['submit'])){
        //print"Size: $result[size]";
        if(isset($_GET['usernm'])){
                $query3="Select * from cart WHERE productId = ";
                $query3 .= $result[productId];
                $query3 .= " AND userId = '";
        $query3 .= $user[0];
        $query3 .= "'";
                $carthis = mysqli_query($link,$query3);
       if (!$carthis) {
                        printf("Error: %s\n", mysqli_error($link));
                        exit();
                }
                                                
        if (mysqli_num_rows($carthis) > 0) {
                $row = mysqli_fetch_array($carthis);
                $upquan = $row[quantity]+1;
                $query4="Update cart SET quantity = ";
                $query4 .= $upquan;
                $query4 .= " WHERE productId = ";
                $query4 .= $result[productId];
                $query4 .= " AND userId = '";
                $query4 .= $user[0];
                $query4 .= "'";
                        mysqli_query($link, $query4);
        }
        else{
                        $query2="INSERT INTO cart (productId,quantity,color,size,userId) VALUES ('$result[productId]','$quantity','$result[color]','$result[size]','$user[0]')";
                        mysqli_query($link, $query2);
                }
                print"<h4> Your item is added to the cart</h4>";
        }
        else{
                print"<h4> Please login to add to the cart. </h4>";
        }
        }
        }
include("footer.php");
?>
</body>
</html>
