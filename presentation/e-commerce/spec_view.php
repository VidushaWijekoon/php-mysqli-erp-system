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
$model = $_GET['model'];

$brand = $_GET['brand'];

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./model_view.php?brand=<?php echo $brand ?>">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0"><?php echo $brand." - ".$model;  ?> Stock Report </p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>CPU</th>
                                <th>Generation</th>
                                <th>Screen Size</th>
                                <th>Screen Resolution</th>
                                <th>Screen Type</th>
                                <th>Hard Disk Type</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                                $cpu = null;
                                $generation = null;
                                $screen_resolution = null;
                                $screen_size = null;
                                $screen_type = null;
                                $hdd_type = null;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                $i=0;
                                  $query = "SELECT *,  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` WHERE brand = '$brand' AND model='$model' AND platform= '0' ";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $model = $data['model'];
                                    $in_total = $data['in_total'];
                                    $cpu = $data['core'];;
                                    $generation = $data['generation'];;
                                    $screen_resolution = $data['screen_resolution'];;
                                    $screen_size = $data['screen_size'];;
                                    $screen_type = $data['touch'];;
                                    $hdd_type = $data['hdd_type'];;
                                    $i++;
                                    echo "
                                    <tr>
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>
                                    <td>$cpu</td>
                                    <td>$generation</td>
                                    <td>$screen_size</td>
                                    <td>$screen_resolution</td>
                                    <td>$screen_type</td>
                                    <td>$hdd_type</td>
                                    <td>$in_total</td>
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
                                    echo "</tr>";
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