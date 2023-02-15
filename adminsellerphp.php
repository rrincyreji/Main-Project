<?php
// Start the session
$con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}

if(isset($_POST['add']))
  {
    $name=$_POST['suppliername'];
    $proof=$_POST['supplier_proof'];
    $pic=$_POST['photo'];
    $addr=$_POST['address'];
    $phoneno=$_POST['phoneno'];
    $companyname=$_POST['company_name'];
    $mail=$_POST['email'];
    $password=$_POST['password'];
$e="SELECT email from registration_s where email='$mail' AND  role='Company'";
$ee=mysqli_query($con,$e);

//for checking dupilcate email id
if(mysqli_num_rows($ee) > 0){
    $errors['e']="Email already exists";
    echo "<script> alert('Already Registered');</script>";
}
//##########################################################################################
if(count($errors)==0){
    $query1="INSERT INTO registration_s(`email`, `password`) VALUES ('$mail','$password');
    if ($con->query($query1) === TRUE) {
      
        
        $qury=INSERT INTO addsupplier( `suppliername`, `supplier_proof`, `photo`, `address`, `phoneno`, `company_name`, `email`, `password`) VALUES ('$name','$proof','$pic','$addr','$phoneno','$companyname','$mail','$password')";
         

 if ($con->query($qury) === TRUE ) {
           // For displaying msg Header( 'Location: Dashboard.php?success=1' );
             
        echo"<script>alert('Password Link sent to mail');
        window.location.href='add_doctor.php';
        </script>";
           
          
          }
           else {
            echo "Error: " . $qury . "<br>" . $con->error;
          }   } 
         else{
            echo "Error: " . $query1 . "<br>" . $con->error;
         }
//######################## end add doctor ####################
    }
?>