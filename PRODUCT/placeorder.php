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
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

?>
<!DOCTYPE html>
<html>
<head>
<style> 
div {
  border-radius:50%;
  position:absolute;
  top:50%; left:75%;
}
div:nth-of-type(odd) { background:black; }
div:nth-of-type(even) { background:white; border:2px solid black; }
div:nth-of-type(11) {
  height:10px; width:10px;
  margin-top:-5px; margin-left:-5px;
  -webkit-animation:slide 3s ease-in-out infinite;
  animation:slide 3s ease-in-out infinite;
}
div:nth-of-type(10) {
  height:20px; width:20px;
  margin-top:-12px; margin-left:-12px;
  -webkit-animation:slide 3s -2.7s ease-in-out infinite;
  animation:slide 3s -2.7s ease-in-out infinite;
}
div:nth-of-type(9) {
  height:40px; width:40px;
  margin-top:-20px; margin-left:-20px;
  -webkit-animation:slide 3s -2.4s ease-in-out infinite;
  animation:slide 3s -2.4s ease-in-out infinite;
}
div:nth-of-type(8) {
  height:60px; width:60px;
  margin-top:-32px; margin-left:-32px;
  -webkit-animation:slide 3s -2.1s ease-in-out infinite;
  animation:slide 3s -2.1s ease-in-out infinite;
}
div:nth-of-type(7) {
  height:80px; width:80px;
  margin-top:-40px; margin-left:-40px;
  -webkit-animation:slide 3s -1.8s ease-in-out infinite;
  animation:slide 3s -1.8s ease-in-out infinite;
}
div:nth-of-type(6) {
  height:100px; width:100px;
  margin-top:-52px; margin-left:-52px;
  -webkit-animation:slide 3s -1.5s ease-in-out infinite;
  animation:slide 3s -1.5s ease-in-out infinite;
}
div:nth-of-type(5) {
  height:120px; width:120px;
  margin-top:-60px; margin-left:-60px;
  -webkit-animation:slide 3s -1.2s ease-in-out infinite;
  animation:slide 3s -1.2s ease-in-out infinite;
}
div:nth-of-type(4) {
  height:140px; width:140px;
  margin-top:-72px; margin-left:-72px;
  -webkit-animation:slide 3s -0.9s ease-in-out infinite;
  animation:slide 3s -0.9s ease-in-out infinite;
}
div:nth-of-type(3) {
  height:160px; width:160px;
  margin-top:-80px; margin-left:-80px;
  -webkit-animation:slide 3s -0.6s ease-in-out infinite;
  animation:slide 3s -0.6s ease-in-out infinite;
}
div:nth-of-type(2) {
  height:180px; width:180px;
  margin-top:-92px; margin-left:-92px;
  -webkit-animation:slide 3s -0.3s ease-in-out infinite;
  animation:slide 3s -0.3s ease-in-out infinite;
}
div:nth-of-type(1) {
  height:200px; width:200px;
  margin-top:-100px; margin-left:-100px;
  -webkit-animation:slide 3s ease-in-out infinite;
  animation:slide 3s ease-in-out infinite;
}
@keyframes slide {
  0% { left:75% }
  50% { left:25%; }
  100% { left:75%; }
}
@-webkit-keyframes slide {
  0% { left:75% }
  50% { left:25%; }
  100% { left:75%; }
}
</style>
</head>
<body>
<center>
    <h2> YOUR ORDER HAS BEEN PLACED SUCCESSFULLY</h2><br>
    <h3> Thank You For Shopping With Us</h3>
    </center>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
</body>
</html>

