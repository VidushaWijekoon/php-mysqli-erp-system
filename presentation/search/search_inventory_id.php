<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}


?>

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card mb-2">
                <div class="d-flex">
                    <div class="col col-md-6 col-lg-6">
                        <fieldset class="mt-2 mb-3">
                            <legend>Scan Inventory ID</legend>
                            <form action="" method="POST">
                                <div class="input-group">
                                    <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                                    <input type="number" min="000001" name="search"
                                        value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"
                                        class="form-control" placeholder="Search data" width="50%">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>

                <?php 

                    $wh_device = NULL;
                    $wh_brand = NULL;
                    $wh_processor = NULL;
                    $wh_core = NULL;
                    $wh_generation = NULL;
                    $wh_model = NULL;
                    $wh_location = NULL;

                                if (isset($_POST['search'])) {
                                    $filtervalues = $_POST['search'];

                                $query = "SELECT *, (warehouse_information_sheet.processor) AS w_processor,
                                                    (warehouse_information_sheet.generation) AS w_gen,
                                                    (production_check.processor) AS pro_pro,
                                                    (production_check.generation) AS pro_gen,
                                                    (motherboard_dep.inventory_id) AS motherboard_dep_inventory_id,
                                                    (lcd_dep.inventory_id) AS lcd_dep_inventory_id,
                                                    (bodywork_dep.inventory_id) AS bodywork_dep_inventory_id,
                                                    (sanding_dep.inventory_id) AS sanding_dep_inventory_id,
                                                    (painting_dep.inventory_id) AS painting_dep_inventory_id,
                                                    (qc_dep.inventory_id) AS qc_dep_inventory_id,
                                                    (packing_dep.inventory_id) AS packing_dep_inventory_id
                                        FROM warehouse_information_sheet
                                        LEFT JOIN motherboard_check ON warehouse_information_sheet.inventory_id = motherboard_check.inventory_id
                                        LEFT JOIN lcd_check ON warehouse_information_sheet.inventory_id = lcd_check.inventory_id
                                        LEFT JOIN bodywork ON warehouse_information_sheet.inventory_id = bodywork.inventory_id
                                        LEFT JOIN combine_check ON warehouse_information_sheet.inventory_id = combine_check.inventory_id
                                        LEFT JOIN production_check ON warehouse_information_sheet.inventory_id = production_check.inventory_id
                                        LEFT JOIN prod_info ON warehouse_information_sheet.inventory_id = prod_info.inventory_id
                                        LEFT JOIN motherboard_dep ON warehouse_information_sheet.inventory_id = motherboard_dep.inventory_id
                                        LEFT JOIN lcd_dep ON warehouse_information_sheet.inventory_id = lcd_dep.inventory_id
                                        LEFT JOIN bodywork_dep ON warehouse_information_sheet.inventory_id = bodywork_dep.inventory_id
                                        LEFT JOIN sanding_dep ON warehouse_information_sheet.inventory_id = sanding_dep.inventory_id
                                        LEFT JOIN painting_dep ON warehouse_information_sheet.inventory_id = painting_dep.inventory_id
                                        LEFT JOIN qc_dep ON warehouse_information_sheet.inventory_id = qc_dep.inventory_id
                                        LEFT JOIN packing_dep ON warehouse_information_sheet.inventory_id = packing_dep.inventory_id
                                        WHERE CONCAT(warehouse_information_sheet.inventory_id) LIKE '%$filtervalues%'
                                        LIMIT 1";
                                $result = mysqli_query($connection, $query);
                                
                                if(empty($result)){}else{
                              
                                foreach($result as $rows){      
                                    //  Motherboard
                                    $bios_check = $rows['bios_check'];
                                    $no_power = $rows['no_power'];
                                    $usb_connection = $rows['usb_connection'];
                                    // LCD
                                    $whitespot = $rows['whitespot'];
                                    $scratch = $rows['scratch'];
                                    $broken = $rows['broken'];
                                    $line_lcd = $rows['line_lcd'];
                                    $yellow_shadow = $rows['yellow_shadow'];
                                    // Bodywork
                                    $a_scratch = $rows['a_scratch'];
                                    $a_broken = $rows['a_broken'];
                                    $a_dent = $rows['a_dent'];
                                    $b_scratch = $rows['b_scratch'];
                                    $b_broken = $rows['b_broken'];
                                    $b_logo = $rows['b_logo'];
                                    $b_color = $rows['b_color'];
                                    $c_scratch = $rows['c_scratch'];
                                    $c_broken = $rows['c_broken'];
                                    $c_dent = $rows['c_dent'];
                                    $d_scratch = $rows['d_scratch'];
                                    $d_broken = $rows['d_broken'];
                                    $d_dent = $rows['d_dent'];
                                    //Combine
                                    $keyboard = $rows['keyboard'];
                                    $speakers = $rows['speakers'];
                                    $camera = $rows['camera'];
                                    $bazel = $rows['bazel'];
                                    $damage_keys = $rows['damage_keys'];
                                    $mousepad = $rows['mousepad'];
                                    $mouse_pad_button = $rows['mouse_pad_button'];
                                    $camera_cable = $rows['camera_cable'];
                                    $back_cover = $rows['back_cover'];
                                    $wifi_card = $rows['wifi_card'];
                                    $lcd_cable = $rows['lcd_cable'];
                                    $battery = $rows['battery'];
                                    $battery_cable = $rows['battery_cable'];
                                    $dvd_rom = $rows['dvd_rom'];
                                    $dvd_caddy = $rows['dvd_caddy'];
                                    $hdd_caddy = $rows['hdd_caddy'];
                                    $hdd_cable_connector = $rows['hdd_cable_connector'];
                                    $c_panel_palm_rest = $rows['c_panel_palm_rest'];
                                    $mb_base = $rows['mb_base'];
                                    $hings_cover = $rows['hings_cover'];
                                    $lan_cover = $rows['lan_cover'];
                                    //Production_check
                                    $prod_processor = $rows['pro_pro'];
                                    $prod_generation = $rows['pro_gen'];
                                    $prod_ram = $rows['ram'];
                                    $prod_hdd_capacity = $rows['hdd_capacity'];
                                    $prod_hdd_type = $rows['hdd_type'];
                                    $prod_display = $rows['display'];
                                    $prod_resolutions = $rows['resolutions'];
                                    $prod_graphic = $rows['graphic'];
                                    $prod_graphic_type = $rows['graphic_type'];
                                    $prod_operating_system = $rows['operating_system']; 
                                    //Warehouse send to production
                                    $send_to_production = $rows['send_to_production'];
                                    $wh_device = $rows['device'];
                                    $wh_brand = $rows['brand'];
                                    $wh_processor = $rows['w_processor'];
                                    $wh_core = $rows['core'];
                                    $wh_generation = $rows['w_gen'];
                                    $wh_model = $rows['model'];
                                    $wh_location = $rows['location'];
                                    //Prod_info
                                    $prod_info_status = $rows['status'];
                                    // Motherboard Department
                                    $motherboard_dep_inventory_id = $rows['motherboard_dep_inventory_id'];
                                    // LCD Department
                                    $lcd_dep_inventory_id = $rows['lcd_dep_inventory_id'];
                                    // Bodywork Department
                                    $bodywork_dep_inventory_id = $rows['bodywork_dep_inventory_id'];
                                    // Sanding Department
                                    $sanding_dep_inventory_id = $rows['sanding_dep_inventory_id'];
                                    // Painting Department
                                    $painting_dep_inventory_id = $rows['painting_dep_inventory_id'];
                                    // QC Department
                                    $qc_dep_inventory_id = $rows['qc_dep_inventory_id'];
                                    // Packing Department
                                    $packing_dep_inventory_id = $rows['packing_dep_inventory_id'];
                                  
                            ?>


                <!-- ============================================================== -->
                <!-- Timeline    -->
                <!-- ============================================================== -->

                <div class="col col-lg-12 mb-3">
                    <div class="mt-5">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card" style="background: #343a40">
                                    <div class="horizontal-timeline">
                                        <div class="card-body">
                                            <ul class="list-inline items">

                                                <li class="list-inline-item items-list">
                                                    <?php if($send_to_production == 0) {?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-warning">Inventory</div>
                                                        <a class="btn  bg-warning rounded-circle">
                                                            <i class="fa-solid fa-angles-up fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php }elseif($send_to_production == 1){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-success">Inventory</div>
                                                        <a class="btn  bg-success rounded-circle">
                                                            <i class="fa-solid fa-check fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($send_to_production == 1) {?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-warning">Production</div>
                                                        <a class="btn  bg-warning rounded-circle">
                                                            <i class="fa-solid fa-angles-up fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($motherboard_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Motherboard</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($lcd_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">LCD</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($bodywork_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Bodywork</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($sanding_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Sanding</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($painting_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Painting</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($qc_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">QC</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($packing_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Packing</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                                <li class="list-inline-item items-list">
                                                    <?php if($packing_dep_inventory_id == NULL){ ?>
                                                    <div class="px-4">
                                                        <div class="event-date badge bg-secondary">Destroyed</div>
                                                        <a class="btn  bg-secondary rounded-circle">
                                                            <i class="fa-solid fa-minus fa-4x"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- End Timeline    -->
                        <!-- ============================================================== -->

                        <?php if($send_to_production == 1) {?>
                        <div class="col col-lg-12 mb-3">
                            <fieldset>
                                <legend>Inventory Report</legend>
                                <div class="row">

                                    <!-- ============================================================== -->
                                    <!-- Motherboard views   -->
                                    <!-- ============================================================== -->

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6>Motherboard</h6>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Bios Lock </label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($bios_check == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($bios_check == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($bios_check == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">No Power</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($no_power == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($no_power == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($no_power == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">All Ports</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($usb_connection == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($usb_connection == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($usb_connection == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ============================================================== -->
                                    <!-- LCD    -->
                                    <!-- ============================================================== -->

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6>LCD</h6>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Whitespot</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($whitespot == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($whitespot == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($whitespot == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Scratch </label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($scratch == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($scratch == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($scratch == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Brocken</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($broken == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($broken == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($broken == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Line</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($line_lcd == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($line_lcd == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($line_lcd == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label">Yellow Shadow</label>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline text-capitalize">
                                                            <div class="custom-control custom-checkbox">
                                                                <div class="form-group">
                                                                    <?php if($yellow_shadow == NULL){ ?>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($yellow_shadow == 0){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php }elseif($yellow_shadow == 1){ ?>
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input"
                                                                            id="customSwitch3" disabled>
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch3">
                                                                        </label>
                                                                    </div>
                                                                    <?php } ?>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- ============================================================== -->
                                    <!-- Body Work   -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6>Bodywork</h6>
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label text-capitalize">A/Top
                                                        Cover</label>
                                                    <div class="col-sm-9 mt-2 d-flex">
                                                        <?php if($a_scratch == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_scratch == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_scratch == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($a_broken == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_broken == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_broken == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($a_dent == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_dent == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($a_dent == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label
                                                        class="col-sm-3 col-form-label text-capitalize">B/Bazel</label>
                                                    <div class="col-sm-9 mt-2 d-flex">

                                                        <?php if($b_scratch == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_scratch == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_scratch == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($b_broken == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_broken == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_broken == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($b_logo == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Logo
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_logo == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Logo
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_logo == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($b_color == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Colour
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_color == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Colour
                                                            </label>
                                                        </div>
                                                        <?php }elseif($b_color == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Colour
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label
                                                        class="col-sm-3 col-form-label text-capitalize">C/Palmrest</label>
                                                    <div class="col-sm-9 mt-2 d-flex">

                                                        <?php if($c_scratch == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_scratch == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_scratch == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($c_broken == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_broken == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_broken == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($c_dent == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_dent == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($c_dent == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-sm-3 col-form-label text-capitalize">D/Back
                                                        Cover</label>
                                                    <div class="col-sm-9 mt-2 d-flex">

                                                        <?php if($d_scratch == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_scratch == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_scratch == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Scratch
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                        <?php if($d_broken == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_broken == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_broken == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label"
                                                                for="customSwitch3">Broken
                                                            </label>
                                                        </div>
                                                        <?php } ?>


                                                        <?php if($d_dent == NULL){ ?>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_dent == 0){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php }elseif($d_dent == 1){ ?>
                                                        <div
                                                            class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customSwitch3" disabled>
                                                            <label class="custom-control-label" for="customSwitch3">Dent
                                                            </label>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- end total followers   -->
                                    <!-- ============================================================== -->
                                    <!-- ============================================================== -->
                                    <!-- partnerships   -->
                                    <!-- ============================================================== -->
                                </div>

                                <!-- ============================================================== -->
                                <!-- Combine   -->
                                <!-- ============================================================== -->

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6>Combine</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Keyboard</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($keyboard == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($keyboard == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($keyboard == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Bazel</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($bazel == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($bazel == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($bazel == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Mouse Pad</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($mousepad == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mousepad == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mousepad == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Mouse Pad
                                                                Button</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($mouse_pad_button == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mouse_pad_button == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mouse_pad_button == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Speakers</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($speakers == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($speakers == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($speakers == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Camera</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($camera == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($camera == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($camera == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Camera Cable</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($camera_cable == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($camera_cable == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($camera_cable == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Back Cover</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($back_cover == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($back_cover == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($back_cover == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">LCD Cable</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($lcd_cable == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($lcd_cable == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($lcd_cable == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">WI-FI Card</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($wifi_card == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($wifi_card == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($wifi_card == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- ============================================================== -->
                                                    <!-- Second Row   -->
                                                    <!-- ============================================================== -->
                                                    <div class="col-sm-6">

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Battery</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($battery == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($battery == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($battery == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Battery Cable</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($battery_cable == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($battery_cable == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($battery_cable == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">DVD-ROM</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($dvd_rom == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($dvd_rom == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($dvd_rom == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">DVD Caddy</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($dvd_caddy == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($dvd_caddy == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($dvd_caddy == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">HDD Caddy</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($hdd_caddy == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hdd_caddy == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hdd_caddy == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">HDD Cable
                                                                Connector</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($hdd_cable_connector == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hdd_cable_connector == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hdd_cable_connector == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">C/Panel/
                                                                Plamrest</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($c_panel_palm_rest == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($c_panel_palm_rest == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($c_panel_palm_rest == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">D/Motherboard
                                                                Base</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($mb_base == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mb_base == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($mb_base == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">Hings Cover</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($hings_cover == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hings_cover == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($hings_cover == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-6 col-form-label">LAN Cover</label>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-check form-check-inline text-capitalize">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <div class="form-group">
                                                                            <?php if($lan_cover == NULL){ ?>
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($lan_cover == 0){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-success custom-switch-off-success">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php }elseif($lan_cover == 1){ ?>
                                                                            <div
                                                                                class="custom-control custom-switch custom-switch-on-danger custom-switch-off-danger">
                                                                                <input type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="customSwitch3" disabled>
                                                                                <label class="custom-control-label"
                                                                                    for="customSwitch3">
                                                                                </label>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h6>Finishing Laptop Checklist</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6 text-uppercase">

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Processor</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_processor ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">CPU
                                                                Generation</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_generation ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">RAM</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_ram ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">SSD</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_hdd_capacity ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">HDD</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_hdd_type ?>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-sm-6 text-uppercase">

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Display</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_display ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Resolution</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_resolutions ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Graphic Size</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_graphic ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Graphic Type</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_graphic_type ?>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label">Operation
                                                                System</label>
                                                            <div class="col-sm-8 mt-2 col-values">
                                                                <?php echo $prod_operating_system ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } } ?>


                            </fieldset>
                        </div>

                        <?php } ?>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h6>Inventory Laptop Checklist</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 text-uppercase">

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Device</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_device ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Brand</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_brand ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Processor</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_processor ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Core</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_core ?>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-sm-6 text-uppercase">

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Generation</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_generation ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Model</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_model ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-sm-4 col-form-label">Location</label>
                                                <div class="col-sm-8 mt-2 col-values">
                                                    <?php echo $wh_location."-".$wh_generation."-".$wh_model ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php');  ?>