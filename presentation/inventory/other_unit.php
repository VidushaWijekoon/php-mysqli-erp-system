<?php
include_once '../../dataAccess/connection.php';
require 'vendor/autoload.php';
// $query = "SELECT * FROM `warehouse_information_sheet` GROUP BY core,model ORDER BY brand;";
// $result_brand = mysqli_query($connection, $query);

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
$a = 0;
$b1 = 1;
$a1 = 0;
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('A1', 'Pallet Number');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('B1', 'Brand');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('C1', 'Series');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('D1', 'Model');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('E1', 'Generation');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('F1', 'Screen Size');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('G1', 'QTY');
$query="SELECT pallet_id,brand,series,screen_size,model,generation,SUM(qty)as qty FROM pallet_informations WHERE  category='Desktop' GROUP BY brand,series,model,generation ORDER BY qty DESC";
$query_run = mysqli_query($connection, $query);
$b = 1;
foreach ($query_run as $data) {
    $id=$data['pallet_id'];
    $qty=$data['qty'];
    $brand=$data['brand'];
    $series=$data['series'];
    $model=$data['model'];
    $generation=$data['generation'];
    $screen_size=$data['screen_size'];

    $b++;
    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("A$b", "$id");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("B$b", "$brand");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("C$b", "$series");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("D$b", "$model");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("E$b", "$generation")
    ;
    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("F$b", "$screen_size");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("G$b", "$qty");
}
$spreadsheet->getActiveSheet(0)->setTitle('Desktop Summery');

$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_date = $date1->format('Y-m-d');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=ALSAKB_Inventory_Full_Details$start_date.xlsx");
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;