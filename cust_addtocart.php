<?php
// Start the session
session_start();
// $product=$_GET['id'];
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="seller_product.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>seller product</title>
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
  <!--navbar-->

<nav calss="navbar">
    <h1 class="logo1"><img src="logo.png"></h1>
  
    <ul class="nav-links">
      <li><a href="sellerhome.php"></a><b>Home</b></li>
      <li class="active"><a href="#">shop</li></a>
    <li><a href="sellerprofile.php">Profile</li></a>
      <li><a href="loginpage.php">Logout</li></a>
    </ul>
  </nav>
  <hr>
  <!--body-->

<!---product deatils page -------->


<!--footer-->
<hr>
<footer>
<div class="row-grid">
        <div class="column">
          <h3>About</h3>
          <a href="#">About us</a>
          <a href="#">contact</a>
          <a href="#">accounts</a>
        </div>
        <div class="column">
          <h3>Category 2</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 3</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <center>
        <p>Email id:abc@gmail.com | Contact us:+91 788555898</p>
  <p>copyright@2021 </p><center>
      </div>
    </footer>


   
</body>
</html> 