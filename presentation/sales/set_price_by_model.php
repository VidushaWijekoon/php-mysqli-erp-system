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
$model = $_GET['model'];
$username = $_SESSION['username'];

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <h6 class="text-capitalize"><?= $device . " " . $brand . " " . $model ?></h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Model</th>
                                <th style="width: 120px;">Core</th>
                                <th>Generation</th>
                                <th>Touch</th>
                                <th>Non Touch</th>
                                <th>In Stock</th>
                                <th style="width: 100px;">RAM</th>
                                <th style="width: 120px;">HDD</th>
                                <th>Wholesale Price</th>
                                <th>Discount Precentage</th>
                                <th>Final Price</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                               

                                $query = "SELECT inventory_id, device, brand, model, core, processor, generation, touch_or_non_touch, dispatch, 
                                        COUNT(inventory_id) as Total_number
                                        FROM warehouse_information_sheet 
                                        WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND dispatch = '0' AND touch_or_non_touch = 'no' GROUP BY device, brand, model, processor, core 
                                        ORDER BY Total_number DESC";
                                $result = mysqli_query($connection, $query);
                                foreach($result as $key=>$x){
                                    $device = $x['device'];
                                    $brand = $x['brand'];
                                    $model = $x['model'];
                                    $processor = $x['processor'];
                                    $generation = $x['generation'];
                                    $core = $x['core'];
                                    $touch = $x['touch_or_non_touch'];
                                    $total_count = $x['Total_number'];  
                                   
                            ?>

                            <tr>
                                <form method="POST">
                                    <td><?= $model ?></td>
                                    <td><?= $core ?></td>
                                    <td><?= $generation ?></td>
                                    <td><?= 1 ?></td>
                                    <td><?= $total_count ?></td>
                                    <td>
                                        <select class="" name="ram" style="border-radius: 5px; width: 100%">
                                            <option value="8">8GB</option>
                                            <option value="4">4GB</option>
                                            <option value="16">16GB</option>
                                            <option value="32">32GB</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="" name="hdd" style="border-radius: 5px; width: 100%">
                                            <option value="256">256GB</option>
                                            <option value="512">512GB</option>
                                            <option value="1tb">1TB</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control" name="wholesale_price"
                                            placeholder="Wholesale Price">
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control" name="discount_price"
                                            placeholder="Discount Price">
                                    </td>
                                    <td>
                                        <input type="number" min="1" class="form-control" name="total_price"
                                            placeholder="Total Price">
                                    </td>
                                    <td>
                                        <button type="submit" name="submit"
                                            class="btn btn-xs btn-success mx-2 float-right">Submit</button>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="col">
                        <?php echo "<a class='btn btn-xs btn-primary px-2 mt-2 float-right' href=\"set_all_models.php?device={$x['device']}&brand={$x['brand']}\">Back</a>" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

if(isset($_POST['submit'])){

    $ram = $_POST['ram'];
    $hdd = $_POST['hdd'];
    $wholesale_price = $_POST['wholesale_price'];
    $discount_price = $_POST['discount_price'];
    $e_commerce_price = $_POST['e_commerce_price'];

    $insert_q = "INSERT INTO sales_laptop_unit_price(`device`, `brand`, `model`, `processor`, `core`, `touch_status`, `hdd`, `ram`, `e-commerce_price`, `discount_price`, `wholesale_price`, `created_by`) 
        VALUES('$device', '$brand', '$model', '$processor', '$core', '$touch', '$ram', '$hdd', '$e_commerce_price', '$discount_price', '$wholesale_price', '$username')";
    echo $insert_q;
    $result_run = mysqli_query($connection, $insert_q);

    $update = "UPDATE warehouse_information_sheet SET set_price = '1' WHERE device = '$device' AND brand = '$brand' AND model = '$model' AND core = '$core' AND processor = 'processor' AND touch_or_non_touch = '$touch'";
            echo $update;
    $update_run = mysqli_query($connection, $update);
}


?>