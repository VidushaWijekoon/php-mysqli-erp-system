<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i>Asign Team Leader Task For Current
            Week</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header">
                    <h6>Members Target</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>