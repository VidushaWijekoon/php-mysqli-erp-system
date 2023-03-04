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

$user_id = $_GET['user_id'];
$from_date = $_GET['from_date'];
$to_date = $_GET['to_date'];
$count = $_GET['count'];
$department_id = '';
$department_name = '';
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./report.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <?php
$name = '';
$emp_id = '';
$query = "SELECT * FROM employees LEFT JOIN users ON users.epf = employees.emp_id WHERE user_id = $user_id";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $name = $data['full_name'];
    $emp_id = $data['emp_id'];
    $department_id = $data['department'];
}
$query = "SELECT department FROM departments  WHERE department_id = $department_id";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $department_name = $data['department'];
}
?>
                    <h1> Name : <?php echo $name ?><br>
                        EmpID :<?php echo $emp_id ?><br>
                        Department :
                        <?php echo $department_name ?><br>
                        From Date : <?php echo $from_date ?><br>
                        To Date : <?php echo $to_date ?><br>
                        Rejected Count : <?php echo $count ?><br>
                    </h1>
                    <button onclick="exportToExcel('tblexportData', '<?php echo $name; ?>')"
                        class="btn bg-gradient-success mt-3">Export Table Data To Excel
                        File</button>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Rejected Date</th>
                                    <th>Rejected QR Number</th>
                                    <th>Reject Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$query = "SELECT * FROM qc_paper WHERE reject_person=$user_id AND  date_time between $from_date AND $to_date ";

$query_run = mysqli_query($connection, $query);
// $row = mysqli_num_rows($query_run);
$test = 0;
if (empty($query_run)) {} else {

    foreach ($query_run as $a) {

        $qr_number = $a['qr_number'];
        $bios_lock_hp = $a['bios_lock_hp'];
        $bios_lock_dell = $a['bios_lock_dell'];
        $bios_lock_lenovo = $a['bios_lock_lenovo'];
        $bios_lock_other = $a['bios_lock_other'];
        $computrace_hp = $a['computrace_hp'];
        $computrace_dell = $a['computrace_dell'];
        $computrace_lenovo = $a['computrace_lenovo'];
        $computrace_other = $a['computrace_other'];
        $me_region_lock_hp = $a['me_region_lock_hp'];
        $tpm_lock_dell = $a['tpm_lock_dell'];
        $other_error_lenovo = $a['other_error_lenovo'];
        $other_error_other_brand = $a['other_error_other_brand'];
        $a_top = $a['a_top'];
        $b_bazel = $a['b_bazel'];
        $c_palmrest = $a['c_palmrest'];
        $d_back_cover = $a['d_back_cover'];
        $keyboard = $a['keyboard'];
        $lcd = $a['lcd'];
        $webcam = $a['webcam'];
        $mousepad_button = $a['mousepad_button'];
        $mic = $a['mic'];
        $speaker = $a['speaker'];
        $wi_fi_connection = $a['wi_fi_connection'];
        $usb = $a['usb'];
        $battery = $a['battery'];
        $hinges_cover = $a['hinges_cover'];
        $user_id = $a['user_id'];
        $user_department = $a['user_department'];
        $rejection_department = $a['rejection_department'];
        $reject_person = $a['reject_person'];
        $date_time = $a['date_time'];
        $power = $a['power'];
        $mb_display = $a['mb_display'];
        $mb_other_issue = $a['mb_other_issue'];
        $bodywork = $a['bodywork'];
        $sanding = $a['sanding'];
        $ram = $a['ram'];
        $hard_disk_boot = $a['hard_disk_boot'];
        $reason = 0;

        if ($bios_lock_hp == 'reject') {
            $reason = " bios lock hp ";} elseif ($bios_lock_dell == 'reject') {
            $reason = " bios lock dell";} elseif ($bios_lock_lenovo == 'reject') {
            $reason = "bios lock lenovo ";} elseif ($bios_lock_other == 'reject') {
            $reason = "bios lock other ";} elseif ($computrace_hp == 'active') {
            $reason = "computrace hp ";} elseif ($computrace_dell == 'active') {
            $reason = "computrace dell ";} elseif ($computrace_lenovo == 'lock') {
            $reason = "computrace lenovo ";} elseif ($computrace_other == 'lock') {
            $reason = "computrace other ";} elseif ($me_region_lock_hp == 'reject') {
            $reason = "me region lock hp ";} elseif ($tpm_lock_dell == 'reject') {
            $reason = "tpm lock dell ";} elseif ($other_error_lenovo == 'reject') {
            $reason = "other error lenovo ";} elseif ($other_error_other_brand == 'have') {
            $reason = "other error other brand ";} elseif ($a_top == 'have') {
            $reason = "a top ";} elseif ($b_bazel == 'reject') {
            $reason = " b bazel";} elseif ($c_palmrest == 'reject') {
            $reason = "c palmrest ";} elseif ($d_back_cover == 'reject') {
            $reason = "d back cover ";} elseif ($keyboard == 'reject') {
            $reason = " keyboard";} elseif ($lcd == 'reject') {
            $reason = "lcd ";} elseif ($webcam == 'reject') {
            $reason = "webcam ";} elseif ($mousepad_button == 'reject') {
            $reason = " mousepad button";} elseif ($mic == 'reject') {
            $reason = "mic ";} elseif ($speaker == 'reject') {
            $reason = "speaker ";} elseif ($wi_fi_connection == 'reject') {
            $reason = " wi-fi connection";} elseif ($usb == 'reject') {
            $reason = "usb ";} elseif ($battery == 'bad') {
            $reason = " battery";} elseif ($hinges_cover == 'reject') {
            $reason = "hinges cover ";} elseif ($user_id == 'reject') {
            $reason = "user id ";} elseif ($user_department == 'reject') {
            $reason = "user department ";} elseif ($rejection_department == 'reject') {
            $reason = "rejection department ";} elseif ($reject_person == 'reject') {
            $reason = "reject person ";} elseif ($power == 'reject') {
            $reason = " power";} elseif ($mb_display == 'reject') {
            $reason = " mb display";} elseif ($mb_other_issue == 'have') {
            $reason = "mb other issue ";} elseif ($bodywork == 'reject') {
            $reason = "bodywork ";} elseif ($sanding == 'reject') {
            $reason = "sanding ";} elseif ($ram == 'reject') {
            $reason = " ram";} elseif ($hard_disk_boot == 'not ok') {
            $reason = " hard disk boot not working";}

        ?>
                                <tr>
                                    <td><?php echo $a['date_time']; ?></td>
                                    <td><?php echo $a['qr_number']; ?></td>
                                    <td><?php echo $reason; ?></td>
                                </tr>
                                <?php }
}
?>
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