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

if(($role_id == 1 && $department == 11) || ($role_id == 10 && $department == 2) ||  ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18)){
 
?>

<?php if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18)) { ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } if ($role_id == 10 && $department == 2) { ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_member_sales_order.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto justify-content-center mt-5">
        <div class="card ">
            <div class="card-header bg-secondary">

                <h5 class="text-uppercase m-0 p-0">Inventory Member Completed Task</h5>
            </div>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sales Order</th>
                            <th>EPF</th>
                            <th>First Name</th>
                            <th>Target</th>
                            <th>Assign Date</th>
                            <th>Completed date</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">

                        <?php         
                                $production_team_list = '';
                                $remaining;
                                $archive;
                                $target;
                                $prepared;
                                $query = "SELECT * ,
                                                employees.emp_id AS emp_id,first_name,
                                                warehouse_assign_task.sales_order AS so_id,
                                                warehouse_assign_task.task_created_date AS task_assign_date, 
                                                warehouse_assign_task.task_completed_date  AS task_completed_date 
                                            FROM employees
                                            LEFT JOIN warehouse_assign_task ON employees.emp_id = warehouse_assign_task.emp_id
                                            WHERE department = 2 AND status = 1 
                                            ORDER BY `so_id`  DESC;";
                                $query_run = mysqli_query($connection, $query);

                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $production_team) {
                                ?>
                        <tr class="text-uppercase">
                            <td><?php echo $production_team['so_id']?></td>
                            <td><?php echo $production_team['emp_id']?></td>
                            <td><?php echo $production_team['first_name']?></td>
                            <td><?php 
                                $remaining =0;
                                $archive =0;
                                $target =0;
                                $prepared =0;
                                $query2 = "SELECT
                                                        SUM(item_quantity) AS No_of_Records
                                                    FROM
                                                        sales_order_add_items
                                                    WHERE sales_order_id ={$production_team['so_id']};" ;
                                                    $query_run1 = mysqli_query($connection, $query2);
                                                    if(empty($query_run1)){

                                                    }else{
                                                     foreach ($query_run1 as $data) {
                                                        if($data['No_of_Records'] != null){
                                                            $target =$data['No_of_Records'];
                                                            echo $target ;
                                                        }
                                                    
                                                    }
                                                    }
                                                    ?></td>
                            <td><?php echo $production_team['task_assign_date']?></td>
                            <td><?php echo $production_team['task_completed_date']?></td>
                            <td>
                                <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"warehouse_completed_inventory_id.php?sales_order_id={$production_team['sales_order']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>