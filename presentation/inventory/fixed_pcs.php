<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="warehouse_dashboard.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div>
    <div class="row">
        <div
            class="col-lg-6 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Receiving Laptop</p>
                </div>
                <div class="card-body col-lg-12 justify-content-center align-item-center mx-auto mt-2">
                    <form method='POST'>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Scan QR number</label>
                            <div class="col-sm-8 w-75">
                                <input class="w-50" style="color:black !important" type="number" name="qr_number"
                                    id="qr_number" placeholder="Scan QR number" required>

                            </div>
                        </div>
                        <button type="submit" name="submit" id="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-none">Confirm</button>
                    </form>
                    <div class="row">
                        <div
                            class="col-lg-12 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
                            <?php 
$test=0;
if(isset($_POST['submit'])){
    $qr=$_POST['qr_number'];
    $sql="SELECT *,model,core,mfg FROM issue_laptops LEFT JOIN warehouse_information_sheet ON 
    warehouse_information_sheet.inventory_id = issue_laptops.alsakb_qr WHERE alsakb_qr='$qr' AND status='2' ORDER BY pc_id DESC LIMIT 1 ";
    $sql_run = mysqli_query($connection, $sql);
    if(empty($sql_run)){

    }else{
        foreach($sql_run as $data){
            $pc_id=$data['pc_id'];
            $department=0;
            $update_status=0;
             $issue_type=$data['issue_type'];
              $issue_type2=$data['issue_type2'];
               $issue_type3=$data['issue_type3'];
               if($issue_type ==1){
                    $department="issue_type";
                     $update_status="lcd_received";
               }elseif($issue_type2 ==1){
                 $department="issue_type2";
                  $update_status="mb_received";
               }elseif($issue_type3 ==1){
                 $department="issue_type3";
                  $update_status="bat_received";
               }
            $mfg=$data['mfg'];
            $alsakb=$data['alsakb_qr'];
            $test=$data['bios_lock'];
            $test2=$data['computrace_lock'];
            $test3=$data['me_region'];
            $test4=$data['no_power'];
            $test5=$data['no_display'];
            $test6=$data['port_issue'];
            $test7=$data['tpm_lock'];
            $lcd_broken =$data['lcd_broken'];
            $spot =$data['spot'];
            $scratch =$data['scratch'];
            $yellowshadow =$data['yellowshadow'];
             $model =$data['model'];
            $core =$data['core'];
            echo "<form method='POST'>";
             echo "<div>
                <div class='d-flex row'>
                <h4 class='col-lg-8' >Please Check the Below  Details</h4>
                </div>
                <div class='d-flex row'>
                 <h4 class='col-lg-8' >$model / $core / $mfg</h4>
                </div>
                </div>
                <hr>";
            if($scratch==1){
               
                echo"<div>
                <div class='d-flex row'>
                <h4 class='col-lg-8' >Scratch (PGP)</h4>
                <input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($spot==1){
                echo"<div>
                <div class='d-flex row'>
                <h4 class='col-lg-8'>Spot (ZGP + SGP) </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($lcd_broken==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>LCD Broken </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($yellowshadow==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>Yellow Shadow LCD </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            ///////////////////////////////////////////////////////////////////////////////
            if($test==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>Bios Lock</h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test2==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>Computrace Lock </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test3==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>ME Region </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test4==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>No Power </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test5==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>No Display</h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test6==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>Port Issue</h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            if($test7==1){
                echo"<div >
                <div class='d-flex row'>
                <h4 class='col-lg-8'>TPM Lock </h4>";
                echo "<input type='checkbox' checked disabled>
                </div>
                </div>";
            }
            echo"<input type='hidden' name='lcd_broken' value='$lcd_broken' >
            <input type='hidden' name='spot' value='$spot' >
            <input type='hidden' name='scratch' value='$scratch' >
            <input type='hidden' name='yellowshadow' value='$yellowshadow' >
            <input type='hidden' name='bios_lock' value='$test' >
            <input type='hidden' name='computrace_lock' value='$test2' >
            <input type='hidden' name='me_region' value='$test3' >
            <input type='hidden' name='no_power' value='$test4' >
            <input type='hidden' name='no_display' value='$test5' >
            <input type='hidden' name='port_issue' value='$test6' >
            <input type='hidden' name='tpm_lock' value='$test7' >
            <input type='hidden' name='department' value='$department' >
              <input type='hidden' name='update_status' value='$update_status' >
              <input type='hidden' name='pc_id' value='$pc_id' >";
             echo "<button type='submit' class='btn btn-danger
                               btn-sm' name='reject'>
                               Reject
                           </button>";
            echo "<button type='submit' style='float:right' class='btn btn-primary
                               btn-sm' name='confirm'>
                               Confirm
                           </button>";
                           
              echo "</form>";
        }
    }

}
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let searchbar = document.querySelector('input[name="qr_number"]');
searchbar.focus();
search.value = '';

function myFunction() {
    var checkBox = document.getElementById("bat");
    var text = document.getElementById("bat_pn");
    var lable = document.getElementById("lable");
    if (checkBox.checked == true) {
        text.style.display = "block";
        lable.style.display = "block";
    } else {
        text.style.display = "none";
        lable.style.display = "none";
    }
}
</script>
<?php
if(isset($_POST['reject'])){
            $pc_id=$_POST['pc_id'];
             $department=$_POST['department'];
            $sql="UPDATE `issue_laptops` SET `status`='1' WHERE `pc_id`='$pc_id'";
            $query_run = mysqli_query($connection, $sql);
}
if(isset($_POST['confirm'])){
$pc_id=$_POST['pc_id'];
$department=$_POST['department'];
$update_status=$_POST['update_status'];
 $sql="UPDATE `issue_laptops` SET $update_status='1' WHERE `pc_id`='$pc_id'";
 $query_run = mysqli_query($connection, $sql);
}
?>
<?php include_once '../includes/footer.php';?>