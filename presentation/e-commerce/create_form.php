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
$brand = $_GET['brand'];
$model = $_GET['model'];
$warehouse_type = $_GET['warehouse_type'];
$platform=$_GET['platform'];
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./e_commerce_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Summery</p>
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
                                  $query = "SELECT *,  COUNT(e_com_inventory_id) as in_total FROM `e_com_inventory` WHERE brand='$brand' AND model='$model' GROUP BY model";
                                 
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

                            <td class="bg-danger"> <a><?php echo $noon_warehouse; ?></a>
                            </td>

                            <?php } elseif( $noon_warehouse < 25){ ?>
                            <td class="bg-warning"><a><?php echo $noon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a><?php echo $noon_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_noon_warehouse <10){ ?>
                            <td class="bg-danger"><a><?php echo $alsakb_noon_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_noon_warehouse < 25){ ?>
                            <td class="bg-warning"><a><?php echo $alsakb_noon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a><?php echo $alsakb_noon_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_cartlow_warehouse <10){ ?>
                            <td class="bg-danger"><a><?php echo $alsakb_cartlow_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_cartlow_warehouse < 25){ ?>
                            <td class="bg-warning"><a><?php echo $alsakb_cartlow_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a><?php echo $alsakb_cartlow_warehouse ?></a>
                            </td>
                            <?php } ?>

                            <?php if($amazon_warehouse_uae <10){ ?>
                            <td class="bg-danger"><a><?php echo $amazon_warehouse_uae; ?></a>
                            </td>
                            <?php } elseif( $amazon_warehouse_uae < 25){ ?>
                            <td class="bg-warning"><a><?php echo $amazon_warehouse_uae ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a><?php echo $amazon_warehouse_uae ?></a>
                            </td>
                            <?php } ?>

                            <?php if($alsakb_amazon_warehouse <10){ ?>
                            <td class="bg-danger"><a><?php echo $alsakb_amazon_warehouse; ?></a>
                            </td>
                            <?php } elseif( $alsakb_amazon_warehouse < 25){ ?>
                            <td class="bg-warning"><a><?php echo $alsakb_amazon_warehouse ?></a>
                            </td>
                            <?php }else{ ?>
                            <td class="bg-success"><a><?php echo $alsakb_amazon_warehouse ?></a>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class=" card mt-4">
                <form action="" method="POST">
                    <fieldset class="mx-3 my-2">
                        <legend>Add New Item For <?php echo $warehouse_type ?></legend>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Action Type</label>
                            <div class="col-sm-8">
                                <select name="action_type" class="info_select" style="border-radius: 5px;"
                                    onchange="yesnoCheck(this);">

                                    <option selected value="add">
                                        <?php echo "Add Item"; ?>
                                    </option>
                                    <option value="dispatch">
                                        <?php echo "Dispatch"; ?>
                                    </option>
                                    <option value="switch">
                                        <?php echo "Switch"; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Item Count</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="Item Count" name="item_count"
                                    required>
                            </div>
                        </div>
                        <div class="row" id="ifYes" style="display: none;">
                            <label class="col-sm-3 col-form-label">Switch Warehouse</label>
                            <div class="col-sm-8">
                                <select name="switch_type" class="info_select" style="border-radius: 5px;"
                                    onchange="yesnoCheck(this);">

                                    <option selected value="Noon Warehouse">
                                        <?php echo "Noon Warehouse"; ?>
                                    </option>
                                    <option value="Alsakb Noon Warehouse">
                                        <?php echo "Alsakb Noon Warehouse"; ?>
                                    </option>
                                    <option value="Alsakb Cartlow Warehouse">
                                        <?php echo "Alsakb Cartlow Warehouse"; ?>
                                    </option>
                                    <option value="Amazon Warehouse UAE">
                                        <?php echo "Amazon Warehouse UAE"; ?>
                                    </option>
                                    <option value="Alsakb Amazon Warehouse">
                                        <?php echo "Alsakb Amazon Warehouse"; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center">Save</button>
                    </fieldset>

                </form>

            </div>
            <!--/col-->
        </div>
    </div>
</div>
<?php 
if (isset($_POST['submit'])) {
    $action_type = mysqli_real_escape_string($connection, $_POST['action_type']);
    $item_count = mysqli_real_escape_string($connection, $_POST['item_count']);
    $switch_type = mysqli_real_escape_string($connection, $_POST['switch_type']);
    $available_item_count=0;
    $switch_platform = null;
    $switch_warehouse = null;
    echo $switch_type;
    if($warehouse_type =='Noon Warehouse'){
        $available_item_count = $noon_warehouse;
    }elseif($warehouse_type =='alsakb noon warehouse'){
        $available_item_count = $alsakb_noon_warehouse;
    }elseif($warehouse_type =='alsakb cartlow warehouse'){
        $available_item_count = $alsakb_cartlow_warehouse;
    }elseif($warehouse_type =='amazon warehouse uae'){
        $available_item_count = $amazon_warehouse_uae;
    }elseif($warehouse_type =='alsakb amazon warehouse'){
        $available_item_count = $alsakb_amazon_warehouse;
    }

    if($switch_type =='Noon Warehouse'){
        $switch_platform = 'Noon';
        $switch_warehouse = 'Noon Warehouse';
    }elseif($switch_type =='Alsakb Noon Warehouse'){
        $switch_platform = 'Noon';
        $switch_warehouse = 'Alsakb Noon Warehouse';
    }elseif($switch_type =='Alsakb Cartlow Warehouse'){
        $switch_platform = 'cartlow';
        $switch_warehouse = 'Alsakb Cartlow Warehouse';
    }elseif($switch_type =='Amazon Warehouse UAE'){
        $switch_platform = 'amazon uae';
        $switch_warehouse = 'Amazon Warehouse UAE';
    }elseif($switch_type =='Alsakb Amazon Warehouse'){
        $switch_platform = 'amazon uae';
        $switch_warehouse = 'Alsakb Amazon Warehouse';
    }


    if( $in_stock >= $item_count && $action_type == 'add'){
        $query = "UPDATE `e_com_inventory` SET platform ='$platform', warehouse_type='$warehouse_type' WHERE model='$model' AND platform='0' ORDER BY e_com_inventory_id ASC LIMIT $item_count ";
        $result = mysqli_query($connection, $query);
    }elseif( $available_item_count >= $item_count && $action_type == 'dispatch'){
        $query = "UPDATE `e_com_inventory` SET dispatch ='1' WHERE model='$model' AND platform='0' ORDER BY e_com_inventory_id ASC LIMIT $item_count ";
        $result = mysqli_query($connection, $query);
    }elseif($action_type == 'switch'){
        $query = "UPDATE `e_com_inventory` SET platform ='$switch_platform',warehouse_type='$switch_warehouse' WHERE model='$model' AND platform='$platform' AND warehouse_type='$warehouse_type' ORDER BY e_com_inventory_id ASC LIMIT $item_count ";
        echo $query;
        $result = mysqli_query($connection, $query);
    }
    header("Location: create_form.php?brand=$brand&model=$model&warehouse_type=$warehouse_type&platform=$platform");
}

?>
<style>
.modal-header {
    display: block;
}

.modal-content {
    margin-top: 8rem;
}
</style>
<script>
function yesnoCheck(that) {
    if (that.value == "switch") {
        document.getElementById("ifYes").style.display = "flex";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>

<?php include_once('../includes/footer.php');  ?>