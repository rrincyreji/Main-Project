<!-- establish connection -->
<?php
// Start the session
session_start();

#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=($_GET['type']);
  
    if($type=='status'){
      $operation=($_GET['operation']);
      $id=($_GET['id']);
  
      if($operation=='active'){
        $status='1';
      }
      else{
        $status='0';
      }
      $update_status="UPDATE subsubcategory set status='$status'where sub_id='$id'";
      mysqli_query($con,$update_status);
  
    }
    if($type=='delete'){
      $id=($_GET['id']);
  
      $delete_sql="DELETE FROM  subcategory where sub_id='$id'";
      mysqli_query($con,$delete_sql);
  
    }
  }
  if(isset($_POST['cate'])){
  
    $subcatname = $_POST['subsub_cat'];
    $duplicate=mysqli_query($con,"SELECT * FROM subsub_category WHERE subsub_categoryname='$subcatname'");
    if(mysqli_num_rows($duplicate)>0){
    echo"<script> alert('already exist')</script>";
    
    }
    
    }
  
  $sql="SELECT * FROM subsub_category s,category1 c where s.category_id=c.category1_id ORDER BY subsub_categoryname";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
    if($count>0){ 
?>
<!DOCTYPE html>
<head>
    <title>
        Add sub Sub category
    </title>
    <link rel="stylesheet" type="text/css" href="demo.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
<!-----Add  Sub-category------------------------>
<div style="margin-left:15%;">
    <h2>Add Sub-Categories</h2>
  <div style="margin-left:50px;">

 <form name="work" id="form" action="addsubsub_category.php" method="post">
    <label for="Main_cat">Main Category name:</label>
    <select name="Main_cat" id="category"  required>
    <option disabled selected>Select Category</option>
                                            <?php
                                            $sql="SELECT * from category1 where status='1'";
                                            $result = $con-> query($sql);

                                            if ($result-> num_rows > 0){
                                            while($row = $result-> fetch_assoc()){
                                            echo "<option value='".$row['category1_id']."'>".$row['category1']."</option>";
                                            }
                                            }
                                            ?>
                                    </select>
    <br><br>
    <label for="subcategory" >Sub Category</label>
        <select name="subcategory" id="subcategory">
            <option disabled selected>Select Sub Category</option>
        </select>
    <br><br>
   Sub Sub-Category  name: <input type="text" name="subsub_cat" id="name" placeholder="Enter Category name" required ><br><br>

<input type="submit" name="cate" id="submit" value="Submit">
</form>
<?php
    
     
    if(isset($_POST['cate']))
    {
        $subsubcatname = $_POST['subsub_cat'];
        $subcatname = $_POST['subcategory'];
        $cat_id=$_POST['Main_cat'];
         $insert = mysqli_query($con,"INSERT INTO subsub_category(sub_id,category_id,subsub_categoryname) VALUES ('$subcatname','$cat_id','$subsubcatname')");
 
         if($insert)
         {
            echo "<p id='d' style='color:Green;'>" ."Sub category added succesfully"."</p>" ;
         }
         else
         {
            echo "<p id='d' style='color:Green;'>" ."Could not add sub category"."</p>" ;
         }
     
    }
?>
<!-- view sub sub Category -->
<h2>View Sub category</h2>
<div>
<table class="customers">
      <thead>
      <tr>
        <th>Sl_no</th>
        <th> ID </th>
        <th> Main Category </th>
        <th>Category</th>
        <th>sub Category </th>
        <th> Status </th>
      </tr>
      </thead>
    
        <?php 
        $i=0;
        while($row=mysqli_fetch_assoc($res)){ $i++;?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['subsub_id'] ?></td>
          <td><?php echo $row['category1'] ?></td>
          <td><?php echo $row['sub_id'] ?></td>
          <td><?php echo $row['subsub_categoryname'] ?></td>
          <td><?php
           if ($row['status']==1){
            echo "<span class='badge_active'><a href='?type=status&operation=deactive&id=".$row['subsub_categoryname']."'>Active </a></span>";
           } 
           else{
            echo "<span class='badge_deactive'><a href='?type=status&operation=active&id=".$row['subsub_categoryname']."'>Deactive </a></span>";
           }
           #echo "<span class='badge_delete'>&nbsp&nbsp&nbsp&nbsp<a href='?type=delete&id=".$row['category1']."'> Delete</a></span>";
           #echo "&nbsp<a href='addCategory.php?id=".$row['category_id']."'> Edit </a>";
         ?></td>
        </tr>
        <?php 
            
    }
    }
  else{
    ?>
<tr>
<td colspan="6"><div class="eror">No category !!!</div></td>
</tr>
<?php 
}
?>
</table>
      </div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function(){
            $('#category').on('change', function(){
                var catID = $(this).val();
                if(catID){
                    $.ajax({
                        type:'POST',
                        url:'displaysubcat.php',
                        data:'catid='+catID,
                        success:function(html){
                            $('#subcategory').html(html); 
                        }
                    }); 
                }else{
                    $('#subcategory').html('<option value="">Select category first</option>');
                }
            });
            
        });
    </script>
</div>
</body>
</html>