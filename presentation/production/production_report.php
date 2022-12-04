<?php 
ob_start();
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
                     
$emp_id = '';

if(isset($_GET['emp_id'])){
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);

    $query = "SELECT * FROM employees WHERE emp_id = '$emp_id' ";
    $query_run = mysqli_query($connection, $query);
    
}
                                 
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
                    <p class="text-uppercase m-0 p-0">Production Technician Daily Task
                        (<?php echo $emp_id ."-" .$_GET['name'] ;?>)</p>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Inventory ID</th>
                                <th>S/O ID</th>
                                <th>Brand</th>
                                <th>Core</th>
                                <th>Genaration</th>
                                <th>Model</th>
                                <th>Starting Time</th>
                                <th>End Time</th>
                                <th>Minutes to Complete</th>
                                <th>&nbsp;</th>

                            </tr>
                        </thead>
                        <tbody class="table-dark text-uppercase">
                            <?php 
                                        $sales_order_id = '';

                                        // getting the list of users
                                        $query = "SELECT
                                        *,
                                        brand,core,model,generation,processor,device
                                    FROM
                                        prod_info
                                    LEFT JOIN warehouse_information_sheet ON prod_info.inventory_id = warehouse_information_sheet.inventory_id
                                    WHERE
                                          prod_info.emp_id ='{$emp_id}' AND prod_info.tech_id ='{$_GET['tech_id']}' ; ";
                                        $query_run = mysqli_query($connection, $query);

                                            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                                foreach($query_run as $values) {
                                        ?>

                            <tr>
                                <td><?php echo $values['inventory_id'] ?></td>
                                <td><?php echo $values['sales_order'] ?></td>
                                <td><?php echo $values['brand'] ?></td>
                                <td><?php echo $values['core'] ?></td>
                                <td><?php echo $values['generation'] ?></td>
                                <td><?php echo $values['model'] ?></td>
                                <td><?php echo $values['start_date_time'] ?></td>
                                <td>
                                    <?php if( $values['end_date_time'] == '0000-00-00 00:00:00') {?>
                                    <span class="badge badge-lg badge-danger text-white">Not Finished</span>
                                    <?php } else { ?>
                                    <span><?php echo $values['start_date_time'] ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if( $values['end_date_time'] == '0000-00-00 00:00:00') {?>
                                    <span class="badge badge-lg badge-danger text-white">0 Minutes</span>
                                    <?php } elseif( $values['start_date_time'] != '0000-00-00 00:00:00') {?>
                                    <span class="badge badge-lg badge-success text-white">
                                        <?php $working_time_in_seconds = strtotime($values['end_date_time']) - strtotime($values['start_date_time']);
                                                       echo date('H:i:s', $working_time_in_seconds ); 
                                                    ?>
                                    </span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($values['status'] == 1){ 
                                        }else{ 
                                            if ($values['m_board_issue'] ==1) {
                                                echo '<span class="badge badge-lg badge-danger text-white px-2">Motherboard Issue</span>';
                                            }if ($values['combine_issue'] ==1) {
                                                echo '<span class="badge badge-lg badge-danger text-white px-2">Combine Issue</span>';
                                            }if ($values['lcd_issue'] ==1) {
                                                echo '<span class="badge badge-lg badge-danger text-white px-2">LCD Issue</span>';
                                            }if ($values['bodywork_issue'] ==1) {
                                                echo '<span class="badge badge-lg badge-danger text-white px-2">Bodywork Issue</span>';
                                            }if ($values['production_spec'] ==0) {
                                                echo '<span class="badge badge-lg badge-danger text-white px-2">Production Completed</span>';
                                            } 
                                    }?>
                                </td>
                            </tr>
                            <?php }} ?>
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