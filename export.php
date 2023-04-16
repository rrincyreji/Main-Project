<?php
session_start();
$category='';
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
$email=$_SESSION['email'];
$sql="SELECT * FROM registration_s where email='$email'";
        $result=$con->query($sql);
        $count=1;
        //if($result->num_rows > 0){
          while($row=$result->fetch_assoc()){
            $user_id=$row["registration_id"];
$sql="SELECT * FROM product p, order_items o,size s where p.reg_id='$user_id' and p.product_id=o.product_id  and p.size=s.size_id ORDER BY p.p_name";                    
$res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
$html='<table class="table table-striped table-borderless">
      
<tr>
<th style="font-weight:bold;border: 1px solid black;">Sl_no</th>
<th style="font-weight:bold;border: 1px solid black;"> Product name</th>
<th style="font-weight:bold;border: 1px solid black;">Qty</th>
<th style="font-weight:bold;border: 1px solid black;">Size</th>
<th style="font-weight:bold;border: 1px solid black;">Product price</th>
<th style="font-weight:bold;border: 1px solid black;">Order Status</th>
<th style="font-weight:bold;border: 1px solid black;"> Status Date</th> 
</tr>';
                        
while ($row = mysqli_fetch_array($res)) {
    $i++;
    $html.='<tr>
    <td style="border: 1px solid black;">'.$i.'</td>
    <td style="border: 1px solid black;">'.$row['p_name'].'</td>
    <td style="border: 1px solid black;">'.$row['quantity'].'</td>
    <td style="border: 1px solid black;">'.$row['name_'].'</td>
    <td style="border: 1px solid black;">'.$row['price'].'.00</td>
    <td style="border: 1px solid black;">';
    if ($row['order_status']==0){
        $html.="<span class='badge_active'>Ordered</span>";
    } elseif($row['order_status']==1){
        $html.="<span class='badge_active'>Shipped</span>";
    } else{
        $html.="<span class='badge_deactive'>Delivered </span>";
    }
    $html.='</td><td style="border: 1px solid black;">'.$row['date_status'].'</td></tr>';
    $i++;
}
          }
$html.='</table>';

// set the headers for the download
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename="order_report_'.date('d-m-Y', strtotime('now + 5 hours 30 minutes')).'.xls"');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Report</title>
</head>
<body>
    <!-- <h1>Order Report</h1>
    <p>Date: <?php echo date('d-m-Y', strtotime('now + 5 hours 30 minutes')); ?></p> -->
    <?php echo $html; ?>
</body>
</html>
