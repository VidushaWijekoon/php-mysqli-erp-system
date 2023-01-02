<?php 

error_reporting (E_ALL ^ E_NOTICE);
// Toggle this to change the setting
define('DEBUG', true);

// You want all errors to be triggered
error_reporting(E_ALL);
 
error_reporting(E_ERROR | E_PARSE);

ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../static/plugins/bootstrap/css/bootstrap-grid.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1)){

$sales_item_id = '';
$inventory_id = '';
$emp_id = '';
$p_id ;
$item_type = '';
$item_brand = '';
$item_model = '';
$item_processor = '';
$item_core = '';
$item_generation = "";
$item_delivery_date = '';
$item_ram = '';
$item_display = '';
$item_screen = '';
$item_graphic = '';
$item_condition = '';
$lcd_broken = null;

//////////////////////////////////////////////////
// created by anuradha gunasinghe 23-oct-2022 
// radio button data retrieve variables
//////////////////////////////////////////////////

$current_date = date("l");   

$lunch_combine = 1;
$lcd = 1;
$body_work = 1;
$launch_prod = 1;
$mother_board = 1;
$tech_id;
$bios = null;
$power = null;
$ports = null;
$keyboard = null;
$keys =null;
$speakers = null;
$camera = null;
$bazel = null;
$mousepad = null;
$mouse_pad_button = null;
$camera_cable = null;
$back_cover = null;
$lcd_cable = null;
$wifi_card = null ;
$battery = null;
$battery_cable = null;
$dvd_rom = null;
$dvd_caddy = null;
$hdd_caddy = null;
$hdd_cable_connector = null;
$c_panel_palm_rest = null;
$hings_cover = null;
$lan_cover = null;
$mb_base = null;

$whitespot = null;
$scratch = null;
$broken = null;
$line_lcd = null;
$yellow_shadow = null;
$a_scratch = null;
$a_broken= null;
$a_dent = null;
$b_scratch = null;
$b_broken = null;
$b_logo = null;
$b_color = null;
$c_scratch = null;
$c_broken = null;
$c_dent = null;
$d_scratch = null;
$d_broken = null;
$d_dent = null;

$a_scratch_retrive = 2;
$a_broken_retrive= 2;
$a_dent_retrive = 2;
$b_scratch_retrive = 2;
$b_broken_retrive = 2;
$b_logo_retrive = 2;
$b_color_retrive = 2;
$c_scratch_retrive = 2;
$c_broken_retrive = 2;
$c_dent_retrive = 2;
$d_scratch_retrive = 2;
$d_broken_retrive = 2;
$d_dent_retrive = 2;
$fan = null;
$heat_sink = null ;

$keyboard1 = null;
$keys1 = null;
$speakers1 = null;
$camera1 = null;
$bazel1 = null;
$mousepad1 = null;
$mouse_pad_button1 = null;
$camera_cable1 = null;
$back_cover1 = null;
$lcd_cable1 = null;
$wifi_card1 = null ;
$battery1 = null;
$battery_cable1 = null;
$dvd_rom1 = null;
$dvd_caddy1 = null;
$hdd_caddy1 = null;
$hdd_cable_connector1 = null;
$c_panel_palm_rest1 = null;
$hings_cover1 = null;
$lan_cover1 = null;
$mb_base1 = null;
$fan1 = null;
$heat_sink1 = null ;
$cpu1 = null;

$prod_motherboard_issue = null;
$prod_lcd_issue = null;
$prod_combine_issue = null;
$prod_body_work_issue = null;


if (isset($_GET['sales_order_id'])) {
    
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $query_tech = "SELECT tech_id,p_id FROM prod_info WHERE inventory_id=$inventory_id AND sales_order = $sales_order_id AND emp_id = $emp_id ";
    $query_run_tech = mysqli_query($connection, $query_tech);
    foreach($query_run_tech AS $data){
        $tech_id = $data['tech_id'];
        $p_id =$data['p_id'];
    }
    
    $query_m = "SELECT * FROM motherboard_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_m = mysqli_query($connection, $query_m);
    foreach($query_run_m as $data){
        $bios = $data['bios_check'];
        $power = $data['power'];
        $ports=$data['ports'];
        $status = $data['status'];
        if($status == 0){
            $mother_board = 0;
        }
    }

    $query_mc = "SELECT * FROM combine_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_c = mysqli_query($connection, $query_mc);
    foreach($query_run_c as $data){
        $com_id = $data['inventory_id'];
        $comb_status = $data['status'];
        $keyboard = $data['keyboard'];
        $speakers = $data['speakers'];
        $camera = $data['camera'];
        $bazel = $data['bazel'];
        $keys= $data['keyboard_keys'];
        $mousepad= $data['mousepad'];
        $mouse_pad_button= $data['mouse_pad_button'];
        $camera_cable= $data['camera_cable'];
        $back_cover= $data['back_cover'];
        $wifi_card= $data['wifi_card'];
        $lcd_cable= $data['lcd_cable'];
        $battery= $data['battery'];
        $battery_cable= $data['battery_cable'];
        $dvd_rom= $data['dvd_rom'];
        $dvd_caddy= $data['dvd_caddy'];
        $hdd_caddy= $data['hdd_caddy'];
        $hdd_cable_connector= $data['hdd_cable_connector'];
        $c_panel_palm_rest= $data['c_panel_palm_rest'];
        $mb_base= $data['mb_base'];
        $hings_cover= $data['hings_cover'];
        $lan_cover= $data['lan_cover'];
        $heat_sink= $data['heat_sink'];
        $fan= $data['fan'];

        if($keyboard ==1){ $keyboard1 =1; } 
        if($speakers ==1){$speakers1 =1;} 
        if($camera ==1){$camera1 =1;} 
        if($bazel ==1){$bazel1 =1;} 
        if($keys ==1){$keys1 =1;} 
        if($mousepad==1){$mousepad1 =1;}  
        if($mouse_pad_button==1){$mouse_pad_button1 =1;}  
        if($camera_cable==1){$camera_cable1 =1;}  
        if($back_cover==1){$back_cover1 =1;} 
        if($wifi_card==1){$wifi_card1 =1;}  
        if($lcd_cable==1){$lcd_cable1 =1;} 
        if($battery==1){$battery1 =1;}  
        if($battery_cable==1){$battery_cable1 =1;} 
        if($dvd_rom==1){$dvd_rom1 =1;} 
        if($dvd_caddy==1){$dvd_caddy1 =1;}  
        if($hdd_caddy==1){$hdd_caddy1 =1;} 
        if($hdd_cable_connector==1){$hdd_cable_connector1 =1;} 
        if($c_panel_palm_rest==1){$c_panel_palm_rest1 =1;} 
        if($mb_base==1){$mb_base1 =1;} 
        if($hings_cover==1){$hings_cover1 =1;} 
        if($lan_cover==1){$lan_cover1 =1;} 
        if($heat_sink==1){$heat_sink1 =1;} 
        if($fan==1){$fan1 =1;} 
       
        if($comb_status == 0){
            $lunch_combine = 0;
        }
    }

    $query_lcd = "SELECT * FROM lcd_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_lcd = mysqli_query($connection, $query_lcd);
    foreach($query_run_lcd as $data){
        $whitespot = $data['whitespot'];
        $scratch = $data['scratch'];
        $lcd_broken = $data['broken'];
        $line_lcd = $data['line_lcd'];
        $yellow_shadow = $data['yellow_shadow'];
        $status = $data['status'];
        if($status == 0){
            $lcd = 0;
        }
    }

    $query_body = "SELECT * FROM bodywork WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id ORDER BY id DESC LIMIT 1";
    $query_run_body = mysqli_query($connection, $query_body);
    if(empty($query_run_body)){}else{
        foreach($query_run_body as $data){
            $a_scratch_retrive = $data['a_scratch'];
            $a_broken_retrive=$data['a_broken'];
            $a_dent_retrive = $data['a_dent'];
            $b_scratch_retrive = $data['b_scratch'];
            $b_broken_retrive = $data['b_broken'];
            $b_logo_retrive = $data['b_logo'];
            $b_color_retrive = $data['b_color'];
            $c_scratch_retrive = $data['c_scratch'];
            $c_broken_retrive = $data['c_broken'];
            $c_dent_retrive = $data['c_dent'];
            $d_scratch_retrive = $data['d_scratch'];
            $d_broken_retrive = $data['d_broken'];
            $d_dent_retrive = $data['d_dent'];
            $status = $data['status'];
            if($status == 0){
                $body_work = 0;
            }

        }
    }
    
    $query = "SELECT * FROM warehouse_information_sheet 
            INNER JOIN sales_order_add_items ON warehouse_information_sheet.sales_order_id = sales_order_add_items.sales_order_id
                        WHERE  warehouse_information_sheet.inventory_id = $inventory_id";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            $result = mysqli_fetch_assoc($result_set);
            $item_type = $result['device'];
            $item_brand = $result['brand'];
            $item_model = $result['model'];
            $item_processor = $result['processor'];
            $item_core = $result['core'];
            $item_generation = $result['generation'];
            $item_hdd = $result['item_hdd'];
            $item_ram = $result['item_ram'];
            $item_display = $result['item_display'];
            $item_screen = $result['item_screen'];
            $item_graphic = $result['item_graphic'];
            $item_condition = $result['item_condition'];
            $item_graphic = $result['item_graphic'];
            $item_os = $result['item_os'];

        } else {
             header('Location: sales_orders.php?err=user_not_found');
        }
    }
}
  
?>

<!-- ============================================================== -->
<!-- Sales Order Laptop Requirment  -->
<!-- ============================================================== -->


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card-header bg-secondary">
                <h3 class="card-title p-2">Inventory ID <?php echo $_GET['inventory_id']; ?></h3>
            </div>
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="item_type"
                                    <?php echo 'value="' . $item_brand . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Model</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_model . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Processor</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_processor . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Core</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_core . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Generation</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_generation . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">RAM</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_ram . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">HDD</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_hdd . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Operating System</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    <?php echo 'value="' . $item_os . '"'; ?>
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Check Form Buttons  -->
<!-- ============================================================== -->


<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="card-group  mb-3">
                        <div class="card">
                            <div class="card-body">
                                <?php if($mother_board == 1){ ?>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize"> Step 01
                                        :
                                        Motherboard</label>
                                    <div class="col-sm-8">

                                        <button type="button" class="btn bg-gradient-danger w-100" data-toggle="modal"
                                            data-target="#modal-motherboard">
                                            Launch Motherboard Form
                                        </button>

                                    </div>
                                </div>
                                <?php }else{?>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize"> Step 01
                                        : Motherboard</label>
                                    <div class="col-sm-8">

                                        <button type="button" class="btn bg-gradient-dark mx-2 mb-2 w-100"
                                            data-toggle="modal" data-target="#modal-motherboard" disabled>
                                            Launch Motherboard Form
                                        </button>

                                    </div>
                                </div>
                                <?php } ?>
                                <?php if($mother_board == 0 && $lunch_combine ==1){ ?>

                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 02 : Combine</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-info w-100" data-toggle="modal"
                                            data-target="#modal-combine">
                                            Launch Combine Form
                                        </button>
                                    </div>
                                </div>
                                <?php } if($mother_board == 0 && $lunch_combine == 0){ ?>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 02
                                        : Combine</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-info w-100" data-toggle="modal"
                                            data-target="#modal-combine" disabled>
                                            Launch Combine Form
                                        </button>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <?php if($lcd == 1 && $lunch_combine == 0){ ?>

                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 03
                                        : LCD</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-danger w-100" data-toggle="modal"
                                            data-target="#modal-lcd">
                                            Launch LCD Form
                                        </button>
                                    </div>
                                </div>
                                <?php } if($lcd == 0 && $lunch_combine == 0){ ?>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 03
                                        : LCD</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-danger w-100" data-toggle="modal"
                                            data-target="#modal-lcd" disabled>
                                            Launch LCD Form
                                        </button>
                                    </div>
                                </div>
                                <?php } if($body_work == 1 && $lcd == 0){ ?>

                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 04
                                        : Bodywork</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-warning w-100" data-toggle="modal"
                                            data-target="#modal-bodywork">
                                            Launch Bodywork Form
                                        </button>
                                    </div>
                                </div>
                                <?php } if($body_work == 0 && $lcd == 0){?>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label text-capitalize">Step 04
                                        : Bodywork</label>
                                    <div class="col-sm-8">
                                        <button type="button" class="btn bg-gradient-warning w-100" data-toggle="modal"
                                            data-target="#modal-bodywork" disabled>
                                            Launch Bodywork Form
                                        </button>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <?php if($lcd == 0){ ?>

                        <div class="row mt-2">
                            <label class="col-sm-4 col-form-label text-capitalize">Step 05
                                : Production</label>
                            <div class="col-sm-8">
                                <button type="button" class="btn bg-gradient-primary w-100" data-toggle="modal"
                                    data-target="#modal-production">
                                    Launch Production Form
                                </button>
                            </div>
                        </div>
                        <?php } ?>

                    </div>

                </div>
                <!-- /.card-body -->
                <?php if($mother_board == 0 && $lunch_combine == 0 && $lcd == 0 && $body_work == 0 ){ ?>
                <div class="modal-footer justify-content-between">
                    <a href='./production_member_daily_task.php?sales_order_id=<?php echo $sales_order_id?>&tech_id=<?php echo $tech_id?>'
                        type="button" class="btn bg-gradient-success btn-sm">Task Completed </a>
                </div>
                <?php } ?>
                <?php if( $lunch_combine ==1 ){ ?>
                <!-- <div class="modal-footer justify-content-between">
                    <a href='./production_member_daily_task.php?sales_order_id=<?php echo $sales_order_id?>&tech_id=<?php echo $tech_id?>'
                        type="button" class="btn bg-gradient-success btn-sm">Next Task </a>
                </div> -->
                <?php } ?>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Motherboard  -->
<!-- ============================================================== -->
<?php 

    if(isset($_POST['motherboard_submit'])){
        
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $bios_check = mysqli_real_escape_string($connection, $_POST['bios_check']);
        $computrace_lock = mysqli_real_escape_string($connection, $_POST['computrace_lock']);
        $other_errors = mysqli_real_escape_string($connection, $_POST['other_errors']);
        $tpm_lock = mysqli_real_escape_string($connection, $_POST['tpm_lock']);
        $region_lock = mysqli_real_escape_string($connection, $_POST['region_lock']);
        $status = 0;
        
        if($bios_check == 1 || $power == 1 || $ports == 1 || $computrace_lock == 1 || $other_errors == 1 || $tpm_lock == 1 || $region_lock == 1){
            $status = 1;
        }
        
        if($mother_board == 1){
        $query = "INSERT INTO motherboard_check (sales_order_id, emp_id, inventory_id, bios_check, power, ports, region_lock, computrace_lock, 	tpm_lock, other_errors, status) 
                    VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$bios_check', '$power', '$ports', '$region_lock', '$computrace_lock', '$tpm_lock', '$other_errors', '$status')";
        $query_run = mysqli_query($connection, $query);
        
        if($status == 1){
        $query_prod_info ="UPDATE prod_info SET end_date_time = now(),status = '1', m_board_issue = '1' WHERE p_id ='$p_id' ";
        $query_prod_run = mysqli_query($connection, $query_prod_info);

        echo "
        <script>
            var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = '<div id=\"motherboard_issue\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                document.body.appendChild (newHTML);
                $(window).load(function(){
                    $('#motherboard_issue').modal('show'); });
                
        </script>";
        }else{
            echo "
            <script>
                var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = '<div id=\"modal-combine\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                document.body.appendChild (newHTML);
                $(window).load(function(){
                    $('#modal-combine').modal('show'); });
            </script>";
            }
        }
    }
?>
<div class="modal fade" id="motherboard_issue" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Motherboard Issue</h4>
            </div>
            <div class="modal-body">
                <p>Please Send to Motherboard Department&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<div class=" modal fade" id="modal-motherboard" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">01 Motherboard Form</h4>
                <?php echo $item_brand; ?>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Bios Check</label>
                            <div class="col-sm-8 mt-2">
                                <?php  if($bios == null){  ?>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r1" name="bios_check" value="0" required>
                                    <label class="label_values" for="r1" style="margin-right: 15px;">Okay</label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r2" name="bios_check" value="1">
                                    <label class="label_values" for="r2">Lock </label>
                                </div>
                                <?php }elseif($bios == 0){?>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r1" name="bios_check" value="1" checked="checked">
                                    <label class="label_values" for="r1" style="margin-right: 15px;">Lock </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r2" name="bios_check" value="0">
                                    <label class="label_values" for="r2">Okay </label>
                                </div>
                                <?php }elseif($bios == 1){ ?>
                                <?php }elseif($bios == 0){?>
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r1" name="bios_check" value="1">
                                    <label class="label_values" for="r1" style="margin-right: 15px;">Lock </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r2" name="bios_check" value="0" checked="checked">
                                    <label class="label_values" for="r2">Okay </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Power</label>
                            <?php  if($power == null){  ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r3" name="power" value="0" required>
                                    <label class="label_values" for="r3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r4" name="power" value="1">
                                    <label class="label_values" for="r4">No </label>
                                </div>
                            </div>
                            <?php }elseif($power == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r3" name="power" value="0" checked="checked">
                                    <label class="label_values" for="r3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r4" name="power" value="1">
                                    <label class="label_values" for="r4">No </label>
                                </div>
                            </div>
                            <?php } elseif($power == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r3" name="power" value="0">
                                    <label class="label_values" for="r3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r4" name="power" value="1" checked="checked">
                                    <label class="label_values" for="r4">No </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Port</label>
                            <?php if($ports == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r5" name="ports" value="0" required>
                                    <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r6" name="ports" value="1">
                                    <label class="label_values" for="r6">No </label>
                                </div>
                            </div>
                            <?php } elseif($ports == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r5" name="ports" value="0" checked="checked">
                                    <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r6" name="ports" value="1">
                                    <label class="label_values" for="r6">No </label>
                                </div>
                            </div>
                            <?php } elseif($ports == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r5" name="ports" value="0">
                                    <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r6" name="ports" value="1" checked="checked">
                                    <label class="label_values" for="r6">No </label>
                                </div>
                            </div>
                            <?php } if ($item_brand == 'lenovo') { ?>
                            <label class="col-sm-4 col-form-label text-capitalize">Computrace
                                Lock</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="lcl" name="computrace_lock" value="0">
                                    <label class="label_values" for="lcl" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="lcl1" name="computrace_lock" value="1">
                                    <label class="label_values" for="lcl1">No </label>
                                </div>
                            </div>
                            <label class="col-sm-4 col-form-label text-capitalize">Any Others
                                Error</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="o1" name="other_errors" value="0">
                                    <label class="label_values" for="o1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="o2" name="other_errors" value="1">
                                    <label class="label_values" for="o2">No </label>
                                </div>
                            </div>
                            <?php } if($item_brand == 'dell'){?>
                            <label class="col-sm-4 col-form-label text-capitalize">Computrace
                                Lock</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="dlc" name="computrace_lock" value="0">
                                    <label class="label_values" for="dlc" style="margin-right: 15px;">Active </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="dlc1" name="computrace_lock" value="1">
                                    <label class="label_values" for="dlc1">Disable </label>
                                </div>
                            </div>
                            <label class="col-sm-4 col-form-label text-capitalize">TPM Lock</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="dtpm" name="tpm_lock" value="0">
                                    <label class="label_values" for="dtpm" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="dtpm1" name="tpm_lock" value="1">
                                    <label class="label_values" for="dtpm1">No </label>
                                </div>
                            </div>
                            <?php } if($item_brand == 'hp') { ?>
                            <label class="col-sm-4 col-form-label text-capitalize">Computrace / Absolute
                                Software
                                Lock</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="hpc/a" name="computrace_lock" value="0">
                                    <label class="label_values" for="hpc/a" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="hpc/a1" name="computrace_lock" value="1">
                                    <label class="label_values" for="hpc/a1">No </label>
                                </div>
                            </div>
                            <label class="col-sm-4 col-form-label text-capitalize">Me Region
                                Lock</label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="merl1" name="region_lock" value="0">
                                    <label class="label_values" for="merl1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="merl2" name="region_lock" value="1">
                                    <label class="label_values" for="merl2">No </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" name="motherboard_submit"
                        class="btn btn-default btn-next bg-gradient-success">Next</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Combine check Form  -->
<!-- ============================================================== -->

<?php 

    if(isset($_POST['combine_check_form'])){
        $scan_id =0;
            if( empty($_POST['scan_id'])){
                $scan_id =0;
            }else{
                $scan_id= mysqli_real_escape_string($connection,  $_POST['scan_id']);
            }
            
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
        $speakers = mysqli_real_escape_string($connection, $_POST['speakers']);
        $camera = mysqli_real_escape_string($connection, $_POST['camera']);
        $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
        $mousepad= mysqli_real_escape_string($connection,  $_POST['mousepad']);
        $mouse_pad_button= mysqli_real_escape_string($connection,  $_POST['mouse_pad_button']);
        $camera_cable= mysqli_real_escape_string($connection,  $_POST['camera_cable']);
        $back_cover= mysqli_real_escape_string($connection,  $_POST['back_cover']);
        $wifi_card= mysqli_real_escape_string($connection,  $_POST['wifi_card']);
        $lcd_cable= mysqli_real_escape_string($connection,  $_POST['lcd_cable']);
        $battery_cable= mysqli_real_escape_string($connection,  $_POST['battery_cable']);
        $dvd_rom= mysqli_real_escape_string($connection,  $_POST['dvd_rom']);
        $dvd_caddy= mysqli_real_escape_string($connection,  $_POST['dvd_caddy']);
        $hdd_caddy= mysqli_real_escape_string($connection,  $_POST['hdd_caddy']);
        $hdd_cable_connector= mysqli_real_escape_string($connection,  $_POST['hdd_cable_connector']);
        $c_panel_palm_rest= mysqli_real_escape_string($connection,  $_POST['c_panel_palm_rest']);
        $mb_base= mysqli_real_escape_string($connection,  $_POST['mb_base']);
        $hings_cover= mysqli_real_escape_string($connection,  $_POST['hings_cover']);
        $lan_cover= mysqli_real_escape_string($connection,  $_POST['lan_cover']);
        $fan= mysqli_real_escape_string($connection,  $_POST['fan']);
        $heat_sink= mysqli_real_escape_string($connection,  $_POST['heat_sink']);
        $keys = mysqli_real_escape_string($connection,  $_POST['keyboard_keys']);   
        $laptop_battery = mysqli_real_escape_string($connection,  $_POST['laptop_battery']);   
        $battery_production_number = mysqli_real_escape_string($connection,  $_POST['battery_production_number']);   

        $query = "SELECT location FROM users WHERE epf = '$emp_id'";

        $query_run = mysqli_query($connection, $query);
        $location10;
        $second_attempt = false;
        foreach($query_run as $a){
            $location10 = $a['location'];
        }   
        $status = 0;
        if($keyboard1 == 1 || $keys1 == 1 || $speakers1 == 1 || $camera1 == 1 || $bazel1 == 1 || $mousepad1 == 1 || $mouse_pad_button1 == 1 || $camera_cable1 == 1 || $back_cover1 == 1 || $wifi_card1 == 1 ||
            $lcd_cable1 == 1 || $battery1 == 1 || $battery_cable1 == 1 || $dvd_rom1 == 1 || $dvd_caddy1 == 1 ||
            $hdd_caddy1 == 1 || $hdd_cable_connector1 == 1 || $c_panel_palm_rest1 == 1 || $mb_base1 == 1 || $hings_cover1 == 1 || $lan_cover1 == 1 || $heat_sink1 == 1 || $fan1 == 1 || $battery_production_number == 1 || $laptop_battery == 1){
            $second_attempt = true;
        }
        if($keyboard == 1 || $keys == 1 || $speakers == 1 || $camera == 1 || $bazel == 1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover == 1 || $wifi_card == 1 ||
            $lcd_cable == 1 || $battery_cable == 1 || $dvd_rom ==1 || $dvd_caddy ==1 ||
            $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 || $mb_base ==1 || $hings_cover ==1 || $lan_cover ==1 || $heat_sink ==1 || $fan ==1 || $battery_production_number == 1 || $laptop_battery == 1){
            $status = 1;
          
            $query_6 = "INSERT INTO requested_part_from_production(brand, model, generation, sales_order_id, inventory_id, created_date, `delivery_date`,emp_id, location,status, keyboard, speakers, camera, bazel, lan_cover, mousepad, mouse_pad_button, camera_cable, back_cover, wifi_card, lcd_cable, 
                    battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover, switch, switch_id)
            VALUES('$item_brand', '$item_model', '$item_generation', '$sales_order_id', '$inventory_id', '$date','0000-00-00' ,'$emp_id', '$location10', '$status', '$keyboard', '$speakers',
                '$camera', '$bazel', '$lan_cover', '$mousepad', '$mouse_pad_button', '$camera_cable', '$back_cover', '$wifi_card', '$lcd_cable', '$battery', '$battery_cable',
                '$dvd_rom', '$dvd_caddy', '$hdd_caddy', '$hdd_cable_connector', '$c_panel_palm_rest', '$mb_base', '$hings_cover', 0, 0)";
            $query_new = mysqli_query($connection, $query_6);           
            
        }
        if($lunch_combine == 1){
            
        $query_com = "INSERT INTO combine_check(inventory_id, emp_id, sales_order_id, keyboard, speakers, camera, bazel, status, keyboard_keys, mousepad, mouse_pad_button, 
                                camera_cable, back_cover, wifi_card, lcd_cable, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, 
                                hings_cover, lan_cover, combined_id,heat_sink,fan, battery_production_number, battery)
                    VALUES ('$inventory_id', '$emp_id', '$sales_order_id', '$keyboard', '$speakers', '$camera', '$bazel', '$status', '$keys','$mousepad','$mouse_pad_button',
                    '$camera_cable','$back_cover','$wifi_card','$lcd_cable', '$battery_cable','$dvd_rom','$dvd_caddy','$hdd_caddy','$hdd_cable_connector',
                    '$c_panel_palm_rest','$mb_base','$hings_cover','$lan_cover', 0,'$heat_sink','$fan', '$battery_production_number', '$laptop_battery')";
        $query_run = mysqli_query($connection, $query_com);
        if($second_attempt == false){
        echo "
        <script>
            var newHTML = document.createElement ('div');
            newHTML.innerHTML =
            newHTML = document.createElement ('div');
            newHTML.innerHTML = ' <div id=\"modal-lcd\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
            document.body.appendChild (newHTML);
            $(window).load(function(){
                $('#modal-lcd').modal('show');
            });
        </script>";
        }
   
        if($scan_id !=0){
    
            $com_inventory_id = $scan_id;
            $query_check="SELECT `id`, `inventory_id` FROM `combine_check` WHERE inventory_id ='$com_inventory_id'";
        
            $query_run = mysqli_query($connection, $query_check);
                $test=0;
            foreach($query_run as $k){
                $test = $k['inventory_id'];
            }   
    
            //if not exist then insert new record with switch machine missing parts 
            if($test == 0){ 
            
            $query_in ="INSERT INTO combine_check(inventory_id, emp_id, sales_order_id, keyboard, speakers, camera, bazel, status, keyboard_keys, mousepad, mouse_pad_button, camera_cable, back_cover, wifi_card,
                                                lcd_cable, battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover, lan_cover, combined_id, heat_sink, fan, cpu) 
                    VALUES('$scan_id', '$emp_id', '$sales_order_id', '$keyboard1', '$speakers1', '$camera1', '$bazel1', '$status1', '$keys1', '$mousepad1', '$mouse_pad_button1', '$camera_cable1', '$back_cover1',
                        '$wifi_card1', '$lcd_cable1', '$battery1', '$battery_cable1', '$dvd_rom1', '$dvd_caddy1', '$hdd_caddy1', '$hdd_cable_connector1', '$c_panel_palm_rest1', '$mb_base1', '$hings_cover1', '$lan_cover1',
                        '$inventory_id1', '$heat_sink1', '$fan1')";
            $query_run = mysqli_query($connection, $query_in);
            }else{
                //if machine is exist update missing parts
                $query_update ="UPDATE combine_check SET keyboard = '$keyboard1', speakers = '$speakers1', camera = '$camera1', bazel = '$bazel1', status = '$status1', damage_keys = '$damage_keys1', mousepad = '$mousepad1',
                mouse_pad_button = '$mouse_pad_button1', camera_cable = '$camera_cable1', back_cover = '$back_cover1', wifi_card = '$wifi_card1', lcd_cable = '$lcd_cable1', battery = '$battery1', battery_cable = '$battery_cable1',
                dvd_rom = '$dvd_rom1', dvd_caddy = '$dvd_caddy1', hdd_caddy = '$hdd_caddy1', hdd_cable_connector = '$hdd_cable_connector1', c_panel_palm_rest = '$c_panel_palm_rest1', mb_base = '$mb_base1',
                hings_cover = '$hings_cover1', lan_cover = '$lan_cover1', combined_id = '$combined_id1', heat_sink = '$heat_sink1', fan = '$fan1',         
                WHERE
                    inventory_id = '$inventory_id'";
                    $query_run = mysqli_query($connection, $query_update);
                }
    
            $query_update_part = "UPDATE `requested_part_from_production` SET `status`='0' ,switch = '1',switch_id ='$scan_id' WHERE `inventory_id`='$inventory_id';";

            $query_run = mysqli_query($connection, $query_update_part);
            $query_1 ="SELECT  `status`FROM `requested_part_from_production` WHERE inventory_id = $inventory_id";
            $query_run = mysqli_query($connection, $query_1);

            $query_2 ="SELECT  `status`FROM `combine_check` WHERE inventory_id = $inventory_id";
            $query_run_2 = mysqli_query($connection, $query_2);
            $combine_status;
            foreach($query_run_2 as $c){
                $combine_status = $c['status'];
            }
            $received =null;
            if(empty($query_run)){
                $received ='1';
            }else{
                foreach($query_run as $a){
                    $received = $a['status'];
                }
            }if($combine_status == 0 && $received == 0){
                $second_attempt = true;
                echo $second_attempt;
                exit();
            }

        }

        if($status == 1){
            $query_prod_info ="UPDATE prod_info SET end_date_time = now(), status='1', combine_issue = '1' WHERE p_id ='$p_id' ";
            $query_prod_run = mysqli_query($connection, $query_prod_info);
            }
        }

        if($laptop_battery == 1){
            $battery_issue ="UPDATE prod_info SET end_date_time = now(), battery_issue = '1', combine_issue = '0' WHERE p_id ='$p_id' ";
            $run_battery_issues = mysqli_query($connection, $battery_issue);

           echo "
            <script>
                var newHTML = document.createElement ('div');
                        newHTML.innerHTML =
                        newHTML = document.createElement ('div');
                        newHTML.innerHTML = '<div id=\"battery_issue\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                    document.body.appendChild (newHTML);
                    $(window).load(function(){
                        $('#battery_issue').modal('show'); });
                        
            </script>";
        }
    }
?>

<div class="modal fade" id="combine_issues" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title">Combine Issues</h4>
            </div>
            <div class="modal-body">
                <p>Please Keep it in <?php echo $current_date; ?> Combine Rack &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="battery_issue" aria-labelledby="myModalLabel1" data-backdrop="static" data-keyboard="false"
    aria-hidden="true" style="top: 25%; width: 99%;">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class=" modal-header">
                <h4 class="modal-title">Battery Issue</h4>
            </div>
            <div class="modal-body">
                <p>Please Send to Battery Department&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Combine check Form  -->
<!-- ============================================================== -->
<div class="modal fade" id="modal-combine" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark mx-2 mb-2">
                <h4 class="modal-title">02 Functional Check</h4>
            </div>
            <div class="">
                <div id="">
                    <?php $query = "SELECT  COUNT(`inventory_id`) AS exist_count FROM combine_check WHERE inventory_id ='$inventory_id'";
                    
                    $query_run = mysqli_query($connection, $query);
                    $exist_count;
                    foreach($query_run as $count){
                        $exist_count = $count['exist_count'];
                        }
                        if($exist_count ==0){ }else{
                ?>
                    <div class="row mx-2">
                        <div class="col-md-3">

                            <fieldset class="mt-2">
                                <div class="input-group mb-2 mt-2">
                                    <lable>Switch Parts Form</lable>
                                    <input type="text" name="scan_id" id="scan_id" class="scan_id"
                                        onfocus="clearInput(this)" value="">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <form method="POST" name="form1">
                <div class="modal-body">
                    <fieldset class="d-flex">
                        <div class="col col-md-6 col-lg-6">
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">01 Keyboard:</label>
                                <?php if($keyboard == null || $keyboard == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r7" name="keyboard" value="0" required>
                                        <label class="label_values" for="r7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r8" name="keyboard" value="1">
                                        <label class="label_values" for="r8">No </label>
                                    </div>
                                </div>
                                <?php }elseif($keyboard == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r7" name="keyboard" value="0" checked="checked">
                                        <label class="label_values" for="r7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r8" name="keyboard" value="1" disabled>
                                        <label class="label_values" for="r8">No </label>
                                    </div>
                                </div>
                                <?php } elseif($keyboard == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r7" class="keyboard" name="keyboard" value="keyboard">
                                        <label class="label_values" for="r7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r8" name="keyboard" value="1" checked="checked">
                                        <label class="label_values" for="r8">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">02 Keys:</label>
                                <?php if($keys == null || $keys == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c31" name="keyboard_keys" value="0" required>
                                        <label class="label_values" for="c31" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c32" name="keyboard_keys" value="1">
                                        <label class="label_values" for="c32">No </label>
                                    </div>
                                </div>
                                <?php }elseif($keys == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c31" name="keyboard_keys" value="0" checked="checked">
                                        <label class="label_values" for="c31" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c32" name="keyboard_keys" value="1" disabled>
                                        <label class="label_values" for="c32">No </label>
                                    </div>
                                </div>
                                <?php }elseif($keys == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c31" name="keyboard_keys" class="keys" value="keys">
                                        <label class="label_values" for="c31" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c32" name="keyboard_keys" value="1" checked="checked">
                                        <label class="label_values" for="c32">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Speakers -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">03 Speakers:</label>
                                <?php if($speakers == null || $speakers == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r9" name="speakers" value="0" required>
                                        <label class="label_values" for="r9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r10" name="speakers" value="1">
                                        <label class="label_values" for="r10">No </label>
                                    </div>
                                </div>
                                <?php } elseif($speakers == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r9" name="speakers" value="0" checked="checked">
                                        <label class="label_values" for="r9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r10" name="speakers" value="1" disabled>
                                        <label class="label_values" for="r10">No </label>
                                    </div>
                                </div>
                                <?php } elseif($speakers == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r9" class="speakers" name="speakers" value="speakers">
                                        <label class="label_values" for="r9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r10" name="speakers" value="1" checked="checked">
                                        <label class="label_values" for="r10">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php }?>

                            </div>
                            <!-- Camera -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">04 Camera:</label>
                                <?php if($camera == null || $camera == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r11" name="camera" value="0" required>
                                        <label class="label_values" for="r11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r12" name="camera" value="1">
                                        <label class="label_values" for="r12">No </label>
                                    </div>
                                </div>
                                <?php }elseif($camera == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r11" name="camera" value="0" checked="checked">
                                        <label class="label_values" for="r11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r12" name="camera" value="1" disabled>
                                        <label class="label_values" for="r12">No </label>
                                    </div>
                                </div>
                                <?php }elseif($camera == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r11" name="camera" class="camera" value="camera">
                                        <label class="label_values" for="r11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r12" name="camera" value="1" checked="checked">
                                        <label class="label_values" for="r12">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">05 Bazel
                                    Broken:</label>
                                <?php if($bazel == null || $bazel == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="13" name="bazel" value="0" required>
                                        <label class="label_values" for="13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r14" name="bazel" value="1">
                                        <label class="label_values" for="r14">No </label>
                                    </div>
                                </div><?php }elseif($bazel==0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="13" name="bazel" value="0" checked="checked">
                                        <label class="label_values" for="13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r14" name="bazel" value="1" disabled>
                                        <label class="label_values" for="r14">No </label>
                                    </div>
                                </div><?php }elseif($bazel ==1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="13" name="bazel" class="bazel" value="bazel">
                                        <label class="label_values" for="13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r14" name="bazel" value="1" checked="checked">
                                        <label class="label_values" for="r14">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Mouse Pad -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">06 Mouse Pad:</label>
                                <?php if($mousepad == null || $mousepad == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c1" name="mousepad" value="0" required>
                                        <label class="label_values" for="c1" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c2" name="mousepad" value="1">
                                        <label class="label_values" for="c2">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mousepad == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c1" name="mousepad" value="0" checked="checked">
                                        <label class="label_values" for="c1" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c2" name="mousepad" value="1" disabled>
                                        <label class="label_values" for="c2">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mousepad == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c1" name="mousepad" class="mousepad" value="mousepad">
                                        <label class="label_values" for="c1" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c2" name="mousepad" value="1" checked="checked">
                                        <label class="label_values" for="c2">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- Mouse Pad Button -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">07 Mouse Pad
                                    Button:</label>
                                <?php if($mouse_pad_button == null || $mouse_pad_button == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c3" name="mouse_pad_button" value="0" required>
                                        <label class="label_values" for="c3" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c4" name="mouse_pad_button" value="1">
                                        <label class="label_values" for="c4">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mouse_pad_button == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c3" name="mouse_pad_button" value="0" checked="checked">
                                        <label class="label_values" for="c3" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c4" name="mouse_pad_button" value="1" disabled>
                                        <label class="label_values" for="c4">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mouse_pad_button == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c3" name="mouse_pad_button" class="mouse_pad_button"
                                            value="mouse_pad_button">
                                        <label class="label_values" for="c3" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c4" name="mouse_pad_button" value="1" checked="checked">
                                        <label class="label_values" for="c4">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- Camera Cable -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">08 Camera
                                    Cable:</label>
                                <?php if($camera_cable == null || $camera_cable == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c5" name="camera_cable" value="0" required>
                                        <label class="label_values" for="c5" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c6" name="camera_cable" value="1">
                                        <label class="label_values" for="c6">No </label>
                                    </div>
                                </div>
                                <?php }elseif($camera_cable == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c5" name="camera_cable" value="0" checked="checked">
                                        <label class="label_values" for="c5" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c6" name="camera_cable" value="1" disabled>
                                        <label class="label_values" for="c6">No </label>
                                    </div>
                                </div>
                                <?php }elseif($camera_cable == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c5" name="camera_cable" class="camera_cable"
                                            value="camera_cable">
                                        <label class="label_values" for="c5" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c6" name="camera_cable" value="1" checked="checked">
                                        <label class="label_values" for="c6">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- Back Cover -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">09 Back
                                    Cover:</label>
                                <?php if($back_cover == null || $back_cover == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c7" name="back_cover" value="0" required>
                                        <label class="label_values" for="c7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c8" name="back_cover" value="1">
                                        <label class="label_values" for="c8">No </label>
                                    </div>
                                </div>
                                <?php }elseif($back_cover == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c7" name="back_cover" value="0" checked="checked">
                                        <label class="label_values" for="c7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c8" name="back_cover" value="1" disabled>
                                        <label class="label_values" for="c8">No </label>
                                    </div>
                                </div>
                                <?php }elseif($back_cover == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c7" name="back_cover" class="back_cover"
                                            value="back_cover">
                                        <label class="label_values" for="c7" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c8" name="back_cover" value="1" checked="checked">
                                        <label class="label_values" for="c8">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- WI-FI Card -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">10 WIFI Card:
                                </label>
                                <?php if($wifi_card == null || $wifi_card == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c9" name="wifi_card" value="0" required>
                                        <label class="label_values" for="c9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c10" name="wifi_card" value="1">
                                        <label class="label_values" for="c10">No </label>
                                    </div>
                                </div>
                                <?php }elseif($wifi_card == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c9" name="wifi_card" value="0" checked="checked">
                                        <label class="label_values" for="c9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c10" name="wifi_card" value="1" disabled>
                                        <label class="label_values" for="c10">No </label>
                                    </div>
                                </div>
                                <?php }elseif($wifi_card == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c9" name="wifi_card" class="wifi_card"
                                            value="wifi_card">
                                        <label class="label_values" for="c9" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c10" name="wifi_card" value="1" checked="checked">
                                        <label class="label_values" for="c10">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">11 LCD Cable:</label>
                                <?php if($lcd_cable == null || $lcd_cable == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c11" name="lcd_cable" value="0" required>
                                        <label class="label_values" for="c11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c12" name="lcd_cable" value="1">
                                        <label class="label_values" for="c12">No </label>
                                    </div>
                                </div>
                                <?php }elseif($lcd_cable == 0 ){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c11" name="lcd_cable" value="0" checked="checked">
                                        <label class="label_values" for="c11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c12" name="lcd_cable" value="1" disabled>
                                        <label class="label_values" for="c12">No </label>
                                    </div>
                                </div>
                                <?php }elseif($lcd_cable == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c11" name="lcd_cable" class="lcd_cable"
                                            value="lcd_cable">
                                        <label class="label_values" for="c11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c12" name="lcd_cable" value="1" checked="checked">
                                        <label class="label_values" for="c12">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>
                            </div>

                            <!-- DVD Rom -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">12 DVD ROM: </label>
                                <?php if($dvd_rom == null || $dvd_rom == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c17" name="dvd_rom" value="0" required>
                                        <label class="label_values" class="label_values" for="c17"
                                            style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c18" name="dvd_rom" value="1">
                                        <label class="label_values" for="c18">No </label>
                                    </div>
                                </div>
                                <?php }elseif($dvd_rom == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c17" name="dvd_rom" value="0" checked="checked">
                                        <label class="label_values" for="c17" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c18" name="dvd_rom" value="1" disabled>
                                        <label class="label_values" for="c18">No </label>
                                    </div>
                                </div>
                                <?php }elseif($dvd_rom == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c17" name="dvd_rom" class="dvd_rom" value="dvd_rom">
                                        <label class="label_values" for="c17" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c18" name="dvd_rom" value="1" checked="checked">
                                        <label class="label_values" for="c18">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- DVD Caddy -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">13 DVD Caddy:</label>
                                <?php if($dvd_caddy == null || $dvd_caddy == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c19" name="dvd_caddy" value="0" required>
                                        <label class="label_values" for="c19" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c20" name="dvd_caddy" value="1">
                                        <label class="label_values" for="c20">No </label>
                                    </div>
                                </div>
                                <?php }elseif($dvd_caddy == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c19" name="dvd_caddy" value="0" checked="checked">
                                        <label class="label_values" for="c19" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c20" name="dvd_caddy" value="1" disabled>
                                        <label class="label_values" for="c20">No </label>
                                    </div>
                                </div>
                                <?php }elseif($dvd_caddy == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c19" name="dvd_caddy" class="dvd_caddy"
                                            value="dvd_caddy">
                                        <label class="label_values" for="c19" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c20" name="dvd_caddy" value="1" checked="checked">
                                        <label class="label_values" for="c20">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>

                        </div>

                        <div class="col col-md-6 col-lg-6">

                            <!-- HDD Caddy -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">14 HDD Caddy:</label>
                                <?php if($hdd_caddy == null || $hdd_caddy == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c21" name="hdd_caddy" value="0" required>
                                        <label class="label_values" for="c21" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c22" name="hdd_caddy" value="1">
                                        <label class="label_values" for="c22">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hdd_caddy == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c21" name="hdd_caddy" value="0" checked="checked">
                                        <label class="label_values" for="c21" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c22" name="hdd_caddy" value="1" disabled>
                                        <label class="label_values" for="c22">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hdd_caddy == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c21" name="hdd_caddy" class="hdd_caddy"
                                            value="hdd_caddy">
                                        <label class="label_values" for="c21" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c22" name="hdd_caddy" value="1" checked="checked">
                                        <label class="label_values" for="c22">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- HDD Cable -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">15 HDD Cable
                                    Connector:</label>
                                <?php if($hdd_cable_connector == null || $hdd_cable_connector == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c23" name="hdd_cable_connector" value="0" required>
                                        <label class="label_values" for="c23" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c24" name="hdd_cable_connector" value="1">
                                        <label class="label_values" for="c24">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hdd_cable_connector == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c23" name="hdd_cable_connector" value="0"
                                            checked="checked">
                                        <label class="label_values" for="c23" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c24" name="hdd_cable_connector" value="1" disabled>
                                        <label class="label_values" for="c24">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hdd_cable_connector == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c23" name="hdd_cable_connector"
                                            class="hdd_cable_connector" value="hdd_cable_connector">
                                        <label class="label_values" for="c23" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c24" name="hdd_cable_connector" value="1"
                                            checked="checked">
                                        <label class="label_values" for="c24">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- C Panel / Palm Rest -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">16 C Panel / Palm
                                    Rest:</label>
                                <?php if($c_panel_palm_rest == null || $c_panel_palm_rest == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c25" name="c_panel_palm_rest" value="0" required>
                                        <label class="label_values" for="c25" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c26" name="c_panel_palm_rest" value="1">
                                        <label class="label_values" for="c26">No </label>
                                    </div>
                                </div>
                                <?php }elseif($c_panel_palm_rest == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c25" name="c_panel_palm_rest" value="0"
                                            checked="checked">
                                        <label class="label_values" for="c25" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c26" name="c_panel_palm_rest" value="1" disabled>
                                        <label class="label_values" for="c26">No </label>
                                    </div>
                                </div>
                                <?php }elseif($c_panel_palm_rest == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c25" name="c_panel_palm_rest" class="c_panel_palm_rest"
                                            value="c_panel_palm_rest">
                                        <label class="label_values" for="c25" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c26" name="c_panel_palm_rest" value="1"
                                            checked="checked">
                                        <label class="label_values" for="c26">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- D / MB Base -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">17 D / MB
                                    Base:</label>
                                <?php if($mb_base == null || $mb_base == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c33" name="mb_base" value="0" required>
                                        <label class="label_values" for="c33" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c34" name="mb_base" value="1">
                                        <label class="label_values" for="c34">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mb_base == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c33" name="mb_base" value="0" checked="checked">
                                        <label class="label_values" for="c33" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c34" name="mb_base" value="1" disabled>
                                        <label class="label_values" for="c34">No </label>
                                    </div>
                                </div>
                                <?php }elseif($mb_base == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c33" name="mb_base" class="mb_base" value="mb_base">
                                        <label class="label_values" for="c33" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c34" name="mb_base" value="1" checked="checked">
                                        <label class="label_values" for="c34">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- Hings Cover -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">18 Hings
                                    Cover:</label>
                                <?php if($hings_cover == null || $hings_cover == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c27" name="hings_cover" value="0" required>
                                        <label class="label_values" for="c27" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c28" name="hings_cover" value="1">
                                        <label class="label_values" for="c28">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hings_cover == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c27" name="hings_cover" value="0" checked="checked">
                                        <label class="label_values" for="c27" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c28" name="hings_cover" value="1" disabled>
                                        <label class="label_values" for="c28">No </label>
                                    </div>
                                </div>
                                <?php }elseif($hings_cover == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c27" name="hings_cover" class="hings_cover"
                                            value="hings_cover">
                                        <label class="label_values" for="c27" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c28" name="hings_cover" value="1" checked="checked">
                                        <label class="label_values" for="c28">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- LAN Cover -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">19 LAN Cover:</label>
                                <?php if($lan_cover == null || $lan_cover == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c29" name="lan_cover" value="0" required>
                                        <label class="label_values" for="c29" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c30" name="lan_cover" value="1">
                                        <label class="label_values" for="c30">No </label>
                                    </div>
                                </div>
                                <?php }elseif($lan_cover == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c29" name="lan_cover" value="0" checked="checked">
                                        <label class="label_values" for="c29" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c30" name="lan_cover" value="1" disabled>
                                        <label class="label_values" for="c30">No </label>
                                    </div>
                                </div>
                                <?php }elseif($lan_cover == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c29" name="lan_cover" class="lan_cover"
                                            value="lan_cover">
                                        <label class="label_values" for="c29" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c30" name="lan_cover" value="1" checked="checked">
                                        <label class="label_values" for="c30">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <!-- Fan -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">20 Fan:</label>
                                <?php if($fan == null || $fan == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine42" name="fan" value="0" required>
                                        <label class="label_values" for="combine42" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine43" name="fan" value="1">
                                        <label class="label_values" for="combine43">No </label>
                                    </div>
                                </div>
                                <?php }elseif($fan == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine42" name="fan" value="0" checked="checked">
                                        <label class="label_values" for="combine42" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine43" name="fan" value="1" disabled>
                                        <label class="label_values" for="combine43">No </label>
                                    </div>
                                </div>
                                <?php }elseif($fan == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine42" name="fan" value="0">
                                        <label class="label_values" for="combine42" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine43" name="fan" value="1" checked="checked">
                                        <label class="label_values" for="combine43">No </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Heat Sink -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">22 Heat Sink:</label>
                                <?php if($heat_sink == null || $heat_sink == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine44" name="heat_sink" value="0" required>
                                        <label class="label_values" for="combine44" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine45" name="heat_sink" value="1">
                                        <label class="label_values" for="combine45">No </label>
                                    </div>
                                </div>
                                <?php }elseif($heat_sink == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine44" name="heat_sink" value="0" checked="checked">
                                        <label class="label_values" for="combine44" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine45" name="heat_sink" value="1" disabled>
                                        <label class="label_values" for="combine45">No </label>
                                    </div>
                                </div>
                                <?php }elseif($heat_sink == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine44" name="heat_sink" value="0">
                                        <label class="label_values" for="combine44" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine45" name="heat_sink" value="1" checked="checked">
                                        <label class="label_values" for="combine45">No </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <!-- Battery Cable -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">23 Battery
                                    Cable:</label>
                                <?php if($battery_cable == null || $battery_cable == 2){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c15" name="battery_cable" value="0" required>
                                        <label class="label_values" for="c15" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c16" name="battery_cable" value="1">
                                        <label class="label_values" for="c16">No </label>
                                    </div>
                                </div>
                                <?php }elseif($battery_cable == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c15" name="battery_cable" value="0" checked="checked">
                                        <label class="label_values" for="c15" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c16" name="battery_cable" value="1" disabled>
                                        <label class="label_values" for="c16">No </label>
                                    </div>
                                </div>
                                <?php }elseif($battery_cable == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c15" name="battery_cable" class="battery_cable"
                                            value="battery_cable">
                                        <label class="label_values" for="c15" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c16" name="battery_cable" value="1" checked="checked">
                                        <label class="label_values" for="c16">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>

                            <!-- Battery -->
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">24 Battery:</label>
                                <div class="col-sm-8 mt-2 d-flex">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="b1" name="laptop_battery" value="0"
                                            onclick="exellentBattery()" required>
                                        <label class="label_values" for="b1" style="margin-right: 15px;">Exellent
                                        </label>
                                    </div>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="b2" name="laptop_battery" value="0"
                                            onclick="goodBatteryLife()" required>
                                        <label class="label_values" for="b2" style="margin-right: 15px;">Good
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="b3" name="laptop_battery" value="1"
                                            onclick="scanBatteryQR()">
                                        <label class="label_values" for="b3" style="margin-right: 15px;">Bad
                                        </label>
                                    </div>

                                </div>
                                <input type='text' id="text" name="battery_production_number"
                                    placeholder="Please Scan or Create Barcode Number" style="display:none">

                            </div>

                            <!-- All SELECT BUTTON -->
                            <div class="col mt-5">
                                <div class="icheck-success d-inline">
                                    <input class="mx-2" id="select_all" type="radio" name="group4" value="1"
                                        onclick="selectAll(form1)">
                                    <label class="" for="select_all" style="margin-right: 15px;">All Okay
                                    </label>
                                </div>
                            </div>
                            <!-- All SELECT BUTTON -->
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" value="submit" name="combine_check_form"
                        class="btn btn-default bg-gradient-success btn-next">Next</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 

    if(isset($_POST['lcd_form'])){
        
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $whitespot = mysqli_real_escape_string($connection, $_POST['whitespot']);
        $scratch = mysqli_real_escape_string($connection, $_POST['scratch']);
        $broken = mysqli_real_escape_string($connection, $_POST['broken']);
        $line_lcd = mysqli_real_escape_string($connection, $_POST['line_lcd']);   
        $yellow_shadow = mysqli_real_escape_string($connection, $_POST['yellow_shadow']);  
        $status = 0;
        if($whitespot == 1 || $scratch == 1 || $broken == 1 || $line_lcd ==1 || $yellow_shadow ==1){
            $status = 1;
        } 
        
        $query = "INSERT INTO lcd_check (sales_order_id, emp_id, inventory_id, whitespot, scratch, broken, line_lcd, yellow_shadow,status) 
                    VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$whitespot', '$scratch', '$broken', '$line_lcd', '$yellow_shadow','$status' )";
        $query_run = mysqli_query($connection, $query);

        if($status == 1){
        $query_prod_info ="UPDATE prod_info SET end_date_time = now(), status='1', lcd_issue='1' WHERE p_id ='$p_id' ";
        $query_prod_run = mysqli_query($connection, $query_prod_info);
          echo "
            <script>
                var newHTML = document.createElement ('div');
                        newHTML.innerHTML =
                        newHTML = document.createElement ('div');
                        newHTML.innerHTML = '<div id=\"modal-bodywork\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                    document.body.appendChild (newHTML);
                    $(window).load(function(){
                        $('#modal-bodywork').modal('show'); });
                        
            </script>";
        }else{
            echo "<script>
                    var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = ' <div id=\"modal-bodywork\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                    document.body.appendChild (newHTML);
                    $(window).load(function(){
                        $('#modal-bodywork').modal('show');
                    });
                </script>";
            }
    }

?>

<div class="modal fade" id="lcd_issue" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">LCD Issue</h4>
            </div>
            <div class="modal-body">
                <p>Please Send to LCD Department&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- LCD check Form  -->
<!-- ============================================================== -->
<div class="modal fade" id="modal-lcd" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark mx-2 mb-2">
                <h4 class="modal-title">03 LCD Form</h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset class="m-1">

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Whitespot</label>
                            <?php if($whitespot == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r15" name="whitespot" value="0" required>
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r16" name="whitespot" value="1">
                                    <label class="label_values" for="r16">No </label>
                                </div>
                            </div>
                            <?php } elseif($whitespot == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r15" name="whitespot" value="0" checked="checked">
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r16" name="whitespot" value="1">
                                    <label class="label_values" for="r16">No </label>
                                </div>
                            </div>
                            <?php } elseif ($whitespot == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r15" name="whitespot" value="0">
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r16" name="whitespot" value="1" checked="checked">
                                    <label class="label_values" for="r16">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Scratch </label>
                            <?php if($scratch == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r17" name="scratch" value="0" required>
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="18" name="scratch" value="1">
                                    <label class="label_values" for="18">No </label>
                                </div>
                            </div>
                            <?php } elseif($scratch == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r17" name="scratch" value="0" checked="checked">
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="18" name="scratch" value="1">
                                    <label class="label_values" for="18">No </label>
                                </div>
                            </div>
                            <?php } elseif ($scratch == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r17" name="scratch" value="0">
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="18" name="scratch" value="1" checked="checked">
                                    <label class="label_values" for="18">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Broken </label>
                            <?php if($broken == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r19" name="broken" value="0" required>
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="1">
                                    <label class="label_values" for="r20">No </label>
                                </div>
                            </div>
                            <?php } elseif($broken == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r19" name="broken" value="0" checked="checked">
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="1">
                                    <label class="label_values" for="r20">No </label>
                                </div>
                            </div>
                            <?php } elseif ($broken == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r19" name="broken" value="0">
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="1" checked="checked">
                                    <label class="label_values" for="r20">No </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">line </label>
                            <?php if($line_lcd == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r21" name="line_lcd" value="0" required>
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r22" name="line_lcd" value="1">
                                    <label class="label_values" for="r22">No </label>
                                </div>
                            </div>
                            <?php } elseif($line_lcd == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r21" name="line_lcd" value="0" checked="checked">
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r22" name="line_lcd" value="1">
                                    <label class="label_values" for="r22">No </label>
                                </div>
                            </div>
                            <?php } elseif ($line_lcd == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r21" name="line_lcd" value="0">
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r22" name="line_lcd" value="1" checked="checked">
                                    <label class="label_values" for="r22">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Yellow Shadow </label>
                            <?php if($yellow_shadow == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="yellow_shadow" id="r23" value="0" required>
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" name="yellow_shadow" id="r24" value="1">
                                    <label class="label_values" for="r24">No </label>
                                </div>
                            </div>
                            <?php } elseif($yellow_shadow == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="yellow_shadow" id="r23" value="0" checked="checked">
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" name="yellow_shadow" id="r24" value="1">
                                    <label class="label_values" for="r24">No </label>
                                </div>
                            </div>
                            <?php } elseif ($yellow_shadow == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="yellow_shadow" id="r23" value="0">
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" name="yellow_shadow" id="r24" value="1" checked="checked">
                                    <label class="label_values" for="r24">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>


                    </fieldset>
                </div>


                <div class="modal-footer justify-content-end">
                    <button type="submit" name="lcd_form" class="btn btn-default btn-next bg-gradient-success">Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Bodywork check Form  -->
<!-- ============================================================== -->

<div class="modal fade" id="modal-bodywork" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark mx-2 mb-2">
                <h4 class="modal-title">04 Bodywork Form</h4>

            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset>
                        <?php if($a_scratch_retrive != 0 || $a_broken_retrive != 0 || $a_dent_retrive != 0){ ?>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">A/Top Cover</label>
                            <div class="col-sm-8 mt-2">
                                <?php if($a_scratch_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="scratch_a_top" name="work[]" value="a_scratch">
                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                </div>
                                <?php } elseif($a_scratch_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="scratch_a_top" name="work[]" value="a_scratch">
                                    <label class="label_values" for="scratch_a_top">Scratch </label>
                                </div>
                                <?php } ?>

                                <?php if($a_broken_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a-top_broken" name="work[]" value="a_broken">
                                    <label class="label_values" for="a-top_broken">Broken </label>
                                </div>
                                <?php } elseif($a_broken_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a-top_broken" name="work[]" value="a_broken">
                                    <label class="label_values" for="a-top_broken">Broken </label>
                                </div>
                                <?php } ?>

                                <?php if($a_dent_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                    <label class="label_values" for="a_top_dent">Dent </label>
                                </div>
                                <?php  } elseif($a_dent_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                    <label class="label_values" for="a_top_dent">Dent </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($b_scratch_retrive != 0 || $b_broken_retrive != 0 || $b_logo_retrive != 0 || $b_color_retrive != 0){ ?>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">B/Bazel</label>
                            <div class="col-sm-8 mt-2">
                                <?php if($b_scratch_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_scratch" name="work[]" value="b_scratch">
                                    <label class="label_values" for="b_bazel_scratch">Scratch </label>
                                </div>
                                <?php } elseif($b_scratch_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_scratch" name="work[]" value="b_scratch">
                                    <label class="label_values" for="b_bazel_scratch">Scratch </label>
                                </div>

                                <?php } if($b_color_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_colour" name="work[]" value="b_color">
                                    <label class="label_values" for="b_bazel_colour">Colour </label>
                                </div>
                                <?php } elseif($b_color_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_colour" name="work[]" value="b_color">
                                    <label class="label_values" for="b_bazel_colour">Colour </label>
                                </div>

                                <?php } if($b_logo_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_logo" name="work[]" value="b_logo">
                                    <label class="label_values" for="b_bazel_logo">Logo Missing </label>
                                </div>
                                <?php } elseif($b_logo_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="b_bazel_logo" name="work[]" value="b_logo">
                                    <label class="label_values" for="b_bazel_logo">Logo Missing</label>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <?php } ?>
                        <?php if($c_scratch_retrive != 0 || $c_broken_retrive != 0 || $c_dent_retrive != 0 ){ ?>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">C/Palmrest</label>
                            <div class="col-sm-8 mt-2">
                                <?php if($c_scratch_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="c_plamrest_scratch" name="work[]" value="c_scratch">
                                    <label class="label_values" for="c_plamrest_scratch">Scratch </label>
                                </div>
                                <?php } elseif($c_scratch_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="c_plamrest_scratch" name="work[]" value="c_scratch">
                                    <label class="label_values" for="c_plamrest_scratch">Scratch </label>
                                </div>
                                <?php } ?>

                                <?php if($c_broken_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a-c_plamrest_broken" name="work[]" value="c_broken">
                                    <label class="label_values" for="a-c_plamrest_broken">Broken </label>
                                </div>
                                <?php } elseif($c_broken_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="a-c_plamrest_broken" name="work[]" value="c_broken">
                                    <label class="label_values" for="a-c_plamrest_broken">Broken </label>
                                </div>
                                <?php } ?>

                                <?php if($c_dent_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="c_plamrest_dent" name="work[]" value="c_dent">
                                    <label class="label_values" for="c_plamrest_dent">Dent </label>
                                </div>
                                <?php } elseif($c_dent_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="c_plamrest_dent" name="work[]" value="c_dent">
                                    <label class="label_values" for="c_plamrest_dent">Dent </label>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <?php } ?>
                        <?php if($d_scratch_retrive != 0 || $d_broken_retrive != 0 || $d_dent_retrive != 0 ){ ?>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">D/Back Cover</label>
                            <div class="col-sm-8 mt-2">
                                <?php if($d_scratch_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_scratch" name="work[]" value="d_scratch">
                                    <label class="label_values" for="d_back_cover_scratch">Scratch </label>
                                </div>
                                <?php } elseif($d_scratch_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_scratch" name="work[]" value="d_scratch">
                                    <label class="label_values" for="d_back_cover_scratch">Scratch </label>
                                </div>
                                <?php } ?>

                                <?php if($d_broken_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_broken" name="work[]" value="d_broken">
                                    <label class="label_values" for="d_back_cover_broken">Broken </label>
                                </div>
                                <?php }elseif($d_broken_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_broken" name="work[]" value="d_broken">
                                    <label class="label_values" for="d_back_cover_broken">Broken </label>
                                </div>
                                <?php } ?>

                                <?php if($d_dent_retrive == 2){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">Dent </label>
                                </div>
                                <?php }elseif($d_dent_retrive == 1){ ?>
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">Dent </label>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                        <?php } ?>
                    </fieldset>

                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn bg-gradient-success btn-sm" name="bodywork">Next
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 

    if(isset($_POST['bodywork'])){
        if($_POST['work'] != null){
        $checkBox = implode(',', $_POST['work']); 
        $result=explode(",",$checkBox);


        for($i =0; $i< sizeof($result);$i++){
                if($result[$i] == "a_scratch"){
                    $a_scratch ="1";
                }
                if($result[$i] == "a_broken"){
                    $a_broken ="1";
                }
                if($result[$i] == "a_dent"){
                    $a_dent ="1";
                }
                if($result[$i] == "b_scratch"){
                    $b_scratch ="1";
                }
                if($result[$i] == "b_logo"){
                    $b_logo ="1";
                }
                if($result[$i] == "b_color"){
                    $b_color ="1";
                }
                if($result[$i] == "c_scratch"){
                    $c_scratch ="1";
                }
                if($result[$i] == "c_broken"){
                    $c_broken ="1";
                }
                if($result[$i] == "c_dent"){
                    $c_dent ="1";
                }
                if($result[$i] == "d_scratch"){
                    $d_scratch ="1";
                }
                if($result[$i] == "d_broken"){
                    $d_broken ="1";
                }
                if($result[$i] == "d_dent"){
                    $d_dent ="1";
                }
            }
        }

        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $status = 0;
        if($a_scratch == 1 || $a_broken == 1 || $a_dent == 1 || $b_scratch ==1 || $b_logo == 1 || $b_color == 1 || $c_scratch == 1 || $c_broken ==1 || $c_dent ==1 || $d_scratch == 1 || $d_broken == 1 || $d_dent==1){
            $status = 1;
        } 
        if($lcd_broken == 0){
            $query = "INSERT INTO bodywork(inventory_id, emp_id, sales_order_id, a_scratch, a_broken, a_dent, b_scratch, b_logo, b_color, c_scratch, c_broken, c_dent, d_scratch, d_broken, d_dent, status) 
            VALUES ('$inventory_id', '$emp_id', '$sales_order_id','$a_scratch','$a_broken','$a_dent','$b_scratch', '$b_logo','$b_color','$c_scratch','$c_broken','$c_dent','$d_scratch','$d_broken','$d_dent','$status')";
            $query_run = mysqli_query($connection, $query);
            echo "<script>
                    var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = ' <div id=\"modal-production\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                    document.body.appendChild (newHTML);
                    $(window).load(function(){
                        $('#modal-production').modal('show');
                    });
                </script>";
        }
            if($status == 1){
                $query_prod_info ="UPDATE prod_info SET end_date_time = now(), status='1', bodywork_issue = '1' WHERE p_id ='$p_id' ";
                $query_prod_run = mysqli_query($connection, $query_prod_info);
            }
            if($lcd_broken == 1){
                echo "
                <script>
                    var newHTML = document.createElement ('div');
                            newHTML.innerHTML =
                            newHTML = document.createElement ('div');
                            newHTML.innerHTML = '<div id=\"lcd_broken\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                        document.body.appendChild (newHTML);
                        $(window).load(function(){
                            $('#lcd_broken').modal('show'); });
                        
                </script>";
            }
        }

    if(isset($_POST['prduction_specification_form'])){
                            
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $processor = mysqli_real_escape_string($connection, $_POST['processor']);
        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
        $ram_type = mysqli_real_escape_string($connection, $_POST['ram_type']);
        $ram = mysqli_real_escape_string($connection, $_POST['ram']);
        $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
        $ssd_capacity = mysqli_real_escape_string($connection, $_POST['ssd_capacity']);
        $display = mysqli_real_escape_string($connection, $_POST['display']);
        $resolutions = mysqli_real_escape_string($connection, $_POST['resolutions']);
        $graphic = mysqli_real_escape_string($connection, $_POST['graphic']);
        $graphic_type = mysqli_real_escape_string($connection, $_POST['graphic_type']);
        $operating_system = mysqli_real_escape_string($connection, $_POST['operating_system']);
                         
        $query = "INSERT INTO production_check(inventory_id, emp_id, sales_order_id, processor, generation, ram_type,ram, hdd_capacity, ssd_capacity, display, resolutions, graphic, graphic_type, operating_system, status, created_time) 
                    VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$processor', '$generation', '$ram_type','$ram', '$hdd_capacity', '$ssd_capacity', '$display', '$resolutions', '$graphic', '$graphic_type', '$operating_system', 0, CURRENT_TIMESTAMP)";
        $query_run = mysqli_query($connection, $query);

        $query = "SELECT * FROM prod_info WHERE inventory_id = '$inventory_id' ";
        $query_run = mysqli_query($connection, $query); 
        
        foreach($query_run as $data){
            $prod_motherboard_issue = $data['m_board_issue'];
            $prod_lcd_issue = $data['lcd_issue'];
            $prod_combine_issue = $data['combine_issue'];
            $prod_body_work_issue = $data['bodywork_issue'];
        }
        if($lcd ==1 || $combine == 1 || $body_work ==1){
            $all_ok =1;
        }

        $query_prod_info ="UPDATE prod_info SET end_date_time = now(), status = '{$all_ok}', production_spec = '0' WHERE p_id = '$p_id' ";
        $query_prod_run = mysqli_query($connection, $query_prod_info);

        echo "
        <script>
            var newHTML = document.createElement ('div');
                    newHTML.innerHTML =
                    newHTML = document.createElement ('div');
                    newHTML.innerHTML = '<div id=\"all_prodtion_issues\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"><div class=\"modal-dialog modal-xl\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                document.body.appendChild (newHTML);
                $(window).load(function(){
                    $('#all_prodtion_issues').modal('show'); });
        </script>";
                                
    }

?>

<div class="modal fade" id="lcd_broken" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false"
    aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">LCD Broken</h4>
            </div>
            <div class="modal-body">
                <p>Please Send to LCD Department&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="all_prodtion_issues" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true" style="top: 25%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Production Issues</h4>
            </div>
            <div class="modal-body">
                <?php if($prod_combine_issue == 1) { ?>
                <p style="background-color: #dee2e6; padding: 3px; color: #000;">Please Keep it in
                    <?php echo $current_date; ?> Combine Rack&hellip;
                </p>
                <?php } elseif($prod_lcd_issue == 1) { ?>
                <p style="background-color: #dc3545; padding: 3px;">Please Send to LCD Department&hellip;</p>
                <?php } elseif($prod_body_work_issue == 1) { ?>
                <p style="background-color: #ffc107; padding: 3px; color: #000">Please Send to Bodywork
                    Department&hellip;</p>
                <?php } ?>
                <p></p>
            </div>
            <div class="modal-footer justify-content-between">
                <a type="button" class="btn btn-outline-light float-end"
                    href="<?php echo "production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}"; ?>">Confirm</a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Production check Form  -->
<!-- ============================================================== -->
<div class="modal fade" id="modal-production" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-dark mx-2 mb-2">
                <h4 class="modal-title">05 Production Checking Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset style="display: block;">
                        <div class="modal-body">
                            <div class="modal-body">


                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">Processor</label>
                                    <div class="col-sm-10 ">

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="celeron" name="processor" value="celeron"
                                                        required>
                                                    <label class="label_values my-1" for="celeron">Celeron
                                                    </label>
                                                </div>
                                            </label>
                                        </div>


                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="pentium" name="processor" value="pentium"
                                                        required>
                                                    <label class="label_values my-1" for="pentium">Pentium
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">

                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="i3" name="processor" value="i3" required>
                                                    <label class="label_values my-1" for="i3">i3
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="i5" name="processor" value="i5" required>
                                                    <label class="label_values my-1" for="i5">i5
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="i7" name="processor" value="i7" required>
                                                    <label class="label_values my-1" for="i7">i7
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="i9" name="processor" value="i9" required>
                                                    <label class="label_values my-1" for="i9">i9
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="xeon" name="processor" value="xeon"
                                                        required>
                                                    <label class="label_values my-1" for="xeon">Xeon
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">

                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ryzen3" name="processor" value="ryzen3"
                                                        required>
                                                    <label class="label_values my-1" for="ryzen3">Ryzen3
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ryzen5" name="processor" value="ryzen5"
                                                        required>
                                                    <label class="label_values my-1" for="ryzen5">Ryzen5
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ryzen7" name="processor" value="ryzen7"
                                                        required>
                                                    <label class="label_values my-1" for="ryzen7">Ryzen7
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ryzen9" name="processor" value="ryzen9"
                                                        required>
                                                    <label class="label_values my-1" for="ryzen9">Ryzen9
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="a4" name="processor" value="a4" required>
                                                    <label class="label_values my-1" for="a4">A4
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="a6" name="processor" value="a6" required>
                                                    <label class="label_values my-1" for="a6">A6
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="a8" name="processor" value="a8" required>
                                                    <label class="label_values my-1" for="a8">A8
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="a10" name="processor" value="a10" required>
                                                    <label class="label_values my-1" for="a10">A10
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="a12" name="processor" value="a12" required>
                                                    <label class="label_values my-1" for="a12">A12
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="athlon" name="processor" value="athlon"
                                                        required>
                                                    <label class="label_values my-1" for="athlon">Athlon
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">Generation</label>
                                    <div class="col-sm-10">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="1st" name="generation" value="1st" required>
                                                    <label class="label_values my-1" for="1st">1st
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="2nd" name="generation" value="2nd" required>
                                                    <label class="label_values my-1" for="2nd">2nd
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="3rd" name="generation" value="3rd" required>
                                                    <label class="label_values my-1" for="3rd">3rd
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="4th" name="generation" value="4th" required>
                                                    <label class="label_values my-1" for="4th">4th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="5th" name="generation" value="5th" required>
                                                    <label class="label_values my-1" for="5th">5th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="6th" name="generation" value="6th" required>
                                                    <label class="label_values my-1" for="6th">6th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="7th" name="generation" value="7th" required>
                                                    <label class="label_values my-1" for="7th">7th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="8th" name="generation" value="8th" required>
                                                    <label class="label_values my-1" for="8th">8th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="9th" name="generation" value="9th" required>
                                                    <label class="label_values my-1" for="9th">9th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="10th" name="generation" value="10th"
                                                        required>
                                                    <label class="label_values my-1" for="10th">10th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="11th" name="generation" value="11th"
                                                        required>
                                                    <label class="label_values my-1" for="11th">11th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="12th" name="generation" value="12th"
                                                        required>
                                                    <label class="label_values my-1" for="12th">12th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="13th" name="generation" value="13th"
                                                        required>
                                                    <label class="label_values my-1" for="13th">13th
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize " style="font-size:14px">RAM
                                        Type</label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ddr2" name="ram_type" value="ddr2" required>
                                                    <label class="label_values my-1" for="ddr2"
                                                        style="margin-right: 15px;">DDR2
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ddr3" name="ram_type" value="ddr3" required>
                                                    <label class="label_values my-1" for="ddr3"
                                                        style="margin-right: 15px;">DDR3
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ddr3l" name="ram_type" value="ddr3l"
                                                        required>
                                                    <label class="label_values my-1" for="ddr3l"
                                                        style="margin-right: 15px;">DDR3L
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="ddr4" name="ram_type" value="ddr4" required>
                                                    <label class="label_values my-1" for="ddr4"
                                                        style="margin-right: 15px;">DDR4
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">RAM</label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="2gb" name="ram" value="2gb" required>
                                                    <label class="label_values my-1" for="2gb"
                                                        style="margin-right: 15px;">2GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="4gb" name="ram" value="4gb" required>
                                                    <label class="label_values my-1" for="4gb"
                                                        style="margin-right: 15px;">4GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="8gb" name="ram" value="8gb" required>
                                                    <label class="label_values my-1" for="8gb"
                                                        style="margin-right: 15px;">8GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="16gb" name="ram" value="16gb" required>
                                                    <label class="label_values my-1" for="16gb"
                                                        style="margin-right: 15px;">16GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="32gb" name="ram" value="32gb" required>
                                                    <label class="label_values my-1" for="32gb"
                                                        style="margin-right: 15px;">32GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="64gb" name="ram" value="64gb" required>
                                                    <label class="label_values my-1" for="64gb"
                                                        style="margin-right: 15px;">64GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                        HDD
                                    </label>
                                    <div class="col-sm-10 ">

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="128gbhdd" name="hdd_capacity"
                                                        value="128gb_hdd" required>
                                                    <label class="label_values my-1" for="128gbhdd"
                                                        style="margin-right: 15px;">128GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="256gbhdd" name="hdd_capacity"
                                                        value="256gb_hdd" required>
                                                    <label class="label_values my-1" for="256gbhdd"
                                                        style="margin-right: 15px;">256GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="384gbhdd" name="hdd_capacity"
                                                        value="384gb_hdd" required>
                                                    <label class="label_values my-1" for="384gbhdd"
                                                        style="margin-right: 15px;">384GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="512gbhdd" name="hdd_capacity"
                                                        value="512gb_hdd" required>
                                                    <label class="label_values my-1" for="512gbhdd"
                                                        style="margin-right: 15px;">512GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="1tbhdd" name="hdd_capacity" value="1tb_hdd"
                                                        required>
                                                    <label class="label_values my-1" for="1tbhdd"
                                                        style="margin-right: 15px;">1TB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="2tbhdd" name="hdd_capacity" value="2tb_hdd"
                                                        required>
                                                    <label class="label_values my-1" for="2tbhdd"
                                                        style="margin-right: 15px;">2TB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="nohdd" name="hdd_capacity" value="n/a"
                                                        required>
                                                    <label class="label_values my-1" for="nohdd"
                                                        style="margin-right: 15px;">N/A
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                        SSD
                                    </label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="128gbssd" name="ssd_capacity"
                                                        value="128gb_ssd" required>
                                                    <label class="label_values my-1" for="128gbssd"
                                                        style="margin-right: 15px;">128GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="256gbssd" name="ssd_capacity"
                                                        value="256gb_ssd" required>
                                                    <label class="label_values my-1" for="256gbssd"
                                                        style="margin-right: 15px;">256GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="512gbssd" name="ssd_capacity"
                                                        value="512gb_ssd" required>
                                                    <label class="label_values my-1" for="512gbssd"
                                                        style="margin-right: 15px;">512GB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="1tbssd" name="ssd_capacity" value="1tb_ssd"
                                                        required>
                                                    <label class="label_values my-1" for="1tbssd"
                                                        style="margin-right: 15px;">1TB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="2tbssd" name="ssd_capacity" value="2tb_ssd"
                                                        required>
                                                    <label class="label_values my-1" for="2tbssd"
                                                        style="margin-right: 15px;">2TB
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="nossd" name="ssd_capacity" value="n/a"
                                                        required>
                                                    <label class="label_values my-1" for="nossd"
                                                        style="margin-right: 15px;">N/A
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">Display</label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="touch" name="display" value="touch"
                                                        required>
                                                    <label class="label_values my-1" for="touch"
                                                        style="margin-right: 15px;">Touch
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="nontouch" name="display" value="non-touch"
                                                        required>
                                                    <label class="label_values my-1" for="nontouch"
                                                        style="margin-right: 15px;">Non
                                                        Touch
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">Resolutions</label>
                                    <div class="col-sm-10">

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="hd" name="resolutions" value="hd" required>
                                                    <label class="label_values my-1" for="hd"
                                                        style="margin-right: 15px;">HD(1366x768)
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="hd+" name="resolutions" value="hd+"
                                                        required>
                                                    <label class="label_values my-1" for="hd+"
                                                        style="margin-right: 15px;">HD+(1600x900)
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="fhd" name="resolutions" value="fhd"
                                                        required>
                                                    <label class="label_values my-1" for="fhd"
                                                        style="margin-right: 15px;">FHD(1920x1080)
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="qhd" name="resolutions" value="qhd"
                                                        required>
                                                    <label class="label_values my-1" for="qhd"
                                                        style="margin-right: 15px;">QHD(2k)
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="4k" name="resolutions" value="4k" required>
                                                    <label class="label_values my-1" for="4k"
                                                        style="margin-right: 15px;">UHD(4K)
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize "
                                        style="font-size:14px">Graphic</label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="1gb-graphic" name="graphic" value="1GB"
                                                        required>
                                                    <label class="label_values my-1" for="1gb-graphic"
                                                        style="margin-right: 15px;">1GB </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="2gb-graphic" name="graphic" value="2GB"
                                                        required>
                                                    <label class="label_values my-1" for="2gb-graphic"
                                                        style="margin-right: 15px;">2GB </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="4gb-graphic" name="graphic" value="4GB"
                                                        required>
                                                    <label class="label_values my-1" for="4gb-graphic"
                                                        style="margin-right: 15px;">4GB </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="8gb-graphic" name="graphic" value="8GB"
                                                        required>
                                                    <label class="label_values my-1" for="8gb-graphic"
                                                        style="margin-right: 15px;">8GB </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="16gb-graphic" name="graphic" value="16GB"
                                                        required>
                                                    <label class="label_values my-1" for="16gb-graphic"
                                                        style="margin-right: 15px;">16GB </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="no-graphic" name="graphic" value="n/a"
                                                        required>
                                                    <label class="label_values my-1" for="no-graphic"
                                                        style="margin-right: 15px;">N/A
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize"
                                        style="font-size:14px">Graphic
                                        Type</label>
                                    <div class="col-sm-10 ">
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

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="amd" name="graphic_type" value="AMD"
                                                        required>
                                                    <label class="label_values my-1" for="amd"
                                                        style="margin-right: 15px;">AMD
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="n-a" name="graphic_type" value="n/a"
                                                        required>
                                                    <label class="label_values my-1" for="n-a"
                                                        style="margin-right: 15px;">N/A
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-capitalize" style="font-size:14px">
                                        Operation System</label>
                                    <div class="col-sm-10 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="Windows" name="operating_system"
                                                        value="windows" required>
                                                    <label class="label_values my-1" for="Windows"
                                                        style="margin-right: 15px;">Windows </label>
                                                </div>
                                            </label>
                                        </div>

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

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-xs btn-dark mx-2 mb-2">
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="Ubuntu" name="operating_system"
                                                        value="ubuntu" required>
                                                    <label class="label_values my-1" for="Ubuntu"
                                                        style="margin-right: 15px;">Ubuntu
                                                    </label>
                                                </div>
                                            </label>
                                        </div>

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
                                    </div>
                                </div>

                            </div>
                        </div>

                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="prduction_specification_form"
                        class="btn btn-default bg-gradient-success btn-next">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
@import url("../fonts/Poppins-Regular.ttf");

@font-face {
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    src: url("../fonts/Poppins-Black.ttf") format("truetype");
}

fieldset,
legend {
    all: revert;
    font-size: 12px;
}

body {
    font-family: "Poppins", sans-serif;
    font-size: 12px;
}

.user-avatar-md {
    width: 20px;
}

.card-title {
    font-size: 16px;
}

.modal-xl {
    width: 1350px;
}
</style>

<script>
function clearText(a) {
    if (a.defaultValue == a.value) {
        a.value = ""
    } else {
        if (a.value == "") {
            a.value = a.defaultValue
        }
    }
};

$(document).ready(function() {
    $('input[type="radio"]').click(function() {
        var value = $(this).val();
        info = [];
        info[0] = $(this).val();
        info[1] = $('#scan_id').val();
        var jsonString = JSON.stringify(info);
        $.ajax({
            url: "insert.php?com_id=<?php echo $com_id ?>&scan_id=<?php echo $com_id ?>",
            method: "POST",
            data: {
                key: jsonString
            },
            success: function(data) {
                $('#result').html(data);
            },


        });
        document.getElementById("scan_id").value = '';
    });


});

function selectAll(form1) {

    var check = document.getElementsByName("group4"),
        radios = document.form1.elements;

    //If the first radio is checked
    if (check[0].checked) {

        for (i = 0; i < radios.length; i++) {

            //And the elements are radios
            if (radios[i].type == "radio") {

                //And the radio elements's value are 1
                if (radios[i].value == 0) {
                    //Check all radio elements with value = 1
                    radios[i].checked = true;
                }

            } //if

        } //for

        //If the second radio is checked
    }
    return null;
}

window.history.forward();

const noBack = () => {
    window.history.forward();
}

const scanBatteryQR = () => {
    var checkBox = document.getElementById("b3");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}

const exellentBattery = () => {
    var checkBox = document.getElementById("b1");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
        text.style.display = "none";
    } else {
        text.style.display = "block";
    }
}

const goodBatteryLife = () => {
    var checkBox = document.getElementById("b2");
    var text = document.getElementById("text");
    if (checkBox.checked == true) {
        text.style.display = "none";
    } else {
        text.style.display = "block";
    }
}
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>