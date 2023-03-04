<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
$user_id = $_SESSION['user_id'];
$department = $_SESSION['department'];
$inventory_id=$_POST['qr_number'];
$sql="SELECT inventory_id FROM warehouse_information_sheet WHERE inventory_id=$inventory_id AND send_to_production=1";
$sql_run =mysqli_query($connection,$sql);
$row=mysqli_num_rows($sql_run);
if($row ==1){
    $query = "INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `target`,
    status
    )
    VALUES(
    '$user_id',
    '$department',
    '$inventory_id',
    'pc received from production',
    now(),
    now(),
    '1',
    '1'
    ) ";
$query_run = mysqli_query($connection, $query);
$sql="UPDATE warehouse_information_sheet SET send_to_production=0 WHERE inventory_id=$inventory_id ";
$sql_run =mysqli_query($connection,$sql);
}
 header("Location:reverse.php");
?>