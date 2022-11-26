<?php
$barcodeText = trim("testing");
$barcodeType="Code128";
$barcodeDisplay="Horizontal";
$barcodeSize=80;
$printText="Im here";
echo '<img class="barcode" alt="'.$barcodeText.'" src="php-barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
'&size='.$barcodeSize.'&print='.$printText.'"/>';

?>