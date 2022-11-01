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
if($role_id == 1 || $role_id == 2){

$sales_item_id = '';
$customer_name = '';
$shipping_country = '';
$created_time = '';
$item_type = '';
$item_brand = '';
$item_model = '';
$item_processor = '';
$item_core = '';
$item_generation = '';
$item_ram = '';
$item_hdd = '';
$item_condition = '';
$item_quantity = '';
$sales_order_created_date = '';
$item_delivery_date = '';
$sales_order_list = '';


if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $query = "SELECT * FROM sales_order_information WHERE sales_order_id = {$sales_order_id} ORDER BY sales_order_id";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            $result = mysqli_fetch_assoc($result_set);
            $customer_name = $result['customer_name'];
            $shipping_country = $result['shipping_country'];
            $created_time = $result['created_time'];

        }
    }
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_sales_orders.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Sales Order <?php echo $_GET['sales_order_id'] ?></p>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col col-lg-6 col-md-6">
                            <fieldset class="mt-2">
                                <legend>Sales Order Number</legend>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $sales_order_id . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>



                            </fieldset>
                        </div>
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
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $shipping_country . '"'; ?> readonly
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
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <table id="example1" class="table table-bordered table-striped mt-5">
                            <thead>
                                <tr>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>RAM</th>
                                    <th>HDD</th>
                                    <th>Display</th>
                                    <th>Condition</th>
                                    <th>QTY</th>
                                    <th>Delivery</th>
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
                                    <td class="text-uppercase"><?php echo $items['item_ram'] ?></td>
                                    <td class="text-uppercase"><?php echo $items['item_hdd'] ?></td>
                                    <td class="text-uppercase"><?php echo $items['item_display'] ?></td>
                                    <td class="text-uppercase"><?php echo $items['item_condition'] ?></td>
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
                        <?php echo $sales_order_list; ?>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>


<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

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
</style>


<?php include_once('../includes/footer.php'); } ?>