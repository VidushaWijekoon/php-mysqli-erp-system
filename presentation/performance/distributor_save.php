<?php
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');

$scanned_qr = '0';
$scanned_mfg = '0';
$search_value;
$scanned_qr = trim($_POST['qr']);
$job_description = $_POST['job_description'];
$user_id = trim($_POST['user_id']);
$technician_id = trim($_POST['technician_id']);
$user_role = $_POST['user_role'];
$department_id = $_POST['department_id'];
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_date = $date1->format('Y-m-d H:i:s');

$query = "INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    status,
    `target`
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$scanned_qr',
    '$job_description',
    '$start_date',
    '$start_date',
    '1',
    '1'
    )";
    $query_run = mysqli_query($connection,$query);
    header('Location: distributor.php');
