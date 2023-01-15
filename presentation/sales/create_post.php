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

$username = $_SESSION['username'];
$epf_id = $_SESSION['epf'];

$day = null;
$sales_member = null;
$currrent_date = null;

$facebook = null;
$instagram = null;
$lazada = null;
$shoppe = null;
$tokopedia = null;
$amazon_com = null;
$amazon_uk = null;
$tiktok = null;
$jiji_ng = null;
$jiji_co_ke = null;
$google = null;
$pcexporters = null;
$jumia = null;
$thebrokersite = null;

$search_keyword_1 = null;
$search_keyword_2 = null;
$search_keyword_3 = null;
$search_keyword_4 = null;
$search_keyword_5 = null;

$customer_target_qty = null;

$customer_create_model_1 = null;
$customer_create_model_2 = null;
$customer_create_model_3 = null;
$customer_create_model_4 = null;
$customer_create_model_5 = null;
$customer_create_model_6 = null;
$customer_create_model_7 = null;
$customer_create_model_8 = null;
$customer_create_model_9 = null;
$customer_create_model_10 = null;

$thebrokersite1 = null;
$pcexporters1 = null;
$facebook1 = null;

$platform_create_model_1 = null;
$platform_create_model_2 = null;
$platform_create_model_3 = null;
$platform_create_model_4 = null;
$platform_create_model_5 = null;
$platform_create_model_6 = null;
$platform_create_model_7 = null;
$platform_create_model_8 = null;
$platform_create_model_9 = null;
$platform_create_model_10 = null;

$selected_date = null;
$sales_member_name = null;
$member_id = null;

$currrent_date = date("l");

$customer_name = null;
$customer_country_from = null;
$customer_whatsapp_number = null;
$model_selling_buying = null;
$uae_pickup1 = null;
$platform = null;

$choose_country = null;

$create_customer_name = null;
$created_customer_whatsapp_number = null;
$create_customer_id = null;

$posting_customer_name = null;
$posting_whatsapp_number = null;
$platform2 = null;
$model_selling_and_buying1 = null;
$posted_model_1 = null;
$posted_model_2 = null;
$customer_asking_model = null;
$customer_asking_price = null;
$uae_pickup2 = null;

$post_status = null;
$created_posted_time = null;
$gt_c = null;

$query = "SELECT * FROM weekly_sales_set_target
            INNER JOIN weekly_sales_set_posting_to_customer 
            ON weekly_sales_set_target.id = weekly_sales_set_posting_to_customer.member_id 
            AND weekly_sales_set_target.day = weekly_sales_set_posting_to_customer.day
            AND weekly_sales_set_target.sales_member = weekly_sales_set_posting_to_customer.sales_member
            INNER JOIN weekly_sales_set_create_search_customer
            ON weekly_sales_set_target.id = weekly_sales_set_create_search_customer.member_id
            AND weekly_sales_set_target.day = weekly_sales_set_create_search_customer.day
            AND weekly_sales_set_target.sales_member = weekly_sales_set_create_search_customer.sales_member
            WHERE weekly_sales_set_target.sales_member = $epf_id AND weekly_sales_set_create_search_customer.day = '{$currrent_date}'";
$query_run = mysqli_query($connection, $query);
foreach($query_run as $q){
   $day = $q['day'];
   $facebook = $q['facebook'];
   $instagram = $q['instagram'];
   $lazada = $q['lazada'];
   $shoppe = $q['shoppe'];
   $tokopedia = $q['tokopedia'];
   $amazon_com = $q['amazon.com'];
   $amazon_uk = $q['amazon.uk'];
   $tiktok = $q['tiktok'];
   $jiji_ng = $q['jiji.ng'];
   $jiji_co_ke = $q['jiji.co.ke'];
   $google = $q['google'];
   $pcexporters = $q['pcexporters'];
   $jumia = $q['jumia'];
   $thebrokersite = $q['thebrokersite'];
   $search_keyword_1 = $q['search_keyword_1'];
   $search_keyword_2 = $q['search_keyword_2'];
   $search_keyword_3 = $q['search_keyword_3'];
   $search_keyword_4 = $q['search_keyword_4'];
   $search_keyword_5 = $q['search_keyword_5'];
   $customer_target_qty = $q['customer_target_qty'];
   $customer_create_model_1 = $q['customer_create_model_1'];
   $customer_create_model_2 = $q['customer_create_model_2'];
   $customer_create_model_3 = $q['customer_create_model_3'];
   $customer_create_model_4 = $q['customer_create_model_4'];
   $customer_create_model_5 = $q['customer_create_model_5'];
   $customer_create_model_6 = $q['customer_create_model_6'];
   $customer_create_model_7 = $q['customer_create_model_7'];
   $customer_create_model_8 = $q['customer_create_model_2'];
   $customer_create_model_9 = $q['customer_create_model_9'];
   $customer_create_model_10 = $q['customer_create_model_10'];
   $thebrokersite1 = $q['thebrokersite1'];
   $pcexporters1 = $q['pcexporters1'];
   $facebook1 = $q['facebook1'];
   $platform_create_model_1 = $q['platform_create_model_1'];
   $platform_create_model_2 = $q['platform_create_model_2'];
   $platform_create_model_3 = $q['platform_create_model_3'];
   $platform_create_model_4 = $q['platform_create_model_4'];
   $platform_create_model_5 = $q['platform_create_model_5'];
   $platform_create_model_6 = $q['platform_create_model_6'];
   $platform_create_model_7 = $q['platform_create_model_7'];
   $platform_create_model_8 = $q['platform_create_model_8'];
   $platform_create_model_9 = $q['platform_create_model_9'];
   $platform_create_model_10 = $q['platform_create_model_110'];
}

$currrent_date = date("l");
echo $currrent_date;


$gt_c = $_GET['choose_country'];
echo $gt_c;

if(isset($_POST['get_country'])){
    $choose_country = $_POST['choose_country'];
    header("Location: create_post.php?choose_country=$choose_country");

    echo $choose_country;
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="card card-success card-outline card-outline-tabs m-2 w-100">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item text-center" style="width: 350px;">
                                <a class="nav-link" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="false" style="color: #fff;">Collect Customer Informations</a>
                            </li>
                            <li class="nav-item text-center" style="width: 350px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="true" style="color: #fff;">Posting to Customer & Platform Task</a>
                            </li>
                        </ul>
                    </div>
                    <div class=" card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- ============================================================== -->
                            <!-- Tab 1  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
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
                                            <td><?php echo $day; ?></td>
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
                                                        <?php } if($tiktok == 1) {?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="tiktok" name="tiktok" checked
                                                                disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="tiktok">Tiktok</label>
                                                        </div>
                                                        <?php } elseif($tiktok == 0) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="tiktok" name="tiktok">
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
                                                <th style="width: 10px">#</th>
                                                <th>Country</th>
                                                <th>Customer Name</th>
                                                <th>Whatsapp Number</th>
                                                <th>Platform</th>
                                                <th>Model He Buying</th>
                                                <th>He Can Pick Up From UAE?</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form method="POST">
                                                <tr>
                                                    <td>#</td>
                                                    <td>
                                                        <select name="create_customer_country" class="mt-1"
                                                            style="border-radius: 5px;" required>
                                                            <option value="" selected>--Select Country--</option>
                                                            <?php
                                                            $query = "SELECT country_name FROM countries ORDER BY 'country_name' ASC";
                                                            $result = mysqli_query($connection, $query);

                                                            while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                        ?>
                                                            <option value="<?php echo $x["country_name"]; ?>">
                                                                <?php echo $x["country_name"]; ?>
                                                            </option>
                                                            <?php endwhile; ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="customer_name"
                                                            id="customer_name" value="">
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="customer_whatsapp_number"
                                                            placeholder="Whatsapp Number">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="platform1"
                                                            placeholder="Platform">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="model_selling_buying"
                                                            placeholder="Model He Selling & Buying?">
                                                    </td>

                                                    <td class="d-flex">
                                                        <div class="icheck-success d-inline">
                                                            <input type="radio" id="keyboard_light_1" name="uae_pickup1"
                                                                value="yes" required>
                                                            <label class="label_values" for="keyboard_light_1"
                                                                style="margin-right: 15px;">Yes
                                                            </label>
                                                        </div>
                                                        <div class="icheck-danger d-inline">
                                                            <input type="radio" id="keyboard_light_2" name="uae_pickup1"
                                                                value="no">
                                                            <label class="label_values" for="keyboard_light_2">No
                                                            </label>
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

                            <?php 

                                if(isset($_POST['add_customer'])){

                                    $create_customer_country = $_POST['create_customer_country'];
                                    $customer_name = $_POST['customer_name'];
                                    $customer_whatsapp_number = $_POST['customer_whatsapp_number'];
                                    $platform1 = $_POST['platform1'];
                                    $model_selling_buying = $_POST['model_selling_buying'];
                                    $uae_pickup1 = $_POST['uae_pickup1'];

                                    $q_r = "INSERT INTO `sales_create_customer_informations`(`create_customer_country`, `customer_name`, `customer_whatsapp_number`, `platform1`, `model_selling_buying`, `uae_pickup1`, `created_by`) 
                                                VALUES ('{$create_customer_country}', '{$customer_name}', '{$customer_whatsapp_number}', '{$platform1}', '{$model_selling_buying}', '{$uae_pickup1}', '{$username}')";
                                    $insert_q_r = mysqli_query($connection, $q_r);

                                }

                            ?>

                            <!-- ============================================================== -->
                            <!-- Tab 2  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                <div class="d-flex">
                                    <div class="col col-md-6 col-lg-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">Day</th>
                                                    <th>Morning
                                                        <br>9.00A.M-2.00P.M
                                                    </th>
                                                    <th>Afternoon
                                                        <br>3.00A.M-6.15P.M
                                                    </th>
                                                    <th>Follow The Order
                                                        <br>6.45A.M-9.00P.M
                                                    </th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $day; ?></td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Model 1"
                                                            name="customer_create_model_1"
                                                            value="<?php echo $customer_create_model_1 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 2"
                                                            name="customer_create_model_2"
                                                            value="<?php echo $customer_create_model_2 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 3"
                                                            name="customer_create_model_3"
                                                            value="<?php echo $customer_create_model_3 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 4"
                                                            name="customer_create_model_4"
                                                            value="<?php echo $customer_create_model_4 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 5"
                                                            name="customer_create_model_5"
                                                            value="<?php echo $customer_create_model_5 ?>" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Model 1"
                                                            name="customer_create_model_6"
                                                            value="<?php echo $customer_create_model_6 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 2"
                                                            name="customer_create_model_7"
                                                            value="<?php echo $customer_create_model_7 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 3"
                                                            name="customer_create_model_8"
                                                            value="<?php echo $customer_create_model_8 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 4"
                                                            name="customer_create_model_9"
                                                            value="<?php echo $customer_create_model_9 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 5"
                                                            name="customer_create_model_10"
                                                            value="<?php echo $customer_create_model_10 ?>" readonly>
                                                    </td>
                                                    <td><span class="badge bg-danger">Please Follow the Order</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col col-md-6 col-lg-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Platform</th>
                                                    <th>Morning
                                                        <br>9.00A.M-2.00P.M
                                                    </th>
                                                    <th>Afternoon
                                                        <br>3.00A.M-6.15P.M
                                                    </th>
                                                    <th>Follow The Order
                                                        <br>6.45A.M-9.00P.M
                                                    </th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php if($thebrokersite1 == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="thebrokersite1"
                                                                name="thebrokersite1" value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="thebrokersite1">thebrokersite.com</label>
                                                        </div>
                                                        <?php } elseif($thebrokersite1 == 0){ ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="thebrokersite1"
                                                                name="thebrokersite1" value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="thebrokersite1">thebrokersite.com</label>
                                                        </div>
                                                        <?php } if($pcexporters1 == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="pcexporters1" name="pcexporters1"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="pcexporters1">pcexporters.com</label>
                                                        </div>
                                                        <?php } elseif($pcexporters1 == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="pcexporters1" name="pcexporters1"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="pcexporters1">pcexporters.com</label>
                                                        </div>
                                                        <?php } if($facebook1 == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="facebook1" name="facebook1"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="facebook1">facebook</label>
                                                        </div>
                                                        <?php } elseif($facebook1 == 0) { ?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="facebook1" name="facebook1"
                                                                value="1">
                                                            <label class="label_values text-capitalize"
                                                                for="facebook1">facebook</label>
                                                        </div>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Model 1"
                                                            name="platform_create_model_1"
                                                            value="<?php echo $platform_create_model_1 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 2"
                                                            name="platform_create_model_2"
                                                            value="<?php echo $platform_create_model_2 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 3"
                                                            name="platform_create_model_3"
                                                            value="<?php echo $platform_create_model_3 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 4"
                                                            name="platform_create_model_4"
                                                            value="<?php echo $platform_create_model_4 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 5"
                                                            name="platform_create_model_5"
                                                            value="<?php echo $platform_create_model_5 ?>" readonly>
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Model 1"
                                                            name="platform_create_model_6"
                                                            value="<?php echo $platform_create_model_6 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 2"
                                                            name="platform_create_model_7"
                                                            value="<?php echo $platform_create_model_7 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 3"
                                                            name="platform_create_model_8"
                                                            value="<?php echo $platform_create_model_8 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 4"
                                                            name="platform_create_model_9"
                                                            value="<?php echo $platform_create_model_9 ?>" readonly>
                                                        <input type="text" class="form-control" placeholder="Model 5"
                                                            name="platform_create_model_10"
                                                            value="<?php echo $platform_create_model_10 ?>" readonly>
                                                    </td>
                                                    <td><span class="badge bg-danger">Please Follow the Order</span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <form method="POST">
                                    <?php if ($gt_c != null) { ?>
                                    <div class="d-flex">
                                        <div class="mt-1 mx-1">
                                            <p>Selected: </p>
                                        </div>
                                        <div class="">
                                            <p class="mt-1 mx-2 badge badge-btn badge-primary"><?php echo $gt_c; ?></p>
                                        </div>
                                    </div>
                                    <?php } else { ?>
                                    <div class="d-flex">
                                        <div class="mt-1 mx-1">
                                            <p>Please Select Country First: </p>
                                        </div>
                                        <div class="">
                                            <select name="choose_country" class="mt-1 mx-3" style="border-radius: 5px;"
                                                required>

                                                <option value="" selected>
                                                    -- Please Select Country--
                                                </option>
                                                <?php
                                              
                                                    $query = "SELECT create_customer_country FROM sales_create_customer_informations GROUP BY create_customer_country ORDER BY 'create_customer_country' ASC ";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>

                                                <option value="<?php echo $x["create_customer_country"]; ?>">
                                                    <?php echo $x["create_customer_country"]; ?>
                                                </option>
                                                <?php endwhile;  ?>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" name="get_country"
                                                class="btn btn-sm btn-primary px-2 mt-1" style="padding: 0;">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
                                <table class="table table-striped">
                                    <thead>
                                        <tr style="font-size: 10px;">
                                            <th>#</th>
                                            <!-- <th>Country</th> -->
                                            <th>Customer Name</th>
                                            <th>Whatsapp Number</th>
                                            <th>Platform</th>
                                            <th>Model He Selling/Buying?</th>
                                            <th>Posted Model 1</th>
                                            <th>Posted Model 2</th>
                                            <th>Customer Asking Model</th>
                                            <th>Customer Asking Price</th>
                                            <!-- <th>Customer Reponose</th> -->
                                            <th>He Can Pick Up From UAE?</th>
                                            <th>Posted Status</th>
                                            <th>Posted Date</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                        <?php                                                                               
                                                        
                                            $q_d = "SELECT * FROM sales_create_customer_informations WHERE create_customer_country = '{$gt_c}'";
                                            $qd_run = mysqli_query($connection, $q_d);

                                            $i = 0;

                                            foreach($qd_run as $qd_run){
                                                $create_customer_name = $qd_run['customer_name'];
                                                $created_customer_whatsapp_number = $qd_run['customer_whatsapp_number'];
                                                $create_customer_id = $qd_run['id'];
                                            
                                                $i++;

                                            $query1 = "SELECT * FROM sales_posting_to_customer WHERE posting_customer_name = '$create_customer_name' AND posting_whatsapp_number = '$created_customer_whatsapp_number'";
                                            $query_run2 = mysqli_query($connection, $query1);
                                            $post_status1 = 0;
                                            $created_posted_time = 0;
                                            $posting_whatsapp_number = 0;
                                            $posted_model_1 = 0;
                                            $posted_model_2 = 0;
                                            $customer_asking_model = 0;
                                            $customer_asking_price = 0;
                                            $uae_pickup2 = 0;

                                            foreach($query_run2 as $x){
                                                $post_status1 = $x['status'];
                                                $created_posted_time = $x['created_time'];
                                                $posting_customer_name = $x['posting_customer_name'];
                                                $posting_whatsapp_number = $x['posting_whatsapp_number'];
                                                $platform2 = $x['platform2'];
                                                $model_selling_and_buying1 = $x['model_selling_and_buying1'];
                                                $posted_model_1 = $x['posted_model_1'];
                                                $posted_model_2 = $x['posted_model_2'];
                                                $customer_asking_model = $x['customer_asking_model'];
                                                $customer_asking_price = $x['customer_asking_price'];
                                                $uae_pickup2 = $x['uae_pickup2'];                                                 

                                                // echo $created_posted_time;
                                                strtotime($created_posted_time);
                                                $x = date($created_posted_time);

                                                $today = Date('Y-m-d 00:00:00');

                                                //Create the first date object that will assign the current date
                                                $dateVal1 = date_create($today);
                                                //Create the second date object that will assign a particular date
                                                $dateVal2 = date_create($created_posted_time);

                                                $dateVal3 = date_create($created_posted_time);

                                                //Calculate the interval from the first date to the second date
                                                $ival = date_diff($dateVal2, $dateVal1);
                                                
                                                //Calculate the interval from the second date to the first date
                                                $ival = date_diff($dateVal1, $dateVal2);
                                                $x = $ival->format('%r%a');

                                            }                                                                                                                                                          
                                        ?>
                                        <tr>
                                            <form method="POST">
                                                <td>#</td>
                                                <td>
                                                    <input type="text" class="form-control" name="posting_customer_name"
                                                        value="<?php echo $create_customer_name; ?>" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="posting_whatsapp_number"
                                                        value="<?php echo $created_customer_whatsapp_number; ?>"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <?php if(($x == '-7') || ($platform2 == 0)) { ?>
                                                    <input type="text" class="form-control" name="platform2"
                                                        placeholder="Platform">
                                                    <?php }else { ?>
                                                    <input type="text" class="form-control" name="platform2"
                                                        value="<?php echo $platform2 ?>">
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if(($x == '-7') || ($model_selling_and_buying1 == 0)) { ?>
                                                    <input type="text" class="form-control"
                                                        name="model_selling_and_buying1"
                                                        placeholder="Model He Selling/Buying?">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control"
                                                        name="model_selling_and_buying1"
                                                        value="<?php echo $model_selling_and_buying1 ?>" readonly>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if(($x == '-7') || ($posted_model_1 == 0)) { ?>
                                                    <input type="text" class="form-control" name="posted_model_1"
                                                        placeholder="Posted Model 1">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="posted_model_1"
                                                        value="<?php echo $posted_model_1 ?>" readonly>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if(($x == '-7') || ($posted_model_2 == 0)) { ?>
                                                    <input type="text" class="form-control" name="posted_model_2"
                                                        placeholder="Posted Model">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="posted_model_2"
                                                        value="<?php echo $posted_model_2 ?>" readonly>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if(($x == '-7') || ($customer_asking_model == 0)) { ?>
                                                    <input type="text" class="form-control" name="customer_asking_model"
                                                        placeholder="Customer Asking Model">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="customer_asking_model"
                                                        value="<?php echo $customer_asking_model ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if(($x == '-7') || ($customer_asking_price == 0)) { ?>
                                                    <input type="text" class="form-control" name="customer_asking_price"
                                                        placeholder="Customer Asking Price">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="customer_asking_price"
                                                        value="<?php echo $customer_asking_price ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                                <td class="d-flex">
                                                    <?php if(($x == '-7') || ($customer_asking_price == 0)) { ?>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="uae_pickup2" name="uae_pickup2"
                                                            value="yes" required>
                                                        <label class="label_values" for="uae_pickup2"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="uae_pickup3" name="uae_pickup2"
                                                            value="no">
                                                        <label class="label_values" for="uae_pickup3">No
                                                        </label>
                                                    </div>
                                                    <?php } else { if($uae_pickup2 == 'yes') { ?>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="uae_pickup2" name="uae_pickup2"
                                                            value="yes" checked disabled>
                                                        <label class="label_values" for="uae_pickup2"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="uae_pickup3" name="uae_pickup2"
                                                            value="no" disabled>
                                                        <label class="label_values" for="uae_pickup3">No
                                                        </label>
                                                    </div>
                                                    <?php }if($uae_pickup2 == 'no') { ?>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="uae_pickup2" name="uae_pickup2"
                                                            value="yes" checked disabled>
                                                        <label class="label_values" for="uae_pickup2"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="uae_pickup3" name="uae_pickup2"
                                                            value="no" checked disabled>
                                                        <label class="label_values" for="uae_pickup3">No
                                                        </label>
                                                    </div>
                                                    <?php } } ?>
                                                </td>
                                                <td>
                                                    <?php if(($post_status1 == 0) || ($x == '-7')){ ?>
                                                    <div class="icheck-success d-inline">
                                                        <button class="btn btn-sm btn-primary px-2 mt-1" type="submit"
                                                            id="post" name="submit_post_to_customer"
                                                            style="padding: 0;">Post
                                                        </button>
                                                    </div>
                                                    <?php  } elseif($post_status1 == 'post') { ?>
                                                    <div class="icheck-success d-inline">
                                                        <button class="btn btn-sm btn-primary mt-1 px-1" type="submit"
                                                            id="posted" name="submit_post_to_customer" disabled
                                                            style="padding: 0;">Posted
                                                        </button>
                                                    </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($created_posted_time != 0 ) { ?>
                                                    <p style="font-size: 12px;"><?php echo $created_posted_time; ?></p>
                                                    <?php } if($created_posted_time == 0) { ?>
                                                    <p></p>
                                                    <?php } ?>
                                                </td>
                                            </form>
                                        </tr>
                                        <?php } ?>
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

<?php 

if(isset($_POST['submit_post_to_customer'])){

    $posting_customer_name = $_POST['posting_customer_name'];
    $posting_whatsapp_number = $_POST['posting_whatsapp_number'];
    $platform2 = $_POST['platform2'];
    $model_selling_and_buying1 = $_POST['model_selling_and_buying1'];
    $posted_model_1 = $_POST['posted_model_1'];
    $posted_model_2 = $_POST['posted_model_2'];
    $customer_asking_model = $_POST['customer_asking_model'];
    $customer_asking_price = $_POST['customer_asking_price'];
    $uae_pickup2 = $_POST['uae_pickup2'];

    $d_r = "INSERT INTO `sales_posting_to_customer`(`posting_customer_name`, `posting_whatsapp_number`, `platform2`, `model_selling_and_buying1`, `posted_model_1`, `posted_model_2`, `customer_asking_model`, `customer_asking_price`, `uae_pickup2`, `status`, `created_by`, `choose_country`) 
            VALUES ('{$posting_customer_name}', '{$posting_whatsapp_number}', '{$platform2}', '{$model_selling_and_buying1}', '{$posted_model_1}', '{$posted_model_2}', '{$customer_asking_model}', '{$customer_asking_price}', 
                    '{$uae_pickup2}', 'post','{$username}', '{$gt_c}') ";
                    echo $d_r;
    $d_r_run = mysqli_query($connection, $d_r);
    header("Location: create_post.php?choose_country={$gt_c}");
}

?>

<style>
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



<?php include_once("../includes/footer.php") ?>