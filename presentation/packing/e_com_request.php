<?php 

session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

        $start_time= $_GET['start_time'];
        $end_time= $_GET['end_time'];
        $day= $_GET['day'];
        $date_start = date('Y-m-d 00:00:00');
                $date_end = date('Y-m-d 23:59:59');
                $count_a=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending' AND created_time between '$date_start'AND '$date_end' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count_a = $a['request_count'];
                }
                $date_1_start = date('Y-m-d 00:00:00',strtotime("-1 days"));
                $date_1_end = date('Y-m-d 23:59:59',strtotime("-1 days"));
                $count=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending' AND created_time between '$date_1_start'AND '$date_1_end' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count = $a['request_count'];
                }
                $date_2_start = date('Y-m-d 00:00:00',strtotime("-2 days"));
                $date_2_end = date('Y-m-d 23:59:59',strtotime("-2 days"));
                $count2=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending' AND created_time between '$date_2_start'AND '$date_2_end' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count2 = $a['request_count'];
                }
                $date_3_start = date('Y-m-d 00:00:00',strtotime("-3 days"));
                $date_3_end = date('Y-m-d 23:59:59',strtotime("-3 days"));
                $count3=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending' AND created_time between '$date_3_start'AND '$date_3_end' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count3 = $a['request_count'];
                }
?>

<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3 ">
        <a href="e_com_request.php?start_time='<?php echo $date_start ?>'&end_time='<?php echo $date_end ?>'&day=Today">
            <div class="info-box " style="background-color:skyblue !important; ">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Today E-Commerce Order Request</span>
                    <span class="info-box-number">
                        <?php 
                echo $count_a;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <?php if($count != 0){ ?>
    <div class="col-12 col-sm-6 col-md-3 mt-3 ">
        <a
            href="e_com_request.php?start_time='<?php echo $date_1_start ?>'&end_time='<?php echo $date_1_end ?>'&day=Yesterday">
            <div class="info-box " style="background-color:#c9b404 !important; ">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Yesterday E-Commerce Order Request</span>
                    <span class="info-box-number">
                        <?php 
                echo $count;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <?php } if($count2 != 0){?>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <a
            href="e_com_request.php?start_time='<?php echo $date_2_start ?>'&end_time='<?php echo $date_2_end ?>'&day=Day before yesterday">
            <div class="info-box" style="background-color:red !important; ">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Day before yesterday E-Commerce Order Request</span>
                    <span class="info-box-number"><?php 
                
                echo $count2;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <?php } if($count3 != 0){?>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <a
            href="e_com_request.php?start_time='<?php echo $date_3_start ?>'&end_time='<?php echo $date_3_end ?>'&day=2days ago">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">2days ago E-Commerce Order Request</span>
                    <span class="info-box-number"><?php 
               
                echo $count3;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <?php } ?>
</div>
<div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
    <div class="card mt-3 w-100">
        <div class="card-body">
            <h2><?php echo $day." "; ?>E-Commerce Order List</h2>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sr.No</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Barcode</th>
                        <th>Qty</th>
                        <th>Prepared Qty</th>
                        <th>Platform</th>
                        <th>Created By</th>
                        <th>Created Time</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody class="table-dark">
                    <?php 
                            $date = date('Y-m-d 00:00:00');
                            $date2 = date('Y-m-d 23:59:59');
                            $mfg = null;
                            $query = "SELECT * FROM e_com_packing_request WHERE created_time between $start_time AND $end_time ";
                            $query_run = mysqli_query($connection, $query);
                            $i=0;
                            foreach($query_run as $data){
                                $i++;
                                ?>
                    <tr>
                        <td><?php  echo $i ?></td>
                        <td><?php  echo $data['sr_no']?></td>
                        <td><?php  echo $data['brand']?></td>
                        <td><?php  echo $data['model']?></td>
                        <td><?php  echo $data['barcode']?></td>
                        <td><?php  echo $data['qty']?></td>
                        <td><?php  echo $data['prepare_qty']?></td>
                        <td><?php  echo $data['platform']?></td>
                        <td><?php  echo $data['created_by']?></td>
                        <td><?php  echo $data['created_time']?></td>
                        <td><?php  echo $data['order_status']?></td>
                        <td class='text-center'>
                            <?php if($data['order_status'] == 'packing pending'){ ?>
                            <!-- <a class='btn btn-xs bg-primary ' data-toggle="modal" data-target="#modal"><i
                                    class='fas fa-eye'></i>
                            </a> -->
                            <button type="button" class="btn btn-sm editbtn btn-info" data-toggle="modal"
                                data-target=""><i class='fas fa-eye'></i></button>
                            <?php }elseif($data['order_status'] == 'order cancel'){ ?>
                            <a class='btn btn-xs bg-danger '><i class='fas fa-eye'></i>
                            </a>
                            <?php }else{ ?>
                            <a class='btn btn-xs bg-success '><i class='fas fa-eye'></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php }    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <fieldset>

                    <legend>Scan MGF</legend>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">MFG Number</label>
                        <div class="col-sm-8">
                            <input type="text" min="1" class="form-control" placeholder="MFG Number" name="mfg"
                                required>
                        </div>
                    </div>


                    <button type="submit" name="submit_mfg" id="submit"
                        class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center d-none"><i
                            class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Confirm</button>
                </fieldset>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data</h5>
            </div>
            <div class="modal-body">
                <form method="POST" class="mb-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-auto">
                            <label for="barcode" class="col-form-label">barcode</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" id="barcode" name="barcode" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row g-5 align-items-center">
                        <div class="col-auto">
                            <!-- <label for="qty" class="col-form-label">qty</label> -->
                        </div>
                        <div class="col-auto">
                            <input type="hidden" id="qty" name="qty" class="form-control">
                            <input type="hidden" id="prepare_qty" name="prepare_qty" class="form-control">
                        </div>
                    </div>
                    <div class="row g-5 align-items-center">
                        <div class="col-auto">
                            <label for="mfg" class="col-form-label">MFG Code</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="mfg" class="form-control">
                        </div>
                    </div>
                    <button type="submit" name="submit_mfg" id="submit"
                        class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center d-none"><i
                            class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Confirm</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php

if(isset($_POST['submit_mfg'])){
    $mfg = mysqli_real_escape_string($connection, $_POST['mfg']); 
    $barcode = mysqli_real_escape_string($connection, $_POST['barcode']); 
    $qty = mysqli_real_escape_string($connection, $_POST['qty']); 
    $prepare_qty = mysqli_real_escape_string($connection, $_POST['prepare_qty']); 
    $pending =($qty-$prepare_qty);
    $date = date('Y-m-d 00:00:00');
    $date2 = date('Y-m-d 23:59:59');
    if($pending == 1){
        $prepare_qty++;
        $query = "SELECT dispatch FROM e_com_inventory WHERE mfg ='$mfg' AND dispatch ='1'";
        $query_run = mysqli_query($connection, $query);
        if(empty($query_run)){
        $query = "UPDATE e_com_packing_request SET prepare_qty = '$prepare_qty',order_status='send to office' WHERE barcode ='$barcode' AND created_time between '$start_time'AND '$end_time'";
        $query_run = mysqli_query($connection, $query);
        $query = "UPDATE e_com_inventory SET sales_order_id = '000001',dispatch='1' WHERE mfg ='$mfg'";
        $query_run = mysqli_query($connection, $query);
        }else{
            echo '<script>alert("QR code already dispatch")</script>';
        }
    }else{
    $prepare_qty++;
        $query = "SELECT dispatch FROM e_com_inventory WHERE mfg ='$mfg' AND dispatch ='1'";
        $query_run = mysqli_query($connection, $query);
        if(empty($query_run)){
            $query = "UPDATE e_com_packing_request SET prepare_qty = '$prepare_qty' WHERE barcode ='$barcode'AND created_time between '$start_time'AND '$end_time'";
            $query_run = mysqli_query($connection, $query);
            $query = "UPDATE e_com_inventory SET sales_order_id = '000001',dispatch='1' WHERE mfg ='$mfg'";
            $query_run = mysqli_query($connection, $query);
        }else{
            echo '<script>alert("QR code already dispatch")</script>';
        }
    }
}
?>

<script>
$(document).ready(function() {
    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#barcode').val(data[4]);
        $('#qty').val(data[5]);
        $('#prepare_qty').val(data[6]);

    });
});
</script>