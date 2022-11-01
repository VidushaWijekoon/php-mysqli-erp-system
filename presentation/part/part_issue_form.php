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

    
$item_brand=null;
$item_model =null;
$item_generation =null;
$sales_order_id =null;
$inventory_id =null;
$date =null;
$emp_id =null;
$location =null;
$keyboard =null;
$speakers =null;
$camera =null;
$bazel =null;
$lan_cover =null;
$mousepad =null;
$mouse_pad_button =null;
$camera_cable =null;
$back_cover =null;
$wifi_card =null;
$lcd_cable =null;
$battery =null;
$battery_cable =null;
$dvd_rom =null;
$dvd_caddy =null;
$hdd_caddy =null;
$hdd_cable_connector =null;
$c_panel_palm_rest =null;
$mb_base =null;
$hings_cover  =null;
$rp_id =null;$item_brand=null;
$item_model =null;
$item_generation =null;
$sales_order_id =null;
$inventory_id =null;
$date =null;
$emp_id =null;
$location =null;
$keyboard =null;
$speakers =null;
$camera =null;
$bazel =null;
$lan_cover =null;
$mousepad =null;
$mouse_pad_button =null;
$camera_cable =null;
$back_cover =null;
$wifi_card =null;
$lcd_cable =null;
$battery =null;
$battery_cable =null;
$dvd_rom =null;
$dvd_caddy =null;
$hdd_caddy =null;
$hdd_cable_connector =null;
$c_panel_palm_rest =null;
$mb_base =null;
$hings_cover  =null;

if(empty($_SESSION['rp_id'])){
    $rp_id =null;
}else{
$rp_id =$_SESSION['rp_id'];
}
?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i> Part Issue Form
        </h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <h5 class="text-uppercase m-0 p-0">Parts Request</h5>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sales Order</th>
                                <th>Machine ID</th>
                                <th>Emp ID</th>
                                <th>Location</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Generation</th>
                                <th>Item List</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <?php
                            $query = "SELECT * FROM `requested_part_from_production`WHERE rp_id=$rp_id;";
                            $query_run = mysqli_query($connection, $query);
                            foreach($query_run as $a){
                                $item_brand = $a['brand'];
                                $item_model = $a['model'];
                                $item_generation = $a['generation'];
                                $sales_order_id = $a['sales_order_id'];
                                $inventory_id = $a['inventory_id'];
                                $emp_id =$a['emp_id'];
                                $location =$a['location'];
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
                                $rp_id = $a['rp_id'];
                                ?>
                            <tr>
                                <td><?php echo $sales_order_id ?></td>
                                <td><?php echo $inventory_id ?></td>
                                <td><?php echo $emp_id ?></td>
                                <td><?php echo "T1 -".$emp_id ?></td>
                                <td><?php echo $item_brand ?></td>
                                <td><?php echo $item_model ?></td>
                                <td><?php echo $item_generation ?></td>
                                <td><?php 
                                $count =0;
                                if($keyboard==1){
                                    $count++;
                                    echo $count .": Keyboard </br>";
                                }
                                // if($keys==1){
                                //     $count++;
                                //     echo $count .": Keys </br>";
                                // }
                                if($speakers==1){
                                    $count++;
                                    echo $count .": speakers </br>";
                                }if($camera==1){
                                    $count++;
                                    echo $count .": camera </br>";
                                }if($bazel==1){
                                    $count++;
                                    echo $count .": Bazel </br>";
                                }if($mousepad==1){
                                    $count++;
                                    echo $count .": Pouse Pad </br>";
                                }if($mouse_pad_button==1){
                                    $count++;
                                    echo $count .": Mouse Pad Button </br>";
                                }if($camera_cable==1){
                                    $count++;
                                    echo $count .": Camera Cable  </br>";
                                }if($back_cover==1){
                                    $count++;
                                    echo $count .": Back Cover </br>";
                                }if($wifi_card==1){
                                    $count++;
                                    echo $count .": WIFI Card </br>";
                                }if($lcd_cable==1){
                                    $count++;
                                    echo $count .": LCD Cable </br>";
                                }if($battery==1){
                                    $count++;
                                    echo $count .": Battery </br>";
                                }if($battery_cable==1){
                                    $count++;
                                    echo $count .": Battery Cable </br>";
                                }if($dvd_rom==1){
                                    $count++;
                                    echo $count .": DVD ROM </br>";
                                }if($dvd_caddy==1){
                                    $count++;
                                    echo $count .": DVD Caddy </br>";
                                }if($hdd_caddy==1){
                                    $count++;
                                    echo $count .": HDD Caddy </br>";
                                }if($hdd_cable_connector==1){
                                    $count++;
                                    echo $count .": HDD Cable Connetor </br>";
                                }if($c_panel_palm_rest==1){
                                    $count++;
                                    echo $count .": C Panel / Palm Rest </br>";
                                }if($mb_base==1){
                                    $count++;
                                    echo $count .": D / MB Base </br>";
                                }if($hings_cover==1){
                                    $count++;
                                    echo $count .": Hings Cover </br>";
                                }if($lan_cover==1){
                                    $count++;
                                    echo $count .": LAN Cover </br>";
                                }?>
                                    <a class="btn btn-sm btn-info mt-2" href="./part_issue_form.php">
                                        Issue
                                    </a>

                                </td>
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

<?php include_once('../includes/footer.php'); ?>