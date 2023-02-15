<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" type="text/css" href="admin.css"> <style>  
</style> -->
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="icon" type="image/x-icon" href="icon.png">
</head>
<?php
   $con=mysqli_connect("localhost","root","","project");

if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_POST["sname"]))
{
$name=$_POST["name"];
#echo $name."br";
$aname=$_POST["aname"];
#echo $aname;
#$iname=$_POST["iname"];
#echo $iname;
$iname=$_FILES["iname"]["name"];
#echo $iname;
//$iname=$_POST["iname"];

//move_uploaded_file(filename, destination)
move_uploaded_file($_FILES["iname"]["tmp_name"],"files/".$iname);
$result=mysqli_query($con,"INSERT INTO cust_imag( name, description, image) VALUES ('$name','$aname','$iname')");
}
   ?>
<body>

<div >
  <!--<h2>Hoverable Sidenav Buttons</h2>
  <p>Hover over the buttons in the left side navigation to open them.</p>-->
  <center><h2><img src="logo.png"style="width: 150px; height: 150px; justify-content: top;"></h2></center>
</div>
<div class="sidenav">
  <a href="#"><img src="av.jpg" style="width: 150px; height: 150px;"></a>
  <button class="dropdown-btn">users
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">seller</a>
    <a href="#">supplier</a>
    <a href="#">customer</a>
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

<div class="main">
  <hr>
  <p>Upload images</p>
   <form name="work" id="form" action="#" method="post" enctype="multipart/form-data">
    Name:  <input type="text" name="name" id="name" required ><br><br>
 Description: <input type="text" name="aname" id="desc" required><br><br>
  image: <input type="file" name="iname" id="img" required><br><br>
  submit:<input type="submit" name="sname" id="submit">
  <!----------------------------------------------------------------------------------->
  <hr>
<p><center>uploaded image list</center>
  <div>
      <table class="customers" ><thead>
         <tr>
            <th>Name</th>
            <th>Description</th>
            <th>image name</th>
         </tr>
         </thead>
<?php 
  $sql="SELECT `name`, `description`, `image` from cust_imag ";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){ 
  //get and display
  while($row=mysqli_fetch_assoc($res)) {
  //$email=$row['email'];
  //$role=$row['role'];
    $name=$row["name"];
    $aname=$row["description"];
    $iname=$row["image"];
  ?>
  <tr>
     <td><?php  echo $name; ?></td>
     <td><?php  echo $aname; ?></td>
     <td><?php  echo $iname; ?></td>

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
                            </div>

                        </div>  
  <!--<table class="customers">
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>image</th>
      <th>submit</th>
    </tr>
    <tr></tr>
  </table>-->
  <!--<h2>Sidebar Dropdown</h2>
  <p>Click on the dropdown button to open the dropdown menu inside the side navigation.</p>
  <p>This sidebar is of full height (100%) and always shown.</p>
  <p>Some random text..</p>--->
  <hr>

</div>
<!------------------------------------------------------------------------------------------------>
<p><center>customer list</center>
  <div>
      <table class="customers"style="margin-left:200px;" ><thead>
         <tr>
            <th>Email</th>
            <th>role</th>
         </tr>
         </thead>
<?php 
  $sql="SELECT  `email`, `role` from registration_s where role!='Admin'";
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
                            </div>

                        </div>
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
/*function addRow() {
  var name = document.getElementById('name').value;
                 var desc = document.getElementById('desc').value;
                  var img = document.getElementById('img').value;
                  
                  // get the html table
                  // 0 = the first table
                  var table = document.getElementsByTagName('table')[0];
                  
                  // add new empty row to the table
                  // 0 = in the top 
                  // table.rows.length = the end
                  // table.rows.length/2+1 = the center
                  var newRow = table.insertRow(table.rows.length/2+1);
                  
                  // add cells to the row
                  var cel1 = newRow.insertCell(-1);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                  
                  // add values to the cells
                  cel1.innerHTML = name;
                  cel2.innerHTML = desc;
                  cel3.innerHTML = img;
  
}*/

</script>

</body>
</html> 
