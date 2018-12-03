<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$quantity = $_POST["quantity"];

if(empty($quantity)){
	echo "EMPTY TEXTBOX: Please return to the previous page and fill text box";
}
else{
	$query = "SELECT firstname,lastname,description,quantity FROM customer,purchases,product WHERE customer.cusID=purchases.cusID AND purchases.prodID=product.prodID AND quantity>$quantity";
	$result = mysqli_query($connection,$query);
	if (!$result) {
     		die("databases query failed.");
	}
	echo "<h1>" . "These Customers Bought A Product More Than " . $quantity . " Times: " . "</h1>" . "<br><br>";
	
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
    		echo "<li>";
    		echo "Customer: " . $row["firstname"] . " " . $row[lastname] . "<br>Product Description: " . $row[description] . "<br>Quantity Bought: " . $row["quantity"] . "</li>" . "<br>";
	}
	mysqli_free_result($result);
	echo "</ol>";
}
mysqli_close($connection);
?>

<br><br>
<a href="PHPfile1.php">RETURN TO MAIN PAGE</a>

</body>
</html>
