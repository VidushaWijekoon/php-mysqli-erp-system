<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
require_once("phpqrcode/qrlib.php");
// require_once "warehouese_qr_print.php";
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){

$errors = array();

$device = "";
$brand = "";
$processor = "";
$core = "";
$generation = "";
$model = "";
$location = "";
$quantity = "";
$sales_order_id = "";
$user_id = $_SESSION['username'];
$int_qty = 0;

$query_last_id = "SELECT inventory_id FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1; ";
 $result_last_id = mysqli_query($connection, $query_last_id);
 foreach($result_last_id as $data){
    $_SESSION['last_id'] =  $data['inventory_id'] ;
 }
for ($i = 0; $i <= $int_qty; $i++) {

    if (isset($_POST["submit"])) {
        $device = $_POST["device"];
        $brand = $_POST["brand"];
        $processor = $_POST["processor"];
        $core = $_POST["core"];
        $generation = $_POST["generation"];
        $model = $_POST["model"];
        $location = $_POST["location"];
        $quantity = $_POST["quantity"];
        $int_qty = (int)$quantity - 1;

         // checking required fields
        $req_fields = array('device', 'brand', 'processor', 'core', 'quantity', 'generation', 'model', 'location');
        $errors = array_merge($errors, check_req_fields($req_fields));

        if (empty($errors)) {
            $device = mysqli_real_escape_string($connection, $_POST['device']);
            $brand = mysqli_real_escape_string($connection, $_POST['brand']);
            $processor = mysqli_real_escape_string($connection, $_POST['processor']);
            $core = mysqli_real_escape_string($connection, $_POST['core']);
            $generation = mysqli_real_escape_string($connection, $_POST['generation']);
            $model = mysqli_real_escape_string($connection, $_POST['model']);
            $location = mysqli_real_escape_string($connection, $_POST['location']);
            $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
        }
       
        $PNG_TEMP_DIR = 'temp/';
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);
        $filename = $PNG_TEMP_DIR  . uniqid() . '.png';
        $last_id = $connection->insert_id;

        $sql = strtolower("INSERT INTO warehouse_information_sheet  (device, brand, processor, core, generation, model, qr_image, location, send_to_production, create_by_inventory_id, send_time_to_production, sales_order_id) VALUES 
					('$device', '$brand', '$processor', '$core', '$generation', '$model', '$filename', '$location', 0, '$user_id', 0, 0)");
        // echo $sql; 
        $result_1 = mysqli_query($connection, $sql);


        $query = "SELECT inventory_id FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1";
                                            $query_run = mysqli_query($connection, $query);

                                            $print_data = mysqli_fetch_row($query_run);

        $tempDir = 'temp/'; 
        $email = $print_data[0];
        $filename = $email;
        echo $filename;
        $codeContents = $email; 
        QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);      


        
        //////////////////
        header("location: ./indexnew.php?last_id={$last_id}");       
             
                                    


        // if (mysqli_multi_query($connection, $sql)) {
        //     // $query = "SELECT inventory_id from warehouse_information_sheet";
        //     // $result = mysqli_query($connection, $query);

        //     // $query = "SELECT inventory_id,brand,model,core,location,generation FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1";
        //     // $query_run = mysqli_query($connection, $query);

        //     // $print_data = mysqli_fetch_row($query_run);
        //     // $brand;
        //     // $model;
        //     // $core;
        //     // $location;
        //     // $generation;
        //     // $i =0;

        //     foreach ($result as $result) {
        //         // $i++;
        //         // $codeString = $print_data[0];
        //         // $brand = $print_data[1];
        //         // $model = $print_data[2];
        //         // $core = $print_data[3];
        //         // $location = $print_data[4];
        //         // $filename = $PNG_TEMP_DIR  .$codeString . '.png';
        //         //  QRcode::png($codeString, $filename, QR_ECLEVEL_Q, 12, 1);
                
        //         // file_get_contents("warehouese_qr_print.php");
        //     }
        //     if($codeString != 0){
        //     
     
        // getting current Date Time OOP way
        $currentDateTime = new \DateTime();

        //set timeZone
        $currentDateTime->setTimezone(new \DateTimeZone('Asia/Dubai'));
        $dateTime = $currentDateTime->format('j-m-Y H:i:s');
    }
}


?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da; "></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                    <?php if (!empty($errors)) { display_errors($errors); } ?>
                    <form method="POST">
                        <fieldset>
                            <legend>Create Warehouse Information Sheet</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device</label>
                                <div class="col-sm-8">
                                    <select name="device" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Device Type--</option>
                                        <?php
                                            $query = "SELECT * FROM device ORDER BY device ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($devices = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $devices["device"]; ?>">
                                            <?php echo strtoupper($devices["device"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8">
                                    <select name="brand" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Brand--</option>
                                        <?php
                                            $query = "SELECT * FROM brand ORDER BY brand ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($brands = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $brands["brand"]; ?>">
                                            <?php echo strtoupper($brands["brand"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Processor</label>
                                <div class="col-sm-8">
                                    <select name="processor" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Processor--</option>
                                        <?php
                                            $query = "SELECT * FROM processor ";
                                            $result = mysqli_query($connection, $query);

                                            while ($processors = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $processors["processor"]; ?>">
                                            <?php echo strtoupper($processors["processor"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Core</label>
                                <div class="col-sm-8">
                                    <select name="core" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Type--</option>
                                        <?php
                                            $query = "SELECT * FROM core ORDER BY core";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($types = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $types["core"]; ?>">
                                            <?php echo strtoupper($types["core"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8">
                                    <select name="generation" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Generation--</option>
                                        <?php
                                            $query = "SELECT * FROM generation ORDER BY generation_id";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($generations = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $generations["generation"]; ?>">
                                            <?php echo strtoupper($generations["generation"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Model" name="model">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" min="1" class="form-control" placeholder="Quantity"
                                        name="quantity">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-8">
                                    <select name="location" class="info_select" style="border-radius: 5px;" required>
                                        <option selected>--Select Location--</option>
                                        <?php
                                            $query = "SELECT * FROM location ORDER BY location_id";
                                            $result = mysqli_query($connection, $query);

                                            while ($locations = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $locations["location"]; ?>">
                                            <?php echo strtoupper($locations["location"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Inventory Number</label>
                                <div class="col-sm-8">
                                    <?php

                                            $query = "SELECT inventory_id FROM warehouse_information_sheet ORDER BY inventory_id DESC LIMIT 1";
                                            $query_run = mysqli_query($connection, $query);

                                            $print_data = mysqli_fetch_row($query_run)

                                            ?>
                                    <input class="form-control" type="hidden" readonly <?php echo 'value="ALSAKB-' . $print_data[0] . '"';
                                         ?> style="margin: 0; font-size: 12px; border: 1px solid black; height: 25px;">

                                    <?php echo "<div class='mt-1 inventory'>ALSAKB-".$print_data[0]."</div>";
                                         ?>

                                </div>
                            </div>

                            <button type="submit" name="submit" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Genarate QR</button>


                        </fieldset>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
    </div>

</div>
<?php
$_SESSION['quantity'] = $quantity ;
$_SESSION['brand'] = $brand ;
$_SESSION['model'] = $model ;
$_SESSION['generation'] = $generation ;
$_SESSION['core'] = $core ;
$_SESSION['location'] = $location ;
// echo "test here".$quantity 
?>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>