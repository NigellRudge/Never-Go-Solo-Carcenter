<?php 
	#ob_start();
	require_once 'Dbconnect.php';
	session_start();
	if (isset($_SESSION['user'])) {

	$customer_id = $_SESSION['user'];

	$query = "SELECT customer_cars.car_id AS 'car_id', customer_cars.value AS 'value', Cars.model AS 'Model', Cars.brand AS 'Brand', Cars.car_condition AS 'Condition', Cars.engine_type AS 'Engine Type',Cars.man_year AS Man_year , customers.F_name AS 'Fname', customers.L_name AS 'Lname', customers.Email AS 'Email' FROM customer_cars JOIN Cars on customer_cars.car_id = Cars.car_id JOIN customers ON customer_cars.custom_id = customers.customer_id WHERE customer_cars.custom_id = '$customer_id'";

	$result = mysqli_query($conn, $query);
	$num_rows = mysqli_num_rows($result);
  }
  else{
  	header("Location:sign-in.php");	
  	exit();
  }
echo "<br>";
echo "<br>";
echo $query;
echo "<br>";
echo "<br>";
echo $num_rows;
?>

<?php include 'header.php';?>
<?php include 'menu.php';?>
<?php include 'sidemenu.php';?>
<style type="text/css">
	.Customer_information{
		display: block;
		border: solid;
		border-width: 1px;
		border-color: grey;
		box-shadow: 0 4px 8px 0 grey;
		margin-left: 160px;
	}

	.customer_info_label{
		color: green;
		font-size: 110%;
		margin-left: 10px;

	}
	.header-label{
		display: block;
		margin-left: 160px;
		font-size: 180%;
		color: black;
		text-decoration: underline;

	}	
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
	margin-left: 160px;
}


</style>

	<span class="header-label"><p><b>Customer information</b></p></span>
		<?php  if($num_rows == 1):?>
			<?php $data = mysqli_fetch_array($result);?>
			<div class="Customer_information">
				<p><span class="customer_info_label"><b>Name: </b></span><?php echo " " . $data['Fname'];?></p>
				<p><span class="customer_info_label"><b>Last Name:</b></span><?php echo " " . $data['Lname'];?></p>
				<p><span class="customer_info_label"><b>Email:</b></span><?php echo " " .  $data['Email'] ;?></p>	
				<p><span class="customer_info_label"><b>Model:</b></span><?php echo " " . $data['Model'] ;?></p>		
				<p><span class="customer_info_label"><b>Brand:</b></span><?php echo " " . $data['Brand'] ;?></p>	
				<p><span class="customer_info_label"><b>Year of Manufacture:</b></span><?php echo " " . $data['Man_year'] ;?></p>	
				<p><span class="customer_info_label"><b>Engine type:</b></span><?php echo " " . $data['Engine Type'] ;?></p>
				<p><span class="customer_info_label"><a href="sell-car.php?car_id=<?php echo $data['car_id'];?>">Sell this car?</a></span></p>
				<p><span class="customer_info_label"><a href="trade-car.php?car_id=<?php echo $data['car_id'];?>">Trade this car?</a></span></p>		
			</div>
		<?php endif?>	

		<?php if($num_rows>1):?>
			<div class = 'table_container'>
				<table id='result_table'>
					<tr>
						<th>Model</th>
						<th>Brand</th>
						<th>Year of Manufacture</th>
						<th>Condition</th>
						<th>Engine type</th>
						<th>Value</th>
					</tr>
				<?php while ($data = mysqli_fetch_array($result)): ?>
					<tr>
						<td><?php echo $data['Model'] ;?></td>
						<td><?php echo $data['Brand'] ;?></td>
						<td><?php echo $data['Man_year'] ;?></td>
						<td><?php echo $data['Condition'] ;?></td>
						<td><?php echo $data['Engine Type'] ;?></td>
						<td><?php echo $data['value'] ;?></td>
						<td><a href="sell-car.php?car_id=<?php echo $data['car_id'];?>">Sell this car?</a></td>
						<td><a href="trade-car.php?car_id=<?php echo $data['car_id'];?>">Trade this car?</a></td>
					</tr>	
						
				<?php endwhile?>
					</table>
				</div>
			<?php endif?>		
		<?php if($num_rows<1): ?>
		
			<span style="padding-left: 20px">You currently have no cars. <a href="buy-cars.php">Buy one now?</a></span>	
		<?php endif ?>

			<?php mysqli_free_result($result);?>
		

<?php include 'footer.php';?>