<?php
    session_start();
    #required('top.inc.php');
    $con=mysqli_connect("localhost","root","","project");
    
    if($con===false){
        die("ERROR: Could not connect.".mysqli_connect_error());
    }
    if(!isset($_SESSION["email"])){
      header("location:loginpage.php");
    }
    $email=$_SESSION["email"];
    $sq = "SELECT * FROM registration_s where email = '$email'";
    $res = $con-> query($sq);
    if ($res-> num_rows > 0){
    while($ro = $res-> fetch_assoc()){
    $user=$ro['registration_id'];
    $grand_total = 0;
    $grandtotal = 0;

if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
if(isset($_POST['complete'])) 
{
            $customer_name = $_POST['user_id'];
            $customer_address = $_POST['address'];
            // $customer_email = $_POST['address_id'];
            $order_date = date("Y-m-d H:i:s");
            // $customer_phone = $_POST['phone'];
            // $customer_address = $_POST['address'];
            $total_amount = $_POST['total_amount'];
            //Insert to orders table
            $sql = "INSERT INTO orders (user_id, address_id, order_date, payment_mode, payment_id, total_amt, status) VALUES ($user, $customer_address,'$order_date', 2, 0, $total_amount,0)";
            $result = mysqli_query($con, $sql);
            $order_id = mysqli_insert_id($con);
            if (!empty($order_id)) 
            {
                foreach ($_POST['items'] as $key => $product_id) 
                {
                    $id = $_POST['entry_ids'][$key];
                    $quantity = $_POST['quantity'][$key];
                    $price = $_POST['price'][$key];
                   
                    $brand = $_POST['brand'][$key];
                    $total_price = $quantity * $price;
                    $sql = "INSERT INTO order_items (order_id, product_id, brand, quantity, price, total_price,order_status) VALUES ($order_id, $product_id, $brand, $quantity, $price, $total_price,0)";
                    $result = mysqli_query($con, $sql);
                    // update cart table status
                    $sql = "UPDATE cart SET is_checked_out = 1 WHERE entry_id = $id";
                    $result = mysqli_query($con, $sql);
                    if ($result) 
                    {
                        // reduce Total_quantity from product table
                        $sql = "UPDATE product SET qty = qty - $quantity WHERE product_id = $product_id";
                        $res = mysqli_query($con, $sql);
                        $s="SELECT * from product where product.product_id=$product_id";
                        $r = $con-> query($s);
                        if ($r-> num_rows > 0)
                        {
                            while($r1 = $r-> fetch_assoc())
                            { 
                                $qty=$r1['qty'];
                                if($qty <= 3)
                                {
                                    $notif = mysqli_query($con,"INSERT INTO notification_(receiver, notif_id, read_status) VALUES ($brand,2,0)");                                   
                                }
                            }
                        }
                        
                    }
                    else
                    echo'<script>alert("Error in placing order!")</script>';
                }
                $transaction = md5(rand());
                        $sql4 = "INSERT INTO payment (order_id, transaction_id) VALUES ($order_id, '$transaction')";
                        $result4 = mysqli_query($con, $sql4);
                        $payment_id = mysqli_insert_id($con);
                        // update cart table status
                        $sql5 = "UPDATE orders SET payment_id = $payment_id WHERE order_id = $order_id";
                        $result5 = mysqli_query($con, $sql5);
                echo'<script>alert("Order is placed successfully!")</script>';
                // header("location:myorders.php"); 
            }
            
}
$sql3 = mysqli_query($con,"SELECT * FROM cart c, product p where p.product_id = c.product_id and c.user_id=" . $user . " AND c.is_checked_out=0 and c.stock_status=1");
?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-icons.css" rel="stylesheet">
  
  <link rel="stylesheet" href="productdetailstyle.css"/>
<meta charset="UTF-8">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
 
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  
    
  
    <script src="https://unpkg.com/phosphor-icons"></script>
    <title>Product</title>
  
<style>
@media (min-width: 1025px) {
  .h-custom {
  height: 100vh !important;
  }
  }
  .text-bold {
            font-weight: 800;
        }

        text-color {
            color: #0093c4;
        }

        /* Main image - left */
        .main-img img {
            width: 100%;
        }

        /* Preview images */
        .previews img {
            width: 100%;
            height: 140px;
        }

        .main-description .category {
            text-transform: uppercase;
            color: #0093c4;
        }

        .main-description .product-title {
            font-size: 2.5rem;
        }

        .old-price-discount {
            font-weight: 600;
        }

        .new-price {
            font-size: 2rem;
        }

        .details-title {
            text-transform: uppercase;
            font-weight: 600;
            font-size: 1.2rem;
            color: #757575;
        }

        .buttons .block {
            margin-right: 5px;
        }

        .quantity input {
            border-radius: 0;
            height: 40px;

        }


        .custom-btn {
            text-transform: capitalize;
            background-color: #0093c4;
            color: white;
            width: 150px;
            height: 40px;
            border-radius: 0;
        }

        .custom-btn:hover {
            background-color: #0093c4 !important;
            font-size: 14px;
            color: white !important;
        }

        .similar-product img {
            height: 400px;
        }

        .similar-product {
            text-align: left;
        }

        .similar-product .title {
            margin: 17px 0px 4px 0px;
        }

        .similar-product .price {
            font-weight: bold;
        }


        /* Small devices (landscape phones, less than 768px) */
        @media (max-width: 767.98px) {

            /* Make preview images responsive  */
            .previews img {
                width: 100%;
                height: auto;
            }

        }
</style>
    </head>
    <body>
        <main>
        
            <section class="h-100 gradient-custom">
            
                
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 px-4 pb-4" id="order">

                            

                                
                            </br></br>
<h4>Order Details</h4>
</br></br>
                                    
                                    <?php
                                    while ($row = mysqli_fetch_array($sql3)) {
                                        $sub_total = $row['cart_qty'] * $row['price'];
                                        $grand_total += $sub_total;
                                        ?>
                                        <input type="hidden"  value="<?= $row['product_id'] ?>">
                                        <input type="hidden" value="<?= $row['cart_qty'] ?>">
                                        <input type="hidden" value="<?= $row['price'] ?>">
                                        <input type="hidden" value="<?= $row['reg_id'] ?>">
                                        <input type="hidden"  value="<?= $row['entry_id'] ?>">
                                        <p><?= $row['p_name'] ?> <span class="price">₹ <?= $sub_total ?></span></p>
                                        <?php
                                    } ?>
                                    
                                   
                                 <hr>
                                <p>Total <span class="price">₹ <?= $grand_total ?></span></p>
                                    
                                </div>
                                <input type="hidden" id="amt"name="total_amount" id="total" value="<?= $grand_total; ?>">
                                </br>
                                
                                <div class="form-group">



<form method="post">
                                <?php
                                $sql3 = mysqli_query($con,"SELECT * FROM cart c, product p where p.product_id = c.product_id and c.user_id=" . $user . " AND c.is_checked_out=0 and c.stock_status=1");
                                    while ($row = mysqli_fetch_array($sql3)) {
                                        $sub_total = $row['cart_qty'] * $row['price'];
                                        $grandtotal += $sub_total;
                                        ?>
                                        <input type="hidden" name="items[]" value="<?= $row['product_id'] ?>">
                                        <input type="hidden" name="quantity[]" value="<?= $row['cart_qty'] ?>">
                                        <input type="hidden" name="price[]" value="<?= $row['price'] ?>">
                                        
                                        <input type="hidden" name="brand[]" value="<?= $row['reg_id'] ?>">
                                        <input type="hidden" name="entry_ids[]" value="<?= $row['entry_id'] ?>">
                                        <!-- <p><?= $row['product_name'] ?> <span class="price">₹ <?= $sub_total ?></span></p> -->
                                    </hr>
                                    
                                        <?php
                                    } 
                                    
                                    ?>
                                    
                                <input type="hidden" id="amt" name="total_amount" id="total" value="<?= $grandtotal; ?>">
                                </br>
                                <?php
                                $sq = "SELECT * FROM registration_s where registration_id = $user";
                                $res = $con-> query($sq);
                                    if ($res-> num_rows > 0){
                                        while($ro = $res-> fetch_assoc()){
                    
                                ?>
                                 <div class="form-group">
                                    <input type="text" hidden name="user_id" id="name" class="form-control" placeholder="Enter Name"  value = "<?= $ro['registration_id'] ?>" minlength="5" maxlength="50" pattern="\S(.*\S)?" required> 
                                </div>
                                </br>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" value = "<?= $ro['email'] ?>" required>
                                </div>
                                </br>
                                <div class="form-group">
                                    <!-- <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value = "<?= $ro['contact_no'] ?>" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" required> -->
                                </div>
                                </br>
                                                                                            
                    
                                <div class="form-group">
                                <input type="text" class="form-control" value="Select Address" disabled></br></br>
                                <?php 
                                $email=$_SESSION['email'];
                                $query=mysqli_query($con,"select * from ship_address WHERE reg_id=(select registration_id from registration_s where email='$email')");
                                $cnt=1;
                                while($row=mysqli_fetch_array($query))
                                {
                                ?>
                                <input type="radio" name="address" id="address" value="<?php echo $row['id']?>"> <span><?php echo $row['housename'];?>(H),<?php echo $row['district'];?>,<?php echo $row['state_'];?>,<?php echo $row['pincode'];?> </span> </label></br></br>
                            <?php
                                }
                            
                        ?>           
                                <?php
                                        }
                                    }
                                ?>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                    <button type="submit" name="complete" id="order"class="btn btn-primary" value="Place Order">Place Order</button>
                                    </a>
                                </div>
                        </div>
                        
                    </div>
                </form>
<?php
}
}
?>
            </section>  
          
        </main>
        <!-- JAVASCRIPT FILES -->
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    </body>
</html>