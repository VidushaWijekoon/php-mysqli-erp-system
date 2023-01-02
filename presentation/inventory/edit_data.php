<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
require_once("phpqrcode/qrlib.php");
$user_id = $_SESSION['username'];
$location = $_POST['location'];
        $device =$_POST['device'];
        $processor =$_POST['processor'];
        $core =$_POST['core'];
        $generation =$_POST['generation'];
        $model =$_POST['model'];
        $brand =$_POST['brand'];
        $series =$_POST['series'];
        $speed =$_POST['speed'];
        $battery =$_POST['battery'];
        $lcd_size =$_POST['lcd_size'];
        $touch_or_non_touch =$_POST['touch'];
        $bios_lock =$_POST['bios'];
        $mfg =$_POST['scan_id'];
        $dvd =$_POST['dvd'];
        $sql ="INSERT INTO `warehouse_information_sheet`(
            `device`,
            `processor`,
            `core`,
            `generation`,
            `model`,
            `location`,
            `brand`,
            `create_by_inventory_id`,
            `mfg`,
            `series`,
            `speed`,
            `battery`,
            `lcd_size`,
            `touch_or_non_touch`,
            `bios_lock`,
            dvd
        )
        VALUES(
            '$device',
            '$processor',
            '$core',
            '$generation',
            '$model',
            '$location',
            '$brand',
            '$user_id',
            '$mfg',
            '$series',
            '$speed',
            '$battery',
            '$lcd_size',
            '$touch_or_non_touch',
            '$bios_lock',
            '$dvd'
        )";
        $result = mysqli_query($connection, $sql);
 
        $last_inventory_id=0;
        $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
        $query1 = mysqli_query($connection, $query);
    
        foreach ($query1 as $data) {
            $last_inventory_id= $data['inventory_id'];
        }
        
         $tempDir = 'temp/';
            // $filename = $last_inventory_id;
            // $codeContents = $last_inventory_id;
            // $last_inventory_id='1023';
            $filename = $last_inventory_id;
            $codeContents = $last_inventory_id;
            QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
            $start_print=++$last_inventory_id;
            header("location: ./machine_from_supplier.php?id=$start_print");
        ?>