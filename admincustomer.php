<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="demo.css">
<!--<link rel="stylesheet" type="text/css" href="admin .css"><style>

</style><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<?php
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
    $update_status="UPDATE profile_ SET status='$status'where id='$id'";
    mysqli_query($con,$update_status);

  }
  if($type=='delete'){
    $id=($_GET['id']);

    $delete_sql="DELETE FROM  profile_ where id='$id'";
    mysqli_query($con,$delete_sql);

  }
}
#if(isset($_POST["sname"]))
#{
#$name=$_POST["name"];
#echo $name."br";
#$aname=$_POST["aname"];
#echo $aname;
#$iname=$_POST["iname"];
#echo $iname;
#$iname=$_FILES["iname"]["name"];
#echo $iname;
//$iname=$_POST["iname"];

//move_uploaded_file(filename, destination)
#move_uploaded_file($_FILES["iname"]["tmp_name"],"files/".$iname);
#$result=mysqli_query($con,"INSERT INTO cust_imag( name, description, image) VALUES ('$name','$aname','$iname')");
#}
   ?>
<body>


<!------------------------------------------------------------------------------------------------>

<?php include 'admin_sidenav.php'?>

<!------------------------------------------------------------------------------------------------>

<!-------------------------------Registered Customers------------------------------>
<hr>
<div style="margin-left:15%;">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Profile Created Users </h3></center><br>
  <div>
      <table class="customers"style="margin-left:0px;" >
        <thead>
         <tr>
            <th>Sl.no</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
            <th>View Profile</th> 

         </tr>
         </thead>

<?php 
  //$sql="SELECT  `email`, `role` from registration_s where role ='Customer'";
 
  $sql="SELECT * from profile_, registration_s where profile_.user_id= registration_s.registration_id ";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){ 
  //get and display
  $i=0;
  while($row=mysqli_fetch_assoc($res)) {
    $i++;
    $email=$row['email'];
    $role=$row['role'];
  $action=$row['status'];
  $email=$row['email'];
  $rid=$row['id'];
  ?>
  <tr>
    <td style="color:black;"><?php  echo $i; ?></td>
     <td style="color:black;"><?php  echo $email; ?></td>
     <td style="color:black;"><?php  echo $role; ?></td>
     <td> <?php
           if ($action==0){
           // echo "<span class='badge_active'><a href='?type=status&operation=deactive&id=".$rid."'>Active </a></span>";
            echo "<span class='badge_deactive'><a href='?type=status&operation=active&id=".$rid."'>Pending </a></span>";
           } 
           else{
            //echo "<span class='badge_deactive'><a href='?type=status&operation=active&id=".$rid."'>Deactive </a></span>";
            echo "<span class='badge_active'><a href='?type=status&operation=deactive&id=".$rid."'>Approved </a></span>";
           }
           //echo "<span class='badge_delete'>&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['id']."'> Delete</a></span>";
           #echo "&nbsp<a href='addCategory.php?id=".$row['category_id']."'> Edit </a>";
         ?>
         </td>
     <td>
    
      <!-- <button>View<a href="vue.php?user=<?php echo $row['id'] ?>"></button> -->
      <a class="badge_delete" href="admin_viewprofile.php?user=<?php echo $row['id'] ?>" target="_blank" >view</a>

          </a>
       </form>
    </td>
 
 </tr>
<?php 
            
  }
  }
  else{//msg
?>
<tr>
<td colspan="6"><div class="eror">No customers !!!</div></td>
</tr>
<?php 
}
?>
</table>
</div>
        </div>
      </form>
    </div>
    
    <!---------------------------------------------------------------------------------->

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
