<?php
session_start();
$category='';
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    }
    if(isset($_GET['type']) && $_GET['type']!=''){
      $type=($_GET['type']);
      if($type=='status'){
        $operation=($_GET['operation']);
        $id=($_GET['id']);
        if($operation=='ship'){
          $status='1';
        }
        elseif($operation=='deliver'){
          $status='2';
        }
        else{
          $status='0';
        }
        $update_status="UPDATE order_items set order_status='$status'where id='$id'";
        mysqli_query($con,$update_status);
      }
      if($type=='delete'){
        $id=($_GET['id']);
        $delete_sql="DELETE FROM  order_items where id='$id'";
        mysqli_query($con,$delete_sql);
      }
      if($type=='review'){
        $id=$_GET['id'];
        header('Location:vue.php?id=<?php echo $id?>');
        die();
      }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />  
<link rel="stylesheet" type="text/css" href="supplier.css"> 
<link rel="icon" type="image/x-icon" href="icon.png">
<?php
    include_once './templatesheader.php';
    ?>
    <style>
.button {
  background-color: #85C1E9 ; /* Blue*/
  border: none;
  color: white;
  text-align: center;
  padding: 8px 10px;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin-right: 10px;
  cursor: pointer;
  border-radius: 15px;
}
.button:hover {
  background-color: #1F999C;
}
</style>
</head>
<body>
<?php
            include_once './cust_navbar.php';
            include_once './cust_sidebar.php';
        ?>
        <div style="margin-left:15%;">
<div class="container" style="transform: translateY(-525px);">
            <!-- your content here -->
            <div class="row">
                <div class="col-md-12"> 
<div class="row">
<h2>Order History</h2>
<br>
<!-- <a href="generate_pdf.php" target="_blank">Download PDF</a>
<a href="excel.php" target="_blank">Export</a> -->
<button class="button" onclick="window.open('generate_pdf.php','_blank')">Download PDF</button>
<button class="button" onclick="window.open('excel.php','_blank')">Export</button>
<div class="col-md-12 grid-margin stretch-card">
<div <div class="table-responsive">
<table class="table table-striped table-borderless">
      
      <tr>
        <th>Sl_no</th>
        <th>Image </th>
        <th> Product name</th>
        <th>Brand Name</th>
        <th> Order Date </th>
        <th>Qty</th>
        <th>Size</th>
        <th>Product price</th>
         <th>Total </th>
        <th> Order Status</th> 
        <th> Action</th> 
      </tr>
      <?php
                        $grand_total=0;
                        $i=0;
                        $email=$_SESSION['email'];

                    $sql3 = mysqli_query($con,"SELECT product.image1 as image1, product.p_name as p_name, profile_.brand as brand, orders.order_date as order_date, order_items.quantity as quantity, size.name_ as name_, product.price as price, order_items.order_status as order_status ,order_items.id as id FROM order_items,product,orders,size,profile_ where order_items.product_id =product.product_id and product.reg_id=profile_.user_id and order_items.order_id=orders.order_id and product.size=size.size_id and orders.user_id=(select registration_id from registration_s where email='$email')");
                        while ($row = mysqli_fetch_array($sql3)) {
                        $sub_total = $row['quantity'] * $row['price'];
                        $grand_total += $sub_total;
                        $i++;
                    ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><img src= " pics/<?php echo $row['image1'];?>"class="img-fluid product-image" alt="" width=100 px; height=100px;></td>
          <td><?= $row['p_name'] ?></td>
          <td><?= $row['brand'] ?></td>
          <td ><?php echo $row['order_date'] ?></td>
          <td><?= $row['quantity'] ?></td>
          <td><?php echo $row['name_'] ?></td>
          <td>₹&nbsp;<?= $row['price'] ?>.00</td>
          <td>₹&nbsp;<?= $sub_total ?>.00</td>
          <td><?php
           if ($row['order_status']==0){
            
            echo "<span class='badge_active'>Ordered</span>";
           } 
           elseif(($row['order_status']==1)){
            echo "<span class='badge_active'>Shipped</span>";
           }
           else{
            echo "<span class='badge_deactive'>Delivered </span>";
           }
         ?> </td>
          <td>
          <?php
           if ($row['order_status']==0){
            echo "<span class='badge_deactive'><a href='?type=delete&id=".$row['id']."'>Delete </a></span>";
           } 
           elseif(($row['order_status']==1)){
            echo "<span class='badge_deactive'><a href='?type=delete&id=".$row['id']."'>Delete </a></span>";
           }
           else{
            echo "<span class='badge_active'><a href='vue.php?id=".$row['id']."'>Review </a></span>";
           }
         ?>  </td>
        </tr>
        <?php        
    }
    ?>
</table>
  </div>
      </div>
  </div>
  </div>
  </div>
      <!--  -->
  </div>
  </div>
  </div>

    <?php
    include_once './templatescripts.php';
?>
</body>
</html>