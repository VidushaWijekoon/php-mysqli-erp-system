<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$sales_order = $_GET['sales_order_id'];
$get_device = $_GET['device'];
$get_brand = $_GET['brand'];
$get_core = $_GET['core'];
$get_processor = $_GET['processor'];
$get_generation = $_GET['generation'];
$get_model = $_GET['model'];
$get_quantity = $_GET['count']; // Scanned Qty by model

$emp_id = NULL;
$qty = NULL;
$sales_order_id = NULL;
$model = NULL;
$brand = NULL;
$device = NULL;
$core = NULL;
$processor = NULL;
$generation = NULL;

if(isset($_POST['submit'])){

    $emp_id = mysqli_real_escape_string($connection, $_POST['emp_id']);
    $assign_qty = mysqli_real_escape_string($connection, $_POST['qty']);
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $model = mysqli_real_escape_string($connection, $_GET['model']);
    $brand = mysqli_real_escape_string($connection, $_GET['brand']);
    $device = mysqli_real_escape_string($connection, $_GET['device']);
    $core = mysqli_real_escape_string($connection, $_GET['core']);
    $processor = mysqli_real_escape_string($connection, $_GET['processor']);
    $generation = mysqli_real_escape_string($connection, $_GET['generation']);
   
}

    $query2 = "SELECT *, COUNT(motherboard_assign.motherboard_assign_task_id) AS Already_assign_qty FROM motherboard_assign WHERE sales_order_id = $sales_order ";
    $query_reult2 = mysqli_query($connection, $query2);
    foreach($query_reult2 as $d){
        $existing_qty = $d['qty'];
    }

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Assign Page </h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col grid-margin stretch-card justify-content-center mx-auto mt-5">
            <form method="POST">

                <div class="card mt-5" style="background: #3f4156;">
                    <div class="card-header bg-secondary d-flex">
                        <h4 class="card-title text-uppercase">Sale Order <?php echo $sales_order_id ?> </h4>
                    </div>
                    <div class="card-body">
                        <?php 

                            if(isset($_POST['submit'])){

                                if($get_quantity >= $assign_qty){
                                    $insert_query = "INSERT INTO motherboard_assign(sales_order_id, emp_id, device, brand, processor, core, generation, model, qty, status, assign_time, task_completed_time)
                                                VALUES('$sales_order_id', '$emp_id', '$device', '$brand', '$processor', '$core', '$generation', '$model', '$assign_qty', '0', CURRENT_TIMESTAMP, '0000-00-00 00:00')";
                                    $query_set = mysqli_query($connection, $insert_query);    
                                        if($query_set){
                                            header("location: ./motherboard_team_leader_summery.php?sales_order_id=".$sales_order_id);
                                        }else{
                                            echo "<div class='equal mb-3 mt-3 mx-auto text-uppercase text-dark bg-danger'>Somthing Went Wrong!!!</div>";
                                        }                 
                                        // echo $insert_query;
                                    }else{
                                        echo "<div class='equal mb-2 text-uppercase bg-danger px-3'>can not assign more than order quantity</div>";
                                    }
                                }      
                            
                        ?>
                        <table class="table table-striped">
                            <thead class="bg-secondary text-uppercase">
                                <tr>
                                    <th>Technician</th>
                                    <th>Model</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <select name="emp_id" class="w-75" style="border-radius: 5px;" required>
                                            <option selected>--Select Technician--</option>
                                            <?php
                                                $query = "SELECT epf, first_name FROM users WHERE department = 9";
                                                $result = mysqli_query($connection, $query);

                                                while ($worker = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                            <option value="<?php echo $worker["epf"]; ?>">
                                                <?php echo strtoupper($worker["epf"] . " - " . ($worker["first_name"])); ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                    <td><?php echo $get_model; ?></td>
                                    <td>
                                        <input type="number" class="form-control w-75" min='1'
                                            placeholder="Please Enter QTY" name="qty">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="justify-content-between mx-auto mb-3 text-center">
                        <a href="./motherboard_dashboard.php" class="btn btn-secondary btn-sm">Close</a>
                        <input class="btn btn-success btn-sm" type="submit" name="submit" value="Save Changes">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>