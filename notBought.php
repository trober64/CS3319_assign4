<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$query = "SELECT DISTINCT description FROM product WHERE prodID NOT IN (SELECT prodID FROM purchases)";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<h1> Products That Have Never Been Purchased: </h1>";
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo $row["description"] . "</li>";
}
mysqli_free_result($result);
echo "</ol>";

mysqli_close($connection);
?>

<br><br>
<a href="PHPfile1.php">RETURN TO MAIN PAGE</a>

</body>
</html>
