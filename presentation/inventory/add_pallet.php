
<?php
ob_start();
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
?>
<?php
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
$save = 0;
$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
$pallet_id ='null';
if(empty($_GET['save'])){}else{
    $save = $_GET['save'];
    $pallet_id = $_GET['pallet_id'];
}
if(empty($_GET['save2'])){}else{
    $save = $_GET['save2'];
    $pallet_id = $_GET['pallet_id'];
}
if(empty($_GET['save3'])){}else{
    $save = $_GET['save3'];
    $pallet_id = $_GET['pallet_id'];
}
$count =0;
$query="SELECT pallet_id FROM `pallets` WHERE pallet_id='$pallet_id'";
$query_run = mysqli_query($connection,$query);
$count =  mysqli_num_rows($query_run);
if(empty($count)){
// for ($i=0; $i <1 ; $i++) { 
    if($pallet_id !='null'){
    echo '<script type="text/javascript">';
echo 'alert("Please enter valid pallet'.$pallet_id.' number");';
echo 'window.location.href = "add_pallet.php";';
echo '</script>';
}

}else{
if($save == 1){

$brand = $_GET['brand'];
$serial_number = $_GET['serial_number'];
$screen_size = $_GET['size'];
$sql = "INSERT INTO `pallet_informations`(
    `pallet_id`,
    `category`,
    `brand`,
    `serial_no`,
    screen_size,
    `qty`,
    `created_user`,
    `user_role`,
    `department`
)
VALUES(
    '$pallet_id',
    'Monitor',
    '$brand',
    '$serial_number',
    '$screen_size',
    '1',
    '$user_id',
    '$role_id',
    '$department'
)";

if(mysqli_query($connection, $sql)){
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //this code block effected to tempory project
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $user_id = $_SESSION['user_id'];
    $department_id = $_SESSION['department'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $query = " INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `model`,
    status
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$pallet_id',
    'monitor to pallet',
    '$start_date',
    '$start_date',
    '$brand',
    '1'
    ) ";
    $query_run = mysqli_query($connection, $query);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    echo "<div class='text-center text-success' style='font-size :24px'>Monitor Record inserted successfully</div>";
   

} else{
    echo "<div class='text-center text-success' style='font-size :24px'>ERROR: Could not able to execute $sql. " . mysqli_error($link)."</div>";
}


}
if($save == 2){
    $pallet_id = $_GET['pallet_id'];
    $brand = $_GET['brand'];
    $qty = $_GET['qty'];
    $category = $_GET['category'];
    if($category ==2){
        $category="Keyboard";
    }elseif($category ==3){
        $category="Mouse";
    }elseif($category ==4){
        $category="Charger";
    }

    $sql = "INSERT INTO `pallet_informations`(
        `pallet_id`,
        `category`,
        `brand`,
        `qty`,
        `created_user`,
        `user_role`,
        `department`
    )
    VALUES(
        '$pallet_id',
        '$category',
        '$brand',
        '$qty',
        '$user_id',
        '$role_id',
        '$department'
    )";
   if(mysqli_query($connection, $sql)){
    
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //this code block effected to tempory project
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $user_id = $_SESSION['user_id'];
    $department_id = $_SESSION['department'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $query = " INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `model`,
    status
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$pallet_id',
    '$category',
    '$start_date',
    '$start_date',
    '$brand',
    '1'
    ) ";
    $query_run = mysqli_query($connection, $query);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class='text-center text-success' style='font-size :24px'>$category Record inserted successfully</div>";
    
} else{
    echo "<div class='text-center text-success' style='font-size :24px'>ERROR: Could not able to execute $sql. " . mysqli_error($link)."</div>";
}
   
    }
    if($save == 3){
        $pallet_id = $_GET['pallet_id'];
    $brand = $_GET['brand'];
    $series = $_GET['series'];
    $model = $_GET['model'];
    $generation = $_GET['generation'];
    $serial_number = $_GET['serial_number'];
    $screen_size = $_GET['size'];
    $sql = "INSERT INTO `pallet_informations`(
        `pallet_id`,
        `category`,
        `brand`,
        `series`,
        `model`,
        `generation`,
        `serial_no`,
        `qty`,
        `created_user`,
        `user_role`,
        `department`,
        screen_size
    )
    VALUES(
        '$pallet_id',
        'Desktop',
        '$brand',
        '$series',
        '$model',
        '$generation',
        '$serial_number',
        '1',
        '$user_id',
        '$role_id',
        '$department',
        '$screen_size'
    )";
      if(mysqli_query($connection, $sql)){
       
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //this code block effected to tempory project
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $user_id = $_SESSION['user_id'];
    $department_id = $_SESSION['department'];
    $date1 = new DateTime('now', new DateTimeZone('Asia/Dubai'));
    $start_date = $date1->format('Y-m-d H:i:s');
    $query = " INSERT INTO `performance_record_table`(
    `user_id`,
    `department_id`,
    `qr_number`,
    `job_description`,
    `start_time`,
    `end_time`,
    `model`,
    status
    )
    VALUES(
    '$user_id',
    '$department_id',
    '$pallet_id',
    'Desktop',
    '$start_date',
    '$start_date',
    '$model',
    '1'
    ) ";
    $query_run = mysqli_query($connection, $query);
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class='text-center text-success' style='font-size :24px'>Desktop Record inserted successfully</div>";
       
    } else{
        echo "<div class='text-center text-success' style='font-size :24px'>ERROR: Could not able to execute $sql. " . mysqli_error($link)."</div>";
    }
        }
    }
    $user_name = $_SESSION['username'];
    $sql="SELECT category FROM pallet_informations WHERE created_user = '$user_name' ORDER BY pallet_info_id DESC LIMIT 1 ";

    $result = mysqli_query($connection,$sql);
    $item_category='110';
    while($row = mysqli_fetch_array($result)) {
        $item_category=$row['category'];
    }
    $item_category=trim($item_category);
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center d-flex">
        <a href="./warehouse_dashboard.php">
            <i class="fa-solid fa-home fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>

<html>
<head>
<script>
     var x = "<?php echo"$item_category"?>";
  showUser(x);
 
 
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","load_data.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
    <?php 
 
    ?>
<div class="col-lg-6 grid-margin stretch-card justify-content-center mx-auto mt-2 ">
            <div class="card mt-3 w-100">
                <div class="card-body ">
                    <h3>Add Item to Pallet</h3>
                    <hr>
<form>
<div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'> &nbsp;&nbsp; Item </label>
                                <div class='col-sm-8 w-75'>
                                <select name='item'  class='form-control w-50' style='border-radius: 5px;' onchange="showUser(this.value)" >

<option value="">Select Item :</option>
<option  selected value="<?php echo $item_category ?>"><?php echo $item_category?></option>
  <option value="1">Monitor</option>
  <option value="2">Keyboard</option>
  <option value="3">Mouse</option>
  <option value="4">Charger</option>
  <option value="5">Desktop</option>
  </select>
</form>

</div>
<div class="card-body ">
<div id="txtHint" ><b></b></div>
</div>
</div>
</div>
<br>


</body>
</html>
