<?php
	ob_start();
	require_once 'Dbconnect.php';

	if (isset($_GET['car_condition'])) 
	{
		$conditionQuery = "Cars.car_condition = '$_GET[car_condition]'" . ";";

	}
	 else if (isset($_GET['brand'])) 
	{
		$conditionQuery = "Cars.brand = '$_GET[brand]'" . ";";
	}
	else if (isset($_GET['model'])) 
	{
		$conditionQuery = "Cars.model = '$_GET[model]'" . ";";
	}

	$query = "SELECT Cars.car_id AS 'Car_id', Cars.model AS 'Model', Cars.brand AS 'Brand', Cars.car_condition AS 'Condition', Cars.engine_type AS 'Engine Type',Cars.man_year AS Man_year,for_sale_cars.sale_price AS 'Price' FROM for_sale_cars JOIN Cars ON for_sale_cars.car_id = Cars.car_id WHERE " . $conditionQuery;
	echo "<br>";
	echo $query;
	$result = mysqli_query($conn,$query);
	$num_rows = mysqli_num_rows($result);


?>

<? include 'header.php';?>
<? include 'menu.php';?>
<? include 'sidemenu.php';?>
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
	

	<?php if ($result): ?>
		<?php if ($num_rows!=0): ?>
			<div class="table_container">
				<table id="result_table">
					<tr>
						<th>Car ID</th>
						<th>Model</th>
						<th>Brand</th>
						<th>Condition</th>
						<th>Engine type</th>
						<th>Price</th>
					</tr>
			<?php while($data = mysqli_fetch_array($result)):?>
					<tr>
						<td><?php echo $data['Car_id']; ?></td>
						<td><?php echo $data['Model']; ?></td>
						<td><?php echo $data['Brand']; ?></td>
						<td><?php echo $data['Condition'];?></td>
						<td><?php echo $data['Engine Type']; ?></td>
						<td><?php echo $data['Price']; ?></td>
						<td><a href="buyvehicle.php?car_id=<?php echo $data['Car_id'];?>">Buy this Car now.</a></td>
					</tr>
			<?php endwhile?>
				</table>
			</div>
		<?php else:?>
		<span style="margin-left: 20px">NO records found </span>	
		<?php endif ?>

	<?php else:?>
		<span style="margin-left: 20px;">ERROR could not connect</span>
	<?php endif ?>

<? include 'footer.php';?>