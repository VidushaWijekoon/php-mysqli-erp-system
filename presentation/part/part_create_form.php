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

    clearstatcache();}
$device ="";
$brand="";
$generation ="";
$model ="";
$quantity ="";
$location="";
$capacity ="";
$rack_number ="";
$slot_name =""; 
if(isset($_POST['submit'])){

    

        $device = mysqli_real_escape_string($connection, $_POST['device']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $generation = mysqli_real_escape_string($connection, $_POST['generation']);
        $model = mysqli_real_escape_string($connection, $_POST['model']);
        $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
        $rack_number = mysqli_real_escape_string($connection, $_POST['rack_number']);
        $slot_name = mysqli_real_escape_string($connection, $_POST['slot_name']);
        $_POST = "";
        $_SESSION['device'] = $device;
        $_SESSION['slot_name'] = $slot_name;
        $_SESSION['modal'] = $modal;
        $_SESSION['rack_number'] = $rack_number;
        
        
        $query = "INSERT INTO `part_stock`(
            `part_name`,
            `part_model`,
            `part_brand`,
            `part_gen`,
            `capacity`,
            `qty`,
            rack_number,
            slot_name

        )
        VALUES(
            '$device',
            '$model',
            '$brand',
            '$generation',
            '$capacity',
            '$quantity',
            '$rack_number',
            '$slot_name'
        )";
        $query_run = mysqli_query($connection, $query);
        $last_id = $connection->insert_id;
        $_SESSION['last_id'] = $last_id;
        header("location: ./indexnew.php?last_id={$last_id}"); 

}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="#">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-header">
                    <?php if (!empty($errors)) { display_errors($errors); } ?>
                    <form action="" method="POST">
                        <fieldset>
                            <legend>Create Part Information Sheet</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Device Type</label>
                                <div class="col-sm-8">
                                    <select name="device" style="border-radius: 5px;" required>
                                        <option selected>--Select Item Type--</option>
                                        <?php
                                            $query = "SELECT part_name FROM part_list ORDER BY part_name ASC";
                                            $all_devices = mysqli_query($connection, $query);

                                            while ($devices = mysqli_fetch_array($all_devices, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $devices["part_name"]; ?>">
                                            <?php echo strtoupper($devices["part_name"]); ?>
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
                                    <select name="brand" style="border-radius: 5px;" required>
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
                                    <input type="number" class="form-control" placeholder="Quantity" name="quantity">
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Capacity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" placeholder="Capacity" name="capacity">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Rack</label>
                                <div class="col-sm-8">
                                    <?php    
                                            
                                            ?>
                                    <select name="rack_number" style="border-radius: 5px;" required>
                                        <option selected>--Select Rack--</option>
                                        <?php
                                            $query = "SELECT  rack_number FROM rack WHERE status = 0 ";
                                            $query_rack = mysqli_query($connection, $query);
                                            while ($rack_id = mysqli_fetch_array($query_rack, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $rack_id["rack_number"]; ?>">
                                            <?php echo strtoupper($rack_id["rack_number"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Slot</label>
                                <div class="col-sm-8">
                                    <?php    
                                                
                                            ?>
                                    <select name="slot_name" style="border-radius: 5px;" required>
                                        <option selected>--Select slot--</option>
                                        <?php
                                            $querys = "SELECT  slot_name FROM rack_slots WHERE status = 0 ";
                                            $query_slot = mysqli_query($connection, $querys);
                                            while ($slot_id = mysqli_fetch_array($query_slot, MYSQLI_ASSOC)) :;
                                            ?>
                                        <option value="<?php echo $slot_id["slot_name"]; ?>">
                                            <?php echo strtoupper($slot_id["slot_name"]); ?>
                                        </option>
                                        <?php
                                            endwhile;
                                            ?>
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
<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

textarea {
    text-transform: uppercase;
}

select,
[type="number"],
[type="text"] {
    width: 100%;
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
}

.custom-select {
    font-size: 12px;
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}