<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-people-group" aria-hidden="true"></i> E-Commerce Dashboard
        </h3>
    </div>

</div>
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3">
        <a href="e_com_daily_work_sheet.php">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Let Go NOON</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>