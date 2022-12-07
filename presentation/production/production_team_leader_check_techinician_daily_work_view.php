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


    $emp_id = $_GET['emp_id'];
    $emp_name = $_GET['emp_name'];
    
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d H:i:s');

    $dt = new DateTime;
    $dt->setTime(0, 0);
    $dt->format('Y-m-d H:i:s');
    $dt->add(new DateInterval('PT4H'));
    $start_time= $dt->format('H:i:s');
    $current_time= $date;
                                                 
    $query ="SELECT * FROM prod_info WHERE end_date_time AND emp_id = $emp_id BETWEEN '$start_time' AND '$current_time'";
    $query_e6 = mysqli_query($connection, $query);
    $motherboard =0;
    $combind =0;
    $lcd =0;
    $bodywork =0;
    $qc =0;
                                               
    foreach($query_e6 as $data){
        $motherboard = $data['m_board_issue'];
        $combine = $data['combine_issue'];
        $lcd = $data['lcd_issue'];
        $bodywork = $data['bodywork_issue'];
        $qc = $data['production_spec'];
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
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            <?php  echo $emp_id . " " . $emp_name;   ?>


                            Daily Work
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="date" name="from_date"
                                        value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="date" name="to_date"
                                        value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-xs btn-primary px-3"
                                        style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Select
                                        Date</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group d-flex">
                                    <span class="mx-2" style="margin-top: 5px;">Search</span>
                                    <input type="search" name="search"
                                        value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"
                                        class="form-control" placeholder="Search data">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SO</th>
                                    <th>Inventory ID</th>
                                    <th>Motherboard</th>
                                    <th>Combine</th>
                                    <th>LCD</th>
                                    <th>Bodywork</th>
                                    <th>Sanding</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $sanding_count = 0;
                                    $motherboard_count = 0;
                                    $combine_count = 0;
                                    $lcd_count = 0;
                                    $bodywork_count = 0;
                                    
                                    if (isset($_POST['search'])) {
                                        $filtervalues = $_POST['search'];                                     
                                                                
                                        $query = "SELECT * FROM prod_info WHERE emp_id = {$emp_id} AND CONCAT(inventory_id) LIKE '%$filtervalues%' ";
                                                            
                                        $query_read = mysqli_query($connection, $query);
                                            foreach($query_read as $row){                               
                                        
                                ?>
                                <tr>
                                    <td><?php echo $row['sales_order'] ?></td>
                                    <td><?php echo $row['inventory_id'] ?></td>
                                    <td><?php echo $row['m_board_issue'] ?></td>
                                    <td><?php echo $row['combine_issue'] ?></td>
                                    <td><?php echo $row['lcd_issue'] ?></td>
                                    <td><?php echo $row['bodywork_issue'] ?></td>
                                    <td><?php echo $row['production_spec'] ?></td>

                                </tr>
                                <?php } } else {     
                                                                 
                                        $query = "SELECT *, SUM(m_board_issue) AS motherboard_issue,
                                                    SUM(combine_issue) AS combine_issue,
                                                    SUM(lcd_issue) AS lcd_issue,
                                                    SUM(bodywork_issue) AS bodywork_issue,
                                                    SUM(production_spec) AS production_spec
                                                FROM prod_info WHERE emp_id = {$emp_id} ";
                                                            
                                        $query_read = mysqli_query($connection, $query);
                                        foreach($query_read as $row){  
                                ?>

                                <tr>
                                    <td><?php echo $row['sales_order'] ?></td>
                                    <td><?php echo $row['inventory_id'] ?></td>
                                    <td><?php echo $row['m_board_issue'] ?></td>
                                    <td><?php echo $row['combine_issue'] ?></td>
                                    <td><?php echo $row['lcd_issue'] ?></td>
                                    <td><?php echo $row['bodywork_issue'] ?></td>
                                    <td><?php echo $row['production_spec'] ?></td>

                                </tr>
                                <?php } } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total</td>
                                    <td><?php echo $motherboard_count ?></td>
                                    <td><?php echo $combine_count ?></td>
                                    <td><?php echo $lcd_count ?></td>
                                    <td><?php echo $bodywork_count ?></td>
                                    <td><?php echo $sanding_count ?></td>
                                </tr>
                            </tfoot>

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
        die(access_denied());
} ?>