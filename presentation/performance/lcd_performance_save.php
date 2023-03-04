<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';

$scanned_qr = '0';
$scanned_mfg = '0';
$lcd_p_n = 0;
$search_value;
$scanned_qr = trim($_POST['qr']);
$scanned_qr = str_replace("'", '', $scanned_qr);
$job_description = $_POST['job_description'];
$user_id = trim($_POST['user_id']);
$user_role = $_POST['user_role'];
$department_id = $_POST['department_id'];
$previous_job_description = '';
$end_time = "0000-00-00";
$performance_id = 0;
$_POST['qr'] = '';
$_POST['job_description'] = '';
$lcd_p_n = $_POST['pn_num'];
$same_jd_count = 0;
$status = 0;
if ($scanned_qr != '0') {
    $search_value = trim($scanned_qr);
} elseif ($scanned_mfg != 0) {
    $search_value = $scanned_mfg;
}

$query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
echo $query;
$query_run = mysqli_query($connection, $query);
$row = mysqli_num_rows($query_run);

if ($row == 0) {
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (lcd_p_n_code ='$search_value') AND
                job_description = '$job_description' ";
    $query_run = mysqli_query($connection, $query);
    $row = mysqli_num_rows($query_run);
    $lcd_p_n = $search_value;
    foreach ($query_run as $data) {
        $search_value = $data['qr_number'];
        $performance_id = $data['performance_id'];
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];
        $previous_job_description .= $data['job_description'] . ",";
        $status = $data['status'];
    }
    $test = 0;

    $test = explode(",", $previous_job_description);
    foreach ($test as $a) {
        if ($a == $job_description) {
            $same_jd_count++;
        }
    }
    // echo "im here";
    // exit();
    // $same_jd_count = 0;
} else {
    foreach ($query_run as $data) {
        $performance_id = $data['performance_id'];
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];
        $previous_job_description .= $data['job_description'] . ",";
        $status = $data['status'];
    }
    $test = 0;

    $test = explode(",", $previous_job_description);
    foreach ($test as $a) {
        if ($a == $job_description) {
            $same_jd_count++;
        }
    }
}

if ($end_time == "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 0) {
    $working_time_in_seconds;
    $start_time = 0000 - 00 - 00;
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND qr_number ='$search_value' AND
                job_description = '$job_description' ";
    $query_run = mysqli_query($connection, $query);
    $test = 0;
    foreach ($query_run as $data) {
        $performance_id = $data['performance_id'];
        $start_time = $data['start_time'];
        $test = $data['qr_number'];
    }
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $date = $date1->format('Y-m-d H:i:s');
    $start_datetime = new DateTime($date);
    $diff = $start_datetime->diff(new DateTime($start_time));
    $datetime1 = new DateTime($date);
    $datetime2 = new DateTime($start_time);
    $interval = $datetime1->diff($datetime2);
    $duration = $interval->format('%H:%i');
    // if (1682064000 < $now) {
    //     $query = "UPDATE performance_record_table SET user_id='$user_id',qr_number='$scanned_qr'";
    //     $query_run = mysqli_query($connection, $query);
    // }
    $query = "UPDATE
                `performance_record_table`
                SET
                `end_time` = '$date',
                `spend_time` = '$duration',
                lcd_p_n_code='$lcd_p_n',
                status = 1
                WHERE performance_id = $performance_id";
    $query_run = mysqli_query($connection, $query);
    $query1 = "SELECT * FROM lcd_issue WHERE alsakb_number='$test'";

    $sql1 = mysqli_query($connection, $query1);
    ///////////////////////////////////////////////////////////////////////////////
    // need to uncoment again check
    //     $query22 = "UPDATE issue_laptops
    //     SET
    //     status = 2,
    //     received_date = now()
    //     WHERE alsakb_qr = $test";
    // $query_run22 = mysqli_query($connection, $query22);
    //////////////////////////////////////////////////////////////////////////////////////
    $scratch = 0;
    $spot = 0;
    $broken_lcd = 0;
    $yellow_shadow = 0;
    foreach ($sql1 as $data) {
        $scratch = $data['scratch'];
        $spot = $data['spot'];
        $broken_lcd = $data['broken_lcd'];
        $yellow_shadow = $data['yellow_shadow'];
    }
    $issue = "";
    if ($broken_lcd != 0) {
        $issue = "Please Send the Broken Rack";
    } elseif ($yellow_shadow != 0) {
        $issue = "Please Send the Yellow Shadow Rack";
    } elseif ($scratch != 0 && $spot != 0) {
        $issue = "Please Send to Fix the Scratch And Spot Issue";
    } elseif ($scratch != 0) {
        $issue = "Please Send to Fix the Scratch Issue";
    } elseif ($spot != 0) {
        $issue = "Please Send to Fix the Spot Issue";
    }

    header("Location:lcd_performance.php?updated=$job_description&endid=$search_value&issue=$issue");
} elseif ($same_jd_count == 0) {

    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $target = 0;
    if ($department_id == 10) {
        if ($_SESSION['role_id'] == 9) {
            $target = 2;
        } elseif ($job_description == "Remove LCD") {
            $target = 1;
        } elseif ($job_description == "Install LCD") {
            $target = 1;
        } elseif ($job_description == "Fixed Lcd") {
            $target = 4;
        } elseif ($job_description == "Remove Polization Film") {
            $target = 1;
        } elseif ($job_description == "Clean+Glue+Install Polization Film") {
            $target = 2;
        }
    }
    $row = 0;
    if ($job_description == 'Remove LCD') {
        $query = "SELECT qr_number FROM performance_record_table WHERE qr_number='$scanned_qr' AND job_description='Remove LCD' ";
        $query_run = mysqli_query($connection, $query);
        $row = mysqli_num_rows($query_run);
        if ($row != 0) {
            $query = "SELECT qr_number FROM performance_record_table WHERE lcd_p_n_code='$scanned_qr' ";
            $sql = mysqli_query($connection, $query);
            if (empty($sql)) {
            } else {
                if ($lcd_p_n == 0) {
                    $lcd_p_n = $scanned_qr;
                }
                foreach ($sql as $a) {
                    $scanned_qr = $a['qr_number'];
                }
            }
        } else {
            $lcd_p_n = '';
        }
    } else {
        echo $job_description;
        echo "</br>";
        $row = 0;
        $query = "SELECT qr_number FROM performance_record_table WHERE lcd_p_n_code='$scanned_qr' ";
        $sql = mysqli_query($connection, $query);
        $row = mysqli_num_rows($sql);
        if ($row == 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Not any relationship with ALSAKB QR Code");';
            echo '</script>';
        } else {

            $lcd_p_n = $scanned_qr;
            foreach ($sql as $a) {
                $scanned_qr = $a['qr_number'];
            }
        }
    }

    $query = "INSERT INTO `performance_record_table`(
                `user_id`,
                `department_id`,
                `qr_number`,
                `job_description`,
                `start_time`,
                `target`,
                status,
                lcd_p_n_code
                )
                VALUES(
                '$user_id',
                '$department_id',
                '$scanned_qr',
                '$job_description',
                '$start_date',
                '$target',
                '0',
                '$lcd_p_n'
                ) ";
    $query_run = mysqli_query($connection, $query);

    header("Location: lcd_performance.php?updated=$job_description&id=$search_value");
} elseif ($end_time != "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 1) {
?>
    <script>
        if (window.confirm('Already you completed this machine under this job description')) {
            document.location = ' lcd_performance.php';
        }
    </script>
<?php

}

?>