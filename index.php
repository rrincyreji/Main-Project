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
	<title>User Dashboard</title>
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="custhome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
<?php include 'cust_header.php'?>
<!-- <nav calss="navbar">
    <h5 class="logo1"><img src="logo.png"><?php  echo $_SESSION['email'];?>
</h5>
  
    <ul class="nav-links">
      <li class="active"><a href="sellerhome.php"></a><b>Home</b></li>
      <li ><a href="sellerproduct.php">shop</li></a>
	  <li><a href="seller_wishlist.php"><i class="bi bi-suit-heart"></i></li></a>
	  <li><a href="seller_cart.php"><i class="bi bi-bag"></i></li></a>
	  <li><a href="sellerprofile.php"><i class="bi bi-person-fill"></i></li></a>
	  <li><a href="loginpage.php"><i class="bi bi-box-arrow-right"></i></li></a>
	  <li><a href="#">
					<?php echo  date(" d / m / Y");?><br><?php
					date_default_timezone_set("Asia/Kolkata");
					echo  date("h:i:sa");
					?>
			</a>
		</li>
	  
    </ul>
  </nav> -->

<div class="header0">
	<!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->

	<div class="header-content">

		<!---<img src="D:\Project\Project papers\project code\pics\emb1.jpg">-->
		
		<h2>Live sale on</h2>
		<div>
			<h1>Weekend</h1>
			<a href="" class="ctn">learn more</a>
		</div>
	</div>
</div>

<section class="events">
	<div class="title">
		<h1> Our Products</h1>
		<div class="line"></div>
	</div>

<section>
		
		<div class="grid3">
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\emb10.jpg"></a>
				 <p>Embroidery</p>
				 <!-- <button><a href="shop.html"> explore more</a></button> -->
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\mac1.jpg"></a>
				 <p>Macrame arts</p>
				 <!-- <button><a href="tshirt.html"> explore more</a></button> -->
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\hair4.jpg"></a>
				 <p>Hair Accessories</p>
				 <!-- <button><a href="pillows.html">explore more</a></button> -->
			</div>
			<div class="grid">
				<a href="#" class="inside">
				 <img src="pics\dress12.jpg" height="200px"width="200"></a>
				 <p>Women</p>
				 <!-- <button><a href="potrait.html">explore more</a></button> -->
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

<?php include 'footer.php'?>

</body>
</html>