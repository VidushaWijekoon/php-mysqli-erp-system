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

if(($role_id == 1 && $department == 11) || ($role_id == 4 && $department == 2) || ($role_id == 2 && $department == 18) || 
    ($role_id == 5 && $department == 5) || ($role_id == 8 && $department == 5)){ 


$organization = null;
$salutation = null;
$first_name = null;
$last_name = null;
$company_name = null;
$company_email = null;
$country = null;
$UAE_number = null;
$country_code = null;
$local_number = null;
$pickup_method = null;

$billing_attention = null;
$billing_country_region = null;
$billing_street1 = null;
$billing_street2 = null;
$billing_city = null;
$billing_state = null;
$billing_zip_code = null;
$billing_customer_phone_number = null;

$shipping_attention = null;
$shipping_country_region = null;
$shipping_street1 = null;
$shipping_street2 = null;
$shipping_city = null;
$shipping_state = null;
$shipping_zip_code = null;
$shipping_customer_phone_number = null;

$currency = null;
$language = null;
$payment_terms = null;
$whatsapp_number = null;
$facebook = null;

$contact_person_salutation = null;
$contact_person_first_name = null;
$contact_person_last_name = null;
$contact_person_email = null;
$contact_person_number = null;
$contact_person_mobile_number = null;

$remarks = null;
$username = $_SESSION['username'];

// Check Duplicate Customer First name , Last name, Country, Whatsapp Number
$check_customer = "SELECT * FROM sales_customer_information";
$check_run = mysqli_query($connection, $check_customer);
foreach($check_run as $xd){
    $check_customer_country = $xd['country'];
    $check_customer_whatsapp_number = $xd['whatsapp_number'];
}

if(isset($_POST['submit_customer'])){

    $organization = mysqli_real_escape_string($connection, $_POST['organization']);
    $salutation = mysqli_real_escape_string($connection, $_POST['salutation']);
    $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
    $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
    $company_email = mysqli_real_escape_string($connection, $_POST['company_email']);
    $country = mysqli_real_escape_string($connection, $_POST['country']);
    $UAE_number = mysqli_real_escape_string($connection, $_POST['UAE_number']);
    $country_code = mysqli_real_escape_string($connection, $_POST['country_code']);
    $local_number = mysqli_real_escape_string($connection, $_POST['local_number']);
    $pickup_method = mysqli_real_escape_string($connection, $_POST['pickup_method']);
    $billing_attention = mysqli_real_escape_string($connection, $_POST['billing_attention']);
    $billing_country_region = mysqli_real_escape_string($connection, $_POST['billing_country_region']);
    $billing_street1 = mysqli_real_escape_string($connection, $_POST['billing_street1']);
    $billing_street2 = mysqli_real_escape_string($connection, $_POST['billing_street2']);
    $billing_city = mysqli_real_escape_string($connection, $_POST['billing_city']);
    $billing_state = mysqli_real_escape_string($connection, $_POST['billing_state']);
    $billing_zip_code = mysqli_real_escape_string($connection, $_POST['billing_zip_code']);
    $billing_customer_phone_number = mysqli_real_escape_string($connection, $_POST['billing_customer_phone_number']);
    $shipping_attention = mysqli_real_escape_string($connection, $_POST['shipping_attention']);
    $shipping_country_region = mysqli_real_escape_string($connection, $_POST['shipping_country_region']);
    $shipping_street1 = mysqli_real_escape_string($connection, $_POST['shipping_street1']);
    $shipping_street2 = mysqli_real_escape_string($connection, $_POST['shipping_street2']);
    $shipping_city = mysqli_real_escape_string($connection, $_POST['shipping_city']);
    $shipping_state = mysqli_real_escape_string($connection, $_POST['shipping_state']);
    $shipping_zip_code = mysqli_real_escape_string($connection, $_POST['shipping_zip_code']);
    $shipping_customer_phone_number = mysqli_real_escape_string($connection, $_POST['shipping_customer_phone_number']);
    $currency = mysqli_real_escape_string($connection, $_POST['currency']);
    $language = mysqli_real_escape_string($connection, $_POST['language']);
    $payment_terms = mysqli_real_escape_string($connection, $_POST['payment_terms']);
    $whatsapp_number = mysqli_real_escape_string($connection, $_POST['whatsapp_number']);
    $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
    $contact_person_salutation = mysqli_real_escape_string($connection, $_POST['contact_person_salutation']);
    $contact_person_first_name = mysqli_real_escape_string($connection, $_POST['contact_person_first_name']);
    $contact_person_last_name = mysqli_real_escape_string($connection, $_POST['contact_person_last_name']);
    $contact_person_email = mysqli_real_escape_string($connection, $_POST['contact_person_email']);
    $contact_person_number = mysqli_real_escape_string($connection, $_POST['contact_person_number']);
    $contact_person_mobile_number = mysqli_real_escape_string($connection, $_POST['contact_person_mobile_number']);
    $remarks = mysqli_real_escape_string($connection, $_POST['remarks']);

    if(($check_customer_country == $country) && ($check_customer_whatsapp_number == $whatsapp_number)){
        echo '<script>alert("This Customer Details Already Exists")</script>';
    }else{
        $query = "INSERT INTO `sales_customer_information`(`salutation`, `first_name`, `last_name`, `company_name`, `company_email`, `country`,`UAE_number`, `country_code`, `local_number`, `pickup_method`, `billing_attention`, 
                                        `billing_country_region`, `billing_street1`, `billing_street2`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_customer_phone_number`, `shipping_attention`,
                                        `shipping_country_region`, `shipping_street1`, `shipping_street2`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_customer_phone_number`, 
                                        `currency`, `language`, `payment_terms`, `whatsapp_number`, `facebook`, `contact_person_salutation`, `contact_person_first_name`, `contact_person_last_name`, 
                                        `contact_person_email`, `contact_person_number`, `contact_person_mobile_number`, `remarks`, `created_by`,  `status`) 
                VALUES ('{$salutation}', '{$first_name}', '{$last_name}', '{$company_name}', '{$company_email}', '{$country}','{$UAE_number}', '{$country_code}', '{$local_number}', '{$pickup_method}', '{$billing_attention}', 
                        '{$billing_country_region}', '{$billing_street1}', '{$billing_street2}', '{$billing_city}', '{$billing_state}', '{$billing_zip_code}', '{$billing_customer_phone_number}', 
                        '{$shipping_attention}', '{$shipping_country_region}', '{$shipping_street1}', '{$shipping_street2}', '{$shipping_city}', '{$shipping_state}', '{$shipping_zip_code}', '{$shipping_customer_phone_number}',
                        '{$currency}', '{$language}', '{$payment_terms}', '{$whatsapp_number}', '{$facebook}', '{$contact_person_salutation}', '{$contact_person_first_name}', '{$contact_person_last_name}', 
                        '{$contact_person_email}', '{$contact_person_number}', '{$contact_person_mobile_number}', '{$remarks}', '{$username}', '0')";
        $query_run = mysqli_query($connection, $query);
    }
    if(empty($query_run)){

    }else{
        if($query_run){
            header("Location: ./customers.php");
        }else{
            echo "Something Wrong with Submit Form";
        }
    }
   
     
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card mt-3">
                <form action="" method="POST">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create New Customer</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Organization</label>
                                    <div class="col-sm-8 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="c27" name="organization" value="business" required
                                                checked>
                                            <label class="label_values" for="c27" style="margin-right: 15px;">Business

                                            </label>
                                        </div>
                                        <div class="icheck-danger d-inline">
                                            <input type="radio" id="c28" name="organization" value="individual">
                                            <label class="label_values" for="c28">Individual </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Customer Details</label>
                                    <div class="col-sm-10 d-flex">
                                        <select class="" name="salutation" style="border-radius: 5px; width: 10%;"
                                            required>
                                            <option selected value="">--Select Salutaion--</option>
                                            <option value="mr">MR</option>
                                            <option value="mrs">MRS</option>
                                            <option value="ms">MS</option>
                                            <option value="mss">MSS</option>
                                        </select>
                                        <input type="text" class="form-control w-25 mx-1" placeholder="First Name"
                                            name="first_name" required>
                                        <input type="text" class="form-control w-25 mx-1" placeholder="Last Name"
                                            name="last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Company Name</label>
                                    <div class="col-sm-10 d-flex">
                                        <input type="text" class="form-control w-25" placeholder="Company Name"
                                            name="company_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Company Email</label>
                                    <div class="col-sm-10 d-flex">
                                        <input type="email" class="form-control w-25" placeholder="Company Email"
                                            name="company_email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10 d-flex">
                                        <select class="w-25" name="country" style="border-radius: 5px;" required>
                                            <option value="" selected>--Select Country--</option>
                                            <?php
                                                $query = "SELECT country_name FROM countries ORDER BY 'country_name' ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $countries["country_name"]; ?>">
                                                <?php echo $countries["country_name"]; ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">UAE Number</label>
                                    <div class="col-sm-10 d-flex">
                                        <input type="number" class="form-control w-25" placeholder="UAE Number"
                                            name="UAE_number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Country Number</label>
                                    <div class="col-sm-10 d-flex">
                                        <select class="" name="country_code" style="border-radius: 5px; width: 8%;">
                                            <option value="" selected>--Select Country Code--</option>
                                            <?php
                                                $query = "SELECT phone_code FROM countries ORDER BY 'phone_code' ASC";
                                                $result = mysqli_query($connection, $query);

                                                while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>
                                            <option value="<?php echo $countries["phone_code"]; ?>">
                                                <?php echo "+" . $countries["phone_code"]; ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                        <input type="number" class="form-control w-25 mx-2" placeholder="Country Number"
                                            name="local_number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Pickup Method</label>
                                    <div class="col-sm-8 mt-2">
                                        <div class="icheck-success d-inline">
                                            <input type="radio" id="local_pickup" name="pickup_method"
                                                value="local pickup" required checked>
                                            <label class="label_values" for="local_pickup"
                                                style="margin-right: 15px;">Local
                                                Pickup
                                            </label>
                                        </div>
                                        <div class="icheck-danger d-inline">
                                            <input type="radio" id="export" name="pickup_method" value="export"
                                                required>
                                            <label class="label_values" for="export">Export </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <fieldset>
                                <legend>Other Details</legend>
                                <div class="row">
                                    <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="tab1" role="tablist">
                                                <li class="nav-item text-center" style="width: 150px;">
                                                    <a class="nav-link active" id="custom-tabs-four-home-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                                                        aria-controls="custom-tabs-four-home" aria-selected="true"
                                                        style="color: #fff;">Address</a>
                                                </li>
                                                <li class="nav-item text-center" style="width: 150px;">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-profile" role="tab"
                                                        aria-controls="custom-tabs-four-profile" aria-selected="false"
                                                        style="color: #fff;">Other Details</a>
                                                </li>

                                                <li class="nav-item text-center" style="width: 150px;">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-tab4" role="tab"
                                                        aria-controls="custom-tabs-four-tab4" aria-selected="false"
                                                        style="color: #fff;">Contact Person</a>
                                                </li>
                                                <li class="nav-item text-center" style="width: 150px;">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-tab5" role="tab"
                                                        aria-controls="custom-tabs-four-tab5" aria-selected="false"
                                                        style="color: #fff;">Remarks</a>
                                                </li>
                                                <!--  <li class="nav-item text-center" style="width: 150px;">
                                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                    href="#custom-tabs-four-tab6" role="tab"
                                                    aria-controls="custom-tabs-four-tab6" aria-selected="false"
                                                    style="color: #fff;">Remark</a>
                                            </li> -->

                                            </ul>
                                        </div>
                                        <div class=" card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <!-- ============================================================== -->
                                                <!-- Tab 1  -->
                                                <!-- ============================================================== -->
                                                <div class="tab-pane fade show active" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class=" card-title">Billing Address</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Attention</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="billing_attention">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Country/
                                                                                Region</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <select name="billing_country_region"
                                                                                    class="info_select w-75"
                                                                                    style="border-radius: 5px;">
                                                                                    <option value="" selected>--Select
                                                                                        Country--
                                                                                    </option>
                                                                                    <?php
                                                                                        $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                                                                        $result = mysqli_query($connection, $query);

                                                                                        while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?php echo $countries["country_name"]; ?>">
                                                                                        <?php echo strtoupper($countries["country_name"]); ?>
                                                                                    </option>
                                                                                    <?php endwhile; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Address</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <textarea class="form-control"
                                                                                    id="exampleFormControlTextarea1"
                                                                                    rows="3" placeholder="Street 1"
                                                                                    name="billing_street1"
                                                                                    style="width: 75%; font-size: 10px;"></textarea>

                                                                            </div>
                                                                            <label
                                                                                class="col-sm-4 col-form-label"></label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <textarea class="form-control mt-2"
                                                                                    id="exampleFormControlTextarea1"
                                                                                    name="billing_street2"
                                                                                    style="width: 75%; font-size: 10px;"></textarea>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">City</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="billing_city"
                                                                                    placeholder="City">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">State</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="billing_state"
                                                                                    placeholder="State">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-4 col-form-label">Zip
                                                                                Code</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="number"
                                                                                    class="form-control w-75"
                                                                                    name="billing_zip_code"
                                                                                    placeholder="Zip Code">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Phone</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="number"
                                                                                    class="form-control w-75"
                                                                                    name="billing_customer_phone_number"
                                                                                    placeholder="Phone">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h4 class=" card-title">Shipping Address</h4>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Attention</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="shipping_attention">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Country/
                                                                                Region</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <select name="shipping_country_region"
                                                                                    class="info_select w-75"
                                                                                    style="border-radius: 5px;">
                                                                                    <option value="" selected>--Select
                                                                                        Country--
                                                                                    </option>
                                                                                    <?php 
                                                                                        $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                                                                        $result = mysqli_query($connection, $query);

                                                                                        while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?php echo $countries["country_name"]; ?>">
                                                                                        <?php echo strtoupper($countries["country_name"]); ?>
                                                                                    </option>
                                                                                    <?php endwhile; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Address</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <textarea class="form-control"
                                                                                    id="exampleFormControlTextarea1"
                                                                                    rows="3" placeholder="Street 1"
                                                                                    name="shipping_street1"
                                                                                    style="width: 75%; font-size: 10px;"></textarea>

                                                                            </div>
                                                                            <label
                                                                                class="col-sm-4 col-form-label"></label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <textarea class="form-control mt-2"
                                                                                    id="exampleFormControlTextarea1"
                                                                                    rows="3" placeholder="Street 2"
                                                                                    name="shipping_street2"
                                                                                    style="width: 75%; font-size: 10px;"></textarea>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">City</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="shipping_city"
                                                                                    placeholder="City">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">State</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="shipping_state"
                                                                                    placeholder="State">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label class="col-sm-4 col-form-label">Zip
                                                                                Code</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="shipping_zip_code"
                                                                                    placeholder="Zip Code">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label">Phone</label>
                                                                            <div class="col-sm-8 d-flex">
                                                                                <input type="text"
                                                                                    class="form-control w-75"
                                                                                    name="shipping_customer_phone_number"
                                                                                    placeholder="Phone">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- ============================================================== -->
                                                <!-- Customer Other Details  -->
                                                <!-- ============================================================== -->
                                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-profile-tab">

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label">Currency</label>
                                                            <div class="col-sm-10">

                                                                <select class="w-25" name="currency"
                                                                    style="border-radius: 5px;" required>
                                                                    <option value="" selected>--Select Currency--
                                                                    </option>
                                                                    <option value="aed">AED د.إ</option>
                                                                    <option value="usd">USD $</option>
                                                                    <option value="euro">Euro €</option>
                                                                    <option value="pound">Pound £</option>
                                                                    <option value="yen">Yen ¥</option>
                                                                    <option value="franc">Franc ₣</option>
                                                                    <option value="ruppe">Ruppe ₹</option>
                                                                    <option value="yuan">Yuan ¥</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label">Language</label>
                                                            <div class="col-sm-10 d-flex">
                                                                <select class="w-25" name="language"
                                                                    style="border-radius: 5px;" required>
                                                                    <option value="" selected>--Select Languages--
                                                                    </option>
                                                                    <option value="english">English</option>
                                                                    <option value="arabic">Arabic</option>
                                                                    <option value="chinese">Chinese</option>
                                                                    <option value="spanish">Spanish</option>
                                                                    <option value="france">France</option>
                                                                    <option value="italian">Italian</option>
                                                                    <option value="japanese">Japanese</option>
                                                                    <option value="hindi">Hindi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label">Payment Terms</label>
                                                            <div class="col-sm-10 d-flex">
                                                                <select class="w-25" name="payment_terms"
                                                                    style="border-radius: 5px;" required>
                                                                    <option value="" selected>--Select Payment Terms--
                                                                    </option>
                                                                    <option value="net 15">Net 15</option>
                                                                    <option value="net 30">Net 30</option>
                                                                    <option value="net 45">Net 45</option>
                                                                    <option value="net 60">Net 60</option>
                                                                    <option value="due end of the month">Due end of the
                                                                        month</option>
                                                                    <option value="duo end the the next month">Due end
                                                                        of the next month</option>
                                                                    <option value="due on receipt">Due on Receipt
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label">Whatsapp
                                                                Number</label>
                                                            <div class="col-sm-10 d-flex">
                                                                <input type="number" class="form-control w-25"
                                                                    placeholder="Whatsapp" name="whatsapp_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label">Facebook</label>
                                                            <div class="col-sm-10 d-flex">
                                                                <input type="text" class="form-control w-25"
                                                                    placeholder="Facebook" name="facebook">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!-- ============================================================== -->
                                                <!-- Contact Person  -->
                                                <!-- ============================================================== -->
                                                <div class="tab-pane fade" id="custom-tabs-four-tab4" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-tab4-tab">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Salutation</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Email Address</th>
                                                                <th>Work Phone</th>
                                                                <th>Mobile</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <select class="" name="contact_person_salutation"
                                                                        style="border-radius: 5px;">
                                                                        <option value="" selected>--Select Salutaion--
                                                                        </option>
                                                                        <option value="2">MR</option>
                                                                        <option value="4">MRS</option>
                                                                        <option value="6">MS</option>
                                                                        <option value="8">MSS</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="First Name"
                                                                        name="contact_person_first_name">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Last Name"
                                                                        name="contact_person_last_name">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Email" name="contact_person_email">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Number"
                                                                        name="contact_person_number">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Mobile"
                                                                        name="contact_person_mobile_number">
                                                                </td>

                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                </div>

                                                <!-- ============================================================== -->
                                                <!-- Remarks  -->
                                                <!-- ============================================================== -->
                                                <div class="tab-pane fade" id="custom-tabs-four-tab5" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-tab5-tab">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Remark</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3" placeholder="Remarks" name="remarks"
                                                            style="width: 50%;"></textarea>
                                                    </div>
                                                </div>

                                                <!-- ============================================================== -->
                                                <!-- Tab 6  -->
                                                <!-- ============================================================== -->
                                                <div class="tab-pane fade" id="custom-tabs-four-tab6" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-tab6-tab">
                                                    <h5>Ta6</h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex float-end justify-content-center">
                                    <a href="" class="btn bg-gradient-warning mx-2 text-white">
                                        <i class="fa fa-arrow-left"></i><span class="mx-1">Cancel</span></a>

                                    <button type="submit" name="submit_customer"
                                        class="btn bg-gradient-success mx-2 text-white">
                                        <i class="fa fa-check"></i><span class="mx-1">Add Customer</span>
                                    </button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
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


[type="text"] {
    height: 22px;
    margin-top: 4px;
    font-size: 10px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #fff !important;
}
</style>


<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>