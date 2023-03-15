<?php
// Start the session
session_start();
$product=$_GET['id'];
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    
    if(isset($_GET['wish']))
    {
    $prod=$_GET['wish'];  
    $sel="select entry_id from wishlist where product_id=$prod";
    $res = $con-> query($sel);
      if ($res-> num_rows <= 0){
      
    $sl="select registration_id from registration_s where email='$email'";
    $result1 = $con-> query($sl);
      if ($result1-> num_rows > 0){
      while($row = $result1-> fetch_assoc()){ 
        $user=$row['registration_id'];
     
    $sql= "INSERT INTO wishlist (product_id, user_id)VALUES ($prod, $user)";
    $result=$con->query($sql);
}
}
      }
      else
      echo'<script>alert("Product is already wishlisted!")</script>';
            }
            if(isset($_POST['add-to-cart']))
            {
               
                $sl="select registration_id from registration_s where email='$email'";
                $result1 = $con-> query($sl);
                  if ($result1-> num_rows > 0){
                  while($row = $result1-> fetch_assoc()){ 
                    $user=$row['registration_id'];
                $product = $_GET['id'];
                $p_price = $_POST['price'];
                $p_quantity=$_POST['cart_quantity'];
                // $p_color=$_POST['color'];
                // $p_size=$_POST['size'];
                $nettotal=intval($p_price)*intval($p_quantity);   
                $que= "INSERT INTO cart (user_id,product_id,price,cart_qty,net_total,is_checked_out)VALUES ($user,$product,$p_price,$p_quantity,$nettotal,0)";
                $result=$con->query($que);
                if($result)
                echo'<script>alert("Product added to cart!")</script>';
                else
                echo'<script>alert("Product could not be added to cart!")</script>';
                  }
            }
            }
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
<title>Customer Product View</title>
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
  <!--navbar-->
  <?php include 'cust_header.php'?>
<!-- <nav calss="navbar">
    <h1 class="logo1"><img src="logo.png"></h1>
  
    <ul class="nav-links">
      <li><a href="sellerhome.php"></a><b>Home</b></li>
      <li class="active"><a href="#">shop</li></a>
    <li><a href="sellerprofile.php">Profile</li></a>
      <li><a href="seller_wishlist.php">wishlist</li></a>
      <li><a href="seller_cart.php">My Cart</li></a>
      <li><a href="loginpage.php">Logout</li></a>
    </ul>
  </nav>
  <hr> -->
  <!--body-->

<!---product deatils page ------------------------------------------------------->
<div class="product_view">
<div class="container my-5">
<div class="row">
    <form action=" " method="post" enctype="multipart/form-data">
    <div class="col-md-5">
        <div class="main-img">
        <?php
              $sql="SELECT * from product ,subsub_category where product_id=$product and product.sub_category=subsub_category.subsub_id";
              $result = $con-> query($sql);
              $count = 0;
              if ($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){ 
                      if($count==6)
                      {
                          echo "</tr>";
                          $count = 0;
                      }
                      if($count==0)
                      echo "<tr>";
                      echo "<td  style='padding: 10px 20px 10px 20px; margin: 10px 20px 10px 20px;'>";
            ?>
            <img class="img-fluid" src="pics/<?php echo $row['image1']?>" alt="ProductS">
            
        </div>
    </div>
    <div class="col-md-7">
        <div class="main-description px-2">
            <div class="category text-bold">
                Category: <?php echo $row['subsub_categoryname']?>
            </div>
            <div class="product-title text-bold my-3">
            <?php echo $row['p_name']?>
            </div>


            <div class="price-area my-4">
                <!-- <p class="old-price mb-1"><del>$100</del>
                    <span class="old-price-discount text-danger">(20% off)</span></p> -->

                <p class="new-price text-bold mb-1">₹<?php echo $row['price']?></p>
                <p class="text-secondary mb-1">(Additional tax may apply on checkout)</p>

            </div>
<input type="hidden" name="price" value= "<?php echo $row['price']?>"></input>

            <div class="buttons d-flex my-5">
            <div class="block quantity">
                    <input type="number" class="form-control" name="cart_quantity" value="1" min="0" max="<?php echo $row['qty']?>" placeholder="Enter email" name="cart_quantity">
                </div>
                <div class="block">
                    <a href="seller_productview.php?wish=<?php echo $row['product_id'];?>&id=<?php echo $row['product_id'];?>" class="shadow btn custom-btn ">Wishlist</a>
                </div>
                <div class="block">
                <a href="seller_productview.php?id=<?php echo $row['product_id'];?>"><button type="submit" name="add-to-cart" class="shadow btn custom-btn">Add to cart</button></a>
                </div>
                
            </div>
                     </form> 


        </div>

        <div class="product-details my-4">
            <p class="details-title text-color mb-1">Product Details</p>
            <p class="description"><?php echo $row['ddesc']?></p>
        </div>
        <!-- <div class="product-details my-4">
            <p class="details-title text-color mb-2">Material & Care</p>
            <ul>
                <li>Cotton</li>
                <li>Machine-wash</li>
            </ul>
        </div>
        <div class="product-details my-4">
            <p class="details-title text-color mb-2">Sold by</p>
            <ul>
                <li>Cotton</li>
                <li>Machine-wash</li>
            </ul>
        </div>
    </div> -->
</div>
<?php
              $count++;
              echo"</td>";
              }
              }
              if($count>0)
              echo "</tr>";
            ?>
</div>



<div class="container similar-products my-4">
<hr>
<p class="display-5">Similar Products</p>

<div class="product">
<div class="container d-flex justify-content-center mt-100">
            <div class="row"> 
            <?php
              $sql="SELECT * from product  where main_category='4'";
              $result = $con-> query($sql);
              $count = 0;
              if ($result-> num_rows > 0){
                  while($row = $result-> fetch_assoc()){ 
                      if($count==6)
                      {
                          echo "</tr>";
                          $count = 0;
                      }
                      if($count==0)
                      echo "<tr>";
                      echo "<td  style='padding: 10px 20px 10px 20px; margin: 10px 20px 10px 20px;'>";
            ?>    
                <div class="col-md-3"> 
                    <div class="product-wrapper mb-45 text-center"> 
                        <div class="product-img"> 
                            <a href="#" data-abc="true"> <img src="pics/<?php echo $row['image1']?>" alt="" width="100%" height="100%"> </a>	
                                <span class="text-center"><i class="fa fa-rupee"></i> <?php echo $row['price']?></span> 
                                <p class="title"><h5><?php echo $row['p_name']?></h5></p>
                                <div class="product-action"> 
                        <div class="product-action-style"> 
                            <a href="seller_productview.php?id=<?php echo $row['product_id']?>"> <i class="fa fa-plus"></i> </a> 
                            <a href="#"> <i class="fa fa-heart"></i> </a> 
                            <a href="#"> <i class="fa fa-shopping-cart"></i> </a> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
        <?php
              $count++;
              echo"</td>";
              }
              }
              if($count>0)
              echo "</tr>";
            ?>	
        
        
    </div>	
</div>
</div>
</div>




</div>



</div>

<!--footer-->

<?php include 'footer.php'?>


   
</body>
</html> 