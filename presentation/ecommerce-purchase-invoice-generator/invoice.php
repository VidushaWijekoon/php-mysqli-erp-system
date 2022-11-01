<?php
use Phppot\Order;
require_once __DIR__ . '/Model/Order.php';
$orderModel = new Order();
$e = $_GET['id'];
$result = $orderModel->getPdfGenerateValues($e);
$orderItemResult = $orderModel->getOrderItems($e);
if (! empty($result)) {
    require_once __DIR__ . "/lib/PDFService.php";
    $pdfService = new PDFService();
    $pdfService->generatePDF($result, $orderItemResult);
}