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

$department = $_SESSION['department'];
$role_id = $_SESSION['role_id'];

$created_date = null;
$quatation_id = 0;

$customer_first_name = null;
$customer_last_name = null;
$customer_company_name = null;
$customer_country = null;
$shipping_uae_number = null;

$quatation_id = $_GET['quatation_id'];
$customer_id = $_GET['customer_id'];
 
$get_status = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id ";
$qd = mysqli_query($connection, $get_status);
foreach($qd as $x){
    $status = $x['status'];
    $approval = $x['approval'];
}

$customer_info = "SELECT * FROM sales_customer_information LEFT JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id 
                WHERE sales_customer_information.customer_id = '$customer_id' GROUP BY sales_quatation_items.customer_id";
$customer_run = mysqli_query($connection, $customer_info);


foreach($customer_run as $lt){
    $customer_first_name = $lt['first_name'];
    $customer_last_name = $lt['last_name'];
    $customer_company_name = $lt['company_name'];
    $customer_country = $lt['country'];
    $shipping_uae_number = $lt['UAE_number'];
    $shipping_country_code = $lt['country_code'];
    $shipping_local_number = $lt['local_number'];

}


if(isset($_POST['reject'])){

    $reject_query = "UPDATE sales_quatation_items SET status = '2' WHERE quatation_id = {$quatation_id}";
    $reject_query_run = mysqli_query($connection, $reject_query);
    header("Location: orders.php");

}

if(isset($_POST['accept'])){

    $accept_query = "UPDATE sales_quatation_items SET status = '1' WHERE quatation_id = {$quatation_id}";
    $accept_query_run = mysqli_query($connection, $accept_query);
    header("Location: orders.php");

} 

?>

<?php if($department == 5 && $role_id == 8) { ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_team_leader_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } if($department == 5 && $role_id == 5){ ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./orders.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } ?>

<!-- ============================================================== -->
<!-- Approved -->
<!-- ============================================================== -->
<?php if($status == 1 && $approval == 1) { ?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $quatation_id; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo $customer_first_name . " " . $customer_last_name  ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_company_name . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_country . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo "+971" . $shipping_uae_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Local
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo "+". $shipping_country_code  . $shipping_local_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/approved.png" alt="" style="width: 44%;">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <table class="table table-bordered table-dark text-uppercase" id="tbl">
                            <thead>
                                <tr style="font-size: 9px;">
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Resolution</th>
                                    <th>Touch</th>
                                    <th>RAM</th>
                                    <th>HDD Capacity</th>
                                    <th>HDD Type</th>
                                    <th>Ghrphic Capacity</th>
                                    <th>Ghrphic Brand</th>
                                    <th>OS</th>
                                    <th>Condition</th>
                                    <th>Selling Type</th>
                                    <th>Charger</th>
                                    <th>Packing Type</th>
                                    <th>Shipping Type</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $query_d = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id ";
                                    $qd = mysqli_query($connection, $query_d);

                                        foreach($qd as $qd){
                                            $device = $qd['device'];
                                            $brand = $qd['brand'];
                                            $model = $qd['model'];
                                            $processor = $qd['processor'];
                                            $core = $qd['core'];
                                            $generation = $qd['generation'];
                                            $speed = $qd['speed'];
                                            $lcd_size = $qd['lcd_size'];
                                            $resolution = $qd['resolution'];
                                            $touch_or_non_touch = $qd['touch_or_non_touch'];
                                            $ram = $qd['ram'];
                                            $hdd_capacity = $qd['hdd_capacity'];
                                            $hdd_type = $qd['hdd_type'];
                                            $graphic_capacity = $qd['graphic_capacity'];
                                            $graphic_type = $qd['graphic_type'];
                                            $os = $qd['os'];
                                            $condition = $qd['conditions'];
                                            $selling_type = $qd['selling_type'];
                                            $charger = $qd['charger'];
                                            $packing_type = $qd['packing_type'];
                                            $shipping_method = $qd['shipping_method'];
                                            $qty = $qd['qty'];
                                            $unit_price = $qd['unit_price'];
                                            $discount = $qd['discount'];
                                            $total = $qd['total'];                                                                           
                                ?>
                                <tr style="font-size: 9px;">
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $processor; ?></td>
                                    <td><?php echo $core; ?></td>
                                    <td><?php echo $generation; ?></td>
                                    <td><?php echo $speed; ?></td>
                                    <td><?php echo $lcd_size; ?></td>
                                    <td><?php echo $resolution; ?></td>
                                    <td><?php echo $touch_or_non_touch; ?></td>
                                    <td><?php echo $ram; ?></td>
                                    <td><?php echo $hdd_capacity; ?></td>
                                    <td><?php echo $hdd_type; ?></td>
                                    <td><?php echo $graphic_capacity; ?></td>
                                    <td><?php echo $graphic_type; ?></td>
                                    <td><?php echo $os; ?></td>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $selling_type; ?></td>
                                    <td><?php echo $charger; ?></td>
                                    <td><?php echo $packing_type; ?></td>
                                    <td><?php echo $shipping_method; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $unit_price; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="d-flex float-end justify-content-end">
                            <?php if($department == 5 && $role_id == 8) { ?>
                            <a href="./sales_team_leader_dashboard.php" class="btn bg-gradient-warning mx-2 text-white">
                                <i class="fa fa-arrow-left"></i><span class="mx-1">Cancel</span>
                            </a>
                            <?php } else { ?>
                            <a href="./orders.php" class="btn bg-gradient-warning mx-2 text-white">
                                <i class="fa fa-arrow-left"></i><span class="mx-1">Cancel</span>
                            </a>
                            <?php } if($department == 5 && $role_id == 8) { ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } if($department == 5 && $role_id == 5) {  ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- ============================================================== -->
<!-- Rejected -->
<!-- ============================================================== -->
<?php } elseif($status == 2) { ?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $quatation_id; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo $customer_first_name . " " . $customer_last_name  ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_company_name . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_country . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo "+971" . $shipping_uae_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Local
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo "+". $shipping_country_code  . $shipping_local_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/rejected_new.png" alt="" style="width: 50%;">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <table class="table table-bordered table-dark text-uppercase" id="tbl">
                            <thead>
                                <tr style="font-size: 9px;">
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Resolution</th>
                                    <th>Touch</th>
                                    <th>RAM</th>
                                    <th>HDD Capacity</th>
                                    <th>HDD Type</th>
                                    <th>Ghrphic Capacity</th>
                                    <th>Ghrphic Brand</th>
                                    <th>OS</th>
                                    <th>Condition</th>
                                    <th>Selling Type</th>
                                    <th>Charger</th>
                                    <th>Packing Type</th>
                                    <th>Shipping Type</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $query_d = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id ";
                                    $qd = mysqli_query($connection, $query_d);

                                        foreach($qd as $qd){
                                            $device = $qd['device'];
                                            $brand = $qd['brand'];
                                            $model = $qd['model'];
                                            $processor = $qd['processor'];
                                            $core = $qd['core'];
                                            $generation = $qd['generation'];
                                            $speed = $qd['speed'];
                                            $lcd_size = $qd['lcd_size'];
                                            $resolution = $qd['resolution'];
                                            $touch_or_non_touch = $qd['touch_or_non_touch'];
                                            $ram = $qd['ram'];
                                            $hdd_capacity = $qd['hdd_capacity'];
                                            $hdd_type = $qd['hdd_type'];
                                            $graphic_capacity = $qd['graphic_capacity'];
                                            $graphic_type = $qd['graphic_type'];
                                            $os = $qd['os'];
                                            $condition = $qd['conditions'];
                                            $selling_type = $qd['selling_type'];
                                            $charger = $qd['charger'];
                                            $packing_type = $qd['packing_type'];
                                            $shipping_method = $qd['shipping_method'];
                                            $qty = $qd['qty'];
                                            $unit_price = $qd['unit_price'];
                                            $discount = $qd['discount'];
                                            $total = $qd['total'];                                                                           
                                ?>
                                <tr style="font-size: 9px;">
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $processor; ?></td>
                                    <td><?php echo $core; ?></td>
                                    <td><?php echo $generation; ?></td>
                                    <td><?php echo $speed; ?></td>
                                    <td><?php echo $lcd_size; ?></td>
                                    <td><?php echo $resolution; ?></td>
                                    <td><?php echo $touch_or_non_touch; ?></td>
                                    <td><?php echo $ram; ?></td>
                                    <td><?php echo $hdd_capacity; ?></td>
                                    <td><?php echo $hdd_type; ?></td>
                                    <td><?php echo $graphic_capacity; ?></td>
                                    <td><?php echo $graphic_type; ?></td>
                                    <td><?php echo $os; ?></td>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $selling_type; ?></td>
                                    <td><?php echo $charger; ?></td>
                                    <td><?php echo $packing_type; ?></td>
                                    <td><?php echo $shipping_method; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $unit_price; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="d-flex float-end justify-content-end">
                            <?php if($department == 5 && $role_id == 8) { ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } if($department == 5 && $role_id == 5) {  ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- ============================================================== -->
<!-- Accepted -->
<!-- ============================================================== -->
<?php } elseif($status == 1) { ?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $quatation_id; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo $customer_first_name . " " . $customer_last_name  ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_company_name . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_country . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo "+971" . $shipping_uae_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Local
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo "+". $shipping_country_code  . $shipping_local_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/.png" alt="" style="width: 70%;">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <table class="table table-bordered table-dark text-uppercase" id="tbl">
                            <thead>
                                <tr style="font-size: 9px;">
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Resolution</th>
                                    <th>Touch</th>
                                    <th>RAM</th>
                                    <th>HDD Capacity</th>
                                    <th>HDD Type</th>
                                    <th>Ghrphic Capacity</th>
                                    <th>Ghrphic Brand</th>
                                    <th>OS</th>
                                    <th>Condition</th>
                                    <th>Selling Type</th>
                                    <th>Charger</th>
                                    <th>Packing Type</th>
                                    <th>Shipping Type</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $query_d = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id ";
                                    $qd = mysqli_query($connection, $query_d);

                                        foreach($qd as $qd){
                                            $device = $qd['device'];
                                            $brand = $qd['brand'];
                                            $model = $qd['model'];
                                            $processor = $qd['processor'];
                                            $core = $qd['core'];
                                            $generation = $qd['generation'];
                                            $speed = $qd['speed'];
                                            $lcd_size = $qd['lcd_size'];
                                            $resolution = $qd['resolution'];
                                            $touch_or_non_touch = $qd['touch_or_non_touch'];
                                            $ram = $qd['ram'];
                                            $hdd_capacity = $qd['hdd_capacity'];
                                            $hdd_type = $qd['hdd_type'];
                                            $graphic_capacity = $qd['graphic_capacity'];
                                            $graphic_type = $qd['graphic_type'];
                                            $os = $qd['os'];
                                            $condition = $qd['conditions'];
                                            $selling_type = $qd['selling_type'];
                                            $charger = $qd['charger'];
                                            $packing_type = $qd['packing_type'];
                                            $shipping_method = $qd['shipping_method'];
                                            $qty = $qd['qty'];
                                            $unit_price = $qd['unit_price'];
                                            $discount = $qd['discount'];
                                            $total = $qd['total'];                                                                           
                                ?>
                                <tr style="font-size: 9px;">
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $processor; ?></td>
                                    <td><?php echo $core; ?></td>
                                    <td><?php echo $generation; ?></td>
                                    <td><?php echo $speed; ?></td>
                                    <td><?php echo $lcd_size; ?></td>
                                    <td><?php echo $resolution; ?></td>
                                    <td><?php echo $touch_or_non_touch; ?></td>
                                    <td><?php echo $ram; ?></td>
                                    <td><?php echo $hdd_capacity; ?></td>
                                    <td><?php echo $hdd_type; ?></td>
                                    <td><?php echo $graphic_capacity; ?></td>
                                    <td><?php echo $graphic_type; ?></td>
                                    <td><?php echo $os; ?></td>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $selling_type; ?></td>
                                    <td><?php echo $charger; ?></td>
                                    <td><?php echo $packing_type; ?></td>
                                    <td><?php echo $shipping_method; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $unit_price; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="d-flex float-end justify-content-end">
                            <?php  if($department == 5 && $role_id == 8) { 
                                echo "<a  class='btn btn-sm btn-success mt-1' href=\"quatation_approval_update.php?quatation_id={$qd['quatation_id']}\" onclick=\"return confirm('Make sure you want to $quatation_id want approve this quatation');\"><i class='fa fa-check'></i>Click to Approve</a>";                                       
                            } 
                            if(($department == 5 && $role_id == 5)) {  ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- ============================================================== -->
<!-- Pending -->
<!-- ============================================================== -->
<?php } elseif($status == 0) { ?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $quatation_id; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo $customer_first_name . " " . $customer_last_name  ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company
                                            Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_company_name . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_country . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo "+971" . $shipping_uae_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Local
                                            Number</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                value="<?php echo "+". $shipping_country_code  . $shipping_local_number; ?>"
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/waiting.png" alt="" style="width: 70%;">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <table class="table table-bordered table-dark text-uppercase" id="tbl">
                            <thead>
                                <tr style="font-size: 9px;">
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Resolution</th>
                                    <th>Touch</th>
                                    <th>RAM</th>
                                    <th>HDD Capacity</th>
                                    <th>HDD Type</th>
                                    <th>Ghrphic Capacity</th>
                                    <th>Ghrphic Brand</th>
                                    <th>OS</th>
                                    <th>Condition</th>
                                    <th>Selling Type</th>
                                    <th>Charger</th>
                                    <th>Packing Type</th>
                                    <th>Shipping Type</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $query_d = "SELECT * FROM sales_quatation_items WHERE quatation_id = $quatation_id ";
                                    $qd = mysqli_query($connection, $query_d);

                                        foreach($qd as $qd){
                                            $device = $qd['device'];
                                            $brand = $qd['brand'];
                                            $model = $qd['model'];
                                            $processor = $qd['processor'];
                                            $core = $qd['core'];
                                            $generation = $qd['generation'];
                                            $speed = $qd['speed'];
                                            $lcd_size = $qd['lcd_size'];
                                            $resolution = $qd['resolution'];
                                            $touch_or_non_touch = $qd['touch_or_non_touch'];
                                            $ram = $qd['ram'];
                                            $hdd_capacity = $qd['hdd_capacity'];
                                            $hdd_type = $qd['hdd_type'];
                                            $graphic_capacity = $qd['graphic_capacity'];
                                            $graphic_type = $qd['graphic_type'];
                                            $os = $qd['os'];
                                            $condition = $qd['conditions'];
                                            $selling_type = $qd['selling_type'];
                                            $charger = $qd['charger'];
                                            $packing_type = $qd['packing_type'];
                                            $shipping_method = $qd['shipping_method'];
                                            $qty = $qd['qty'];
                                            $unit_price = $qd['unit_price'];
                                            $discount = $qd['discount'];
                                            $total = $qd['total'];                                                                           
                                ?>
                                <tr style="font-size: 9px;">
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $processor; ?></td>
                                    <td><?php echo $core; ?></td>
                                    <td><?php echo $generation; ?></td>
                                    <td><?php echo $speed; ?></td>
                                    <td><?php echo $lcd_size; ?></td>
                                    <td><?php echo $resolution; ?></td>
                                    <td><?php echo $touch_or_non_touch; ?></td>
                                    <td><?php echo $ram; ?></td>
                                    <td><?php echo $hdd_capacity; ?></td>
                                    <td><?php echo $hdd_type; ?></td>
                                    <td><?php echo $graphic_capacity; ?></td>
                                    <td><?php echo $graphic_type; ?></td>
                                    <td><?php echo $os; ?></td>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $selling_type; ?></td>
                                    <td><?php echo $charger; ?></td>
                                    <td><?php echo $packing_type; ?></td>
                                    <td><?php echo $shipping_method; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $unit_price; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $total; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="d-flex float-end justify-content-end">
                            <?php if($department == 5 && $role_id == 8) { ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white" disabled>
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } if($department == 5 && $role_id == 5) {  ?>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>

<!-- ============================================================== -->
<!-- Pending -->
<!-- ============================================================== -->

<style>
input[type="text"],
[type="number"],
[type="email"],
[type='date'] {
    width: 100%;
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    color: #ffffff !important;
}

.img {
    background-image: url('../../static/dist/img/rejected.png');
    background-repeat: no-repeat;
}
</style>

<?php include_once('../includes/footer.php'); ?>