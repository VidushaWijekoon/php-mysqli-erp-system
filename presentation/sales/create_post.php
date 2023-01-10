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


?>



<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="card card-success card-outline card-outline-tabs m-2 w-100">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item text-center" style="width: 350px;">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true" style="color: #fff;">Create and Search Customer Task</a>
                            </li>
                            <li class="nav-item text-center" style="width: 350px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false" style="color: #fff;">Posting to Customer & Platform Task</a>
                            </li>
                        </ul>
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
                                            <td><?php echo $currrent_date; ?></td>
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
                                                        <?php } elseif($facebook == 0) {?>
                                                        <div class="icheck-success d-none">
                                                            <input type="checkbox" id="facebook" name="facebook"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="facebook">Facebook</label>
                                                        </div>
                                                        <?php } if($instagram == 1) { ?>
                                                        <div class="icheck-success">
                                                            <input type="checkbox" id="instagram" name="instagram"
                                                                value="1" checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="instagram">Instagram</label>
                                                        </div>
                                                        <?php } elseif($instagram == 0) { ?>
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
                                                            <input type="checkbox" id="tiktok" name="tiktok" value="1"
                                                                checked disabled>
                                                            <label class="label_values text-capitalize"
                                                                for="tiktok">Tiktok</label>
                                                        </div>
                                                        <?php } elseif($tiktok == 0) { ?>
                                                        <div class="icheck-success">
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
                                </table>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Tab 2  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
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
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-success mx-2" data-toggle="collapse"
                        data-target="#daily_post">
                        <i class="fas fa-plus mx-2"></i>
                        Daily Posting to Customer
                    </button>

                    <button type="button" class="btn btn-sm btn-success mx-2" data-toggle="collapse"
                        data-target="#customer_details">
                        <i class="fas fa-plus mx-2"></i>
                        Daily Create & Search Customer
                    </button>
                    <div id="daily_post" class="collapse">

                        <div class="card-body">
                            <h6>Create Posting to Customer</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Country</th>
                                        <th>Customer Name</th>
                                        <th>Whatsapp Number</th>
                                        <th>Posted Model</th>
                                        <th>Posting Status</th>
                                        <th>Model He Instrested</th>
                                        <th>Custromer Asking Price</th>
                                        <th>He Can Pick Up From UAE?</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Country--</option>
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
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Customer Name">
                                        </td>

                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Whatsapp Number">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Posted Model">
                                        </td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Posting Status--</option>
                                                <option value>Yes</option>
                                                <option value>No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Model he Insterested">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Enter the Customer Price">
                                        </td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Pickup--</option>
                                                <option value>Yes</option>
                                                <option value>No</option>
                                            </select>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="customer_details" class="collapse">
                        <div class="card-body">
                            <h6> Daily Create & Search Customer</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Country</th>
                                        <th>Customer Name</th>
                                        <th>Whatsapp Number</th>
                                        <th>Posted Model</th>
                                        <th>Posting Status</th>
                                        <th>Model He Instrested</th>
                                        <th>Custromer Asking Price</th>
                                        <th>He Can Pick Up From UAE?</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Country--</option>
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
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Customer Name">
                                        </td>

                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Whatsapp Number">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Posted Model">
                                        </td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Posting Status--</option>
                                                <option value>Yes</option>
                                                <option value>No</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Model he Insterested">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="billing_city"
                                                placeholder="Enter the Customer Price">
                                        </td>
                                        <td>
                                            <select name="billing_country_region" class="info_select w-75"
                                                style="border-radius: 5px;">
                                                <option value="" selected>--Select Pickup--</option>
                                                <option value>Yes</option>
                                                <option value>No</option>
                                            </select>
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