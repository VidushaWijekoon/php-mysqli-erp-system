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
                            Monthly UAE Pickup Customer List
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Country</th>
                                <th>Customer Name</th>
                                <th>Whatsapp Number</th>
                                <th>Platform</th>
                                <th>Model He Buying</th>
                                <th>He Can Pick Up From UAE?</th>
                                <th>Created Time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $query_1 = "SELECT customer_name, create_customer_country, customer_whatspp_phone_code, customer_whatsapp_number, platform1, model_selling_buying, uae_pickup1, created_time 
                                    FROM sales_create_customer_informations WHERE created_by = '$username' AND uae_pickup1 = 'yes'
                            AND MONTH(sales_create_customer_informations.created_time) = MONTH(now()) ORDER BY created_time DESC";
                            $result = mysqli_query($connection, $query_1);
                            foreach($result as $row){
                                
                                $customer_name = $row['customer_name'];
                                $customer_country = $row['create_customer_country'];
                                $customer_whatspp_phone_code = $row['customer_whatspp_phone_code'];
                                $customer_whatsapp_number = $row['customer_whatsapp_number'];
                                $platform1 = $row['platform1'];
                                $model_selling_buying = $row['model_selling_buying'];
                                $uae_pickup1 = $row['uae_pickup1'];
                                $created_time = $row['created_time'];
                            
                            ?>
                            <tr>
                                <td>#</td>
                                <td><?php echo $customer_country ?></td>
                                <td><?php echo $customer_name ?></td>
                                <td><?php echo $customer_whatspp_phone_code . ' ' . $customer_whatsapp_number; ?></td>
                                <td><?php echo $platform1 ?></td>
                                <td><?php echo $model_selling_buying ?></td>
                                <td><?php echo $uae_pickup1 ?></td>
                                <td><?php echo $created_time ?></td>
                                <td></td>
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