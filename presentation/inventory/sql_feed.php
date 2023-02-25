<?php
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';

$query = "SELECT * FROM warehouse_information_sheet GROUP BY model";
$sql = mysqli_query($connection, $query);
$lcd_size = 0;
foreach ($sql as $data) {
    $model = trim($data['model']);

    $query = "SELECT lcd_size FROM machine_from_supplier WHERE model ='$model' GROUP BY model,lcd_size  LIMIT 1";
    $sql_run = mysqli_query($connection, $query);
    foreach ($sql_run as $data) {
        $lcd_size = $data['lcd_size'];

    }
    $query1 = "UPDATE warehouse_information_sheet SET lcd_size='$lcd_size' WHERE model='$model'";

    $sql_run = mysqli_query($connection, $query1);
}