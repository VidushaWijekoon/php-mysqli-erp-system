<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Taviraj:ital,wght@0,300;1,400&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<link rel="stylesheet" href="../../static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<?php
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
require_once("sanitizer.php");


 

// $last_update_id =0;
$rack_id = $_SESSION['rack_number'];
$slot_id = $_SESSION['slot_name'];
$model = $_SESSION['model'];
$device = $_SESSION['device'];
$filename = $rack_id."_".$slot_id;
$name = $filename.".png";
$path = "temp/".$name;
$last_id = $_SESSION['last_id'] ;

$last_update_id =0;
$quantity = 1;
$core = $device;
$item_id = 1 ;
echo "<form action=''  method='get'>";

	$howManyCodes =$quantity;
	$digits = 6;
	$start = $last_id; 
	$overText = $rack_id . "".$slot_id."  ".$model ;
	$secondPart = $core;
	$downText = "-".$model;
	$hideText = null;

	$codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";

	$height = $howManyCodes*100;

	$pageWidth =  "450mm";
	$pageHeight =  "250mm";

	$itemWidth = "200mm";
	$itemHeight = "205mm";

	$pageMarginLeft ="0mm";
	$pageMarginTop ="0mm";
	$pageMarginRight = "0mm";
	$pageMarginBottom =  "0mm";;

	$itemMarginBottom =  "0mm";
	$itemMarginRight = "0mm";

	$barCodeHeight ="1000";
	$codetype = "qrcode";
	// echo "<br>Barcode type: <input type='text' name='codetype' value='{$codetype}'> (Valid codetypes: code128, code39, code25, codabar, qrcode)";
	if($last_update_id != 0){
	echo "<br><a href='./part_create_form.php'> Back</a>";
	
}else{
	echo "<br><a href='./part_create_form.php'> Back</a>";
}
	

	echo '<input type="submit" name="production_form" value="Print" onClick="window.print()">';

echo "</form>";



/*
* THE SHEET
*/

function write($code,$path, $overText,$device,  $barCodeHeight, $downText,$secondPart) {
	?>
<style>
p.ex1 {
    margin-top: 0px;
}
</style>
<table class="ex1">
    <tr>
        <th><?php
            if($device == 'keyboard'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'camera'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'bazel'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'mousepad'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'speakers'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'mouse_pad_button'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'camera_cable'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'back_cover'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'wifi_card'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'lcd_cable'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'battery'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'dvd_rom'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'dvd_caddy'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'hdd_caddy'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'hdd_cable_connector'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'c_panel_palm_rest'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'mb_base'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-keyboard fa-4x'> </i></div>";
            }
            if($device == 'hings_cover'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            if($device == 'lan_cover'){
            echo "<div style='font-size: 60; color:black;text-weight:bold;text-align: center;'><i
                    class='fa-solid fa-camera fa-4x'> </i></div>";
            }
            ?>

        </th>
        <th><?php echo  "<div  ><p class = 'text-uppercase' style='font-size: 80; color:black;text-weight:bold;text-align: left;margin:0' >$secondPart</p></div>"; ?>
        </th>
    </tr>
    <tr>
        <!-- <td><?php echo "<img src='barcode.php?codetype=qrcode&size='100'&text={$code}'align='left' width='600' height='600'> </br></br></br></br></br></br> "; ?>
        </td> -->
        <td>
            <center>
                <!-- <div class="qrframe" style="border:2px solid black; width:310px; height:310px;"> -->
                <?php
					echo '<img src="'.$path.'" style="width:300px; height:600px;"><br>'; ?>

                </div>

            </center>
        </td>
        <td>
            <?php 
		if ($overText != "") {
			$abc= strtoupper( $overText);
			echo  "<div  ><p class = 'text-uppercase' style='font-size: 80; color:black;text-weight:bold;text-align: left;margi-top:20mm' >$abc</p></div>";	
		} 
		?>
            <?php
    	// echo strtoupper("<div style = 'font-size: 80; color:black;text-weight:bold;text-align: left;'>ALSAKB$code</div></br></br></br> ");
		?>
        </td>
    </tr>
    </br>


</table>

<?php
    	
}

echo "<div class='sheet'>";
	if ($codeArray != "") { // Specified array of codes
		foreach (json_decode($codeArray) as $secondPart) {
			echo "im here";
			write($code,$path, $overText,$device, $barCodeHeight, $downText,$secondPart);
		}
	} else { // Unspecified codes, let's go incremental
		for ($i = $start; $i < $howManyCodes + $start; $i++) {
			$code = str_pad($i, $digits, "0", STR_PAD_LEFT);
			write($code,$path, $overText,$device, $barCodeHeight, $downText,$secondPart);
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
			padding-bottom: 10;
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

 ?>