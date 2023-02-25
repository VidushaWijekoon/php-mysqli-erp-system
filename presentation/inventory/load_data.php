<?php
session_start();

$role_id = $_SESSION['role_id'];
$department = $_SESSION['department'];
$user_id = $_SESSION['username'];
$user_id = $_SESSION['username'];
$palet_id=0;
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
 
<?php
$q = $_GET['q'];
// exit();
if($q== 'Keyboard'){
    $q=2;
}elseif($q== 'Charger'){
    $q=4;
}elseif($q== 'Mouse'){
    $q=3;
}elseif($q== 'Monitor'){
    $q=1;
}elseif($q== 'Desktop'){
    $q=5;
}

$con = mysqli_connect("localhost", "root", "", "wms");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"wms");
$sql="SELECT * FROM pallet_informations WHERE created_user = '$user_id' ORDER BY pallet_info_id DESC LIMIT 1 ";

$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    $id=$row['pallet_id'];
    $brand=$row['brand'];
    $model=$row['model'];
    $generation=$row['generation'];
    $series=$row['series'];
    $screen_size=$row['screen_size'];
    $item_category=$row['category'];
}

if($q == 1){
    ?>
    <form method='POST' action='save.php' >
        <?php
        if( $item_category == 'Monitor'){
            echo "
            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                                        placeholder='Pallet QR Number' value='$id' required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Brand </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='brand'
                                        placeholder='Brand'  value='$brand' required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Screen Size </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='size'
                                        placeholder='Screen Size'  value='$screen_size' required>
                                </div>
                            </div>
            ";
        }else{
            echo "
            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                                        placeholder='Pallet QR Number'  required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Brand </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='brand'
                                        placeholder='Brand'   required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Screen Size </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='size'
                                        placeholder='Screen Size'  required>
                                </div>
                            </div>
            ";
        }
echo "
                    
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Serial No </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='serial_number'
                                        placeholder='Serial No' required>
                                </div>
                            </div>
                            <input class='w-50 d-none' style='color:black !important' type='text' name='category' value='$q' required>
                            <button type='submit' name='save' value='1'
                                class='btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-block'><i
                                    class='fa-solid fa-qrcode' style='margin-right: 5px;'></i>Save</button>
                    ";
                    ?>
                    </form>
                    <?php
}elseif($q == 2 || $q == 3 ||$q == 4){
    echo "<form method='POST' action='save_1.php' >";
    if( $item_category =='Keyboard' || $item_category =='Charger' || $item_category =='Mouse'){
        
    if( $item_category =='Keyboard' AND  $q == 2){
        echo " 
        <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                placeholder='Pallet QR Number'  value='$id' required>
        </div>
    </div>";
        echo"
        <div class='row mb-2'>
            <label class='col-sm-3 col-form-label'>Brand </label>
            <div class='col-sm-8 w-75'>
                <input class='w-50' style='color:black !important' type='text' name='brand'
                    placeholder='Brand'  value='$brand' required>
            </div>
        </div>";
    }elseif( $item_category =='Mouse' AND  $q == 3){
        echo " 
        <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                placeholder='Pallet QR Number'  value='$id' required>
        </div>
    </div>";
        echo"
        <div class='row mb-2'>
            <label class='col-sm-3 col-form-label'>Brand </label>
            <div class='col-sm-8 w-75'>
                <input class='w-50' style='color:black !important' type='text' name='brand'
                    placeholder='Brand'  value='$brand' required>
            </div>
        </div>";
    }elseif( $item_category =='Charger' AND  $q == 4){
        echo " 
        <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                placeholder='Pallet QR Number'  value='$id' required>
        </div>
    </div>";
        echo"
        <div class='row mb-2'>
            <label class='col-sm-3 col-form-label'>Brand </label>
            <div class='col-sm-8 w-75'>
                <input class='w-50' style='color:black !important' type='text' name='brand'
                    placeholder='Brand'  value='$brand' required>
            </div>
        </div>";
    }else{
        echo " 
        <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                placeholder='Pallet QR Number' required>
        </div>
    </div>";
        echo"
        <div class='row mb-2'>
            <label class='col-sm-3 col-form-label'>Brand </label>
            <div class='col-sm-8 w-75'>
                <input class='w-50' style='color:black !important' type='text' name='brand'
                    placeholder='Brand'   required>
            </div>
        </div>";
    }
    
    }else{
        echo "
        <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                placeholder='Pallet QR Number' required>
        </div>
    </div>
    <div class='row mb-2'>
        <label class='col-sm-3 col-form-label'>Brand </label>
        <div class='col-sm-8 w-75'>
            <input class='w-50' style='color:black !important' type='text' name='brand'
                placeholder='Brand' required>
        </div>
    </div>
        ";
    }
    echo "
                            <div class='row mb-2'>
                            <label class='col-sm-3 col-form-label'>Quantity </label>
                            <div class='col-sm-8 w-75'>
                                <input class='w-50' style='color:black !important' type='text' name='qty'
                                    placeholder='qty' required>
                            </div>
                            <input class='w-50 d-none' style='color:black !important' type='text' name='category' value='$q' required>
                            <button type='submit' name='save2' value='2'
                                class='btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-block'><i
                                    class='fa-solid fa-qrcode' style='margin-right: 5px;'></i>Save</button>
                    </form>";
}elseif($q == 5){
    echo "
<form method='POST' action='save_2.php'>";
if( $item_category == 'Desktop'){
    echo "
    <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Pallet QR Number </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
                                        placeholder='Pallet QR Number'  value='$id' required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Brand </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='brand'
                                        placeholder='Brand'  value='$brand' required>
                                </div>
                            </div>
                            <div class='row mb-2'>
                            <label class='col-sm-3 col-form-label'>Series </label>
                            <div class='col-sm-8 w-75'>
                                <input class='w-50' style='color:black !important' type='text' name='series'
                                    placeholder='Series'  value='$series' required>
                            </div>
                            </div>
                            <div class='row mb-2'>
                            <label class='col-sm-3 col-form-label'>Model </label>
                            <div class='col-sm-8 w-75'>
                                <input class='w-50' style='color:black !important' type='text' name='model'
                                    placeholder='Model'  value='$model' required>
                            </div>
                            </div>
                            <div class='row mb-2'>
                            <label class='col-sm-3 col-form-label'>Generation </label>
                            <div class='col-sm-8 w-75'>
                                <input class='w-50' style='color:black !important' type='text' name='generation'
                                    placeholder='Generation'  value='$generation' required>
                            </div>
                            </div>
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Screen Size </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='size'
                                        placeholder='Screen Size'  value='$screen_size' required>
                                </div>
                            </div>
    ";
}else{
echo "
<div class='row mb-2'>
<label class='col-sm-3 col-form-label'>Pallet QR Number </label>
<div class='col-sm-8 w-75'>
    <input class='w-50' style='color:black !important' type='text' name='pallet_id'  autofocus
        placeholder='Pallet QR Number'   required>
</div>
</div>
<div class='row mb-2'>
<label class='col-sm-3 col-form-label'>Brand </label>
<div class='col-sm-8 w-75'>
    <input class='w-50' style='color:black !important' type='text' name='brand'
        placeholder='Brand'  required>
</div>
</div>
<div class='row mb-2'>
<label class='col-sm-3 col-form-label'>Series </label>
<div class='col-sm-8 w-75'>
<input class='w-50' style='color:black !important' type='text' name='series'
    placeholder='Series'  required>
</div>
</div>
<div class='row mb-2'>
<label class='col-sm-3 col-form-label'>Model </label>
<div class='col-sm-8 w-75'>
<input class='w-50' style='color:black !important' type='text' name='model'
    placeholder='Model' required>
</div>
</div>
<div class='row mb-2'>
<label class='col-sm-3 col-form-label'>Generation </label>
<div class='col-sm-8 w-75'>
<input class='w-50' style='color:black !important' type='text' name='generation'
    placeholder='Generation' required>
</div>
</div>
<div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Screen Size </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='size'
                                        placeholder='Screen Size'   required>
                                </div>
                            </div>
";
}
echo"
                  
                            <div class='row mb-2'>
                                <label class='col-sm-3 col-form-label'>Serial No </label>
                                <div class='col-sm-8 w-75'>
                                    <input class='w-50' style='color:black !important' type='text' name='serial_number'
                                        placeholder='Serial No' required>
                                </div>
                            </div>  
                            <input class='w-50 d-none' style='color:black !important' type='text' name='category' value='$q' required>
                            <button type='submit' name='save3' value='3'
                                class='btn mb-2 mt-4 btn-primary btn-sm  mx-auto text-center d-block'><i
                                    class='fa-solid fa-qrcode' style='margin-right: 5px;'></i>Save</button>
                    </form>";
}

?>
</body>
</html>