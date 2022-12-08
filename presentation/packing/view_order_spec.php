<?php 

session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

$device = null;
$brand= null;
$model= null;
$core= null;
$generation= null;
$hdd_capacity= null;
$hdd_type= null;
$mfg= null;
$ram_capacity= null;
$screen_type= null;
$screen_size= null;
$cartoon_number= null;
$sales_order_id= $_GET['order_id'];


?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-receipt" aria-hidden="true"></i> MFG Report </h3>
    </div>
</div>





<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row m-2">
                        <div class="col-12">
                            <table id="example2" class="table table-bordered table-striped">
                                <table id="tblexportData" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Device</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>CPU</th>
                                            <th>Generation</th>
                                            <th>HDD</th>
                                            <th>RAM</th>
                                            <th>Screen Type</th>
                                            <th>Screen Size </th>
                                            <th>Screen Resolution</th>
                                            <th>OS </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                         echo $sales_order_id;
                            $querey = "SELECT * FROM sales_order_add_items WHERE sales_order_id ='$sales_order_id'";
                            $result = mysqli_query($connection, $querey);
                                    foreach($result as $data){
                                ?>
                                        <tr>
                                            <td><?php echo $data['item_device']; ?></td>
                                            <td><?php echo $data['item_brand'];?></td>
                                            <td><?php echo $data['item_model'];?></td>
                                            <td><?php echo $data['item_core'];?></td>
                                            <td><?php echo $data['item_generation'];?></td>
                                            <td><?php echo $data['item_hdd_'];?></td>
                                            <td><?php echo $data['item_hdd_capacity'];?></td>
                                            <td><?php echo $data['item_ram_capacity'];?></td>
                                            <td><?php echo $data['touch'];?></td>
                                            <td><?php echo $data['screen_size'];?></td>
                                            <td><?php echo $data['screen_resolution'];?></td>
                                            <td><?php echo $data['os'];?></td>

                                            <?php }  ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <!-- //test here -->

                </div>
            </div>
        </div>
    </div>
</div>