<?php 
require_once ('includes/fpdf.php');
include_once('../../dataAccess/connection.php');

$pdf = new FPDF();

$qa_id = $_GET['quatation_id'];

$query = "SELECT * FROM sales_quatation_items";
$result = mysqli_query($connection, $query);
foreach($result as $r){
  
}
  class PDF extends FPDF
  {

    function Header(){
 
      //Display Company Info
      $this->SetFont('Arial','B',16);
      $this->Cell(50,10,"CCI COMPUTER GLOBAL INC.",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50, 6,"39 Pemberton Avenue Suite 51 6,",0,1);
      $this->Cell(50, 6,"North York, ON M2M 4L6 Canada",0,1);
      $this->Cell(50, 6,"Contact: Tina Li",0,1);
      $this->Cell(50, 6,"Contact No: +971551553288",0,1);
      
      //Display INVOICE text
      $this->SetY(8);
      $this->SetX(-50);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,0,"QUOTATION",0,1);

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
      $this->SetFillColor(4,8,118);
      // Title
      $this->SetFont('Arial','B',12);
      $this->Cell(100,6,"Invoice to",0,1,'L',true);

    }
    

    function Footer(){
      
      //set footer position
      
      $this->SetY(-80);
      $this->SetFont('Arial','B', 12);
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
      // $this->Ln(5);
      $this->SetFont('Arial','',8);
      $this->Cell(0,5," ",0,1,"L");
      $this->Cell(0,5,"Benificiary Name: CCI COMPUTER GLOBAL INC.",0,1,"L");
      $this->Cell(0,5,"Beneficiary Address: 39 Pemberton Avenue Suite 517 North York,ON M2M 4L6 Canada",0,1,"L");
      $this->Cell(0,5,"Benificiary Tel: 647-267-0818",0,1,"L");
      $this->SetFont('Arial','',10);
            
    }
}
  
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->Output();
?>