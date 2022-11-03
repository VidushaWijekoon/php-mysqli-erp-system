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

$errors = array();

$customer_name = '';
$customer_address = "";
$company_name = '';
$customer_city = '';
$resident_country = '';
$shipping_address = '';
$shipping_country = '';
$shipping_city = '';
$shipping_state = '';
$zip_code = '';
$contact_number = '';
$create_by = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $customer_name = mysqli_real_escape_string($connection, $_POST['customer_name']);
    $customer_address = mysqli_real_escape_string($connection, $_POST['customer_address']);
    $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
    $customer_city = mysqli_real_escape_string($connection, $_POST['customer_city']);
    $resident_country = mysqli_real_escape_string($connection, $_POST['resident_country']);
    $shipping_address = mysqli_real_escape_string($connection, $_POST['shipping_address']);
    $shipping_country = mysqli_real_escape_string($connection, $_POST['shipping_country']);
    $shipping_city = mysqli_real_escape_string($connection, $_POST['shipping_city']);
    $shipping_state = mysqli_real_escape_string($connection, $_POST['shipping_state']);
    $zip_code = mysqli_real_escape_string($connection, $_POST['zip_code']);
    $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);  

    // checking required fields
    $req_fields = array('customer_name', 'customer_address', 'company_name', 'customer_city', 'resident_country', 'shipping_address', 'shipping_country', 'shipping_city', 'shipping_state', 'zip_code', 'contact_number');
    $errors = array_merge($errors, check_req_fields($req_fields));

    // checking max length
    $max_len_fields = array('customer_name' => 50, 'customer_address' => 500, 'company_name' => 50, 'customer_city' => 50, 'resident_country' => 50, 'shipping_address' => 250, 'shipping_country' => 50,
                                'shipping_city' => 50, 'shipping_state' => 50, 'zip_code' => 10, 'contact_number' => 20);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    if (empty($errors)) {
        // no errors found... adding new record
        $customer_name = mysqli_real_escape_string($connection, $_POST['customer_name']);
        $customer_address = mysqli_real_escape_string($connection, $_POST['customer_address']);
        $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
        $customer_city = mysqli_real_escape_string($connection, $_POST['customer_city']);
        $resident_country = mysqli_real_escape_string($connection, $_POST['resident_country']);
        $shipping_address = mysqli_real_escape_string($connection, $_POST['shipping_address']);
        $shipping_country = mysqli_real_escape_string($connection, $_POST['shipping_country']);
        $shipping_city = mysqli_real_escape_string($connection, $_POST['shipping_city']);
        $shipping_state = mysqli_real_escape_string($connection, $_POST['shipping_state']);
        $zip_code = mysqli_real_escape_string($connection, $_POST['zip_code']);
        $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
        
        $query = "INSERT INTO sales_order_information(customer_name, customer_address, company_name, customer_city, resident_country, shipping_address, shipping_country, shipping_city, shipping_state, zip_code, contact_number, created_by)
            VALUES ('{$customer_name}', '{$customer_address}', '{$company_name}', '{$customer_city}', '{$resident_country}', '{$shipping_address}', '{$shipping_country}', '{$shipping_city}', '{$shipping_state}', '{$zip_code}', '{$contact_number}', '{$create_by}')";
        
        $result = mysqli_query($connection, $query);        

        if ($result) {
            $last_id = $connection->insert_id;
            
                for ($a = 0; $a < count($_POST["item_type"]); $a++) {
                    $sql = strtolower("INSERT INTO sales_order_add_items(item_type, item_brand, item_model, item_processor, item_core, item_generation, 
                                                    item_ram, item_hdd, item_display, item_screen, item_graphic, item_bulk, item_condition, item_quantity, 
                                                    item_total_price, item_delivery_date, item_price, sales_order_id)
                                                    VALUES(
                                                        '" . $_POST["item_type"][$a] . "',
                                                        '" . $_POST["item_brand"][$a] . "',
                                                        '" . $_POST["item_model"][$a] . "',
                                                        '" . $_POST["item_processor"][$a] . "',
                                                        '" . $_POST["item_core"][$a] . "',
                                                        '" . $_POST["item_generation"][$a] . "',
                                                        '" . $_POST["item_ram"][$a] . "',
                                                        '" . $_POST["item_hdd"][$a] . "',
                                                        '" . $_POST["item_display"][$a] . "',
                                                        '" . $_POST["item_screen"][$a] . "',
                                                        '" . $_POST["item_graphic"][$a] . "',
                                                        '" . $_POST["item_bulk"][$a] . "',
                                                        '" . $_POST["item_condition"][$a] . "',
                                                        '" . $_POST["item_quantity"][$a] . "',
                                                        '" . $_POST["item_price"][$a] . "',
                                                        '" . $_POST["item_delivery_date"][$a] . "',
                                                        '" . $_POST["item_total_price"][$a] . "',                                                       
                                                        '" . (int)$last_id .  "'
                                                    )");
                    $data_result = mysqli_query($connection, $sql);
                    header("location: ./sales_orders.php");
                }

        } else {
            $errors[] = 'Failed to add the new record.';
        }
    }
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./accounts_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fliud ">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <?php if (!empty($errors)) { display_errors($errors); } ?>
            <div class="card">
                <div class="card-header bg-secondary text-uppercase d-flex">
                    <i class="fa-solid fa-sack-dollar bg-warning p-2"></i>
                    <h5 class="mx-2" style="margin: 2px;">Create Invoice</h5>
                </div>
                <form action="" method="POST">
                    <div class="row m-1">
                        <div class="col-md-6">
                            <fieldset class="mt-2 mb-2">
                                <legend>Customer Information</legend>
                                <div class="form-group">

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Customer Name"
                                                name="customer_name">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Customer City"
                                                name="company_name">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Customer Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Customer Address"
                                                name="customer_address">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Current City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Customer City"
                                                name="customer_city">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Resident Country</label>
                                        <div class="col-sm-8">
                                            <select class="" name="resident_country" require style="border-radius: 5px">
                                                <option selected>--Select Resident Country--</option>
                                                <?php
                                            $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                            $result = mysqli_query($connection, $query);

                                            while ($resident_country = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                            ?>
                                                <option value="<?php echo $resident_country["country_name"]; ?>">
                                                    <?php echo strtoupper($resident_country["country_name"]); ?>
                                                </option>
                                                <?php
                                            endwhile;
                                            ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <fieldset class="mt-2 mb-2">
                                <legend>Shipping Details</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Shipping Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Shipping Address"
                                                name="shipping_address">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Shipping Country</label>
                                        <div class="col-sm-8">
                                            <select class="" name="shipping_country" require style="border-radius: 5px">
                                                <option selected>--Select Shipping Country--</option>
                                                <?php
                                                        $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                                        $result = mysqli_query($connection, $query);

                                                        while ($resident_country = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                        ?>
                                                <option value="<?php echo $resident_country["country_name"]; ?>">
                                                    <?php echo strtoupper($resident_country["country_name"]); ?>
                                                </option>
                                                <?php
                                                        endwhile;
                                                        ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Shipping City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="Shipping City"
                                                name="shipping_city">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">State Or Province</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="State or Province"
                                                name="shipping_state">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Zip Code</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" placeholder="Zip Code"
                                                name="zip_code">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Contact Number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" placeholder="Contact Number"
                                                name="contact_number">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->
                    <div class="col col-md-12 col-lg-12 mt-2 mb-2">
                        <fieldset>
                            <legend>Place the Order</legend>
                            <form method="POST" action="">
                                <table class="table table-dark" id="tbl" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th>Device</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Processor</th>
                                            <th>Core</th>
                                            <th>Generation</th>
                                            <th>RAM</th>
                                            <th>HDD</th>
                                            <th>Display</th>
                                            <th>Screen</th>
                                            <th>Graphic</th>
                                            <th>Bulk</th>
                                            <th>Condition</th>
                                            <th>QTY</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Delivery Date</th>
                                            <th>
                                                <button type="button" onclick="addItem();"
                                                    style="background: transparent; border:none;"><i
                                                        class="fa-solid fa-circle-plus fa-2x text-primary"></i></button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="table-warning">
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </form>
                        </fieldset>

                        <div class="mt-3 mb-3 text-center">
                            <button type="submit" name="submit" class="btn btn-sm btn-info mx-2"><i
                                    class="fa-solid fa-plus mx-1"></i>Create Invoice</button>
                            <button class="btn btn-sm btn-warning mx-2"><i
                                    class="fa-solid fa-broom mx-1"></i>Clear</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
var items = 0;

function addItem() {
    items++;
    var sales_order_id;

    var html = "<tr>";
    html +=
        "<td><select name='item_type[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Type--</option> <option value='laptop'>Laptop</option></select></td >";
    html +=
        "<td><select name='item_brand[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Brand--</option> <option value='dell'>Dell</option><option value='hp'>HP</option><option value='lenovo'>Lenovo</option><option value='apple'>Apple</option><option value='acer'>acer</option><option value='asus'>Asus</option><option value='fujitsu'>Fujitsu</option><option value='msi'>MSI</option><option value='microsoft'>Microsoft</option><option value='samsung'>Samsung</option><option value='razer'>Razer</option><option value='gigabyte'>Gigabyte</option><option value='lg'>LG</option></select></td >";

    html += "<td><input name='item_model[]' class='form-control' type='text' ></td>";

    html +=
        "<td><select name='item_processor[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Processor--</option> <option value='intel'>Intel</option><option value='amd'>AMD</option></select></td >";
    html +=
        "<td><select name='item_core[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Core--</option> <option value='i3'>i3</option><option value='i5'>i5</option><option value='i7'>i7</option><option value='i9'>i9</option><option value='xeon'>Xeon</option><option value='celeron'>Celeron</option><option value='ryzen3'>Ryzen3</option><option value='ryzen5'>Ryzen5</option><option value='ryzen7'>Ryzen7</option><option value='ryzen9'>Ryzen9</option><option value='athlon'>Athlon</option><option value='m-1'>M-1</option><option value='m-2'>M-2</option></select></td >";
    html +=
        "<td><select name='item_generation[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Gen--</option> <option value='1'>1st</option><option value='2'>2nd</option><option value='3'>3rd</option><option value='4'>4th</option><option value='5'>5th</option><option value='6'>6th</option><option value='7'>7th</option><option value='8'>8th</option><option value='9'>9th</option><option value='10'>10th</option><option value='11'>11th</option><option value='12'>12th</option><option value='13'>13th</option></select></td >";
    html +=
        "<td><select name='item_ram[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select RAM--</option> <option value='2'>2GB</option><option value='4'>4GB</option><option value='8'>8GB</option><option value='16'>16GB</option><option value='32'>32GB</option><option value='64'>64GB</option><option value='128'>128GB</option></select></td >";

    html += "<td><input name='item_hdd[]' class='form-control' type='text'></td>";

    html +=
        "<td><select name='item_display[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Display--</option> <option value='hd (1366*768)'>HD - 1366 * 768</option><option value='hd+ (1600*900)'>HD+ -1600 * 900 </option><option value='full hd (1920*1080)'>Full HD - 1920 * 1080</option><option value='qhd (2560*1440)'>QHD - 2560 * 1440(2K)</option><option value='qhd+ (3200*1800)'>QHD+ - 3200 * 1800(3K)</option><option value='uhd (3840*2160)'>UHD - 3840 x 2160 (4K) </option><option value='retina'>Retina  (Apple only)</option></select></td >";

    html +=
        "<td><select name='item_screen[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Screen--</option> <option value='touch'>Touch</option><option value='non-touch'>Non-Touch</option></select></td >";

    html +=
        "<td><select name='item_graphic[]' class='form-select form-select-sm' aria-label='.form-select-sm example'><option selected>--Select Graphic--</option> <option value='2gb'>2GB</option><option value='4gb'>4GB</option><option value='8gb'>8GB</option><option value='16gb'>16GB</option></select></td >";

    html +=
        "<td><select name='item_bulk[]' class='form-select form-select-sm' aria-label='.form-select-sm example' required><option selected>--Select Bulk--</option> <option value='e-commerce'>E-Commerce</option><option value='bulk sale'>Bulk Sale</option></select></td >";

    html += "<td><input name='item_condition[]' class='form-control' type='text' ></td>";

    html += "<td><input class='form-control' type='number' name='item_quantity[]'></td>";
    html += "<td><input class='form-control' type='number' name='item_price[]'></td>";
    html += "<td><input class='form-control' type='number' name='item_total_price[]'></td>";
    html += "<td><input class='form-control' type='date' name='item_delivery_date[]'></td>";
    html += "<td><button type='button' onclick='deleteRow(this);'class='btn btn-sm btn-danger'>Delete</button></td>";
    html += "</tr>";

    var row = document.getElementById("tbody").insertRow();
    row.innerHTML = html;
}

function deleteRow(button) {
    items--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>


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
    font-family: 'Poppins', sans-serif;
    font-weight: 400;

}

.custom-select {
    font-size: 12px;
    font-family: 'Poppins', sans-serif;

}

#exampleFormControlTextarea1 {
    font-size: 12px;
    font-family: 'Poppins', sans-serif;
}
</style>


<?php include_once('../includes/footer.php'); ?>