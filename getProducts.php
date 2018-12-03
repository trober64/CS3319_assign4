<html>
<body>

<?php
include'connectToDB.php';
?>
<h1><u> All Products: </u></h1>
<?php
$productOrder = $_POST["productOrder"];
$query = "SELECT description,cost FROM product ORDER BY $productOrder";
$result = mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    echo "Description: " . $row["description"] . "<br>" . "Price: " . $row["cost"] . "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>

<br><br>
<a href="PHPfile1.php">RETURN TO PREVIOUS PAGE</a>

</body>
</html>
