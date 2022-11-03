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

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){
 

if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $query = "SELECT * FROM sales_order_information WHERE sales_order_id = {$sales_order_id} ORDER BY sales_order_id";
    $result_set = mysqli_query($connection, $query);
     
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_task.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary d-flex">
                    <h5 class="text-uppercase"><i class="fa-solid fa-person-digging bg-danger p-2 mx-2"></i>Team Member
                        Work assign</h5>

                </div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="col col-lg-6 col-md-6">
                            <fieldset class="mt-2">
                                <legend>Sales Order Number</legend>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">S/O</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $sales_order_id . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>



                            </fieldset>
                        </div>

                    </div>

                    <table id="example1" class="table table-bordered table-striped mt-5">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>QTY</th>
                                <th>Prepared QTY</th>
                                <td style="width: 200px;">&nbsp;</td>
                                <th>Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php

                                        $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_add_items WHERE sales_order_id = {$sales_order_id} GROUP BY item_model, item_generation, item_core HAVING SUM(item_quantity) >= 1 ORDER BY No_of_Records DESC";
                                        $query_run = mysqli_query($connection, $query);

                                        if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                            foreach ($query_run as $items) {

                                                // Return the number of rows in result set

                                        ?>
                            <tr>
                                <td class="text-uppercase"><?php echo $items['item_type'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_brand'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_model'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_processor'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_core'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_generation'] ?></td>
                                <td class="text-uppercase"><?php echo $items['No_of_Records'] ?></td>
                                <td>0</td>
                                <td> <?php

                                            $percentage = round(($items['No_of_Records']  / $items['item_quantity']) * 100);

                                            if($percentage == 100)
                                            {
                                                $progress_bar_class = 'bg-success progress-bar-striped';
                                            }
                                            else if($percentage >= 50 && $percentage < 99)
                                            {
                                                $progress_bar_class = 'bg-info progress-bar-striped';
                                            }
                                            else if($percentage >= 11 && $percentage < 49)
                                            {
                                                $progress_bar_class = 'bg-warning progress-bar-striped';
                                            }
                                            else if($percentage >= 0 && $percentage < 10)
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                            else
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                                                                
                                            echo  
                                            '<div class="progress text-bold">
                                                <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">
                                                    '.$percentage.' % 
                                                </div>
                                            </div>'
                                            ?>
                                </td>
                                <td class="text-uppercase"><?php echo $items['item_delivery_date'] ?>
                                </td>

                            </tr>
                            <?php
                                            }
                                        }
                                        ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>



<style>
select,
input[type="text"] {
    width: 100%;
    height: 30px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    background-color: black;
}

.btn {
    margin: auto;
    float: right;
    margin-top: 10px;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>