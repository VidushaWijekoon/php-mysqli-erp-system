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

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1)){

?>

<div class="row m-2">
    <div class="col-12 mt-3 d-flex">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="producton_technician_daily_work.php"><i
                class="fa-solid fa-users"></i><span class="mx-1">Completed Work</span></a>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card mt-5">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">My Task</p>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SO ID</th>
                                <th>Assigned Date</th>
                                <th>Assigned QTY</th>
                                <th>Complete QTY</th>
                                <th style="width:250px">Progress</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 
                            $query_prod_tech ="SELECT *,SUM(tech_assign_qty) AS Tech_Assign_QTY FROM `prod_technician_assign_info` WHERE emp_id ='{$emp_id}'";                           
                            $query_6 = mysqli_query($connection, $query_prod_tech);
                           
                            $i =0;
                            $completed_qty =0;
                            $tech_id;
                            foreach($query_6 as $values){ 
                                $i++;
                                $tech_id = $values['tech_id'];
                                $query = "SELECT COUNT(tech_id) AS tech_id_count FROM prod_info WHERE tech_id = '$tech_id' AND status ='0' ";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach($query_run as $a){
                                            $completed_qty = $a['tech_id_count'];
                                        }                    
                                ?>

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $values['sales_order_id'] ?></td>
                                <td><?php echo $values['created_time'] ?></td>
                                <td><?php echo $values['Tech_Assign_QTY'] ?></td>
                                <td><?php echo  $completed_qty; ?></td>
                                <td>
                                    <?php
                                    $percentage=0;
                                    if($completed_qty ==0){}else{
                                            $percentage = round(( $completed_qty  / $values['tech_assign_qty']) * 100);
                                    }
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
                                    echo "<a class='btn btn-xs bg-teal' href=\"production_member_daily_task.php?sales_order_id={$values['sales_order_id']}&tech_id={$values['tech_id']}\"><i
                                        class='fas fa-eye'></i> </a>";
                                ?>
                                </td>

                                <?php } ?>

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