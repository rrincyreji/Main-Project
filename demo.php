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

<?php include 'admin_sidenav.php'?>

<!-------------------------------Registered Sellers------------------------------>
<div style="margin-left:15%;">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Registered Entrepreneurs</h3></center><br>
  <div>
      <table class="customers"style="margin-left:0px;" ><thead>
         <tr>
            <th>Email</th>
            <th>role</th>
         </tr>
         </thead>

<?php 
  $sql="SELECT  `email`, `role` from registration_s where role ='Seller'";
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
<td colspan="6"><div class="eror">No Entrepreneurs!!!!!</div></td>
</tr>
<?php 
}
?>
</table>
</div>
        </div>
      </form>
    </div>
<!-------------------------------Registered Company------------------------------>
<div id="supplier">
      <form action="" class="form">
        <div class="input-group"><br>
          <p><center><h3>Registered Sellers</h3></center><br>
  <!--<div>
      <table class="customers"style="margin-left:0px;" ><thead>
         <tr>
            <th>Email</th>
            <th>role</th>
         </tr>
         </thead>

<?php 
  $sql="SELECT  `email`, `role` from registration_s where role ='Seller'";
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
<td colspan="6"><div class="eror">No customers</div></td>
</tr>
<?php 
}
?>
</table>
</div>
        </div>
      </form>-->
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
