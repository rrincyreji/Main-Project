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
if(isset($_SESSION['email'])){
$email=$_SESSION['email'];
}
// $email= $_SESSION['email'];
// $sql="SELECT * FROM registration_s where email='$email'";
//         $result=$con->query($sql);
//         $count=1;
//         if($result->num_rows > 0){
//           while($row=$result->fetch_assoc()){
//             $user_id=$row["registration_id"];
//   $sql="SELECT * FROM ship_address where reg_id='$user_id' ORDER BY Name_";
//   $res=mysqli_query($con,$sql);
//   $count=mysqli_num_rows($res);
//     if($count>0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shopping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="sellerhome.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
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
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" name="work" id="form" action="cust_cart.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<!-- <th class="column-2">Name</th> -->
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
                                    <th class="column-5">Action</th>
									<th class="column-6">Total</th>
								</tr>
                                <?php
                        $sql1="SELECT * from product,cart where cart.user_id=(select registration_id from registration_s where email='$email') and cart.product_id=product.product_id and cart.is_checked_out=0";
                        $sql2="SELECT email from registration_s where email='$email'";
						$res = $con-> query($sql1);
                        if ($res-> num_rows > 0){
                            while($row1 = $res-> fetch_assoc()){
                    ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
										<img src="pics/<?php echo $row1['image1']?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $row1['p_name']?></td>
									<td class="column-3">₹ <?php echo $row1['price']?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?php echo $row1['cart_qty']?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									
                                    <td><input type="hidden" id = "entryid" name="entry" value="<?php echo $row1['entry_id'];?>"></td>
                                    <td class="column-5"><button type="submit" value="Update" name="update" class="btn btn-outline-dark btn-sm">Update</button>
									<a href="cust_cart.php?rementry=<?php echo $row1['entry_id'];?>"><button type="button" class="btn btn-outline-dark btn-sm">Remove</button></a>
																</td>
									<td class="column-6">₹ <?php echo $row1['price']*$row1['cart_qty']; ?>.00</td>
								</tr>
								<?php
                          }
                          }
                          ?>
                               

							</table>
						</div>
						</form>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<?php
                      $sql1="SELECT net_total,entry_id,user_id from cart where cart.user_id=(select registration_id from registration_s where email='$email') and cart.is_checked_out=0";
                      $res = $con-> query($sql1);
                      $total=0;
                      $user_id=0;
                      $net=20;
                      if ($res-> num_rows > 0){
                          while($row1 = $res-> fetch_assoc()){
                              $total=$total+$row1['net_total'];
                              $user_id=$row1['user_id'];
							  $enter_id=$row1['entry_id'];
                          }
                              $net=$net+$total;
                          $_SESSION['total']="$total";
						  $_SESSION['entry']="$enter_id";
                          
                          
                  ?>
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal: 
								</span>
							</div>
							

							<div class="size-209">
								<span class="mtext-110 cl2">₹
								<?php 
								echo $total;
								}
								?>.00
								</span>
							</div>
						</div>
						
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2"><?php
								$res1 = $con-> query($sql2);
                        		if ($res1-> num_rows > 0){
									while($row2 = $res1-> fetch_assoc()){
										echo $row2['email'];
								}
							}
							?>
								 <!-- Please double check your address, or contact us if you need any help. -->
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										<!-- Calculate Shipping -->
										Shipping Address    
									</span>
								<form name="work" id="form" action="seller_checkout.php" method="post" > 

									<!-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div> -->
									<?php
									$sql3="SELECT * from ship_address where ship_address.reg_id=(select registration_id from registration_s where email='$email')";
									$res = $con-> query($sql3);
                                    if ($res-> num_rows > 0){
                                        while($ro = $res-> fetch_assoc()){
									?>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name" value="<?php echo $ro['Name_'];?>">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone_no" placeholder="Phone.No" value="<?php echo $ro['phone'];?>">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="house" placeholder="House Name" value="<?php echo $ro['housename'];?>">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country"value="<?php echo $ro['state_'];?>">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="district" placeholder="District"value="<?php echo $ro['district']; ?>">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip"value="<?php echo $ro['pincode']; ?>">
									</div>
									
									<!-- <div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" name="cate">
											Update Totals
										</div>
										
						
									</div> -->
								
									
								</div>
							</div>
						</div>

						<!-- <div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">₹
								
								</span>
							</div>
						</div> -->
						
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="submit">
						Proceed to Checkout
						</button>
										
						
					</div>
					<?php
										}
									}
									else{
										?>
										<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Name">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone_no" placeholder="Phone.No" >
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="house" placeholder="House Name">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="district" placeholder="District">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip" >
									</div>
								</div>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="submit">
						Proceed to Checkout
						</button>
										
						
					</div>
							<?php		}
					?>
					</form>
				</div>
			</div>
		</div>
	</form>
	
    <?php
    if(isset($_POST['update']))
{
  $entry = $_POST['entry'];
    $sl="SELECT price from cart where entry_id='$entry'";
    $result1 = $con-> query($sl);
      if ($result1-> num_rows > 0){
      while($row = $result1-> fetch_assoc()){ 
        $price=$row['price'];
    
    $p_quantity=$_POST['quantity'];
   
    $net_total=intval($price)*intval($p_quantity); 
    $update="UPDATE cart set cart_qty= $p_quantity, net_total = $net_total where entry_id='$entry'";
        mysqli_query($con,$update);  
    
    
}
}
}

if(isset($_GET['rementry']))
{
  $entry = $_GET['rementry'];
    
  $delete="DELETE FROM cart where entry_id=$entry";
  mysqli_query($con,$delete); 
    
    
}

?>
		<!-- footer -->
        <?php include 'footer.php'?>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>