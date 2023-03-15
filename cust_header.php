<?php
#required('top.inc.php');
 //session_start();
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(!isset($_SESSION["email"])){
  header("location:loginpage.php");
}
include 'google_translater.php';
?>
<!DOCTYPE html>
<html>
<head>
	<!-- bot chat code -->
	<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"17c2d8939be8684f6c42dc0002ef3dd83","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
	<!--chat bot code end -->
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width,intial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="custhome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
	
<nav calss="navbar">
    <h5 class="logo1"><img src="logo.png"><?php  echo $_SESSION['email'];?>
</h5>
  
    <ul class="nav-links">
      <li><a href="index.php"><b>Home</b></li></a>
      <li ><a href="customerproduct.php">shop</li></a>
	  <li><a href="cust_wishlist.php"><i class="bi bi-suit-heart"></i></li></a>
	  <li><a href="cust_cart.php"><i class="bi bi-bag"></i></li></a>
	  <li><a href="customerprofile.php"><i class="bi bi-person-fill"></i></li></a>
	  <li><a href="loginpage.php"><i class="bi bi-box-arrow-right"></i></li></a>
	  <li><a href="#">
					<?php echo  date(" d / m / Y");?><br><?php
					date_default_timezone_set("Asia/Kolkata");
					echo  date("h:i:sa");
					?>
			</a>
		</li>
	  
    </ul>
    <!-- <hr> -->
</body>
</html>
