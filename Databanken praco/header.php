<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
    header{height: 70px;
        background-color:seagreen;
        color:white;
        font-size:200% ;
        text-align: left;
        padding-left: 10px;
        display: block;
        padding: 1rem;
    }   
    </style>
</head>
<body>
    
    <header>Welcome to Never Go Solo CarCenter
    <?php if (isset($_SESSION['user'])): ?>
       <span style="float: right; font-size: 70%;">Welcome <?php echo $_SESSION['username']?></span><br>
        <span style="float: right;font-size: 70%;"><a href="logout.php">Sign out</a></span>
    <?php else:?>  
        <a href="sign-in.php" id="login_link">Sign in</a>
    <?php endif ?>
    </header>
        
