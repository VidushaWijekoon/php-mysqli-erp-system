<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$user_id = $_SESSION['user_id']
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="warehouse_dashboard.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto ">
    <div class="card mt-3">
        <div class="card-header" style="font-size:18px">
            <label class="col-sm-4 col-form-label">Last Insert Record</label>

        </div>
        <div class="card-body">
            <div class="row">
                <?php
                $lcd_department=0;
                $mb_department=0;
                $bat_department=0;
                $alsakb_qr=0;
                $bat_department=0;
                
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
                    </thead>
                    <tbody>
                        <?php
                        $sql="SELECT *,warehouse_information_sheet.model From warehouse_information_sheet LEFT JOIN performance_record_table ON performance_record_table.qr_number = warehouse_information_sheet.inventory_id
                        WHERE user_id='$user_id' ORDER BY performance_id DESC LIMIT 1 ";
                        $query_run = mysqli_query($connection,$sql);
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
                                if($touch_or_non_touch == 'yes'){
                                    $touch_or_non_touch ='touch';
                                }else{
                                    $touch_or_non_touch = 'non touch';
                                }
                                ?>
                        <tr>
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
<div class="container-fluid">
    <div class="row">
        <div
            class="col-lg-6 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Audit</p>
                </div>
                <div class="card-body justify-content-center align-item-center mx-auto mt-2">
                    <form method='POST' action='reverse_save.php'>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Scan QR number</label>
                            <div class="col-sm-8 w-75">

                                <input class="w-50" style="color:black !important" type="number" name="qr_number"
                                    id="qr_number" placeholder="Scan QR number" required>
                                <button type='submit' style='float:right' class='btn btn-primary d-none
                               btn-sm' name='confirm'>
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>