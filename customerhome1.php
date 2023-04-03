<?php
#required('top.inc.php');
session_start();
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(!isset($_SESSION["email"])){
  header("location:loginpage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer home</title>
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="sellerhome.css">
	<link rel="icon" type="image/x-icon" href="icon.png">
	<style type="text/css"></style>
</head>
<body>
	<nav calss="navbar">
		<h1 class="logo1"><img src="logo.png"></h1>
	
		<ul class="nav-links">
			<li class="active"><a href="#"></a>Home</li>
			<li><a href="customerproduct.php">shop</li></a>
			<li><a href="scustomerprofile.php">Profile</li></a>
			<li><a href="logout.php">Logout</li></a>



		</ul>
	</nav>
<header>
	<!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->

	<div class="header-content">

		<!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->
		
		<h2>Live sale on</h2>
		<div>
			<h1>Weekend</h1>
			<a href="" class="ctn">learn more</a>
		</div>
	</div>
</header>

<section class="events">
	<div class="title">
		<h1> Shop here</h1>
		<div class="line"></div>
	</div>

<section>
		
		<div class="grid3">
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\emb1.jpg"></a>
				 <p>Embrodiery </p>
				 <button><a href="shop.html"> Add to cart</a></button>
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\mac1.jpg"></a>
				 <p>wall hanger</p>
				 <button><a href="tshirt.html"> Add to cart</a></button>
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\hair7.jpg"></a>
				 <p>Scrunchies</p>
				 <button><a href="pillows.html">Add to cart</a></button>
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\dress4.jpg" height="200px"width="200"></a>
				 <p>dress</p>
				 <button><a href="potrait.html">Add to cart</a></button>
			</div>
		</div>
	</section>
<section class="explore">
<div class="exp">
	<h1>Christmas Gift guide</h1>
	<div class="line"></div>
<p>Unique Christmas gifts sure to impress every personality</p>
<br>
<a href="" class="ctn">Learn more</a>
</div>
</section>

<div class="row-grid">
        <div class="column">
          <h3 &nbsp;&nbsp;&nbsp;>About</h3>
          <a href="#">About us</a>
          <a href="#">contact</a>
          
          
        </div>
        <div class="column">
          <h3 &nbsp;&nbsp;&nbsp;>Seller</h3>
          <a href="#">Seller account</a>
          <a href="#">Categories</a>
        </div>
        <div class="column">
          <h3 &nbsp;&nbsp;&nbsp;>Supplier</h3>
          <a href="#">Supplier account</a>
          <input type="hidden"><a href="#">Stitches India</a>
          
        </div>
    </div>
<section class="footer">
	<p>Email id:abc@gmail.com | Contact us:+91 00000 00000</p>
	<p>copyright@2021 </p>
</section>

</body>
</html>