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
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$department_id = $_SESSION['department'];
$updated = 0;
$id = 0;
if (empty($_GET['updated'])) {

} else {
    $updated = $_GET['updated'];
    $id = $_GET['id'];
}
if ($updated == 'Remove LCD') {
    echo "<script>
    $(window).load(function() {
        $('#myModalremove').modal('show');
    });
    </script>";
}
if ($updated == 'Remove Polization Film') {
    echo "<script>
    $(window).load(function() {
        $('#myModalrpf').modal('show');
    });
    </script>";
}
if ($updated == 'Fixed Lcd') {
    echo "<script>
    $(window).load(function() {
        $('#myModalfixed').modal('show');
    });
    </script>";
}
if ($updated == 'Clean+Glue+Install Polization Film') {
    echo "<script>
    $(window).load(function() {
        $('#myModalclean').modal('show');
    });
    </script>";
}
if ($updated == 'Install LCD') {
    echo "<script>
    $(window).load(function() {
        $('#myModalinstall').modal('show');
    });
    </script>";
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
        $end_time = $date2;?>
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
    <?php }}?>

    <div class="col col-sm-6 col-md-3">
        <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$start_time = $date;
$end_time = $date2;?>
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
                            <form method="POST" action="lcd_performance_save.php">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Job Description</label>
                                    <div class="col-sm-8 mt-2">
                                        <select name="job_description" onchange="checkOptions(this)"
                                            class="info_select w-75" id='service_type' style="border-radius: 5px;">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>

                                            <?php
if ($department_id == 10) {?>

                                            <option value="Remove LCD">Remove LCD</option>
                                            <option value="Install LCD">Install LCD</option>
                                            <option value="Fixed Lcd">Fixed LCD </option>
                                            <option value="Remove Polization Film">Sorting+Remove Polization Film
                                            </option>
                                            <option value="Clean+Glue+Install Polization Film">Clean+Glue+Install
                                                Polization
                                                Film
                                            </option>
                                            <?php }?>
                                        </select>


                                    </div>
                                </div>

                                <label class="col-sm-8 col-form-label"></label>
                                <label for="myCheck" id='lable'>P/N Have?:</label>
                                <input type="checkbox" id="myCheck" onclick="myFunction()">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label" id='text1'> P/N Number</label>
                                    <div class="col-sm-8">
                                        <input class="w-75" name='pn_num' id='otherInput' type="text"
                                            style="display: none" placeholder=" scan P/N Number here"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class=" row">
                                    <label class="col-sm-4 col-form-label">Scan Alsakb QR Code</label>
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
                                <?php if (($department_id == 1 && $user_role != 9) || ($department_id != 1)) {?>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Remaining Target Points</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";

    $query_run = mysqli_query($connection, $query);
    $sum = 0;
    if ($department_id == 10) {
        $target = 120;
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
    if ($department_id == 10) {
        if ($user_role == 9) {
            echo "Team Leader 2 point for 1 unit";
        } else {
            echo "Remove LCD 1 point/Install LCD 1 point/Fix LCD 4 point/Remove Polization Film  1 point/Install Polization Film  2 point";
        }
    }

    ?>
                                    </div>
                                </div>
                                <?php }?>
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

                                <td><?php if ($department_id == 10) {
        echo $data['qr_number'] . "/" . $data['lcd_p_n_code'];
    } elseif ($department_id != 10) {
        echo $data['qr_number'];
    }?></td>
                                <td><?php echo $data['start_time'] ?></td>
                                <td><?php echo $data['end_time'] ?></td>
                                <td><?php echo $data['spend_time'] ?></td>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade " id="myModalremove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

            <div class="modal-body ">
                <div class="grid-margin  justify-content-center mx-auto mt-1">
                    <?php if ($update == 'Remove LCD') {?>
                    <form method="POST">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <h2 class="col-lg-12 ">Please Select The Problem</h2>


                            </div>
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Scratch (PGP) </h4>
                                <input type="radio" id="scrtch" name="scrtch" value="1">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="scrtch" name="scrtch" value="0" checked>
                                    <label class="label_values my-1">No </label>

                            </div>
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Spot (ZGP + SGP) </h4>
                                <input type="radio" id="spt" name="spt" value="1">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="spt" name="spt" value="0" checked>
                                    <label class="label_values my-1">No </label>

                            </div>
                            <!-- <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Scratch + Spot (PGP + ZGP + SGP) </h4>
                                <input type="radio" id="cell" name="cell" value="yes">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="cell2" name="cell" value="no" checked>
                                    <label class="label_values my-1">No </label>

                            </div> -->
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Broken LCD</h4>
                                <input type="radio" id="brkn" name="brkn" value="1">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="brkn" name="brkn" value="0" checked>
                                    <label class="label_values my-1">No </label>

                            </div>
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Yellow Shadow LCD </h4>
                                <input type="radio" id="ylwsdw" name="ylwsdw" value="1">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="ylwsdw" name="ylwsdw" value="0" checked>
                                    <label class="label_values my-1">No </label>

                            </div>
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-8 ">Bazel Broken</h4>
                                <input type="radio" id="bzlbrkn" name="bzlbrkn" value="1">
                                <label class="label_values my-1" for="xeon">Yes
                                    <input type="radio" id="bzlbrkn" name="bzlbrkn" value="0" checked>
                                    <label class="label_values my-1">No </label>

                            </div>
                            <div class="col-sm-12 ">
                                <h4 class="col-lg-12 " id="other">Next Step Remove LCD</h4>
                            </div>

                            <div class="row col-sm-12">
                                <button type="submit" name="sbmt_rmv" id="submit"
                                    class="btn btn-default bg-gradient-success btn-next col-lg-2 justify-content-center mx-auto ">
                                    Confirm
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php }?>
                </div>


            </div>

            <?php
if (isset($_POST['sbmt_rmv'])) {
    $scrtch = $_POST['scrtch'];
    $spt = $_POST['spt'];
    $brkn = $_POST['brkn'];
    $ylwsdw = $_POST['ylwsdw'];
    $bzlbrkn = $_POST['bzlbrkn'];
    $user_name = $_SESSION['username'];
    $query = "INSERT INTO `lcd_issue`(
        `alsakb_number`,
        `scratch`,
        `spot`,
        `broken_lcd`,
        `yellow_shadow`,
        `bazel_broken`,
        `created_user`
    )
    VALUES(
        '$id',
        '$scrtch',
        '$spt',
        '$brkn',
        '$ylwsdw',
        '$bzlbrkn',
        '$user_name'
    )";
    $sql = mysqli_query($connection, $query);
    header("Location: lcd_performance.php");
}
?>
        </div>
    </div>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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
var time = new Date();
var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time.getHours() + ":" +
    time
    .getMinutes() + ":" + time.getSeconds();
document.getElementById("time").textContent = today;

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
<?php include_once '../includes/footer.php';?>
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