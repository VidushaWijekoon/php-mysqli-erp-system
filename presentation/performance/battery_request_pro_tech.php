<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$user_name = $_SESSION['username'];
$department_id = $_SESSION['department'];
$user_role = $_SESSION['role_id'];
if (isset($_POST['submit'])) {
    $model = 0;
    $p_n = 0;
    $model = $_POST['model'];
    $p_n = $_POST['p_n'];
    if ($model != 0 && $p_n != 0) {
        $query = "INSERT INTO battery_request ( `model`, `battery_p_n`,  `technician_name`,status) VALUES('$model','$p_n','$user_name','0')";
        $sql = mysqli_query($connection, $query);
        header('Location: battery_request_pro_tech.php');
    } else {

        echo '<script type="text/javascript">';
        echo 'alert("Please Enter Model And P/N");';
        echo '</script>';
    }
}
?>
<?php if ($department_id == 1 && $user_role == 4) { ?>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center mt-2"><a href="./performance_record.php">
                <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
            </a>
        </div>
    </div>
<?php } elseif ($department_id == 19 && $user_role == 4) { ?> \
    <div class="row page-titles">
        <div class="col-md-5 align-self-center mt-2"><a href="./qc_performance_record.php">
                <i class="fa-solid fa-left fa-4x " style="color: #ced4da;"></i>
            </a>
        </div>
    </div>
<?php } ?>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase float-left">
    <div class="row ">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto ">
            <div class="card mt-3">
                <div class="card-header" style="font-size:18px">
                    Battery Request
                </div>
                <div class="card-body">
                    <div class="row">

                        <form method="POST">
                            <div class=" row">
                                <label class="col-sm-6 col-form-label">Model</label>
                                <div class="col-sm-6">
                                    <input class="w-200" style="color:black !important" type="text" name="model" placeholder="Enter Model here">
                                </div>
                            </div>
                            <div class=" row">
                                <label class="col-sm-6 col-form-label">Battery P/N Code</label>
                                <div class="col-sm-6">
                                    <input class="w-200" style="color:black !important" type="text" name="p_n" placeholder="Scan Battery P/N Code">
                                </div>
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-default bg-gradient-success btn-next d-none">
                                <?php echo $month ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto ">
        <table id="tblexportData" class="table table-striped">
            <thead>
                <th>Model</th>
                <th>Battery P/N </th>
            </thead>
            <tbody>
                <?php
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $date = $date1->format('Y-m-d 00:00:00');
                $date2 = $date1->format('Y-m-d 23:59:59');
                $technician_name = $_SESSION['username'];
                $query = "SELECT model,battery_p_n FROM battery_request WHERE technician_name='$technician_name' AND request_date between '$date'AND '$date2'";
                $sql = mysqli_query($connection, $query);
                foreach ($sql as $a) {

                ?>
                    <tr>
                        <td><?php echo $a['model'] ?></td>
                        <td><?php echo $a['battery_p_n'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<!-- //////////////////////////////////////////////////////// -->