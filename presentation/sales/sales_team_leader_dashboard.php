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

$current_month = Date('F');
$current_date = Date('m-d-Y');

?>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_team_members.php">
            <span class="mx-1">Set Week Target</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./quatation_approval.php">
            <span class="mx-1">To Approve</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./set_price.php">
            <span class="mx-1">Set Laptop Price</span></a>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-receipt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sales Orders</span>
                <span class="info-box-number">41</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <a href="./quatation_approval.php">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Waiting for Approve</span>
                    <span class="info-box-number">
                        <?php

                            $query = "SELECT quatation_id FROM `sales_quatation_items` WHERE approval = '0' AND status = '1' GROUP BY quatation_id";
                            if ($result = mysqli_query($connection, $query)) {
                                // Return the number of rows in result set
                                $rowcount = mysqli_num_rows($result);
                            
                                echo "$rowcount";
                            }   
                        ?>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Sales Team Members</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT department, role FROM `users`  WHERE department = '5' AND role = '5'";
                        if ($result = mysqli_query($connection, $query)) {
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows($result);
                            
                            echo "$rowcount";
                        }   
                    ?>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true" style="color: #fff;">Sales Orders</a>
                        </li>
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false" style="color: #fff;">Quatations</a>
                        </li>
                    </ul>
                </div>
                <div class=" card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- ============================================================== -->
                        <!-- Sales Order  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Country</th>
                                        <th>Invoice No</th>
                                        <th>Sales Order</th>
                                        <th>Order Status</th>
                                        <th>Shipment Date</th>
                                        <th>Sales Person</th>
                                        <th>Payment</th>
                                        <th>Packed</th>
                                        <th>Amount</th>
                                        <th>Delivery Method</th>
                                        <th>Shipping</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #dc3545;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #17a2b8;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #ffc107;"></i>
                                            </span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>01/01/2023</td>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>IN-0001</td>
                                        <td>SO-0001</td>
                                        <td>Confirmed</td>
                                        <td>01/25/2022</td>
                                        <td>Riskan</td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td><i class="fa-solid fa-circle"></i></td>
                                        <td>$1000</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td>
                                            <span>
                                                <i class="fa-solid fa-circle mx-1" style="color: #28a745;">
                                                </i>
                                            </span>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex">
                                <div class="float-start">
                                    <a class="btn btn-sm btn-default" href="#">View All Sales Orders</a>
                                </div>
                                <div class="float-end ml-auto mt-auto">
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #28a745;"></i>Dispatched
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #dc3545;"></i>Delivered
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #17a2b8;"></i>Shipped
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #ff006f;"></i>Advance Paid
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #007bff;"></i>Fully Paid
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #6c757d;"></i>Pending
                                    </span>
                                    <span>
                                        <i class="fa-solid fa-circle mx-1" style="color: #ffc107;"></i>Packing
                                    </span>

                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Quatation  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>Sales Person</th>
                                        <th>Quatation ID</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                                                  
                                        $query = "SELECT * FROM sales_customer_information 
                                            INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
                                            GROUP BY quatation_id ORDER BY quatation_id DESC LIMIT 7";                                           
                                                
                                        $query_run = mysqli_query($connection, $query);
                                        foreach($query_run as $row){
                                            $customer_first_name = $row['first_name'];
                                            $customer_last_name = $row['last_name'];
                                            $created_by = $row['created_by'];
                                            $quatation_id = $row['quatation_id'];
                                            $item_status = $row['status'];
                                            $approved = $row['approval'];
                                            $approved_by = $row['approved_by'];
                                    ?>
                                    <tr>
                                        <td><?php echo $customer_first_name; ?></td>
                                        <td><?php echo $customer_first_name; ?></td>
                                        <td><?php echo $created_by; ?></td>
                                        <td>
                                            <?php 
                                            
                                                echo "<a href='./quatation_view.php?quatation_id={$row['quatation_id']}&customer_id={$row['customer_id']}'>
                                                        QA-$quatation_id</a>"
                                            
                                            ?>
                                        </td>
                                        <td>
                                            <?php if(($approved == '1') && ($item_status == '1')) { ?>
                                            <span class="badge badge-lg badge-success text-white p-1 px-3">Approved
                                            </span>
                                            <?php }if($item_status == '0') { ?>
                                            <span class="badge badge-lg badge-warning text-white p-1 px-3"
                                                style="color: black !important;">Pending </span>
                                            <?php }if($item_status == '2') { ?>
                                            <span class="badge badge-lg badge-danger p-1 px-3">Customer
                                                Rejected
                                            </span>
                                            <?php } if(($item_status == '1') && ($approved == '0')) { ?>
                                            <span class="badge badge-lg badge-info text-white p-1 px-3">Waiting For
                                                Approval
                                            </span>
                                            <?php } ?>
                                        </td>
                                        <?php } ?>
                                    </tr>
                                </tbody>

                            </table>
                            <div class="float-right">
                                <a class="btn btn-sm btn-default" href="./quatations.php">View All Quatations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                <div class="card-header border-transparent">
                    <h6><?php echo $current_month . " " ?>Month Performance</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Sales Person</th>
                                    <th>Created Customers</th>
                                    <th>Posts</th>
                                    <th>UAE Pickup</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = "SELECT * FROM employees INNER JOIN users ON employees.emp_id = users.epf WHERE users.department = '5' ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $xd){
                                        $sales_person_full_name = $xd['full_name'];
                                        $sales_person_username = $xd['username'];

                                        $q1 = "SELECT *,
                                            COUNT(sales_create_customer_informations.id) AS Created_Customers
                                            FROM sales_create_customer_informations 
                                            WHERE sales_create_customer_informations.created_by = '$sales_person_username' 
                                            AND MONTH(sales_create_customer_informations.created_time) = MONTH(now())";
                                        $q_run = mysqli_query($connection, $q1);
                                        foreach($q_run as $qr){
                                            $total_customers = $qr['Created_Customers'];
                                        }
                                        
                                        $q2 = "SELECT *, COUNT(sales_create_customer_informations.uae_pickup1) AS UAE_Pickup_Customers
                                            FROM sales_create_customer_informations 
                                            WHERE sales_create_customer_informations.created_by = '$sales_person_username' AND uae_pickup1 = 'yes'  
                                            AND MONTH(sales_create_customer_informations.created_time) = MONTH(now()) ";
                                        $q_run_2 = mysqli_query($connection, $q2);
                                        foreach($q_run_2 as $qr2){
                                            $uae_pickup_customers = $qr2['UAE_Pickup_Customers'];                
                                        }
                                        
                                        $q3 = "SELECT *, COUNT(sales_posting_to_customer.id) AS Posted_Customer
                                            FROM sales_posting_to_customer 
                                            WHERE sales_posting_to_customer.created_by = '$sales_person_username' 
                                            AND MONTH(sales_posting_to_customer.created_time) = MONTH(now()) ";
                                        $q_run_1 = mysqli_query($connection, $q3);
                                        foreach($q_run_1 as $qr_1){
                                            $posted_customer = $qr_1['Posted_Customer'];
                                        }
                                   
                                ?>
                                <tr>
                                    <td>
                                        <?php echo "<a href=\"sales_member_monthly_performance.php?full_name={$xd['full_name']}&username={$xd['username']}\">$sales_person_full_name</a>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href=\"monthly_created_customers.php?full_name={$xd['full_name']}&username={$xd['username']}\">$total_customers</a>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href=\"monthly_created_posts.php?full_name={$xd['full_name']}&username={$xd['username']}\">$posted_customer</a>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href=\"monthly_uae_pickup_cusotmers.php?full_name={$xd['full_name']}&username={$xd['username']}\">$uae_pickup_customers</a>" ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">
                        <span><?php echo $current_date; ?></span>
                        Sales Team Members Daily Achivement
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Sales Person</th>
                                    <th>Created Customers</th>
                                    <th>Posts</th>
                                    <th>UAE Pickup</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                    $start_day = date('Y-m-d 00:00:00');
                                    $end_day = date('Y-m-d 23:59:59');                                    
                                
                                    $query = "SELECT * FROM employees INNER JOIN users ON employees.emp_id = users.epf WHERE users.department = '5' ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $xd){
                                        $sales_person_full_name = $xd['full_name'];
                                        $sales_person_username = $xd['username'];

                                        $q1 = "SELECT *,
                                            COUNT(sales_create_customer_informations.id) AS Created_Customers
                                            FROM sales_create_customer_informations 
                                            WHERE sales_create_customer_informations.created_by = '$sales_person_username' 
                                            AND sales_create_customer_informations.created_time BETWEEN '$start_day' AND '$end_day'";
                                        $q_run = mysqli_query($connection, $q1);
                                        foreach($q_run as $qr){
                                            $total_customers = $qr['Created_Customers'];
                                        }
                                        
                                        $q2 = "SELECT *, COUNT(sales_create_customer_informations.uae_pickup1) AS UAE_Pickup_Customers
                                            FROM sales_create_customer_informations 
                                            WHERE sales_create_customer_informations.created_by = '$sales_person_username' AND uae_pickup1 = 'yes'  
                                            AND sales_create_customer_informations.created_time BETWEEN '$start_day' AND '$end_day'";
                                        $q_run_2 = mysqli_query($connection, $q2);
                                        foreach($q_run_2 as $qr2){
                                            $uae_pickup_customers = $qr2['UAE_Pickup_Customers'];                
                                        }
                                        
                                        $q2 = "SELECT *, COUNT(sales_posting_to_customer.id) AS Posted_Customer
                                            FROM sales_posting_to_customer 
                                            WHERE sales_posting_to_customer.created_by = '$sales_person_username' 
                                            AND sales_posting_to_customer.created_time BETWEEN '$start_day' AND '$end_day'";
                                        $q_run_1 = mysqli_query($connection, $q2);
                                        foreach($q_run_1 as $qr_1){
                                            $posted_customer = $qr_1['Posted_Customer'];
                                        }
                                   
                                ?>
                                <tr>
                                    <td><?php echo $sales_person_full_name; ?></td>
                                    <td>
                                        <?php echo "<a href=\"daily_created_customers.php?full_name={$xd['full_name']}&username={$xd['username']}\">$total_customers</a>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href=\"daily_created_posts.php?full_name={$xd['full_name']}&username={$xd['username']}\">$posted_customer</a>" ?>
                                    </td>
                                    <td>
                                        <?php echo "<a href=\"daily_uae_pickup_customers.php?full_name={$xd['full_name']}&username={$xd['username']}\">$uae_pickup_customers</a>" ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>