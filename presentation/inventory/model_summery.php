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
    <div class="col-md-5 align-self-center"><a href="./warehouse_stock_report.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="rounded">
                <a href="stock_for_excel.php?brand=<?php echo $brand?>" class="btn btn-sm btn-success">Download excel
                    file</a>
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">

                            <?php
                                $model = null;
                                $core = null;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                $main_stock = null;
                                $core='';
                                $generation='';
                                $i=0;
                                $a=0;
                                  $query = "SELECT model,core,COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' GROUP BY  model ORDER BY in_total DESC";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $model = $data['model'];
                                    $core = $data['core'];
                                    $in_total = $data['in_total'];
                                    $i++;
                                    $a++;
                                    echo "
                                    <tr class='cell-1' data-toggle='collapse'   >
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>
                                    <td>$in_total</td>";
                                    
                                //     echo "<td>";
                                //     $query = "SELECT  COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model= '$model' AND core='$core'";
                                //   $result = mysqli_query($connection, $query);
                                // foreach($result as $data){
                                //     $in_total = $data['in_total'];
                                // }
                                //     echo $in_total;
                                //      echo"</td>
                                //     <td>";
                                echo"<td>";
                                    $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND send_to_production='0'";
                                    
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $in_stock = $data['in_stock'];

                                    }
                                    echo $in_stock;
                                    echo "</td>
                                    <td>";
                                    $query = "SELECT COUNT(inventory_id)as dispatch FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND send_to_production='1'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $dispatch = $data['dispatch'];
                                    }
                                    echo $dispatch;
                                    echo "
                                    </td>
                                    <td class='text-center'>
                                            <a class='btn btn-xs bg-primary ' 
                                                href='model_view.php?model=$model&brand=$brand'><i class='fas fa-eye'></i>
                                            </a>
                                        </td>
                                </tr>";
                            //     <a class='btn btn-xs bg-primary ' 
                            //     href='spec_view.php?model=$model&brand=$brand'><i class='fas fa-eye'></i>
                            // </a>
                           echo " <tr id='demo-$a' class='collapse cell-1 row-child'>
                           <th>#</th>
                           <th>Processor</th>
                           <th>CPU</th>
                           <th>Generation</th>
                           <th>Speed</th>
                           <th>Screen Size</th>
                           <th>Screen Type</th>
                            </tr>
                            ";?>
                            <?php
                                $cpu = '';
                                $generation = '';
                                $screen_resolution = '';
                                $screen_size = '';
                                $screen_type = '';
                                $hdd_type = '';
                                $in_total = '';
                                $in_stock = '';
                                $dispatch = '';
                                $processor='';
                                $b=0;
                                  $query = "SELECT *,  COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND send_to_production= '0' ";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $model = $data['model'];
                                    $in_total = $data['in_total'];
                                    $cpu = $data['core'];;
                                    $generation = $data['generation'];
                                    $screen_size = $data['lcd_size'];
                                    $screen_type = $data['touch_or_non_touch'];
                                    $speed = $data['speed'];
                                    $processor = $data['processor'];
                                    $b++;
                                    echo "
                                    <tr id='demo-$a' class='collapse cell-1 row-child'>
                                    <td>$b</td>
                                    <td>$processor</td>
                                    <td>$cpu</td>
                                    <td>$generation</td>
                                    <td>$speed</td>
                                    <td>$screen_size</td>
                                    <td>$screen_type</td>
                                    </tr>";
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