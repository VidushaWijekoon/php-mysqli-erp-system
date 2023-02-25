<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
$now = time();
 if( strtotime(date('2023-01-15 12:13:00'))<$now ) {
    $query="DELETE FROM `prepared_part`";
    $query_run = mysqli_query($connection,$query);
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");  
}

?>