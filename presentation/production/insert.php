<?php 

error_reporting (E_ALL ^ E_NOTICE);
// Toggle this to change the setting
define('DEBUG', true);

// You want all errors to be triggered
error_reporting(E_ALL);
 
error_reporting(E_ERROR | E_PARSE);

ob_start();
session_start();
$emp_id = $_SESSION['epf'];  
include_once('../../dataAccess/connection.php');

$data = json_decode(stripslashes($_POST['key']));
$inventory_id=0;
$inventory_id = $_GET['com_id'];
$query_run_get_location1 = "SELECT location FROM users WHERE epf = $emp_id";
$query_run_get_location = mysqli_query($connection, $query_run_get_location1);
$emp_location ;
foreach($query_run_get_location as $d){
    $emp_location = $d['location'];
}
$i=0;
$name;
$scan_id = 0;
$value = 0;
$keyboard;
$keyboard_keys;
$speakers;
$camera;
$bazel;
$mousepad;
$mouse_pad_button;
$camera_cable;
$back_cover;
$wifi_card;
$lcd_cable;
$battery;
$battery_cable;
$dvd_rom;
$dvd_caddy;
$hdd_caddy;
$hdd_cable_connector;
$c_panel_palm_rest;
$mb_base;
$hings_cover;
$lan_cover;
$status = 0;
$fan;
$heat_sink;
$cpu;


  foreach($data as $key=>$value){
    if($i ==0){
        $name = $value;
    }else{
        $scan_id = $value;
    }
     $i++;
  } 
 
    
      if(isset($_POST["key"]))
      if(!empty($scan_id)){  
       
      {
        if($scan_id != 0){ 
        $query_get = "SELECT * FROM combine_check WHERE  inventory_id = '$inventory_id' ORDER BY id DESC Limit 1;"; 
        $query_run_get = mysqli_query($connection, $query_get);


        ///////////////////////////////////////////////////////////////////////////////////////////////////////
        //get combine list related inventory id
        foreach($query_run_get as $data){
            
            $sales_order_id =$data['sales_order_id'];
            $keyboard =$data['keyboard'];
            $keyboard_keys =$data['keyboard_keys'];
            $speakers =$data['speakers'];
            $camera =$data['camera'];
            $bazel =$data['bazel'];
            $mousepad =$data['mousepad'];
            $mouse_pad_button =$data['mouse_pad_button'];
            $camera_cable =$data['camera_cable'];
            $back_cover =$data['back_cover'];
            $wifi_card =$data['wifi_card'];
            $lcd_cable =$data['lcd_cable'];
            $battery =$data['battery'];
            $battery_cable =$data['battery_cable'];
            $dvd_rom =$data['dvd_rom'];
            $dvd_caddy =$data['dvd_caddy'];
            $hdd_caddy =$data['hdd_caddy'];
            $hdd_cable_connector =$data['hdd_cable_connector'];
            $c_panel_palm_rest =$data['c_panel_palm_rest'];
            $mb_base =$data['mb_base'];
            $hings_cover =$data['hings_cover'];
            $lan_cover =$data['lan_cover'];
            $fan =$data['fan'];
            $heat_sink =$data['heat_sink'];
            $cpu =$data['cpu'];
        }
        //check switch data and change value
        if($name == 'keyboard'){
            $keyboard =0;
        }
        if($name == 'keyboard_keys'){
            $keyboard_keys =0;
        }
        if($name == 'speakers'){
            $speakers =0;
        }
        if($name == 'camera'){
            $camera =0;
        }
        if($name == 'bazel'){
            $bazel =0;
        }
        if($name == 'mousepad'){
            $mousepad =0;
        }
        if($name == 'mouse_pad_button'){
            $mouse_pad_button =0;
        }
        if($name == 'camera_cable'){
            $camera_cable =0;
        }
        if($name == 'back_cover'){
            $back_cover =0;
        }
        if($name == 'wifi_card'){
            $wifi_card =0;
        }
        if($name == 'lcd_cable'){
            $lcd_cable =0;
        }
        if($name == 'battery'){
            $battery =0;
        }
        if($name == 'battery_cable'){
            $battery_cable =0;
        }
        if($name == 'dvd_rom'){
            $dvd_rom =0;
        }
        if($name == 'dvd_caddy'){
            $dvd_caddy =0;
        }
        if($name == 'hdd_caddy'){
            $hdd_caddy =0;
        }
        if($name == 'hdd_cable_connector'){
            $hdd_cable_connector =0;
        }
        if($name == 'c_panel_palm_rest'){
            $c_panel_palm_rest =0;
        }
        if($name == 'mb_base'){
            $mb_base =0;
        }
        if($name == 'hings_cover'){
            $hings_cover =0;
        }if($name == 'lan_cover'){
            $lan_cover =0;
        }
        if($name == 'fan'){
            $fan =0;
        }
        if($name == 'heat_sink'){
            $heat_sink =0;
        }
        if($name == 'cpu'){
            $cpu =0;
        }
        //check status
        $status = 0;
        $date;
        if($keyboard == 1 || $keyboard_keys == 1 || $speakers == 1 || $camera ==1 || $bazel ==1 || $mousepad == 1 || $mouse_pad_button == 1 || $camera_cable == 1 || $back_cover ==1 || $wifi_card ==1 ||
     $lcd_cable == 1 || $battery == 1 || $battery_cable == 1 || $dvd_rom ==1 || $dvd_caddy ==1 ||
      $hdd_caddy == 1 || $hdd_cable_connector == 1 || $c_panel_palm_rest == 1 || $mb_base ==1 || $hings_cover ==1 || $lan_cover ==1 ||
      $fan == 1 || $heat_sink == 1 || $cpu == 1){
        $status = 1;
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d');
      }
        // insert new record on inventory id with switch machine id
        $query_new_record = "INSERT INTO combine_check(
            inventory_id,
            emp_id,
            sales_order_id,
            keyboard,
            speakers,
            camera,
            bazel,
            created_time,
            status,
            keyboard_keys,
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
            hings_cover,
            lan_cover,
            fan,
            heat_sink,
            cpu,
            combined_id
        )
        VALUES(
            '$inventory_id',
            '$emp_id',
            '$sales_order_id',
            '$keyboard',
            '$speakers',
            '$camera',
            '$bazel',
            CURRENT_TIMESTAMP,
            '$status',
            '$keyboard_keys',
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
            '$hings_cover',
            '$lan_cover',
            '$fan',
            '$heat_sink',
            '$cpu',
            '$scan_id'
        )"; 
        $query_run = mysqli_query($connection, $query_new_record);
        // insert record with merge machine 
        $check = "SELECT * FROM combine_check WHERE  inventory_id = '$scan_id'";
        $query_run_get = mysqli_query($connection, $check);
        $exist = null;
        foreach($query_run_get as $data){
            $exist = $data['inventory_id'];
            echo $exist;
        }
        if($exist == null){
            $query_new_record = "INSERT INTO combine_check(
                inventory_id,
                emp_id,
                sales_order_id,
                $name,
                created_time,
                status
            )
            VALUES(
                $scan_id,
                $emp_id,
                $sales_order_id,
                1,
                CURRENT_TIMESTAMP,
                1
                
            )"; 
               if(mysqli_query($connection, $query_new_record))  
               {  
                    echo "Inserted Successfully!";  
               }  
               else  
               {  
                    echo 'Not Inserted';  
               } 
            
        }else{
            $query ="UPDATE combine_check SET $name='1', status ='1' WHERE inventory_id = '$scan_id' ";
            $query_run = mysqli_query($connection, $query);
        }
        // $query_new_record = "INSERT INTO combine_check(
        //     inventory_id,
        //     emp_id,
        //     sales_order_id,
        //     $name,
        //     created_time,
        //     status
        // )
        // VALUES(
        //     $scan_id,
        //     $emp_id,
        //     $sales_order_id,
        //     1,
        //     '$date',
        //     1
            
        // )"; 
        //    if(mysqli_query($connection, $query_new_record))  
        //    {  
        //         echo "Inserted Successfully!";  
        //    }  
        //    else  
        //    {  
        //         echo 'Not Inserted';  
        //    } 
        }else{
            echo "Please Scan the Switch Machine ";
        }
        if($status != null){
        $query_update_part = "UPDATE `requested_part_from_production` SET `status`='$status',$name='0' ,switch = '1',switch_id ='$scan_id' WHERE `inventory_id`='$inventory_id';";
       
        $query_run = mysqli_query($connection, $query_update_part);
        }
        $query_select = "SELECT brand,model,generation,sales_order_id FROM warehouse_information_sheet WHERE inventory_id = $inventory_id;";
        
        $query_run1 = mysqli_query($connection, $query_select);
        
        $brand;
        $model;
        $generation;
        $sales_order_id;
        
        foreach($query_run1 as $d){
            $brand = $d['brand'];
            $model =$d['model'];
            $generation = $d['generation'];
            $sales_order_id =$d['sales_order_id'];
        }
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $query_inventory_record = "INSERT INTO requested_part_from_production(
            brand,
            model,
            generation,
            sales_order_id,
            created_date,
            inventory_id,
            emp_id,
            location,
            $name,
            status
        )
        VALUES(
            '$brand',
            '$model',
            $generation,
            $sales_order_id,
            '$date',
            $scan_id,
            $emp_id,
            '$emp_location',
            1,
            1
            
        )"; 
        
        $query_run = mysqli_query($connection, $query_inventory_record);
        }
    }
  
 ?>