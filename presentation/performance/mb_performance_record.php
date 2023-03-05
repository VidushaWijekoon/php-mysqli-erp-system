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
if (empty($_GET['id'])) {
} else {
    $qr_id = $_GET['id'];
    $p_id = $_GET['p_id'];
    echo "<script>
                                    $(window).load(function() {
                                        $('#myModal4').modal('show');
                                    });
                                    </script>";
}
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$department_id = $_SESSION['department'];


$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
date_default_timezone_set('Asia/Dubai');
$timestamp1 = strtotime(date('Y-m-d 8:59:55'));
$timestamp2 = strtotime(date('Y-m-d 13:56:50'));
$timestamp3 = strtotime(date('Y-m-d 18:47:00'));
$timestamp4 = strtotime(date('Y-m-d 20:57:00'));
$_SESSION['expire0'] = $timestamp1;
$_SESSION['expire1'] = $timestamp2;
$_SESSION['expire2'] = $timestamp3;
$_SESSION['expire3'] = $timestamp4;
$now = time();
// later
//   $after_tea_timestart =strtotime(date('Y-m-d 18:44:00'));
//   $after_tea_timeend=strtotime(date('Y-m-d 20:57:00'));
//   $after_lunch_timestart =strtotime(date('Y-m-d 14:59:00'));
//   $after_lunch_timeend=strtotime(date('Y-m-d 18:17:00'));
//   $morning_session_timestart =strtotime(date('Y-m-d 18:59:00'));
//   $morning_session_timeend=strtotime(date('Y-m-d 19:37:00'));
if (strtotime(date('Y-m-d 08:00:00')) < $now && $now > $_SESSION['expire0'] && $now < strtotime(date('Y-m-d 9:00:00'))) {
    // header("Location: ../../index.php");
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    // session_start();
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 09:00:00')) < $now && $now > $_SESSION['expire1'] && $now < strtotime(date('Y-m-d 15:00:00'))) {
    // header("Location: ../../index.php");
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    // session_start();
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 15:00:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:146:50'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 19:10:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:50'))) {
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

<div class="row ">

    <?php if ($user_role == 9) {
        if ($department_id == 10) {
    ?>

            <div class=" col col-sm-6 col-md-3">
                <?php
                $date = date('Y-m-d 00:00:00');
                $date2 = date('Y-m-d 23:59:59');
                $start_time = $date;
                $end_time = $date2; ?>
                <a href="lcd_temp.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Team Leader Dashboard
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
        <?php }
        if ($department_id == 13) { ?>
            <div class="col col-sm-6 col-md-3">
                <?php
                $date = date('Y-m-d 00:00:00');
                $date2 = date('Y-m-d 23:59:59');
                $start_time = $date;
                $end_time = $date2; ?>
                <a href="packing_department.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Packing <?php echo $_SESSION['role_id'] ?>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
        <?php } ?>

        <?php if ($department_id == 1) { ?>
            <div class="col col-sm-6 col-md-3">
                <?php
                $date = date('Y-m-d 00:00:00');
                $date2 = date('Y-m-d 23:59:59');
                $start_time = $date;
                $end_time = $date2; ?>
                <a href="production_view.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Technician Task View
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
    <?php }
    } ?>
    <?php if ($department_id == 13) { ?>
        <div class="col col-sm-6 col-md-3">
            <?php
            $date = date('Y-m-d 00:00:00');
            $date2 = date('Y-m-d 23:59:59');
            $start_time = $date;
            $end_time = $date2; ?>
            <a href="bubble_wrappping.php">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Scanned Unit Packing
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
    <?php } ?>
    <div class="col col-sm-6 col-md-3">
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
    <?php if ($department_id == 9) { ?>
        <div class="col col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Open Issue QTY From Inventory</span>
                    <span class="info-box-number">
                        <?php
                        $sql = "SELECT  COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' ";
                        $query_run = mysqli_query($connection, $sql);
                        $count = 0;
                        foreach ($query_run as $a) {
                            $count = $a['count'];
                        }
                        ?>

                        <a href="mb_issue_from_inv.php">
                            <?php
                            $sql = "SELECT  COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' AND status='1'";
                            $query_run = mysqli_query($connection, $sql);
                            foreach ($query_run as $a) {
                                echo "<div style='font-size:26px'>" . $a['count'] . " / " . $count . "</div>";
                            }
                            ?>
                        </a>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col col-sm-3 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Completed QTY For Inventory</span>
                    <span class="info-box-number">
                        <a href="mb_completed_for_inventory.php">
                            <?php
                            $sql2 = "SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' AND status='2'";
                            $query_run2 = mysqli_query($connection, $sql2);
                            foreach ($query_run2 as $a) {
                                echo "<div style='font-size:26px'>" . $a['count'] . " / " . $count . "</div>";
                            }
                            ?>
                        </a>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    <?php } ?>


    <?php if ($department_id == 1 && $user_role == 4) { ?>
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
    <?php } ?>
    <?php if ($department_id == 14 && $user_role == 4) {
        $row1 = 0;
        $row2 = 0;
        $sql = "SELECT COUNT(bat_id) as count FROM battery_request WHERE status='0'";
        $query_run = mysqli_query($connection, $sql);
        foreach ($query_run as $ab) {
            $row1 = $ab['count'];
        }
    ?>
        <div class="row">
            <div class="col col-sm-6 col-md-3">
                <a href="battery_view_team_lead.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Battery Request View
                                <?php if ($row1 > $row2) {
                                    $z = $row1 - $row2;
                                    echo "<div class='text-warning'>You have a  " . $z . "  request </div>";
                                }
                                $row2 = $row1; ?>

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <div class="col col-sm-6 col-md-3">
                <a href="completed_battery.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Daily Production Completed Task
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
            <div class="col col-sm-6 col-md-3">
                <a href="battery_flow.php">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Battery Task Flow
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </a>
            </div>
        </div>
    <?php } ?>

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
                            <?php
                            $query = "SELECT department FROM departments WHERE department_id='$department_id'";
                            $query_run = mysqli_query($connection, $query);
                            foreach ($query_run as $data) {
                                echo $data['department'];
                            }
                            ?>
                        </h1>
                        <div class="d-flex">
                            <!-- <select onchange="checkOptions(this)" name="service_type" id="service_type">
                            <option value="NULL"></option>
                            <option value="43">43</option>
                            other options from your database query results displayed here
                            <option value="Other">Other</option>
                        </select> -->
                            <!-- the style attribute here has display none initially, so it will be hidden by default -->

                            <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                                <form method="POST" action="mb_performance_record_save.php">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label">Job Description</label>
                                        <div class="col-sm-8 mt-2">
                                            <select name="job_description" onchange="checkOptions(this)" class="info_select w-75" id='service_type' style="border-radius: 5px;">

                                                <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                                </option>

                                                <?php if ($department_id == 9) { ?>

                                                    <option value="BIOS Lock High Gen">BIOS Lock High Gen</option>
                                                    <option value="BIOS Lock Low Gen">BIOS Lock Low Gen</option>
                                                    <option value="No Power / No Display / Account Lock/ Ports Issue">No
                                                        Power /
                                                        No
                                                        Display
                                                        /
                                                        Account Lock/ Ports Issue</option>
                                                <?php } ?>
                                            </select>


                                        </div>
                                    </div>

                                    <div class=" row">
                                        <label class="col-sm-4 col-form-label">Scan Alsakb QR Code</label>
                                        <div class="col-sm-8">
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
                                    <?php if (($department_id == 1 && $user_role != 9) || ($department_id != 1)) { ?>
                                        <div class="row">
                                            <label class="col-sm-6 col-form-label">Remaining Target Points</label>
                                            <div class="col-sm-4 mt-2" style="font-size:16px">
                                                <?php $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";

                                                $query_run = mysqli_query($connection, $query);
                                                $sum = 0;
                                                if ($department_id == 9) {
                                                    $target = 100;
                                                }
                                                foreach ($query_run as $data) {
                                                    $sum = $data['target_sum'];
                                                }

                                                $final_target = $target - $sum;
                                                echo $final_target;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-6 col-form-label">point view</label>
                                            <div class="col-sm-4 mt-2" style="font-size:16px">
                                                <?php $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";
                                                $query_run = mysqli_query($connection, $query);
                                                $sum = 0;
                                                if ($department_id == 9) {
                                                    echo "BIOS Lock High Gen 1.66 point per unit/BIOS Lock Low Gen 2.85 point per unit/Other 4 point per unit ";
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                    <input type="hidden" name="user_role" value="<?php echo $user_role ?>">
                                    <input type="hidden" name="department_id" value="<?php echo $department_id ?>">
                                    <button type="submit" name="submit" id="submit" class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"></button>
                                </form>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                                <div class="text-danger">

                                    <div class="row">
                                        <label class="col-sm-12 col-form-label">Morning Session Start Time :
                                            09.05AM</label>
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
                                            $description = "morning session start";
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
                                        <label class="col-sm-12 col-form-label">Lunch Break Start Time : 01.55PM
                                            <?php
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $current_time = $date1->format('Y-m-d H:i:s');
                                            $date = $date1->format('Y-m-d 13:55:50');
                                            $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                            if ($remaining_time > 0) {
                                                // echo " Remaining Time " . round($remaining_time) . " minute";
                                            }
                                            ?>
                                        </label>
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 13:30:00');
                                        $date2 = $date1->format('Y-m-d 13:57:00');
                                        $duration = 0;
                                        $spend_time = 0;
                                        $query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY end_time DESC LIMIT 1";
                                        $query_run = mysqli_query($connection, $query);
                                        $datetime_1 = '';
                                        $datetime_2 = '';
                                        foreach ($query_run as $data) {
                                            $datetime_1 = date('Y-m-d 13:55:00');
                                            $datetime_2 = $data['end_time'];
                                        }

                                        $start_datetime = new DateTime($datetime_1);
                                        $diff = $start_datetime->diff(new DateTime($datetime_2));
                                        if ($datetime_2 != '') {
                                            $description = "Lunch Break start";
                                            $query = "SELECT track_id FROM time_track WHERE user_id='$user_id' AND description='$description' AND date between '$date'AND '$date2'";
                                            $query_run_for_time = mysqli_query($connection, $query);
                                            $exist_record = 0;
                                            foreach ($query_run_for_time as $time) {
                                                $exist_record = $time['track_id'];
                                            }
                                            if ($datetime_2 < $datetime_1) {

                                        ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Earlier :
                                                    <?php
                                                    // echo $diff->i . ' Minutes';
                                                    echo $diff->format('%H:%i:%s');
                                                    echo " HH:MM:ss";
                                                    ?></label>
                                                <?php
                                                if ($exist_record == 0) {
                                                    $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                    $query_run = mysqli_query($connection, $query);
                                                }
                                            } elseif ($datetime_2 > $datetime_1) {
                                                ?>
                                                <label class="col-sm-12 col-form-label text-success">You are Late :
                                                    <?php echo $diff->format('%H:%i:%s');
                                                    echo " HH:MM:ss"; ?>
                                                    &#128525;
                                                </label>
                                        <?php
                                                if ($exist_record == 0) {
                                                    $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','0')";
                                                    $query_run = mysqli_query($connection, $query);
                                                }
                                            }
                                        }
                                        ?>

                                        <label class="col-sm-12 col-form-label">Afternoon Session Start Time :
                                            03.05PM</label>
                                        <?php
                                        $date = date('Y-m-d 15:00:00');
                                        $date2 = date('Y-m-d 18:15:00');
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
                                            $description = "afternoon session start";
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
                                        } ?>
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
                                            <label class="col-sm-12 col-form-label">Evening Session End Time : 08.55PM
                                                <?php
                                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                                $current_time = $date1->format('Y-m-d H:i:s');
                                                $date = $date1->format('Y-m-d 20:55:50');
                                                $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                                $date_old = $date1->format('Y-m-d 18:45:00');
                                                if ($remaining_time > 0 && $date_old < $current_time) {
                                                    // echo " Remaining Time " . round($remaining_time) . " minute";
                                                }
                                                ?>
                                            </label>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php if (($department_id != 1) || ($department_id == 1 && $user_role != 9)) { ?>
                            <table id="tblexportData" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Job Description</th>

                                        <?php if ($department_id != 10) { ?>
                                            <th>Scanned QR code</th>
                                        <?php } elseif ($department_id == 10) { ?>
                                            <th>Scanned QR code / PN Code</th>
                                        <?php } ?>

                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Time Duration</th>
                                        <th>completed qty</th>
                                        <th>Target</th>

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

                                                echo $data['qr_number'];
                                                ?></td>
                                            <td><?php echo $data['start_time'] ?></td>
                                            <td><?php echo $data['end_time'] ?></td>
                                            <td><?php echo $data['spend_time'] ?></td>
                                            <td><?php if ($data['end_time'] == '0000-00-00 00:00:00') {
                                                    echo "Not complete";
                                                } else {
                                                    echo $j;
                                                } ?></td>
                                            <td><?php
                                                if ($data['target'] == 0.00) {
                                                    echo $data['target'];
                                                    echo " ( Rejected Item ) ";
                                                } else {
                                                    echo $data['target'];
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php $y = 0;
                                    } ?>

                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (strtotime(date('2023-04-20 12:59:00')) < $now) {
        // header("Location: ../../index.php");
        $query = "DELETE FROM `warehouse_information_sheet`";
        $query_run = mysqli_query($connection, $query);
        session_destroy();
        echo "<p align='center'>Session has been destroyed!!";
        // session_start();
        header("Location: ../../index.php");
    }

    ?>
    <script>
        // var time = new Date();
        // var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time.getHours() + ":" +
        //     time
        //     .getMinutes() + ":" + time.getSeconds();
        // document.getElementById("time").textContent = today;

        let searchbar = document.querySelector('input[name="qr"]');
        searchbar.focus();
        search.value = '';

        var otherInput;

        var otherInput;

        function checkOptions(select) {
            otherInput = document.getElementById('lable');
            div = document.getElementById('myCheck');
            if (select.options[select.selectedIndex].value == "Remove LCD") {
                otherInput.style.display = 'block';
                div.style.display = 'block';

            } else {
                otherInput.style.display = 'none';
                div.style.display = 'none';
            }
        }

        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var otherInput = document.getElementById('otherInput');
            var text = document.getElementById("text1");
            if (checkBox.checked == true) {
                text.style.display = "block";
                otherInput.style.display = 'block';
            } else {
                text.style.display = "none";
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
    <?php include_once '../includes/footer.php'; ?>
    <!-- ////////////////////////////////////////////////////////////////////////////// -->
    <script type="text/javascript">
        $('#otherInput').keydown(function(e) {
            if (e.keyCode == 13) { // barcode scanned!
                $('#qr').focus();
                return false; // block form from being submitted yet
            }
        });
    </script>
    <!-- ////////////////////////////////////////////////////////////////////////////////// -->
    <div class="modal fade " id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header col-lg-12 ">
                    Previous Work not Complete
                </div>
                <form method="POST">
                    <div class="col-sm-12 ">
                        <h4 class="col-lg-8 ">Fixed</h4>
                        <input type="checkbox" id="fixed" name="fixed">
                    </div>
                    <div class="col-sm-12 ">
                        <h4 class="col-lg-8 ">Can not Fixed</h4>
                        <input type="checkbox" id="no_fixed" name="no_fixed">
                    </div>
                    <button type="submit" name="submit2" id="submit2" class="btn btn-default bg-gradient-success btn-next float-right"> Confirm
                    </button>
                </form>
                <?php
                if (isset($_POST['submit2'])) {
                    if (empty($_POST['no_fixed'])) {
                        header("Location: mb_performance_record.php");
                    } else {
                        $can_not_fixed = $_POST['no_fixed'];

                        if ($can_not_fixed == 'on') {
                            $can_not_fixed = "can not fix";
                        }
                        $sql = "UPDATE issue_laptops SET remark='$can_not_fixed' WHERE alsakb_qr='$qr_id'";
                        $sql_run = mysqli_query($connection, $sql);
                        echo $sql . "<br>";
                        $sql = "UPDATE performance_record_table SET status ='3',target='0' WHERE performance_id='$p_id'";
                        $sql_run = mysqli_query($connection, $sql);
                        echo $sql . "<br>";
                        $sql = "UPDATE warehouse_information_sheet SET remarks ='motherboard issue can not fix' WHERE inventory_id='$qr_id'";
                        $sql_run = mysqli_query($connection, $sql);
                        echo $sql . "<br>";
                        header("Location: mb_performance_record.php");
                    }
                }
                ?>
            </div>
        </div>
    </div>