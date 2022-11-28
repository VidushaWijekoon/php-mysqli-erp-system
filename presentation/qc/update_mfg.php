<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
// require_once("phpqrcode/qrlib.php");
  
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$mfg_id = $_GET['mfg_id'];
$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 4 && $department == 19){

$errors = array();
$device = NULL;
$brand = NULL;
$core = NULL;
$generation = NULL;
$model = NULL;
$hdd_capacity = NULL;
$ram_capacity = NULL;
$hdd_type = null;
$touch_type=null;
$screen_size = null;
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
    $touch_type = mysqli_real_escape_string($connection, $_POST['touch']); 
    $screen_size = mysqli_real_escape_string($connection, $_POST['screen_size']); 
    $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
    
    $query = "UPDATE
    `packing_mfg`
SET
    `device` = '$device',
    `brand` = '$brand',
    `core` = '$core',
    `generation` = '$generation',
    `model` = '$model',
    `hdd_capacity` = '$hdd_capacity',
    `hdd_type` = '$hdd_type',
    `mfg` = '$mfg',
    `ram_capacity` = '$ram_capacity',
    `touch` = '$touch_type',
    `screen_size` = '$screen_size'
WHERE
    mfg_id='$mfg_id'";
    
    $query_run = mysqli_query($connection, $query);
        $start_print = 1;
   
    }
    $query="SELECT * FROM packing_mfg WHERE mfg_id ='$mfg_id'";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $data){
        $device = $data['device'];
        $brand = $data['brand'];
        $core = $data['core'];
        $generation = $data['generation'];
        $model = $data['model'];
        $hdd_capacity = $data['hdd_capacity'];
        $ram_capacity = $data['ram_capacity'];
        $hdd_type = $data['hdd_type'];
        $screen_type=$data['touch'];
        $screen_size = $data['screen_size'];
        $mfg = $data['mfg'];
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
                            <legend>Create Machine Information Sheet</legend>

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
                                        <option selected value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
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
                                        <option selected value="<?php echo $core; ?>"><?php echo $core; ?></option>
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
                                        <option selected value="<?php echo $generation; ?>"><?php echo $generation; ?>
                                        </option>
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
                                    <input type="text" class="form-control" placeholder="Model" name="model"
                                        value="<?php echo $model; ?>">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">HDD Capacity</label>
                                <div class="col-sm-8">
                                    <select name="hdd_capacity" class="info_select" style="border-radius: 5px;"
                                        required>
                                        <option selected value="<?php echo $hdd_capacity; ?>">
                                            <?php echo $hdd_capacity; ?></option>
                                        <option value="256GB">256GB</option>
                                        <option value="512GB">512GB</option>
                                        <option value="1TB">1TB</option>
                                        <option value="2TB">2TB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">RAM Capacity</label>
                                <div class="col-sm-8">
                                    <select name="ram_capacity" class="info_select" style="border-radius: 5px;"
                                        required>
                                        <option selected value="<?php echo $ram_capacity; ?>">
                                            <?php echo $ram_capacity; ?></option>
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
                                        <option selected value="<?php echo $hdd_type; ?>"><?php echo $hdd_type; ?>
                                        </option>
                                        <option value="hdd">HDD</option>
                                        <option value="ssd">SSD</option>
                                        <option value="nvme">NVME</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Screen</label>
                                <div class="col-sm-8">
                                    <select name="touch" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="<?php echo $screen_type; ?>"><?php echo $screen_type; ?>
                                        </option>
                                        <option value="touch">Touch</option>
                                        <option value="none_touch">None Touch</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Screen Size</label>
                                <div class="col-sm-8">
                                    <select name="screen_size" class="info_select" style="border-radius: 5px;" required>
                                        <option selected value="<?php echo $screen_size; ?>"><?php echo $screen_size; ?>
                                        </option>
                                        <option value="11">11"</option>
                                        <option value="12">12"</option>
                                        <option value="13">13"</option>
                                        <option value="14">14"</option>
                                        <option value="15">15"</option>
                                        <option value="17">17"</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">MFG Number</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="MFG Number" name="mfg"
                                        value="<?php echo $mfg; ?>">
                                </div>
                            </div>

                            <button type="submit" name="submit_mfg" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Update BarCode</button>
                            <?php if($start_print != 0){ ?>
                            <button type="button" class="btn mb-2 mt-4 btn-danger btn-sm d-block mx-auto"
                                data-toggle="modal" data-target="#modal-motherboard">
                                Launch Preview Form
                            </button>
                            <?php } ?>
                        </fieldset>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input type="button" onclick="printDiv('printableArea')" value="print a Barcode!" />

                    <?php
                        $howManyCodes =1;
                        $digits = 50;
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
                        $barcodeSize=50;


                        if($start_print == 1){
                            function filterRaw($name) {
                                return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
                            }
                    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
                    function write($code,$last_id, $brand, $model,$mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize) {
                        ?>
                    <div id="printableArea">
                        <div class="row">
                            <div class="col-sm">
                                <p class="text-center text-uppercase text-weight:bold"
                                    style="font-size: 120px; color:black !important">
                                    MFG S/N
                                </p>
                                <div class="text-left" style="margin-left:0px">
                                    <?php echo '<img class="barcode w-100 " style="width:1350px"alt="'.$barcodeText.'" src="php-barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
                                        '&size='.$barcodeSize.'&print='.$mfg.'"/>';?>
                                </div>
                                <p class="text-center text-uppercase" style="font-size: 120px;color:black !important">
                                    <?php echo  $mfg;
                                    echo "</br>";
                                    
                                    echo "</br>";
                                    echo ".";
                                    ?></p>
                            </div>
                        </div>

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

<div class="modal fade" id="modal-motherboard">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div>
                            <?php $query ="SELECT * FROM packing_mfg WHERE mfg ='$mfg'";
                            $result =  mysqli_query($connection, $query); 
                            foreach($result as $data){
                                $device = $data['device'];
                                $model = $data['model'];
                                $brand = $data['brand'];
                                $core = $data['core'];
                                $generation = $data['generation'];
                                $hdd_capacity = $data['hdd_capacity'];
                                $hdd_type = $data['hdd_type'];
                                $ram_capacity = $data['ram_capacity'];
                                $device = $data['device'];
                                $screen_type = $data['touch'];
                                $screen_size = $data['screen_size'];
                                $mfg = $data['mfg'];
                                $mfg_id = $data['mfg_id'];
                                
                            }
                            ?>
                            <table style="border: black; border-style: solid;">
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid; margin-left:5px; width:150px;">
                                        Device :</th>
                                    <td class="px-2"
                                        style="border: black; border-style: solid; margin-left:25px; width:550px;">
                                        <?php echo $device; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Brand :</th>
                                    <td class="px-2" style="border: black; border-style: solid;"> <?php echo $brand; ?>
                                    </td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Model :</th>
                                    <td class="px-2" style="border: black; border-style: solid;"><?php echo $model; ?>
                                    </td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Core :</th>
                                    <td class="px-2" style="border: black; border-style: solid;"> <?php echo $core; ?>
                                    </td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Generation :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $generation; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> HDD Capacity :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $hdd_capacity; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> HDD Type :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $hdd_type; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> RAM Capacity :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $ram_capacity; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Screen :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $screen_type; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Screen Size :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $screen_size; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> MFG Number :</th>
                                    <td class="px-2" style="border: black; border-style: solid;"> <?php echo $mfg; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>


                    </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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

    window.location.href = './create_mfg.php';
}
</script>