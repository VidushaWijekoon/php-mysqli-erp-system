<?php 
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

if($role_id == 1 && $department == 11 || $role_id ==  4 && $department == 1){
        
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

        $query = "SELECT model,brand,core,generation,processor,device FROM warehouse_information_sheet WHERE send_to_production = 1 AND inventory_id = {$inventory_id}";
        $query_run = mysqli_query($connection, $query); 
        foreach($query_run as $data){
            if(empty($data)){
               
            }else{
                if($exist_id == 0){
                 $query_insert = "INSERT INTO production(inventory_id, sales_order_id,  created_by, received_date) 
                            VALUES ('$inventory_id', '$sales_order_id', '$username', CURRENT_TIMESTAMP)";
            $production = mysqli_query($connection, $query_insert);
            }else{
                echo "<div class='exists'>It's Existing Item</div>";
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
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <?php if (!empty($errors)) { display_errors($errors); } ?>
                <div class="row mx-2">
                    <div class="col-md-3">
                        <form action="" method="POST">
                            <fieldset class="mt-2">
                                <legend>QR Scan</legend>

                                <div class="input-group mb-2 mt-2">
                                    <input type="search" id="search" name="search" required value="<?php if (isset($_POST['search'])) {
                                                                                        echo $_POST['search'];
                                                                                    } ?>" placeholder="Search QR">
                                    <!-- <button type="submit" class="btn btn-primary">Search</button> -->
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
                                        <th>Brand</th>
                                        <th>Processor</th>
                                        <th>Core</th>
                                        <th>Genaration</th>
                                        <th>Model</th>
                                        <th>QTY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-uppercase">
                                        <td>#</td>
                                        <td>1000</td>
                                        <td>Dell</td>
                                        <td>Intel </td>
                                        <td>i7 </td>
                                        <td>8th </td>
                                        <td>E5530</td>
                                        <td>3</td>
                                    </tr>
                                    <tr class="text-uppercase">
                                        <td>#</td>
                                        <td>1000</td>
                                        <td>Dell</td>
                                        <td>Intel </td>
                                        <td>i5 </td>
                                        <td>8th </td>
                                        <td>E5530</td>
                                        <td>6</td>
                                    </tr>
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