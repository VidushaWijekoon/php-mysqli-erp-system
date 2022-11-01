<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
if($role_id == 1 || $role_id == 4){

$sales_order_id = '';
$my_model = '';

if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);

    $query = "SELECT * FROM warehouse_information_sheet WHERE sales_order_id = {$sales_order_id} ORDER BY sales_order_id";
    $result_set = mysqli_query($connection, $query);
    
}
?>


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="./production_team_leader_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Sales Order <?php echo $sales_order_id; ?></p>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Core</th>
                                <th>Generation</th>
                                <th>Order QTY</th>
                                <th>Received QTY</th>
                                <th>Assign QTY</th>
                                <th style="width: 250px;">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <?php
                                $new_model = '';
                                
                                $query = "SELECT *, COUNT(*) AS received_count 
                                            FROM warehouse_information_sheet    
                                            INNER JOIN sales_order_add_items 
                                            ON  warehouse_information_sheet.model = sales_order_add_items.item_model 
                                            AND warehouse_information_sheet.sales_order_id = sales_order_add_items.sales_order_id                     
                                            AND warehouse_information_sheet.brand = sales_order_add_items.item_brand                     
                                            AND warehouse_information_sheet.core = sales_order_add_items.item_core                     
                                            AND warehouse_information_sheet.device = sales_order_add_items.item_type                     
                                            AND warehouse_information_sheet.processor = sales_order_add_items.item_processor
                                            WHERE  warehouse_information_sheet.sales_order_id = {$sales_order_id} 
                                            AND warehouse_information_sheet.send_to_production = 1
                                            GROUP BY warehouse_information_sheet.model, 
                                                    warehouse_information_sheet.generation, 
                                                    warehouse_information_sheet.core, 
                                                    warehouse_information_sheet.brand 
                                            ORDER BY received_count DESC";                                          
                                            
                                $query_run = mysqli_query($connection, $query);

                                if ($rowcount = mysqli_fetch_array($query_run)) {
                                    $assign_qty;
                                    foreach ($query_run as $values) {
                                        $new_model = $values['model']; 
                                        $query_1="SELECT SUM(tech_assign_qty) AS assign_qty FROM prod_technician_assign_info 
                                    WHERE sales_order_id = '$sales_order_id'
                                    AND model = '{$values['model']}'
                                    AND brand ='{$values['brand']}'
                                    AND core = '{$values['core']}'
                                    AND generation ='{$values['generation']}'
                                    AND processor = '{$values['processor']}'
                                    ";                             
                                         $query_2 = mysqli_query($connection, $query_1);
                                         foreach($query_2 as $data){
                                           $assign_qty = $data['assign_qty'];
                                         }
                                ?>

                            <tr class="text-uppercase">
                                <td><?php echo $values['brand'] ?></td>
                                <td><?php echo $values['model'] ?></td>
                                <td><?php echo $values['core'] ?></td>
                                <td><?php echo $values['generation'] ?></td>
                                <td><?php echo $values['item_quantity'] ?></td>
                                <td><?php echo $values['received_count'] ?></td>
                                <td><?php echo $assign_qty ?></td>
                                <td>
                                    <?php

                                            $percentage = round(($assign_qty  / $values['item_quantity']) * 100);

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

                                    <?php 
                                    echo "<a class='btn btn-xs bg-gradient-primary mx-2' href=\"production_team_leader_asign.php?sales_order_id={$values['sales_order_id']}&model={$values['model']}&core={$values['core']}&generation={$values['generation']}&brand={$values['brand']}&device={$values['device']}&processor={$values['processor']}\" class='text-white text-capitalize'><i class='fa-solid fa-sun mx-1'></i></a>" ?>
                                </td>
                            </tr>
                            <?php } } ?>

                        </tbody>
                    </table>

                </div>

            </div>

            <!-- /.col -->
            <div class="col-md-6 justify-content-center mx-auto text-center mt-5">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Assign</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sales Order</th>
                                    <th>EMP ID</th>
                                    <th>Model</th>
                                    <th>Assign Time</th>
                                    <th>QTY</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase">
                                <?php
                                    
                                    $query = "SELECT * FROM prod_technician_assign_info 
                                    WHERE prod_technician_assign_info.sales_order_id = {$sales_order_id} 
                                    GROUP BY prod_technician_assign_info.created_time  ";
                                    $query_run = mysqli_query($connection, $query);

                                    if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                        $i = 0;
                                        foreach($query_run as $value) {
                                            $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?> </td>
                                    <td><?php echo $value['sales_order_id']; ?></td>
                                    <td><?php echo $value['emp_id']; ?></td>
                                    <td><?php echo $value['model']; ?></td>
                                    <td><?php echo $value['created_time']; ?></td>
                                    <td><span
                                            class="badge bg-primary px-3"><?php echo $value['tech_assign_qty']; ?></span>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>



<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Technician <?php echo $sales_order_id; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body  form-group d-flex">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-0">
                                <table id="tb1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Techinician</th>
                                            <th>Model</th>
                                            <th>QTY</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td>#</td>
                                            <td>
                                                <select name="emp_id" style="border-radius: 5px;" required>
                                                    <option selected>--Select Technician--</option>
                                                    <?php
                                                    $query = "SELECT epf, first_name FROM users WHERE department = 1 ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($worker = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                                    <option value="<?php echo $worker["epf"]; ?>">
                                                        <?php echo strtoupper($worker["epf"] . " - " . ($worker["first_name"])); ?>
                                                    </option>
                                                    <?php
                                                    endwhile;
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <?php echo $new_model;  ?>
                                            </td>
                                            <td><input type="number" name="qty" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<style>
select,
input[type="text"],
[type="number"] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    margin-right: 15px;
}
</style>

<?php include_once('../includes/footer.php'); } ?>