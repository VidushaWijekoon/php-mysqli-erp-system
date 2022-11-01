<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
if($role_id == 1 || $role_id == 2 || $role_id == 6){

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
$lunch_combine = 1;
$lcd = 1;
$body_work=1;
$launch_prod=1;
$mother_board =1;
$tech_id;
$bios = null;
$no_power = null;
$usb_connection = null;
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
    $query_m = "SELECT * FROM motherboard_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_m = mysqli_query($connection, $query_m);
    foreach($query_run_m as $data){
        $bios = $data['bios_check'];
        $no_power = $data['no_power'];
        $usb_connection=$data['usb_connection'];
        $status = $data['status'];
        if($status == 0){
            $mother_board = 0;
        }

    }
      $query_mc = "SELECT * FROM combine_check WHERE inventory_id =$inventory_id AND sales_order_id=$sales_order_id";
    $query_run_c = mysqli_query($connection, $query_mc);
    foreach($query_run_c as $data){
        $comb_status = $data['status'];
        $keyboard = $data['keyboard'];
        $speakers = $data['speakers'];
        $camera = $data['camera'];
        $bazel = $data['bazel'];
         $keys= $data['keys'];
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
       
        if($comb_status == 0){
            $lunch_combine = 0;
        }
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
    
    $query = "SELECT * FROM warehouse_information_sheet 
                        INNER JOIN sales_order_add_items
                        ON warehouse_information_sheet.model = sales_order_add_items.item_model 
                        AND warehouse_information_sheet.core = sales_order_add_items.item_core 
                        AND  warehouse_information_sheet.generation = sales_order_add_items.item_generation 
                        AND  warehouse_information_sheet.processor = sales_order_add_items.item_processor
                        AND  warehouse_information_sheet.brand = sales_order_add_items.item_brand
                        AND warehouse_information_sheet.device = sales_order_add_items.item_type 
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

        } else {
            // user not found
            header('Location: sales_orders.php?err=user_not_found');
        }
    } else {
        // query unsuccessful
        // header('Location: hr_employees.php?err=query_failed');
    }
}

 
if(isset($_POST['submit'])){
        $webcam = $_POST['webcam'];
        $mousepad_buttons = $_POST['mousepad_buttons'];
        $microphone = $_POST['microphone'];
        $speaker_sound = $_POST['speaker_sound'];
        $wifi_connection = $_POST['wifi_connection'];
        $usb_port = $_POST['usb_port'];
        $hinges_cover = $_POST['hinges_cover'];
        $created_by = $_SESSION['first_name'];
 
        $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
        $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
        $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
            
        $query = "INSERT INTO production_checklist (webcam, mousepad_buttons, microphone, speaker_sound, wifi_connection, usb_port, hinges_cover, sales_order_id, inventory_id, emp_id, created_by) 
                VALUES ('$webcam', '$mousepad_buttons', '$microphone', '$speaker_sound', '$wifi_connection', '$usb_port', '$hinges_cover', '$sales_order_id', '$inventory_id', '$emp_id', '$created_by')";
        $result = mysqli_query($connection, $query);
            
        if($result){
            echo "Query Add Successfully";
        }else{
            $errors[] = 'Failed to add the new record.';
        }      
}

 
?>

<!-- <div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_team_task.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div> -->

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
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
                            <label class="col-sm-3 col-form-label">Windows</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control text-uppercase" name="customer_name"
                                    placeholder="Dell"
                                    style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="" method="POST">
                <div class="card card-secondary">
                    <div class="card-header bg-secondary">
                        <h3 class="card-title">Production Elements</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-group  mb-3">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card-group  mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if($mother_board == 1){ ?>
                                                <div class="row mt-2">
                                                    <label class="col-sm-4 col-form-label text-capitalize">
                                                        Motherboard</label>
                                                    <div class="col-sm-8">

                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-motherboard">
                                                            Launch Motherboard Form
                                                        </button>

                                                    </div>
                                                </div>
                                                <?php }else{?>
                                                <div class="row mt-2">
                                                    <label class="col-sm-4 col-form-label text-capitalize"> Step 01 :
                                                        Motherboard</label>
                                                    <div class="col-sm-8">

                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-motherboard"
                                                            disabled>
                                                            Launch Motherboard Form
                                                        </button>

                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php if($mother_board == 0 && $lunch_combine ==1){ ?>

                                                <div class="row mt-2">
                                                    <label
                                                        class="col-sm-4 col-form-label text-capitalize">Combine</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-combine">
                                                            Launch Combine Form
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php } if($mother_board == 0 && $lunch_combine == 0){ ?>
                                                <div class="row mt-2">
                                                    <label
                                                        class="col-sm-4 col-form-label text-capitalize">Combine</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-combine" disabled>
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
                                                    <label class="col-sm-4 col-form-label text-capitalize">LCD</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-lcd">
                                                            Launch LCD Form
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                if($lcd == 0 && $lunch_combine == 0){
                                                    ?>
                                                <div class="row mt-2">
                                                    <label class="col-sm-4 col-form-label text-capitalize">LCD</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-lcd" disabled>
                                                            Launch LCD Form
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php }
                                                 if($body_work == 1 && $lcd == 0){ ?>

                                                <div class="row mt-2">
                                                    <label
                                                        class="col-sm-4 col-form-label text-capitalize">Bodywork</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-bodywork">
                                                            Launch Bodywork Form
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php } if($body_work == 0 && $lcd == 0){?>
                                                <div class="row mt-2">
                                                    <label
                                                        class="col-sm-4 col-form-label text-capitalize">Bodywork</label>
                                                    <div class="col-sm-8">
                                                        <button type="button" class="btn bg-gradient-danger w-75"
                                                            data-toggle="modal" data-target="#modal-bodywork" disabled>
                                                            Launch Bodywork Form
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <?php if($body_work == 0){ ?>

                                        <div class="row mt-2">
                                            <label class="col-sm-4 col-form-label text-capitalize">Production</label>
                                            <div class="col-sm-8">
                                                <button type="button" class="btn bg-gradient-primary w-75"
                                                    data-toggle="modal" data-target="#modal-production">
                                                    Launch Production Form
                                                </button>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
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

<?php 

if(isset($_POST['motherboard_submit'])){
    
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $bios_check = mysqli_real_escape_string($connection, $_POST['bios_check']);
    $no_power = mysqli_real_escape_string($connection, $_POST['no_power']);
    $usb_connection = mysqli_real_escape_string($connection, $_POST['usb_connection']);
    $status = 0;
     if($bios_check == 1 || $no_power == 1 || $usb_connection == 1){
        $status = 1;
     }
     if($mother_board == 1){
    $query = "INSERT INTO motherboard_check (sales_order_id, emp_id, inventory_id, bios_check, no_power, usb_connection,status) 
                VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$bios_check', '$no_power', '$usb_connection','$status')";
    $query_run = mysqli_query($connection, $query);
    if($status == 1){
     $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $date = $date1->format('Y-m-d H:i:s');
    $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='0',issue_type='1' WHERE p_id ='$p_id' ";
    $query_prod_run = mysqli_query($connection, $query_prod_info);
    header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
    }else{
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
     }else{
        echo "Already Completed";
     }
}

?>
<!-- Motherboard Form -->
<div class="modal fade" id="modal-motherboard">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Motherboard Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Bios Check</label>
                        <div class="col-sm-8 mt-2">
                            <?php  if($bios == null){  ?>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r1" name="bios_check" value="0">
                                <label for="r1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r2" name="bios_check" value="1">
                                <label for="r2">No </label>
                            </div>
                            <?php }elseif($bios == 0){?>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r1" name="bios_check" value="0" checked="checked">
                                <label for="r1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r2" name="bios_check" value="1">
                                <label for="r2">No </label>
                            </div>
                            <?php }elseif($bios == 1){ ?>
                            <?php }elseif($bios == 0){?>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r1" name="bios_check" value="0">
                                <label for="r1" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r2" name="bios_check" value="1" checked="checked">
                                <label for="r2">No </label>
                            </div>
                            <?php }
                             ?>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">No Power</label>
                        <?php  if($no_power == null){  ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r3" name="no_power" value="0">
                                <label for="r3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r4" name="no_power" value="1">
                                <label for="r4">No </label>
                            </div>
                        </div>
                        <?php }elseif($no_power == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r3" name="no_power" value="0" checked="checked">
                                <label for="r3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r4" name="no_power" value="1">
                                <label for="r4">No </label>
                            </div>
                        </div>
                        <?php } elseif($no_power == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r3" name="no_power" value="0">
                                <label for="r3" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r4" name="no_power" value="1" checked="checked">
                                <label for="r4">No </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">USB Connection</label>
                        <?php if($usb_connection == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r5" name="usb_connection" value="0">
                                <label for="r5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r6" name="usb_connection" value="1">
                                <label for="r6">No </label>
                            </div>
                        </div>
                        <?php } elseif($usb_connection == 0){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r5" name="usb_connection" value="0" checked="checked">
                                <label for="r5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r6" name="usb_connection" value="1">
                                <label for="r6">No </label>
                            </div>
                        </div>
                        <?php } elseif($usb_connection == 1){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r5" name="usb_connection" value="0">
                                <label for="r5" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r6" name="usb_connection" value="1" checked="checked">
                                <label for="r6">No </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="motherboard_submit" class="btn bg-gradient-success btn-sm">Save
                        changes</button>
                    <!-- <input class="btn btn-primary" type="submit" name="motherboard_submit" vlaue="Choose options"> -->

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php 

if(isset($_POST['combine_form'])){
    
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
    $speakers = mysqli_real_escape_string($connection, $_POST['speakers']);
    $camera = mysqli_real_escape_string($connection, $_POST['camera']);
    $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
    $keys= mysqli_real_escape_string($connection,  $_POST['keys']);
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


    $status = 0;
     if($keyboard == 1 || $Keys == 1 || $speakers == 1 || $camera ==1 || $bazel ==1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover ==1 || $wifi_card ==1 ||
     $lcd_cable == 1 || $battery == 1 || $battery_cable == 1 || $dvd_rom ==1 || $dvd_caddy ==1 ||
      $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 || $mb_base ==1 || $hings_cover ==1 || $lan_cover ==1){
        $status = 1;
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d');
       
        $query_6 = "INSERT INTO requested_part_from_production(
            
            brand,
            model,
            generation,
            sales_order_id,
            inventory_id,
            created_date,
            emp_id,
            location,
            status,
            keyboard,
            speakers,
            camera,
            bazel,
            lan_cover,
            mousepad,
            mouse_pad_button,
            camera_cable,
            back_cover,
            wifi_card,
            lcd_cable,
            battery,
            battery_cable,
            dvd_rom,
            dvd_caddy,
            hdd_caddy,
            hdd_cable_connector,
            c_panel_palm_rest,
            mb_base,
            hings_cover
        )
        VALUES(
            '$item_brand',
            '$item_model',
            '$item_generation',
            '$sales_order_id',
            '$inventory_id',
            '$date',
            '$emp_id',
            '$location',
            '1',
            '$keyboard',
            '$speakers',
            '$camera',
            '$bazel',
            '$lan_cover',
            '$mousepad',
            '$mouse_pad_button',
            '$camera_cable',
            '$back_cover',
            '$wifi_card',
            '$lcd_cable',
            '$battery',
            '$battery_cable',
            '$dvd_rom',
            '$dvd_caddy',
            '$hdd_caddy',
            '$hdd_cable_connector',
            '$c_panel_palm_rest',
            '$mb_base',
            '$hings_cover'
        )";
         $query_new = mysqli_query($connection, $query_6);
     }
    if($lunch_combine == 1){
    $query = "INSERT INTO combine_check (inventory_id, emp_id, sales_order_id, keyboard, speakers, camera, bazel, status, damage_keys, mousepad, 
    mouse_pad_button, camera_cable, back_cover, wifi_card, lcd_cable, battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, 
    c_panel_palm_rest, mb_base, hings_cover, lan_cover) 
                VALUES ('$inventory_id', '$emp_id', '$sales_order_id', '$keyboard', '$speakers', '$camera', '$bazel','$status','$keys','$mousepad','$mouse_pad_button',
                '$camera_cable','$back_cover','$wifi_card','$lcd_cable','$battery','$battery_cable','$dvd_rom','$dvd_caddy','$hdd_caddy','$hdd_cable_connector',
                '$c_panel_palm_rest','$mb_base','$hings_cover','$lan_cover')";

    $query_run = mysqli_query($connection, $query);
    if($status == 1){
     $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $date = $date1->format('Y-m-d H:i:s');
    $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='1',issue_type='2' WHERE p_id ='$p_id' ";
    $query_prod_run = mysqli_query($connection, $query_prod_info);
    header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
    }else{
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
    }else{
        echo "already checked";
    }
}

?>

<!-- Combine Form -->
<div class="modal fade" id="modal-combine">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Step 02 : Combine Task</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body d-flex mx-5">
                    <div class="col col-md-6 col-lg-6">
                        <div class="row">

                            <label class="col-sm-4 col-form-label text-capitalize">01 Keyboard:</label>
                            <?php if($keyboard == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r7" name="keyboard" value="0">
                                    <label for="r7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r8" name="keyboard" value="1">
                                    <label for="r8">No </label>
                                </div>
                            </div>
                            <?php }elseif($keyboard == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r7" name="keyboard" value="0" checked="checked">
                                    <label for="r7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r8" name="keyboard" value="1">
                                    <label for="r8">No </label>
                                </div>
                            </div>
                            <?php } elseif($keyboard == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r7" name="keyboard" value="0">
                                    <label for="r7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r8" name="keyboard" value="1" checked="checked">
                                    <label for="r8">No </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">02 Keys:</label>
                            <?php if($keys == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c31" name="keys" value="0">
                                    <label for="c31" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c32" name="keys" value="1">
                                    <label for="c32">No </label>
                                </div>
                            </div>
                            <?php }elseif($keys == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c31" name="keys" value="0" checked="checked">
                                    <label for="c31" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c32" name="keys" value="1">
                                    <label for="c32">No </label>
                                </div>
                            </div>
                            <?php }elseif($keys == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c31" name="keys" value="0">
                                    <label for="c31" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c32" name="keys" value="1" checked="checked">
                                    <label for="c32">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">03 Speakers:</label>
                            <?php if($speakers == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r9" name="speakers" value="0">
                                    <label for="r9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r10" name="speakers" value="1">
                                    <label for="r10">No </label>
                                </div>
                            </div>
                            <?php } elseif($speakers == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r9" name="speakers" value="0" checked="checked">
                                    <label for="r9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r10" name="speakers" value="1">
                                    <label for="r10">No </label>
                                </div>
                            </div>
                            <?php } elseif($speakers == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r9" name="speakers" value="0">
                                    <label for="r9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r10" name="speakers" value="1" checked="checked">
                                    <label for="r10">No </label>
                                </div>
                            </div>
                            <?php }?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">04 Camera:</label>
                            <?php if($camera == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r11" name="camera" value="0">
                                    <label for="r11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r12" name="camera" value="1">
                                    <label for="r12">No </label>
                                </div>
                            </div>
                            <?php }elseif($camera == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r11" name="camera" value="0" checked="checked">
                                    <label for="r11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r12" name="camera" value="1">
                                    <label for="r12">No </label>
                                </div>
                            </div>
                            <?php }elseif($camera == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="r11" name="camera" value="0">
                                    <label for="r11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r12" name="camera" value="1" checked="checked">
                                    <label for="r12">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">05 Bazel:</label>
                            <?php if($bazel == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="13" name="bazel" value="0">
                                    <label for="13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r14" name="bazel" value="1">
                                    <label for="r14">No </label>
                                </div>
                            </div><?php }elseif($bazel==0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="13" name="bazel" value="0" checked="checked">
                                    <label for="13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r14" name="bazel" value="1">
                                    <label for="r14">No </label>
                                </div>
                            </div><?php }elseif($bazel ==1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="13" name="bazel" value="0">
                                    <label for="13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="r14" name="bazel" value="1" checked="checked">
                                    <label for="r14">No </label>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">07 Mouse Pad:</label>
                            <?php if($mousepad == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c1" name="mousepad" value="0">
                                    <label for="c1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c2" name="mousepad" value="1">
                                    <label for="c2">No </label>
                                </div>
                            </div>
                            <?php }elseif($mousepad == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c1" name="mousepad" value="0" checked="checked">
                                    <label for="c1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c2" name="mousepad" value="1">
                                    <label for="c2">No </label>
                                </div>
                            </div>
                            <?php }elseif($mousepad == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c1" name="mousepad" value="0">
                                    <label for="c1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c2" name="mousepad" value="1" checked="checked">
                                    <label for="c2">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">08 Mouse Pad Button:</label>
                            <?php if($mouse_pad_button == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c3" name="mouse_pad_button" value="0">
                                    <label for="c3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c4" name="mouse_pad_button" value="1">
                                    <label for="c4">No </label>
                                </div>
                            </div>
                            <?php }elseif($mouse_pad_button == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c3" name="mouse_pad_button" value="0" checked="checked">
                                    <label for="c3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c4" name="mouse_pad_button" value="1">
                                    <label for="c4">No </label>
                                </div>
                            </div>
                            <?php }elseif($mouse_pad_button == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c3" name="mouse_pad_button" value="0">
                                    <label for="c3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c4" name="mouse_pad_button" value="1" checked="checked">
                                    <label for="c4">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">09 Camera Cable:</label>
                            <?php if($camera_cable == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c5" name="camera_cable" value="0">
                                    <label for="c5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c6" name="camera_cable" value="1">
                                    <label for="c6">No </label>
                                </div>
                            </div>
                            <?php }elseif($camera_cable == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c5" name="camera_cable" value="0" checked="checked">
                                    <label for="c5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c6" name="camera_cable" value="1">
                                    <label for="c6">No </label>
                                </div>
                            </div>
                            <?php }elseif($camera_cable == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c5" name="camera_cable" value="0">
                                    <label for="c5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c6" name="camera_cable" value="1" checked="checked">
                                    <label for="c6">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">10 Back Cover:</label>
                            <?php if($back_cover == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c7" name="back_cover" value="0">
                                    <label for="c7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c8" name="back_cover" value="1">
                                    <label for="c8">No </label>
                                </div>
                            </div>
                            <?php }elseif($back_cover == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c7" name="back_cover" value="0" checked="checked">
                                    <label for="c7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c8" name="back_cover" value="1">
                                    <label for="c8">No </label>
                                </div>
                            </div>
                            <?php }elseif($back_cover == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c7" name="back_cover" value="0">
                                    <label for="c7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c8" name="back_cover" value="1" checked="checked">
                                    <label for="c8">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">11 WIFI Card: </label>
                            <?php if($wifi_card == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c9" name="wifi_card" value="0">
                                    <label for="c9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c10" name="wifi_card" value="1">
                                    <label for="c10">No </label>
                                </div>
                            </div>
                            <?php }elseif($wifi_card == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c9" name="wifi_card" value="0" checked="checked">
                                    <label for="c9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c10" name="wifi_card" value="1">
                                    <label for="c10">No </label>
                                </div>
                            </div>
                            <?php }elseif($wifi_card == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c9" name="wifi_card" value="0">
                                    <label for="c9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c10" name="wifi_card" value="1" checked="checked">
                                    <label for="c10">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">12 LCD Cable:</label>
                            <?php if($lcd_cable == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c11" name="lcd_cable" value="0">
                                    <label for="c11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c12" name="lcd_cable" value="1">
                                    <label for="c12">No </label>
                                </div>
                            </div>
                            <?php }elseif($lcd_cable == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c11" name="lcd_cable" value="0" checked="checked">
                                    <label for="c11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c12" name="lcd_cable" value="1">
                                    <label for="c12">No </label>
                                </div>
                            </div>
                            <?php }elseif($lcd_cable == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c11" name="lcd_cable" value="0">
                                    <label for="c11" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c12" name="lcd_cable" value="1" checked="checked">
                                    <label for="c12">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col col-md-6 col-lg-6">
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">13 Battery:</label>
                            <?php if($battery == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c13" name="battery" value="0">
                                    <label for="c13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c14" name="battery" value="1">
                                    <label for="c14">No </label>
                                </div>
                            </div>
                            <?php }elseif($battery == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c13" name="battery" value="0" checked="checked">
                                    <label for="c13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c14" name="battery" value="1">
                                    <label for="c14">No </label>
                                </div>
                            </div>
                            <?php }elseif($battery == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c13" name="battery" value="0">
                                    <label for="c13" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c14" name="battery" value="1" checked="checked">
                                    <label for="c14">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">14 Battery Cable:</label>
                            <?php if($battery_cable == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c15" name="battery_cable" value="0">
                                    <label for="c15" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c16" name="battery_cable" value="1">
                                    <label for="c16">No </label>
                                </div>
                            </div>
                            <?php }elseif($battery_cable == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c15" name="battery_cable" value="0" checked="checked">
                                    <label for="c15" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c16" name="battery_cable" value="1">
                                    <label for="c16">No </label>
                                </div>
                            </div>
                            <?php }elseif($battery_cable == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c15" name="battery_cable" value="0">
                                    <label for="c15" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c16" name="battery_cable" value="1" checked="checked">
                                    <label for="c16">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">15 DVD ROM: </label>
                            <?php if($dvd_rom == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c17" name="dvd_rom" value="0">
                                    <label for="c17" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c18" name="dvd_rom" value="1">
                                    <label for="c18">No </label>
                                </div>
                            </div>
                            <?php }elseif($dvd_rom == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c17" name="dvd_rom" value="0" checked="checked">
                                    <label for="c17" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c18" name="dvd_rom" value="1">
                                    <label for="c18">No </label>
                                </div>
                            </div>
                            <?php }elseif($dvd_rom == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c17" name="dvd_rom" value="0">
                                    <label for="c17" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c18" name="dvd_rom" value="1" checked="checked">
                                    <label for="c18">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">16 DVD Caddy:</label>
                            <?php if($dvd_caddy == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c19" name="dvd_caddy" value="0">
                                    <label for="c19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c20" name="dvd_caddy" value="1">
                                    <label for="c20">No </label>
                                </div>
                            </div>
                            <?php }elseif($dvd_caddy == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c19" name="dvd_caddy" value="0" checked="checked">
                                    <label for="c19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c20" name="dvd_caddy" value="1">
                                    <label for="c20">No </label>
                                </div>
                            </div>
                            <?php }elseif($dvd_caddy == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c19" name="dvd_caddy" value="0">
                                    <label for="c19" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c20" name="dvd_caddy" value="1" checked="checked">
                                    <label for="c20">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">17 HDD Caddy:</label>
                            <?php if($hdd_caddy == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c21" name="hdd_caddy" value="0">
                                    <label for="c21" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c22" name="hdd_caddy" value="1">
                                    <label for="c22">No </label>
                                </div>
                            </div>
                            <?php }elseif($hdd_caddy == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c21" name="hdd_caddy" value="0" checked="checked">
                                    <label for="c21" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c22" name="hdd_caddy" value="1">
                                    <label for="c22">No </label>
                                </div>
                            </div>
                            <?php }elseif($hdd_caddy == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c21" name="hdd_caddy" value="0">
                                    <label for="c21" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c22" name="hdd_caddy" value="1" checked="checked">
                                    <label for="c22">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">18 HDD Cable Connector:</label>
                            <?php if($hdd_cable_connector == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c23" name="hdd_cable_connector" value="0">
                                    <label for="c23" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c24" name="hdd_cable_connector" value="1">
                                    <label for="c24">No </label>
                                </div>
                            </div>
                            <?php }elseif($hdd_cable_connector == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c23" name="hdd_cable_connector" value="0" checked="checked">
                                    <label for="c23" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c24" name="hdd_cable_connector" value="1">
                                    <label for="c24">No </label>
                                </div>
                            </div>
                            <?php }elseif($hdd_cable_connector == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c23" name="hdd_cable_connector" value="0">
                                    <label for="c23" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c24" name="hdd_cable_connector" value="1" checked="checked">
                                    <label for="c24">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">19 C Panel / Palm Rest:</label>
                            <?php if($c_panel_palm_rest == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c25" name="c_panel_palm_rest" value="0">
                                    <label for="c25" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c26" name="c_panel_palm_rest" value="1">
                                    <label for="c26">No </label>
                                </div>
                            </div>
                            <?php }elseif($c_panel_palm_rest == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c25" name="c_panel_palm_rest" value="0" checked="checked">
                                    <label for="c25" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c26" name="c_panel_palm_rest" value="1">
                                    <label for="c26">No </label>
                                </div>
                            </div>
                            <?php }elseif($c_panel_palm_rest == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c25" name="c_panel_palm_rest" value="0">
                                    <label for="c25" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c26" name="c_panel_palm_rest" value="1" checked="checked">
                                    <label for="c26">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">20 D / MB Base:</label>
                            <?php if($mb_base == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c33" name="mb_base" value="0">
                                    <label for="c33" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c34" name="mb_base" value="1">
                                    <label for="c34">No </label>
                                </div>
                            </div>
                            <?php }elseif($mb_base == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c33" name="mb_base" value="0" checked="checked">
                                    <label for="c33" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c34" name="mb_base" value="1">
                                    <label for="c34">No </label>
                                </div>
                            </div>
                            <?php }elseif($mb_base == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c33" name="mb_base" value="0">
                                    <label for="c33" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c34" name="mb_base" value="1" checked="checked">
                                    <label for="c34">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">21 Hings Cover:</label>
                            <?php if($hings_cover == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c27" name="hings_cover" value="0">
                                    <label for="c27" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c28" name="hings_cover" value="1">
                                    <label for="c28">No </label>
                                </div>
                            </div>
                            <?php }elseif($hings_cover == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c27" name="hings_cover" value="0" checked="checked">
                                    <label for="c27" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c28" name="hings_cover" value="1">
                                    <label for="c28">No </label>
                                </div>
                            </div>
                            <?php }elseif($hings_cover == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c27" name="hings_cover" value="0">
                                    <label for="c27" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c28" name="hings_cover" value="1" checked="checked">
                                    <label for="c28">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">22 LAN Cover:</label>
                            <?php if($lan_cover == null){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c29" name="lan_cover" value="0">
                                    <label for="c29" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c30" name="lan_cover" value="1">
                                    <label for="c30">No </label>
                                </div>
                            </div>
                            <?php }elseif($lan_cover == 0){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c29" name="lan_cover" value="0" checked="checked">
                                    <label for="c29" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c30" name="lan_cover" value="1">
                                    <label for="c30">No </label>
                                </div>
                            </div>
                            <?php }elseif($lan_cover == 1){ ?>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="c29" name="lan_cover" value="0">
                                    <label for="c29" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="c30" name="lan_cover" value="1" checked="checked">
                                    <label for="c30">No </label>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <?php echo "<a class='btn btn-sm btn-danger mx-1' href=\"production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}\">Close</a>" ?>
                    <button type="submit" name="combine_form" class="btn bg-gradient-success btn-sm">Save
                        changes</button>
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
     $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $date = $date1->format('Y-m-d H:i:s');
    $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='0',issue_type='3' WHERE p_id ='$p_id' ";
    $query_prod_run = mysqli_query($connection, $query_prod_info);
    header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
    }else{
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
}

?>
<!-- LCD -->
<div class="modal fade" id="modal-lcd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">LCD Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">

                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">Whitespot</label>
                        <?php if($whitespot == null){ ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r15" name="whitespot" value="0">
                                <label for="r15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r16" name="whitespot" value="1">
                                <label for="r16">No </label>
                            </div>
                        </div>
                        <?php } elseif($whitespot == 0) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r15" name="whitespot" value="0" checked="checked">
                                <label for="r15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r16" name="whitespot" value="1">
                                <label for="r16">No </label>
                            </div>
                        </div>
                        <?php } elseif ($whitespot == 1) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r15" name="whitespot" value="0">
                                <label for="r15" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r16" name="whitespot" value="1" checked="checked">
                                <label for="r16">No </label>
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
                                <label for="r17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="18" name="scratch" value="1">
                                <label for="18">No </label>
                            </div>
                        </div>
                        <?php } elseif($scratch == 0) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r17" name="scratch" value="0" checked="checked">
                                <label for="r17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="18" name="scratch" value="1">
                                <label for="18">No </label>
                            </div>
                        </div>
                        <?php } elseif ($scratch == 1) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r17" name="scratch" value="0">
                                <label for="r17" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="18" name="scratch" value="1" checked="checked">
                                <label for="18">No </label>
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
                                <label for="r19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r20" name="broken" value="0">
                                <label for="r20">No </label>
                            </div>
                        </div>
                        <?php } elseif($broken == 0) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r19" name="broken" value="0" checked="checked">
                                <label for="r19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r20" name="broken" value="0">
                                <label for="r20">No </label>
                            </div>
                        </div>
                        <?php } elseif ($broken == 1) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r19" name="broken" value="0">
                                <label for="r19" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r20" name="broken" value="0" checked="checked">
                                <label for="r20">No </label>
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
                                <label for="r21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r22" name="line_lcd" value="1">
                                <label for="r22">No </label>
                            </div>
                        </div>
                        <?php } elseif($line_lcd == 0) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r21" name="line_lcd" value="0" checked="checked">
                                <label for="r21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r22" name="line_lcd" value="1">
                                <label for="r22">No </label>
                            </div>
                        </div>
                        <?php } elseif ($line_lcd == 1) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="r21" name="line_lcd" value="0">
                                <label for="r21" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" id="r22" name="line_lcd" value="1" checked="checked">
                                <label for="r22">No </label>
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
                                <label for="r23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="yellow_shadow" id="r24" value="1">
                                <label for="r24">No </label>
                            </div>
                        </div>
                        <?php } elseif($yellow_shadow == 0) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="yellow_shadow" id="r23" value="0" checked="checked">
                                <label for="r23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="yellow_shadow" id="r24" value="1">
                                <label for="r24">No </label>
                            </div>
                        </div>
                        <?php } elseif ($yellow_shadow == 1) { ?>
                        <div class="col-sm-8 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" name="yellow_shadow" id="r23" value="0">
                                <label for="r23" style="margin-right: 15px;">Okay </label>
                            </div>
                            <div class="icheck-danger d-inline">
                                <input type="radio" name="yellow_shadow" id="r24" value="1" checked="checked">
                                <label for="r24">No </label>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="lcd_form" class="btn bg-gradient-success btn-sm">Save
                        changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Bodywork -->

<div class="modal fade" id="modal-bodywork">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Bodywork Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <?php if($a_scratch_retrive != 0 || $a_broken_retrive != 0 || $a_dent_retrive != 0){ ?>
                    <div class="row">
                        <label class="col-sm-4 col-form-label text-capitalize">A/Top Cover</label>
                        <div class="col-sm-8 mt-2">
                            <?php if($a_scratch_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="scratch_a_top" name="work[]" value="a_scratch">
                                <label for="scratch_a_top">Scratch </label>
                            </div>
                            <?php } elseif($a_scratch_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="scratch_a_top" name="work[]" value="a_scratch">
                                <label for="scratch_a_top">Scratch </label>
                            </div>
                            <?php } ?>

                            <?php if($a_broken_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a-top_broken" name="work[]" value="a_broken">
                                <label for="a-top_broken">Broken </label>
                            </div>
                            <?php } elseif($a_broken_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a-top_broken" name="work[]" value="a_broken">
                                <label for="a-top_broken">Broken </label>
                            </div>
                            <?php } ?>

                            <?php if($a_dent_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                <label for="a_top_dent">Dent </label>
                            </div>
                            <?php  } elseif($a_dent_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a_top_dent" name="work[]" value="a_dent">
                                <label for="a_top_dent">Dent </label>
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
                                <label for="b_bazel_scratch">Scratch </label>
                            </div>
                            <?php } elseif($b_scratch_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_scratch" name="work[]" value="b_scratch">
                                <label for="b_bazel_scratch">Scratch </label>
                            </div>
                            <?php } ?>

                            <?php if($b_broken_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_broken" name="work[]" value="b_broken">
                                <label for="b_bazel_broken">Broken </label>
                            </div>
                            <?php  } elseif($b_broken_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_broken" name="work[]" value="b_broken">
                                <label for="b_bazel_broken">Broken </label>
                            </div>
                            <?php } ?>

                            <?php if($b_logo_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_logo" name="work[]" value="b_logo">
                                <label for="b_bazel_logo">Logo </label>
                            </div>
                            <?php } elseif($b_logo_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_logo" name="work[]" value="b_logo">
                                <label for="b_bazel_logo">Logo </label>
                            </div>
                            <?php } ?>

                            <?php if($b_color_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_colour" name="work[]" value="b_color">
                                <label for="b_bazel_colour">Colour </label>
                            </div>
                            <?php } elseif($b_color_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="b_bazel_colour" name="work[]" value="b_color">
                                <label for="b_bazel_colour">Colour </label>
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
                                <label for="c_plamrest_scratch">Scratch </label>
                            </div>
                            <?php } elseif($c_scratch_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="c_plamrest_scratch" name="work[]" value="c_scratch">
                                <label for="c_plamrest_scratch">Scratch </label>
                            </div>
                            <?php } ?>

                            <?php if($c_broken_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a-c_plamrest_broken" name="work[]" value="c_broken">
                                <label for="a-c_plamrest_broken">Broken </label>
                            </div>
                            <?php } elseif($c_broken_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="a-c_plamrest_broken" name="work[]" value="c_broken">
                                <label for="a-c_plamrest_broken">Broken </label>
                            </div>
                            <?php } ?>

                            <?php if($c_dent_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="c_plamrest_dent" name="work[]" value="c_dent">
                                <label for="c_plamrest_dent">Dent </label>
                            </div>
                            <?php } elseif($c_dent_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="c_plamrest_dent" name="work[]" value="c_dent">
                                <label for="c_plamrest_dent">Dent </label>
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
                                <label for="d_back_cover_scratch">Scratch </label>
                            </div>
                            <?php } elseif($d_scratch_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="d_back_cover_scratch" name="work[]" value="d_scratch">
                                <label for="d_back_cover_scratch">Scratch </label>
                            </div>
                            <?php } ?>

                            <?php if($d_broken_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="d_back_cover_broken" name="work[]" value="d_broken">
                                <label for="d_back_cover_broken">Broken </label>
                            </div>
                            <?php }elseif($d_broken_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="d_back_cover_broken" name="work[]" value="d_broken">
                                <label for="d_back_cover_broken">Broken </label>
                            </div>
                            <?php } ?>

                            <?php if($d_dent_retrive == 2){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                <label for="d_back_cover_dent">Dent </label>
                            </div>
                            <?php }elseif($d_dent_retrive == 1){ ?>
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                <label for="d_back_cover_dent">Dent </label>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-success btn-sm" name="bodywork">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php 
if(isset($_POST['bodywork'])){
   $checkBox = implode(',', $_POST['work']); 
$result=explode(",",$checkBox);

for($i =0; $i<= sizeof($result);$i++){
    echo $result[$i];
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
     if($a_scratch == 1 || $a_broken == 1 || $a_dent == 1 || $b_scratch ==1 || $b_broken ==1 ||
     $b_logo == 1 || $b_color == 1 || $c_scratch == 1 || $c_broken ==1 || $c_dent ==1 ||
     $d_scratch == 1 || $d_broken == 1 || $d_dent==1){
        $status = 1;
     } 
     $checkBox = implode(',', $_POST['work']);
     echo $checkBox;
    $query = "INSERT INTO bodywork(id, inventory_id, emp_id, sales_order_id, a_scratch, a_broken, a_dent, b_scratch, b_broken, b_logo, b_color, c_scratch, c_broken, c_dent, d_scratch, d_broken, d_dent, status) 
    VALUES (null,'$inventory_id','$emp_id','$sales_order_id','$a_scratch','$a_broken','$a_dent','$b_scratch','$b_broken','$b_logo','$b_color','$c_scratch','$c_broken','$c_dent','$d_scratch','$d_broken','$d_dent','$status')";
    $query_run = mysqli_query($connection, $query);
// header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
    if($status == 1){
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='0',issue_type='4' WHERE p_id ='$p_id' ";
        $query_prod_run = mysqli_query($connection, $query_prod_info);
        header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
        }else{
            header("location: ./production_checklist.php?emp_id={$emp_id}&inventory_id={$inventory_id}&sales_order_id={$sales_order_id}");
        }
}
?>
<?php 

if(isset($_POST['production_form'])){
    
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $processor = mysqli_real_escape_string($connection, $_POST['processor']);
    $generation = mysqli_real_escape_string($connection, $_POST['generation']);
    $ram = mysqli_real_escape_string($connection, $_POST['ram']);
    $ssd = mysqli_real_escape_string($connection, $_POST['ssd']);
    $hdd = mysqli_real_escape_string($connection, $_POST['hdd']);
    $display = mysqli_real_escape_string($connection, $_POST['display']);
    $resolutions = mysqli_real_escape_string($connection, $_POST['resolutions']);
    $graphic = mysqli_real_escape_string($connection, $_POST['graphic']);
    $graphic_type = mysqli_real_escape_string($connection, $_POST['graphic_type']);
    $operating_system = mysqli_real_escape_string($connection, $_POST['operating_system']);
   
    $query = "INSERT INTO production_check (sales_order_id, emp_id, inventory_id, processor, generation, ram, ssd, hdd, display, resolutions, graphic, graphic_type, operating_system) 
                VALUES ('$sales_order_id', '$emp_id', '$inventory_id', '$processor', '$generation', '$ram', '$ssd', '$hdd', '$display', '$resolutions', '$graphic', '$graphic_type', '$operating_system')";
    $query_run = mysqli_query($connection, $query);
    
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                    $date = $date1->format('Y-m-d H:i:s');
        $query_prod_info ="UPDATE prod_info SET end_date_time=' $date',status='0',issue_type='5' WHERE p_id ='$p_id' ";
        $query_prod_run = mysqli_query($connection, $query_prod_info);
        header("location: ./production_member_daily_task.php?sales_order_id={$sales_order_id}&tech_id={$tech_id}");
        
}

?>

<!-- Production Form -->
<div class="modal fade" id="modal-production">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h4 class="modal-title">Production Checking Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Processor</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="i3" name="processor" value="i3">
                                <label for="i3" style="margin-right: 15px;">i3 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="i5" name="processor" value="i5">
                                <label for="i5" style="margin-right: 15px;">i5 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="i7" name="processor" value="i7">
                                <label for="i7" style="margin-right: 15px;">i7 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="i9" name="processor" value="i9">
                                <label for="i9" style="margin-right: 15px;">i9 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="ryzen3" name="processor" value="ryzen3">
                                <label for="ryzen3" style="margin-right: 15px;">Ryzen3 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="ryzen5" name="processor" value="ryzen5">
                                <label for="ryzen5" style="margin-right: 15px;">Ryzen5 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="ryzen7" name="processor" value="ryzen7">
                                <label for="ryzen7" style="margin-right: 15px;">Ryzen7 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="ryzen9" name="processor" value="ryzen9">
                                <label for="ryzen9" style="margin-right: 15px;">Ryzen9 </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="celeron" name="processor" value="celeron">
                                <label for="celeron" style="margin-right: 15px;">Celeron </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="athlon" name="processor" value="athlon">
                                <label for="athlon" style="margin-right: 15px;">Athlon </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Generation</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="3rd" name="generation" value="3rd">
                                <label for="3rd" style="margin-right: 15px;">3rd </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="4th" name="generation" value="4th">
                                <label for="4th" style="margin-right: 15px;">4th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="5th" name="generation" value="5th">
                                <label for="5th" style="margin-right: 15px;">5th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="6th" name="generation" value="6th">
                                <label for="6th" style="margin-right: 15px;">6th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="7th" name="generation" value="7th">
                                <label for="7th" style="margin-right: 15px;">7th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="8th" name="generation" value="8th">
                                <label for="8th" style="margin-right: 15px;">8th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="9th" name="generation" value="9th">
                                <label for="9th" style="margin-right: 15px;">9th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="10th" name="generation" value="10th">
                                <label for="10th" style="margin-right: 15px;">10th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="11th" name="generation" value="11th">
                                <label for="11th" style="margin-right: 15px;">11th </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="12th" name="generation" value="12th">
                                <label for="12th" style="margin-right: 15px;">12th </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">RAM</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="2gb" name="ram" value="2gb">
                                <label for="2gb" style="margin-right: 15px;">2GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="4gb" name="ram" value="4gb">
                                <label for="4gb" style="margin-right: 15px;">4Gb </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="8gb" name="ram" value="8gb">
                                <label for="8gb" style="margin-right: 15px;">8GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="16gb" name="ram" value="16gb">
                                <label for="16gb" style="margin-right: 15px;">16GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="32gb" name="ram" value="32gb">
                                <label for="32gb" style="margin-right: 15px;">32GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="64gb" name="ram" value="64gb">
                                <label for="64gb" style="margin-right: 15px;">64GB </label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">SSD</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="128gbssd" name="ssd" value="128gb">
                                <label for="128gbssd" style="margin-right: 15px;">128GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="256gbssd" name="ssd" value="256gb">
                                <label for="256gbssd" style="margin-right: 15px;">256GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="512gbssd" name="ssd" value="512gb">
                                <label for="512gbssd" style="margin-right: 15px;">512GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="1tbssd" name="ssd" value="1tb">
                                <label for="1tbssd" style="margin-right: 15px;">1TB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="2tbssd" name="ssd" value="2tb">
                                <label for="2tbssd" style="margin-right: 15px;">2TB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="nossd" name="hdd" value="n/a">
                                <label for="nossd" style="margin-right: 15px;">N/A </label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">HDD</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="128gbhdd" name="hdd" value="128gb">
                                <label for="128gbhdd" style="margin-right: 15px;">128GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="256gbhdd" name="hdd" value="256gb">
                                <label for="256gbhdd" style="margin-right: 15px;">256GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="512gbhdd" name="hdd" value="512gb">
                                <label for="512gbhdd" style="margin-right: 15px;">512GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="1tbhdd" name="hdd" value="1tb">
                                <label for="1tbhdd" style="margin-right: 15px;">1TB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="2tbhdd" name="hdd" value="2tb">
                                <label for="2tbhdd" style="margin-right: 15px;">2TB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="nohdd" name="hdd" value="n/a">
                                <label for="nohdd" style="margin-right: 15px;">N/A </label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Display</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="touch" name="display" value="touch">
                                <label for="touch" style="margin-right: 15px;">Touch </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="nontouch" name="display" value="non-touch">
                                <label for="nontouch" style="margin-right: 15px;">Non Touch </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Resolutions</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="hd" name="resolutions" value="hd">
                                <label for="hd" style="margin-right: 15px;">HD </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="fhd" name="resolutions" value="fhd">
                                <label for="fhd" style="margin-right: 15px;">FHD </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="qhd" name="resolutions" value="qhd">
                                <label for="qhd" style="margin-right: 15px;">QHD </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="4k" name="resolutions" value="4k">
                                <label for="4k" style="margin-right: 15px;">4K </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Graphic</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="1gb-graphic" name="graphic" value="1">
                                <label for="1gb-graphic" style="margin-right: 15px;">1GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="2gb-graphic" name="graphic" value="2">
                                <label for="2gb-graphic" style="margin-right: 15px;">2GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="4gb-graphic" name="graphic" value="4">
                                <label for="4gb-graphic" style="margin-right: 15px;">4GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="8gb-graphic" name="graphic" value="8">
                                <label for="8gb-graphic" style="margin-right: 15px;">8GB </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="16gb-graphic" name="graphic" value="8">
                                <label for="16gb-graphic" style="margin-right: 15px;">8GB </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">Graphic
                            Type</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="intel" name="graphic_type" value="intel">
                                <label for="intel" style="margin-right: 15px;">Intel </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="nvidia" name="graphic_type" value="nvidia">
                                <label for="nvidia" style="margin-right: 15px;">Nvidia </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="amd" name="graphic_type" value="4">
                                <label for="amd" style="margin-right: 15px;">AMD </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label
                            class="col-sm-3 col-form-label text-capitalize mx-auto text-center justify-content-center">
                            Operation System</label>
                        <div class="col-sm-9 mt-2">
                            <div class="icheck-success d-inline">
                                <input type="radio" id="Windows" name="operating_system" value="Windows">
                                <label for="Windows" style="margin-right: 15px;">Windows </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="Linux" name="operating_system" value="Linux">
                                <label for="Linux" style="margin-right: 15px;">Linux </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="Ubuntu" name="operating_system" value="4">
                                <label for="Ubuntu" style="margin-right: 15px;">Ubuntu </label>
                            </div>
                            <div class="icheck-success d-inline">
                                <input type="radio" id="ios" name="operating_system" value="4">
                                <label for="ios" style="margin-right: 15px;">IOS </label>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="production_form" class="btn bg-gradient-success btn-sm">Save
                        changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php include_once('../includes/footer.php'); } ?>