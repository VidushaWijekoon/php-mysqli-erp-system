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
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Technician </h3>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card-header bg-secondary">
                <h3 class="card-title p-2">Inventory ID 000100</h3>
            </div>
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="item_type"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Model</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Processor</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Core</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Generation</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">RAM</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">HDD</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Operating System</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    placeholder="Dell"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>


<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <h6>Motherboard</h6>
                </div>

                <!-- ============================================================== -->
                <!-- Motherboard views   -->
                <!-- ============================================================== -->
                <div class="card-body d-flex">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Bios Check</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">No Power</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">USB Port</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Processor Change</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Motherboard views   -->
                <!-- ============================================================== -->
            </div>

        </div>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <h6>Motherboard Check List</h6>
                </div>
                <div class="card-body d-flex">
                    <button type="button" class="btn btn-default" data-toggle="modal"
                        data-target="#motherboard_checklist">
                        Launch Large Modal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Motherboard Form -->
<div class="modal fade" id="motherboard_checklist">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Motherboard Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Bios Check</label>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r1" name="bios_check" value="0">
                                <label class="label_values" for="r1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r2" name="bios_check" value="1">
                                <label class="label_values" for="r2">No </label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">No Power</label>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r3" name="no_power" value="0">
                                <label class="label_values" for="r3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r4" name="no_power" value="1">
                                <label class="label_values" for="r4">No </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">USB Connection</label>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r5" name="usb_connection" value="0">
                                <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r6" name="usb_connection" value="1">
                                <label class="label_values" for="r6">No </label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Processor Change</label>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r5" name="usb_connection" value="0">
                                <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r6" name="usb_connection" value="1">
                                <label class="label_values" for="r6">No </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="motherboard_submit" class="btn bg-gradient-success btn-sm">Save
                        changes</button>
                    <!-- <input class="btn btn-primary" type="submit" name="motherboard_submit" vlaue="Choose options"> -->

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php include_once('../includes/footer.php'); ?>