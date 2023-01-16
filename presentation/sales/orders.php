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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true" style="color: #fff;">Sales Orders</a>
                        </li>
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false" style="color: #fff;">Quatations</a>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>Sales Person</th>
                                        <th>Sales Order</th>
                                        <th>Status</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO10234</a></td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO1254</a></td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO764</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO5642</a></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO4522</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Quatation  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>Sales Person</th>
                                        <th>Quatation ID</th>
                                        <th>Status</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">QA9842</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                        <td>
                                            <a class='btn btn-xs btn-secondary mx-1' href="">
                                                <i class='fa-solid fa-eye'></i> </a>
                                            <a class='btn btn-xs btn-warning mx-1' href="#">
                                                <i class='fa-solid fa-pen-to-square'></i></a>
                                            <a class='btn btn-xs btn-success mx-1' href="">
                                                <i class='fa-solid fa-download'></i> </a>
                                            <a class='btn btn-xs btn-danger mx-1' href="">
                                                <i class='fa-solid fa-trash-can'></i> </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>