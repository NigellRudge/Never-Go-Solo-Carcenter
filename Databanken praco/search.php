<?php include "header.php"  ;?>
<?php include "menu.php"    ;?>
<?php include "sidemenu.php";?>

	
	<div style="margin-left: 40%;">
		<p><h2>Search Cars</h2></p>
		<form method="get" action="results.php">
			<label style=" display: block;">Search by Brand</label>
			<input type="text" name="brand" style=" display: block;font-size: 110%;width: 300px;margin-top: 5px; margin-bottom: 8px;">

			<label style=" display: block;">Search by Model</label>
			<input type="text" name="model" style=" display: block;font-size: 110%;width: 300px;margin-top: 5px;margin-bottom: 8px;">

			<label style=" display: block;">Search by Price</label>
			<input type="text" name="price" style=" display: block;font-size: 110%;width: 300px;margin-top: 5px;margin-bottom: 8px;">
			<label style="display: block; margin-bottom: 10px;">Price Range</label>
			From<input type="text" name="lowerlimit" style="margin-left: 10px;margin-right: 10px"> To
			<input type="text" name="upperlimit" style="margin-left: 10px;margin-bottom: 10px;">

			<div style="display: block;margin-top: 5px">
			<label style=" display: block;">Condition</label>
			<input type="radio" name="carCondition" value="new" style="margin-top: 5px">New<br>
			<input type="radio" name="carCondition" value="used"  style="margin-top: 5px;">Used<br>
			</div>
			
			<div style="display: block;margin-top: 5px">
			<label style=" display: block;">Engine Type</label>
			<input type="radio" name="engineType" value="gasoline" style="margin-top: 5px">Gasoline<br>
			<input type="radio" name="engineType" value="diesel"  style="margin-top: 5px;">Diesel<br>
			</div>

			<button type="Submit" style="font-size: 110%;width: 300px; margin-top: 10px;background-color:#4CAF50; color: white;border: none;height: 30px">Search</button>
			<input type="Reset" name="reset" value="reset" style=" display: block; margin-top: 15px;font-size: 110%;width: 300px;background-color:#d92626; color: white;border: none;height: 30px">

		</form>
	</div>




<div style="margin-bottom: 100px;padding-bottom: 100px;"></div>
<?php include  'footer.php' ;?>
</body>
</html>