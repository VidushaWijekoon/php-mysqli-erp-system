<?php 
    session_start();

    include './WebClientPrint/src/WebClientPrint.php';
    use Neodynamic\SDK\Web\WebClientPrint;
?>

<!DOCTYPE html>
<html>

<head>
    <title>How to directly Print HTML Content without Preview or Printer Dialog</title>
</head>

<body>
    <!-- Store User's SessionId -->
    <input type="hidden" id="sid" name="sid" value="<?php echo session_id(); ?>" />

    <h2>Print HTML Card</h2>

    <p>This card is 300px x 400px ⇔ 3.125in x 4.17in (300/96 and 400/96 respectivelly)</p>

    <div id="card" style="width: 384px; height:192px; border-radius: 10px; background-color:antiquewhite;">
        <p>hi</p>
        <!-- <div style="padding: 2px 16px;">
            <h3 style="font:bold 20px Arial">John Doe</h3>
            <p style="font:normal 14px Arial">Architect & Engineer</p>
        </div> -->
    </div>

    <div>
        <label class="checkbox">
            <input type="checkbox" id="useDefaultPrinter" /> <strong>Print to Default printer</strong> or...
        </label>
    </div>

    <div id="loadPrinters">
        Click to load and select one of the installed printers!
        <br />
        <input type="button" onclick="javascript:jsWebClientPrint.getPrinters();" value="Load installed printers..." />
        <br /><br />
    </div>

    <div id="installedPrinters" style="visibility:hidden">
        <label for="installedPrinterName">Select an installed Printer:</label>
        <select name="installedPrinterName" id="installedPrinterName"></select>
    </div>

    <script type="text/javascript">
    var wcppGetPrintersTimeout_ms = 60000; //60 sec
    var wcppGetPrintersTimeoutStep_ms = 500; //0.5 sec

    function wcpGetPrintersOnSuccess() {
        // Display client installed printers
        if (arguments[0].length > 0) {
            var p = arguments[0].split("|");
            var options = '';
            for (var i = 0; i < p.length; i++) {
                options += '<option>' + p[i] + '</option>';
            }
            $('#installedPrinters').css('visibility', 'visible');
            $('#installedPrinterName').html(options);
            $('#installedPrinterName').focus();
            $('#loadPrinters').hide();
        } else {
            alert("No printers are installed in your system.");
        }
    }

    function wcpGetPrintersOnFailure() {
        // Do something if printers cannot be got from the client
        alert("No printers are installed in your system.");
    }
    </script>

    <br />


    <input id="printBtn" type="button" style="font-size:18px" value="Print HTML Card..." />


    // Add Reference to jQuery at Google CDN
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>

    <?php
    //Get Absolute URL of this page
    $currentAbsoluteURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $currentAbsoluteURL .= $_SERVER["SERVER_NAME"];
    if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
    {
        $currentAbsoluteURL .= ":".$_SERVER["SERVER_PORT"];
    } 
    $currentAbsoluteURL .= $_SERVER["REQUEST_URI"];
    
    //WebClientPrinController.php is at the same page level as WebClientPrint.php
    $webClientPrintControllerAbsoluteURL = substr($currentAbsoluteURL, 0, strrpos($currentAbsoluteURL, '/')).'/WebClientPrintController.php';
    
    //PrintHtmlCardController.php is at the same page level as WebClientPrint.php
    $printHtmlCardControllerAbsoluteURL = substr($currentAbsoluteURL, 0, strrpos($currentAbsoluteURL, '/')).'/PrintHtmlCardController.php';
    
    //Specify the ABSOLUTE URL to the WebClientPrintController.php and to the file that will create the ClientPrintJob object
    echo WebClientPrint::createScript($webClientPrintControllerAbsoluteURL, $printHtmlCardControllerAbsoluteURL, session_id());
    ?>

    // REFERENCE to html2canvas utility https://github.com/niklasvh/html2canvas
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" type="text/javascript">
    </script>


    // HTML Printing Logic

    <script>
    $(document).ready(function() {
        $("#printBtn").click(function() {

            //1. generate an image of HTML content through html2canvas utility
            html2canvas(document.getElementById('card'), {
                scale: 5
            }).then(function(canvas) {

                var b64Prefix = "data:image/png;base64,";
                var imgBase64DataUri = canvas.toDataURL("image/png");
                var imgBase64Content = imgBase64DataUri.substring(b64Prefix.length,
                    imgBase64DataUri.length);

                //2. save image base64 content to server-side Application Cache
                $.ajax({
                    type: "POST",
                    url: 'StoreImageFileController.php',
                    data: {
                        base64ImageContent: imgBase64Content
                    },
                    success: function(imgFileName) {
                        //alert("The image file: " + imgFileName + " was created at server side. Continue printing it...");

                        //2. Print the stored image file specifying the created file name
                        jsWebClientPrint.print('useDefaultPrinter=' + $(
                                '#useDefaultPrinter').attr('checked') +
                            '&printerName=' + $('#installedPrinterName').val() +
                            '&imageFileName=' + imgFileName);
                    }
                });


            });

        });
    });
    </script>

</body>

</html>