<?php 
require_once ('includes/fpdf.php');
include_once('../../dataAccess/connection.php');





$packing_type = "";


 

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
     $this->Cell(50,0,"Packing List",0,1);
        
    
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


$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(35,60," Date: 01/16/2023",0,1,"R");









$pdf->Output();

?>