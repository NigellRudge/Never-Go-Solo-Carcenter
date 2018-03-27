

<?php include 'header.php'; ?>
<?php include 'menu.php'; ?>
<?php include 'sidemenu.php'; ?>


	<?php if(!isset($_GET['sub-btn']) && (empty($_GET['sub-btn']))): ?>
		<div style="padding-left: 500px;">
			<h3>Fill  your information in below</h3>
			<form action="add_complaints.php"  mehtod ="get">
				<label > Username</label><br>
				<input type="text" name="username" style="padding-bottom: 8px;"><br>
				<label>Complaint</label><br>
				<textarea cols="30" rows="5" name="complaint"></textarea><br>
				<input type="Submit" name="sub-btn">
			</form>
		</div>
	<?php else:?>
		Your complaint has been processed. Thanks for the feedback;
	<?php endif ?>


<?php include 'footer.php'; ?>