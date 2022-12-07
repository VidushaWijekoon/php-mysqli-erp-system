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
$brand = $_GET['brand'];

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./e_com_stock.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<!-- 
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
                                <th>Model</th>
                                <th>Main Warehouse Stock</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                                // $model = null;
                                // $in_total = null;
                                // $in_stock = null;
                                // $dispatch = null;
                                // $main_stock = null;
                                // $i=0;
                                //   $query = "SELECT model FROM `warehouse_information_sheet` WHERE brand = '$brand' GROUP BY model";
                                //   $result = mysqli_query($connection, $query);
                                // foreach($result as $data){
                                //     $model = $data['model'];
                                //     $i++;
                                //     echo "
                                //     <tr>
                                //     <td>$i</td>
                                //     <td>$brand</td>
                                //     <td>$model</td>";
                                //     $query = "SELECT COUNT(inventory_id)as main_count FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND send_to_production='0'";
                                //     $result = mysqli_query($connection, $query);
                                //   foreach($result as $data){
                                //     $main_stock = $data['main_count'];
                                //   }
                                //     echo "<td>$main_stock</td>
                                //     <td>";
                                //     $query = "SELECT  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` WHERE brand = '$brand' AND model= '$model'";
                                //   $result = mysqli_query($connection, $query);
                                // foreach($result as $data){
                                //     $in_total = $data['in_total'];
                                // }
                                //     echo $in_total;
                                //      echo"</td>
                                //     <td>";
                                //     $query ="SELECT COUNT(e_com_inventory_id) as in_stock FROM `e_com_inventory` WHERE brand = '$brand' AND platform = '0' AND model='$model'";
                                //     $result = mysqli_query($connection, $query);
                                //     foreach($result as $data){
                                //         $in_stock = $data['in_stock'];

                                //     }
                                //     echo $in_stock;
                                //     echo "</td>
                                //     <td>";
                                //     $query ="SELECT  COUNT(e_com_inventory_id) as dispatch FROM `e_com_inventory` WHERE brand = '$brand' AND dispatch = '1'";
                                //     $result = mysqli_query($connection, $query);
                                //     foreach($result as $data){
                                //         $dispatch = $data['dispatch'];

                                //     }
                                //     echo $dispatch;
                                //     echo "</td>
                                //     <td class='text-center'>
                                //         <a class='btn btn-xs bg-primary ' 
                                //             href='spec_view.php?model=$model&brand=$brand'><i class='fas fa-eye'></i>
                                //         </a>
                                //     </td>
                                // </tr>";
                                // } 
                                ?>


                        </tbody>

                    </table>
                </div>
               -->
<!-- </div>
</div>
</div>
</div> -->
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Stock Report</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Main Warehouse Stock</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                            <?php
                                $model = null;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                $main_stock = null;
                                $i=0;
                                $a=0;
                                  $query = "SELECT model FROM `warehouse_information_sheet` WHERE brand = '$brand' GROUP BY model";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $model = $data['model'];
                                    $i++;
                                    $a++;
                                    echo "
                                    <tr class='cell-1' data-toggle='collapse' data-target='#demo-$a'>
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>";
                                    $query = "SELECT COUNT(inventory_id)as main_count FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND send_to_production='0'";
                                    $result = mysqli_query($connection, $query);
                                  foreach($result as $data){
                                    $main_stock = $data['main_count'];
                                  }
                                    echo "<td>$main_stock</td>
                                    <td>";
                                    $query = "SELECT  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` WHERE brand = '$brand' AND model= '$model'";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $in_total = $data['in_total'];
                                }
                                    echo $in_total;
                                     echo"</td>
                                    <td>";
                                    $query ="SELECT COUNT(e_com_inventory_id) as in_stock FROM `e_com_inventory` WHERE brand = '$brand' AND platform = '0' AND model='$model'";
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
                                    echo "
                                    </td>
                                    <td class='text-center'>
                                       
                                    </td>
                                </tr>";
                            //     <a class='btn btn-xs bg-primary ' 
                            //     href='spec_view.php?model=$model&brand=$brand'><i class='fas fa-eye'></i>
                            // </a>
                           echo " <tr id='demo-$a' class='collapse cell-1 row-child'>
                           <th>#</th>
                           <th>CPU</th>
                           <th>Generation</th>
                           <th>Screen Size</th>
                           <th>Screen Resolution</th>
                           <th>Screen Type</th>
                           <th>Hard Disk Type</th>
                           <th>E-Com Stock</th>
                            </tr>
                            ";?>
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
                                $b=0;
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
                                    $b++;
                                    echo "
                                    <tr id='demo-$a' class='collapse cell-1 row-child'>
                                    <td>$b</td>
                                    <td>$cpu</td>
                                    <td>$generation</td>
                                    <td>$screen_size</td>
                                    <td>$screen_resolution</td>
                                    <td>$screen_type</td>
                                    <td>$hdd_type</td>
                                    <td>";
                                    $query ="SELECT COUNT(e_com_inventory_id) as in_stock FROM `e_com_inventory` WHERE brand = '$brand' AND platform = '0'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $in_stock = $data['in_stock'];

                                    }
                                    echo $in_stock;
                                    echo "</td>
                                    ";
                                    $query ="SELECT  COUNT(e_com_inventory_id) as dispatch FROM `e_com_inventory` WHERE brand = '$brand' AND dispatch = '1'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $dispatch = $data['dispatch'];

                                    }
                                    // echo $dispatch;
                                    echo "</tr>";
                                } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
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


.cell-1 {
    border-collapse: separate;
    border-spacing: 0 4em;
    background: #ffffff;
    border-bottom: 5px solid transparent;
    /*background-color: gold;*/
    background-clip: padding-box;
    cursor: pointer;

}

.table-elipse {
    cursor: pointer;
}

#demo {
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s ease-in-out;
    width: 100%;
}

.row-child {
    background-color: #000;
    color: #fff;
    width: 400px !important;
}
</style>

<?php include_once('../includes/footer.php');  ?>