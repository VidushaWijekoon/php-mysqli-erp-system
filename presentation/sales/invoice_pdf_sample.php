<?php 
require_once ('includes/fpdf.php');
include_once('../../dataAccess/connection.php');

$quatation_id = $_GET['quatation_id'];

$query = "SELECT * FROM sales_customer_information 
        INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
        WHERE sales_quatation_items.quatation_id = '$quatation_id'
        GROUP BY quatation_id ORDER BY quatation_id";
$query_run = mysqli_query($connection, $query);
foreach($query_run as $xd){
  $customer_first_name = $xd['first_name'];
  $customer_last_name = $xd['last_name'];
  $customer_country = $xd['country'];
  $customer_uae_number = $xd['UAE_number'];
  $customer_purchsaing_currency = $xd['currency'];

}

class PDF extends FPDF
{
// Page header
  function Header(){

    //Display Company Info
    $this->SetFont('Arial','B',16);
    $this->SetTextColor(141, 180, 204);
    $this->Cell(50,10,"CCI COMPUTER GLOBAL INC.",0,1);
    $this->SetFont('Arial','',12);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(50, 6,"39 Pemberton Avenue Suite 51 6,",0,1);
    $this->Cell(50, 6,"North York, ON M2M 4L6 Canada",0,1);
    $this->Cell(50, 6,"Contact: Tina Li",0,1);
    $this->Cell(50, 6,"Contact No: +971551553288",0,1);
        
    //Display INVOICE text
    $this->SetY(8);
    $this->SetX(-50);
    $this->SetFont('Arial','B',18);
    $this->SetTextColor(141, 180, 204);
    $this->Cell(50,0,"QUOTATION",0,1);
    
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('Arial','',10);
    $this->Cell(0,6," ",0,1,"R");
    $this->Cell(0,6," Date: 01/16/2023",0,1,"R");
    $this->Cell(0,6," Quatation ID: ",0,1,"R");
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
    $this->Cell(100,6,"Invoice to",0,1,'L',true);
  }

  // Page footer
  function Footer(){
    $this->SetY(-80);
    $this->SetFont('Arial','B', 12);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(0,6,"Bank Details: ",0,1,"L");
    $this->SetFont('Arial','', 10);
    $this->Cell(0,6,"Bank Name: TD Canada Trust",0,1,"L");
    $this->Cell(0,6,"Bank Address: 3477 Sheppard Ave East,Scarborough.ON,M1T 3K6",0,1,"L");
    $this->Cell(0,6,"Branch Transit Code: 10332",0,1,"L");
    $this->Cell(0,6,"Bank I.D. Code:004",0,1,"L");
    $this->Cell(0,6,"Account NO: 7311188",0,1,"L");
    $this->Cell(0,6,"CC code: 000410332",0,1,"L");
    $this->Cell(0,6,"Swift code: TDOMCATTTOR",0,1,"L");
    $this->Cell(0,6,"Bank Tel: 416 291 9566",0,1,"L");
    //$this->Ln(5);
    $this->SetFont('Arial','',8);
    $this->Cell(0,5," ",0,1,"R");
    $this->Cell(0,5,"Benificiary Name: CCI COMPUTER GLOBAL INC.",0,1,"R");
    $this->Cell(0,5,"Beneficiary Address: 39 Pemberton Avenue Suite 517 North York,ON M2M 4L6 Canada",0,1,"R");
    $this->Cell(0,5,"Benificiary Tel: 647-267-0818",0,1,"R");
    $this->SetFont('Arial','',10);
  }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(2,2," ",0,1,"R");
$pdf->Cell(2,6, $customer_first_name . " " . $customer_last_name . " " . $customer_country . '',0,1);
$pdf->Cell(2,5,'Contact: +971 '. $customer_uae_number .'',0,1);

$pdf->SetFillColor(95,10,161);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(135,5,'Description',1,0,'C',true);
$pdf->Cell(20,5,'Unit Price',1,0,'C',true);
$pdf->Cell(20,5,'Quantity',1,0,'C',true);
$pdf->Cell(20,5,'Total Price',1,0,'C',true);


$query = "SELECT * FROM sales_quatation_items WHERE quatation_id = '$quatation_id'";
$query_run = mysqli_query($connection, $query);
foreach($query_run as $d){
  $device = $d['device'];
  $brand = $d['brand'];
  $model = $d['model'];
  $processor = $d['processor'];
  $core = $d['device'];
  $generation = $d['generation'];
  $speed = $d['speed'];
  $lcd_size = $d['lcd_size'];
  $resolution = $d['resolution'];
  $touch_or_non_touch = $d['touch_or_non_touch'];
  $ram = $d['ram'];
  $hdd_capacity = $d['hdd_capacity'];
  $hdd_type = $d['hdd_type'];
  $os = $d['os'];
  $qty = $d['qty'];
  $unit_price = $d['unit_price'];
  $total = $d['total'];
  
  $pdf->SetFont('Arial','',10);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Cell(2,5," ",0,1,"R");
  $pdf->SetFont('Arial','',7);
  $pdf->Cell(135,5, strtoupper($device . '/' . $brand . '/' . $model . '/' . $processor . '/' . $core . '/' . $speed . '/' . $lcd_size . '/' . $resolution . '/' . $touch_or_non_touch . '/' . $ram . '/' . $hdd_capacity . '/' . $hdd_type . '/' . $os ),1,0,'L',0);
  $pdf->Cell(20,5, $unit_price, 1,0,'L',0);
  $pdf->Cell(20,5, $qty, 1,0,'L',0);
  $pdf->Cell(20,5, $total ,1,0,'L',0);

}

$query_1 = "SELECT SUM(qty) AS Total_Qty, SUM(total) AS Total_Amount FROM sales_quatation_items WHERE quatation_id = '$quatation_id'";
$query_result = mysqli_query($connection, $query_1);
foreach($query_result as $x){
  $total_qty = $x['Total_Qty'];
  $total_amount = $x['Total_Amount'];
}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(2,5,"",0,1,"R");
$pdf->Cell(135,5,'',1,0,'L',0);
$pdf->Cell(20,5,'',1,0,'L',0);
$pdf->Cell(20,5, $total_qty,1,0,'L',0);
$pdf->Cell(20,5, $total_amount,1,0,'L',0);

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
$pdf->Cell(145,6,"Purchasing Currency in " . strtoupper($customer_purchsaing_currency) ,0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(145,5,'Total Quatation Price: ',1,0,'R');
$pdf->Cell(25,5,'',1,0,'C');
$pdf->Cell(25,5, $total_amount,1,0,'C');
$pdf->Output();

?>