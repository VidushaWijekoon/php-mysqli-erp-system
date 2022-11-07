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

if($role_id = 1 && $department == 11 || $role_id == 4 && $department ==22) {

    $query = "SELECT * FROM part_stock";
    $query_run = mysqli_query($connection, $query);
    if(mysqli_num_rows($query_run) > 0){
        foreach($query_run as $rows){

            
        } }
            
?>

<div class="container-fluid">
    <div class="row mx-3">
        <div class="col-4 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Rack 01</h4>
                </div>
                <div class="card-body mx-auto justify-content-center">
                    <?php for ($column='A'; $column!='U'; $column++){ 
                        for($row=1; $row<=5; $row++){ ?>

                    <a class="btn btn-app bg-white">
                        <i class="fas fa-inbox"></i>
                        <?= $column . $row ?>
                    </a>
                    <?php } }  ?>
                </div>
            </div>
        </div>
        <div class="col-4 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Rack 02</h4>
                </div>
                <div class="card-body mx-auto justify-content-center">
                    <?php for ($column='A'; $column!='U'; $column++){ 
                        for($row=1; $row<=5; $row++){ ?>

                    <a class="btn btn-app bg-white">
                        <i class="fas fa-inbox"></i>
                        <?= $column . $row ?>
                    </a>
                    <?php } }  ?>
                </div>
            </div>
        </div>
        <div class="col-4 mt-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Rack 03</h4>
                </div>
                <div class="card-body mx-auto justify-content-center">
                    <?php for ($column='A'; $column!='U'; $column++){ 
                        for($row=1; $row<=5; $row++){ ?>

                    <a class="btn btn-app bg-white">
                        <i class="fas fa-inbox"></i>
                        <?= $column . $row ?>
                    </a>
                    <?php } }  ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php    include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>