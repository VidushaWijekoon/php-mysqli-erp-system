<?php
include_once('../../dataAccess/connection.php');
require 'vendor/autoload.php';
$brand = $_GET['brand'];
$query = "SELECT model,core,COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' GROUP BY  model ORDER BY in_total DESC";
$result = mysqli_query($connection, $query);

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Create new Spreadsheet object
$spreadsheet = new Spreadsheet();
// Set document properties
$spreadsheet->getProperties()->setCreator('PhpOffice')
        ->setLastModifiedBy('PhpOffice')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('PhpOffice')
        ->setKeywords('PhpOffice')
        ->setCategory('PhpOffice');
$i=1;
$b=1;
// Add some data

$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("A$i", "brand");
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("B$i", 'Model');
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("C$i", 'Stock');
       
        // $sheet->setCellValue('A5', 'Hello World !');
        foreach($result AS $row) {
            $i++;
            $model=$row['model'];
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("A$i", "$brand");
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("B$i", "$model");
            $query_stock = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND dispatch='0'";
            $result_stock = mysqli_query($connection, $query_stock);
            foreach($result_stock as $data){
            $in_stock = $data['in_stock'];
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("C$i", "$in_stock");
        }

        }
$spreadsheet->getActiveSheet()->setTitle('Model Summery');


$k=0;
foreach($result AS $row) {
    $k++;
    $spreadsheet->createSheet();
    $model=$row['model'];
// Add some data
$spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('A1', 'Brand');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('B1', 'Model');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('C1', 'Core');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('D1', 'Touch Screen');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('E1', 'Total Stock');
        $query_spec = "SELECT model,core FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model = '$model' GROUP BY core";
        $result_spec = mysqli_query($connection, $query_spec);
        $b=1;
        foreach($result_spec AS $spec){
            $model=$spec['model'];
            $core=$spec['core'];
            $b++;
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("A$b", "$brand");
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("B$b", "$model");
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("C$b", "$core");
            $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch='0'";
            $result = mysqli_query($connection, $query);
            $in_stock=0;
            foreach($result as $data){
                $in_stock = $data['in_stock'];
            }
            $query = "SELECT COUNT(touch_or_non_touch)as touch_or_non_touch FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch='0' AND touch_or_non_touch='yes'";
            $result = mysqli_query($connection, $query);
            $touch_or_non_touch=0;
            foreach($result as $data){
                $touch_or_non_touch = $data['touch_or_non_touch'];
            }
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("D$b", "$touch_or_non_touch");
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("E$b", "$in_stock");
        }

$spreadsheet->getActiveSheet()->setTitle("$model");
}
$spreadsheet->setActiveSheetIndex(0);
    
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
header('Cache-Control: cache, must-revalidate'); 
header('Pragma: public'); 
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;