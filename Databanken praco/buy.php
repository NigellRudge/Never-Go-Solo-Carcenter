<?php 
	ob_start();
	require_once "Dbconnect.php";

	$sql = "SELECT * FROM for_sale_cars";
	$result = mysqli_query($conn ,$sql);
	$rows = mysqli_fetch_array($result);
	$num_rows = mysqli_num_rows($result);


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
<?php include'header.php'; ?>
<?php include'menu.php'; ?>
<?php include'sidemenu.php'; ?>

	<?php if ($result):?>
		<?php if($num_rows!= 0): ?>
			<div class = 'table_container'>
				<table id='result_table'>
					<tr>
						<th>Model</th>
						<th>Brand</th>
						<th>Year of Manufacture</th>
						<th>Condition</th>
						<th>Engine type</th>
						<th>price</th>
					</tr>					
			<?php while($rows): ?>
					<tr>
						<td><?php echo $rows['model'];?></td>
						<td><?php echo $rows['brand'] ;?></td>
						<td><?php echo $rows['man_year'];?></td>
						<td><?php echo $rows['car_condition'];?></td>
						<td><?php echo $rows['engine_type'];?></td>
						<td><?php echo $rows['price'];?></td>
					</tr>
			<?php endwhile ?>
				</table>
			</div>
			<?php mysqli_free_result($result);?>
		<?php else: ?>
			<span style="padding-left: 20px;">No records found!</span>			
		<?php endif ?>	

	<?php else: ?>
		<span style="padding-left: 20px;">ERROR could not excute query!</span>

	<?php endif	?>

<?php include'footer.php'; ?>
