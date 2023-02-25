<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<style>
    table tr {
        padding: 20px;
        text-align: center;
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="performance_record.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Completed LCD List From Inventory</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Inventory Id</th>
                            <th>Model</th>
                            <th>Core</th>
                            <th>Generation</th>
                            <th>Received Date</th>
                            <th>Status</th>
                            <th>Completed Date</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                    warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND status='2'";
                            $query_run = mysqli_query($connection, $sql);

                            foreach ($query_run as $data) {
                                if ($data['status'] == 1) {
                                    $status = "Not Started";
                                } elseif ($data['status'] == 2) {
                                    $status = "Completed";
                                }
                            ?>
                                <tr>
                                    <td><?php echo $data['alsakb_qr'] ?></td>
                                    <td><?php echo $data['model'] ?></td>
                                    <td><?php echo $data['core'] ?></td>
                                    <td><?php echo $data['generation'] ?></td>
                                    <td><?php echo $data['created_date'] ?></td>
                                    <td><?php echo  $status ?></td>
                                    <td><?php echo $data['received_date'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>