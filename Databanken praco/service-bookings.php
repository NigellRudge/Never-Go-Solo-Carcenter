<?php 
	ob_start();
	require_once 'Dbconnect.php'; 
	session_start();

	#check if user is logged in 
	if (!isset($_SESSION['user'])) {
        header("Location: sign-in.php");
        exit;
    }

	$sql= "SELECT Cars.model as Model, Cars.brand as Brand , customers.F_name as 'First Name', customers.L_name as 'Last Name' , service_appointments.appointment_date as Date  FROM service_appointments JOIN customers ON service_appointments.customer_id = customers.customer_id JOIN customer_cars ON service_appointments.customer_id = customer_cars.custom_id JOIN Cars ON customer_cars.car_id = Cars.car_id "	;

	$result = mysqli_query($conn,$sql);
	$num_rows = mysqli_num_rows($result);
	echo "<br>";
	echo $num_rows;
	echo "<br>";
	echo $sql;
	
 ?>
<head>
	<style>
		#result_table{
			font-family: arial,sans-serif;
			border-collapse: collapse;
			}

		td,th{
			border :1px solid #dddddd;
			text-align: left;
			padding: 8px;
			}

		tr:nth-child(even){
			background-color: #dddddd;
			}

		.table_container{
			margin-left: 250px;
			}
	</style>
</head>
 <?php  include 'header.php'; 		?>
 <?php  include 'menu.php'; 		?>
 <?php  include 'sidemenu.php'; 	?>

 	<?php if ($result):?>

 		<?php if ($num_rows!=0):?>

	 		 <div class = 'table_container'>
					<table id='result_table'>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Model</th>
							<th>Brand</th>
							<th>Date</th>							
						</tr>

	 			<?php while ($data = mysqli_fetch_array($result)):?>
						<tr>
							<td> <?php echo $data['First Name'] ?></td>
							<td> <?php echo $data['Last Name'] ?></td>
							<td> <?php echo $data['Model'] ;?></td>
							<td> <?php echo $data['Brand'] ;?> </td>	
							<td> <?php echo $data['Date'] ?></td>
						</tr>

	 			<?php endwhile ?>

	 			</table>
	 		</div>

			<?php mysqli_free_result($result); ?>
		<?php else :?>	
			<span style="padding-left: 20px;"> No records found! </span>		
 		<?php endif ?>

 	<?php else :?>
 			<span style="padding-left: 20px;">ERROR could not execute query </span>

 	<?php endif  ?>
 	
 <?php mysqli_close($conn);		?>
 <?php include 'footer.php'; 	?>
 