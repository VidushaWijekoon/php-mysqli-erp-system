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

// $query = "SELECT * FROM weekly_sales_set_target
//             INNER JOIN weekly_sales_set_posting_to_customer 
//             ON weekly_sales_set_target.id = weekly_sales_set_posting_to_customer.member_id 
//             AND weekly_sales_set_target.day = weekly_sales_set_posting_to_customer.day
//             AND weekly_sales_set_target.sales_member = weekly_sales_set_posting_to_customer.sales_member
//             INNER JOIN weekly_sales_set_create_search_customer
//             ON weekly_sales_set_target.id = weekly_sales_set_create_search_customer.member_id
//             AND weekly_sales_set_target.day = weekly_sales_set_create_search_customer.day
//             AND weekly_sales_set_target.sales_member = weekly_sales_set_create_search_customer.sales_member
//             WHERE weekly_sales_set_target.sales_member = '$username' AND weekly_sales_set_create_search_customer.day = '{$currrent_date}'";
// $query_run = mysqli_query($connection, $query);
// foreach($query_run as $q){
//    $day = $q['day'];
//    $facebook = $q['facebook'];
//    $instagram = $q['instagram'];
//    $lazada = $q['lazada'];
//    $shoppe = $q['shoppe'];
//    $tokopedia = $q['tokopedia'];
//    $amazon_com = $q['amazon.com'];
//    $amazon_uk = $q['amazon.uk'];
//    $tiktok = $q['tiktok'];
//    $jiji_ng = $q['jiji.ng'];
//    $jiji_co_ke = $q['jiji.co.ke'];
//    $google = $q['google'];
//    $pcexporters = $q['pcexporters'];
//    $jumia = $q['jumia'];
//    $thebrokersite = $q['thebrokersite'];
//    $search_keyword_1 = $q['search_keyword_1'];
//    $search_keyword_2 = $q['search_keyword_2'];
//    $search_keyword_3 = $q['search_keyword_3'];
//    $search_keyword_4 = $q['search_keyword_4'];
//    $search_keyword_5 = $q['search_keyword_5'];
//    $customer_target_qty = $q['customer_target_qty'];
//    $customer_create_model_1 = $q['customer_create_model_1'];
//    $customer_create_model_2 = $q['customer_create_model_2'];
//    $customer_create_model_3 = $q['customer_create_model_3'];
//    $customer_create_model_4 = $q['customer_create_model_4'];
//    $customer_create_model_5 = $q['customer_create_model_5'];
//    $customer_create_model_6 = $q['customer_create_model_6'];
//    $customer_create_model_7 = $q['customer_create_model_7'];
//    $customer_create_model_8 = $q['customer_create_model_2'];
//    $customer_create_model_9 = $q['customer_create_model_9'];
//    $customer_create_model_10 = $q['customer_create_model_10'];
//    $thebrokersite1 = $q['thebrokersite1'];
//    $pcexporters1 = $q['pcexporters1'];
//    $facebook1 = $q['facebook1'];
//    $platform_create_model_1 = $q['platform_create_model_1'];
//    $platform_create_model_2 = $q['platform_create_model_2'];
//    $platform_create_model_3 = $q['platform_create_model_3'];
//    $platform_create_model_4 = $q['platform_create_model_4'];
//    $platform_create_model_5 = $q['platform_create_model_5'];
//    $platform_create_model_6 = $q['platform_create_model_6'];
//    $platform_create_model_7 = $q['platform_create_model_7'];
//    $platform_create_model_8 = $q['platform_create_model_8'];
//    $platform_create_model_9 = $q['platform_create_model_9'];
//    $platform_create_model_10 = $q['platform_create_model_110'];
// }

$currrent_date = date("l");

$gt_c = $_GET['choose_country'];

if(isset($_POST['get_country'])){
    $choose_country = $_POST['choose_country'];
    header("Location: create_customer_posting.php?choose_country=$choose_country");

    echo $choose_country;
}

?>

<div class="row page-titles">
    <div class="col-md-5 align-self-center"><a href="./sales_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-11 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="card card-success card-outline card-outline-tabs m-2 w-100">
                    <div class="card-header p-0 border-bottom-0">
                        <h6 class="p-3">Posting to Customer & Platform Task</h6>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- ============================================================== -->
                            <!-- Tab 1  -->
                            <!-- ============================================================== -->

                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
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
                                                    <td><span class="badge badge-info p-2"><?php echo $day; ?></span>
                                                    </td>
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
                                            <p class="mt-1 mx-2 badge badge-btn badge-primary"><?php echo $gt_c; ?>
                                            </p>
                                        </div>
                                        <div class="float-end mx-2" style="text-align: end;">
                                            <a href="./create_customer_posting.php"
                                                class="btn btn-sm btn-default mx-auto text-center">Clear</a>
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

                                                <option value="" selected>--Please Select Country--</option>
                                                <?php
                                              
                                                    $query = "SELECT create_customer_country, created_by FROM sales_create_customer_informations 
                                                            WHERE created_by = '$username' GROUP BY create_customer_country ORDER BY create_customer_country ASC";
                                                    $result = mysqli_query($connection, $query);

                                                    while ($x = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                                ?>

                                                <option value="<?php echo $x["create_customer_country"]; ?>">
                                                    <?php echo $x["create_customer_country"]; ?>
                                                </option>
                                                <?php endwhile;  ?>
                                            </select>
                                        </div>
                                        <div class="d-flex">
                                            <div class="float-end" style="text-align: end;">
                                                <button type="submit" name="get_country"
                                                    class="btn btn-sm btn-default mx-auto text-center">Search</button>
                                            </div>
                                            <div class="float-end mx-2" style="text-align: end;">
                                                <a href="./create_post.php"
                                                    class="btn btn-sm btn-default mx-auto text-center">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
                                <table id="example2" class="table table-striped">
                                    <thead>
                                        <tr style="font-size: 10px;">
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
                                            <th style="width: 100px;">Posted Date</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                        <?php      
                                            
                                            $q_d = "SELECT customer_name, customer_whatspp_phone_code, customer_whatsapp_number, platform1, uae_pickup1, id, model_selling_buying
                                                    FROM sales_create_customer_informations WHERE create_customer_country = '{$gt_c}' AND created_by = '$username'";
                                            $qd_run = mysqli_query($connection, $q_d);
                                            $test_id=0;
                                            foreach($qd_run as $qd_run){
                                                $create_customer_name = $qd_run['customer_name'];
                                                $customer_whatspp_phone_code = $qd_run['customer_whatspp_phone_code'];
                                                $created_customer_whatsapp_number = $qd_run['customer_whatsapp_number'];
                                                $created_platform = $qd_run['platform1'];
                                                $uae_pickup1 = $qd_run['uae_pickup1'];
                                                $create_customer_id = $qd_run['id'];                                                                                                                                 
                                                $model_selling_buying = $qd_run['model_selling_buying'];   
                                                $test_id= $create_customer_id;   
                                                $contact = $customer_whatspp_phone_code . $created_customer_whatsapp_number;                                                                                                                                                                           
                                         
                                            $query1 = "SELECT status, created_time, posting_customer_name, posting_contact_number, platform2, model_selling_and_buying1, posted_model_1, posted_model_2, customer_asking_model, customer_asking_price, uae_pickup2
                                                    FROM sales_posting_to_customer 
                                                    WHERE posting_customer_name = '$create_customer_name' AND posting_contact_number = '$contact'";
                                            $query_run2 = mysqli_query($connection, $query1);
                                            $post_status1 = 0;
                                            $created_posted_time = 0;
                                            $posting_whatsapp_number = 0;
                                            $posted_model_1 = 0;
                                            $posted_model_2 = 0;
                                            $model_selling_and_buying1 = null;
                                            $customer_asking_model = 0;
                                            $customer_asking_price = 0;
                                            $uae_pickup2 = 0;
                                            $i = 0;
       
                                            if(empty($query_run2)){}else{
                                            foreach($query_run2 as $x){
                                                $i++;
                                                $post_status1 = $x['status'];
                                                $created_posted_time = $x['created_time'];
                                                $posting_customer_name = $x['posting_customer_name'];
                                                $posting_phone_code = $x['posting_phone_code'];
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
                                            }  }                                          
                                                                                                                                                                                                   
                                        ?>
                                        <tr>
                                            <form method="POST">
                                                <td class="d-none"><?= $i ?></td>
                                                <td>
                                                    <input type="text" class="form-control w-100" name="customer_name"
                                                        id="customer_name" readonly
                                                        value="<?php echo $create_customer_name; ?>">

                                                </td>

                                                <td>
                                                    <input type="text" class="form-control w-100" name="contact_number"
                                                        id="customer_name" readonly
                                                        value="<?php echo $customer_whatspp_phone_code . $created_customer_whatsapp_number ?>">

                                                </td>
                                                <td>
                                                    <input type="text" class="form-control w-100" name="platform2"
                                                        id="customer_name" readonly
                                                        value="<?php echo $created_platform; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control w-100"
                                                        name="model_selling_and_buying1" id="customer_name" readonly
                                                        value="<?php echo $model_selling_buying; ?>">
                                                </td>

                                                <td>
                                                    <?php if(($x <= '-4') || ($posted_model_1 == 0)) { ?>
                                                    <input type="text" class="form-control" name="posted_model_1"
                                                        placeholder="Posted Model 1">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="posted_model_1"
                                                        value="<?php echo $posted_model_1 ?>" readonly>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if(($x <= '-4') || ($posted_model_2 == 0)) { ?>
                                                    <input type="text" class="form-control" name="posted_model_2"
                                                        placeholder="Posted Model">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="posted_model_2"
                                                        value="<?php echo $posted_model_2 ?>" readonly>
                                                    <?php } ?>
                                                </td>

                                                <td>
                                                    <?php if(($x <= '-4') || ($customer_asking_model == 0)) { ?>
                                                    <input type="text" class="form-control" name="customer_asking_model"
                                                        placeholder="Customer Asking Model">
                                                    <?php } else { ?>
                                                    <input type="text" class="form-control" name="customer_asking_model"
                                                        value="<?php echo $customer_asking_model ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if(($x <= '-4') || ($customer_asking_price == 0)) { ?>
                                                    <input type="text" min="1" class="form-control"
                                                        name="customer_asking_price"
                                                        placeholder="Customer Asking Price">
                                                    <?php } else { ?>
                                                    <input type="text" min="1" class="form-control"
                                                        name="customer_asking_price"
                                                        value="<?php echo $customer_asking_price ?>" readonly>
                                                    <?php } ?>
                                                </td>
                                                <td class="d-flex">
                                                    <?php if($uae_pickup1 == 'yes') { ?>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="keyboard_light_1" name="uae_pickup2"
                                                            value="yes" checked disabled>
                                                        <label class="label_values" for="keyboard_light_1"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="keyboard_light_2" name="uae_pickup2"
                                                            value="no" disabled>
                                                        <label class="label_values" for="keyboard_light_2">No
                                                        </label>
                                                    </div>
                                                    <?php }if($uae_pickup1 == 'no') { ?>
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" id="keyboard_light_1" name="uae_pickup2"
                                                            value="yes" disabled>
                                                        <label class="label_values" for="keyboard_light_1"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" id="keyboard_light_2" name="uae_pickup2"
                                                            value="no" disabled checked>
                                                        <label class="label_values" for="keyboard_light_2">No
                                                        </label>
                                                    </div>
                                                    <?php }if($uae_pickup1 == 'n/a') {?>
                                                    <div class="">
                                                        <input type="radio" id="keyboard_light_1" name="uae_pickup2"
                                                            value="yes">
                                                        <label class="label_values" for="keyboard_light_1"
                                                            style="margin-right: 15px;">Yes
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <input type="radio" id="keyboard_light_2" name="uae_pickup2"
                                                            value="no">
                                                        <label class="label_values" for="keyboard_light_2">No
                                                        </label>
                                                    </div>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if(($post_status1 == 0) || ($x <= '-4')){ ?>
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
                                                    <p style="font-size: 12px;"><?php echo $created_posted_time; ?>
                                                    </p>
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
    $create_customer_name= $_POST['customer_name'];
    $contact_number= $_POST['contact_number'];
    $platform2= $_POST['platform2'];
    $model_selling_and_buying1= $_POST['model_selling_and_buying1'];
    $choose_country = $_GET['choose_country'];
    $posted_model_1 = $_POST['posted_model_1'];
    $posted_model_2 = $_POST['posted_model_2'];
    $customer_asking_model = $_POST['customer_asking_model'];
    $customer_asking_price = $_POST['customer_asking_price'];
    $uae_pickup2 = $_POST['uae_pickup2'];
    $test_id = $_POST['test_id'];
    
    $d_r = "INSERT INTO sales_posting_to_customer(`posting_customer_name`, `posting_contact_number`, `platform2`, `model_selling_and_buying1`, `posted_model_1`, `posted_model_2`, `customer_asking_model`, `customer_asking_price`, `uae_pickup2`, `status`, `created_by`, `choose_country`) 
                VALUES  ('$create_customer_name', '$contact_number', '$platform2', '$model_selling_and_buying1', '$posted_model_1', '$posted_model_2', '$customer_asking_model', '$customer_asking_price', 
                    '$uae_pickup2', 'post','$username', '$gt_c') ";     
    $d_r_run = mysqli_query($connection, $d_r);
    
    header("Location: create_customer_posting.php?choose_country=$choose_country");
    
}

?>

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

.form-check-input,
input[type="radio"],
input[type="checkbox"] {
    width: 1.6em;
    height: 0.65em;
    /* border-radius: 50%; */
    transform: scale(2);
}
</style>

<script>
$(document).ready(function() {
    $("#country_name").on("change", function() {
        var country_name = $("#country_name").val();
        var getURL = "get_phone_code.php?country_name=" + country_name;
        $.get(getURL, function(data, status) {
            $("#create_phone_code").html(data);
        });
    });
});
</script>

<?php include_once('../includes/footer.php'); }else{
        die(access_denied());
} ?>