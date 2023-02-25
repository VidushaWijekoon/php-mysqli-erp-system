<?php
include_once '../../dataAccess/connection.php';
require 'vendor/autoload.php';
// $query = "SELECT * FROM `warehouse_information_sheet` GROUP BY core,model ORDER BY brand;";
// $result_brand = mysqli_query($connection, $query);

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$type = $_GET['type'];
$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator('PhpOffice')
    ->setLastModifiedBy('PhpOffice')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('PhpOffice')
    ->setKeywords('PhpOffice')
    ->setCategory('PhpOffice');
$i = 1;
$b1 = 1;
$a1 = 0;
$spreadsheet->setActiveSheetIndex($a1)
    ->setCellValue('A1', 'Pallet Number');
$spreadsheet->setActiveSheetIndex($a1)
    ->setCellValue('B1', 'Brand');
$spreadsheet->setActiveSheetIndex($a1)
    ->setCellValue('C1', 'QTY');
    $query="SELECT pallet_id,brand,screen_size,SUM(qty)as qty FROM pallet_informations WHERE category='$type' GROUP BY brand,screen_size ORDER BY qty DESC";
    $query_run = mysqli_query($connection, $query);
$b1 = 1;
foreach ($query_run as $data) {
    $id=$data['pallet_id'];
    $qty=$data['qty'];
    $brand=$data['brand'];

    $b1++;
    $spreadsheet->setActiveSheetIndex($a1)
        ->setCellValue("A$b1", "$id");

    $spreadsheet->setActiveSheetIndex($a1)
        ->setCellValue("B$b1", "$brand");

    $spreadsheet->setActiveSheetIndex($a1)
        ->setCellValue("C$b1", "$qty");
}
$spreadsheet->getActiveSheet()->setTitle("$type Summery");
// $spreadsheet->setActiveSheetIndex(1);
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_date = $date1->format('Y-m-d');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=ALSAKB_$type _Inventory_Full_Details$start_date.xlsx");
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
exit;