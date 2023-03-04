<?php
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php'); ?>

<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$user_name = $_SESSION['username'];
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./performance_record.php">
            <i class="fa-solid fa-left fa-4x m-2 mt-5" style="color: #ced4da;"></i>
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
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Remaining Target Point</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php $query = "SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";

                                        $query_run = mysqli_query($connection, $query);
                                        $sum = 0;
                                        if ($department_id == 1) {
                                            if ($user_role == 33) {
                                                $target = 400.00;
                                            }
                                            $target = 50;
                                        } elseif ($department_id == 10) {
                                            $target = 120;
                                        } elseif ($department_id == 7) {
                                            $target = 100;
                                        } elseif ($department_id == 8) {
                                            $target = 200;
                                        } elseif ($department_id == 14) {
                                            $target = 45;
                                        } elseif ($department_id == 13) {
                                            $target = 200;
                                        } elseif ($department_id == 9) {
                                            $target = 100;
                                        } elseif ($department_id == 22) {
                                            $target = 150;
                                        } elseif ($department_id == 23) {
                                            $target = 200;
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
                                        if ($department_id == 13) {
                                            echo "Packing 1 point per unit";
                                        }

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
                                        if ($datetime_2 < $datetime_1) {

                                    ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Earlier :
                                                <?php echo $diff->i . ' Minutes' ?></label>
                                        <?php
                                        } else {
                                        ?>
                                            <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                <?php echo $diff->i . ' Minutes' ?>
                                            </label>
                                    <?php }
                                    }
                                    ?>

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
                                    <label>
                                        <?php
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 15:45:00');
                                        $date2 = $date1->format('Y-m-d 18:46:50');
                                        $duration = 0;
                                        $spend_time = 0;
                                        $query = "SELECT end_time  FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2' ORDER BY performance_id DESC LIMIT 1";
                                        $query_run = mysqli_query($connection, $query);
                                        $datetime_1 = '';
                                        $datetime_2 = '';
                                        foreach ($query_run as $data) {
                                            $datetime_1 = date('Y-m-d 18:46:50');
                                            $datetime_2 = $data['end_time'];
                                        }

                                        $start_datetime = new DateTime($datetime_1);
                                        $diff = $start_datetime->diff(new DateTime($datetime_2));
                                        if ($datetime_2 != '') {
                                            if ($datetime_2 < $datetime_1) {
                                        ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Earlier :
                                                    <?php echo $diff->i . ' Minutes' ?></label>
                                            <?php
                                            } else {
                                            ?>
                                                <label class="col-sm-12 col-form-label text-danger">You are Late :
                                                    <?php echo $diff->i . ' Minutes' ?>
                                                </label>
                                        <?php }
                                        }
                                        ?>
                                    </label>
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
                    <table id="tblexportData" class="table table-striped">
                        <thead>
                            <tr>
                                <th>BOX No</th>
                                <th>Job Description</th>
                                <th>Sales Order</th>
                                <th>Scanned QR code</th>
                                <th>MFG</th>
                                <th>Model</th>
                                <th>Charger</th>
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
                            $query = "SELECT * FROM performance_record_table WHERE user_id=$user_id AND job_description='packing' AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            foreach ($query_run as $data) {
                                $i++;
                                $y = $row - $i;
                                $test = $data['mfg_code']

                            ?>
                                <?php
                                $bubble_wrapping_user = $_SESSION['username'];
                                $query = "SELECT cartoon_number FROM packing_mfg WHERE bubble_wrapping='$bubble_wrapping_user' AND mfg='$test'";
                                $sql_query_run = mysqli_query($connection, $query);
                                $box_number = '';
                                foreach ($sql_query_run as $box) {
                                    $box_number = $box['cartoon_number'];
                                }
                                if ($box_number != '') {

                                ?>
                                    <tr>
                                        <td><?php echo $box_number ?>
                                        </td>
                                        <td><?php echo $data['job_description'] ?></td>
                                        <td><?php
                                            echo $data['sales_order']
                                            ?></td>
                                        <td><?php echo $data['qr_number']; ?></td>
                                        <td><?php
                                            echo $data['mfg_code']
                                            ?></td>
                                        <td>
                                            <form method="POST">
                                                <?php echo $data['model']  ?>
                                                <input type="hidden" name="model_pack" value="ok">
                                                <input type="hidden" name="performance_id" value="<?php echo $data['performance_id'] ?>">
                                                <?php if ($data['model_pack'] != 'ok') { ?>
                                                    <button type="submit" name="submit" id="submit" class="btn btn-default bg-gradient-success btn-next float-right ">
                                                        Packing Confirm
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="" name="" id="" class="btn btn-default bg-gradient-primary btn-next float-right " disabled>
                                                        Packing Confirm
                                                    </button>
                                                <?php } ?>
                                            </form>
                                        </td>

                                        <td>
                                            <form method="POST">
                                                <?php
                                                echo $data['charger']
                                                ?>
                                                <input type="hidden" name="charger_pack" value="ok">
                                                <input type="hidden" name="performance_id" value="<?php echo $data['performance_id'] ?>">
                                                <?php if ($data['charger_pack'] != 'ok') { ?>
                                                    <button type="submit" name="submit1" id="submit1" class="btn btn-default bg-gradient-success btn-next float-right ">
                                                        Packing Confirm
                                                    </button>
                                                <?php } else { ?>
                                                    <button type="" name="" id="" class="btn btn-default bg-gradient-primary btn-next float-right" disabled>
                                                        Packing Confirm
                                                    </button>
                                                <?php } ?>
                                            </form>
                                        </td>

                                    </tr>
                            <?php $y = 0;
                                }
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
    $model_pack = $_POST['model_pack'];
    $performance_id = $_POST['performance_id'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $query = "UPDATE `performance_record_table` SET `model_pack`='$model_pack',start_time='$start_date' WHERE performance_id='$performance_id'";
    $sql = mysqli_query($connection, $query);
    header('Location: bubble_wrappping.php');
}
if (isset($_POST['submit1'])) {
    $charger_pack = $_POST['charger_pack'];
    $performance_id = $_POST['performance_id'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $end_date = $date1->format('Y-m-d H:i:s');
    $query = "UPDATE `performance_record_table` SET `charger_pack`='$charger_pack',end_time='$end_date' WHERE performance_id='$performance_id'";
    $sql = mysqli_query($connection, $query);
    header('Location: bubble_wrappping.php');
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