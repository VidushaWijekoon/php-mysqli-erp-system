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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
    
    $device ="Scan qr first";
    $brand="Scan qr first";
    $processor ="Scan qr first";
    $core ="Scan qr first";
    $generation ="scan qr first";
    $model ="Scan qr first";
    $location ="Scan qr first";
    $inventory_number ="Scan qr first";
    $inventory_id;
    $location_old =null;
if (isset($_POST['search'])) {
    
    $inventory_id = $_POST['search'];
    $query = "SELECT * FROM `barcodes` LEFt JOIN products ON products.id = barcodes.product_id WHERE text = '$inventory_id';";
    $query1 = mysqli_query($connection, $query);
    $start_print=0;
    $test =  substr($inventory_id,6);
        echo $test;

    foreach ($query1 as $data) {
        $name = $data['name'];
        $location_old = $data['location'];
        $string = explode(" ",$name);
        $string2 = explode("-",$location_old);
        $device ="Laptop";
        $brand =$string[0];
        if(empty($string[4])){
            $string[4]=null;
        }
        if($string[1]=="i3" ||$string[2] =="i3"||$string[3] =="i3"||$string[4] =="i3"){
            $core ="i3";
        }elseif($string[1]=="i5" ||$string[2] =="i5"||$string[3] =="i5"||$string[4] =="i5"){
            $core ="i5";
        }elseif($string[1]=="i7" ||$string[2] =="i7"||$string[3] =="i7"||$string[4] =="i7"){
            $core ="i7";
        }elseif($string[1]=="i9" ||$string[2] =="i9"||$string[3] =="i9"||$string[4] =="i9"){
            $core ="i9";
        }
        // echo $string[3];
        // echo "</br>";
        // echo $string[1].$string[2].$string[3];
            if($string[2] =="i3"){
               $model= $string[1];
            }elseif($string[3] =="i3"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i3"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i5"){
                $model= $string[1];
            }elseif($string[3] =="i5"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i5"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i7"){
                $model= $string[1];
            }elseif($string[3] =="i7"){
                $model= $string[1].$string[2];
            }elseif($string[4] =="i7"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
            if($string[2] =="i9"){
                $model= $string[1];
            }elseif($string[3] =="i9"){
                $model= $string[1]." ".$string[2];
            }elseif($string[4] =="i9"){
                $model= $string[1]." ".$string[2]." ".$string[3];
            }
        // $processor =$data['processor'];
        
        $generation =$string2[1];
       
        $location =$location_old;
       
    }

}

if (isset($_POST['submit'])) {
        $device = $_POST["device"];
        $brand = $_POST["brand"];
        $processor = $_POST["processor"];
        $core = $_POST["core"];
        $generation = $_POST["generation"];
        $model = $_POST["model"];
        $location = $_POST["location"];
        $inventory_number = 0;
        $sql = strtolower("INSERT INTO warehouse_information_sheet (device, brand, processor, core, generation, model,
        location, send_to_production, create_by_inventory_id, send_time_to_production, sales_order_id) VALUES
        ('$device', '$brand', '$processor', '$core', '$generation', '$model', '$location', 0, '$user_id', 0, 0)");
                 
                    $query1 = mysqli_query($connection, $sql);
                    $query = "SELECT inventory_id FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1 ";
                    $query_run = mysqli_query($connection, $query);
                    foreach($query_run as $a){
                        $inventory_number = $a['inventory_id'];
                    }
                  $_SESSION['last_update_id']= $inventory_number;
                  $_SESSION['quantity'] = 1;
                     $_SESSION['brand'] =$brand ;
                    $_SESSION['model']=$model ;
                     $_SESSION['generation']=$generation ;
                     $_SESSION['core']=$core ;
                     $_SESSION['location']=$location ;
                     $tempDir = 'temp/'; 
                     $email = $inventory_number;
                     $filename = $email;
                     $codeContents = $email; 
                     QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);      
                     $start_print=1;
             
                        //  header("location: ./indexnew.php");  
                         

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
                    <p class="text-uppercase m-0 p-0">Update Inventory ID </p>
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
                                <label class="col-sm-3 col-form-label">Processor</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="processor" style="border-radius: 5px;" required>
                                        <option selected value="intel">Intel</option>
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
                                        <?php
                                            endwhile;
                                            ?>
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
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="location" style="border-radius: 5px;" required>
                                        <option selected value="$location"><?php echo $location; ?></option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <?php if(!empty($inventory_id) ){ ?>
                                <input class="form-control" type="hidden" name="inventory_id"
                                    value=' <?php echo  $inventory_id; ?>'>
                                <?php } ?>

                            </div>

                            <div class="d-flex col-5 mx-auto">

                                <button type="submit" name="submit" id="submit"
                                    class="btn mb-2 mt-4 bg-gradient-primary btn-sm d-block mx-auto text-center"><i
                                        class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Update QR
                                </button>
                                <!-- <button type="submit" name="" id="submit"
                                    onClick="('Are you sure you want to delete this Inventory ID')"
                                    class="btn mb-2 mt-4 bg-gradient-danger btn-sm d-block mx-auto text-center"><i
                                        class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Delete QR
                                </button> -->
                            </div>

                        </fieldset>

                    </form>


                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input class="btn btn-warning" type="button" onclick="printDiv('printableArea')"
                        value="print a Barcode!" />

                    <?php
                        $howManyCodes =1;
                       
                        $start = 0; 
                        $brand = $brand ;
                        $secondPart = $core." GEN".$generation;
                        $downText = $location ;
                        $model = $model; 
                        $hideText = null;
                        $last_id = $inventory_number;
                        


                        if($start_print == 1){
                            function filterRaw($name) {
                                return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
                            }
                    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
                    function write($code,$last_id, $brand, $model, $downText,$secondPart) {
                        ?>
                    <div id="printableArea">
                        <!-- <div class="row"> -->
                        <table>
                            <tr>
                                <th>

                                    <p class=" text-uppercase text-weight:bold"
                                        style="font-size: 50px; color:black !important">
                                        <?php echo $brand." ".$model." ".$secondPart  ?>
                                    </p>
                                    <div class="d-flex">
                                        <?php 
                                    // QR code print
                                    
                                    echo '<img src="temp/'.$last_id.'.png" style="width:300px; height:300px;margin: 0px 0 0 0px;">';?>


                                        <p class="text-center text-uppercase"
                                            style="font-size: 50px;color:black !important; margin:200px 0 0 50px">
                                            <?php 
                                        echo $downText;
                                    ?></p>
                                    </div>

                                </th>
                            </tr>
                        </table>
                        <!-- <div class=" col-sm">
                                        <p class="text-center text-uppercase text-weight:bold"
                                            style="font-size: 120px; color:black !important">
                                            MFG S/N
                                        </p>
                                        <div class="text-left" style="margin-left:0px">
                                            <?php 
                                        // barcode print 

                                    // echo '<img class="barcode w-100 " style="width:1350px"alt="'.$barcodeText.'" src="php-barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
                                    //     '&size='.$barcodeSize.'&print='.$mfg.'"/>';
                                        ?>
                                        </div>
                                        <p class="text-center text-uppercase"
                                            style="font-size: 120px;color:black !important">
                                            <?php 
                                    // echo  $mfg;
                                    // echo "</br>";
                                    
                                    // echo "</br>";
                                    // echo ".";
                                    ?></p>
                                    </div> -->
                        <!-- </div> -->

                        <?php
                                            }
                                        echo "<div class='sheet'>";
                            if ($codeArray != "") { // Specified array of codes
                                foreach (json_decode($codeArray) as $secondPart) {
                                    write($code,$last_id, $brand, $model,  $downText,$secondPart);
                                }
                            } else { // Unspecified codes, let's go incremental
                                for ($i = $start; $i < $howManyCodes + $start; $i++) {
                                    $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
                                    write($code,$last_id, $brand, $model, $downText,$secondPart);
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



<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    window.location.href = './test.php';
}
</script>
<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
</script>

<style>
textarea {
    text-transform: uppercase;
}

select,
input[type="text"],
[type="number"],
[type="email"],
[type='date'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
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
</script>
<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>




<?php include_once('../includes/footer.php');?>