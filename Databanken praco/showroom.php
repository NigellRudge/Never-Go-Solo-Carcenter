<?php 
	ob_start();
	include 'Dbconnect.php';
	session_start();
	
	$query  = "SELECT Cars.car_id AS 'Car_id', Cars.model AS 'Model', Cars.brand AS 'Brand', Cars.car_condition AS 'Condition', Cars.engine_type AS 'Engine Type',Cars.man_year AS Man_year,for_sale_cars.sale_price AS 'Price' FROM for_sale_cars JOIN Cars ON for_sale_cars.car_id = Cars.car_id"		 ;
	$result = mysqli_query($conn,$query) ;
	$num_rows   = mysqli_num_rows($result)	 ;	

	echo "<br>";
	echo $num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NGS Carcenter</title>
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
<body>
	<?php include 'header.php'	; ?>
	<?php include 'menu.php'  	; ?>
	<?php include 'sidemenu.php'; ?>

	<?php if ($result): ?>
		<?php if ($num_rows!=0): ?>
			<div class = 'table_container'>
				<table id='result_table'>
					<label><h4>List of all vehicles</h4></label>
					<tr>
						<th>Car ID</th>
						<th>Model</th>
						<th>Brand</th>
						<th>Year of Manufacture</th>
						<th>Condition</th>
						<th>Engine type</th>
						<th>price</th>
					</tr>
				<?php while ($data = mysqli_fetch_array($result)):?>
					<tr>
						<td><?php echo $data['Car_id']; ?></td>
						<td><?php echo $data['Model'] ;?></td>
						<td><?php echo $data['Brand'] ;?></td>
						<td><?php echo $data['Man_year'] ;?></td>
						<td><?php echo $data['Condition'] ;?></td>
						<td><?php echo $data['Engine_type'];?></td>
						<td><?php echo $data['Price'];?></td>
					</tr>				
				<?php endwhile?>
				</table>
			</div>
			<?php mysqli_free_result($result); ?>	
		<?php else: ?>
			<span style='padding-left:20px;'>No records found!</span>
		<?php endif	?>
	<?php else: ?>
		<span>ERROR:could not execute query!</span>
	<?php endif ?>
	<?php mysqli_close($conn);?>
	<?php include 'footer.php'	; ?>
</body>
</html>