<?php
session_start();
require_once "config.php";
header("refresh: 30");
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html>
 <head> 
  <!-- Project 101 --> 
  <title>SPASH</title> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>
body{
    width: 98%;
    height: 100%;
    margin: 1%;
    background-color: black;
}

form{
  float: outside;
  width: 20%;
  padding: 10px;
  color: white;
  font-size: 16px;
  border: 1px solid grey;
  cursor: pointer;
}

a{
    text-decoration: none;
    background-color: black;
    color:#ededed;
    text-align: right;
}

.header{
    background-color:black;
    color:white;
    border-color: #080808;
    min-height: 50px;
    border: 1px solid transparent;
    opacity: 0.8;
}

.inner-header{
    width:80%;
    margin:auto;
}

.logo{
    float: left;
    height: 50px;
    padding: 15px;
    font-size: 20px;
    font-weight: bold;
    text-align: left;
}

.header-link{
    float:right;
    font-size:14px;
    height: 50px;
    padding: 15px 15px;
    font-size:16px;
    font-weight: bold;
    text-align: right;
    
}

.content{
   min-height:750px;
}

.banner-image{
    border: 1px groove red;
    display: block;
    text-align: center;
    color: #f8f8f8;
    background: linear-gradient(90deg, #edc0bf 0,#c4caef 58%);
    background: url(https://i.gifer.com/N8v4.gif) no-repeat center;
    background-size: 1300px;
    
}

.inner-banner-image{
    padding-top: 12%;
    width:80%;
    margin:auto;
}

.banner_content{
    position: relative;
    padding-top: 6%;
    padding-bottom: 6%;
    overflow:hidden;
    margin-bottom: 12%;
    background-color: rgba(0, 0, 0, 0.7);
    max-width: 660px;
    border-radius: 10px;
}
.button{
    
    color: #fff;
    background-color: #c9302c;
    border-color: #FF5000;
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
    padding: 10px 16px;
    font-size: 18px;
    border-radius: 6px;
    -webkit-transition: all 0.5s;
    
}
.button:hover{
    background: palevioletred;
    color: black;
}

.container{
    width:90%;
    margin:auto;
    overflow:hidden;
}

.items{
    width: 30%;
    display: block;
    padding: 4px;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    float:left;
    margin-left:2%;
    background: linear-gradient(90deg, #edc0bf 0,#c4caef 58%);
}

.thumbnail{
    display: block;
    max-width: 90%;
    height: auto;
    margin: 0 auto 0 auto;
}

.caption{
    color:#000;
    padding:0px 10px 10px;
    text-align: center;
}

.footer{
   
    background-color: #080808;
   color: white;
   font-size:15px;
   text-align: center;
   padding:3px;
   margin-top:auto;
   height:80px;
   border: 1px solid red;
   opacity: 0.6;
}

.shape {
  position: fixed;
  width: 40px;
  top: 20px;
  left: 20px;
  opacity: 0.8;
}

/* Add a black background color to the top navigation */
.topnav {
   
    float: top;
    position: static;
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
   
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 25px 14px 25px;
  text-decoration: none;
  font-size: 15px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: red;
  color: black;
  
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: red;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: block;
  
}
p {
  animation-duration: 3s;
  animation-name: slidein;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}
@keyframes slidein {
  from {
    margin-left: 0%;
    width: 300%;
  }

  to {
    
    width: 60%;
    margin-right:0%
  }
}
h1,h2,body {
  animation-duration: 3s;
  animation-name: slidein;
  animation-iteration-count: 1;
  animation-direction: alternate;
}
@keyframes slidein {
  from {
    margin-left: 0%;
    width: 300%;
  }

  to {
    margin-left: 0%;
    width: 100%;
  }
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 15px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: black;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 8px 12px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
}
.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

.label-warning[href],
.badge-warning[href] {
  background-color: #c67605;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 </head> 
 <body style="background-color:black;"> 
     <a href="http://localhost/ASSIGNMENT/main.php"> <img class="shape" src="https://s3.us-east-2.amazonaws.com/ui.glass/shape.svg" alt=""> </a>
  <div class="header"> 
   <div class="inner-header"> 
   <div class="topnav" id="myTopnav">
		<a href="http://localhost/ASSIGNMENT/main.php" class="active">SPASH</a>
		
		<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php"> ITEMS</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php">LOG-IN</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/register.php">SIGN-UP</a>
		
		<a href="http://localhost/ASSIGNMENT/logout.php">LOG-OUT</a>
		
		<a href="http://localhost/ASSIGNMENT/DETAILS/About%20Us.php">ABOUT US</a>
  
		<a href="http://localhost/ASSIGNMENT/DETAILS/Contact.php">CONTACT US</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		<a href="http://localhost/ASSIGNMENT/PRODUCT/cart.php"><i class="material-icons">shopping_cart</i><span id="lblCartCount" class="badge badge-warning"><?= $num_items_in_cart?></span></a>
		</a>
	</div>
       <br><br><br><br><br><br>
       <div class="form">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


       </div>
   </div> 
  </div> 
  <!--main content--> 
  <div class="content"> 
   <div class="banner-image"> 
    <div class="inner-banner-image"> 
     <center> 
      <div class="banner_content"> 
       <h1>SPASH</h1> 
       <p style="animation-iteration-count: 1;">Flat 15% OFF</p> 
       <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php" target="_blank"> 
        <center> 
         <input class="button" type="button" value="Shop Now"> 
        </center> </a> 
      </div> 
     </center> 
    </div> 
   </div> 
  </div> 
  <!--thumbnail--> 
  <div> 
   <!--1--> 
   <div class="items"> 
    <?php $category = "meat and fish"; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://previews.123rf.com/images/karandaev/karandaev1608/karandaev160800280/62201933-sausages-fish-meat-and-ingredients-cooking-top-view-on-stone-table.jpg" alt="Meat&Fish" class="thumbnail"> 
     <div class="caption"> 
      <h2>Meat & Fish</h2> 
      <p>Meat,Luncheon Meat,Oily Fish</p> 
     </div> </a> 
   </div> 
   <!--2--> 
   <div class="items"> 
   <?php $category='grains and bread'; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://www.kurzweilai.net/images/CerealPlant-7-Grain-Bread-Wholegrain-Food.jpg" alt="Grains&Bread" class="thumbnail"> 
     <div class="caption"> 
      <h2>Grains & Bread</h2> 
      <p>Pasta,Rice,Flour,Cereal</p> 
     </div> </a> 
   </div> 
   <!--3--> 
   <div class="items"> 
   <?php $category='oil and fat'; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://blog.fitbit.com/wp-content/uploads/2016/03/2016-03-22_HealthyFats_Blog_730x485.jpg" alt="Fats&Oil" class="thumbnail"> 
     <div class="caption"> 
      <h2>Oil & Fat</h2> 
      <p>Cooking Oil,Butter</p> 
     </div> </a> 
   </div> 
  </div> 
  <!--4--> 
  <div class="container"> 
   <div class="items">
	<?php $category='dairy and eggs'; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://media.wsimag.com/attachments/e93e9eb9c2850d7ffe69d0383ed27baf224eafd3/store/fill/690/388/35defd11ef8de6b2a0af60645188fd44f1fdcc1e7ed397421e56f58cd7c7/Eggs-milk-and-cheese.jpg " alt="Dairy&Eggs" class="thumbnail"> 
     <div class="caption"> 
      <h2>Dairy & Eggs</h2> 
      <p>Milk,Eggs,Cheese,Yogurt</p> 
     </div> </a> 
   </div>
  <!--5--> 
   <div class="items"> 
   <?php $category='produce'; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://bloximages.newyork1.vip.townnews.com/kctv5.com/content/tncms/assets/v3/editorial/0/90/0904822e-a515-52b4-818a-053c2673651a/5ba0d03f2b161.image.jpg " alt="Produce" class="thumbnail"> 
     <div class="caption"> 
      <h2>Produce</h2> 
      <p>Onions,Garlic,Fruits,Vegetables</p> 
     </div> </a> 
   </div>
  <!--6--> 
   <div class="items"> 
   <?php $category='tinned and dried pro'; ?>
    <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>"> <img src="https://assets.rebelmouse.io/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpbWFnZSI6Imh0dHBzOi8vYXNzZXRzLnJibC5tcy8yMjU3MDkwMi9vcmlnaW4uanBnIiwiZXhwaXJlc19hdCI6MTY2MjU5OTkzOH0._yfb1pLG0k3JjkHWXsNx-esM9YsZ8igLZu6EZP8Sccw/img.jpg?width=1245&quality=85&coordinates=0%2C0%2C0%2C0&height=700" alt="Tinned&DriedProduce" class="thumbnail"> 
     <div class="caption"> 
      <h2>Tinned & Dried Produce</h2> 
      <p>Pulses,Soup,Fruits,Seeds,Nuts</p> 
     </div> </a> 
   </div>
</div> 
  <!--footer--> 
  <section>
  <footer class="footer">
      <font color="white">
      Copyright© 2020-2021 | THE SPASH COMPANY STORE| All Rights Reserved | Contact us: +91 1088872930<br>
      POPULAR BRANDS :
      Fresho | Nandini | Safal | Himalya | 24Mantra | Saffola | Milky Mist | Comfort | bb Royal | Zespri | Bru 
      <br>
      CITIES WE SERVE :
      Ahmedabad | Bangalore | Bhopal | Chandigarh | Chennai | Delhi | Hyderabad | Kolkata | Lucknow | Mumbai | Nagpur  
      <br>
      <a href="https://retail.economictimes.indiatimes.com/tag/online+grocery"><font color="red">NEWS</font></a>
      
      
      </font> 
  </footer> 
</section>
 </body>
</html>


