<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];


if($role_id == 1 && $department == 11 || $role_id == 2 && $department == 18 || $role_id == 4 && $department == 20){
  
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');

clearstatcache();}
$device = NULL;
$brand= NULL;
$generation = NULL;
$model = NULL;
$quantity = NULL;
$location = NULL;
$capacity = NULL;
$rack_number = NULL;
$slot_name = NULL; 
$scan_id = $_GET['scan_id'];
$location = explode("_",$scan_id);
$rack_number = $location[0];
$slot_number = $location[1];

if(isset($_POST['submit'])){    

        $device = mysqli_real_escape_string($connection, $_POST['device']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
        $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
        $rack_number = mysqli_real_escape_string($connection, $_POST['rack_number']);
        $slot_name = mysqli_real_escape_string($connection, $_POST['slot_name']);
        $_POST = "";
        $_SESSION['device'] = $device;
        $_SESSION['slot_name'] = $slot_name;
        $_SESSION['model'] = $model;
        $_SESSION['rack_number'] = $rack_number;  
        ////////////////////////////////////////////////////////////////////////////////////////
        // $tempDir = 'temp/'; 
        // $email = $rack_number."_".$slot_name;
        // $filename = $email;
        // $codeContents = $email; 
        // QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);      


        
        ///////////////////////////////////////////////////////////////////////////////////////////////////
        $query = "INSERT INTO part_stock(part_name, part_model, part_brand, part_gen, capacity, qty, rack_number, slot_name) 
                VALUES ('$device', '$model', '$brand', '$generation', '$capacity', '$quantity','$rack_number', '$slot_name')";
        echo $query;
        $query_run = mysqli_query($connection, $query);
        $last_id = $connection->insert_id;
        $_SESSION['last_id'] = $last_id;    
        // header("location: ./indexnew.php?last_id={$last_id}"); 
        header("Location: ./part_stock_dashboard.php");

}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./part_stock_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                    <?php if (!empty($errors)) { display_errors($errors); } ?>
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Create Part Information Sheet</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device Type</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="device" style="border-radius: 5px;" required>
                                        <option selected>--Select Item Type--</option>
                                        <?php
                                            $query = "SELECT part_name FROM part_list ORDER BY part_name ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                                while ($devices = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $devices["part_name"]; ?>">
                                            <?php echo strtoupper($devices["part_name"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="brand" style="border-radius: 5px;" required>
                                        <option selected>--Select Brand--</option>
                                        <?php
                                            $query = "SELECT * FROM brand ORDER BY brand ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                                while ($brands = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $brands["brand"]; ?>">
                                            <?php echo strtoupper($brands["brand"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Generation</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" placeholder="Generation"
                                        name="generation">
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
                                <label class="col-sm-3 col-form-label">Capacity</label>
                                <div class="col-sm-8">
                                    <input type="number" min="1" class="form-control" placeholder="Capacity"
                                        name="capacity">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Rack</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="rack_number" style="border-radius: 5px;" required>
                                        <?php if($rack_number != null){ ?>
                                        <option selected value="<?php echo $rack_number ?>"><?php echo $rack_number ?>
                                        </option>
                                        <?php  }else{ ?>
                                        <option selected>--Select Rack--</option>
                                        <?php
                                            $query = "SELECT  rack_number FROM rack WHERE status = 0 ";
                                            $query_rack = mysqli_query($connection, $query);
                                                while ($rack_id = mysqli_fetch_array($query_rack, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $rack_id["rack_number"]; ?>">
                                            <?php echo strtoupper($rack_id["rack_number"]); ?>
                                        </option>
                                        <?php endwhile; }?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Slot</label>
                                <div class="col-sm-8">
                                    <select class="w-100" name="slot_name" style="border-radius: 5px;" required>

                                        <?php if($slot_number != null){ ?>
                                        <option selected value="<?php echo $slot_number ?>"><?php echo $slot_number ?>
                                        </option>
                                        <?php  }else{ ?>
                                        <option selected>--Select Rack--</option>
                                        <?php 
                                            $querys = "SELECT  slot_name FROM rack_slots WHERE status = 0 ";
                                            $query_slot = mysqli_query($connection, $querys);
                                                while ($slot_id = mysqli_fetch_array($query_slot, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $slot_id["slot_name"]; ?>">
                                            <?php echo strtoupper($slot_id["slot_name"]); ?>
                                        </option>
                                        <?php endwhile; }?>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Submit</button>


                        </fieldset>
                    </form>
                </div>
                <!--/col-->
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>