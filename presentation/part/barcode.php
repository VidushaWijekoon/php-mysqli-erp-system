<?php

require_once("sanitizer.php");

	
// Get pararameters that are passed in through $_GET or set to the default value
$text = ( filterInt("text") != "" ) ? filterInt("text") : "0";
$size = ( filterInt("size") != "" ) ? filterInt("size") : "40";
$orientation = ( filterString("orientation") != "" )  ? filterString("orientation") : "horizontal";
$code_type = ( filterString("codetype") != "" )  ? filterString("codetype") : "code128";
$code_string = "";

// Translate the $text into barcode the correct $code_type
switch ( strtolower($code_type) ) {
	case "qrcode":
		$big = $size * 2;
		$imgname = "https://chart.googleapis.com/chart?chs={$big}x{$big}&cht=qr&chl={$text}";
		$original = imagecreatefrompng($imgname); 

		$image = imagecreatetruecolor($size, $size);
		imagecopyresized($image, $original, 0, 0, 0, 0, $size, $size, $big, $big);

		header('Content-Type: image/png');
		imagepng($image);
		imagedestroy($image);
		break;
}



function createImage($code_string) {
	global $size;
	global $orientation;

	// Pad the edges of the barcode
	$code_length = 40;
	for ( $i=1; $i <= strlen($code_string); $i++ )
		$code_length = $code_length + (integer)(substr($code_string,($i-1),1));

	if ( strtolower($orientation) == "horizontal" ) {
		$img_width = $code_length;
		$img_height = $size;
	} else {
		$img_width = $size;
		$img_height = $code_length;
	}

	$image = imagecreate($img_width, $img_height);
	$black = imagecolorallocate ($image, 0, 0, 0);
	$white = imagecolorallocate ($image, 255, 255, 255);

	imagefill( $image, 0, 0, $white );

	$location = 10;
	for ( $position = 1 ; $position <= strlen($code_string); $position++ ) {
		$cur_size = $location + ( substr($code_string, ($position-1), 1) );
		if ( strtolower($orientation) == "horizontal" )
			imagefilledrectangle( $image, $location, 0, $cur_size, $img_height, ($position % 2 == 0 ? $white : $black) );
		else
			imagefilledrectangle( $image, 0, $location, $img_width, $cur_size, ($position % 2 == 0 ? $white : $black) );
		$location = $cur_size;
	}
	// Draw barcode to the screen
	header ('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);
}