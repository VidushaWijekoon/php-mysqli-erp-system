<?php
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
?>
<?php if ($user_role == 9) { ?>
    <div class="row ">
        <div class="col-12 col-sm-6 col-md-3">
            <?php
            $date = date('Y-m-d 00:00:00');
            $date2 = date('Y-m-d 23:59:59');
            $start_time = $date;
            $end_time = $date2; ?>
            <a href="team_leaders.php">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">summery
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
    </div>
<?php } ?>
<div class="row ">
    <div class="col-12 col-sm-6 col-md-3">
        <?php
        $date = date('Y-m-d 00:00:00');
        $date2 = date('Y-m-d 23:59:59');
        $start_time = $date;
        $end_time = $date2; ?>
        <a href="history_record.php">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">History
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row ">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto ">
            <div class="card mt-3">
                <div class="card-body">
                    <?php $query = "SELECT job_description FROM performance_record_table WHERE user_id ='$user_id' ORDER BY performance_id DESC LIMIT 1";
                    $query_run = mysqli_query($connection, $query);
                    $last_job = '';
                    foreach ($query_run as $data) {
                        $last_job = $data['job_description'];
                    }
                    ?>
                    <h1> Name :
                        <?php
                        $emp_id = $_SESSION['epf'];
                        $query = "SELECT full_name FROM employees WHERE emp_id ='$emp_id'";
                        $query_run = mysqli_query($connection, $query);
                        foreach ($query_run as $data) {
                            echo $data['full_name'];
                        } ?><br>
                        EmpID :<?php echo $_SESSION['epf'] ?><br>
                        Department :
                        <?php $department_id = $_SESSION['department'];
                        $query = "SELECT department FROM departments WHERE department_id='$department_id'";
                        $query_run = mysqli_query($connection, $query);
                        foreach ($query_run as $data) {
                            echo $data['department'];
                        }
                        ?>
                    </h1>
                    <div class="d-flex">
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <form method="POST">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Job Description</label>
                                    <div class="col-sm-8">
                                        <select onchange="checkOptions(this)" name="job_description" class="info_select w-75" style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>
                                            <!-- production job description -->
                                            <?php if ($department_id == 10) { ?>
                                                <!-- LCD job description -->
                                                <option value="Remove LCD">Remove LCD</option>
                                                <option value="Install LCD">Install LCD</option>
                                                <option value="Fixed Lcd">Fixed LCD </option>
                                                <option value="Remove Polization Film">Remove Polization Film </option>
                                                <option value="Clean+Glue+Install Polization Film">Clean+Glue+Install
                                                    Polization
                                                    Film
                                                </option>
                                            <?php } ?>

                                        </select>


                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-sm-4 col-form-label">Scan QR Code OR MFG</label>
                                    <div class="col-sm-8">
                                        <input class="w-75" style="color:black !important" type="text" id="qr" name="qr" placeholder=" scan qr code here">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Start Time</label>
                                    <div class="col-sm-8">
                                        <span id='time'></span>

                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Today Completed QTY</label>
                                    <div class="col-sm-8">
                                        <?php
                                        $date = date('Y-m-d 00:00:00');
                                        $date2 = date('Y-m-d 23:59:59');
                                        $count = 0;
                                        $query = "SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Target</label>
                                    <div class="col-sm-8">
                                        <?php $query = "SELECT target FROM performance_record_table WHERE user_id = $user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
                                        $query_run = mysqli_query($connection, $query);

                                        $row = mysqli_num_rows($query_run);
                                        $sum = 0;
                                        if ($row == 0) {
                                            $row = 1;
                                        }
                                        $target = 0;
                                        foreach ($query_run as $data) {
                                            $sum += $data['target'];
                                        }
                                        $target = $sum / $row;
                                        echo round($target);
                                        ?>
                                    </div>
                                </div>
                                <button type="submit" name="submit" id="submit" class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"></button>
                            </form>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <div class="text-danger">

                                <div class="row">
                                    <label class="col-sm-12 col-form-label">Morning Session Start Time : 09.05AM</label>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 09:00:00');
                                    $date2 = $date1->format('Y-m-d 13:55:50');
                                    $duration = 0;
                                    $spend_time = 0;
                                    $query = "SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";

                                    $query_run = mysqli_query($connection, $query);
                                    $datetime_1 = '';
                                    $datetime_2 = '';
                                    foreach ($query_run as $data) {
                                        $datetime_1 = date('Y-m-d 09:05:00');
                                        $datetime_2 = $data['start_time'];
                                    }

                                    $start_datetime = new DateTime($datetime_1);
                                    $diff = $start_datetime->diff(new DateTime($datetime_2));
                                    if ($datetime_2 != '') {
                                        if ($datetime_2 < $datetime_1) {


                                    ?>
                                            <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute &#128525;</label>
                                        <?php
                                        } else {
                                        ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->h . ":" . $diff->i . ' Minutes' ?>
                                                minute</label>
                                    <?php }
                                    }
                                    ?>
                                    <label class="col-sm-12 col-form-label">Lunch Break Start Time : 01.55PM
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $current_time = $date1->format('Y-m-d H:i:s');
                                        $date = $date1->format('Y-m-d 13:55:50');
                                        $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                        if ($remaining_time > 0) {
                                            echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                    </label>

                                    <label class="col-sm-12 col-form-label">Afternoon Session Start Time :
                                        03.05PM</label>
                                    <?php
                                    $date = date('Y-m-d 15:00:00');
                                    $date2 = date('Y-m-d 18:46:50');
                                    $query = "SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                    $query_run = mysqli_query($connection, $query);
                                    $datetime_1 = '';
                                    $datetime_2 = '';
                                    foreach ($query_run as $data) {
                                        $datetime_1 = date('Y-m-d 15:05:00');
                                        $datetime_2 = $data['start_time'];
                                    }

                                    $start_datetime = new DateTime($datetime_1);
                                    $diff = $start_datetime->diff(new DateTime($datetime_2));

                                    if ($datetime_2 != '') {
                                        if ($datetime_2 < $datetime_1) {


                                    ?>
                                            <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute &#128525;</label>
                                        <?php
                                        } else {
                                        ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo  $diff->i . ' Minutes'; ?>
                                                minute</label>
                                    <?php }
                                    }  ?>
                                    <label class="col-sm-12 col-form-label">Tea Break Start Time : 06.15PM
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $current_time = $date1->format('Y-m-d H:i:s');
                                        $date = $date1->format('Y-m-d 18:46:50');
                                        $date_old = $date1->format('Y-m-d 15:05:00');
                                        $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                        if ($remaining_time > 0 && $date_old < $current_time) {
                                            echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                    </label>
                                    <label class="col-sm-12 col-form-label">Evening Session Start Time : 06.45PM</label>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 18:40:00');
                                    $date2 = $date1->format('Y-m-d 20:55:50');
                                    $duration = 0;
                                    $spend_time = 0;
                                    $query = "SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                    $query_run = mysqli_query($connection, $query);
                                    $datetime_1 = '';
                                    $datetime_2 = '';
                                    foreach ($query_run as $data) {
                                        $datetime_1 = date('Y-m-d 18:45:00');
                                        $datetime_2 = $data['start_time'];
                                    }

                                    $start_datetime = new DateTime($datetime_1);
                                    $diff = $start_datetime->diff(new DateTime($datetime_2));
                                    if ($datetime_2 != '') {
                                        if ($datetime_2 < $datetime_1) {

                                    ?>
                                            <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute &#128525;</label>
                                        <?php
                                        } else {
                                        ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute</label>
                                    <?php }
                                    }
                                    ?>
                                    <label class="col-sm-12 col-form-label">Evening Session End Time : 08.55PM
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $current_time = $date1->format('Y-m-d H:i:s');
                                        $date = $date1->format('Y-m-d 20:55:50');
                                        $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                        $date_old = $date1->format('Y-m-d 18:45:00');
                                        if ($remaining_time > 0 && $date_old < $current_time) {
                                            echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                    </label>

                                </div>
                            </div>

                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Job Description</th>
                                    <th>Scanned QR code</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Time Duration</th>
                                    <th>completed qty</th>
                                    <th>Target</th>

                                </tr>
                            </thead>
                            <tbody>


                                <?php $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $date = $date1->format('Y-m-d 00:00:00');
                                $date2 = $date1->format('Y-m-d 23:59:59');
                                $i = -1;
                                $y = 0;
                                $j = 1;
                                $spend_time = 0;
                                $query = "SELECT * FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";

                                $query_run = mysqli_query($connection, $query);
                                $row = mysqli_num_rows($query_run);
                                foreach ($query_run as $data) {
                                    $i++;
                                    $y = $row - $i;
                                ?>
                                    <tr>
                                        <td><?php echo $data['job_description'] ?></td>

                                        <td><?php
                                            echo $data['qr_number']; ?></td>

                                        <td><?php echo $data['start_time'] ?></td>
                                        <td><?php echo $data['end_time'] ?></td>
                                        <td><?php echo $data['spend_time'] ?></td>
                                        <td><?php if ($data['end_time'] == '0000-00-00 00:00:00') {
                                                echo "Not complete";
                                            } else {
                                                echo  $j;
                                            } ?></td>
                                        <td><?php echo $data['target'];
                                            if ($data['end_time'] == '0000-00-00 00:00:00') { ?>
                                                <i class="fa-duotone fa-circle" style="color:#00ff14"></i><?php } ?>
                                        </td>
                                    </tr>
                                <?php $y = 0;
                                } ?>

                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $scanned_qr = '0';
    $scanned_mfg = '0';
    $search_value;
    $scanned_qr = $_POST['qr'];
    $job_description = $_POST['job_description'];
    $previous_job_description = '';
    $end_time = "0000-00-00";
    $performance_id = 0;
    $_POST['qr'] = '';
    $_POST['job_description'] = '';
    if ($scanned_qr != '0') {
        $search_value = $scanned_qr;
    } elseif ($scanned_mfg != 0) {
        $search_value = $scanned_mfg;
    }
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {
        $performance_id = $data['performance_id'];
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];
        $previous_job_description .= $data['job_description'] . ",";
    }
    $test = 0;
    $same_jd_count = 0;
    $test = explode(",", $previous_job_description);
    foreach ($test as $a) {
        if ($a == $job_description) {
            $same_jd_count++;
        }
    }


    if ($end_time == "0000-00-00 00:00:00" && $same_jd_count == 1) {

        $working_time_in_seconds;
        $start_time = 0000 - 00 - 00;
        $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $data) {
            $performance_id = $data['performance_id'];
            $start_time = $data['start_time'];
        }
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $working_time_in_seconds = strtotime($date) - strtotime($start_time);
        $duration = round($working_time_in_seconds / 60) * 100;
        $query = "UPDATE
                `performance_record_table`
                SET
                `end_time` = '$date',
                `spend_time` = '$duration'
                WHERE performance_id = $performance_id";
        echo $query;
        $query_run = mysqli_query($connection, $query);
        header('Location: performance_record.php');
    } elseif ($same_jd_count == 0) {
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $start_date = $date1->format('Y-m-d H:i:s');
        $target = 0;
        if ($department_id == 10) {
            //lcd target
            if ($_SESSION['role_id'] == 9) {
                $target = 60;
            } elseif ($job_description == "Remove LCD") {
                $target = 120;
            } elseif ($job_description == "Install LCD") {
                $target = 120;
            } elseif ($job_description == "Fixed Lcd") {
                $target = 30;
            } elseif ($job_description == "Remove Polization Film") {
                $target = 120;
            } elseif ($job_description == "Clean+Glue+Install Polization Film") {
                $target = 60;
            }
        }
        $query = "INSERT INTO `performance_record_table`(
                `user_id`,
                `department_id`,
                `qr_number`,
                `job_description`,
                `start_time`,
                `target`
                )
                VALUES(
                '$user_id',
                '$department_id',
                '$scanned_qr',
                '$job_description',
                '$start_date',
                '$target'
                ) ";
        $query_run = mysqli_query($connection, $query);
        header('Location: performance_record.php');
    } elseif ($end_time != "0000-00-00 00:00:00" && $same_jd_count == 1) {
        echo '<script>
                alert("Already you completed this machine under this job description ")
                </script>';
    }
}
?>
<script>
    var time = new Date();
    var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time.getHours() + ":" + time
        .getMinutes() + ":" + time.getSeconds();
    document.getElementById("time").textContent = today;


    let searchbar = document.querySelector('input[name="qr"]');
    searchbar.focus();
    search.value = '';
    var otherInput;

    function checkOptions(select) {
        otherInput = document.getElementById('lcd_p_n_code');
        if (select.options[select.selectedIndex].value == "Remove LCD") {
            otherInput.style.display = 'block';

        } else {
            otherInput.style.display = 'none';
        }
    }
</script>
<style>
    [type="text"] {
        height: 22px;
        margin-top: 4px;
        font-size: 10px;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        font-size: 12px;
        padding: 10px;
        font-family: "Poppins", sans-serif;
        color: #000 !important;
    }

    .col-form-label {
        font-size: 16px;
    }
</style>
<?php include_once('../includes/footer.php'); ?>