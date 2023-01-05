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
                <div class="card-header d-flex bg-secondary">
                    <div class="mr-auto">
                        <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                            Quotations
                        </div>
                    </div>
                    <form action="" method="GET">
                        <div class="input-group">
                            <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                            <input type="search" name="search"
                                value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control"
                                placeholder="Search data">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Quatation ID</th>
                                <th>Customer Name</th>
                                <th>Created Date</th>
                                <th>Feedback</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $query = "SELECT * FROM sales_quatation_customer_information INNER JOIN sales_quatation_items 
                                        ON sales_quatation_customer_information.quatation_id = sales_quatation_items.quatation_id
                                        GROUP BY sales_quatation_items.quatation_id";

                                        $results = mysqli_query($connection, $query);
                                        foreach ($results as $items) {
                                            $item_status = $items['status'];
                            ?>
                            <tr>
                                <td><?php echo $items['quatation_id']; ?></td>
                                <td><?php echo $items['customer_name']; ?></td>
                                <td><?php echo $items['created_date']; ?></td>
                                <td>
                                    <?php if($item_status == 0) {?>
                                    <span class="badge badge-lg badge-primary text-white p-1 px-3">Pending</span>
                                    <?php }if($item_status == 2) {?>
                                    <span class="badge badge-lg badge-danger text-white p-1 px-3">Rejected</span>
                                    <?php }if($item_status == 1) {?>
                                    <span class="badge badge-lg badge-success text-white p-1 px-3">Accepted</span>
                                    <?php } ?>
                                </td>
                                <td class='text-center'>
                                    <?php 
                                        echo "<a class='btn btn-xs btn-secondary mx-1' href=\"quatation_view.php?quatation_id={$items['quatation_id']}\"><i class='fa-solid fa-eye'></i> </a>";
                                        echo "<a class='btn btn-xs btn-success mx-1' href=\"invoice_pdf.php?quatation_id={$items['quatation_id']}\"><i class='fa-solid fa-download'></i> </a>";
                                        echo "<a class='btn btn-xs btn-danger mx-1' href=\"\"><i class='fa-solid fa-trash-can'></i> </a>";
                                    ?>
                                </td>
                            </tr>

                            <?php } ?>


                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('../includes/footer.php'); ?>