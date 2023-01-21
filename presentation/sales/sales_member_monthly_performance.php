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

$sales_person_full_name = $_GET['full_name'];
$sales_person_username = $_GET['username'];

$month = Date('F');
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
                <div class="card-header mt-1">
                    <h6 class="mt-1">
                        <span class="badge badge-lg badge-primary text-white px-3 p-2" style="font-size: 12px;">
                            <?php echo $sales_person_full_name ?>
                        </span>
                        <?php echo $month; ?> Performance
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Created Customers</th>
                                <th>Posted</th>
                                <th>UAE Pickup Customers</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = "SELECT  CAST(created_time AS DATE) AS CURRENT_DATE_GFG,
                                        COUNT(id) AS Created_Customers
                                        FROM sales_create_customer_informations WHERE created_by = '$sales_person_username'
                                        AND MONTH(sales_create_customer_informations.created_time) = MONTH(now())
                                        GROUP BY CAST(created_time AS DATE)";
                                        
                                $result = mysqli_query($connection, $query);
                                foreach($result as $x){

                                    $created_customers = $x['Created_Customers'];
                                    $created_date = $x['CURRENT_DATE_GFG'];
                                    
                                    $q1 = "SELECT  COUNT(uae_pickup1) AS UAE_Pickups
                                        FROM sales_create_customer_informations WHERE created_by = '$sales_person_username' AND uae_pickup1 = 'yes'
                                        AND created_time='$created_date'";                                        
                                    $q1_run = mysqli_query($connection, $q1);
                                    foreach($q1_run as $dx){
                                        $uae_pickup = $dx['UAE_Pickups'];
                                    }

                                    $q2 = "SELECT COUNT(id) AS Posted FROM sales_posting_to_customer WHERE created_by = 'SAL181' AND CAST(created_time AS DATE)='$created_date'";
                                    $q2_run = mysqli_query($connection, $q2);
                                    foreach($q2_run as $xx){
                                        $posted_to_customers = $xx['Posted'];
                                    }
                                       
                            ?>
                            <tr>
                                <td><?php echo $created_date; ?></td>
                                <td><?php echo $created_customers ?></td>
                                <td><?php echo $posted_to_customers ?></td>
                                <td><?php echo $uae_pickup ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>