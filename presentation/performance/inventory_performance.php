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
    if (empty($query_run)) {} else {
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
$timestamp2 = strtotime(date('Y-m-d 13:55:00'));
$timestamp3 = strtotime(date('Y-m-d 18:15:00'));
$timestamp4 = strtotime(date('Y-m-d 20:55:00'));

$_SESSION['expire1'] = $timestamp2;
$_SESSION['expire2'] = $timestamp3;
$_SESSION['expire3'] = $timestamp4;
$now = time();
// later
//   $after_tea_timestart =strtotime(date('Y-m-d 18:44:00'));
//   $after_tea_timeend=strtotime(date('Y-m-d 20:55:00'));
//   $after_lunch_timestart =strtotime(date('Y-m-d 14:59:00'));
//   $after_lunch_timeend=strtotime(date('Y-m-d 18:15:00'));
//   $morning_session_timestart =strtotime(date('Y-m-d 18:59:00'));
//   $morning_session_timeend=strtotime(date('Y-m-d 19:37:00'));

if (strtotime(date('Y-m-d 08:59:00')) < $now && $now > $_SESSION['expire1'] && $now < strtotime(date('Y-m-d 14:59:00'))) {
    // header("Location: ../../index.php");
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    // session_start();
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 14:59:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:15:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 18:44:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
}
?>

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
                            <form method="POST" action="performance_record_save.php">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Job Description</label>
                                    <div class="col-sm-8 mt-2">
                                        <select onchange="checkOptions(this)" name="job_description"
                                            class="info_select w-75" style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>

                                            <?php if ($department_id == 2) {?>
                                            <option value="send to production">Send to Production
                                            </option>
                                            <?php }?>
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
                                    <label class="col-sm-6 col-form-label">Target</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <label class="col-sm-6 col-form-label">500</label>
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
}?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Remaining QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <label class="col-sm-6 col-form-label"><?php $x = 500 - $count;
echo $x;?></label>
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
$date2 = $date1->format('Y-m-d 13:55:00');
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
$date = $date1->format('Y-m-d 13:55:00');
$remaining_time = (strtotime($date) - strtotime($current_time)) / 60;
if ($remaining_time > 0) {
    echo " Remaining Time " . round($remaining_time) . " minute";
}
?>
                                    </label>
                                    <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$date = $date1->format('Y-m-d 13:30:00');
$date2 = $date1->format('Y-m-d 13:55:00');
$duration = 0;
$spend_time = 0;
$query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
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
$date = $date1->format('Y-m-d 18:15:00');
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
$date2 = $date1->format('Y-m-d 18:15:00');
$duration = 0;
$spend_time = 0;
$query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
$datetime_1 = '';
$datetime_2 = '';
foreach ($query_run as $data) {
    $datetime_1 = date('Y-m-d 18:15:00');
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
$date2 = $date1->format('Y-m-d 20:55:00');
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
$date = $date1->format('Y-m-d 20:55:00');
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
                    <?php if (($department_id != 1) || ($department_id == 1 && $user_role != 9)) {?>
                    <table id="tblexportData" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Job Description</th>

                                <?php if ($department_id != 10) {?>
                                <th>Scanned QR code</th>
                                <?php } elseif ($department_id == 10) {?>
                                <th>Scanned QR code / PN Code</th>
                                <?php }?>

                                <th>Start Time</th>
                                <th>End Time</th>
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

                                <td><?php if ($department_id == 10) {
            echo $data['qr_number'] . "/" . $data['lcd_p_n_code'];
        } elseif ($department_id != 10) {
            echo $data['qr_number'];
        }?></td>
                                <td><?php echo $data['start_time'] ?></td>
                                <td><?php echo $data['end_time'] ?></td>
                                <td><?php if ($data['end_time'] == '0000-00-00 00:00:00') {
            echo "Not complete";
        } else {
            echo $j;
        }?></td>
                                <td><?php echo $data['target'];if ($data['end_time'] == '0000-00-00 00:00:00') { ?>
                                    <i class="fa-duotone fa-circle" style="color:#00ff14"></i><?php }?>
                                </td>
                            </tr>
                            <?php $y = 0;}?>

                        </tbody>
                    </table>
                    <?php }
if ($department_id == 1 && $user_role == 9) {?>
                    <table id="tblexportData" class="table table-striped">
                        <thead>
                            <th>Job Description</th>
                            <th>Scanned QR Code</th>
                            <th>Date Time</th>
                        </thead>
                        <tbody>
                            <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d 00:00:00');
    $date2 = $date1->format('Y-m-d 23:59:59');
    $query = "SELECT job_description,qr_number,start_time FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {?>
                            <tr>
                                <td><?php echo $data['job_description'] ?></td>
                                <td><?php echo $data['qr_number'] ?></td>
                                <td><?php echo $data['start_time'] ?></td>
                            </tr>
                            <?php }
    ?>

                        </tbody>
                        <table>
                            <?php }
?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//  if( strtotime(date('2023-01-15 12:59:00'))<$now ) {
//     // header("Location: ../../index.php");
//     $query="DELETE FROM `prepared_part`";
//     $query_run = mysqli_query($connection,$query);
//     session_destroy();
//     echo "<p align='center'>Session has been destroyed!!";
//     // session_start();
//     header("Location: ../../index.php");
// }

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
<?php include_once '../includes/footer.php';?>