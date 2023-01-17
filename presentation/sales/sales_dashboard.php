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

$username = $_SESSION['username'];

$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');


?>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_post.php"><i
                class="fa-sharp fa-solid fa-list-check"></i><span class="mx-1">Daily Task</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_customers.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Customer</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_quatation.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Quatation</span></a>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-person"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT `customer_id` FROM `sales_customer_information` WHERE created_by = '$username' ";
                        if ($result = mysqli_query($connection, $query)) {
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        echo "$rowcount"; 
                    ?>
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-signs-post"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Today Posting</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT id, created_time FROM `sales_posting_to_customer` WHERE created_by = '$username' BETWEEN '$date'AND '$date2'";
                        if ($result = mysqli_query($connection, $query)) {
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        echo "$rowcount"; 
                    ?>
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fa-solid fa-folders"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Quatations</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT `sales_quatations_items_id` FROM `sales_quatation_items` WHERE created_by = '$username' ";
                        if ($result = mysqli_query($connection, $query)) {
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                        }
                        echo "$rowcount";
                        ?>

                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-receipt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Sales Order</span>
                <span class="info-box-number">
                    0
                </span>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">

        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>