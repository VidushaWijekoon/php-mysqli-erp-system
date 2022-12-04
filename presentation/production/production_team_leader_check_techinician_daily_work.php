<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1)){


$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d H:i:s');
$dt = new DateTime;
$dt->setTime(0, 0);
$dt->format('Y-m-d H:i:s');
$dt->add(new DateInterval('PT4H'));
$start_time= $dt->format('H:i:s');
$current_time= $date;
$query ="SELECT * FROM prod_info WHERE end_date_time BETWEEN '$start_time' AND '$current_time'";
$query_e6 = mysqli_query($connection, $query);

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <a href="./production_team_leader_dashboard.php">
            <i class="fas fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- ============================================================== -->
        <!-- fixed header  -->
        <!-- ============================================================== -->
        <div
            class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Daily Work
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="from_date"
                                        value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="to_date"
                                        value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-xs btn-primary px-3"
                                        style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Select
                                        Date</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php

                    $bydate_motherboard = 0;
                    $bydate_combine = 0;
                    $bydate_lcd = 0;
                    $bydate_bodywork = 0;
                    $bydate_sanding = 0;

                    if(isset($_POST['from_date']) && isset($_POST['to_date'])){

                        $from_date = $_POST['from_date'];
                        $to_date = $_POST['to_date'];
                                                    
                        $query = "SELECT *, SUM(prod_technician_assign_info.tech_assign_qty) AS Total_Assign,
                                COUNT(prod_technician_assign_info.sales_order_id) AS Total_SO
                            FROM employees
                            LEFT JOIN prod_technician_assign_info ON prod_technician_assign_info.emp_id = employees.emp_id
                            LEFT JOIN prod_info ON prod_info.emp_id = employees.emp_id
                            WHERE prod_info.start_date_time BETWEEN '$from_date' AND '$to_date'
                            GROUP BY employees.emp_id";         
                                                                                            
                            $query_run = mysqli_query($connection, $query);

                            if (mysqli_num_rows($query_run)) {
                                foreach ($query_run as $values) {  
                                    $bydate_motherboard = $data['m_board_issue'];
                                    $bydate_combine = $data['combine_issue'];
                                    $bydate_lcd = $data['lcd_issue'];
                                    $bydate_bodywork = $data['bodywork_issue'];
                                    $bydate_sanding = $data['production_spec'];
                                                                                                                        
                ?>

                <div class="card-body">

                    <!-- Light Box -->
                    <div class="row m-2 mx-auto justify-content-center">
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-info elevation-1"><i
                                        class="fa-solid fa-keyboard"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Motherboard</span>
                                    <span class="info-box-number"><?php echo $bydate_motherboard ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-secondary elevation-1">
                                    <i class="fa-solid fa-object-group"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Combine</span>
                                    <span class="info-box-number"><?php echo $bydate_combine ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-danger elevation-1"><i
                                        class="fas fa-tv"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">LCD</span>
                                    <span class="info-box-number"><?php echo $bydate_lcd ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-dark elevation-1"><i
                                        class="fas fa-laptop"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Bodywork</span>
                                    <span class="info-box-number"><?php echo $bydate_bodywork ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-success elevation-1"><i
                                        class="fas fa-stethoscope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sanding</span>
                                    <span class="info-box-number"><?php echo $bydate_sanding ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
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
                                        <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"production_team_leader_check_techinician_daily_work_view.php?emp_name={$values['first_name']}&emp_id={$values['emp_id']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <?php } } }else{  

                       $motherboard = 0;
                       $combine = 0;
                       $lcd = 0;
                       $bodywork = 0;
                       $sanding = 0;

                        $query = "SELECT *, SUM(prod_technician_assign_info.tech_assign_qty) AS Total_Assign,
                                COUNT(prod_technician_assign_info.sales_order_id) AS Total_SO
                            FROM employees
                            LEFT JOIN prod_technician_assign_info ON prod_technician_assign_info.emp_id = employees.emp_id
                            LEFT JOIN prod_info ON prod_info.emp_id = employees.emp_id
                            WHERE prod_technician_assign_info.emp_id";
                                                                                            
                            $query_run = mysqli_query($connection, $query);

                            if (mysqli_num_rows($query_run)) {
                                foreach ($query_run as $values) {
                                    $bydate_motherboard = $values['m_board_issue'];
                                    $bydate_combine = $values['combine_issue'];
                                    $bydate_lcd = $values['lcd_issue'];
                                    $bydate_bodywork = $values['bodywork_issue'];
                                    $bydate_sanding = $values['production_spec'];                                  
                                                                                    
                ?>

                <div class="card-body">

                    <!-- Light Box -->
                    <div class="row m-2 mx-auto justify-content-center">
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box">
                                <span class="info-box-icon bg-gradient-info elevation-1"><i
                                        class="fa-solid fa-keyboard"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Motherboard</span>
                                    <span class="info-box-number"><?php echo $bydate_motherboard ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-secondary elevation-1">
                                    <i class="fa-solid fa-object-group"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Combine</span>
                                    <span class="info-box-number"><?php echo $bydate_combine ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-danger elevation-1"><i
                                        class="fas fa-tv"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">LCD</span>
                                    <span class="info-box-number"><?php echo $bydate_lcd ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-dark elevation-1"><i
                                        class="fas fa-laptop"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Bodywork</span>
                                    <span class="info-box-number"><?php echo $bydate_bodywork ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 ">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-gradient-success elevation-1"><i
                                        class="fas fa-stethoscope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sanding</span>
                                    <span class="info-box-number"><?php echo $bydate_sanding ?></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
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
                                        <?php echo "<a class='btn btn-xs btn-primary mx-1' href=\"production_team_leader_check_techinician_daily_work_view.php?emp_name={$values['first_name']}&emp_id={$values['emp_id']}\"><i class='fa-solid fa-eye'></i> </a>" ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php } }  } ?>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end fixed header  -->
        <!-- ============================================================== -->
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>