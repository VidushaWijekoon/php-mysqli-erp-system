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

$device = $_GET['device'];
$brand = $_GET['brand'];
$model = $_GET['model'];
$core = $_GET['core'];
$processor = $_GET['processor'];
$touch = $_GET['touch'];
$username = $_SESSION['username'];

if(isset($_POST['submit'])){

    $unit_pirce = $_POST['unit_price'];

    $query = "INSERT INTO sales_laptop_unit_price(`device`, `brand`, `model`, `processor`, `core`, `touch_status`, `unit_price`, `created_by`) 
                VALUES ('$device', '$brand', '$model', '$processor', '$core', '$touch', '$unit_pirce', '$username')";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        $u_query = "UPDATE warehouse_information_sheet SET set_price = '1' WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND processor = '$processor' AND core = '$core' AND touch_or_non_touch = '$touch'";
        $uqe = mysqli_query($connection, $u_query);

    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize"><?= $device . " " . $brand . " " . $model ?> Set the Laptop
                        Price</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Touch</th>
                                    <th>Unit Price</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td><?= $device ?></td>
                                    <td><?= $brand ?></td>
                                    <td><?= $model ?></td>
                                    <td><?= $processor ?></td>
                                    <td><?= $core ?></td>
                                    <td><?= $touch ?></td>
                                    <td>
                                        <input type="number" min="1" placeholder="Please Enter Unit Price in AED"
                                            name="unit_price">
                                    </td>
                                    <td>
                                        <button type="submit" name="submit" class="btn btn-success btn-xs">Set
                                            Price</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize">Previous Unit Prices</h6>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Touch</th>
                                    <th>Unit Price</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php 
                                    
                                    $q1 = "SELECT * FROM sales_laptop_unit_price WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND processor = '$processor' AND core = '$core' AND touch_status = '$touch'";
                                    $q1_run = mysqli_query($connection, $q1);
                                    foreach($q1_run as $dx){
                                        $device_1 = $dx['device'];
                                        $brand_1 = $dx['brand'];
                                        $model_1 = $dx['model'];
                                        $processor_1 = $dx['processor'];
                                        $core_1 = $dx['core'];
                                        $touch_status = $dx['touch_status'];
                                        $unit_price = $dx['unit_price'];
                                        $created_time = $dx['created_time'];
                                    
                                    ?>
                                    <td>#</td>
                                    <td><?= $device_1 ?></td>
                                    <td><?= $brand_1 ?></td>
                                    <td><?= $model_1 ?></td>
                                    <td><?= $processor_1 ?></td>
                                    <td><?= $core_1 ?></td>
                                    <td><?= $touch_status ?></td>
                                    <td><?= $unit_price ?></td>
                                    <td><?= $created_time ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>