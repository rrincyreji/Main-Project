<?php 
// Start the session
session_start();
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(!empty($_POST["catid"]))
{ 
    // Fetch state data based on the specific country 
    $catid= $_POST["catid"];
   # $query = "SELECT * FROM subcategory,category1 WHERE subcategory.category1_id = $catid and subcategory.category1_id=category1.category1_id";
   $query = "SELECT * FROM subcategory WHERE category_id = $catid"; 
   $result = $con->query($query); 
      
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['sub_id'].'">'.$row['sub_category'].'</option>';
        } 
    }else{ 
        echo '<option >Sub category not available</option>'; 
    } 
}
?>