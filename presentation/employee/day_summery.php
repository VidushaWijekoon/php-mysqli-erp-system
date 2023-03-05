<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
} 
$user_id=$_GET['user_id'];
$from_date=$_GET['from_date'];
$to_date=$_GET['to_date'];
$count=$_GET['count'];
$department_id='';
$department_name='';
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a
            href="./report.php?from_date=<?php echo $from_date ?>&to_date=<?php echo $to_date ?>">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <?php 
                    $name='';
                $emp_id='';
                $query="SELECT * FROM employees LEFT JOIN users ON users.epf = employees.emp_id WHERE user_id = $user_id"; 
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $data){
                    $name= $data['full_name'];
                    $emp_id= $data['emp_id'];
                    $department_id= $data['department'];
                    } 
                    $query="SELECT department FROM departments  WHERE department_id = $department_id"; 
                $query_run = mysqli_query($connection,$query);
                foreach($query_run as $data){
                    $department_name=$data['department'];
                }
                    ?>
                    <h1> Name : <?php echo $name ?><br>
                        EmpID :<?php echo $emp_id ?><br>
                        Department :
                        <?php echo $department_name ?><br>
                        From Date : <?php echo $from_date ?><br>
                        To Date : <?php echo $to_date ?><br>
                        Completed Count : <?php echo $count ?><br>
                    </h1>
                    <button onclick="exportToExcel('tblexportData', '<?php echo $name;?>')"
                        class="btn bg-gradient-success mt-3">Export Table Data To Excel
                        File</button>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Job Description</th>
                                    <th>Completed QR Count</th>
                                    <th>Target QR Count</th>
                                    <th>Achieved points</th>
                                    <th>Morning Delay Time</th>
                                    <th>Lunch Delay Time</th>
                                    <th>Teatime delay time</th>
                                    <th>Total delay time per day</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query ="SELECT start_time,COUNT(qr_number) AS qr_number,job_description FROM performance_record_table WHERE user_id=$user_id AND start_time between $from_date AND $to_date GROUP BY CAST(start_time AS DATE),job_description";
                                    $query_run = mysqli_query($connection,$query);

                                    // $row = mysqli_num_rows($query_run);
                                    $i=0;
                                    $date2='';
                                    foreach( $query_run as $a){
                                        $date=$a['start_time'];
                                        $date = strtotime($date);
                                        $date = date('Y-m-d ', $date);
                                        $target='0';
                                        $total_target='0';
                                        $job_description=$a['job_description'];
                                        if($job_description=='BIOS Lock Low Gen'){
                                           $target='1.66';
                                            $total_target='100';
                                            $count='60';
                                        }elseif($job_description =='BIOS Lock High Gen'){
                                            $target='1.66';
                                            $total_target='100';
                                             $count='60'; $count='50';
                                        }elseif($job_description=='No Power / No Display / Account Lock/ Ports Issue'){
                                            $target='4';
                                            $total_target='100';
                                             $count='25'; $count='50';
                                        }elseif($job_description=='Unlock'){
                                            $target='1';
                                            $total_target='150';
                                             $count='150'; $count='150';
                                        }elseif($job_description=='Chargin'){
                                            $target='1';
                                            $total_target='150';
                                             $count='150'; $count='150';
                                        }elseif($job_description=='Openning Battery And Cell Change'){
                                            $target='3';
                                            $total_target='150';
                                             $count='50';
                                        }elseif($job_description=='store to lcd rack'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='store to bodywork rack'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='store to motherboard rack'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='Remove LCD'){
                                            $target='1';
                                            $total_target='120'; $count='120';
                                        }elseif($job_description=='Install LCD'){
                                            $target='1';
                                            $total_target='120'; $count='120';
                                        }elseif($job_description=='Fixed Lcd'){
                                            $target='1';
                                            $total_target='120'; $count='120';
                                        }elseif($job_description=='Remove Polization Film'){
                                            $target='1';
                                            $total_target='120'; $count='120';
                                        }elseif($job_description=='Clean+Glue+Install Polization Film'){
                                            $target='2';
                                            $total_target='120'; $count='60';
                                        }elseif($job_description=='send to production'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='pc scan'){
                                            $target='1';
                                            $total_target='500'; $count='500';
                                        }elseif($job_description=='Low Generation Function Test'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='High Generation Function Test'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='High Generation Function Test + MFG'){
                                            $target='2';
                                            $total_target='200'; $count='100';
                                        }elseif($job_description=='Windows Instalation'){
                                            $target='2.8';
                                            $total_target='200'; $count='70';
                                        }elseif($job_description=='Combine'){
                                            $target='3.3';
                                            $total_target='200'; $count='60';
                                        }elseif($job_description=='Hard Disk Copy'){
                                            $target='0.125';
                                            $total_target='50'; $count='400';
                                        }elseif($job_description=='Put RAM + Hard Disk + Test'){
                                            $target='1';
                                            $total_target='50'; $count='50';
                                        }elseif($job_description=='Combine+ Test'){
                                            $target='1';
                                            $total_target='50'; $count='50';
                                        }elseif($job_description=='Clean'){
                                            $target='1';
                                            $total_target='60'; $count='60';
                                        }elseif($job_description=='Packing'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='Full Painting Packing'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='Sanding'){
                                            $target='1.66';
                                            $total_target='100'; $count='60';
                                        }elseif($job_description=='Bodywork'){
                                            $target='2.5';
                                            $total_target='100'; $count='40';
                                        }elseif($job_description=='Taping'){
                                            $target='1.66';
                                            $total_target='100'; $count='60';
                                        }elseif($job_description=='Low Generation'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='Full Painting'){
                                            $target='4';
                                            $total_target='200'; $count='50';
                                        }elseif($job_description=='Keyboard Lacker'){
                                            $target='0.4';
                                            $total_target='200'; $count='500';
                                        }elseif($job_description=='A panel paint'){
                                            $target='1';
                                            $total_target='200'; $count='200';
                                        }elseif($job_description=='Designing + Pasting'){
                                            $target='7.5';
                                            $total_target='150'; $count='20';
                                        }elseif($job_description=='Cleaning'){
                                            $target='1';
                                            $total_target='60'; $count='60';
                                        }elseif($job_description=='Pasting'){
                                            $target='1';
                                            $total_target='150';$count='150';
                                        }
                                    ?>
                                <tr>
                                    <?php if($i==0 || $date2!=$date){ 
                                        $i++;
                                        $date2=$date;
                                        ?>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $a['job_description']; ?></td>
                                    <td><?php echo $a['qr_number']; ?></td>
                                    <td><?php echo $count ?></td>
                                    <td><?php $total= $a['qr_number'] * $target; echo $total."/ ".$total_target ?>
                                    </td>
                                    <?php 

                                    $sql ="SELECT time,description FROM time_track WHERE user_id=$user_id AND status='0' AND date like '%$date%' ";
                                    $query_run = mysqli_query($connection,$sql);
                                    // $row = mysqli_num_rows($query_run);
                                    $mr=0;
                                    $ev=0;
                                    $tea=0;
                                    foreach( $query_run as $b){
                                        $description = $b['description'];
                                        if($description == 'morning session start'){
                                            $mr=$b['time'];
                                           
                                        }
                                        if($description == 'afternoon session start'){
                                            $ev=$b['time'];
                                          
                                        }
                                        if($description == 'evening session start'){
                                            $tea=$b['time'];
                                            
                                        }
                                    }  
                                    
                                         echo "<td>".$mr."</td>";
                                          echo "<td>".$ev."</td>";
                                           echo "<td>".$tea."</td>";
                                           $sql1 ="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS TotalTime FROM time_track WHERE user_id=$user_id AND status='0' AND date like '%$date%' ";
                                    $query_run1 = mysqli_query($connection,$sql1);
                                    foreach( $query_run1 as $c){
                                     echo "<td>".$c['TotalTime']."</td>";
                                    }
                                }else{
                                     $date2=$date;
                                    ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $a['job_description']; ?></td>
                                    <td><?php echo $a['qr_number']; ?></td>
                                    <td><?php echo $count ?></td>
                                    <td><?php $total= $a['qr_number'] * $target; echo $total."/ ".$total_target ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php } ?>
                                </tr>
                                <?php }
                                echo "<tr>";
                                        $sql1 ="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(time))) AS TotalTime FROM time_track WHERE user_id=$user_id AND status='0' AND date between $from_date AND $to_date ";
                                    $query_run1 = mysqli_query($connection,$sql1);
                                    foreach( $query_run1 as $d){
                                     echo "
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td>Total Delay Time during selected date range</td>
                                     <td>".$d['TotalTime']."</td>";
                                    }
                                echo "</tr>";
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function exportToExcel(tableID, filename = '') {
    var downloadurl;
    var dataFileType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'export_excel_data.xls';

    // Create download link element
    downloadurl = document.createElement("a");

    document.body.appendChild(downloadurl);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTMLData], {
            type: dataFileType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;

        // Setting the file name
        downloadurl.download = filename;

        //triggering the function
        downloadurl.click();
    }
}


/////////////////////////////////////////////////////
function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tblexportData");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>