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
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i> Account Dashboard</h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./approved_quatations.php">
            <span class="mx-1">Approved Quatations</span>
        </a>

    </div>
</div>

<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-stamp"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">In Production</span>
                <span class="info-box-number">
                    16
                </span>
            </div>
        </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> Sales Orders</span>
                <span class="info-box-number">
                    16
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-receipt "></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Due Bills</span>
                <span class="info-box-number">
                    16
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-boxes "></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Dispatch</span>
                <span class="info-box-number">
                    16
                </span>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>