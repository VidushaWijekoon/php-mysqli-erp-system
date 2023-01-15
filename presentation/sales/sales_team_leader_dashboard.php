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

<div class="row m-2">

    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_team_members.php"><i
                class="fa fa-plus"></i><span class="mx-1">Set Week Target</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./quatations.php"><i
                class="fa fa-plus"></i><span class="mx-1">Sales Quatations List</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_team_daily_report.php"><i
                class="fa fa-plus"></i><span class="mx-1">Members Daily Achivements</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./quatations.php"><i
                class="fa fa-plus"></i><span class="mx-1">To Approve</span></a>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pending Quatations</span>
                <span class="info-box-number">
                    10
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Accepted Quatations</span>
                <span class="info-box-number">41</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <a href="./quatations.php">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Waiting for Approve</span>
                    <span class="info-box-number">12</span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <a href="./sales_team_members.php">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sales Team Members</span>
                    <span class="info-box-number">5</span>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Last 7 Sales Orders</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Country</th>
                                            <th>Sales Person</th>
                                            <th>Quatation ID</th>
                                            <th>Sales Order</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">1037</a></td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">10234</a></td>
                                            <td><span class="badge badge-danger">Delivered</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">1254</a></td>
                                            <td><span class="badge badge-info">Processing</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">764</a></td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">5642</a></td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">4522</a></td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>Senagal</td>
                                            <td>Sales</td>
                                            <td><a href="./quatation_view.php">QA9842</a></td>
                                            <td><a href="./quatation_view.php">4522</a></td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                                Orders</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card mt-2">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Sales Team Members Daily Achivement</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Sales Person</th>
                                    <th>Created Customers</th>
                                    <th>Quatations</th>
                                    <th>Posts</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Riskan</td>
                                    <td>2</td>
                                    <td>5</td>
                                    <td>462</td>
                                </tr>
                                <tr>
                                    <td>Abdulla</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>417</td>
                                </tr>
                                <tr>
                                    <td>Harshan</td>
                                    <td>1</td>
                                    <td>5</td>
                                    <td>545</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All
                        Achivements</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("../includes/footer.php") ?>