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
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            $result = mysqli_fetch_assoc($result_set);
            $sales_order_list = "<button class='btn btn-sm btn-info mx-2  text-capitalize float-end' data-toggle='modal' data-target='#modal-lg'> <i class='fa-solid fa-list-check mx-2'></i>task assign</button>";
        }
    }
}
?>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SO <?php echo $items['sales_order_id'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Genaral Worker</th>

                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td>

                                    <select name="emp_id" style="border-radius: 5px;" required>
                                        <option selected>--Select Technician--</option>
                                        <?php
                                                    $query = "SELECT * FROM employees WHERE department = 'production' ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($technicians = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                        <option value="<?php echo $technicians["emp_id"]; ?>">
                                            <?php echo strtoupper($technicians["emp_id"]); ?>
                                        </option>
                                        <?php
                                                    endwhile;
                                                    ?>
                                    </select>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="./warehouse_dashboard.php" type="button" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
                    <h3 class="text-uppercase"><i class="fa-solid fa-person-digging bg-danger p-2"></i>Task assign</h3>

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

                    <?php echo $sales_order_list; ?>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SO <?php echo $items['sales_order_id'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Genaral Worker</th>

                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td>

                                    <select name="emp_id" style="border-radius: 5px;" required>
                                        <option selected>--Select Technician--</option>
                                        <?php
                                                    $query = "SELECT * FROM employees WHERE department = 'production' ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($technicians = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                        <option value="<?php echo $technicians["emp_id"]; ?>">
                                            <?php echo strtoupper($technicians["emp_id"]); ?>
                                        </option>
                                        <?php
                                                    endwhile;
                                                    ?>
                                    </select>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="./warehouse_dashboard.php" type="button" class="btn btn-primary">Save changes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<style>
.btn {
    margin: auto;
    float: right;
    margin-top: 10px;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>