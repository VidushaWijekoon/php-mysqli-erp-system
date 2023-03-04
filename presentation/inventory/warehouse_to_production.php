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

if($role_id == 1 && $department == 11 || $role_id == 2 && $department == 18 || $role_id == 10 && $department == 2 || $role_id == 4 && $department == 2 ){ 

$sales_order_id = NULL;
$inventory_id = '';
$order_qty = NULL;
$prepared_qty;
$total_qty = NULL;
$sales_orderID = NULL;

if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);

    if (isset($_POST['search'])) {
        $filtervalues = $_POST['search'];
        $query = "SELECT *, COUNT(*) AS Results FROM warehouse_information_sheet 
            INNER JOIN sales_order_add_items
            ON warehouse_information_sheet.model = sales_order_add_items.item_model
            AND warehouse_information_sheet.brand = sales_order_add_items.item_brand                     
            AND warehouse_information_sheet.core = sales_order_add_items.item_core                     
            AND warehouse_information_sheet.device = sales_order_add_items.item_type                     
            AND warehouse_information_sheet.processor = sales_order_add_items.item_processor                     
            AND warehouse_information_sheet.generation = sales_order_add_items.item_generation                     
            WHERE send_to_production = 0 ";

        $query_run = mysqli_query($connection, $query);
        $result_count;
            if ($rowcount = mysqli_fetch_assoc($query_run)) {
                foreach($query_run as $values) {
                    $result = mysqli_num_rows($query_run);                   

                    $sales_order_id = '';
                    $inventory_id = mysqli_real_escape_string($connection, $_POST['search']);
                    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
                    // get sales order information
                    $query_get = "select * from sales_order_add_items where sales_order_id={$sales_order_id}";
                    $result1 = mysqli_query($connection, $query_get);
                    // get warehouse info    
                    $query_get2 = "select * from warehouse_information_sheet where inventory_id = {$inventory_id}";
                    $result2 = mysqli_query($connection, $query_get2);

                    $query4 = "SELECT *, COUNT(*) AS received_count, item_quantity FROM warehouse_information_sheet    
                    INNER JOIN sales_order_add_items 
                    ON  warehouse_information_sheet.model = sales_order_add_items.item_model                   
                    AND warehouse_information_sheet.brand = sales_order_add_items.item_brand                     
                    AND warehouse_information_sheet.core = sales_order_add_items.item_core                     
                    AND warehouse_information_sheet.device = sales_order_add_items.item_type                     
                    AND warehouse_information_sheet.processor = sales_order_add_items.item_processor
                    AND warehouse_information_sheet.send_to_production = 0
                    GROUP BY warehouse_information_sheet.model, 
                            warehouse_information_sheet.generation, 
                            warehouse_information_sheet.core, 
                            warehouse_information_sheet.brand 
                    ORDER BY received_count DESC";  
                   
                                                           
                        
                    $query_run4 = mysqli_query($connection, $query4);
                       
                    $type = null;
                    $brand = NULL;
                    $model = NULL;
                    $core = NULL;
                    $processor = NULL; 
                    $generation = NULL; 
                    $sales_order = NULL;
                    $item_brand = NULL;
                    $item_model = NULL;
                    $item_type = NULL;
                    $item_core = NULL;
                    $item_processor = NULL; 
                    $item_generation = NULL; 
                    $item_quantity = NULL;
                    while($rowsearch = $result2->fetch_assoc()){
                        $type = $rowsearch['device'];
                        $brand = $rowsearch['brand'];
                         $model = $rowsearch['model'];
                        $core = $rowsearch['core'];
                        $processor = $rowsearch['processor'];
                        $generation = $rowsearch['generation'];
                        $sales_orderID = $rowsearch['sales_order_id'];
                    }
                       
                    if (mysqli_fetch_assoc($query_run4)) {
                            
                        foreach ($query_run4 as $items) {
                            $received_count = $items['received_count'];
                            $item_quantity = $items['item_quantity'];
                            $item_type = $items['item_type'];
                            $item_brand = $items['item_brand'];
                            $item_model = $items['item_model'];
                            $item_core = $items['item_core'];
                            $item_processor = $items['item_processor'];
                            $item_generation = $items['item_generation'];
                            // if( $item_quantity > $received_count){
                                        
                                if($sales_orderID == 0){
                                    $query_check ="SELECT COUNT(send_to_production) as prepared FROM `warehouse_information_sheet` WHERE `sales_order_id` = {$sales_order_id} AND send_to_production = 1 
                                    AND model= '{$model}' AND processor='{$processor}' AND device ='{$type}' AND core='{$core}' AND generation='{$generation}' AND brand='{$brand}' ";
                                    
                                    $query_item_check ="SELECT item_quantity FROM `sales_order_add_items` WHERE `sales_order_id` = {$sales_order_id}
                                    AND item_model= '{$model}' AND item_processor='{$processor}' AND item_type ='{$type}' AND item_core='{$core}' AND item_generation='{$generation}' AND item_brand='{$brand}' ";
 
                                    $query_check_1 = mysqli_query($connection,$query_check);
                                    $query_check_item = mysqli_query($connection,$query_item_check);
                                        
                                    foreach($query_check_1 as $data){
                                        $prepared_qty = $data['prepared'];
                                    }
                                    foreach($query_check_item as $b){
                                        $order_qty = $b['item_quantity'];
                                    }
                                       
                                    if($order_qty > $prepared_qty){
                                    $query = "UPDATE warehouse_information_sheet SET send_to_production = 1, send_time_to_production = CURRENT_TIMESTAMP, sales_order_id={$sales_order_id} WHERE inventory_id = {$inventory_id} LIMIT 1";
                                    $result = mysqli_query($connection, $query);
                                    }
                                }
                           
                            if($type == null){
                                echo "<span class='exists badge badge-lg badge-info text-white p-2 mx-2'>Not in exists inventory ID </span>";
                                break;
                            }
                            if($type!= $item_type || $brand != $item_brand || $model != $item_model || $processor!=$item_processor || $core != $item_core || $generation!= $item_generation){
                                // echo '<script>alert("You can not scan this qr under this sales order")</script>';
                                break;
                            }
                        }
                    }
                    if($sales_orderID != 0){
                        echo "<span class='exists badge badge-lg badge-info text-white p-2 mx-2'>existing </span>";
                        break;
                    }

                    // // // Already Scanned
                    // $already_scanned = "SELECT * FROM warehouse_information_sheet WHERE sales_order_id = {$sales_order_id} AND inventory_id = $inventory_id LIMIT 1";
                    // $g1 = mysqli_query($connection, $already_scanned);

                    // foreach($g1 as $g2){
                    //     $existed = $g2['sales_order_id'];
                    //     $existed_inventory_id = $g2['inventory_id'];
                    //     if($existed != 0){
                    //         echo "<span class='bg-gradient-warning badge badge-lg badge-info text-white p-2 mx-2 w-100' style='font-size: 16px'>This item already scanned</span>";

                    //     }
                    // }

                    $total_quantity = "SELECT *, SUM(item_quantity) AS Total_qty FROM sales_order_add_items WHERE sales_order_id = {$sales_order_id}";
                    $q2 = mysqli_query($connection, $total_quantity);

                    foreach($q2 as $l){
                        $total_qty = $l['Total_qty'];
                    }

                    // Completed Task
                    $query10 = "SELECT *, COUNT(*)AS Records FROM warehouse_information_sheet WHERE send_to_production = 1 AND sales_order_id={$sales_order_id} ";
                    $result_query = mysqli_query($connection, $query10);
                                        
                    foreach($result_query as $x){    
                        if($total_qty == $x['Records']){
                            echo "<span class='bg-gradient-success badge badge-lg badge-info text-white p-2 mx-2 w-100' style='font-size: 16px'>Task Comleted</span>";
                            header("Location: ./warehouse_member_sales_order.php");
                            break;
                        }
                    }
                }
            }
        }
    }


?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_member_sales_order.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">

                <div class="d-flex">
                    <div class="col">
                        <fieldset class="mt-4 mb-2">
                            <legend>Scan QR</legend>

                            <form action="#" method="POST">
                                <div class="input-group mb-2 mt-2 d-flex">

                                    <input type="number" min="1" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                    <!-- <button type="submit" class="btn btn-primary">Search</button> -->

                                </div>

                            </form>
                        </fieldset>
                        <fieldset class="mt-4 mb-4">
                            <legend>Achieved</legend>

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Core</th>
                                        <th>Generation</th>
                                        <th>Order QTY</th>
                                        <th>Prepared</th>
                                        <th style="width: 185px;"></th>

                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                    <?php
                                 $quary_from_sales_order_add ="SELECT item_brand,item_model,item_core,item_generation,item_quantity,item_type,item_processor 
                                 FROM sales_order_add_items WHERE sales_order_id ={$_GET['sales_order_id']} ORDER BY item_quantity DESC;";
                                $query_run = mysqli_query($connection, $quary_from_sales_order_add);

                                if (mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $items) {

                                ?>
                                    <tr>

                                        <td class="text-uppercase"><?php echo $items['item_brand'] ?></td>
                                        <td class="text-uppercase"><?php echo $items['item_model'] ?></td>
                                        <td class="text-uppercase"><?php echo $items['item_core'] ?></td>
                                        <td class="text-uppercase"><?php echo $items['item_generation'] ?></td>
                                        <td class="text-uppercase"><?php echo $items['item_quantity'] ?></td>
                                        <td class="text-uppercase"><?php
                                        //get warehouse info with s/o    
                                                                $query_get3 = "SELECT
                                                                COUNT(*) AS received_count
                                                            FROM
                                                                warehouse_information_sheet
                                                            WHERE
                                                            warehouse_information_sheet.model = '{$items['item_model']}' AND 
                                                            warehouse_information_sheet.brand = '{$items['item_brand']}' AND 
                                                            warehouse_information_sheet.core = '{$items['item_core']}' AND 
                                                            warehouse_information_sheet.device = '{$items['item_type']}' AND 
                                                            warehouse_information_sheet.processor = '{$items['item_processor']}' AND 
                                                            warehouse_information_sheet.sales_order_id = '{$_GET['sales_order_id']}' AND 
                                                            warehouse_information_sheet.send_to_production = 1";
                                            $result3 = mysqli_query($connection, $query_get3);
                                            foreach($result3 as $data){
                                                echo $data['received_count'];
                                            }
                                         ?></td>
                                        <td>
                                            <?php

                                            $percentage = round(($data['received_count']  / $items['item_quantity']) * 100);

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
                                    <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                    <div class="col">
                        <fieldset class="mb-4 mt-4">
                            <legend>Order Summerizing</legend>

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SO Number</th>
                                        <th>Inventory ID</th>
                                        <th>Model</th>
                                        <th>Released Date</th>
                                    </tr>
                                </thead>
                                <tbody class="table-dark">
                                    <?php

                                $sales_order_list = '';

                                $query = "SELECT * FROM warehouse_information_sheet WHERE sales_order_id={$sales_order_id} ORDER BY send_time_to_production DESC";
                                $results = mysqli_query($connection, $query);


                                while ($sales = mysqli_fetch_assoc($results)) {
                                    $sales_order_list .= "<tr>";
                                    $sales_order_list .= "<td>{$sales['sales_order_id']}</td>";
                                    $sales_order_list .= "<td>{$sales['inventory_id']}</td>";
                                    $sales_order_list .= "<td>{$sales['model']}</td>";
                                    $sales_order_list .= "<td>{$sales['send_time_to_production']}</td>";
                                    $sales_order_list .= "</tr>";
                                }

                                ?>
                                    <?php echo $sales_order_list; ?>
                                </tbody>


                            </table>
                        </fieldset>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>



<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>