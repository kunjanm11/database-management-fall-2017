<html>

<head>

        <title>Mainpage</title>
        <style>
        .row {margin: 8px -16px;}
        .column {float: left;
                width: 30%;
                margin-left: 2px;
                padding : 20px;}
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .content {
              background-color: white;
              padding: 10px;
          }
          /* Dropdown Button */
          .dropbtn {
              background-color: #4CAF50;
              color: white;
              padding: 8px;
              font-size: 16px;
              border: none;
              cursor: pointer;
          }

          /* Dropdown button on hover & focus */
          .dropbtn:hover, .dropbtn:focus {
              background-color: #3e8e41;
          }
          

          /* The container <div> - needed to position the dropdown content */
          .dropdown {
              position: relative;
              display: inline-block;
          }

          /* Dropdown Content (Hidden by Default) */
          .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f9f9f9;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
          }

          /* Links inside the dropdown */
          .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
          }

          /* Change color of dropdown links on hover */
          .dropdown-content a:hover {background-color: #f1f1f1}

          /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
          .show {display:block;}

         </style>
        <script type="text/javascript">
                        function myFunction(u){
                                var u = "<?php echo $u; ?>";
                        window.open(u);
                        }
                        /* When the user clicks on the sort button, 
                        toggle between hiding and showing the dropdown content */
                        function myFunc() {
                            document.getElementById("myDropdown").classList.toggle("show");
                        }

                        // Close the dropdown menu if the user clicks outside of it
                        window.onclick = function(event) {
                                 if (!event.target.matches('.dropbtn')) {

                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            var i;
                           for (i = 0; i < dropdowns.length; i++) {
                              var openDropdown = dropdowns[i];
                             if (openDropdown.classList.contains('show')) {
                              openDropdown.classList.remove('show');
                            }
                          }
                         }
                        }
      </script>
</head>

<body>
<?php
include "header.php";
        $host = "localhost";
        $username = "melon";
        $password = "inf385m";
        $database = "melon";
        $link = mysqli_connect($host, $username, $password, $database);
        $query = "SELECT * FROM products";
        if(isset($_GET['usernm'])){
                $user = explode("?", $_GET['usernm']);
                $cat = explode("=", $user[1]);
                $finalcat=$cat[1];
                if($finalcat!= "all"){
                        $scat = explode("=", $user[2]);
                        $extra = explode("=", $user[3]);
                        $urlscat = "?subcat=".$scat[1];
                }
                else{
                        $extra = explode("=", $user[2]);
                        $urlscat = "";
                }
                $finalscat=$scat[1];
                $finalex=$extra[1];
                $urluser = "?usernm=".$user[0];
        $urlcat = "?category=".$cat[1];
        
        }
        else{
                $cat = explode("?", $_GET['category']);
                $finalcat=$cat[0];
                if($finalcat!= "all"){
                        $scat = explode("=", $cat[1]);
                        $extra = explode("=", $cat[2]);
                        $urlscat = "?subcat=".$scat[1];
                }
                else{
                        $extra = explode("=", $cat[1]);
                        $urlscat = "";
                }
                $finalscat=$scat[1];
                $finalex=$extra[1];
                $urluser = "";
        $urlcat = "?category=".$cat[0];
        
        }
        if($finalcat!= "all"){
                echo "<h2> $finalcat $finalscat</h2>";
        }
        else{
                echo "<h2>All Products</h2>";
        }
        //Sort button dropdown
        ?>
        <div class="dropdown">
        <button onclick="myFunc()" class='dropbtn' >Sort </button>
                <div id="myDropdown" class="dropdown-content">
                <?php echo "<a href='mainpage.php$urluser$urlcat$urlscat?extra=desc'>Prices: High to Low</a>";
                        echo "<a href='mainpage.php$urluser$urlcat$urlscat?extra=asc'>Prices: Low to High</a>";

                        echo "<a href='mainpage.php$urluser$urlcat$urlscat?extra=rating'>Best Rating</a>";?>
                </div>
        </div>
        
        
        <?php
        if($finalcat != NULL AND $finalcat!= "all"){
            $query .= " JOIN subCategories ON products.subCategoryId = subCategories.subCategoryId JOIN categories ON categories.categoryId = subCategories.categoryId WHERE categories. categoryName = '";

            $query .= $finalcat;
            $query .= "'";
            if($scat !=NULL){
                $query .= " AND subCategories.subCategoryName = '";
                $query .= $finalscat;
                $query .= "'"; 
            }
        }
        if($finalex == "rating"){
                $query .= " ORDER BY productRating desc";
        }
        elseif($finalex == "asc"){
                $query .= " ORDER BY price asc";
        }
        elseif($finalex == "desc"){
                $query .= " ORDER BY price desc";
        }
        $query .= " Limit 12"; 
        //echo $query;
        $results = mysqli_query($link, $query);

        $rows = array();
       // $rows = mysqli_fetch_array($results);
        if(mysqli_num_rows($results) > 0 ){
        while($row = mysqli_fetch_array($results)){
                array_push($rows, $row);
        }
        }

      $counter = 0;
    for($i=1; $i<=4; $i ++){
    echo "<div class='row'>";
      for($j=1; $j<=3; $j++){
        while($rows[$counter]!=NULL){
          echo "<div class='column'>
            <div class='content'>";
              $product = $rows[$counter];
             // echo $product;
                                $u = $urluser."?prod=".$product[productId];
                                
              echo "<center><a href=\"productdisplay.php$u\"><img src=$product[image] style='width:90%'   
                onclick=\"this.src='$u'\" onmouseover=\"this.src='$product[image2]'\" onmouseout=\"this.src='$product[image]'\"></a><br>";
                echo "<a href='productdisplay.php$urluser?prod=$product[productId]'>$product[name]</a> &nbsp &nbsp $ $product[price] &nbsp  $product[productRating]<img src='images/Oxygen-Icons.org-Oxygen-Actions-rating.ico' style='width:13px;height:13px'> </h4> </center>";
               $counter += 1;
            echo "</div>
          </div>";
        }
      }
    echo "</div>";
  }



include "footer.php";
?>

</body>

</html>

