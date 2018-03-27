<?php 
    ob_start();
    include 'Dbconnect.php';
?>
     <head>
        <link rel="stylesheet" href="NGScarcenter.css">
        <title>NGS CarCenter</title>
    </head>
    
<?php include "header.php";?>
<?php include "menu.php"; ?>
<?php include "sidemenu.php"; ?>

    
        
    <main>
        <div class="slider-container">
            <img class="myslide" src="scaled_car1.jpg">
            <img class="myslide" src="scaled_car2.jpg">
            <img class="myslide" src="scaled_car3.jpg">            
        </div>
    <br>
    <br>
           <section id="home-page-cards">       
            <a href="https://www.google.com">
                <div class="card" style="width:300px;height: 300px;">
                    <img src="Images/2016_toyota_rav4_angularfront.jpg" alt="Avatar" style="width: 300px; height: 250px;">
                    <div class=" card-container" style="width: 300px; height: 100px;">
                    <h5><b>Card Title</b></h5>
                    <p id="card-text">this is the information about the card</p> 
                    <p></p>  
                    </div>
                </div>
            </a>

        <a href="https://www.google.com">
            <div class="card">
                <img src="Images/New-Toyota-Vitz-2016-Model-Pictures.jpg" alt="Avatar" style="width: 100%">
                 <div class=" card-container">
                    <h5><b>Card Title</b></h5>
                    <p id="card-text">this is the information about the card</p> 
                    <p></p>  
                </div>
            </div>
        </a>    

        <a href="https://www.google.com">   
            <div class="card">
                 <img src="Images/2015-Ford-Ranger-driving.jpg" alt="Avatar" style="width: 100%">
                 <div class=" card-container">
                    <h5><b>Card Title</b></h5>
                    <p id="card-text">this is the information about the card</p> 
                    <p></p>  
                </div>
            </div>
        </a>
    </section>
    </main>  
    
   
    
 <script type="text/javascript">  
    var slideIndex =0;
    carousel();
    function carousel() {      
        var i;
        var slides = document.getElementsByClassName('myslide');
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex>slides.length) { slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(carousel, 2000);
    }
</script>  
<?php include "footer.php";?>
