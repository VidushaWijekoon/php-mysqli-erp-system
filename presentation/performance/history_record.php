<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}?>
<?php if ($_SESSION['department'] == 19) {?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./qc_performance_record.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } elseif ($_SESSION['department'] == 14) {?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center mt-2"><a href="./battery_performance.php">
            <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } else {?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./performance_record.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php }?>
<form action="" method="POST">
    <div class="row w-50">
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="from_date"
                    value="<?php if (isset($_POST['from_date'])) {echo $_POST['from_date'];}?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="date" name="to_date"
                    value="<?php if (isset($_POST['to_date'])) {echo $_POST['to_date'];}?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <button type="submit" class="btn btn-xs btn-primary px-3"
                    style=" font-size: 10px; margin-top: 4px; border-radius: 7px; letter-spacing: 1px;">Search
                    Date</button>
            </div>
        </div>
    </div>
</form>
<?php

?>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">

                    <h1> Name : <?php $emp_id = $_SESSION['epf'];
$query = "SELECT full_name FROM employees WHERE emp_id ='$emp_id'";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    echo $data['full_name'];
}?><br>
                        EmpID :<?php echo $_SESSION['epf'] ?><br>
                        Department :
                        <?php $department_id = $_SESSION['department'];
$user_id = $_SESSION['user_id'];
$query = "SELECT department FROM departments WHERE department_id='$department_id'";
$query_run = mysqli_query($connection, $query);
foreach ($query_run as $data) {
    echo $data['department'];
}
?>
                    </h1>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Completed QTY</th>
                                    <th>Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$i = -1;
$y = 0;
$from_date = 0;
$to_date = 0;
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {

    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
}
if ($from_date != 0) {
    $query = "SELECT COUNT(qr_number)as qr_number,start_time,SUM(target)as target FROM performance_record_table WHERE user_id=$user_id AND end_time between '$from_date'AND '$to_date'GROUP BY CAST(start_time AS DATE)";
    $query_run = mysqli_query($connection, $query);
    // $row = mysqli_num_rows($query_run);
    $total = 0;
    $total1 = 0;
    foreach ($query_run as $data) {
        $target = $data['target'] / $data['qr_number'];
        $total1 = $data['qr_number'];
        $total = $total + $total1;
        ?>
                                <tr>
                                    <td><?php echo $data['start_time'] ?></td>
                                    <td><?php echo $data['qr_number'] ?></td>
                                    <td><?php echo round($target) ?></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <td>Total Count</td>
                                    <td><?php echo $total ?></td>
                                </tr>
                                <?php }
?>
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
    $scanned_mfg = $_POST['mfg'];
    $model = $_POST['model'];
    $job_description = $_POST['job_description'];
    $performance_id = 0;
    $_POST['qr'] = '';
    $_POST['mfg'] = '';
    $_POST['model'] = '';
    $_POST['job_description'] = '';
    if ($scanned_qr != '0') {
        $search_value = $scanned_qr;
    } elseif ($scanned_mfg != 0) {
        $search_value = $scanned_mfg;
    }

    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value' OR mfg_code = '$search_value') ";
    $query_run_exist = mysqli_query($connection, $query);

    foreach ($query_run_exist as $data) {
        $performance_id = $data['performance_id'];
    }
    if ($performance_id != 0) {
        $working_time_in_seconds;

        $start_time = 0000 - 00 - 00;
        foreach ($query_run_exist as $data) {
            $performance_id = $data['performance_id'];
            $start_time = $data['start_time'];
        }
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $working_time_in_seconds = strtotime($date) - strtotime($start_time);
        $query = "UPDATE
    `performance_record_table`
SET
    `model` = '$model',
    `job_description` = '$job_description',
    `end_time` = '$date',
    `spend_time` = '$working_time_in_seconds'
WHERE performance_id = $performance_id";
        $query_run = mysqli_query($connection, $query);
    } else {
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $start_date = $date1->format('Y-m-d H:i:s');
        $query = "INSERT INTO `performance_record_table`(
            `user_id`,
            `department_id`,
            `qr_number`,
            `mfg_code`,
            `model`,
            `job_description`,
            `start_time`,
            `target`
        )
        VALUES(
            '$user_id',
            '$department_id',
            '$scanned_qr',
            '$scanned_mfg',
            '$model',
            '$job_description',
            '$start_date',
            '30'
        ) ";
        $query_run = mysqli_query($connection, $query);

    }

}
?>

<?php include_once '../includes/footer.php';?>