<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id ==  4 && $department == 1){

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <a href="./production_team_leader_dashboard.php">
            <i class="fas fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">
        <!-- ============================================================== -->
        <!-- fixed header  -->
        <!-- ============================================================== -->
        <div
            class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Technician Daily Work</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>First Name</th>
                                    <th>Assign QTY</th>
                                    <th>Assign S/O's</th>
                                    <th>Completed QTY</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                        $query = "SELECT
                                                    employees.emp_id,
                                                    employees.department,
                                                    employees.first_name,
                                                    SUM(prod_technician_assign_info.tech_assign_qty) AS Total_Assign,
                                                    COUNT(prod_technician_assign_info.sales_order_id) AS Total_SO
                                                FROM employees
                                                INNER JOIN prod_technician_assign_info ON prod_technician_assign_info.emp_id = employees.emp_id
                                                WHERE employees.department = 1
                                                GROUP BY employees.emp_id";         
                                                                             
                                            $query_run = mysqli_query($connection, $query);

                                            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                            foreach ($query_run as $values) {                       
                                ?>
                                <tr>
                                    <td><?php echo $values['emp_id']?></td>
                                    <td><?php echo $values['first_name']?></td>
                                    <td><?php echo $values['Total_Assign'] ?></td>
                                    <td><?php echo $values['Total_SO'] ?></td>
                                    <td>
                                        <?php 
                                    
                                            $query1 = "SELECT
                                                        employees.emp_id,
                                                        employees.department,
                                                        employees.first_name,
                                                        prod_info.emp_id,
                                                        prod_info.inventory_id,                                                        
                                                        COUNT(prod_info.inventory_id) AS Total_Completed FROM employees
                                                        INNER JOIN prod_info ON employees.emp_id = prod_info.emp_id WHERE employees.department = 1 "; 
                                                           
                                            $query_run1 = mysqli_query($connection, $query1);
                                                foreach ($query_run1 as $values1) {                                                    
                                                    echo $values1['Total_Completed'];
                                                }
                                        ?>
                                    </td>
                                    <td style="width: 250px;">
                                        <?php

                                            $percentage = round( ($values1['Total_Completed'] /  $values['Total_Assign']) * 100);

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
                                        <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"production_team_leader_check_techinician_daily_work_view.php?emp_id={$values['emp_id']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end fixed header  -->
        <!-- ============================================================== -->
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die("<h3 class='text-danger'><<<<<< Access Denied >>>>></h3>");
}  ?>