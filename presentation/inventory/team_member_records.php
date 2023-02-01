<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
$test_id = 0;
$test_name = 0;
if (empty($_GET['user_id'])) {} else {
    $test_id = $_GET['user_id'];
    $test_name = $_GET['username'];
    if ($test_id != 0) {
        echo "<script>
    $(window).load(function() {
        $('#myModal69').modal('show');
    });
    </script>";
    }}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto ">
    <div class="card mt-3">
        <div class="card-header" style="font-size:18px">

            <form method='POST'>
                <div class=" row">
                    <label class="col-sm-4 col-form-label">Search ALSAKB NUMBER</label>
                    <div class="col-sm-4">
                        <input class="w-200" style="color:black !important" type="text" name="search_value"
                            placeholder="Enter ALSAKB Number here">
                    </div>
                    <button type="submit" name="submit" id="submit"
                        class="btn btn-default bg-gradient-success btn-next d-none">
                    </button>
                </div>
            </form>
            <?php
$search_value = 0;
if (isset($_POST['submit'])) {
    $search_value = $_POST['search_value'];
}
?>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
$rowcount = 0;
$query = "SELECT * FROM warehouse_information_sheet WHERE inventory_id='$search_value' ";
$query_run = mysqli_query($connection, $query);
$rowcount = mysqli_num_rows($query_run);
if ($rowcount == 0) {} else {
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
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto ">
    <div class="card mt-3">
        <div class="card-header" style="font-size:18px">
            Team Member Summery
        </div>
        <div class="card-body">
            <div class="row">
                <table id="tblexportData" class="table table-striped">
                    <thead>
                        <th>Member User ID</th>
                        <th>Target</th>
                        <th>Completed QTY</th>
                    </thead>
                    <tbody>
                        <?php
$query = "SELECT username,user_id FROM users WHERE department='2' AND role='4' ";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $username = $data['username'];
    $user_id = $data['user_id'];
    ?>
                        <tr>
                            <td><a
                                    href="team_member_records.php?user_id=<?php echo $user_id ?>&username=<?php echo $username ?>"><?php echo $username ?></a>
                            </td>
                            <td><?php echo "500"; ?></td>
                            <td>
                            <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d 00:00:00');
    $date2 = $date1->format('Y-m-d 23:59:59');
    $query1 = "SELECT COUNT(inventory_id) as count FROM warehouse_information_sheet WHERE create_by_inventory_id='$username' AND create_date between '$date'AND '$date2' ";
    $query_run1 = mysqli_query($connection, $query1);
    if (empty($query_run1)) {} else {
        foreach ($query_run1 as $a) {
            echo $a['count'];
        }}
    ?></td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="myModal69" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12" style=" font-size: 30px;">
                Scaned Details
            </div>
            <div>
                <div class='row'>
                    <div class="col col-lg-12 justify-content-center m-auto text-uppercase">
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
                            </thead>
                            <tbody>
                                <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d 00:00:00');
$date2 = $date1->format('Y-m-d 23:59:59');
$query = "SELECT * FROM warehouse_information_sheet WHERE create_by_inventory_id='$test_name' AND create_date          between '$date'AND '$date2'";
$query_run = mysqli_query($connection, $query);
if (empty($query_run)) {} else {
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
                                </tr>
                                <?php
}
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <button data-dismiss="modal" class="close " type="button" area-label="close">
                <div class="w-10">close</div>
            </button>
        </div>

    </div>
</div>