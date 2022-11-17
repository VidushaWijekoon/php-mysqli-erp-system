<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>
<?php 
 error_reporting (E_ALL ^ E_NOTICE);
$promo_type ;
$catelog_sku ;
$brand ;
$model = null;
$size ;
$generation ;
$core ;
$ram ;
$hdd ;
$our_wholesale_price ;
$our_current_noon_price; 
$other_noon_price ;
$amazon_price;
$cartlow_price; 
$cost_with_windows_ac; 
$gross_profit;
$noon_charges;
$noon_sale_price; 
$noon_paid ;
$noon_net_profit; 
$profit_percentage; 
if (isset($_POST['submit'])) {
    $promo_type = mysqli_real_escape_string($connection, $_POST['promo_type']);
    $catelog_sku = mysqli_real_escape_string($connection, $_POST['catelog_sku']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $model = mysqli_real_escape_string($connection, $_POST['model']);
    $size = mysqli_real_escape_string($connection, $_POST['size']);
    $generation = mysqli_real_escape_string($connection, $_POST['generation']);
    $core = mysqli_real_escape_string($connection, $_POST['core']);
    $ram = mysqli_real_escape_string($connection, $_POST['ram']);
    $hdd = mysqli_real_escape_string($connection, $_POST['hdd']);
    $our_wholesale_price = mysqli_real_escape_string($connection, $_POST['our_wholesale_price']);
    $our_current_noon_price = mysqli_real_escape_string($connection, $_POST['our_current_noon_price']);
    $other_noon_price = mysqli_real_escape_string($connection, $_POST['other_noon_price']);
    $amazon_price = mysqli_real_escape_string($connection, $_POST['amazon_price']);
    $cartlow_price = mysqli_real_escape_string($connection, $_POST['cartlow_price']);
    $cost_with_windows_ac = mysqli_real_escape_string($connection, $_POST['cost_with_windows_ac']);
    $gross_profit = mysqli_real_escape_string($connection, $_POST['gross_profit']);
    $noon_charges = mysqli_real_escape_string($connection, $_POST['noon_charges']);
    $noon_sale_price = mysqli_real_escape_string($connection, $_POST['noon_sale_price']);
    $noon_paid = mysqli_real_escape_string($connection, $_POST['noon_paid']);
    $noon_net_profit = mysqli_real_escape_string($connection, $_POST['noon_net_profit']);
    $profit_percentage = mysqli_real_escape_string($connection, $_POST['profit_percentage']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $qty = mysqli_real_escape_string($connection, $_POST['qty']);
    $exp_date = mysqli_real_escape_string($connection, $_POST['exp_date']);
    $query = "SELECT * FROM `e_com_listing` WHERE `brand`='$brand' AND`model`='$model' AND`cpu`='$cpu' AND`generation`='$generation' AND`ram`='$ram' AND`hdd`='$hdd' AND`size`='$size' ";
        $query_run = mysqli_query($connection, $query);
        $rowcount = mysqli_num_rows($query_run);
    if($catelog_sku != null AND $rowcount ==0){
        
   
    $query = "INSERT INTO `e_com_listing`(
        `promo_type`,
        `catelog_sku`,
        `brand`,
        `model`,
        `size`,
        `generation`,
        `cpu`,
        `ram`,
        `hdd`,
        `our_wholesale_price`,
        `our_current_noon_price`,
        `other_noon_price`,
        `amazon_price`,
        `cartlow_price`,
        `cost_with_windows_ac`,
        `gross_profit`,
        `noon_charges`,
        `noon_sale_price`,
        `noon_paid`,
        `noon_net_profit`,
        `profit_percentage`,
        created_by,
        exp_date,
        status,
        qty
    )
    VALUES(
        '$promo_type ',
        '$catelog_sku ',
        '$brand ',
        '$model ',
        '$size ',
        '$generation ',
        '$core ',
        '$ram ',
        '$hdd ',
        '$our_wholesale_price ',
        '$our_current_noon_price', 
        '$other_noon_price ',
        '$amazon_price',
        '$cartlow_price', 
        '$cost_with_windows_ac', 
        '$gross_profit',
        '$noon_charges',
        '$noon_sale_price', 
        '$noon_paid ',
        '$noon_net_profit', 
        '$profit_percentage',
        'add his name from session',
        '$exp_date',
        '$status',
        '$qty'
        
    )";
    $query_run = mysqli_query($connection, $query);
    }
}
?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa-solid fa-people-group" aria-hidden="true"></i> E-Commerce Dashboard
        </h3>
    </div>

</div>


<div class="row m-2">
    <div class="col-12 col-sm-6 col-md-3">
        <a href="e_com_daily_work_sheet_insert_form.php">
            <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1"><i class="fa-solid fa-plane"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Let Go NOON</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </a>
        <!-- /.info-box -->
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col grid-margin stretch-card justify-content-center mx-auto mt-2">
            <form name="myForm" action="" method="POST" onSubmit="window.location.reload()">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Promo Type </th>
                            <th>Catelog SKU </th>
                            <th>Brand </th>
                            <th>Model </th>
                            <th>Size </th>
                            <th>CPU </th>
                            <th>Generation </th>
                            <th>RAM </th>
                            <th>HDD </th>
                            <th>QTY </th>
                            <th>Our Wholesale Price </th>
                            <th>Our Current Noon Price</th>
                            <th>Other Noon Price </th>
                            <th>Amazon Price</th>
                            <th>Cartlow Price</th>
                            <th>Cost With Windows AC</th>
                            <th>gross Profit</th>
                            <th>Noon Charges</th>
                            <th>Noon Sale Price</th>
                            <th>Noon Paid </th>
                            <th>Noon Net Profit</th>
                            <th>Profit Percentage</th>
                            <th>End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <fieldset class="mx-3 my-2">
                                <td><select name="status" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select Status--</option>

                                        <option value="prepared for listing">
                                            <?php echo "Prepared for listing"; ?>
                                        </option>
                                        <option value="listing submitted">
                                            <?php echo "Listing submitted"; ?>
                                        </option>
                                        <option value="listing approved">
                                            <?php echo "Listing approved"; ?>
                                        </option>
                                        <option value="listed done on noon">
                                            <?php echo "Listed done on noon"; ?>
                                        </option>
                                        <option value="promotion">
                                            <?php echo "Promotion"; ?>
                                        </option>
                                        <option value="FBN Done">
                                            <?php echo "FBN Done"; ?>
                                        </option>
                                        <option value="S/O Created">
                                            <?php echo "S/O Created"; ?>
                                        </option>
                                    </select> </td>
                                <td><select name="promo_type" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select Promotion Type--</option>

                                        <option value="weekly">
                                            <?php echo "weekly"; ?>
                                        </option>
                                        <option value="11:11">
                                            <?php echo "11:11"; ?>
                                        </option>
                                        <option value="B friday">
                                            <?php echo "B friday"; ?>
                                        </option>
                                        <option value="Christmas">
                                            <?php echo "Christmas"; ?>
                                        </option>
                                    </select> </td>
                                <td> <input type="text" class="form-control" placeholder="Catalog SKU"
                                        name="catelog_sku"> </td>
                                <td> <?php $query ="SELECT * FROM `brand`"; 
                                $query_run = mysqli_query($connection, $query);
                                $brand="" ;
                                foreach($query_run as $data){
                                    $brand .= "<option value=\"{$data['brand']}\">{$data['brand']}</option>";
                                }
                                    ?>
                                    <select name="brand" id="brand" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select brand--</option>
                                        <?php echo $brand ?>
                                    </select>
                                </td>
                                <td>
                                    <select name="model" id="model" class="info_select" style="border-radius: 5px;">
                                    </select>
                                </td>
                                <td><select name="size" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select Size--</option>
                                        <option value="14">
                                            <?php echo "14"; ?>
                                        </option>
                                        <option value="11">
                                            <?php echo "11"; ?>
                                        </option>
                                        <option value="12.5">
                                            <?php echo "12.5"; ?>
                                        </option>
                                        <option value="15">
                                            <?php echo "15"; ?>
                                        </option>
                                    </select> </td>
                                <td>
                                    <select id="core" name="core" class="info_select" style="border-radius: 5px;">
                                    </select>
                                </td>
                                <td>
                                    <select id="generation" name="generation" class="info_select"
                                        style="border-radius: 5px;">
                                    </select>
                                </td>
                                <td> <select name="ram" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select RAM--</option>

                                        <option value="2">
                                            <?php echo "2GB"; ?>
                                        </option>
                                        <option value="4">
                                            <?php echo "4GB"; ?>
                                        </option>
                                        <option value="8">
                                            <?php echo "8GB"; ?>
                                        </option>
                                        <option value="16">
                                            <?php echo "16GB"; ?>
                                        </option>
                                    </select></td>

                                <td><select name="hdd" class="info_select" style="border-radius: 5px;">
                                        <option selected>--Select HDD--</option>

                                        <option value="16">
                                            <?php echo "16GB"; ?>
                                        </option>
                                        <option value="32">
                                            <?php echo "32GB"; ?>
                                        </option>
                                        <option value="128">
                                            <?php echo "128GB"; ?>
                                        </option>
                                        <option value="256">
                                            <?php echo "256GB"; ?>
                                        </option>
                                    </select> </td>
                                <td>
                                    <select id="qty" name="qty" class="info_select" style="border-radius: 5px;">
                                    </select>
                                </td>

                                <td> <input type="text" name="our_wholesale_price" id="value" class="form-control"
                                        placeholder="Our Wholesale Price" onblur="getCost()"> </td>
                                <td> <input type="number" name="our_current_noon_price" class="form-control"
                                        placeholder="Our Current Noon Price"> </td>
                                <td> <input type="number" class="form-control" placeholder="Othe Non Price"
                                        name="other_noon_price"></td>
                                <td><input type="number" class="form-control" placeholder="Amazon Price"
                                        name="amazon_price">
                                </td>
                                <td><input type="number" class="form-control" placeholder="Cartlow Price"
                                        name="cartlow_price">
                                </td>
                                <td><input type="number" name="cost_with_windows_ac" id="amount" class="form-control"
                                        placeholder="Cost(AED)+Windows 10 + AC"> </td>
                                <td> <input type="text" name="gross_profit" id="gross_profit" class="form-control"
                                        placeholder="Gross Profit (x)" onblur="getGrossProfit()"></td>
                                <td><input type="text" name="noon_charges" id="noon_charges" class="form-control"
                                        placeholder="Noon Charges (11%)" readonly> </td>
                                <td><input type="text" name="noon_sale_price" id="noon_sale_price" class="form-control"
                                        placeholder="Noon Selling Price" readonly> </td>
                                <td><input type="text" name="noon_paid" id="noon_paid" class="form-control"
                                        placeholder="Noon Selling Price" readonly> </td>
                                <td> <input type="text" name="noon_net_profit" id="noon_net_profit" class="form-control"
                                        placeholder="Noon Selling Price" readonly> </td>
                                <td>
                                    <input type="text" name="profit_percentage" id="profit_percentage"
                                        class="form-control" placeholder="Noon Selling Price" readonly>
                                </td>
                                <td><input type="date" name="exp_date"
                                        value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>"
                                        class="form-control"></td>

                            </fieldset>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submit"
                    class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                        style="margin-right: 5px;"></i>submit
                </button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col grid-margin stretch-card justify-content-center mx-auto mt-2">

            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Status </th>
                        <th>Promo Type </th>
                        <th>Catelog SKU </th>
                        <th>Brand </th>
                        <th>Model </th>
                        <th>Size </th>
                        <th>CPU </th>
                        <th>Generation </th>
                        <th>RAM </th>
                        <th>HDD </th>
                        <th>QTY </th>
                        <th>Our Wholesale Price </th>
                        <th>Our Current Noon Price</th>
                        <th>Other Noon Price </th>
                        <th>Amazon Price</th>
                        <th>Cartlow Price</th>
                        <th>Cost With Windows AC</th>
                        <th>gross Profit</th>
                        <th>Noon Charges</th>
                        <th>Noon Sale Price</th>
                        <th>Noon Paid </th>
                        <th>Noon Net Profit</th>
                        <th>Profit Percentage</th>
                        <th>EXP Date </th>
                        <th>Created Name </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $promo_type ;
                        $catelog_sku ;
                        $brand ;
                        $model ;
                        $size ;
                        $generation ;
                        $core ;
                        $ram ;
                        $hdd ;
                        $our_wholesale_price ;
                        $our_current_noon_price;
                        $other_noon_price ;
                        $amazon_price;
                        $cartlow_price;
                        $cost_with_windows_ac;
                        $gross_profit;
                        $noon_charges;
                        $noon_sale_price;
                        $noon_paid ;
                        $noon_net_profit;
                        $profit_percentage;
                        $query_get = "SELECT * FROM `e_com_listing` ORDER BY created_date DESC";
                        $query_run = mysqli_query($connection, $query_get);
                    
                    ?>
                    <?php 
                foreach($query_run as $data){
                    $promo_type =$data['promo_type'];
                    $catelog_sku  =$data['catelog_sku'];
                    $brand  =$data['brand'];
                    $model  =$data['model'];
                    $size  =$data['size'];
                    $generation  =$data['generation'];
                    $core =$data['cpu'] ;
                    $ram  =$data['ram'];
                    $hdd  =$data['hdd'];
                    $our_wholesale_price  =$data['our_wholesale_price'];
                    $our_current_noon_price =$data['our_current_noon_price'];
                    $other_noon_price  =$data['other_noon_price'];
                    $amazon_price =$data['amazon_price'];
                    $cartlow_price =$data['cartlow_price'];
                    $cost_with_windows_ac =$data['cost_with_windows_ac'];
                    $gross_profit =$data['gross_profit'];
                    $noon_charges =$data['noon_charges'];
                    $noon_sale_price =$data['noon_sale_price'];
                    $noon_paid  =$data['noon_paid'];
                    $noon_net_profit =$data['noon_net_profit'];
                    $profit_percentage =$data['profit_percentage'];
                    $status =$data['status'];
                    $qty =$data['qty'];
                    $exp_date =$data['exp_date'];
                    $created_by =$data['created_by'];
                    ?>
                    <tr>
                        <td><?php echo $status ?></td>
                        <td><?php echo $promo_type ?> </td>
                        <td><?php echo $catelog_sku ?> </td>
                        <td><?php echo $brand ?> </td>
                        <td><?php echo $model ?> </td>
                        <td><?php echo $size ?> </td>
                        <td><?php echo $core ?> </td>
                        <td><?php echo $generation ?> </td>
                        <td><?php echo $ram ?> </td>
                        <td><?php echo $qty ?> </td>
                        <td><?php echo $hdd ?> </td>
                        <td><?php echo $our_wholesale_price ?> </td>
                        <td><?php echo $our_current_noon_price?> </td>
                        <td><?php echo $other_noon_price ?> </td>
                        <td><?php echo $amazon_price?> </td>
                        <td><?php echo $cartlow_price?> </td>
                        <td><?php echo $cost_with_windows_ac?> </td>
                        <td><?php echo $gross_profit?> </td>
                        <td><?php echo $noon_charges?> </td>
                        <td><?php echo $noon_sale_price?> </td>
                        <td><?php echo $noon_paid ?> </td>
                        <td><?php echo $noon_net_profit?> </td>
                        <td><?php echo $profit_percentage?> </td>
                        <td><?php echo $exp_date ?> </td>
                        <td><?php echo $created_by ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script>
var sum = 0;
var cost = 0;
var model;
var brand;
var core;
var windows_with_ac = 120;

$(document).ready(function() {
    $("#brand").on("change", function() {
        brand = $("#brand").val();
        var getURL = "get-model.php?brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#model").html(data);
        });
    });
});

$(document).ready(function() {
    $("#model").on("change", function() {
        var model = $("#model").val();
        console.log("i am here");
        console.log(model);
        var getURL = "get-cpu.php?model=" + model + "&brand=" + brand;
        $.get(getURL, function(data, status) {
            $("#core").html(data);
        });
    });
});

$(document).ready(function() {
    $("#core").on("change", function() {
        model = $("#model").val();
        core = $("#core").val();
        var getURL = "get-generation.php?model=" + model + "&core=" + core;
        $.get(getURL, function(data, status) {
            $("#generation").html(data);
        });
    });
});
model = $("#model").val();
core = $("#core").val();
brand = $("#brand").val();
$(document).ready(function() {
    $("#generation").on("change", function() {

        var generation = $("#generation").val();
        var getURL = "get-qty.php?model=" + model + "&core=" + core + "&generation=" +
            generation + "&brand=" +
            brand;
        $.get(getURL, function(data, status) {
            $("#qty").html(data);
        });
    });
});


const getCost = () => {
    var value = $('#value').val();

    sum += +value;
    sum += +windows_with_ac;
    cost = sum;
    $('#amount').val(sum);
}
const getGrossProfit = () => {

    var value = $('#value').val();
    var gross_profit = $('#gross_profit').val();
    var courier_fee = 13.5;
    var sum = 0;
    sum += +value;
    sum += +windows_with_ac;
    sum += +gross_profit;
    sum += +courier_fee;
    $('#noon_sale_price').val(sum);
    var percentage = 11;
    var noon_charges = sum * percentage / 100;
    $('#noon_charges').val(noon_charges);

    sum += -courier_fee;
    sum += -noon_charges;
    var noon_paid = sum;
    $('#noon_paid').val(noon_paid);

    var noon_net_profit = noon_paid - cost;
    console.log(cost);
    $('#noon_net_profit').val(noon_net_profit);

    var profit_percentage = 0;
    profit_percentage = (noon_net_profit / cost) * 100;
    $('#profit_percentage').val(profit_percentage);
}
</script>

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<script>
$(document).ready(function() {
    $('#example1').dataTable();
});
</script>
<?php include_once('../includes/footer.php'); ?>