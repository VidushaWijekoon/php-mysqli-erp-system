<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./accounts_dashboard.php">
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
                            Approved Quatations
                        </div>
                    </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                              
                                $query = "SELECT * FROM sales_customer_information 
                                    INNER JOIN sales_quatation_items ON sales_customer_information.customer_id = sales_quatation_items.customer_id
                                    WHERE sales_quatation_items.status = 1 AND sales_quatation_items.approval = 1
                                    GROUP BY quatation_id ORDER BY quatation_id DESC";                                           
                                                
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
                                            
                                            echo "<a href='../sales/quatation_view.php?quatation_id={$row['quatation_id']}&customer_id={$row['customer_id']}'>
                                                        QA-$quatation_id</a>";
                                            
                                            ?>
                                </td>
                                <td>
                                    <?php if(($item_status == 1) && ($approved == 1)) {?>
                                    <span class="badge badge-lg badge-success text-white p-1 px-3">Accepted</span>
                                    <span class="badge badge-lg badge-info text-white p-1 px-3">Approved By
                                        <?php echo $approved_by; ?>
                                    </span>
                                    <?php } ?>
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

<?php include_once('../includes/footer.php'); ?>