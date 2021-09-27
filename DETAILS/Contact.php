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
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>  
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Contact Page </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>   
      
   Body {  
    background-image: url('https://c1.wallpaperflare.com/preview/127/182/407/grocery-store-supermarket-vegetable-shop.jpg');
  font-family: Calibri, Helvetica, sans-serif;  
  background-size: 1400px; 
  opacity: 0.9;  
}  
button {   
       background-color: red;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {     
        opacity: 0.9;
        height: %;
        width: 60%;
	background-color:black;
    }   
 input[type=text], input[type=password] {   
        width: 70%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid red;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.9;   
    }   
  .cancelbtn { 
		background-color:red;
        width: 20%;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
    .customerloginbtn {
        width: 40%; 
    }    
     
 .container {   
        padding: 25px;   
          
    } 

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 28px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: fixed;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9999999;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
p,h1,h2,form {
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
    width: 60%;
  }
}
/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: red;
  color: white;
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
</head>    
<body> 
   <div class="topnav" id="myTopnav">
		<a href="http://localhost/ASSIGNMENT/main.php">SPASH</a>
		
		<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php"> ITEMS</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php">LOG-IN</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/register.php">SIGN-UP</a>
		
		<a href="http://localhost/ASSIGNMENT/logout.php">LOG-OUT</a>
		
		<a href="http://localhost/ASSIGNMENT/DETAILS/About%20Us.php">ABOUT US</a>
  
		<a href="http://localhost/ASSIGNMENT/DETAILS/Contact.php" class="active">CONTACT US</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		<a href="http://localhost/ASSIGNMENT/PRODUCT/cart.php"><i class="material-icons">shopping_cart</i><span id="lblCartCount" class="badge badge-warning"><?= $num_items_in_cart?></span></a>
		</a>
	</div>
<center> <h1> <font size="18px" color="white">Contact Form</font> </h1>    
    <form>  
        <div class="container"> 
            
            <label><font color="white">First Name: </font></label>   
            <input type="text" placeholder="Enter First Name" name="FName" required>
            <br>
            <label><font color="white">Last Name: </font></label>   
            <input type="text" placeholder="Enter Last Name" name="LName" required>
            <br>
            <label><font color="white">_Country_: </font></label>   
            <input type="text" placeholder="Enter Country Name" name="India" required>
            <br>
            <label><font color="white">Subject: </font></label>
            
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:120px; width:540px"></textarea>
    <br>
    <input type="button" value="Submit">  
    <br>
            <button type="button" class="cancelbtn"> Cancel</button>   
              
        </div>   
    </form> </center>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>    
</body>     
</html>
