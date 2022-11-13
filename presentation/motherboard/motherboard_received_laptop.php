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

    if(isset($_POST['search'])){
        $inventory_id = $_POST['search'];

        $search_query = "SELECT * FROM motherboard_dep WHERE inventory_id = {$inventory_id}";
        $result = mysqli_query($connection, $search_query);

        $exist_id = 0;
        foreach($result as $a){
            if(empty($a)){
                $exist_id = 0;
            }else{
                $exist_id = 1;
            };
        }

        $query = "SELECT * FROM motherboard_check WHERE sales_order_id = $sales_order_id AND inventory_id = $inventory_id";
        $query_run = mysqli_query($connection, $query); 
        foreach($query_run as $data){
            if(empty($data)){
               
            }else{
                if($exist_id == 0){
                $query_insert = "INSERT INTO motherboard_dep(inventory_id, sales_order_id,  created_by, received_date, status) 
                            VALUES ('$inventory_id', '$sales_order_id', '$username', CURRENT_TIMESTAMP, 0)";
                $production = mysqli_query($connection, $query_insert);
            }else{
                echo '<span class="badge badge-lg badge-danger w-100 text-white px-2 received_qty">This Item Already Scanned</span>';
            }
        }
    }         
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./motherboard_dashboard.php">
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
                                <tbody>

                                    <?php                                    

                                        $select_to_result = "SELECT * FROM motherboard_dep
                                                            INNER JOIN warehouse_information_sheet ON motherboard_dep.inventory_id = warehouse_information_sheet.inventory_id
                                                            WHERE  motherboard_dep.sales_order_id = $sales_order_id
                                                            ORDER BY received_date DESC";
                                        $x = mysqli_query($connection, $select_to_result);


                                        ///////// COUNT ///////// 
                                        $query_2 = "SELECT *, COUNT(motherboard_id) AS received FROM `motherboard_dep` WHERE sales_order_id = $sales_order_id;";
                                        $query_result2 = mysqli_query($connection,$query_2);
                                        $received_qty =0;
                                            
                                        foreach($query_result2 as $a){
                                            $received_qty = $a['received'];
                                            echo '<span class="badge badge-lg badge-info text-white px-2 received_qty">Receiving Total: '.$received_qty.'</span>';
                                        }
                                        
                                        $i = 0;
                                        if(mysqli_num_rows($x)){
                                            foreach($x as $d){
                                                $i++;
                                            
                                    ?>

                                    <tr class="text-uppercase">
                                        <td><?= $i ?></td>
                                        <td><?= $a['sales_order_id'] ?></td>
                                        <td><?= $d['inventory_id'] ?></td>
                                        <td><?= $d['brand'] ?></td>
                                        <td><?= $d['processor'] ?></td>
                                        <td><?= $d['core'] ?></td>
                                        <td><?= $d['generation'] ?></td>
                                        <td><?= $d['model'] ?></td>
                                        <td><?= $d['received_date'] ?></td>

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

<?php include_once('../includes/footer.php'); ?>