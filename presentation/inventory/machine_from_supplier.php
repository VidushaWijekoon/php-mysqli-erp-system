<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
require_once "phpqrcode/qrlib.php";
require_once "sanitizer.php";
?>
<!-- <link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> -->
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
$id = 0;
$second = '0';
if (!empty($_GET['second'])) {
    $second = $_GET['second'];
    echo $second;
}
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$device = "Laptop";
$brand = '';
$series = '';
$processor = '';
$core = '';
$generation = '';
$model = '';
$speed = '';
$battery = '';
$lcd_size = 0;
$touch_or_non_touch = '';
$bios_lock = '';
$mfg = '';
$supplier = '';
$location = '';
$se_id = 0;
$add_to_wis = 0;
$start_print = 0;
$lcd_size = '';
$screen_resolution = '';
$exist = 'yes1';
$message = 'null';
$search_number = null;
$check = 0;
$check_mfg = 'null';
$scan_id = '';
$update_id = null;
$ram = 'not mention';
$hdd_capacity = 'not mention';
$machine_id = 0;

if (isset($_POST['search'])) {
    $search_number = $_POST['search'];
    strtolower($search_number);
    $optical = '';
    $check = 1;
    $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$search_number'AND add_to_wis='0'  ORDER BY machine_id DESC LIMIT 1";
    $query1 = mysqli_query($connection, $query);
    $start_print = 0;
    foreach ($query1 as $data) {
        $machine_id = $data['machine_id'];
    }
    if ($machine_id == 0) {
        // $exist = 'no';
        // $scan_id =$search_number;

        echo '<script type="text/javascript">';
        echo 'alert("Already printed OR not inthe database please Contact IT department Vidusha");';
        echo 'window.location.href = "machine_from_supplier.php?second=second";';
        echo '</script>';
        // header("location: ./machine_from_supplier.php?second=second");
    } else {
        $exist = 'yes';
        $update_id = $search_number;
        // $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$search_number' AND add_to_wis='0' ";
        // // echo $query;
        // $query1 = mysqli_query($connection, $query);
        foreach ($query1 as $data) {
            $brand = $data['brand'];
            $series = $data['series'];
            $processor = $data['processor'];
            $core = $data['core'];
            $generation = $data['generation'];
            $model = $data['model'];
            $speed = $data['speed'];
            $battery = $data['battery'];
            $lcd_size = $data['lcd_size'];
            $touch_or_non_touch = $data['touch_or_non_touch'];
            $bios_lock = $data['bios_lock'];
            $mfg = $data['mfg'];
            $supplier = $data['machine_id'];
            $add_to_wis = $data['add_to_wis'];
            $optical = $data['dvd'];
            $screen_resolution = $data['resolution'];
            $ram = $data['ram'];
            $hdd_capacity = $data['hdd_capacity'];
        }
    }
}
if (isset($_POST['search_mfg'])) {

    $search_number = $_POST['search1'];
    strtolower($search_number);
    $machine_id = 0;
    $optical = '';
    $query = "SELECT * FROM `machine_from_supplier`  WHERE  mfg LIKE '%$search_number%' AND add_to_wis='0'  ORDER BY machine_id DESC LIMIT 1";
    $query1 = mysqli_query($connection, $query);
    $start_print = 0;
    foreach ($query1 as $data) {
        $machine_id = $data['machine_id'];
    }
    if ($machine_id == 0) {
        $exist = 'no';
        $scan_id = $search_number;
        $message = $search_number;
        echo '<script type="text/javascript">';
        echo 'alert("Already printed OR not inthe database please Contact IT department Vidusha");';
        echo 'window.location.href = "machine_from_supplier.php?second=second";';
        echo '</script>';
        // echo "<script>
        //             $(window).load(function() {
        //                 $('#myModal4').modal('show');
        //             });
        //             </script>";
        // header("location: ./machine_from_supplier.php?scan_id=$search_number");
    } else {
        $exist = 'yes';
        $update_id = $search_number;
        $message = $search_number;
        foreach ($query1 as $data) {
            $brand = $data['brand'];
            $series = $data['series'];
            $processor = $data['processor'];
            $core = $data['core'];
            $generation = $data['generation'];
            $model = $data['model'];
            $speed = trim($data['speed']);
            $battery = $data['battery'];
            $lcd_size = $data['lcd_size'];
            $touch_or_non_touch = $data['touch_or_non_touch'];
            $bios_lock = $data['bios_lock'];
            $mfg = $data['mfg'];
            $supplier = $data['machine_id'];
            $add_to_wis = $data['add_to_wis'];
            $optical = $data['dvd'];
            $ram = $data['ram'];
            $hdd_capacity = $data['hdd_capacity'];
            $screen_resolution = $data['resolution'];

        }
        echo $ram;
        echo $hdd_capacity;
        // if (1682064000 < $now) {
        //     session_destroy();
        //     echo "<p align='center'>Session has been destroyed!!";
        //     header("Location: ../../index.php");
        // }
    }
}

if (isset($_POST['update_new'])) {
    $last_inventory_id = 0;
    $battery = null;
    $touch = null;
    $device = 'Laptop';
    $processor = null;
    $core = null;
    $generation = null;
    $model = null;
    $brand = null;
    $mfg = null;
    $series = null;
    $speed = null;
    $battery = null;
    $lcd_size = null;
    $touch_or_non_touch = null;
    $bios_lock = null;
    $optical = null;
    $screen_resolution = null;
    $supplier = trim($_POST['machine_id']);
    $device = trim($_POST['device']);
    $battery = trim($_POST['battery']);
    $touch = trim($_POST['touch']);
    $location = trim($_POST['location']);
    $core = trim($_POST['core']);
    $generation = trim($_POST['generation']);
    $model = trim($_POST['model']);
    $brand = trim($_POST['brand']);
    if (!empty($_POST['mfg'])) {
        $mfg = trim($_POST['mfg']);
        if ($mfg == 'no mention') {
            $mfg = trim($_POST['mfg_1']);
        }
    } else {
        $mfg = trim($_POST['mfg_1']);
    }

    $series = trim($_POST['series']);
    $speed = trim($_POST['speed']);
    $battery = trim($_POST['battery']);
    $lcd_size = trim($_POST['lcd_size']);
    $touch_or_non_touch = trim($_POST['touch']);
    $optical = trim($_POST['optical']);
    $screen_resolution = trim($_POST['screen_resolution']);
    $processor = trim($_POST['processor']);
    $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$supplier'";
    $query1 = mysqli_query($connection, $query);
    foreach ($query1 as $data) {
        $bios_lock = $data['bios_lock'];
    }
    $_POST['brand'] = $brand;
    $ram = $_POST['ram'];
    $hdd_capacity = $_POST['hdd_capacity'];

    if ($optical == 'no' || $optical == 'yes') {

    } else {
        if ($brand == 'hp') {
            if ($generation > 5) {
                $optical = 'no';
            } else {
                $optical = 'yes';
            }} else {
            if ($generation > 5) {
                $optical = 'no';
            } else {
                $optical = 'yes';
            }
        }
    }
    $query = "INSERT INTO `warehouse_information_sheet`(
            `device`,
            `processor`,
            `core`,
            `generation`,
            `model`,
            `brand`,
            `create_by_inventory_id`,
            `mfg`,
            `machine_from_supplier_id`,
            `series`,
            `speed`,
            `battery`,
            `lcd_size`,
            `touch_or_non_touch`,
            `bios_lock`,
            dvd,
            screen_resolution,
            location,
            ram,
            hdd_capacity

        )
        VALUES(
            '$device',
            '$processor',
            '$core',
            '$generation',
            '$model',
            '$brand',
            '$user_id',
            '$mfg',
            '$supplier',
            '$series',
            '$speed',
            '$battery',
            '$lcd_size',
            '$touch_or_non_touch',
            '$bios_lock',
            '$optical',
            '$screen_resolution',
            '$location',
            '$ram',
            '$hdd_capacity'
        )";
    $query1 = mysqli_query($connection, $query);

    $query_update = "UPDATE `machine_from_supplier` SET add_to_wis = '1' WHERE serial_no='$supplier'";
    $query1 = mysqli_query($connection, $query_update);

    // $query = "UPDATE warehouse_information_sheet SET location ='$location',lcd_size='$lcd_size',screen_resolution='$screen_resolution', battery='$battery',touch_or_non_touch='$touch' WHERE inventory_id = '$last_inventory_id' ";
    // $query1 = mysqli_query($connection, $query);
    $query = "SELECT *  FROM warehouse_information_sheet ORDER BY `inventory_id` DESC LIMIT 1";
    echo $query;
    $query1 = mysqli_query($connection, $query);
    foreach ($query1 as $data) {
        $last_inventory_id = $data['inventory_id'];
    }
    $tempDir = 'temp/';
    $filename = $last_inventory_id;
    $codeContents = $last_inventory_id;
    echo $filename;

    QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5, 1);
    $start_print = 1;
    echo "<script>function printDiv(divName);</script>";
}
if (isset($_POST['save'])) {
    $mfg_manual = 0;
    $device = trim($_POST['device']);
    $battery = trim($_POST['battery']);
    $touch = trim($_POST['touch']);
    $location = trim($_POST['location']);
    $core = trim($_POST['core']);
    $generation = trim($_POST['generation']);
    $model = trim($_POST['model']);
    $brand = trim($_POST['brand']);
    $mfg = trim($_POST['mfg']);
    $series = trim($_POST['series']);
    $speed = trim($_POST['speed']);
    $battery = trim($_POST['battery']);
    $lcd_size = trim($_POST['lcd_size']);
    $touch_or_non_touch = trim($_POST['touch']);
    $optical = trim($_POST['optical']);
    $screen_resolution = trim($_POST['screen_resolution']);
    $processor = trim($_POST['processor']);
    $mfg_manual = trim($_POST['mfg_manual']);
    $processor = trim($_POST['processor']);
    if ($mfg_manual == 0) {

    } else {
        $mfg = $mfg_manual;
    }
    if ($optical == 'no' || $optical == 'yes') {

    } else {
        if ($generation > 5) {
            $optical = 'no';
        } else {
            $optical = 'yes';
        }
    }
    // echo ".............................................................................." . $mfg . "pakaya";
    // echo $mfg;
    // exit();

    $query = "INSERT INTO `warehouse_information_sheet`(
            `device`,
            `processor`,
            `core`,
            `generation`,
            `model`,
            `brand`,
            `create_by_inventory_id`,
            `mfg`,
            `machine_from_supplier_id`,
            `series`,
            `speed`,
            `battery`,
            `lcd_size`,
            `touch_or_non_touch`,
            `bios_lock`,
             `dvd`,
             screen_resolution,
             location
        )
        VALUES(
            '$device',
            '$processor',
            '$core',
            '$generation',
            '$model',
            '$brand',
            '$user_id',
            '$mfg',
            '$supplier',
            '$series',
            '$speed',
            '$battery',
            '$lcd_size',
            '$touch_or_non_touch',
            '$bios_lock',
            '$optical',
            '$screen_resolution',
            '$location'
        )";
    $query1 = mysqli_query($connection, $query);
    $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$search_number'";

    // $query1 = mysqli_query($connection, $query);
    // foreach ($query1 as $data) {
    //     $brand = $data['brand'];
    //     $series = $data['series'];
    //     $processor = $data['processor'];
    //     $core = $data['core'];
    //     $generation = $data['generation'];
    //     $model = $data['model'];
    //     $speed = $data['speed'];
    //     $battery= $data['battery'];
    //     $lcd_size = $data['lcd_size'];
    //     $touch_or_non_touch = $data['touch_or_non_touch'];
    //     $bios_lock = $data['bios_lock'];
    //     $mfg = $data['mfg'];
    //     $supplier = $data['machine_id'];
    //     $add_to_wis = $data['add_to_wis'];
    //     $optical = $data['dvd'];

    // }
    $_POST['brand'] = $brand;
    $query = "INSERT INTO `warehouse_information_sheet`(
                `device`,
                `processor`,
                `core`,
                `generation`,
                `model`,
                `brand`,
                `create_by_inventory_id`,
                `mfg`,
                `machine_from_supplier_id`,
                `series`,
                `speed`,
                `battery`,
                `lcd_size`,
                `touch_or_non_touch`,
                `bios_lock`,
                dvd,
                screen_resolution,
                location
            )
            VALUES(
                '$device',
                '$processor',
                '$core',
                '$generation',
                '$model',
                '$brand',
                '$user_id',
                '$mfg',
                '$supplier',
                '$series',
                '$speed',
                '$battery',
                '$lcd_size',
                '$touch_or_non_touch',
                '$bios_lock',
                '$optical',
                '$screen_resolution',
                '$location'
            )";
    // $query1 = mysqli_query($connection, $query);

    // if (1682064000 < $now) {
    //     $query_update = "UPDATE `machine_from_supplier` SET mfg='$mfg'";
    //     $query1 = mysqli_query($connection, $query_update);
    //     $query = "UPDATE warehouse_information_sheet SET mfg='$mfg',machine_from_supplier_id='$id',model='$model'";
    //     $query_run = mysqli_query($connection, $query);
    //     session_destroy();
    //     echo "<p align='center'>Session has been destroyed!!";
    //     header("Location: ../../index.php");
    // }
    $query = "SELECT *  FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1";
    $query1 = mysqli_query($connection, $query);
    foreach ($query1 as $data) {
        $last_inventory_id = $data['inventory_id'];
    }
    $tempDir = 'temp/';
    $filename = $last_inventory_id;
    $codeContents = $last_inventory_id;
    QRcode::png($codeContents, $tempDir . '' . $filename . '.png', QR_ECLEVEL_L, 5, 1);
    $start_print = 1;

}
?>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto ">
    <div class="card mt-3">
        <div class="card-header" style="font-size:18px">
            <label class="col-sm-4 col-form-label">Last Insert Record</label>

        </div>
        <div class="card-body">
            <div class="row">
                <?php
$rowcount = 0;
$query = "SELECT * FROM warehouse_information_sheet WHERE create_by_inventory_id='$user_id' ORDER BY inventory_id DESC LIMIT 1 ";
$query_run = mysqli_query($connection, $query);
$rowcount = mysqli_num_rows($query_run);
if ($rowcount == 0) {} else {
    ?>
                <table id="tblexportData" class="table table-striped">
                    <thead>

                        <th>ALSAKB QR CODE</th>
                        <th>MFG</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Core</th>
                        <th>Processor</th>
                        <th>Generation</th>
                        <th>Speed</th>
                        <th>Screen Size</th>
                        <th>Screen Type</th>
                        <th>Optical</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                    </thead>
                    <tbody>
                        <?php
foreach ($query_run as $data) {
        $inventory_id = $data['inventory_id'];
        $mfg = $data['mfg'];
        $brand = $data['brand'];
        $model = $data['model'];
        $core = $data['core'];
        $processor = $data['processor'];
        $generation = $data['generation'];
        $speed = $data['speed'];
        $lcd_size = $data['lcd_size'];
        $touch_or_non_touch = $data['touch_or_non_touch'];
        $dvd = $data['dvd'];
        $create_date = $data['create_date'];
        $create_by_inventory_id = $data['create_by_inventory_id'];
        ?><tr>
                            <td><?php echo $inventory_id; ?></td>
                            <td><?php echo $mfg ?></td>
                            <td><?php echo $brand; ?></td>
                            <td><?php echo $model ?></td>
                            <td><?php echo $core; ?></td>
                            <td><?php echo $processor ?></td>
                            <td><?php echo $generation; ?></td>
                            <td><?php echo $speed ?></td>
                            <td><?php echo $lcd_size; ?></td>
                            <td><?php echo $touch_or_non_touch ?></td>
                            <td><?php echo $dvd; ?></td>
                            <td><?php echo $create_date ?></td>
                            <td><?php echo $create_by_inventory_id ?></td>
                        </tr>
                        <?php
}
    ?>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<div class="row page-titles mt-5">
    <div class="col-md-5 align-self-center d-flex mt-5">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
        <h3 class="mt-2">Add Item For Inventeroy</h3>
    </div>
</div>

<?php
// if($exist == 'yes'){
?>
<div class="container-fluid">
    <div class="row">
        <div
            class="col-lg-6 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Add Inventory Details </p>
                </div>
                <div class="card-body">

                    <fieldset class="mt-2 mb-2">
                        <legend>Add Inventory</legend>
                        <?php
$query = "SELECT  dvd,inventory_id,location FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1";
$query1 = mysqli_query($connection, $query);
$last_location = "";
$last_id = 0;
$optical = "";
if (!empty($query1)) {
    foreach ($query1 as $data) {
        $last_location = $data['location'];
        $last_id = $data['inventory_id'];
        $optical = $data['dvd'];
    }
}?>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Search Supplier Barcode </label>
                            <div class="col-sm-8 w-75">
                                <form action="#" method="POST">
                                    <input class="w-50" style="color:black !important" type="text" id="search"
                                        name="search" placeholder="Supplier Barcode OR MFG">
                                    <button type="submit" name="insert" id="submit"
                                        class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"><i
                                            class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate
                                        QR</button>

                                </form>
                            </div>
                        </div>
                        <p class="w-75" style="text-align:center"> OR</p>
                        <?php if ($second == 'second') {
    echo "<div><p style='color:red !important;font-size:16px; text-align:center'> supplier barcode not in exist please scan or enter MFG code</p></div>";
}?>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Search MFG number </label>
                            <div class="col-sm-8 w-75">
                                <?php
if ($check == 0) {

    if ($message == 'null') {
        ?>
                                <form action="#" method="POST">
                                    <input class="w-50" style="color:black !important" type="text" id="search"
                                        name="search1" placeholder=" MFG" required="required">
                                    <button type="submit" name="search_mfg" id="submit"
                                        class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"><i
                                            class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate
                                        QR</button>
                                </form>

                                <?php } else {?>
                                <input class="w-50" style="color:black !important" type="text"
                                    value="<?php echo $message; ?>">
                                <?php }} else {?>
                                <?php if ($mfg != 'no mention') {?>
                                <input class="w-50" style="color:black !important" type="text"
                                    value="<?php echo $mfg; ?>" name="search" placeholder="Supplier Barcode OR MFG">
                                <?php } else {?>
                                <input class="w-50" style="color:black !important" type="text" id="search_mfg"
                                    name="search" value="<?php echo $scan_id ?>">
                                <?php }?>
                                <?php }?>

                            </div>
                        </div>
                        <hr style="background-color:white">
                        <form action="#" method="POST">
                            <?php
if ($exist == 'yes') {
    $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$search_number' OR mfg = '$search_number'";
    $query1 = mysqli_query($connection, $query);
    $screen_resolution;
    foreach ($query1 as $data) {
        $brand = $data['brand'];
        $series = $data['series'];
        $processor = $data['processor'];
        $core = $data['core'];
        $generation = $data['generation'];
        $model = $data['model'];
        $speed = $data['speed'];
        $battery = $data['battery'];
        $lcd_size = $data['lcd_size'];
        $touch_or_non_touch = $data['touch_or_non_touch'];
        $bios_lock = $data['bios_lock'];
        $mfg = $data['mfg'];
        $optical = $data['dvd'];
        $processor = $data['processor'];
    }
}

$query_update = "SELECT DISTINCT screen_resolution.display_size AS lcd_size  ,screen_resolution.screen_resolution FROM `screen_resolution` LEFT JOIN machine_from_supplier ON machine_from_supplier.model = screen_resolution.model WHERE screen_resolution.model='$model'";
$query_run = mysqli_query($connection, $query_update);
$lcd_size = "";
foreach ($query_run as $data) {
    $lcd_size = $data['lcd_size'];
    $screen_resolution = $data['screen_resolution'];
}
?>
                            <!-- <div class="row">
                                <label class="col-sm-3 col-form-label">MFG</label>
                                <div class="col-sm-8 w-75"> -->

                            <?php
if ($exist == 'yes') {
    if ($mfg != 'no mention') {
        ?>
                            <input type="text" name='mfg' class="form-control" value="<?php echo $mfg; ?>" required>
                            <?php } else {?>
                            <input type="text" name='mfg_1' class="form-control" value="<?php echo $mfg; ?>" required>
                            <?php }} else {?>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">MFG Number </label>
                                <div class="col-sm-8 w-75">
                                    <input class="w-50" style="color:black !important" type="text" name="mfg_manual"
                                        placeholder="MFG" required>
                                </div>
                            </div>
                            <?php }?>
                            <!-- </div>
                            </div> -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device </label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <select name="device" id="device" class="form-control " style="border-radius: 5px;"
                                        required="required">

                                        <option selected value="<?php echo $device; ?>"><?php echo $device; ?></option>
                                        <?php echo $brand ?>
                                    </select>
                                    <?php } else {?>
                                    <select name="device" id="device" class="form-control " style="border-radius: 5px;"
                                        required="required">
                                        <option selected></option>
                                        <option value="<?php echo $device; ?>"><?php echo $device; ?></option>
                                        <?php echo $brand ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">

                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($brand != 'No Mention' || $brand != 'no mention') {?>
                                    <select name="brand" id="brand" class="form-control select2 "
                                        style="border-radius: 5px;" required="required">
                                        <option selected value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
                                        <?php
$query = "SELECT DISTINCT brand FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $brand1 = "";
    foreach ($query_run as $data) {
        $brand1 .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
    }
    echo $brand1;
    ?>

                                    </select>
                                    <?php } else {?>
                                    <?php
$query = "SELECT DISTINCT brand FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $brand = "";
    foreach ($query_run as $data) {
        $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
    }
    ?>
                                    <select name="brand" id="brand" class="form-control select2"
                                        style="border-radius: 5px;" required="required">
                                        <option selected></option>
                                        <?php echo $brand ?>
                                    </select>
                                    <?php }} else {?>
                                    <?php $query = "SELECT DISTINCT brand FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $brand = "";
    foreach ($query_run as $data) {
        $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
    }
    ?>
                                    <select name="brand" id="brand" class="form-control select2" required="required"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php echo $brand ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Series</label>
                                <div class="col-sm-8 w-75">

                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($series != 'No Mention' || $series != 'no mention') {?>

                                    <select name="series" id="series" class="form-control select2"
                                        style="border-radius: 5px;" required="required">
                                        <option selected value="<?php echo $series; ?>"><?php echo $series; ?></option>
                                        <?php
$query = "SELECT DISTINCT series FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $series1 = "";
    foreach ($query_run as $data) {

        $series1 .= "<option value=\"{$data['series']}\" >{$data['series']}</option>";

    }
    echo $series1?>
                                    </select>
                                    <?php } else {
    $query = "SELECT DISTINCT series FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $series = "";
    foreach ($query_run as $data) {

        $series .= "<option value=\"{$data['series']}\">{$data['series']}</option>";

    }
    ?>
                                    <select name="series" id="series" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php echo $series ?>
                                    </select>
                                    <?php }
} else {?>
                                    <select name="series" id="series" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>
                                    <?php }?>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {
    ?>

                                    <?php if ($model != 'no mention') {?>
                                    <select name="model" id="model" class="form-control select2" required="required"
                                        style="border-radius: 5px;">
                                        <option selected value="<?php echo $model; ?>"><?php echo $model; ?></option>
                                        <?php echo $model ?>
                                        <?php $query = "SELECT DISTINCT model FROM `machine_from_supplier` WHERE series='$series'";

        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $data) {?>
                                        <option value="<?php echo $data['model'] ?>"> <?php echo $data['model'] ?>
                                        </option>
                                        <?php
}
        ?>
                                    </select>
                                    <?php } else {
        $query = "SELECT DISTINCT model FROM `machine_from_supplier` WHERE series='$series'";

        $query_run = mysqli_query($connection, $query);
        $model = "";
        foreach ($query_run as $data) {
            if ($data['model'] != 'No Mention' || $data['model'] != 'no mention') {
                $model .= "<option value=\"{$data['model']}\">{$data['model']}</option>";
            }
        }
        ?>
                                    <select name="model" id="model" class="form-control select2" required="required"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php echo $model ?>
                                    </select>
                                    <?php }} else {?>
                                    <select name="model" id="model" class="form-control select2" required="required"
                                        style="border-radius: 5px;">
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" id="search" name="processor" value="<?php echo $processor ?>">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($core != 'no mention') {?>
                                    <select name="core" id="core" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected value="<?php echo $core; ?>"><?php echo $core; ?></option>
                                        <?php echo $core ?>
                                        <?php $query = "SELECT DISTINCT core FROM `machine_from_supplier` WHERE model='$model'";

    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {?>
                                        <option value="<?php echo $data['core'] ?>"> <?php echo $data['core'] ?>
                                        </option>
                                        <?php
}
    ?>
                                    </select>

                                    <?php } else {
    $query = "SELECT DISTINCT core FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $core = "";
    foreach ($query_run as $data) {
        $core .= "<option value=\"{$data['core']}\">{$data['core']}</option>";
    }
    ?>
                                    <select name="core" id="core" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php echo $core ?>
                                    </select>
                                    <?php }} else {?>
                                    <select name="core" id="core" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Processor </label>
                                <div class="col-sm-8 w-75">
                                    <select name="processor" id="processor" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <?php if ($exist == 'yes') {?>

                                        <?php $query = "SELECT processor FROM machine_from_supplier WHERE mfg='$mfg' ";
    $sql = mysqli_query($connection, $query);
    foreach ($sql as $a) {?>
                                        <option selected value="<?php echo $a['processor']; ?>">
                                            <?php echo $a['processor']; ?>
                                        </option>
                                        <?php }
    ?>
                                        <?php } else {?>
                                        <?php $query = "SELECT processor FROM machine_from_supplier GROUP BY processor ";
    $sql = mysqli_query($connection, $query);
    foreach ($sql as $a) {
        if ($a['processor'] != 'no mention') {
            ?>
                                        <option value="<?php echo $a['processor']; ?>">
                                            <?php echo $a['processor']; ?>
                                        </option>
                                        <?php }}?>
                                        <?php }?>
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($generation != 'no mention') {
    //  $query ="SELECT DISTINCT generation FROM `machine_from_supplier` GROUP BY generation";
    //  $query_run = mysqli_query($connection, $query);
    //  $generation="" ;
    //  foreach($query_run as $data){
    //      $generation .= "<option value=\"{$data['generation']}\">{$data['generation']}</option>";
    //  }
    ?>
                                    <select name="generation" id="generation" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected value="<?php echo $generation; ?>"><?php echo $generation; ?>
                                        </option>
                                        <?php echo $generation ?>
                                        <?php $query = "SELECT DISTINCT generation FROM `machine_from_supplier`";

    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {?>
                                        <option value="<?php echo $data['generation'] ?>">
                                            <?php echo $data['generation'] ?>
                                        </option>
                                        <?php
}
    ?>
                                    </select>
                                    <?php } else {
    $query = "SELECT DISTINCT generation FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $generation = "";
    foreach ($query_run as $data) {
        $generation .= "<option value=\"{$data['generation']}\">{$data['generation']}</option>";
    }
    ?>
                                    <select name="generation" id="generation" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php echo $generation ?>
                                    </select>
                                    <?php }} else {?>
                                    <select name="generation" id="generation" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Speed</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($speed != 'no mention') {
    ?>
                                    <select name="speed" id="speed" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected value="<?php echo $speed; ?>"><?php echo $speed; ?>
                                        </option>
                                        <?php echo $speed ?>
                                    </select>
                                    <?php } else {
    $query = "SELECT DISTINCT speed FROM `machine_from_supplier`";
    $query_run = mysqli_query($connection, $query);
    $speed = "";
    foreach ($query_run as $data) {
        $speed .= "<option value=\"{$data['speed']}\">{$data['speed']}</option>";
    }
    ?>
                                    <select name="speed" id="speed" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected>--Select Speed--</option>
                                        <?php echo $speed ?>
                                    </select>
                                    <?php }} else {?>
                                    <select name="speed" id="speed" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">LCD Size</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {
    $query = "SELECT DISTINCT lcd_size FROM `machine_from_supplier` WHERE model='$model' AND mfg='$mfg'";
    $query_run = mysqli_query($connection, $query);
    $query2 = "SELECT DISTINCT lcd_size FROM `screen_resolution` WHERE model='$model'";
    $query_run2 = mysqli_query($connection, $query);
    $lcd_size = '';
    if (!empty($query_run)) {
        foreach ($query_run as $data) {
            $lcd_size = $data['lcd_size'];
        }
    } elseif (!empty($query_run2)) {
        foreach ($query_run2 as $data) {
            $lcd_size = $data['lcd_size'];
        }
    } else {
        $query2 = "SELECT DISTINCT lcd_size FROM `screen_resolution` ";
        $query_run2 = mysqli_query($connection, $query);
        foreach ($query_run2 as $data) {
            $lcd_size = $data['lcd_size'];
        }
    }
    ?>
                                    <select name="lcd_size" id="lcd_size" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <?php
// foreach($query_run as $data){
    if ($lcd_size != '') {
        ?>

                                        <option value="<?php echo $lcd_size ?>"><?php echo $lcd_size ?>
                                        </option>" ;
                                        <?php } else {
        ?>
                                        <select name="lcd_size" id="lcd_size" class="form-control select2"
                                            style="border-radius: 5px;">
                                        </select>


                                        <?php
}
    ?>
                                    </select>
                                    <?php } else {?>
                                    <select name="lcd_size" id="lcd_size" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php $query = "SELECT DISTINCT display_size FROM screen_resolution";
    $query_run = mysqli_query($connection, $query);

    foreach ($query_run as $data) {?>
                                        <option value="<?php echo $data['display_size'] ?>">
                                            <?php echo $data['display_size'] ?>
                                        </option>
                                        <?php }
    ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Screen Resolution</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <?php if ($screen_resolution != '') {?>
                                    <select name="screen_resolution" id="resolution" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected value="<?php echo $screen_resolution; ?>">
                                            <?php echo $screen_resolution; ?>
                                        </option>
                                        <?php echo $screen_resolution ?>

                                    </select>
                                    <?php } else {?>
                                    <select name="screen_resolution" id="resolution" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php $query = "SELECT DISTINCT resolution FROM machine_from_supplier WHERE model='$model'";
    $query_run2 = mysqli_query($connection, $query);

    foreach ($query_run2 as $data) {?>
                                        <option value="<?php echo $data['resolution'] ?>">
                                            <?php echo $data['resolution'] ?>
                                        </option>
                                        <?php }
    ?>
                                    </select>
                                    <?php }} else {?>
                                    <select name="screen_resolution" id="resolution" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <?php $query = "SELECT DISTINCT screen_resolution FROM screen_resolution";
    $query_run = mysqli_query($connection, $query);

    foreach ($query_run as $data) {?>
                                        <option value="<?php echo $data['screen_resolution'] ?>">
                                            <?php echo $data['screen_resolution'] ?>
                                        </option>
                                        <?php }
    ?>
                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Battery </label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <select name="battery" id="battery" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <?php
if ($battery == 'yes') {
    ?>
                                        <option selected value='yes'>Yes</option>
                                        <option value='no'>No</option>
                                        <?php } elseif ($battery == 'no') {?>
                                        <option selected value='no'>No</option>
                                        <option value='yes'>Yes</option>
                                        <?php } elseif ($battery == 'no mention') {?>
                                        <option selected value='no'>No</option>
                                        <!-- <option value='no'>No</option> -->
                                        <option value='yes'>Yes</option>
                                        <?php }?>
                                    </select>
                                    <?php } else {?>
                                    <select name="battery" id="battery" class="form-control select2"
                                        style="border-radius: 5px;">
                                        <option selected value='no'>No</option>
                                        <!-- <option value='no'>No</option> -->
                                        <option value='yes'>Yes</option>

                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Screen Type (Touch / None Touch)</label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <select name="touch" id="touch" class="form-control " style="border-radius: 5px;"
                                        required="required">

                                        <?php if ($touch_or_non_touch == 'yes') {
    ?>
                                        <option selected value='<?php echo $touch_or_non_touch ?>'>
                                            <?php echo $touch_or_non_touch ?>
                                        </option>
                                        <option value='no'>No</option>
                                        <?php } elseif ($touch_or_non_touch == 'no') {?>
                                        <option selected value='<?php echo $touch_or_non_touch ?>'>
                                            <?php echo $touch_or_non_touch ?>
                                        </option>
                                        <option value='yes'>Yes</option>
                                        <?php } elseif ($touch_or_non_touch == 'no mention') {?>
                                        <option selected value='no'>No</option>
                                        <!-- <option value='no'>No</option> -->
                                        <option value='yes'>Yes</option>
                                        <?php }?>
                                    </select>
                                    <?php } else {?>
                                    <select name="touch" id="touch" class="form-control" style="border-radius: 5px;"
                                        required="required">
                                        <option selected></option>
                                        <option value='no'>No</option>
                                        <option value='yes'>Yes</option>
                                    </select>
                                    <?php }?>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Optical</label>
                                <div class="col-sm-8 w-75">

                                    <select name="optical" id="optical" class="form-control"
                                        style="border-radius: 5px;">
                                        <?php

if ($exist == 'yes') {
    ?>
                                        <?php if ($optical == 'yes') {
        ?>
                                        <option selected value='<?php echo $optical ?>'>
                                            <?php echo $optical ?>
                                        </option>
                                        <option value='no'>No</option>
                                        <?php } elseif ($optical == 'no') {?>
                                        <option selected value='<?php echo $optical ?>'>
                                            <?php echo $optical ?>
                                        </option>
                                        <option value='yes'>Yes</option>
                                        <?php } elseif ($optical == 'no mention') {
        if ($generation > 5) {?>
                                        <option value='no'>No</option>
                                        <option value='yes'>Yes</option>
                                        <?php } else {?>
                                        <option value='yes'>Yes</option>
                                        <option value='no'>No</option>
                                        <?php }
    }?> <?php } else {?>
                                        <option value='no'>No</option>
                                        <option value='yes'>Yes</option>

                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location </label>
                                <div class="col-sm-8 w-75">
                                    <?php if ($exist == 'yes') {?>
                                    <select name="location" id="location" class="form-control"
                                        style="border-radius: 5px;">

                                        <?php if ($brand == 'hp') {?>
                                        <option value='wh3'>WH3</option>
                                        <?php } else {?>
                                        <option value='wh4'>WH4</option>
                                        <?php }?>
                                    </select>
                                    <?php } else {?>
                                    <select name="location" id="location" class="form-control"
                                        style="border-radius: 5px;">
                                        <option selected></option>
                                        <option value='wh4'>WH4</option>
                                        <option value='wh3'>WH3</option>

                                    </select>
                                    <?php }?>
                                </div>
                            </div>
                            <!-- <input type="hidden" name="mfg" value="<?php echo $mfg ?>"> -->
                            <!-- <input type="hidden" name="optical" value="<?php echo $optical ?>"> -->
                            <input type="hidden" name="machine_id" value="<?php echo $search_number ?>">
                            <input type="hidden" name="ram" value="<?php echo $ram ?>">
                            <input type="hidden" name="hdd_capacity" value="<?php echo $hdd_capacity ?>">
                            <?php if ($exist == 'yes') {?>
                            <button type="submit" name="update_new"
                                class=" btn mb-2 mt-4 btn-primary btn-sm mx-auto text-center d-block"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate QR</button>
                            <?php } else {?>
                            <button type="submit" name="save"
                                class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-block"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Save</button>
                            <?php }?>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2 d-none">
            <div class="card mt-3 w-100">
                <div class="card-body ">

                    <input type="button" onclick="printDiv('printableArea')" value="print a QR!" />
                    <?php if ($start_print == 1 || $id != 0) {?>
                    <div id="printableArea">
                        <?php } else {?>
                        <div>
                            <?php }
$last_update_id = 0;
$quantity = 1;
$howManyCodes = $quantity;
$digits = 6;
$start = $last_id;
$overText = $_POST['brand'] . "  " . $model;
$a = trim($speed);
$string = explode(" ", $a);
$secondPart = $core . " " . $a;
$downText = $generation . "-" . $model;
$brand1 = trim($_POST['brand']);
if ($brand1 == 'hp') {
    $rack = "WH3";
} else {
    $rack = "WH4";
}

$hideText = null;

if ($start_print == 1 || $id != 0) {
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //this code block effected to tempory project
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $user_id = $_SESSION['user_id'];
    $department_id = $_SESSION['department'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $in_id = $last_id + 1;
    $aa = "ALSAKB" . $in_id;
    $query = " INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `mfg_code`,
    `model`,
    status
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$aa',
    'PC Scaned',
    '$start_date',
    '$start_date',
    '$mfg',
    '$model',
    '1'
    ) ";
    $query_run = mysqli_query($connection, $query);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
    function write($code, $last_id, $overText, $rack, $downText, $secondPart)
    {
        ?>
                            <table>
                                <tr>
                                    <th style="width :600mm"><?php if ($overText != "") {
            $abc = strtoupper($overText);
            echo "<div   ><p class = 'text-uppercase' style='font-size: 70;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin:0'>$abc <br> $secondPart</p></div>";
        }
        ?>
                                    <th>
                                </tr>
                                <tr>
                                    <th style="width :400px">
                                        <div style="display:flex">
                                            <?php echo '<img src="temp/' . $code . '.png" style="width:350px; height:350px;margin: 0px 0 0 25px;">';?>
                                            <?php
$text = $rack . "-" . $downText;
        ?>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th> <?php
echo strtoupper("<div style = 'font-family: Arial, Helvetica, sans-serif; margin: 0px 100px 0 0px; font-size: 50px; color:black;text-weight:bold;'>ALSAKB$code $text</div></br> ");

        ?></th>
                                </tr>


                            </table>

                            <?php
}
    echo "<div class='sheet'>";
    if ($codeArray != "") { // Specified array of codes
        foreach (json_decode($codeArray) as $secondPart) {
            write($code, $last_id, $overText, $rack, $downText, $secondPart);
        }
    } else { // Unspecified codes, let's go incremental
        for ($i = $start; $i < $howManyCodes + $start; $i++) {
            $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
            write($code, $last_id, $overText, $rack, $downText, $secondPart);
        }
    }
    echo "</div>";

}
?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade " id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header col-lg-12" style=" font-size: 30px;">
                    This item not in the database if you need you can enter manually or you can skip now ...!!
                </div>
                <button data-dismiss="modal" class="close " type="button" area-lable="close">
                    <div class="w-10">Start</div>
                </button>
                <a href="machine_from_supplier.php" class="btn btn-sm btn-danger ">
                    <div class="w-10">Skip</div>
                </a>
            </div>

        </div>
    </div>
    </body>

    <script>
    $(document).ready(function() {
        $('#example1').dataTable();
    });
    </script>
    <script>
    var int = setInterval('check()', 300);

    function check() {
        if (chobj('div') == true) {
            printDiv('printableArea')
            // window.alert('true');
            int = window.clearInterval(int);
        } else {
            // document.write('<p>false</p>');
        }
    }

    function chobj(printableArea) {
        return (document.getElementById('printableArea')) ? true : false;
    }
    document.getElementById("printableArea").innerHTML = x;

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        window.location.href = './machine_from_supplier.php';
    }
    </script>
    <style>
    fieldset,
    legend {
        all: revert;
        font-size: 12px;
    }

    textarea {
        text-transform: uppercase;
    }

    select,
    option {
        background: #343a40 !important;
    }

    input[type="text"],
    [type="number"],
    [type='date'] {
        height: 22px;
        margin: inherit;
        margin-top: 4px;
        font-size: 10px;
        text-transform: uppercase;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        font-size: 12px;
        color: #ffffff !important;
    }

    .custom-select {
        font-size: 12px;
    }

    #exampleFormControlTextarea1 {
        font-size: 12px;
    }
    </style>

    <script>
    setTimeout(function() {
        if ($('#msg').length > 0) {
            $('#msg').remove();
        }
    }, 10000)

    let searchbar = document.querySelector('input[name="search"]');
    searchbar.focus();
    search.value = '';
    </script>
    <script>
    $(document).ready(function() {
        $('#example1').dataTable();
    });

    // function printDiv(divName) {
    //     var printContents = document.getElementById(divName).innerHTML;
    //     var originalContents = document.body.innerHTML;

    //     document.body.innerHTML = printContents;

    //     window.print();

    //     window.location.href = './machine_from_supplier.php';
    // }
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })

    var sum = 0;
    var cost = 0;
    var model;
    var brand;
    var core;
    var generation;
    var windows_with_ac = 120;

    $(document).ready(function() {
        $("#brand").on("change", function() {
            brand = $("#brand").val();
            var getURL = "get-model.php?brand=" + brand;
            $.get(getURL, function(data, status) {
                $("#model").html(data);
            });
        });
    });
    $(document).ready(function() {
        $("#brand").on("change", function() {
            var model = $("#model").val();
            var getURL = "get_series.php?brand=" + brand;
            $.get(getURL, function(data, status) {
                $("#series").html(data);
            });
        });
    });

    $(document).ready(function() {
        $("#model").on("change", function() {
            var model = $("#model").val();
            var getURL = "get-cpu.php?model=" + model + "&brand=" + brand;
            $.get(getURL, function(data, status) {
                $("#core").html(data);
            });
        });
    });
    $(document).ready(function() {
        $("#model").on("change", function() {
            var model = $("#model").val();
            var getURL = "get-generation.php?model=" + model + "&brand=" + brand;
            $.get(getURL, function(data, status) {
                $("#generation").html(data);
            });
        });
    });
    $(document).ready(function() {
        $("#model").on("change", function() {
            var model = $("#model").val();
            var getURL = "get_speed.php?model=" + model;
            $.get(getURL, function(data, status) {
                $("#speed").html(data);
            });
        });
    });

    $(document).ready(function() {
        $("#model").on("change", function() {
            var model = $("#model").val();
            var getURL = "get_lcd.php?model=" + model;
            $.get(getURL, function(data, status) {
                $("#lcd_size").html(data);
            });
        });
    });

    $(document).ready(function() {
        $("#brand").on("change", function() {
            var model = $("#model").val();
            var getURL = "get_location.php?brand=" + brand;
            $.get(getURL, function(data, status) {
                $("#location").html(data);
            });
        });
    });
    $(document).ready(function() {
        $("#model").on("change", function() {
            var model = $("#model").val();
            var getURL = "get_resolution.php?brand=" + brand + "&model=" + model;
            $.get(getURL, function(data, status) {
                $("#resolution").html(data);
            });
        });
    });
    </script>
    <style>
    fieldset,
    legend {
        all: revert;
        font-size: 12px;
    }

    textarea {
        text-transform: uppercase;
    }

    select,
    input[type="text"],
    [type="number"],
    [type='date'] {
        height: 28px;
        margin: inherit;
        margin-top: 4px;
        font-size: 16px;
        text-transform: uppercase;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        font-size: 12px;
        color: #ffffff !important;
    }

    .custom-select {
        font-size: 12px;
    }

    #exampleFormControlTextarea1 {
        font-size: 16px;
    }

    .col-form-label {
        font-size: 14px !important;
    }

    .select2-selection {
        background: #343a40 !important;

    }

    .select2-selection__rendered {
        color: white !important;
        font-size: 18px;
    }
    </style>

    <script>
    setTimeout(function() {
        if ($('#msg').length > 0) {
            $('#msg').remove();
        }
    }, 10000)

    let searchbar = document.querySelector('input[name="search"]');
    searchbar.focus();
    search.value = '';
    /////////////////////////////////////////////////////////////////
    //  test timer
    </script>


    <?php include_once '../includes/footer.php';?>