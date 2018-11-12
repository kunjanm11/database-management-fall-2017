<!DOCTYPE html>
<html>
<head>
        <title>Cart</title>
</head>
<body>

        <?php
                                $user = explode("?", $_GET['usernm']);
                                $cart = explode("=", $user[1]);
                                $user = $user[0];
                                $cart = $cart[1];
                if(isset($user) AND isset($cart)){
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $link = mysqli_connect($host, $username, $password, $database);
                        $query = "SELECT * FROM cart Where cartId = ";
                        $query .= $cart;
                        $results = mysqli_query($link, $query);
                        if (mysqli_num_rows($results) > 0) {
                                $row = mysqli_fetch_array($results);
                                if($row[quantity]>1){
                                        $newvalue = $row[quantity]-1;
                                        $query1 = "UPDATE cart SET quantity = ";
                                        $query1 .= $newvalue;
                                        $query1 .= " WHERE cartId = ";
                                        $query1 .= $cart;
                                        $results = mysqli_query($link, $query1);
                                        if (!$results) {
                                                                        printf("Error: %s\n", mysqli_error($link));
                                                                        exit();
                                                                }
                                }
                                elseif($row[quantity]=1){
                                        $query2 = "DELETE FROM cart WHERE cartId = ";
                                        $query2 .= $cart;
                                        mysqli_query($link, $query2);
                                }
                                
                        }
                    }
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=cart.php?usernm=$user\">";
    ?>
</body>
</html>

