<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Al Sakb | Computers</title>
<link rel="icon" type="image/x-icon" href="../../static/dist/img/alsakb logo.png">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../static/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../../static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="../../static/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../../static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../../static/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../../static/plugins/summernote/summernote-bs4.min.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Customer CSS -->
<link rel="stylesheet" href="../../static/dist/css/style.css">

<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');
 
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1)){

$sales_order_id = '';
$model = '';

if (isset($_GET['sales_order_id'])) {
    $sales_order_id = mysqli_real_escape_string($connection, $_GET['sales_order_id']);
    $model = mysqli_real_escape_string($connection, $_GET['model']);
    $brand = mysqli_real_escape_string($connection, $_GET['brand']);
    $device = mysqli_real_escape_string($connection, $_GET['device']);
    $core = mysqli_real_escape_string($connection, $_GET['core']);
    $processor = mysqli_real_escape_string($connection, $_GET['processor']);
    $generation = mysqli_real_escape_string($connection, $_GET['generation']);
    $status = mysqli_real_escape_string($connection, $_GET['status']);
    $emp_id = mysqli_real_escape_string($connection, $_GET['emp_id']);
    $assigned_qty = mysqli_real_escape_string($connection, $_GET['qty']);


}


$sql = "SELECT  `item_quantity` FROM `sales_order_add_items` WHERE `sales_order_id` ={$sales_order_id} AND `item_model`='$model';";
$row = mysqli_fetch_assoc($connection->query($sql) );
$order_qty = $row['item_quantity'];

$query6 = "SELECT SUM(`tech_assign_qty`) as exis_qty FROM `prod_technician_assign_info` WHERE 
`sales_order_id` = '{$sales_order_id}' AND
`model`='{$model}' AND
`core`='{$core}' AND
`generation`='{$generation}' AND
`processor`='{$processor}' AND
`brand`='{$brand}' AND
`device_type`='{$device}';";
$query_run = mysqli_query($connection, $query6);
$exixting_qty = 0;
if(empty($query_run)){
}else{
foreach($query_run as $data){
    $exixting_qty = $data['exis_qty'];
}
}
 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-5" style="background: #3f4156;">
                <div class="card-header bg-secondary d-flex">
                    <h4 class="card-title text-uppercase">Sale Order <?php echo $sales_order_id .' &nbsp '.  $model;?>
                    </h4>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-uppercase">
                            <tr>
                                <th>Technician</th>
                                <th>Model</th>
                                <th>Order Quantity</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="tbody_1">

                            <form action="" method="post">
                                <tr>
                                    <td>

                                        <select name="emp_id" style="border-radius: 5px;" required>
                                            <option selected>--Select Technician--</option>
                                            <?php
                                                    $query = "SELECT epf, first_name FROM users WHERE department = 1 ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($worker = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                    ?>
                                            <option value="<?php echo $worker["epf"]; ?>">
                                                <?php echo strtoupper($worker["epf"] . " - " . ($worker["first_name"])); ?>
                                            </option>
                                            <?php
                                                    endwhile;
                                                    ?>
                                        </select>
                                    </td>

                                    <td class="text-uppercase"><?php echo $model; ?></td>
                                    <td class="text-uppercase"><?php echo $order_qty; ?></td>
                                    <td>
                                        <!-- <input type="number" class="form-control" placeholder="Quantity" name="quantity"> -->
                                        <input type="number" class="form-control" placeholder="Please Enter QTY"
                                            name="qty">
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="justify-content-between mx-auto mb-3 text-center">
                    <a href="../production/production_team_leader_summery.php?sales_order_id=<?php echo $sales_order_id?>"
                        class="btn btn-secondary btn-sm">Close</a>
                    <input class="btn btn-success btn-sm" type="submit" name="submit" value="Save Changes">
                    <?php
                        if(isset($_POST['submit'])){
                           
                                if($assigned_qty >= $_POST['qty']){
                                    $new_qty = $assigned_qty ;
                                    $new_qty -= $_POST['qty'] ;
                                 

                            $query = "INSERT INTO prod_technician_assign_info(tech_id, emp_id, sales_order_id, model, tech_assign_qty,core,generation,processor,brand,device_type) 
                            VALUES (null,'{$_POST['emp_id']}','{$sales_order_id}','{$model}','{$_POST['qty']}','{$core}','{$generation}','{$processor}','{$brand}','{$device}')";
                            $result  = mysqli_query($connection, $query);
                            $query = "UPDATE prod_technician_assign_info SET tech_assign_qty='$new_qty' WHERE emp_id ='$emp_id'";
                                    echo $query;
                          
                            $result  = mysqli_query($connection, $query);


                            header("location: ./production_team_leader_summery.php?sales_order_id=".$sales_order_id);?>
                </div>
                <?php 
                                }else{
                                    echo "<div class='equal mb-3 mt-3 mx-auto text-uppercase text-dark bg-danger'>can not assign more than order quantity</div>";
                                }
                            
                        }
                    ?>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
setTimeout(function() {
    if ($('.equal').length > 0) {
        $('.equal').remove();
    }
}, 10000)
</script>

<style>
body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Bree Serif', serif;
    background: #343a40;
}

.user_card {
    width: 500px;
    margin-top: auto;
    margin-bottom: auto;
    background: #3f4156;
    position: relative;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding: 40px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 5px;

}

.form_container {
    margin-top: 20px;
}

#form-title {
    color: #fff;
    margin-top: 10px;
}

.login_btn {
    width: 100%;
    background: #5a818e !important;
    color: white !important;
}

.login_btn:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

.login_container {
    padding: 0 2rem;
}

.input-group-text {
    background: #575a7a !important;
    color: white !important;
    border: 0 !important;
    border-radius: 0.25rem 0 0 0.25rem !important;
}

.input_user,
.input_pass:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

#messages {
    background-color: grey;
    color: #fff;
    padding: 10px;
    margin-top: 10px;
}

.error {
    background: #bf7979;
    border-radius: 5px;
    padding: 8px;
    margin: 0;
}

[type='number'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    width: 60%;
}

.equal {
    padding: 5px 25px;
    border: 5px;
    border-radius: 10px;
}

.btn {
    font-size: 14px;
    text-transform: uppercase;
}
</style>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>