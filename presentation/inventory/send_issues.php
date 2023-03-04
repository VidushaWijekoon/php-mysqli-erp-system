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
                $bat_status='have';
                $department='Battery Department';
                $sql = "SELECT alsakb_qr,inv_user_id,issue_type,issue_type2,issue_type3 FROM issue_laptops WHERE inv_user_id='$user_id' ORDER BY pc_id DESC LIMIT 1 ";
                $sql_run = mysqli_query($connection, $sql);
                foreach($sql_run as $res){
                    $mb_department=$res['issue_type2'];
                    $lcd_department=$res['issue_type'];
                    $bat_department=$res['issue_type3'];
                $alsakb_qr=$res['alsakb_qr'];
                }
                if($bat_department ==1){
                    $bat_status = "Removed";
                }
                if($mb_department ==1){
                    $department='Motherboard Department';
                }elseif( $lcd_department==1){
                     $department='LCD Department';
                }
                $rowcount = 0;
                if($alsakb_qr !=0){
                $query = "SELECT * FROM warehouse_information_sheet WHERE inventory_id='$alsakb_qr' ORDER BY inventory_id DESC LIMIT 1 ";
                $query_run = mysqli_query($connection, $query);
                $rowcount = mysqli_num_rows($query_run);
                }
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
                        <th>Battery</th>
                        <th>Need to send </th>
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
        $create_date = $data['create_date'];
        $create_by_inventory_id = $data['create_by_inventory_id'];
        if($touch_or_non_touch == 'yes'){
            $touch_or_non_touch ='touch';
        }else{
            $touch_or_non_touch = 'non touch';
        }
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
                            <td><?php echo $bat_status; ?></td>
                            <td><?php echo $department ?></td>
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
<div class="container-fluid">
    <div class="row">
        <div
            class="col-lg-6 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Audit</p>
                </div>
                <div class="card-body justify-content-center align-item-center mx-auto mt-2">
                    <form method='POST' action='send_issues_save.php'>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Scan QR number</label>
                            <div class="col-sm-8 w-75">

                                <input class="w-50" style="color:black !important" type="number" name="qr_number"
                                    id="qr_number" placeholder="Scan QR number"
                                    onkeypress="return (event.charCode > 47 && event.charCode < 58)" required>

                            </div>
                        </div>
                        <hr>
                        <div class="row ">
                            <div class=" row col-sm-12 ">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Scratch (PGP) </h4>
                                <input type="checkbox" id="scrtch" name="scrtch" value="1">
                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Spot (ZGP + SGP) </h4>
                                <input type="checkbox" id="spt" name="spt" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Broken LCD</h4>
                                <input type="checkbox" id="brkn" name="brkn" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Yellow Shadow LCD </h4>
                                <input type="checkbox" id="ylwsdw" name="ylwsdw" value="1">

                            </div>
                            <div class=" row col-sm-12 ">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Bios Lock</h4>
                                <input type="checkbox" id="bios" name="bios" value="1">
                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Computrace Lock </h4>
                                <input type="checkbox" id="com" name="com" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">me region</h4>
                                <input type="checkbox" id="me" name="me" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">No power </h4>
                                <input type="checkbox" id="power" name="power" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">No display</h4>
                                <input type="checkbox" id="no_display" name="no_display" value="1">

                            </div>
                            <div class=" row col-sm-12 ">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Port Issue</h4>
                                <input type="checkbox" id="port" name="port" value="1">
                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">TPM Lock </h4>
                                <input type="checkbox" id="tpm" name="tpm" value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 ">Battery Condition < 55</h4>
                                        <input type="checkbox" onchange="myFunction(this)" id="bat" name="bat"
                                            value="1">

                            </div>
                            <div class="col-sm-12 row">
                                <h4 class="col-lg-2 "></h4>
                                <h4 class="col-lg-6 " style="display : none" id="lable">Battery PN </h4>
                                <input type="text" style="display : none" id="bat_pn" name="bat_pn">
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                            <button type="submit" name="insert" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center ">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let searchbar = document.querySelector('input[name="qr_number"]');
searchbar.focus();
search.value = '';

function myFunction() {
    var checkBox = document.getElementById("bat");
    var text = document.getElementById("bat_pn");
    var lable = document.getElementById("lable");
    if (checkBox.checked == true) {
        text.style.display = "block";
        lable.style.display = "block";
    } else {
        text.style.display = "none";
        lable.style.display = "none";
    }
}
</script>
<?php include_once '../includes/footer.php';?>