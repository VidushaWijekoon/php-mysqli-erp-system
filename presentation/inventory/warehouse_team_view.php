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
                    <h5 class="text-uppercase m-0 p-0">Inventory Member Monitory</h5>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>EPF</th>
                                <th>First Name</th>
                                <th>Target</th>
                                <th>Prepared</th>
                                <th>Archived</th>
                                <th>Remaining</th>
                                <!-- <th>&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                        
                                                        
                                $production_team_list = '';
                                $remaining;
                                $archive;
                                $target;
                                $prepared;


                                $query = "SELECT employees.emp_id AS emp_id,first_name, warehouse_assign_task.sales_order AS so_id
                                            FROM employees
                                            LEFT JOIN warehouse_assign_task ON employees.emp_id = warehouse_assign_task.emp_id
                                            WHERE department =2";
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
                                $query2 = "SELECT SUM(item_quantity) AS No_of_Records FROM sales_order_add_items
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
                                            ?>
                                </td>
                                <td>
                                    <?php   
                                $query7 ="SELECT COUNT(sales_order_id) AS completed_count 
                                        FROM `warehouse_information_sheet` 
                                        WHERE sales_order_id ={$production_team['so_id']};";  
                                        $query6_get = mysqli_query($connection, $query7);
                                        if(empty($query6_get)){

                                        }else{
                                        foreach($query6_get as $data){
                                            $prepared = $data['completed_count'];
                                            echo  $prepared;
                                        } 
                                    }
                             ?>
                                </td>
                                <td><?php if($target !=0){
                                    // $archive = $prepared*100/$target;
                                    // echo $archive;
                                    $percentage = round(($prepared  /$target) * 100);

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
                                    </div>';

                                    } ?></td>
                                <td><?php $remaining = $target - $prepared;
                                echo $remaining;
                                ?></td>
                                <!-- <td>
                                    <?php 
                                    // echo "<a class='btn btn-sm bg-teal' href=\"production_report.php?emp_id={$production_team['emp_id']}\"><i class='fas fa-eye'></i> </a> 
                                    //  <a class='btn btn-sm bg-warning'
                                    //     href=\"warehouse_team_sales_order.php?emp_id={$production_team['emp_id']}\"><i
                                    //         class='fa-solid fa-bullseye'></i></a>";
                                    ?>
                                </td> -->
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>