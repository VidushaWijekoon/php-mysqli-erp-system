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
    <div class="col-md-5 align-self-center"><a href="./warehouse_stock_report.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>


<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
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
                                    <th>No</th>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Series</th>
                                    <th>Model</th>
                                    <th>Processor</th>
                                    <th>CPU</th>
                                    <th>Generation</th>
                                    <th>Speed</th>
                                    <th>Screen Size</th>
                                    <th>Screen Type</th>
                                    <th>Optical</th>
                                    <!-- <th>RAM</th>
                                    <th>HDD</th> -->
                                    <th>Location</th>
                                    <th>Inventory ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$query = "SELECT * FROM `warehouse_information_sheet` WHERE brand = '$brand' AND model='$model' AND core='$core' AND send_to_production= '0' ";
$result = mysqli_query($connection, $query);
$i = 0;
foreach ($result as $data) {
    $device = $data['device'];
    $model = $data['model'];
    $cpu = $data['core'];
    $generation = $data['generation'];
    $speed = $data['speed'];
    $screen_size = $data['lcd_size'];
    $screen_type = $data['touch_or_non_touch'];
    $location = $data['location'];
    $series = $data['series'];
    $optical = $data['dvd'];
    $processor = $data['processor'];
    $location = $data['location'];
    $inventory_id = $data['inventory_id'];
    $i++;?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $device ?></td>
                                    <td><?php echo $brand ?></td>
                                    <td><?php echo $series ?></td>
                                    <td><?php echo $model ?></td>
                                    <td><?php echo $processor ?></td>
                                    <td><?php echo $cpu ?></td>
                                    <td><?php echo $generation ?></td>
                                    <td><?php echo $speed ?></td>
                                    <td><?php echo $screen_size ?></td>
                                    <td><?php echo $screen_type ?></td>
                                    <td><?php echo $optical ?></td>
                                    <!-- <td>8GB</td>
                                    <td>256GB</td> -->
                                    <td><?php echo $location ?></td>
                                    <td><?php echo "ALSAKB" . $inventory_id ?></td>
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