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
$device = NULL;
$brand = NULL;
$core = NULL;
$generation = NULL;
$model = NULL;
$hdd_capacity = NULL;
$ram_capacity = NULL;
$hdd_type = null;
$mfg= null;
$username = $_SESSION['username'];
$start_print = 0;

    if(isset($_POST['submit_mfg'])){

    $device = mysqli_real_escape_string($connection, $_POST['device']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $core = mysqli_real_escape_string($connection, $_POST['core']);
    $generation = mysqli_real_escape_string($connection, $_POST['generation']);
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
    $ram_capacity = mysqli_real_escape_string($connection, $_POST['ram_capacity']);
    $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']); 
    $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
    
    $query = "INSERT INTO packing_mfg(device, brand, core, generation, model, hdd_capacity, hdd_type, created_time, created_by,mfg,ram_capacity) 
            VALUES('$device', '$brand' , '$core', '$generation', '$model', '$hdd_capacity', '$hdd_type', CURRENT_TIMESTAMP, '$username','$mfg','$ram_capacity')";
    $query_run = mysqli_query($connection, $query);
    echo $query;
    // $tempDir = 'temp/';
    //     $email = $mfg;
    //     $filename = $email;
    //     $codeContents = $email;
    //     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
        $start_print = 1;
   
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
                                <label class="col-sm-3 col-form-label">RAM Capacity</label>
                                <div class="col-sm-8">
                                    <select name="ram_capacity" class="info_select" style="border-radius: 5px;"
                                        required>
                                        <option selected value="2">2GB</option>
                                        <option value="4">4GB</option>
                                        <option value="8">8GB</option>
                                        <option value="16">16GB</option>
                                        <option value="64">64GB</option>
                                        <option value="128">128GB</option>
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
                                <label class="col-sm-3 col-form-label">MFG Number</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="MFG Number" name="mfg">
                                </div>
                            </div>

                            <button type="submit" name="submit_mfg" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate BarCode</button>


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
                        <?php
                       
                          
                    // $last_update_id =0;
                    // $quantity = $_SESSION['quantity'];
                    // $_SESSION['quantity'] = 0;
                    // $brand = $_SESSION['brand'];
                    // $model = $_SESSION['model'];
                    // $generation = $_SESSION['generation'];
                    // $core = $_SESSION['core'];
                    // $location = $_SESSION['location'];
                    // $last_id = $_SESSION['last_id'] ;
                    // if(empty($_SESSION['last_update_id'])){ $last_update_id =0;}else{
                    
                    //     $last_update_id = $_SESSION['last_update_id'];
                    
                    // }
                    // if($last_update_id != 0){
                    //     $last_id = $last_update_id  ;
                        
                    // }else{
                    //     $last_id = $last_id + 1;
                    // }
                        $howManyCodes =1;
                        $digits = 6;
                        $start = 0; 
                        $brand = $brand ;
                        $secondPart = $core." GEN".$generation."  ".$ram_capacity."/".$hdd_capacity." ".$hdd_type;
                        $downText = $generation."-".$model;
                        $model = $model; 
                        $hideText = null;
                        $last_id = $mfg;
                        $barcodeText = trim($mfg);
                        $barcodeType="Code128";
                        $barcodeDisplay="Horizontal";
                        $barcodeSize=80;


                        if($start_print == 1){
                            function filterRaw($name) {
                                return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
                            }
                    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
                    function write($code,$last_id, $brand, $model,$mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize) {
                        ?>
                        <table>
                            <tr>
                                <th style="width :600mm"><?php if ($brand != "") {
                                $abc= strtoupper( $brand);
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 50;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin:0'>Brand : $abc </br>Model : $model</br>Spec : $secondPart</p></div>";
                            } 
                            ?>
                                </th>
                            </tr>
                            <tr>
                                <th>

                                    <?php echo $mfg. "</br>"; echo '<img class="barcode" alt="'.$barcodeText.'" src="php-barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
'&size='.$barcodeSize.'&print='.$mfg.'"/>';?>
                                </th>

                            </tr>
                            <tr>
                                <?php echo "</br> </br>";
                            echo "</br> ";
                            echo "</br> ";
                            echo "</br> ";
                             ?>
                            </tr>


                        </table>

                        <?php
                                            }
                                        echo "<div class='sheet'>";
                            if ($codeArray != "") { // Specified array of codes
                                foreach (json_decode($codeArray) as $secondPart) {
                                    write($code,$last_id, $brand, $model, $mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize);
                                }
                            } else { // Unspecified codes, let's go incremental
                                for ($i = $start; $i < $howManyCodes + $start; $i++) {
                                    $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
                                    write($code,$last_id, $brand, $model, $mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize);
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

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>