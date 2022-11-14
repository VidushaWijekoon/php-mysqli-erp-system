<?php 
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

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class=" card mt-4">
                <form action="" method="POST">
                    <fieldset class="mx-3 my-2">
                        <legend>Create New Listing</legend>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Promotion Type</label>
                            <div class="col-sm-8">
                                <select name="promo_type" class="info_select" style="border-radius: 5px;">
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Catalog SKU</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder="Catalog SKU" name="catelog_sku">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-8">
                                <?php $query ="SELECT * FROM `brand`"; 
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <select name="brand" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Brand--</option>
                                    <?php foreach($query_run as $data){
                                        ?>
                                    <option value="<?php echo $data["brand"]; ?>">
                                        <?php echo strtoupper($data["brand"]); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Model</label>
                            <div class="col-sm-8">
                                <select name="model" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Model--</option>

                                    <option value="T480">
                                        <?php echo "T480"; ?>
                                    </option>
                                    <option value="T530">
                                        <?php echo "T530"; ?>
                                    </option>
                                    <option value="820 G3">
                                        <?php echo "820 G3"; ?>
                                    </option>
                                    <option value="T420">
                                        <?php echo "T420"; ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Size</label>
                            <div class="col-sm-8">
                                <select name="size" class="info_select" style="border-radius: 5px;">
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Generation</label>
                            <div class="col-sm-8">
                                <?php $query ="SELECT * FROM `generation`"; 
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <select name="generation" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select Gen--</option>
                                    <?php foreach($query_run as $data){
                                        ?>
                                    <option value="<?php echo $data["generation"]; ?>">
                                        <?php echo strtoupper($data["generation"]); ?>
                                    </option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">CPU</label>
                            <div class="col-sm-8">
                                <?php $query ="SELECT * FROM `core`"; 
                                $query_run = mysqli_query($connection, $query);
                                ?>
                                <select name="cpu" class="info_select" style="border-radius: 5px;">
                                    <option selected>--Select CPU--</option>
                                    <?php foreach($query_run as $data){
                                        ?>
                                    <option value="<?php echo $data["core"]; ?>">
                                        <?php echo strtoupper($data["core"]); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">RAM</label>
                            <div class="col-sm-8">
                                <select name="ram" class="info_select" style="border-radius: 5px;">
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">HDD</label>
                            <div class="col-sm-8">
                                <select name="hdd" class="info_select" style="border-radius: 5px;">
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
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Our Wholesale Price</label>
                            <div class="col-sm-8">
                                <input type="text" name="our_wholesale_price" id="value" class="form-control"
                                    placeholder="Our Wholesale Price" onblur="getCost()">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Our Current Noon Price</label>
                            <div class="col-sm-8">
                                <input type="number" name="our_current_noon_price" class="form-control"
                                    placeholder="Our Current Noon Price">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Other Noon Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="Othe Non Price"
                                    name="other_noon_price">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Amazon Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="Amazon Price"
                                    name="amazon_price">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Cartlow Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" placeholder="Cartlow Price"
                                    name="cartlow_price">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Cost(AED)+Windows 10 + AC</label>
                            <div class="col-sm-8">
                                <input type="number" name="cost_with_windows_ac" id="amount" class="form-control"
                                    placeholder="Cost(AED)+Windows 10 + AC">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Gross Profit (x)</label>
                            <div class="col-sm-8">
                                <input type="text" name="gross_profit" id="gross_profit" class="form-control"
                                    placeholder="Gross Profit (x)" onblur="getGrossProfit()">
                            </div>
                        </div>
                        <div class=" row">
                            <label class="col-sm-3 col-form-label">Noon Charges (11%)</label>
                            <div class="col-sm-8">
                                <input type="text" name="noon_charges" id="noon_charges" class="form-control"
                                    placeholder="Noon Charges (11%)" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Noon Sele Price</label>
                            <div class="col-sm-8">
                                <input type="text" name="noon_sale_price" id="noon_sale_price" class="form-control"
                                    placeholder="Noon Selling Price" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Noon Paid</label>
                            <div class="col-sm-8">
                                <input type="text" name="noon_paid" id="noon_paid" class="form-control"
                                    placeholder="Noon Selling Price" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Noon Net Profit</label>
                            <div class="col-sm-8">
                                <input type="text" name="noon_net_profit" id="noon_net_profit" class="form-control"
                                    placeholder="Noon Selling Price" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Profit Percentage</label>
                            <div class="col-sm-8">
                                <input type="text" name="profit_percentage" id="profit_percentage" class="form-control"
                                    placeholder="Noon Selling Price" readonly>
                            </div>
                        </div>

                        <button type="submit" name="submit"
                            class="btn mb-2 mt-4 btn-primary btn-sm d-block mx-auto text-center"><i
                                class="fa-solid fa-user" style="margin-right: 5px;"></i>Create List</button>
                    </fieldset>

                </form>

            </div>
            <!--/col-->
        </div>
    </div>
</div>
<?php 
$promo_type ;
$catelog_sku ;
$brand ;
$model ;
$size ;
$generation ;
$cpu ;
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
    $cpu = mysqli_real_escape_string($connection, $_POST['cpu']);
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
        created_by
    )
    VALUES(
        '$promo_type ',
        '$catelog_sku ',
        '$brand ',
        '$model ',
        '$size ',
        '$generation ',
        '$cpu ',
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
        'add his name from session'
    )";
    echo $query;
    $query_run = mysqli_query($connection, $query);
        
    header("location: e_com_daily_work_sheet.php");
}
?>
<script>
var sum = 0;
var cost = 0;
const getCost = () => {
    var value = $('#value').val();
    var windows_with_ac = 120;
    sum += +value;
    sum += +windows_with_ac;
    cost = value;
    $('#amount').val(sum);
}
const getGrossProfit = () => {

    var value = $('#value').val();
    var gross_profit = $('#gross_profit').val();
    var courier_fee = 13.5;
    var sum = 0;
    sum += +value;
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
    $('#noon_net_profit').val(noon_net_profit);

    var profit_percentage = 0;
    profit_percentage = (noon_net_profit / cost) * 100;
    $('#profit_percentage').val(profit_percentage);
}
</script>