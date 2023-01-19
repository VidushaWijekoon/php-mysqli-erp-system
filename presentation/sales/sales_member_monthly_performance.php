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

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header mt-1">
                    <h6 class="mt-1">
                        <span class="badge badge-lg badge-primary text-white px-3 p-2" style="font-size: 12px;">
                            <?php echo $sales_person_full_name ?>
                        </span>
                        Monthly Performance
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
                            
                                $query = "SELECT id, uae_pickup1, created_by, created_time
                                FROM sales_create_customer_informations WHERE created_by = '$sales_person_username' ";
                                $query_run = mysqli_query($connection, $query);
                                foreach($query_run as $xd){
                                    $created_date = $xd['created_time'];
                                    $uae_pickup = $xd['uae_pickup1'];
                                    $created_customers = $xd['Created_Customers'];                                                                
                            ?>
                            <tr>
                                <td><?php echo $created_date; ?></td>
                                <td></td>
                                <td><?php echo $uae_pickup; ?></td>
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