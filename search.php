<html>
<head>
<title>Search bar</title>
</head>
<body>
<form action="search.php" method="GET">
<input type="text" name="search">
<input type="submit" name="submit" value"Submit">
</form>

<?php
if (isset($_GET['submit'])) {
$intext=$_GET['search'];
$intext = preg_replace("/[^ 0-9a-zA-Z]+/", "", $intext);
}

?>

</body>
</html>

