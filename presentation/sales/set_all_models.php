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
$touch_wholesale_price = null;

$query1 = "SELECT inventory_id, device, brand, model, core, processor FROM warehouse_information_sheet WHERE device = '$device' AND brand = '$brand' AND dispatch = '0'
            GROUP BY device, brand, model ";
$result = mysqli_query($connection, $query1);
foreach($result as $x){
    $device = $x['device'];
    $brand = $x['brand'];
    $model = $x['model'];
}

$query1 = "SELECT inventory_id, touch_wholesale_price FROM warehouse_information_sheet WHERE device = '$device' AND brand = '$brand' AND dispatch = '0' AND touch_wholesale_price = '0'";
$result = mysqli_query($connection, $query1);
$rowcount = mysqli_num_rows($result);

$query2 = "SELECT inventory_id, touch_wholesale_price FROM warehouse_information_sheet WHERE device = '$device' AND brand = '$brand' AND dispatch = '0' AND non_touch_wholesale_price = '0'";
$result1 = mysqli_query($connection, $query2);
$xd = mysqli_num_rows($result1);

// $sum =65;
// $sum = $rowcount + $xd;

?>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a href="./new_items.php?device=<?php echo $device ?>&brand=<?php echo $brand ?>"
            class="btn btn-primary position-relative float-right" style="margin-right: 13%;">
            New Items
            <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger"
                style="top: -10px; font-size: 15px">
                <?php if($rowcount > 99) { ?> 99+
                <?php } else { echo $rowcount ; } ?>
                <span class="visually-hidden"></span>
            </span>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize"><?= $device . " " . $brand;  ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Total QTY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $i = 0;
                            
                            $query = "SELECT inventory_id, device, brand, model, core, processor, COUNT(inventory_id) as Total_number FROM warehouse_information_sheet WHERE device = '$device' AND brand = '$brand' AND dispatch = '0'
                                    GROUP BY device, brand, model ORDER BY Total_number DESC";
                            $result = mysqli_query($connection, $query);
                            foreach($result as $row){
                                $i++;
                                $device = $row['device'];
                                $brand = $row['brand'];
                                $model = $row['model'];
                                $count = $row['Total_number'];                               
                            ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $device; ?></td>
                                <td><?= $brand; ?></td>
                                <td><?= $model; ?></td>
                                <td><?= $count; ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"set_price_by_model.php?device={$row['device']}&brand={$row['brand']}&model={$row['model']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
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