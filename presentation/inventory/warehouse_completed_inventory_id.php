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

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 10 && $department == 2) ||  ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18)){
 
$sales_order_id = $_GET['sales_order_id'];

?>

<?php if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18)) { ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } if ($role_id == 10 && $department == 2) { ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_member_sales_order.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<?php } ?>

<div class="row">
    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 mx-auto justify-content-center mt-5">
        <div class="card ">

            <div class="card-header d-flex bg-secondary">
                <div class="mr-auto">
                    <div class="text-center mx-auto mt-1 text-uppercase" style="font-size: 14px;">
                        Completed Inventory ID's
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="input-group">
                        <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                        <input type="search" name="search"
                            value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control"
                            placeholder="Search data">
                    </div>
                </form>
            </div>

            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SO Number</th>
                            <th>Inventory ID</th>
                            <th>Model</th>
                            <th>Released Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php 

                            if (isset($_POST['search'])) {
                                $filtervalues = $_POST['search'];
                        
                                $query = "SELECT * FROM warehouse_information_sheet 
                                            WHERE sales_order_id = {$sales_order_id} AND CONCAT(inventory_id) LIKE '%$filtervalues%'
                                            ORDER BY send_time_to_production DESC";
                                $results = mysqli_query($connection, $query);

                                if(mysqli_num_rows($results) > 0){
                                    foreach($results as $x){
                        ?>
                        <tr>
                            <td><?php echo $x['sales_order_id'] ?></td>
                            <td><?php echo $x['inventory_id'] ?></td>
                            <td><?php echo $x['model'] ?></td>
                            <td><?php echo $x['send_time_to_production'] ?></td>
                        </tr>
                        <?php } } }else { 
                                                    
                                $query = "SELECT * FROM warehouse_information_sheet WHERE sales_order_id = {$sales_order_id} ORDER BY send_time_to_production DESC";
                                $results = mysqli_query($connection, $query);

                                if(mysqli_num_rows($results) > 0){
                                    foreach($results as $x){    
                        ?>

                        <tr>
                            <td><?php echo $x['sales_order_id'] ?></td>
                            <td><?php echo $x['inventory_id'] ?></td>
                            <td><?php echo $x['model'] ?></td>
                            <td><?php echo $x['send_time_to_production'] ?></td>
                        </tr>
                        <?php } } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>