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
<?php include 'admin_sidenav.php'?>
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