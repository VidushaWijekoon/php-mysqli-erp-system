<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
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

//////////////////////////////////////////////////
// created by anuradha gunasinghe 23-oct-2022 
// radio button data retrieve variables
/////////////////////////////////////////////////

$lcd = 1;
$body_work=1;
$launch_prod=1;
$tech_id;

$mother_board = null;
$bios = null;
$bios_check = null;
$power = null;
$ports = null;

$lunch_combine = null;
$keyboard = null;
$keys =null;
$speakers = null;
$camera = null;
$bazel = null;
$mousepad =null;
$mouse_pad_button =null;
$camera_cable=null;
$back_cover =null;
$lcd_cable =null;
$wifi_card = null ;
$battery =null;
$battery_cable =null;
$dvd_rom =null;
$dvd_caddy =null;
$hdd_caddy =null;
$hdd_cable_connector =null;
$c_panel_palm_rest =null;
$hings_cover =null;
$lan_cover =null;
$mb_base = null;
$fan = null;
$heat_sink = null;
$cpu = null;

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
    
    
    $query_lcd = "SELECT * FROM lcd_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_lcd = mysqli_query($connection, $query_lcd);
    foreach($query_run_lcd as $data){
        $whitespot = $data['whitespot'];
        $scratch = $data['scratch'];
        $broken = $data['broken'];
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
    
    $query = "SELECT * FROM warehouse_information_sheet INNER JOIN sales_order_add_items
                        ON warehouse_information_sheet.sales_order_id = sales_order_add_items.sales_order_id 
                        WHERE  warehouse_information_sheet.inventory_id = {$inventory_id} 
                        AND warehouse_information_sheet.sales_order_id ={$_GET['sales_order_id']}";

    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set)) {
            $result = mysqli_fetch_assoc($result_set);
            $item_type = $result['item_type'];
            $item_brand = $result['item_brand'];
            $item_model = $result['item_model'];
            $item_processor = $result['item_processor'];
            $item_core = $result['item_core'];
            $item_generation = $result['item_generation'];
            $item_hdd = $result['item_hdd'];
            $item_ram = $result['item_ram'];
            $item_display = $result['item_display'];
            $item_screen = $result['item_screen'];
            $item_graphic = $result['item_graphic'];
            $item_condition = $result['item_condition'];
            $item_graphic = $result['item_graphic'];
            $item_os = $result['item_os'];
        }  
    }  
}

 
// ------------------------------------------------------- //
// -------------------Motherboard check------------------- //
// ------------------------------------------------------- //

$query_m = "SELECT * FROM motherboard_check WHERE inventory_id = $inventory_id AND sales_order_id = $sales_order_id";
$query_run_m = mysqli_query($connection, $query_m);
    foreach($query_run_m as $data){
        $bios = $data['bios_check'];
        $power = $data['power'];
        $ports = $data['ports'];
        $status = $data['status'];
        if($status == 0){
            $mother_board = 0;
    }
}

 
// ------------------------------------------------------- //
// ----------------------Combine check-------------------- //
// ------------------------------------------------------- //


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
        $fan= $data['fan'];
        $heat_sink= $data['heat_sink'];
        $cpu= $data['cpu'];

        if($keyboard == 1){ $keyboard1 = 1; } 
        if($speakers == 1){$speakers1 = 1;} 
        if($camera == 1){$camera1 = 1;} 
        if($bazel == 1){$bazel1 = 1;} 
        if($keys == 1){$keys1 = 1;} 
        if($mousepad == 1){$mousepad1 = 1;}  
        if($mouse_pad_button == 1){$mouse_pad_button1 = 1;}  
        if($camera_cable == 1){$camera_cable1 = 1;}  
        if($back_cover == 1){$back_cover1 =1;} 
        if($wifi_card == 1){$wifi_card1 = 1;}  
        if($lcd_cable == 1){$lcd_cable1 = 1;} 
        if($battery == 1){$battery1 = 1;}  
        if($battery_cable == 1){$battery_cable1 = 1;} 
        if($dvd_rom == 1){$dvd_rom1 = 1;} 
        if($dvd_caddy == 1){$dvd_caddy1 = 1;}  
        if($hdd_caddy == 1){$hdd_caddy1 = 1;} 
        if($hdd_cable_connector == 1){$hdd_cable_connector1 = 1;} 
        if($c_panel_palm_rest == 1){$c_panel_palm_rest1 = 1;} 
        if($mb_base == 1){$mb_base1 = 1;} 
        if($hings_cover == 1){$hings_cover1 = 1;} 
        if($lan_cover == 1){$lan_cover1 = 1;} 
        if($fan == 1){$fan1 = 1;} 
        if($heat_sink == 1){$heat_sink1 = 1;} 
        if($cpu == 1){$cpu1 = 1;} 
       
        if($comb_status == 0){
            $lunch_combine = 0;
        }
    }

?>



<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_technician_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<!-- ============================================================== -->
<!-- Sales Order Laptop Requirment  -->
<!-- ============================================================== -->

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto">
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
                <div class="card-header">
                    Featured
                </div>
                <div class="card-group  mb-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mt-2">

                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>01 Motherboard Check:</p>
                                </label>
                                <div class="col-sm-8">
                                    <?php if($mother_board == 0) {?>
                                    <button type="button" class="btn bg-gradient-warning d-none w-75"
                                        data-toggle="modal" data-target="#myModal1" disabled>
                                        Launch Motherboard Form
                                    </button>
                                    <?php }if($mother_board == null){ ?>
                                    <button type="button" class="btn bg-gradient-warning w-75" data-toggle="modal"
                                        data-target="#myModal1">
                                        Launch Motherboard Form
                                    </button>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="row mt-2">

                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>02 Combine Check:</p>
                                </label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-warning w-75" data-toggle="modal"
                                        data-target="#myModal2">
                                        Launch Combine Form
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>05: Production Specifications</p>
                                </label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-navy w-75" data-toggle="modal"
                                        data-target="#myModal5">
                                        Launch Specifications Form
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>03 LCD Check:</p>
                                </label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-warning w-75" data-toggle="modal"
                                        data-target="#myModal3">
                                        Launch LCD Form
                                    </button>
                                </div>
                            </div>


                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>04 Bodywork Check:</p>

                                </label>
                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-warning w-75" data-toggle="modal"
                                        data-target="#myModal4">
                                        Launch Bodywork Form
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Motherbaord Check  -->
<!-- ============================================================== -->


<?php
                
                    if(isset($_POST['submit_motherboard_check'])){
                        
                        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
                        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
                        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
                        $bios = mysqli_real_escape_string($connection, $_POST['bios_check']);
                        $power = mysqli_real_escape_string($connection, $_POST['power']);
                        $ports = mysqli_real_escape_string($connection, $_POST['ports']);
                        $status = 0;
                        if($bios == 1 || $power == 1 || $ports == 1){
                            $status = 1;
                        }
                        $query = "INSERT INTO motherboard_check (sales_order_id, emp_id, inventory_id, bios_check, power, ports, status) 
                                        VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$bios', '$power', '$ports', '$status')";
                                        echo $status;
                        $query_run = mysqli_query($connection, $query);
                    
                        if($status == 1){
                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                            $date = $date1->format('Y-m-d H:i:s');
                            $query_prod_info ="UPDATE prod_info SET end_date_time=' $date', status = '1', issue_type = '1' WHERE p_id = '$p_id' ";
                            $query_prod_run = mysqli_query($connection, $query_prod_info);
                            header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
                        } 
                        if($status == 0){
                            echo "<script>
                         var newHTML = document.createElement ('div');
                         newHTML.innerHTML =
                         newHTML = document.createElement ('div');
                         // newHTML.innerHTML = ' <div id=\"myModal2\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                         document.body.appendChild (newHTML);
                         $(window).load(function(){
                              $('#myModal2').modal('show');
                         });
                     </script>";
                        }
                    }

                ?>
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" id="form">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">01 Motherboard Form</h4>
                </div>
                <div class="modal-body">
                    <fieldset style="display: block;">
                        <div class="modal-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">Bios Check</label>
                                <div class="col-sm-8 mt-2">
                                    <?php  if($bios == null){  ?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r1" name="bios_check" value="0">
                                        <label class="label_values" for="r1" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r2" name="bios_check" value="1">
                                        <label class="label_values" for="r2">No </label>
                                    </div>
                                    <?php }elseif($bios == 0){?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r1" name="bios_check" value="0" checked="checked">
                                        <label class="label_values" for="r1" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r2" name="bios_check" value="1">
                                        <label class="label_values" for="r2">No </label>
                                    </div>
                                    <?php }elseif($bios == 1){ }elseif($bios == 0){?>
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r1" name="bios_check" value="0">
                                        <label class="label_values" for="r1" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r2" name="bios_check" value="1" checked="checked">
                                        <label class="label_values" for="r2">No </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">Power</label>
                                <?php  if($power == null){  ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r3" name="power" value="0">
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
                                <label class="col-sm-4 col-form-label text-capitalize">Ports</label>
                                <?php if($ports == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r5" name="ports" value="0">
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
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">

                    <a type="submit" value="submit" name="submit_motherboard_check"
                        class="btn btn-default btn-next bg-gradient-success">submit</a>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Combine Check  -->
<!-- ============================================================== -->



<?php 
    
        if(isset($_POST['combine_check_form'])){
        
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
        $keys = mysqli_real_escape_string($connection,  $_POST['keyboard_keys']);
        $speakers = mysqli_real_escape_string($connection, $_POST['speakers']);
        $camera = mysqli_real_escape_string($connection, $_POST['camera']);
        $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
        $mousepad= mysqli_real_escape_string($connection,  $_POST['mousepad']);
        $mouse_pad_button= mysqli_real_escape_string($connection,  $_POST['mouse_pad_button']);
        $camera_cable= mysqli_real_escape_string($connection,  $_POST['camera_cable']);
        $back_cover= mysqli_real_escape_string($connection,  $_POST['back_cover']);
        $wifi_card= mysqli_real_escape_string($connection,  $_POST['wifi_card']);
        $lcd_cable= mysqli_real_escape_string($connection,  $_POST['lcd_cable']);
        $battery= mysqli_real_escape_string($connection,  $_POST['battery']);
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
        $cpu= mysqli_real_escape_string($connection, $_POST['cpu']);
        
        $scan_id =0;

        if( empty($_POST['scan_id'])){
            $scan_id =0;
        }else{
            $scan_id= mysqli_real_escape_string($connection,  $_POST['scan_id']);
        }
        
        $query = "SELECT location FROM users WHERE epf = '$emp_id'";
        $query_run = mysqli_query($connection, $query);
        $location10;
        foreach($query_run as $a){
            $location10 = $a['location'];
        }   
        $status = 0;
        if($keyboard == 1 || $keys == 1 || $speakers == 1 || $camera == 1 || $bazel == 1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover == 1 || $wifi_card == 1 ||
            $lcd_cable == 1 || $battery == 1 || $battery_cable == 1 || $dvd_rom == 1 || $dvd_caddy == 1 || $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 || $mb_base == 1 || 
            $hings_cover == 1 || $lan_cover == 1 || $fan == 1 || $heat_sink == 1 || $cpu == 1){
            $status = 1;
            
            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
            $date = $date1->format('Y-m-d');
        
            $query_6 = "INSERT INTO requested_part_from_production(brand, model, generation, sales_order_id, inventory_id, created_date, delivery_date, emp_id, location, status, 
                                                                    keyboard, speakers, camera, bazel, lan_cover, mousepad, mouse_pad_button, camera_cable, back_cover, wifi_card, lcd_cable, 
                                                                    battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover, fan, heat_sink, cpu,
                                                                    switch, switch_id)
                        VALUES('$item_brand', '$item_model', '$item_generation', '$sales_order_id', '$inventory_id', '$date','0000-00-00' ,'$emp_id', '$location10', '$status', '$keyboard', '$speakers',
                            '$camera', '$bazel', '$lan_cover', '$mousepad', '$mouse_pad_button', '$camera_cable', '$back_cover', '$wifi_card', '$lcd_cable', '$battery', '$battery_cable',
                            '$dvd_rom', '$dvd_caddy', '$hdd_caddy', '$hdd_cable_connector', '$c_panel_palm_rest', '$mb_base', '$hings_cover', '$fan', '$heat_sink', '$cpu', 0, 0)";
                        echo $query_6;
            $query_new = mysqli_query($connection, $query_6);
            echo "<script>
            var newHTML = document.createElement ('div');
            newHTML.innerHTML =
            newHTML = document.createElement ('div');
            // newHTML.innerHTML = ' <div id=\"myModal3\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
            document.body.appendChild (newHTML);
            $(window).load(function(){
                 $('#myModal3').modal('show');
            });
        </script>";
        }
        
        if($lunch_combine == null){
            
        $query_com = "INSERT INTO combine_check(inventory_id, emp_id, sales_order_id, keyboard, keyboard_keys, speakers, camera, bazel, mousepad, mouse_pad_button, camera_cable, back_cover, 
                                                wifi_card, lcd_cable, battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover,
                                                lan_cover, fan, heat_sink, cpu, created_time, status, combined_id) 
                    VALUES ('$inventory_id', '$emp_id', '$sales_order_id', '$keyboard', '$keys', '$speakers', '$camera', '$bazel', '$mousepad','$mouse_pad_button',
                    '$camera_cable', '$back_cover', '$wifi_card', '$lcd_cable', '$battery', '$battery_cable', '$dvd_rom', '$dvd_caddy', '$hdd_caddy', '$hdd_cable_connector',
                    '$c_panel_palm_rest', '$mb_base', '$hings_cover', '$lan_cover', '$fan', '$heat_sink', '$cpu', CURRENT_TIMESTAMP, '$status', 0)";
                    echo $query_com;
        $query_run = mysqli_query($connection, $query_com);
        
    
        if($scan_id !=0){

        $com_inventory_id = $scan_id;
        $query_check="SELECT `id`, `inventory_id` FROM `combine_check` WHERE inventory_id ='$com_inventory_id'";
    
        $query_run = mysqli_query($connection, $query_check);
            $test=0;
        foreach($query_run as $k){
            $test = $k['inventory_id'];
        }
            if( $test == 0){ 
                $query_in ="INSERT INTO combine_check(inventory_id, emp_id, sales_order_id, keyboard, keyboard_keys, speakers, camera, bazel_broken, mousepad, mouse_pad_button, camera_cable, back_cover, 
                                                wifi_card, lcd_cable, battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover,
                                                lan_cover, fan, heat_sink, cpu, created_time, status, combined_id)
                            VALUES('$scan_id', '$emp_id', '$sales_order_id', '$keyboard1', '$speakers1', '$camera1', '$bazel1', '$status1', '$keys1', '$mousepad1', '$mouse_pad_button1', '$camera_cable1', '$back_cover1',
                    '$wifi_card1', '$lcd_cable1', '$battery1', '$battery_cable1', '$dvd_rom1', '$dvd_caddy1', '$hdd_caddy1', '$hdd_cable_connector1', '$c_panel_palm_rest1', '$mb_base1', '$hings_cover1', '$lan_cover1',
                    '$inventory_id1' )";
                $query_run = mysqli_query($connection, $query_in);
            }else{
                $query_update ="UPDATE combine_check
            SET
                `keyboard` = '$keyboard1', `speakers` = '$speakers1', `camera` = '$camera1', `bazel` = '$bazel1', `status` = '$status1', `damage_keys` = '$damage_keys1', `mousepad` = '$mousepad1', `mouse_pad_button` = '$mouse_pad_button1',
                `camera_cable` = '$camera_cable1', `back_cover` = '$back_cover1', `wifi_card` = '$wifi_card1', `lcd_cable` = '$lcd_cable1', `battery` = '$battery1', `battery_cable` = '$battery_cable1', `dvd_rom` = '$dvd_rom1',
                `dvd_caddy` = '$dvd_caddy1', `hdd_caddy` = '$hdd_caddy1', `hdd_cable_connector` = '$hdd_cable_connector1', `c_panel_palm_rest` = '$c_panel_palm_rest1', `mb_base` = '$mb_base1', `hings_cover` = '$hings_cover1',
                `lan_cover` = '$lan_cover1', `combined_id` = '$combined_id1'   
            WHERE inventory_id = '$inventory_id'";
                $query_run = mysqli_query($connection, $query_update);
            }
    
        $query_update_part = "UPDATE requested_part_from_production SET `status`='0',  switch = '1', switch_id = '$scan_id' WHERE inventory_id = '$inventory_id';";

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
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
    }

        if($status == 1){
            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
            $date = $date1->format('Y-m-d H:i:s');
            $query_prod_info ="UPDATE prod_info SET end_date_time = '$date', status = '1', issue_type = '2' WHERE p_id = '$p_id' ";
            $query_prod_run = mysqli_query($connection, $query_prod_info);
            }
        }
           
    }

    
    ?>
<div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">02 Combine Check</h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset class="d-flex">
                        <div class="col col-md-6 col-lg-6">
                            <div class="row">

                                <label class="col-sm-4 col-form-label text-capitalize">01 Keyboard:</label>
                                <?php if($keyboard == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r7" name="keyboard" value="0">
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
                                <?php if($keys == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c31" name="keyboard_keys" value="0">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">03 Speakers:</label>
                                <?php if($speakers == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r9" name="speakers" value="0">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">04 Camera:</label>
                                <?php if($camera == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r11" name="camera" value="0">
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
                                <label class="col-sm-4 col-form-label text-capitalize">05 Bazel:</label>
                                <?php if($bazel == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="13" name="bazel" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">06 Mouse Pad:</label>
                                <?php if($mousepad == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c1" name="mousepad" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">07 Mouse Pad Button:</label>
                                <?php if($mouse_pad_button == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c3" name="mouse_pad_button" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">08 Camera Cable:</label>
                                <?php if($camera_cable == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c5" name="camera_cable" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">09 Back Cover:</label>
                                <?php if($back_cover == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c7" name="back_cover" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">10 WIFI Card: </label>
                                <?php if($wifi_card == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c9" name="wifi_card" value="0">
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
                                <?php if($lcd_cable == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c11" name="lcd_cable" value="0">
                                        <label class="label_values" for="c11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c12" name="lcd_cable" value="1">
                                        <label class="label_values" for="c12">No </label>
                                    </div>
                                </div>
                                <?php }elseif($lcd_cable == 0){ ?>
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">12 Battery:</label>
                                <?php if($battery == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c13" name="battery" value="0">
                                        <label class="label_values" for="c13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c14" name="battery" value="1">
                                        <label class="label_values" for="c14">No </label>
                                    </div>
                                </div>
                                <?php }elseif($battery == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c13" name="battery" value="0" checked="checked">
                                        <label class="label_values" for="c13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c14" name="battery" value="1" disabled>
                                        <label class="label_values" for="c14">No </label>
                                    </div>
                                </div>
                                <?php }elseif($battery == 1){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c13" name="battery" class="battery" value="battery">
                                        <label class="label_values" for="c13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="c14" name="battery" value="1" checked="checked">
                                        <label class="label_values" for="c14">No </label>
                                    </div>
                                    <div id="result"></div>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">13 Battery Cable:</label>
                                <?php if($battery_cable == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c15" name="battery_cable" value="0">
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
                        </div>

                        <div class="col col-md-6 col-lg-6">

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">14 DVD ROM: </label>
                                <?php if($dvd_rom == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c17" name="dvd_rom" value="0">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">15 DVD Caddy:</label>
                                <?php if($dvd_caddy == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c19" name="dvd_caddy" value="0">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">16 HDD Caddy:</label>
                                <?php if($hdd_caddy == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c21" name="hdd_caddy" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">17 HDD Cable
                                    Connector:</label>
                                <?php if($hdd_cable_connector == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c23" name="hdd_cable_connector" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">18 C Panel / Palm
                                    Rest:</label>
                                <?php if($c_panel_palm_rest == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c25" name="c_panel_palm_rest" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">19 D / MB Base:</label>
                                <?php if($mb_base == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c33" name="mb_base" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">20 Hings Cover:</label>
                                <?php if($hings_cover == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c27" name="hings_cover" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">21 LAN Cover:</label>
                                <?php if($lan_cover == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="c29" name="lan_cover" value="0">
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
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">22 Fan:</label>
                                <?php if($fan == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine42" name="fan" value="0">
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
                                        <input type="radio" id="combine43" name="fan" value="1">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">23 Heat Sink:</label>
                                <?php if($heat_sink == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine44" name="heat_sink" value="0">
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
                                        <input type="radio" id="combine45" name="heat_sink" value="1">
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

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">24 CPU:</label>
                                <?php if($cpu == null){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine46" name="cpu" value="0">
                                        <label class="label_values" for="combine46" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine47" name="cpu" value="1">
                                        <label class="label_values" for="combine47">No </label>
                                    </div>
                                </div>
                                <?php }elseif($cpu == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine46" name="cpu" value="0" checked="checked">
                                        <label class="label_values" for="combine46" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine47" name="cpu" value="1">
                                        <label class="label_values" for="combine47">No </label>
                                    </div>
                                </div>
                                <?php }elseif($cpu == 0){ ?>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine46" name="cpu" value="0">
                                        <label class="label_values" for="combine46" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine47" name="cpu" value="1" checked="checked">
                                        <label class="label_values" for="combine47">No </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <a type="submit" value="submit" name="combine_check_form"
                        class="btn btn-default bg-gradient-success btn-next">Next</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- LCD Check  -->
<!-- ============================================================== -->



<?php 
                
                    if(isset($_POST['submit_lcd_check'])){
                        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
                        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
                        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
                        $whitespot = mysqli_real_escape_string($connection, $_POST['whitespot']);
                        $scratch = mysqli_real_escape_string($connection, $_POST['scratch']);
                        $broken = mysqli_real_escape_string($connection, $_POST['broken']);
                        $line_lcd = mysqli_real_escape_string($connection, $_POST['line_lcd']);
                        $yellow_shadow = mysqli_real_escape_string($connection, $_POST['yellow_shadow']);
                        $status = NULL;

                        if($whitespot == 1 || $scratch == 1 || $broken == 1 || $line_lcd == 1 || $yellow_shadow == 1){
                            $status = 1;
                        }else{
                            $status = 0;
                        }

                        $lcd_check_query = "INSERT INTO `lcd_check`(inventory_id, emp_id, sales_order_id, whitespot, scratch, broken, line_lcd, yellow_shadow, created_time, status) 
                                                    VALUES ('$inventory_id', '$emp_id', '$sales_order_id', '$whitespot', '$scratch', '$broken', '$line_lcd', '$yellow_shadow', CURRENT_TIMESTAMP, $status)";
                        $lcd_query = mysqli_query($connection, $lcd_check_query);
                        echo "<script>
                        var newHTML = document.createElement ('div');
                        newHTML.innerHTML =
                        newHTML = document.createElement ('div');
                        // newHTML.innerHTML = ' <div id=\"myModal4\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                        document.body.appendChild (newHTML);
                        $(window).load(function(){
                             $('#myModal4').modal('show');
                        });
                    </script>";
                    }
                               
                ?>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">03 LCD Check </h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Whitespot</label>
                            <?php if($whitespot == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r15" name="whitespot" value="0">
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r15" style="margin-right: 15px;">Okay </label>
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
                                    <input type="radio" id="r17" name="scratch" value="0">
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r17" style="margin-right: 15px;">Okay </label>
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
                                    <input type="radio" id="r19" name="broken" value="0">
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="0">
                                    <label class="label_values" for="r20">No </label>
                                </div>
                            </div>
                            <?php } elseif($broken == 0) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r19" name="broken" value="0" checked="checked">
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="0">
                                    <label class="label_values" for="r20">No </label>
                                </div>
                            </div>
                            <?php } elseif ($broken == 1) { ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r19" name="broken" value="0">
                                    <label class="label_values" for="r19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r20" name="broken" value="0" checked="checked">
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
                                    <input type="radio" id="r21" name="line_lcd" value="0">
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r21" style="margin-right: 15px;">Okay </label>
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
                                    <input type="radio" name="yellow_shadow" id="r23" value="0">
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay </label>
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
                                    <label class="label_values" for="r23" style="margin-right: 15px;">Okay </label>
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
                <div class="modal-footer">
                    <a type="submit" value="submit" name="submit_lcd_check"
                        class="btn btn-default bg-gradient-success btn-next">Next</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Bodywork Check  -->
<!-- ============================================================== -->



<?php 
        if(isset($_POST['bodywork'])){
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
            if($result[$i] == "b_broken"){
                $b_broken ="1";
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
            $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
            $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
            $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
            $status = 0;
            if($a_scratch == 1 || $a_broken == 1 || $a_dent == 1 || $b_scratch ==1 || $b_broken ==1 || $b_logo == 1 || $b_color == 1 || $c_scratch == 1 || $c_broken == 1 || 
                $c_dent ==1 || $d_scratch == 1 || $d_broken == 1 || $d_dent==1){
                $status = 1;
            } 

            $checkBox = implode(',', $_POST['work']);
            $query = "INSERT INTO bodywork(inventory_id, emp_id, sales_order_id, a_scratch, a_broken, a_dent, b_scratch, b_broken, b_logo, b_color, c_scratch, c_broken, c_dent, d_scratch, d_broken, d_dent, status) 
                                VALUES ('$inventory_id','$emp_id','$sales_order_id','$a_scratch','$a_broken','$a_dent','$b_scratch','$b_broken','$b_logo','$b_color','$c_scratch','$c_broken','$c_dent','$d_scratch','$d_broken','$d_dent','$status')";
            echo $query;
            $query_run = mysqli_query($connection, $query);
            if($status == 1){
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $date = $date1->format('Y-m-d H:i:s');
                $query_prod_info ="UPDATE prod_info SET end_date_time = '$date', status = '0', issue_type = '4' WHERE p_id = '$p_id' ";
                $query_prod_run = mysqli_query($connection, $query_prod_info);
            } 
            echo "<script>
                        var newHTML = document.createElement ('div');
                        newHTML.innerHTML =
                        newHTML = document.createElement ('div');
                        // newHTML.innerHTML = ' <div id=\"myModal5\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\"> <div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"></div>';
                        document.body.appendChild (newHTML);
                        $(window).load(function(){
                             $('#myModal5').modal('show');
                        });
                    </script>";
        }
    ?>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form role="form" action="" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">04 Bodywork Form</h4>

                </div>
                <div class="modal-body">
                    <fieldset style="display: block;">
                        <div class="modal-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">A/Top Cover</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="scratch_a_top" name="work[]" value="a_scratch">
                                        <label class="label_values" for="scratch_a_top">Scratch </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="a-top_broken" name="work[]" value="a_broken">
                                        <label class="label_values" for="a-top_broken">Broken </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                        <label class="label_values" for="a_top_dent">Dent </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">B/Bazel</label>
                                <div class="col-sm-8 mt-2">

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="b_bazel_scratch" name="work[]" value="b_scratch">
                                        <label class="label_values" for="b_bazel_scratch">Scratch </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="b_bazel_broken" name="work[]" value="b_broken">
                                        <label class="label_values" for="b_bazel_broken">Broken </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="b_bazel_logo" name="work[]" value="b_logo">
                                        <label class="label_values" for="b_bazel_logo">Logo Missing </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="b_bazel_colour" name="work[]" value="b_color">
                                        <label class="label_values" for="b_bazel_colour">Colour </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">C/Palmrest</label>
                                <div class="col-sm-8 mt-2">

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="c_plamrest_scratch" name="work[]" value="c_scratch">
                                        <label class="label_values" for="c_plamrest_scratch">Scratch </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="a-c_plamrest_broken" name="work[]" value="c_broken">
                                        <label class="label_values" for="a-c_plamrest_broken">Broken </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="c_plamrest_dent" name="work[]" value="c_dent">
                                        <label class="label_values" for="c_plamrest_dent">Dent </label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">D/Back Cover</label>
                                <div class="col-sm-8 mt-2">

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="d_back_cover_scratch" name="work[]"
                                            value="d_scratch">
                                        <label class="label_values" for="d_back_cover_scratch">Scratch </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="d_back_cover_broken" name="work[]" value="d_broken">
                                        <label class="label_values" for="d_back_cover_broken">Broken </label>
                                    </div>

                                    <div class="icheck-danger d-inline">
                                        <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                        <label class="label_values" for="d_back_cover_dent">Dent </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <a type="submit" value="submit" class=" btn btn-default bg-gradient-success
                    btn-next">Next</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ============================================================== -->
<!-- Laptop Specification Check  -->
<!-- ============================================================== -->


<?php                 
                
                    if(isset($_POST['prduction_specification_form'])){
                        
                        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
                        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
                        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
                        $processor = mysqli_real_escape_string($connection, $_POST['processor']);
                        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
                        $ram = mysqli_real_escape_string($connection, $_POST['ram']);
                        $hdd_capacity = mysqli_real_escape_string($connection, $_POST['hdd_capacity']);
                        $hdd_type = mysqli_real_escape_string($connection, $_POST['hdd_type']);
                        $display = mysqli_real_escape_string($connection, $_POST['display']);
                        $resolutions = mysqli_real_escape_string($connection, $_POST['resolutions']);
                        $graphic = mysqli_real_escape_string($connection, $_POST['graphic']);
                        $graphic_type = mysqli_real_escape_string($connection, $_POST['graphic_type']);
                        $operating_system = mysqli_real_escape_string($connection, $_POST['operating_system']);
                    
                        $query = "INSERT INTO production_check(inventory_id, emp_id, sales_order_id, processor, generation, ram, hdd_capacity, hdd_type, display, resolutions, graphic, graphic_type, operating_system, status, created_time) 
                                    VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$processor', '$generation', '$ram', '$hdd_capacity', '$hdd_type', '$display', '$resolutions', '$graphic', '$graphic_type', '$operating_system', 0, CURRENT_TIMESTAMP)";
                        $query_run = mysqli_query($connection, $query);
                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                        $date = $date1->format('Y-m-d H:i:s');
                        $query_prod_info ="UPDATE prod_info SET end_date_time = '$date', status = '0', issue_type = '5' WHERE p_id = '$p_id' ";
                        $query_prod_run = mysqli_query($connection, $query_prod_info);
                        header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
                            
                    }

                ?>
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">05 Production Specification Form</h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <fieldset style="display: block;">
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Processor</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="celeron" name="processor" value="celeron">
                                            <label class="label_values" for="celeron"
                                                style="margin-bottom: 5px;">Celeron </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="pentium" name="processor" value="pentium">
                                            <label class="label_values" for="pentium"
                                                style="margin-bottom: 5px;">Pentium </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i3" name="processor" value="i3">
                                            <label class="label_values" for="i3" style="margin-bottom: 5px;">i3
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i5" name="processor" value="i5">
                                            <label class="label_values" for="i5" style="margin-bottom: 5px;">i5
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i7" name="processor" value="i7">
                                            <label class="label_values" for="i7" style="margin-bottom: 5px;">i7
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i9" name="processor" value="i9">
                                            <label class="label_values" for="i9" style="margin-bottom: 5px;">i9
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="xeon" name="processor" value="xeon">
                                            <label class="label_values" for="xeon" style="margin-bottom: 5px;">Xeon
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ryzen3" name="processor" value="ryzen3">
                                            <label class="label_values" for="ryzen3" style="margin-bottom: 5px;">Ryzen3
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ryzen5" name="processor" value="ryzen5">
                                            <label class="label_values" for="ryzen5" style="margin-bottom: 5px;">Ryzen5
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ryzen7" name="processor" value="ryzen7">
                                            <label class="label_values" for="ryzen7" style="margin-bottom: 5px;">Ryzen7
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ryzen9" name="processor" value="ryzen9">
                                            <label class="label_values" for="ryzen9" style="margin-bottom: 5px;">Ryzen9
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="a4" name="processor" value="a4">
                                            <label class="label_values" for="a4" style="margin-bottom: 5px;">A4
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="a6" name="processor" value="a6">
                                            <label class="label_values" for="a6" style="margin-bottom: 5px;">A6
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="a8" name="processor" value="a8">
                                            <label class="label_values" for="a8" style="margin-bottom: 5px;">A8
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="a10" name="processor" value="a10">
                                            <label class="label_values" for="a10" style="margin-bottom: 5px;">A10
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="a12" name="processor" value="a12">
                                            <label class="label_values" for="a12" style="margin-bottom: 5px;">A12
                                            </label>
                                        </div>

                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="athlon" name="processor" value="athlon">
                                            <label class="label_values" for="athlon" style="margin-bottom: 5px;">Athlon
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Generation</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="1st" name="generation" value="1st">
                                            <label class="label_values" for="1st" style="margin-bottom: 5px;">1st
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="2nd" name="generation" value="2nd">
                                            <label class="label_values" for="2nd" style="margin-bottom: 5px;">2nd
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="3rd" name="generation" value="3rd">
                                            <label class="label_values" for="3rd" style="margin-bottom: 5px;">3rd
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="4th" name="generation" value="4th">
                                            <label class="label_values" for="4th" style="margin-bottom: 5px;">4th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="5th" name="generation" value="5th">
                                            <label class="label_values" for="5th" style="margin-bottom: 5px;">5th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="6th" name="generation" value="6th">
                                            <label class="label_values" for="6th" style="margin-bottom: 5px;">6th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="7th" name="generation" value="7th">
                                            <label class="label_values" for="7th" style="margin-bottom: 5px;">7th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="8th" name="generation" value="8th">
                                            <label class="label_values" for="8th" style="margin-bottom: 5px;">8th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="9th" name="generation" value="9th">
                                            <label class="label_values" for="9th" style="margin-bottom: 5px;">9th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="10th" name="generation" value="10th">
                                            <label class="label_values" for="10th" style="margin-bottom: 5px;">10th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="11th" name="generation" value="11th">
                                            <label class="label_values" for="11th" style="margin-bottom: 5px;">11th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="12th" name="generation" value="12th">
                                            <label class="label_values" for="12th" style="margin-bottom: 5px;">12th
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="13th" name="generation" value="13th">
                                            <label class="label_values" for="13th" style="margin-bottom: 5px;">13th
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">RAM</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="2gb" name="ram" value="2gb">
                                            <label class="label_values" for="2gb" style="margin-right: 15px;">2GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="4gb" name="ram" value="4gb">
                                            <label class="label_values" for="4gb" style="margin-right: 15px;">4Gb
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="8gb" name="ram" value="8gb">
                                            <label class="label_values" for="8gb" style="margin-right: 15px;">8GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="16gb" name="ram" value="16gb">
                                            <label class="label_values" for="16gb" style="margin-right: 15px;">16GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="32gb" name="ram" value="32gb">
                                            <label class="label_values" for="32gb" style="margin-right: 15px;">32GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="64gb" name="ram" value="64gb">
                                            <label class="label_values" for="64gb" style="margin-right: 15px;">64GB
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">HDD
                                        Capacity</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="128gbssd" name="hdd_capacity" value="128gb">
                                            <label class="label_values" for="128gbssd" style="margin-right: 15px;">128GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="256gbssd" name="hdd_capacity" value="256gb">
                                            <label class="label_values" for="256gbssd" style="margin-right: 15px;">256GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="512gbssd" name="hdd_capacity" value="512gb">
                                            <label class="label_values" for="512gbssd" style="margin-right: 15px;">512GB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="1tbssd" name="hdd_capacity" value="1tb">
                                            <label class="label_values" for="1tbssd" style="margin-right: 15px;">1TB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="2tbssd" name="hdd_capacity" value="2tb">
                                            <label class="label_values" for="2tbssd" style="margin-right: 15px;">2TB
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="nossd" name="hdd_capacity" value="n/a">
                                            <label class="label_values" for="nossd" style="margin-right: 15px;">N/A
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">HDD
                                        Type</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="hdd" name="hdd_type" value="hdd">
                                            <label class="label_values" for="hdd" style="margin-right: 15px;">
                                                HDD</label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ssd" name="hdd_type" value="ssd">
                                            <label class="label_values" for="ssd" style="margin-right: 15px;"> SSD
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="nvme" name="hdd_type" value="nvme">
                                            <label class="label_values" for="nvme" style="margin-right: 15px;"> NVMe
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Display</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="touch" name="display" value="touch">
                                            <label class="label_values" for="touch" style="margin-right: 15px;">Touch
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="nontouch" name="display" value="non-touch">
                                            <label class="label_values" for="nontouch" style="margin-right: 15px;">Non
                                                Touch
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Resolutions</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="hd" name="resolutions" value="hd">
                                            <label class="label_values" for="hd" style="margin-right: 15px;">HD
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="fhd" name="resolutions" value="fhd">
                                            <label class="label_values" for="fhd" style="margin-right: 15px;">FHD
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="qhd" name="resolutions" value="qhd">
                                            <label class="label_values" for="qhd" style="margin-right: 15px;">QHD
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="4k" name="resolutions" value="4k">
                                            <label class="label_values" for="4k" style="margin-right: 15px;">4K
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Graphic</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="1gb-graphic" name="graphic" value="1GB">
                                            <label class="label_values" for="1gb-graphic"
                                                style="margin-right: 15px;">1GB </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="2gb-graphic" name="graphic" value="2GB">
                                            <label class="label_values" for="2gb-graphic"
                                                style="margin-right: 15px;">2GB </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="4gb-graphic" name="graphic" value="4GB">
                                            <label class="label_values" for="4gb-graphic"
                                                style="margin-right: 15px;">4GB </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="8gb-graphic" name="graphic" value="8GB">
                                            <label class="label_values" for="8gb-graphic"
                                                style="margin-right: 15px;">8GB </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="16gb-graphic" name="graphic" value="16GB">
                                            <label class="label_values" for="16gb-graphic"
                                                style="margin-right: 15px;">16GB </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">Graphic
                                        Type</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="intel" name="graphic_type" value="intel">
                                            <label class="label_values" for="intel" style="margin-right: 15px;">Intel
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="nvidia" name="graphic_type" value="nvidia">
                                            <label class="label_values" for="nvidia" style="margin-right: 15px;">Nvidia
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="amd" name="graphic_type" value="AMD">
                                            <label class="label_values" for="amd" style="margin-right: 15px;">AMD
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="n-a" name="graphic_type" value="n/a">
                                            <label class="label_values" for="n-a" style="margin-right: 15px;">N/A
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label text-capitalize ">
                                        Operation System</label>
                                    <div class="col-sm-9 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="Windows" name="operating_system" value="windows">
                                            <label class="label_values" for="Windows"
                                                style="margin-right: 15px;">Windows </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="Linux" name="operating_system" value="linux">
                                            <label class="label_values" for="Linux" style="margin-right: 15px;">Linux
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="Ubuntu" name="operating_system" value="ubuntu">
                                            <label class="label_values" for="Ubuntu" style="margin-right: 15px;">Ubuntu
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="ios" name="operating_system" value="ios">
                                            <label class="label_values" for="ios" style="margin-right: 15px;">IOS
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


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>

<script>
$("div[id^='myModal']").each(function() {
    var currentModal = $(this);


    //click next
    currentModal.find(".btn-next").click(function() {
        currentModal.modal("hide");
        currentModal
            .closest("div[id^='myModal']")
            .nextAll("div[id^='myModal']")
            .first()
            .modal("show");

    });

    //click prev
    currentModal.find(".btn-prev").click(function() {
        currentModal.modal("hide");
        currentModal
            .closest("div[id^='myModal']")
            .prevAll("div[id^='myModal']")
            .first()
            .modal("show");
    });
});

$('#myModal').modal({
    backdrop: 'static',
    keyboard: false
})
</script>