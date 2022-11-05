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

$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');

        $dt = new DateTime;
        $dt->setTime(0, 0);
        $dt->format('Y-m-d H:i:s');
        $dt->add(new DateInterval('PT4H'));
        $start_time= $dt->format('H:i:s');
        $current_time= $date;
                                                 
        $query ="SELECT issue_type FROM prod_info WHERE end_date_time BETWEEN '$start_time' AND '$current_time'";
        $query_e6 = mysqli_query($connection, $query);
        $motherboard =0;
        $combind =0;
        $lcd =0;
        $bodywork =0;
        $qc =0;
                                               
         foreach($query_e6 as $data){
            if(empty($data)){
                
            }else{
            if($data['issue_type'] ==1){
                $motherboard++;
            }
             if($data['issue_type'] ==2){
                $combind++;
            }
            if($data['issue_type'] ==3){
                $lcd++;
            }
            if($data['issue_type'] ==4){
                $bodywork++;
            }
            if($data['issue_type'] ==5){
                $qc++;
            }
        }
    }                                      


?>



<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <a href="./production_team_leader_dashboard.php">
            <i class="fas fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<!-- Light Box -->
<div class="row m-2 mx-auto justify-content-center">
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-info elevation-1"><i class="fa-solid fa-keyboard"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Send to Motherboard</span>
                <span class="info-box-number"><?php echo $motherboard ?> </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-secondary elevation-1">
                <i class="fa-solid fa-object-group"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Combine</span>
                <span class="info-box-number"><?php echo $combind ?> </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-tv"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Send to LCD</span>
                <span class="info-box-number"> <?php echo $lcd ?> </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-laptop"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Send to Bodywork</span>
                <span class="info-box-number"> <?php echo $bodywork ?> </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-stethoscope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sanding</span>
                <span class="info-box-number"> <?php echo $qc ?> </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>
<!-- /.row -->

<div class="container-fluid mt-3">
    <div class="row">
        <!-- ============================================================== -->
        <!-- fixed header  -->
        <!-- ============================================================== -->
        <div
            class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div id="reportrange">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                            <span></span> <b class="caret"></b>
                        </div>
                    </div>
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
                                    if(isset($_GET['Today'])){
                                        echo isset($_GET['Today']);
                                    }
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