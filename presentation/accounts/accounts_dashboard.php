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

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i> Account Dashboard</h3>
    </div>
</div>


<div class="row m-2">

    <div class="col-12 mt-3">
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./create_invoice.php"><i
                class="fa fa-plus"></i><span class="mx-1">Create Invoice</span></a>
        <a class="btn bg-gradient-info mx-2 text-white" type="button" href="./sales_orders.php"><i
                class="fa fa-plus"></i><span class="mx-1">Sales Order List</span></a>
    </div>
</div>


<!-- Info boxes -->
<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-receipt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Quatations</span>
                <span class="info-box-number">
                    <?php 
                    
                        $query = "SELECT *, COUNT(quatation_id) as Total_quatations FROM sales_quatation";
                        $query_set = mysqli_query($connection, $query);

                        while($count = mysqli_fetch_assoc($query_set)){
                            $Total_quatations =  $count['Total_quatations'];
                        }

                        echo $Total_quatations;                    
                    
                    ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-stamp"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Turn Over</span>
                <span class="info-box-number">
                    0
                </span>
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
                <span class="info-box-text"> Sales Orders</span>
                <span class="info-box-number">
                    <?php 
                    
                        $query = "SELECT *, COUNT(sales_order_id) as COUNT FROM sales_order_information";
                        $query_set = mysqli_query($connection, $query);

                        while($count = mysqli_fetch_assoc($query_set)){
                            $total =  $count['COUNT'];
                        }

                        echo $total;                    
                    
                    ?>
                </span>
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
                <span class="info-box-text">Sales Team</span>
                <span class="info-box-number">
                    <?php 
                    
                        $query = "SELECT *, COUNT(emp_id) as accont_team FROM employees WHERE department = 20";
                        $query_set = mysqli_query($connection, $query);

                        while($count = mysqli_fetch_assoc($query_set)){
                            $accont_team =  $count['accont_team'];
                        }

                        echo $accont_team;                    
                    
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


<?php include_once('../includes/footer.php'); ?>