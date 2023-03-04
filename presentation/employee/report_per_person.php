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
    <div class="col-md-5 align-self-center"><a href="./report.php">
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
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Completed QR</th>
                                    <th>Job Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query ="SELECT * FROM performance_record_table WHERE user_id=$user_id AND end_time between $from_date AND $to_date";
                                    $query_run = mysqli_query($connection,$query);
                                    // $row = mysqli_num_rows($query_run);
                                    foreach( $query_run as $a){
                                        
                                    ?>
                                <tr>
                                    <td><?php echo $a['start_time']; ?></td>
                                    <td><?php echo $a['end_time']; ?></td>
                                    <td><?php echo $a['qr_number']; ?></td>
                                    <td><?php echo $a['job_description']; ?></td>
                                </tr>
                                <?php }
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