<?php 
require_once ('includes/fpdf.php');
include_once('../../dataAccess/connection.php');

// $quatation_id = $_GET['quatation_id'];



$packing_type = "";

// $query = "SELECT packing_type FROM sales_quatation_items WHERE quatation_id = '$quatation_id'";
// $query_run = mysqli_query($connection, $query);
// foreach($query_run as $l){
//   $packing_type = $l['packing_type'];
// }

// $query = "SELECT first_name, last_name, country, UAE_number, currency, pickup_method, payment_terms FROM sales_customer_information 
//         INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
//         WHERE sales_quatation_items.quatation_id = '$quatation_id'
//         GROUP BY quatation_id ORDER BY quatation_id";
// $query_run = mysqli_query($connection, $query);
$query_run = [];
foreach($query_run as $xd){
  $customer_first_name = "";
  $customer_last_name = "";
  $customer_country = "";
  $customer_uae_number ="";
  $customer_purchsaing_currency ="";
  $pickup_method ="";
  $payment_terms ="";

}
 

class PDF extends FPDF
{
// Page header
  function Header(){
    $myImage = "../../static/dist/img/alsakb logo.png";  // this is where you get your Image
    $this->Image($myImage, 163,18, 33.78);

    //Display Company Info
    $this->SetFont('Arial','B',16);
 
    $this->SetTextColor(141, 180, 204);
    $this->Cell(50, 8,"Alsakb Computer",0,1);
    $this->SetFont('Arial','',12);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(50, 6,"Shubra No.15 - 19 Maliha Rd - behind City Retail Hypermarket,",0,1);
    $this->Cell(50, 6,"Industrial Area 5 - Al Sharjah",0,1);
    $this->Cell(50, 6,"Contact: Tina Li",0,1);
    $this->Cell(50, 6,"Contact No: +971551553288",0,1);
        
    //Display INVOICE text
    $this->SetY(15);
    $this->SetX(-50);
    $this->SetFont('Arial','B',18);
    $this->SetTextColor(141, 180, 204);
    $this->Cell(50,0,"SALES ORDER",0,1);


    
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('Arial','',10);
    $this->Cell(0,6," ",0,1,"R");
    // $this->Cell(0,6," Date: 01/16/2023",0,1,"R");
    $this->SetFont('Arial','',10);
        
    //Display Horizontal line
    $this->SetY(47);
    $this->SetX(1);
    $this->SetFont('Arial','',12);
        // Background color
    $this->SetTextColor(255, 255, 255);
    $this->SetFillColor(30,29,136);
    // Title
    $this->SetFont('Arial','B',12);
    $this->Cell(100,6,"Quotation to",0,1,'L',true);
  }

  // Page footer
  function Footer(){
    $this->SetY(-120);
    $this->SetFont('Arial','B', 12);
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('Arial','', 10);
    $this->Cell(0,6,"",0,1,"C");
    $this->Cell(0,6,"Welcome to Make a Business with Alsakb Computers",0,1,"C");
    $this->Cell(0,6,"Visit https://alsakbcomputer.com",0,1,"C");
  }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(120,2," ",0,1,"R");
$pdf->Cell(2,6," ",0,1);
$pdf->Cell(2,5,"",0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(2,5," ",0,1);
$pdf->Cell(2,5," ",0,1);
$pdf->Cell(2,5,"",0,1);


$pdf->SetFillColor(95,10,161);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(135,5,'Description',1,0,'C',true);
$pdf->Cell(20,5,'Unit Price',1,0,'C',true);
$pdf->Cell(20,5,'Quantity',1,0,'C',true);
$pdf->Cell(20,5,'Total Price',1,0,'C',true);


// $query = "SELECT device, brand, model, processor, device, generation, speed, lcd_size, resolution, touch_or_non_touch, ram, hdd_capacity, hdd_type, os, qty, unit_price, total, packing_type
//     FROM sales_quatation_items WHERE quatation_id = '$quatation_id'";
$query_run = [];
foreach($query_run as $d){
  $device =" ";
  $brand =" ";
  $model ="";
  $processor = " ";
  $core =" ";
  $generation =" ";
  $speed = " ";
  $lcd_size =" ";
  $resolution =" ";
  $touch_or_non_touch =" ";
  $ram =" ";
  $hdd_capacity =" ";
  $hdd_type =" ";
  $os = " ";
  $qty =" ";
  $unit_price =" ";
  $total =" ";
  $packing_type =" ";
  
  $pdf->SetFont('Arial','',10);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Cell(2,5," ",0,1,"R");
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(135,5, strtoupper($device . '/' . $brand . '/' . $model . '/' . $processor . '/' . $core . '/' . $speed . '/' . $lcd_size . '/' . $resolution . '/' . $touch_or_non_touch . '/' . $ram . '/' . $hdd_capacity . '/' . $hdd_type . '/' . $os ),1,0,'L',0);
  $pdf->Cell(20,5, $unit_price, 1,0,'L',0);
  $pdf->Cell(20,5, $qty, 1,0,'L',0);
  $pdf->Cell(20,5, $total ,1,0,'L',0);

}

// $query_1 = "SELECT SUM(qty) AS Total_Qty, SUM(total) AS Total_Amount FROM sales_quatation_items WHERE quatation_id = '$quatation_id'";
// $query_result = mysqli_query($connection, $query_1);
// foreach($query_result as $x){
//   $total_qty = $x['Total_Qty'];
//   $total_amount = $x['Total_Amount'];
// }

$pdf->SetFont('Arial','B',10);
$pdf->Cell(2,5,"sdsdsf",0,1,"R");
$pdf->Cell(135,5,'adadsads',1,0,'L',0);
$pdf->Cell(20,5,'',1,0,'L',0);
$pdf->Cell(20,5," dsfsfs",1,0,'L',0);
$pdf->Cell(20,5,"asdadad ",1,0,'L',0);

$pdf->Cell(2,5," ",0,1,"R");
$pdf->SetFont('Arial','',12);
// Background color
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(30,29,136);
// Title
$pdf->SetFont('Arial','B',10);
$pdf->Cell(135,6,"Other Comment and Remarks",0,1,'L',true);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(145,6,"Purchasing Currency in ",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(145,5,'Total Quatation Price: ',1,0,'R');
$pdf->Cell(25,5,'',1,0,'C');
$pdf->Cell(25,5," ",1,0,'C');
$pdf->Output();

?>