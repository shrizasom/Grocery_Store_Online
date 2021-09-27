<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost:3307';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'mysql';
    return  new pdo($DATABASE_HOST , $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if($pdo === false){
    die("ERROR: Could not connect. " . $pdo->connect_error);
		}
}
// Template header, feel free to customize this
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Shopping Cart System</h1>
                		<div class="topnav" id="myTopnav">
		<a href="http://localhost/ASSIGNMENT/main.php" class="active">SPASH</a>
		 <div class="dropdown">
    <button class="dropbtn">ITEMS
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Meat&Fish</a>
      <a href="#">Grains&Bread</a>
      <a href="#">Oil&Fat</a>
      <a href="#">Dairy&Eggs</a>
      <a href="#">Produce</a>
      <a href="#">Tinned&DriedProduce</a>
    </div>
  </div>
		<a href="http://localhost/ASSIGNMENT/main.php">LOG-IN</a>
  
		<a href="http://localhost/ASSIGNMENT/LOGIN_SIGNUP/register.php">SIGN-UP</a>
		
		<a href="http://localhost/ASSIGNMENT/logout.php">LOG-OUT</a>
		
		<a href="http://localhost/ASSIGNMENT/DETAILS/About%20Us.php">ABOUT US</a>
  
		<a href="http://localhost/ASSIGNMENT/DETAILS/Contact.php">CONTACT US</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		<a href="http://localhost:8383/Advance%20Java%20Project/CheckOut.html"><i class="material-icons">shopping_cart</i></a>
		</a>
	</div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
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
        <script src="script.js"></script>
    </body>
</html>
EOT;
}
?>