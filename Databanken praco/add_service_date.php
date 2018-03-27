<?php 
	ob_start();
	session_start();
	require_once 'Dbconnect.php';

	#check if user is logged in 
	if (!isset($_SESSION['user']))
	{
        header("Location: sign-in.php");
        exit;
    }

    if (isset($_GET['Submit']))
    {
    	$username = htmlspecialchars($_GET['username']);
    	echo "<br>";
    	echo $_GET['date'];
    	$date = strtotime($_GET['date']);
    	echo '<br>';
    	echo "$date";
    	$date = date('Y-m-d',$date);
    	echo "<br>";
    	echo $date;

    	$query = "SELECT* FROM customers WHERE username = '$username'";

    	$result = mysqli_query($conn , $query);
    	$rowdata = mysqli_fetch_array($result);
    	$customer_id = $rowdata['customer_id'];
    	$num_rows = mysqli_num_rows($result);
    	echo "<br>";
    	echo $customer_id;
    	echo "<br>";
    	print_r($rowdata);
    	echo "<br>";
    	echo $username;
    	echo "<br>";
    	print_r($result);
    	echo "<br>";
    	echo $num_rows;
		
    	$query = "INSERT INTO service_appointments (appointment_date,customer_id) VALUES('$date','$customer_id');";
    	$result = mysqli_query($conn, $query); 
    	var_dump($result);

    }


?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<?php include 'sidemenu.php';?>
	
	<div class="service_form" style="padding-left: 500px;">
		<h3>Fill your information</h3><br>
		<form action="<?php  echo htmlspecialchars($_SESSION['PHP_SELF']);?>" method ='get'>
			<label>Input your username</label><br>
			<input type="text" name="username" style="margin-bottom: 8px;"><br>
			<label>Input date</label><br>
			<input type="text" name="date" style="margin-bottom: 8px;"><br>
			<input type="Submit" name="Submit"><br>
		</form>
	</div>
	

<?php include 'footer.php';?>