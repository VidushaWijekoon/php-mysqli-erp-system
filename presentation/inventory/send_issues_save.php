<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
$user_id = $_SESSION['user_id'];
$department = $_SESSION['department'];
$scrtch = 0;
$spt = 0;
$brkn = 0;
$ylwsdw = 0;
$bios = 0;
$com = 0;
$me = 0;
$power = 0;
$no_display = 0;
$port = 0;
$tpm = 0;
$bat = 0;
$bat_pn = 0;
$issue_type=0;
$issue_type2=0;
$issue_type3=0;

$qr = $_POST['qr_number'];
if(!empty( $_POST['scrtch'])){
$scrtch = $_POST['scrtch'];
}
if(!empty( $_POST['spt'])){
$spt = $_POST['spt'];
}
if(!empty( $_POST['brkn'])){
$brkn = $_POST['brkn'];
}
if(!empty( $_POST['ylwsdw'])){
$ylwsdw = $_POST['ylwsdw'];
}
if(!empty( $_POST['bios'])){
$bios = $_POST['bios'];
}
if(!empty( $_POST['com'])){
$com = $_POST['com'];
}
if(!empty( $_POST['me'])){
$me = $_POST['me'];
}
if(!empty( $_POST['power'])){
$power = $_POST['power'];
}
if(!empty( $_POST['no_display'])){
$no_display = $_POST['no_display'];
}
if(!empty( $_POST['port'])){
$port = $_POST['port'];
}
if(!empty( $_POST['tpm'])){
$tpm = $_POST['tpm'];
}
if(!empty( $_POST['bat'])){
$bat = $_POST['bat'];
}
if(!empty( $_POST['bat_pn'])){
$bat_pn = $_POST['bat_pn'];
}
if($scrtch ==1 ||$spt ==1 ||$brkn ==1 ||$ylwsdw ==1  ){
    $issue_type=1;
}
if($tpm ==1 ||$port ==1 ||$no_display ==1 ||$power ==1 ||$me ==1 ||$com ==1 ||$bios ==1  ){
    $issue_type2=1;
}
if($bat ==1 ){
    $issue_type3=1;
}

$query = "INSERT INTO `issue_laptops`(
    `alsakb_qr`,
    `issue_type`,
    `issue_type2`,
    `issue_type3`,
    `lcd_broken`,
    `spot`,
    `scratch`,
    `yellowshadow`,
    `bios_lock`,
    `computrace_lock`,
    `me_region`,
    `no_power`,
    `no_display`,
    `port_issue`,
    `tpm_lock`,
    `battery_condition`,
    `battery_pn`,
    `inv_user_id`,
    status
)
VALUES(
    '$qr',
    '$issue_type',
    '$issue_type2',
    '$issue_type3',
    '$brkn',
    '$spt',
    '$scrtch',
    '$ylwsdw',
    '$bios',
    '$com',
    '$me',
    '$power',
    '$no_display',
    '$port',
    '$tpm',
    '$bat',
    '$bat_pn',
    '$user_id',
    '1'
)";
 $query_run = mysqli_query($connection, $query);
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
    '$department',
    '$qr',
    'send to fix issue',
    '$date',
    '1',
    '0'
    ) ";
$query_run = mysqli_query($connection, $query);
 header("Location:send_issues.php");
 
?>