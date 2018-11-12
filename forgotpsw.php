<!DOCTYPE html>
<html>
<head>
        <title>Forgot Password</title>
</head>
<body>
<?php include("header.php"); ?>
<table><tr>
        <th><div align = "left">
        <h3>Please put your username below to reset your password</h3><br><br> 
        <form action=forgotpsw.php method=POST>
                
                <div style="width:600px;height:auto;border:1px solid #000;">
                <h3>Forgot Password</h3><br>
                Username : <input type="text" name="username">
                &nbsp &nbsp &nbsp  &nbsp &nbsp
                <input type=submit name='submit' value="Get Secret Question">
                <br><br>         
                
        </form>

        </th>
        <th>
                <div align = "center" style="width:300px;">
                Remember Password : <input type="button" value="Sign In" onclick="window.location.href='signin.php'" />
                <br><br>
                New User : <input type="button" value="Sign Up" onclick="window.location.href='signup.php'" /><br>
        </th></tr></table><br><br>
        <?php
                if(isset($_POST['submit']) AND isset($_POST['username1'])){
                        $username1 = $_POST['username'];
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $link = mysqli_connect($host, $username, $password, $database);
                        $query = "SELECT usernameId, secretQuestion, secretAnswer FROM user Where usernameId = '";
                        $query .= $username1;
                        $query .= "'";
                        $results = mysqli_query($link, $query);
                        //echo $username1;
                        //echo $query;
                        if (mysqli_num_rows($results) > 0 and isset($username1)) {
                        //echo "1";
                                                        $row = mysqli_fetch_array($results);
                                print "<div style='width:600px;height:auto;border:1px solid #111;'><b><br> Secret Question: $row[secretQuestion]<b><br><br>";
                                print "<form action=forgotpsw.php method=POST><input type='text' name='secans'><input type=submit name='submit2' value='Send Password Reset Link'><br></form><br></div><br><br>";
                                if(isset($_POST['submit2']) AND isset($_POST['secans'])){
                                                echo "1";
                                        if($row[secretAnswer] == $_POST['secans']){
                                                print "Password Reset Link sent on the registered e-mail address.";
                                        }
                                        else{
                                                print "Wrong Answer.";
                                        }
                                }
                                else if(!isset($_POST['secans']) AND isset($_POST['submit2'])){
                                                echo "2";
                                        Print "Please fill the answer.";
                                }
                                       
                        }
                        else{
                                print "Wrong Username.<br><br>";
                        }
                }
                else if (!isset($username1) and isset($_POST['submit'])){
                        print "Please put a username to get the secret question.<br><br>";
                }


        ?>
<?php include("footer.php"); ?>
</body>
</html>

