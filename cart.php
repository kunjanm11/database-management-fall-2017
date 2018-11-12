<!DOCTYPE html>
<html>
<head>
        <title>Cart</title>
        <style>
        tr#t01 {
                    background-color: #ffb84d;
                    height : 50px;
                }
                tr#t02 {
                    background-color: #fff5e6;
                    height : 200px;
                }
                th#t01{
                    border-spacing: 5px;
                    text-align: center;
                }
                </style>
</head>
<body>

<?php include("header.php"); ?>
        <h1>&nbsp &nbsp &nbsp Your Cart</h1>
            <?php
                if(isset($_GET['usernm'])){
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $link = mysqli_connect($host, $username, $password, $database);
                        $query = "SELECT * FROM cart JOIN products ON cart.productId = products.productId Where userId = '";
                        $query .= $_GET['usernm'];
                        $query .= "'";
                        $u = $_GET['usernm'];
                        $results = mysqli_query($link, $query);
                                    if (!$results) {
                                                        printf("Error: %s\n", mysqli_error($link));
                                                        exit();
                                                }
                                                
                        if (mysqli_num_rows($results) > 0) {
                                $rows = array();
                                $prodIds = array();
                                while($row = mysqli_fetch_array($results)){
                                                                array_push($rows, $row);
                                                        }
                                print "<div align=right style=\"margin-right:60px;height:10px;margin-top:60px;\"><form><input type='button' value='Continue Shopping' onclick=\"location.href='mainpage.php?usernm=$u'\" />

                                <input type='button' value='Checkout' onclick=\"location.href='transaction.php?usernm=$u'\"/></form></div>";
                                print "<center><table id ='t01' style=\"width:90%;\" >";
print "<b><h2><tr id ='t01'><th width= '67%'> &nbsp &nbsp &nbspItem</th><th width= '10%'> &nbsp &nbsp &nbspPrice</th><th width= '10%'> &nbsp &nbsp &nbspQuantity</th><th width= '13%'> &nbsp &nbsp &nbspTotal</th></tr></h2></b>";
                                $totarray = array();
                                foreach ($rows as $value){
                                                  echo "<br>";
                                                  $c = $value[cartId];
                                        print "<tr id ='t02'><th id ='t01' width= '64%'><img src=$value[image] height='130' width='130'>  &nbsp  $value[name]&nbsp  Size: $value[size]&nbsp <input type='button' value='Remove' onclick=\"location.href='remove.php?usernm=$u?cartId=$c'\"/></th>";
print "<th id ='t01' width= '10%'>$ $value[price]</th>";
                                        print "<th id ='t01' width= '13%'>$value[quantity]</th>";
                                        $tot =$value[price]*$value[quantity];
                                        array_push($totarray, $tot);
                                        print "<th id ='t01' width= '13%'>$ $tot</th>";
                                        print "</tr>";
                                    }

                              
                                print "</table></center><br>";
                                $fin = 0;
                                foreach ($totarray as $t){
                                        $fin += $t;
                                }
                                print "<div align=right style=\"margin-right:60px;height:10px\"><h4>Total : $ $fin</h4></div>";
                                print "<div align=right style=\"margin-right:60px;height:10px;margin-top:60px\"><input type='button' value='Continue Shopping' onclick=\"location.href='mainpage.php?usernm=$u'\" />   <input type='button' value='Checkout' onclick=\"location.href='transaction.php?usernm=$u'\"/></div><br><br>";
}
                        else{
                                Print "<br><br><br>&nbsp &nbsp &nbspYour cart is empty.<br><br><br>";
                        }
                } 
                else{
                    print "&nbsp &nbsp &nbspYou need to log in to add products to the cart.<br><br>";
            }                              
        
        ?>

<?php include("footer.php"); ?>
</body>
</html>

