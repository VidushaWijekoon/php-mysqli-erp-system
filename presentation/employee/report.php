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

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./employee_dashboard.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php 
$from =0;
$to =0;
if(empty($_GET['from_date'])){

}else{
    $from = str_replace("'", "", $_GET['from_date']);
$to =str_replace("'", "", $_GET['to_date']);
}

?>
<form action="" method="POST">
    <div class="row w-50">
        <div class="col-md-4">
            <div class="form-group">
                <input type="datetime-local" name="from_date"
                    value="<?php if (isset($_POST['from_date'])) {echo $_POST['from_date'];}?>" class="form-control">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <input type="datetime-local" name="to_date"
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

                    <h1> Name : <?php echo $_SESSION['username'] ?><br>
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
                                    <th>Emp ID</th>
                                    <th>Name</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Completed QTY</th>
                                    <th>Rejected QTY</th>
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
$name = '';
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {

    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
}else{
    $from_date = $from;
    $to_date = $to;
}

if ($from_date != 0) {
    echo "Start Date : ".$from_date;
echo "<br>";
echo "End Date : ".$to_date;
    $query = "SELECT COUNT(qr_number)as qr_number_count,start_time,SUM(target)as target,user_id , department_id FROM performance_record_table WHERE   start_time between '$from_date'AND '$to_date'GROUP BY user_id";
    $query_run = mysqli_query($connection, $query);
    // $row = mysqli_num_rows($query_run);
    foreach ($query_run as $data) {
        $target = $data['target'] / $data['qr_number_count'];
        $user_id = $data['user_id'];
        $reject = 0;
        $sql = "SELECT COUNT(reject_person)as reject_count FROM qc_paper WHERE reject_person='$user_id' AND date_time between '$from_date'AND '$to_date' ;";
        $sql_run = mysqli_query($connection, $sql);
        foreach ($sql_run as $count) {
            $reject = $count['reject_count'];
        }
        if ($user_id != 0) {
            ?>
                                <tr>
                                    <td><?php $u_id = $data['user_id'];
            $query = "SELECT username FROM users WHERE user_id='$u_id'";
            $query_run = mysqli_query($connection, $query);
            foreach ($query_run as $test) {
                echo $test['username'];
            }
            ?></td>
                                    <td><?php
$query = "SELECT full_name FROM employees LEFT JOIN users ON users.epf = employees.emp_id WHERE user_id = '$user_id'";
            $query_run = mysqli_query($connection, $query);
            foreach ($query_run as $name) {
                $name = $name['full_name'];
            }?>
                                        <!-- <a
                                            href="report_per_person.php?from_date='<?php echo $from_date ?>'&to_date='<?php echo $to_date ?>'&user_id='<?php echo $user_id ?>'&count='<?php echo $data['qr_number_count'] ?>'"> -->
                                        <?php echo $name ?>
                                        <!-- </a> -->
                                    </td>
                                    <td><?php echo $from_date ?></td>
                                    <td><?php echo $to_date ?></td>
                                    <td>
                                        <a
                                            href="day_summery.php?from_date='<?php echo $from_date ?>'&to_date='<?php echo $to_date ?>'&user_id='<?php echo $user_id ?>'&count='<?php echo $data['qr_number_count'] ?>'"><?php echo $data['qr_number_count'] ?></a>
                                    </td>
                                    <td>
                                        <a
                                            href="r_qty.php?from_date='<?php echo $from_date ?>'&to_date='<?php echo $to_date ?>'&user_id='<?php echo $user_id ?>'&count='<?php echo $reject ?>'"><?php echo $reject ?></a>
                                    </td>
                                </tr>
                                <?php }}
}
?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../includes/footer.php';?>