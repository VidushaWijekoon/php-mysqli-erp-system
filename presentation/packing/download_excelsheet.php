<?php 

session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

$device = null;
$brand= null;
$model= null;
$core= null;
$generation= null;
$hdd_capacity= null;
$hdd_type= null;
$mfg= null;
$ram_capacity= null;
$screen_type= null;
$screen_size= null;
$cartoon_number= null;
$sales_order_id= null;

?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-receipt" aria-hidden="true"></i> MFG Report </h3>
    </div>
</div>





<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row m-2">
                        <div class="col-12">
                            <form method="POST">
                                <div class="row">
                                    <label class="col-form-label"></label>
                                    <input type="text" min="1" placeholder="S/O Number" name="sales_order_id">
                                    <button type="submit" name="submit" id="submit"
                                        class="btn bg-gradient-info btn-xs mx-2"
                                        style="border-radius: 5px;">Submit</button>

                            </form>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>CTN</th>
                                    <th>S/O</th>
                                    <th>MFG S/N</th>
                                    <th>Device</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>CPU</th>
                                    <th>Generation</th>
                                    <th>HDD Type</th>
                                    <th>HDD</th>
                                    <th>RAM</th>
                                    <th>Screen Type</th>
                                    <th>Screen Size </th>
                                    <th>Screen Resolution</th>
                                    <th>Optical</th>
                                    <th>Camera</th>
                                    <th>Keyboard Backlight</th>
                                    <th>OS </th>
                                    <th>Date and time</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    if(isset($_POST['submit'])){ 
                                        $sales_order_id = mysqli_real_escape_string($connection, $_POST['sales_order_id']); 
                                        $sql = "SELECT * FROM packing_mfg WHERE sales_order_id ='$sales_order_id' ORDER BY cartoon_number";
                                        $result = mysqli_query($connection, $sql);
                                    foreach($result as $data){
                                ?>
                                <tr>
                                    <td><?php echo $data['cartoon_number'];?></td>
                                    <td><?php echo $data['sales_order_id'];?></td>
                                    <td><?php echo $data['mfg'];?></td>
                                    <td><?php echo $data['device']; ?></td>
                                    <td><?php echo $data['brand'];?></td>
                                    <td><?php echo $data['model'];?></td>
                                    <td><?php echo $data['core'];?></td>
                                    <td><?php echo $data['generation'];?></td>
                                    <td><?php echo $data['hdd_type'];?></td>
                                    <td><?php echo $data['hdd_capacity'];?></td>
                                    <td><?php echo $data['ram_capacity'];?></td>
                                    <td><?php echo $data['touch'];?></td>
                                    <td><?php echo $data['screen_size'];?></td>
                                    <td><?php echo $data['screen_resolution'];?></td>
                                    <td><?php echo $data['dvd'];?></td>
                                    <td><?php echo $data['camera'];?></td>
                                    <td><?php echo $data['keyboard_backlight'];?></td>
                                    <td><?php echo $data['os'];?></td>
                                    <td><?php echo $data['packing_date'];?></td>

                                    <?php } } ?>
                            </tbody>
                        </table>
                        <button onclick="exportToExcel('tblexportData', 'packing-details')"
                            class="btn bg-gradient-success mt-3">Export Table Data To Excel
                            File</button>
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
</script>