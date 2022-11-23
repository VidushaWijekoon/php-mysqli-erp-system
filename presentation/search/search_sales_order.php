<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
                              
?>

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-3">
            <div class="card mb-2">
                <div class="d-flex">
                    <div class="col col-md-6 col-lg-6">
                        <fieldset class="mt-2 mb-3">
                            <legend>Scan Sales Order</legend>
                            <form action="" method="GET">
                                <div class="input-group">
                                    <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
                                    <input type="number" min="000001" name="search"
                                        value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>"
                                        class="form-control" placeholder="Search data" width="50%">
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once('../includes/footer.php'); ?>