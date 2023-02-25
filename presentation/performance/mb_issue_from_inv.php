<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<style>
    table tr {
        padding: 20px;
        text-align: center;
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="performance_record.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center align-item-center mx-auto mt-2 text-uppercase">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0">Open LCD Issue List From Inventory</p>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Inventory Id</th>
                            <th>Model</th>
                            <th>Core</th>
                            <th>Generation</th>
                            <th>Received Date</th>
                            <th>Status</th>
                            <th>Completed Date</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT alsakb_qr,created_date,received_date,status,model,generation,core  FROM issue_laptops LEFT JOIN 
                    warehouse_information_sheet ON warehouse_information_sheet.inventory_id=issue_laptops.alsakb_qr WHERE issue_type2='1' AND status='1'";
                            $query_run = mysqli_query($connection, $sql);

                            foreach ($query_run as $data) {
                                if ($data['status'] == 1) {
                                    $status = "Not Started";
                                } elseif ($data['status'] == 2) {
                                    $status = "Completed";
                                }
                            ?>
                                <tr>
                                    <td>
                                        <form method='POST'><input type="text" name="marks" id="marks" value=" <?php echo $data['alsakb_qr'] ?>" class='d-none'>
                                            <button type="button" class="btn bg-transparent
			btn-sm" data-toggle="modal" onblur="getGrossProfit('<?php echo $data['alsakb_qr'] ?>')" data-target="#exampleModal" id="submit">
                                                <?php echo $data['alsakb_qr'] ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td><?php echo $data['model'] ?></td>
                                    <td><?php echo $data['core'] ?></td>
                                    <td><?php echo $data['generation'] ?></td>
                                    <td><?php echo $data['created_date'] ?></td>
                                    <td><?php echo  $status ?></td>
                                    <td><?php echo $data['received_date'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const getGrossProfit = (str) => {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "mb_issue_display.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Mention Issue From Inventory
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>

            <div class="modal-body">
                <form method='POST' action='sample.php'>
                    <div id="txtHint"><b>Person info will be listed here...</b></div>

                    <button type="submit" class='btn btn-primary
                               btn-sm' name='test'>
                        Start
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>