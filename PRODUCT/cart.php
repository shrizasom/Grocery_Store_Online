<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php");
    exit;
}
 
// Include config file
require_once "config.php";

	
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
	$product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
	$products = $mysqli->query("SELECT *  FROM `products` WHERE `id` = $product_id");
    $product=$products->fetch_assoc();
	if ($product && $quantity > 0) {
		if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
	}
	header('location: http://localhost/ASSIGNMENT/PRODUCT/cart.php');
    exit;
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: http://localhost/ASSIGNMENT/PRODUCT/cart.php');
    exit;
}
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('location: http://localhost/ASSIGNMENT/PRODUCT/placeorder.php');
    exit;
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
if ($products_in_cart) {
	
	// There are products in the cart so we need to select those products from the database
    $array_with_comma = implode(',', array_keys($products_in_cart));
	$stmt = $mysqli->query("SELECT * FROM `products` WHERE `id` IN (".$array_with_comma.")" );
	$products=$stmt->fetch_all(MYSQLI_ASSOC);
	foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> Cart Page </title> 
<style>
body {
  background: linear-gradient(90deg, #edc0bf 0,#c4caef 58%);
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  height:100%;
  width:60%;
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
  
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: red;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  opacity: 0.7;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom:20px;
  }
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
/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: red;
  color: white;

}
.content-wrapper{
	position: absolute;
	right: 15px;
	width:38%;
	background-color: rgba(242, 242, 242, 0.9);
	padding: 5px 20px 15px 20px;
	border: 1px solid lightgrey;
	border-radius: 3px;
}
.cart h1 {
	display: block;
	font-weight: normal;
	margin: 0;
	padding: 40px 0;
	font-size: 24px;
	text-align: center;
	width: 100%;
}
.cart table {
	width: 100%;
}
.cart table thead td {
	padding: 30px 0;
	border-bottom: 1px solid #EEEEEE;
}
.cart table thead td:last-child {
	text-align: right;
}
.cart table .img {
	width: 80px;
}
.cart table .remove {
	color: #777777;
	font-size: 12px;
	padding-top: 3px;
}
.cart table .remove:hover {
	text-decoration: underline;
}
.cart table .price {
	color: #999999;
}
.cart table a {
	text-decoration: none;
	color: #555555;
}
.cart table input[type="number"] {
	width: 68px;
	padding: 10px;
	border: 1px solid #ccc;
	color: #555555;
	border-radius: 5px;
}
.cart .subtotal {
	text-align: right;
	padding: 40px 0;
}
.cart .subtotal .text {
	padding-right: 40px;
	font-size: 18px;
}
.cart .subtotal .price {
	font-size: 18px;
	color: #999999;
}
.cart .buttons {
	text-align: right;
	padding-bottom: 40px;
}
.cart .buttons input[type="submit"] {
	margin-left: 5px;
	padding: 12px 20px;
	border: 0;
	background: #4e5c70;
	color: #FFFFFF;
	font-size: 14px;
	font-weight: bold;
	cursor: pointer;
	border-radius: 5px;
}
.cart .buttons input[type="submit"]:hover {
	background: #434f61;
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
		<a href="http://localhost/ASSIGNMENT/main.php" >SPASH</a>
		
		<a href="http://localhost/ASSIGNMENT/PRODUCT/products.php"> ITEMS</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/login.php">LOG-IN</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/register.php">SIGN-UP</a>
		
		<a href="http://localhost/ASSIGNMENT/logout.php">LOG-OUT</a>
		
		<a href="http://localhost/ASSIGNMENT/DETAILS/About%20Us.php">ABOUT US</a>
  
		<a href="http://localhost/ASSIGNMENT/DETAILS/Contact.php">CONTACT US</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		<a href="http://localhost/ASSIGNMENT/PRODUCT/cart.php" class="active"><i class="material-icons">shopping_cart</i><span id="lblCartCount" class="badge badge-warning"><?= $num_items_in_cart?></span></a>
		</a>
	</div>
     <h1> <font size="18px" color="white">Check-Out Form</font> </h1>
<div class="row">
  <div class="col-75">
    <div class="container">
     
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Kakashi Hatake">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="kaka101hatake@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Newtown">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Kolkata">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="WB">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Kkakashi Hatake">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="101">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        
    </div>
  </div>
  	
    <div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="http://localhost/ASSIGNMENT/PRODUCT/cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?id=<?=$product['id']?>">
                            <img src="<?php echo $product['img'];?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="http://localhost/ASSIGNMENT/PRODUCT/products.php?id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="http://localhost/ASSIGNMENT/PRODUCT/cart.php?remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">₹<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">₹<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">₹<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update" style="color: white; background-color: rgba(255, 0, 0, 0.7);">
            <input type="submit" value="Place Order" name="placeorder" style="color: white; background-color: rgba(255, 0, 0, 0.7);">
        </div>
    </form>
</div>


</body>
</html>












