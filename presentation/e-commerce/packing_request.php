<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');
//   ?>
<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="../../static/plugins/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<script src="../../static/plugins/jquery/1.11.3/jquery.min.js"></script>
<script src="../../static/plugins/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<?php
$user = $_SESSION['username'];
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user = $_SESSION['username'];

$sr_number = NULL;
$brand = NULL;
$model = NULL;
$barcode = NULL;
$qty = NULL;
$platform = NULL;
$username = $_SESSION['username'];
$start_print = 0;

    if(isset($_POST['submit_request'])){
     
    $sr_number = mysqli_real_escape_string($connection, $_POST['sr_number']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']); 
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $qty = mysqli_real_escape_string($connection, $_POST['qty']);
    $barcode = mysqli_real_escape_string($connection, $_POST['barcode']);
    $platform = mysqli_real_escape_string($connection, $_POST['platform']);

    $query = "INSERT INTO `e_com_packing_request`(`sr_no`, `brand`, `model`, `created_time`, `created_by`,  `platform`, `qty`, `barcode`)
            VALUES('$sr_number', '$brand' , '$model', CURRENT_TIMESTAMP ,'$user', '$platform', '$qty', '$barcode' )";
    
    $query_run = mysqli_query($connection, $query);
    header('location:packing_request.php');
    }
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da; "></i>
        </a>
    </div>
</div>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <button type="button" class="btn bg-gradient-danger w-75" data-toggle="modal" data-target="#modal">
            Cancel Order
        </button>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                    <h2> E-Commerce Order Request Form</h2>
                    <?php if (!empty($errors)) { display_errors($errors); }?>
                    <form method="POST">
                        <fieldset>
                            <legend>Create Packing Form</legend>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">Sr.No</label>
                                <div class="col-sm-8">
                                    <input type="number" min="1" class="form-control" placeholder="Sr.No"
                                        name="sr_number" required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="Brand" name="brand"
                                        required>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">Model</label>
                                <div class="col-sm-8">
                                    <textarea rows="6" cols="80" min="1" class="form-control" placeholder="Model"
                                        name="model" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Barcode</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="Barcode" name="barcode"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="Quantity" name="qty"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Platform</label>
                                <div class="col-sm-8">
                                    <input type="text" min="1" class="form-control" placeholder="Platform"
                                        name="platform" required>
                                </div>
                            </div>


                            <button type="submit" name="submit_request" id="submit"
                                class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                    class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Send</button>

                        </fieldset>
                    </form>

                </div>
                <!--/col-->
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3 w-100">
                <div class="card-body">
                    <h2>Today E-Commerce Order List</h2>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sr.No</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Barcode</th>
                                <th>Qty</th>
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
                            $query = "SELECT * FROM e_com_packing_request WHERE created_time between '$date'AND '$date2' ";
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
                                <td><?php  echo $data['platform']?></td>
                                <td><?php  echo $data['created_by']?></td>
                                <td><?php  echo $data['created_time']?></td>
                                <td><?php  echo $data['order_status']?></td>
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

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="row">
                    <label class="col-sm-3 col-form-label">Barcode Number</label>
                    <div class="col-sm-8">
                        <input type="text" min="1" class="form-control" placeholder="MFG Number" name="barcode"
                            required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">Cancel Reason</label>
                    <div class="col-sm-8">
                        <textarea rows="6" cols="80" min="1" class="form-control" placeholder="Cancel Reason"
                            name="cancel_reason" required></textarea>
                    </div>
                </div>


                <button type="submit" name="submit_barcode" id="submit"
                    class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center d-none"><i
                        class="fa-solid fa-qrcode" style="margin-right: 5px;"></i>Confirm</button>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
if(isset($_POST['submit_barcode'])){
     
     $barcode = mysqli_real_escape_string($connection, $_POST['barcode']);
     $cancel_reason = mysqli_real_escape_string($connection, $_POST['cancel_reason']);
 
     $query = "UPDATE `e_com_packing_request` SET `order_status`='order cancel',`cancel_description`=' $cancel_reason'WHERE barcode='$barcode' ";
     
     $query_run = mysqli_query($connection, $query);
     header('location:packing_request.php');
     }
?>

<?php include_once('../includes/footer.php');  ?>