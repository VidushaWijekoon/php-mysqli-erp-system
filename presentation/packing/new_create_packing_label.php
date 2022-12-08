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
$mfg = null;
$mfg_count= 0;
$cartoon_number = 0;
$cartoon_count = 0;
$sales_order_id = 0;
$username = $_SESSION['username'];
$start_print = 0;
$screen_resolution = null;
$camera = null;
$dvd = null;
$keyboard_backlight = null;
$os = null;

$query = "SELECT sales_order_id FROM `packing_mfg` WHERE `packing_by`='$user' ORDER By mfg_id DESC limit 1;"; 
$query_run = mysqli_query($connection, $query);
$p_sales_order_id = 0;
foreach($query_run as $a){
    $p_sales_order_id = $a['sales_order_id'];
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
                    <fieldset>
                        <div class="row">
                            <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item text-center" style="width: 100px;">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                                href="#custom-tabs-four-home" role="tab"
                                                aria-controls="custom-tabs-four-home" aria-selected="true"
                                                style="color: #fff;">Single </a>
                                        </li>
                                        <li class="nav-item text-center" style="width: 100px;">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                href="#custom-tabs-four-profile" role="tab"
                                                aria-controls="custom-tabs-four-profile" aria-selected="false"
                                                style="color: #fff;">Bulk</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class=" card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <!-- ============================================================== -->
                                        <!-- Tab 1  -->
                                        <!-- ============================================================== -->
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                            role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <?php 
                                                    if(isset($_POST['submit_mfg'])){

                                                        $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
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
                                                                $query_ecom ="INSERT INTO e_com_inventory(device, brand, core, generation, model, hdd_capacity, hdd_type, mfg, ram_capacity, touch, screen_size, sales_order_id,
                                                                    screen_resolution, camera, dvd, keyboard_backlight, os, packing_by, packing_date)
                                                                VALUES('$device', '$brand', '$core', '$generation', '$model', '$hdd_capacity', '$hdd_type', '$mfg', '$ram_capacity', '$touch_type', '$screen_size', '$sales_order_id',
                                                                    '$screen_resolution', '$camera', '$dvd', '$keyboard_backlight', '$os', '$user', CURRENT_TIMESTAMP )";
                                                                    echo $query_ecom;
                                                                $query_run = mysqli_query($connection, $query_ecom);
                                                            }
                                                                $tempDir = 'temp/';
                                                                $filename = $mfg;
                                                                $codeContents = $mfg;
                                                                QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5,1);
                                                                $start_print = 1;
                                                            }else{
                                                                // echo '<script>alert("QR code already exists")</script>';
                                                        }   
                                                    }

                                            ?>
                                            <form method="POST">

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">S/O Number</label>

                                                    <div class="col-sm-8">
                                                        <input type="number" min="1" class="form-control"
                                                            placeholder="S/O Number" name="sales_order_id">

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">MFG Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" min="1" class="form-control"
                                                            placeholder="MFG Number" name="mfg">
                                                    </div>
                                                </div>

                                                <button type="submit" name="submit_mfg" id="submit"
                                                    class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                                        class="fa-solid fa-qrcode"
                                                        style="margin-right: 5px;"></i>Genarate
                                                    Label</button>

                                            </form>
                                        </div>

                                        <!-- ============================================================== -->
                                        <!-- Tab 2  -->
                                        <!-- ============================================================== -->
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <?php 

                                                if(isset($_POST['submit_bulk_mfg'])){
                                                    
                                                    $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
                                                    $sales_order_id = mysqli_real_escape_string($connection, $_POST['sales_order_id']); 
                                                    $cartoon_number = mysqli_real_escape_string($connection, $_POST['cartoon_number']); 

                                                    $query = "SELECT * FROM packing_mfg WHERE mfg = '$mfg' AND sales_order_id = '0'";
                                                    $query_run = mysqli_query($connection, $query);
                                                    foreach($query_run as $data){
                                                        $mfg_count++;
                                                    }

                                                    if($mfg_count == 1){
                                                        $sales_type = null;
                                                        $query_sales_order = "SELECT item_bulk FROM sales_order_add_items WHERE sales_order_id ='$sales_order_id' AND item_bulk = 'bulk sale'";
                                                        $query_run_sales_order = mysqli_query($connection, $query_sales_order);
                                                        foreach($query_run_sales_order as $data){
                                                            $sales_type = $data['item_bulk'];
                                                        }

                                                        $xd = "SELECT *,COUNT(cartoon_number) as Total_Cartoons FROM packing_mfg WHERE sales_order_id = $sales_order_id";
                                                        $d = mysqli_query($connection, $xd);
                                                        foreach($d as $d){
                                                            $total_cartoons = $d['Total_Cartoons'];
                                                            echo $total_cartoons;
                                                        }

                                                        if($total_cartoons <= 10){
                                                            $query = "UPDATE packing_mfg SET sales_order_id = '$sales_order_id', cartoon_number = '$cartoon_number', packing_by = '$user', packing_date = CURRENT_TIMESTAMP WHERE mfg = '$mfg' ";
                                                            $query_run = mysqli_query($connection, $query);
                                                        }else{
                                                            echo '<script>alert("Already Ready 10 Items for this Cartoon")</script>';
                                                        }

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
                                                                $camera = $data['camera'];
                                                                $dvd = $data['dvd'];
                                                                $keyboard_backlight = $data['keyboard_backlight'];
                                                                $os = $data['os'];
                                                                
                                                                $start_print = 1;

                                                            }
                                                        if($sales_type == 'bulk sale'){
                                                            $query_ecom ="INSERT INTO e_com_inventory(device, brand, core, generation, model, hdd_capacity, hdd_type, mfg, ram_capacity, touch, screen_size, sales_order_id,
                                                                screen_resolution, camera, dvd, keyboard_backlight, os, packing_by, packing_date)
                                                            VALUES('$device', '$brand', '$core', '$generation', '$model', '$hdd_capacity', '$hdd_type', '$mfg', '$ram_capacity', '$touch_type', '$screen_size', '$sales_order_id',
                                                                '$screen_resolution', '$camera', '$dvd', '$keyboard_backlight', '$os', '$user', CURRENT_TIMESTAMP )";
                                                            $query_run = mysqli_query($connection, $query_ecom);
                                                        }
                                                            
                                                        }else{
                                                            // echo '<script>alert("QR code already exists")</script>';
                                                    } 
                                                } 

                                            ?>
                                            <form method="POST">
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">S/O Number</label>

                                                    <div class="col-sm-8">
                                                        <input type="number" min="1" class="form-control"
                                                            placeholder="S/O Number" name="sales_order_id">

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Cartoon Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" min="1" class="form-control"
                                                            placeholder="Cartoon Number" name="cartoon_number">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">MFG Number</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" min="1" class="form-control"
                                                            placeholder="MFG Number" name="mfg">
                                                    </div>
                                                </div>

                                                <button type="submit" name="submit_bulk_mfg" id="submit"
                                                    class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                                        class="fa-solid fa-qrcode"
                                                        style="margin-right: 5px;"></i>Genarate
                                                    Label</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>