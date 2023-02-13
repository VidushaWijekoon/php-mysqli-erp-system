<?php 
// error_reporting (E_ALL ^ E_NOTICE);
// // Toggle this to change the setting
// define('DEBUG', true);

// // You want all errors to be triggered
// error_reporting(E_ALL);
 
// error_reporting(E_ERROR | E_PARSE);

ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_team_leader_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex text-center mx-auto">
                        <a href="" class="btn btn-sm btn-primary mx-2">Monday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Tuesday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Wednesday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Thursday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Friday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Saturday</a>
                        <a href="" class="btn btn-sm btn-primary mx-2">Sunday</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>