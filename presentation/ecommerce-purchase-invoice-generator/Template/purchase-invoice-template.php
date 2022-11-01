<?php
use Phppot\Order;
require_once __DIR__ . '/../Model/Order.php';
function getHTMLPurchaseDataToPDF($result, $orderItemResult, $orderedDate, $due_date)
{
ob_start();
?>
<html>
<head>Receipt of Purchase - 
</head>
<body>
    <?php
    foreach($result as $a){
        echo $a['customer_name'];
        
    }
    ?>
<div style="text-align:right;">
        <b>Sender:</b> CCI COMPUTER GLOBAL INC.
    </div>
    <div style="text-align: left;border-top:1px solid #000;">
        <div style="font-size: 24px;color: #666;">INVOICE</div>
    </div>
</div>
<p><u>Kindly make your payment to</u>:<br/>
Bank: American Bank of Commerce<br/>
A/C: 05346346543634563423<br/>
BIC: 23141434<br/>
</p>
<p><i>Note: Please send a remittance advice by email to vincy@phppot.com</i></p>
</body>
</html>

<?php
return ob_get_clean();
}
?>