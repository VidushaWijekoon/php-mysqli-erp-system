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

$department = $_SESSION['department'];
$role_id = $_SESSION['role_id'];
$username = $_GET['username'];
echo $username;

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_team_leader_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Daily Posting for Customers
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-striped">
                        <thead>
                            <tr style="font-size: 10px;">
                                <th>#</th>
                                <!-- <th>Country</th> -->
                                <th>Customer Name</th>
                                <th>Phone Code</th>
                                <th>Whatsapp Number</th>
                                <th>Platform</th>
                                <th>Model He Selling/Buying?</th>
                                <th>Posted Model 1</th>
                                <th>Posted Model 2</th>
                                <th>Customer Asking Model</th>
                                <th>Customer Asking Price</th>
                                <!-- <th>Customer Reponose</th> -->
                                <th>He Can Pick Up From UAE?</th>
                                <th style="width: 100px;">Posted Date</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $i = 0;
                                $start_time = date('Y-m-d 00:00:00');
                                $end_time = date('Y-m-d 23:59:59');
                            
                                $query = "SELECT * FROM sales_posting_to_customer WHERE created_by = '$username' AND created_time BETWEEN '$start_time' AND '$end_time' ORDER BY created_time DESC";
                                $result_set = mysqli_query($connection, $query);
                                foreach($result_set as $count){

                                    $posting_customer_name = $count['posting_customer_name'];
                                    $posting_country = $count['choose_country'];
                                    $posting_contact_number = $count['posting_contact_number'];
                                    $platform2 = $count['platform2'];
                                    $model_selling_and_buying1 = $count['model_selling_and_buying1'];
                                    $posted_model_1 = $count['posted_model_1'];
                                    $posted_model_2 = $count['posted_model_2'];
                                    $customer_asking_model = $count['customer_asking_model'];
                                    $customer_asking_price = $count['customer_asking_price'];
                                    $uae_pickup2 = $count['uae_pickup2'];
                                    $posted_time = $count['created_time'];
                                    $i++
                                                               
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $posting_customer_name ?></td>
                                <td><?php echo $posting_country ?></td>
                                <td><?php echo "+". $posting_contact_number ?></td>
                                <td><?php echo $platform2 ?></td>
                                <td><?php echo $model_selling_and_buying1 ?></td>
                                <td><?php echo $posted_model_1; ?></td>
                                <td><?php echo $posted_model_2 ?></td>
                                <td><?php echo $customer_asking_model ?></td>
                                <td><?php echo $customer_asking_price ?></td>
                                <td><?php if($uae_pickup2 == 'yes') {echo "yes"; } elseif($uae_pickup2 == 'no') {echo "no"; }?></td>
                                <td><?php echo $posted_time ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>