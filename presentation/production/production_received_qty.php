<?php 
ob_start();
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
$username = $_SESSION['username'];
$sales_order_id = $_GET['sales_order_id'];
$order_qty=$_GET['qty'];
 
if(($role_id == 1 && $department == 11) || ($role_id == 2 && $department == 18) || ($role_id == 4 && $department == 1)){
        
    if (isset($_POST['search'])) {
        $inventory_id = $_POST['search'];

        $query_6 = "SELECT `inventory_id`  FROM `production` WHERE inventory_id={$inventory_id}";
        $query_recheck = mysqli_query($connection, $query_6); 
        $exist_id = 0;
        foreach($query_recheck as $a){
            if(empty($a)){
                $exist_id = 0;
            }else{
                $exist_id = 1;
            };
        }

        $query = "SELECT model,brand,core,generation,processor,device FROM warehouse_information_sheet WHERE send_to_production = 1 AND sales_order_id = {$sales_order_id} AND inventory_id = {$inventory_id}";
        $query_run = mysqli_query($connection, $query); 
        foreach($query_run as $data){
            if(empty($data)){
               
            }else{
                if($exist_id == 0){
                 $query_insert = "INSERT INTO production(inventory_id, sales_order_id,  created_by, received_date) 
                            VALUES ('$inventory_id', '$sales_order_id', '$username', CURRENT_TIMESTAMP)";
            $production = mysqli_query($connection, $query_insert);
            }else{
                echo '<span class="badge badge-lg badge-danger w-100 text-white px-2 received_qty">This Item Already Scanned</span>';
            }
        }
    }   
             
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./production_team_leader_dashboard.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="row mx-2">
                    <div class="col-md-3">
                        <form action="" method="POST">
                            <fieldset class="mt-2">
                                <legend>QR Scan</legend>

                                <div class="input-group mb-2 mt-2">
                                    <input type="search" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="col col-lg-12 mb-3">
                        <fieldset>
                            <legend>Production Team Members Daily View</legend>

                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>S/O ID</th>
                                        <th>Inventory ID</th>
                                        <th>Brand</th>
                                        <th>Processor</th>
                                        <th>Core</th>
                                        <th>Genaration</th>
                                        <th>Model</th>
                                        <th>Received Date And Time</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody_1">

                                    <?php 
                                    
                                            $query = "SELECT * FROM `production`
                                                        LEFT JOIN warehouse_information_sheet ON warehouse_information_sheet.inventory_id = production.inventory_id 
                                                        WHERE production.sales_order_id = $sales_order_id 
                                                        ORDER BY received_date DESC";
                                            $result = mysqli_query($connection, $query);
                                            // ////////////////////////////////////////////////
                                            // //retrive order qty 
                                            // $query_1 = "SELECT SUM(item_quantity) AS item_quantity FROM `sales_order_add_items` WHERE sales_order_id=$sales_order_id;";
                                            // $query_result = mysqli_query($connection,$query_1);
                                            // $orderd_qty =0;
                                            // foreach($query_result as $a){
                                            //     $orderd_qty = $a['item_quantity'];
                                            // }
                                            // ///////////////////////////////////////////////////
                                            $query_2 = "SELECT COUNT(production_id) AS production_id FROM `production` WHERE sales_order_id=$sales_order_id;";
                                            $query_result2 = mysqli_query($connection,$query_2);
                                            $received_qty =0;
                                            foreach($query_result2 as $a){
                                                $received_qty = $a['production_id'];
                                                if($received_qty != $order_qty){
                                                echo '<a class="badge badge-lg badge-info text-white p-2 mx-2 received_qty">Receiving Total: '.$received_qty.'</a>';
                                                }
                                                if($received_qty == $order_qty){
                                                    echo '<a class="badge badge-lg badge-success text-white p-2 received_qty" href="./production_team_leader_dashboard.php" >Receiving Total: '.$received_qty.' Task Completed</a>';
                                                    // header("location: ./production_team_leader_dashboard.php");
                                                }
                                            }
                                            ////////////////////////////////////////////////////
                                            
                                            $i = 0;
                                            if (mysqli_fetch_assoc($result)) {
                                                foreach ($result as $items) {
                                                    $i++;
                                                     
                                        ?>

                                    <tr class="text-uppercase">
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $items['sales_order_id'] ?></td>
                                        <td><?php echo $items['inventory_id'] ?></td>
                                        <td><?php echo $items['brand'] ?></td>
                                        <td><?php echo $items['processor'] ?></td>
                                        <td><?php echo $items['core'] ?></td>
                                        <td><?php echo $items['generation'] ?></td>
                                        <td><?php echo $items['model'] ?></td>
                                        <td><?php echo $items['received_date'] ?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
let searchbar = document.querySelector('input[name="search"]');
searchbar.focus();
search.value = '';
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>