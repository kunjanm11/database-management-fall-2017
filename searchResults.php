<html>
<head>
<title>Search Results</title>
</head>
<body>



<?php
include "header.php";

if (isset($_POST['submit']) AND isset($_POST['search'])) {
        $intext=$_POST['search'];
        $intext = preg_replace("/[^ a-zA-Z]+/", "", $intext);
        
        $host = "localhost";
    $username = "melon";
    $password = "inf385m";
    $database = "melon";
    $link = mysqli_connect($host, $username, $password, $database);
    $query = "SELECT name,brandName, image, productId FROM products Where name Like '%";
    $query .= $intext;
    $query .= "%' OR brandName Like '%";
    $query .= $intext;
    $query .= "%'";
    $results = mysqli_query($link, $query);     
    $rows = [];
    Print "<h2><b>Results for $intext: </b><br></h2>";
        while ($row = mysqli_fetch_array($results)) {
                        array_push($rows, $row);
        }
                print "<center><table id ='t01' style=\"width:90%;\" >";
        //print "<b><h2><tr id ='t01'><th width= '67%'> &nbsp &nbsp &nbspItem</th><th width= '10%'> &nbsp &nbsp &nbspPrice</th><th width= '10%'> &nbsp &nbsp &nbspQuantity</th><th width= '13%'> &nbsp &nbsp &nbspTotal</th></tr></h2></b>";
        foreach ($rows as $value){
                        echo "<br>";
            print "<tr id ='t02'><th id ='t01' width= '64%'><img src=$value[image] height='130' width='130'>  &nbsp <a href='productdisplay.php$urluser?prod=$value[productId]'> $value[name]</a>&nbsp  Brand Name: $value[brandName]&nbsp <br><br></th>";
            print "</tr>";
            $flag = 1;
        }

       print "</table></center><br>";   
       if($flag != 1){
                Print "<h4> No results found!<br><br><br>"; 
       }        
        
}
include "footer.php";
?>

</body>
</html>

