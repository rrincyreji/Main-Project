<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="demo.css">
<!--<link rel="stylesheet" type="text/css" href="admin .css"><style>

</style><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<?php
   $con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_POST["add"]))
{
  $name=$_POST['suppliername'];
    #$proof=$_POST['supplier_proof'];
  $proof=$_FILES["supplier_proof"]["name"];
    #$pic=$_POST['photo'];
  $pic=$_FILES["photo"]["name"];
    $addr=$_POST['address'];
    $phoneno=$_POST['phoneno'];
    $companyname=$_POST['company_name'];
    $mail=$_POST['email'];
    $password=$_POST['password'];
    $result=mysqli_query($con,"INSERT INTO addsupplier( `suppliername`, `supplier_proof`, `photo`, `address`, `phoneno`, `company_name`, `email`, `password`) VALUES ('$name','$proof','$pic','$addr','$phoneno','$companyname','$mail','$password')");
}
   ?>
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
    <a href="#" >supplier</a>
    <a href="admincustomer.php">customer</a>
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


<!-------------------------------Registered Suppliers------------------------------>
<hr>
<div style="margin-left:15%;">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Registered Suppliers</h3></center><br>
  <div>
      <table class="customers"style="margin-left:0px;" ><thead>
         <tr>
            <th>Email</th>
            <th>role</th>
         </tr>
         </thead>

<?php 
  $sql="SELECT  `email`, `role` from registration_s where role ='Company'";
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
<td colspan="6"><div class="eror">No Suppliers!!!!!</div></td>
</tr>
<?php 
}
?>
</table>
</div>
        </div>
      </form>
    </div>    
    <!----------------------------------------Add suppliers------------------------------------------>
    <div style="margin-left:15%;">
<div class="input-group"><br>
          <p><center><h3>Add suppliers</h3></center><br>
  <div>
    <form action="" class="form" method="POST" enctype="multipart/form-data">
      
       <label>Supplier Name</label>
       <input type="text" id="form_dname" class="form-control"placeholder="Supplier Name"  name="suppliername" autocomplete="off">
       <br><br>

       <label>Supplier proof</label>
       <input type="file" class="form-control" id="form_proof" placeholder="Supplier Proof" value="proof"  name="supplier_proof" autocomplete="off" >
       <br><br>

       <label>Photo</label>
       <input type="file" class="form-control" id="form_photo" placeholder="Degree Proof" value="photo" name="photo" autocomplete="off">
       <textarea id="form_address"class="form-control" placeholder="Home Address" value="Address" name="address" autocomplete="off"></textarea>
       <br><br>

       <label>Phone number</label>
       <input type="phone" id="form_phone" class="form-control" placeholder="Phone number" maxlength="10" name="phoneno" autocomplete="off">
       <br><br>
  
       <label>Comapany Name</label>
       <input type="text" id="form_dname" class="form-control"placeholder="Company Name"  name="company_name" autocomplete="off">
       <br><br>

       <label for="exampleInputEmail1">Email address</label>
       <input type="email" id="form_email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
       <br><br>
       
       <label for="exampleInputEmail1">
       Password</label>
       <input type="password" id="form_password" class="form-control" placeholder="password" name="password">
<br><br>
<button type="submit" value="add" class="btn btn-info btn-fill pull-right" name="add">Add</button>
</form>
</div>
<!------------------------------------------------------View suppliers------------------------------->
<div>
  <p><center>uploaded Supplier list</center></p>
  <div>
      <table class="customers" ><thead>
         <tr>
            <th>Supplier Name</th>
            <th>Proof</th>
            <th>Photo of Supplier</th>
            <th>Address</th>
            <th>Phone no</th>
            <th>Company name</th>
            <th>Email</th>
         </tr>
         </thead>
<?php 
  $sql="SELECT * FROM addsupplier";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){ 
  //get and display
  while($row=mysqli_fetch_assoc($res)) {
  //$email=$row['email'];
  //$role=$row['role'];
    $name=$row["suppliername"];
    $proof=$row['supplier_proof'];
    $pic=$row['photo'];
    $addr=$row['address'];
    $phoneno=$row['phoneno'];
    $companyname=$row['company_name'];
    $mail=$row['email'];
  ?>
  <tr>
     <td><?php  echo $name; ?></td>
     <td><img src= " <?php echo $row['supplier_proof'];?>"class="img-fluid product-image" alt="" width=50 px; height=50px;></td>
     <td><img src= " <?php echo $row['photo'];?>"class="img-fluid product-image" alt="" width=50 px; height=50px;></td>
     <td><?php  echo $addr; ?></td>
     <td><?php  echo $phoneno; ?></td>
     <td><?php  echo $companyname; ?></td>
     <td><?php  echo $mail; ?></td>

 </form>
 </tr>
<?php 
            
  }
  }
                                    else{
                                        //msg
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
<!-------------------------------------------------script ------------------------------------------------->

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
