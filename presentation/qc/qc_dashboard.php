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

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Quality Dashboard </h3>
    </div>

</div>


<div class="row">

    <div class="col-12 mt-3">
        <button type="button" class="btn btn-info mx-2"><i class="fa fa-plus"></i><a href="create_user.php"
                class="text-white"><i class="" aria-hidden="true"></i> Add Employee</a></button>
        <button type="button" class="btn btn-primary mx-2"><i class="fa fa-bars"></i><a href="#" class="text-white"><i
                    class="" aria-hidden="true"></i> Disciplinary List</a></button>

        <button type="button" class="btn btn-info mx-2"><i class="fa fa-plus"></i><a href="create_user.php"
                class="text-white"><i class="" aria-hidden="true"></i> Add Employee</a></button>
        <button type="button" class="btn btn-primary mx-2"><i class="fa fa-bars"></i><a href="#" class="text-white"><i
                    class="" aria-hidden="true"></i> Disciplinary List</a></button>
    </div>
</div>


<!-- Info boxes -->
<div class="row mt-3">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                    10
                    <small>%</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">New Members</span>
                <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->





<?php include_once('../includes/footer.php'); ?>