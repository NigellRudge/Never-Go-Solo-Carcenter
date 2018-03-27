<?php
	ob_start();
	session_start();

	if(isset($_SESSION['username'])!=""){
	header("location: home.php");
	}

	include_once"Dbconnect.php";
	$error=false;

	if (isset($_POST["btn-signup"])) {
		$name = trim($_POST["name"]);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

		$email = trim($_POST["email"]);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$password = trim ($_POST["password"]);
		$password = strip_tags($password);
		$password = htmlspecialchars($password);

		//name validation
		if (empty($name)) {
			$error= true;
			$nameError= "please enter your name";
		} else if (strlen($name)< 3) {
			$error =true;
			$nameError ="you name should be equal to or longer than 3 characters";
		} else if (!preg_match("/^[a-zA-Z]+$/", $name)) {
			$error = true;
			$nameError = "name must only contain alpjabetical character and spaces";
		}
		// email validation
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$emailError ="please enter a valid email addres";
		}
		//check if email exist
		else {
			$query = "SELECT email FROM users WHERE email='$email'";
			$result = mysqli_query($conn,$query);
			$count = mysqli_num_rows($result);

			if($count!=0) {
				$error = true;
				$emailError = "Provided email is already in use";
			}
		}
		//password validation
		if (empty($password)) {
			$error = true;
			$passwordError = " Please enter password";
		}
		else if (strlen($password)<6) {
			$error = true;
			$passwordError = "Password shoudl at least be 6 characters long";
		}
		
		//if there is no error continue
		if (!$error) {
			
			$query = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
			$result = mysqli_query($conn,$query);

			if ($result) {
				$errType = "Succes";
				$errMessage = "you have been successfully signed up";
				unset($name);
				unset($email);
				unset($password);
			}
			else {
				$errType = "danger";
				$errMessage = "Something went wrong, try again later....";
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		body{
			color: black;
			background-color: white; 
		}
		#error_message{
			float: left;
		}
	</style>
</head>
<body>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<?php include 'sidemenu.php';?>


	<p><h2 style="margin-left: 40%;">Please fill in you information</h2></p>	
	<div style="margin-left:40%;margin-top: 30px; ">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete= "off">
		<div >	
			<label style="font-size: 110%;">Enter username</label>
			<input type="text" name="name" placeholder="john Doe" style="display: block; width: 300px;">
			<span id="error_message" style="font-size: 80%; color: red;"><?php echo $nameError; ?></span>
			<br>
		</div>	
		<div >
			<label style="font-size:110%;">Enter Email</label>
			<input type="text" name="email" placeholder="johnDoe@random.com" style="display: block; width: 300px;">
			<span id="error_message" style="font-size: 80%; color: red;"><?php echo $emailError; ?></span>
			<br>
		</div>	
		<div >
			<label style="font-size: 110%;" >Enter password</label>
			<input type="text" name="password" placeholder="password" style="display: block; width: 300px;">
			<span id="error_message" style="font-size: 80%; color: red;"><?php echo $passwordError; ?> </span>
		</div>
		<br>	
	<div>
		<button  type="Submit" style="width:140px;" name="btn-signup" >Submit</button>
		<button style="margin-left: 20px; width: 140px;">Reset</button>
	</div>



		</form>
	</div>
		


<?php include 'footer.php'; ?>
<?php ob_end_flush(); ?>
</body>
</html>