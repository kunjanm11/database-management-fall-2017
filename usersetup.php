<!DOCTYPE html>
<html>
<head>
        <title>Create User</title>
</head>
<body>
<?php include("header.php"); 
                                if(isset($_GET['userId'])){
                                        $userId = explode("?", $_GET['userId']);
                                        }?>
        <center><h3>Please put in your details to make a new account. All fields are mandatory.</h3><br><br> 
        <?php echo "<form action='usersetup.php?userId=$userId[0]' method=POST>" ?>
                Username : <input type="text" name="username"><br><br>
                Password : <input type="password" name="psw"><br><br>
                Retype Password : <input type="password" name="rtppsw"><br><br>
                Secret Question : <select name="secques">
                                        <option value="">Choose a secret Question</option>
                                        <option value="What is you first pet's \name\?">What is you first pet's name?</option>
                                        <option value="What is the make of your first car?">What is the make of your first car?</option>
                                        <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                                        <option value="What is the name of your first school?">What is the name of your first school?</option>
                                </select><br><br>
                Answer : <input type="text" name="secans"><br><br>
                <input type=submit name=submit value="Create"><br><br>
        </form>
                <?php

                                if(isset($_POST['submit'])){
                                        $host = "localhost";
                                        $username2 = "melon";
                                        $password = "inf385m";
                                        $database = "melon";
                                        if (isset($_POST['username']) AND isset($_POST['psw']) And isset($_POST['rtppsw']) And isset($_POST['secques']) And isset($_POST['secans'])) {
                                                $username1 = $_POST['username'];
                                                $psw = $_POST['psw'];
                                                $rtppsw = $_POST['rtppsw'];
                                                $secques = $_POST['secques'];
                                                $secans = $_POST['secans'];
                                                echo "1";
                                                if($psw == $rtppsw){
                                                        $link = mysqli_connect($host, $username2, $password, $database);
                                                        $results = mysqli_query($link, "SELECT usernameId FROM user");
                                                        $rows = mysqli_fetch_array($results);
                                                        if(in_array($username1, $rows)){    
                                                                           print "Username already exists. Please choose a different one."; 
                                                                    }
                                                                    else{
                                                                        $secques = addslashes($secques);
                                                                        $link = mysqli_connect($host, $username2, $password, $database);
                                                                        $addquery = "INSERT INTO user (userId, usernameId, password,secretQuestion,secretAnswer) VALUES ($userId[0],'$username1','$psw','$secques','$secans')";
                                                    $check1_res = mysqli_query($link, $addquery);
                                                    
                                                    if (!$check1_res) {
                                                                                    printf("Error: %s\n", mysqli_error($link));
                                                                                    exit();
                                                                                }
                                                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=mainpage.php?usernm=$username1\">";
                                                                        }
                                                    }
                                                    else{
                                                        Print "Both the passwords are not the same. Please fill in the details again.";
                                                        }
                                                }
                                            }

                ?>
                </center>

<?php include("footer.php"); ?>
</body>
</html>

