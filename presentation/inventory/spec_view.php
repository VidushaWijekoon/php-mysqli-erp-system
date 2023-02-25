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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$model = $_GET['model'];
$core = $_GET['core'];
$brand = $_GET['brand'];

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a
            href="./model_view.php?brand=<?php echo $brand ?>&model=<?php echo $model ?>">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>


<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body"><input type="text" id="myInput" onkeyup="myFunction()"
                        placeholder="Search for names.." title="Type in a name">
                    <button onclick="exportToExcel('tblexportData', 'packing-details234')"
                        class="btn bg-gradient-success mt-3">Export Table Data To Excel
                        File</button>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>Core</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Screen Type</th>
                                    <th>Optical</th>
                                    <th>RAM</th>
                                    <th>HDD</th>
                                    <th>Location</th>
                                    <th>MFG</th>
                                    <th>Inventory ID</th>
                                    <th>Battery Status</th>
                                    <th>Wholesale Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

<<<<<<< HEAD
$non_touch_wholesale_price = 0;
$touch_wholesale_price = 0;
$i = 0;

$query = "SELECT * FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND send_to_production= '0' ";
$result = mysqli_query($connection, $query);
foreach ($result as $data) {
    $device = $data['device'];
    $model = $data['model'];
    $cpu = $data['core'];
    $generation = $data['generation'];
    $speed = $data['speed'];
    $screen_size = $data['lcd_size'];
    $screen_type = $data['touch_or_non_touch'];
    $location = $data['location'];
    $optical = $data['dvd'];
    $processor = $data['processor'];
    $location = $data['location'];
    $mfg = $data['mfg'];
    $inventory_id = $data['inventory_id'];
    $battery = $data['battery'];
    $touch_wholesale_price = $data['touch_wholesale_price'];
    $non_touch_wholesale_price = $data['non_touch_wholesale_price'];

    ?>
                                <tr>
                                    <td><?php echo $device ?></td>
                                    <td><?php echo $brand ?></td>
                                    <td><?php echo $model ?></td>
                                    <td><?php echo $processor ?></td>
                                    <td><?php echo $cpu ?></td>
                                    <td><?php echo $generation ?></td>
                                    <td><?php echo $speed ?></td>
                                    <td><?php echo $screen_size ?></td>
                                    <td><?php echo $screen_type ?></td>
                                    <td><?php echo $optical ?></td>
                                    <td>8GB</td>
                                    <td>256GB</td>
                                    <td><?php echo $location . "-" . $generation . "-" . $model ?>
                                    </td>
                                    <td><?php echo $mfg ?></td>
                                    <td><?php echo "ALSAKB" . $inventory_id ?></td>
                                    <td>
                                        <?php if ($battery == 'yes') {
        echo "<div class='text-success'>$battery</div>";
    } else {echo "<div class='text-danger'>$battery</div>";}?>
                                    </td>
                                    <td>
                                        <?php if ($screen_type == 'yes') {echo $touch_wholesale_price;} elseif ($screen_type == 'no') {echo $non_touch_wholesale_price;}?>
=======
                                    $non_touch_wholesale_price = 0;
                                    $touch_wholesale_price = 0;
                                    $i=0;
                                
                                    $query = "SELECT * FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch= '0' ";
                                    $result = mysqli_query($connection, $query);
                                    foreach($result as $data){
                                        $device = $data['device'];
                                        $model = $data['model'];
                                        $cpu = $data['core'];
                                        $generation = $data['generation'];
                                        $speed = $data['speed'];
                                        $screen_size = $data['lcd_size'];
                                        $screen_type = $data['touch_or_non_touch'];
                                        $location = $data['location'];
                                        $optical = $data['dvd'];
                                        $processor = $data['processor'];
                                        $location = $data['location'];
                                        $mfg = $data['mfg'];
                                        $inventory_id = $data['inventory_id'];
                                        $battery=$data['battery'];
                                        $touch_wholesale_price = $data['touch_wholesale_price'];
                                        $non_touch_wholesale_price = $data['non_touch_wholesale_price'];                                                  

                                        // $query1 = "SELECT touch_wholesale_price FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch= '0' AND touch_or_non_touch = 'yes'";
                                        // $result1 = mysqli_query($connection, $query1);
                                        // foreach($result1 as $x){
                                        //     $touch_wholesale_price = $x['touch_wholesale_price'];
                                        // }
                                        
                                        // $query2 = "SELECT non_touch_wholesale_price FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model'AND core='$core' AND dispatch= '0' AND touch_or_non_touch = 'no' ";
                                        // $result2 = mysqli_query($connection, $query2);
                                        // foreach($result2 as $i){
                                        //     $non_touch_wholesale_price = $i['non_touch_wholesale_price'];
                                        // }


                                ?>
                                <tr>
                                    <td><?php echo$device ?></td>
                                    <td><?php echo$brand ?></td>
                                    <td><?php echo$model?></td>
                                    <td><?php echo$processor?></td>
                                    <td><?php echo$cpu ?></td>
                                    <td><?php echo$generation ?></td>
                                    <td><?php echo$speed ?></td>
                                    <td><?php echo$screen_size ?></td>
                                    <td><?php echo$screen_type ?></td>
                                    <td><?php echo$optical ?></td>
                                    <td>8GB</td>
                                    <td>256GB</td>
                                    <td><?php echo$location."-".$generation."-".$model ?>
                                    </td>
                                    <td><?php echo $mfg ?></td>
                                    <td><?php echo "ALSAKB".$inventory_id ?></td>
                                    <td>
                                        <?php if($battery == 'yes'){
                                        echo"<div class='text-success'>$battery</div>";
                                    }else{echo "<div class='text-danger'>$battery</div>";} ?>
                                    </td>
                                    <td>
                                        <?php if($screen_type == 'yes') { echo $touch_wholesale_price; }
                                              elseif($screen_type == 'no') { echo $non_touch_wholesale_price; } ?>
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
                                    </td>
                                </tr>
                                <?php }?>

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function exportToExcel(tableID, filename = '') {
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'export_excel_data.xls';

    // Create download link element
    downloadurl = document.createElement("a");

    document.body.appendChild(downloadurl);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;

        // Setting the file name
        downloadurl.download = filename;

        //triggering the function
        downloadurl.click();
    }
}


/////////////////////////////////////////////////////
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tblexportData");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>