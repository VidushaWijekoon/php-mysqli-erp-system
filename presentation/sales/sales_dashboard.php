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
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i> Sales Dashboard</h3>
    </div>
</div>


<div class="row m-2">

    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="create_quatation.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Quatation</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="quatations.php"><i
                class="fa fa-plus"></i><span class="mx-1">Quatation List</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="customers_list.php"><i
                class="fa fa-plus"></i><span class="mx-1">Customer List</span></a>
    </div>
</div>


<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-receipt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Quatations</span>
                <span class="info-box-number">
                    12
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-stamp"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Turn Over</span>
                <span class="info-box-number">
                    7
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"> Sales Orders</span>
                <span class="info-box-number">
                    5
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales Team</span>
                <span class="info-box-number">8</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<?php include_once('../includes/footer.php'); ?>