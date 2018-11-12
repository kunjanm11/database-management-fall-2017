<!DOCTYPE html>
<html>
<head>
        <title>Sign Up</title>
</head>
<body>
<?php include 'header.php';?>
        <center><h1>Please put in your details to make a new account. All fields are mandatory.</h1></center><br><br> 
        <form action=signup.php method=POST>
                <center>
                <div style="width:400px;height:auto;border:1px solid #000;">
                <h2>New Account</h2><br>
                First Name : <input type="text" name="fname"><br><br>
                Last Name : <input type="text" name="lname"><br><br>
                Email Id : <input type="text" name="emailId"><br><br>
                Phone number : <input type="text" name="pnum"><br><br>
                Address : <input type="text" name="address"><br><br><br>
                
                <input type=submit name=submit value="Sign up">
                                <br><br>
                </div>
        </form>
        <br><br></center>
        <?php
                if(isset($_POST['submit'])){
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $link = mysqli_connect($host, $username, $password, $database);
                        if (isset($_POST['fname']) AND isset($_POST['lname']) And isset($_POST['emailId']) And isset($_POST['pnum']) And is$
                                $fname = $_POST['fname'];
                                $lname = $_POST['lname'];
                                $emailId = $_POST['emailId'];
                                $pnum = $_POST['pnum'];
                                $address = $_POST['address'];
                                    $addquery = "INSERT INTO customer (firstName, lastName,emailId,phoneNumber, address) VALUES ('$fname', $
                                    mysqli_query($link, $addquery);
                                    $query = "SELECT userId FROM customer where emailId = '";
                                    $query .= $emailId;
                                    $query .= "'";
                                    $results = mysqli_query($link, $query);
                                    $row = mysqli_fetch_array($results);
                                    echo $addquery;
                                    echo $query;
                                    print_r($rows);
                                    echo $rows[userId];
                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=usersetup.php?userId=$row[userId]\">";
                        }
                        else{
                                Print "Please input all the values";
                        }
                }

        ?>
<br><br>
<?php include("footer.php"); ?>
</body>
</html>

