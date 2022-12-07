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
$user = $_SESSION['username'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 4 && $department == 13){

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
$mfg_count= 0;
$cartoon_number=0;
$cartoon_count = 0;
$sales_order_id = 0;
$username = $_SESSION['username'];
$start_print = 0;
$screen_resolution=null;
$camera=null;
$dvd=null;
$keyboard_backlight=null;
$os=null;

$query = "SELECT sales_order_id FROM `packing_mfg` WHERE `packing_by`='$user' ORDER By mfg_id DESC limit 1;"; 
$query_run = mysqli_query($connection, $query);
$p_sales_order_id = 0;
foreach($query_run as $a){
  
    $p_sales_order_id = $a['sales_order_id'];
  
}

    if(isset($_POST['submit_mfg'])){

    
    $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
    // $cartoon_number = mysqli_real_escape_string($connection, $_POST['cartoon_number']); 
    $sales_order_id = mysqli_real_escape_string($connection, $_POST['sales_order_id']); 

  
    $query = "SELECT * FROM packing_mfg WHERE mfg = '$mfg' AND sales_order_id='0'";
    $query_run = mysqli_query($connection, $query);
    foreach($query_run as $data){
        $mfg_count++;
    }
    if( $mfg_count==1){
        $sales_type = null;
        $query_sales_order = "SELECT item_bulk FROM sales_order_add_items WHERE sales_order_id ='$sales_order_id' AND item_bulk = 'e_commerce'";
        $query_run_sales_order = mysqli_query($connection, $query_sales_order);
        foreach($query_run_sales_order as $data){
            $sales_type = $data['item_bulk'];
        }

        $query = "UPDATE packing_mfg SET sales_order_id ='$sales_order_id',packing_by='$user',packing_date = CURRENT_TIMESTAMP WHERE mfg = '$mfg' ";
        $query_run = mysqli_query($connection, $query);

        
    $query = " SELECT * FROM packing_mfg WHERE mfg = '$mfg' ";
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
    $touch_type = $data['touch'];
    $screen_size = $data['screen_size'];
    $cartoon_number = $data['cartoon_number'];
    $sales_order_id = $data['sales_order_id'];
    $screen_resolution = $data['screen_resolution'];
    $camera= $data['camera'];
    $dvd= $data['dvd'];
    $keyboard_backlight= $data['keyboard_backlight'];
    $os= $data['os'];
    
    $start_print = 1;

   }
   if($sales_type == 'e_commerce'){
    $query_ecom ="INSERT INTO `e_com_inventory`(
        `device`,
        `brand`,
        `core`,
        `generation`,
        `model`,
        `hdd_capacity`,
        `hdd_type`,
        `mfg`,
        `ram_capacity`,
        `touch`,
        `screen_size`,
        `sales_order_id`,
        `screen_resolution`,
        `camera`,
        `dvd`,
        `keyboard_backlight`,
        `os`,
        `packing_by`,
        `packing_date`
    )
    VALUES(
        '$device',
        '$brand',
        '$core',
        '$generation',
        '$model',
        '$hdd_capacity',
        '$hdd_type',
        '$mfg',
        '$ram_capacity',
        '$touch_type',
        '$screen_size',
        '$sales_order_id',
        '$screen_resolution',
        '$camera',
        '$dvd',
        '$keyboard_backlight',
        '$os',
        '$user',
        CURRENT_TIMESTAMP
    )";
    $query_run = mysqli_query($connection, $query_ecom);
   }
    $tempDir = 'temp/';
    $filename = $mfg;
    $codeContents = $mfg;
    QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
    $start_print = 1;
}else{
    echo '<script>alert("QR code already exists")</script>';
}
   
    }
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="#">
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
                            <div class="row">
                                <label class="col-sm-3 col-form-label">S/O Number</label>

                                <div class="col-sm-8">
                                    <?php if($p_sales_order_id == 0){ ?>
                                    <input type="text" min="1" class="form-control" placeholder="S/O Number"
                                        name="sales_order_id">
                                    <?php }else{ ?>
                                    <input type="text" min="1" class="form-control" name="sales_order_id"
                                        value="<?php echo $p_sales_order_id  ?>">
                                    <?php   }  ?>

                                </div>
                            </div>

                            <legend>Create MFG</legend>
                            <!-- <div class="row">
                                <label class="col-sm-3 col-form-label">Cartoon Number</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="Cartoon Number"
                                        name="cartoon_number">
                                </div>
                            </div> -->

                            <div class="row">
                                <label class="col-sm-3 col-form-label">MFG Number</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="MFG Number" name="mfg">
                                </div>
                            </div>


                            <button type="submit" name="submit_mfg" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate Label</button>
                        </fieldset>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input type="button" onclick="printDiv('printableArea')" value="print a Label !" />
                    <div id="printableArea">
                        <?php
                        $howManyCodes =1;
                        $digits = 6;
                        $start = 0; 
                        $brand = $brand ;
                        $secondPart = $core." GEN".$generation."  ".$ram_capacity."GB/".$hdd_capacity." ".$hdd_type;
                        $downText = $generation."-".$model;
                        $model = $model; 
                        $hideText = null;
                        $last_id = $mfg;
                        $barcodeText = trim($mfg);
                        $barcodeType="Code128";
                        $barcodeDisplay="Horizontal";
                        $barcodeSize=40;
                        


                        if($start_print == 1){
                            function filterRaw($name) {
                                return filter_input (INPUT_GET, $name, FILTER_UNSAFE_RAW);
                            }
                    $codeArray = (filterRaw('codeArray') != "") ? filterRaw('codeArray') : "";
                    function write($code,$last_id, $brand, $model,$mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize, $touch_type,$screen_size,$cartoon_number,$sales_order_id) {
                        ?>
                        <table style="border: black; border-style: solid;">
                            <tr style="border: black; border-style: solid;  !important">
                                <th style="border: black; border-style: solid;"><?php if ($brand != "") {
                                $abc= strtoupper( $brand);
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px '>S/O </p></div>";
                            } 
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid; "><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40; width:650px;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px '> $sales_order_id </p></div>";
                            
                            ?>
                                </td>
                            </tr>
                            <tr style="border: black; border-style: solid;">
                                <th style="border: black; border-style: solid;"><?php if ($brand != "") {
                                $abc= strtoupper( $brand);
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>Brand </p></div>";
                            } 
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid;"><?php if ($brand != "") {
                                $abc= strtoupper( $brand);
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'> $abc </p></div>";
                            } 
                            ?>
                                </td>
                            </tr>
                            <tr style="border: black; border-style: solid;">
                                <th style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>Model</p></div>";
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'> $model </p></div>";
                            ?>
                                </td>
                            </tr>
                            <tr style="border: black; border-style: solid;">
                                <th style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>Spec </p></div>";
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>$secondPart</p></div>";
                            ?>
                                </td>
                            </tr>
                            <tr style="border: black; border-style: solid;">
                                <th style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>Screen &nbsp; &nbsp; </p></div>";
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'> $touch_type</p></div>";
                            ?>
                                </td>
                            </tr>
                            <tr style="border: black; border-style: solid;">
                                <th style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'>Screen size </p></div>";
                            ?>
                                </th>
                                <td style=" border: black; border-style: solid;"><?php 
                                echo  "<div  ><p class = 'text-uppercase' style='font-size: 40;
                                font-family: Arial, Helvetica, sans-serif;margin: 30px 0 0 0;
                                color:black;text-weight:bold;text-align: left;margin-left:5px'> $screen_size'</p></div>";
                            ?>
                                </td>
                            </tr>
                        </table>
                        <?php echo "</br>" ?>

                        <div class="row">
                            <div class="col-sm">
                                <p class="text-center text-uppercase text-weight:bold"
                                    style="font-size: 40px; color:black !important">
                                    MFG S/N
                                </p>
                                <div class="text-center" style="margin-left:0px">
                                    <?php 
                                    // barcode print
//                                     echo '<img class="barcode " style="width:900px"alt="'.$barcodeText.'" src="php-barcode/barcode.php?text='.$barcodeText.'&codetype='.$barcodeType.'&orientation='.$barcodeDisplay.
// '&size='.$barcodeSize.'&print='.$mfg.'"/>';
?>

                                    <?php 
                                    // QR code print
                                    echo '<img src="temp/'.$mfg.'.png" style="width:400px; height:400px;margin: 0px 0 0 0px;">';?>
                                </div>
                                <p class="text-center text-uppercase" style="font-size: 40px;color:black !important">
                                    <?php echo  $mfg; ?></p>
                            </div>
                        </div>






                        <?php
                                            }
                                        echo "<div class='sheet'>";
                            if ($codeArray != "") { // Specified array of codes
                                foreach (json_decode($codeArray) as $secondPart) {
                                    write($code,$last_id, $brand, $model, $mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize, $touch_type,$screen_size,$cartoon_number,$sales_order_id);
                                }
                            } else { // Unspecified codes, let's go incremental
                                for ($i = $start; $i < $howManyCodes + $start; $i++) {
                                    $code = str_pad($i, $digits, "0", STR_PAD_LEFT);
                                    write($code,$last_id, $brand, $model, $mfg, $downText,$secondPart,$barcodeText,$barcodeType,$barcodeDisplay,$barcodeSize, $touch_type,$screen_size,$cartoon_number,$sales_order_id);
                                }
                            }
                        echo "</div>";
                        
                          } 
                            $device = NULL;
                            $brand = NULL;
                            $core = NULL;
                            $generation = NULL;
                            $model = NULL;
                            $hdd_capacity = NULL;
                            $ram_capacity = NULL;
                            $hdd_type = null;
                            $mfg= null;
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
    window.location.href = './create_packing_label.php';

}
</script>