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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){
 
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Warehouse Sales Orders</p>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order Date</th>
                                <td>Delivery Date</td>
                                <th>Order QTY</th>
                                <th>Complete QTY</th>
                                <th style="width: 250px;">Complete</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 
                             
                                $query = "SELECT *, SUM(item_quantity) AS No_of_Records 
                                        FROM sales_order_add_items 
                                        INNER JOIN employees
                                        GROUP BY sales_order_add_items.sales_order_id";

                                $query_run = mysqli_query($connection, $query);

                                if (mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $values) {                              
                                ?>

                            <tr>
                                <td><?php echo $values['sales_order_id'] ?></td>
                                <td><?php echo $values['sales_order_created_date'] ?></td>
                                <td><?php echo $values['item_delivery_date'] ?></td>
                                <td><?php echo $values['No_of_Records'] ?></td>
                                <td></td>


                                <td>
                                    <?php

                                            $percentage = round(($values['item_quantity']  / $values['No_of_Records']) * 100);

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
                                    echo "<a class='btn btn-xs bg-teal' href=\"warehouse_team_sales_order_view.php?sales_order_id={$values['sales_order_id']}&emp_id={$values['emp_id']}\"><i
                                        class='fas fa-eye'></i> </a>";
                                ?>
                                </td>

                                <?php }} ?>

                            </tr>


                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
</script>

<style>
.table.dataTable tbody tr {
    background-color: #212529;
}

#example1_length {
    color: #ced4da;
}

.dataTables_wrapper .dataTables_filter {
    color: #ced4da;
}

.paginate_button {
    border-radius: 12px;
    font-size: 12px;
}

[type='search'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
}

.tbody_1 {
    font-family: 'Bree Serif', serif;

}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>