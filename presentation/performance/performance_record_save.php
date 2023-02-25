<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';

$scanned_qr = '0';
$scanned_mfg = '0';
$lcd_p_n = 0;
$search_value;
$scanned_qr = trim($_POST['qr']);
$job_description = $_POST['job_description'];
$user_id = trim($_POST['user_id']);
$user_role = $_POST['user_role'];
$department_id = $_POST['department_id'];
$previous_job_description = '';
$end_time = "0000-00-00";
$performance_id = 0;
$_POST['qr'] = '';
$_POST['job_description'] = '';
<<<<<<< HEAD
=======
$lcd_p_n = $_POST['pn_num'];
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
$same_jd_count = 0;
$status = 0;
if ($scanned_qr != '0') {
    $search_value = trim($scanned_qr);
} elseif ($scanned_mfg != 0) {
    $search_value = $scanned_mfg;
}
<<<<<<< HEAD
if ($job_description == 'send to production' && $department_id == 2) {
    $query = "UPDATE `warehouse_information_sheet` SET`send_to_production`='1' WHERE inventory_id='$scanned_qr'";
    $sql = mysqli_query($connection, $query);
}
=======
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
if ($department_id == 14) {
    $query = "SELECT bat_id,status FROM battery_request WHERE battery_p_n='$search_value'";

    $sql = mysqli_query($connection, $query);
    $b_id = 0;
    $st = 'null';
    foreach ($sql as $a) {
        $b_id = $a['bat_id'];
        $status = $a['status'];
    }
    if ($status == 0) {
        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
        $date = $date1->format('Y-m-d H:i:s');
        $query = "UPDATE battery_request SET status='1', completed_date='$date' WHERE bat_id='$b_id'";
        $sql = mysqli_query($connection, $query);
    }
}
<<<<<<< HEAD
if ($department_id == 1) {
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
} else {
    $query = "SELECT * FROM performance_record_table WHERE qr_number ='$search_value' AND
                job_description = '$job_description' ";
}

$query_run = mysqli_query($connection, $query);
$row = mysqli_num_rows($query_run);

if ($row == 0) {
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (lcd_p_n_code ='$search_value') AND
                job_description = '$job_description' ";
=======
$query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";

$query_run = mysqli_query($connection, $query);
$row = mysqli_num_rows($query_run);

if ($row == 0) {
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (lcd_p_n_code ='$search_value') AND
                job_description = '$job_description' ";
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
<<<<<<< HEAD
//update
if ($end_time == "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 0) {

=======

if ($end_time == "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 0) {
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
    $working_time_in_seconds;
    $start_time = 0000 - 00 - 00;
    $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
    $query_run = mysqli_query($connection, $query);
    foreach ($query_run as $data) {
        $performance_id = $data['performance_id'];
        $start_time = $data['start_time'];
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
<<<<<<< HEAD
    if ($department_id == 9) {
        $query22 = "UPDATE issue_laptops
        SET
        status = 2,
        received_date = now()
        WHERE alsakb_qr = $search_value";
        $query_run22 = mysqli_query($connection, $query22);
    }
=======
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
    if ($department_id == 2) {
        header('Location: inventory_performance.php');
    } else {
        header('Location: performance_record.php');
    }
<<<<<<< HEAD
} elseif ($same_jd_count == 0) {

=======

} elseif ($same_jd_count == 0) {

>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $target = 0;
    if ($department_id == 1) {
        if ($_SESSION['role_id'] == 33) {
            $target = 1;
        } else {
            $target = 1;
        }
    } elseif ($department_id == 10) {
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
    } elseif ($department_id == 7) {
        if ($job_description == "Sanding") {
            $target = 1.30;
        } elseif ($job_description == "Bodywork") {
            $target = 2.50;
        } elseif ($job_description == "Taping") {
            $target = 1.30;
        }
    } elseif ($department_id == 8) {
        if ($job_description == "Low Generation") {
            $target = 1;
        } elseif ($job_description == "Full Painting") {
            $target = 4;
        } elseif ($job_description == "Keyboard Lacker") {
            $target = 0.4;
        } elseif ($job_description == "A panel paint") {
            $target = 1;
        }
    } elseif ($department_id == 14) {
        if ($job_description == "Openning Battery And Cell Change") {
            $target = 2.66;
        } elseif ($job_description == "Unlock") {
            $target = 1;
        } elseif ($job_description == "Chargin") {
            $target = 1;
        }
    } elseif ($department_id == 13) {
        if ($job_description == "Clean") {
            $target = 1;
        } elseif ($job_description == "Full Painting Packing") {
            $target = 3.3;
        } elseif ($job_description == "Packing") {
            $target = 1;
        }
    } elseif ($department_id == 9) {
        if ($job_description == "BIOS Lock High Gen") {
            $target = 1.66;
        } elseif ($job_description == "BIOS Lock Low Gen") {
            $target = 2.85;
        } elseif ($job_description == "No Power / No Display / Account Lock/ Ports Issue") {
<<<<<<< HEAD
            $target = 4;
        }
=======
            $target = 4;}

>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
    } elseif ($department_id == 22) {
        if ($job_description == "Designing + Pasting") {
            $target = 7.5;
        } elseif ($job_description == "Pasting") {
            $target = 1;
        }
    } elseif ($department_id == 2) {
        $target = 1;
    } elseif ($department_id == 23) {
        $target = 1;
    }
    if ($department_id == 10) {
        $row = 0;
        if ($job_description == 'Remove LCD') {
            $query = "SELECT qr_number FROM performance_record_table WHERE qr_number='$scanned_qr' AND job_description='Remove LCD' ";
            $query_run = mysqli_query($connection, $query);
            $row = mysqli_num_rows($query_run);
            if ($row != 0) {
                $query = "SELECT qr_number FROM performance_record_table WHERE lcd_p_n_code='$scanned_qr' ";
                $sql = mysqli_query($connection, $query);
<<<<<<< HEAD
                if (empty($sql)) {
                } else {
=======
                if (empty($sql)) {} else {
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
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
    }
    if ($department_id == 2) {
        $query = "INSERT INTO `performance_record_table`(
                        `user_id`,
                        `department_id`,
                        `qr_number`,
                        `job_description`,
                        `start_time`,
                        `end_time`,
                        status,
                        `target`
                        )
                        VALUES(
                        '$user_id',
                        '$department_id',
                        '$scanned_qr',
                        '$job_description',
                        '$start_date',
                        '$start_date',
                        '1',
                        '1'
                        ) ";
        $query_run = mysqli_query($connection, $query);
        if ($department_id == 2) {
            header('Location: inventory_performance.php');
        }
    } elseif ($department_id == 1 && $user_role == 9) {
        $query = "INSERT INTO `performance_record_table`(
                        `user_id`,
                        `department_id`,
                        `qr_number`,
                        `job_description`,
                        `start_time`,
                        `end_time`,
                        status
                        )
                        VALUES(
                        '$user_id',
                        '$department_id',
                        '$scanned_qr',
                        '$job_description',
                        '$start_date',
                        '$start_date',
                        '1'
                        ) ";
        $query_run = mysqli_query($connection, $query);

        header('Location: performance_record.php');
    } else {
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

        header('Location: performance_record.php');
    }
<<<<<<< HEAD
} elseif ($end_time != "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 1) {
?>
    <script>
        if (window.confirm('Already you completed this machine under this job description')) {
            document.location = ' performance_record.php';
        }
    </script>
=======

} elseif ($end_time != "0000-00-00 00:00:00" && $same_jd_count == 1 && $status == 1) {
    ?>
<script>
if (window.confirm('Already you completed this machine under this job description')) {
    document.location = ' performance_record.php';
}
</script>
>>>>>>> 569552d40ee2f789411c7a1010ccfc478522bf45
<?php

}

?>