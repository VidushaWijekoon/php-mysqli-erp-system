<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
if($role_id == 1 || $role_id == 4){

$sales_order_id = $_GET['sales_order_id'];
 
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="./motherboard_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Sales Order <?php echo $sales_order_id; ?></p>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>Received QTY</th>
                                <th>Assign QTY</th>
                                <th style="width: 250px;">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = "SELECT *, COUNT(motherboard_dep.motherboard_id) AS count
                                    FROM motherboard_dep 
                                    LEFT JOIN warehouse_information_sheet ON warehouse_information_sheet.inventory_id = motherboard_dep.inventory_id 
                                    WHERE warehouse_information_sheet.sales_order_id = $sales_order_id 
                                    GROUP BY warehouse_information_sheet.model";
                                   
                                $result = mysqli_query($connection, $query);

                                if(mysqli_num_rows($result) > 0){
                                    foreach($result as $d){ 
                                        $recived_qty = $d['count'] ;
                                        $d_model = $d['model'];
                                        $d_brand = $d['brand'];
                                        $d_core = $d['core'];
                                        $d_generation = $d['generation'];                                         
                                        
                                        $assing_qty = "SELECT *,COUNT(motherboard_assign_task_id) as total FROM motherboard_assign WHERE sales_order_id = $sales_order_id";
                                        $query_d = mysqli_query($connection, $assing_qty);
                                        foreach($query_d as $m){
                                            $assing_total = $m['total'];                                           
 
                                    }
                                                           
                            ?>
                            <tr class="text-uppercase">
                                <td><?php echo $d['brand'] ?></td>
                                <td><?php echo $d['model'] ?></td>
                                <td><?php echo $d['core'] ?></td>
                                <td><?php echo $d['generation'] ?></td>
                                <td><?php echo $recived_qty; ?></td>
                                <td><?php echo $assing_total; ?></td>
                                <td>
                                    <?php

                                            $percentage = round((50  / 10) * 100);

                                            if($percentage == 100)
                                            {
                                                $progress_bar_class = 'bg-success progress-bar-striped';
                                            }
                                            else if($percentage >= 50 && $percentage < 99)
                                            {
                                                $progress_bar_class = 'bg-info progress-bar-striped';
                                            }
                                            else if($percentage >= 11 && $percentage < 49)
                                            {
                                                $progress_bar_class = 'bg-warning progress-bar-striped';
                                            }
                                            else if($percentage >= 0 && $percentage < 10)
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                            else
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                                                                
                                            echo  
                                            '<div class="progress text-bold">
                                                <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">
                                                    '.$percentage.' % 
                                                </div>
                                            </div>'
                                            ?>
                                </td>
                                <td>
                                    <?php 
                                    echo "<a class='btn btn-xs bg-gradient-primary mx-2' href=\"motherboard_assign_page.php?sales_order_id={$d['sales_order_id']}&model={$d['model']}&core={$d['core']}&generation={$d['generation']}&brand={$d['brand']}&device={$d['device']}&processor={$d['processor']}&count={$d['count']}\" class='text-white text-capitalize'><i class='fa-solid fa-sun mx-1'></i></a>" ?>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>

            </div>

            <!-- /.col -->
            <div class="col-md-6 justify-content-center mx-auto text-center mt-5">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Assign</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sales Order</th>
                                    <th>EMP ID</th>
                                    <th>Model</th>
                                    <th>Assign Time</th>
                                    <th>QTY</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase">
                                <?php
                                    
                                    $query = "SELECT * FROM motherboard_assign 
                                    WHERE motherboard_assign.sales_order_id = {$sales_order_id} 
                                    GROUP BY motherboard_assign.assign_time  ";
                                    $query_run = mysqli_query($connection, $query);

                                    if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                        $i = 0;
                                        foreach($query_run as $value) {
                                            $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?> </td>
                                    <td><?php echo $value['sales_order_id']; ?></td>
                                    <td><?php echo $value['emp_id']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['assign_time']; ?></td>
                                    <td><span class="badge bg-primary px-3"><?php echo $value['qty']; ?></span>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>



<?php include_once('../includes/footer.php'); } ?>