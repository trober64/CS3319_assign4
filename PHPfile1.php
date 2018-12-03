<!DOCTYPE html>
<html>
<body>

<?php
include 'connectToDB.php';
?>

<h2><u> Welcome to the Sports Store's directory!</u></h2>
<br>
<h3> Current Customers: </h3>
<?php
include 'getData.php';
?> 
<hr>
<form action="getPurchases.php" method="post">
	Get The Customer's Purchase History:<br><br>
	CustomerID:<br>	
	<input type="text" name="customerID"  maxlength="2">
	<br><br>
	<input type="submit" value="Submit Customer ID">
</form>
<br>
<hr>
<br>
<form action="getProducts.php" method="post">
	Get List of All Products in Which Order? <br><br>
	<input type="radio" name="productOrder" value="description ASC"> Product Description Ascending <br>
	<input type="radio" name="productOrder" value="description DESC"> Product Description Descending <br>
	<input type="radio" name="productOrder" value="cost ASC"> Product Price Ascending <br>
	<input type="radio" name="productOrder" value="cost DESC"> Product Price Descending <br>
	<input type="submit" value="Submit Product Order">
</form>

<br>
<hr>
<br>

<form action="insertPurchase.php" method="post">
	Add a Purchase For a Customer:<br><br>
	Customer ID: 
	<input type="text" name="customerID" maxLength="2">
	<br>
	Product ID:   
	<input type="text" name="productID" maxLength="2">
	<br>
	Quantity: 
	<input type"text" name="quantity" maxLength="2">
	<br><br>
	<input type="submit" value="Submit Purchase">
</form>
 
</body>
</html>

