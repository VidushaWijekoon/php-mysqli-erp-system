<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
require_once("sanitizer.php");
?>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
$scan_id =null;
$scan_id = $_GET['scan_id'];
    
    $device ="Laptop";
    $brand='';
    $series='';
    $processor ='';
    $core ='';
    $generation ='';
    $model ='';
    $speed ='';
    $battery='';
    $lcd_size ='';
    $touch_or_non_touch ='';
    $bios_lock ='';
    $mfg ='';
    $supplier='';
    $message='';
    $location='';
    $se_id ='';
    $add_to_wis = 0;
    $start_print=0;
    $supplier_name ='';
   

if (isset($_POST['insert'])) {
    $scan_id = $_POST['scan_id'];
    $location = $_POST['location'];
    $device =$_POST['device'];
    $processor =$_POST['processor'];
    $core =$_POST['core'];
    $generation =$_POST['generation'];
    $model =$_POST['model'];
    $brand =$_POST['brand'];
    $scan_id =$_POST['scan_id'];
    $series =$_POST['series'];
    $speed =$_POST['speed'];
    $battery =$_POST['battery'];
    $lcd_size =$_POST['lcd_size'];
    $touch_or_non_touch =$_POST['touch'];
    $bios_lock =$_POST['bios'];
    $sql ="INSERT INTO `warehouse_information_sheet`(
        `device`,
        `processor`,
        `core`,
        `generation`,
        `model`,
        `location`,
        `brand`,
        `create_by_inventory_id`,
        `mfg`,
        `series`,
        `speed`,
        `battery`,
        `lcd_size`,
        `touch_or_non_touch`,
        `bios_lock`
    )
    VALUES(
        '$device',
        '$processor',
        '$core',
        '$generation',
        '$model',
        '$location',
        '$brand',
        '$user_id',
        '$mfg',
        '$series',
        '$speed',
        '$battery',
        '$lcd_size',
        '$touch_or_non_touch',
        '$bios_lock'
    )";
    $result = mysqli_query($connection, $sql);

    $last_inventory_id=0;
    $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
    $query1 = mysqli_query($connection, $query);

    foreach ($query1 as $data) {
        $last_inventory_id= $data['inventory_id'];
    }
    
     $tempDir = 'temp/';
        $filename = $last_inventory_id;
        $codeContents = $last_inventory_id;
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
        $start_print=1;
    }
?>

<div class="row page-titles mt-5">
    <div class="col-md-5 align-self-center d-flex mt-5">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
        <h3 class="mt-2 text-danger">Add New MFG Id</h3>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0 ">This Is New MSG Id Please Fill All Data </p>
                </div>
                <div class="card-body">

                    <fieldset class="mt-2 mb-2">
                        <legend>Scan QR</legend>

                        <form action="#" method="POST">
                            <div class="row">
                                <label class="col-sm-3 col-form-label"> MFG </label>
                                <div class="col-sm-8 w-100">
                                    <input class="w-50" style="color:black !important" type="text" id="scan_id"
                                        name="scan_id" value="<?php echo $scan_id ?>" required placeholder="Search QR">

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" name="device" class="form-control"
                                        value="<?php echo "Laptop"; ?>" readonly>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <?php $query ="SELECT DISTINCT brand FROM `machine_from_supplier`"; 
                                $query_run = mysqli_query($connection, $query);
                                $brand="" ;
                                foreach($query_run as $data){
                                    $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
                                }
                                    ?>
                                        <select name="brand" id="brand" class="form-control select2"
                                            style="border-radius: 5px;">
                                            <option selected>--Select brand--</option>
                                            <?php echo $brand ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Series</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="series" id="series" class="form-control select2"
                                            style="border-radius: 5px;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="model" id="model" class="form-control select2"
                                            style="border-radius: 5px;">
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Processor</label>
                                <div class="col-sm-8">
                                    <select name="processor" class="info_select" style="border-radius: 5px;" required>

                                        <?php
                                            $query = "SELECT * FROM processor ";
                                            $result = mysqli_query($connection, $query);

                                            while ($processors = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $processors["processor"]; ?>">
                                            <?php echo strtoupper($processors["processor"]); ?>
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
                                    <div class="form-group">
                                        <select name="core" id="core" class="form-control select2"
                                            style="border-radius: 5px;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8">
                                    <select name="generation" id="generation" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Speed</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="speed" id="speed" class="form-control select2"
                                            style="border-radius: 5px;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">LCD Size</label>
                                <div class="col-sm-8 w-100">
                                    <select name="lcd_size" id="lcd_size" class="form-control select2"
                                        style="border-radius: 5px;">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Battery</label>
                                <div class="col-sm-8 w-100">
                                    <input type="radio" id="battery" name="battery" value="yes">
                                    <label class="label_values my-1" for="yes">YES </label>

                                    <input type="radio" id="battery" name="battery" value="no" checked>
                                    <label class="label_values my-1 " for="no">NO </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Touch / None Touch</label>
                                <div class="col-sm-8 w-100">
                                    <input type="radio" id="touch" name="touch" value="yes">
                                    <label class="label_values my-1" for="yes">YES </label>

                                    <input type="radio" id="touch" name="touch" value="no" checked>
                                    <label class="label_values my-1" for="no">NO </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Bios Lock</label>
                                <div class="col-sm-8 w-100">
                                    <input type="radio" id="bios" name="bios" value="yes">
                                    <label class="label_values my-1" for="yes">YES </label>

                                    <input type="radio" id="bios" name="bios" value="no" checked>

                                    <label class="label_values my-1" for="no">NO</label>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <label class="col-sm-3 col-form-label">MFG</label>
                                <div class="col-sm-8 w-100">
                                    <input type="number" class="form-control" name="generation"
                                        value="<?php echo $mfg; ?>" readonly>
                                </div>
                            </div> -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-8 w-100">
                                    <select name="location" id="location" class="info_select"
                                        style="border-radius: 5px;">
                                        <?php  $query = "SELECT location FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
                                $query1 = mysqli_query($connection, $query);
                                $last_location = "";
                                if(!empty($query1)){
                                foreach($query1 as $data){
                                    $last_location=$data['location'];
                                    }
                                } ?>
                                        <option selected value='<?php $location ?>'><?php echo $last_location ?>
                                        </option>
                                        <option value='wh1'>WH1</option>
                                        <option value='wh2'>WH2</option>
                                        <option value='wh3'>WH3</option>
                                        <option value='wh4'>WH4</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="insert" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-blok"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Save</button>

                        </form>
                    </fieldset>

                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input type="button" onclick="printDiv('printableArea')" value="print a QR!" />
                    <div id="printableArea">
                        <?php
                         $query = "SELECT  brand,inventory_id,location FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
                         $query1 = mysqli_query($connection, $query);
                         $last_id = 0;
                         foreach($query1 as $data){
                             $last_id=$data['inventory_id'];
                             $brand=$data['brand'];
                             }
                    $quantity = 1;
                        $howManyCodes =$quantity;
                        $digits = 6;
                        $start = $last_id; 
                        $overText = $brand."  ".$model ;
                        $string = explode(" ",$speed);
                        $secondPart = $core." ".$string[0];
                        $downText = $generation."-".$model;
                        $rack = $location; 
                        $hideText = null;

                        if($start_print == 1){
                           
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
$(document).ready(function() {
    $('#example1').dataTable();
});

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    window.location.href = './machine_from_supplier.php';
}
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
        console.log(brand);
        console.log('im here');
        var getURL = "get-model.php?brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#model").html(data);
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
        var getURL = "get_series.php?brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#series").html(data);
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




<?php include_once('../includes/footer.php');?>