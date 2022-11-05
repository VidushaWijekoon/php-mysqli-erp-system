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

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card mb-2">
                <div class="d-flex">
                    <div class="col col-md-6 col-lg-6">
                        <fieldset class="mt-4 mb-2">
                            <legend>Scan Inventory ID</legend>
                            <form action="" method="GET">
                                <div class="input-group">
                                    <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                                    <input type="search" name="search"
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"
                                        class="form-control" placeholder="Search data" width="50%">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <div class="col col-lg-12 mb-3">
                    <fieldset>
                        <legend>Inventory Report</legend>
                        <div class="row">

                            <!-- ============================================================== -->
                            <!-- Motherboard views   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h6>Motherboard</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Bios Lock </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">No Power</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">All Ports</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                            </div>

                            <!-- ============================================================== -->
                            <!-- LCD    -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h6>LCD</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Whitespot</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Scratch </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Brocken</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Line</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label">Yellow Shadow</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline text-capitalize">
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-group">
                                                            <div
                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
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
                            </div>

                            <!-- ============================================================== -->
                            <!-- Body Work   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h6>Bodywork</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <label class="col-sm-4 col-form-label text-capitalize">A/Top Cover</label>
                                            <div class="col-sm-8 mt-2">
                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="scratch_a_top" name="work[]"
                                                        value="a_scratch">
                                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a-top_broken" name="work[]"
                                                        value="a_broken">
                                                    <label class="label_values" for="a-top_broken">Broken </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                                    <label class="label_values" for="a_top_dent">Dent </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-4 col-form-label text-capitalize">B/Bazel</label>
                                            <div class="col-sm-8 mt-2">

                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="scratch_a_top" name="work[]"
                                                        value="a_scratch">
                                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                                </div>

                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a-top_broken" name="work[]"
                                                        value="a_broken">
                                                    <label class="label_values" for="a-top_broken">Broken </label>
                                                </div>

                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                                    <label class="label_values" for="a_top_dent">Logo </label>
                                                </div>

                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                                    <label class="label_values" for="a_top_dent">Colour </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-4 col-form-label text-capitalize">C/Palmrest</label>
                                            <div class="col-sm-8 mt-2">
                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="scratch_a_top" name="work[]"
                                                        value="a_scratch">
                                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a-top_broken" name="work[]"
                                                        value="a_broken">
                                                    <label class="label_values" for="a-top_broken">Broken </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                                    <label class="label_values" for="a_top_dent">Dent </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-sm-4 col-form-label text-capitalize">D/Back Cover</label>
                                            <div class="col-sm-8 mt-2">
                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="scratch_a_top" name="work[]"
                                                        value="a_scratch">
                                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a-top_broken" name="work[]"
                                                        value="a_broken">
                                                    <label class="label_values" for="a-top_broken">Broken </label>
                                                </div>


                                                <div class="icheck-danger d-inline">
                                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                                    <label class="label_values" for="a_top_dent">Dent </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total followers   -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- partnerships   -->
                            <!-- ============================================================== -->
                        </div>

                        <!-- ============================================================== -->
                        <!-- Combine   -->
                        <!-- ============================================================== -->

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h6>Combine</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Keyboard</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Bazel</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Mouse Pad</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Mouse Pad Button</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Speakers</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Camera</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Camera Cable</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Back Cover</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">LCD</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">LCD Cable</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">WI-FI Card</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- ============================================================== -->
                                            <!-- Second Row   -->
                                            <!-- ============================================================== -->
                                            <div class="col-sm-6">

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Battery</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Battery Cable</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">DVD-ROM</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">DVD Caddy</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">HDD Caddy</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">HDD Cable Connector</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">A/Top</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">C/Panel/ Plamrest</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">D/Motherboard Base</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">Hings Cover</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-6 col-form-label">LAN Cover</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
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
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h6>Laptop Checklist</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Processor</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>i7</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">CPU Generation</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>8th</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">RAM</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>32GB</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">SSD</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>256 M.2 NVME</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">HDD</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>1TB </p>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-sm-6">

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Display</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>Tocuh</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Display Resolution</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>Full HD</p>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Graphic Size</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>4GB</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Graphic Type</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>Intel</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-4 col-form-label">Operation System</label>
                                                    <div class="col-sm-8 mt-2">
                                                        <p>Linux</p>
                                                    </div>
                                                </div>
                                            </div>
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
</div>


<?php include_once('../includes/footer.php'); } ?>