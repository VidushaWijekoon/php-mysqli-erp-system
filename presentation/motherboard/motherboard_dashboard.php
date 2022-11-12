<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Motherboard Dashboard </h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="#"><i class="fa-solid fa-check"></i><span
                class="mx-1">Completed Task</span></a>
    </div>
</div>

<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Motherboard Repaired</span>
                <span class="info-box-number">0 </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-share-from-square"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pre Day Motherboard Repaired</span>
                <span class="info-box-number"> 0</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Motherboard Members</span>
                <span class="info-box-number"> 0 </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Motherboard Technicians</span>
                <span class="info-box-number">
                    <?php

                        $query = "SELECT department FROM employees WHERE department = 'production'";

                        if ($result = mysqli_query($connection, $query)) {

                            $rowcount = mysqli_num_rows($result);
                            echo "$rowcount";
                        }
                        ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="col col-lg-12 justify-content-center m-auto">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Daily Work
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="from_date"
                                        value="<?php if(isset($_POST['from_date'])){ echo $_POST['from_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="date" name="to_date"
                                        value="<?php if(isset($_POST['to_date'])){ echo $_POST['to_date']; } ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-xs btn-primary px-2"
                                        style=" font-size: 9px; margin-top: 4px; border-radius: 5px;">Select
                                        Date</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/O</th>
                                <th>SO Created Date</th>
                                <th>Delivery Date</th>
                                <th>Received QTY</th>
                                <th>Prepared QTY from Production</th>
                                <th>Tested QTY form Motherboard</th>
                                <th style="width: 250px;">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 

                                $select_query = "SELECT *, COUNT(sales_order_id) AS Sales_Orders 
                                                FROM motherboard_check 
                                                LEFT JOIN sales_order_add_items ON sales_order_add_items.sales_order_id = motherboard_check.sales_order_id
                                                GROUP BY sales_order_id";
                                $result = mysqli_query($connection, $select_query);

                                    foreach($result as $sr){
                                        
                               
                            ?>


                            <tr class='bg-warning'>
                            <tr>
                                <td><?= $sr['sales_order_id'] ?></td>
                                <td><?= $sr['created_date'] ?></td>
                                <td><?= $sr['item_delivery_date'] ?></td>
                                <td><?= $sr['Sales_Orders']; ?></td>
                                <td>6</td>
                                <td>4</td>
                                <td></td>
                                <td class="d-flex">

                                    <a class='btn btn-xs bg-primary' href='motherboard_received_laptop.php'>
                                        <i class='fa-solid fa-qrcode'></i> </a>
                                </td>
                            </tr>

                            <?php }  ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<!-- Received Modal -->
<div class="modal fade" id="modal-assign">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-user-plus mx-2 bg-warning p-2"></i>SO
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td><select name="cars" id="cars">
                                        <option value="volvo">1037 - Moses</option>
                                        <option value="saab">1139 - Vigin</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input class="btn btn-primary" type="submit" name="submit" vlaue="Choose options">

            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php include_once('../includes/footer.php'); ?>