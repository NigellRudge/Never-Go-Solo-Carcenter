<head>
	<title></title>
	<style>
		#menu{
    background-color:#333;
    font-size:100% ;
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    }
 #menu li{
    float: left;
    
}

 #menu li a,.dropbtn{
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

#menu li a:hover,dropdown:hover .dropbtn {
    background-color: seagreen;
    
}
# menu li.dropdown{
    display: inline-block;   
}

#menu .dropdown_content{
   display: none;
    position: absolute;
    background-color: #333;
     min-width: 160px;
    box-shadow:  0 8px 16px 0 green;
}

#menu .dropdown_content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
#menu .dropdown_content a:hover {
    background-color: seagreen;
    
}
#menu .dropdown:hover .dropdown_content{
    display: block;
    
}

#login_link {
    float: right;
   font-size: 100%; 
   
    color: white;
}

#login_link:hover{
    color: aqua;
}	
	</style>
</head>
	<ul id="menu">
         <li><a href="home.php">Home</a></li>
          <li class="dropdown"><a href="buy-cars.php" class=" dropbtn">Buy cars</a>
            <div class="dropdown_content">
                 <a href="viewcars.php?car_condition=new">New Cars</a>
                 <a href="viewcars.php?car_condition=used">Used Cars</a>
                  <a href="mycars.php">Exchange Cars</a>
                  <a href="mycars.php">Sell Cars</a>    
            </div>
         </li>
        <li><a href="showroom.php">Virtual Showroon</a></li>
        <li class=" dropdown"><a href="CostumerCorner.php" class="dropbtn">Customer Corner</a>
            <div class="dropdown_content">
                <a href="service-bookings.php">Service Booking</a>
                <a href="feedback-complaints.php">Feedback and Complaints </a>
                <a href="insurance.php">Insurance Renewals</a>
                <a href="sales-offers.php">Sales Offers</a>
                <a href="mycars.php">My Cars</a>
            </div>
        </li>
        <li><a href="search.php">Search</a></li>
         <li><a href="About.php">About us</a></li>
    </ul>   
<br>
	
