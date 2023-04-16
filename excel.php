<?php
session_start();
$category='';
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}
$email=$_SESSION['email'];
$sql3 = mysqli_query($con,"SELECT product.image1 as image1, product.p_name as p_name, profile_.brand as brand, orders.order_date as order_date, order_items.quantity as quantity, size.name_ as name_, product.price as price, order_items.order_status as order_status ,order_items.id as id FROM order_items,product,orders,size,profile_ where order_items.product_id =product.product_id and product.reg_id=profile_.user_id and order_items.order_id=orders.order_id and product.size=size.size_id and orders.user_id=(select registration_id from registration_s where email='$email')");
                        
$html='<table class="table table-striped table-borderless">
      
<tr style="font-weight:bold;border: 1px solid black;">
<th style="font-weight:bold;border: 1px solid black;">Sl_no</th>
<th style="font-weight:bold;border: 1px solid black;"> Product name</th>
<th style="font-weight:bold;border: 1px solid black;">Brand Name</th>
<th style="font-weight:bold;border: 1px solid black;"> Order Date </th>
<th style="font-weight:bold;border: 1px solid black;">Qty</th>
<th style="font-weight:bold;border: 1px solid black;">Size</th>
<th style="font-weight:bold;border: 1px solid black;">Product price</th>
<th style="font-weight:bold;border: 1px solid black;">Total </th>
<th style="font-weight:bold;border: 1px solid black;"> Order Status</th> 
</tr>';
                        
while ($row = mysqli_fetch_array($sql3)) {
    $i++;
    $sub_total = $row['quantity'] * $row['price'];
                        $grand_total += $sub_total;
    $html.='<tr>
    <td style="border: 1px solid black;">'.$i.'</td>
    <td style="border: 1px solid black;">'.$row['p_name'].'</td>
    <td style="border: 1px solid black;">'.$row['brand'].'</td>
    <td style="border: 1px solid black;">'.$row['order_date'].'</td>
    <td style="border: 1px solid black;">'.$row['quantity'].'</td>
    <td style="border: 1px solid black;">'.$row['name_'].'</td>
    <td style="border: 1px solid black;">'.$row['price'].'.00</td>
    <td style="font-weight:bold;border: 1px solid black;">'.$sub_total.'.00</td>
    <td style="border: 1px solid black;">';
    if ($row['order_status']==0){
        $html.="<span class='badge_active'>Ordered</span>";
    } elseif($row['order_status']==1){
        $html.="<span class='badge_active'>Shipped</span>";
    } else{
        $html.="<span class='badge_deactive'>Delivered </span>";
    }
    $html.='</td></tr>';
    $i++;
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
    <h1>Order Report</h1>
    <p>Date: <?php echo date('d-m-Y', strtotime('now + 5 hours 30 minutes')); ?></p>
    <?php echo $html; ?>
</body>
</html>
