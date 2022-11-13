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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){
 

$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d H:i:s');

if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $query = "SELECT * FROM sales_order_information WHERE sales_order_id = {$sales_order_id} ORDER BY sales_order_id";
    $result_set = mysqli_query($connection, $query);
     
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
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

                    <table class="table table-bordered table-striped mt-5">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>QTY</th>
                                <th>Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php

                                        $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_add_items WHERE sales_order_id = {$sales_order_id} GROUP BY item_model, item_generation, item_core HAVING SUM(item_quantity) >= 1 ORDER BY No_of_Records DESC";
                                        $query_run = mysqli_query($connection, $query);
                                        $task_count;

                                        if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                            foreach ($query_run as $items) {
                                                    $query6 = "SELECT COUNT(`emp_id`) AS emp_id FROM `warehouse_assign_task` WHERE `sales_order`={$sales_order_id}";
                                                    $query6_run = mysqli_query($connection, $query6);
                                                   
                                                    

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

                                <td class="text-uppercase"><?php echo $items['item_delivery_date'] ?>
                                </td>

                            </tr>
                            <?php
                                            }
                                        }
                                        ?>
                        </tbody>
                    </table>
                    <?php $query5 ="SELECT`sales_order`, `emp_id` FROM `warehouse_assign_task` WHERE `sales_order`={$sales_order_id};";
                                $query5_run = mysqli_query($connection, $query5);
                                $id;
                                
                                foreach($query5_run as $data){
                                    $id = $data['emp_id'];
                                }
                                if(empty($id)){ ?>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-sm">
                        <i class="fa-solid fa-hammer mx-1"></i>Task Assign
                    </button>
                    <?php }else{ 
                                    echo "<div class='Assigned text-dark bg-danger w-25 mt-2 px-2 text-uppercase' 
                                    style='text-align: end; float: right; border-radius: 5px; '>Assigned to ". $id . "</div>";
                                }
                                ?>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-user-plus mx-2 bg-warning p-2"></i>SO
                    <?php echo $sales_order_id; ?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td>
                                    <form action="" method="post">
                                        <select name="emp_id">
                                            <option value="" disabled selected>--Select Team Member--</option>
                                            <?php
                                                    $query = "SELECT epf,first_name FROM users WHERE department = '2' ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($technicians = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                            <option value="<?php echo $technicians["epf"]; ?>">
                                                <?php echo strtoupper($technicians["epf"].'-'.$technicians["first_name"]); ?>
                                            </option>
                                            <?php
                                                    endwhile;
                                                    ?>
                                        </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="text-uppercase bg-info mx-auto text-center d-flex justify-content-center">Please
                        Assign the task for the motherboard techinician</span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input class="btn btn-primary" type="submit" name="submit" vlaue="Choose options">
                <?php
                        if(isset($_POST['submit'])){
                            // $query1 = "SELECT `emp_id` FROM `warehouse_assign_task` WHERE `sales_order`={$sales_order_id};";
                            // $result1  = mysqli_query($connection, $query1);
                            // if($result1 == 'true'){
                                

                            $query = "INSERT INTO warehouse_assign_task(assign_task_id, sales_order, emp_id,status,task_created_date) VALUES (null,'{$sales_order_id}','{$_POST['emp_id']}','0','{$date}');";
                            $result  = mysqli_query($connection, $query);
                            header('location: ./warehouse_dashboard.php');
                            }
                        // }
                    ?>
            </div>
        </div>
        </form>
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