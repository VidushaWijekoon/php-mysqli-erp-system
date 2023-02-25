<?php
error_reporting (E_ALL ^ E_NOTICE);
// Toggle this to change the setting
define('DEBUG', true);

// You want all errors to be triggered
error_reporting(E_ALL);
 
error_reporting(E_ERROR | E_PARSE);
ob_start();
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

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

// if(isset($_POST['add_customer'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $create_customer_country = $_REQUEST['create_customer_country'];
    $customer_name = $_REQUEST['customer_name'];
    $create_phone_code = $_REQUEST['create_phone_code'];
    $customer_whatsapp_number = trim($_REQUEST['whatsapp']);
    $platform1 = $_REQUEST['platform1'];
    $model_selling_buying = $_REQUEST['model_selling_buying'];
    $uae_pickup1 = $_REQUEST['uae_pickup1'];

    $row = 0;
    $q1 = "SELECT id FROM sales_create_customer_informations WHERE customer_whatsapp_number = '$customer_whatsapp_number' AND customer_whatspp_phone_code = '$create_phone_code'";
    $q_run = mysqli_query($connection, $q1);
    $row = mysqli_num_rows($q_run);
    if($row == 0){
        $q_r = "INSERT INTO sales_create_customer_informations(`create_customer_country`, `customer_name`, `customer_whatspp_phone_code`, `customer_whatsapp_number`, `platform1`, `model_selling_buying`, `uae_pickup1`, `created_by`) 
                    VALUES ('$create_customer_country', '$customer_name', '$create_phone_code', '$customer_whatsapp_number', '$platform1', '$model_selling_buying', '$uae_pickup1', '$username')";
        $insert_q_r = mysqli_query($connection, $q_r);
        }else{
            echo "<script>alert('This Number Exists')</script>";                                        
    }  
}  

$his = "SELECT create_customer_country, platform1, customer_whatspp_phone_code FROM sales_create_customer_informations WHERE created_by ='$username' ORDER BY id DESC LIMIT 1";
$run = mysqli_query($connection, $his);
$create_customer_country = 0;
$platform1 = 0;
$create_phone_code = 0;
foreach($run as $dx){
    $create_customer_country = $dx['create_customer_country'];
    $platform1 = $dx['platform1'];
    $create_phone_code = $dx['customer_whatspp_phone_code'];
}
?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 mx-2">
        <a class="btn btn-primary mx-2 text-white" type="button" href="./create_customer_posting.php"><span
                class="mx-1">Create New
                Posting</span></a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="card card-success card-outline card-outline-tabs m-2 w-100">
                    <div class="card-header p-0 border-bottom-0">
                        <h6 class="pt-3 mx-2">Collect Customer Informations</h6>
                    </div>
                    <div class=" card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- ============================================================== -->
                            <!-- Tab 1  -->
                            <!-- ============================================================== -->

                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Platfrom</th>
                                            <th>Search by Keyword</th>
                                            <th>Today Need Create New Customer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td><span class="badge badge-info p-2"><?php echo $day; ?></span></td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="col col-md-6 col-lg-6">
                                                        <?php if($facebook == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="facebook" name="facebook"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="facebook">Facebook</label>
                                                        </div>

                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="instagram" name="instagram"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="instagram">Instagram</label>
                                                        </div>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="lazada" name="lazada" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="lazada">lazada</label>
                                                        </div>
                                                        <?php } if($lazada == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="lazada" name="lazada" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="lazada">lazada</label>
                                                        </div>
                                                        <?php } elseif($lazada == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="lazada" name="lazada" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="lazada">lazada</label>
                                                        </div>
                                                        <?php } if($shoppe == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="shoppe" name="shoppe" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="shoppe">Shoppe</label>
                                                        </div>
                                                        <?php } elseif($shoppe == 0) {?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="shoppe" name="shoppe" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="shoppe">Shoppe</label>
                                                        </div>
                                                        <?php } if($tokopedia == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="tokopedia" name="tokopedia"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="tokopedia">Tokopedia</label>
                                                        </div>
                                                        <?php } elseif($tokopedia == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="tokopedia" name="tokopedia"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="tokopedia">Tokopedia</label>
                                                        </div>
                                                        <?php } if($amazon_com == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="amazon_com" name="amazon_com"
                                                                value="1" disabled checked>
                                                            <label class="label_values text-capitalize"
                                                                for="amazon_com">Amazon.com</label>
                                                        </div>
                                                        <?php } elseif($amazon_com == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="amazon_com" name="amazon_com"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="amazon_com">Amazon.com</label>
                                                        </div>
                                                        <?php } if($amazon_uk == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="amazon_uk" name="amazon_uk"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="amazon_uk">Amazon.uk</label>
                                                        </div>
                                                        <?php } elseif($amazon_uk == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="amazon_uk" name="amazon_uk"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="amazon_uk">Amazon.uk</label>
                                                        </div>
                                                        <?php } if ($tiktok == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="tiktok" name="tiktok" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="tiktok">Tiktok</label>
                                                        </div>
                                                        <?php } elseif ($tiktok == 0) {?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="tiktok" name="tiktok" value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="tiktok">Tiktok</label>
                                                        </div>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="col col-md-6 col-lg-6">
                                                        <?php if($jiji_ng == 1) {  ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="jiji_ng" name="jiji_ng" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="jiji_ng">Jiji.ng</label>
                                                        </div>
                                                        <?php } elseif($jiji_ng == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="jiji_ng" name="jiji_ng"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="jiji_ng">Jiji.ng</label>
                                                        </div>
                                                        <?php } if($jiji_co_ke == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="jiji_co_ke" name="jiji_co_ke"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="jiji_co_ke">Jiji.co.ke</label>
                                                        </div>
                                                        <?php } elseif($jiji_co_ke == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="jiji_co_ke" name="jiji_co_ke"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="jiji_co_ke">Jiji.co.ke</label>
                                                        </div>
                                                        <?php } if ($google == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="google" name="google" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="google">Google.com</label>
                                                        </div>
                                                        <?php } elseif($google == 0){?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="google" name="google" value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="google">Google.com</label>
                                                        </div>
                                                        <?php } if($pcexporters == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="pcexpoters" name="pcexpoters"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="pcexpoters">PC
                                                                Exporters</label>
                                                        </div>
                                                        <?php } elseif($pcexporters == 0) {?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="pcexpoters" name="pcexpoters"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="pcexpoters">PC
                                                                Exporters</label>
                                                        </div>
                                                        <?php } if($jumia == 1) { ?>

                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="jumia" name="jumia" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="jumia">Jumia.Com</label>
                                                        </div>
                                                        <?php }elseif($jumia == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="jumia" name="jumia" value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="jumia">Jumia.Com</label>
                                                        </div>
                                                        <?php } if($thebrokersite == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="thebrokersite"
                                                                name="thebrokersite" value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="thebrokersite">thebrokersite.com</label>
                                                        </div>
                                                        <?php } elseif($thebrokersite == 0){ ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="thebrokersite"
                                                                name="thebrokersite" value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="thebrokersite">thebrokersite.com</label>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </td>

                                            <td id="myDIV1">
                                                <input type="text" class="form-control" placeholder="Search Keyword 1"
                                                    name="search_keyword_1" value="<?php echo $search_keyword_1 ?>"
                                                    readonly>
                                                <input type="text" class="form-control" placeholder="Search Keyword 2"
                                                    name="search_keyword_2" value="<?php echo $search_keyword_2 ?>"
                                                    readonly>
                                                <input type="text" class="form-control" placeholder="Search Keyword 3"
                                                    name="search_keyword_3" value="<?php echo $search_keyword_3 ?>"
                                                    readonly>
                                                <input type="text" class="form-control" placeholder="Search Keyword 4"
                                                    name="search_keyword_4" value="<?php echo $search_keyword_4 ?>"
                                                    readonly>
                                                <input type="text" class="form-control" placeholder="Search Keyword 5"
                                                    name="search_keyword_5" value="<?php echo $search_keyword_5 ?>"
                                                    readonly>
                                            </td>
                                            <td>
                                                <div class="h-100 d-flex align-items-center justify-content-center text-center"
                                                    style="font-size: 100px; margin-top: 10%; color: #e88c8c;">
                                                    <p id="showCounter"><?php echo $customer_target_qty ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th style="width: 15%;">Country</th>
                                                <th>Whatsapp Number</th>
                                                <th>Platform</th>
                                                <th>Model He Selling & Buying</th>
                                                <th>He Can Pick Up From UAE?</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control w-100"
                                                            name="customer_name" id="customer_name" value="">
                                                    </td>
                                                    <td>
                                                        <select name="create_customer_country" class="mt-1 w-100"
                                                            id="create_customer_country" style="border-radius: 5px;"
                                                            required>
                                                            <?php if($create_customer_country !=0){ ?>
                                                            <option value="<?php echo $create_customer_country ?>"
                                                                selected><?php echo $create_customer_country ?></option>
                                                            <?php } else { ?>
                                                            <option value="" selected><?php echo "Please select" ?>
                                                            </option>
                                                            <?php } ?>

                                                            <?php
                                                                $query = "SELECT country_name FROM countries ORDER BY 'country_name' ASC";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                            ?>
                                                            <option value="<?php echo $x["country_name"]; ?>">
                                                                <?php echo $x["country_name"]; ?>
                                                            </option>
                                                            <?php endwhile;?>
                                                        </select>
                                                    </td>

                                                    <td class="d-flex">

                                                        <select name="create_phone_code" class="mt-1 w-50"
                                                            id="create_phone_code" style="border-radius: 5px;" required>
                                                            <?php if($create_phone_code !=0){ ?>
                                                            <option value="<?php echo $create_phone_code ?>" selected>
                                                                <?php echo $create_phone_code ?></option>
                                                            <?php } else { ?>
                                                            <option value="" selected>
                                                                <?php echo "Please select" ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>

                                                        <input type="text" min="1" class="form-control" name="whatsapp"
                                                            placeholder="Whatsapp Number">
                                                    </td>
                                                    <td>

                                                        <select class="text-capitalize" name="platform1"
                                                            style="border-radius: 5px;" required>
                                                            <?php if($platform1 !=0){ ?>
                                                            <option value="<?php echo $platform1 ?>" selected>
                                                                <?php echo $platform1 ?></option>
                                                            <?php } else { ?>
                                                            <option value="" selected>
                                                                <?php echo "Please select" ?>
                                                            </option>
                                                            <?php } ?>
                                                            <option value="facebook">Facebook</option>
                                                            <option value="instgram">Instgram</option>
                                                            <option value="lazada">Lazada</option>
                                                            <option value="shopee">Shopee</option>
                                                            <option value="tokopedia">Tokopedia</option>
                                                            <option value="amazon.com">amazon.com</option>
                                                            <option value="amazon.uk">amazon.uk</option>
                                                            <option value="tiktok">tiktok</option>
                                                            <option value="loopzap">Loopzap</option>
                                                            <option value="pigiame">Pigiame</option>
                                                            <option value="kebuysell">Kebuysell</option>
                                                            <option value="kenyagroup">Kenya Group</option>
                                                            <option value="loozap">Loozap</option>
                                                            <option value="website">Website</option>
                                                            <option value="jiji.co.ke">jiji.co.ke</option>
                                                            <option value="olist">olist.ng</option>
                                                            <option value="jiji.ng">jiji.ng</option>
                                                            <option value="google">google</option>
                                                            <option value="pcexporters">Pc Exporters</option>
                                                            <option value="jumia">Jumia</option>
                                                            <option value="thebrokersite">The Brokersite</option>
                                                        </select>


                                                        <!-- <input type="text" class="form-control" name="platform1"
                                                            placeholder="Platform"> -->
                                                        <!-- <select name="platform1" class="mt-1 "
                                                            style="border-radius: 5px;" required>
                                                            <option value=""></option>
                                                            <?php
                                                            
                                                                $query = "SELECT * FROM weekly_sales_set_create_search_customer WHERE sales_member = '$username' AND day = '$day' ";
                                                                $result = mysqli_query($connection, $query);

                                                                while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                                    $facebook = $x['facebook'];
                                                                    $instagram = $x['instagram'];
                                                                    $lazada = $x['lazada'];
                                                                    $shoppe = $x['shoppe'];
                                                                    $tokopedia = $x['tokopedia'];
                                                                    $amazon_com = $x['amazon.com'];
                                                                    $amazon_uk = $x['amazon.uk'];
                                                                    $tiktok = $x['tiktok'];
                                                                    $jiji_ng = $x['jiji.ng'];
                                                                    $jiji_co_ke = $x['jiji.co.ke'];
                                                                    $google = $x['google'];
                                                                    $pcexporters = $x['pcexporters'];
                                                                    $jumia = $x['jumia'];
                                                                    $thebrokersite = $x['thebrokersite'];

                                                            ?>
                                                            <?php if($facebook == 1) { ?>
                                                            <option value="facebook">Facebook</option>
                                                            <?php } if($instagram == 1) { ?>
                                                            <option value="instagram">Instagram</option>
                                                            <?php } if($lazada == 1) { ?>
                                                            <option value="lazada">Lazada</option>
                                                            <?php } if($shoppe == 1) { ?>
                                                            <option value="shoppe">Shoppe</option>
                                                            <?php } if($tokopedia == 1) { ?>
                                                            <option value="tokopedia">Tokopedia</option>
                                                            <?php } if($amazon_com == 1) { ?>
                                                            <option value="amazon.com">Amazon.com</option>
                                                            <?php } if($amazon_uk == 1) { ?>
                                                            <option value="amazon.uk">Amazon.uk</option>
                                                            <?php } if($tiktok == 1) { ?>
                                                            <option value="tiktok">Tiktok</option>
                                                            <?php } if($jiji_ng == 1) { ?>
                                                            <option value="jiji.ng">jiji.ng</option>
                                                            <?php } if($jiji_co_ke == 1) { ?>
                                                            <option value="jiji.co.ke">jiji.co.ke</option>
                                                            <?php } if($google == 1) { ?>
                                                            <option value="google">Google</option>
                                                            <?php } if($pcexporters == 1) { ?>
                                                            <option value="pcexporters">Pc Exporters</option>
                                                            <?php } if($jumia == 1) { ?>
                                                            <option value="jumia">Jumia</option>
                                                            <?php } if($thebrokersite == 1) { ?>
                                                            <option value="thebrokersite">The Brokersite</option>
                                                            <?php } endwhile; ?>
                                                        </select> -->
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="model_selling_buying"
                                                            placeholder="Model He Selling & Buying?">
                                                    </td>

                                                    <td class="">
                                                        <div class="icheck-success d-inline">
                                                            <input type="radio" id="uae_pickup1" name="uae_pickup1"
                                                                value="yes" required>
                                                            <label class="label_values" for="uae_pickup1"
                                                                style="margin-right: 15px;">Yes
                                                            </label>
                                                        </div>
                                                        <div class="icheck-danger d-inline">
                                                            <input type="radio" id="uae_pickup2" name="uae_pickup1"
                                                                value="no">
                                                            <label class="label_values" for="uae_pickup2">No
                                                            </label>
                                                        </div>
                                                        <div class="icheck-warning d-inline">
                                                            <input type="radio" id="uae_pickup3" name="uae_pickup1"
                                                                value="n/a">
                                                            <label class="label_values" for="uae_pickup3">N/A
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="add_customer"
                                                            style="background: transparent; border:none;">
                                                            <i class="fa-solid fa-circle-plus fa-2x text-primary"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-body" style="overflow-y: auto; height: auto">
                    <table id="example2" class="table table-striped ">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Country</th>
                                <th>Customer Name</th>
                                <th>Whatsapp Number</th>
                                <th>Platform</th>
                                <th>Model He Selling & Buying</th>
                                <th>He Can Pick Up From UAE?</th>
                                <th>Created Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                            $start_day = date('Y-m-d 00:00:00');
                            $end_day = date('Y-m-d 23:59:59'); 
                            $i = 0;  
                            
                            $query = "SELECT create_customer_country, customer_name, customer_whatspp_phone_code, customer_whatsapp_number, platform1, model_selling_buying, uae_pickup1, created_time 
                                    FROM sales_create_customer_informations WHERE created_by = '$username' AND created_time BETWEEN '$start_day' AND '$end_day' ORDER BY created_time DESC";
                            $result = mysqli_query($connection, $query);
                            foreach($result as $row){
                                $create_customer_country = $row['create_customer_country'];
                                $customer_name = $row['customer_name'];
                                $customer_whatspp_phone_code = $row['customer_whatspp_phone_code'];
                                $customer_whatsapp_number = $row['customer_whatsapp_number'];
                                $platform1 = $row['platform1'];
                                $model_selling_buying = $row['model_selling_buying'];
                                $uae_pickup1 = $row['uae_pickup1'];
                                $created_time = $row['created_time'];
                                $i++;
                                                                  
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $create_customer_country ?></td>
                                <td><?php echo $customer_name ?></td>
                                <td><?php echo "+" . $customer_whatspp_phone_code . " " . $customer_whatsapp_number ?>
                                </td>
                                <td><?php echo $platform1 ?></td>
                                <td><?php echo $model_selling_buying ?></td>
                                <td><?php echo $uae_pickup1 ?></td>
                                <td><?php echo $created_time ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
[type="text"],
[type="number"] {
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

<script>
$(document).ready(function() {
    $("#create_customer_country").on("change", function() {
        var country_name = $("#create_customer_country").val();
        var getURL = "getphonecode.php?country_name=" + country_name;

        $.get(getURL, function(data, status) {
            $("#create_phone_code").html(data);
        });
    });
});
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>