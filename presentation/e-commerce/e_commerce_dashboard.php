<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-people-group" aria-hidden="true"></i> E-Commerce Dashboard
        </h3>
    </div>

</div>
<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <a href="e_com_daily_work_sheet.php">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Let Go NOON</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <a href="e_com_stock.php">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">E Commerce Stock Report</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <a href="packing_request.php">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Packing Request</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <?php 
        $date = date('Y-m-d 00:00:00');
        $date2 = date('Y-m-d 23:59:59');
        $start_time = $date;
        $end_time =$date2; ?>
        <a href="view_pending.php?start_time='<?php echo $start_time ?>'&end_time='<?php echo $end_time ?>'&day=Today">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Packing Pending</span>
                    <span class="info-box-number"><?php 
                
                $count=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending'";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count = $a['request_count'];
                }
                echo $count;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Manage Platform</p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Main Warehouse Stock</th>
                                <th>E-Com In Total</th>
                                <th>E-Com In Stock</th>
                                <th>E-Com Dispatch</th>
                                <th>Noon Warehouse (FBN)</th>
                                <th>Alsakb Noon Warehouse</th>
                                <th>Alsakb Cartlow Warehouse</th>
                                <th>Amazon Warehouse (FBA - UAE)</th>
                                <th>Alsakb Amazon Warehouse</th>
                            </tr>
                        </thead>
                        <tbody class="table-dark">

                            <?php
                                $brand=null;
                                $model = null;
                                $main_warehouse_stock = 0;
                                $in_total = null;
                                $in_stock = null;
                                $dispatch = null;
                                $noon_warehouse = 0;
                                $alsakb_noon_warehouse = 0;
                                $alsakb_cartlow_warehouse = 0;
                                $amazon_warehouse_uae = 0;
                                $alsakb_amazon_warehouse = 0;
                                $i=0;
                                  $query = "SELECT *,  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` GROUP BY model";
                                  $result = mysqli_query($connection, $query);
                                foreach($result as $data){
                                    $brand = $data['brand'];
                                    $model = $data['model'];
                                    $in_total = $data['in_total'];
                                    $i++;
                                    $query1 = "SELECT COUNT(warehouse_type) as warehouse_type FROM `e_com_inventory` WHERE brand='$brand' AND model='$model'AND warehouse_type='Noon Warehouse'";
                                    $result1 = mysqli_query($connection, $query1);
                                    foreach($result1 as $data){
                                            $noon_warehouse = $data['warehouse_type'];     
                                    }
                                    $query1 = "SELECT COUNT(warehouse_type) as warehouse_type FROM `e_com_inventory` WHERE brand='$brand' AND model='$model'AND warehouse_type='alsakb noon warehouse'";
                                    $result1 = mysqli_query($connection, $query1);
                                    foreach($result1 as $data){
                                        $alsakb_noon_warehouse = $data['warehouse_type']; }

                                    $query1 = "SELECT COUNT(warehouse_type) as warehouse_type FROM `e_com_inventory` WHERE brand='$brand' AND model='$model'AND warehouse_type='alsakb cartlow warehouse'";
                                    $result1 = mysqli_query($connection, $query1);
                                    foreach($result1 as $data){
                                        $alsakb_cartlow_warehouse = $data['warehouse_type']; }
                                    
                                    $query1 = "SELECT COUNT(warehouse_type) as warehouse_type FROM `e_com_inventory` WHERE brand='$brand' AND model='$model'AND warehouse_type='amazon warehouse uae'";
                                    $result1 = mysqli_query($connection, $query1);
                                    foreach($result1 as $data){
                                        $amazon_warehouse_uae = $data['warehouse_type']; }    
                                    
                                        $query1 = "SELECT COUNT(warehouse_type) as warehouse_type FROM `e_com_inventory` WHERE brand='$brand' AND model='$model'AND warehouse_type='alsakb amazon warehouse'";
                                    $result1 = mysqli_query($connection, $query1);
                                    foreach($result1 as $data){
                                        $alsakb_amazon_warehouse = $data['warehouse_type']; }    
                                            
                                    
                                
                                    echo "
                                    <tr>
                                    <td>$i</td>
                                    <td>$brand</td>
                                    <td>$model</td>";
                                    $query ="SELECT COUNT(inventory_id) as main_stock FROM `warehouse_information_sheet` WHERE brand = '$brand' AND send_to_production = '0'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $main_warehouse_stock = $data['main_stock'];

                                    }
                                    echo "
                                    <td>$main_warehouse_stock</td>
                                    <td>$in_total</td>
                                    <td>";
                                    $query ="SELECT COUNT(e_com_inventory_id) as in_stock FROM `e_com_inventory` WHERE brand = '$brand' AND platform = '0'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $in_stock = $data['in_stock'];

                                    }
                                    echo $in_stock;
                                    echo "</td>
                                    <td>";
                                    $query ="SELECT  COUNT(e_com_inventory_id) as dispatch FROM `e_com_inventory` WHERE brand = '$brand' AND dispatch = '1'";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $dispatch = $data['dispatch'];

                                    }
                                    echo $dispatch;
                                    echo "</td>";
                                    if($noon_warehouse <10){ ?>

                            <td class="bg-danger"> <a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Noon Warehouse" ?>&platform=noon"><?php echo $noon_warehouse; ?></a>
                            </td>

                            <?php } elseif( $noon_warehouse < 25){ ?>
                            <td class="bg-warning"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Noon Warehouse" ?>&platform=noon"><?php echo $noon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Noon Warehouse" ?>&platform=noon"><?php echo $noon_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_noon_warehouse <10){ ?>
                            <td class="bg-danger"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Noon Warehouse" ?>&platform=noon"><?php echo $alsakb_noon_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_noon_warehouse < 25){ ?>
                            <td class="bg-warning"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Noon Warehouse" ?>&platform=noon"><?php echo $alsakb_noon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Noon Warehouse" ?>&platform=noon"><?php echo $alsakb_noon_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_cartlow_warehouse <10){ ?>
                            <td class="bg-danger"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Cartlow Warehouse" ?>&platform=cartlow"><?php echo $alsakb_cartlow_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_cartlow_warehouse < 25){ ?>
                            <td class="bg-warning"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Cartlow Warehouse" ?>&platform=cartlow"><?php echo $alsakb_cartlow_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Cartlow Warehouse" ?>&platform=cartlow"><?php echo $alsakb_cartlow_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($amazon_warehouse_uae <10){ ?>
                            <td class="bg-danger"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Amazon Warehouse UAE" ?>&platform=amazon_uae"><?php echo $amazon_warehouse_uae; ?></a>
                            </td>
                            <?php } elseif( $amazon_warehouse_uae < 25){ ?>
                            <td class="bg-warning"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Amazon Warehouse UAE" ?>&platform=amazon_uae"><?php echo $amazon_warehouse_uae ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Amazon Warehouse UAE" ?>&platform=amazon_uae"><?php echo $amazon_warehouse_uae ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_amazon_warehouse <10){ ?>
                            <td class="bg-danger"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Amazon Warehouse" ?>&platform=amazon_uae"><?php echo $alsakb_amazon_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_amazon_warehouse < 25){ ?>
                            <td class="bg-warning"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Amazon Warehouse" ?>&platform=amazon_uae"><?php echo $alsakb_amazon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a
                                    href="create_form.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>&warehouse_type=<?php echo "Alsakb Amazon Warehouse" ?>&platform=amazon_uae"><?php echo $alsakb_amazon_warehouse ?></a>
                            </td>
                            <?php } ?>
                            <?php 
                                           echo" </tr>";
                                            } ?>


                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>