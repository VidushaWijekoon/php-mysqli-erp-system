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

    if(isset($_POST['search'])){
        $search_inventory_id = $_POST['search'];

        $search_query = "SELECT * FROM motherboard_check WHERE inventory_id = {$search_inventory_id}";
        $result = mysqli_query($connection, $search_query);
            
        if(mysqli_num_rows($result) > 0){
            foreach($result as $sr){
                
            $motherboard_check_inventory_id = $sr['inventory_id'];
            $sales_order_id = $sr['sales_order_id'];
            $insert_query = "INSERT INTO motherboard_dep(inventory_id, sales_order_id, created_by, received_date) 
                        VALUES ('$motherboard_check_inventory_id', '$sales_order_id', '$username', 'CURRENT_TIMESTAMP')";
            echo $insert_query;
            $query = mysqli_query($connection, $insert_query);

            $exists_check = "SELECT * FROM motherboard_dep";
            $query_check = mysqli_query($connection, $exists_check);
            foreach($query_check as $ex){
                $ex_inventory_id = $ex['inventory_id'];
                if($ex_inventory_id == $motherboard_check_inventory_id){
                    echo '<span class="badge badge-lg badge-danger w-100 text-white px-2 received_qty">This Item Already Scanned</span>';
                    }
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

                                        $select_to_result = "SELECT *, COUNT(motherboard_dep.inventory_id) AS Total_received
                                                            FROM motherboard_dep
                                                            INNER JOIN warehouse_information_sheet ON motherboard_dep.inventory_id = warehouse_information_sheet.inventory_id";
                                        $x = mysqli_query($connection, $select_to_result);
                                        $i = 0;
                                            foreach($x as $d){   
                                                $i++; 
                                                $received_qty = $d['Total_received'];                                                 
                                                echo '<span class="badge badge-lg badge-info text-white px-2 received_qty">Receiving Total: '.$received_qty.'</span>';

                                    ?>

                                    <tr class="text-uppercase">
                                        <td><?= $i ?></td>
                                        <td><?= $d['sales_order_id'] ?></td>
                                        <td><?= $d['inventory_id'] ?></td>
                                        <td><?= $d['brand'] ?></td>
                                        <td><?= $d['processor'] ?></td>
                                        <td><?= $d['core'] ?></td>
                                        <td><?= $d['generation'] ?></td>
                                        <td><?= $d['model'] ?></td>
                                        <td><?= $d['received_date'] ?></td>

                                    </tr>
                                    <?php }?>
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