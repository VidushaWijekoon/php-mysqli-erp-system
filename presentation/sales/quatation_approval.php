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

$approved = 0;

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
                            Quotation For Approval
                        </div>
                    </div>
                    <form action="" method="GET">
                        <div class="input-group">
                            <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                            <input type="search" name="search"
                                value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                                placeholder="Search data">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Country</th>
                                <th>Sales Person</th>
                                <th>Quatation ID</th>
                                <th>Staus</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = "SELECT * FROM sales_customer_information INNER JOIN sales_quatation_items 
                                        ON sales_customer_information.customer_id = sales_quatation_items.customer_id
                                        WHERE sales_quatation_items.status = 1 AND sales_quatation_items.approval = 0
                                        GROUP BY quatation_id ";

                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $row){
                                        $customer_first_name = $row['first_name'];
                                        $customer_last_name = $row['last_name'];
                                        $customer_country = $row['country'];
                                        $created_by = $row['created_by'];
                                        $quatation_id = $row['quatation_id'];
                                        $item_status = $row['status'];
                                        $approved = $row['approval'];

                            ?>
                            <tr>
                                <td><?php echo $customer_first_name . " " . $customer_last_name; ?></td>
                                <td><?php echo $customer_country; ?></td>
                                <td><?php echo $created_by; ?></td>
                                <td>
                                    <?php 
                                            
                                        echo "<a href='./quatation_view.php?quatation_id={$row['quatation_id']}&customer_id={$row['customer_id']}'>
                                                $quatation_id</a>"
                                            
                                    ?>
                                </td>
                                <td>
                                    <?php if($approved == 0) { ?>
                                    <span class="badge badge-lg badge-danger text-white p-1 px-3">Waiting for Approval
                                        <?php } if($approved == 1) {?>
                                        <span class="badge badge-lg badge-success text-white p-1 px-3">Approved By
                                            <?php echo $username; ?>
                                            <?php } ?>
                                </td>
                                <td class='text-center'>
                                    <?php 
                                        if($approved == '0'){
                                            echo "<a  class='badge badge-sm badge-primary mx-1 p-1 px-2' href=\"quatation_approval_update.php?quatation_id={$row['quatation_id']}\" onclick=\"return confirm('Make sure you want to $quatation_id want approve this quatation');\">Click to Approve</a>";                                   
                                        }
                                        if($approved == '1'){
                                            echo "<a  class='badge badge-sm badge-success p-1 px-2'>Approved</a>";
                                        } ?>
                                </td>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); ?>