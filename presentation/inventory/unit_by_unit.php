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
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('A1', 'Brand');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('B1', 'Series');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('C1', 'Model');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('D1', 'Processor');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('E1', 'Core');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('F1', 'Generation');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('G1', 'Speed');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('H1', 'Screen Size');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('I1', 'Screen Resolution');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('J1', 'Touch Screen');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('K1', 'Optical');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('L1', 'Ram');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('M1', 'Hard Disk Capacity');
$spreadsheet->setActiveSheetIndex($a)
    ->setCellValue('N1', 'MFG');
$query_model = "SELECT * FROM `warehouse_information_sheet` WHERE dispatch='0' ORDER BY brand,model";
$result_model = mysqli_query($connection, $query_model);
$b = 1;
foreach ($result_model as $data) {

    $brand = trim($data['brand']);
    $model = trim($data['model']);
    $series = trim($data['series']);
    $core = trim($data['core']);
    $generation = trim($data['generation']);
    $speed = trim($data['speed']);
    $screen_size = trim($data['lcd_size']);
    $screen_type = trim($data['touch_or_non_touch']);
    $optical = trim($data['dvd']);
    $processor = trim($data['processor']);
    $mfg = trim($data['mfg']);
    $resolution = trim($data['screen_resolution']);

    $b++;
    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("A$b", "$brand");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("B$b", "$series");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("C$b", "$model");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("D$b", "$processor");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("E$b", "$core")
    ;
    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("F$b", "$generation");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("G$b", "$speed");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("H$b", "$screen_size");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("I$b", "$resolution");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("J$b", "$screen_type");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("K$b", "$optical");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("L$b", "8GB");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("M$b", "256GB");

    $spreadsheet->setActiveSheetIndex($a)
        ->setCellValue("N$b", "$mfg");
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
        ->setCellValue('B1', 'Series');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('C1', 'Model');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('D1', 'Processor');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('E1', 'Core');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('F1', 'Generation');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('G1', 'Speed');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('H1', 'Screen Size');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('I1', 'Screen Resolution');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('J1', 'Touch Screen');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('K1', 'Optical');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('L1', 'Ram');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('M1', 'Hard Disk Capacity');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('N1', 'MFG');
    $spreadsheet->setActiveSheetIndex($k)
        ->setCellValue('O1', 'Price US($)');

    $query_model = "SELECT * FROM `warehouse_information_sheet` WHERE brand='$brand1'  ORDER BY model ";
    $result_model = mysqli_query($connection, $query_model);
    $b = 1;
    foreach ($result_model as $data) {

        $model = trim($data['model']);
        $series = trim($data['series']);
        $core = trim($data['core']);
        $generation = trim($data['generation']);
        $speed = trim($data['speed']);
        $screen_size = trim($data['lcd_size']);
        $screen_type = trim($data['touch_or_non_touch']);
        $optical = trim($data['dvd']);
        $processor = trim($data['processor']);
        $mfg = trim($data['mfg']);
        $resolution = trim($data['screen_resolution']);
        $touch = trim($data['touch_wholesale_price']);
        $non_touch = trim($data['non_touch_wholesale_price']);
        $price = '';
        if (empty($touch)) {} else {
            $price = "$" . $touch;
        }
        if (empty($non_touch)) {} else {
            $price = "$" . $non_touch;
        }

        $b++;
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("A$b", "$brand1");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("B$b", "$series");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("C$b", "$model");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("D$b", "$processor");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("E$b", "$core")
        ;
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("F$b", "$generation");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("G$b", "$speed");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("H$b", "$screen_size");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("I$b", "$resolution");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("J$b", "$screen_type");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("K$b", "$optical");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("L$b", "8GB");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("M$b", "256GB");

        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("N$b", "$mfg");
        $spreadsheet->setActiveSheetIndex($k)
            ->setCellValue("O$b", "$price");
    }

    $spreadsheet->getActiveSheet(1)->setTitle("$brand1");

}
$spreadsheet->setActiveSheetIndex(1);
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