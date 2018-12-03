<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
session_start();
$phoneNumber = $_POST["phonenumber"];
$customerID = $_SESSION["customerID"];

if(empty($phoneNumber)){
	echo "EMPTY TEXTBOX: Please return to the previous page and fill the textbox";
}
else{
	$query = "UPDATE customer SET phonenumber='$phoneNumber' WHERE customer.cusID='$customerID'";	
	if(!mysqli_query($connection, $query)){
		die("Error: update failed" . mysqli_error($connection));
	}
	echo "The customer's phone number was updated!";
}
mysqli_close($connection);

?>


<br><br>
<a href="PHPfile1.php">RETURN TO MAIN PAGE</a>


</body>
</html>


