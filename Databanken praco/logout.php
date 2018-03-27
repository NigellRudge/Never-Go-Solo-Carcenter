<?php 
 	ob_start();
 	session_start();

 	if (!isset($_SESSION['user'])) {
 		header('Location:home.php');	
 	} 
	else{
		session_destroy();
	}
?>
	<?php include 'header.php'	; ?>
	<?php include 'menu.php'  	; ?>
	<?php include 'sidemenu.php'; ?>
		<div style="margin-bottom: 300px;">
		<p><h2>You have been logged out.</h2></p>
		</div>


	<?php ob_end_flush()		; ?>
