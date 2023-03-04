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
// checking if a user is logged in
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
                            <table id="tblexportData" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Technician Name</th>
                                        <th>Alsakb QR</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 00:00:00');
                                    $date2 = $date1->format('Y-m-d 23:59:59');
                                    $query = "SELECT user_id,qr_number,status FROM performance_record_table WHERE status='0' AND start_time between '$date'AND '$date2' AND department_id='1' GROUP BY user_id ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach ($query_run as $data) {
                                        $technician_id = $data['user_id'];
                                        $technician_name = '';
                                        $query_name = "SELECT username FROM users WHERE user_id='$technician_id'";
                                        $query_run = mysqli_query($connection, $query_name);
                                        foreach ($query_run as $a) {
                                            $technician_name = $a['username'];
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $technician_name; ?></td>
                                            <td><?php echo $data['qr_number']; ?></td>
                                            <td><?php echo "On Going"; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <table id="tblexportData" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Technician Name</th>
                                        <th>Completed Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d 00:00:00');
                                    $date2 = $date1->format('Y-m-d 23:59:59');
                                    $query = "SELECT COUNT(performance_id) AS completed_count, user_id FROM performance_record_table WHERE status='1' AND start_time between '$date'AND '$date2' AND department_id='1' GROUP BY user_id ";
                                    $query_run = mysqli_query($connection, $query);
                                    foreach ($query_run as $data) {
                                        $technician_id = $data['user_id'];
                                        $technician_name = '';
                                        $query_name = "SELECT full_name FROM employees 
                                            LEFT JOIN users ON users.epf = employees.emp_id
                                            WHERE users.user_id='$technician_id'";
                                        $query_run = mysqli_query($connection, $query_name);
                                        foreach ($query_run as $a) {
                                            $technician_name = $a['full_name'];
                                        }
                                        $user_id = $emp_id;

                                        if ($user_id != $technician_id) {
                                    ?>
                                            <tr>
                                                <td><?php echo $technician_name; ?></td>
                                                <td><?php echo $data['completed_count']; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    [type="text"] {
        height: 22px;
        margin-top: 4px;
        font-size: 10px;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        font-size: 12px;
        padding: 10px;
        font-family: "Poppins";
    }
</style>