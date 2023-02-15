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
    $update_status="UPDATE category1 set status='$status'where category1_id='$id'";
    mysqli_query($con,$update_status);

  }
  if($type=='delete'){
    $id=($_GET['id']);

    $delete_sql="DELETE FROM  category1 where category1_id='$id'";
    mysqli_query($con,$delete_sql);

  }
}


$sql="SELECT * FROM category1 ORDER BY category1";
$res=mysqli_query($con,$sql);
$count=mysqli_num_rows($res);
  if($count>0){ 
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" type="text/css" href="admin.css"> <style>  
</style>
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
  <a href="#">Hi, ADMIN<br><h6>
  <?php
echo "Today is " . date("Y/m/d") . "<br>";
?></h6></a>
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
      <h2>Add Main_Categories</h2>

      <h3><a href="addCategory1.php"  id="addcat"> <div style="color: black; font-size: 20px;"> Add categories</div></a></h3>
      <div id="category">
        
      </div>
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
          <td><?php echo $row['category1_id'] ?></td>
          <td><?php echo $row['category1'] ?></td>
          <td><?php
           if ($row['status']==1){
            echo "<span class='badge_active'><a href='?type=status&operation=deactive&id=".$row['category1_id']."'>Active </a></span>";
           } 
           else{
            echo "<span class='badge_deactive'><a href='?type=status&operation=active&id=".$row['category1_id']."'>Deactive </a></span>";
           }
           echo "<span class='badge_delete'>&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['category1_id']."'> Delete</a></span>";
           #echo "&nbsp<a href='addCategory.php?id=".$row['category_id']."'> Edit </a>";
         ?></td>
        </tr>
        <?php 
            
  }
  }
  else{
?>
<tr>
<td colspan="6"><div class="eror">No category !!!</div></td>
</tr>
<?php 
}
?>
      </tbody>
    </table>
    <h3><a href="addsub_category.php"> <div style="color: black; font-size: 20px;"> Add  Sub-categories</div></a></h3>
    <h3><a href="addsubsub_category.php"> <div style="color: black; font-size: 20px;"> Add  SubSub-categories</div></a></h3>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
            $('#addcat').on('click', function(){
                
                    $.ajax({
                        type:'POST',
                        url:'addCategory1.php',
                        success:function(html){
                            $('#category').html(html); 
                        }
                    }); 
            });
            
        });
</script>

</body>
</html>