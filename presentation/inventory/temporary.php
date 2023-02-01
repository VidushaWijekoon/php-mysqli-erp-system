<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<form method='POST'>
    <div class=" row">
        <label class="col-sm-4 col-form-label">ALSAKB ID</label>
        <div class="col-sm-4">
            <input class="w-200" style="color:black !important" type="text" name="search_value"
                placeholder="Enter ALSAKB Number here">
        </div>
    </div>
    <div class=" row">
        <label class="col-sm-4 col-form-label">MFG</label>
        <div class="col-sm-4">
            <input class="w-200" style="color:black !important" type="text" name="mfg"
                placeholder="Enter ALSAKB Number here">
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-default bg-gradient-success btn-next d-none">
        </button>
    </div>
</form>
<?php
 $search_value=0;
if (isset($_POST['submit'])) {
    $search_value = $_POST['search_value'];
    $mfg = $_POST['mfg'];
    $query = "UPDATE warehouse_information_sheet SET mfg ='$mfg' WHERE inventory_id='$search_value'";
    $query_run = mysqli_query($connection, $query);
    // header('Location: temporary.php');
}

?>
<div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto ">
    <div class="card mt-3">
        <div class="card-header" style="font-size:18px">

        </div>
        <div class="card-body">
            <div class="row">
                <?php
$rowcount = 0;
$query = "SELECT * FROM warehouse_information_sheet WHERE inventory_id='$search_value' ";
$query_run = mysqli_query($connection, $query);
$rowcount = mysqli_num_rows($query_run);
if ($search_value !=0){
    ?>
                <table id="tblexportData" class="table table-striped">
                    <thead>

                        <th>ALSAKB QR CODE</th>
                        <th>MFG</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Core</th>
                        <th>Processor</th>
                        <th>Generation</th>
                        <th>Speed</th>
                        <th>Screen Size</th>
                        <th>Screen Type</th>
                        <th>Optical</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                    </thead>
                    <tbody>
                        <?php
foreach ($query_run as $data) {
        $inventory_id = $data['inventory_id'];
        $mfg = $data['mfg'];
        $brand = $data['brand'];
        $model = $data['model'];
        $core = $data['core'];
        $processor = $data['processor'];
        $generation = $data['generation'];
        $speed = $data['speed'];
        $lcd_size = $data['lcd_size'];
        $touch_or_non_touch = $data['touch_or_non_touch'];
        $dvd = $data['dvd'];
        $create_date = $data['create_date'];
        $create_by_inventory_id = $data['create_by_inventory_id'];
        ?><tr>
                            <td><?php echo $inventory_id; ?></td>
                            <td><?php echo $mfg ?></td>
                            <td><?php echo $brand; ?></td>
                            <td><?php echo $model ?></td>
                            <td><?php echo $core; ?></td>
                            <td><?php echo $processor ?></td>
                            <td><?php echo $generation; ?></td>
                            <td><?php echo $speed ?></td>
                            <td><?php echo $lcd_size; ?></td>
                            <td><?php echo $touch_or_non_touch ?></td>
                            <td><?php echo $dvd; ?></td>
                            <td><?php echo $create_date ?></td>
                            <td><?php echo $create_by_inventory_id ?></td>
                        </tr>
                        <?php
}
    ?>
                    </tbody>
                </table>
                <?php }?>
            </div>
        </div>
    </div>
</div>
