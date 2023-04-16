<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<?php
   $con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_POST["cust_pro"]))
{
$name=$_POST["name"];
#echo $name."br";
$phone=$_POST["phoneno"];
$gender=$_POST["gender"];
$addr=$_POST["address"];
$pin=$_POST["pincode"];
#echo $aname;
#$iname=$_POST["iname"];
#echo $iname;
#$iname=$_FILES["iname"]["name"];
#echo $iname;
//$iname=$_POST["iname"];

//move_uploaded_file(filename, destination)
#move_uploaded_file($_FILES["iname"]["tmp_name"],"files/".$iname);
$result=mysqli_query($con,"INSERT INTO customer_profile(cust_name, phoneno, gender, Address, pincode) VALUES ('$name','$phone','$gender','$addr','$pin')");
}
   ?>
<body>
  <div style="margin-left:0px;background:#DEDCDD;">
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; "></h2></center>
  <center><h2>view profile</h2></center>
</div>
  <div class="login-wrapper"style="margin-left:0px;background:ghostwhite;">

<div class="form" action="#" method="POST" id="registration_form">
    <div class="input-group">
    <label for="username">Your name:</label><br>
        <input type="text" id="form_name" class="form__input" placeholder="Enter your name"   name="name" autocomplete="off" required>
        <span class="error_form" id="name_error_message"></span>
    </div>
    <!--<div class="form__input-group">
    <label for="username">EMAIL:</label><br></br>
        <input type="text" class="form__input"  name="email" id="form_email" autocomplete="off"required>
        <span class="error_form" id="email_error_message"></span>
       
    </div>-->
    <div class="input-group">
    <label for="phoneno">Phone no:</label><br>
        <input type="number" class="form__input"  name="phoneno" placeholder="phone number" id="form_phoneno"autocomplete="off" required minlength="10" id="phoneno" min="1111111111" max="10000000000">
        <span class="error_form" id="phoneno_error_message"></span>
       
    </div>
    <div class="form__input-group">
        
        <label for="gender">Gender:</label><br>
               <input type="radio" id="male" name="gender" value="Male" >Male
               <input type="radio" id="female" name="gender" value="Feamle">Female         
    </div>

    <div class="input-group">
    <label for="username">Address:</label><br>
        <input type="text" class="form__input"  name="address" id="form_address"placeholder="address"autocomplete="off" required>
        <span class="error_form" id="address_error_message"></span>
       
    </div>
    <div class="input-group">
    <label for="pin">Pincode:</label><br>
        <input type="number" class="form__input"  name="pincode" id="form_pincode" placeholder="Pincode" autocomplete="off" required minlength="6" id="pin" min="111111" max="1000000">
        <span class="error_form" id="pincode_error_message"></span>
       
    </div>

    <button class="submit-btn" type="submit" name="cust_pro">Edit Profile</button>
    <!--<p class="form__text">
        <a class="form__link" href="newlogin.php" id="linkLogin">Already have an account?Login</a>
    </p>-->

</div>
</div>


<div id="mySidenav" class="sidenav">
  <a href="customerprofile.php" class="profile">Create profile</a>
  <a href="#" class="orders">view profile</a>
  <a href="#" class="Analytics">View Wislist</a>
  <a href="#" class="feedback">feedback</a>
  <a href="customerhome.php" class="logout">logout</a>
</div> 
 
</body>
</html> 
