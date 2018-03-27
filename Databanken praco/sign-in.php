<?php
    ob_start();
    session_start();
    require_once "Dbconnect.php";

    $error = false;

    if ( isset($_SESSION['user'])) {
        header("Location: home.php");
         exit;
    }

    if (isset($_POST["loginBtn"])) {

        $name = trim($_POST["name"]);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST["email"]);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $password = trim ($_POST["password"]);
        $password = strip_tags($password);
        $password = htmlspecialchars($password);

            //name validation
        if (empty($name)) {
            $error= true;
            $nameError= "please enter your name";
        } else if (strlen($name)< 3) {
            $error =true;
            $nameError ="you name should be equal to or longer than 3 characters";
        }# else if (!preg_match("\^[a-zA-Z]+$/", $name)) {
           # $error = true;
          #  $nameError = "name must only contain alphabetical character and spaces";
      #  }
        // email validation
        if (empty($email)) {
            $error= true;
            $emailError = "please enter you email addres";
        
        } else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError ="please enter a valid email addres";
        }

        //password validation
        if (empty($password)) {
            $error = true;
            $passwordError = " Please enter password";
        }

        $query =" SELECT * FROM customers WHERE username='$name' AND password='$password'";
        $result = mysqli_query($conn ,$query);
        $rows = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count==1) {
            $_SESSION['user'] = $rows['customer_id'];
            $_SESSION['username'] = $rows['username'];
            header('Location: home.php');
        
        }else {
            $errorMessage= " Could not sign in something went wrong something went wrong";
        }
        

    }


 ?>
<!DOCTYPE HTML>
<html>
    <head>  
        <link rel="stylesheet" href="NGScarcenter.css">
        <title>NGS CarCenter</title>
    </head>
<body>
    <?php include "header.php"; ?>
    <?php include "menu.php";?>
    <?php include "sidemenu.php"; ?>
 
 <div class="sign-in-form" style="margin-left: 30%;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-bottom: 150px" method="post">
        <div class="imagecontainer_login">
            <img src="Images/user.gif" alt="avatar" class="avatar" style="width: 250px; height: 250px;" >
        </div>       
        <div class="container">             
            <label style="font-size: 125%"><b>Username</b></label>
            <input type="text" placeholder="user name" name="name"  style="width: 300px; height: 35px;">
            <span id="error_message" style="font-size: 80%; color: red;"><?php echo $nameError; ?></span>
            <label style="font-size: 125%"><b>Email</b></label>
            <input type="text" placeholder="John_doe@example.com" name="email"  style="width: 300px; height: 35px;">
            <span id="error_message" style="font-size: 80%; color: red;"><?php echo $emailError; ?></span>           
            <label style="font-size: 125%"><b>Password</b></label>
            <input type="password" placeholder="password" name="password"  style="width: 300px; height: 35px;">
            <span id="error_message" style="font-size: 80%; color: red;"><?php echo $passwordError; ?> </span>         
            <input type="checkbox" checked ="checked" >Remeber me
            <span class="psw">Forgot <a href="">password</a></span> 
            <button type="Submit" id="login_btn" name="loginBtn" style="font-size: 125%;width: 300px;" >Login</button>   
            <button type="button" class="cancelbtn" style="font-size: 125%; width: 300px;" >Cancel</button> 
        </div>
        
          
        <p><h3>Not a member yet?<a href="sign-up.php" style="color: red;" > Sing up now.</a></h3></p> 
        <h4><?php echo $errorMessage; ?></h4>       
        </div>
    </form>
    </div>
    <br>
    


    <?php include "footer.php"; ?>
    <?php ob_end_flush(); ?>

</body>
</html