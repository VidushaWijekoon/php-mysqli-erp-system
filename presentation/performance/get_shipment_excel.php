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
    <div class="col-md-5 align-self-center"><a href="./packing_department.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="col col-lg-12 justify-content-center m-auto text-uppercase">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-body">
                    <form method='POST'>
                        <input class="w-6" style="color:black !important" type="text" id="sales_order" name="sales_order" placeholder="salesorder " value="">
                        <button type="submit" name="submit" id="submit" class="btn btn-default bg-gradient-success btn-next  ">
                            Find
                        </button>
                    </form>
                    <?php $sales_order_id = '001';
                    if (isset($_POST['submit'])) {
                        $sales_order_id = $_POST['sales_order'];
                    }

                    $query = "SELECT * FROM packing_mfg WHERE sales_order_id ='$sales_order_id'";
                    $query_run = mysqli_query($connection, $query);
                    $row = mysqli_num_rows($query_run);
                    ?>

                    <button onclick="exportToExcel('tblexportData', '<?php echo $sales_order_id; ?>')" class="btn bg-gradient-info mt-3 float-right">Export Table Data To Excel
                        File</button>
                    <?php if (!empty($row)) {
                        echo "Unit Count=";
                        echo $row;
                    } ?>
                    <table id="example2" class="table table-bordered table-striped">
                        <table id="tblexportData" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sales Order ID</th>
                                    <th>MFG</th>
                                    <th>Model</th>
                                    <th>CPU</th>
                                    <th>Generation</th>
                                    <th>RAM</th>
                                    <th>Hard Disk capacity</th>
                                    <th>Screen Size</th>
                                    <th>Screen Resolution</th>
                                    <th>Charger</th>
                                    <th>Box Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($query_run as $a) {

                                ?>
                                    <tr>
                                        <td><?php echo $a['sales_order_id']; ?></td>
                                        <td><?php echo $a['mfg']; ?></td>
                                        <td><?php echo $a['model']; ?></td>
                                        <td><?php echo $a['core']; ?></td>
                                        <td><?php echo $a['generation']; ?></td>
                                        <td><?php echo $a['ram_capacity'] . "GB"; ?></td>
                                        <td><?php echo $a['hdd_capacity'] . "GB"; ?></td>
                                        <td><?php echo $a['screen_size']; ?></td>
                                        <td><?php echo $a['screen_resolution']; ?></td>
                                        <td><?php echo $a['charger']; ?></td>
                                        <td><?php echo $a['cartoon_number']; ?></td>

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


        filename = filename ? filename + '.xls' : 'export_excel_data.xls';


        downloadurl = document.createElement("a");

        document.body.appendChild(downloadurl);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTMLData], {
                type: dataFileType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {

            downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;


            downloadurl.download = filename;

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