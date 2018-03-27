<?php 
	ob_start();
	require_once 'Dbconnect.php';
	session_start();

	if (isset($_SESSION['user'])) {
	
	$car_id = $_GET['car_id'];

	$query 	= "DELETE FROM for_sale_cars WHERE car_id = '$car_id'";
	$result =  mysqli_query($conn,$query);
	$data 	= mysqli_fetch_array($result);

	$customer_id =  $_SESSION['user'];
	$query = "INSERT INTO customer_cars(car_id,custom_id) VALUES('$car_id','$customer_id')";
	$result =  mysqli_query($conn,$query);
	
	header("Location:mycars.php");

	}
	else {
		header("Location:sign-in.php");
		exit();
	}
?>