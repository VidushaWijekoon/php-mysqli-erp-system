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

if($role_id = 1 && $department == 11) {
 
?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-users" aria-hidden="true"></i> Admin Dashboard</h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn btn-info mx-2 text-white" type="button" href="create_user.php"><i class="fa fa-plus"></i><span
                class="mx-1">Add Users</span></a>
        <a class="btn btn-primary mx-2 text-white" type="button" href="users.php"><i class="fa-solid fa-bars"></i><span
                class="mx-1">Disciplinary List</span></a>
    </div>
</div>


<!-- Info boxes -->
<div class="row mx-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="far fa-flag"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT * FROM users WHERE is_deleted = 0";

                        if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                         $rowcount = mysqli_num_rows($result);
                        }

                        ?>
                    <?php echo "$rowcount"; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-xmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Delete Users</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT * FROM users WHERE is_deleted = 1";

                        if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                         $rowcount = mysqli_num_rows($result);
                        }

                        ?>
                    <?php echo "$rowcount"; ?>
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
            <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-thumbs-up"></i></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Active Users</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT * FROM users WHERE is_deleted = 0 AND isActive = 0";

                        if ($result = mysqli_query($connection, $query)) {

                        // Return the number of rows in result set
                         $rowcount = mysqli_num_rows($result);
                        }

                        ?>
                    <?php echo "$rowcount"; ?>

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
                <span class="info-box-text">Super Admins</span>
                <span class="info-box-number">

                    <?php

                        $query = "SELECT * FROM users WHERE role = 1";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
}  ?>