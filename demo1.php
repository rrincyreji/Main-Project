<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" type="text/css" href="admin.css"> <style>  
</style> -->
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>

<div >
  <!--<h2>Hoverable Sidenav Buttons</h2>
  <p>Hover over the buttons in the left side navigation to open them.</p>-->
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; justify-content: top;"></h2></center>
</div>
<div class="sidenav">
  <a href="#"><img src="av.jpg" style="width: 150px; height: 150px;"></a>
  <a href="#">home</a>
  <button class="dropdown-btn">users
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#seller"class="seller">seller</a>
    <a href="#">supplier</a>
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
<!-----------------------------------------------------------------home ------------------------------------->
<hr>
<div style="margin-left:15%;">
  <center>
<table>
  <tr style="color:darkorchid;">
    <th>Total Enterprenuers</th>
    <th>Total Customers</th>
  </tr>
  <tr>
    <td>30</td>
    <td>50</td>
  </tr>
</table>
</center>
</div>
<!----------------------------------------------- seller(Enterprenuers------------------------------------------------------->
<div id="seller">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Registered Entrepreneurs</h3></center><br>
  <div>
      <table class="customers"style="margin-left:0px;" ><thead>
         <tr>
            <th>Email</th>
            <th>role</th>
         </tr>
         </thead>

<?php 
  $sql="SELECT  `email`, `role` from registration_s where role ='Seller'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){ 
  //get and display
  while($row=mysqli_fetch_assoc($res)) {
  $email=$row['email'];
  $role=$row['role'];
  ?>
  <tr>
     <td><?php  echo $email; ?></td>
     <td><?php  echo $role; ?></td>

 </form>
 </tr>
<?php 
            
  }
  }
  else{//msg
?>
<tr>
<td colspan="6"><div class="eror">No customers</div></td>
</tr>
<?php 
}
?>
</table>
</div>
        </div>
      </form>
    </div>
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