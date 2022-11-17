<?php
ob_start(); 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('../../dataAccess/403.php');

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];

if($role_id == 1 && $department == 11 || $role_id == 2 && $department == 18 || $role_id == 11 && $department == 20){
 
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="#">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header bg-secondary text-uppercase">
                    <i class="fa-solid fa-hand-holding-medical bg-warning fa-2x p-2"></i>
                    Issue Form
                </div>
                <form action="" method="POST">
                    <div class="row m-1">
                        <div class="col-md-10 mx-auto">
                            <fieldset class="mt-2 mb-2">
                                <legend>Part Information</legend>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Device Type</th>
                                            <th>Inventory ID</th>
                                            <th style="width: 150px;">QTY</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Keyboard</td>
                                            <td><input type="number"></td>
                                            <td><input type="number"></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
fieldset,
legend {
    all: revert;
    font-size: 12px;
}

textarea {
    text-transform: uppercase;
}

select,
[type="number"] {
    width: 100%;
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
}

.custom-select {
    font-size: 12px;
}

#exampleFormControlTextarea1 {
    font-size: 12px;
}
</style>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>