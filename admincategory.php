<?php
// Start the session
session_start();
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

    if($operation=='active'){
      $status='1';
    }
    else{
      $status='0';
    }
    $update_status="UPDATE category set status='$status'where category_id='$id'";
    mysqli_query($con,$update_status);

  }
  if($type=='delete'){
    $id=($_GET['id']);

    $delete_sql="DELETE FROM  category where category_id='$id'";
    mysqli_query($con,$delete_sql);

  }
}


$sql="SELECT * FROM category ORDER BY category";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
  if($count>0){ 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="demo.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>

<div style="position: sticky;" >
  <!--<h2>Hoverable Sidenav Buttons</h2>
  <p>Hover over the buttons in the left side navigation to open them.</p>-->
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; "></h2></center>
</div>

<!------------------------------------------------------------------------------------------------>

<div class="sidenav">
<a href="#"><img src="draft44.jpg" style="width: 150px; height: 150px;border-radius: 50%"></a>
  <a href="#">Hi, ADMIN</a><br>
  <a href="#"><i class="fa fa-home" aria-hidden="true"></i>   Home</a>
  <button class="dropdown-btn"><i class="fa fa-users" aria-hidden="true"></i>   Users
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="demo.php">Enterpreneur</a>
    <a href="adminsupplier.php">Supplier</a>
    <a href="admincustomer.php">Customer</a>
  </div>
  <!-- <a href="admincategory1.php"> Main Category</a> -->
  <!--<a href="#services">Services</a>-->
  <button class="dropdown-btn">Category
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="admincategory1.php">Manage Categories </a>
  </div>
  <!-- <button class="dropdown-btn">Sub-Categories 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Material supply </a>
    <a href="#">Entreprenuer </a>
  </div> -->
  <a href="admintodo.php"><i class="fa fa-tasks" aria-hidden="true"></i>   To-do</a>
  <a href=admincalender.php><i class="fa fa-calendar" aria-hidden="true"></i>   Calender</a>
  <a href=bot.php><i class="fa fa-android" aria-hidden="true"></i></i>   Chat Bot</a>

  <a href="logout.php">logout   <i class="fa fa-sign-out" aria-hidden="true"></i></a>
</div>



    <!-----Add category------------------------>
    <div style="margin-left:15%;">
      <h2>Material supply category</h2>
      <h3><a href="addCategory.php"><div style="color: red; font-size: 20px;"> Add categories</div></a></h3>
    <table class="customers">
      <thead>
      <tr>
        <th>Sl_no</th>
        <th> ID </th>
        <th> Category </th>
        <th> Status </th>
      </tr>
      </thead>
      <tbody>
        <?php 
        $i=0;
        while($row=mysqli_fetch_assoc($res)){ $i++;?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['category_id'] ?></td>
          <td><?php echo $row['category'] ?></td>
          <td><?php
           if ($row['status']==1){
            echo "<a href='?type=status&operation=deactive&id=".$row['category_id']."'>Active </a>";
           } 
           else{
            echo "&nbsp<a href='?type=status&operation=active&id=".$row['category_id']."'>Deactive </a>";
           }
           echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['category_id']."'> Delete</a>";
           #echo "&nbsp<a href='addCategory.php?id=".$row['category_id']."'> Edit </a>";
         ?></td>
        </tr>
        <?php 
            
  }
  }
  else{//msg
?>
<tr>
<td colspan="6"><div class="eror">No category !!!</div></td>
</tr>
<?php 
}
?>
      </tbody>
    </table>
    </div>
    <!-------category end--------------------->


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

</body>
</html> 
