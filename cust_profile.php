<?php
// #required('top.inc.php');
// session_start();
// #required('top.inc.php');
// $con=mysqli_connect("localhost","root","","project");

// if($con===false){
//     die("ERROR: Could not connect.".mysqli_connect_error());
// }
// if(!isset($_SESSION["email"])){
//   header("location:loginpage.php");
// }
// if(isset($_SESSION['email'])){
//     $email=$_SESSION['email'];
// }
?>
<?php include'templatesession.php'?>
<!DOCTYPE html>
<html>
<head>
    <!-- -------------------------------------------------------------------------------------------------------------- -->
	<meta charset="utf-8">
	<title>Profile</title>
	<!-- <meta name="viewport" content="width=device-width,intial-scale=1.0"> -->
  <!--  -->
	<link rel="stylesheet" type="text/css" href="sellerhome.css">
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
	<link rel="icon" type="image/x-icon" href="icon.png">
  <!--  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
  <!-- ----------------------------------------------------------------------------------------------------------------- -->
  <!-- <style>
  body {
    background:#AED6F1; 
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style> -->
</head>
<body>
  <!-- header -->
<?php// include 'seller_header.php'?>
<!-- body -->
<div class="container rounded bg-white mt-5 mb-5">
<form name="work" id="form" action="cust_profile.php" method="post" enctype="multipart/form-data"> 
    <div class="row">
        <div class="col-md-3 border-right">
        <?php
									$sql3="SELECT * from profile_ where profile_.user_id=(select registration_id from registration_s where email='$email')";
									$res = $con-> query($sql3);
                                    if ($res-> num_rows > 0){
                                        while($ro = $res-> fetch_assoc()){
									?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
              <img class="rounded-circle mt-5" width="150px" src="<?php echo $ro['image_'];?>">
              <span class="text-black-50">joined in &nbsp;&nbsp;<?php echo $ro['date_'];?></span>
              <span class="text-black-50"><i class="bi bi-person"></i>&nbsp;&nbsp;<?php echo $ro['name_'];?></span>
              <!-- <span class="text-black-50"><i class="bi bi-shop"></i>&nbsp;&nbsp;<?php echo $ro['brand'];?> </span> -->
              <span class="text-black-50"><i class="bi bi-envelope"></i>&nbsp;&nbsp;<?php  echo $_SESSION['email'];?></span>
              
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Update  Profile </h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Your name" value="<?php echo $ro['name_'];?>" name="Name"></div>
                    <!-- <div class="col-md-6"><label class="labels">Brand Name</label><input type="text" class="form-control" value="<?php echo $ro['brand'];?>" placeholder="Brand" name="brand"></div> -->
                    <div class="col-md-6"><label class="labels">Age</label><input type="number" class="form-control" placeholder="Age" value="<?php echo $ro['age'];?>" name="age"></div>
                    <div class="col-md-12"><label class="labels">gender</label><select class="form-control" name="gender" value="<?php echo $ro['gender'];?>">
											<option value="M">Male</option>
											<option value="F">Female</option>
											<option value="Other">Other</option>
										</select>
                                    </div>
                </div>
                <div class="row mt-3">
                   
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="Phone number" value="<?php echo $ro['phoneno'];?>" name="phone"></div>
                    <div class="col-md-12"><label class="labels">House Name</label><input type="text" class="form-control" placeholder="House name / Building name" value="<?php echo $ro['house'];?>" name="house"></div>
                    <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="State" value="<?php echo $ro['state_'];?>" name="state"></div>
                    <div class="col-md-6"><label class="labels">District</label><input type="text" class="form-control" placeholder="district" value="<?php echo $ro['dist'];?>" name="dist"></div>
                    <div class="col-md-6"><label class="labels">Place</label><input type="text" class="form-control" placeholder="Place / Locality" value="<?php echo $ro['place'];?>" name="place"></div>
                    <div class="col-md-6"><label class="labels">Pincode</label><input type="text" class="form-control" placeholder="pincode" value="<?php echo $ro['pincode'];?>" name="pin"></div>
                    
                </div>
                <div class="row mt-3">
                <!-- <div class="col-md-6"><label class="labels">ID Proof</label><input type="file" class="form-control" name="proof"></div> -->
                    <div class="col-md-12"><label class="labels">profile image</label><input type="file" class="form-control"name="image" ></div>
                    
                </div>
                <div class="col-md-4">
            <div class="p-3 py-5">
                <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br> -->
                <!-- <div class="col-md-10"><label class="labels">Describe yourself</label><textarea id="w3review"  rows="4" cols="40" placeholder="describe yourself" name="des" value="<?php echo $ro['desc_'];?>"></textarea></div> <br> -->
                <!-- <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div> -->
            </div>
        </div>
        
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Update Profile</button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
<?php
										}
									}
                                    else{
                                    ?>
                                    <!-- else code -->
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
               <img class="rounded-circle mt-5" width="150px" src="pics/draft5.jpg">
               <!--<span class="text-black-50">joined in &nbsp;&nbsp;<?php echo $ro['date_'];?></span>
              <span class="text-black-50"><i class="bi bi-person"></i>&nbsp;&nbsp;<?php echo $ro['name_'];?></span> -->
              <!-- <span class="text-black-50"><i class="bi bi-shop"></i>&nbsp;&nbsp;<?php echo $ro['brand'];?> </span> -->
              <span class="text-black-50"><i class="bi bi-envelope"></i>&nbsp;&nbsp;<?php  echo $_SESSION['email'];?></span>
              
            </div>
        </div>
        
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Create  Profile </h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="Your name"  name="Name" required></div>
                    <!-- <div class="col-md-6"><label class="labels">Brand Name</label><input type="text" class="form-control" placeholder="Brand" name="brand" required></div> -->
                    <div class="col-md-6"><label class="labels">Age</label><input type="number" class="form-control" placeholder="Age"  name="age" required></div>
                    <div class="col-md-12"><label class="labels">gender</label><select class="form-control" name="gender" required >
											<option value="M">Male</option>
											<option value="F">Female</option>
											<option value="Other">Other</option>
										</select>
                                    </div>
                </div>
                <div class="row mt-3">
                   
                    <div class="col-md-12"><label class="labels">Phone Number</label><input type="text" class="form-control" placeholder="Phone number" name="phone"required></div>
                    <div class="col-md-12"><label class="labels">House Name</label><input type="text" class="form-control" placeholder="House name / Building name"  name="house" required></div>
                    <div class="col-md-6"><label class="labels">State</label><input type="text" class="form-control" placeholder="State"  name="state" required></div>
                    <div class="col-md-6"><label class="labels">District</label><input type="text" class="form-control" placeholder="district"  name="dist" required></div>
                    <div class="col-md-6"><label class="labels">Place</label><input type="text" class="form-control" placeholder="Place / Locality"  name="place" required></div>
                    <div class="col-md-6"><label class="labels">Pincode</label><input type="text" class="form-control" placeholder="pincode"  name="pin" required></div>
                    
                </div>
                <div class="row mt-3">
                <!-- <div class="col-md-6"><label class="labels">ID Proof</label><input type="file" class="form-control" name="proof"></div> -->
                    <div class="col-md-12"><label class="labels">profile image</label><input type="file" class="form-control"name="image" required></div>
                </div>
                <div class="col-md-4">
            <div class="p-3 py-5">
                <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience" required><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br> -->
                <!-- <div class="col-md-10"><label class="labels">Describe yourself</label><textarea id="w3review"  rows="4" cols="40" placeholder="describe yourself" name="des" value="" required></textarea></div> <br> -->
                <!-- <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""required></div> -->
            </div>
        </div>
        
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Create Profile</button></div>
            </div>
        </div>
        
    </div>
</div>
</div>
                                    <!-- else code end -->
                                    <?php
                                    }
                                    ?>
</form>
</div>


<!-- footer -->
<?php// include 'footer.php'?>
<!-- ---------------------- -->
<?php  
                      if(isset($_POST['submit']))
                        {
                            $profile_date = date("Y-m-d H:i:s");
                          $name = $_POST['Name'];
                          $brand = $_POST['brand'];
                          $age = $_POST['age'];
                          $gender = $_POST['gender'];
                          $phone=$_POST['phone'];
                          $house=$_POST['house'];
                          $state=$_POST['state'];
                          $dis=$_POST['dist'];
                          $place=$_POST['place'];
                          $pincode=$_POST['pin'];
                          
                          $name1 = $_FILES['proof']['name'];
                            $temp1 = $_FILES['proof']['tmp_name'];
                        
                            $location="./pics/";
                            $image1=$location.$name1;

                            $target_dir="./pics/";
                            $proof=$target_dir.$name1;

                            move_uploaded_file($temp1,$proof);
                          
                          $name2 = $_FILES['image']['name'];
                            $temp2 = $_FILES['image']['tmp_name'];
                        
                            $location="./pics/";
                            $image2=$location.$name2;

                            $target_dir="./pics/";
                            $image=$target_dir.$name2;

                            move_uploaded_file($temp2,$image);
                          $des=$_POST['des'];
                          $email= $_SESSION['email'];
                          $sql="SELECT * FROM registration_s where email='$email'";
                          $result=$con->query($sql);
                        //   $count=1;
                          if($result->num_rows > 0){
                            while($row=$result->fetch_assoc()){
                              $user_id=$row["registration_id"];
							  $sq="SELECT * FROM profile_ where user_id='$user_id'";
							  $res=$con->query($sq);
                          		if($res->num_rows > 0){
									$update=mysqli_query($con,"UPDATE profile_ SET name_='$name', brand='$brand', age='$age', gender='$gender', phoneno='$phone', house='$house', state_='$state', dist='$dis', place='$place', pincode='$pincode',proof='$proof', image_='$image',desc_='$des' where user_id= '$user_id'");
								}
								else
								{
									$insert = mysqli_query($con,"INSERT INTO profile_(user_id,name_, brand, age, gender, phoneno, house, state_, dist, place, pincode, proof, image_, desc_, date_,status) VALUES ('$user_id','$name','$brand','$age','$gender','$phone','$house','$state','$dis','$place','$pincode','$proof','$image','$des','$profile_date',0)");
								}
							
						}
                          }
                        
                        }
                  ?>
                     

</body>
</html>