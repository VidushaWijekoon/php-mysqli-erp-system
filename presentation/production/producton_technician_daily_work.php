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
$epf_id = $_SESSION['epf'];

if($role_id = 1 && $department == 11 || $role_id = 6 && $department == 1) {
    
?>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card">
                <div class="row mx-2">
                    <div class="col col-lg-12 mb-3">
                        <fieldset>
                            <legend>Production Team Members Daily View</legend>

                            <table id="example1" class="table table-bordered table-striped">
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
                                    </tr>
                                </thead>
                                <tbody class="table-dark text-uppercase">
                                    <?php 
                                        $sales_order_id = '';

                                        // getting the list of users
                                        $query = "SELECT *, brand, core, model, generation, processor, device FROM prod_info
                                                LEFT JOIN warehouse_information_sheet ON prod_info.inventory_id = warehouse_information_sheet.inventory_id
                                                WHERE prod_info.emp_id ='{$emp_id}' ";
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
                                            <?php if($values['status'] == 1){}else{ 
                                                        if ($values['issue_type'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Motherboard Issue</span>';
                                                        }if ($values['issue_type'] ==2) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Combine Issue</span>';
                                                        }if ($values['issue_type'] ==3) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">LCD Issue</span>';
                                                        }if ($values['issue_type'] ==4) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Bodywork Issue</span>';
                                                        }if ($values['issue_type'] ==5) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Ready to QC</span>';
                                                        } 
                                                        }?>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>