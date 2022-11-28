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
<form method="POST">
    <div class="row">
        <label class="col-form-label " style="margine-left:5px">#</label>

        <input type="text" min="1" placeholder="S/O Number" name="sales_order_id">


        <button type="submit" name="submit" id="submit" class="btn btn-info">Submit</button>

</form>

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
            <th>HDD Capacity</th>
            <th>RAM Capacity</th>
            <th>Screen Type</th>
            <th>Screen Size </th>
        </tr>
    </thead>
    <tbody>

        <?php 
        if(isset($_POST['submit'])){ 
            $sales_order_id = mysqli_real_escape_string($connection, $_POST['sales_order_id']); 
            $sql = "SELECT * FROM packing_mfg WHERE sales_order_id ='$sales_order_id'";
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

            <?php
           }
        }
		   ?>
    </tbody>
</table>
<button onclick="exportToExcel('tblexportData', 'packing-details')" class="btn btn-success">Export Table Data To Excel
    File</button>
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