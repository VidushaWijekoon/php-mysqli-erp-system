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
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_time = date('Y-m-d 00:00:00', strtotime("-1 days"));
$end_time = date('Y-m-d 23:59:00');
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./battery_performance.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="col col-lg-10 justify-content-center  text-uppercase">
                <table id="tblexportData" class="table table-striped">
                    <thead>
                        <th>Battery Code</th>
                        <th>Unlock</th>
                        <th>Chargin</th>
                        <th>Opening battery and cell change</th>
                        <th>Date</th>
                        <th>Send to Production Department</th>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT qr_number FROM performance_record_table  WHERE department_id='14'AND start_time between '$start_time' AND '$end_time' GROUP BY qr_number ORDER BY performance_id DESC";
                        $sql1 = mysqli_query($connection, $query);
                        foreach ($sql1 as $data) {
                            $qr = $data['qr_number'];
                        ?>
                            <tr>
                                <?php
                                $query = "SELECT *,username FROM performance_record_table LEFT JOIN users ON users.user_id=performance_record_table.user_id WHERE performance_record_table.qr_number='$qr'";
                                $sql = mysqli_query($connection, $query);
                                $unlock = 0;
                                $chargin1 = 0;
                                $opencell = 0;
                                $start_date = 0;
                                $usr_unlock = 0;
                                $usr_chargin1 = 0;
                                $usr_opencell = 0;
                                $sts_unlock = 0;
                                $sts_chargin1 = 0;
                                $sts_opencell = 0;
                                foreach ($sql as $a) {

                                    $qr_num = $a['qr_number'];
                                    $start_date = $a['start_time'];
                                    if ($a['job_description'] == 'Unlock') {
                                        $unlock = 'Unlock';
                                        $usr_unlock = $a['username'];
                                        $sts_unlock = $a['status'];
                                    }
                                    if ($a['job_description'] == 'Chargin') {
                                        $chargin1 = 'Chargin';
                                        $usr_chargin1 = $a['username'];
                                        $sts_chargin1 = $a['status'];
                                    }
                                    if ($a['job_description'] == 'Openning Battery And Cell Change') {
                                        $opencell = 'Openning Battery And Cell Change';
                                        $usr_opencell = $a['username'];
                                        $sts_opencell = $a['status'];
                                    }
                                ?>
                                <?php } ?>
                                <td><?php echo $qr_num ?></td>
                                <td><?php if ($unlock == 'Unlock') {
                                        if ($sts_unlock == '0') {
                                            echo "<div class='text-warning'>On Going </div>  /";
                                            echo $usr_unlock;
                                        } else {
                                            echo "<div class='text-success'>Complete </div> /";
                                            echo $usr_unlock;
                                        }
                                    } ?></td>
                                <td><?php if ($chargin1 == 'Chargin') {
                                        if ($sts_chargin1 == '0') {
                                            echo "<div class='text-warning'>On Going </div>  /";
                                            echo $usr_chargin1;
                                        } else {
                                            echo "<div class='text-success'>Complete </div> /";
                                            echo $usr_chargin1;
                                        }
                                    } ?></td>
                                <td><?php if ($opencell == 'Openning Battery And Cell Change') {
                                        if ($sts_opencell == '0') {
                                            echo "<div class='text-warning'>On Going </div>  /";
                                            echo $usr_opencell;
                                        } else {
                                            echo "<div class='text-success'>Complete </div> /";
                                            echo $usr_opencell;
                                        }
                                    } ?></td>
                                <td>
                                    <?php echo $start_date ?>
                                </td>
                                <?php $query1 = "SELECT status FROM `battery_request` WHERE `battery_p_n`='$qr_num'";
                                $row = 0;
                                $message = 0;
                                $sql1 = mysqli_query($connection, $query1);
                                $row = mysqli_num_rows($sql1);
                                if ($row == 0) {
                                    $message = "No Mention";
                                } else {
                                    $status = 0;
                                    foreach ($sql1 as $dd) {
                                        $status = $dd['status'];
                                    }
                                    if ($status == 2) {
                                        $message = "Sent";
                                    } else {
                                        $message = "On Going";
                                    }
                                }
                                ?>
                                <td>
                                    <?php
                                    if ($message == 'Sent') {
                                        echo "<div class='text-success'>" . $message . "</div> ";
                                    } elseif ($message == 'On Going') {
                                        echo "<div class='text-warning'>" . $message . "</div> ";
                                    } else {
                                        echo "<div class='text-danger'>" . $message . "</div> ";
                                    }

                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
            </div>

        </div>
    </div>
</div>