<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
?>
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$user_id =$_SESSION['user_id'];
?>
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <?php 
        $date = date('Y-m-d 00:00:00');
        $date2 = date('Y-m-d 23:59:59');
        $start_time = $date;
        $end_time =$date2; ?>
        <a href="history_record.php">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">History
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row ">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <?php $query = "SELECT job_description FROM performance_record_table WHERE user_id ='$user_id' ORDER BY performance_id DESC LIMIT 1"; 
                                $query_run = mysqli_query($connection,$query);
                                $last_job='';
                                foreach($query_run as $data){
                                    $last_job = $data['job_description'];
                                }
                                ?>
                    <h1> Name : <?php $emp_id=$_SESSION['epf'];
                        $query="SELECT full_name FROM employees WHERE emp_id ='$emp_id'"; 
                        $query_run = mysqli_query($connection,$query);
                        foreach($query_run as $data){
                            echo $data['full_name'];
                        }  ?><br>
                        EmpID :<?php echo $_SESSION['epf'] ?><br>
                        Department :
                        <?php $department_id =$_SESSION['department'];
                        $query="SELECT department FROM departments WHERE department_id='$department_id'"; 
                        $query_run=mysqli_query($connection,$query);
                        foreach($query_run as $data){
                            echo $data['department'];
                        }
                        ?>
                    </h1>
                    <div class="d-flex">
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <form method="POST">
                                <div class="row">
                                    <!-- <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2"> -->
                                    <label class="col-sm-6 col-form-label">Job Description</label>
                                    <div class="col-sm-4 mt-2">
                                        <select name="job_description" class="info_select w-75"
                                            style="border-radius: 5px; font-size:16px">

                                            <option selected value="<?php echo $last_job ?>"><?php echo $last_job ?>
                                            </option>
                                            <!-- production job description -->
                                            <?php if($department_id == 19){ ?>
                                            <option value="Low Generation Function Test">Low Generation Function Test
                                            </option>
                                            <option value="High Generation Function Test">High Generation Function Test
                                            </option>
                                            <option value="Windows Instalation">Windows Instalation</option>
                                            <option value="Combine">Combine</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Scan QR Code OR MFG</label>
                                    <div class="col-sm-4 mt-2">
                                        <input class="w-75" style="color:black !important" type="search" id="qr"
                                            name="qr" placeholder=" scan qr code here"></td>
                                    </div>
                                </div>

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
                                        
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                            // $date = date('Y-m-d 00:00:00');
                                            $date2 = $date1->format('Y-m-d 23:59:59');
                                            $count=0;
                                            $query ="SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2'"; 
                                        $query_run = mysqli_query($connection,$query);
                                        foreach( $query_run as $data){
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Bonus Completed QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php  
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                            // $date = date('Y-m-d 00:00:00');
                                            $date2 = $date1->format('Y-m-d 23:59:59');
                                            $count=0;
                                            $query ="SELECT COUNT(performance_id) as count FROM performance_record_table WHERE user_id=$user_id AND end_time between '$date'AND '$date2'"; 
                                        $query_run = mysqli_query($connection,$query);
                                        foreach( $query_run as $data){
                                            $count = $data['count'];
                                            echo 0;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today QC Pass QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php  
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                            // $date = date('Y-m-d 00:00:00');
                                            $date2 = $date1->format('Y-m-d 23:59:59');
                                            $count=0;
                                            $query ="SELECT COUNT(qc_paper_id) as count FROM qc_paper WHERE user_id=$user_id AND rejection_department='0' AND date_time between '$date'AND '$date2'";
                                            $query_run = mysqli_query($connection,$query);
                                        foreach( $query_run as $data){
                                            $count = $data['count'];
                                            echo $count;
                                        } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Today QC Reject QTY</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php  
                                        $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                        $date = $date1->format('Y-m-d 00:00:00');
                                            // $date = date('Y-m-d 00:00:00');
                                            $date2 = $date1->format('Y-m-d 23:59:59');
                                            $count=0;
                                            $query ="SELECT rejection_department FROM qc_paper WHERE user_id=$user_id AND date_time between '$date'AND '$date2'";
                                            $query_run = mysqli_query($connection,$query);
                                            $count =0;
                                        foreach( $query_run as $data){
                                            $department = $data['rejection_department'];
                                            if($department !=0){
                                                $count++;
                                            }
                                        }
                                        echo $count;
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-6 col-form-label">Remaining Target Point</label>
                                    <div class="col-sm-4 mt-2" style="font-size:16px">
                                        <?php  $query ="SELECT SUM(target) as target_sum FROM performance_record_table WHERE user_id = $user_id AND end_time between '$date'AND '$date2' ";
                                      
                                        $query_run = mysqli_query($connection,$query);
                                        $sum=0;
                                        $target= 200;
                                        foreach( $query_run as $data){
                                        $sum = $data['target_sum'];
                                        } 
                                        $final_target = $target-$sum;
                                        echo round($sum);
                                        ?>
                                    </div>
                                </div>
                                <button type="submit1" name="submit1" id="submit1"
                                    class="btn btn-default bg-gradient-success btn-next float-right d-none"> Confirm
                                </button>
                            </form>
                            <p> Point View <br> Funtion Test = 1 , Combine = 3.3 , Windows Instalation = 2.8 </p>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
                            <div class="text-danger">
                                <!-- <h1>Must be Started Work at 9.05AM</h1> -->
                                <div class="row">
                                    <label class="col-sm-12 col-form-label">Morning Session Start Time : 09.05AM</label>
                                    <?php  
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d 09:00:00');
                                          $date2 = $date1->format('Y-m-d 13:55:00');
                                            $duration =0;
                                            $spend_time =0;
                                            $query ="SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                            
                                            $query_run = mysqli_query($connection,$query);
                                            $datetime_1=''; 
                                            $datetime_2 ='' ; 
                                            foreach($query_run as $data){
                                                $datetime_1 = date('Y-m-d 09:05:00'); 
                                                $datetime_2 = $data['start_time']; 
                                            } 
                                            
                                            $start_datetime = new DateTime($datetime_1); 
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            if($datetime_2 !=''){
                                            if ($datetime_2 < $datetime_1) {
                                                // whatever you have to do here
                                               ?>
                                    <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                        <?php echo $diff->i.' Minutes' ?>
                                        &#128525;</label>
                                    <?php
                                            }else{
                                                ?>
                                    <label class="col-sm-12 col-form-label text-danger">You are Late :
                                        <?php echo $diff->i.' Minutes' ?>
                                    </label>
                                    <?php }
                                    }
                                    ?>
                                    <label class="col-sm-12 col-form-label">Lunch Break Start Time : 01.55PM
                                        <?php 
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $current_time = $date1->format('Y-m-d H:i:s');
                                            $date =$date1->format('Y-m-d 13:55:00');
                                                        $remaining_time = (strtotime($date) - strtotime($current_time))/60;
                                                        if($remaining_time >0){
                                                            echo " Remaining Time ".round($remaining_time)." minute";
                                                        }
                                        ?>
                                    </label>

                                    <label class="col-sm-12 col-form-label">Afternoon Session Start Time :
                                        03.05PM</label>
                                    <?php  $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                             $date = $date1->format('Y-m-d 15:00:00');
                                            // $date = date('Y-m-d 15:00:00');
                                            $date2 = $date1->format('Y-m-d 18:15:00');
                                            $query ="SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                            $query_run = mysqli_query($connection,$query);
                                            $datetime_1=''; 
                                            $datetime_2 ='';
                                            foreach($query_run as $data){
                                                $datetime_1 = date('Y-m-d 15:05:00'); 
                                                $datetime_2 = $data['start_time']; 
                                            } 
                                            
                                            $start_datetime = new DateTime($datetime_1); 
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            if($datetime_2 !=''){
                                            if ($datetime_2 < $datetime_1) {
                                                // whatever you have to do here
                                               ?>
                                    <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                        <?php echo $diff->i.' Minutes' ?>
                                        &#128525;</label>
                                    <?php
                                            }else{
                                                ?>
                                    <label class="col-sm-12 col-form-label text-danger">You are Late :
                                        <?php echo $diff->i.' Minutes' ?>
                                    </label>
                                    <?php }
                                    }  ?>
                                    <label class="col-sm-12 col-form-label">Tea Break Start Time : 06.15PM
                                        <?php 
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $current_time = $date1->format('Y-m-d H:i:s');
                                            $date = $date1->format('Y-m-d 18:15:00');
                                            $date_old = $date1->format('Y-m-d 15:05:00');
                                                        $remaining_time = (strtotime($date) - strtotime($current_time))/60;
                                                        if($remaining_time >0 && $date_old<$current_time){
                                                            echo " Remaining Time ".round($remaining_time)." minute";
                                                        }
                                        ?>
                                    </label>
                                    <label class="col-sm-12 col-form-label">Evening Session Start Time : 06.45PM</label>
                                    <?php  
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d 18:40:00');
                                            $date2 = $date1->format('Y-m-d 20:55:00');
                                            $duration =0;
                                            $spend_time =0;
                                            $query ="SELECT start_time  FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id ASC LIMIT 1";
                                            $query_run = mysqli_query($connection,$query);
                                            $datetime_1 = ''; 
                                                $datetime_2 = ''; 
                                            foreach($query_run as $data){
                                                $datetime_1 = date('Y-m-d 18:45:00'); 
                                                $datetime_2 = $data['start_time']; 
                                            } 
                                            
                                            $start_datetime = new DateTime($datetime_1); 
                                            $diff = $start_datetime->diff(new DateTime($datetime_2));
                                            if($datetime_2 !=''){
                                            if ($datetime_2 < $datetime_1) {
                                                // whatever you have to do here
                                               ?>
                                    <label class="col-sm-12 col-form-label text-success">You are Earlier :
                                        <?php echo $diff->i.' Minutes' ?>
                                        &#128525;</label>
                                    <?php
                                            }else{
                                                ?>
                                    <label class="col-sm-12 col-form-label text-danger">You are Late :
                                        <?php echo $diff->i.' Minutes' ?>
                                    </label>
                                    <?php } 
                                    }
                                    ?>
                                    <label class="col-sm-12 col-form-label">Evening Session End Time : 08.55PM
                                        <?php 
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $current_time = $date1->format('Y-m-d H:i:s');
                                            $date = $date1->format('Y-m-d 20:55:00');
                                                        $remaining_time = (strtotime($date) - strtotime($current_time))/60;
                                                        $date_old = $date1->format('Y-m-d 18:45:00');
                                                        if($remaining_time >0 && $date_old<$current_time ){
                                                            echo " Remaining Time ".round($remaining_time) ." minute";
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
                                <th>Job Description</th>
                                <th>Scanned QR code</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Spend Time Duration</th>
                                <th>Target Time Duration</th>
                                <th>Task Status</th>
                                <th>QC Status</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                             $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                             $date = $date1->format('Y-m-d 00:00:00');
                                    //   $date = date('Y-m-d 00:00:00');
                                      $date2 = $date1->format('Y-m-d 23:59:59');
                                      $i=-1;
                                      $y=0;
                                      $j=1;
                                      $spend_time =0;
                                    $query ="SELECT * FROM performance_record_table WHERE user_id=$user_id AND start_time between '$date'AND '$date2' ORDER BY performance_id DESC";
                                    $query_run = mysqli_query($connection,$query);
                                    $row = mysqli_num_rows($query_run);
                                    foreach( $query_run as $data){
                                        $i++;
                                        $y= $row - $i;
                                    ?>
                            <tr>
                                <td><?php echo $data['job_description'] ?></td>
                                <td><?php echo $data['qr_number'] ?></td>
                                <td><?php echo $data['start_time'] ?></td>
                                <td><?php echo $data['end_time'] ?></td>
                                <td><?php echo $data['spend_time']?></td>
                                <td><?php if($data['job_description'] == 'Low Generation Function Test' ||$data['job_description'] == 'High Generation Function Test' ){
                                    echo "3.00 min";
                                }elseif($data['job_description'] == 'Windows Instalation'){
                                    echo "8.30 min";
                                }elseif($data['job_description'] == 'Combine'){
                                    echo "10.00 min";
                                }?></td>
                                <td><?php if( $data['end_time'] == '0000-00-00 00:00:00'){
                                        echo "On Going";
                                    }else{
                                         echo  $j; 
                                         } ?></td>
                                <td>
                                    <?php $qr_number = $data['qr_number'];
                                    $query="SELECT * FROM qc_paper WHERE qr_number='$qr_number'AND date_time between '$date'AND '$date2'";
                                    $query_run = mysqli_query($connection,$query);
                                    $rej_department='null';
                                    $qc_paper_id=0;
                                    if(empty($query_run)){}else{
                                    foreach($query_run as $data){
                                        $rej_department = $data['rejection_department'];
                                        $qc_paper_id = $data['qc_paper_id'];
                                    }
                                }
                                    if($rej_department == '0' AND $qc_paper_id == 0){
                                        echo "On Going";
                                    }elseif($rej_department == '0' AND $qc_paper_id != 0){
                                        if($data['bios_lock_hp'] == 'ok' || $data['bios_lock_dell'] == 'ok' || $data['bios_lock_lenovo'] == 'ok' || $data['bios_lock_other'] == 'ok' || $data['computrace_hp'] == 'inactive' || 
                                        $data['computrace_dell'] == 'deactivate' || $data['computrace_lenovo'] == 'ok' || $data['computrace_other'] == 'ok' || $data['me_region_lock_hp'] == 'ok' || $data['tpm_lock_dell'] == 'ok' || 
                                        $data['other_error_lenovo'] == 'no_have' || $data['other_error_other_brand'] == 'no_have' || $data['a_top'] == 'ok' || $data['b_bazel'] == 'ok' || $data['c_palmrest'] == 'ok' || $data['d_back_cover'] == 'ok' ||
                                         $data['keyboard'] == 'ok' || $data['webcam'] == 'ok'|| $data['lcd'] == 'ok' || $data['mousepad_button'] == 'ok' || $data['mic'] == 'ok' || $data['speaker'] == 'ok' || $data['wi_fi_connection'] == 'ok' || 
                                         $data['usb'] == 'ok' || $data['battery'] == 'bad' || $data['hinges_cover'] == 'ok' ){
                                            echo "Pass";
                                         }
                                        
                                    }elseif($rej_department != 'null' && $rej_department != '0'){
                                        if($data['bios_lock_hp'] != 'ok' || $data['bios_lock_dell'] != 'ok' || $data['bios_lock_lenovo'] != 'ok' || $data['bios_lock_other'] != 'ok' || $data['computrace_hp'] != 'inactive' || 
                                        $data['computrace_dell'] != 'deactivate' || $data['computrace_lenovo'] != 'ok' || $data['computrace_other'] != 'ok' || $data['me_region_lock_hp'] != 'ok' || $data['tpm_lock_dell'] != 'ok' || 
                                        $data['other_error_lenovo'] != 'no_have' || $data['other_error_other_brand'] != 'no_have' || $data['a_top'] != 'ok' || $data['b_bazel'] != 'ok' || $data['c_palmrest'] != 'ok' || $data['d_back_cover'] != 'ok' ||
                                         $data['keyboard'] != 'ok' || $data['webcam'] != 'ok'|| $data['lcd'] != 'ok' || $data['mousepad_button'] != 'ok' || $data['mic'] != 'ok' || $data['speaker'] != 'ok' || $data['wi_fi_connection'] != 'ok' || 
                                         $data['usb'] != 'ok' || $data['battery'] != 'bad' || $data['hinges_cover'] != 'ok' ){
                                            echo "<lable class='text-danger'>Rejected</lable>";
                                         }
                                        
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php $y = 0;} ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade " id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static"
    data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header col-lg-12 ">
                QC Final Result
            </div>
            <?php
                        $search_value;
                        if (isset($_POST['submit1'])) { 
                            
                            $scanned_qr = '0';
                            $scanned_mfg = '0';
                        
                            $scanned_qr = $_POST['qr'];
                            $job_description = $_POST['job_description'];
                            
                            $previous_job_description='';
                            $end_time="0000-00-00";
                            $performance_id = 0;
                            $_POST['qr']='';
                            $_POST['job_description']='';
                            if($scanned_qr != '0'){
                                $search_value = $scanned_qr;
                            }elseif($scanned_mfg !=0){
                                $search_value = $scanned_mfg;
                            }
                            $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND job_description = '$job_description' ";
                            $query_run = mysqli_query($connection,$query);
                            foreach($query_run as $data){
                                $performance_id = $data['performance_id'];
                                $start_time = $data['start_time'];
                                $end_time = $data['end_time'];
                                $previous_job_description .=  $data['job_description'].",";
                            }
                            $test =0;
                            $same_jd_count=0;
                            $test = explode(",",$previous_job_description);
                            foreach($test as $a){
                                if($a == $job_description){
                                    $same_jd_count++;
                                }
                            }
                            // if($performance_id !=0 && $end_time =="0000-00-00 00:00:00" && $same_jd_count==1 ){
                                if($end_time =="0000-00-00 00:00:00" && $same_jd_count==1 ){
                                    // update existing task
                                    if($job_description == 'Low Generation Function Test' ||$job_description == 'High Generation Function Test' ){
                                    echo "<script>
                                    $(window).load(function() {
                                        $('#myModal3').modal('show');
                                    });
                                    </script>";
                                }else{
                                    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                    $date = $date1->format('Y-m-d H:i:s');
                                    $working_time_in_seconds = strtotime($date) - strtotime($start_time);
                                    $duration= round($working_time_in_seconds/60)*100;
                                    $query="UPDATE
                                    `performance_record_table`
                                    SET
                                    `end_time` = '$date',
                                    `spend_time` = '$duration'
                                WHERE performance_id = $performance_id";
                                
                                $query_run = mysqli_query($connection,$query);
                                header('Location: qc_performance_record.php');
                                }
                            }elseif($same_jd_count==0){
                                // echo "im inside 000";
                                // exit();
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $start_date = $date1->format('Y-m-d H:i:s');
                                $target = 0;
                        
                                    if($job_description == "Low Generation Function Test"){
                                        $target = 1;
                                    }elseif($job_description == "High Generation Function Test"){
                                        $target = 1;
                                    }elseif($job_description == "Windows Instalation"){
                                        $target = 2.8;
                                    }elseif($job_description == "Combine"){
                                        $target = 3.3;
                                    }
                            
                                $query = "INSERT INTO `performance_record_table`(
                                    `user_id`,
                                    `department_id`,
                                    `qr_number`,
                                    `job_description`,
                                    `start_time`,
                                    `target`
                                )
                                VALUES(
                                    '$user_id',
                                    '$department_id',
                                    '$scanned_qr',
                                    '$job_description',
                                    '$start_date',
                                    '$target'
                                ) ";
                            $query_run = mysqli_query($connection,$query);
                            header('Location: qc_performance_record.php');
                            
                            } elseif($end_time !="0000-00-00 00:00:00" && $same_jd_count !=0){
                                $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                $start_date = $date1->format('Y-m-d H:i:s');
                                $target = 0;
                        
                                    if($job_description == "Low Generation Function Test"){
                                        $target = 1;
                                    }elseif($job_description == "High Generation Function Test"){
                                        $target = 1;
                                    }
                                    
                            
                                $query = "INSERT INTO `performance_record_table`(
                                    `user_id`,
                                    `department_id`,
                                    `qr_number`,
                                    `job_description`,
                                    `start_time`,
                                    `target`
                                )
                                VALUES(
                                    '$user_id',
                                    '$department_id',
                                    '$scanned_qr',
                                    '$job_description',
                                    '$start_date',
                                    '$target'
                                ) ";
                            $query_run = mysqli_query($connection,$query);
                            header('Location: qc_performance_record.php');
                            
                            // echo "Already you completed this machine under ".$job_description;
                        }elseif($end_time =="0000-00-00 00:00:00" && ($same_jd_count !=0 || $same_jd_count !=1)){
                            echo "<script>
                            $(window).load(function() {
                                $('#myModal3').modal('show');
                            });
                            </script>";
                        }else{
                            echo '<script>alert("Already you completed this machine under this job description ")</script>';
                        }
                        }
                        ?>
            <form action="#" method="POST">
                <div class="modal-body ">
                    <div class="grid-margin  justify-content-center mx-auto mt-2">

                        <div class="row">
                            <ul class="nav nav-tabs">
                                <li><a data-toggle="tab" href="#hp" name="brand">HP</a>
                                </li>
                                <li><a data-toggle="tab" href="#dell">DELL</a>
                                </li>
                                <li><a data-toggle="tab" href="#lenovo">LENOVO</a>
                                </li>
                                <li><a data-toggle="tab" href="#other">OTHER
                                        BRAND</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="hp" class="tab-pane fade in active col-sm-12">
                                    <h3>HP</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">BIOS Lock </p>
                                        <input type="radio" id="bios_lock_hp" name="bios_lock_hp" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_hp" name="bios_lock_hp" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">Computrace / Absolute Software Lock</p>
                                        <input type="radio" id="computrace_hp" name="computrace_hp" value="active">
                                        <label class="label_values my-1" for="xeon">Activated
                                        </label>
                                        <input type="radio" id="computrace_hp" name="computrace_hp" value="inactive"
                                            checked>
                                        <label class="label_values my-1">Inactive </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6 ">Me Region Lock</p>
                                        <input type="radio" id="me_region_lock_hp" name="me_region_lock_hp"
                                            value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="me_region_lock_hp" name="me_region_lock_hp" value="ok"
                                            checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                </div>
                                <div id="dell" class="tab-pane fade">
                                    <h3>DELL</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_dell" name="bios_lock_dell" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_dell" name="bios_lock_dell" value="ok"
                                            checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell"
                                            value="active">
                                        <label class="label_values my-1" for="xeon">Active
                                        </label>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell"
                                            value="disable">
                                        <label class="label_values my-1">Disable </label>
                                        <input type="radio" id="computrace_lock_dell" name="computrace_lock_dell"
                                            value="deactivate" checked>
                                        <label class="label_values my-1">Deactivate </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">TPM Lock</p>
                                        <input type="radio" id="tpm_lock_dell" name="tpm_lock_dell" value="not ok">
                                        <label class="label_values my-1" for="xeon">Not OK
                                        </label>
                                        <input type="radio" id="tpm_lock_dell" name="tpm_lock_dell" value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                </div>
                                <div id="lenovo" class="tab-pane fade">
                                    <h3>LENOVO</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_lenovo" name="bios_lock_lenovo" value="lock">
                                        <label class="label_values my-1">Lock </label>
                                        <input type="radio" id="bios_lock_lenovo" name="bios_lock_lenovo" value="ok"
                                            checked>
                                        <label class="label_values my-1" for="xeon">OK
                                        </label>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_lenovo" name="computrace_lock_lenovo"
                                            value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="computrace_lock_lenovo" name="computrace_lock_lenovo"
                                            value="ok" checked>
                                        <label class="label_values my-1">Ok </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Any Other Error</p>
                                        <input type="radio" id="other_error_lenovo" name="other_error_lenovo"
                                            value="have">
                                        <label class="label_values my-1" for="xeon">Have
                                        </label>
                                        <input type="radio" id="other_error_lenovo" name="other_error_lenovo"
                                            value="no_have" checked>
                                        <label class="label_values my-1">No Have </label>
                                    </div>
                                </div>
                                <div id="other" class="tab-pane fade">
                                    <h3>OTHER BRAND</h3>
                                    <div class="col-sm-12 ">
                                        <p class="col-sm-6">BIOS Lock</p>
                                        <input type="radio" id="bios_lock_other" name="bios_lock_other" value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="bios_lock_other" name="bios_lock_other" value="ok"
                                            checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Computrace Lock</p>
                                        <input type="radio" id="computrace_lock_other" name="computrace_lock_other"
                                            value="lock">
                                        <label class="label_values my-1" for="xeon">Lock
                                        </label>
                                        <input type="radio" id="computrace_lock_other" name="computrace_lock_other"
                                            value="ok" checked>
                                        <label class="label_values my-1">OK </label>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="col-sm-6">Any Other Error</p>
                                        <input type="radio" id="other_error_other_brand" name="other_error_other_brand"
                                            value="have">
                                        <label class="label_values my-1" for="xeon">Have
                                        </label>
                                        <input type="radio" id="other_error_other_brand" name="other_error_other_brand"
                                            value="no_have" checked>
                                        <label class="label_values my-1">No Have </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label"> Power(Motherboard Issue)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="no_power" name="no_power" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="no_power" name="no_power" value="reject">
                                <label class="label_values my-1">No </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Motherboard Display </label>
                            <div class="col-sm-4">
                                <input type="radio" id="no_display" name="no_display" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="no_display" name="no_display" value="reject">
                                <label class="label_values my-1">No </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Motherboard Other Issue</label>
                            <div class="col-sm-4">
                                <input type="radio" id="other_issue" name="other_issue" value="have" checked>
                                <label class="label_values my-1" for="xeon">Have
                                </label>
                                <input type="radio" id="other_issue" name="other_issue" value="no_have">
                                <label class="label_values my-1">No Have </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">A/Top Cover(Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="a_top" name="a_top" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                </label>
                                <input type="radio" id="a_top" name="a_top" value="reject">
                                <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">B/bazel(Scratch/Brocken/Logo/Color)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="b_bazel" name="b_bazel" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="b_bazel" name="b_bazel" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">C/Palmrest (Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="c_palmrest" name="c_palmrest" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="c_palmrest" name="c_palmrest" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">D/Back Cover (Scratch/Broken/Dent)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="d_back_cover" name="d_back_cover" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="d_back_cover" name="d_back_cover" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Keyboard(Function/ Key missing / Color)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="keyboard" name="keyboard" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="keyboard" name="keyboard" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">LCD (Whitespot/Scratch/Broken/Line/Yellow
                                shadow)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="lcd" name="lcd" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="lcd" name="lcd" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Webcam</label>
                            <div class="col-sm-4">
                                <input type="radio" id="webcam" name="webcam" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="webcam" name="webcam" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Mousepad & Button</label>
                            <div class="col-sm-4">
                                <input type="radio" id="mousepad_button" name="mousepad_button" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="mousepad_button" name="mousepad_button" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Microphone (MIC)</label>
                            <div class="col-sm-4">
                                <input type="radio" id="mic" name="mic" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="mic" name="mic" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Speaker / Sound</label>
                            <div class="col-sm-4">
                                <input type="radio" id="speaker" name="speaker" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="speaker" name="speaker" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Wi-Fi Connection</label>
                            <div class="col-sm-4">
                                <input type="radio" id="wi_fi_connection" name="wi_fi_connection" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="wi_fi_connection" name="wi_fi_connection" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">USB Port</label>
                            <div class="col-sm-4">
                                <input type="radio" id="usb" name="usb" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="usb" name="usb" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Battery Health</label>
                            <div class="col-sm-4">
                                <input type="radio" id="battery" name="battery" value="excellent" checked>
                                <label class="label_values my-1" for="xeon">Excellent</lable>
                                    <input type="radio" id="battery" name="battery" value="good">
                                    <label class="label_values my-1">Good </label>
                                    <input type="radio" id="battery" name="battery" value="bad">
                                    <label class="label_values my-1">Bad </label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-8 col-form-label">Hinges Cover</label>
                            <div class="col-sm-4">
                                <input type="radio" id="hinges_cover" name="hinges_cover" value="ok" checked>
                                <label class="label_values my-1" for="xeon">OK
                                    <input type="radio" id="hinges_cover" name="hinges_cover" value="reject">
                                    <label class="label_values my-1">Reject </label>
                            </div>
                        </div>


                        <input type="hidden" name="job_description" value="<?php echo $job_description ?>">
                        <input type="hidden" name="search_value" value="<?php echo $search_value ?>">
                        <button type="submit" name="submit" id="submit"
                            class="btn btn-default bg-gradient-success btn-next float-right"> Confirm
                        </button>
                    </div>
                </div>
            </form>
            <?php   if (isset($_POST['submit'])) { 
                $bios_lock_hp  = 'null';
                $bios_lock_dell  = 'null';
                $bios_lock_lenovo  = 'null';
                $bios_lock_other  = 'null';
                $computrace_hp  = 'null';
                $computrace_dell  = 'null';
                $computrace_lenovo  = 'null';
                $computrace_other  = 'null';
                $me_region_lock_hp  = 'null';
                $tpm_lock_dell  = 'null';
                $other_error_lenovo  = 'null';
                $other_error_other_brand  = 'null';
                $a_top  = 'null';
                $b_bazel  = 'null';
                $c_palmrest  = 'null';
                $d_back_cover  = 'null';
                $keyboard  = 'null';
                $lcd  = 'null';
                $webcam  = 'null';
                $mousepad_button  = 'null';
                $mic  = 'null';
                $speaker  = 'null';
                $wi_fi_connection  = 'null';
                $usb  = 'null';
                $battery  = 'null';
                $hinges_cover  = 'null';
                $search_value = $_POST['search_value'];
                $qr_code = $_POST['search_value'];
                $job_description = $_POST['job_description'];
            
                $bios_lock_hp = $_POST['bios_lock_hp'];
                $bios_lock_dell = $_POST['bios_lock_dell'];
                $bios_lock_lenovo = $_POST['bios_lock_lenovo'];
                $bios_lock_other = $_POST['bios_lock_other'];

                $computrace_hp = $_POST['computrace_hp'];
                $computrace_dell = $_POST['computrace_lock_dell'];
                $computrace_lenovo = $_POST['computrace_lock_lenovo'];
                $computrace_other = $_POST['computrace_lock_other'];

                $me_region_lock_hp = $_POST['me_region_lock_hp'];
                $tpm_lock_dell = $_POST['tpm_lock_dell'];
                $other_error_lenovo = $_POST['other_error_lenovo'];
                $other_error_other_brand = $_POST['other_error_other_brand'];

                $no_power = $_POST['no_power'];
                $no_display = $_POST['no_display'];
                $other_issue = $_POST['other_issue'];
                
                $a_top = $_POST['a_top'];
                $b_bazel = $_POST['b_bazel'];
                $c_palmrest = $_POST['c_palmrest'];
                $d_back_cover = $_POST['d_back_cover'];
                $keyboard = $_POST['keyboard'];
                $lcd = $_POST['lcd'];
                $webcam = $_POST['webcam'];
                $mousepad_button = $_POST['mousepad_button'];
                $mic = $_POST['mic'];
                $speaker = $_POST['speaker'];
                $wi_fi_connection = $_POST['wi_fi_connection'];
                $usb = $_POST['usb'];
                $battery = $_POST['battery'];
                $hinges_cover = $_POST['hinges_cover'];

                 $working_time_in_seconds; 
                 $start_time=0000-00-00;
                 $query = "SELECT * FROM performance_record_table WHERE user_id ='$user_id'AND (qr_number ='$search_value') AND job_description = '$job_description' ";
                 $query_run = mysqli_query($connection,$query);
                 foreach($query_run as $data){
                     $performance_id = $data['performance_id'];
                     $start_time = $data['start_time'];
                 }
                 $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                 $date = $date1->format('Y-m-d H:i:s');
                 $working_time_in_seconds = strtotime($date) - strtotime($start_time);
                 $duration= round($working_time_in_seconds/60)*100;
                 $query="UPDATE
                 `performance_record_table`
                 SET
                 `end_time` = '$date',
                 `spend_time` = '$duration'
             WHERE performance_id = $performance_id";
            
             $query_run = mysqli_query($connection,$query);
            //  header('Location: qc_performance_record.php');
                 $reject_person ='null';
                 $rejection_department='';
            if($lcd =='reject'){
                // need to change jd for Fixed LCD remove lcd for temporary still we not complete PN issue
                $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='10' AND job_description='Remove LCD'";
                $query_run = mysqli_query($connection,$query);
                
                foreach($query_run as $data){
                    $reject_person = $data['user_id'];
                    $rejection_department = 10;
                }
                if( $reject_person == 'null'){
                    $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='1'";
                    $query_run = mysqli_query($connection,$query);

                    foreach($query_run as $data){
                        $reject_person = $data['user_id'];
                        $rejection_department = 1;
                    }
                }  
            }
            if($bios_lock_hp != 'ok' || $bios_lock_dell != 'ok' || $bios_lock_lenovo != 'ok' || $bios_lock_other != 'ok' || $computrace_hp != 'inactive' || 
            $computrace_dell != 'deactivate' || $computrace_lenovo != 'ok' || $computrace_other != 'ok' || $me_region_lock_hp != 'ok' || $tpm_lock_dell != 'ok' || 
            $other_error_lenovo != 'no_have' || $other_error_other_brand != 'no_have' ||$no_power != 'ok'||$no_display != 'ok'||$other_issue !='have' ||$a_top != 'ok' || $b_bazel != 'ok' || $c_palmrest != 'ok' || $d_back_cover != 'ok' ||
             $keyboard != 'ok' || $webcam != 'ok' || $mousepad_button != 'ok' || $mic != 'ok' || $speaker != 'ok' || $wi_fi_connection != 'ok' || 
             $usb != 'ok' || $battery == 'bad' || $hinges_cover != 'ok' ){

                $query = "SELECT user_id FROM performance_record_table WHERE qr_number='$search_value' AND department_id='1'";
                $query_run = mysqli_query($connection,$query);

                foreach($query_run as $data){
                    $reject_person = $data['user_id'];
                    $rejection_department = 1;
                }
             }
             $user_id = $_SESSION['user_id'];
             $department_id =$_SESSION['department'];
            $query ="INSERT INTO `qc_paper`(
                qr_number,
                `bios_lock_hp`,
                `bios_lock_dell`,
                `bios_lock_lenovo`,
                `bios_lock_other`,
                `computrace_hp`,
                `computrace_dell`,
                `computrace_lenovo`,
                `computrace_other`,
                `me_region_lock_hp`,
                `tpm_lock_dell`,
                `other_error_lenovo`,
                `other_error_other_brand`,
                `a_top`,
                `b_bazel`,
                `c_palmrest`,
                `d_back_cover`,
                `keyboard`,
                `lcd`,
                `webcam`,
                `mousepad_button`,
                `mic`,
                `speaker`,
                `wi_fi_connection`,
                `usb`,
                `battery`,
                `hinges_cover`,
                user_id,
                user_department,
                reject_person,
                rejection_department,
                mb_power,
                mb_display,
                mb_other
            )
            VALUES(
                '$qr_code',
                '$bios_lock_hp',
                '$bios_lock_dell',
                '$bios_lock_lenovo',
                '$bios_lock_other',
                '$computrace_hp',
                '$computrace_dell',
                '$computrace_lenovo',
                '$computrace_other',
                '$me_region_lock_hp',
                '$tpm_lock_dell',
                '$other_error_lenovo',
                '$other_error_other_brand',
                '$a_top',
                '$b_bazel',
                '$c_palmrest',
                '$d_back_cover',
                '$keyboard',
                '$lcd',
                '$webcam',
                '$mousepad_button',
                '$mic',
                '$speaker',
                '$wi_fi_connection',
                '$usb',
                '$battery',
                '$hinges_cover',
                '$user_id',
                '$department_id',
                '$reject_person',
                '$rejection_department',
                '$no_power',
                '$no_display',
                '$other_issue'
            )";
             $query_run = mysqli_query($connection,$query);
             header('Location: qc_performance_record.php');
                
            } ?>

        </div>
    </div>
</div>



</script>";
<script>
var time = new Date();
var today = time.getFullYear() + '-' + (time.getMonth() + 1) + '-' + time.getDate() + " " + time.getHours() + ":" +
    time
    .getMinutes() + ":" + time.getSeconds();
document.getElementById("time").textContent = today;
//curser hold in input field
let searchbar = document.querySelector('input[name="qr"]');
searchbar.focus();
search.value = '';
</script>
<style>
[type="text"] {
    height: 22px;
    margin-top: 4px;
    font-size: 14px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #000 !important;
}

.col-form-label {
    font-size: 20px;
}
</style>
<?php include_once('../includes/footer.php'); ?>