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

if($role_id == 1 && $department == 11 || $role_id ==  4 && $department == 1 || $role_id == 2 && $department == 18){

    $motherboard = null;
    $combine = null;
    $lcd = null;
    $bodywork = null;
    $qc = null;

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-people-group" aria-hidden="true"></i> Production Team Leader
        </h3>
    </div>

</div>


<div class="row m-2">
    <div class="col-12 mt-3 d-flex">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./production_team_task_view.php"><i
                class="fa-solid fa-users"></i><span class="mx-1">Team Achievement</span></a>
        <a class="btn bg-gradient-secondary mx-2 text-white" type="button" href="./production_sales_order.php"><i
                class="fa-solid fa-users"></i><span class="mx-1">Sales Orders</span></a>
        <a class="btn bg-gradient-primary mx-2 text-white" type="button"
            href="./production_team_leader_check_techinician_daily_work.php"><i class="fa-solid fa-cogs"></i><span
                class="mx-1">Team Part List</span></a>
        <a class="btn bg-gradient-cyan mx-2 text-white" type="button"
            href="../part/part_warehouse_leader_dashboard.php"><i class="fa-solid fa-users"></i><span class="mx-1">Part
                Request Form</span></a>
    </div>
</div>

<?php $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $dt = new DateTime;
        $dt->setTime(0, 0);
        $dt->format('Y-m-d H:i:s');
        $dt->add(new DateInterval('PT4H'));
        $start_time= $dt->format('H:i:s');
        $current_time= $date;
        $query ="SELECT * FROM prod_info WHERE end_date_time BETWEEN '$start_time' AND '$current_time'";
        $query_e6 = mysqli_query($connection, $query);
        foreach($query_e6 as $data){
            $motherboard = $data['m_board_issue'];
            $combine = $data['combine_issue'];
            $lcd = $data['lcd_issue'];
            $bodywork = $data['bodywork_issue'];
            $qc = $data['production_spec'];
        }
                                            
?>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-gradient-info elevation-1"><i class="fa-solid fa-keyboard"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Send to Motherboard</span>
                <span class="info-box-number">
                    <?php 
                        if($motherboard == null){
                            echo "0";
                        }else{
                        echo $motherboard; 
                        } 
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-secondary elevation-1">
                <i class="fa-solid fa-object-group"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Combine</span>
                <span class="info-box-number">
                    <span class="info-box-number">
                        <?php 
                            if($combine == null){
                                echo "0";
                            }else{
                                echo $combine; 
                            } 
                        ?>
                    </span>
                </span>
            </div>
        </div>
    </div>

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-tv"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Send to LCD</span>
                <span class="info-box-number">
                    <?php 
                        if($lcd == null){
                            echo "0";
                        }else{
                        echo $lcd; 
                        } 
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-laptop"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Send to Bodywork</span>
                <span class="info-box-number">
                    <?php 
                        if($bodywork == null){
                            echo "0";
                        }else{
                        echo $bodywork; 
                        } 
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-stethoscope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Final QC</span>
                <span class="info-box-number">
                    <?php 
                        if($qc == null){
                            echo "0";
                        }else{
                        echo $motherboard; 
                        } 
                    ?>
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-2 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Team Members</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT * FROM employees WHERE department = 1";
                            if ($result = mysqli_query($connection, $query)) {

                                $rowcount = mysqli_num_rows($result);
                                echo $rowcount;
                            }
                        ?>
                </span>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
        <div class="card mt-3">
            <div class="card-header bg-secondary">
                <p class="text-uppercase m-0 p-0">Production Sales Orders</p>
            </div>

            <div class="card-body">
                <div class="mb-2 mt-2" style="text-align: end;">
                    Assign Page --> <a class='btn btn-xs bg-teal mx-2'><i class='fas fa-eye'></i></a>
                    Scan Page --> <a class='btn btn-xs bg-primary'><i class='fa-solid fa-qrcode'></i> </a>
                </div>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S/O</th>
                            <th>SO Created Date</th>
                            <th>Delivery Date</th>
                            <th>Order QTY</th>
                            <th>Prepared QTY from Warehouse</th>
                            <th>Received QTY</th>
                            <th>Tested QTY form production</th>
                            <th style="width: 250px;">S/O Completed</th>
                            <th>Task</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_1">

                        <?php 
 
                                 $query = "SELECT
                                                sales_order_information.sales_order_id,
                                                sales_order_add_items.sales_order_created_date AS created_date,
                                                sales_order_add_items.item_delivery_date,
                                                COUNT(warehouse_information_sheet.send_to_production) AS prepared
                                            FROM sales_order_information
                                            LEFT JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id
                                            LEFT JOIN warehouse_information_sheet ON sales_order_add_items.sales_order_id = warehouse_information_sheet.sales_order_id
                                            GROUP BY sales_order_information.sales_order_id ";
                                $query_run = mysqli_query($connection, $query);
                                $received_unit = 0;
                                $tested_unit = 0;
                                $i = 0;
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $items) {

                                    $sql = "SELECT SUM(item_quantity) AS No_of_Records FROM sales_order_add_items WHERE sales_order_id ={$items['sales_order_id']} ";
                                    $row = mysqli_fetch_assoc($connection->query($sql) );
                                    $sum = $row['No_of_Records'];
                                    
                                    $query_1 ="SELECT COUNT(tech_id) AS tech_id FROM `prod_info` WHERE sales_order ={$items['sales_order_id']} AND status = 0 ";
                                    $query_run_new = mysqli_query($connection, $query_1);
                                    foreach($query_run_new as $a){
                                            $tested_unit = $a['tech_id'];
                                    }

                                    //retrive production team leader scanned item
                                    $query_2 = "SELECT COUNT(production_id) AS production_id FROM `production` WHERE sales_order_id={$items['sales_order_id']};";
                                    $query_result2 = mysqli_query($connection,$query_2);
                                        foreach($query_result2 as $a){
                                            $received_unit = $a['production_id'];
                                    }
                             ?>

                        <?php 
                            $i++;
                            if($i == 1){ ?>
                        <tr class='bg-warning'>
                            <?php } else {?>
                        <tr>
                            <?php }?>
                            <td>
                                <?php echo "<a href=\"production_sales_order_view.php?sales_order_id={$items['sales_order_id']}\"> {$items['sales_order_id']}</a>" ?>
                            </td>
                            <td><?php echo $items['created_date'] ?></td>
                            <td><?php echo $items['item_delivery_date'] ?></td>
                            <td><?php echo $sum ?></td>
                            <td><?php echo $items['prepared'] ?></td>
                            <td><?php echo $received_unit ?></td>
                            <td><?php echo $tested_unit ?></td>
                            <td>
                                <?php
                                if( $tested_unit==0){
                                    $sum =1;
                                }

                                            $percentage = round(( $tested_unit / $sum) * 100);

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
                            <td class="d-flex">
                                <?php echo "<a class='btn btn-xs bg-teal mx-2'
                                        href=\"production_team_leader_summery.php?sales_order_id={$items['sales_order_id']}\"><i
                                       class='fas fa-eye'></i> </a>";
                                       echo "<a class='btn btn-xs bg-primary'
                                        href=\"production_received_qty.php?sales_order_id={$items['sales_order_id']}&qty={$row['No_of_Records']}\"><i
                                       class='fa-solid fa-qrcode'></i> </a>";
                                ?>
                            </td>
                        </tr>

                        <?php 
                                    }
                                }
                            
                            ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>