<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
//   ?>
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user = $_SESSION['username'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 4 && $department == 19){

$errors = array();
$username = $_SESSION['username'];

$device = NULL;
$brand = NULL;
$core = null;
$generation = null;
$model = NULL;
$hdd_capacity = NULL;
$hdd_type = null;
$ram_capacity = null;
$touch_type = null;
$screen_size = null;
$screen_resolution = null;
$graphic = null;
$graphic_type = null;
$camera = null;
$dvd = null;
$keyboard_backlight = null;
$os = null;
$mfg = null;

$device_d = '';


$start_print = 0;

    if(isset($_POST['submit_mfg'])){
        $exist = 0;
        $device = mysqli_real_escape_string($connection, $_POST['device_type']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $core = mysqli_real_escape_string($connection, $_POST['core']);
        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
        $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']);
        $ram_capacity = mysqli_real_escape_string($connection, $_POST['ram']);
        $touch_type = mysqli_real_escape_string($connection, $_POST['touch']); 
        $screen_size = mysqli_real_escape_string($connection, $_POST['screen_size']); 
        $screen_resolution = mysqli_real_escape_string($connection, $_POST['resolutions']);
        $graphic = mysqli_real_escape_string($connection, $_POST['graphic']); 
        $graphic_type = mysqli_real_escape_string($connection, $_POST['graphic_type']); 
        $camera = mysqli_real_escape_string($connection, $_POST['camera']); 
        $dvd = mysqli_real_escape_string($connection, $_POST['optical']); 
        $keyboard_backlight = mysqli_real_escape_string($connection, $_POST['keyboard_backlight']); 
        $os = mysqli_real_escape_string($connection, $_POST['operating_system']);
        $mfg = mysqli_real_escape_string($connection, $_POST['mfg_number']); 
        
        $query ="SELECT * FROM packing_mfg WHERE mfg ='$mfg' ";
        $query_run = mysqli_query($connection, $query);
    
    
        foreach($query_run as $data){
            $exist++;
        }
        
        if($exist == 0){
        $query = "INSERT INTO packing_mfg(device, brand, core, generation, model, hdd_capacity, hdd_type, created_by, mfg, ram_capacity, touch, screen_size, cartoon_number, sales_order_id, 
                                        screen_resolution, camera, dvd, keyboard_backlight, os, packing_by, packing_date, sales_type, graphic_type, graphic) 
                VALUES('$device', '$brand' , '$core', '$generation', '$model', '$hdd_capacity', '$hdd_type', '$username','$mfg','$ram_capacity', '$touch_type','$screen_size', 0, 0, '$screen_resolution', 
                '$camera','$dvd','$keyboard_backlight','$os', 0, 0, 0, '$graphic_type', '$graphic')";
        $query_run = mysqli_query($connection, $query);
        
        $tempDir = 'temp/';
        $filename = $mfg;
        $codeContents = $mfg;
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
        $start_print = 1;

        echo "<script>
                var newHTML = document.createElement ('div');
                newHTML.innerHTML =
                newHTML = document.createElement ('div');
                newHTML.innerHTML = ' <div id=\"myModal\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                document.body.appendChild (newHTML);
                $(window).load(function(){
                    $('#modal-motherboard').modal('show');
                });
            </script>";
            $start_print = 1;
        }else{
            echo '<script>alert("MFG Number '.$mfg.' is Already Exist")</script>';
            $mfg = null;
        }
   
    }


    $query ="SELECT * FROM packing_mfg WHERE mfg ='$mfg'";
    $result =  mysqli_query($connection, $query); 


    foreach($result as $data){
        $device = $data['device'];
        $brand = $data['brand'];
        $core = $data['core'];
        $generation = $data['generation'];
        $model = $data['model'];
        $hdd_capacity = $data['hdd_capacity'];
        $hdd_type = $data['hdd_type'];
        $ram_capacity = $data['ram_capacity'];
        $touch_type = $data['touch'];
        $screen_size = $data['screen_size'];
        $screen_resolution = $data['screen_resolution'];
        $graphic = $data['graphic'];
        $graphic_type = $data['graphic_type'];
        $dvd = $data['dvd'];
        $camera = $data['camera'];
        $keyboard_backlight = $data['keyboard_backlight'];
        $os = $data['os'];
        $mfg = $data['mfg'];
        $mfg_id = $data['mfg_id'];                        
    }
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-3 w-100">
                <form method="POST">
                    <div class="card-body">
                        <fieldset class="">

                            <?php 
                        

                            $xd = "SELECT * FROM packing_mfg WHERE created_by = '$user' ORDER BY mfg_id DESC LIMIT 1";
                            $d = mysqli_query($connection, $xd);
                            foreach($d as $x){
                                $x_device_type = $x['device'];
                                $x_brand = $x['brand'];
                                $x_core = $x['core'];
                                $x_generation = $x['generation'];
                                $x_model = $x['model'];
                                $x_ram_capacity = $x['ram_capacity'];
                                $x_hdd_capacity = $x['hdd_capacity'];
                                $x_hdd_type = $x['hdd_type'];
                                $x_touch_type = $x['touch'];
                                $x_screen_size = $x['screen_size'];
                                $x_screen_resolutions = $x['screen_resolution'];
                                $x_graphic = $x['graphic'];
                                $x_graphic_type = $x['graphic_type'];
                                $x_os = $x['os'];
                                $x_optical = $x['dvd'];
                                $x_camera = $x['camera'];
                                $x_keyboard_backlight = $x['keyboard_backlight'];
                            }
                        ?>

                            <!-- ============================================================== -->
                            <!-- Device  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize " style="font-size:14px">Device
                                    Type</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_device_type == 'laptop'){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="laptop" name="device_type" value="laptop"
                                                    checked>
                                                <label class="label_values my-1" for="laptop">Laptop </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="laptop" name="device_type" value="laptop"
                                                    required>
                                                <label class="label_values my-1" for="laptop">Laptop </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Brand  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize " style="font-size:14px">Brand
                                </label>
                                <div class="col-sm-10 ">

                                    <?php if($x_brand == 'dell') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="dell" name="brand" value="dell" checked>
                                                <label class="label_values my-1" for="dell">Dell </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="dell" name="brand" value="dell" required>
                                                <label class="label_values my-1" for="dell">Dell </label>
                                            </div>
                                        </label>
                                    </div>

                                    <?php } if($x_brand == 'hp') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hp" name="brand" value="hp" checked>
                                                <label class="label_values my-1" for="hp">HP </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hp" name="brand" value="hp" required>
                                                <label class="label_values my-1" for="hp">HP </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_brand == 'lenovo') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="lenovo" name="brand" value="lenovo" checked>
                                                <label class="label_values my-1" for="lenovo">Lenovo </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="lenovo" name="brand" value="lenovo" required>
                                                <label class="label_values my-1" for="lenovo">Lenovo </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_brand == 'acer') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="acer" name="brand" value="acer" checked>
                                                <label class="label_values my-1" for="acer">Acer </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="acer" name="brand" value="acer" required>
                                                <label class="label_values my-1" for="acer">Acer </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_brand == 'apple') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="apple" name="brand" value="apple" checked>
                                                <label class="label_values my-1" for="apple">Apple </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="apple" name="brand" value="apple" required>
                                                <label class="label_values my-1" for="apple">Apple </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_brand == 'microsoft') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="microsoft" name="brand" value="microsoft"
                                                    checked>
                                                <label class="label_values my-1" for="microsoft">Microsoft </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="microsoft" name="brand" value="microsoft"
                                                    required>
                                                <label class="label_values my-1" for="microsoft">Microsoft </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_brand == 'microsoft') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="fujitsu" name="brand" value="fujitsu" checked>
                                                <label class="label_values my-1" for="fujitsu">Fujitsu </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php }else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="fujitsu" name="brand" value="fujitsu" required>
                                                <label class="label_values my-1" for="fujitsu">Fujitsu </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Core  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Core</label>
                                <div class="col-sm-10 ">

                                    <?php if($x_core == 'celeron') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="celeron" name="core" value="celeron" checked>
                                                <label class="label_values my-1" for="celeron">Celeron </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="celeron" name="core" value="celeron" required>
                                                <label class="label_values my-1" for="celeron">Celeron </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'pentium') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="pentium" name="core" value="pentium" checked>
                                                <label class="label_values my-1" for="pentium">Pentium </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="pentium" name="core" value="pentium" required>
                                                <label class="label_values my-1" for="pentium">Pentium </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'i3') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">

                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i3" name="core" value="i3" checked>
                                                <label class="label_values my-1" for="i3">i3
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">

                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i3" name="core" value="i3" required>
                                                <label class="label_values my-1" for="i3">i3
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'i5') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i5" name="core" value="i5" checked>
                                                <label class="label_values my-1" for="i5">i5
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i5" name="core" value="i5" required>
                                                <label class="label_values my-1" for="i5">i5
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'i7') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i7" name="core" value="i7" checked>
                                                <label class="label_values my-1" for="i7">i7
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i7" name="core" value="i7" required>
                                                <label class="label_values my-1" for="i7">i7
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'i9') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i9" name="core" value="i9" checked>
                                                <label class="label_values my-1" for="i9">i9
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="i9" name="core" value="i9" required>
                                                <label class="label_values my-1" for="i9">i9
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'xeon') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="xeon" name="core" value="xeon" checked>
                                                <label class="label_values my-1" for="xeon">Xeon
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="xeon" name="core" value="xeon" required>
                                                <label class="label_values my-1" for="xeon">Xeon
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'ryzen3') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">

                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen3" name="core" value="ryzen3" checked>
                                                <label class="label_values my-1" for="ryzen3">Ryzen3
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">

                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen3" name="core" value="ryzen3" required>
                                                <label class="label_values my-1" for="ryzen3">Ryzen3
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'ryzen5') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen5" name="core" value="ryzen5" checked>
                                                <label class="label_values my-1" for="ryzen5">Ryzen5
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen5" name="core" value="ryzen5" required>
                                                <label class="label_values my-1" for="ryzen5">Ryzen5
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'ryzen7') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen7" name="core" value="ryzen7" checked>
                                                <label class="label_values my-1" for="ryzen7">Ryzen7
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen7" name="core" value="ryzen7" required>
                                                <label class="label_values my-1" for="ryzen7">Ryzen7
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'ryzen9') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen9" name="core" value="ryzen9" checked>
                                                <label class="label_values my-1" for="ryzen9">Ryzen9
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ryzen9" name="core" value="ryzen9" required>
                                                <label class="label_values my-1" for="ryzen9">Ryzen9
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'a4') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a4" name="core" value="a4" checked>
                                                <label class="label_values my-1" for="a4">A4
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a4" name="core" value="a4" required>
                                                <label class="label_values my-1" for="a4">A4
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'a6') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a6" name="core" value="a6" checked>
                                                <label class="label_values my-1" for="a6">A6
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a6" name="core" value="a6" required>
                                                <label class="label_values my-1" for="a6">A6
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'a8') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a8" name="core" value="a8" checked>
                                                <label class="label_values my-1" for="a8">A8
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a8" name="core" value="a8" required>
                                                <label class="label_values my-1" for="a8">A8
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'a10') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a10" name="core" value="a10" checked>
                                                <label class="label_values my-1" for="a10">A10
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a10" name="core" value="a10" required>
                                                <label class="label_values my-1" for="a10">A10
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'a12') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a12" name="core" value="a12" checked>
                                                <label class="label_values my-1" for="a12">A12
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="a12" name="core" value="a12" required>
                                                <label class="label_values my-1" for="a12">A12
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_core == 'athlon') {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="athlon" name="core" value="athlon" checked>
                                                <label class="label_values my-1" for="athlon">Athlon
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else {?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="athlon" name="core" value="athlon" required>
                                                <label class="label_values my-1" for="athlon">Athlon
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Generation  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Generation</label>
                                <div class="col-sm-10">
                                    <?php if($x_generation == 1){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1st" name="generation" value="1" checked>
                                                <label class="label_values my-1" for="1st">1st
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1st" name="generation" value="1" required>
                                                <label class="label_values my-1" for="1st">1st
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 2){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2nd" name="generation" value="2" checked>
                                                <label class="label_values my-1" for="2nd">2nd
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2nd" name="generation" value="2" required>
                                                <label class="label_values my-1" for="2nd">2nd
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 3){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="3rd" name="generation" value="3" checked>
                                                <label class="label_values my-1" for="3rd">3rd
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="3rd" name="generation" value="3" required>
                                                <label class="label_values my-1" for="3rd">3rd
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 4){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4th" name="generation" value="4" checked>
                                                <label class="label_values my-1" for="4th">4th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4th" name="generation" value="4" required>
                                                <label class="label_values my-1" for="4th">4th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 5){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="5th" name="generation" value="5" checked>
                                                <label class="label_values my-1" for="5th">5th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="5th" name="generation" value="5" required>
                                                <label class="label_values my-1" for="5th">5th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 6){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="6th" name="generation" value="6" checked>
                                                <label class="label_values my-1" for="6th">6th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="6th" name="generation" value="6" required>
                                                <label class="label_values my-1" for="6th">6th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 7){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="7th" name="generation" value="7" checked>
                                                <label class="label_values my-1" for="7th">7th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="7th" name="generation" value="7" required>
                                                <label class="label_values my-1" for="7th">7th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 8){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8th" name="generation" value="8" checked>
                                                <label class="label_values my-1" for="8th">8th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8th" name="generation" value="8" required>
                                                <label class="label_values my-1" for="8th">8th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 9){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="9th" name="generation" value="9" checked>
                                                <label class="label_values my-1" for="9th">9th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="9th" name="generation" value="9" required>
                                                <label class="label_values my-1" for="9th">9th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 10){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="10th" name="generation" value="10" checked>
                                                <label class="label_values my-1" for="10th">10th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="10th" name="generation" value="10" required>
                                                <label class="label_values my-1" for="10th">10th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 11){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="11th" name="generation" value="11" checked>
                                                <label class="label_values my-1" for="11th">11th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="11th" name="generation" value="11" required>
                                                <label class="label_values my-1" for="11th">11th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 12){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="12th" name="generation" value="12" checked>
                                                <label class="label_values my-1" for="12th">12th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="12th" name="generation" value="12" required>
                                                <label class="label_values my-1" for="12th">12th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_generation == 13){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13th" name="generation" value="13" checked>
                                                <label class="label_values my-1" for="13th">13th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13th" name="generation" value="13" required>
                                                <label class="label_values my-1" for="13th">13th
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Model  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Model</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_model == null) {?>
                                    <input class="mx-2" type="text" name="model" required>
                                    <?php } else { ?>
                                    <input class="mx-2" type="text" <?php echo 'value="' . $x_model . '"'; ?>
                                        name="model" required>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- RAM  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">RAM</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_ram_capacity == 2) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2gb" name="ram" value="2" checked>
                                                <label class="label_values my-1" for="2gb"
                                                    style="margin-right: 15px;">2GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2gb" name="ram" value="2" required>
                                                <label class="label_values my-1" for="2gb"
                                                    style="margin-right: 15px;">2GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 4) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4gb" name="ram" value="4" checked>
                                                <label class="label_values my-1" for="4gb"
                                                    style="margin-right: 15px;">4Gb
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4gb" name="ram" value="4" required>
                                                <label class="label_values my-1" for="4gb"
                                                    style="margin-right: 15px;">4Gb
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 8) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8gb" name="ram" value="8" checked>
                                                <label class="label_values my-1" for="8gb"
                                                    style="margin-right: 15px;">8GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8gb" name="ram" value="8" required>
                                                <label class="label_values my-1" for="8gb"
                                                    style="margin-right: 15px;">8GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 16) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="16gb" name="ram" value="16" checked>
                                                <label class="label_values my-1" for="16gb"
                                                    style="margin-right: 15px;">16GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="24gb" name="ram" value="24" required>
                                                <label class="label_values my-1" for="24gb"
                                                    style="margin-right: 15px;">16GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 24) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="24gb" name="ram" value="24" checked>
                                                <label class="label_values my-1" for="24gb"
                                                    style="margin-right: 15px;">24GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="24gb" name="ram" value="24" required>
                                                <label class="label_values my-1" for="24gb"
                                                    style="margin-right: 15px;">24GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 32) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="32gb" name="ram" value="32" checked>
                                                <label class="label_values my-1" for="32gb"
                                                    style="margin-right: 15px;">32GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="32gb" name="ram" value="32" required>
                                                <label class="label_values my-1" for="32gb"
                                                    style="margin-right: 15px;">32GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_ram_capacity == 64) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="64gb" name="ram" value="64" required>
                                                <label class="label_values my-1" for="64gb"
                                                    style="margin-right: 15px;">64GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="64gb" name="ram" value="64" required>
                                                <label class="label_values my-1" for="64gb"
                                                    style="margin-right: 15px;">64GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- HDD  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                    HDD
                                </label>
                                <div class="col-sm-10 ">

                                    <?php if($x_hdd_capacity == 128) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="128gbhdd" name="hdd_capacity" value="128"
                                                    checked>
                                                <label class="label_values my-1" for="128gbhdd"
                                                    style="margin-right: 15px;">128GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="128gbhdd" name="hdd_capacity" value="128"
                                                    required>
                                                <label class="label_values my-1" for="128gbhdd"
                                                    style="margin-right: 15px;">128GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>

                                    <?php } if($x_hdd_capacity == 256) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="256gbhdd" name="hdd_capacity" value="256"
                                                    checked>
                                                <label class="label_values my-1" for="256gbhdd"
                                                    style="margin-right: 15px;">256GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="256gbhdd" name="hdd_capacity" value="256"
                                                    required>
                                                <label class="label_values my-1" for="256gbhdd"
                                                    style="margin-right: 15px;">256GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_capacity == 320) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="320gbhdd" name="hdd_capacity" value="320"
                                                    checked>
                                                <label class="label_values my-1" for="320gbhdd"
                                                    style="margin-right: 15px;">320GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="320gbhdd" name="hdd_capacity" value="320"
                                                    required>
                                                <label class="label_values my-1" for="320gbhdd"
                                                    style="margin-right: 15px;">320GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_capacity == 512) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="512gbhdd" name="hdd_capacity" value="512"
                                                    checked>
                                                <label class="label_values my-1" for="512gbhdd"
                                                    style="margin-right: 15px;">512GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="512gbhdd" name="hdd_capacity" value="512"
                                                    required>
                                                <label class="label_values my-1" for="512gbhdd"
                                                    style="margin-right: 15px;">512GB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_capacity == '1tb') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1tbhdd" name="hdd_capacity" value="1tb" checked>
                                                <label class="label_values my-1" for="1tbhdd"
                                                    style="margin-right: 15px;">1TB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1tbhdd" name="hdd_capacity" value="1tb"
                                                    required>
                                                <label class="label_values my-1" for="1tbhdd"
                                                    style="margin-right: 15px;">1TB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_capacity == '2tb') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2tbhdd" name="hdd_capacity" value="2" checked>
                                                <label class="label_values my-1" for="2tbhdd"
                                                    style="margin-right: 15px;">2TB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2tbhdd" name="hdd_capacity" value="2" required>
                                                <label class="label_values my-1" for="2tbhdd"
                                                    style="margin-right: 15px;">2TB
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_capacity == 'n/a') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nohdd" name="hdd_capacity" value="n/a" checked>
                                                <label class="label_values my-1" for="nohdd"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nohdd" name="hdd_capacity" value="n/a" required>
                                                <label class="label_values my-1" for="nohdd"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- HDD Type -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                    HDD Type
                                </label>
                                <div class="col-sm-10 ">
                                    <?php if($x_hdd_type == 'hdd') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hdd" name="hdd_type" value="hdd" checked>
                                                <label class="label_values my-1" for="hdd"
                                                    style="margin-right: 15px;">HDD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hdd" name="hdd_type" value="hdd" required>
                                                <label class="label_values my-1" for="hdd"
                                                    style="margin-right: 15px;">HDD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_type == 'ssd') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ssd" name="hdd_type" value="ssd" checked>
                                                <label class="label_values my-1" for="ssd"
                                                    style="margin-right: 15px;">SSD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ssd" name="hdd_type" value="ssd" required>
                                                <label class="label_values my-1" for="ssd"
                                                    style="margin-right: 15px;">SSD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_hdd_type == 'other') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="other" name="hdd_type" value="other" checked>
                                                <label class="label_values my-1" for="other"
                                                    style="margin-right: 15px;">Other
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="other" name="hdd_type" value="other" required>
                                                <label class="label_values my-1" for="other"
                                                    style="margin-right: 15px;">Other
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Touch -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Display</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_touch_type == 'touch') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="touch" name="touch" value="touch" checked>
                                                <label class="label_values my-1" for="touch"
                                                    style="margin-right: 15px;">Touch
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="touch" name="touch" value="touch" required>
                                                <label class="label_values my-1" for="touch"
                                                    style="margin-right: 15px;">Touch
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_touch_type == 'non-touch') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nontouch" name="touch" value="non-touch"
                                                    checked>
                                                <label class="label_values my-1" for="nontouch"
                                                    style="margin-right: 15px;">Non
                                                    Touch
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nontouch" name="touch" value="non-touch"
                                                    required>
                                                <label class="label_values my-1" for="nontouch"
                                                    style="margin-right: 15px;">Non
                                                    Touch
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Display Size -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Display</label>
                                <div class="col-sm-10">

                                    <?php if($x_screen_size == '10.1') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="10.1" name="screen_size" value="10.1" checked>
                                                <label class="label_values my-1" for="10.1"
                                                    style="margin-right: 15px;">10.1"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="10.1" name="screen_size" value="10.1" required>
                                                <label class="label_values my-1" for="10.1"
                                                    style="margin-right: 15px;">10.1"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '11.6') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="11.6" name="screen_size" value="11.6" checked>
                                                <label class="label_values my-1" for="11.6"
                                                    style="margin-right: 15px;">11.6"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="11.6" name="screen_size" value="11.6" required>
                                                <label class="label_values my-1" for="11.6"
                                                    style="margin-right: 15px;">11.6"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '12.4') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="12.4" name="screen_size" value="12.4" checked>
                                                <label class="label_values my-1" for="12.4"
                                                    style="margin-right: 15px;">12.4"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="12.4" name="screen_size" value="12.4" required>
                                                <label class="label_values my-1" for="12.4"
                                                    style="margin-right: 15px;">12.4"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '12.5') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="12.5" name="screen_size" value="12.5" checked>
                                                <label class="label_values my-1" for="12.5"
                                                    style="margin-right: 15px;">12.5"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13.3" name="screen_size" value="13.3" required>
                                                <label class="label_values my-1" for="13.3"
                                                    style="margin-right: 15px;">13.3"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '13.3') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13.3" name="screen_size" value="13.3" checked>
                                                <label class="label_values my-1" for="13.3"
                                                    style="margin-right: 15px;">13.3"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13.3" name="screen_size" value="13.3" required>
                                                <label class="label_values my-1" for="13.3"
                                                    style="margin-right: 15px;">13.3"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '13.5') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13.5" name="screen_size" value="13.5" checked>
                                                <label class="label_values my-1" for="13.5"
                                                    style="margin-right: 15px;">13.5"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="13.5" name="screen_size" value="13.5" required>
                                                <label class="label_values my-1" for="13.5"
                                                    style="margin-right: 15px;">13.5"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '14') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="14" name="screen_size" value="14" checked>
                                                <label class="label_values my-1" for="14"
                                                    style="margin-right: 15px;">14"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="14" name="screen_size" value="14" required>
                                                <label class="label_values my-1" for="14"
                                                    style="margin-right: 15px;">14"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '15.6') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="15.6" name="screen_size" value="15.6" checked>
                                                <label class="label_values my-1" for="15.6"
                                                    style="margin-right: 15px;">15.6"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="15.6" name="screen_size" value="15.6" required>
                                                <label class="label_values my-1" for="15.6"
                                                    style="margin-right: 15px;">15.6"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '16') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="16" name="screen_size" value="16" checked>
                                                <label class="label_values my-1" for="16"
                                                    style="margin-right: 15px;">16"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="16" name="screen_size" value="16" required>
                                                <label class="label_values my-1" for="16"
                                                    style="margin-right: 15px;">16"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '17.3') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="17.3" name="screen_size" value="17.3" checked>
                                                <label class="label_values my-1" for="17.3"
                                                    style="margin-right: 15px;">17.3"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="17.3" name="screen_size" value="17.3" required>
                                                <label class="label_values my-1" for="17.3"
                                                    style="margin-right: 15px;">17.3"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_size == '18.4') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="18.4" name="screen_size" value="18.4" checked>
                                                <label class="label_values my-1" for="18.4"
                                                    style="margin-right: 15px;">18.4"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="18.4" name="screen_size" value="18.4" required>
                                                <label class="label_values my-1" for="18.4"
                                                    style="margin-right: 15px;">18.4"
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Display Resolutions -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Resolutions</label>
                                <div class="col-sm-10">
                                    <?php if($x_screen_resolutions == '1366x768') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hd" name="resolutions" value="1366x768" checked>
                                                <label class="label_values my-1" for="hd"
                                                    style="margin-right: 15px;">HD(1366x768)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hd" name="resolutions" value="1366x768"
                                                    required>
                                                <label class="label_values my-1" for="hd"
                                                    style="margin-right: 15px;">HD(1366x768)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_resolutions == '1600x900') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hd+" name="resolutions" value="1600x900"
                                                    checked>
                                                <label class="label_values my-1" for="hd+"
                                                    style="margin-right: 15px;">HD+(1600x900)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="hd+" name="resolutions" value="1600x900"
                                                    required>
                                                <label class="label_values my-1" for="hd+"
                                                    style="margin-right: 15px;">HD+(1600x900)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_resolutions == '1920x1080') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="fhd" name="resolutions" value="1920x1080"
                                                    checked>
                                                <label class="label_values my-1" for="fhd"
                                                    style="margin-right: 15px;">FHD(1920x1080)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="fhd" name="resolutions" value="1920x1080"
                                                    required>
                                                <label class="label_values my-1" for="fhd"
                                                    style="margin-right: 15px;">FHD(1920x1080)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_resolutions == '2560x1440') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="qhd" name="resolutions" value="2560x1440"
                                                    checked>
                                                <label class="label_values my-1" for="qhd"
                                                    style="margin-right: 15px;">QHD(2k)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="qhd" name="resolutions" value="2560x1440"
                                                    required>
                                                <label class="label_values my-1" for="qhd"
                                                    style="margin-right: 15px;">QHD(2k)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_screen_resolutions == '2560x1440') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4k" name="resolutions" value="3840x2160"
                                                    checked>
                                                <label class="label_values my-1" for="4k"
                                                    style="margin-right: 15px;">UHD(4K)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4k" name="resolutions" value="3840x2160"
                                                    required>
                                                <label class="label_values my-1" for="4k"
                                                    style="margin-right: 15px;">UHD(4K)
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Graphic -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Graphic</label>
                                <div class="col-sm-10 ">

                                    <?php if($x_graphic == 1) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1gb-graphic" name="graphic" value="1" checked>
                                                <label class="label_values my-1" for="1gb-graphic"
                                                    style="margin-right: 15px;">1GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="1gb-graphic" name="graphic" value="1" required>
                                                <label class="label_values my-1" for="1gb-graphic"
                                                    style="margin-right: 15px;">1GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic == 2) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2gb-graphic" name="graphic" value="2" checked>
                                                <label class="label_values my-1" for="2gb-graphic"
                                                    style="margin-right: 15px;">2GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="2gb-graphic" name="graphic" value="2" required>
                                                <label class="label_values my-1" for="2gb-graphic"
                                                    style="margin-right: 15px;">2GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic == 4) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4gb-graphic" name="graphic" value="4" checked>
                                                <label class="label_values my-1" for="4gb-graphic"
                                                    style="margin-right: 15px;">4GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="4gb-graphic" name="graphic" value="4" required>
                                                <label class="label_values my-1" for="4gb-graphic"
                                                    style="margin-right: 15px;">4GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic == 8) { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8gb-graphic" name="graphic" value="8" checked>
                                                <label class="label_values my-1" for="8gb-graphic"
                                                    style="margin-right: 15px;">8GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="8gb-graphic" name="graphic" value="8" required>
                                                <label class="label_values my-1" for="8gb-graphic"
                                                    style="margin-right: 15px;">8GB </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic == 'n/a') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="no-graphic" name="graphic" value="n/a" checked>
                                                <label class="label_values my-1" for="no-graphic"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="no-graphic" name="graphic" value="n/a" required>
                                                <label class="label_values my-1" for="no-graphic"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Graphic Type -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">Graphic
                                    Type</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_graphic_type == 'intel'){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="intel" name="graphic_type" value="intel"
                                                    checked>
                                                <label class="label_values my-1" for="intel"
                                                    style="margin-right: 15px;">Intel
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="intel" name="graphic_type" value="intel"
                                                    required>
                                                <label class="label_values my-1" for="intel"
                                                    style="margin-right: 15px;">Intel
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic_type == 'nvidia'){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nvidia" name="graphic_type" value="nvidia"
                                                    checked>
                                                <label class="label_values my-1" for="nvidia"
                                                    style="margin-right: 15px;">Nvidia
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="nvidia" name="graphic_type" value="nvidia"
                                                    required>
                                                <label class="label_values my-1" for="nvidia"
                                                    style="margin-right: 15px;">Nvidia
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic_type == 'AMD'){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="amd" name="graphic_type" value="AMD" checked>
                                                <label class="label_values my-1" for="amd"
                                                    style="margin-right: 15px;">AMD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="amd" name="graphic_type" value="AMD" required>
                                                <label class="label_values my-1" for="amd"
                                                    style="margin-right: 15px;">AMD
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_graphic_type == 'n/a'){ ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="n-a" name="graphic_type" value="n/a" checked>
                                                <label class="label_values my-1" for="n-a"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="n-a" name="graphic_type" value="n/a" required>
                                                <label class="label_values my-1" for="n-a"
                                                    style="margin-right: 15px;">N/A
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Operation System -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                    Operation System</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_os == 'windows') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Windows" name="operating_system" value="windows"
                                                    checked>
                                                <label class="label_values my-1" for="Windows"
                                                    style="margin-right: 15px;">Windows </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Windows" name="operating_system" value="windows"
                                                    required>
                                                <label class="label_values my-1" for="Windows"
                                                    style="margin-right: 15px;">Windows </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_os == 'linux') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Linux" name="operating_system" value="linux"
                                                    checked>
                                                <label class="label_values my-1" for="Linux"
                                                    style="margin-right: 15px;">Linux
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Linux" name="operating_system" value="linux"
                                                    required>
                                                <label class="label_values my-1" for="Linux"
                                                    style="margin-right: 15px;">Linux
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_os == 'linux') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Ubuntu" name="operating_system" value="ubuntu"
                                                    checked>
                                                <label class="label_values my-1" for="Ubuntu"
                                                    style="margin-right: 15px;">Ubuntu
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="Ubuntu" name="operating_system" value="ubuntu"
                                                    required>
                                                <label class="label_values my-1" for="Ubuntu"
                                                    style="margin-right: 15px;">Ubuntu
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_os == 'ios') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ios" name="operating_system" value="ios"
                                                    checked>
                                                <label class="label_values my-1" for="ios"
                                                    style="margin-right: 15px;">IOS
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="ios" name="operating_system" value="ios"
                                                    required>
                                                <label class="label_values my-1" for="ios"
                                                    style="margin-right: 15px;">IOS
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } if($x_os == 'chrome os') { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="chrome os" name="operating_system"
                                                    value="chrome os" checked>
                                                <label class="label_values my-1" for="chrome os"
                                                    style="margin-right: 15px;">Chrome OS
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-xs btn-dark mx-2 mb-2">
                                            <div class="icheck-success d-inline">
                                                <input type="radio" id="chrome os" name="operating_system"
                                                    value="chrome os" required>
                                                <label class="label_values my-1" for="chrome os"
                                                    style="margin-right: 15px;">Chrome OS
                                                </label>
                                            </div>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Optical   -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Optical</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_optical == 'no') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="optical_1" name="optical" value="yes" required>
                                        <label class="label_values" for="optical_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="optical_2" name="optical" value="no" checked required>
                                        <label class="label_values" for="optical_2">No </label>
                                    </div>
                                    <?php } elseif($x_optical == 'yes') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="optical_1" name="optical" value="yes" checked required>
                                        <label class="label_values" for="optical_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="optical_2" name="optical" value="no" required>
                                        <label class="label_values" for="optical_2">No </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="optical_1" name="optical" value="yes" required>
                                        <label class="label_values" for="optical_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="optical_2" name="optical" value="no" required>
                                        <label class="label_values" for="optical_2">No </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Camera   -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize "
                                    style="font-size:14px">Camera</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_camera == 'no') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="camera_1" name="camera" value="yes" required>
                                        <label class="label_values" for="camera_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="camera_2" name="camera" value="no" checked required>
                                        <label class="label_values" for="camera_2">No </label>
                                    </div>
                                    <?php } elseif($x_camera == 'yes') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="camera_1" name="camera" value="yes" checked required>
                                        <label class="label_values" for="camera_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="camera_2" name="camera" value="no">
                                        <label class="label_values" for="camera_2">No </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="camera_1" name="camera" value="yes" required>
                                        <label class="label_values" for="camera_1" style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="camera_2" name="camera" value="no">
                                        <label class="label_values" for="camera_2">No </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Keyboard Light   -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize " style="font-size:14px">Keyboard
                                    Light</label>
                                <div class="col-sm-10 ">
                                    <?php if($x_keyboard_backlight == 'yes') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="keyboard_light_1" name="keyboard_backlight" value="yes"
                                            required checked>
                                        <label class="label_values" for="keyboard_light_1"
                                            style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="keyboard_light_2" name="keyboard_backlight" value="no">
                                        <label class="label_values" for="keyboard_light_2">No </label>
                                    </div>
                                    <?php } elseif($x_keyboard_backlight == 'no') { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="keyboard_light_1" name="keyboard_backlight" value="yes"
                                            required>
                                        <label class="label_values" for="keyboard_light_1"
                                            style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="keyboard_light_2" name="keyboard_backlight" value="no"
                                            checked>
                                        <label class="label_values" for="keyboard_light_2">No </label>
                                    </div>
                                    <?php } else { ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="keyboard_light_1" name="keyboard_backlight" value="yes"
                                            required>
                                        <label class="label_values" for="keyboard_light_1"
                                            style="margin-right: 15px;">Yes
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="keyboard_light_2" name="keyboard_backlight" value="no">
                                        <label class="label_values" for="keyboard_light_2">No </label>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- MFG Number   -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label text-capitalize " style="font-size:14px">MFG
                                    Number</label>
                                <div class="col-sm-10 ">
                                    <input class="mx-2" type="text" name="mfg_number" required>
                                </div>
                            </div>


                        </fieldset>

                        <button type="submit" name="submit_mfg" id="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate BarCode</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid d-none">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">

                    <input class="btn btn-warning" type="button" onclick="printDiv('printableArea')"
                        value="print a Barcode!" />

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
                            <table>
                                <tr>
                                    <th> <?php 
                                    // QR code print
                                    echo '<img src="temp/'.$mfg.'.png" style="width:400px; height:400px;margin: 0px 0 0 0px;">';?>
                                    </th>
                                    <th>
                                        <p class="text-center text-uppercase text-weight:bold"
                                            style="font-size: 100px; color:black !important">
                                            MFG S/N
                                        </p>
                                        <p class="text-center text-uppercase"
                                            style="font-size: 100px;color:black !important">
                                            <?php 
                                    echo  $mfg;
                                    ?></p>
                                    </th>
                                </tr>
                            </table>
                            <!-- <div class="col-sm">
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
                                <p class="text-center text-uppercase" style="font-size: 120px;color:black !important">
                                    <?php 
                                    // echo  $mfg;
                                    // echo "</br>";
                                    
                                    // echo "</br>";
                                    // echo ".";
                                    ?></p>
                            </div> -->
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
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $brand; ?>
                                    </td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Model :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $model; ?>
                                    </td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Core :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $core; ?>
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
                                        <?php echo $touch_type; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Screen Size :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $screen_size; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Screen Resolution :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $screen_resolution; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Camera :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $camera; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;">OPT:</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $dvd; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> Keyboard Backlight :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $keyboard_backlight; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> OS :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $os; ?></td>
                                </tr>
                                <tr style="border: black; border-style: solid;">
                                    <th style="border: black; border-style: solid;"> MFG Number :</th>
                                    <td class="px-2" style="border: black; border-style: solid;">
                                        <?php echo $mfg; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <!-- <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button> -->
                        <a class="btn btn bg-gradient-navy"
                            href="./new_update_mfg.php?mfg_id=<?php echo $mfg_id; ?>">Update</a>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input class="btn btn-info btn-sm" type="button" onclick="printDiv('printableArea')"
                            value="Print QRCode!" />
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

    window.location.href = './new_create_mfg.php';
}
</script>

<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

select {
    height: 25px !important;
    font-size: 14px;
}

option {
    font-size: 14px;
}

col-form-label {
    font-size: 16px !important;
}

label {
    font-size: 16px !important;
}
</style>