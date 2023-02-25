<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<?php

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$brand = $_GET['brand'];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
    $i = 50 * ($pageno - 1);
} else {
    $pageno = 1;
    $i = 0;
}
$no_of_records_per_page = 50;
$offset = ($pageno - 1) * $no_of_records_per_page;
$conn = $connection;
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(inventory_id) as inventory FROM warehouse_information_sheet  WHERE brand = '$brand' GROUP BY  model ORDER BY inventory_id DESC";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_num_rows($result);
$test = "Total number of model : " . $total_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="./warehouse_stock_report.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <a href="stock_for_excel.php?brand=<?php echo $brand ?>" class="btn btn-sm btn-success mb-2">
                Download excel file
            </a>

            <div class="card">
                <div class="card-header row mb-5">
                    <div class="row col-lg-12 ">
                        <form method='POST' style="width:50%">
                            <div class="row col-lg-12 ">
                                <h6 class="text-uppercase p-1"><?php echo $test ?></h6>
                            </div>
                            <div class="row col-lg-12 ">
                                <h6 class="text-uppercase p-1"><?php echo "Brand : " . $brand ?></h6>
                            </div>
                            <div class="row col-lg-12">

                                <h6 class="text-uppercase p-1"><?php echo "Model : " ?></h6>
                                <input class="w-25" style="color:black !important" type="text" name="search_value"
                                    placeholder="Enter model here">
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-default bg-gradient-info mx-1 " style="border-radius: 60%;"><i
                                        class="fa fa-search"></i>
                                </button>

                            </div>
                        </form>
                    </div>
                    <?php
$search_value = 0;
if (isset($_POST['submit'])) {
    $search_value = $_POST['search_value'];
}
?>
                </div>

                <div class="card-body">
                    <table id="" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Processing</th>
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
$core = '';
$generation = '';
$processing=null;

$a = 0;
if ($search_value == 0) {
    $query = "SELECT model,core,COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' GROUP BY  model ORDER BY in_total DESC LIMIT $offset, $no_of_records_per_page";
    $result = mysqli_query($connection, $query);
} else {
    $query = "SELECT model,core,COUNT(inventory_id) as in_total FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model like'%$search_value%' GROUP BY  model ORDER BY in_total DESC";
    $result = mysqli_query($connection, $query);
}
foreach ($result as $data) {
    $model = $data['model'];
    $core = $data['core'];
    $in_total = $data['in_total'];
    $i++;
    echo "
                                    <tr class='cell-1' data-toggle='collapse'   >
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>
                                    <td>$in_total</td>";
    echo "<td>";
    $query = "SELECT COUNT(inventory_id)as in_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND send_to_production='0'";

    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $in_stock = $data['in_stock'];

    }
    $query = "SELECT COUNT(inventory_id)as dispatch FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND dispatch='1'";
    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $dispatch = $data['dispatch'];
    }
   
    $query = "SELECT COUNT(inventory_id) as processing FROM `warehouse_information_sheet` WHERE brand = '$brand'AND model='$model' AND send_to_production = '1'";
    $result = mysqli_query($connection, $query);
    foreach ($result as $data) {
        $processing = $data['processing'];

    }
    $processing = $processing - $dispatch;
    echo $in_stock;
    echo "</td>
    <td>";
    echo $processing;
    echo "</td>
                                    <td>";

    echo $dispatch;
    echo "
                                    </td>
                                    <td class='text-center'>
                                            <a class='btn btn-xs bg-primary '
                                                href='model_view.php?model=$model&brand=$brand'><i class='fas fa-eye'></i>
                                                </a>
                                        </td>
                                        </tr>";}?>
                        </tbody>
                    </table>
                    <?php if ($search_value == 0) {?>
                    <ul class="pagination">
                        <li><a href="?brand=<?php echo $brand; ?>&pageno=1" class="btn btn-info mx-1">First</a></li>
                        <li class="<?php if ($pageno <= 1) {echo 'disabled';}?>">
                            <a href="<?php if ($pageno <= 1) {echo '#';} else {echo "?brand=$brand&pageno=" . ($pageno - 1);}?>"
                                class="btn btn-info mx-1">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {echo 'disabled';}?>">
                            <a href="<?php if ($pageno >= $total_pages) {echo '#';} else {echo "?brand=$brand&pageno=" . ($pageno + 1);}?>"
                                class="btn btn-info mx-1">Next</a>
                        </li>
                        <li><a href="?brand=<?php echo $brand; ?>&pageno=<?php echo $total_pages; ?>"
                                class="btn btn-info mx-1">Last</a></li>
                    </ul>
                    <?php } else {?>
                    <ul class="pagination">
                        <li><a href="?brand=<?php echo $brand; ?>&pageno=1" class="btn btn-info mx-1">Back</a></li>
                    </ul>
                    <?php }?>
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

<?php include_once '../includes/footer.php';?>