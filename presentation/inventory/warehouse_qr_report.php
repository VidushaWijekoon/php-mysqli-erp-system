<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

function filterString($name) {
	return filter_input (INPUT_GET, $name, FILTER_SANITIZE_STRING);
}
function filterInt($name) {
	return filter_input (INPUT_GET, $name, FILTER_SANITIZE_NUMBER_INT);
}
function filterRaw($name) {
	return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$end_inventory_id = null;
$inventory_id = null;

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){
    
$device ="Scan QR First";
$brand="Scan QR First";
$processor ="Scan QR First";
$core ="Scan QR First";
$generation ="Scan QR First";
$model ="Scan QR First";
$location ="Scan QR First";
$inventory_number ="Scan QR First";
$inventory_id;
$start_print = 0;
$sum = 0;

if (isset($_POST['search'])) {

    $inventory_id = $_POST['search'];
    $_SESSION['search_inventory_id'] = $inventory_id;
        
    $query = "SELECT `inventory_id`, `device`, `processor`, `core`, `generation`, `model`, `location`, `brand`, `create_by_inventory_id`FROM `warehouse_information_sheet` WHERE `inventory_id`='$inventory_id';";
    $query1 = mysqli_query($connection, $query);
    foreach ($query1 as $data) {
        $device = $data['device'];
        $brand = $data['brand'];
        $processor = $data['processor'];
        $core = $data['core'];
        $generation = $data['generation'];
        $model = $data['model'];
        $location = $data['location'];   
    }
}

if (isset($_POST['submit'])) {

    for ($i = 0; $i <= $sum; $i++) {

        $sum = (int)$_SESSION['end_inventory_id']  - (int)$_SESSION['search_inventory_id'];
            
        $end_inventory_id = mysqli_real_escape_string($connection, $_POST['end_inventory_id']);
        $_SESSION['end_inventory_id'] = $end_inventory_id;
        $device = $_POST["device"];
        $brand = $_POST["brand"];
        $processor = $_POST["processor"];
        $core = $_POST["core"];
        $generation = $_POST["generation"];
        $qr_image = $_POST["generation"];
        $model = $_POST["model"];
        $location = $_POST["location"];
        $inventory_number = $_POST["inventory_id"];

        $tempDir = ''; 
        $email = $_POST["inventory_id"];
        $last_id = $connection->insert_id;
        $filename = $tempDir . uniqid() . '.png';
        $codeContents = $email; 
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);   
        $start_print = 1;
                
        $sql = "UPDATE warehouse_information_sheet SET device = '$device', processor = '$processor', core = '$core',
                                    generation = '$generation', model = '$model', location = '$location', brand = '$brand'
                                    WHERE  inventory_id BETWEEN '$inventory_number' AND '$end_inventory_id' ";
                echo $sql;
        $query1 = mysqli_query($connection, $sql);
        $_SESSION['last_update_id'] = $_POST["inventory_id"];
        $_SESSION['quantity'] = 1;
        $_SESSION['brand'] = $brand;
        $_SESSION['model'] = $model;
        $_SESSION['generation'] = $generation;
        $_SESSION['core'] = $core;
        $_SESSION['location'] = $location;

        

        // header("location: ./indexnew.php");  
                            
    }
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center d-flex">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
        <h3 class="mt-2">Update QR Codes</h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Update Inventory ID</p>
                </div>
                <div class="card-body">

                    <fieldset class="mt-2 mb-2">
                        <legend>Scan QR</legend>

                        <form action="#" method="POST">
                            <div class="input-group mb-2 mt-2">
                                <input type="text" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                            </div>

                        </form>
                    </fieldset>

                    <form method="POST">
                        <fieldset>
                            <legend>Update Warehouse Information Sheet</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="device" style="border-radius: 5px;" required>
                                        <option selected value="<?php echo $device; ?>"><?php echo $device; ?></option>
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
                                    <select class="w-100" name="brand" style="border-radius: 5px;" required>
                                        <option selected><?php echo $brand; ?></option>
                                        <?php
                                            $query = "SELECT * FROM brand ORDER BY brand ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($brands = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $brands["brand"]; ?>">
                                            <?php echo strtoupper($brands["brand"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Processor</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="processor" style="border-radius: 5px;" required>
                                        <option selected><?php echo $processor; ?></option>
                                        <?php
                                            $query = "SELECT * FROM processor ";
                                            $result = mysqli_query($connection, $query);

                                            while ($processors = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $processors["processor"]; ?>">
                                            <?php echo strtoupper($processors["processor"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="core" style="border-radius: 5px;" required>
                                        <option selected value="<?php echo $core; ?>"><?php echo $core; ?></option>
                                        <?php
                                            $query = "SELECT * FROM core ORDER BY core_id";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($types = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $types["core"]; ?>">
                                            <?php echo strtoupper($types["core"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="generation" style="border-radius: 5px;" required>
                                        <option selected><?php echo $generation; ?></option>
                                        <?php
                                            $query = "SELECT * FROM generation ORDER BY generation_id";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($generations = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $generations["generation"]; ?>">
                                            <?php echo strtoupper($generations["generation"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" placeholder="<?php echo $model; ?>"
                                        value="<?php echo $model; ?>" name="model">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="location" style="border-radius: 5px;" required>
                                        <option selected><?php echo $location; ?></option>
                                        <?php
                                            $query = "SELECT * FROM location ORDER BY location_id";
                                            $result = mysqli_query($connection, $query);

                                            while ($locations = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $locations["location"]; ?>">
                                            <?php echo strtoupper($locations["location"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <?php if(!empty($inventory_id) ){ ?>
                                <input class="form-control" type="hidden" name="inventory_id"
                                    value=' <?php echo  $inventory_id; ?>'>
                                <?php } ?>

                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Range</label>
                                <div class="col-sm-8 d-flex">

                                    <input type="number" min="1" class="form-control w-50"
                                        placeholder="Starting Inventory ID" value="<?php echo $inventory_id; ?>"
                                        name="quantity">

                                    <input type="number" min="1" class="form-control w-50 ml-2" name="end_inventory_id"
                                        placeholder="Ending Inventory ID" name="quantity">
                                </div>
                            </div>

                            <div class="d-flex col-5 mx-auto">

                                <button type="submit" name="submit" id="submit"
                                    class="btn mb-2 mt-4 bg-gradient-primary btn-sm d-block mx-auto text-center"><i
                                        class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Update QR
                                </button>

                            </div>

                        </fieldset>

                    </form>


                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input type="button" onclick="printDiv('printableArea')" value="print a QR!" />
                    <div id="printableArea">
                        <?php
                       
                          
                    $last_update_id =0;
                    $quantity = 1;
                        $howManyCodes =$quantity;
                        $digits = 6;
                        $start = $last_id; 
                        $overText = $_POST['brand']."  ".$model ;
                        // $string = explode(" ",$speed);.
                        $string = "abc";
                        $secondPart = $core." ".$string[0];
                        $downText = $generation."-".$model;
                        if($brand=='HP'){
                            $rack="WH3";
                        }else{
                            $rack="WH4";
                        }
                        $hideText = null;

                        if($start_print == 1|| $id !=0){
                           
                    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
                    function write($code,$last_id, $overText, $rack, $downText,$secondPart) {
                        ?>
                        <table>
                            <tr>
                                <th style="width :600mm"><?php if ($overText != "") {
                                $abc= strtoupper( $overText);
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 70;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin:0'>$abc &nbsp $secondPart</p></div>";
                            } 
                            ?>
                                <th>
                            </tr>
                            <tr>
                                <th style="width :400px">
                                    <div style="display:flex">
                                        <?php echo '<img src="temp/'.$code.'.png" style="width:350px; height:350px;margin: 0px 0 0 25px;">';?>
                                        <?php 
                                $text = $rack."-".$downText;
                            echo strtoupper("<div style = 'font-family: Arial, Helvetica, sans-serif; margin: 225px 0 0 20px; font-size: 60px; color:black;text-weight:bold;'>$text </div></br> ");
                            
                            ?>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th> <?php 
                            echo strtoupper("<div style = 'font-family: Arial, Helvetica, sans-serif; margin: 0px 100px 0 0px; font-size: 60px; color:black;text-weight:bold;'>ALSAKB$code</div></br> ");
                            
                            ?></th>
                            </tr>


                        </table>

                        <?php
                                            }
                                        echo "<div class='sheet'>";
                            if ($codeArray != "") { // Specified array of codes
                                foreach (json_decode($codeArray) as $secondPart) {
                                    write($code,$last_id, $overText, $rack,  $downText,$secondPart);
                                }
                            } else { // Unspecified codes, let's go incremental
                                for ($i = $start; $i < $howManyCodes + $start; $i++) {
                                    $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
                                    write($code,$last_id, $overText, $rack,  $downText,$secondPart);
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

<script>
setTimeout(function() {
    if ($('#msg').length > 0) {
        $('#msg').remove();
    }
}, 10000);

let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';

const printDiv = (divName) => {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    window.location.href = './warehouse_qr_report.php';
}
</script>

<style>
@media screen and (orientation: landscape) {
    .toolbar {
        position: fixed;
        width: 2.65em;
        height: 100%;
    }

    .sheet {
        box-sizing: border-box;
        background-color: #FFF;
        height: 25.00mm;
        width: 50.00mm;
        overflow: hidden;
    }
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>