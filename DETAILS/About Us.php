<?php
 session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php");
    exit;
}
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
?>



<!DOCTYPE html>
<html lang="en">
 <center>  
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  
  <style>
      
  body {
  padding: 72px;
  padding-top: 120px;
  margin: 0;
  background: #edc0bf;
  background: linear-gradient(90deg, #edc0bf 0,#c4caef 58%);
  font-family: 'Inter', sans-serif;
}

.card {
  width: 900px;
  height: 400px;
  padding: 2rem;
  border-radius: 1rem;
  /* other styles */
	background: rgba(255, 255, 255, .7);
	-webkit-backdrop-filter: blur(10px);
	backdrop-filter: blur(10px);
}

.card-title {
  margin-top: 10px;
  margin-bottom: 16px;
  font-size: 30px;
}

p, a {
  font-size: 1rem;
}

a {
  color: #4d4ae8;
  text-decoration: none;
}
.shape {
  position: fixed;
  width: 200px;
  top: .5rem;
  left: .3rem;
  padding-left: 90px;
  padding-top: 25px;
  opacity: 0.9;
}
p,h1 {
  animation-duration: 3s;
  animation-name: slidein;
  animation-iteration-count: 1;
  animation-direction: alternate;
}
@keyframes slidein {
  from {
    margin-left: 100%;
    width: 300%;
  }

  to {
    margin-left: 0%;
    width: 100%;
  }
}
</style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
    
    
    <a href="http://localhost/ASSIGNMENT/main.php">
	<h1 style= "position: relative; left: -400px; color: white;">SPASH</h1>
	<img class="shape" src="https://s3.us-east-2.amazonaws.com/ui.glass/shape.svg" alt=""></a>
  
    <div class="card">
    <h1 class="card-title">About Us</h1>
    <p style="text-align: left"><a href="http://localhost/ASSIGNMENT/main.php">Spash.com</a> is India's online grocery  shopping website .
	We are a team and all of us work diligently . We have satisfied many costumers with our services and will continue to do it.

Here you can shop  more than 10000 products which includes vegetables, fruits which are produced by farmers and directly brought for sale. Other than this we have groceries ,eggs, raw meats and fishes .
 We also have international companies like  Complan, Fresho, Haldiram, Himalaya, Horlicks, Kellogg’s, Lays, 
 Nandini, Nescafe, Nivea, Nutella, Patanjali, Saffola, Surf Excel, Vim etc and you can discover many other products.
<br>
FEATURES :
<br>
In pandemic period our website has been very useful  there are over 5000+ employees and we deliver all over the India.

What can you expect from us?
*Enjoy great offers with fast and Secure Checkout.
* We are always on time.
*We assure you the quality of our products is the finest .
*Last-minute shopping?  We have you covered with our express delivery system from near stores ( only within selected cities).

<br>
SERVICES:
<br>
We deliver in the following cities: Ahmedabad , Bangalore, Bhopal, Chandigarh, Chennai, Coimbatore, Delhi , Hyderabad, Kolkata, Lucknow Mumbai, Nagpur and many more.
<br>
FEEDBACK:
<br>
At SPASH your shopping experience is our priority and we would love to know how we can improve our services. If you have any suggestions to improve our service, please mail us at 
customerservicespash@gmail.com  or 1088872930

<br>
Enjoy hustle free and easy shopping from our site . Stay home stay safe.</p>
    <a></a>
</div>
</body>
 </center>
</html>
