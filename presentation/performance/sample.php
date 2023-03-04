<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';

$scanned_qr = trim($_POST['qr']);
$bios = trim($_POST['bios']);
$comp = trim($_POST['cmplock']);
$me = trim($_POST['me']);
$npwr = trim($_POST['npwr']);
$ndsply = trim($_POST['ndsply']);
$prt = trim($_POST['port']);
$tpm = trim($_POST['tpm']);
$task1="BIOS Lock High Gen";
$task2="No Power / No Display / Account Lock/ Ports Issue";
$assign_task=0;
$target =0;

$user_id=$_SESSION['user_id'];
$department_id=$_SESSION['department'];
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d H:i:s');
if($bios==1){
    $assign_task=$task1;
    $target = 1.66;
}else{
    $assign_task=$task2;
    $target = 4;
}
$sql="SELECT performance_id FROM performance_record_table WHERE qr_number='$scanned_qr' AND job_description='$assign_task' ";
$query_run = mysqli_query($connection, $sql);
$rows=0;
$rows=mysqli_num_rows($query_run );
if($rows==0){
$query = "INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `target`,
    status
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$scanned_qr',
    '$assign_task',
    '$date',
    '$target',
    '0'
    ) ";
$query_run = mysqli_query($connection, $query);
    }
header('Location: performance_record.php');
