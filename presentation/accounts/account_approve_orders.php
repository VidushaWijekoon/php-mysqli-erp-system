<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col bg-gray" style="height: 50px;">
            <form class="d-flex mt-1">
                <input class="form-control w-25" type="search" placeholder="Search Sales Order" aria-label="Search">
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card bg-white">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="mt-1">All Sales Orders</h6>
                    <button class="btn btn-xs btn-primary"><i class="fa-solid fa-plus mx-2"></i>New</button>
                </div>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>
</div>

<style>
[type="search"] {
    height: 32px;
    margin-top: 4px;
    font-size: 10px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #fff !important;
    text-transform: capitalize;
}
</style>

<?php include_once('../includes/footer.php'); ?>