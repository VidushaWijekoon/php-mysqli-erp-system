<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1)){
  

$sales_item_id = '';
$customer_name = '';
$shipping_country = '';
$created_time = '';
$sales_order_created_date = '';
$shipping_state = '';
$shipping_address = "";
$item_delivery_date = '';
$contact_number = '';
$zip_code = '';

if (isset($_GET['sales_order_id'])) {
    // getting the user information
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    
    $query = "SELECT * FROM sales_order_information WHERE sales_order_id = {$sales_order_id} ORDER BY sales_order_id";

    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            // user found
            $result = mysqli_fetch_assoc($result_set);
            $customer_name = $result['customer_name'];
            $shipping_country = $result['shipping_country'];
            $created_time = $result['created_time'];
            $shipping_address = $result['shipping_address'];
            $shipping_country = $result['shipping_country'];
            $shipping_state = $result['shipping_state'];
            $contact_number = $result['contact_number'];
            $zip_code = $result['zip_code'];
         
        } else {
            // user not found
            header('Location: sales_orders.php?err=user_not_found');
        }
    } else {
        // query unsuccessful
        // header('Location: hr_employees.php?err=query_failed');
    }
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_team_leader_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Sales Order <?php echo $_GET['sales_order_id'] ?></p>
                </div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="col col-lg-6 col-md-6">
                            <fieldset class="mt-2">
                                <legend>Customer Details</legend>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Shipping Country</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $customer_name . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Shipping Address</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $shipping_address . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Shipping Country</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $shipping_country . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Zip Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $zip_code . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Contact Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $contact_number . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Purchased Date</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $created_time . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col col-lg-6 col-md-6">

                        </div>

                    </div>
                </div>
                <div class="col col-lg-12 mb-3">

                    <table class="table table-bordered table-striped mt-2">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>RAM</th>
                                <th>HDD</th>
                                <th>Display</th>
                                <th>OS</th>
                                <th>QTY</th>
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
                                <td>#</td>
                                <td class="text-uppercase"><?php echo $items['item_type'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_brand'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_model'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_processor'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_core'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_generation'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_ram'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_hdd'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_display'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_os'] ?></td>
                                <td class="text-uppercase"><?php echo $items['No_of_Records'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_delivery_date'] ?></td>
                            </tr>
                            <?php } } ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>