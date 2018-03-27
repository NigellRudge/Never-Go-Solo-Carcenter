<?php 
	ob_start();
	require_once 'Dbconnect.php';
	session_start();

	if (isset($_SESSION['user'])) {
		
		if (isset($_GET['sub-btn'])){
			
			$username = htmlspecialchars($_GET['username']);
			$userId =  htmlspecialchars($_SESSION['user']);
			$complaint = htmlspecialchars($_GET['complaint']);

			$query = "INSERT INTO feedback(	customer_id, complaint, username) VALUES ('$userId', '$complaint', '$username');";
			$result = mysqli_query($conn,$query);
			$num_rows = mysqli_num_rows($result);

			echo $query;
			echo "<br>";
			echo $username;
			echo "<br>";
			echo $userId;
			echo "<br>";
			echo $complaint;
			
		}
	}
	else{

		header("Location:sign-in.php");
		exit();
	}



?>
<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<?php include 'sidemenu.php'; ?>


	<?php if(!isset($_GET['sub-btn']) && (empty($_GET['sub-btn']))): ?>
		<div style="padding-left: 500px;">
			<h3>Fill  your information in below</h3>
			<form action="<?php echo htmlspecialchars($SERVER['PHP_SELF']); ?>"  mehtod ="get">
				<label> Username</label><br>
				<input type="text" name="username"><br>
				<label>Complaint</label><br>
				<textarea cols="30" rows="5" name="complaint"></textarea><br>
				<input type="Submit" name="sub-btn">
			</form>
		</div>
	<?php else:?>
		Your complaint has been processed. Thanks for the feedback;
	<?php endif ?>


<?php include 'footer.php'; ?>