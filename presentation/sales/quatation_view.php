<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');
include_once('sales_function.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

$customer_name = null;
$customer_address = null;
$company_name = null;
$country = null;
$shipping_state = null;
$zip_code = null;
$uae_number = null;
$other_number = null;
$created_date = null;


if (isset($_GET['quatation_id'])) {
    $quatation_id = mysqli_real_escape_string($connection, $_GET['quatation_id']);
    
    $query = "SELECT * FROM sales_quatation_customer_information WHERE quatation_id={$quatation_id} ORDER BY quatation_id";
    $result_set = mysqli_query($connection, $query);
    foreach($result_set as $x){
        $customer_name = $x['customer_name'];
        $customer_address = $x['customer_address'];
        $company_name = $x['company_name'];
        $country = $x['country'];
        $shipping_state = $x['shipping_state'];
        $zip_code = $x['zip_code'];
        $uae_number = $x['uae_number'];
        $other_number = $x['other_number'];
        $created_date = $x['created_date'];
        $status = $x['status'];
    }
}

if(isset($_POST['reject'])){

    $reject_query = "UPDATE sales_quatation_customer_information SET status = '2' WHERE quatation_id = {$quatation_id} LIMIT 1";
    $reject_query_run = mysqli_query($connection, $reject_query);

    header("Location: quatations.php");

}

if(isset($_POST['accept'])){

    $accept_query = "UPDATE sales_quatation_customer_information SET status = '1' WHERE quatation_id = {$quatation_id} LIMIT 1";
    $accept_query_run = mysqli_query($connection, $accept_query);

    header("Location: quatations.php");

} 
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./quatations.php">
            <i class="fa-regular fa-circle-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<?php if($status == 2) {?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $_GET['quatation_id']; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $company_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_address . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $zip_code . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Purchased Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $created_date . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/rejected_new.png" alt="" style="width: 70%;">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <?php dataItemsRetrive(); ?>

                        <div class="d-flex float-end justify-content-end">
                            <a href="./quatations.php" class="btn bg-gradient-warning mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Cancel</span></a>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } if($status == 1) {?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $_GET['quatation_id']; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $company_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_address . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $zip_code . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Purchased Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $created_date . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/approved.png" alt="" style="width: 50%">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <?php dataItemsRetrive(); ?>

                        <div class="d-flex float-end justify-content-end">
                            <a href="./quatations.php" class="btn btn-sm btn-warning">Cancel</a>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Reject</span></button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } if($status == 0) {?>
<div class="container-fluid">
    <form method="POST">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <p class="text-uppercase m-0 p-0">Sales Order
                            <?php echo $_GET['quatation_id']; ?></p>
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col col-lg-6 col-md-8 col-sm-8">
                                <fieldset class="mt-2">
                                    <legend>Customer Details</legend>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $company_name . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Country</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $customer_address . '"'; ?>
                                                readonly class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $zip_code . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">UAE Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $uae_number . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Purchased Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" <?php echo 'value="' . $created_date . '"'; ?> readonly
                                                class="form-control" style="background-color: black;">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col col-lg-6 col-md-8 col-sm-8 text-center">
                                <img src="../../static/dist/img/waiting.png" alt="" class="mt-4" style="width: 70%">
                            </div>

                        </div>
                    </div>
                    <div class="col col-lg-12 mb-3">

                        <?php dataItemsRetrive(); ?>


                        <div class="d-flex float-end justify-content-end">
                            <a href="./quatations.php" class="btn bg-gradient-warning mx-2 text-white">
                                <i class="fa fa-arrow-left"></i><span class="mx-1">Cancel</span></a>
                            <button type="submit" name="reject"
                                onclick="return confirm('Are you Sure Want to Reject this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-danger mx-2 text-white">
                                <i class="fa fa-xmark"></i><span class="mx-1">Reject</span>
                            </button>
                            <button type="submit" name="accept"
                                onclick="return confirm('Are you Sure Want to Accept this Quatation <?php echo $quatation_id ?>');"
                                class="btn bg-gradient-success mx-2 text-white">
                                <i class="fa fa-check"></i><span class="mx-1">Accept</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php } ?>
<style>
input[type="text"],
[type="number"],
[type="email"],
[type='date'] {
    width: 100%;
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    color: #ffffff !important;
}

.img {
    background-image: url('../../static/dist/img/rejected.png');
    background-repeat: no-repeat;
}
</style>

<?php include_once('../includes/footer.php'); ?>