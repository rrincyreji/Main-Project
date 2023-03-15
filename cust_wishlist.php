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
	<title>Seller home</title>
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="sellerhome.css">
	<link rel="icon" type="image/x-icon" href="icon.png">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


</head>
<body>
<?php include 'cust_header.php'?>
<!-- <nav calss="navbar">
    <h5 class="logo1"><img src="logo.png"><?php  echo $_SESSION['email'];?></h5>
  
    <ul class="nav-links">
      <li class="active"><a href=#"></a><b>Home</b></li>
      <li ><a href="sellerproduct.php">shop</li></a>
    <li><a href="sellerprofile.php">Profile</li></a>
      <li><a href="loginpage.php">Logout</li></a>
      <li><a href="seller_wishlist.php">Wishlist</li></a>
	  <li><a href="seller_cart.php">My Cart</li></a>
    </ul>
  </nav> -->
  <?php 
                            if(isset($_SESSION['email'])){
                            $email=$_SESSION['email'];
                            }
                            ?> 
  <!-- wishlist -->
  <div class="container similar-products my-4">
        <hr>
        <p class="display-5">Wishlist</p>

        <div class="row">
        <?php
      $sql="SELECT * from wishlist, product,registration_s where wishlist.product_id=product.product_id and wishlist.user_id=(select registration_id from registration_s where email='$email') and wishlist.user_id= registration_s.registration_id";
      $result = $con-> query($sql);
      if ($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        ?>
            <div class="col-md-3">
                <div class="similar-product">
                <a href="cust_productview.php?products=<?php echo $row['product_id'];?>"><img class="w-100" src="<?php echo $row['image1']?>" alt="Preview"></a>
                    <p class="title"><?php echo $row['p_name']?></p>
                    <p class="price">₹ <?php echo $row['price']?></p>
                </div>
            </div>
            <?php
      }}?>
            
            
        </div>
    </div> 

  <!-- Footer -->
  <?php include 'footer.php'?>

</body>
</html>