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
$username = $_SESSION['username'];
 
if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1)){

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

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            <?php echo $username; ?>
                        </div>
                    </div>
                </div>
                <div class="row mx-2">
                    <div class="col col-lg-12 mb-3">
                        <fieldset>
                            <legend>Production Team Members Daily View</legend>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/O ID</th>
                                        <th>Core</th>
                                        <th>Genaration</th>
                                        <th>Model</th>
                                        <th>Assigned QTY</th>
                                        <th>Completed QTY</th>
                                        <th style="width: 250px;">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark text-uppercase">
                                    <?php 
                                        
                                        $query = "SELECT *, COUNT(prod_info.p_id) AS completed_qty FROM prod_info
                                                INNER JOIN warehouse_information_sheet ON prod_info.sales_order = warehouse_information_sheet.sales_order_id
                                                INNER JOIN prod_technician_assign_info ON prod_info.sales_order = prod_technician_assign_info.sales_order_id
                                                WHERE prod_info.emp_id = 1041
                                                GROUP BY
                                                    prod_info.sales_order,
                                                    prod_technician_assign_info.model,
                                                    prod_technician_assign_info.generation,
                                                    prod_technician_assign_info.brand,
                                                    prod_technician_assign_info.core";
                                        $query_run = mysqli_query($connection, $query);

                                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                                    foreach($query_run as $x) {

                                                     $count =   "SELECT *, COUNT(prod_info.inventory_id) as Completed FROM prod_info WHERE status ='0'";
                                                     $sd = mysqli_query($connection, $count);
                                                     foreach($sd as $d){
                                            ?>

                                    <tr>
                                        <td><?= $x['sales_order_id']; ?></td>
                                        <td><?= $x['core']; ?></td>
                                        <td><?= $x['generation']; ?></td>
                                        <td><?= $x['model']; ?></td>
                                        <td><?= $x['tech_assign_qty']; ?></td>
                                        <td><?= $d['Completed']; ?></td>
                                        <td>
                                            <?php

                                            $percentage = round(($d['Completed']  / $x['tech_assign_qty']) * 100);

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

                                    </tr>
                                    <?php } } }?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card">
                <div class="row mx-2">
                    <div class="col col-lg-12 mb-3 mt-2">
                        <fieldset>
                            <legend>Production Team Members Daily View</legend>

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
                                                        if ($values['m_board_issue'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Motherboard Issue</span>';
                                                        }if ($values['combine_issue'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Combine Issue</span>';
                                                        }if ($values['lcd_issue'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">LCD Issue</span>';
                                                        }if ($values['bodywork_issue'] ==1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2">Bodywork Issue</span>';
                                                        }if ($values['production_spec'] ==1) {
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