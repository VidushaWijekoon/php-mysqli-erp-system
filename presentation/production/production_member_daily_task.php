<?php 
ob_start();
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

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1)){

$emp_id = $_SESSION['epf'];
$inventory_id = '';
$tech_id = $_GET['tech_id'];
$sales_order_id = $_GET['sales_order_id'];
$assign_qty;
$scaned_qty;
$model ;
$brand ;
$core ;
$generation ;
$processor ;
$device ;
$exists_inventory_id= 0;
$mb_issue_status;

$query1 = "SELECT * FROM prod_technician_assign_info WHERE tech_id ='{$tech_id}' ";
$query_tech = mysqli_query($connection, $query1);
foreach($query_tech as $data){
    $model = $data['model'];
    $brand = $data['brand'];
    $core = $data['core'];
    $generation = $data['generation'];
    $processor = $data['processor'];
    $device = $data['device_type'];
    $tech_id = $data['tech_id'];
}
 
    if (isset($_POST['search'])) {
        $inventory_id = $_POST['search'];
        
        // $query_assign_count = "SELECT tech_assign_qty AS assign_qty FROM `prod_technician_assign_info` WHERE prod_technician_assign_info.tech_id = '$tech_id'";
        $query_assign_count = "SELECT tech_assign_qty AS assign_qty FROM `prod_technician_assign_info`";
        $query_scanned_count = "SELECT COUNT(prod_info.tech_id) AS completed_count FROM `prod_info` WHERE prod_info.tech_id = '$tech_id'";
        $query_scanned_inventory_count = "SELECT COUNT(prod_info.inventory_id) AS inventory_id_count FROM `prod_info` WHERE prod_info.inventory_id = '$inventory_id'";
        $query_exists = "SELECT prod_info.inventory_id AS inventory_id FROM `prod_info` WHERE prod_info.inventory_id = '$inventory_id'";

        $mb_issue = "SELECT m_board_issue FROM prod_info WHERE inventory_id = '$inventory_id'";
        $q = mysqli_query($connection, $mb_issue);
        foreach($q as $q){
            $mb_issue_status = $q['m_board_issue'];
        }
 
        $query_assign_count_run = mysqli_query($connection, $query_assign_count);
        $query_scanned_count_run = mysqli_query($connection, $query_scanned_count);
        $query_scanned_inventory_count = mysqli_query($connection, $query_scanned_inventory_count);
        $query_run = mysqli_query($connection, $query_exists);
        foreach($query_assign_count_run as $data){
            $assign_qty = $data['assign_qty'];
        }

        foreach($query_scanned_count_run as $data){
        $scaned_qty = $data['completed_count'];
           
        }

        foreach($query_scanned_inventory_count as $data){
            $inventory_id_count = $data['inventory_id_count'];
           
        }

        foreach($query_run as $data){
            $exists_inventory_id = $data['inventory_id'];           
        }
        
        $query = "SELECT * FROM warehouse_information_sheet WHERE 
                        inventory_id='{$_POST['search']}' AND 
                        sales_order_id = '{$sales_order_id}' AND
                        model='{$model}' AND
                        core='{$core}' AND
                        generation='{$generation}' AND
                        processor='{$processor}' AND
                        brand='{$brand}' AND
                        device='{$device}'";

        $query_run = mysqli_query($connection, $query);
    
        $validation =null;
        $query_1 ="SELECT inventory_id as inventory  FROM `production` WHERE inventory_id = $inventory_id AND sales_order_id = $sales_order_id;";
       
        $query_resubmit = mysqli_query($connection, $query_1);
        foreach($query_resubmit as $a){
            $validation = $a['inventory'];
        }
        
        if(empty($query_resubmit)){
            echo "its not assign for you";
        }else{
            if(empty($query_run)){
            }else{
            if(($assign_qty*2 )>= $scaned_qty){
                foreach($query_run as $data1){
                        if($exists_inventory_id == 0){
                        $query_insert = "INSERT INTO prod_info(inventory_id, start_date_time, end_date_time,sales_order, emp_id, tech_id,status, combine_issue, m_board_issue, lcd_issue, bodywork_issue, production_spec) 
                                        VALUES ('{$inventory_id}', CURRENT_TIMESTAMP, 0,'{$sales_order_id}','{$emp_id}','{$tech_id}','1', 0, 0, 0, 0, 0)";
                        $query_prod_info = mysqli_query($connection, $query_insert);

                           header("Location: production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id} ");
                        }else{
                               header("Location: production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id} ");
                        }
                    }
                }else{
                    echo " cannot scan over qty";
                }
            }
        }
    }
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_technician_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <form action="" method="POST">
                    <div class="row mx-2">
                        <div class="col-md-3 align-items-center mx-auto">

                            <fieldset class="mt-2">
                                <legend>QR Scan</legend>

                                <div class="input-group mb-2 mt-2">
                                    <input type="text" name="search" id="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-9">
                            <fieldset class="mt-2">
                                <div class="col">
                                    <div class="card mt-2">
                                        <div class="card-body p-0">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Sales Order</th>
                                                        <th>Brand</th>
                                                        <th>Model</th>
                                                        <th>Core</th>
                                                        <th>Generation</th>
                                                        <th>RAM</th>
                                                        <th>HDD</th>
                                                        <th>Order QTY</th>
                                                        <th style="width: 40px">Assign QTY</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-dark text-uppercase">
                                                    <tr>
                                                        <?php
                                    
                                                            $query = "SELECT * FROM prod_technician_assign_info 
                                                            LEFT JOIN sales_order_add_items ON sales_order_add_items.sales_order_id = prod_technician_assign_info.sales_order_id WHERE emp_id = $emp_id
                                                            GROUP BY model, processor, core, generation";
                                                            $query_run = mysqli_query($connection, $query);

                                                            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                                                $i = 0;
                                                                foreach($query_run as $value) {
                                                                    $i++;
                                                        ?>
                                                        <td><?php echo $value['sales_order_id']; ?></td>
                                                        <td><?php echo $value['brand']; ?></td>
                                                        <td><?php echo $value['model']; ?></td>
                                                        <td><?php echo $value['core']; ?></td>
                                                        <td><?php echo $value['generation']; ?></td>
                                                        <td><?php echo $value['item_ram']."GB"; ?></td>
                                                        <td><?php echo $value['item_hdd']; ?></td>
                                                        <td><?php echo $value['tech_assign_qty']; ?></td>

                                                        <td><span class="badge bg-primary px-3"><?php echo $value['tech_assign_qty']; 
                                                                ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="col col-lg-12 mb-3">
                    <fieldset>
                        <legend>My Task</legend>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Inventory ID</th>
                                    <th>S/O ID</th>
                                    <th>Brand</th>
                                    <th>Core</th>
                                    <th>Gen</th>
                                    <th>Model</th>
                                    <th>Starting Time</th>
                                    <th>End Time</th>
                                    <th>Timing</th>
                                    <th>&nbsp;</th>

                                </tr>
                            </thead>
                            <tbody class="table-dark text-uppercase">
                                <?php 
 
                                        $query = "SELECT *, brand,core,model,generation,processor,device FROM prod_info
                                                LEFT JOIN warehouse_information_sheet ON prod_info.inventory_id = warehouse_information_sheet.inventory_id
                                                WHERE prod_info.emp_id ='{$emp_id}' AND prod_info.tech_id ='{$tech_id}' ORDER BY start_date_time DESC";
                                        $query_run = mysqli_query($connection, $query);
  
                                            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                                foreach($query_run as $values) {
                                                    $inventory_id = $values['inventory_id'];
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
                                        <span><?php echo $values['end_date_time'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if( $values['end_date_time'] == '0000-00-00 00:00:00') {?>
                                        <span class="badge badge-lg badge-danger text-white">0 Minutes</span>
                                        <?php } elseif( $values['start_date_time'] != '0000-00-00 00:00:00') {?>
                                        <span class="badge badge-lg badge-success text-white">
                                            <?php $working_time_in_seconds = strtotime($values['end_date_time']) - strtotime($values['start_date_time']);
                                                       echo date('i:s', $working_time_in_seconds ); 
                                                    ?>
                                        </span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php  
                                            if($values['status'] == 1){ 
                                                if ($values['combine_issue'] == 1) {
                                                            
                                                        $query_1 ="SELECT  `status` FROM `requested_part_from_production` WHERE inventory_id = $inventory_id";
                                                        $query_run = mysqli_query($connection, $query_1);

                                                        $query_2 ="SELECT  `status` FROM `combine_check` WHERE inventory_id = $inventory_id";
                                                        $query_run_2 = mysqli_query($connection, $query_2);
                                                        $combine_status;

                                                            foreach($query_run_2 as $c){
                                                                $combine_status = $c['status'];
                                                            }

                                                            $received = NULL;
                                                    
                                                            if(empty($query_run)){
                                                                $received ='1';
                                                            }else{
                                                                foreach($query_run as $a){
                                                                    $received = $a['status'];
                                                                }
                                                            }
                                                        if($combine_status == 0){
                                                            echo "<span class='badge badge-lg badge-success text-white px-2 mx-1'>Combine OK</span>";
                                                            }elseif($received == 0){
                                                                echo "<a class='btn btn-sm '
                                                                href=\"production_checklist.php?emp_id={$emp_id}&inventory_id={$values['inventory_id']}&sales_order_id={$values['sales_order_id']}\">
                                                                <span class='badge badge-lg badge-warning text-white px-2'>Combine Issue</span>
                                                            </a>";
                                                            }
                                                        }
                                                        // }else{
                                                        //     echo '<span class="badge badge-lg badge-info text-white px-2 p-1 mx-1">Waiting for parts</span>';
                                                        //     }
                                                        // }

                                                        if ($values['lcd_issue'] == 1) {
                                                            echo '<span class="badge badge-lg badge-danger text-white px-2 mx-1">LCD Issue</span>';
                                                        }  
                                                        if ($values['combine_issue'] == 1) {
                                                            echo '<span class="badge badge-lg badge-info text-white px-2 mx-1">Combine Issue</span>';
                                                        }                                                        
                                                        if ($values['bodywork_issue'] == 1) {
                                                            echo '<span class="badge badge-lg badge-warning text-white px-2 mx-1">Bodywork Issue</span>';
                                                        } 
                                                        if ($values['battery_issue'] == 1) {
                                                            echo '<span class="badge badge-lg badge-primary text-white px-2 mx-1">Battery Issue</span>';
                                                        } 
                                                        if ($values['m_board_issue'] == 1) {
                                                            echo '<span class="badge badge-lg badge-secondary text-white px-2 mx-1">Motherboard Issue</span>';
                                                        }
                                                    }
                                                     
                                        ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';

window.history.forward();

function noBack() {
    window.history.forward();
}
</script>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>