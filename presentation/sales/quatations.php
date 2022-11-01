<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <div class="card-header bg-secondary">
                    <h4 class="text-uppercase m-0 p-0">Quotation List</h4>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Created Date</th>
                                <th>Delivery Date</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">
                            <?php 
                                // getting the list of users
                                $query = "SELECT * FROM sales_quatation
                                        INNER JOIN sales_quatation_items ON sales_quatation.created_date = sales_quatation_items.created_date 
                                        GROUP BY sales_quatation.quatation_id;";
                                $results = mysqli_query($connection, $query);

                                if (mysqli_fetch_assoc($results)) {
                                    foreach ($results as $items) {
                            ?>
                            <tr>
                                <td><?php echo $items['quatation_id']; ?></td>
                                <td><?php echo $items['customer_name']; ?></td>
                                <td><?php echo $items['created_date']; ?></td>
                                <td><?php echo $items['item_delivery_date']; ?></td>
                                <td class='text-center'>
                                    <?php 
                                        echo "<a class='btn btn-xs btn-secondary mx-1' href=\"quatation_view.php?quatation_id={$items['quatation_id']}\"><i class='fa-solid fa-eye'></i> </a>";
                                        echo "<a class='btn btn-xs btn-success mx-1' href=\"\"><i class='fa-solid fa-download'></i> </a>";
                                        echo "<a class='btn btn-xs btn-primary mx-1' href=\"\"><i class='fa-solid fa-envelope'></i> </a>";
                                        echo "<a class='btn btn-xs btn-danger mx-1' href=\"\"><i class='fa-solid fa-trash-can'></i> </a>";
                                    ?>
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
 
</style>


<?php include_once('../includes/footer.php'); ?>