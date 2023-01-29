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
$model = $_GET['model']

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize"><?= $device . " " . $brand . " " . $model ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Touch</th>
                                <th>Total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 0;
                            
                            $query = "SELECT inventory_id, device, brand, model, core, processor, touch_or_non_touch, COUNT(inventory_id) as Total_number FROM warehouse_information_sheet 
                                    WHERE device = '$device' AND brand = '$brand' AND model = '$model' GROUP BY device, brand, model, processor, core, touch_or_non_touch 
                                    ORDER BY Total_number DESC";
                            $result = mysqli_query($connection, $query);
                            foreach($result as $x){
                                $device = $x['device'];
                                $brand = $x['brand'];
                                $model = $x['model'];
                                $processor = $x['processor'];
                                $core = $x['core'];
                                $touch = $x['touch_or_non_touch'];
                                $total_count = $x['Total_number'];
                                $i++;

                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $device ?></td>
                                <td><?= $brand ?></td>
                                <td><?= $model ?></td>
                                <td><?= $processor ?></td>
                                <td><?= $core ?></td>
                                <td><?= $touch ?></td>
                                <td><?= $total_count ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"set_final_price_list.php?device={$x['device']}&brand={$x['brand']}&model={$x['model']}&core={$x['core']}&processor={$x['processor']}&touch={$x['touch_or_non_touch']}&count={$x['Total_number']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>