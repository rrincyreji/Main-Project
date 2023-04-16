<?php
session_start();
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}

$Main_cat=get_safe_value($con,$_GET['Main_cat'])
$res=mysqli_query($con,"SELECT * from subscategory  where category_id='$Main_cat' and status='1'");
if(mysqli_num_rows($res)>0){
    $html='';
    while($row=mysqli_fetch_assoc($res)){
        $html.="<option value='".$row['category_id']."'>".$row['sub_category']."</option>";
    }
    echo $html;
}
else{
    echo"<option> No Sub category </option>"
}
?>