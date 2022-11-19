<?php

include './WebClientPrint/src/WebClientPrint.php';

use Neodynamic\SDK\Web\WebClientPrint;
use Neodynamic\SDK\Web\DefaultPrinter;
use Neodynamic\SDK\Web\InstalledPrinter;
use Neodynamic\SDK\Web\PrintFile;
use Neodynamic\SDK\Web\ClientPrintJob;

// Process request
// Generate ClientPrintJob? only if clientPrint param is in the query string
$urlParts = parse_url($_SERVER['REQUEST_URI']);

if (isset($urlParts['query'])) {
    $rawQuery = $urlParts['query'];
    parse_str($rawQuery, $qs);
    if (isset($qs[WebClientPrint::CLIENT_PRINT_JOB])) {

        $useDefaultPrinter = ($qs['useDefaultPrinter'] === 'checked');
        $printerName = urldecode($qs['printerName']);
    
        $filePath = $qs['imageFileName'];
        
        //create a temp file name for our image file...

        //Because we know the Card size is 3.125in x 4.17in, we can specify 
        //it through a special format in the file name (see http://goo.gl/upaazT) so the
        //printing output size is honored; otherwise the output will be sized to Page Width & Height
        //specified by the printer driver default setting
        $fileName = 'MyFile'.uniqid().'-PW=3.125-PH=4.17'.'.png';
            

        //Create a ClientPrintJob obj that will be processed at the client side by the WCPP
        $cpj = new ClientPrintJob();
        //Create a PrintFile object with the PNG file
        $cpj->printFile = new PrintFile($filePath, $fileName, null);
        if ($useDefaultPrinter || $printerName === 'null'){
            $cpj->clientPrinter = new DefaultPrinter();
        }else{
            $cpj->clientPrinter = new InstalledPrinter($printerName);
        }

		//Send ClientPrintJob back to the client
		ob_start();
		ob_clean();
		header('Content-type: application/octet-stream');
		echo $cpj->sendToClient();
		ob_end_flush();
		exit();
        
    }
}