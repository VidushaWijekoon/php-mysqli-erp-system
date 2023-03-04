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

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Company Name</th>
                                    <th>Country</th>
                                    <th>Whatsapp</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                    $query = "SELECT * FROM sales_customer_information WHERE created_by = '$username' ORDER BY customer_id DESC ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach($query_run as $qr){
                                 
                                ?>
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <a href="<?php echo "customer_view.php?customer_id={$qr['customer_id']}"; ?>">
                                            <?php echo $qr['first_name'] . " " . $qr['last_name']; ?></a>
                                    </td>
                                    <td><?php echo $qr['company_name'] ?></td>
                                    <td><?php echo $qr['country'] ?></td>
                                    <td><?php echo $qr['whatsapp_number'] ?></td>
                                    <td>
                                        <?php 
                                            echo "<a class='btn btn-xs btn-secondary mx-1' href=\"customer_view.php?customer_id={$qr['customer_id']}\"><i class='fa-solid fa-eye'></i> </a>";
                                            echo "<a class='btn btn-xs btn-danger mx-1' href=\"edit_customers.php?customer_id={$qr['customer_id']}\"><i class='fa-solid fa-pen-to-square'></i> </a>";
                                        ?>
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