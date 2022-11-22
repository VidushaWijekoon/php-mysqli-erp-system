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

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1)){
  
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./accounts_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Invoices
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
                                <div class="form-group">
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
                                <th>#</th>
                                <th>Delivery</th>
                                <th>Order Creaed Date</th>
                                <th>Delivery Date</th>
                                <th>Order QTY</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 
                            
                            if(isset($_GET['search'])){
                                $filtervalues = $_GET['search'];

                                $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_information
                                        INNER JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id
                                        WHERE CONCAT(sales_order_information.sales_order_id, sales_order_add_items.item_delivery_date) LIKE '%$filtervalues%'
                                        GROUP BY sales_order_information.sales_order_id";
                                $results = mysqli_query($connection, $query);

                                foreach($results as $items){                                  

                            ?>
                            <tr>
                                <td><?php echo $items['sales_order_id'] ?></td>
                                <td><?php echo $items['shipping_country'] ?></td>
                                <td><?php echo $items['created_time'] ?></td>
                                <td><?php echo $items['item_delivery_date'] ?></td>
                                <td><?php echo $items['No_of_Records'] ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-xs bg-info mx-2' name='submit' type='submit' href=\"production_sales_order_view.php?sales_order_id={$items['sales_order_id']}\"><i class='fas fa-eye'></i> </a>"; ?>
                                </td>
                            </tr>

                            <?php }
                            }else{
                                $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_information
                                        INNER JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id                                        
                                        GROUP BY sales_order_information.sales_order_id";
                                $results = mysqli_query($connection, $query);

                                foreach($results as $items){
                                                   
                            ?>
                            <tr>
                                <td><?php echo $items['sales_order_id'] ?></td>
                                <td><?php echo $items['shipping_country'] ?></td>
                                <td><?php echo $items['created_time'] ?></td>
                                <td><?php echo $items['item_delivery_date'] ?></td>
                                <td><?php echo $items['No_of_Records'] ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-xs bg-info mx-2' name='submit' type='submit' href=\"production_sales_order_view.php?sales_order_id={$items['sales_order_id']}\"><i class='fas fa-eye'></i> </a>"; ?>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>