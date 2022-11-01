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
    <div class="col-md-5 align-self-center"><a href="./search_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-info">
                    <h3 class="card-title p-2">Warehouse Sales Orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>In Total</th>
                                <th>In Stock</th>
                                <th>Dispatch</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <?php 
                                $sales_order_list = '';

                                // getting the list of users
                                $query = "SELECT *, SUM(item_quantity) AS No_of_Records FROM sales_order_information LEFT JOIN sales_order_add_items ON sales_order_information.sales_order_id = sales_order_add_items.sales_order_id GROUP BY customer_name;";
                                $results = mysqli_query($connection, $query);


                                while ($sales = mysqli_fetch_assoc($results)) {
                                    $sales_order_list .= "<tr class='tb_1'>";
                                    $sales_order_list .= "<td>{$sales['sales_order_id']}</td>";
                                    $sales_order_list .= "<td>{$sales['shipping_country']}</td>";
                                    $sales_order_list .= "<td>{$sales['created_time']}</td>";
                                    $sales_order_list .= "<td>{$sales['item_delivery_date']}</td>";
                                    $sales_order_list .= "<td>{$sales['No_of_Records']}</td>";
                                    $sales_order_list .= "<td class='text-center'><a class='btn btn-sm bg-teal' name='submit' type='submit' href=\"sales_order_view.php?sales_order_id={$sales['sales_order_id']}\"><i class='fas fa-eye'></i> </a></td>";
                                    $sales_order_list .= "</tr>";
                                }

                                echo $sales_order_list;
                            ?>
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
</script>

<style>
.table.dataTable tbody tr {
    background-color: #212529;
}

#example1_length {
    color: #ced4da;
}

.dataTables_wrapper .dataTables_filter {
    color: #ced4da;
}

.paginate_button {
    border-radius: 12px;
    font-size: 12px;
}

[type='search'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
}

.tbody_1 {
    font-family: 'Bree Serif', serif;

}
</style>

<?php include_once('../includes/footer.php'); ?>