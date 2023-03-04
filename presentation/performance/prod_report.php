<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$test_date = 0;
if (empty($_GET['date'])) {
} else {
    $test_date = $_GET['date'];
    if ($test_date != 0) {
        echo "<script>
    $(window).load(function() {
        $('#myModal69').modal('show');
    });
    </script>";
    }
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./prod_team_lead.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <?php
                for ($m = 1; $m <= 12; $m++) {
                    $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                ?>
                    <form method="POST">
                        <input type="hidden" name="m" value=" <?php echo $month ?>">
                        <button type="submit" name="submit_name" id="submit_name" class="btn btn-default bg-gradient-success btn-next ">
                            <?php echo $month ?>
                        </button>
                    </form>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>

<div class="col col-lg-12 justify-content-center  text-uppercase ">
    <table id="tblexportData" class="table table-striped">
        <thead>
            <th>Date</th>
            <th>Prepared QTY From Inventory</th>
            <th>Received QTY From Inventory</th>
            <th>Completed QTY</th>
            <th>Production Remaining QTY</th>
            <th>Collected QTY</td>
            <th>Need to Collect QTY</td>
        </thead>
        <tbody>
            <?php
            $pr_t = 0;
            $rec_t = 0;
            $comp_t = 0;
            $pr_rm_t = 0;
            $col_t = 0;
            $col_rm_t = 0;
            if (isset($_POST['submit_name'])) {
                $month = $_POST['m'];
                $nm = date("m", strtotime($month));
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $y = $date1->format("Y");
                $d = 01;
                $dt = $y . "-" . $nm . "-" . $d;
                $st = date("Y-m-01", strtotime($dt));
                $lst = date("Y-m-t", strtotime($dt));
                $query = "SELECT COUNT(qr_number) as count,CAST(start_time AS DATE) AS start_time  FROM performance_record_table WHERE job_description='send to production' AND start_time between '$st'AND '$lst' GROUP BY CAST(start_time AS DATE)";
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                // echo $row;
                foreach ($query_run as $data) {
                    $sc_cou = 0;
                    $com_cou = 0;
                    $collect_cou = 0;
                    $start_t = $data['start_time'];
                    echo "<tr>
        <td> <a
        href='prod_report.php?date=$start_t'>" . $start_t . "</td>
        <td>" . $data['count'] . "</td>";
                    $pr_t += $data['count'];
                    $query_1 = "SELECT DISTINCT COUNT(qr_number) as sc_count FROM performance_record_table WHERE job_description='send to production technician' AND CAST(start_time AS DATE) ='{$data['start_time']}' GROUP BY CAST(start_time AS DATE)";
                    $query_run_sc = mysqli_query($connection, $query_1);
                    foreach ($query_run_sc as $d) {
                        $sc_cou = $d['sc_count'];
                        $rec_t += $sc_cou;
                        echo "<td>" . $d['sc_count'] . "</td>";
                    }
                    $query_2 = "SELECT DISTINCT COUNT(qr_number) as com_count FROM performance_record_table WHERE (job_description='Combine+ Test' OR job_description='Put RAM + Hard Disk + Test') AND CAST(start_time AS DATE) ='{$data['start_time']}' GROUP BY CAST(start_time AS DATE)";
                    $query_run_com = mysqli_query($connection, $query_2);
                    foreach ($query_run_com as $c) {
                        $com_cou = $c['com_count'];
                        $comp_t += $com_cou;
                        echo "<td>" . $c['com_count'] . "</td>";
                    }
                    echo "<td>" . $sc_cou - $com_cou . "</td>";
                    $pr_rm_t += $sc_cou - $com_cou;
                    $query_3 = "SELECT DISTINCT COUNT(qr_number) as col_count FROM performance_record_table WHERE (job_description='store to lcd rack' OR job_description='store to bodywork rack' OR job_description='store to motherboard rack') AND CAST(start_time AS DATE) ='{$data['start_time']}' GROUP BY CAST(start_time AS DATE)";
                    $query_run_com = mysqli_query($connection, $query_3);
                    foreach ($query_run_com as $x) {
                        echo "<td>" . $x['col_count'] . "</td>";
                        $col_t += $x['col_count'];
                        $collect_cou = $x['col_count'];
                    }
                    echo "<td>" . $com_cou - $collect_cou . "</td>";
                    $col_rm_t += $com_cou - $collect_cou;
                    echo "<tr>";
                }
                echo "<tr><td>Summery of Table</td>
    <td>" . $pr_t . "</td>
    <td>" . $rec_t . "</td>
    <td>" . $comp_t . "</td>
    <td>" . $pr_rm_t . "</td>
    <td>" . $col_t . "</td>
    <td>" . $col_rm_t . "</td>
    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- //////////////////////////////////////////////////////// -->
<div class="modal fade " id="myModal69" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12" style=" font-size: 30px;">
                <?php echo $test_date ?> Day Summery
            </div>
            <div>
                <div class='row'>
                    <div class="col col-lg-12 justify-content-center m-auto text-uppercase">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <th>Assigned QR Code</th>
                                <th>Inventory</th>
                                <th>Production Team Lead</th>
                                <th>Production Technician </th>
                                <th>Distributor</th>
                                <th>BodyWork</th>
                                <th>LCD</th>
                                <th>Motherboard</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT qr_number ,CAST(start_time AS DATE) AS start_time,user_id  FROM performance_record_table WHERE job_description='send to production' AND  CAST(start_time AS DATE)='$test_date'";
                                $query_run = mysqli_query($connection, $query);
                                foreach ($query_run as $a) {
                                    $qr = $a['user_id'];
                                    $qr1 = $a['qr_number'];
                                    echo "<tr>";
                                    echo "<td>" . $a['qr_number'] . "</td>";
                                    $query_n = "SELECT username FROM users WHERE user_id='$qr'";
                                    $query_run_n = mysqli_query($connection, $query_n);
                                    $ab = 0;
                                    foreach ($query_run_n as $nb) {
                                        $ab = $nb['username'];
                                    }

                                    $query = "SELECT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='send to production technician')";
                                    $query_run_pr = mysqli_query($connection, $query);
                                    $prot = 0;
                                    foreach ($query_run_pr as $pro) {
                                        $prot = $pro['username'];
                                    }

                                    $query = "SELECT DISTINCT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='Combine+ Test' OR job_description='Put RAM + Hard Disk + Test')";
                                    $query_run_pr1 = mysqli_query($connection, $query);
                                    $ap1 = 0;
                                    foreach ($query_run_pr1 as $pro1) {
                                        $ap1 = $pro1['username'];
                                    }

                                    $query = "SELECT DISTINCT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='store to motherboard rack' OR job_description='store to bodywork rack' OR job_description='store to lcd rack')";
                                    $query_run_pr1 = mysqli_query($connection, $query);
                                    $pr0 = 0;
                                    foreach ($query_run_pr1 as $pro1) {
                                        $pr0 = $pro1['username'];
                                    }

                                    $query = "SELECT DISTINCT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='bodywork')";
                                    $query_run_pr1 = mysqli_query($connection, $query);
                                    $pr = 0;
                                    foreach ($query_run_pr1 as $pro1) {
                                        $pr = $pro1['username'];
                                    }

                                    $query = "SELECT DISTINCT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='send to Remove lcd')";
                                    $query_run_pr1 = mysqli_query($connection, $query);
                                    $pr2 = 0;
                                    foreach ($query_run_pr1 as $pro1) {
                                        $pr2 = $pro1['username'];
                                    }
                                    $query = "SELECT DISTINCT username From users LEFT JOIN performance_record_table ON performance_record_table.user_id = users.user_id WHERE performance_record_table.qr_number='$qr1' AND (job_description='No Power / No Display / Account Lock/ Ports Issue' OR job_description='BIOS Lock High Gen' OR job_description='BIOS Lock Low Gen')";
                                    $query_run_pr1 = mysqli_query($connection, $query);
                                    $pr3 = 0;
                                    foreach ($query_run_pr1 as $pro1) {
                                        $pr3 = $pro1['username'];
                                    }
                                    echo "<td>" . $ab . "</td>";
                                    echo "<td>" . $prot . "</td>";
                                    echo "<td>" . $ap1 . "</td>";
                                    echo "<td>" . $pr0 . "</td>";
                                    echo "<td>" . $pr . "</td>";
                                    echo "<td>" . $pr2 . "</td>";
                                    echo "<td>" . $pr3 . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <a href="prod_report.php" class="btn bg-danger" type="button" area-label="close">
                <div class="w-10">close</div>
            </a>
        </div>

    </div>
</div>