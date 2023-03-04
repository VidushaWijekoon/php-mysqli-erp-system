<?php
include_once '../../dataAccess/connection.php';
require 'vendor/autoload.php';
$query = "SELECT * FROM `warehouse_information_sheet` GROUP BY model,core ORDER BY brand,model;";
$result_brand = mysqli_query($connection, $query);

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator('PhpOffice')
    ->setLastModifiedBy('PhpOffice')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('PhpOffice')
    ->setKeywords('PhpOffice')
    ->setCategory('PhpOffice');
$i = 1;
$b = 1;
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("A$i", "brand");
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("B$i", 'Model');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("C$i", 'Core');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("D$i", 'generation');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("E$i", 'RAM');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("F$i", 'HardDisk Capacity');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("G$i", 'Touch Screen');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("H$i", 'Non Touch Screen');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("I$i", 'Total Stock');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("J$i", 'Touch Screen Price (US$)');
$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue("K$i", 'Non Touch Screen Price (US$)');
foreach ($result_brand as $row) {
    $i++;
    $brand = $row['brand'];
    $model = $row['model'];
    $core = $row['core'];
    $generation = $row['generation'];
    $touch_price = $row['touch_wholesale_price'];
    $non_touch_price = $row['non_touch_wholesale_price'];
    if (empty($touch_price)) {} else {
        $touch_price = "$" . $touch_price;
    }
    if (empty($touch_price)) {} else {
        $non_touch_price = "$" . $non_touch_price;
    }

    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("A$i", "$brand");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("B$i", "$model");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("C$i", "$core");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("D$i", "$generation");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("E$i", "8GB");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("F$i", "256GB");
    $query_stock = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND core='$core' AND dispatch='0'";
    $result_stock = mysqli_query($connection, $query_stock);
    $in_stock = 0;
    foreach ($result_stock as $data) {
        $in_stock = $data['in_stock'];
    }
    $query_touch = "SELECT COUNT(inventory_id)as touch_count FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND core='$core' AND dispatch='0'AND touch_or_non_touch='yes'";
    $result_touch = mysqli_query($connection, $query_touch);
    $touch_stock = 0;
    foreach ($result_touch as $data1) {
        $touch_stock = $data1['touch_count'];
    }
    $none_touch_s = $in_stock - $touch_stock;
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("G$i", "$touch_stock");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("H$i", "$none_touch_s");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("I$i", "$in_stock");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("J$i", "$touch_price");
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("K$i", "$non_touch_price");

}
$spreadsheet->getActiveSheet()->setTitle('Stock Summery');

$query = "SELECT brand FROM `warehouse_information_sheet` GROUP BY brand;";
$result_brand_group = mysqli_query($connection, $query);
$k = 0;
foreach ($result_brand_group as $row) {
    $k++;

    $brand1 = $row['brand'];
    $spreadsheet->createSheet();
// Add some data
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('A1', 'Brand');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('B1', 'Model');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('C1', 'Core');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('D1', 'Generation');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('E1', 'Ram');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('F1', 'HardDisk Capacity');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('G1', 'Touch Screen');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('H1', 'None Touch Screen');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('I1', 'Total Stock');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue("J1", 'Touch Screen Price');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue("K1", 'Non Touch Screen Price');
    $query_model = "SELECT * FROM `warehouse_information_sheet` WHERE brand='$brand1' GROUP BY model,core ORDER BY model ";
    $result_model = mysqli_query($connection, $query_model);
    $b = 1;
    foreach ($result_model as $spec) {
        $model = $spec['model'];
        $core = $spec['core'];
        $generation = $spec['generation'];
        $touch_price1 = $spec['touch_wholesale_price'];
        $non_touch_price1 = $spec['non_touch_wholesale_price'];
        if (empty($touch_price1)) {} else {
            $touch_price1 = "$" . $touch_price1;
        }
        if (empty($non_touch_price1)) {} else {
            $non_touch_price1 = "$" . $non_touch_price1;
        }
        $b++;
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("A$b", "$brand1");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("B$b", "$model");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("C$b", "$core");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("D$b", "$generation");
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("E$b", "8GB");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("F$b", "256GB");
        $query = "SELECT COUNT(inventory_id)as touch_count FROM `warehouse_information_sheet` WHERE brand = '$brand1' AND model='$model' AND core='$core'AND touch_or_non_touch='yes' AND dispatch='0'";
        $result = mysqli_query($connection, $query);
        $touch_count = 0;
        foreach ($result as $data) {
            $touch_count = $data['touch_count'];
        }
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("G$b", "$touch_count");
        $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand1' AND model='$model'AND core='$core' AND dispatch='0'";
        $result = mysqli_query($connection, $query);
        $in_stock = 0;
        foreach ($result as $data) {
            $in_stock = $data['in_stock'];
        }
        $none_touch = $in_stock - $touch_count;

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("H$b", "$none_touch");
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("I$b", "$in_stock");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("J$b", "$touch_price1");
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("K$b", "$non_touch_price1");
    }
    $spreadsheet->getActiveSheet()->setTitle("$brand1");
}
$spreadsheet->setActiveSheetIndex(0);
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_date = $date1->format('Y-m-d');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=ALSAKB_Inventory_$start_date.xlsx");
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;