<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');
$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];


if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1) || ($role_id == 4 && $department == 20)){
    $prod_t_l = 0;
    if( $role_id == 4 && $department == 1 ){
        $prod_t_l =1;
    }
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$created_date = $_GET['date'];

$date = $created_date;
$day = date('l', strtotime($date));

$model= $_GET['model'];
$emp_location ='';
$item_brand=0;
    $item_model =0;
    $item_generation =0;
    $sales_order_id =0;
    $inventory_id =0;
    $date =0;
    $emp_id =0;
    $location =0;
    $keyboard =0;
    $speakers =0;
    $camera =0;
    $bazel =0;
    $lan_cover =0;
    $mousepad =0;
    $mouse_pad_button =0;
    $camera_cable =0;
    $back_cover =0;
    $wifi_card =0;
    $lcd_cable =0;
    $battery =0;
    $battery_cable =0;
    $dvd_rom =0;
    $dvd_caddy =0;
    $hdd_caddy =0;
    $hdd_cable_connector =0;
    $c_panel_palm_rest =0;
    $mb_base =0;
    $hings_cover  =0;
    $rp_id =0;
    $emp_id = $_GET['emp_id'];

    $summery_keyboard =0;
    $summery_speakers =0;
    $summery_camera =0;
    $summery_bazel =0;
    $summery_lan_cover =0;
    $summery_mousepad =0;
    $summery_mouse_pad_button =0;
    $summery_camera_cable =0;
    $summery_back_cover =0;
    $summery_wifi_card =0;
    $summery_lcd_cable =0;
    $summery_battery =0;
    $summery_battery_cable =0;
    $summery_dvd_rom =0;
    $summery_dvd_caddy =0;
    $summery_hdd_caddy =0;
    $summery_hdd_cable_connector =0;
    $summery_c_panel_palm_rest =0;
    $summery_mb_base =0;
    $summery_hings_cover  =0;

    $stock_keyboard =0;
    $stock_speakers =0;
    $stock_camera =0;
    $stock_bazel =0;
    $stock_lan_cover =0;
    $stock_mousepad =0;
    $stock_mouse_pad_button =0;
    $stock_camera_cable =0;
    $stock_back_cover =0;
    $stock_wifi_card =0;
    $stock_lcd_cable =0;
    $stock_battery =0;
    $stock_battery_cable =0;
    $stock_dvd_rom =0;
    $stock_dvd_caddy =0;
    $stock_hdd_caddy =0;
    $stock_hdd_cable_connector =0;
    $stock_c_panel_palm_rest =0;
    $stock_mb_base =0;
    $stock_hings_cover  =0;

    $need_to_buy_keyboard =0;
    $need_to_buy_speakers =0;
    $need_to_buy_camera =0;
    $need_to_buy_bazel =0;
    $need_to_buy_lan_cover =0;
    $need_to_buy_mousepad =0;
    $need_to_buy_mouse_pad_button =0;
    $need_to_buy_camera_cable =0;
    $need_to_buy_back_cover =0;
    $need_to_buy_wifi_card =0;
    $need_to_buy_lcd_cable =0;
    $need_to_buy_battery =0;
    $need_to_buy_battery_cable =0;
    $need_to_buy_dvd_rom =0;
    $need_to_buy_dvd_caddy =0;
    $need_to_buy_hdd_caddy =0;
    $need_to_buy_hdd_cable_connector =0;
    $need_to_buy_c_panel_palm_rest =0;
    $need_to_buy_mb_base =0;
    $need_to_buy_hings_cover  =0;
    $location1;
    
?>

<div class="row page-titles m-2">
    <div class="col-md-8 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> Part warehouse
            Member Dashboard -<?php echo $day; ?>
        </h3>
    </div>
</div>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./part_warehouse_leader_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Parts Request</p>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sales Order</th>
                                <th>Emp ID</th>
                                <th>Location</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Generation</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <?php
                            $query = "SELECT * FROM `requested_part_from_production`WHERE created_date = '$created_date' AND status =1 AND emp_id = '$emp_id' AND model='$model' GROUP BY sales_order_id;";
                            
                            $query_run = mysqli_query($connection, $query);
                           
                            foreach($query_run as $a){
                                $query2 = "SELECT  location FROM `users` WHERE epf = '{$a['emp_id']}';";
                            $query_run2 = mysqli_query($connection, $query2);
                            
                            foreach($query_run2 as $b){
                                $emp_location = $b['location'];
                                $location1=$emp_location;
                            }
                           
                                $item_brand = $a['brand'];
                                $item_model = $a['model'];
                                $item_generation = $a['generation'];
                                $sales_order_id = $a['sales_order_id'];
                                $inventory_id = $a['inventory_id'];
                                $emp_id =$a['emp_id'];
                                $location =$a['location'];
                                $rp_id = $a['rp_id'];
                            ?>
                            <tr>
                                <td><?php echo $sales_order_id ?></td>
                                <td><?php echo $emp_id ?></td>
                                <td><?php echo $emp_location."-".$day ?></td>
                                <td><?php echo $item_brand ?></td>
                                <td><?php echo $item_model ?></td>
                                <td><?php echo $item_generation ?></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Parts Request</p>
                </div>
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-hover">
                        <?php
                        $query = "SELECT
                        SUM(`keyboard`) AS keyboard,
                        SUM(`speakers`) AS speakers,
                        SUM(`camera`) AS camera,
                        SUM(`bazel`) AS bazel,
                        SUM(`lan_cover`) AS lan_cover,
                        SUM(`mousepad`) AS mousepad,
                        SUM(`mouse_pad_button`) AS mouse_pad_button,
                        SUM(`camera_cable`) AS camera_cable,
                        SUM(`back_cover`) AS back_cover,
                        SUM(`wifi_card`) AS wifi_card,
                        SUM(`lcd_cable`) AS lcd_cable,
                        SUM(`battery`) AS battery,
                        SUM(`battery_cable`) AS battery_cable,
                        SUM(`dvd_rom`) AS dvd_rom,
                        SUM(`dvd_caddy`) AS dvd_caddy,
                        SUM(`hdd_caddy`) AS hdd_caddy,
                        SUM(`hdd_cable_connector`) AS hdd_cable_connector,
                        SUM(`c_panel_palm_rest`) AS c_panel_palm_rest,
                        SUM(`mb_base`) AS mb_base,
                        SUM(`hings_cover`) AS hings_cover
                    FROM
                        `requested_part_from_production`
                    WHERE
                        created_date = '$created_date' AND status = 1 AND emp_id = '$emp_id' AND model = '$model';";
                        $query_run2 = mysqli_query($connection, $query);
                            foreach($query_run2 as $a){
                                $keyboard =$a['keyboard'];
                                $speakers =$a['speakers'];
                                $camera =$a['camera'];
                                $bazel =$a['bazel'];
                                $lan_cover =$a['lan_cover'];
                                $mousepad =$a['mousepad'];
                                $mouse_pad_button =$a['mouse_pad_button'];
                                $camera_cable =$a['camera_cable'];
                                $back_cover =$a['back_cover'];
                                $wifi_card =$a['wifi_card'];
                                $lcd_cable =$a['lcd_cable'];
                                $battery =$a['battery'];
                                $battery_cable =$a['battery_cable'];
                                $dvd_rom =$a['dvd_rom'];
                                $dvd_caddy =$a['dvd_caddy'];
                                $hdd_caddy =$a['hdd_caddy'];
                                $hdd_cable_connector =$a['hdd_cable_connector'];
                                $c_panel_palm_rest =$a['c_panel_palm_rest'];
                                $mb_base =$a['mb_base'];
                                $hings_cover =$a['hings_cover'];
                                ?>
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Keyboard</th>
                                <th>Speakers</th>
                                <th>Camera</th>
                                <th>Bazel</th>
                                <th>Mouse Pad</th>
                                <th>MousePad Button</th>
                                <th>Camera Cable</th>
                                <th>Back Cover</th>
                                <th>WI-FI Card</th>
                                <th>LCD Cable</th>
                                <th>Battery</th>
                                <th>Battery Cable</th>
                                <th>DVD Rom</th>
                                <th>DVD Caddy</th>
                                <th>HDD Caddy</th>
                                <th>HDD Cable Connector</th>
                                <th>C Panel/Palm Rest</th>
                                <th>D/MB Base</th>
                                <th>Hings Cover</th>
                                <th>LAN Cover</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php
                                $query1 = "SELECT * FROM `requested_part_from_production`WHERE created_date = '$created_date' AND status =1 AND emp_id = '$emp_id' AND model='$model' ;";
                                $query_run1 = mysqli_query($connection, $query1);
                           
                            foreach($query_run1 as $a){
                                $inventory_id1 = $a['inventory_id'];
                                $keyboard1 =$a['keyboard'];
                                $speakers1 =$a['speakers'];
                                $camera1 =$a['camera'];
                                $bazel1 =$a['bazel'];
                                $lan_cover1 =$a['lan_cover'];
                                $mousepad1 =$a['mousepad'];
                                $mouse_pad_button1 =$a['mouse_pad_button'];
                                $camera_cable1 =$a['camera_cable'];
                                $back_cover1=$a['back_cover'];
                                $wifi_card1 =$a['wifi_card'];
                                $lcd_cable1 =$a['lcd_cable'];
                                $battery1 =$a['battery'];
                                $battery_cable1 =$a['battery_cable'];
                                $dvd_rom1 =$a['dvd_rom'];
                                $dvd_caddy1 =$a['dvd_caddy'];
                                $hdd_caddy1 =$a['hdd_caddy'];
                                $hdd_cable_connector1 =$a['hdd_cable_connector'];
                                $c_panel_palm_rest1 =$a['c_panel_palm_rest'];
                                $mb_base1 =$a['mb_base'];
                                $hings_cover1 =$a['hings_cover'];
                                $rp_id =$a['rp_id'];
                                ?>
                            <tr>
                                <td> <?php echo $inventory_id1 ?> </th>
                                <td> <?php echo $keyboard1 ; ?> </td>
                                <td> <?php echo $speakers1 ; ?> </td>
                                <td> <?php echo $camera1; ?> </td>
                                <td> <?php echo $bazel1; ?> </td>
                                <td> <?php echo $mousepad1; ?> </td>
                                <td> <?php echo $mouse_pad_button1; ?> </td>
                                <td> <?php echo $camera_cable1; ?> </td>
                                <td> <?php echo $back_cover1; ?> </td>
                                <td> <?php echo $wifi_card1; ?> </td>
                                <td> <?php echo $lcd_cable1; ?> </td>
                                <td> <?php echo $battery1; ?> </td>
                                <td> <?php echo $battery_cable1; ?> </td>
                                <td> <?php echo $dvd_rom1; ?> </td>
                                <td> <?php echo $dvd_caddy1; ?> </td>
                                <td> <?php echo $hdd_caddy1; ?> </td>
                                <td> <?php echo $hdd_cable_connector1; ?> </td>
                                <td> <?php echo $c_panel_palm_rest1; ?> </td>
                                <td> <?php echo $mb_base1; ?> </td>
                                <td> <?php echo $hings_cover1; ?> </td>
                                <td> <?php echo $lan_cover1; ?> </td>
                                <td> &nbsp; </td>
                            </tr>
                            <?php } ?>

                            <tr>
                                <th>Summery</th>
                                <td>
                                    <?php echo $keyboard; $summery_keyboard = $keyboard; ?>
                                </td>
                                <td>
                                    <?php echo $speakers; $summery_speakers = $speakers; ?>
                                </td>
                                <td>
                                    <?php echo $camera; $summery_camera = $camera; ?>
                                </td>
                                <td>
                                    <?php echo $bazel; $summery_bazel = $bazel; ?>
                                </td>
                                <td>
                                    <?php echo $mousepad; $summery_mousepad = $mousepad; ?>
                                </td>
                                <td>
                                    <?php echo $mouse_pad_button; $summery_mouse_pad_button = $mouse_pad_button; ?>
                                </td>
                                <td>
                                    <?php echo $camera_cable; $summery_camera_cable = $camera_cable; ?>
                                </td>
                                <td>
                                    <?php echo $back_cover; $summery_back_cover = $back_cover; ?>
                                </td>
                                <td>
                                    <?php echo $wifi_card; $summery_wifi_card = $wifi_card; ?>
                                </td>
                                <td>
                                    <?php echo $lcd_cable; $summery_lcd_cable = $lcd_cable; ?>
                                </td>
                                <td>
                                    <?php echo $battery; $summery_battery = $battery; ?>
                                </td>
                                <td>
                                    <?php echo $battery_cable; $summery_battery_cable = $battery_cable; ?>
                                </td>
                                <td>
                                    <?php echo $dvd_rom; $summery_dvd_rom = $dvd_rom; ?>
                                </td>
                                <td>
                                    <?php echo $dvd_caddy; $summery_dvd_caddy = $dvd_caddy; ?>
                                </td>
                                <td>
                                    <?php echo $hdd_caddy; $summery_hdd_caddy = $hdd_caddy; ?>
                                </td>
                                <td>
                                    <?php echo $hdd_cable_connector; $summery_hdd_cable_connector = $hdd_cable_connector; ?>
                                </td>
                                <td>
                                    <?php echo $c_panel_palm_rest; $summery_c_panel_palm_rest = $c_panel_palm_rest; ?>
                                </td>
                                <td>
                                    <?php echo $mb_base; $summery_mb_base = $mb_base; ?>
                                </td>
                                <td>
                                    <?php echo $hings_cover; $summery_hings_cover = $hings_cover; ?>
                                </td>
                                <td>
                                    <?php echo $lan_cover; $summery_lan_cover = $lan_cover; ?>
                                </td>
                                <td> &nbsp; </td>

                            </tr>
                            <tr>
                                <th>Stock</th>
                                <?php
                                    $query2 = "SELECT part_name, qty FROM part_stock WHERE part_model = '$model' AND part_brand = '$item_brand' ;";
                                    $query_run2 = mysqli_query($connection, $query2);

                                    foreach($query_run2 as $a){
                                        $part_name = $a['part_name'];
                                        $part_qty = $a['qty']; 
                                        if($part_name == 'keyboard'){ $stock_keyboard = $part_qty;}
                                        if($part_name == 'speakers'){ $stock_speakers = $part_qty;}
                                        if($part_name == 'camera'){ $stock_camera = $part_qty; }
                                        if($part_name == 'bazel'){  $stock_bazel = $part_qty;} 
                                        if($part_name == 'mousepad'){ $stock_mousepad = $part_qty;}
                                        if($part_name == 'mouse pad button'){  $stock_mouse_pad_button = $part_qty; } 
                                        if($part_name == 'camera cable'){ $stock_camera_cable = $part_qty;} 
                                        if($part_name == 'back cover'){ $stock_back_cover = $part_qty;}
                                        if($part_name == 'wifi card'){ $stock_wifi_card = $part_qty;}
                                        if($part_name == 'lcd cable'){ $stock_lcd_cable = $part_qty; }
                                        if($part_name == 'battery'){$stock_battery = $part_qty; }
                                        if($part_name == 'battery cable'){ $stock_battery_cable = $part_qty;}
                                        if($part_name == 'dvd rom'){ $stock_dvd_rom = $part_qty;}
                                        if($part_name == 'dvd caddy'){  $stock_dvd_caddy = $part_qty;}
                                        if($part_name == 'hdd caddy'){ $stock_hdd_caddy = $part_qty;}
                                        if($part_name == 'hdd cable connector'){$stock_hdd_cable_connector = $part_qty;}
                                        if($part_name == 'c panel palm rest'){ $stock_c_panel_palm_rest = $part_qty;}
                                        if($part_name == 'mb base'){ $stock_mb_base = $part_qty;}
                                        if($part_name == 'hings cover'){ $stock_hings_cover = $part_qty;}
                                        if($part_name == 'lan cover'){ $stock_lan_cover = $part_qty;}
                                    }
                                                                                
                                ?>
                                <td>

                                    <?php  echo $stock_keyboard;  ?>
                                </td>

                                <td>
                                    <?php
                                        echo $stock_speakers; 
                                        
                                        ?>
                                </td>
                                <td>
                                    <?php echo $stock_camera; ?>
                                </td>
                                <td>
                                    <?php
                                 echo $stock_bazel;  ?>
                                </td>
                                <td>
                                    <?php
                                     echo $stock_mousepad;  ?>
                                </td>
                                <td>
                                    <?php
                                  echo $stock_mouse_pad_button;  ?>
                                </td>
                                <td>
                                    <?php
                                 echo $stock_camera_cable;  ?>
                                </td>
                                <td>
                                    <?php echo $stock_back_cover;  ?>
                                </td>
                                <td>
                                    <?php  echo $stock_wifi_card;  ?>
                                </td>
                                <td>
                                    <?php
                                echo $stock_lcd_cable;  ?>
                                </td>
                                <td>
                                    <?php echo $stock_battery;  ?>
                                </td>
                                <td>
                                    <?php echo $stock_battery_cable;  ?>
                                </td>
                                <td>
                                    <?php  echo $stock_dvd_rom;  ?>
                                </td>
                                <td>
                                    <?php  echo $stock_dvd_caddy;  ?>
                                </td>
                                <td>
                                    <?php  echo $stock_hdd_caddy;  ?>
                                </td>
                                <td>
                                    <?php echo $stock_hdd_cable_connector ; ?>
                                </td>
                                <td>
                                    <?php echo $stock_c_panel_palm_rest;  ?>
                                </td>
                                <td>
                                    <?php  echo $stock_mb_base; ?>
                                </td>
                                <td>
                                    <?php echo $stock_hings_cover;  ?>
                                </td>
                                <td>
                                    <?php echo $stock_lan_cover; ?>
                                </td>
                                <?php  ?>
                            </tr>
                            <?php } ?>
                            <tr>
                                <?php if (isset($_POST['submit'])) {
                                    $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
                                    $speacker = mysqli_real_escape_string($connection, $_POST['speacker']);
                                    $camera = mysqli_real_escape_string($connection, $_POST['camera']);
                                    $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
                                    $lan_cover = mysqli_real_escape_string($connection, $_POST['lan_cover']);
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

                                $query="INSERT INTO `prepared_part`(
                                    `location`,
                                    `model`,
                                    `request_created_date`,
                                    `status`,
                                    `keyboard`,
                                    `speacker`,
                                    `camera`,
                                    `bazel`,
                                    `lan_cover`,
                                    `mousepad`,
                                    `mouse_pad_button`,
                                    `camera_cable`,
                                    `back_cover`,
                                    `wifi_card`,
                                    `lcd_cable`,
                                    `battery`,
                                    `battery_cable`,
                                    `dvd_rom`,
                                    `dvd_caddy`,
                                    `hdd_caddy`,
                                    `hdd_cable_connector`,
                                    c_panel_palm_rest,
                                    `mb_base`,
                                    `hings_cover`
                                )
                                VALUES(
                                    '$location1',
                                    '$model',
                                    '$created_date',
                                    '0',
                                    '$keyboard',
                                    '$speacker',
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
                                echo $query;                 
                                $query_run = mysqli_query($connection, $query);
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $date = $date1->format('Y-m-d H:i:s');

                                $query_update="UPDATE requested_part_from_production SET delivery_date = '$date', status = '0'
                                            WHERE model = '$model' AND created_date = '$created_date' AND emp_id = '$emp_id' AND location = '$location1'
                                ";
                                
                                $query_run_update = mysqli_query($connection, $query_update);
                                $balance_stock_keyboard = number_format((int)$stock_keyboard - (int)$keyboard);
                                $balance_stock_speakers = number_format((int)$stock_speakers - (int)$speakers);
                                $balance_stock_camera =  number_format((int)$stock_camera - (int)$camera);
                                $balance_stock_bazel =  number_format((int)$stock_bazel-  (int)$bazel);
                                $balance_stock_lan_cover =  number_format((int)$stock_lan_cover - (int)$lan_cover);
                                $balance_stock_mousepad =  number_format((int)$stock_mousepad - (int)$mousepad);
                                $balance_stock_mouse_pad_button =  number_format((int)$stock_mouse_pad_button - (int)$mouse_pad_button);
                                $balance_stock_camera_cable =  number_format((int)$stock_camera_cable - (int)$camera_cable);
                                $balance_stock_back_cover =  number_format((int)$stock_back_cover - (int)$back_cover);
                                $balance_stock_wifi_card =  number_format((int)$stock_wifi_card - (int)$wifi_card);
                                $balance_stock_lcd_cable =  number_format((int)$stock_lcd_cable - (int)$lcd_cable);
                                $balance_stock_battery =  number_format((int)$stock_battery - (int)$battery);
                                $balance_stock_battery_cable = number_format((int)$stock_battery_cable - (int)$battery_cable);
                                $balance_stock_dvd_rom =  number_format((int)$stock_dvd_rom - (int)$dvd_rom);
                                $balance_stock_dvd_caddy =  number_format((int)$stock_dvd_caddy - (int)$dvd_caddy);
                                $balance_stock_hdd_caddy =  number_format((int)$stock_hdd_caddy - (int)$hdd_caddy);
                                $balance_stock_hdd_cable_connector =  number_format((int)$stock_hdd_cable_connector - (int)$hdd_cable_connector);
                                $balance_stock_c_panel_palm_rest = number_format((int)$stock_c_panel_palm_rest - (int)$c_panel_palm_rest);
                                $balance_stock_mb_base =  number_format((int)$stock_mb_base - (int)$mb_base);
                                $array = array(
                                    "keyboard" => $balance_stock_keyboard  ,
                                    "speakers" => $balance_stock_speakers  ,
                                    "camera" => $balance_stock_camera  ,
                                    "bazel" => $balance_stock_bazel  ,
                                    "mousepad" => $balance_stock_mousepad  ,
                                    "mouse_pad_button" => $balance_stock_mouse_pad_button  ,
                                    "camera_cable" => $balance_stock_camera_cable  ,
                                    "back_cover" => $balance_stock_back_cover  ,
                                    "wifi_card" => $balance_stock_wifi_card  ,
                                    "lcd_cable" => $balance_stock_lcd_cable  ,
                                    "battery" => $balance_stock_battery  ,
                                    "battery_cable" => $balance_stock_battery_cable  ,
                                    "dvd_rom" => $balance_stock_dvd_rom  ,
                                    "dvd_caddy" => $balance_stock_dvd_caddy  ,
                                    "hdd_caddy" => $balance_stock_hdd_caddy  ,
                                    "hdd_cable_connector" => $balance_stock_hdd_cable_connector  ,
                                    "c_panel_palm_rest" => $balance_stock_c_panel_palm_rest  ,
                                    "mb_base" => $balance_stock_mb_base  ,
                                    // "hings_cover" => $balance_stock_hings_cover  ,
                                    "lan_cover" => $balance_stock_lan_cover  ,
                                );
                                // foreach ($array as $key => $value) {
                                //     $query="UPDATE part_stock SET qty = $value
                                //             WHERE part_model = '$item_model' AND part_brand = '$item_brand' AND part_name = '$key'";                                                
                                //     $query_stock_update = mysqli_query($connection, $query);

                                //                 if($value == 0){
                                //                     $query ="SELECT rack_number, slot_name FROM part_stock
                                //                             WHERE part_model = '$item_model' AND part_brand = '$item_brand' AND part_name = '$key'";
                                //              $query_data_retrive = mysqli_query($connection, $query);
                                //              foreach($query_data_retrive as $d){
                                //                 $slot_name =$d['slot_name'];
                                //                 $rack_number =$d['rack_number'];
                                //                 $query="UPDATE rack_slots SET status = '0' WHERE slot_name = '$slot_name' ";             
                                //                     $query_data_update = mysqli_query($connection, $query); 
                                                    
                                //                     $query="UPDATE rack SET status = '0' WHERE rack_number = '$rack_number' ";             
                                //             $query_data_update = mysqli_query($connection, $query);    
                                //         }    
                                //     }
                                // }
                                header('Location: part_warehouse_leader_dashboard.php');
                            }?>
                                <?php if($prod_t_l == 0){ ?>
                                <form action="" method="POST">
                                    <td>Prepared</td>
                                    <td><input type="text" id="keyboard" name="keyboard"></td>
                                    <td><input type="text" id="speacker" name="speacker"></td>
                                    <td><input type="text" id="camera" name="camera"></td>
                                    <td><input type="text" id="bazel" name="bazel"></td>
                                    <td><input type="text" id="lan_cover" name="lan_cover"></td>
                                    <td><input type="text" id="mousepad" name="mousepad"></td>
                                    <td><input type="text" id="mouse_pad_button" name="mouse_pad_button"></td>
                                    <td><input type="text" id="camera_cable" name="camera_cable"></td>
                                    <td><input type="text" id="back_cover" name="back_cover"></td>
                                    <td><input type="text" id="wifi_card" name="wifi_card"></td>
                                    <td><input type="text" id="lcd_cable" name="lcd_cable"></td>
                                    <td><input type="text" id="battery" name="battery"></td>
                                    <td><input type="text" id="battery_cable" name="battery_cable"></td>
                                    <td><input type="text" id="dvd_rom" name="dvd_rom"></td>
                                    <td><input type="text" id="dvd_caddy" name="dvd_caddy"></td>
                                    <td><input type="text" id="hdd_caddy" name="hdd_caddy"></td>
                                    <td><input type="text" id="hdd_cable_connector" name="hdd_cable_connector"></td>
                                    <td><input type="text" id="c_panel_palm_rest" name="c_panel_palm_rest"></td>
                                    <td><input type="text" id="mb_base" name="mb_base"></td>
                                    <td><input type="text" id="hings_cover" name="hings_cover"></td>

                                    <td><input type="submit" class="btn btn-xs bg-gradient-info" name="submit"
                                            value="update"></td>


                                </form>
                                <?php } ?>
                            </tr>
                            <?php 

                                $need_to_buy_keyboard = $stock_keyboard - $summery_keyboard ;
                                $need_to_buy_speakers = $stock_speakers - $summery_speakers ;
                                $need_to_buy_camera =  $stock_camera - $summery_camera ;
                                $need_to_buy_bazel =  $stock_bazel-$summery_bazel ;
                                $need_to_buy_lan_cover =  $stock_lan_cover - $summery_lan_cover ;
                                $need_to_buy_mousepad =  $stock_mousepad - $summery_mousepad ;
                                $need_to_buy_mouse_pad_button =  $stock_mouse_pad_button - $summery_mouse_pad_button ;
                                $need_to_buy_camera_cable =  $stock_camera_cable - $summery_camera_cable ;
                                $need_to_buy_back_cover =  $stock_back_cover - $summery_back_cover ;
                                $need_to_buy_wifi_card =  $stock_wifi_card - $summery_wifi_card ;
                                $need_to_buy_lcd_cable =  $stock_lcd_cable - $summery_lcd_cable ;
                                $need_to_buy_battery =  $stock_battery - $summery_battery ;
                                $need_to_buy_battery_cable = $stock_battery_cable - $summery_battery_cable ;
                                $need_to_buy_dvd_rom =  $stock_dvd_rom - $summery_dvd_rom ;
                                $need_to_buy_dvd_caddy =  $stock_dvd_caddy - $summery_dvd_caddy ;
                                $need_to_buy_hdd_caddy =  $stock_hdd_caddy - $summery_hdd_caddy ;
                                $need_to_buy_hdd_cable_connector =  $stock_hdd_cable_connector - $summery_hdd_cable_connector ;
                                $need_to_buy_c_panel_palm_rest = $stock_c_panel_palm_rest - $summery_c_panel_palm_rest ;
                                $need_to_buy_mb_base =  $stock_mb_base - $summery_mb_base ;
                                $need_to_buy_hings_cover  =  $stock_hings_cover - $summery_hings_cover ;
                            
                                $keyboard = 0 ;
                                $speacker = 0 ;
                                $camera = 0 ;
                                $bazel = 0 ;
                                $lan_cover = 0 ;
                                $mousepad = 0 ;
                                $mouse_pad_button = 0 ;
                                $camera_cable = 0 ;
                                $back_cover = 0 ;
                                $wifi_card = 0 ;
                                $lcd_cable = 0 ;
                                $battery = 0 ;
                                $battery_cable = 0 ;
                                $dvd_rom = 0 ;
                                $dvd_caddy = 0 ;
                                $hdd_caddy = 0 ;
                                $hdd_cable_connector = 0 ;
                                $c_panel_palm_rest = 0 ;
                                $mb_base = 0 ;
                                $hings_cover = 0;
                                
                                    if (isset($_POST['sorting_submit'])) {

                                    if(!empty($_POST['keyboard'])){
                                    $keyboard = mysqli_real_escape_string($connection, $_POST['keyboard']);
                                    }
                                    if(!empty($_POST['speaker'])){
                                        $speaker = mysqli_real_escape_string($connection, $_POST['speaker']);
                                    }
                                    if(!empty($_POST['camera'])){
                                    $camera = mysqli_real_escape_string($connection, $_POST['camera']);
                                    }
                                    if(!empty($_POST['bazel'])){
                                        $bazel = mysqli_real_escape_string($connection, $_POST['bazel']);
                                    }
                                    if(!empty($_POST['lan_cover'])){
                                        $lan_cover = mysqli_real_escape_string($connection, $_POST['lan_cover']);
                                    }
                                    if(!empty($_POST['mousepad'])){
                                        $mousepad = mysqli_real_escape_string($connection, $_POST['mousepad']);
                                    }
                                    if(!empty($_POST['mouse_pad_button'])){
                                        $mouse_pad_button = mysqli_real_escape_string($connection, $_POST['mouse_pad_button']);
                                    }
                                    if(!empty($_POST['camera_cable'])){
                                        $camera_cable = mysqli_real_escape_string($connection, $_POST['camera_cable']);
                                    }
                                    if(!empty($_POST['back_cover'])){
                                        $back_cover = mysqli_real_escape_string($connection, $_POST['back_cover']);
                                    }
                                    if(!empty($_POST['wifi_card'])){
                                        $wifi_card = mysqli_real_escape_string($connection, $_POST['wifi_card']);
                                    }
                                    if(!empty($_POST['lcd_cable'])){
                                        $lcd_cable = mysqli_real_escape_string($connection, $_POST['lcd_cable']);
                                    }
                                    if(!empty($_POST['battery'])){
                                        $battery = mysqli_real_escape_string($connection, $_POST['battery']);
                                    }
                                    if(!empty($_POST['battery_cable'])){
                                        $battery_cable = mysqli_real_escape_string($connection, $_POST['battery_cable']);
                                    }
                                    if(!empty($_POST['dvd_rom'])){
                                        $dvd_rom = mysqli_real_escape_string($connection, $_POST['dvd_rom']);
                                    }
                                    if(!empty($_POST['dvd_caddy'])){
                                        $dvd_caddy = mysqli_real_escape_string($connection, $_POST['dvd_caddy']);
                                    }
                                    if(!empty($_POST['hdd_caddy'])){
                                        $hdd_caddy = mysqli_real_escape_string($connection, $_POST['hdd_caddy']);
                                    }
                                    if(!empty($_POST['hdd_cable_connector'])){
                                        $hdd_cable_connector = mysqli_real_escape_string($connection, $_POST['hdd_cable_connector']);
                                    }
                                    if(!empty($_POST['c_panel_palm_rest'])){
                                        $c_panel_palm_rest = mysqli_real_escape_string($connection, $_POST['c_panel_palm_rest']);
                                    }
                                    if(!empty($_POST['mb_base'])){
                                        $mb_base = mysqli_real_escape_string($connection, $_POST['mb_base']);
                                    }
                                    if(!empty($_POST['hings_cover'])){
                                        $hings_cover = mysqli_real_escape_string($connection, $_POST['hings_cover']);    
                                }
                                $query_buy ="INSERT INTO `request_parts_from_part_warehouse`(
                                `location`,
                                `model`,
                                `status`,
                                `keyboard`,
                                `speacker`,
                                `camera`,
                                `bazel`,
                                `lan_cover`,
                                `mousepad`,
                                `mouse_pad_button`,
                                `camera_cable`,
                                `back_cover`,
                                `wifi_card`,
                                `lcd_cable`,
                                `battery`,
                                `battery_cable`,
                                `dvd_rom`,
                                `dvd_caddy`,
                                `hdd_caddy`,
                                `hdd_cable_connector`,
                                `mb_base`,
                                `hings_cover`,
                                `c_panel_palm_rest`
                            )
                            VALUES(
                                '$location1',
                                '$model',
                                '1',
                                $keyboard,
                                    $speacker,
                                    $camera,
                                    $bazel,
                                    $lan_cover,
                                    $mousepad,
                                    $mouse_pad_button,
                                    $camera_cable,
                                    $back_cover,
                                    $wifi_card,
                                    $lcd_cable,
                                    $battery,
                                    $battery_cable,
                                    $dvd_rom,
                                    $dvd_caddy,
                                    $hdd_caddy,
                                    $hdd_cable_connector,
                                    $mb_base,
                                    $hings_cover,
                                    $c_panel_palm_rest
                            )";
                            $query_run = mysqli_query($connection, $query_buy);
                            }
                            
                            // part_warehouse_leader_dashboard
                            ?>
                            <tr>
                                <form action="#" method="POST">
                                    <form action="" method="POST">
                                        <td>Need To Buy</td>
                                        <td><?php if($need_to_buy_keyboard <= 0){ echo $need_to_buy_keyboard*-1 ;?>
                                            <input type="hidden" id="keyboard" name="keyboard"
                                                value="<?php echo $need_to_buy_keyboard *-1; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_speakers <= 0){ echo $need_to_buy_speakers*-1 ; ?>
                                            <input type="hidden" id="speaker" name="speaker"
                                                value="<?php echo $need_to_buy_speakers*-1; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_camera <= 0){ echo $need_to_buy_camera*-1 ; ?><input
                                                type="hidden" id="camera" name="camera"
                                                value="<?php echo $need_to_buy_camera; ?>"><?php } ?></td>
                                        <td><?php if($need_to_buy_bazel <= 0){ echo $need_to_buy_bazel*-1 ; ?><input
                                                type="hidden" id="bazel" name="bazel"
                                                value="<?php echo $need_to_buy_bazel; ?>"><?php } ?></td>

                                        <td><?php if($need_to_buy_mousepad <= 0){ echo $need_to_buy_mousepad*-1 ; ?><input
                                                type="hidden" id="mousepad" name="mousepad"
                                                value="<?php echo $need_to_buy_mousepad; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_mouse_pad_button <= 0){ echo $need_to_buy_mouse_pad_button*-1 ;?><input
                                                type="hidden" id="mouse_pad_button" name="mouse_pad_button"
                                                value="<?php echo $need_to_buy_mouse_pad_button; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_camera_cable <= 0){ echo $need_to_buy_camera_cable*-1 ;?><input
                                                type="hidden" id="camera_cable" name="camera_cable"
                                                value="<?php echo $need_to_buy_camera_cable; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_back_cover <= 0){ echo $need_to_buy_back_cover*-1 ;?><input
                                                type="hidden" id="back_cover" name="back_cover"
                                                value="<?php echo $need_to_buy_back_cover; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_wifi_card <= 0){ echo $need_to_buy_wifi_card*-1 ;?><input
                                                type="hidden" id="wifi_card" name="wifi_card"
                                                value="<?php echo $need_to_buy_wifi_card; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_lcd_cable <= 0){ echo $need_to_buy_lcd_cable*-1 ;?>
                                            <input type="hidden" id="lcd_cable" name="lcd_cable"
                                                value="<?php echo $need_to_buy_lcd_cable; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_battery <= 0){ echo $need_to_buy_battery*-1 ;?><input
                                                type="hidden" id="battery" name="battery"
                                                value="<?php echo $need_to_buy_battery; ?>"><?php } ?></td>
                                        <td><?php if($need_to_buy_battery_cable <= 0){ echo $need_to_buy_battery_cable*-1 ;?><input
                                                type="hidden" id="battery_cable" name="battery_cable"
                                                value="<?php echo $need_to_buy_battery_cable; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_dvd_rom <= 0){ echo $need_to_buy_dvd_rom*-1 ;?><input
                                                type="hidden" id="dvd_rom" name="dvd_rom"
                                                value="<?php echo $need_to_buy_dvd_rom; ?>"><?php } ?></td>
                                        <td><?php if($need_to_buy_dvd_caddy <= 0){ echo $need_to_buy_dvd_caddy*-1 ;?><input
                                                type="hidden" id="dvd_caddy" name="dvd_caddy"
                                                value="<?php echo $need_to_buy_dvd_caddy; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_hdd_caddy <= 0){ echo $need_to_buy_hdd_caddy*-1 ;?><input
                                                type="hidden" id="hdd_caddy" name="hdd_caddy"
                                                value="<?php echo $need_to_buy_hdd_caddy; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_hdd_cable_connector <= 0){ echo $need_to_buy_hdd_cable_connector*-1 ;?><input
                                                type="hidden" id="hdd_cable_connector" name="hdd_cable_connector"
                                                value="<?php echo $need_to_buy_hdd_cable_connector; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_c_panel_palm_rest <= 0){ echo $need_to_buy_c_panel_palm_rest*-1 ;?><input
                                                type="hidden" id="c_panel_palm_rest" name="c_panel_palm_rest"
                                                value="<?php echo $need_to_buy_c_panel_palm_rest; ?>"><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_mb_base <= 0){ echo $need_to_buy_mb_base*-1 ;?><input
                                                type="hidden" id="mb_base" name="mb_base"
                                                value="<?php echo $need_to_buy_mb_base; ?>"><?php } ?></td>
                                        <td><?php if($need_to_buy_hings_cover <= 0){ echo $need_to_buy_hings_cover*-1 ;?><?php } ?>
                                        </td>
                                        <td><?php if($need_to_buy_lan_cover <= 0){ echo $need_to_buy_lan_cover*-1 ;?><input
                                                type="hidden" id="lan_cover" name="lan_cover"
                                                value="<?php echo $need_to_buy_lan_cover; ?>"><?php } ?>
                                        </td>
                                        <?php if($prod_t_l == 0){ ?>
                                        <td><button type="submit" name="sorting_submit"
                                                class="btn btn-xs bg-gradient-blue">Submit</button></td>
                                        <?php } ?>
                                    </form>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// if(isset($_POST['submit'])){
//     $query_6 ="UPDATE `requested_part_from_production` SET `status`='0' WHERE rp_id =$rp_id";
//     $query_run = mysqli_query($connection, $query_6);
//     header("Refresh:0");
// }
?>

<style>
[type="text"] {
    width: 37px;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>