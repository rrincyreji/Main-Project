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
   ?>
<body>

<div style="position: sticky;" >
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; "></h2></center>
</div>

<!------------------------------------------------------------------------------------------------>

<div class="sidenav">
  <a href="#"><img src="av.jpg" style="width: 150px; height: 150px;"></a>
  <a href="adminhome.php">home</a>
  <button class="dropdown-btn">users
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="demo.php">Enterpreneur</a>
    <a href="adminsupplier.php" >supplier</a>
    <a href="#">customer</a>
  </div>
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
  <button class="dropdown-btn">Dropdown 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a href="reg.php">logout</a>
</div>


<!-------------------------------Registered Customers------------------------------>
<hr>
<div style="margin-left:15%;">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Customer Profile</h3></center><br>
  <div>
      <table class="customers"style="margin-left:0px;" ><thead>
         <tr>
            <th>Name:</th>
            <th>Phone no:</th>
            <th>Gender</th>
             <th>address</th>
            <th>Pincode</th>
         </tr>
         </thead>

<?php 
  $sql="SELECT  * from customer_profile where role ='Customer'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){ 
  //get and display
  while($row=mysqli_fetch_assoc($res)) {
  $name=$row["cust_name"];
    $phone=$row["phoneno"];
    $gender=$row["gender"];
    $addr=$row["Address"];
    $pin=$row["pincode"];
  ?>
  <tr>
     <td><?php  echo $name; ?></td>
     <td><?php  echo $phone; ?></td>
     <td><?php  echo $gender; ?></td>
     <td><?php  echo $addr; ?></td>
     <td><?php  echo $pin; ?></td>
 </form>
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
