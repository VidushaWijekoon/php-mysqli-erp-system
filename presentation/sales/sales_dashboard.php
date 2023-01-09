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
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_customers.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Customer</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_post.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Post</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_quatation.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Quatation</span></a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <fieldset>
                    <div class="row">
                        <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item text-center" style="width: 150px;">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#custom-tabs-four-home" role="tab"
                                            aria-controls="custom-tabs-four-home" aria-selected="true"
                                            style="color: #fff;">Sales Orders</a>
                                    </li>
                                    <li class="nav-item text-center" style="width: 150px;">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-four-profile" role="tab"
                                            aria-controls="custom-tabs-four-profile" aria-selected="false"
                                            style="color: #fff;">Quatations</a>
                                    </li>

                                </ul>
                            </div>
                            <div class=" card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <!-- ============================================================== -->
                                    <!-- Sales Order  -->
                                    <!-- ============================================================== -->
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Country</th>
                                                    <th>Sales Person</th>
                                                    <th>Sales Order</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO1037</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO10234</a></td>
                                                    <td><span class="badge badge-danger">Delivered</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO1254</a></td>
                                                    <td><span class="badge badge-info">Processing</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO764</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO5642</a></td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">SO4522</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- ============================================================== -->
                                    <!-- Quatation  -->
                                    <!-- ============================================================== -->
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">

                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Country</th>
                                                    <th>Sales Person</th>
                                                    <th>Quatation ID</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-info">Processing</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>Senagal</td>
                                                    <td>Sales</td>
                                                    <td><a href="./quatation_view.php">QA9842</a></td>
                                                    <td><span class="badge badge-success">Shipped</span></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>