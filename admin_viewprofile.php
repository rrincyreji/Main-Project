<?php
#required('top.inc.php');
session_start();
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(!isset($_SESSION["email"])){
  header("location:loginpage.php");
}
if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}
$user=$_GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile view</title>
    <!-- ---------------------------------------------------------------------------------------------------- -->
    <link rel="stylesheet" type="text/css" href="profile_view.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- ---------------------------------------------------------------------------------------------------- -->
    
</head>
<body>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                <?php
									//$sql3="SELECT * from profile_ where profile_.user_id=(select registration_id from registration_s where email='$email')";
                                    $sql3="SELECT * from profile_ where id=$user";
									$res = $con-> query($sql3);
                                    if ($res-> num_rows > 0){
                                        while($ro = $res-> fetch_assoc()){
									?>
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo $ro['image_'];?>" alt=""/>
                            <!-- <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2 style="text-transform:uppercase">
                                    <?php echo $ro['name_'];?>
                                    </h2>
                                    <h6 style="text-transform:uppercase">
                                    <?php echo $ro['brand'];?>
                                    </h6>
                                    <span class="proile-rating">User ID  : </span> <span><?php echo $ro['id'];?></span><br>
                                    <span class="proile-rating">RANKINGS : </span> <span>8/10</span>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Address Details</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                        <!-- <a href="cust_profile.php" class="profile-edit-btn">Edit Profile</a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                         <div class="profile-work">
                            <p>Joined in <?php echo $ro['date_'];?></p>
                            <a href=""><?php  echo $_SESSION['email'];?></a><br/>
                            <span class="proile-rating">AGE     :<?php echo $ro['age'];?> </span><br>
                            <span class="proile-rating">GENDER  :<?php echo $ro['gender'];?> </span>
                            <!--<p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>-->
                        </div> 
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-3"style="text-transform:uppercase">
                                                <p><?php echo $ro['name_'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>House Name</label>
                                            </div>
                                            <div class="col-md-3" style="text-transform:uppercase">
                                                <p><?php echo $ro['house'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>State</label>
                                            </div>
                                            <div class="col-md-3" style="text-transform:uppercase">
                                                <p><?php echo $ro['state_'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>District</label>
                                            </div>
                                            <div class="col-md-3" style="text-transform:uppercase">
                                                <p><?php echo $ro['dist'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Place</label>
                                            </div>
                                            <div class="col-md-3" style="text-transform:uppercase">
                                                <p><?php echo $ro['place'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Pincode</label>
                                            </div>
                                            <div class="col-md-3" style="text-transform:uppercase">
                                                <p><?php echo $ro['pincode'];?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                                        }
                                    }
                ?>
            </form>           
        </div>
</body>
</html>