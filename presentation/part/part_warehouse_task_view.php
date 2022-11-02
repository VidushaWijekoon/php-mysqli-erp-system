<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

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

                    <table id="example1" class="table table-bordered table-hover">
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
                            $emp_location ='';
                            foreach($query_run2 as $b){
                                $emp_location = $b['location'];
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
                            <?php 
                                    }
                                
                            ?>
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
                        created_date = '$created_date' AND
                    STATUS
                        = 1 AND emp_id = '$emp_id' AND model = '$model';";
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

                                <th>
                                    <?php
                                    echo " Keyboard </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " speakers </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " camera </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Bazel </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Pouse Pad </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Mouse Pad Button </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Camera Cable  </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Back Cover </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " WIFI Card </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " LCD Cable </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Battery </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Battery Cable </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " DVD ROM </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " DVD Caddy </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " HDD Caddy </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " HDD Cable Connetor </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " C Panel / Palm Rest </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " D / MB Base </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " Hings Cover </br>";
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo " LAN Cover </br>";
                                    ?>
                                </th>
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
                                <td><?php echo $inventory_id1 ?></th>

                                <td>
                                    <?php
                                    echo $keyboard1 ;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $speakers1 ;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $camera1; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $bazel1;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $mousepad1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $mouse_pad_button1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $camera_cable1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $back_cover1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $wifi_card1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $lcd_cable1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $battery1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $battery_cable1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $dvd_rom1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $dvd_caddy1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $hdd_caddy1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $hdd_cable_connector1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $c_panel_palm_rest1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $mb_base1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $hings_cover1;
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    echo $lan_cover1;
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info mt-2"
                                        href="./part_issue_form.php?id=<?php echo $rp_id ?>">
                                        Done
                                    </a>
                                </td>

                            </tr>
                            <?php
                            }
                            ?>


                            <tr>
                                <th>summery</th>
                                <td>
                                    <?php
                                    echo $keyboard;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $speakers;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $camera;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $bazel;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $mousepad;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $mouse_pad_button;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $camera_cable;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $back_cover;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $wifi_card;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $lcd_cable;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $battery;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $battery_cable;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $dvd_rom;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $dvd_caddy;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $hdd_caddy;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $hdd_cable_connector;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $c_panel_palm_rest;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $mb_base;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $hings_cover;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $lan_cover;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <?php
                            $query2 = "SELECT * FROM `part_stock`WHERE part_model='$model' AND part_brand = '$item_brand' AND part_gen = '$item_generation' ;";
                            echo $query2;
                            $query_run2 = mysqli_query($connection, $query2);
                           
                            foreach($query_run2 as $a){
                                $part_name = $a['part_name'];
                                $part_qty = $a['qty'];
                           
                                ?>

                                <?php 
                                    if($part_name == 'keyboard'){
                                        
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'speakers'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                }
                                if($part_name == 'camera'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                }
                                    if($part_name == 'bazel'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                }
                                if($part_name == 'mousepad'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                }
                                    if($part_name == 'mouse_pad_button'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'camera_cable'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'back_cover'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'wifi_card'){
                                        ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'lcd_cable'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'battery'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                }
                                    if($part_name == 'battery_cable'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'dvd_rom'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'dvd_caddy'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'hdd_caddy'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'hdd_cable_connector'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'c_panel_palm_rest'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'mb_base'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'hings_cover'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                    if($part_name == 'lan_cover'){
                                    ?>
                                <td>
                                    <?php
                                    echo $part_qty;
                                    ?>
                                </td>
                                <?php
                                    }
                                }?>
                            </tr>
                            <?php 
                                    }
                                
                            ?>
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

<?php include_once('../includes/footer.php'); 
 ?>