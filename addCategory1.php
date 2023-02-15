<?php
// Start the session
session_start();
$category='';
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_POST['cate'])){

$category=($_POST['name']);
$duplicate=mysqli_query($con,"SELECT * FROM category1 WHERE category1='$category'");
if(mysqli_num_rows($duplicate)>0){
echo"<script> alert('already exist')</script>";

}
else{
mysqli_query($con,"INSERT INTO category1(category1,status) VALUES ('$category',1)");
header('Location:admincategory1.php');
die();
}
}

?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="demo.css">
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
  <button class="dropdown-btn">categories
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a href="reg.php">logout</a>
</div>



    <!-----Add category------------------------>
    <div style="margin-left:15%;">
      <h3><a href="addCategories.php"> Add Main categories</a></h3>
    <div style="margin-left:50px;">
  
   <form name="work" id="form" action="#" method="post">
    Category name  <input type="text" name="name" id="name" placeholder="Enter Category name" required ><br><br>
 
  Submit:<input type="submit" name="cate" id="submit">
  
</form>
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
