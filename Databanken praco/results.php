<?php 
	ob_start();
	require_once "Dbconnect.php";

		$carBrand = trim($_GET['brand']);
		$carBrand = strip_tags($carBrand);
		$carBrand = htmlspecialchars($carBrand);
		$brandQuery = "Cars.brand = '$carBrand'";

		$carModel = trim($_GET['model']);
		$carModel = strip_tags($carModel);
		$carModel = htmlspecialchars($carModel);
		$modelQuery = "Cars.model = '$carModel'";
 
		$carPrice = trim($_GET['price']);
		$carPrice = strip_tags($carPrice);
		$carPrice = htmlspecialchars($carPrice);
		$priceQuery = "Cars.price = '$carPrice'";

		$upperlimit = trim($_GET['upperlimit']);
		$upperlimit = htmlspecialchars($upperlimit);
		$upperlimit = (int)$upperlimit;

		$lowerlimit = trim($_GET['lowerlimit']);
		$lowerlimit = htmlspecialchars($lowerlimit);
		$lowerlimit = (int)$lowerlimit;

		$carEngine = $_GET['engineType'];
		$engineQuery = "Cars.engine_type = '$carEngine'";

		$carCondition = $_GET['carCondition'];
		$conditionQuery = "Cars.car_condition = '$carCondition'";		

		$searchQuery = "SELECT Cars.car_id AS 'Car_id', Cars.model AS 'Model', Cars.brand AS 'Brand', Cars.car_condition AS 'Condition', Cars.engine_type AS 'Engine Type',Cars.man_year AS Man_year,for_sale_cars.sale_price AS 'Price' FROM for_sale_cars JOIN Cars ON for_sale_cars.car_id = Cars.car_id WHERE ";

		$sec_select = false ;

		if (!empty($_GET['brand'])) {
			$searchQuery = $searchQuery . $brandQuery ;
			$sec_select = true;
		}
		if (!empty($_GET['model'])) {
			if ($sec_select) {
				$searchQuery = $searchQuery . " AND " . $modelQuery;
			}
			else {
				$searchQuery = $searchQuery . $modelQuery;
				$sec_select  = true;
			}		
		}		
		if (!empty($_GET['price'])) {
			if ($sec_select) {
				$searchQuery = $searchQuery . " AND " .$priceQuery;
			}
			else {
				$searchQuery = $searchQuery . $priceQuery;
				$sec_select  = true;
			}	
		}
		else { 
				if (!empty($_GET['lowerlimit']) && !empty($_GET['upperlimit'])) {
					$rangeQuery = "for_sale_cars.sale_price BETWEEN '$lowerlimit' AND $upperlimit";
					
					if ($sec_select) {
						$searchQuery = $searchQuery . "AND" . $rangeQuery;
					}

					else{
						$searchQuery = $searchQuery . $rangeQuery;
						$sec_select  = true; 
					}	
				}
				else if (!empty($_GET['lowerlimit']) && empty($_GET['upperlimit'])){
					$rangeQuery = "for_sale_cars.sale_price > '$lowerlimit'";

					if ($sec_select) {
						$searchQuery = $searchQuery . "AND" . $rangeQuery;
					}
					else{
						$searchQuery = $searchQuery . $rangeQuery;
						$sec_select  = true; 
					}	
				}
				else if (empty($_GET['lowerlimit']) && !empty($_GET['upperlimit'])){
					$rangeQuery = "for_sale_cars.sale_price < '$upperlimit'";
						if ($sec_select) {
						$searchQuery = $searchQuery . "AND" . $rangeQuery;
					}
					else{
						$searchQuery = $searchQuery . $rangeQuery;
						$sec_select  = true; 
					}	
				}		
			}

		if (!empty($_GET['engineType'])) {
			if ($sec_select) {
				$searchQuery = $searchQuery . " AND " . $engineQuery;
			}
			else {
				$searchQuery = $searchQuery . $engineQuery;
				$sec_select  = true;
			}
		}
		if (!empty($_GET['carCondition'])) {
			if ($sec_select) {
				$searchQuery = $searchQuery . " AND " . $conditionQuery;
			}
			else{
				$searchQuery = $searchQuery . $conditionQuery;
			}
		}
		


		$searchQuery = $searchQuery . ";";
		
		$result   = mysqli_query($conn,$searchQuery);
		$num_rows = mysqli_num_rows($result);
		
	echo "<p>$searchQuery</p>";
	echo var_dump($rows);
	echo "<br>";
	echo $num_rows;

?>

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

<?php include "header.php"  ;?>
<?php include "menu.php"    ;?>
<?php include "sidemenu.php";?>

<?php if ($result) :?>
		<?php if ($num_rows!=0):?>
			<div class = 'table_container'>
				<table id='result_table'>
					<tr>
						<th>Car_id</th>
						<th>Model</th>
						<th>Brand</th>
						<th>Year of Manufacture</th>
						<th>Condition</th>
						<th>Engine type</th>
						<th>price</th>
					</tr>
				<?php while ($data = mysqli_fetch_array($result)): ?>
					<tr>
						<td><?php echo $data['Car_id'] ;?></td>
						<td><?php echo $data['Model'] ;?></td>
						<td><?php echo $data['Brand'] ;?></td>
						<td><?php echo $data['Man_year'] ;?></td>
						<td><?php echo $data['Condition'] ;?></td>
						<td><?php echo $data['Engine Type'] ;?></td>
						<td><?php echo $data['Price'] ;?></td>
						<td><a href="viewcar.php?car_id=<?php echo $data['Car_id'];?>">View Car</a></td>
					</tr>	
						
				<?php endwhile?>
					</table>
				</div>
			<?php mysqli_free_result($result);?>
		<?php else:?>
			<span style="padding-left: 20px">No records found macthing your query</span>
		<?endif?>

	<?php else:?>
		<span style="padding-left: 20px">ERROR:could not execute query</span>
	<?php endif?>
			<?php mysqli_close($conn);?>
	
<?php include  "footer.php" ;?>
/* 
	we moeten ook de table hier veranderen naar for_sale_cars
*/