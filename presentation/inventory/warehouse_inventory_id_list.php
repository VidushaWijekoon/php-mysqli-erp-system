<?php 
ob_start();
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

if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18) || ($role_id == 10 && $department == 2)){

$brand = $_GET['brand'];
$model = $_GET['model'];                            

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./warehouse_dashboard.php">
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
                            <?php echo $brand . "-" . $model ?>
                            <?php if(isset($_GET['search'])){echo $brand . "-" . $model; } ?>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="input-group">
                            <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                            <input type="search" name="search"
                                value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>"
                                class="form-control" placeholder="Search data">
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Model</th>
                                <th>Inventroy ID</th>
                                <th>Status</th>
                                <th>Location</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $brand;
                            $model;
                            
                                if(isset($_POST['search'])){
                                    $filtervalues = $_POST['search'];
                                        $query = "SELECT * FROM warehouse_information_sheet 
                                                WHERE send_to_production = 0 AND CONCAT(inventory_id, brand = '$brand' AND model = '$model') LIKE '%$filtervalues%' ";                                
                                        $query_run = mysqli_query($connection, $query);

                                        foreach ($query_run as $items) {
                            ?>

                            <tr class="text-uppercase">
                                <td>#</td>
                                <td><?php echo $items['model'] ?></td>
                                <td><?php echo $items['inventory_id'] ?></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php echo $items['location']."-".$items['generation']."-".$items['model'] ?>
                                </td>
                                <td><?php echo $items['create_date']; ?></td>
                            </tr>
                            <?php } } else{
                                
                                $query = "SELECT * FROM warehouse_information_sheet 
                                        WHERE brand = '$brand' AND model = '$model' AND send_to_production = 0 ";                                
                                $query_run = mysqli_query($connection, $query);

                                foreach ($query_run as $items) {
                            ?>

                            <tr class="text-uppercase">
                                <td>#</td>
                                <td><?php echo $items['model'] ?></td>
                                <td><?php echo $items['inventory_id'] ?></td>
                                <td>&nbsp;</td>
                                <td>
                                    <?php echo $items['location']."-".$items['generation']."-".$items['model'] ?>
                                </td>
                                <td><?php echo $items['create_date']; ?></td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>