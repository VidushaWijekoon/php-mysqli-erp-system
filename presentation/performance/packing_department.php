<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';?>

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
// $cartoon_number = '';
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./performance_record.php">
            <i class="fa-solid fa-left fa-4x m-2 mt-5" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class=" col col-sm-6 col-md-3">
    <?php
$date = date('Y-m-d 00:00:00');
$date2 = date('Y-m-d 23:59:59');
$start_time = $date;
$end_time = $date2;?>
    <a href="get_shipment_excel.php">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Get Excel Sheet
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </a>
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
}?>
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
    if ($datetime_2 < $datetime_1) {

        ?>
                                    <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                        <?php echo $diff->i . ' Minutes' ?>
                                        minute &#128525;</label>
                                    <?php
} else {
        ?>
                                    <label class="col-sm-12 col-form-label text-danger">You are Late :
                                        <?php echo $diff->i . ' Minutes'; ?>
                                        minute</label>
                                    <?php }
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
                                <th>Sales Order</th>
                                <th>Box No</th>
                                <th>Bubble Wrapping User Id</th>
                                <th>QR code</th>


                            </tr>
                        </thead>
                        <tbody>
                            <form method="POST">
                                <tr><?php
$query = "SELECT * FROM packing_mfg WHERE packing_by ='$user_name'  ORDER BY `mfg_id` DESC LIMIT 1";
$query_run = mysqli_query($connection, $query);
$name = '';
$box = '';
$so = '';
foreach ($query_run as $data) {
    $name = $data['bubble_wrapping'];
    $box = $data['cartoon_number'];
    $so = $data['sales_order_id'];
}
?>
                                    <td><input class="w-6" style="color:black !important" type="text" id="sales_order"
                                            name="sales_order" placeholder="salesorder " value="<?php echo $so ?>"></td>
                                    <td><input class="w-12" style="color:black !important" type="text" id="qr"
                                            name="box_num" placeholder=" box number " value="<?php echo $box ?>">
                                    </td>
                                    <td>
                                        <input class="w-75" style="color:black !important" type="text"
                                            id="wrapping_user" name="wrapping_user" placeholder=" Wrapping user here"
                                            value="<?php echo $name ?>">
                                    </td>
                                    <td><input class="w-75 " style="color:black !important" type="text" id="qr"
                                            name="qr" placeholder=" scan qr code here"></td>
                                    <!-- <td><input class="w-75" style="color:black !important" type="text" id="mfg"
                                            name="mfg" placeholder=" scan mfg code here"></td> -->
                                    <button type="submit" name="submit" id="submit"
                                        class="btn btn-default bg-gradient-success btn-next float-right d-none">
                                        Confirm
                                    </button>
                                </tr>

                            </form>
                        </tbody>
                    </table>
                    <table id="tblexportData" class="table table-striped">
                        <thead>
                            <tr>
                                <th>BOX No</th>
                                <th>Job Description</th>
                                <th>Sales Order</th>
                                <th>MFG</th>
                                <th>Model</th>
                                <th>Scanned QR code</th>
                                <th>Complete Time</th>
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
    $test = $data['mfg_code']
    ?>
                            <tr>
                                <td><?php $query = "SELECT cartoon_number FROM packing_mfg WHERE mfg='$test'";
    $sql_query_run = mysqli_query($connection, $query);
    foreach ($sql_query_run as $box) {
        echo $box['cartoon_number'];}
    ?>
                                </td>
                                <td><?php echo $data['job_description'] ?></td>
                                <td><?php
echo $data['sales_order']
    ?></td>
                                <td><?php
echo $data['mfg_code']
    ?></td>
                                <td><?php
echo $data['model']
    ?></td>
                                <td><?php
echo $data['qr_number']; ?></td>
                                <td><?php echo $data['start_time'] ?></td>
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
<?php
$wrapping_user_id = '';
$alsakb_qr = '';
$start_date = '';
$mfg = '';
$model = '';
$brand = '';
$core = '';
$generation = '';
$sales_order = '';
$screen_size ='';
$screen_resolution = '';
$scanned_qr = '';
$packing_by = $_SESSION['username'];
$alsakb_qr = '';
$start_date = '';
$new_box_number = '';
if (isset($_POST['submit'])) {
    $sales_order = $_POST['sales_order'];
    $cartoon_number = $_POST['box_num'];
    $scanned_qr = $_POST['qr'];
    $new_box_number = $cartoon_number;
    // $mfg = $_POST['mfg'];
    $wrapping_user = $_POST['wrapping_user'];
    $packing_by = $_SESSION['username'];
    $alsakb_qr = $scanned_qr;
    // $qr_number = explode("b", strtolower($scanned_qr));
    $alsakb_qr = $scanned_qr;
    $query = "SELECT * FROM warehouse_information_sheet WHERE inventory_id='$alsakb_qr'";
    echo $query;
    $sql = mysqli_query($connection, $query);
    foreach ($sql as $a) {
        $mfg = $a['mfg'];
        $model = $a['model'];
        $brand = $a['brand'];
        $core = $a['core'];
        $generation = $a['generation'];
        $screen_size = $a['lcd_size'];
        $screen_resolution = $a['screen_resolution'];

    }
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $existing = 'null';
    $query = "SELECT mfg FROM packing_mfg WHERE mfg='$mfg'";
    echo $query;
    // exit();
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {
        $existing = $data['mfg'];

    }
    // if ($existing == 'null') {
        $query = "SELECT user_id FROM users WHERE username='$wrapping_user'";
        $query_run = mysqli_query($connection, $query);
        foreach ($query_run as $data) {
            $wrapping_user_id = $data['user_id'];
        }
        // $query="INSERT INTO `packing_mfg`(
        //     `device`,
        //     `created_by`,
        //     `mfg`,
        //     `cartoon_number`,
        //     `packing_by`,
        //     `packing_date`,
        //     alsakb_qr,
        //     bubble_wrapping,
        //     sales_order_id
        // )
        // VALUES(
        //     'Laptop',
        //     '$user_id',
        //     '$mfg',
        //     '$cartoon_number',
        //     '$packing_by',
        //     '$start_date',
        //     '$alsakb_qr',
        //     '$wrapping_user',
        //     '$sales_order'
        // )";
        //  $query_run = mysqli_query($connection,$query);

        echo "<script>
                 $(window).load(function() {
                     $('#myModal5').modal('show');
                 });
                 </script>";

        $_POST['submit'] = '';
    // } else {
    //     $_POST['submit'] = '';
    //     echo "<script>
    //                 $(window).load(function() {
    //                     $('#myModal4').modal('show');
    //                 });
    //                 </script>";
    // }
}
?>

<div class="modal fade " id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12" style=" font-size: 30px;">
                Duplicate MFG Found
            </div>
            <button data-dismiss="modal" class="close " type="button" area-label="close">
                <div class="w-10">close</div>
            </button>
        </div>

    </div>
</div>

<div class="modal fade " id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12" style=" font-size: 30px;">
                Specification
            </div>
            <div>
            </div>
            <div>
                <form method="POST">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="brand" name="brand"
                                value="<?php echo $brand ?>" required readonly>
                            <!-- <label class="label_values my-1">HP
                                <input type="radio" id="brand" name="brand" value="HP" required></label>
                            <label class="label_values my-1">DELL </label>
                            <input type="radio" id="brand" name="brand" value="DELL">
                            <label class="label_values my-1">Lenovo </label>
                            <input type="radio" id="brand" name="brand" value="Lenovo">
                            <label class="label_values my-1"> Toshiba</label>
                            <input type="radio" id="brand" name="brand" value="Toshiba">
                            <label class="label_values my-1"> Sony</label>
                            <input type="radio" id="brand" name="brand" value="Sony">
                            <label class="label_values my-1">ACER </label>
                            <input type="radio" id="brand" name="brand" value="ACER">
                            <label class="label_values my-1">ASUS </label>
                            <input type="radio" id="brand" name="brand" value="ASUS">
                            <label class="label_values my-1">Panasonic </label>
                            <input type="radio" id="brand" name="brand" value="Panasonic">
                            <label class="label_values my-1">Microsoft </label>
                            <input type="radio" id="brand" name="brand" value="Microsoft"> -->
                        </DIV>
                    </DIV>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">model</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="model" name="model"
                                value="<?php echo $model ?>" required readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Core</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="core" name="core"
                                value="<?php echo $core ?>" required readonly>
                            <!-- <label class="label_values my-1">i3 </label>
                            <input type="radio" id="core" name="core" value="3" required>
                            <label class="label_values my-1">i5 </label>
                            <input type="radio" id="core" name="core" value="5">
                            <label class="label_values my-1">i7 </label>
                            <input type="radio" id="core" name="core" value="7">
                            <label class="label_values my-1">i9 </label>
                            <input type="radio" id="core" name="core" value="9">
                            <label class="label_values my-1">c2d </label>
                            <input type="radio" id="core" name="core" value="c2d"> -->
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Generation</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="generation"
                                name="generation" value="<?php echo $generation ?>" required readonly>
                            <!-- <label class="label_values my-1">1 </label>
                            <input type="radio" id="generation" name="generation" value="1" required>
                            <label class="label_values my-1">2 </label>
                            <input type="radio" id="generation" name="generation" value="2">
                            <label class="label_values my-1">3 </label>
                            <input type="radio" id="generation" name="generation" value="3">
                            <label class="label_values my-1">4 </label>
                            <input type="radio" id="generation" name="generation" value="4">
                            <label class="label_values my-1">5 </label>
                            <input type="radio" id="generation" name="generation" value="5">
                            <label class="label_values my-1">6 </label>
                            <input type="radio" id="generation" name="generation" value="6">
                            <label class="label_values my-1">7 </label>
                            <input type="radio" id="generation" name="generation" value="7">
                            <label class="label_values my-1">8 </label>
                            <input type="radio" id="generation" name="generation" value="8">
                            <label class="label_values my-1">9 </label>
                            <input type="radio" id="generation" name="generation" value="9">
                            <label class="label_values my-1">10 </label>
                            <input type="radio" id="generation" name="generation" value="10"> -->
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Screen Size</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="screen_size"
                                name="screen_size" value="<?php echo $screen_size ?>" required readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Screen Resolution</label>
                        <div class="col-sm-10">
                            <input class="w-12" style="color:black !important" type="text" id="screen_resolution"
                                name="screen_resolution" value="<?php echo $screen_resolution ?>" required readonly>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">RAM</label>
                        <div class="col-sm-10">
                            <label class="label_values my-1">2GB </label>
                            <input type="radio" id="ram" name="ram" value="2" required>
                            <label class="label_values my-1">4GB </label>
                            <input type="radio" id="ram" name="ram" value="4">
                            <label class="label_values my-1">8GB </label>
                            <input type="radio" id="ram" name="ram" value="8">
                            <label class="label_values my-1">16GB </label>
                            <input type="radio" id="ram" name="ram" value="16">
                            <label class="label_values my-1">32GB </label>
                            <input type="radio" id="ram" name="ram" value="32">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Hard Type</label>
                        <div class="col-sm-10">
                            <label class="label_values my-1">HDD </label>
                            <input type="radio" id="hard_type" name="hard_type" value="hdd" required>
                            <label class="label_values my-1">SSD </label>
                            <input type="radio" id="hard_type" name="hard_type" value="ssd">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Hard Disk Size</label>
                        <div class="col-sm-10">
                            <label class="label_values my-1">120GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="120" required>
                            <label class="label_values my-1">250GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="250">
                            <label class="label_values my-1">320GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="320">
                            <label class="label_values my-1">500GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="500">
                            <label class="label_values my-1">128GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="128">
                            <label class="label_values my-1">256GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="256">
                            <label class="label_values my-1">512GB </label>
                            <input type="radio" id="hard_capacity" name="hard_capacity" value="512">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Charger</label>
                        <div class="col-sm-10">
                            <label class="label_values my-1">45w </label>
                            <input type="radio" id="charger" name="charger" value="45w" required>
                            <label class="label_values my-1">65w </label>
                            <input type="radio" id="charger" name="charger" value="65w">
                            <label class="label_values my-1">90w </label>
                            <input type="radio" id="charger" name="charger" value="90w">
                            <label class="label_values my-1">135w </label>
                            <input type="radio" id="charger" name="charger" value="135w">
                            <label class="label_values my-1">180w </label>
                            <input type="radio" id="charger" name="charger" value="180w">
                            <label class="label_values my-1">None </label>
                            <input type="radio" id="charger" name="charger" value="None">
                        </div>
                    </div>
                    <input type="hidden" name="wrapping_user_id" value="<?php echo $wrapping_user_id ?>">
                    <input type="hidden" name="mfg" value="<?php echo $mfg ?>">
                    <input type="hidden" name="alsakb_qr" value="<?php echo $alsakb_qr ?>">
                    <input type="hidden" name="start_date" value="<?php echo $start_date ?>">
                    <input type="hidden" name="sales_order" value="<?php echo $sales_order ?>">
                    <input type="hidden" name="new_box_number" value="<?php echo $new_box_number ?>">
                    <button type="submit" name="submit_form" id="submit_form"
                        class="btn btn-default bg-gradient-success btn-next float-right ">
                        Confirm
                    </button>
                    <button data-dismiss="modal" type="" name="cancel_form" id="cancel_form"
                        class="btn btn-default bg-gradient-success btn-next float-right ">
                        Cancel
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<?php
// if (isset($_POST['cancel_form'])) {
//     $packing_id=0;
//     $query="SELECT username FROM users WHERE user_id='$user_id'";
//     $query_run = mysqli_query($connection,$query);
//     $username='';
//     foreach($query_run as $data){
//         $username=$data['username'];
//     }
//     $query = "SELECT mfg_id FROM packing_mfg WHERE packing_by='$username' ORDER BY mfg_id DESC LIMIT 1";
//     $query_run_ret = mysqli_query($connection,$query);
//     foreach($query_run_ret as $data){
//     $packing_id=$data['mfg_id'];
//     }
// $query="DELETE FROM `packing_mfg` WHERE mfg_id='$packing_id'";
// $query_run_remove = mysqli_query($connection,$query);
// header('Location: packing_department.php');

// }
if (isset($_POST['submit_form'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $generation = $_POST['generation'];
    $core = $_POST['core'];
    $ram = $_POST['ram'];
    $hard_type = $_POST['hard_type'];
    $hard_capacity = $_POST['hard_capacity'];
    $charger = $_POST['charger'];
    $wrapping_user_id = $_POST['wrapping_user_id'];
    $alsakb_qr = $_POST['alsakb_qr'];
    $start_date = $_POST['start_date'];
    $mfg = $_POST['mfg'];
    $new_box_number = $_POST['new_box_number'];
    $sales_order = $_POST['sales_order'];
    $screen_resolution = $_POST['screen_resolution'];
    $screen_size = $_POST['screen_size'];
    $packing_id = 0;
    $query = "SELECT username FROM users WHERE user_id='$user_id'";
    $query_run = mysqli_query($connection, $query);
    $username = '';
    foreach ($query_run as $data) {
        $username = $data['username'];
    }
    $query = "SELECT mfg_id FROM packing_mfg WHERE packing_by='$username' ORDER BY mfg_id DESC LIMIT 1";
    $query_run_ret = mysqli_query($connection, $query);
    foreach ($query_run_ret as $data) {
        $packing_id = $data['mfg_id'];
    }
    $query = "INSERT INTO `packing_mfg`(
    `device`,
    `created_by`,
    `mfg`,
    `cartoon_number`,
    `packing_by`,
    `packing_date`,
    alsakb_qr,
    bubble_wrapping,
    sales_order_id,
    brand,
    model,
    generation,
    core,
    ram_capacity,
    hdd_type,
    hdd_capacity,
    charger,
    screen_resolution,
    screen_size
)
VALUES(
    'Laptop',
    '$user_id',
    '$mfg',
    '$new_box_number',
    '$packing_by',
    '$start_date',
    '$alsakb_qr',
    '$wrapping_user',
    '$sales_order',
    '$brand',
    '$model',
    '$generation',
    '$core',
    '$ram_capacity',
    '$hdd_type',
    '$hdd_capacity',
    '$charger',
    '$screen_resolution',
    '$screen_size'

)";
    $query_run = mysqli_query($connection, $query);

// $query ="UPDATE packing_mfg SET brand='$brand',model='$model',generation='$generation',core='$core',ram_capacity='$ram',hdd_type='$hard_type',hdd_capacity='$hard_capacity',charger='$charger' WHERE mfg_id='$packing_id'";

// $sql_run =mysqli_query($connection,$query);
    $query = "INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `target`,
    status,
    mfg_code,
    model,
    charger,
    sales_order
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$alsakb_qr',
    'packing scaned',
    '$start_date',
    '$start_date',
    '1',
    '0',
    '$mfg',
    '$model',
    '$charger',
    '$sales_order'
    ),(
    '$wrapping_user_id',
    '$department_id',
    '$alsakb_qr',
    'packing',
    '$start_date',
    '$start_date',
    '1',
    '0',
    '$mfg',
    '$model',
    '$charger',
    '$sales_order'
    ) ";
    $query_run = mysqli_query($connection, $query);
    $query1 = "UPDATE warehouse_information_sheet SET dispatch='1' WHERE mfg='$mfg'";
    $query_run1 = mysqli_query($connection, $query1);
    header('Location: packing_department.php');

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