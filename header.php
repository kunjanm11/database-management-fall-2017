<!DOCTYPE html>
<html>
<head>
        <title>draft1</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="draft2.css">
</head>
<body>
<?php
        if(isset($_GET['usernm'])){
        $user1 = explode("?", $_GET['usernm']);
        $user1 = "?usernm=".$user1[0];
    }
    else{
        $user1 = "";
    }?> 
  <!-- 1st navbar -->
        <nav class="navbar navbar-default">
                <div class="container">
                        <div class="navbar-header">
                                        <img src="https://upload.wikimedia.org/wikipedia/en/a/a1/Logo_melon142x99.png" height="50" width="55"> &nbsp
                                <a href="#" class="navbar-brand"></a>
                        </div>
    <?php
    print "<form class='navbar-form navbar-left' action='searchResults.php$user1' method=POST>"; ?>
        <div class="form-group">
          <input type="text" name = "search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" name = "submit" class="btn btn-default">Submit</button>
      </form>
                                <ul class="nav navbar-nav navbar-right">
                                        <?php
                                            if(isset($_GET['usernm'])){
                                                  $user = explode("?", $_GET['usernm']);
                                                  $user = $user[0];
                                                  Print "<li><a href='#'>Hello $user &nbsp &nbsp<i class='fa fa-user-plus' aria-hidden='true'></i></a></li>";
                                                  Print "<li><a href='#''>Account Details &nbsp &nbsp<i class='fa fa-user' aria-hidden='true'></i></a></li>";
                                          }
                                          else{
                                        ?>
                                        <li><a href="signup.php">Sign up<i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                                        
                                        <li><a href="signin.php">Login<i class="fa fa-user" aria-hidden="true"></i></a></li>
                                        <?php } ?>
                                </ul>
                        
                </div>
        </nav>

<!-- 2nd navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
    <?php Print "<li class='active'><a href='mainpage.php$user1?category=all'>";?>Home <span class="sr-only">(current)</span></a></li>

        <li class="dropdown">
          <a href="mainpage.php?category=Men" class="dropdown-toggle" data-toggle="dropdown">Men <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php Print "<li><a href='$user1?category=Men?subcat=Clothes'>";?>Clothes</a></li>
          <?php Print "<li><a href='mainpage.php$user1?category=Men?subcat=Shoes'>";?>Shoes</a></li>
        <?php Print "<li><a href='mainpage.php$user1?category=Men?subcat=Personal'>";?>Personal</a></li>
          </ul>
        </li>
      
        <li class="dropdown">
          <a href="mainpage.php?category=Women" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women <span class="caret"></span$
          <ul class="dropdown-menu">
            <?php Print "<li><a href='mainpage.php$user1?category=Women?subcat=Clothes'>";?>Clothes</a></li>
            <?php Print "<li><a href='mainpage.php$user1?category=Women?subcat=Shoes'>";?>Shoes</a></li>
            <?php Print "<li><a href='mainpage.php$user1?category=Women?subcat=Accessories'>";?>Accessories</a></li>
            <?php Print "<li><a href='mainpage.php$user1?category=Women?subcat=Personal'>";?>Personal</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="mainpage.php?category=Kids" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kids <span class="caret"></span><$
          <ul class="dropdown-menu">
            <?php Print "<li><a href='mainpage.php$user1?category=Kids?subcat=Clothes'>";?>Clothes</a></li>
            <?php Print "<li><a href='mainpage.php$user1?category=Kids?subcat=Shoes'>";?>Shoes</a></li>
          </ul>
        </li>


        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <?php

                if(isset($_GET['usernm'])){
                        $host = "localhost";
                        $username = "melon";
                        $password = "inf385m";
                        $database = "melon";
                        $user = explode("?", $_GET['usernm']);
                        $link = mysqli_connect($host, $username, $password, $database);
                        $query = "SELECT Count(cartId) FROM cart Where userId = '";
                        $query .= $user[0];
                        $query .= "'";
                        $results = mysqli_query($link, $query);
                                                        $row = mysqli_fetch_array($results);
                                print "<li><a href='cart.php?usernm=$user[0]'> Cart $row[0]<i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>";
                                
                }
                else{
                      print "<li><a href='cart.php'> Cart<i class='fa fa-shopping-cart' aria-hidden='true'></i></a></li>";
                }
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</body>
</html>

