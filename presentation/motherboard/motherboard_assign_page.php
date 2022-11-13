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

$get_model = $_GET['model'];

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
    $qty = mysqli_real_escape_string($connection, $_POST['qty']);
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $model = mysqli_real_escape_string($connection, $_GET['model']);
    $brand = mysqli_real_escape_string($connection, $_GET['brand']);
    $device = mysqli_real_escape_string($connection, $_GET['device']);
    $core = mysqli_real_escape_string($connection, $_GET['core']);
    $processor = mysqli_real_escape_string($connection, $_GET['processor']);
    $generation = mysqli_real_escape_string($connection, $_GET['generation']);

    $insert_query = "INSERT INTO motherboard_assign(sales_order_id, emp_id, device, brand, processor, core, generation, model, qty, status, assign_time, task_completed_time)
                    VALUES('$sales_order_id', '$emp_id', '$device', '$brand', '$processor', '$core', '$generation', '$model', '$qty', '0', CURRENT_TIMESTAMP, '0000-00-00 00:00')";
    $query_set = mysqli_query($connection, $insert_query);
    if($query_set){
        $drop_back = "SELECT * FROM motherboard_assign";
        $set = mysqli_query($connection, $drop_back);
        foreach($set as $l){
            $l_sales_order_id = $l['sales_order_id'];
            header("Location: motherboard_team_leader_summery.php?sales_order_id={$l_sales_order_id}");
        }
    }else{
        echo "u suck";
    }
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
                        <h4 class="card-title text-uppercase">Sale Order </h4>

                    </div>
                    <div class="card-body">
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