<?php
// Start the session
session_start();
$category='';
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
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
//   if($type=='Edit'){
//     $id=($_GET['id']);

//     $edit_status="UPDATE product set status='$status'where product_id='$id'";
//     mysqli_query($con,$edit_sql);
//     header('Location:seller_addproducts.php');
//     die();  

//   }
}
// if(isset($_POST['cate'])){

//   $subcatname = $_POST['sub_cat'];
//   $duplicate=mysqli_query($con,"SELECT * FROM product WHERE p_name='$subcatname'");
//   if(mysqli_num_rows($duplicate)>0){
//   echo"<script> alert('already exist')</script>";
  
//   }
  
//   }
// $email= $_SESSION['email'];
// $sql="SELECT * FROM registration_s where email='$email'";
//         $result=$con->query($sql);
//         $count=1;
//         //if($result->num_rows > 0){
//           while($row=$result->fetch_assoc()){
//             $user_id=$row["registration_id"];
//   $sql="SELECT * FROM product where reg_id='$user_id' ORDER BY p_name";
//   $res=mysqli_query($con,$sql);
//   $count=mysqli_num_rows($res);
    //if($count>0){
?>
<!DOCTYPE html>
<html>
<head>
<?php
    include_once './templatesheader.php';
    ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/x-icon" href="icon.png">
<style>
#mySidenav a {
  position: absolute;
  left: -80px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
  text-decoration: none;
  font-size: 20px;
  color: white;
  border-radius: 0 5px 5px 0;
}

#mySidenav a:hover {
  left: 0;
}

.profile {
  top: 20px;
  background-color: #9FE2BF;
}

.orders {
  top: 100px;
  background-color: #40E0D0;
}

.Analytics {
  top: 180px;
  background-color: #6495ED;
}

.feedback {
  top: 260px;
  background-color: #66C479;
}

.logout {
  top: 320px;
  background-color: #DE3163;
}
.customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body style="background-color:white;">

<div id="mySidenav" class="sidenav">
  <a href="customer_dashboard.php" class="profile">Create profile</a>
  <a href="customerProfileView.php" class="orders">view profile</a>
  <a href="cust_orders.php" class="Analytics">View orders</a>
  <!-- <a href="#" class="feedback">feedback</a> -->
  <a href="index.php" class="logout">logout</a>
</div> 
<div style="margin-left:15%;">
<div class="container" style="transform: translateY(-525px);">
            <!-- your content here -->
            <div class="row">
                <div class="col-md-12">
                
   
<div class="row">

<h2>Order Details</h2>
<div class="col-md-12 grid-margin stretch-card">
<div <div class="table-responsive">
<table class="table table-striped table-borderless">
      
      <tr>
        <th>Sl_no</th>
        <th>Image </th>
        <th> Product name</th>
        <!-- <th> Customer name</th> -->
        <!-- <th colspan="5"> Description </th> -->
        <th>Qty</th>
        <th>Size</th>
        <th>Product price</th>
        <th>Order Status </th>
        <th>Action</th>
      </tr>
      <?php
      $email= $_SESSION['email'];
$sql="SELECT * FROM registration_s where email='$email'";
        $result=$con->query($sql);
        $count=1;
        //if($result->num_rows > 0){
          while($row=$result->fetch_assoc()){
            $user_id=$row["registration_id"];
  $sql="SELECT * FROM product p, order_items o,size s where p.reg_id='$user_id' and p.product_id=o.product_id  and p.size=s.size_id ORDER BY p.p_name";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
    //if($count>0){
?>
    
        <?php 
        $i=0;
        while($row=mysqli_fetch_assoc($res)){ $i++;?>
        <tr>
          <td><?php echo $i ?></td>
          <td><img src= " pics/<?php echo $row['image1'];?>"class="img-fluid product-image" alt="" width=100 px; height=100px;></td>
          <td><?php echo $row['p_name'] ?></td>
          
          <!-- <td colspan="5"><?php echo $row['ddesc'] ?></td> -->
          <td><?php echo $row['quantity'] ?></td>
          <td><?php echo $row['name_'] ?></td>
          <td>₹&nbsp;<?php echo $row['price'] ?>.00</td>
          
          <td><?php
           if ($row['order_status']==0){
            echo "<span class='badge_active'><a href='?type=status&operation=ship&id=".$row['id']."'>Processing </a></span>";
            // echo "<span><a style='color:green; size=10px;' href='?type=status&operation=deactive&id=".$row['product_id']."'><i class='i bi-toggle2-on'></i>Active</a></span>";
           } 
           elseif(($row['order_status']==1)){
            echo "<span class='badge_active'><a href='?type=status&operation=deliver&id=".$row['id']."'>Shipped </a></span>";
            // echo "<span><a style='color:#FC6E7F; href='?type=status&operation=active&id=".$row['product_id']."'><i class='bi bi-toggle2-off'></i>Deactive</a></span>";
            
           }
           else{
            echo "<span class='badge_deactive'><a href='?type=status&operation=deliver&id=".$row['id']."'>Delivered </a></span>";
           }
          //  echo "<span class='badge_delete'>&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['product_id']."'> Delete</a></span>";

          // echo "<span>&nbsp&nbsp&nbsp&nbsp<a style='color:red;' href='?type=delete&id=".$row['product_id']."'> <i class='bi bi-x-circle'></i></a></span>";
         ?> </td>
          <td>
          <?php
           if ($row['order_status']==0){
            echo "<span class='badge_deactive'><a href='?type=delete&id=".$row['id']."'>Cancel </a></span>";
            // echo "<span><a style='color:green; size=10px;' href='?type=status&operation=deactive&id=".$row['product_id']."'><i class='i bi-toggle2-on'></i>Active</a></span>";
           } 
           elseif(($row['order_status']==1)){
            echo "<span class='badge_deactive'><a href='?type=delete&id=".$row['id']."'>Cancel </a></span>";
            // echo "<span><a style='color:#FC6E7F; href='?type=status&operation=active&id=".$row['product_id']."'><i class='bi bi-toggle2-off'></i>Deactive</a></span>";
            
           }
           else{
            echo "<span class='badge_active'><a href='?type=status&operation=deliver&id=".$row['id']."'>Review </a></span>";
           }
          //  echo "<span class='badge_delete'>&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['product_id']."'> Delete</a></span>";

          // echo "<span>&nbsp&nbsp&nbsp&nbsp<a style='color:red;' href='?type=delete&id=".$row['product_id']."'> <i class='bi bi-x-circle'></i></a></span>";
         ?>  </td>
        </tr>
        <?php 
            
    }
    }
  //else{
    ?>
<!-- <tr>
<td colspan="6"><div class="eror">No category !!!</div></td>
</tr> -->
<?php 
//}
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
    <!-------category end--------------------->
    <!-- Create a table mode -->

<!-- footer -->

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
  $(document).ready(function(){
            $('#category').on('change', function(){
                var catID = $(this).val();
                if(catID){
                    $.ajax({
                        type:'POST',
                        url:'displaysubcat1.php',
                        data:'catid='+catID,
                        success:function(html){
                            $('#subcategory').html(html); 
                        }
                    }); 
                }else{
                    $('#subcategory').html('<option value="">Select category first</option>');
                }
            });
            
        });
    </script>
    <?php
    include_once './templatescripts.php';
?>

</body>
</html> 
