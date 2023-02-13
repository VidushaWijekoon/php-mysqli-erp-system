<?php 

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
    <div class="col-md-5 align-self-center"><a href="./users_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="col">
                    <div class="d-block">
                        <a href="btn btn-sm btn-">monday</a>
                        <a href="btn btn-sm btn-">monday</a>
                        <a href="btn btn-sm btn-">monday</a>
                        <a href="btn btn-sm btn-">monday</a>
                        <a href="btn btn-sm btn-">monday</a>
                        <a href="btn btn-sm btn-">monday</a>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            sdsad
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>