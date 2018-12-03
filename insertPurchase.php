<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$customerID = $_POST["customerID"];
$productID = $_POST["productID"];
$quantity = $_POST["quantity"];

if(empty($customerID) OR empty($productID) OR empty($quantity)){
	echo "EMPTY TEXTBOX: Please return to the previous page and fill ALL the text boxes";
}
else{
	$query = "SELECT cusID FROM customer WHERE customer.cusID='$customerID'";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	if(mysqli_num_rows($result) == 0){
		echo "CUSTOMERID DOES NOT EXIST: Please return to the previous page and enter a valid customer ID";
	}
	mysqli_free_result($result);

	$query = "SELECT prodID FROM product WHERE product.prodID='$productID'";
	$result = mysqli_query($connection,$query);
	if (!$result) {
    		die("databases query failed.");
	}
	if(mysqli_num_rows($result) == 0){
		echo "PRODUCTID DOES NOT EXIST: Please return to the previous page and enter a valid product ID"; 
	}
	mysqli_free_result($result);
	
	$query = "SELECT * FROM purchases WHERE purchases.cusID='$customerID' AND purchases.prodID='$productID'";
	$result = mysqli_query($connection,$query);
	if (!$result) {
    		die("databases query failed.");
	}
	if(mysqli_num_rows($result) > 0){
		$query1 = "UPDATE purchases SET Quantity=Quantity+$quantity WHERE purchases.cusID='$customerID' AND purchases.prodID='$productID'";
		if(!mysqli_query($connection, $query1)){
			die("Error: insert failed" . mysqli_error($connection));
		}
		echo "The purchases was added!";
	}
	else{
		$query2 = "INSERT INTO purchases(cusID,prodID,Quantity) VALUES ($customerID,$productID,$quantity)";
		if(!mysqli_query($connection, $query2)){
			die("Error: insert failed" . mysqli_error($connection));
		}
		echo "The purchase was added!";
	}

	mysqli_free_result($result);
}
mysqli_close($connection);


?>


</body>
</html>
