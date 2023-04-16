<?php
// Start the session
session_start();

#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
$category=$_REQUEST['category'];
$sql=mysqli_query($con,"SELECT * FROM subcategory WHERE category_id='$category'")


while($sql_fetch=mysqli_fetch_assoc($sql))
{ 
    <option value='<?=$sql_fetch['id']?>'<?=$sql_fetch['subcategory']?></option>
}
?>