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

$device = $_GET['device'];
$brand = $_GET['brand'];
$username = $_SESSION['username'];
$touch_wholesale_price = 0;
$non_touch_wholesale_price = 0;
$submit = 0;

if(isset($_POST['submit'])){

    $model = $_POST['model'];
    $core = $_POST['core'];
    $generation = $_POST['generation'];
    $ram = $_POST['ram'];
    $hdd = $_POST['hdd'];
    $touch_wholesale_price = $_POST['touch_wholesale_price'];
    $non_touch_wholesale_price = $_POST['non_touch_wholesale_price'];
 
    $query = "INSERT INTO `sales_laptop_unit_price`(device, brand, model, core, generation,ram, hdd, touch_wholesale_price, non_touch_wholesale_price, price_created_by) 
            VALUES  ('$device', '$brand', '$model', '$core', '$ram', '$hdd', '$generation','$touch_wholesale_price', '$non_touch_wholesale_price', '$username') ";
    $query_run = mysqli_query($connection, $query);

    $update = "UPDATE warehouse_information_sheet SET touch_wholesale_price = '$touch_wholesale_price', sale_set_ram = '$ram', sale_set_hdd = '$hdd', price_set_by = '$username', price_set_time = now()
                WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND core = '$core' AND generation = '$generation' AND touch_or_non_touch = 'yes' ";
    $result_run = mysqli_query($connection, $update);

    $update2 = "UPDATE warehouse_information_sheet SET non_touch_wholesale_price = '$non_touch_wholesale_price', sale_set_ram = '$ram', 
                                                    sale_set_hdd = '$hdd', price_set_by = '$username' , price_set_time = now() 
                WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND core = '$core' AND generation = '$generation'  AND touch_or_non_touch = 'no' ";
    $result_run1 = mysqli_query($connection, $update2);

    $update3 = "UPDATE warehouse_information_sheet SET touch_wholesale_price = '$touch_wholesale_price', non_touch_wholesale_price = '$non_touch_wholesale_price', sale_set_ram = '$ram', 
                                                    sale_set_hdd = '$hdd', price_set_by = '$username' , price_set_time = now() 
                WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND core = '$core' AND generation = '$generation'";
    $result_run3 = mysqli_query($connection, $update3);
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize"><?= $device . " " . $brand ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 12%;">Model</th>
                                <th style="width: 120px;">Core</th>
                                <th>Generation</th>
                                <th>In Stock</th>
                                <th>Touch</th>
                                <th>Non Touch</th>
                                <th style="width: 100px;">RAM</th>
                                <th style="width: 120px;">HDD</th>
                                <th>Wholesale Touch Price</th>
                                <th>Wholesale Non Touch Price</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $i = 0;
                                $last_updated_time = 0;
                                
                                $query = "SELECT inventory_id, device, brand, model, generation, core, touch_wholesale_price, non_touch_wholesale_price, price_set_time, COUNT(inventory_id) as Total_number,
                                        COUNT(touch_or_non_touch) as touch_or_non_touch
                                        FROM warehouse_information_sheet 
                                        WHERE device = '$device' AND brand = '$brand' AND dispatch = '0' AND touch_wholesale_price = '0' AND non_touch_wholesale_price = '0'
                                        GROUP BY brand, model, core, generation
                                        ORDER BY Total_number DESC";
                                $result = mysqli_query($connection, $query);
                                foreach($result as $x){
                                    $device = $x['device'];
                                    $brand = $x['brand'];
                                    $model = $x['model'];
                                    $generation = $x['generation'];
                                    $core = $x['core'];
                                    $total_count = $x['Total_number']; 
                                    $touch_wholesale_price = $x['touch_wholesale_price'];
                                    $non_touch_wholesale_price = $x['non_touch_wholesale_price'];     
                                    $last_updated_time = $x['price_set_time'];     

                                    $query1 = "SELECT COUNT(touch_or_non_touch)as touch_yes FROM `warehouse_information_sheet` 
                                        WHERE brand = '$brand' AND model = '$model' AND core = '$core' AND dispatch = '0' AND touch_or_non_touch = 'yes' ";
                                    $q1_run = mysqli_query($connection, $query1);
                                    foreach($q1_run as $data){
                                        $touch_yes = $data['touch_yes'];
                                    }                                  
                                    
                                $touch_no = $total_count - $touch_yes;
                            ?>
                            <tr>
                                <form method="POST">
                                    <td>
                                        <input type="text" min="1" class="form-control" name="model" readonly
                                            value="<?php echo $model ?>">
                                    </td>
                                    <td>
                                        <input type="text" min="1" class="form-control" name="core" readonly
                                            value="<?php echo $core ?>">
                                    </td>

                                    <td>
                                        <input type="text" min="1" class="form-control" name="generation" readonly
                                            value="<?php echo $generation ?>">
                                    </td>
                                    <td><?php echo $total_count ?></td>
                                    <td><?php echo $touch_yes ?></td>
                                    <td><?php if($touch_no <= 1 ){ echo '0'; }else{echo $touch_no;}?></td>
                                    <td>
                                        <select class="" name="ram" style="border-radius: 5px; width: 100%">
                                            <option value="8">8GB</option>
                                            <!-- <option value="4">4GB</option>
                                            <option value="16">16GB</option>
                                            <option value="32">32GB</option> -->
                                        </select>
                                    </td>
                                    <td>
                                        <select class="" name="hdd" style="border-radius: 5px; width: 100%">
                                            <option value="256">256GB</option>
                                            <!-- <option value="512">512GB</option>
                                            <option value="1tb">1TB</option> -->
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control" id="touch_wholesale_price"
                                            name="touch_wholesale_price" placeholder="Touch Wholesale Price">

                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control" id="non_touch_wholesale_price"
                                            name="non_touch_wholesale_price" placeholder="Touch Wholesale Price">

                                    </td>

                                    <td>
                                        <button type="submit" name="submit"
                                            class="btn btn-xs btn-success mx-2 float-right">Submit
                                        </button>

                                    </td>

                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- <div class="col">
                        <?php echo "<a class='btn btn-xs btn-primary px-2 mt-2 float-right' href=\"set_all_models.php?device={$x['device']}&brand={$x['brand']}\">Back</a>" ?>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
[type="text"] {
    height: 22px;
    margin-top: 4px;
    font-size: 10px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #fff !important;
    text-transform: capitalize;
    border: none;
}
</style>