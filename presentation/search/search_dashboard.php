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

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-industry" aria-hidden="true"></i> Search Dashboard </h3>
    </div>

</div>


<div class="row">

    <div class="col-12 mt-3">
        <button type="button" class="btn btn-info mx-2"><i class="fa fa-plus"></i><a href="./sales_orders.php"
                class="text-white"><i class="" aria-hidden="true"></i> Search Laptop</a></button>

        <button type="button" class="btn btn-secondary mx-2"><i class="fa fa-plus"></i><a href="sales_orders.php"
                class="text-white"><i class="" aria-hidden="true"></i> Search SO</a></button>

    </div>
</div>






<?php include_once('../includes/footer.php'); ?>