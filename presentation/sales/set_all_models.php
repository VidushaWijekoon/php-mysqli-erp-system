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

?>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="" type="button" href=""
            style="background-color: #293ea6; float: right; font-size: 35px; margin-right: 5%; border-radius: 20px; color: white;">
            <span class="mx-4">New 55</span></a>
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
                                <th>Core</th>
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