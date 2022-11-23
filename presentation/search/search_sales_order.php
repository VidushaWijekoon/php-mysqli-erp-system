<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
                              
?>

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card mb-2">
                <div class="d-flex">
                    <div class="col col-md-6 col-lg-6">
                        <fieldset class="mt-2 mb-3">
                            <legend>Scan Sales Order</legend>
                            <form action="" method="POST">
                                <div class="input-group">
                                    <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                                    <input type="number" min="000001" name="search"
                                        value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"
                                        class="form-control" placeholder="Search data" width="50%">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
                <?php 
                
                if(isset($_POST['search'])){
                    $filtervalues = $_POST['search'];

                    $search_query = "SELECT * FROM sales_order_information
                                    LEFT JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id
                                    LEFT JOIN warehouse_information_sheet ON sales_order_information.sales_order_id = warehouse_information_sheet.sales_order_id 
                                    WHERE CONCAT(sales_order_add_items.sales_order_id) LIKE '$filtervalues'";
                    $query_run = mysqli_query($connection, $search_query);
                    
                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $x){ ?>


                <!-- ============================================================== -->
                <!-- Timeline    -->
                <!-- ============================================================== -->



                <?php } } }    ?>

                <div class="row">

                    <!-- ============================================================== -->
                    <!-- Customer Informations    -->
                    <!-- ============================================================== -->

                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h6>Customer Informations</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- Sales Order Informations    -->
                    <!-- ============================================================== -->

                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header bg-secondary">
                                <h6>Sales Order Item List</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <?php include_once('../includes/footer.php'); ?>