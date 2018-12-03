<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$prodID = $_POST["prodID"];
if(empty($prodID)){
	echo "EMPTY TEXT BOX: Please return to the previous page and fill the text box";
}
else{
	$query1 = "SELECT prodID FROM product WHERE product.prodID='$prodID'";
	$result1 = mysqli_query($connection,$query1);
	if (!$result1) {
		die("databases query failed.");
	}
	if(mysqli_num_rows($result1) == 0){
		die("The product you have entered does not exist.");
	}
	mysqli_free_result($result1);

	$query = "SELECT description,SUM(Total_Quantity) AS TotalQuantity,SUM(Total_Spent) AS TotalSpent FROM PurchaseHistory WHERE prodID='$prodID'";
	$result = mysqli_query($connection,$query);
	if (!$result) {
     		die("databases query failed.");
	}
	echo "<h1> Details Of Product: </h1> <br><br>";	
	
	while ($row = mysqli_fetch_assoc($result)) {
		if(empty($row[description])){
			die("This product has never been purchased");
		}
    		echo "Product: " . $row[description] . "<br>Total Sold: " . $row[TotalQuantity] . "<br>Total Dollar Amount Sold: $" . $row["TotalSpent"];
	}
	mysqli_free_result($result);
}

mysqli_close($connection);
?>

<br><br>
<a href="PHPfile1.php">RETURN TO MAIN PAGE</a>

</body>
</html>
