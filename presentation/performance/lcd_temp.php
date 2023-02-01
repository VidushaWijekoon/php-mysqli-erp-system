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
if (empty($_GET['user_id'])) {} else {
    $test_id = $_GET['user_id'];
    $test_name = $_GET['username'];
    if ($test_id != 0) {
        echo "<script>
    $(window).load(function() {
        $('#myModal69').modal('show');
    });
    </script>";
    }}
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role_id'];
$department_id = $_SESSION['department'];

$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
date_default_timezone_set('Asia/Dubai');
$timestamp2 = strtotime(date('Y-m-d 13:55:00'));
$timestamp3 = strtotime(date('Y-m-d 18:15:00'));
$timestamp4 = strtotime(date('Y-m-d 20:55:00'));

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
} elseif (strtotime(date('Y-m-d 14:59:00')) < $now && $now > $_SESSION['expire2'] && $now < strtotime(date('Y-m-d 18:15:00'))) {
    session_destroy();
    echo "<p align='center'>Session has been destroyed!!";
    header("Location: ../../index.php");
} elseif (strtotime(date('Y-m-d 18:44:00')) < $now && $now > $_SESSION['expire3'] && $now < strtotime(date('Y-m-d 20:55:00'))) {
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


<div class="container-fluid">
    <div class="col col-lg-12 justify-content-center m-auto  text-uppercase">

        <div class='row mt-4'>
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
                            <td><a
                                    href="lcd_team_lead.php?user_id=<?php echo $user_id ?>&username=<?php echo $username ?>"><?php echo $username; ?></a>
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
    }?></td> -->
                            <td><?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d 00:00:00');
    $date2 = $date1->format('Y-m-d 23:59:59');
    $query = "SELECT COUNT(status) AS status1 FROM performance_record_table WHERE user_id='$user_id' AND  status='1' AND start_time between '$date'AND '$date2'";
    $query_run = mysqli_query($connection, $query);

    foreach ($query_run as $b) {
        echo $b['status1'];
        $iwara = $b['status1'];
    }?></td>
                            <!-- <td><?php $ithuru = $okkoma - $iwara;
    echo $ithuru;?></td> -->
                        </tr>
                        <?php }
?>

                    </tbody>
                </table>
            </div>
            <div class="col col-lg-8 justify-content-center  text-uppercase">
                <table id="tblexportData" class="table table-striped">
                    <thead>
                        <th>Alsakb QR</th>
                        <th>Remove LCD</th>
                        <th>Sorting+Remove Polization Film</th>
                        <th>Fixed LCD</th>
                        <th>Clean+Glue+Install Polization Film</th>
                        <th>Install LCD</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        <?php
$date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
$start_time = date('Y-m-d 00:00:00', strtotime("-1 days"));
$end_time = date('Y-m-d 23:59:00');
$query = "SELECT qr_number FROM performance_record_table  WHERE department_id='10'AND start_time between '$start_time' AND '$end_time' GROUP BY qr_number";
$sql1 = mysqli_query($connection, $query);
foreach ($sql1 as $data) {
    $qr = $data['qr_number'];
    $query = "SELECT *,username FROM performance_record_table LEFT JOIN users ON users.user_id=performance_record_table.user_id WHERE performance_record_table.qr_number='$qr'";
    $sql = mysqli_query($connection, $query);
    $remove_lcd = 0;
    $install_lcd = 0;
    $rpf = 0;
    $clean_film = 0;
    $fixed_lcd = 0;
    $status_remove_lcd = 0;
    $status_install_lcd = 0;
    $status_rpf = 0;
    $status_clean_film = 0;
    $status_fixed_lcd = 0;
    $user_remove_lcd = 0;
    $user_install_lcd = 0;
    $user_rpf = 0;
    $user_clean_film = 0;
    $user_fixed_lcd = 0;
    $time=0;
    foreach ($sql as $a) {
        $job_description = $a['job_description'];
        $time=$a['start_time'];
        if ($job_description == 'Remove LCD') {
            $remove_lcd = 1;
            $status_remove_lcd = $a['status'];
            $user_remove_lcd = $a['username'];
        } elseif ($job_description == 'Install LCD') {
            $install_lcd = 1;
            $status_install_lcd = $a['status'];
            $user_install_lcd = $a['username'];
        } elseif ($job_description == 'Fixed Lcd') {
            $fixed_lcd = 1;
            $status_fixed_lcd = $a['status'];
            $user_fixed_lcd = $a['username'];
        } elseif ($job_description == 'Remove Polization Film') {
            $rpf = 1;
            $status_rpf = $a['status'];
            $user_rpf = $a['username'];
        } elseif ($job_description == 'Clean+Glue+Install Polization Film') {
            $clean_film = 1;
            $status_clean_film = $a['status'];
            $user_clean_film = $a['username'];
        }
    }
    ?><tr>
                        <td><?php echo $qr ?></td>
                        <td>
                            <?php
if ($remove_lcd == 1) {
        if ($status_remove_lcd == 1) {
            echo "<div class='text-success'>Completed /" . $user_remove_lcd . "</div>";
        } else {
            echo "<div class='text-warning'>On Going /" . $user_remove_lcd . "</div>";
        }
    } else {
        echo "-";
    }
    ?>
                        </td>
                        <td>
                            <?php
if ($rpf == 1) {
        if ($status_rpf == 1) {
            echo "<div class='text-success'>Completed /" . $user_rpf . "</div>";
        } else {
            echo "<div class='text-warning'>On Going /" . $user_rpf . "</div>";
        }
    } else {
        echo "-";
    }
    ?>
                        </td>
                        <td>
                            <?php
if ($fixed_lcd == 1) {
        if ($status_fixed_lcd == 1) {
            echo "<div class='text-success'>Completed /" . $user_fixed_lcd . "</div>";
        } else {
            echo "<div class='text-warning'>On Going /" . $user_fixed_lcd . "</div>";
        }
    } else {
        echo "-";
    }
    ?>
                        </td>
                        <td>
                            <?php
if ($clean_film == 1) {
        if ($status_clean_film == 1) {
            echo "<div class='text-success'>Completed /" . $user_clean_film . "</div>";
        } else {
            echo "<div class='text-warning'>On Going /" . $user_clean_film . "</div>";
        }
    } else {
        echo "-";
    }
    ?>
                        </td>
                        <td>
                            <?php
if ($install_lcd == 1) {
        if ($status_install_lcd == 1) {
            echo "<div class='text-success'>Completed /" . $user_install_lcd . "</div>";
        } else {
            echo "<div class='text-warning'>On Going /" . $user_install_lcd . "</div>";
        }
    } else {
        echo "-";
    }
    ?>
                        </td>
                        <td><?php echo $date ?></td>
                        </tr>
                        <?php
}
?>
                       

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade " id="myModal69" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header" style=" font-size: 30px;">
                    <?php $query = "SELECT COUNT(qr_number) as test, qr_number FROM performance_record_table WHERE technician_id='$test_name' AND start_time between '$date'AND '$date2'";
$query_run = mysqli_query($connection, $query);
$test = 0;
foreach ($query_run as $data) {
    $test = $data['test'];
}?>
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
        if ($rms == 1) {echo "<div class='text-success'>Completed</div>";} elseif ($rms == 0) {echo "<div class='text-warning'>On Going</div>";} else {echo "Not Start";}
    } else {echo "-";}
    ?>
                                        </td>
                                        <td><?php if ($rmp == 'Remove Polization Film') {
        if ($rmps == 1) {echo "<div class='text-success'>Completed</div>";} elseif ($rmps == 0) {echo "<div class='text-warning'>On Going</div>";} else {echo "Not Start";}
    } else {echo "-";}
    ?>
                                        </td>
                                        <td><?php if ($clean == 'Clean+Glue+Install Polization Film') {
        if ($cleans == 1) {echo "<div class='text-success'>Completed</div>";} elseif ($cleans == 0) {echo "<div class='text-warning'>On Going</div>";} else {echo "Not Start";}
    } else {echo "-";}
    ?>
                                        </td>
                                        <td><?php if ($fix == 'Fixed Lcd') {
        if ($fixs == 1) {echo "<div class='text-success'>Completed</div>";} elseif ($fixs == 0) {echo "<div class='text-warning'>On Going</div>";} else {echo "Not Start";}
    } else {echo "-";}
    ?>
                                        </td>
                                        <td><?php if ($install == 'Install LCD') {
        if ($installs == 1) {echo "<div class='text-success'>Completed</div>";} elseif ($installs == 0) {echo "<div class='text-warning'>On Going</div>";} else {echo "Not Start";}
    } else {echo "-";}
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
<?php include_once '../includes/footer.php';?>