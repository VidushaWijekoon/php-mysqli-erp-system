<?php
include_once('../../dataAccess/connection.php');
require 'vendor/autoload.php';
$query = "SELECT * FROM `warehouse_information_sheet` GROUP BY core,model ORDER BY brand;";
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
$i=1;
$b=1;
$spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("A$i", "brand");
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("B$i", 'Model');   
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("C$i", 'Core'); 
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("D$i", 'Touch Screen');
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("E$i", 'Total Stock');
        foreach($result_brand AS $row) {
            $i++;
            $brand=$row['brand'];
            $model=$row['model'];
            $core=$row['core'];
            
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("A$i", "$brand");
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("B$i", "$model");
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("C$i", "$core");
            $query_stock = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND core='$core' AND send_to_production='0'";
            $result_stock = mysqli_query($connection, $query_stock);
            $in_stock=0;
            foreach($result_stock as $data){
            $in_stock = $data['in_stock'];
        }
        $query_touch = "SELECT COUNT(inventory_id)as touch_count FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND core='$core' AND send_to_production='0'AND touch_or_non_touch='yes'";
        $result_touch = mysqli_query($connection, $query_touch);
        $touch_stock=0;
        foreach($result_touch as $data1){
        $touch_stock = $data1['touch_count'];
    }
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("D$i", "$touch_stock");
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue("E$i", "$in_stock");
            
        }
$spreadsheet->getActiveSheet()->setTitle('Stock Summery');

$query = "SELECT brand FROM `warehouse_information_sheet` GROUP BY brand;";
$result_brand_group = mysqli_query($connection, $query);
$k=0;
foreach($result_brand_group AS $row) {
    $k++;
    $spreadsheet->createSheet();
    $brand=$row['brand'];
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('A1', 'Brand');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('B1', 'Model');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('C1', 'Core');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('D1', 'Touch Count');
        $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('E1', 'Total Stock');
        $query_model = "SELECT * FROM `warehouse_information_sheet` WHERE brand='$brand' GROUP BY core,model";
        $result_model = mysqli_query($connection, $query_model);
        $b=1;
        foreach($result_model AS $spec){
            $model=$spec['model'];
            $core=$spec['core'];
            $b++;
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("A$b", "$brand");
            
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("B$b", "$model");
           
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("C$b", "$core");
          
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("D$b", "$model");
            $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND send_to_production='0'";
            $result = mysqli_query($connection, $query);
            $in_stock=0;
            foreach($result as $data){
                $in_stock = $data['in_stock'];
            }
            $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("E$b", "$in_stock");   
        }
$spreadsheet->getActiveSheet()->setTitle("$brand");
}
$spreadsheet->setActiveSheetIndex(0);
    
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="AllStock.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
header('Cache-Control: cache, must-revalidate'); 
header('Pragma: public'); 
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;