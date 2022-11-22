<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 20)){
 
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

$rp_id =$_GET['id'];
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
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header bg-secondary text-uppercase">
                    <i class="fa-solid fa-hand-holding-medical bg-warning fa-2x p-2"></i>
                    Issue Form
                </div>
                <form action="" method="POST">
                    <div class="row m-1">
                        <div class="col-md-10 mx-auto">
                            <fieldset class="mt-2 mb-2">
                                <legend>Part Information</legend>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Device Type</th>
                                            <th>Inventory ID</th>
                                            <th style="width: 150px;">QTY</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
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
                                         
                                            $count =0;
                                            if($keyboard==1){
                                                $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Keyboard</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php  } 
                                   
                                            // if($keys==1){
                                            //     $count++;
                                            //     echo $count .": Keys </br>";
                                            // }
                                        if($speakers==1){
                                            $count++;
                                            ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Speakers</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php }
                                            if($camera==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Camera</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php }
                                        if($bazel==1){
                                            $count++;
                                            ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Bazel</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php }
                                            if($mousepad==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Pouse Pad</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php }
                                            if($mouse_pad_button==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Mouse Pad Button</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php }
                                            if($camera_cable==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Camera Cable</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($back_cover==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Back Cover</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($wifi_card==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>WIFI Card</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($lcd_cable==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>LCD Cable</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($battery==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Battery</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($battery_cable==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Battery Cable</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($dvd_rom==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>DVD ROM</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($dvd_caddy==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>DVD Caddy</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($hdd_caddy==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>HDD Caddy</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($hdd_cable_connector==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>HDD Cable Connetor</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($c_panel_palm_rest==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>C Panel / Palm Rest</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($mb_base==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>D / MB Base</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($hings_cover==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>Hings Cover</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php
                                            }if($lan_cover==1){
                                                $count++;
                                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>LAN Cover</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                        </tr>
                                        <?php } } ?>

                                    </tbody>
                                </table>
                                <a class="btn btn-sm btn-info mt-2 "
                                    href="./part_issue_form.php?id=<?php echo $rp_id ?>">
                                    Issue
                                </a>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>