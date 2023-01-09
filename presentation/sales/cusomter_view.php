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

$query_1 = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
$query_1_run = mysqli_query($connection, $query_1);
foreach($query_1_run as $x){
    $first_name = $x['first_name'];
    $last_name = $x['last_name'];
    $country = $x['country'];
    $company_name = $x['company_name'];
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $first_name . " " . $last_name . " " . $country; ?></h3>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card mt-2">

                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                            data-target="#customer_details">
                                            <i class="fas fa-plus mx-2"></i>
                                            Customer Details
                                        </button>

                                        <div id="customer_details" class="collapse">
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
                                                                            <input type="text"
                                                                                class="form-control w-50 mx-2" readonly
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
                                                                            <input type="number" class="form-control"
                                                                                value="582240435">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-3 col-form-label">Country
                                                                            Number</label>
                                                                        <div class="col-sm-9 d-flex">
                                                                            <input type="number"
                                                                                class="form-control mx-2"
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
                                                                <p>No Billing Address <a href="" data-toggle="modal"
                                                                        data-target="#billing_address">Add Billing
                                                                        Address</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h5>Shipping Address</h5>
                                                            </div>
                                                            <div class="card-body d-block">
                                                                <p>No Shipping Address <a href="" data-toggle="modal"
                                                                        data-target="#shipping_address">Add Shipping
                                                                        Address</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                            data-target="#quatations">
                                            <i class="fas fa-plus mx-2"></i>
                                            Quatations
                                        </button>
                                        <div id="quatations" class="collapse">
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
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>
                                                                        <span class="tag tag-success">Pending</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>
                                                                        <span class="tag tag-success">Pending</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>
                                                                        <span class="tag tag-success">Approved</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
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
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                            data-target="#sales_details">
                                            <i class="fas fa-plus mx-2"></i>
                                            Sales Orders
                                        </button>
                                        <div id="sales_details" class="collapse">
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col">
                                                        <table class="table table-hover text-nowrap">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Date</th>
                                                                    <th>Quatation No</th>
                                                                    <th>Sales Order No</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>1037</td>
                                                                    <td>
                                                                        <span class="tag tag-success">Pending</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>1031</td>
                                                                    <td>
                                                                        <span class="tag tag-success">Pending</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>1043</td>
                                                                    <td>
                                                                        <span class="tag tag-success">Approved</span>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>2023-01-07</td>
                                                                    <td><a href="./quatation_view.php">000123</a></td>
                                                                    <td>1046</td>
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
                                    </div>
                                    <div class="card-body">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                            data-target="#populor">
                                            <i class="fas fa-plus mx-2"></i>
                                            Popular Models
                                        </button>
                                        <div id="populor" class="collapse">
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
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Billing Address Modal  -->
<!-- ============================================================== -->
<div class="modal fade" id="billing_address">
    <div class="modal-dialog modal-lg">
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
                            <input type="text" class="form-control w-75" name="attention">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Country/
                            Region</label>
                        <div class="col-sm-8 d-flex">
                            <select name="current_country" class="info_select w-75" style="border-radius: 5px;">
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
                                placeholder="Street 1" style="width: 75%;"></textarea>

                        </div>
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8 d-flex">
                            <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Street 2" style="width: 75%;"></textarea>

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">City</label>
                        <div class="col-sm-8 d-flex">
                            <input type="text" class="form-control w-75" name="city" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8 d-flex">
                            <input type="text" class="form-control w-75" name="state" placeholder="State">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Zip
                            Code</label>
                        <div class="col-sm-8 d-flex">
                            <input type="text" class="form-control w-75" name="zip_code" placeholder="Zip Code">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Phone</label>
                        <div class="col-sm-8 d-flex">
                            <input type="text" class="form-control w-75" name="phone" placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Fax</label>
                        <div class="col-sm-8 d-flex">
                            <input type="text" class="form-control w-75" name="fax" placeholder="Fax">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Shipping Address Modal  -->
<!-- ============================================================== -->
<div class="modal fade" id="shipping_address">
    <div class="modal-dialog modal-lg">
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
                                <input type="text" class="form-control w-75" name="attention">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Country/
                                Region</label>
                            <div class="col-sm-8 d-flex">
                                <select name="current_country" class="info_select w-75" style="border-radius: 5px;">
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
                                    placeholder="Street 1" style="width: 75%;"></textarea>

                            </div>
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8 d-flex">
                                <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Street 2" style="width: 75%;"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">City</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="city" placeholder="City">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">State</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="state" placeholder="State">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Zip
                                Code</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="zip_code" placeholder="Zip Code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="phone" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 col-form-label">Fax</label>
                            <div class="col-sm-8 d-flex">
                                <input type="text" class="form-control w-75" name="fax" placeholder="Fax">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

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