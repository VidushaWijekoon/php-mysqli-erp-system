<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 6 && $department == 1)){

$sales_item_id = NULL;
$inventory_id = NULL;
$emp_id = NULL;

$item_type = NULL;
$item_brand = NULL;
$item_model = NULL;
$item_processor = NULL;
$item_core = NULL;
$item_generation = NULL;
$item_delivery_date = NULL;
$item_ram = NULL;
$item_display = NULL;
$item_screen = NULL;
$item_graphic = NULL;
$item_condition = NULL;
$item_hdd  = NULL;
$item_os   = NULL;

$bios_check = NULL;
$power = NULL;
$ports = NULL;
$mother_board_status = NULL;
$mb_bios_check = NULL;
$mb_power = NULL;
$mb_ports = NULL;

$keyboard = NULL;
$keyboard_keys = NULL;
$speakers = NULL;
$camera = NULL;
$bazel_broken = NULL;
$mousepad = NULL;
$mouse_pad_button = NULL;
$camera_cable = NULL;
$back_cover = NULL;
$wifi_card = NULL;
$lcd_cable = NULL;
$battery = NULL;
$battery_cable = NULL;
$dvd_rom = NULL;
$dvd_caddy = NULL;
$hdd_caddy = NULL;
$hdd_cable_connector = NULL;
$c_panel_palm_rest = NULL;
$mb_base = NULL;
$hings_cover = NULL;
$lan_cover = NULL;
$fan = NULL;
$heat_sink = NULL;
$cpu = NULL;

$whitespot = NULL;
$scratch = NULL;
$broken = NULL;
$line_lcd = NULL;
$yellow_shadow = NULL;

$processor = NULL;
$generation = NULL;
$ram = NULL;
$hdd_capacity = NULL;
$hdd_type = NULL;
$display = NULL;
$resolutions = NULL;
$graphic = NULL;
$graphic_type = NULL;
$operating_system = NULL;


if(isset($_GET['sales_order_id'])){

    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);

    $select_motherboard_query = "SELECT * FROM motherboard_check WHERE inventory_id = '$inventory_id' AND sales_order_id = '$sales_order_id' AND emp_id = '$emp_id'";
    $motherboard_query_run = mysqli_query($connection, $select_motherboard_query);

    foreach($motherboard_query_run as $mbcf){
        $mb_bios_check = $mbcf['bios_check'];
        $mb_power = $mbcf['power'];
        $mb_ports = $mbcf['ports'];
        $status = $mbcf['status'];
        if($status == 0){
            $mother_board_status = 0;
        }
    }
    
    $query = "SELECT * FROM warehouse_information_sheet INNER JOIN sales_order_add_items
            ON warehouse_information_sheet.sales_order_id = sales_order_add_items.sales_order_id 
            WHERE  warehouse_information_sheet.inventory_id = {$inventory_id} AND warehouse_information_sheet.sales_order_id ={$_GET['sales_order_id']}";

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

        } else {
            header('Location: sales_orders.php?err=user_not_found');
        }
    }  
}                            
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_team_leader_dashboard.php">
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
                    <?php echo $mother_board_status; ?>
                </div>
                <div class="card-group  mb-3">
                    <div class="card">
                        <div class="card-body">
                            <?php  if($mother_board_status == NULL) { ?>
                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>01 Motherboard Check:</p>
                                </label>

                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-warning w-75" data-toggle="modal"
                                        data-target="#myModal1">
                                        Launch Motherboard Form
                                    </button>
                                </div>
                            </div>
                            <?php } if($mother_board_status == 0) { ?>
                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>01 Motherboard Check:</p>
                                </label>

                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-success disabled w-75"
                                        data-toggle="modal" data-target="#myModal1">
                                        Launch Motherboard Form
                                    </button>
                                </div>
                            </div>
                            <?php  } if($mother_board_status == 1) { ?>
                            <div class="row mt-2">
                                <label class="col-sm-4 col-form-label text-capitalize">
                                    <p>01 Motherboard Check:</p>
                                </label>

                                <div class="col-sm-8">
                                    <button type="button" class="btn bg-gradient-danger disabled w-75"
                                        data-toggle="modal" data-target="#myModal1">
                                        Launch Motherboard Form
                                    </button>
                                </div>
                            </div>
                            <?php } ?>

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
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $bios_check = mysqli_real_escape_string($connection, $_POST['bios_check']);
    $power = mysqli_real_escape_string($connection, $_POST['power']);
    $ports = mysqli_real_escape_string($connection, $_POST['ports']);
    $status = NULL;

    if($bios_check == 1 || $power == 1 || $ports == 1){
        $status = 1;
    }else{
        $status = 0;
    }

    $mothercoard_check_query = "INSERT INTO motherboard_check(inventory_id, emp_id, sales_order_id, bios_check, power, ports, created_time, status, completed_time)
                                    VALUES('$inventory_id', '$emp_id', '$sales_order_id', '$bios_check', '$power', '$ports', CURRENT_TIMESTAMP, $status, CURRENT_TIMESTAMP)";
    $mothercoard_query = mysqli_query($connection, $mothercoard_check_query);


}

?>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">01 Motherboard Form</h4>
                </div>
                <div class="modal-body">
                    <fieldset style="display: block;">
                        <div class="modal-body">
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">Bios Check</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r1" name="bios_check" value="0" required>
                                        <label class="label_values" for="r1" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r2" name="bios_check" value="1" required>
                                        <label class="label_values" for="r2">No </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">Power</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r3" name="power" value="0" required>
                                        <label class="label_values" for="r3" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r4" name="power" value="1" required>
                                        <label class="label_values" for="r4">No </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">Port</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="r5" name="ports" value="0" required>
                                        <label class="label_values" for="r5" style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="r6" name="ports" value="1" required>
                                        <label class="label_values" for="r6">No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_motherboard_check"
                        class="btn btn-default btn-next bg-gradient-success">Next</button>
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
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $inventory_id = mysqli_real_escape_string($connection, $_GET['inventory_id']);
    $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
    $keyboard_keys = mysqli_real_escape_string($connection, $_POST['keyboard_keys']);
    $speakers = mysqli_real_escape_string($connection, $_POST['speakers']);
    $camera = mysqli_real_escape_string($connection, $_POST['camera']);
    $bazel_broken = mysqli_real_escape_string($connection, $_POST['bazel_broken']);
    $mousepad = mysqli_real_escape_string($connection, $_POST['mousepad']);
    $mouse_pad_button = mysqli_real_escape_string($connection, $_POST['mouse_pad_button']);
    $camera_cable = mysqli_real_escape_string($connection, $_POST['camera_cable']);
    $back_cover = mysqli_real_escape_string($connection, $_POST['back_cover']);
    $wifi_card = mysqli_real_escape_string($connection, $_POST['wifi_card']);
    $lcd_cable = mysqli_real_escape_string($connection, $_POST['lcd_cable']);
    $battery = mysqli_real_escape_string($connection, $_POST['battery']);
    $battery_cable = mysqli_real_escape_string($connection, $_POST['battery_cable']);
    $dvd_rom = mysqli_real_escape_string($connection, $_POST['dvd_rom']);
    $dvd_caddy = mysqli_real_escape_string($connection, $_POST['dvd_caddy']);
    $hdd_caddy = mysqli_real_escape_string($connection, $_POST['hdd_caddy']);
    $hdd_cable_connector = mysqli_real_escape_string($connection, $_POST['hdd_cable_connector']);
    $c_panel_palm_rest = mysqli_real_escape_string($connection, $_POST['c_panel_palm_rest']);
    $mb_base = mysqli_real_escape_string($connection, $_POST['mb_base']);
    $hings_cover = mysqli_real_escape_string($connection, $_POST['hings_cover']);
    $lan_cover = mysqli_real_escape_string($connection, $_POST['lan_cover']);
    $fan = mysqli_real_escape_string($connection, $_POST['fan']);
    $heat_sink = mysqli_real_escape_string($connection, $_POST['heat_sink']);
    $cpu = mysqli_real_escape_string($connection, $_POST['cpu']);
    $status = NULL;

    if($keyboard == 1 || $keyboard_keys == 1 || $speakers == 1 || $camera == 1 || $bazel_broken  == 1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover == 1 ||
        $wifi_card == 1 || $lcd_cable == 1 || $battery == 1 || $battery_cable == 1 || $dvd_rom == 1 || $dvd_caddy == 1 || $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 ||
        $mb_base == 1 || $hings_cover == 1 || $lan_cover == 1 || $fan == 1 || $heat_sink == 1 || $cpu == 1){
        $status = 1;
    }else{
        $status = 0;
    }

    $combine_check_query = "INSERT INTO combine_check(inventory_id, emp_id, sales_order_id, keyboard, keyboard_keys, speakers, camera, bazel_broken, mousepad, mouse_pad_button, camera_cable, back_cover, wifi_card,
                                                    lcd_cable, battery, battery_cable, dvd_rom, dvd_caddy, hdd_caddy, hdd_cable_connector, c_panel_palm_rest, mb_base, hings_cover, lan_cover, fan, heat_sink, 
                                                    cpu, created_time, status, combined_id) 
                            VALUES('$inventory_id', '$emp_id', '$sales_order_id', '$keyboard', '$keyboard_keys', '$speakers', '$camera', '$bazel_broken', '$mousepad', '$mouse_pad_button', '$camera_cable', 
                                    '$back_cover', '$wifi_card', '$lcd_cable', '$battery', '$battery_cable', '$dvd_rom', '$dvd_caddy', '$hdd_caddy', '$hdd_cable_connector', '$c_panel_palm_rest', '$mb_base', '$hings_cover',
                                    '$lan_cover', '$fan', '$heat_sink', '$cpu', CURRENT_TIMESTAMP, $status, 0)";
    $combine_query = mysqli_query($connection, $combine_check_query);
}


?>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
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
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine01" name="keyboard" value="0" required>
                                        <label class="label_values" for="combine01" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine02" name="keyboard" value="1" required>
                                        <label class="label_values" for="combine02">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">02 Keys:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine03" name="keyboard_keys" value="0" required>
                                        <label class="label_values" for="combine03" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine04" name="keyboard_keys" value="1" required>
                                        <label class="label_values" for="combine04">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">03 Speakers:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine05" name="speakers" value="0" required>
                                        <label class="label_values" for="combine05" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine06" name="speakers" value="1" required>
                                        <label class="label_values" for="combine06">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">04 Camera:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine07" name="camera" value="0">
                                        <label class="label_values" for="combine07" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine08" name="camera" value="1">
                                        <label class="label_values" for="combine08">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">05 Bazel Broken:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine09" name="bazel_broken" value="0">
                                        <label class="label_values" for="combine09" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine10" name="bazel_broken" value="1">
                                        <label class="label_values" for="combine10">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">06 Mouse Pad:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine11" name="mousepad" value="0">
                                        <label class="label_values" for="combine11" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine12" name="mousepad" value="1">
                                        <label class="label_values" for="combine12">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">07 Mouse Pad Button:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine13" name="mouse_pad_button" value="0">
                                        <label class="label_values" for="combine13" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine14" name="mouse_pad_button" value="1">
                                        <label class="label_values" for="combine14">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">08 Camera Cable:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine15" name="camera_cable" value="0">
                                        <label class="label_values" for="combine15" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine16" name="camera_cable" value="1">
                                        <label class="label_values" for="combine16">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">09 Back Cover:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine17" name="back_cover" value="0">
                                        <label class="label_values" for="combine17" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine18" name="back_cover" value="1">
                                        <label class="label_values" for="combine18">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">10 WIFI Card: </label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine19" name="wifi_card" value="0">
                                        <label class="label_values" for="combine19" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine20" name="wifi_card" value="1">
                                        <label class="label_values" for="combine20">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">11 LCD Cable:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine21" name="lcd_cable" value="0">
                                        <label class="label_values" for="combine21" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine22" name="lcd_cable" value="1">
                                        <label class="label_values" for="combine22">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">12 Battery:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine23" name="battery" value="0">
                                        <label class="label_values" for="combine23" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine24" name="battery" value="1">
                                        <label class="label_values" for="combine24">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">13 Battery Cable:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine25" name="battery_cable" value="0">
                                        <label class="label_values" for="combine25" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine26" name="battery_cable" value="1">
                                        <label class="label_values" for="combine26">No </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col col-md-6 col-lg-6">
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">14 DVD ROM: </label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine27" name="dvd_rom" value="0">
                                        <label class="label_values" class="label_values" for="combine27"
                                            style="margin-right: 15px;">Okay </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine28" name="dvd_rom" value="1">
                                        <label class="label_values" for="combine28">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">15 DVD Caddy:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine29" name="dvd_caddy" value="0">
                                        <label class="label_values" for="combine29" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine30" name="dvd_caddy" value="1">
                                        <label class="label_values" for="combine30">No </label>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">16 HDD Caddy:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine31" name="hdd_caddy" value="0">
                                        <label class="label_values" for="combine31" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine32" name="hdd_caddy" value="1">
                                        <label class="label_values" for="combine32">No </label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">17 HDD Cable Connector:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine33" name="hdd_cable_connector" value="0">
                                        <label class="label_values" for="combine33" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine48" name="hdd_cable_connector" value="1">
                                        <label class="label_values" for="combine48">No </label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">18 C Panel / Palm Rest:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine34" name="c_panel_palm_rest" value="0">
                                        <label class="label_values" for="combine34" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine35" name="c_panel_palm_rest" value="1">
                                        <label class="label_values" for="combine35">No </label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">19 D / MB Base:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine36" name="mb_base" value="0">
                                        <label class="label_values" for="combine36" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine37" name="mb_base" value="1">
                                        <label class="label_values" for="combine37">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">20 Hings Cover:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine38" name="hings_cover" value="0">
                                        <label class="label_values" for="combine38" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine39" name="hings_cover" value="1">
                                        <label class="label_values" for="combine39">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">21 LAN Cover:</label>
                                <div class="col-sm-8 mt-2">
                                    <div class="icheck-success d-inline">
                                        <input type="radio" id="combine40" name="lan_cover" value="0">
                                        <label class="label_values" for="combine40" style="margin-right: 15px;">Okay
                                        </label>
                                    </div>
                                    <div class="icheck-danger d-inline">
                                        <input type="radio" id="combine41" name="lan_cover" value="1">
                                        <label class="label_values" for="combine41">No </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">22 Fan:</label>
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
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">23 Heat Sink:</label>
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
                            </div>

                            <div class="row">
                                <label class="col-sm-4 col-form-label text-capitalize">24 CPU:</label>
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
                            </div>

                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="combine_check_form"
                        class="btn btn-default bg-gradient-success btn-next">Next</button>
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
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="lcd1" name="whitespot" value="0">
                                    <label class="label_values" for="lcd1" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="lcd2" name="whitespot" value="1">
                                    <label class="label_values" for="lcd2">No </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Scratch </label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="lcd3" name="scratch" value="0">
                                    <label class="label_values" for="lcd3" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="lcd4" name="scratch" value="1">
                                    <label class="label_values" for="lcd4">No </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Broken </label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="lcd5" name="broken" value="0">
                                    <label class="label_values" for="lcd5" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="lcd6" name="broken" value="0">
                                    <label class="label_values" for="lcd6">No </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">line </label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" id="lcd7" name="line_lcd" value="0">
                                    <label class="label_values" for="lcd7" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="lcd8" name="line_lcd" value="1">
                                    <label class="label_values" for="lcd8">No </label>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-capitalize">Yellow Shadow </label>
                            <div class="col-sm-8 mt-2">
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="yellow_shadow" id="lcd9" value="0">
                                    <label class="label_values" for="lcd9" style="margin-right: 15px;">Okay </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" name="yellow_shadow" id="lcd110" value="1">
                                    <label class="label_values" for="lcd110">No </label>
                                </div>
                            </div>

                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit_lcd_check"
                        class="btn btn-default bg-gradient-success btn-next">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Bodywork Check  -->
<!-- ============================================================== -->


<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">04 Bodywork Form</h4>

            </div>
            <div class="modal-body">
                <form role="form" action="" method="post" class="registration-form">
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

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default bg-gradient-success btn-next">Next</button>
            </div>
        </div>
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

    $production_spec_query = "INSERT INTO production_check(inventory_id, emp_id, sales_order_id, processor, generation, ram, hdd_capacity, hdd_type, display, 
                                                            resolutions, graphic, graphic_type, operating_system, status, created_time) 
                            VALUES('$inventory_id', '$emp_id', '$sales_order_id', '$processor', '$generation', '$ram', '$hdd_capacity', '$hdd_type', '$display', 
                            '$resolutions', '$graphic', '$graphic_type', '$operating_system', 0, CURRENT_TIMESTAMP) ";
    $production_query = mysqli_query($connection, $production_spec_query);
    
}

?>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">01 Motherboard Form</h4>

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
                                            <label class="label_values" for="i3" style="margin-bottom: 5px;">i3 </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i5" name="processor" value="i5">
                                            <label class="label_values" for="i5" style="margin-bottom: 5px;">i5 </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i7" name="processor" value="i7">
                                            <label class="label_values" for="i7" style="margin-bottom: 5px;">i7 </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="i9" name="processor" value="i9">
                                            <label class="label_values" for="i9" style="margin-bottom: 5px;">i9 </label>
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
                                            <label class="label_values" for="hd" style="margin-right: 15px;">HD </label>
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
                                            <label class="label_values" for="4k" style="margin-right: 15px;">4K </label>
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