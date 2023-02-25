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
<<<<<<< HEAD
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
=======
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$department_id = $_SESSION['department'];
// $query = "SELECT last_login FROM users WHERE user_id ='$user_id'";
// $query_run = mysqli_query($connection, $query);
$last_login_time = '';
// foreach ($query_run as $data) {
//     $last_login_time = $data['last_login'];
// }
$mfg = '';
$id = '';
$model = '';
// if ($_GET['mfg'] != 0) {
//     $mfg = $_GET['mfg'];
//     $id = $_GET['id'];
//     $model = $_GET['model'];

// }
// $time = strtotime($last_login_time);
// $last_qr_number = '0';
// $time = strtotime($last_login_time) + 2;
// $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
// $date = $date1->format('Y-m-d H:i:s');
// $test = strtotime($date);
// if ($test < $time) {
//     $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
//     $date = $date1->format('Y-m-d 00:00:00');
//     //  $date2 = $date1->format('Y-m-d 23:59:59');
//     $query = "SELECT qr_number FROM performance_record_table WHERE user_id ='$user_id'AND status ='0'AND start_time between '$date'AND '$last_login_time' ";
//     $query_run = mysqli_query($connection, $query);
//     if (empty($query_run)) {} else {
//         foreach ($query_run as $data) {
//             $last_qr_number = $data['qr_number'];
//         }
//         if ($last_qr_number != '0') {
//             echo "<script>
//                                     $(window).load(function() {
//                                         $('#myModal4').modal('show');
//                                     });
//                                     </script>";
//         }
//     }

// }
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
date_default_timezone_set('Asia/Dubai');
<<<<<<< HEAD
$timestamp2 = strtotime(date('Y-m-d 13:57:00'));
$timestamp3 = strtotime(date('Y-m-d 18:17:00'));
$timestamp4 = strtotime(date('Y-m-d 20:57:00'));
=======
$timestamp2 = strtotime(date('Y-m-d 13:55:00'));
$timestamp3 = strtotime(date('Y-m-d 18:15:00'));
$timestamp4 = strtotime(date('Y-m-d 20:55:00'));
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45

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
<<<<<<< HEAD
} elseif (strtotime(date('Y-m-d 14:59:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:15:50'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 18:44:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:50'))) {
=======
} elseif (strtotime(date('Y-m-d 14:59:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:15:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 18:44:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:00'))) {
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
                    <?php $query = "SELECT job_description FROM performance_record_table WHERE user_id ='$user_id' ORDER BY performance_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
$last_job = '';
$last_technician = '';
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
}?><br>
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
                            <form method="POST" action="distributor_save.php">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Job Description</label>
                                    <div class="col-sm-8 mt-2">
                                        <select onchange="checkOptions(this)" name="job_description"
                                            class="info_select w-75" style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>
                                            <option value="store to lcd rack">Store to LCD Rack
                                            </option>
                                            <option value="store to bodywork rack">Store to Bodywork Rack
                                            </option>
                                            <option value="store to motherboard rack">Store to Motherboard Rack
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-sm-4 col-form-label">Scan QR Code OR MFG</label>
                                    <div class="col-sm-8">
                                        <input class="w-75" style="color:black !important" type="text" id="qr" name="qr"
                                            placeholder=" scan qr code here">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Start Time</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <span id='time'></span>

                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today Collected QTY</label>
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
}?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today LCD Rack QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$count = 0;
$query = "SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND job_description='store to lcd rack' AND end_time between '$date'AND '$date2'";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $count = $data['count'];
    echo $count;
}?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today Motherboard Rack QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$count = 0;
$query = "SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND job_description='store to motherboard rack' AND end_time between '$date'AND '$date2'";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $count = $data['count'];
    echo $count;
}?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today Bodywork Rack QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$count = 0;
$query = "SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND job_description='store to bodywork rack' AND end_time between '$date'AND '$date2'";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $count = $data['count'];
    echo $count;
}?>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <input type="hidden" name="user_role" value="<?php echo $user_role ?>">
                                <input type="hidden" name="department_id" value="<?php echo $department_id ?>">
                                <button type="submit" name="submit" id="submit"
                                    class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none"></button>
                            </form>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <div class="text-danger">

                                <div class="row">
                                    <label class="col-sm-12 col-form-label">Morning Session Start Time : 09.05AM</label>
                                    <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d 09:00:00');
<<<<<<< HEAD
$date2 = $date1->format('Y-m-d 13:55:50');
=======
$date2 = $date1->format('Y-m-d 13:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
$date = $date1->format('Y-m-d 13:55:50');
=======
$date = $date1->format('Y-m-d 13:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
if ($remaining_time > 0) {
    echo " Remaining Time " . round($remaining_time) . " minute";
}
?>
                                    </label>
                                    <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d 13:30:00');
<<<<<<< HEAD
$date2 = $date1->format('Y-m-d 13:55:50');
=======
$date2 = $date1->format('Y-m-d 13:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$duration = 0;
$spend_time = 0;
$query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
$datetime_1 = '';
$datetime_2 = '';
foreach ($query_run as $data) {
<<<<<<< HEAD
    $datetime_1 = date('Y-m-d 13:55:50');
=======
    $datetime_1 = date('Y-m-d 13:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
$date2 = date('Y-m-d 18:15:50');
=======
$date2 = date('Y-m-d 18:15:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
}?>
                                    <label class="col-sm-12 col-form-label">Tea Break Start Time : 06.15PM
                                        <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$current_time = $date1->format('Y-m-d H:i:s');
<<<<<<< HEAD
$date = $date1->format('Y-m-d 18:15:50');
=======
$date = $date1->format('Y-m-d 18:15:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
$date2 = $date1->format('Y-m-d 18:15:50');
=======
$date2 = $date1->format('Y-m-d 18:15:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$duration = 0;
$spend_time = 0;
$query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
$datetime_1 = '';
$datetime_2 = '';
foreach ($query_run as $data) {
<<<<<<< HEAD
    $datetime_1 = date('Y-m-d 18:15:50');
=======
    $datetime_1 = date('Y-m-d 18:15:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
$date2 = $date1->format('Y-m-d 20:55:50');
=======
$date2 = $date1->format('Y-m-d 20:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
$date = $date1->format('Y-m-d 20:55:50');
=======
$date = $date1->format('Y-m-d 20:55:00');
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
                    <div class="container-fluid">

                        <div class='row'>
                            <div class="col col-lg-4 justify-content-center  text-uppercase">
                                <table id="tblexportData" class="table table-striped">
                                    <thead>
                                        <th>Technician Name</th>
                                        <th>Completed QTY</th>
                                        <th>Collected QTY</th>
                                        <th>Remaining QTY</th>
                                    </thead>
                                    <tbody>
                                        <?php
$query = "SELECT username,user_id FROM users WHERE department='1' AND role='4' ";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
}
foreach ($query_run as $data) {
    $username = $data['username'];
    $user_id = $data['user_id'];?>
                                        <tr>
                                            <td><?php echo $username; ?></td>
                                            <td><?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d 00:00:00');
    $date2 = $date1->format('Y-m-d 23:59:59');
    $query = "SELECT COUNT(status) AS count FROM performance_record_table WHERE user_id='$user_id' AND  status='1' AND start_time between '$date'AND '$date2'";
    $query_run = mysqli_query($connection, $query);
    $x = 0;
    $y = 0;
    // if (1682064000 < $now) {
    //     $query = "UPDATE warehouse_information_sheet SET mfg='$mfg',machine_from_supplier_id='$id',model='$model'";
    //     $query_run = mysqli_query($connection, $query);
    //     session_destroy();
    //     echo "<p align='center'>Session has been destroyed!!";
    //     header("Location: ../../index.php");
    // }
    foreach ($query_run as $b) {
        echo $b['count'];
        $x = $b['count'];
    }?></td>
                                            <td> <?php
$query2 = "SELECT COUNT(status) as collect FROM performance_record_table WHERE user_id='$user_id' AND (job_description='store to motherboard rack' OR job_description='store to bodywork rack' OR job_description='store to lcd rack' ) AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
    $query_run2 = mysqli_query($connection, $query2);
    foreach ($query_run as $b) {
        echo $b['count'];
        $y = $b['count'];
    }?></td>
                                            <td>
                                                <?php $z = $x - $y;
    echo $z;
    ?>
                                            </td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>
                            </div>

                            <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <div class="col col-lg-8 justify-content-center text-uppercase">
                                <table id="tblexportData" class="table table-striped">
                                    <thead>
                                        <th>Date</th>
                                        <th>Completed From Production</th>
                                        <th>Technician ID</th>
                                        <th>Location</th>
                                        <th>Motherboard Department</th>
                                        <th>LCD Department</th>
                                        <th>Bodywork Department</th>

                                    </thead>
                                    <tbody>
                                        <?php
$motherboard = 0;
$body = 0;
$lcd = 0;
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));

$date = date("Y-m-d 00:00:00", strtotime("yesterday"));

// $date = $date_yesterday->format('Y-m-d 00:00:00');
// $date = $date1->format('Y-m-d 00:00:00');
$date2 = $date1->format('Y-m-d 23:59:59');
<<<<<<< HEAD
////////////////////////////////////////////////////////////////////////////////////////////////////////
// SQL pagination from anuradha
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 50;
$offset = ($pageno - 1) * $no_of_records_per_page;
$conn = $connection;
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$total_pages_sql = "SELECT COUNT(qr_number) FROM performance_record_table  WHERE status='1' AND (job_description='Put RAM + Hard Disk + Test' OR job_description='Combine+ Test') AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$query = "SELECT DISTINCT qr_number,username,end_time FROM performance_record_table LEFT JOIN users ON users.user_id = performance_record_table.user_id WHERE status='1' AND (job_description='Put RAM + Hard Disk + Test' OR job_description='Combine+ Test') AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT $offset, $no_of_records_per_page";
=======
$query = "SELECT DISTINCT qr_number,username,end_time FROM performance_record_table LEFT JOIN users ON users.user_id = performance_record_table.user_id WHERE status='1' AND (job_description='Put RAM + Hard Disk + Test' OR job_description='Combine+ Test') AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    $received_qr = $data['qr_number'];
    $technician_id = $data['username'];
    ?>
                                        <tr>
                                            <td><?php echo $data['end_time']; ?></td>
                                            <td><?php echo $received_qr ?></td>
                                            <?php

    ?>
                                            <td><?php echo $technician_id; ?></td>
                                            <?php $job_description = "Need to Collect";
    $bodywork = 0;
    $motherboard = 0;
    $lcd = 0;
    $distributor = 0;
    $br = 0;
    $mr = 0;
    $lcdr = 0;
    $check = 0;
    $query = "SELECT job_description FROM performance_record_table WHERE qr_number='$received_qr'  AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
    // echo $query;
    // exit();
    $query_run1 = mysqli_query($connection, $query);
    foreach ($query_run1 as $status1) {
        $job_description = $status1['job_description'];
        if ($job_description == 'Taping' || $job_description == 'Bodywork' || $job_description == 'Sanding') {
            $bodywork = 1;
        } elseif ($job_description == 'Remove LCD') {
            $lcd = 1;
        } elseif ($job_description == 'No Power / No Display / Account Lock/ Ports Issue' or $job_description == 'BIOS Lock High Gen' or $job_description == 'BIOS Lock Low Gen') {
            $motherboard = 1;
        } elseif ($job_description == 'store to bodywork rack') {
            $br = 1;
        } elseif ($job_description == 'store to motherboard rack') {
            $mr = 1;
        } elseif ($job_description == 'store to lcd rack') {
            $lcdr = 1;
        }
    }
    ?>
                                            <td><?php
if ($bodywork == 1) {
        echo "<div class='text-info'>Sent to Bodywork Department</div>";
        $body = 1;

    } elseif ($lcd == 1) {
        echo "<div class='text-info'>Sent to LCD Department</div>";
        $lcd = 1;

    } elseif ($motherboard == 1) {
        echo "<div class='text-info'>Sent to Motherboard Department</div>";
        $motherboard = 1;

    } elseif ($br == 1) {
        echo "<div class='text-success'>Stored to Bodywork Rack</div>";

    } elseif ($lcdr == 1) {
        echo "<div class='text-warning'>Stored to LCD Rack</div>";

    } elseif ($mr == 1) {
        echo "<div class='text-danger'>Stored to Motherboard Rack</div>";

    } else {
        echo "Need to Collect";
    }?>
                                            </td>
                                            <td>
                                                <?php
if ($motherboard == 1) {
        echo "<div ><i class='fa-solid fa-circle' style='color : Green'></i></div>";
    } else {echo $motherboard;
    }
    ?></td>
                                            <td><?php
if ($lcd == 1) {
        echo "<div ><i class='fa-solid fa-circle' style='color : Green'></i></div>";
    } else {echo $lcd;
    }?></td>
                                            <td><?php
if ($bodywork == 1) {
        echo "<div ><i class='fa-solid fa-circle' style='color : Green'></i></div>";
    } else {echo $motherboard;
    }
    ?>
                                            </td>



                                        </tr>
                                        <?php }
?>

                                    </tbody>
                                    <table>
<<<<<<< HEAD
                                        <ul class="pagination">
                                            <li><a href="?pageno=1">First</a></li>
                                            <li class="<?php if ($pageno <= 1) {echo 'disabled';}?>">
                                                <a
                                                    href="<?php if ($pageno <= 1) {echo '#';} else {echo "?pageno=" . ($pageno - 1);}?>">Prev</a>
                                            </li>
                                            <li class="<?php if ($pageno >= $total_pages) {echo 'disabled';}?>">
                                                <a
                                                    href="<?php if ($pageno >= $total_pages) {echo '#';} else {echo "?pageno=" . ($pageno + 1);}?>">Next</a>
                                            </li>
                                            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                                        </ul>
=======
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

?>
    <script>
    var time = new Date();
    var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time
        .getHours() + ":" + time
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
    <?php include_once '../includes/footer.php';?>