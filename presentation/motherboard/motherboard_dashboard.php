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
        <!-- <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./motherboard_received_laptop.php"><i
                class="fa-solid fa-plus"></i><span class="mx-1">Received Items</span></a> -->
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="./motherboard_weekly_report.php"><i
                class="fa-solid fa-cogs"></i><span class="mx-1">Team Work</span></a>
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
                                <th>Prepared </th>
                                <th>Completed</th>
                                <th style="width: 250px;">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $received_unit = NULL;
                                $prepared = NULL;
                                $complted = NULL;
                                
                                $query = "SELECT * FROM motherboard_check
                                        LEFT JOIN sales_order_add_items ON motherboard_check.sales_order_id = sales_order_add_items.sales_order_id
                                        GROUP BY motherboard_check.sales_order_id";
                                $results = mysqli_query($connection, $query);
                        
                                if(mysqli_num_rows($results) > 0){
                                    foreach($results as $r){   
                                        
                                        $d = "SELECT *, COUNT(motherboard_id) AS Total_received FROM motherboard_dep WHERE sales_order_id ={$r['sales_order_id']}" ;
                                        $q = mysqli_query($connection, $d);
                                        foreach($q as $l){
                                            $total = $l['Total_received'];
                                
                                ?>
                            <tr>

                                <td><?= $r['sales_order_id'] ?></td>
                                <td><?= $r['sales_order_created_date'] ?></td>
                                <td><?= $r['item_delivery_date'] ?></td>
                                <td><?= $total; ?></td>
                                <td>
                                    <?php
                                    
                                        $d = "SELECT *, SUM(motherboard_assign.qty) AS Total_received FROM motherboard_assign WHERE sales_order_id ={$r['sales_order_id']}" ;
                                        $q = mysqli_query($connection, $d);
                                        foreach($q as $l){
                                            $total = $l['Total_received'];
                                            echo $total;
                                        }
                                    ?>
                                </td>
                                <td>4</td>
                                <td>
                                    <?php                               

                                            $percentage = round(( 100 / 5) * 100);

                                            if($percentage == 100)
                                            {
                                                $progress_bar_class = 'bg-success progress-bar-striped';
                                            }
                                            else if($percentage >= 50 && $percentage < 99)
                                            {
                                                $progress_bar_class = 'bg-info progress-bar-striped';
                                            }
                                            else if($percentage >= 11 && $percentage < 49)
                                            {
                                                $progress_bar_class = 'bg-warning progress-bar-striped';
                                            }
                                            else if($percentage >= 0 && $percentage < 10)
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                            else
                                            {
                                                $progress_bar_class = 'bg-danger progress-bar-striped';
                                            }
                                                                                
                                            echo  
                                            '<div class="progress text-bold">
                                                <div class="progress-bar '.$progress_bar_class.'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">
                                                    '.$percentage.' % 
                                                </div>
                                            </div>'
                                            ?>

                                </td>
                                <td class="text-center">

                                    <?php 
                                        echo "<a class='btn btn-xs bg-primary mx-2' href=\"motherboard_received_laptop.php?sales_order_id={$r['sales_order_id']}\"><i class='fa-solid fa-qrcode'></i> </a>";
                                        echo "<a class='btn btn-xs bg-warning' href=\"motherboard_team_leader_summery.php?sales_order_id={$r['sales_order_id']}\"><i class='fa-solid fa-bullseye'></i> </a>";
                                    ?>
                                </td>


                            </tr>
                            <?php } } }?>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-user-plus mx-2 bg-warning p-2"></i>SO
                    <?= $r['sales_order_id']; ?>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <table id="tb1" class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Member</th>
                                <th>Assign QTY</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td>#</td>
                                <td>
                                    <form action="" method="post">
                                        <select name="emp_id">
                                            <option value="" class="w-50" selected>--Select Team Member--</option>
                                            <?php
                                                    $query = "SELECT epf,first_name FROM users WHERE department = '9' ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($technicians = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                            <option value="<?php echo $technicians["epf"]; ?>">
                                                <?php echo strtoupper($technicians["epf"].'-'.$technicians["first_name"]); ?>
                                            </option>
                                            <?php
                                                    endwhile;
                                                    ?>
                                        </select>
                                </td>
                                <td><input type="number" min="1" placeholder="Assign QTY" name="motherboard_assign_qty">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <span class="text-uppercase bg-info mx-auto text-center d-flex justify-content-center">Please
                        Assign the task for the motherboard techinician</span>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <input class="btn btn-primary mx-auto" type="submit" name="submit" vlaue="Choose options">

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->


<?php include_once('../includes/footer.php'); ?>