<html>
<body>

<?php
include "connectToDB.php";
?>

<?php
$customerID = $_POST["cusID"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$city = $_POST["city"];
$phonenumber = $_POST["phoneNumber"];

if(empty($customerID) OR empty($firstname) OR empty($lastname) OR empty($city) OR empty($phonenumber)){
	echo "EMPTY TEXTBOX: Please return to the previous page and fill ALL the text boxes"; 		
}
else{
	$query = "SELECT cusID FROM customer WHERE customer.cusID='$customerID'";
	$result = mysqli_query($connection, $query);
	if(!result) {
		die("database query failed.");
	}
	
	if(mysqli_num_rows ($result) != 0){
		die("CUSTOMERID ALREADY EXISTS: Please return to the previous screen and create a new customer"); 
	}
	else{
		$query1 = "INSERT INTO customer(cusID,firstname,lastname,city,phonenumber,agentID) VALUES ($customerID,'$firstname','$lastname','$city','$phonenumber',NULL)";  
		if(!mysqli_query($connection, $query1)){
			die("Error: insert failed" . mysqli_error($connection));
		}
		echo "The customer was added!";
	} 
	mysqli_free_result($result);
}

mysqli_close($connection);

?>

<br><br>
<a href="PHPfile1.php">RETURN TO PREVIOUS PAGE</a> 

</body>
</html>
