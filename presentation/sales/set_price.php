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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card">
                <div class="card-header mt-1">
                    <h6>Set Price for the Laptop</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Device</th>
                                <th>Brand</th>
                                <th>Total QTY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            
                            $query = "SELECT inventory_id, device, brand, COUNT(inventory_id) AS Total_inventory  FROM warehouse_information_sheet WHERE send_to_production = 0 AND dispatch = '0' GROUP BY device, brand";
                            $query_run = mysqli_query($connection, $query);
                            foreach($query_run as $row){
                                $device = $row['device'];
                                $brand = $row['brand'];
                                $total_nventory = $row['Total_inventory'];
                            
                            ?>
                            <tr>
                                <td>#</td>
                                <td><?php echo $device ?></td>
                                <td><?php echo $brand ?></td>
                                <td><?php echo $total_nventory ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"set_all_models.php?device={$row['device']}&brand={$row['brand']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
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