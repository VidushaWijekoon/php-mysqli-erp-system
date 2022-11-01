<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
if($role_id == 1 || $role_id == 2){

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid mt-3 mb-2">
    <div class="row">
        <div class="col col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mb-2">
                <form action="" method="POST">
                    <div class="d-flex">
                        <div class="col col-md-6 col-lg-6">
                            <fieldset class="mt-4 mb-2">
                                <legend>Scan QR</legend>
                                <form action=" " method="POST">
                                    <div class="input-group mb-2 mt-2">
                                        <input type="text" name="search" required value="" placeholder="Scan"
                                            style="width: 25%;">
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">
                        <fieldset>
                            <legend>Production Team Members Daily View</legend>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Inventory ID</th>
                                        <th>S/O ID</th>
                                        <th>Brand</th>
                                        <th>Core</th>
                                        <th>Genaration</th>
                                        <th>Model</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                    <?php 
                                        $sales_order_list = '';

                                        // getting the list of users
                                        $query = "SELECT * FROM warehouse_information_sheet     ";
                                        $results = mysqli_query($connection, $query);


                                        while ($sales = mysqli_fetch_assoc($results)) {
                                            $sales_order_list .= "<tr>";
                                            $sales_order_list .= "<td>{$sales['inventory_id']}</td>";
                                            $sales_order_list .= "<td>{$sales['sales_order_id']}</td>";
                                            $sales_order_list .= "<td>{$sales['brand']}</td>";
                                            $sales_order_list .= "<td>{$sales['core']}</td>";
                                            $sales_order_list .= "<td>{$sales['generation']}</td>";
                                            $sales_order_list .= "<td>{$sales['model']}</td>";
                                            $sales_order_list .= "<td class='text-center'><a class='btn btn-sm bg-teal' data-toggle='modal' data-target='#modal-xl' name='submit' type='submit' href=\"production_sales_order_view.php?sales_order_id={$sales['sales_order_id']}\"><i class='fas fa-eye'></i> </a></td>";
                                            $sales_order_list .= "</tr>";
                                        }

                                        echo $sales_order_list;
                                    ?>

                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Production Elements</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col col-lg-12 mb-3">
                <fieldset>
                    <legend>Production Team Members Daily View</legend>


                    <!-- /.card-header -->
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">Bios
                                        Check</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Bios
                                                            Check
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">No Power
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">Bios
                                        cover</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Scratch
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Broken
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Dent
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">b/bazel</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Scratch
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Brocken
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Logo
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Colour
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">c/plamrest</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Scratch
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Broken
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Dent
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">d/back
                                        cover</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Scratch
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Broken
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Dent
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">keyboard</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label"
                                                            for="customSwitch3">Functions
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Key
                                                            Missing
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">Colour
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">lcd</label>
                                    <div class="col-sm-10">

                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label"
                                                            for="customSwitch3">whitespot
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">scratch
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">broken
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">line
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">yellow
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">webcam</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">mousepad
                                        &
                                        button</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">microphone</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">speakers &
                                        sound</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">Wi-Fi
                                        connection</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">USB
                                        port</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div
                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="customSwitch3" disabled>
                                                        <label class="custom-control-label" for="customSwitch3">
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">battery
                                        health</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled checked>
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Excellent</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled>
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Good</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled>
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Percentage</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">Hinges
                                        cover</label>
                                    <div class="col-sm-10">
                                        <div class="custom-control custom-checkbox">
                                            <div class="form-group">
                                                <div
                                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch3" disabled>
                                                    <label class="custom-control-label" for="customSwitch3">
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label text-capitalize">prodution
                                        type</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled checked>
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Production
                                                            Only</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled>
                                                        <label for="customCheckbox3"
                                                            class="custom-control-label">Production
                                                            +
                                                            Combine</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled>
                                                        <label for="customCheckbox3" class="custom-control-label">Fully
                                                            Combine</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-check form-check-inline text-capitalize">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox3" disabled>
                                                        <label for="customCheckbox3" class="custom-control-label">Simple
                                                            + Sample
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

            </div>
            <!-- /.card-body -->
        </div>

        </fieldset>
    </div>
</div>

<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

textarea {
    text-transform: uppercase;
}

select,
input[type="text"],
[type="search"] {
    height: 22px;
    width: 100%;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 10px;
    padding-left: 15px;
    margin-bottom: 10px;

}
</style>

<?php include_once('../includes/footer.php'); } ?>