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
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Dashboard </h3>
    </div>

</div>

<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Motherboard Repaired</span>
                <span class="info-box-number">0 </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-share-from-square"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pre Day Motherboard Repaired</span>
                <span class="info-box-number"> 0</span>
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
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Motherboard Members</span>
                <span class="info-box-number"> 0 </span>
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
                <span class="info-box-text">Motherboard Technicians</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT department FROM employees WHERE department = 'production'";

                        if ($result = mysqli_query($connection, $query)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?><?php echo "$rowcount"; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Motherboard Leader</p>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Inventory ID</th>
                                <th>SO Delivery Date</th>
                                <th>Production End Time</th>
                                <th>Receive Time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <tr>
                                <td>000100</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>
                                    <button class='btn btn-xs btn-primary mx-1'><i data-toggle="modal"
                                            data-target="#modal-sm" class='fas fa-eye'></i> </button>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Motherboard Technician</p>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Inventory ID</th>
                                <th>SO Delivery Date</th>
                                <th>Production End Time</th>
                                <th>Receive Time</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <tr>
                                <td>000100</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                                <td>2022-10-24 10:23:45</td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                Motherboard Team Leader
            </div>
            <div class="modal-body">
                <fieldset class="mt-2">
                    <legend>QR Scan</legend>

                    <div class="input-group mb-2 mt-2">
                        <input type="text" name="search" id="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                        <!-- <button type="submit" class="btn btn-primary">Search</button> -->
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a type="button" href="./motherboard_task.php" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


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
    color: black;

}
</style>

<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>

<?php include_once('../includes/footer.php'); ?>