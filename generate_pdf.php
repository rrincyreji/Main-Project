<?php
include_once './fpdf.php';

// Start the session
session_start();
$category='';
#required('top.inc.php');
$con=mysqli_connect("localhost","root","","project");
if($con===false){
    die("ERROR: Could not connect.".mysqli_connect_error());
}

if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
}

// Create new PDF object
$pdf = new FPDF();

// Add new page
$pdf->AddPage();

// Set logo position and add logo
$pdf->Image('logo.png', 85, 10, 30);
$pdf->SetY(40);

// Set title and date/time
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0, 40, 'Order Report', 0, 0, 'C');
$pdf->Ln(10);

// set timezone to Kolkata
date_default_timezone_set('Asia/Kolkata');
// time
$pdf->SetFont('Arial','',12);
$pdf->Cell(0, 0, 'Generated on: '.date("F j, Y, g:i a"), 0, 0, 'C');
$pdf->Ln(20);


// Set font and color for the table header row
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(255,255,255);

// Define table headers
$header = array('Sl.no', 'Image', 'Product name', 'Brand Name', 'Order Date', 'Qty', 'Size', 'price');

// Set column width and height
$w = array(13,20, 60, 40, 20, 10,10,15);
$h = 10;

// Add table header row
for($i=0;$i<count($header);$i++)
    $pdf->Cell($w[$i],$h,$header[$i],1,0,'L',true);
$pdf->Ln();

// Set font and color for table rows
$pdf->SetFont('Arial','',9);
$pdf->SetFillColor(255,255,255);

// Define SQL query to retrieve data from database
$sql3 = mysqli_query($con,"SELECT product.image1 as image1, product.p_name as p_name, profile_.brand as brand, orders.order_date as order_date, order_items.quantity as quantity, size.name_ as name_, product.price as price, order_items.order_status as order_status ,order_items.id as id FROM order_items,product,orders,size,profile_ where order_items.product_id =product.product_id and product.reg_id=profile_.user_id and order_items.order_id=orders.order_id and product.size=size.size_id and orders.user_id=(select registration_id from registration_s where email='$email')");

// Add table rows
$i=1;
$grand_total=0;
while ($row = mysqli_fetch_array($sql3)) {
    $sub_total = $row['quantity'] * $row['price'];
    $grand_total += $sub_total;

    $pdf->Cell($w[0],$h,$i++,1,0,'C');
    $pdf->Cell($w[1], $h, $pdf->Image('pics/'.$row['image1'], $pdf->GetX(), $pdf->GetY(), $w[1], $h), 1, 0);
    //$pdf->Image('pics/'.$row['image1'], $pdf->GetX(), $pdf->GetY(), $w[1], $h);
    $pdf->Cell($w[2],$h,$row['p_name'],1,0,'L');
    $pdf->Cell($w[3],$h,$row['brand'],1,0,'C');
    $pdf->Cell($w[4],$h,$row['order_date'],1,0,'C');
    $pdf->Cell($w[5],$h,$row['quantity'],1,0,'C');
    $pdf->Cell($w[6],$h,$row['name_'],1,0,'C');
    $pdf->Cell($w[7],$h,$row['price'],1,0,'C');
    $pdf->Ln();
}


// Add the grand total to the PDF document
$pdf->Ln();
$pdf->Cell(array_sum($w), $h, 'Grand Total: '.$grand_total, 0, 0, 'R');

$pdf->Output();
?>