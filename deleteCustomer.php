<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$customerID = $_POST["customerID"];

if(empty($customerID)){
	echo "EMPTY TEXTBOX: Please return to the previous page and fill the text box";
}
else{
	$query = "SELECT cusID FROM customer WHERE customer.cusID='$customerID'";
	$result = mysqli_query($connection,$query);
	if (!$result) {
     		die("databases query failed.");
	}
	if(mysqli_num_rows($result) == 0){
		die("CUSTOMERID DOES NOT EXIST: Please return to the previous page and enter a valid customer ID");
	}
	else{
		$query1 = "DELETE FROM customer WHERE customer.cusID='$customerID'";
		if(!mysqli_query($connection,$query1)){
			die("Error deleting record: " . mysqli_error($connection));
		}
		echo "Customer has been deleted!";
	}
	mysqli_free_result($result);
}
?>

<br><br>
<a href="PHPfile1.php">RETURN TO MAIN PAGE</a>


</body>
</html>
