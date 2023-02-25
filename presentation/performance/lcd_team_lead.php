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
$test_id = 0;
$test_name = 0;
if (empty($_GET['user_id'])) {
} else {
    $test_id = $_GET['user_id'];
    $test_name = $_GET['username'];
    if ($test_id != 0) {
        echo "<script>
    $(window).load(function() {
        $('#myModal69').modal('show');
    });
    </script>";
    }
}
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$department_id = $_SESSION['department'];
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
        if ($last_qr_number != '0') {
            echo "<script>
                                    $(window).load(function() {
                                        $('#myModal4').modal('show');
                                    });
                                    </script>";
        }
    }
}
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
date_default_timezone_set('Asia/Dubai');
$timestamp2 = strtotime(date('Y-m-d 13:57:00'));
$timestamp3 = strtotime(date('Y-m-d 18:17:00'));
$timestamp4 = strtotime(date('Y-m-d 20:57:00'));

$_SESSION['expire1'] = $timestamp2;
$_SESSION['expire2'] = $timestamp3;
$_SESSION['expire3'] = $timestamp4;
$now = time();
// $enddate = 1682064000;
if (strtotime(date('Y-m-d 08:59:00')) < $now && $now > $_SESSION['expire1'] && $now < strtotime(date('Y-m-d 14:59:00'))) {
    // header("Location: ../../index.php");
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    // session_start();
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 14:59:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:15:50'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 18:44:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:50'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
}
// if ($enddate < $now) {
//     session_destroy();
//     echo "<p align='center'>Session has been destroyed!!";
//     header("Location: ../../index.php");
// }
?>

<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row ">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto ">
            <div class="card mt-3">
                <div class="card-body">
                    <?php $query = "SELECT job_description,technician_id FROM performance_record_table WHERE user_id ='$user_id' ORDER BY performance_id DESC LIMIT 1";
                    $query_run = mysqli_query($connection, $query);
                    $last_job = '';
                    $last_technician = '';
                    if (empty($query_run)) {
                    } else {
                        foreach ($query_run as $data) {
                            $last_job = $data['job_description'];
                            $last_technician = $data['technician_id'];
                        }
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
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <form method="POST" action="pro_teamlead_save.php">
                                <!-- <div class="row">
                                    <label class="col-sm-4 col-form-label">Job Description</label>
                                    <div class="col-sm-8 mt-2">
                                        <select onchange="checkOptions(this)" name="job_description"
                                            class="info_select w-75" style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>
                                            <option value="send to Remove lcd">Send to Remove LCD
                                            </option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <label class="col-sm-4 col-form-label">Technician ID</label>
                                    <div class="col-sm-8 mt-2">
                                        <select onchange="checkOptions(this)" name="technician_id"
                                            class="info_select w-75" style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_technician ?>">
                                                <?php echo $last_technician ?>
                                            </option>
                                            <?php $query = "SELECT username FROM users WHERE department='10' AND role='4'";
                                            $sql_run = mysqli_query($connection, $query);
                                            foreach ($sql_run as $data) {
                                            ?>
                                            <option value="<?php echo $data['username'] ?>">
                                                <?php echo $data['username'] ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class=" row">
                                    <label class="col-sm-4 col-form-label">Scan QR Code OR MFG</label>
                                    <div class="col-sm-8">
                                        <input class="w-75" style="color:black !important" type="text" id="qr" name="qr"
                                            placeholder=" scan qr code here">
                                    </div>
                                </div> -->
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Start Time</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <span id='time'></span>

                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today Completed QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">

                                        <?php
                                        $date = date('Y-m-d 00:00:00');
                                        $date2 = date('Y-m-d 23:59:59');
                                        $count = 0;
                                        $query = "SELECT COUNT(performance_id) as count FROM performance_record_table WHERE job_description='Install LCD' AND status='1' AND end_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $data) {
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <input type="hidden" name="user_role" value="<?php echo $user_role ?>">
                                <input type="hidden" name="department_id" value="<?php echo $department_id ?>">
                                <button type="submit" name="submit" id="submit" class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"></button>
                            </form>
                            <div class="row">
                                <label class="col-sm-6 col-form-label">LCD Rack Available QTY</label>
                                <div class="col-sm-4 mt-2" style="font-size:16px">
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 00:00:00');
                                    $date2 = $date1->format('Y-m-d 23:59:59');
                                    $query = "SELECT COUNT(qr_number) as count FROM performance_record_table WHERE job_description='store to lcd rack' AND start_time between '$date'AND '$date2' ";
                                    $query_run = mysqli_query($connection, $query);
                                    $r_count = 0;
                                    foreach ($query_run as $data) {
                                        $r_count = $data['count'];
                                    }
                                    echo $r_count;
                                    ?>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <label class="col-sm-6 col-form-label">Completed QTY</label>
                                <div class="col-sm-4 mt-2" style="font-size:16px">
                                    <?php
                                    $query = "SELECT COUNT(qr_number) as count FROM performance_record_table WHERE (job_description='Install LCD') AND status='1' AND start_time between '$date'AND '$date2' ";
                                    $query_run = mysqli_query($connection, $query);
                                    $r_count = 0;
                                    foreach ($query_run as $data) {
                                        $r_count = $data['count'];
                                    }
                                    echo $r_count;
                                    ?>
                                </div>
                            </div> -->
                            <div class="row">
                                <label class="col-sm-6 col-form-label">OnGoing QTY</label>
                                <div class="col-sm-4 mt-2" style="font-size:16px">
                                    <?php
                                    $query = "SELECT COUNT(qr_number) as count FROM performance_record_table WHERE (job_description='Remove LCD' OR job_description='Fixed Lcd' OR job_description='Remove Polization Film' OR job_description='Clean+Glue+Install Polization Film'OR job_description='Install LCD') AND status='0' AND start_time between '$date'AND '$date2' ";
                                    $query_run = mysqli_query($connection, $query);
                                    $r_count = 0;
                                    foreach ($query_run as $data) {
                                        $r_count = $data['count'];
                                    }
                                    echo $r_count;
                                    ?>
                                </div>
                            </div>
                            <?php
                            $query = "SELECT COUNT(qr_number) as count,job_description FROM performance_record_table WHERE department_id = '10' AND status='1' AND start_time between '$date'AND '$date2' GROUP BY job_description;  ";
                            $query_run = mysqli_query($connection, $query);

                            foreach ($query_run as $data) {

                            ?>
                                <div class="row">
                                    <label class="col-sm-10 col-form-label">
                                        <?php echo $data['job_description'] . " Completed QTY"; ?></label>
                                    <div class="col-sm-2 mt-2" style="font-size:16px">
                                        <?php echo $data['count']; ?>
                                    </div>
                                </div>
                            <?php
                            }

                            ?>

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
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute &#128525;</label>
                                            <?php
                                            if ($exist_record == 0) {
                                                $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                $query_run = mysqli_query($connection, $query);
                                            }
                                        } else {
                                            ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->h . ":" . $diff->i . ' Minutes' ?>
                                                minute</label>
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
                                            echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                    </label>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 13:30:00');
                                    $date2 = $date1->format('Y-m-d 13:55:50');
                                    $duration = 0;
                                    $spend_time = 0;
                                    $query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
                                    $query_run = mysqli_query($connection, $query);
                                    $datetime_1 = '';
                                    $datetime_2 = '';
                                    foreach ($query_run as $data) {
                                        $datetime_1 = date('Y-m-d 13:55:50');
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
                                                <?php echo $diff->i . ' Minutes' ?></label>
                                            <?php
                                            if ($exist_record == 0) {
                                                $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                $query_run = mysqli_query($connection, $query);
                                            }
                                        } else {
                                            ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->i . ' Minutes' ?>
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
                                    $date2 = date('Y-m-d 18:15:50');
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
                                                <?php echo $diff->i . ' Minutes' ?>
                                                minute &#128525;</label>
                                            <?php
                                            if ($exist_record == 0) {
                                                $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                $query_run = mysqli_query($connection, $query);
                                            }
                                        } else {
                                            ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->i . ' Minutes'; ?>
                                                minute</label>
                                    <?php
                                            if ($exist_record == 0) {
                                                $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','0')";
                                                $query_run = mysqli_query($connection, $query);
                                            }
                                        }
                                    } ?>
                                    <label class="col-sm-12 col-form-label">Tea Break Start Time : 06.15PM
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $current_time = $date1->format('Y-m-d H:i:s');
                                        $date = $date1->format('Y-m-d 18:15:50');
                                        $date_old = $date1->format('Y-m-d 15:05:00');
                                        $remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
                                        if ($remaining_time > 0 && $date_old < $current_time) {
                                            echo " Remaining Time " . round($remaining_time) . " minute";
                                        }
                                        ?>
                                    </label>
                                    <label>
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 15:45:00');
                                        $date2 = $date1->format('Y-m-d 18:15:50');
                                        $duration = 0;
                                        $spend_time = 0;
                                        $query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
                                        $query_run = mysqli_query($connection, $query);
                                        $datetime_1 = '';
                                        $datetime_2 = '';
                                        foreach ($query_run as $data) {
                                            $datetime_1 = date('Y-m-d 18:15:50');
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
                                                    <?php echo $diff->i . ' Minutes' ?></label>
                                                <?php
                                                if ($exist_record == 0) {
                                                    $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                    $query_run = mysqli_query($connection, $query);
                                                }
                                            } else {
                                                ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                    <?php echo $diff->i . ' Minutes' ?>
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
                                            06.45PM</label>
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
                                                    <?php echo $diff->i . ' Minutes' ?>
                                                    minute &#128525;</label>
                                                <?php
                                                if ($exist_record == 0) {
                                                    $query = "INSERT INTO `time_track`( `user_id`, `description`, `time`, `status`) VALUES ('$user_id','$description','$diff->h:$diff->i','1')";
                                                    $query_run = mysqli_query($connection, $query);
                                                }
                                            } else {
                                                ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                    <?php echo $diff->i . ' Minutes' ?>
                                                    minute</label>
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
                                                echo " Remaining Time " . round($remaining_time) . " minute";
                                            }
                                            ?>
                                        </label>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class='row'>
        <div class="col col-lg-4 justify-content-center  text-uppercase">
            <table id="tblexportData" class="table table-striped">
                <thead>
                    <th>Employee Name</th>
                    <!-- <th>Assigned QTY</th> -->
                    <th>Completed QTY</th>
                    <!-- <th>Not Completed QTY</th> -->
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT username,user_id FROM users WHERE department='10'  ";
                    $query_run = mysqli_query($connection, $query);

                    foreach ($query_run as $data) {
                        $username = $data['username'];
                        $user_id = $data['user_id'];
                    ?>
                        <tr>
                            <td><a href="lcd_team_lead.php?user_id=<?php echo $user_id ?>&username=<?php echo $username ?>"><?php echo $username; ?></a>
                            </td>
                            <!-- <td><?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                        $date2 = $date1->format('Y-m-d 23:59:59');
                                        $okkoma = 0;
                                        $iwara = 0;
                                        $query = "SELECT COUNT(technician_id) AS technician_id FROM performance_record_table WHERE technician_id='$username' AND  (job_description='send to Bodywork' OR job_description='send to Sanding' OR job_description='send to Taping' ) AND start_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        foreach ($query_run as $a) {
                                            echo $a['technician_id'];
                                            $okkoma = $a['technician_id'];
                                        } ?></td> -->
                            <td><?php
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $date = $date1->format('Y-m-d 00:00:00');
                                $date2 = $date1->format('Y-m-d 23:59:59');
                                $query = "SELECT COUNT(status) AS status1 FROM performance_record_table WHERE user_id='$user_id' AND  status='1' AND start_time between '$date'AND '$date2'";
                                $query_run = mysqli_query($connection, $query);

                                foreach ($query_run as $b) {
                                    echo $b['status1'];
                                    $iwara = $b['status1'];
                                } ?></td>
                            <!-- <td><?php $ithuru = $okkoma - $iwara;
                                        echo $ithuru; ?></td> -->
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="col col-lg-8 justify-content-center  text-uppercase">
            <table id="tblexportData" class="table table-striped">
                <thead>
                    <th>Distributor Rack</th>
                    <th>Remove LCD</th>
                    <th>Sorting+Remove Polization Film</th>
                    <th>Clean+Glue+Install Polization Film</th>
                    <th>Fixed LCD</th>
                    <th>Install LCD</th>
                </thead>
                <tbody>
                    <?php
                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                    $date = $date1->format('Y-m-d 00:00:00');
                    $date2 = $date1->format('Y-m-d 23:59:59');
                    $query = "SELECT qr_number FROM performance_record_table WHERE (job_description='store to lcd rack') AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";

                    $query_run = mysqli_query($connection, $query);
                    foreach ($query_run as $data) {
                        $received_qr = $data['qr_number'];
                    ?>
                        <tr>
                            <td><?php echo $received_qr ?></td>

                            <?php
                            $query = "SELECT status,job_description,username FROM performance_record_table LEFT JOIN users ON users.user_id = performance_record_table.user_id WHERE qr_number='$received_qr' AND (department_id='10' ) AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
                            $query_run1 = mysqli_query($connection, $query);
                            $status_remove = 'not start';
                            $status_install = 'not start';
                            $status_fixed = 'not start';
                            $status_em_po_flm = 'not start';
                            $status_clean = 'not start';
                            $technician_id_remove = '0';
                            $technician_id_install = '0';
                            $technician_id_fixed = '0';
                            $technician_id_em_po_flm = '0';
                            $technician_id_clean = '0';
                            $row = 0;
                            $row = mysqli_num_rows($query_run);
                            if ($row == 0) {
                            } else {
                                foreach ($query_run1 as $status1) {
                                    $jd = $status1['job_description'];
                                    // echo $jd;
                                    if ($jd == 'Remove LCD') {
                                        $status_remove = $status1['status'];
                                        $technician_id_remove = $status1['username'];
                                    } elseif ($jd == 'Install LCD') {
                                        $status_install = $status1['status'];
                                        $technician_id_install = $status1['username'];
                                    } elseif ($jd == 'Fixed Lcd') {
                                        $status_fixed = $status1['status'];
                                        $technician_id_fixed = $status1['username'];
                                    } elseif ($jd == 'Remove Polization Film') {
                                        $status_em_po_flm = $status1['status'];
                                        $technician_id_em_po_flm = $status1['username'];
                                    } elseif ($jd == 'Clean+Glue+Install Polization Film') {
                                        $status_clean = $status1['status'];
                                        $technician_id_clean = $status1['username'];
                                    }
                                }
                            } ?>
                            <td><?php if ($status_remove == 0) {
                                    echo "<div class='text-warning'>On Going</div>/";
                                    echo $technician_id_remove;
                                } elseif ($status_remove == 1) {
                                    echo "<div class='text-success'>Completed</div>/";
                                    echo $technician_id_remove;
                                } else {
                                    echo $status_remove;
                                } ?></td>
                            <td><?php if ($status_em_po_flm == 0) {
                                    echo "<div class='text-warning'>On Going</div>/";
                                    echo $technician_id_em_po_flm;
                                } elseif ($status_em_po_flm == 1) {
                                    echo "<div class='text-success'>Completed</div>/";
                                    echo $technician_id_em_po_flm;
                                } else {
                                    echo $status_em_po_flm;
                                } ?></td>
                            <td><?php if ($status_clean == 0) {
                                    echo "<div class='text-warning'>On Going</div>/";
                                    echo $technician_id_clean;
                                } elseif ($status_clean == 1) {
                                    echo "<div class='text-success'>Completed</div>/";
                                    echo $technician_id_clean;
                                } else {
                                    echo $status_clean;
                                } ?></td>
                            <td><?php if ($status_fixed == 0) {
                                    echo "<div class='text-warning'>On Going</div>/";
                                    echo $technician_id_fixed;
                                } elseif ($status_fixed == 1) {
                                    echo "<div class='text-success'>Completed</div>/";
                                    echo $technician_id_fixed;
                                } else {
                                    echo $status_fixed;
                                } ?></td>
                            <td><?php if ($status_install == 0) {
                                    echo "<div class='text-warning'>On Going</div>/";
                                    echo $technician_id_install;
                                } elseif ($status_install == 1) {
                                    echo "<div class='text-success'>Completed</div>/";
                                    echo $technician_id_install;
                                } else {
                                    echo $status_install;
                                } ?></td>

                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade " id="myModal69" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header" style=" font-size: 30px;">
                <?php $query = "SELECT COUNT(qr_number) as test, qr_number FROM performance_record_table WHERE technician_id='$test_name' AND start_time between '$date'AND '$date2'";
                $query_run = mysqli_query($connection, $query);
                $test = 0;
                foreach ($query_run as $data) {
                    $test = $data['test'];
                } ?>
                <?php echo $test_name; ?>Technician All Details
            </div>
            <div class="modal-body ">
                <div class='row'>
                    <div class="col col-lg-12 justify-content-center m-auto text-uppercase">
                        <table class="table table-striped">
                            <thead>
                                <th>QR Code</th>
                                <th>Remove LCD</th>
                                <th>Sorting+Remove Polization Film</th>
                                <th>Clean+Glue+Install Polization Film</th>
                                <th>Fixed LCD</th>
                                <th>Install LCD</th>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT DISTINCT qr_number FROM performance_record_table WHERE user_id='$test_id' AND start_time between '$date'AND '$date2'";
                                $query_run = mysqli_query($connection, $query);
                                foreach ($query_run as $data) {
                                    $qr_number = $data['qr_number'];
                                ?><tr>
                                        <td><?php echo $qr_number; ?></td>
                                        <?php
                                        $query = "SELECT status,job_description FROM performance_record_table WHERE user_id='$test_id' AND qr_number='$qr_number' AND start_time between '$date'AND '$date2'";
                                        $query_run = mysqli_query($connection, $query);
                                        $status1 = 300;
                                        $rm = '';
                                        $rmp = '';
                                        $clean = '';
                                        $fix = '';
                                        $install = '';
                                        $rms = '';
                                        $rmps = '';
                                        $cleans = '';
                                        $fixs = '';
                                        $installs = '';
                                        $jd = 'Not Start Yet';
                                        foreach ($query_run as $data) {
                                            $status1 = $data['status'];
                                            $jd = $data['job_description'];
                                            // echo $jd;
                                            // echo "</br>";
                                            if ($jd == 'Remove LCD') {
                                                $rm = $jd;
                                                $rms = $status1;
                                            } elseif ($jd == 'Remove Polization Film') {
                                                $rmp = $jd;
                                                $rmps = $status1;
                                            } elseif ($jd == 'Clean+Glue+Install Polization Film') {
                                                $clean = $jd;
                                                $cleans = $status1;
                                            } elseif ($jd == 'Fixed Lcd') {
                                                $fix = $jd;
                                                $fixs = $status1;
                                            } elseif ($jd == 'Install LCD') {
                                                $install = $jd;
                                                $installs = $status1;
                                            }
                                        }
                                        ?>

                                        <td><?php
                                            if ($rm == 'Remove LCD') {
                                                if ($rms == 1) {
                                                    echo "<div class='text-success'>Completed</div>";
                                                } elseif ($rms == 0) {
                                                    echo "<div class='text-warning'>On Going</div>";
                                                } else {
                                                    echo "Not Start";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td><?php if ($rmp == 'Remove Polization Film') {
                                                if ($rmps == 1) {
                                                    echo "<div class='text-success'>Completed</div>";
                                                } elseif ($rmps == 0) {
                                                    echo "<div class='text-warning'>On Going</div>";
                                                } else {
                                                    echo "Not Start";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td><?php if ($clean == 'Clean+Glue+Install Polization Film') {
                                                if ($cleans == 1) {
                                                    echo "<div class='text-success'>Completed</div>";
                                                } elseif ($cleans == 0) {
                                                    echo "<div class='text-warning'>On Going</div>";
                                                } else {
                                                    echo "Not Start";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td><?php if ($fix == 'Fixed Lcd') {
                                                if ($fixs == 1) {
                                                    echo "<div class='text-success'>Completed</div>";
                                                } elseif ($fixs == 0) {
                                                    echo "<div class='text-warning'>On Going</div>";
                                                } else {
                                                    echo "Not Start";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td><?php if ($install == 'Install LCD') {
                                                if ($installs == 1) {
                                                    echo "<div class='text-success'>Completed</div>";
                                                } elseif ($installs == 0) {
                                                    echo "<div class='text-warning'>On Going</div>";
                                                } else {
                                                    echo "Not Start";
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <button data-dismiss="modal" class="close " type="button" area-label="close">
                <div class="w-10">close</div>
            </button>
        </div>

    </div>
</div>
<script>
    var time = new Date();
    var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time.getHours() + ":" +
        time
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

    @media(min-width:1200px) {
        #myModal69 {
            max-width: 1789px;
        }
    }
</style>
<?php include_once '../includes/footer.php'; ?>