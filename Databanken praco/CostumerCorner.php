<?php 
    ob_start();
    include 'Dbconnect.php';
    session_start();

    #check if user is logged in   
    if (!isset($_SESSION['user'])) {
        header("Location: sign-in.php");
        exit;
    }   
?>

<?php include"header.php";?>
<?php include"menu.php";?>
<?php include "sidemenu.php"; ?>

    <div style="padding-left: 20px; text-align: center;">
        <p><h3>Welcome customer!!</h3></p>
        <p>How can we help you</p>
    </div>    
       
     <span style="text-align: center;"><p><h4><a href="add_service_date.php" >Scheduel a service date today</a></h4></p></span>
    
    
  
    
<?php include "footer.php"; ?>
