<html>
<body>
<?php
include 'connectToDB.php';
?>

<?php

$customerID = $_POST["customerID"];
if(empty($customerID)){
	die("EMPTY TEXTBOX: Please return to the previous screen and fill the text box");
}

$query0 = "SELECT DISTINCT firstname,lastname FROM customer,purchases WHERE customer.cusID=purchases.cusID AND customer.cusID='$customerID'";
$result = mysqli_query($connection,$query0);
if (!$result) {
	die("databases query failed.");
}
if(mysqli_num_rows($result) == 0){
	die("CUSTOMERID DOES NOT EXIST: Please return to the previous screen and enter a valid customer ID");
}
echo "<h9>";
while($row = mysqli_fetch_assoc($result)){
	echo $row[firstname] . " " . $row[lastname] . " bought:" . "<br>";
}
mysqli_free_result($result);
echo "</h9>";

$query1 = "SELECT description FROM product,purchases WHERE purchases.prodID=product.prodID AND purchases.cusID='$customerID'";	
$result = mysqli_query($connection,$query1);

if (!$result) {
     	die("databases query failed.");
}
echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
    	echo "<li>";
    	echo $row[description] . "<br>" . "</li>";
}
mysqli_free_result($result);
echo "</ol>";
?>

<br><br>
<a href="PHPfile1.php">RETURN TO PREVIOUS PAGE</a>

</body>
</html>
