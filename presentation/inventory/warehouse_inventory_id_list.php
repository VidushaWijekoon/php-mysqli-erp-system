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

if($role_id == 1 && $department == 11 || $role_id == 4 && $department == 2 || $role_id == 2 && $department == 18){

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
                <div class="card-header bg-secondary">
                    <p class="text-uppercase m-0 p-0"><?php echo $brand . "-" . $model ?></p>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
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
                        <tbody class="tbody_1">
                            <?php                                

                                $query = "SELECT * FROM warehouse_information_sheet WHERE brand = '$brand' AND model = '$model' AND send_to_production = 0";                                
                                $query_run = mysqli_query($connection, $query);

                                if($rowcount = mysqli_fetch_assoc($query_run)) {
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

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>