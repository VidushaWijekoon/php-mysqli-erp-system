<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

$username = $_SESSION['username'];

  
if (isset($_GET['quatation_id'])) {
	$quatation_id = mysqli_real_escape_string($connection, $_GET['quatation_id']);

	$query = "UPDATE sales_quatation_items SET approval = '1', approved_by = '$username' WHERE quatation_id = '$quatation_id'";
	$result = mysqli_query($connection, $query);	

    if($result){
        header("Location: quatation_approval.php");
    }
		
} 

?>