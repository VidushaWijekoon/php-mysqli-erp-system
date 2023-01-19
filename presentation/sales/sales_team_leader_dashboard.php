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
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_team_members.php"><i
                class="fa fa-plus"></i><span class="mx-1">Set Week Target</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./quatation_approval.php"><i
                class="fa fa-plus"></i><span class="mx-1">To Approve</span></a>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pending Quatations</span>
                <span class="info-box-number">
                    10
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Accepted Quatations</span>
                <span class="info-box-number">41</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3 mt-2">
        <a href="./quatations.php">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Waiting for Approve</span>
                    <span class="info-box-number">12</span>
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
                    <span class="info-box-number">5</span>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6>Sales Orders</h6>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Country</th>
                            <th>Sales Person</th>
                            <th>Sales Order</th>
                            <th>Status</th>
                            <th>&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO1037</a></td>
                            <td><span class="badge badge-success">Shipped</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO10234</a></td>
                            <td><span class="badge badge-danger">Delivered</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO1254</a></td>
                            <td><span class="badge badge-info">Processing</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO764</a></td>
                            <td><span class="badge badge-success">Shipped</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO5642</a></td>
                            <td><span class="badge badge-warning">Pending</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Senagal</td>
                            <td>Sales</td>
                            <td><a href="./quatation_view.php">SO4522</a></td>
                            <td><span class="badge badge-success">Shipped</span></td>
                            <td>
                                <a class='btn btn-xs btn-secondary mx-1' href="">
                                    <i class='fa-solid fa-eye'></i> </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h6>Quatations</h6>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Country</th>
                            <th>Sales Person</th>
                            <th>Quatation ID</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                              
                            $query = "SELECT * FROM sales_customer_information 
                                INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
                                GROUP BY quatation_id LIMIT 6";                                           
                                                
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
                            <td><a href="./quatation_view.php"><?php echo $quatation_id; ?></a></td>
                            <td>
                                <span class="badge badge-lg badge-info text-white p-1 px-3">Approved</span>
                            </td>
                            <td>
                                <?php 
                                    echo " <a class='btn btn-xs btn-secondary mx-1' href='./quatation_view.php?quatation_id={$row['quatation_id']}'>
                                                <i class='fa-solid fa-eye'></i> </a> " 
                                ?>
                            </td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
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
                                <tr>
                                    <td><a href="./sales_monthly_performance_chart.php">Riskan</a></td>
                                    <td>201</td>
                                    <td>4602</td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td><a href="./sales_monthly_performance_chart.php">Abdulla</a></td>
                                    <td>119</td>
                                    <td>4170</td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td><a href="./sales_monthly_performance_chart.php">Harshan</a></td>
                                    <td>112</td>
                                    <td>5450</td>
                                    <td>5</td>
                                </tr>
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
                                <tr>
                                    <td>Riskan</td>
                                    <td>2</td>
                                    <td>462</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Abdulla</td>
                                    <td>1</td>
                                    <td>417</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Harshan</td>
                                    <td>1</td>
                                    <td>545</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>Harshan</td>
                                    <td>1</td>
                                    <td>545</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once("../includes/footer.php") ?>