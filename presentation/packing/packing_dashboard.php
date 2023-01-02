<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 4 && $department == 13){ ?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Packing Dashboard </h3>
    </div>
</div>

<div class="row m-2">
    <div class="col-12 mt-3">
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="./create_packing_label.php"><i
                class="fa-solid fa-cogs"></i><span class="mx-1">Create Label</span></a>
        <a class="btn bg-gradient-success mx-2 text-white" type="button" href="./download_excelsheet.php"><span
                class="mx-1">Get Excel Sheet</span></a>
    </div>
</div>

<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <?php 
        $date = date('Y-m-d 00:00:00');
        $date2 = date('Y-m-d 23:59:59');
        $start_time = $date;
        $end_time =$date2; ?>
        <a href="e_com_request.php?start_time='<?php echo $start_time ?>'&end_time='<?php echo $end_time ?>'&day=Today">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">E-Commerce Order Request</span>
                    <span class="info-box-number"><?php 
                
                $count=0;
                $query = "SELECT COUNT(request_id) as request_count FROM e_com_packing_request  WHERE order_status='packing pending' ";
                $query_run = mysqli_query($connection, $query);
                foreach($query_run as $a){
                    $count = $a['request_count'];
                }
                echo $count;

                ?> </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </a>
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-share-from-square"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Released Inventory ID</span>
                <span class="info-box-number"> 0 </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>


    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Packing Members</span>
                <span class="info-box-number">
                    5
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
        <div class="card mt-3">
            <div class="card-header d-flex bg-secondary">
                <div class="mr-auto">
                    <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                        Sales Order Details
                    </div>
                </div>
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="from_date"
                                    value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="date" name="to_date"
                                    value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-xs btn-primary">Choose Date</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group d-flex">
                                <span class="mx-2" style="margin-top: 5px;">Search</span>
                                <input type="search" name="search"
                                    value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"
                                    class="form-control" placeholder="Search data">
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
                            <th>Model</th>
                            <th>Sales Order Created Date</th>
                            <th>Delivery Date</th>
                            <th>Sale Type</th>
                            <th>Order QTY</th>
                            <th>Prepared QTY From QC</th>
                            <th>Completed QTY</th>
                            <th style="width: 250px;">&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="tbody_1">

                        <?php 

                            if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['search'])){

                                $search = $_GET['search']; 
                                $from_date = $_GET['from_date']; 
                                $to_date = $_GET['to_date']; 
                                $completed_qty;
                                $completed_count;
                                $i =0;
                               
                                $query = "SELECT *, SUM(sales_order_add_items.item_quantity) AS No_of_Records FROM sales_order_information
                                        INNER JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id
                                        WHERE sales_order_information.created_time BETWEEN '$from_date' AND '$to_date' 
                                        AND CONCAT(sales_order_information.sales_order_id, sales_order_add_items.sales_order_id) OR (sales_order_add_items.sales_order_id)
                                        LIKE '%$search%'
                                        GROUP BY sales_order_information.sales_order_id ";
                                $query_run = mysqli_query($connection, $query);                                

                                if ($rowcount = mysqli_fetch_assoc($query_run)) {
                                    foreach ($query_run as $items) {
                                         $status = 0;
                                        
                                        $query6 = "SELECT status FROM warehouse_assign_task WHERE sales_order={$items['sales_order_id']} ";
                                        $query1 = mysqli_query($connection, $query6);
                                        foreach ($query1 as $emp) {
                                            $status = $emp['status'];
                                        } 

                                           
                            ?>
                        <?php if($status == '0'){ 
                            $i++;
                            if($i == 1){ ?>
                        <tr class='bg-warning'>
                            <?php } else {?>
                        <tr>
                            <?php }?>
                            <?php $id=$items['sales_order_id'];?>

                            <td><a href="view_order_spec.php?order_id=<?php echo $id;?>">
                                    <?php echo $items['sales_order_id'];?> </a></td>
                            <td><?php echo $items['item_model']?></td>
                            <td><?php echo $items['created_time'] ?></td>
                            <td><?php echo $items['item_delivery_date'] ?></td>
                            <td><?php echo $items['item_bulk'] ?></td>
                            <td><?php echo $items['No_of_Records'] ?></td>
                            <td>
                                <?php 
                                    $query7 ="SELECT COUNT(mfg_id) AS prepared_count FROM packing_mfg WHERE model ={$items['item_model']} AND sales_order_id='0'";  
                                    echo $query7;
                                    $query6_get = mysqli_query($connection, $query7);
                                        foreach($query6_get as $data){
                                            $prepared_count = $data['prepared_count'];
                                            echo $prepared_count;;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $query7 ="SELECT COUNT(sales_order_id) AS completed_count FROM packing_mfg WHERE sales_order_id ={$items['sales_order_id']}";  
                                    $query6_get = mysqli_query($connection, $query7);
                                    if(!empty($query6_get)){
                                        foreach($query6_get as $data){
                                            $prepared_count = $data['prepared_count'];
                                            echo $prepared_count;
                                    }
                                }else{
                                        echo "0";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php

                                    $percentage = round(($completed_count  / $items['No_of_Records']) * 100);

                                    if($percentage == 100)
                                        {
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d H:i:s');
                                            $query ="UPDATE warehouse_assign_task SET task_completed_date='{$date}',status ='1' WHERE sales_order = '{$items['sales_order_id']}'";
                                            $query_update = mysqli_query($connection, $query);
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
                            <td>
                                <?php echo "<a class='btn btn-xs bg-teal'
                                        href=\"create_packing_label.php\"><i
                                       class='fas fa-eye'></i> </a>" 
                                ?>
                            </td>
                        </tr>

                        <?php } } } }else{ 

                        $completed_qty;
                        ;
                        $completed_count;
                        $i =0;

                        $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_information
                                LEFT JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id
                                WHERE sales_order_add_items.sales_order_id AND sales_order_information.sales_order_id                        
                                GROUP BY sales_order_add_items.sales_order_id ORDER BY sales_order_created_date";
                        $query_run = mysqli_query($connection, $query);

                        if ($rowcount = mysqli_fetch_assoc($query_run)) {
                            foreach ($query_run as $items) {
                            $status = 0;

                        $query6 = "SELECT status FROM warehouse_assign_task WHERE sales_order={$items['sales_order_id']} ";
                        $query1 = mysqli_query($connection, $query6);
                            foreach ($query1 as $emp) {
                                $status = $emp['status'];
                            }


                        ?>
                        <?php if($status == '0'){ 
                            $i++;
                            if($i == 1){ ?>
                        <tr class='bg-warning'>
                            <?php } else {?>
                        <tr>
                            <?php }?>
                            <?php $id = $items['sales_order_id'];?>

                            <td><a href="view_order_spec.php?order_id=<?php echo $id;?>">
                                    <?php echo $items['sales_order_id']?> </a></td>
                            <td><?php echo $items['item_model'];?></td>
                            <td><?php echo $items['created_time'] ?></td>
                            <td><?php echo $items['item_delivery_date'] ?></td>
                            <td><?php echo $items['item_bulk'] ?></td>
                            <td><?php echo $items['No_of_Records'] ?></td>
                            <td>
                                <?php 
                                    $query7 ="SELECT COUNT(mfg_id) AS prepared_count FROM packing_mfg WHERE model ={$items['item_model']} AND sales_order_id='0'";  
                                    $query6_get = mysqli_query($connection, $query7);
                                    if(!empty($query6_get)){
                                        foreach($query6_get as $data){
                                            $prepared_count = $data['prepared_count'];
                                            echo $prepared_count;
                                    }
                                }else{
                                        echo "0";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    $query7 ="SELECT COUNT(sales_order_id) AS completed_count FROM packing_mfg 
                                                WHERE sales_order_id ={$items['sales_order_id']}";  
                                    $query6_get = mysqli_query($connection, $query7);
                                        foreach($query6_get as $data){
                                            $completed_count = $data['completed_count'];
                                            echo $completed_count;;
                                    }
                                ?>
                            </td>
                            <td>
                                <?php

                                    $percentage = round(($completed_count  / $items['No_of_Records']) * 100);

                                    if($percentage == 100)
                                        {
                                            $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
                                            $date = $date1->format('Y-m-d H:i:s');
                                            $query ="UPDATE warehouse_assign_task SET task_completed_date='{$date}',status ='1' WHERE sales_order = '{$items['sales_order_id']}'";
                                            $query_update = mysqli_query($connection, $query);
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
                            <td>
                                <?php echo "<a class='btn btn-xs bg-teal'
                                        href=\"create_packing_label.php\"><i
                                       class='fas fa-eye'></i> </a>" 
                                ?>
                            </td>
                        </tr>
                        <?php } } } } ?>
                    </tbody>

                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>



<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>