<!DOCTYPE html>
<html>
<head>
        <title>Log in Page</title>
</head>
<body>
<?php include("header.php"); ?>
        <center>
                <h1>Please log in to continue with the order.</h1><br><br> 
        <div style="width:400px;height:auto;border:1px solid #000;">
                <form action=signin.php method=POST>
                        <h1>Sign in</h1><br><br>
                        Username : <input type="text" name="username"><br>
                        User password : <input type="password" name="psw">
                        <br><br><br>
                        <input type=submit name=submit value="Sign in">
                                        <br><br>
                        <input type="button" value="Forgot Password" onclick="location.href='forgotpsw.php'" />
                        <br><br>
                        New User : <input type="button" value="Sign up" onclick="location.href='signup.php'" />
                </form>
        <br><br>
        </div>
        <?php
                if(isset($_POST['submit'])){
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $link = mysqli_connect($host, $username, $password, $database);
                        $results = mysqli_query($link, "SELECT usernameId, password FROM user");
                        if (isset($_POST['username']) AND isset($_POST['psw'])) {
                                 $username = $_POST['username'];
                                 $psw = $_POST['psw'];
                                 while ($row = mysqli_fetch_array($results)) {
                                if($row[usernameId] == $username){
                                        if($row[password] == $psw){
                                          echo "<meta http-equiv=\"refresh\" content=\"0;URL=mainpage.php?usernm=$username\">";
                                        }
                                        else{
                                                print "Wrong Username or Password";
                                        }
                                }
                        }
                }                               
        }
        ?>
        </center>
<br><br>
<?php include("footer.php"); ?>
</body>
</html>

