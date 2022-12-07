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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];


?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./e_commerce_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Stock Report</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Main Warehouse</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                                $brand = null;
                                $main_stock = null;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                  $query = "SELECT *,  COUNT(inventory_id) as main_total FROM `warehouse_information_sheet` WHERE send_to_production='0' GROUP BY brand";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $brand = $data['brand'];
                                    $main_stock = $data['main_total'];
                                    echo "
                                    <tr>
                                    <td></td>
                                    <td> $brand</td>
                                    <td> $main_stock</td>";
                                    $query = "SELECT *,  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` WHERE brand = '$brand'";
                                    $result = mysqli_query($connection, $query);
                                    if(!empty($result)){
                                    foreach($result as $data){
                                    $in_total = $data['in_total'];}
                                    }
                                    echo "<td>$in_total</td>
                                    <td>";
                                    $query ="SELECT COUNT(e_com_inventory_id) as in_stock FROM `e_com_inventory` WHERE brand = '$brand' AND platform = '0'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $in_stock = $data['in_stock'];

                                    }
                                    echo $in_stock;
                                    echo "</td>
                                    <td>";
                                    $query ="SELECT  COUNT(e_com_inventory_id) as dispatch FROM `e_com_inventory` WHERE brand = '$brand' AND dispatch = '1'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $dispatch = $data['dispatch'];

                                    }
                                    echo $dispatch;
                                    echo "</td>
                                    <td class='text-center'>
                                        <a class='btn btn-xs bg-primary ' 
                                            href='model_view.php?brand=$brand'><i class='fas fa-eye'></i>
                                        </a>
                                    </td>
                                </tr>";
                                } ?>


                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>


<style>
.modal-header {
    display: block;
}

.modal-content {
    margin-top: 8rem;
}
</style>

<?php include_once('../includes/footer.php');  ?>