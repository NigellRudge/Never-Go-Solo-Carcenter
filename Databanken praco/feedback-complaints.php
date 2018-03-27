<?php 
	ob_start();
	require_once 'Dbconnect.php';
	session_start();

 	#check if user is logged in   
    if (!isset($_SESSION['user'])) {
        header("Location: sign-in.php");
        exit;
    }

	$query = "SELECT  customers.F_name AS 'F_name', customers.L_name AS 'L_name',  feedback.complaint AS 'complaint' FROM feedback JOIN customers ON feedback.customer_id = customers.customer_id;";
	$result = mysqli_query($conn,$query);
	$num_rows = mysqli_num_rows($result);


?>


<?php include 'header.php';?>
<?php include 'menu.php';?>
<?php include 'sidemenu.php';?>
<style type="text/css">
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
		<?php if ($num_rows>0): ?>
			<div class="table_container">	
				<table id="result_table">
					<tr>
						<th>Customer Name</th>
						<th style="width: 200px;">Complaint</th>
					</tr>
				<?php while ($data = mysqli_fetch_array($result)):?>
					<tr>
						<td><?php echo ($data['F_name'] . " " .  $data['L_name']);?></td>
						<td><?php echo $data['complaint']; ?></td>
					</tr>
			<?php endwhile ?>
				</table>
			</div>
		<?php endif ?>
	
		
	<?php endif ?>

<div style="padding-left: 20px; padding-top: 30px;">
	<div style="margin-left: 160px;">
		<h3>We would like to hear from you.<a href="add_complaints.php">Write us</a></h3>
	</div>
 </div>

<?php include 'footer.php';?>