<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Taviraj:ital,wght@0,300;1,400&display=swap"
    rel="stylesheet">
<!-- Latest compiled and minified CSS -->

<!--  -->
<?php
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
require_once("sanitizer.php");

session_start();
$last_update_id =0;
$quantity = $_SESSION['quantity'];
$brand = $_SESSION['brand'];
$model = $_SESSION['model'];
$generation = $_SESSION['generation'];
$core = $_SESSION['core'];
$location = $_SESSION['location'];
$last_id = $_SESSION['last_id'] ;
if(empty($_SESSION['last_update_id'])){ $last_update_id =0;}else{

	$last_update_id = $_SESSION['last_update_id'];
}

// $query = "SELECT inventory_id FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1";
//                                             $query_run = mysqli_query($connection, $query);
//                                             $print_data = mysqli_fetch_row($query_run);
echo "<form action=''  method='get'>";
if($last_update_id != 0){
	$last_id = $last_update_id  ;
	
}else{
	$last_id = $last_id + 1;
}
	$howManyCodes =$quantity;
	$digits = 6;
	$start = $last_id; 
	$overText = $brand."  ".$model ;
	$secondPart = $core." GEN".$generation;
	$downText = $generation."-".$model;
	$rack = $location; 
	$hideText = null;

	$codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";

	$height = $howManyCodes*100;

	$pageWidth =  "200mm";
	$pageHeight =  "$height.mm";

	$itemWidth = "200mm";
	$itemHeight = "105mm";

	$pageMarginLeft ="0mm";
	$pageMarginTop ="0mm";
	$pageMarginRight = "0mm";
	$pageMarginBottom =  "0mm";;

	$itemMarginBottom =  "45mm";
	$itemMarginRight = "10mm";

	$barCodeHeight ="170px";
	$codetype = "qrcode";
	// echo "<br>Barcode type: <input type='text' name='codetype' value='{$codetype}'> (Valid codetypes: code128, code39, code25, codabar, qrcode)";
	if($last_update_id != 0){
	echo "<br><a href='./warehouse_qr_report.php'> Back</a>";
	
}else{
	echo "<br><a href='./warehouse_information_sheet.php'> Back</a>";
}
	

	echo '<input type="submit" name="production_form" value="Print" onClick="window.print()">';

	echo "<h2>Preview:</h2>";
echo "</form>";



/*
* THE SHEET
*/
function write($code, $overText, $rack, $barCodeHeight, $downText,$secondPart) { ?>



<div class="card mb-3" style="max-width: 940px;">
    <div class="row g-0">
        <h5 style="margin: 5px 0 -30px 20px; position: absolute; font-size: 32px;">
            <?php if ($overText != "") {
			$abc= strtoupper( $overText);
    		echo  "$abc &nbsp $secondPart ";
    	} 
		?><table>
                <th><?php echo "<img src='barcode.php?codetype=qrcode&size={$barCodeHeight}&text={$code}'align='left'width='450' height='450'> "; ?>
                </th>
                <th height: 370px;><?php 
		echo strtoupper("<div style = 'font-size: 40; color:black;text-weight:bold;text-align: left;'>$rack");
		echo strtoupper("<div style = 'font-size: 40; color:black;text-weight:bold;text-align: left;'>$downText");
    	echo strtoupper("<div style = 'font-size: 40; color:black;text-weight:bold;text-align: left;'>ALSAKB$code</div></br> ");
		echo "<p style='page-break-after:always'></p>";
		?></th>
            </table>

            <?php
}
    	

echo "<div class='sheet'>";
	if ($codeArray != "") { // Specified array of codes
		foreach (json_decode($codeArray) as $secondPart) {
			write($code, $overText, $rack, $barCodeHeight, $downText,$secondPart);
		}
	} else { // Unspecified codes, let's go incremental
		for ($i = $start; $i < $howManyCodes + $start; $i++) {
			$code = str_pad($i, $digits, "0", STR_PAD_LEFT);
			write($code, $overText, $rack, $barCodeHeight, $downText,$secondPart);
		}
	}
echo "</div>";


/*
* THE STYLE
*/
echo <<<STYLE
	<style>
		html {
		}
		body {
			width: $pageWidth;
			font-family: 'Bree Serif', serif;
		}
		
		.sheet {
			box-sizing: border-box;
			background-color: #FFF;
			height: $pageHeight;
			width: $pageWidth;
			overflow: hidden;

			padding-left: $pageMarginLeft;
			padding-top: $pageMarginTop;
			padding-right: $pageMarginRight;
			padding-bottom: 0;
		}
		.item {
			float: left;
			
			vertical-align: middle;
			border: 0;
			overflow: visible;

			height: $itemHeight;
			width: $itemWidth;
			margin-left: 0;
			margin: bottom 0px !important;
			margin: top 15px !important;

			box-sizing: border-box;
			display: flex;
		    justify-content:center;
		    align-content:center;
		    flex-direction:column;
		}
		img {
			max-width: $itemWidth;
			width: auto !important;
			margin: 0 auto;
		}

		@media print {
			html, body {
				margin: 0;
				padding: 0;
				height: $pageHeight;
				width: $pageWidth;
			}
		    form {
		        display: none;
		    }
			.item {
				border: none;
				page-break-inside: avoid;
			}
		}

		
	</style>
STYLE;

 