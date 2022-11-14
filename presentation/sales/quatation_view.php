<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

if (isset($_GET['quatation_id'])) {
    // getting the user information
    $quatation_id = mysqli_real_escape_string($connection, $_GET['quatation_id']);
    
    $query = "SELECT * FROM sales_quatation WHERE quatation_id = {$quatation_id} ORDER BY quatation_id";

    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            // user found
            $result = mysqli_fetch_assoc($result_set);
            $customer_name = $result['customer_name'];
            $company_name = $result['company_name'];
            $customer_address = $result['customer_address'];
            $shipping_country = $result['country'];
            $created_time = $result['created_date'];
            $shipping_state = $result['contact_person'];
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
    <div class="col-md-5 align-self-center"><a href="./quatations.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Sales Order <?php echo $_GET['quatation_id'] ?></p>
                </div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="col col-lg-6 col-md-8 col-sm-8">
                            <fieldset class="mt-2">
                                <legend>Customer Details</legend>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Customer Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $customer_name . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Company Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $company_name . '"'; ?> readonly
                                            class="form-control" style="background-color: black;">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Country</label>
                                    <div class="col-sm-8">
                                        <input type="text" <?php echo 'value="' . $customer_address . '"'; ?> readonly
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
                        <div class="col col-lg-6 col-md-4 col-sm-4">

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
                                <th>QTY</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Delivery Date</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php

                                        $query = "SELECT *, SUM(item_quantity) AS No_of_Records 
                                                FROM sales_quatation_items WHERE quatation_id = {$quatation_id} 
                                                GROUP BY item_model, item_generation, item_core 
                                                HAVING SUM(item_quantity) >= 1 ORDER BY No_of_Records DESC";
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
                                <td class="text-uppercase"><?php echo $items['No_of_Records'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_price'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_total_price'] ?></td>
                                <td class="text-uppercase"><?php echo $items['item_delivery_date'] ?></td>
                            </tr>
                            <?php
                                            }
                                        }
                                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>

<?php include_once('../includes/footer.php'); ?>