<?php
    session_start();
    #required('top.inc.php');
    $con=mysqli_connect("localhost","root","","project");
    
    if($con===false){
        die("ERROR: Could not connect.".mysqli_connect_error());
    }
 $email=$_SESSION["email"];
    $sq = "SELECT * FROM registration_s where email = '$email'";
    $res = $con-> query($sq);
    if ($res-> num_rows > 0){
    while($ro = $res-> fetch_assoc()){
    $user=$ro['registration_id'];
    $grand_total = 0;
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
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
                                    
                                    <?php
                                    
                                    if($grand_total == 0)
                                    {
                                        ?>
                                        <p><?php echo "No Products in your Order List!" ?> </p>
                                        <?php
                                    }
                                    else{
                                    
                                    ?>
                                 <hr>
                                <p>Total <span class="price">₹ <?= $grand_total ?></span></p>
                                    
                                </div>
                                <input type="hidden" id="amt"name="total_amount" id="total" value="<?= $grand_total; ?>">
                                </br>
                                
                                <div class="form-group">
                                <form method="post" id="payment" action="nb-order.php">
                <script

src="https://checkout.razorpay.com/v1/checkout.js"
data-key="rzp_test_TVNwAWmfG6mLvQ" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
data-amount="<?php echo $grand_total  * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
data-id="order_CgmcjRh9ti2lP7"// Replace with the order_id generated by you in the backend.
data-buttontext="Pay Now"
data-buttonid="pay"

data-name="Stitches"
6324
data-image="https://cdn.pixabay.com/photo/2020/08/05/13/12/eco-5465432_960_720.png"
data-prefill.name="<?php  $email = $_SESSION['email'];
                                $username = explode("@", $email)[0];
                                $username = ucfirst($username);
                                echo $username; ?>"
data-prefill.email=""
data-theme.color="#F37254"
>
</script>
                                
                                
<style>
    .razorpay-payment-button{
        background-color: #fff;
        color: white;
        font-size: 12px;padding: 8px 10px;
        border-radius: 12px; border: none;text-align: center; 
    }
</style>
<div class="form-group">
                                    <button type="submit" id="payment" class="btn btn-primary" value="Pay Now" >Pay Now</button>
                                    </a>
                                </div>
</form>

<?php
    }
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