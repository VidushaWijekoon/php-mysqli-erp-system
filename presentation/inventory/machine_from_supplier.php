<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
    
    $device ="Laptop";
    $brand='';
    $series='';
    $processor ='';
    $core ='';
    $generation ='';
    $model ='';
    $speed ='';
    $battery='';
    $lcd_size =0;
    $touch_or_non_touch ='';
    $bios_lock ='';
    $mfg ='';
    $supplier='';
    $message='';
    $location='';
    $se_id =0;
    $add_to_wis = 0;
    $start_print=0;
   

if (isset($_POST['search'])) {
    $search_number=null;
    $search_number = $_POST['search'];
    $machine_id=0;
    echo $search_number;
    $query = "SELECT * FROM `machine_from_supplier`  WHERE serial_no = '$search_number' OR mfg ='$search_number'";
    echo $query;
    $query1 = mysqli_query($connection, $query);
    $start_print=0;
    foreach ($query1 as $data) {
        $machine_id = $data['machine_id'];
    }
    echo $machine_id;
   if($machine_id == 0){
    echo "im here";
    header("location: ./new_machine_from_supplier.php?scan_id=$search_number");  
   }else{
    echo "im not empty";
    foreach ($query1 as $data) {
        $brand = $data['brand'];
        $series = $data['series'];
        $processor = $data['processor'];
        $core = $data['core'];
        $generation = $data['generation'];
        $model = $data['model'];
        $speed = $data['speed'];
        $battery= $data['battery'];
        $lcd_size = $data['lcd_size'];
        $touch_or_non_touch = $data['touch_or_non_touch'];
        $bios_lock = $data['bios_lock'];
        $mfg = $data['mfg'];
        $supplier = $data['machine_id'];
        $add_to_wis = $data['add_to_wis'];

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
        `bios_lock`
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
        '$bios_lock'
    )";
        $query1 = mysqli_query($connection, $query);

        $query_update = "UPDATE `machine_from_supplier` SET add_to_wis = '1' WHERE machine_id='$supplier'";
        $query1 = mysqli_query($connection, $query_update);

    //     $query = "SELECT inventory_id FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
    // $query1 = mysqli_query($connection, $query);
    // $img_id=0;
    // foreach($query1 as $a ){
    //     $img_id = $a['inventory_id'];
    // }
    //     $tempDir = 'temp/';
    //     $filename = $img_id;
    //     $codeContents = $img_id;
    //     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
    //     $start_print=1;
      
  

//         if($battery == 'no mention' || $touch_or_non_touch == 'no mention'){
//         echo "<script>
//         var newHTML = document.createElement ('div');
//         newHTML.innerHTML =
//         newHTML = document.createElement ('div');
//         newHTML.innerHTML = ' <div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
//         document.body.appendChild (newHTML);
//         $(window).load(function(){
//              $('#modal').modal('show');
//         });
//     </script>";
// }
}
    } 

    if (isset($_POST['update_new'])) {
        $last_inventory_id =0;
        $battery= null;
        $touch=null;
        $query = "SELECT *  FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
                                $query1 = mysqli_query($connection, $query);
                                foreach ($query1 as $data) {
                                    $last_inventory_id= $data['inventory_id'];
                                }
    
        $battery = $_POST['battery'];
        $touch = $_POST['touch'];
        $location = $_POST['location'];
        $query = "UPDATE warehouse_information_sheet SET location ='$location', battery='$battery',touch_or_non_touch='$touch' WHERE inventory_id = '$last_inventory_id' ";
        $query1 = mysqli_query($connection, $query);
        // if($battery =='yes' && $touch =='yes'){
        // $query = "UPDATE warehouse_information_sheet SET location ='$location', battery='$battery',touch_or_non_touch='$touch' WHERE inventory_id = '$last_inventory_id' ";
        // echo $query;
        // $query1 = mysqli_query($connection, $query);
        // }elseif($battery =='yes' ){
        //     $query = "UPDATE warehouse_information_sheet SET location ='$location',battery='$battery' WHERE inventory_id = '$last_inventory_id' ";
        //     $query1 = mysqli_query($connection, $query);
        // }elseif($touch =='yes'){
        //     $query = "UPDATE warehouse_information_sheet SET location ='$location',touch_or_non_touch='$touch' WHERE inventory_id = '$last_inventory_id' ";
        //     $query1 = mysqli_query($connection, $query);
        // }
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
        <h3 class="mt-2">Update QR Codes</h3>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Add Inventory Details </p>
                </div>
                <div class="card-body">

                    <fieldset class="mt-2 mb-2">
                        <legend>Scan QR</legend>

                        <form action="#" method="POST">
                            <?php  $query = "SELECT  inventory_id,location FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
                     
                                $query1 = mysqli_query($connection, $query);
                                $last_location = "";
                                $last_id = "";
                                if(!empty($query1)){
                                foreach($query1 as $data){
                                    $last_location=$data['location'];
                                    $last_id=$data['inventory_id'];
                                    }
                                } ?>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Supplier Barcode OR MFG </label>
                                <div class="col-sm-8 w-100">
                                    <input class="w-50" style="color:black !important" type="text" id="search"
                                        name="search" required placeholder="Search QR">

                                </div>
                            </div>

                            <?php 
                                echo $message;
                            ?>
                            <button type="submit" name="insert" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate QR</button>

                        </form>
                        <form action="#" method="POST">
                            <div class="row">
                                <?php 
                            $query = "SELECT *  FROM warehouse_information_sheet WHERE create_by_inventory_id = '$user_id'  ORDER BY `inventory_id` DESC LIMIT 1"; 
                            $query1 = mysqli_query($connection, $query);
                            foreach ($query1 as $data) {
                                $brand = $data['brand'];
                                $series = $data['series'];
                                $processor = $data['processor'];
                                $core = $data['core'];
                                $generation = $data['generation'];
                                $model = $data['model'];
                                $speed = $data['speed'];
                                $battery= $data['battery'];
                                $lcd_size = $data['lcd_size'];
                                $touch_or_non_touch = $data['touch_or_non_touch'];
                                $bios_lock = $data['bios_lock'];
                                $mfg = $data['mfg'];
                        
                            }
                            ?>
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $device; ?>" readonly>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $brand; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Series</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $series; ?>" readonly>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $model; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $core; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Speed</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $speed; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8 w-100">
                                    <input type="number" class="form-control" name="generation"
                                        value="<?php echo $generation; ?>" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">LCD Size</label>
                                <div class="col-sm-8 w-100">
                                    <input type="text" class="form-control" value="<?php echo $lcd_size; ?>" readonly>

                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Battery</label>
                                <div class="col-sm-8 w-100">
                                    <select name="battery" id="battery" class="info_select" style="border-radius: 5px;">
                                        <option selected value='<?php echo $battery ?>'>
                                            <?php echo $battery ?>
                                        </option>
                                        <option value='yes'>Yes</option>
                                        <option value='no'>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Screen Type (Touch / None Touch)</label>
                                <div class="col-sm-8 w-100">
                                    <select name="touch" id="touch" class="info_select" style="border-radius: 5px;">
                                        <option selected value='<?php echo $touch_or_non_touch ?>'>
                                            <?php echo $touch_or_non_touch ?>
                                        </option>
                                        <option value='yes'>Yes</option>
                                        <option value='no'>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Optical</label>
                                <div class="col-sm-8 w-100">
                                    <select name="touch" id="touch" class="info_select" style="border-radius: 5px;">
                                        <option selected value='dvd'>
                                            DVD need retrive
                                        </option>
                                        <option value='yes'>Yes</option>
                                        <option value='no'>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-8 w-100">
                                    <select name="location" id="location" class="info_select"
                                        style="border-radius: 5px;">
                                        <option selected value='<?php $last_location ?>'><?php echo $last_location ?>
                                        </option>
                                        <option value='wh1'>WH1</option>
                                        <option value='wh2'>WH2</option>
                                        <option value='wh3'>WH3</option>
                                        <option value='wh4'>WH4</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="update_new"
                                class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-block"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate QR</button>
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
                       
                          
                    $last_update_id =0;
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
                            function filterString($name) {
                                return filter_input (INPUT_GET, $name, FILTER_SANITIZE_STRING);
                            }
                            function filterInt($name) {
                                return filter_input (INPUT_GET, $name, FILTER_SANITIZE_NUMBER_INT);
                            }
                            function filterRaw($name) {
                                return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
                            }
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
</script>
<script>
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