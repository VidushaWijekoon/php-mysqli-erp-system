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

$customer_id = $_GET['customer_id'];

$billing_attention = null;
$billing_country = null;
$billing_address_1 = null;
$billing_address_2 = null;
$billing_city = null;
$billing_state = null;
$billing_zip_code = null;
$billing_phone = null;

$shipping_attention = null;
$shipping_country = null;
$shipping_address_1 = null;
$shipping_address_2 = null;
$shipping_city = null;
$shipping_state = null;
$shipping_zip_code = null;
$shipping_phone = null;

$query_1 = "SELECT * FROM sales_customer_information WHERE customer_id = '$customer_id'";
$query_1_run = mysqli_query($connection, $query_1);
foreach($query_1_run as $x){
    $first_name = $x['first_name'];
    $last_name = $x['last_name'];
    $country = $x['country'];
    $billing_attention = $x['billing_attention'];
    $billing_country = $x['billing_country_region'];
    $billing_address_1 = $x['billing_street1'];
    $billing_address_2 = $x['billing_street2'];
    $billing_city = $x['billing_city'];
    $billing_state = $x['billing_state'];
    $billing_zip_code = $x['billing_zip_code'];
    $billing_phone = $x['billing_customer_phone_number'];
    $shipping_attention = $x['shipping_attention'];
    $shipping_country = $x['shipping_country_region'];
    $shipping_address_1 = $x['shipping_street1'];
    $shipping_address_2 = $x['shipping_street2'];
    $shipping_city = $x['shipping_city'];
    $shipping_state = $x['shipping_state'];
    $shipping_zip_code = $x['shipping_zip_code'];
    $shipping_phone = $x['shipping_customer_phone_number'];
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <!-- general form elements -->
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs nav-pills nav-stacked" id="tab1" role="tablist">
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                aria-selected="true" style="color: #fff;">Customer Details</a>
                        </li>
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                aria-selected="false" style="color: #fff;">Quatations</a>
                        </li>

                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-tab4" role="tab" aria-controls="custom-tabs-four-tab4"
                                aria-selected="false" style="color: #fff;">Sales Orders</a>
                        </li>
                        <li class="nav-item text-center" style="width: 150px;">
                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                href="#custom-tabs-four-tab5" role="tab" aria-controls="custom-tabs-four-tab5"
                                aria-selected="false" style="color: #fff;">Poplular Models</a>
                        </li>

                    </ul>
                </div>
                <div class=" card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- ============================================================== -->
                        <!-- Customer Details  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane active" id="custom-tabs-four-home" role="tabpanel"
                            aria-labelledby="custom-tabs-four-home-tab">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Customer
                                                        </label>
                                                        <div class="col-sm-9 d-flex">
                                                            <input type="text" class="form-control w-50"
                                                                placeholder="First Name" readonly
                                                                value="<?php echo $first_name ?>">
                                                            <input type="text" class="form-control w-50 mx-2" readonly
                                                                value="<?php echo $last_name ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Company
                                                        </label>
                                                        <div class="col-sm-9 d-flex">
                                                            <input type="text" class="form-control "
                                                                value="<?php echo $last_name ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Email
                                                        </label>
                                                        <div class="col-sm-9 d-flex">
                                                            <input type="email" class="form-control "
                                                                value="sample@sample.com">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">UAE
                                                            Number</label>
                                                        <div class="col-sm-9 d-flex">
                                                            <input type="number" class="form-control" value="582240435">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label">Country
                                                            Number</label>
                                                        <div class="col-sm-9 d-flex">
                                                            <input type="number" class="form-control mx-2"
                                                                name="+6524145633235">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Billing Address</h5>
                                            </div>
                                            <div class="card-body">
                                                <?php if($billing_attention == null && $billing_country == null && $billing_address_1 == null && $billing_address_2 == null && $billing_city == null && $billing_state == null && $billing_zip_code == 0 && $billing_phone == 0) { ?>
                                                <p>No Billing Address <a href="" data-toggle="modal"
                                                        data-target="#billing_address">Add
                                                        Billing
                                                        Address</a>
                                                </p>
                                                <?php } else {?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Attention</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_attention ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Country/
                                                            Region</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_country ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Address</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_address_1 ?>">
                                                        </div>
                                                        <label class="col-sm-4 col-form-label"></label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_address_2 ?>">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">City</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_city ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">State</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_state ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Zip
                                                            Code</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_zip_code ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Phone</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-100"
                                                                value="<?php echo $billing_phone ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Shipping Address</h5>
                                            </div>
                                            <div class="card-body d-block">
                                                <?php if($shipping_attention == null && $shipping_country == null && $shipping_address_1 == null && $shipping_address_2 == null && $shipping_city == null && $shipping_state == null && $shipping_zip_code == 0 && $shipping_phone == 0) { ?>
                                                <p>No Shipping Address <a href="" data-toggle="modal"
                                                        data-target="#shipping_address">Add
                                                        Shipping
                                                        Address</a></p>
                                                <?php } else {?>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Attention</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_attention ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Country/
                                                            Region</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_country ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Address</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_address_1 ?>">
                                                        </div>
                                                        <label class="col-sm-4 col-form-label"></label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_address_2 ?>">

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">City</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_city ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">State</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_state ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Zip
                                                            Code</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_zip_code ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Phone</label>
                                                        <div class="col-sm-8 d-flex">
                                                            <input type="text" class="form-control w-75"
                                                                value="<?php echo $shipping_phone ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Quatations  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                            aria-labelledby="custom-tabs-four-profile-tab">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Quatation No</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Pending</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Pending</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Approved</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Rejected</span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Sales Orders  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-tab4" role="tabpanel"
                            aria-labelledby="custom-tabs-four-tab4-tab">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Quatation No</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Pending</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Pending</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Approved</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>2023-01-07</td>
                                                    <td><a href="./quatation_view.php">000123</a>
                                                    </td>
                                                    <td>
                                                        <span class="tag tag-success">Rejected</span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- Poplulor Models  -->
                        <!-- ============================================================== -->
                        <div class="tab-pane fade" id="custom-tabs-four-tab5" role="tabpanel"
                            aria-labelledby="custom-tabs-four-tab5-tab">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Processor</th>
                                                    <th>Core</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Dell</td>
                                                    <td>E7470</td>
                                                    <td>Intel</td>
                                                    <td>i5-6300u</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-lg badge-success text-white p-1 px-3">50</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>HP</td>
                                                    <td>840 G3</td>
                                                    <td>Intel</td>
                                                    <td>i5-6300u</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-lg badge-info text-white p-1 px-3">25</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Lenovo</td>
                                                    <td>T470s</td>
                                                    <td>Intel</td>
                                                    <td>i5-6300u</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-lg badge-warning text-white p-1 px-3">20</span>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>#</td>
                                                    <td>Dell</td>
                                                    <td>5530</td>
                                                    <td>Intel</td>
                                                    <td>i9-8950HK</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-lg badge-danger text-white p-1 px-3">5</span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Billing Address Modal  -->
<!-- ============================================================== -->
<div class="modal fade" id="billing_address">
    <div class="modal-dialog modal-lg">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Billing Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Attention</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="billing_attention">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Country/
                                Region</label>
                            <div class="col-sm-8 d-flex">
                                <select name="billing_country" class="info_select w-75" style="border-radius: 5px;">
                                    <option selected>--Select Country--
                                    </option>
                                    <?php
                                        $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                        $result = mysqli_query($connection, $query);

                                        while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                    ?>
                                    <option value="<?php echo $countries["country_name"]; ?>">
                                        <?php echo strtoupper($countries["country_name"]); ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Address</label>
                            <div class="col-sm-8 d-flex">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Street 1" name="billing_address_1" style="width: 75%;"></textarea>

                            </div>
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8 d-flex">
                                <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Street 2" name="billing_address_2" style="width: 75%;"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="billing_city" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">State</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="billing_state" placeholder="State">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Zip
                                Code</label>
                            <div class="col-sm-8 d-flex">
                                <input type="number" class="form-control w-75" name="billing_zip_code"
                                    placeholder="Zip Code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8 d-flex">
                                <input type="number" class="form-control w-75" name="billing_phone" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_billing_details" class="btn btn-primary">Save
                        changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 

if(isset($_POST['update_billing_details'])){

    $billing_attention = $_POST['billing_attention'];
    $billing_country = $_POST['billing_country'];
    $billing_address_1 = $_POST['billing_address_1'];
    $billing_address_2 = $_POST['billing_address_2'];
    $billing_city = $_POST['billing_city'];
    $billing_state = $_POST['billing_state'];
    $billing_zip_code = $_POST['billing_zip_code'];
    $billing_phone = $_POST['billing_phone'];

    $query = "UPDATE sales_customer_information SET billing_attention = '$billing_attention', billing_country_region = '$billing_country', billing_street1 = '$billing_address_1', billing_street2 = '$billing_address_2',
                                                    billing_city = '$billing_city', billing_state = '$billing_state', billing_zip_code = '$billing_zip_code', billing_customer_phone_number = '$billing_phone' 
                                                    WHERE customer_id = '$customer_id'";
                                                    echo $query;
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        header("Location: customer_view.php?customer_id=$customer_id");
    }
}
?>

<!-- ============================================================== -->
<!-- Shipping Address Modal  -->
<!-- ============================================================== -->
<div class="modal fade" id="shipping_address">
    <div class="modal-dialog modal-lg">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Shipping Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Attention</label>
                                <div class="col-sm-8 d-flex">
                                    <input type="text" class="form-control w-75" name="shipping_attention">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Country/
                                    Region</label>
                                <div class="col-sm-8 d-flex">
                                    <select name="shipping_country" class="info_select w-75"
                                        style="border-radius: 5px;">
                                        <option selected>--Select Country--
                                        </option>
                                        <?php
                                    $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                    $result = mysqli_query($connection, $query);

                                    while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                ?>
                                        <option value="<?php echo $countries["country_name"]; ?>">
                                            <?php echo strtoupper($countries["country_name"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8 d-flex">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Street 1" name="shipping_address_1" style="width: 75%;"></textarea>

                                </div>
                                <label class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8 d-flex">
                                    <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                                        placeholder="Street 2" name="shipping_address_2" style="width: 75%;"></textarea>

                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">City</label>
                                <div class="col-sm-8 d-flex">
                                    <input type="text" class="form-control w-75" name="shipping_city"
                                        placeholder="City">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">State</label>
                                <div class="col-sm-8 d-flex">
                                    <input type="text" class="form-control w-75" name="shipping_state"
                                        placeholder="State">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Zip
                                    Code</label>
                                <div class="col-sm-8 d-flex">
                                    <input type="number" class="form-control w-75" name="shipping_zip_code"
                                        placeholder="Zip Code">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8 d-flex">
                                    <input type="number" class="form-control w-75" name="shipping_phone"
                                        placeholder="Phone">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_shipping_details" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 

if(isset($_POST['update_shipping_details'])){
    $shipping_attention = $_POST['shipping_attention'];
    $shipping_country = $_POST['shipping_country'];
    $shipping_address_1 = $_POST['shipping_address_1'];
    $shipping_address_2 = $_POST['shipping_address_2'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_state = $_POST['shipping_state'];
    $shipping_zip_code = $_POST['shipping_zip_code'];
    $shipping_phone = $_POST['shipping_phone'];

    $query1 = "UPDATE sales_customer_information SET shipping_attention = '$shipping_attention', shipping_country_region = '$shipping_country', shipping_street1 = '$shipping_address_1', shipping_street2 = '$shipping_address_2',
                                                    shipping_city = '$shipping_city', shipping_state = '$shipping_state', shipping_zip_code = '$shipping_zip_code', shipping_customer_phone_number = '$shipping_phone' 
                                                    WHERE customer_id = '$customer_id'";
    $query_run1 = mysqli_query($connection, $query1);

    if($query_run1){
        header("Location: customer_view.php?customer_id=$customer_id");
    }
}

?>

<style>
option,
select {
    border-radius: 5px;
    height: 22px;
    margin-top: 5px;
}


input[type="text"] {
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
    text-transform: uppercase;
}
</style>