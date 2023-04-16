
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   $query = "SELECT * FROM subsub_category WHERE sub_id = $catid"; 
   $result = $con->query($query); 
      
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['subsub_id'].'">'.$row['subsub_categoryname'].'</option>';
        } 
    }else{ 
        echo '<option >Sub category not available</option>'; 
    } 
}
?>