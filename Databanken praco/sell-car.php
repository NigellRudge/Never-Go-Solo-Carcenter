<?php 
	ob_start();
	require_once 'Dbconnect.php';
	session_start();

	if (isset($SESSION['user'])) {
	

		if (isset($_GET['car_id'])) {
		
			$car_id = $_GET['car_id'];
			$query = "SELECT value as 'value' FROM customer_cars WHERE car_id = '$car_id'";
			$result = mysqli_query($conn,$query);
			$data = mysqli_fetch_array($result);
			$value = $data['value'];

			$query = "DELETE FROM customer_cars WHERE car_id = '$car_id'";
			$result = mysqli_query($conn,$query);

			$query = "INSERT INTO for_sale_cars(car_id, sale_price) VALUES ('$car_id','$value')";
			$result = mysqli_query($conn,$query);

			header("Location:mycars.php");
			exit();
		}
	}

	else {
		
		header("Location:sign-in.php");
		exit();
	}

?>