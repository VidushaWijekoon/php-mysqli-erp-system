<?php
ob_start();
session_start();
include_once('header.php');
include_once('../../dataAccess/connection.php');


// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<?php include_once('footer.php'); ?>