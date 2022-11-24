<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
  
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){

$errors = array();

$username = $_SESSION['username'];
$device = NULL;
$brand = NULL;
$core = NULL;
$generation = NULL;
$model = NULL;
$hdd_capacity = NULL;
$hdd_type = NULL;

    if(isset($_POST['submit_mfg'])){

        $device = mysqli_real_escape_string($connection, $_POST['device']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $core = mysqli_real_escape_string($connection, $_POST['core']);
        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
        $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']);   
        
        // checking required fields
        $req_fields = array('device', 'brand', 'core', 'generation', 'model', 'hdd_capacity', 'hdd_type');
        $errors = array_merge($errors, check_req_fields($req_fields));

    }
    
    if(empty($errors)){
    $device = mysqli_real_escape_string($connection, $_POST['device']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $core = mysqli_real_escape_string($connection, $_POST['core']);
    $generation = mysqli_real_escape_string($connection, $_POST['generation']);
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
    $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']); 
    
    $query = "INSERT INTO packing_mfg(device, brand, core, generation, model, hdd_capacity, hdd_type, created_time, created_by) 
            VALUES('$device', '$brand' , '$core', '$generation', '$model', '$hdd_capacity', '$hdd_type', CURRENT_TIMESTAMP, $username)";
    echo $query;
   
    }
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da; "></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                    <?php if (!empty($errors)) { display_errors($errors); }?>
                    <form method="POST">
                        <fieldset>
                            <legend>Create Warehouse Information Sheet</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8">
                                    <select name="device" class="info_select" style="border-radius: 5px;" required>
                                        <!-- <option selected>--Select Device Type--</option> -->
                                        <?php
                                            $query = "SELECT * FROM device ORDER BY device ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($devices = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $devices["device"]; ?>">
                                            <?php echo strtoupper($devices["device"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8">
                                    <select name="brand" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="hp">HP</option>
                                        <?php
                                            $query = "SELECT * FROM brand ORDER BY brand ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($brands = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $brands["brand"]; ?>">
                                            <?php echo strtoupper($brands["brand"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8">
                                    <select name="core" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="i5">i5</option>
                                        <?php
                                            $query = "SELECT * FROM core ORDER BY core";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($types = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $types["core"]; ?>">
                                            <?php echo strtoupper($types["core"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8">
                                    <select name="generation" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="5">5</option>
                                        <?php
                                            $query = "SELECT * FROM generation ORDER BY generation_id";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($generations = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $generations["generation"]; ?>">
                                            <?php echo strtoupper($generations["generation"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Model" name="model">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">HDD Capacity</label>
                                <div class="col-sm-8">
                                    <select name="hdd_capacity" class="info_select" style="border-radius: 5px;"
                                        required>
                                        <option selected value="128">128GB</option>
                                        <option value="256">256GB</option>
                                        <option value="512">512GB</option>
                                        <option value="1">1TB</option>
                                        <option value="2">2TB</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">HDD Type</label>
                                <div class="col-sm-8">
                                    <select name="hdd_type" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="hdd">HDD</option>
                                        <option value="ssd">SSD</option>
                                        <option value="nvme">NVME</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" min="1" class="form-control" placeholder="Quantity"
                                        name="quantity">
                                </div>
                            </div>

                            <button type="submit" name="submit_mfg" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate QR</button>


                        </fieldset>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input type="button" onclick="printDiv('printableArea')" value="print a QR!" />
                    <div id="printableArea">





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>