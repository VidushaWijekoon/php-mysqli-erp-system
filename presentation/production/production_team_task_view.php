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

if($role_id == 1 && $department == 11 || $role_id == 6 && $department == 1 || $role_id ==  4 && $department == 1){
    
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_team_leader_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto justify-content-center">
            <div class="card mt-5">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Production Technician Daily Task</p>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>S/O</th>
                                <th>Employee ID</th>
                                <th>First Name</th>
                                <th>Target Points</th>
                                <th>Assign QTY</th>
                                <th>Completed</th>
                                <th>Archived Points</th>
                                <th>Remaining</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                        
                                                        
                                $production_team_list = '';


                                $query = "SELECT
                                            employees.emp_id,
                                            employees.first_name,
                                            prod_technician_assign_info.sales_order_id,
                                            prod_technician_assign_info.tech_assign_qty,
                                            tech_id,
                                            brand,
                                            generation
                                        FROM
                                            employees
                                            LEFT JOIN prod_technician_assign_info ON prod_technician_assign_info.emp_id = employees.emp_id
                                        WHERE
                                            employees.department = 1;";
                                $query_run = mysqli_query($connection, $query);

                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                    $sales_order_id;
                                    $emp_id;
                                    $first_name;
                                    $assign_qty;
                                    $completed_qty ;
                                    $issue_type;
                                    $target;
                                    $tech_id;
                                    foreach ($query_run as $production_team) {
                                        $tech_id= $production_team['tech_id'];
                                        $query ="SELECT COUNT(status) AS completed_qty FROM `prod_info` WHERE tech_id ='{$production_team['tech_id']}' AND status=0;";
                                        $query_completed = mysqli_query($connection,$query);

                                        $query_issue ="SELECT issue_type FROM `prod_info` WHERE tech_id ='{$production_team['tech_id']}' AND status=0;";
                                        $query_issue_type = mysqli_query($connection,$query_issue);

                                        $sales_order_id = $production_team['sales_order_id'];
                                        $emp_id = $production_team['emp_id'];
                                        $first_name = $production_team['first_name'];
                                        $assign_qty = $production_team['tech_assign_qty'];
                                        $point=0;
                                        $target=600;
                                        $remaining;
                                        foreach($query_completed as $a){
                                            $completed_qty = $a['completed_qty'];
                                        }
                                        foreach($query_issue_type as $b){

                                            $issue_type = $b['issue_type'];
                                            
                                            $brand = $production_team['brand'];
                                            $generation = $production_team['generation'];
                                            
                                            if($brand == 'hp' || $brand == 'dell'){
                                            if($generation== 1 || $generation== 2||$generation==3 ||$generation== 4 || $generation== 5){
                                                if($issue_type == 1){
                                                    $m_point = 10;
                                                    $point +=$m_point;
                                                }
                                                if($issue_type == 2){
                                                    $c_point = 15;
                                                    $point +=$c_point;
                                                }
                                                if($issue_type == 3){
                                                    $l_point = 17.17;
                                                    $point +=$l_point;
                                                }
                                                if($issue_type == 4){
                                                    $b_point = 17.14;
                                                    $point +=$b_point;
                                                }
                                            }
                                            if($generation== 6 || $generation== 7||$generation==8 ||$generation== 9 || $generation== 10){
                                                if($issue_type == 1){
                                                    $m_point = 7.5;
                                                    $point +=$m_point;
                                                }
                                                if($issue_type == 2){
                                                    $c_point = 10;
                                                    $point +=$c_point;
                                                }
                                                if($issue_type == 3){
                                                    $l_point = 15;
                                                    $point +=$l_point;
                                                }
                                                if($issue_type == 4){
                                                    $b_point = 15;
                                                    $point +=$b_point;
                                                }
                                            }
                                        } 
                                        if($brand =='lenovo'){
                                            if($generation== 1 || $generation== 2||$generation==3 ||$generation== 4 || $generation== 5){
                                                if($issue_type == 1){
                                                    $m_point = 12;
                                                    $point +=$m_point;
                                                }
                                                if($issue_type == 2){
                                                    $c_point = 15;
                                                    $point +=$c_point;
                                                }
                                                if($issue_type == 3){
                                                    $l_point = 20;
                                                    $point +=$l_point;
                                                }
                                                if($issue_type == 4){
                                                    $b_point = 20;
                                                    $point +=$b_point;
                                                }
                                            }
                                            if($generation== 6 || $generation== 7||$generation==8 ||$generation== 9 || $generation== 10){
                                                if($issue_type == 1){
                                                    $m_point = 9.23;
                                                    $point +=$m_point;
                                                }
                                                if($issue_type == 2){
                                                    $c_point = 10.9;
                                                    $point +=$c_point;
                                                }
                                                if($issue_type == 3){
                                                    $l_point = 15;
                                                    $point +=$l_point;
                                                }
                                                if($issue_type == 4){
                                                    $b_point = 15;
                                                    $point +=$b_point;
                                                }
                                            }
                                        }
                                        
                                             

                                      
                                        }
                                        if($sales_order_id == null ){
                                            $sales_order_id ="Task Not Assigned ";
                                        }
                                        $remaining = $assign_qty-$completed_qty;

                                        if($assign_qty == null || $completed_qty == 0){
                                            $assign_qty = "-";
                                            $completed_qty = "-";
                                            $point ="-";
                                            $target ="-";
                                            $remaining ="-";
                                        }
                                        
                                        

                                ?>


                            <tr>
                                <td>#</td>
                                <td><?php echo $sales_order_id ?></td>
                                <td><?php echo $emp_id?></td>
                                <td><?php echo $first_name?></td>
                                <td><?php echo $target?></td>
                                <td><?php echo $assign_qty?></td>
                                <td><?php echo $completed_qty;?></td>
                                <td><?php echo $point  ?></td>
                                <td><?php echo $remaining ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-sm bg-teal' href=\"production_report.php?emp_id={$production_team['emp_id']}&name={$first_name}&tech_id={$tech_id}\"><i class='fas fa-eye'></i> </a> ";?>
                                </td>
                            </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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