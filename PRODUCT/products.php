<?php
// Initialize the session
session_start();
header("refresh: 10");
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
if (isset($_GET['category'])) {
	$category=$_GET['category'];
	$products = $mysqli-> query ("SELECT * FROM products WHERE category = '$category'"); 
    	
    if (!$products) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Products does not exist!');
    }
}else if(isset($_GET['id'])){
   $id=	$_GET['id'];
   $products = $mysqli-> query ("SELECT * FROM products WHERE id = $id");  
}else {
	$products = $mysqli->query("SELECT * FROM products"); 
	
	    
}

$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Products</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="http://localhost/ASSIGNMENT/PRODUCT/products.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	 Body { 
	background-image: url('http://localhost/ASSIGNMENT/PICTURES/supermarket.jpg');
	
	font-family: Calibri, Helvetica, sans-serif;  
	background-size: 1600px; 
 
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
 form { padding-bottom: 9px;
		position:absolute; 
		left:500px;
		width: 300px;    
        opacity: 0.9;
        height: %;
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


/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
.items-section {
	background-color: rgba(0, 0, 0, 0.7);
	margin: 70px 625px 70px 70px;
	padding: 50px;
	
}
.item {
	display: flex;
	color: white;
	margin: 20px 0;
	padding: 2px 0;
	height:400px;
	border-bottom: 1px solid white;
}
.item-image {

	width: 125px;
	padding: 2px 0;
}
.item-image img {
	width: 125px;
	height: 125px;
}
.item-details {
	padding-left: 50px;
}
.item-title {
	font-size: 25px;
}
.item-counter {
	margin: auto 0;
	padding-left: 60px;
}
.item-counter button {
	height: 40px;
	width: 40px;
}
.item-counter span {
	margin: auto 10px;
}

.categories-list {
	position: fixed;
	right: 130px;
	bottom: 310px;
	
}
.categories-list ul {
	list-style-type: none;
	padding: 0;
}
.categories-list li {
	background-color: rgba(255, 0, 0, 0.7);
	margin: 5px 0;
	width: 400px;
	padding: 10px 5px;
}
.categories-list li a {
	color: white;
	text-decoration: none;
}

.topnav {
	float: top;
	position: static;
	background-color: #333;
	overflow: hidden;
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
	</head>
	<body>
	<div class="topnav" id="myTopnav">
		<a href="http://localhost/ASSIGNMENT/main.php">SPASH</a>
		
		<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php"class="active"> ITEMS</a>
  
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
		<div class="items-section">
			
			<?php foreach ($products as $product): ?>
			<div class="item">
				
				<div class="item-image">
				
					<img src="<?php echo $product['img'];?>" alt="<?=$product['name']?>">
					<br><br>
				</div>
				<div class="item-details"style= "position: relative; left: -40px; color: white;" >
					<div class="item-title"><span class="name"><?=$product['name']?></span></div>
					<div class="item-price" data-price="<?=$product['price']?>">
					<span class="price">
					₹<?=$product['price']?>
					<?php if ($product['rrp'] > 0): ?><br>
					<span class="rrp"><strike>₹<?=$product['rrp']?></strike></span>
					<?php endif; ?>
					</div>
				</div>
				<form action="http://localhost/ASSIGNMENT/PRODUCT/cart.php" id="product" method="post" target="_blank">
					<br>
					<div class="cart-action">
					<input type="number" style= " position:relative; left:20px; color: black; background-color: rgba(255, 255,255, 0.7); width: 90%;" id="quantity" name="quantity" value="0" min="0" max="<?=(int)$product['quantity']?>" placeholder="Quantity" required>
					<br><br><input type="hidden"  name="product_id" value="<?=(int)$product['id']?>">
					<input type="submit" style=" position:relative; left:20px; color: white; background-color: rgba(255, 0, 0, 0.7); width: 90%;" value="Add To Cart" >
					</div>
					<br>
				</form>
				<br><br><br>
				<div class="description" style= "right:100px;top: 150px;position:relative;width:500px;height:200px; color: white;" >
					<?=$product['desc']?>
				</div>
				<br>
			</div>
            <?php endforeach; ?>
		</div>
		
		<br><br><br>
		<div class="categories-list">
			<ul>
				<li>
				<?php $category = "meat and fish"; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category?>">Meat&Fish</a>
				</li>
				<li>
				<?php $category='grains and bread'; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category ?>">Grains&Bread</a>
				</li>
				<li>
				<?php $category='oil and fat'; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category ?>">Oil&Fat</a>
				</li>
				<li>
				<?php $category='dairy and eggs'; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category ?>">Dairy&Eggs</a>
				</li>
				<li>
				<?php $category='produce'; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category ?>">Produce</a>
				</li>
				<li>
				<?php $category='tinned and dried pro'; ?>
				<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?category=<?= $category ?>">Tinned&DriedProduce</a>
				</li>
			</ul>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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