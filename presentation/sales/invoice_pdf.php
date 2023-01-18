<?php 
require_once ('includes/fpdf.php');
include_once('../../dataAccess/connection.php');

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
    $this->Cell(0,6," Quatation ID: CCI-HMP-QA220505",0,1,"R");
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
$pdf->Cell(2,6,'COSCO COMPUTERS NIGERIA'.'',0,1);
$pdf->Cell(2,5,'Contact: 2348067356096'.'',0,1);

$pdf->SetFillColor(95,10,161);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(120,5,'Description',1,0,'C',true);
$pdf->Cell(25,5,'Unit Price',1,0,'C',true);
$pdf->Cell(25,5,'Quantity',1,0,'C',true);
$pdf->Cell(25,5,'Total Price',1,0,'C',true);

$query = "SELECT * FROM users LIMIT 20";
$query_run = mysqli_query($connection, $query);
foreach($query_run as $result){
  $pdf->SetFont('Arial','',10);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->Cell(2,5," ",0,1,"R");
  $pdf->Cell(120,5,'HP 1030 G2 X360 I7 7TH GEN 16/512SSD NO AC',1,0,'L',0);
  $pdf->Cell(25,5,'1500',1,0,'L',0);
  $pdf->Cell(25,5,'10',1,0,'L',0);
  $pdf->Cell(25,5,'14500',1,0,'L',0);
}

$pdf->SetFont('Arial','B',10);
$pdf->Cell(2,5,"",0,1,"R");
$pdf->Cell(120,5,'',1,0,'L',0);
$pdf->Cell(25,5,'',1,0,'L',0);
$pdf->Cell(25,5,'200',1,0,'L',0);
$pdf->Cell(25,5,'300000',1,0,'L',0);

$pdf->Cell(2,5," ",0,1,"R");
$pdf->SetFont('Arial','',12);
// Background color
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFillColor(30,29,136);
// Title
$pdf->SetFont('Arial','B',10);
$pdf->Cell(145,6,"Other Comment and Remarks",0,1,'L',true);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(145,6,"Purchasing Currency in AED",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(145,5,'Total Quatation Price: Three Hundress Thousands',1,0,'L');
$pdf->Cell(25,5,'Total',1,0,'C');
$pdf->Cell(25,5,'300,000',1,0,'C');
$pdf->Output();

?>