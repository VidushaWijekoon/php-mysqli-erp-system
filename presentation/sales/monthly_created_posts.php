<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
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
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Monthly Created Customers
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr style="font-size: 10px;">
                                <th>#</th>
                                <!-- <th>Country</th> -->
                                <th>Customer Name</th>
                                <th>Phone Code</th>
                                <th>Whatsapp Number</th>
                                <th>Platform</th>
                                <th>Model He Selling/Buying?</th>
                                <th>Posted Model 1</th>
                                <th>Posted Model 2</th>
                                <th>Customer Asking Model</th>
                                <th>Customer Asking Price</th>
                                <!-- <th>Customer Reponose</th> -->
                                <th>He Can Pick Up From UAE?</th>
                                <th>Posted Status</th>
                                <th style="width: 100px;">Posted Date</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>