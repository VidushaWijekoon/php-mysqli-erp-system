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

?>

<div class="row m-2">

    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_team_members.php">
            <span class="mx-1">Set Week Target</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./quatation_approval.php">
            <span class="mx-1">To Approve</span></a>
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
        <a href="./sales_team_members.php">
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
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Country</th>
                                        <th>Sales Person</th>
                                        <th>Sales Order</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO1037</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO10234</a></td>
                                        <td><span class="badge badge-danger">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO1254</a></td>
                                        <td><span class="badge badge-info">Processing</span></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO764</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO5642</a></td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Senagal</td>
                                        <td>Sales</td>
                                        <td><a href="./quatation_view.php">SO4522</a></td>
                                        <td><span class="badge badge-success">Shipped</span></td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Quatation  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">

                            <table id="example2" class="table table-bordered table-hover">
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
        <div class="col-lg-8 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Sales Team Members Monthly Performance</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
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
                                
                                    $query = "SELECT * FROM employees INNER JOIN users ON employees.emp_id = users.epf
                                    WHERE users.department = '5' ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $xd){
                                        $sales_person_full_name = $xd['full_name'];
                                   
                                ?>
                                <tr>
                                    <td>
                                        <?php echo "<a href=\"sales_member_monthly_performance.php?full_name={$xd['full_name']}&username={$xd['username']}\">$sales_person_full_name</a>" ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card mt-3">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Sales Team Members Daily Achivement</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
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
                                
                                    $query = "SELECT * FROM employees INNER JOIN users ON employees.emp_id = users.epf
                                    WHERE users.department = '5' ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $xd){
                                        $sales_person_full_name = $xd['full_name'];
                                   
                                ?>
                                <tr>
                                    <td>
                                        <?php echo "<a href=\"sales_member_monthly_performance.php?full_name={$xd['full_name']}&username={$xd['username']}\">$sales_person_full_name</a>" ?>
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