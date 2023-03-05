<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
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
$user_id = $_SESSION['user_id'];
$query = "SELECT last_login FROM users WHERE user_id ='$user_id'";
$query_run = mysqli_query($connection, $query);
$last_login_time = '';
foreach ($query_run as $data) {
    $last_login_time = $data['last_login'];
}

$time = strtotime($last_login_time);
$last_qr_number = '0';
$time = strtotime($last_login_time) + 2;
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d H:i:s');
$test = strtotime($date);
if ($test < $time) {
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d 00:00:00');
    //  $date2 = $date1->format('Y-m-d 23:59:59');
    $query = "SELECT qr_number FROM performance_record_table WHERE user_id ='$user_id'AND status ='0'AND start_time between '$date'AND '$last_login_time' ";
    $query_run = mysqli_query($connection, $query);
    if (empty($query_run)) {
    } else {
        foreach ($query_run as $data) {
            $last_qr_number = $data['qr_number'];
        }
        // if ($last_qr_number != '0') {
        //     echo "<script>
        //                             $(window).load(function() {
        //                                 $('#myModal4').modal('show');
        //                             });
        //                             </script>";
        // }
    }
}

$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
date_default_timezone_set('Asia/Dubai');
$timestamp2 = strtotime(date('Y-m-d 13:57:50'));
$timestamp3 = strtotime(date('Y-m-d 18:47:00'));
$timestamp4 = strtotime(date('Y-m-d 20:57:00'));

$_SESSION['expire1'] = $timestamp2;
$_SESSION['expire2'] = $timestamp3;
$_SESSION['expire3'] = $timestamp4;
$now = time();

if (strtotime(date('Y-m-d 09:00:00')) < $now && $now > $_SESSION['expire1'] && $now < strtotime(date('Y-m-d 15:00:00'))) {

    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";

    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 15:00:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 19:10:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 19:10:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:59:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
}
// if (1682048622 < $now) {
//     session_destroy();
//     echo "<p align='center'>Session has been destroyed!!";
//     header("Location: ../../index.php");
// }
?>
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
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
<div class="col col-sm-6 col-md-3">
    <a href="battery_request_pro_tech.php">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Battery Request
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </a>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row ">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <?php $query = "SELECT job_description FROM performance_record_table WHERE user_id ='$user_id' ORDER BY performance_id DESC LIMIT 1";
                    $query_run = mysqli_query($connection, $query);
                    $last_job = '';
                    foreach ($query_run as $data) {
                        $last_job = $data['job_description'];
                    }
                    ?>
                    <h1> Name : <?php $emp_id = $_SESSION['epf'];
                                $query = "SELECT full_name FROM employees WHERE emp_id ='$emp_id'";
                                $query_run = mysqli_query($connection, $query);
                                foreach ($query_run as $data) {
                                    echo $data['full_name'];
                                } ?><br>
                        EmpID :<?php echo $_SESSION['epf']; ?><br>

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

                                    <label class="col-sm-6 col-form-label">Job Description</label>
                                    <div class="col-sm-4 mt-2">
                                        <select name="job_description" class="info_select w-75" style="border-radius: 5px; font-size:16px">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>

                                            <?php if ($department_id == 19) { ?>
                                                <option value="Low Generation Function Test">Low Generation Function Test
                                                </option>
                                                <option value="High Generation Function Test">High Generation Function Test
                                                </option>
                                                <option value="High Generation Function Test + MFG">High Generation Function
                                                    Test + MFG printing
                                                </option>
                                                <option value="Windows Instalation">Windows Instalation</option>
                                                <option value="Combine">Combine</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Scan QR Code OR MFG</label>
                                    <div class="col-sm-4 mt-2">
                                        <input class="w-75" style="color:black !important" type="text" id="qr" name="qr" placeholder=" scan qr code here">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Current Time</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
                                        date_default_timezone_set('Asia/dubai');

                                        $timestamp = time();
                                        $date_time = date("H:i:s", $timestamp);
                                        echo "$date_time";
                                        ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today Completed QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php

                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                        $date2 = $date1->format('Y-m-d 23:59:59');
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
                                    <label class="col-sm-6 col-form-label">Bonus Completed QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                        // $date = date('Y-m-d 00:00:00');
                                        $date2 = $date1->format('Y-m-d 23:59:59');

                                        $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";
                                        $query_run = mysqli_query($connection, $query);
                                        $sum = 0;
                                        $target = 200;
                                        foreach ($query_run as $data) {
                                            $sum = $data['target_sum'];
                                        }
                                        if ($sum > 200) {
                                            $extra = $sum - 200;
                                            echo $extra;
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today QC Pass QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                        // $date = date('Y-m-d 00:00:00');
                                        $date2 = $date1->format('Y-m-d 23:59:59');
                                        $count = 0;
                                        $query = "SELECT COUNT(qc_paper_id) as count FROM qc_paper WHERE user_id=$user_id AND status='0' AND date_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today QC Reject QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                        // $date = date('Y-m-d 00:00:00');
                                        $date2 = $date1->format('Y-m-d 23:59:59');
                                        $count = 0;
                                        $query = "SELECT COUNT(qc_paper_id) as count FROM qc_paper WHERE user_id=$user_id AND status='1' AND date_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">

                                    <label class="col-sm-6 col-form-label">Remaining Target Point</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";
                                        $query_run = mysqli_query($connection, $query);
                                        $sum = 0;
                                        $target = 200;
                                        foreach ($query_run as $data) {
                                            $sum = $data['target_sum'];
                                        }
                                        $final_target = $target - $sum;
                                        echo round($final_target);
                                        ?>
                                    </div>
                                </div>
                                <button type="submit1" name="submit1" id="submit1" class="btn btn-default bg-gradient-success btn-next float-right d-none"> Confirm
                                </button>
                            </form>
                            <p> Point View <br> Funtion Test = 1 , Combine = 3.3 , Windows Instalation = 2.8 </p>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <div class="text-danger">

                                <div class="row">
                                    <!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
                                    <label class="col-sm-12 col-form-label">Morning Session Start Time : 09.05AM</label>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 09:00:00');
                                    $date2 = $date1->format('Y-m-d 13:57:00');
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
                                    $datetime1 = new DateTime($datetime_1);
                                    $datetime2 = new DateTime($datetime_2);
                                    $interval = $datetime1->diff($datetime2);

                                    if ($datetime_2 != '') {

                                        if ($datetime_2 < $datetime_1) {

                                    ?>
                                            <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                                <?php echo $interval->format('%H:%i:%s');
                                                echo " HH:MM:SS";  ?>
                                                &#128525;</label>
                                        <?php
                                        } else {
                                        ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $interval->format('%H:%i:%s');
                                                echo " HH:MM:SS";  ?>
                                            </label>
                                    <?php }
                                    }
                                    ?>
                                    <!-- /////////////////////////////////////////////////////////////////////////////////// -->
                                    <label class="col-sm-12 col-form-label">Lunch Break Start Time : 01.55PM
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $current_time = $date1->format('Y-m-d H:i:s');
                                        $date = $date1->format('Y-m-d 13:57:00');
                                        $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                        if ($remaining_time > 0) {
                                            // echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                        </lable>
                                        <?php

                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 13:00:00');
                                        $date2 = $date1->format('Y-m-d 13:56:50');
                                        $date3 = $date1->format('Y-m-d H:i:s');
                                        if ($date2 < $date3) {
                                            $duration = 0;
                                            $spend_time = 0;
                                            $query = "SELECT end_time,status FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY end_time DESC LIMIT 1";
                                            $query_run = mysqli_query($connection, $query);
                                            $datetime_1 = '';
                                            $datetime_2 = '';
                                            $status = '';
                                            foreach ($query_run as $data) {
                                                $datetime_1 = date('Y-m-d 13:55:00');
                                                $datetime_2 = $data['end_time'];
                                                $status = $data['status'];
                                            }

                                            $start_datetime = new DateTime($datetime_1);
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            $datetime1 = new DateTime($datetime_1);
                                            $datetime2 = new DateTime($datetime_2);
                                            $interval = $datetime1->diff($datetime2);

                                            if ($status == 1) {
                                                if ($datetime_2 < $datetime_1) {

                                        ?>
                                                    <label class="col-sm-12 col-form-label text-danger">You are Earlier :
                                                        <?php echo $interval->format('%H:%i:%s');
                                                        echo " HH:MM:SS";  ?></label>
                                                <?php
                                                } elseif ($datetime_2 > $datetime_1) {
                                                ?>
                                                    <label class="col-sm-12 col-form-label text-success">You are Late :
                                                        <?php echo $interval->format('%H:%i:%s');
                                                        echo " HH:MM:SS";  ?>
                                                        &#128525;
                                                    </label>
                                                <?php }
                                            } elseif ($status == 0) { ?>
                                                <label class="col-sm-12 col-form-label text-warning">You are Not Completed last
                                                    unit
                                                </label>
                                        <?php

                                            }
                                        }
                                        ?>
                                        <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                        <label class="col-sm-12 col-form-label">Afternoon Session Start Time :
                                            03.05PM</label>
                                        <?php $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 15:00:00');
                                        // $date = date('Y-m-d 15:00:00');
                                        $date2 = $date1->format('Y-m-d 16:15:50');
                                        $datetime_1;
                                        $datetime_e = '';
                                        $diff = '';
                                        $previous_work_time = '';
                                        $query = "SELECT previous_work FROM performance_record_table WHERE user_id=$user_id AND previous_work between '$date'AND '$date2'  ORDER BY performance_id ASC LIMIT 1";

                                        $query_run = mysqli_query($connection, $query);
                                        // foreach ($query_run as $data) {
                                        //     $datetime_1 = date('Y-m-d 15:05:00');
                                        //     $datetime_e = date($data['previous_work']);
                                        // }

                                        // if (empty($datetime_e)) {
                                        $query = "SELECT start_time FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";

                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $datetime_1 = date('Y-m-d 15:05:00');
                                            $datetime_e = date($data['start_time']);
                                        }
                                        // }

                                        if ($datetime_e != '') {
                                            if ($datetime_e < $datetime_1) {

                                                $datetime1 = new DateTime($datetime_1);
                                                $datetime2 = new DateTime($datetime_e);
                                                $interval = $datetime1->diff($datetime2);
                                        ?>
                                                <label class="col-sm-12 col-form-label text-success">You are Earlier :

                                                    <?php
                                                    echo $interval->format('%H:%i:%s');
                                                    echo " HH:MM:SS"; ?>
                                                    &#128525;</label>
                                            <?php
                                            } else {
                                            ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Late :

                                                    <?php
                                                    echo $interval->format('%H:%i:%s');
                                                    echo " HH:MM:SS";
                                                    ?>
                                                </label>
                                        <?php }
                                        } ?>
                                        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
                                        <label class="col-sm-12 col-form-label">Tea Break Start Time : 06.45PM
                                            <?php
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $current_time = $date1->format('Y-m-d H:i:s');
                                            $date = $date1->format('Y-m-d 18:46:50');
                                            $date_old = $date1->format('Y-m-d 15:05:00');
                                            $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                            if ($remaining_time > 0 && $date_old < $current_time) {
                                                // echo " Remaining Time " . round($remaining_time) . " minute";
                                            }
                                            ?>
                                        </label>
                                        <label>
                                            <?php
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d 15:45:00');
                                            $date2 = $date1->format('Y-m-d 18:46:50');
                                            $duration = 0;
                                            $spend_time = 0;
                                            $query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY end_time DESC LIMIT 1";
                                            $query_run = mysqli_query($connection, $query);
                                            $datetime_1 = '';
                                            $datetime_2 = '';
                                            foreach ($query_run as $data) {
                                                $datetime_1 = date('Y-m-d 18:45:00');
                                                $datetime_2 = $data['end_time'];
                                            }

                                            $start_datetime = new DateTime($datetime_1);
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            if ($datetime_2 != '') {
                                                $description = "tea session start";
                                                $query = "SELECT track_id FROM time_track WHERE user_id='$user_id' AND description='$description' AND date between '$date'AND '$date2'";
                                                $query_run_for_time = mysqli_query($connection, $query);
                                                $exist_record = 0;
                                                foreach ($query_run_for_time as $time) {
                                                    $exist_record = $time['track_id'];
                                                }
                                                if ($datetime_2 < $datetime_1) {

                                            ?>
                                                    <label class="col-sm-12 col-form-label text-danger">You are Earlier :
                                                        <?php echo $diff->format('%H:%i:%s');
                                                        echo " HH:MM:ss"; ?></label>
                                                    <?php
                                                    if ($exist_record == 0) {
                                                        $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                        $query_run = mysqli_query($connection, $query);
                                                    }
                                                } elseif ($datetime_2 > $datetime_1) {
                                                    ?>
                                                    <label class="col-sm-12 col-form-label text-success">You are Late :
                                                        <?php echo $diff->format('%H:%i:%s');
                                                        echo " HH:MM:ss"; ?>&#128525;
                                                    </label>
                                            <?php
                                                    if ($exist_record == 0) {
                                                        $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','0')";
                                                        $query_run = mysqli_query($connection, $query);
                                                    }
                                                }
                                            }
                                            ?>
                                            </lable>
                                            <label class="col-sm-12 col-form-label">Evening Session Start Time :
                                                07.15PM</label>
                                            <?php
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d 19:10:00');
                                            $date2 = $date1->format('Y-m-d 20:55:50');
                                            $duration = 0;
                                            $spend_time = 0;
                                            $query = "SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                            $query_run = mysqli_query($connection, $query);
                                            $datetime_1 = '';
                                            $datetime_2 = '';
                                            foreach ($query_run as $data) {
                                                $datetime_1 = date('Y-m-d 19:15:00');
                                                $datetime_2 = $data['start_time'];
                                            }

                                            $start_datetime = new DateTime($datetime_1);
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            if ($datetime_2 != '') {
                                                $description = "evening session start";
                                                $query = "SELECT track_id FROM time_track WHERE user_id='$user_id' AND description='$description' AND date between '$date'AND '$date2'";
                                                $query_run_for_time = mysqli_query($connection, $query);
                                                $exist_record = 0;
                                                foreach ($query_run_for_time as $time) {
                                                    $exist_record = $time['track_id'];
                                                }
                                                if ($datetime_2 < $datetime_1) {

                                            ?>
                                                    <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                                        <?php echo $diff->format('%H:%i:%s');
                                                        echo " HH:MM:ss"; ?>
                                                        &#128525;</label>
                                                    <?php
                                                    if ($exist_record == 0) {
                                                        $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                        $query_run = mysqli_query($connection, $query);
                                                    }
                                                } else {
                                                    ?>
                                                    <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                        <?php echo $diff->format('%H:%i:%s');
                                                        echo " HH:MM:ss"; ?>
                                                    </label>
                                            <?php
                                                    if ($exist_record == 0) {
                                                        $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','0')";
                                                        $query_run = mysqli_query($connection, $query);
                                                    }
                                                }
                                            }
                                            ?>
                                            <label class="col-sm-12 col-form-label">Evening Session End Time :
                                                08.55PM
                                                <?php
                                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $current_time = $date1->format('Y-m-d H:i:s');
                                                $date = $date1->format('Y-m-d 20:57:00');
                                                $datetime1 = new DateTime($current_time);
                                                $datetime2 = new DateTime($date);
                                                $interval = $datetime1->diff($datetime2);

                                                $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                                $date_old = $date1->format('Y-m-d 18:45:00');
                                                if ($remaining_time > 0 && $date_old < $current_time) {
                                                    // echo "</br>";
                                                    // echo " Remaining Time ";
                                                    // echo $interval->format('%H:%i');
                                                    // echo " HH:MM";
                                                }
                                                ?>
                                            </label>

                                </div>
                            </div>

                        </div>

                    </div>
                    <table id="tblexportData" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Job Description</th>
                                <th>Scanned QR code</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Spend Time Duration</th>
                                <th>Target Time Duration</th>
                                <th>Task Status</th>
                                <th>QC Status </th>
                                <th>Reject Reason</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                            $date = $date1->format('Y-m-d 00:00:00');

                            $date2 = $date1->format('Y-m-d 23:59:59');
                            $i = -1;
                            $y = 0;
                            $j = 1;
                            $spend_time = 0;
                            $performance_id = 0;
                            $query = "SELECT * FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            foreach ($query_run as $data) {
                                $i++;
                                $y = $row - $i;
                                $performance_id = $data['performance_id'];
                            ?>
                                <tr>
                                    <td><?php echo $data['job_description'] ?></td>
                                    <td><?php echo $data['qr_number'] ?></td>
                                    <td><?php echo $data['start_time'] ?></td>
                                    <td><?php echo $data['end_time'] ?></td>
                                    <td><?php echo $data['spend_time'] ?></td>
                                    <td><?php if ($data['job_description'] == 'Low Generation Function Test' || $data['job_description'] == 'High Generation Function Test') {
                                            echo "3.00 min";
                                        } elseif ($data['job_description'] == 'Windows Instalation') {
                                            echo "8.30 min";
                                        } elseif ($data['job_description'] == 'Combine') {
                                            echo "10.00 min";
                                        } ?></td>
                                    <td><?php if ($data['status'] == 0) {
                                            echo "On Going";
                                        } else {
                                            echo $j;
                                        } ?></td>
                                    <td>
                                        <?php $qr_number = $data['qr_number'];
                                        $status = 5;
                                        if ($data['job_description'] == 'Low Generation Function Test' || $data['job_description'] == 'High Generation Function Test') {
                                            $query = "SELECT * FROM qc_paper WHERE performance_id=$performance_id  ";
                                            $query_run = mysqli_query($connection, $query);
                                            foreach ($query_run as $data) {
                                                $status = $data['status'];
                                            }

                                            if ($status == 1) {
                                                echo "<lable class='text-danger'> Rejected</lable>";
                                            } elseif ($status == 0) {
                                                echo "Pass";
                                            } elseif (!empty($status)) {
                                                echo "On Going";
                                            }
                                        } else {
                                        }
                                        ?>
                                    </td>
                                    <td><?php $query = "SELECT * FROM qc_paper WHERE performance_id=$performance_id AND status='1' ";

                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $bios_lock_hp = $data['bios_lock_hp'];
                                            $bios_lock_dell = $data['bios_lock_dell'];
                                            $bios_lock_lenovo = $data['bios_lock_lenovo'];
                                            $bios_lock_other = $data['bios_lock_other'];

                                            $computrace_hp = $data['computrace_hp'];
                                            $computrace_dell = $data['computrace_dell'];
                                            $computrace_lenovo = $data['computrace_lenovo'];
                                            $computrace_other = $data['computrace_other'];

                                            $me_region_lock_hp = $data['me_region_lock_hp'];
                                            $tpm_lock_dell = $data['tpm_lock_dell'];
                                            $other_error_lenovo = $data['other_error_lenovo'];
                                            $other_error_other_brand = $data['other_error_other_brand'];

                                            $no_power = $data['power'];
                                            $no_display = $data['mb_display'];
                                            $other_issue = $data['mb_other_issue'];
                                            $bodywork = $data['bodywork'];
                                            $sanding = $data['sanding'];

                                            $a_top = $data['a_top'];
                                            $b_bazel = $data['b_bazel'];
                                            $c_palmrest = $data['c_palmrest'];
                                            $d_back_cover = $data['d_back_cover'];
                                            $keyboard = $data['keyboard'];
                                            $lcd = $data['lcd'];
                                            $webcam = $data['webcam'];
                                            $mousepad_button = $data['mousepad_button'];
                                            $mic = $data['mic'];
                                            $speaker = $data['speaker'];
                                            $wi_fi_connection = $data['wi_fi_connection'];
                                            $usb = $data['usb'];
                                            $battery = $data['battery'];
                                            $hinges_cover = $data['hinges_cover'];
                                            $ram = $data['ram'];
                                            $hdd_boot = $data['hard_disk_boot'];
                                            if ($bios_lock_hp == 'lock') {
                                                echo "Bios Lock </br>";
                                            }
                                            if ($bios_lock_dell == 'lock') {
                                                echo "Bios Lock </br>";
                                            }
                                            if ($bios_lock_lenovo == 'lock') {
                                                echo "Bios Lock</br>";
                                            }
                                            if ($bios_lock_other == 'lock') {
                                                echo "Bios Lock</br>";
                                            }
                                            if ($computrace_hp == 'active') {
                                                echo "Computrace Lock</br>";
                                            }
                                            if ($computrace_dell == 'activated' || $computrace_dell == 'disable') {
                                                echo "Computrace Lock</br>";
                                            }
                                            if ($computrace_lenovo == 'lock') {
                                                echo "Computrace Lock</br>";
                                            }
                                            if ($computrace_other == 'lock') {
                                                echo "Computrace Lock</br>";
                                            }
                                            if ($me_region_lock_hp == 'lock') {
                                                echo "ME Region Lock</br>";
                                            }
                                            if ($tpm_lock_dell == 'not ok') {
                                                echo "TPM Lock</br>";
                                            }
                                            if ($other_error_lenovo == 'have') {
                                                echo "Other Error Lenovo</br>";
                                            }
                                            if ($other_error_other_brand == 'no') {
                                                echo "Other Error</br>";
                                            }
                                            if ($no_power == 'reject') {
                                                echo "No Power</br>";
                                            }
                                            if ($no_display == 'reject') {
                                                echo "No Display Issue</br>";
                                            }
                                            if ($other_issue == 'have') {
                                                echo "Motherboard other Error</br>";
                                            }
                                            if ($a_top == 'reject') {
                                                echo "A/Top Cover(Scratch/Broken/Dent)</br>";
                                            }
                                            if ($b_bazel == 'b_bazel') {
                                                echo "B/bazel(Scratch/Brocken/Logo/Color)</br>";
                                            }
                                            if ($c_palmrest == 'reject') {
                                                echo "C/Palmrest (Scratch/Broken/Dent)</br>";
                                            }
                                            if ($d_back_cover == 'reject') {
                                                echo "D/Back Cover (Scratch/Broken/Dent)</br>";
                                            }
                                            if ($keyboard == 'reject') {
                                                echo "Keyboard(Function/ Key missing / Color)</br>";
                                            }
                                            if ($lcd == 'reject') {
                                                echo "LCD (Whitespot/Scratch/Broken/Line/Yellow shadow)</br>";
                                            }
                                            if ($webcam == 'reject') {
                                                echo "Webcam</br>";
                                            }
                                            if ($mousepad_button == 'reject') {
                                                echo "Mousepad & Button</br>";
                                            }
                                            if ($mic == 'reject') {
                                                echo "Microphone (MIC)</br>";
                                            }
                                            if ($speaker == 'reject') {
                                                echo "Speaker / Sound</br>";
                                            }
                                            if ($wi_fi_connection == 'reject') {
                                                echo "Wi-Fi Connection</br>";
                                            }
                                            if ($usb == 'reject') {
                                                echo "USB Port</br>";
                                            }
                                            if ($battery == 'bad') {
                                                echo "Battery Health</br>";
                                            }
                                            if ($hinges_cover == 'reject') {
                                                echo "Hinges Cover</br>";
                                            }
                                            if ($bodywork == 'reject') {
                                                echo "Bodywork</br>";
                                            }
                                            if ($sanding == 'reject') {
                                                echo "Sanding</br>";
                                            }
                                            if ($ram == 'not match') {
                                                echo "Ram missed match</br>";
                                            }
                                            if ($hdd_boot == 'not ok') {
                                                echo "HDD is not booting</br>";
                                            }
                                        }
                                        ?>
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

<div class="modal fade " id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12 ">
                QC Final Result
            </div>

            <?php
            $search_value;
            if (isset($_POST['submit1'])) {

                $scanned_qr = '0';
                $scanned_mfg = '0';
                $status = 5;
                $scanned_qr = trim($_POST['qr']);
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
                $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND job_description = '$job_description' AND status='0' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $data) {
                    $performance_id = $data['performance_id'];
                    $start_time = $data['start_time'];
                    $end_time = $data['end_time'];
                    $previous_job_description .= $data['job_description'] . ",";
                    $status = $data['status'];
                }
                $test = 0;
                $same_jd_count = 0;
                $test = explode(",", $previous_job_description);
                foreach ($test as $a) {
                    if ($a == $job_description) {
                        $same_jd_count++;
                    }
                }
                if ($status == 0 && $same_jd_count == 1) {

                    if ($job_description == 'Low Generation Function Test' || $job_description == 'High Generation Function Test' || $job_description == 'High Generation Function Test + MFG') {
                        echo "<script>
                                    $(window).load(function() {
                                        $('#myModal3').modal('show');
                                    });
                                    </script>";
                    } else {
                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                        $date = $date1->format('Y-m-d H:i:s');
                        $working_time_in_seconds = strtotime($date) - strtotime($start_time);
                        $duration = round($working_time_in_seconds / 60) * 100;
                        $query = "UPDATE
                                    `performance_record_table`
                                    SET
                                    `end_time` = '$date',
                                    `spend_time` = '$duration',
                                    status='1'
                                WHERE performance_id = $performance_id";

                        $query_run = mysqli_query($connection, $query);
                        header('Location: qc_performance_record.php');
                    }
                } elseif ($same_jd_count == 0) {

                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                    $start_date = $date1->format('Y-m-d H:i:s');
                    $target = 0;

                    if ($job_description == "Low Generation Function Test") {
                        $target = 1;
                    } elseif ($job_description == "High Generation Function Test") {
                        $target = 1;
                    } elseif ($job_description == "Windows Instalation") {
                        $target = 2.8;
                    } elseif ($job_description == "Combine") {
                        $target = 3.3;
                    } elseif ($job_description == "High Generation Function Test + MFG") {
                        $target = 2;
                    }

                    $query = "INSERT INTO `performance_record_table`(
                                    `user_id`,
                                    `department_id`,
                                    `qr_number`,
                                    `job_description`,
                                    `start_time`,
                                    `target`,
                                    status
                                )
                                VALUES(
                                    '$user_id',
                                    '$department_id',
                                    '$scanned_qr',
                                    '$job_description',
                                    '$start_date',
                                    '$target',
                                    '0'
                                ) ";
                    $query_run = mysqli_query($connection, $query);
                    header('Location: qc_performance_record.php');
                } elseif ($end_time != "0000-00-00 00:00:00" && $same_jd_count != 0) {

                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                    $start_date = $date1->format('Y-m-d H:i:s');
                    $target = 0;

                    if ($job_description == "Low Generation Function Test") {
                        $target = 1;
                    } elseif ($job_description == "High Generation Function Test") {
                        $target = 1;
                    }

                    $query = "INSERT INTO `performance_record_table`(
                                    `user_id`,
                                    `department_id`,
                                    `qr_number`,
                                    `job_description`,
                                    `start_time`,
                                    `target`,
                                    status
                                )
                                VALUES(
                                    '$user_id',
                                    '$department_id',
                                    '$scanned_qr',
                                    '$job_description',
                                    '$start_date',
                                    '$target',
                                    '0'
                                ) ";
                    $query_run = mysqli_query($connection, $query);
                    header('Location: qc_performance_record.php');
                } elseif ($end_time == "0000-00-00 00:00:00" && ($same_jd_count != 0 || $same_jd_count != 1)) {
                    echo "<script>
                            $(window).load(function() {
                                $('#myModal3').modal('show');
                            });
                            </script>";
                } else {
                    echo '<script>alert("Already you completed this machine under this job description ")</script>';
                }
            }
            ?>
            <form action="#" method="POST">
                <div class="modal-body ">
                    <div class="grid-margin  justify-content-center mx-auto mt-2">

                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li><a data-toggle="tab" href="#hp" name="brand">HP</a>
                                </li>
                                <li><a data-toggle="tab" href="#dell">DELL</a>
                                </li>
                                <li><a data-toggle="tab" href="#lenovo">LENOVO</a>
                                </li>
                                <li><a data-toggle="tab" href="#other">OTHER
                                        BRAND</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="hp" class="tab-pane fade in active col-sm-12">
                                    <h3>HP</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">BIOS Lock </p>
                                        <input type="radio" id="bios_lock_hp" name="bios_lock_hp" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_hp" name="bios_lock_hp" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">Computrace / Absolute Software Lock</p>
                                        <input type="radio" id="computrace_hp" name="computrace_hp" value="active">
                                        <label class="label_values my-1" for="xeon">Activated
                                        </label>
                                        <input type="radio" id="computrace_hp" name="computrace_hp" value="inactive" checked>
                                        <label class="label_values my-1">Inactive </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">Me Region Lock</p>
                                        <input type="radio" id="me_region_lock_hp" name="me_region_lock_hp" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="me_region_lock_hp" name="me_region_lock_hp" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                </div>
                                <div id="dell" class="tab-pane fade">
                                    <h3>DELL</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_dell" name="bios_lock_dell" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_dell" name="bios_lock_dell" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell" value="active">
                                        <label class="label_values my-1" for="xeon">Active
                                        </label>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell" value="disable">
                                        <label class="label_values my-1">Disable </label>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell" value="deactivate" checked>
                                        <label class="label_values my-1">Deactivate </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">TPM Lock</p>
                                        <input type="radio" id="tpm_lock_dell" name="tpm_lock_dell" value="not ok">
                                        <label class="label_values my-1" for="xeon">Not OK
                                        </label>
                                        <input type="radio" id="tpm_lock_dell" name="tpm_lock_dell" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                </div>
                                <div id="lenovo" class="tab-pane fade">
                                    <h3>LENOVO</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_lenovo" name="bios_lock_lenovo" value="lock">
                                        <label class="label_values my-1">Lock </label>
                                        <input type="radio" id="bios_lock_lenovo" name="bios_lock_lenovo" value="ok" checked>
                                        <label class="label_values my-1" for="xeon">OK
                                        </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_lenovo" name="computrace_lock_lenovo" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="computrace_lock_lenovo" name="computrace_lock_lenovo" value="ok" checked>
                                        <label class="label_values my-1">Ok </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Any Other Error</p>
                                        <input type="radio" id="other_error_lenovo" name="other_error_lenovo" value="have">
                                        <label class="label_values my-1" for="xeon">Have
                                        </label>
                                        <input type="radio" id="other_error_lenovo" name="other_error_lenovo" value="no_have" checked>
                                        <label class="label_values my-1">No Have </label>
                                    </div>
                                </div>
                                <div id="other" class="tab-pane fade">
                                    <h3>OTHER BRAND</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_other" name="bios_lock_other" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_other" name="bios_lock_other" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_other" name="computrace_lock_other" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="computrace_lock_other" name="computrace_lock_other" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Any Other Error</p>
                                        <input type="radio" id="other_error_other_brand" name="other_error_other_brand" value="no_have" checked>
                                        <label class="label_values my-1">No Have </label>
                                        <input type="radio" id="other_error_other_brand" name="other_error_other_brand" value="have">
                                        <label class="label_values my-1" for="xeon">Have
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label"> Power(Motherboard Issue)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="no_power" name="no_power" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="no_power" name="no_power" value="reject">
                                <label class="label_values my-1">No </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Motherboard Display </label>
                            <div class="col-sm-4">
                                <input type="radio" id="no_display" name="no_display" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="no_display" name="no_display" value="reject">
                                <label class="label_values my-1">No </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Motherboard Other Issue</label>
                            <div class="col-sm-4">
                                <input type="radio" id="other_issue" name="other_issue" value="no_have" checked>
                                <label class="label_values my-1">No Have </label>
                                <input type="radio" id="other_issue" name="other_issue" value="have">
                                <label class="label_values my-1" for="xeon">Have
                                </label>

                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">A/Top Cover(Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="a_top" name="a_top" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="a_top" name="a_top" value="reject">
                                <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">B/bazel(Scratch/Brocken/Logo/Color)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="b_bazel" name="b_bazel" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="b_bazel" name="b_bazel" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">C/Palmrest (Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="c_palmrest" name="c_palmrest" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="c_palmrest" name="c_palmrest" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">D/Back Cover (Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="d_back_cover" name="d_back_cover" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="d_back_cover" name="d_back_cover" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Keyboard(Function/ Key missing / Color)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="keyboard" name="keyboard" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="keyboard" name="keyboard" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">LCD (Whitespot/Scratch/Broken/Line/Yellow
                                shadow)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="lcd" name="lcd" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="lcd" name="lcd" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Webcam</label>
                            <div class="col-sm-4">
                                <input type="radio" id="webcam" name="webcam" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="webcam" name="webcam" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Mousepad & Button</label>
                            <div class="col-sm-4">
                                <input type="radio" id="mousepad_button" name="mousepad_button" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="mousepad_button" name="mousepad_button" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Microphone (MIC)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="mic" name="mic" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="mic" name="mic" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Speaker / Sound</label>
                            <div class="col-sm-4">
                                <input type="radio" id="speaker" name="speaker" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="speaker" name="speaker" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Wi-Fi Connection</label>
                            <div class="col-sm-4">
                                <input type="radio" id="wi_fi_connection" name="wi_fi_connection" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="wi_fi_connection" name="wi_fi_connection" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">USB Port</label>
                            <div class="col-sm-4">
                                <input type="radio" id="usb" name="usb" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="usb" name="usb" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Battery Health</label>
                            <div class="col-sm-4">
                                <input type="radio" id="battery" name="battery" value="excellent" checked>
                                <label class="label_values my-1" for="xeon">Excellent</lable>
                                    <input type="radio" id="battery" name="battery" value="good">
                                    <label class="label_values my-1">Good </label>
                                    <input type="radio" id="battery" name="battery" value="bad">
                                    <label class="label_values my-1">Bad </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Hinges Cover</label>
                            <div class="col-sm-4">
                                <input type="radio" id="hinges_cover" name="hinges_cover" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="hinges_cover" name="hinges_cover" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">HDD Boot</label>
                            <div class="col-sm-4">
                                <input type="radio" id="hdd_boot" name="hdd_boot" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="hdd_boot" name="hdd_boot" value="not ok">
                                    <label class="label_values my-1">Not Ok </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">RAM</label>
                            <div class="col-sm-4">
                                <input type="radio" id="ram" name="ram" value="match" checked>
                                <label class="label_values my-1" for="xeon">Match
                                    <input type="radio" id="ram" name="ram" value="not match">
                                    <label class="label_values my-1">Not Match </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Bodywork</label>
                            <div class="col-sm-4">
                                <input type="radio" id="bodywork" name="bodywork" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="bodywork" name="bodywork" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Sanding</label>
                            <div class="col-sm-4">
                                <input type="radio" id="sanding" name="sanding" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="sanding" name="sanding" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>


                        <input type="hidden" name="job_description" value="<?php echo $job_description ?>">
                        <input type="hidden" name="search_value" value="<?php echo $search_value ?>">
                        <button type="submit" name="submit" id="submit" class="btn btn-default bg-gradient-success btn-next float-right"> Confirm
                        </button>
                    </div>
                </div>
            </form>
            <?php if (isset($_POST['submit'])) {
                $bios_lock_hp = 'null';
                $bios_lock_dell = 'null';
                $bios_lock_lenovo = 'null';
                $bios_lock_other = 'null';
                $computrace_hp = 'null';
                $computrace_dell = 'null';
                $computrace_lenovo = 'null';
                $computrace_other = 'null';
                $me_region_lock_hp = 'null';
                $tpm_lock_dell = 'null';
                $other_error_lenovo = 'null';
                $other_error_other_brand = 'null';
                $a_top = 'null';
                $b_bazel = 'null';
                $c_palmrest = 'null';
                $d_back_cover = 'null';
                $keyboard = 'null';
                $lcd = 'null';
                $webcam = 'null';
                $mousepad_button = 'null';
                $mic = 'null';
                $speaker = 'null';
                $wi_fi_connection = 'null';
                $ram = 'null';
                $hdd_boot = 'null';
                $usb = 'null';
                $battery = 'null';
                $hinges_cover = 'null';
                $search_value = $_POST['search_value'];
                $job_description = $_POST['job_description'];

                $bios_lock_hp = $_POST['bios_lock_hp'];
                $bios_lock_dell = $_POST['bios_lock_dell'];
                $bios_lock_lenovo = $_POST['bios_lock_lenovo'];
                $bios_lock_other = $_POST['bios_lock_other'];

                $computrace_hp = $_POST['computrace_hp'];
                $computrace_dell = $_POST['computrace_lock_dell'];
                $computrace_lenovo = $_POST['computrace_lock_lenovo'];
                $computrace_other = $_POST['computrace_lock_other'];

                $me_region_lock_hp = $_POST['me_region_lock_hp'];
                $tpm_lock_dell = $_POST['tpm_lock_dell'];
                $other_error_lenovo = $_POST['other_error_lenovo'];
                $other_error_other_brand = $_POST['other_error_other_brand'];

                $no_power = $_POST['no_power'];
                $no_display = $_POST['no_display'];
                $other_issue = $_POST['other_issue'];
                $bodywork = $_POST['bodywork'];
                $sanding = $_POST['sanding'];

                $a_top = $_POST['a_top'];
                $b_bazel = $_POST['b_bazel'];
                $c_palmrest = $_POST['c_palmrest'];
                $d_back_cover = $_POST['d_back_cover'];
                $keyboard = $_POST['keyboard'];
                $lcd = $_POST['lcd'];
                $webcam = $_POST['webcam'];
                $mousepad_button = $_POST['mousepad_button'];
                $mic = $_POST['mic'];
                $speaker = $_POST['speaker'];
                $wi_fi_connection = $_POST['wi_fi_connection'];
                $ram = $_POST['ram'];
                $hdd_boot = $_POST['hdd_boot'];
                $usb = $_POST['usb'];
                $battery = $_POST['battery'];
                $hinges_cover = $_POST['hinges_cover'];
                $status = 0;
                $performance_id = 0;
                $query = "SELECT performance_id FROM performance_record_table WHERE qr_number='$search_value' ORDER BY performance_id DESC LIMIT 1 ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $data) {
                    $performance_id = $data['performance_id'];
                }

                $working_time_in_seconds;
                $start_time = 0000 - 00 - 00;
                $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND job_description = '$job_description' ";
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
                 `spend_time` = '$duration',
                 `status`=1
             WHERE performance_id = $performance_id";
                $query_run = mysqli_query($connection, $query);
                //  header('Location: qc_performance_record.php');
                $reject_person = 'null';
                $rejection_department = '';
                if ($lcd == 'reject') {
                    $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='10' AND job_description='Remove LCD'";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $data) {
                        $reject_person = $data['user_id'];
                        $rejection_department = 10;
                    }
                    if ($reject_person == 'null') {
                        $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='1' AND job_description='Put RAM + Hard Disk + Test' AND job_description='Combine+ Test'";
                        $query_run = mysqli_query($connection, $query);

                        foreach ($query_run as $data) {
                            $reject_person = $data['user_id'];
                            $rejection_department = 1;
                        }
                    }
                }
                if (
                    $bios_lock_hp != 'ok' || $bios_lock_dell != 'ok' || $bios_lock_lenovo != 'ok' || $bios_lock_other != 'ok' || $computrace_hp != 'inactive' ||
                    $computrace_dell != 'deactivate' || $computrace_lenovo != 'ok' || $computrace_other != 'ok' || $me_region_lock_hp != 'ok' || $tpm_lock_dell != 'ok' ||
                    $other_error_lenovo != 'no_have' || $other_error_other_brand != 'no_have'
                ) {
                    $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='9' ORDER BY performance_id DESC LIMIT 1";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $data) {
                        $reject_person = $data['user_id'];
                        $rejection_department = 9;
                    }
                    if ($reject_person == 'null') {
                        $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='1'AND job_description='Put RAM + Hard Disk + Test' AND job_description='Combine+ Test'";
                        $query_run = mysqli_query($connection, $query);

                        foreach ($query_run as $data) {
                            $reject_person = $data['user_id'];
                            $rejection_department = 1;
                        }
                    }
                }
                if (
                    $bios_lock_hp != 'ok' || $bios_lock_dell != 'ok' || $bios_lock_lenovo != 'ok' || $bios_lock_other != 'ok' || $computrace_hp != 'inactive' ||
                    $computrace_dell != 'deactivate' || $computrace_lenovo != 'ok' || $computrace_other != 'ok' || $me_region_lock_hp != 'ok' || $tpm_lock_dell != 'ok' ||
                    $other_error_lenovo != 'no_have' || $other_error_other_brand != 'no_have' || $a_top != 'ok' || $lcd != 'ok' || $b_bazel != 'ok' || $no_power != 'ok' || $no_display != 'ok' || $other_issue != 'no_have' || $c_palmrest != 'ok' || $d_back_cover != 'ok' ||
                    $keyboard != 'ok' || $webcam != 'ok' || $mousepad_button != 'ok' || $mic != 'ok' || $speaker != 'ok' || $wi_fi_connection != 'ok' ||
                    $usb != 'ok' || $battery == 'bad' || $ram != 'match' || $hdd_boot != 'ok' || $hinges_cover != 'ok' || $bodywork != 'ok' || $sanding != 'ok'
                ) {

                    $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='1' AND job_description='Put RAM + Hard Disk + Test' AND job_description='Combine+ Test'";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $data) {
                        $reject_person = $data['user_id'];
                        $rejection_department = 1;
                    }
                    $status = 1;
                }
                $user_id = $_SESSION['user_id'];
                $department_id = $_SESSION['department'];
                $query = "INSERT INTO `qc_paper`(
                qr_number,
                `bios_lock_hp`,
                `bios_lock_dell`,
                `bios_lock_lenovo`,
                `bios_lock_other`,
                `computrace_hp`,
                `computrace_dell`,
                `computrace_lenovo`,
                `computrace_other`,
                `me_region_lock_hp`,
                `tpm_lock_dell`,
                `other_error_lenovo`,
                `other_error_other_brand`,
                `a_top`,
                `b_bazel`,
                `c_palmrest`,
                `d_back_cover`,
                `keyboard`,
                `lcd`,
                `webcam`,
                `mousepad_button`,
                `mic`,
                `speaker`,
                `wi_fi_connection`,
                `usb`,
                `battery`,
                `hinges_cover`,
                user_id,
                user_department,
                reject_person,
                rejection_department,
                status,
                performance_id,
                power,
                mb_display,
                mb_other_issue,
                bodywork,
                sanding,
                ram,
                hard_disk_boot
            )
            VALUES(
                '$search_value',
                '$bios_lock_hp',
                '$bios_lock_dell',
                '$bios_lock_lenovo',
                '$bios_lock_other',
                '$computrace_hp',
                '$computrace_dell',
                '$computrace_lenovo',
                '$computrace_other',
                '$me_region_lock_hp',
                '$tpm_lock_dell',
                '$other_error_lenovo',
                '$other_error_other_brand',
                '$a_top',
                '$b_bazel',
                '$c_palmrest',
                '$d_back_cover',
                '$keyboard',
                '$lcd',
                '$webcam',
                '$mousepad_button',
                '$mic',
                '$speaker',
                '$wi_fi_connection',
                '$usb',
                '$battery',
                '$hinges_cover',
                '$user_id',
                '$department_id',
                '$reject_person',
                '$rejection_department',
                '$status',
                '$performance_id',
                '$no_power',
                '$no_display',
                '$other_issue',
                '$bodywork',
                '$sanding',
                '$ram',
                '$hdd_boot'
            )";
                $query_run = mysqli_query($connection, $query);
                header('Location: qc_performance_record.php');
            } ?>

        </div>
    </div>
</div>
<div class="modal fade " id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12 ">
                Previous Work not Complete
            </div>
            <form method="POST">
                <?php $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $date = $date1->format('Y-m-d 00:00:00');
                $query = "SELECT qr_number,performance_id FROM performance_record_table WHERE user_id ='$user_id'AND status ='0'AND start_time between '$date'AND '$last_login_time' ";
                $query_run = mysqli_query($connection, $query);
                foreach ($query_run as $data) {
                    $last_qr_number = $data['qr_number'];
                    $performance_id = $data['performance_id'];
                } ?>
                <h1><?php echo "Please Complete Your Last Unit !! </br> This is the QR number in that unit";

                    echo " " . $last_qr_number;
                    ?></h1>

                <input type="hidden" name="performance_id" value="<?php echo $performance_id ?>">
                <button type="submit" name="submit2" id="submit2" class="btn btn-default bg-gradient-success btn-next float-right"> Confirm
                </button>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit2'])) {
    $performance_id = $_POST['performance_id'];
    $query = "UPDATE
    `performance_record_table`
    SET
    `previous_work` = '$last_login_time'
WHERE performance_id = $performance_id";
    $query_run = mysqli_query($connection, $query);
    header('Location: qc_performance_record.php');
}
?>


<style>
    [type="text"] {
        height: 22px;
        margin-top: 4px;
        font-size: 14px;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        font-size: 12px;
        padding: 10px;
        font-family: "Poppins", sans-serif;
        color: #000 !important;
    }

    .col-form-label {
        font-size: 20px;
    }
</style>
<?php include_once '../includes/footer.php'; ?>
<script>
    let searchbar = document.querySelector('input[name="qr"]');
    searchbar.focus();
    search.value = '';
</script>