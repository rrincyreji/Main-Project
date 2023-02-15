<?php
// Start the session
session_start();
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
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

<div >
  <!--<h2>Hoverable Sidenav Buttons</h2>
  <p>Hover over the buttons in the left side navigation to open them.</p>-->
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; justify-content: top;"></h2></center>
</div>
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
    <a href="subsub_cat.php">subCategories </a>
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
<!-----------------------------------------------------------------dash board ------------------------------------->
<hr>
<div style="margin-left:15%;">
<section>
		
		<div class="grid3">
			<div class="grid">
				<h2 style="color:#1E4840;">Total Registred Users</h2> 
        <?php
        $sql="SELECT * FROM registration_s";
        $row=mysqli_query($con,$sql);
        if($total_category=mysqli_num_rows($row))
        {
          echo'<h3 style="color:#138D75;">'.$total_category.'</h3>';
        }
        ?>
			</div>
			<div class="grid">
				
      <h2 style="color:#1E4840;">Total Customers</h2> 
        <?php
        $sql="SELECT * FROM registration_s where role='Customer'";
        $row=mysqli_query($con,$sql);
        if($total_category=mysqli_num_rows($row))
        {
          echo'<h3 style="color:#138D75;">'.$total_category.'</h3>';
        }
        ?>
			</div>
			<div class="grid">
				
      <h2 style="color:#1E4840;">Total Enterprenuers</h2> 
        <?php
        $sql="SELECT * FROM registration_s where role='Seller'";
        $row=mysqli_query($con,$sql);
        if($total_category=mysqli_num_rows($row))
        {
          echo'<h3 style="color:#138D75;">'.$total_category.'</h3>';
        }
        ?>
			</div>
			<div class="grid">
				
      <h2 style="color:#1E4840;">Total Material Suppliers</h2> 
        <?php
        $sql="SELECT * FROM registration_s where role='Company'";
        $row=mysqli_query($con,$sql);
        if($total_category=mysqli_num_rows($row))
        {
          echo'<h3 style="color:#138D75;">'.$total_category.'</h3>';
        }
        ?>
			</div>
		</div>
	</section>
</div>
<!---------------------------------------------- ------------------------------------------------------->

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