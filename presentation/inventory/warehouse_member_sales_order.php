<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
$emp_id =  $_SESSION['epf'];
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$username = $_SESSION['username'];

if($role_id == 1 && $department == 11 || $role_id == 10 && $department == 2 ||  $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i> Warehouse Member
            <?php echo $username; ?> </h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="warehouse_completed_task.php"><i
                class="fa-solid fa-check"></i><span class="mx-1">Completed Task</span></a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Warehouse Sales Orders</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <th>Delivery Date</th>
                                <th>Order QTY</th>
                                <th>Complete QTY</th>
                                <th style="width: 250px;">Complete</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 
                            $query_1 = "SELECT sales_order FROM warehouse_assign_task WHERE status ='0' AND emp_id ='{$emp_id}'";
                            $query_get = mysqli_query($connection, $query_1);
                            $i =0;
                            
                            foreach($query_get as $test){
                               // need to rewrite with join query
                                
                                $query1 = "SELECT *, SUM(item_quantity) AS No_of_Records 
                                FROM sales_order_add_items 
                                 WHERE sales_order_id ='{$test['sales_order']}';";
                                 $query_2 = mysqli_query($connection, $query1);

                                 if (mysqli_fetch_assoc($query_2)) {
                                 foreach($query_2 as $values){
                                    $i++;                      
                                ?>

                            <?php if($i == 1){ ?>
                            <tr class='bg-warning'>
                                <?php } else {?>
                            <tr>
                                <?php }?>

                                <td><?php echo $values['sales_order_id'] ?></td>
                                <td><?php echo $values['sales_order_created_date'] ?></td>
                                <td><?php echo $values['item_delivery_date'] ?></td>
                                <td><?php echo $values['No_of_Records'] ?></td>
                                <td><?php 
                                $query6 ="SELECT COUNT(sales_order_id) AS completed_count 
                                FROM `warehouse_information_sheet` 
                                WHERE sales_order_id ={$values['sales_order_id']};";  
                                $query6_get = mysqli_query($connection, $query6);
                                foreach($query6_get as $data){
                                    echo $data['completed_count'];
                                }
                                
                                ?>
                                </td>
                                <td>
                                    <?php

                                            $percentage = round(($data['completed_count']  / $values['No_of_Records']) * 100);

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
                                    echo "<a class='btn btn-xs bg-teal' href=\"warehouse_to_production.php?sales_order_id={$values['sales_order_id']}\">
                                    <i class='fas fa-eye'></i> </a>";
                                ?>
                                </td>

                                <?php }}} ?>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>