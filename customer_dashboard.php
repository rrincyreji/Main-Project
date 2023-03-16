<?php
// Start the session
//session_start();
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
  <!-- <div style="margin-left:0px;background:#DEDCDD;">
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; "></h2></center>
</div> -->
  <!-- <div class="login-wrapper"style="margin-left:0px;background:ghostwhite;">
  
</div> -->
<?php include 'cust_profile.php'?>


<div id="mySidenav" class="sidenav">
  <a href="customer_dashboard.php" class="profile">Create profile</a>
  <a href="customerProfileView.php" class="orders">view profile</a>
  <a href="cust_orders.php" class="Analytics">View orders</a>
  <!-- <a href="#" class="feedback">feedback</a> -->
  <a href="index.php" class="logout">logout</a>
</div> 
<script type="text/javascript">
    $(function () {
    $("#fname_error_message").hide();
    $("#sname_error_message").hide();
    $("#email_error_meassage").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();
    $("#phone_error_message").hide();


var error_fname = false;
    var error_sname = false;
    var error_email = false;
    var error_password = false;
    var error_retype_password = false;
    var error_phone = false;



$("#form_fname").focusout(function () {
        check_fname();
    });

    $("#form_sname").focusout(function () {
        check_sname();
    });

    $("#form_email").focusout(function () {
        check_email();
    });

    $("#form_password").focusout(function () {
        check_password();
    });

    $("#form_retype_password").focusout(function () {
        check_retype_password();
    });

    $("#form_phone").focusout(function () {
        check_phone();
    });




 function check_phone() {
        var phone = $("#form_phone").val();
        var pattern = /^[6,7,8,9][0-9]{0,9}$/;
        if (phone.length == 10 && pattern.test(phone)) {
            $("#phone_error_message").hide();
            $("#form_phone").css("border-bottom", "2px solid #34F458");
        } else if (phone == "") {
            $("#phone_error_message").html("Phone number cannot be blank");
            $("#phone_error_message").show();
            $("form_phone").css("border-bottom", "2px solid #F90A0A");
            error_phone = true;
        } else {
            $("#phone_error_message").html("Enter valid phone number");
            $("#phone_error_message").show();
            $("form_phone").css("border-bottom", "2px solid #F90A0A");
            error_phone = true;
        }
    }

    function check_fname() {
        var pattern = /^[a-zA-Z/s]*$/;
        var fname = $("#form_fname").val();
        if (pattern.test(fname) && fname !== "") {
            $("#fname_error_message").hide();
            $("#form_fname").css("border-bottom", "2px solid #34F458");
        } else if (fname == "") {
            $("#fname_error_message").html("This column cannot be blank");
            $("#fname_error_message").show();
            $("#form_fname").css("border-bottom", "2px solid #F90A0A");
            error_fname = true;
        } else {
            $("#fname_error_message").html("It should contain only charachters");
            $("#fname_error_message").show();
            $("#form_fname").css("border-bottom", "2px solid #F90A0A");
            error_fname = true;
        }
    }

    function check_sname() {
        var pattern = /^[a-zA-Z]*$/;
        var sname = $("#form_sname").val();
        if (pattern.test(sname) && sname !== "") {
            $("#sname_error_message").hide();
            $("#form_sname").css("border-bottom", "2px solid #34F458");
        } else if (sname == "") {
            $("#sname_error_message").html("This column cannot be blank");
            $("#sname_error_message").show();
            $("form_sname").css("border-bottom", "2px solid #F90A0A");
            error_fname = true;
        } else {
            $("#sname_error_message").html("It should contain only characters");
            $("#sname_error_message").show();
            $("form_sname").css("border-bottom", "2px solid #F90A0A");
            error_sname = true;
        }
    }

    function check_password() {
        var password = $("#form_password").val();
        var patternn = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/;
        if (patternn.test(password) && password !== "") {
            $("#password_error_message").hide();
            $("#form_password").css("border-bottom", "2px solid #34F458");
        } else if (password == "") {
            $("#password_error_message").html("Password cannot be blank");
            $("#password_error_message").show();
            $("form_password").css("border-bottom", "2px solid #F90A0A");
            error_password = true;
        } else {
            $("#password_error_message").html("Atleast 8 characters and should in proper format");
            $("#password_error_message").show();
            $("#form_password").css("border-bottom", "2px solid #F90A0A");
            error_password = true;
        }
    }

    function check_retype_password() {
        var password = $("#form_password").val();
        var retype_password = $("#form_retype_password").val();
        if (password !== retype_password) {
            $("#retype_password_error_message").html("   Password is not matching");
            $("#retype_password_error_message").show();
            $("#retype_form_password").css("border-bottom", "2px solid #F90A0A");
            error_retype_password = true;
        } else {
            $("#retype_password_error_message").hide();
            $("#form_retype_password").css("border-bottom", "2px solid #34F458");
        }
    }
    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#form_email").val();
        if (pattern.test(email) && email !== "") {
            $("#email_error_message").hide();
            $("form_email").css("border-bottom", "2px solid #34F458");
        } else {
            $("#email_error_message").html("Email should be in proper format and cannot be blank");
            $("#email_error_message").show();
            $("#form_email").css("border-bottom", "2px solid #F90A0A");
            error_email = true;
        }
    }




 $("#registration_form").submit(function () {
        error_fname = false;
        error_sname = false;
        error_email = false;
        error_password = false;
        error_retype_password = false;
        error_phone = false;




 check_fname();
        check_sname();
        check_email();
        check_password();
        check_retype_password();

check_phone();



 if (
            error_fname === false &&
            error_sname === false &&
            error_email === false &&




  error_phone === false &&
            error_password === false &&
            error_retype_password === false
        ) {
            return true;
        } else {
            alert("Please fill the form Correctly");

            return false;
        }
    });




 });
</script>  
</body>
</html> 
