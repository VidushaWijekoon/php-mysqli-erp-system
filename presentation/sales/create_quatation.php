<?php

error_reporting (E_ALL ^ E_NOTICE);
// Toggle this to change the setting
define('DEBUG', true);

// You want all errors to be triggered
error_reporting(E_ALL);
 
error_reporting(E_ERROR | E_PARSE);

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

if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18) || 
    ($role_id == 5 && $department == 5) || ($role_id == 8 && $department == 5)){
        
$errors = array();

// Customer Information
$customer_name = null;
$customer_address = null;
$company_name = null;
$country = null;
$shipping_state = null;
$zip_code = null;
$uae_number = null;
$local_number = null;
$created_by = $_SESSION['username'];

// Order Items
$device = null;
$brand = null;
$model = null;
$processor = null;
$core = null;
$generation = null;
$speed = null;
$lcd_size = null;
$resolution = null;
$touch_or_non_touch = null;
$ram = null;
$hdd_capacity = null;
$hdd_type = null;
$graphic_capacity = null;
$graphic_type = null;
$os = null;
$condition = null;
$selling_type = null;
$charger = null;
$packing_type = null;
$shipping_method = null;
$qty = null;
$unit_price = null;
$discount = null;
$total = null;
$quatation_id = null;

$customer_name1 = null;
$customer_address1 = null;
$company_name1 = null;
$country1 = null;
$shipping_state1 = null;
$zip_code1 = null;
$uae_number1 = null;
$other_number1 = null;

$customer_id = 0;
$customer_first_name = null;
$customer_last_name = null;
$customer_company_name = null;
$customer_company_email = null;
$customer_uae_number = null;
$customer_country_code = null;
$customer_local_number = null;

$sales_quatations_items_id = null;

$cs_id = 0;
$cs_id = $_GET['customer_id'];

if(isset($_POST['get_custmer_details'])){
    $customer_id = $_POST['customer_id'];
    header("Location: create_quatation.php?customer_id=$customer_id");

}

if($cs_id != 0){
    $query = "SELECT * FROM sales_customer_information WHERE customer_id = '$cs_id'";
    $run_query = mysqli_query($connection, $query);
        foreach($run_query as $rq){
            $customer_first_name = $rq['first_name'];
            $customer_last_name = $rq['last_name'];
            $customer_company_name = $rq['company_name'];
            $customer_company_email = $rq['company_email'];
            $customer_uae_number = $rq['UAE_number'];
            $customer_country_code = $rq['country_code'];
            $customer_local_number = $rq['local_number'];
            $_SESSION['customer_id'] = $rq['customer_id'];
        }
}

if(isset($_POST['add_items'])){
    $customer_table_customer_id = $_SESSION['customer_id'];
    $device = mysqli_real_escape_string($connection, $_POST['device']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $processor = mysqli_real_escape_string($connection, $_POST['processor']);
    $core = mysqli_real_escape_string($connection, $_POST['core']);
    $generation = mysqli_real_escape_string($connection, $_POST['generation']);
    $speed = mysqli_real_escape_string($connection, $_POST['speed']);
    $lcd_size = mysqli_real_escape_string($connection, $_POST['lcd_size']);
    $resolution = mysqli_real_escape_string($connection, $_POST['resolution']);
    $touch_or_non_touch = mysqli_real_escape_string($connection, $_POST['touch_or_non_touch']);
    $ram = mysqli_real_escape_string($connection, $_POST['ram']);
    $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
    $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']);
    $graphic_capacity = mysqli_real_escape_string($connection, $_POST['graphic_capacity']);
    $graphic_type = mysqli_real_escape_string($connection, $_POST['graphic_type']);
    $os = mysqli_real_escape_string($connection, $_POST['os']);
    $condition = mysqli_real_escape_string($connection, $_POST['condition']);
    $selling_type = mysqli_real_escape_string($connection, $_POST['selling_type']);
    $charger = mysqli_real_escape_string($connection, $_POST['charger']);
    $packing_type = mysqli_real_escape_string($connection, $_POST['packing_type']);
    $shipping_method = mysqli_real_escape_string($connection, $_POST['shipping_method']);
    $qty = mysqli_real_escape_string($connection, $_POST['quantity']);
    $unit_price = mysqli_real_escape_string($connection, $_POST['unit_price']);
    $discount = mysqli_real_escape_string($connection, $_POST['discount']);
    $total = mysqli_real_escape_string($connection, $_POST['total']);
    
    $insert_items = "INSERT INTO `sales_quatation_items`(`customer_id`, `device`, `brand`, `model`, `processor`, `core`, `generation`, `speed`, `lcd_size`, `resolution`, `touch_or_non_touch`, 
                                `ram`, `hdd_capacity`, `hdd_type`, `graphic_capacity`, `graphic_type`, `os`, `conditions`, `selling_type`, `charger`, `packing_type`, `shipping_method`, `qty`, `unit_price`, `discount`, `total`, `created_by`)VALUES
                    ('{$customer_table_customer_id}', '{$device}', '{$brand}', '{$model}', '{$processor}', '{$core}', '{$generation}', '{$speed}', '{$lcd_size}', '{$resolution}', '{$touch_or_non_touch}',
                    '{$ram}', '{$hdd_capacity}', '{$hdd_type}', '{$graphic_capacity}', '{$graphic_type}', '{$os}', '{$condition}', '{$selling_type}', '{$charger}', '{$packing_type}', '{$shipping_method}',
                    '{$qty}', '{$unit_price}', '{$discount}', '{$total}', '{$created_by}')";
    $insert_items_run = mysqli_query($connection, $insert_items);

}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header bg-secondary text-uppercase">
                    <i class="fa-solid fa-wallet bg-warning p-2"></i>
                    create quatation
                </div>
                <div class="row m-1">
                    <div class="col-md-6">

                        <fieldset class="mt-2 mb-2">
                            <legend>Please Select Customer</legend>
                            <form method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Choose Customer</label>
                                        <div class="col-sm-8 mt-2">
                                            <select name="customer_id" id="choose_customer"
                                                class="info_select w-50 select2" style="border-radius: 5px;">
                                                <option selected value="">--Select Customer--
                                                </option>
                                                <?php
                                                    $query = "SELECT * FROM sales_customer_information GROUP BY first_name, last_name";
                                                    $result = mysqli_query($connection, $query);

                                                        while ($d = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                            $first_name = $d['first_name'];
                                                            $last_name = $d['last_name'];
                                                ?>
                                                <option value="<?php echo $d["customer_id"]; ?>">
                                                    <?php echo $first_name . " " . $last_name; ?>
                                                </option>
                                                <?php endwhile; ?>
                                            </select>

                                            <button name="get_custmer_details" type="submit"
                                                class="btn btn-sm btn-primary p-0 px-2">Select Customer</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="mt-2 mb-2">
                            <legend>Customer Details</legend>

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Customer
                                    </label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" id="first_name" class="form-control w-50" readonly
                                            value="<?php echo $customer_first_name ?>">
                                        <input type="text" id="last_name" class="form-control w-50 mx-2" readonly
                                            value="<?php echo $customer_last_name ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Company
                                    </label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" class="form-control"
                                            value="<?php echo $customer_company_name ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Email
                                    </label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" class="form-control"
                                            value="<?php echo $customer_company_email ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">UAE
                                        Number</label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" class="form-control"
                                            value="<?php echo $customer_uae_number ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">Country
                                        Number</label>
                                    <div class="col-sm-9 d-flex">
                                        <input type="text" class="form-control mx-2"
                                            value="<?php echo '+' . $customer_country_code . ' ' . $customer_local_number ?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container_fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <form method="POST">
                    <div class="row m-1">
                        <div class="col">
                            <div class="col col-md-12 col-lg-12 mt-2 mb-2">
                                <fieldset>
                                    <legend>Place the Order</legend>

                                    <table class="table table-dark text-uppercase" id="tbl">
                                        <thead>
                                            <tr>
                                                <th>Device</th>
                                                <th>Brand</th>
                                                <th>Model</th>
                                                <th>Processor</th>
                                                <th>Core</th>
                                                <th>Generation</th>
                                                <th>Speed</th>
                                                <th>Screen Size</th>
                                                <th>Resolution</th>
                                                <th>Touch</th>
                                                <th>RAM</th>
                                                <th>HDD Capacity</th>
                                                <th>HDD Type</th>
                                            </tr>
                                        </thead>

                                        <tbody id="tbody" class="table-warning">
                                            <tr>
                                                <td>
                                                    <select name="device" id="device" class=""
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected value="">--Select Device--</option>
                                                        <?php
                                                            $query = "SELECT device FROM warehouse_information_sheet GROUP BY device ASC";
                                                            $result = mysqli_query($connection, $query);

                                                                while ($xd = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                        ?>
                                                        <option value="<?php echo $xd["device"]; ?>">
                                                            <?php echo strtoupper($xd["device"]); ?>
                                                        </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="brand" id="brand" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="model" id="model" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="processor" id="processor" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="core" id="core" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="generation" id="generation" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="speed" id="speed" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="lcd_size" id="lcd_size" class="info_select"
                                                        style="border-radius: 5px; width: 100%;">
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="resolution" style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Resolution--</option>
                                                        <option value="800x600">800 x 600</option>
                                                        <option value="1280x1024">1280 x 1024 (SXGA)</option>
                                                        <option value="1366x768">1366 x 768 (HD)</option>
                                                        <option value="1600x900">1600 x 900 (HD+)</option>
                                                        <option value="1920x1080">1920 x 1080 (FHD)</option>
                                                        <option value="1920x1200">1920 x 1200 (WUXGA)</option>
                                                        <option value="2560x1440">2560 x 1440 (QHD)</option>
                                                        <option value="3440x1440">3440 x 1440 (WQHD)</option>
                                                        <option value="3840x2160">3840 x 2160 (UHD)</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="touch_or_non_touch"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Touch--</option>
                                                        <option value="touch">Touch</option>
                                                        <option value="non_touch">Non Touch</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="ram" style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Ram--</option>
                                                        <option value="2">2GB</option>
                                                        <option value="4">4GB</option>
                                                        <option value="8">8GB</option>
                                                        <option value="16">16GB</option>
                                                        <option value="32">32GB</option>
                                                        <option value="64">64GB</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="number" min="1" class="form-control"
                                                        placeholder="HDD Capacity" name="hdd_capacity">

                                                </td>

                                                <td>
                                                    <select name="hdd_type" style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select HDD Type--</option>
                                                        <option value="pata">PATA/HDD</option>
                                                        <option value="sata">SATA</option>
                                                        <option value="scsi">SCSI</option>
                                                        <option value="ssd">SSD</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-dark text-uppercase" id="tbl">
                                        <thead>
                                            <tr>
                                                <th>Graphic Capacity</th>
                                                <th>Graphic Brand</th>
                                                <th>OS</th>
                                                <th>Condition</th>
                                                <th>Selling Type</th>
                                                <th>Charger</th>
                                                <th>Packing Type</th>
                                                <th>Shipping Method</th>
                                                <th>QTY</th>
                                                <th>Unit Price</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody" class="table-warning">
                                            <tr>
                                                <td>
                                                    <select class="" name="graphic_capacity"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Graphic Capacity--</option>
                                                        <option value="2">2GB</option>
                                                        <option value="4">4GB</option>
                                                        <option value="6">6GB</option>
                                                        <option value="8">8GB</option>
                                                        <option value="mix">Mix</option>
                                                        <option value="n/a">N/A</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="graphic_type"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Graphic Type--</option>
                                                        <option value="intel">Intel</option>
                                                        <option value="amd">Amd</option>
                                                        <option value="nvidia">nVidia</option>
                                                        <option value="mix">Mix</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="os" style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select OS--</option>
                                                        <option value="windows">Test Windows</option>
                                                        <option value="windows">Original Windows 10</option>
                                                        <option value="windows">Original Windows 11</option>
                                                        <option value="ubuntu">Ubuntu</option>
                                                        <option value="linux">Linux</option>
                                                        <option value="ios">IOS</option>
                                                        <option value="chorme_os">Chrome OS</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="condition"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Condition--</option>
                                                        <option value="fully refurbished"
                                                            title="A B C D Painting, LCD No Scratch, Battery Health 80%">
                                                            Fully Refurbished</option>
                                                        <option value="a grade"
                                                            title="A B C D Small Scratch, No Dent, LCD Small Scratch, Battery Health 60%">
                                                            A Grade</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="selling_type"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Selling Type--</option>
                                                        <option value="bulk">Bulk</option>
                                                        <option value="usa_amazon">USA Amazon</option>
                                                        <option value="noon">Noon</option>
                                                        <option value="export">Export</option>
                                                        <option value="uae_amazon">UAE Amazon</option>
                                                        <option value="cartlow">Cartlow</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="charger"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Charger Type--</option>
                                                        <option value="us">US Standard</option>
                                                        <option value="uk">UK Standard</option>
                                                        <option value="eu">EU Standard</option>
                                                        <option value="unos">No Charger</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="packing_type"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Packing Type--</option>
                                                        <option value="single box">Single Box</option>
                                                        <option value="bulk packing">Bulk Packing</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <select class="" name="shipping_method"
                                                        style="border-radius: 5px; width: 100%">
                                                        <option selected>--Select Shipping Method--</option>
                                                        <option value="local pickup">Local Pickup</option>
                                                        <option value="dhl">DHL</option>
                                                        <option value="fedex">Fedex</option>
                                                        <option value="ups">UPS</option>
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="number" min="1" id="quantity" class="form-control"
                                                        placeholder="QTY" name="quantity">
                                                </td>

                                                <td>
                                                    <input type="number" id="unit_price" min="1" class="form-control"
                                                        placeholder="Unit Price" name="unit_price">
                                                </td>
                                                <td>
                                                    <input type="number" id="discount" class="form-control"
                                                        placeholder="Discount" name="discount">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" placeholder="Total"
                                                        name="total" id="total">
                                                </td>

                                                <td>
                                                    <button name="add_items" class="btn btn-sm btn-primary">Add</button>
                                                </td>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mx-auto justify-content-center text-center">
                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#modal-xl"> Order Details
                                        </button>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Order Details Model  -->
<!-- ============================================================== -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Quatation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <legend>Order Details</legend>
                        <table class="table table-dark text-uppercase" id="tbl">
                            <thead>
                                <tr style="font-size: 9px;">
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Resolution</th>
                                    <th>Touch</th>
                                    <th>RAM</th>
                                    <th>HDD Capacity</th>
                                    <th>HDD Type</th>
                                    <th>Ghrphic Capacity</th>
                                    <th>Ghrphic Brand</th>
                                    <th>OS</th>
                                    <th>Condition</th>
                                    <th>Selling Type</th>
                                    <th>Charger</th>
                                    <th>Packing Type</th>
                                    <th>Shipping Type</th>
                                    <th>QTY</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                $query_d = "SELECT * FROM sales_quatation_items WHERE customer_id = $cs_id AND status = '0' AND quatation_id = '0'";
                                $qd = mysqli_query($connection, $query_d);

                                foreach($qd as $qd){
                                    $sales_quatations_items_id = $qd['sales_quatations_items_id'];
                                    $device = $qd['device'];
                                    $brand = $qd['brand'];
                                    $model = $qd['model'];
                                    $processor = $qd['processor'];
                                    $core = $qd['core'];
                                    $generation = $qd['generation'];
                                    $speed = $qd['speed'];
                                    $lcd_size = $qd['lcd_size'];
                                    $resolution = $qd['resolution'];
                                    $touch_or_non_touch = $qd['touch_or_non_touch'];
                                    $ram = $qd['ram'];
                                    $hdd_capacity = $qd['hdd_capacity'];
                                    $hdd_type = $qd['hdd_type'];
                                    $graphic_capacity = $qd['graphic_capacity'];
                                    $graphic_type = $qd['graphic_type'];
                                    $os = $qd['os'];
                                    $condition = $qd['conditions'];
                                    $selling_type = $qd['selling_type'];
                                    $charger = $qd['charger'];
                                    $packing_type = $qd['packing_type'];
                                    $shipping_method = $qd['shipping_method'];
                                    $qty = $qd['qty'];
                                    $unit_price = $qd['unit_price'];
                                    $discount = $qd['discount'];
                                    $total = $qd['total'];                                           
                                        
                            ?>

                                <tr style="font-size: 9px;">
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $brand; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $processor; ?></td>
                                    <td><?php echo $core; ?></td>
                                    <td><?php echo $generation; ?></td>
                                    <td><?php echo $speed; ?></td>
                                    <td><?php echo $lcd_size; ?></td>
                                    <td><?php echo $resolution; ?></td>
                                    <td><?php echo $touch_or_non_touch; ?></td>
                                    <td><?php echo $ram; ?></td>
                                    <td><?php echo $hdd_capacity; ?></td>
                                    <td><?php echo $hdd_type; ?></td>
                                    <td><?php echo $graphic_capacity; ?></td>
                                    <td><?php echo $graphic_type; ?></td>
                                    <td><?php echo $os; ?></td>
                                    <td><?php echo $condition; ?></td>
                                    <td><?php echo $selling_type; ?></td>
                                    <td><?php echo $charger; ?></td>
                                    <td><?php echo $packing_type; ?></td>
                                    <td><?php echo $shipping_method; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $unit_price; ?></td>
                                    <td><?php echo $discount; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td>
                                        <button type='submit' name="remove_certain_item"
                                            class='btn btn-sm btn-danger'>Remove</button>
                                    </td>
                                </tr>
                                <?php } 

                                    $insert_quatation_id = 0;
                                
                                    if(isset($_POST['remove_certain_item'])){
                                        $remove_up = "DELETE FROM sales_quatation_items WHERE sales_quatations_items_id = '$sales_quatations_items_id'";
                                        $remove_run = mysqli_query($connection, $remove_up);

                                        header("Location: create_quatation.php?customer_id=$cs_id");
                                    }   
                                                                                           
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="create_quatation" class="btn btn-success">Create Quatation</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 

if(isset($_POST['create_quatation'])){
$qyer = "SELECT quatation_id FROM sales_quatation_items  ORDER BY quatation_id DESC";
$run = mysqli_query($connection, $qyer);
$insert_quatation_id=0;
foreach($run as $x){
    if($x['quatation_id'] !=0){
        $insert_quatation_id = $x['quatation_id'];
    break;
    }
}
    $insert_quatation_id++;
    $update_q_id = "UPDATE sales_quatation_items SET quatation_id = '$insert_quatation_id' WHERE customer_id = '$cs_id' AND quatation_id = '0'";
    $update_q = mysqli_query($connection, $update_q_id);

    header("Location: create_quatation.php?customer_id=$cs_id");

    
}   
                            
?>


<style>
textarea {
    text-transform: uppercase;
}


.custom-select {
    font-size: 12px;
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}

.select2-selection__rendered {
    line-height: 18px !important;
}

@media (min-width: 1200px) {
    .modal-xl {
        max-width: 1789px;
    }
}

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
}
</style>

<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

})

$(document).ready(function() {
    $("#device").on("change", function() {
        var device = $("#device").val();
        var getURL = "get_quatation_fields.php?device=" + device;
        $.get(getURL, function(data, status) {
            $("#brand").html(data);
        });
    });
});

$(document).ready(function() {
    $("#brand").on("change", function() {
        var brand = $("#brand").val();
        var getURL = "get_quatation_fields.php?brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#model").html(data);
        });
    });
});

$(document).ready(function() {
    $("#model").on("change", function() {
        var model = $("#model").val();
        var getURL = "get_quatation_fields.php?model=" + model;
        $.get(getURL, function(data, status) {
            $("#processor").html(data);
        });
    });
});

$(document).ready(function() {
    $("#processor").on("change", function() {
        var processor = $("#processor").val();
        var getURL = "get_quatation_fields.php?processor=" + processor;
        $.get(getURL, function(data, status) {
            $("#core").html(data);
        });
    });
});

$(document).ready(function() {
    $("#core").on("change", function() {
        var core = $("#core").val();
        var getURL = "get_quatation_fields.php?core=" + core;
        $.get(getURL, function(data, status) {
            $("#generation").html(data);
        });
    });
});

$(document).ready(function() {
    $("#generation").on("change", function() {
        var generation = $("#generation").val();
        var getURL = "get_quatation_fields.php?generation=" + generation;
        $.get(getURL, function(data, status) {
            $("#speed").html(data);
        });
    });
});

$(document).ready(function() {
    $("#speed").on("change", function() {
        var speed = $("#speed").val();
        var getURL = "get_quatation_fields.php?speed=" + speed;
        $.get(getURL, function(data, status) {
            $("#lcd_size").html(data);
        });
    });
});
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>