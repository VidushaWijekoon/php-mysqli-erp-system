<?php
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');


                $scanned_qr = '0';
                $scanned_mfg = '0';
                $search_value;
                $scanned_qr = trim($_POST['qr']);
                $job_description = $_POST['job_description'];
                $user_id = trim($_POST['user_id']);
                $user_role = $_POST['user_role'];
                $department_id = $_POST['department_id'];
                $previous_job_description='';
                $end_time="0000-00-00";
                $performance_id = 0;
                $_POST['qr']='';
                $_POST['job_description']='';
                $same_jd_count=0;
                $status=0;
                if($scanned_qr != '0'){
                $search_value = trim($scanned_qr);
                }elseif($scanned_mfg !=0){
                $search_value = $scanned_mfg;
                }
                $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
                $query_run = mysqli_query($connection,$query);
                
                if(empty($query_run)){
                    $same_jd_count=0;
                }else{
                foreach($query_run as $data){
                $performance_id = $data['performance_id'];
                $start_time = $data['start_time'];
                $end_time = $data['end_time'];
                $previous_job_description .= $data['job_description'].",";
                $status = $data['status'];
                }
                $test =0;
                
                $test = explode(",",$previous_job_description);
                foreach($test as $a){
                if($a == $job_description){
                $same_jd_count++;
                }
                }
            }
                
                // if($performance_id !=0 && $end_time =="0000-00-00 00:00:00" && $same_jd_count==1 ){
                if($end_time =="0000-00-00 00:00:00" && $same_jd_count==1 && $status==0 ){
                // update existing task
                $working_time_in_seconds;
                $start_time=0000-00-00;
                $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND
                job_description = '$job_description' ";
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $data){
                $performance_id = $data['performance_id'];
                $start_time = $data['start_time'];
                }
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $date = $date1->format('Y-m-d H:i:s');
                // $working_time_in_seconds = strtotime($date) - strtotime($start_time);
                // $duration= round($working_time_in_seconds/60)*100;
                $start_datetime = new DateTime($date); 
                $diff = $start_datetime->diff(new DateTime($start_time));
                $datetime1 = new DateTime($date);
                $datetime2 = new DateTime($start_time);
                $interval = $datetime1->diff($datetime2);
                $duration= $interval->format('%H:%i');
                                            // echo $duration;
                                            // echo " HH:MM";
                                            // exit();
                $query="UPDATE
                `performance_record_table`
                SET
                `end_time` = '$date',
                `spend_time` = '$duration',
                status = 1
                WHERE performance_id = $performance_id";
                echo $query;
                $query_run = mysqli_query($connection,$query);
                header('Location: performance_record.php');

                }elseif($same_jd_count==0 ){
                 
                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                $start_date = $date1->format('Y-m-d H:i:s');
                $target = 0;
                if($department_id ==1){
                // production target
                if($_SESSION['role_id'] == 33){
                $target = 1;
                }else{
                $target = 1;
                }
                }
                elseif($department_id ==10){
                //lcd target
                if($_SESSION['role_id'] == 9){
                $target = 2;
                }elseif($job_description == "Remove LCD"){
                $target = 1;
                }elseif($job_description == "Install LCD"){
                $target = 1;
                }elseif($job_description == "Fixed Lcd"){
                $target = 4;
                }elseif($job_description == "Remove Polization Film"){
                $target = 1;
                }elseif($job_description == "Clean+Glue+Install Polization Film"){
                $target = 2;
                }
                }
                elseif($department_id ==7){
                //bodywork target
                if($job_description == "Sanding"){
                $target =1.30;
                }elseif($job_description== "Bodywork"){
                $target =2.50;
                }elseif($job_description== "Taping"){
                $target =1.30;
                }elseif($job_description== "Sticker Design"){
                    $target =2.0;
                    }
                }
                elseif($department_id ==8){
                //painting target
                if($job_description == "Low Generation"){
                $target =1;
                }elseif($job_description== "Full Painting"){
                $target = 4;
                }elseif($job_description== "Keyboard Lacker"){
                    $target = 0.4;
                    }elseif($job_description== "A panel paint"){
                        $target = 1;
                        }
                }
                elseif($department_id ==14){
                //battery target
                if($job_description=="Openning Battery And Cell Change"){
                $target = 3;
                }elseif($job_description == "Unlock"){
                $target = 1;
                }elseif($job_description == "Chargin"){
                    $target = 1;
                    }
                }
                elseif($department_id ==13){
                //packing target
                if($job_description == "Clean"){
                $target = 1;
                }elseif($job_description == "Full Painting Packing"){
                $target = 3.3;
                }elseif($job_description == "Packing"){
                    $target = 1;
                    }
                }
                elseif($department_id ==9){
                //motherboard target
                if($job_description=="BIOS Lock High Gen"){
                $target = 1.66;
                }elseif($job_description=="BIOS Lock Low Gen"){
                $target = 2.85;
                }elseif($job_description == "No Power / No Display / Account Lock/ Ports Issue"){
                $target = 4;}
                
                }elseif($department_id ==22){
                //sticker target
                if($job_description=="Designing + Pasting"){
                $target = 7.5;
                }elseif($job_description=="Pasting"){
                $target = 1;
                }
                }elseif($department_id ==2){
                //inventory target
                }elseif($department_id ==23){
                //cleaning target
                $target = 1;
                }
                if($department_id ==1 && $user_role==9){
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
                        $query_run = mysqli_query($connection,$query);
                        header('Location: performance_record.php');
                }else{
                $query = "INSERT INTO `performance_record_table`(
                `user_id`,
                `department_id`,
                `qr_number`,
                `job_description`,
                `start_time`,
                `target`,
                status
                )
                VALUES(
                '$user_id',
                '$department_id',
                '$scanned_qr',
                '$job_description',
                '$start_date',
                '$target',
                '0'
                ) ";
                $query_run = mysqli_query($connection,$query);
                header('Location: performance_record.php');
                }
                
                } elseif($end_time !="0000-00-00 00:00:00" && $same_jd_count==1 && $status == 1){
                    ?>
<script>
if (window.confirm('Already you completed this machine under this job description')) {
    document.location = ' performance_record.php';
}
</script>
<?php
                // echo '<script>
                // alert("Already you completed this machine under this job description ")
                // </script>';
                // echo "Already you completed this machine under ".$job_description;
                }
                
    ?>