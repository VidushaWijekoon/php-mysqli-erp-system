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

    $emp_id = $_GET['emp_id'];

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
                <div class="card-header bg-secondary">
                    <h5 class="mb-0">Technician Daily Work</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SO</th>
                                    <th>Inventory ID</th>
                                    <th>Sanding</th>
                                    <th>Motherboard</th>
                                    <th>Combine</th>
                                    <th>LCD</th>
                                    <th>Bodywork</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "SELECT
                                    *
                                FROM
                                    prod_info
                                
                                WHERE
                                    emp_id = {$emp_id} ";
                                $query_read = mysqli_query($connection, $query);

                                if(mysqli_fetch_assoc($query_read)){
                                    foreach($query_read as $row){                               
                                        
                                ?>
                                <tr>
                                    <td><?php echo $row['sales_order'] ?></td>
                                    <td><?php echo $row['inventory_id'] ?></td>
                                    <td><?php if($row['issue_type' ] ==1){echo "1"; }?></td>
                                    <td><?php if($row['issue_type'] == 2){echo "1"; }?></td>
                                    <td><?php if($row['issue_type' ]== 3){echo "1"; }?></td>
                                    <td><?php if($row['issue_type']== 4){echo "1"; }?></td>
                                    <td><?php if($row['issue_type']== 5){echo "1"; }?></td>

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